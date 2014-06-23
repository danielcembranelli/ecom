<?
include("Verifica.php");
include("libEmarketing.php");
for($i=0;$i<count($_POST[cliente]);$i++){
//$sqlIncluir = mysql_query("
mysql_query("UPDATE `clientes` SET `antigoidCliente` =  '".$_POST[cliente][$i]."' WHERE  `Cli_ID` =  '".$_POST[atualid]."' LIMIT 1 ;");
//) or die (mysql_error());
mysql_query("UPDATE  `cliente2` SET `ja` =  '1' WHERE  `Cli_ID` =  '".$_POST[cliente][$i]."' LIMIT 1");
}
?>
<center>Operação realizada com sucesso</center>
