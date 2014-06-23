<?
include('../Config.php');
ini_set('max_execution_time','999999999999999999999');
$_REQUEST[dt]='10/07/2010';
ini_set("sendmail_from","mapaes@mapaes.escad.com.br");

$imagem_nome="E-mail_agradece.jpg"; // aqui vai o enderço da imagem no computaque envia
$arquivo=fopen($imagem_nome,'r');
$contents = fread($arquivo, filesize($imagem_nome));
$encoded_attach = chunk_split(base64_encode($contents));
fclose($arquivo);
$limitador = "_=======". date('YmdHms'). time() . "=======_";

$mailheaders = "From: Escad Rental <comercial@escad.com>\r\n";
$mailheaders .= "MIME-version: 1.0\r\n";
$mailheaders .= "Content-type: multipart/related; boundary=\"$limitador\"\r\n";
$cid = date('YmdHms').'.'.time();



$texto="
<html>
<body><CENTER>
Caso não consiga visualizar a imagem abaixo, habilite a exibição de imagem no seu cliente de e-mail.<br>
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


mail("grace@escad.com.br","Escad Rental - Agradecimento por sua locação.",$msg_body, $mailheaders);
mail("mapaes@escad.com.br","Escad Rental - Agradecimento por sua locação.",$msg_body, $mailheaders);
echo"Mensagem enviada";
?>