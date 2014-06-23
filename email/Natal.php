<?
ini_set('max_execution_time','999999999999999999999');
$_REQUEST[dt]='10/07/2010';
//ini_set("SMTP","mail.cl07.mobimail.com");
ini_set("sendmail_from","daniel@wplaza.com.br");

$sql = mysql_connect("escad.com.br", "mapaes", "]IoK0zd9") or die (mysql_error()); 
mysql_select_db ("mapaes") or die("não foi possivel");

$imagem_nome="EmailNatal.jpg"; // aqui vai o enderço da imagem no computaque envia
$arquivo=fopen($imagem_nome,'r');
$contents = fread($arquivo, filesize($imagem_nome));
$encoded_attach = chunk_split(base64_encode($contents));
fclose($arquivo);
$limitador = "_=======". date('YmdHms'). time() . "=======_";

$mailheaders = "From: Escad Rental <comercial@escad.com.br>\r\n";
$mailheaders .= "MIME-version: 1.0\r\n";
$headers .= "Return-Path: comercial@escad.com.br\n";
	$headers .= "Content-Language: pt-br\n";
	$headers .= "Disposition-Notification-To: comercial@escad.com.br\n";
	$headers .= "Importance: normal\n";
	$headers .= "Priority: normal\n";
$mailheaders .= "Content-type: multipart/related; boundary=\"$limitador\"\r\n";
$cid = date('YmdHms').'.'.time();



$texto="
<html>
<body><CENTER>
Caso não consiga visualizar a imagem abaixo, habilite a exibição de imagem no seu cliente de e-mail.
<a href='http://www.escad.com.br'><img src=\"cid:$cid\" border='0'></a>
</body>
</html>
";

$msg_body = "--$limitador\r\n";
$msg_body .= "Content-type: text/html; charset=iso-8859-1\r\n";
$msg_body .= "$texto";
$msg_body .= "--$limitador\r\n";
$msg_body .= "Content-type: image/jpeg; name=\"$imagem_nome\"\r\n";
$msg_body .= "Content-Transfer-Encoding: base64\r\n";
$msg_body .= "Content-ID: <$cid>\r\n";
$msg_body .= "\n$encoded_attach\r\n";
$msg_body .= "--$limitador--\r\n";

        $sqlUsuario = mysql_query("SELECT id, Email FROM sendnatal where statussend = 'N'") or die ("Could not connect to database: ".mysql_error());
        while ($sU = mysql_fetch_array($sqlUsuario)){
		mail($sU[Email],"A Equipe Escad Rental....",$msg_body, $mailheaders);
		$altera = mysql_query("Update sendnatal set statussend='S', dtsend=NOW() where id='".$sU[id]."' Limit 1);");
		}
		echo"Mensagem enviada";
?>