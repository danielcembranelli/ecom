<?
include("Config.php");
	$SqlInsert = mysql_query("Insert into `lib_filtros` (stringLf) Values ('".$_POST[PALAVRA]."')") or die (mysql_error());
?>