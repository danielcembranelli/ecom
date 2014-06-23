<? include("Verifica.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true);
$sqlPreco = mysql_query("SELECT textoClausula FROM `clausulas` where idClausula = '".$_REQUEST[id]."' Limit 1") or die ("PRECO: ".mysql_error());
$sP = mysql_fetch_array($sqlPreco);
mysql_free_result($sqlPreco);
echo strip_tags($sP[textoClausula]);?>