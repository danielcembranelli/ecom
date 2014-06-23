<?
include("Config.php");
$Sql = "SELECT A.Cli_ID, A.Cli_Fantasia, A.Cli_Contato, A.Cla_ID FROM clientes A where  A.Cli_ID = '$_REQUEST[q]'";
$sqlCli = mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());
$sC = mysql_fetch_array($sqlCli);

	$Sql = "SELECT count(*) as total FROM relacionamento_cliente rc where rc.statusRc='A' And rc.idCliente='".$_REQUEST[q]."' And novapropostaRc='S' And idProposta='0'";
	$sqlCli = mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());
	$sU = mysql_fetch_array($sqlCli);
echo $sU[total].'|'.$sC[Cla_ID];
?>