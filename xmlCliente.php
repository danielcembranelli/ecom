<? include("Config.php");
	
	$Sql = mysql_query("SELECT c.Cli_Fantasia, c.Cli_Cidade, c.Cli_UF, p.idProposta, p.descricaoObra FROM proposta p inner join clientes c on (c.CLI_ID=p.idCliente) where p.idProposta>'625' And p.confirmaProposta between '2010-01-01 00:00:01' and '2010-12-31 23:59:59';") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	
	$lines = file_get_contents('http://maps.google.com/maps?saddr='.urlencode($dom[Cli_Cidade]).'&hl=en&z=1');
	//$dados = split('distance:"', $lines);
	//$dist  = split(' km"',$dados[1]);
	$lat = split('lat:',$lines);
	$lat2 = split('}',$lat[1]);
	$l= split(',lng:',$lat2[0]);
	?>
    <marker name="<?=$dom[idProposta]?>/2010 - <?=$dom[Cli_Fantasia]?>" address="<?=$dom[Cli_Cidade]?> - <?=$dom[Cli_UF]?>" lat="<?=$l[0]?>" lng="<?=$l[1]?>" type="restaurant" />
    <?
}
	//echo '<br>';
	//echo count($KM[DISTANCIA]);
	//echo '<br>';
	//echo '<br>';
	$id = 0;
	$distancia =99999;

?>
