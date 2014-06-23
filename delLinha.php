<?
include("Verifica.php");
$sqlClausula = mysql_query("Delete from tabela_tecnica_modelo where idTtm='".$_REQUEST[id]."'") or die (mysql_error());
if($sqlClausula==1){
	echo "TRUE";
} else {
	echo "FALSE";
}
?>