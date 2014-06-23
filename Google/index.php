<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAARL4SRCG12qPC_Yw07z0ekBQ69F8f8UXA2mBZMfjklbF_0RycrRTCgNDBl8lPPgltOkbrsusfNFNwGg" type="text/javascript"></script>
</head>
<body>
<? include("lib.php");
// Instancia a classe
$gmaps = new gMaps('ABQIAAAARL4SRCG12qPC_Yw07z0ekBRqgqJMpTbcRHqZlxJXQaGgPIxcbBSm_kILujNlocyYFQ3jdsf9nL-V3g');
$dados = $gmaps->geolocal('Duque de Caxias RJ');
// Exibe os dados encontrados:
print_r($dados);
?>
a
</body>
</html>
