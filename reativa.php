<?
include('config.php');
$sqlIncluir = mysql_query("Update login set statusUsuario='A' where id = '104' ") or die ("Altera Dado: ".mysql_error());
?>
