<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?
ini_set('max_execution_time','999999999999999999999');
$_REQUEST[dt]='10/07/2010';
ini_set("SMTP","mail.cl07.mobimail.com");
set_time_limit(0);
ini_set("sendmail_from","mapaes@escad.com.br");
$lines = file_get_contents('http://ecom.escad.com.br/_layoutEmailAno.php?dt='.date("Y-m-d"));
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: ECOM Escad Rental <mapaes@escad.com.br>\n";
/* Enviando a mensagem */
echo mail("grace@escad.com.br", "ECOM: Movimentação de Clientes em 2011", $lines, $headers);
echo mail("mapaes@escad.com.br", "ECOM: Movimentação de Clientes em 2011", $lines, $headers);
echo mail("alisson@escad.com.br", "ECOM: Movimentação de Clientes em 2011", $lines, $headers);
echo mail("daniel@escad.com.br", "ECOM: Movimentação de Clientes em 2011", $lines, $headers);

include("Config.php");
$data = date("Y-m-d");
$hora = date("h:m");
$sql = mysql_query ("INSERT INTO `auto` ( `id` , `data`  , `hora`, `modo` ) VALUES ('', '$data', '$hora', 'rel_ecom');") or die (mysql_error());
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>

</body>
</html>