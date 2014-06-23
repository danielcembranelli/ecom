<?
include("Config.php");
$Sql = "SELECT A.Cli_ID, A.Cli_Fantasia, A.Cli_Contato FROM clientes A where  A.Cli_ID = '$_REQUEST[q]'";
$sqlCli = mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());
$sC = mysql_fetch_array($sqlCli);
echo $sC[Cli_Contato];
?>