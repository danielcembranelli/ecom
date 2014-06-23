<? include("Verifica.php");         

//RECEBE PARÃMETRO                     
        

//QUERY 
$sql = "SELECT l.nome, rc.idRc, c.Cli_Fantasia, rc.tipoRc, rc.modoRc, DATE_FORMAT(dtRc,'%d/%m/%Y') as dt, rc.novapropostaRc FROM relacionamento_cliente rc left join clientes c on (c.Cli_ID=rc.idCliente) left join login l on (l.id=rc.idVendedor) where rc.statusRc='A' And rc.idCliente='".$_REQUEST[id]."'  And rc.novapropostaRc='S' And rc.idProposta='0' order by rc.dtRc desc";            
//EXECUTA A QUERY               
$sql = mysql_query($sql) or die (mysql_error());       

$row = mysql_num_rows($sql);    
//VERIFICA SE VOLTOU ALGO 

	

   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   
   //PERCORRE ARRAY    
	   for($i=0; $i<$row; $i++) {  
      $codigo    = mysql_result($sql, $i, "idRc"); 
	  $descricao = mysql_result($sql, $i, "dt");
	  $total = mysql_result($sql, $i, "nome");
	  $tipo = mysql_result($sql, $i, "tipoRc");
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$codigo."</codigo>\n";                  
      $xml .= "<descricao>".labelTipoRelacionamento($tipo)." em ".$descricao." (".$total.")</descricao>\n";         
      $xml .= "</cidade>\n";    

	   
   }
   $xml.= "</cidades>\n";
   
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
                                               

//PRINTA O RESULTADO  
echo $xml;
mysql_free_result($sql);             
?>
