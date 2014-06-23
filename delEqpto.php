<?
include("Verifica.php");
$sqlClausula = mysql_query("Update proposta_equipamento set statusPe='E' where idPe='".$_REQUEST[id]."'") or die (mysql_error());
if($sqlClausula==1){
	echo "TRUE";
} else {
	echo "FALSE";
}
?>