<?
include("Config.php");
//countIntervaloDias($dtInicio,$dtFinal,$dtInicioCompara,$dtFinalCompara)
echo countIntervaloDias('2011-09-10','2011-09-20','2011-09-10','2011-09-09');
exit;
function dataSql($data){
	$result = explode('/',$data); 
	return  $result[2]."-".$result[1]."-".$result[0];
}
$Sql = mysql_query("SELECT idProposta, DATE_FORMAT(dtiniProposta,'%d/%m/%Y') as dtini, previsaoProposta, tipoprevisaoProposta, dtprevisaoProposta FROM proposta where tipoprevisaoProposta!='' And dtprevisaoProposta='0000-00-00' order by tipoprevisaoProposta") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	
	echo $data = CalculaDias($dom[tipoprevisaoProposta],$dom[dtini],$dom[previsaoProposta]);
	
	echo $dom[dtini].' '.CalculaDias($dom[tipoprevisaoProposta],$dom[dtini],$dom[previsaoProposta]).'<br>';
	if($dom[dtini]!='00/00/0000'){
		$AlteraDataInicio = mysql_query("Update proposta set dtprevisaoProposta='".$data."' where idProposta='".$dom[idProposta]."'");
	}
}
?>
