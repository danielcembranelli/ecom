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



$texto='

<html>

<head>

<title>material</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<!-- Save for Web Slices (material.psd) -->

<table id="Table_01" width="600" height="800" border="0" cellpadding="0" cellspacing="0">

	<tr>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_01.jpg" width="238" height="240" alt=""></td>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_02.jpg" width="179" height="240" alt=""></td>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_03.jpg" width="183" height="240" alt=""></td>

	</tr>

	<tr>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_04.jpg" width="238" height="236" alt=""></td>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_05.jpg" width="179" height="236" alt=""></td>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_06.jpg" width="183" height="236" alt=""></td>

	</tr>

	<tr>

		<td>

<img src="http://www.acbooks.com.br/material/images/material_07.jpg" alt="" width="238" height="171" border="0" usemap="#Map"></td>

		<td>

<img src="http://www.acbooks.com.br/material/images/material_08.jpg" alt="" width="179" height="171" border="0" usemap="#Map2"></td>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_09.jpg" width="183" height="171" alt=""></td>

	</tr>

	<tr>

		<td>

  <img src="http://www.acbooks.com.br/material/images/material_10.jpg" alt="" width="238" height="153" border="0" usemap="#Map3"></td>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_11.jpg" width="179" height="153" alt=""></td>

		<td>

			<img src="http://www.acbooks.com.br/material/images/material_12.jpg" width="183" height="153" alt=""></td>

	</tr>

</table>

<!-- End Save for Web Slices -->



<map name="Map">

  <area shape="rect" coords="28,16,131,62" href="http://www.acbooks.com.br/compra_livros/compra_livro1.php" target="_blank">

  <area shape="rect" coords="135,14,235,64" href="http://www.acbooks.com.br/compra_livros/compra_livro2.php" target="_blank">

  <area shape="rect" coords="32,70,131,110" href="http://www.acbooks.com.br/compra_livros/compra_livro4.php" target="_blank">

  <area shape="rect" coords="136,68,233,108" href="http://www.acbooks.com.br/compra_livros/compra_livro5.php" target="_blank">

  <area shape="rect" coords="32,116,128,158" href="http://www.acbooks.com.br/compra_livros/compra_livro7.php" target="_blank">

  <area shape="rect" coords="138,115,234,156" href="http://www.acbooks.com.br/compra_livros/compra_livro8.php" target="_blank">

</map>



<map name="Map2">

  <area shape="rect" coords="1,13,110,65" href="http://www.acbooks.com.br/compra_livros/compra_livro3.php" target="_blank">

  <area shape="rect" coords="1,73,110,111" href="http://www.acbooks.com.br/compra_livros/compra_livro6.php" target="_blank">

</map>



<map name="Map3">

  <area shape="rect" coords="30,26,319,75" href="www.acbooks.com.br" target="_blank">

</map>

</body>

</html>';

$msg_body = "--$limitador\r\n";
$msg_body .= "Content-type: text/html; charset=iso-8859-1\r\n";
$msg_body .= "$texto";
$msg_body .= "--$limitador\r\n";
$msg_body .= "Content-type: image/jpeg; name=\"$imagem_nome\"\r\n";
$msg_body .= "Content-Transfer-Encoding: base64\r\n";
$msg_body .= "Content-ID: <$cid>\r\n";
$msg_body .= "\n$encoded_attach\r\n";
$msg_body .= "--$limitador--\r\n";

        $sqlUsuario = mysql_query("SELECT id, Email FROM sendnatal where statussend = 'N' order by RAND() Limit 300") or die ("Could not connect to database: ".mysql_error());
        while ($sU = mysql_fetch_array($sqlUsuario)){
		echo $sU[id].'<br>';
		mail($sU[Email],"A Equipe Escad Rental....",$msg_body, $mailheaders);
		$altera = mysql_query("Update sendnatal set statussend='S', dtsend=NOW() where id='".$sU[id]."' Limit 1;");
		}
		echo"Mensagem enviada";
?>