<?php
include("Config.php");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 function extrairEmails($string) {
	    $pattern = '/([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+/i';
	    preg_match_all($pattern, $string, $matches);
	    return isset($matches[0]) ? $matches[0] : array();
}
 function correct_encoding($text) {
    $current_encoding = mb_detect_encoding($text, 'auto');
    $text = iconv($current_encoding, 'UTF-8', $text);
    return $text;
}

function exclusoes($FRASE){
	$retorno=1;
	//$sqlConsulta = mysql_query("SELECT stringLf FROM lib_filtros") or die ("Could not connect to database: ".mysql_error());
	//while($c = mysql_fetch_array($sqlConsulta)){
		//if(stristr($FRASE,$c[stringLf])) {
       		//$retorno=0;
		//}
	//}
	return $retorno;
}

class CTe {
      var $mbox ; //Conexao no e-mail
      //private $caminho = 'xml/'; //Local onde será gravado o xml
      var  $msgErro;
	
      function buscaEmail($url, $box, $login, $senha){
          $this->mbox = @imap_open("{".$url."/novalidate-cert}$box", "$login", "$senha");
          if($this->mbox !== false){
           $qtde = @imap_num_msg($this->mbox);
            for($nm = 1; $nm <= $qtde; $nm++){
			echo '<b>'.$nm.'</b><br>';
               $uid = @imap_uid($this->mbox, $nm);
				$result = @imap_headerinfo($this->mbox, $nm, FT_UID);

				if(exclusoes($result->subject)){		
					$a =extrairEmails($result->fromaddress);
					foreach ($a as $b) {
						$this->insereBD($b);
						echo $b.'<br>';	
					}
					$b = extrairEmails($result->toaddress);
					foreach ($b as $c) {
						$this->insereBD($c);
						echo $c.'<br>';	
					}
					$c = extrairEmails($result->ccaddress);
					foreach ($c as $d) {
						$this->insereBD($d);
						echo $d.'<br>';	
					}
					$d = extrairEmails($result->bccaddress);
					foreach ($d as $e) {
						$this->insereBD($e);
						echo $e.'<br>';	
					}
			  	}
				echo imap_delete($this->mbox,$uid, FT_UID);
            }

            imap_expunge($this->mbox);
            imap_close($this->mbox);

          }else {
            $this->msgErro = date("d-m-Y H:i:s")." - CTe - Erro na conexao IMAP: ".imap_last_error()."\n";
            return false;
          }

          return true;
      }
		
		function insereBD($EMAIL){
		  	if(exclusoes($EMAIL)){
			$sqlConsulta = mysql_query("SELECT count(*) as total, idCe FROM contatos_email where emailCe='".$EMAIL."' group by emailCe") or die ("Could not connect to database: ".mysql_error());
			$c = mysql_fetch_array($sqlConsulta);		
				if($c[total]>'0'){
					$SqlInsert = mysql_query("Update `contatos_email` set udtCe=NOW(), qtdeCe=qtdeCe+1 where idCe='".$c[idCe]."' Limit 1;") or die (mysql_error());
		
				} else {
					$SqlInsert = mysql_query("INSERT INTO `contatos_email` (`emailCe`,`dtCe`,`qtdeCe`) VALUES ('".$EMAIL."', NOW(),'1');");
				}
		  	}
	  	}
}

  $ctes = new CTe();

  if(!$ctes->buscaEmail("imap.escad.com.br:143", "INBOX", "mail@escad.com.br", "escmai12")){
    echo $ctes->msgErro."\n";
  }
?>