<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?
$_REQUEST[dt]='10/07/2010';
ini_set("sendmail_from","mapaes@escad.com.br");
$lines = file_get_contents('http://ecom.escad.com.br/_layoutEmail.php?dt=2010-09-03');
$headers = "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "From: ECOM Escad Rental <mapaes@escad.com.br>\n";
/* Enviando a mensagem */
echo mail("dc@webplaza.net.br", "ECOM: Movimentação de Proposta em 03/09/2010", $lines, $headers);
echo mail("grace@escad.com.br", "ECOM: Movimentação de Proposta em 03/09/2010", $lines, $headers);
//mail("alisson@escad.com.br", "ECOM: Movimentação de Proposta em ".date("d/m/Y"), $lines, $headers);
?>

</body>
</html>