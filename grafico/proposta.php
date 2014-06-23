<?
include("../config.php");
include("JSON.php");
$Sql = mysql_query("SELECT  count(*) as total, DATE_FORMAT(dtcadProposta,'%d/%m/%Y') as data, DATE_FORMAT(dtcadProposta,'%d/%m') as label FROM proposta p inner join login l on (l.id=p.idVendedor) group by data order by dtcadProposta desc Limit 10");

while ($sq = mysql_fetch_array($Sql)){
	$data[] = $sq[label];
	if($max<$sq[total]){
		$max=$sq[total];	
	}
    $obra[] = $sq[total];
    
}
mysql_free_result($Sql);
$json = new Services_JSON();
$Obra = str_replace('"','',$json->encode(array_reverse($obra)));
$Data = str_replace('','',$json->encode(array_reverse($data)));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>
		
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		
		<!-- 1a) Optional: the exporting module -->
		<script type="text/javascript" src="js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'line',
						marginRight: 130,
						marginBottom: 25
					},
					title: {
						text: 'Propostas Emitidas nos ultimos 10 dias',
						x: -20 //center
					},
					xAxis: {
						categories: <?=$Data?>
					},
					yAxis: {
						plotLines: [{
							value: 0,
							width: 1,
							color: '#808080'
						}]
					},
					tooltip: {
						formatter: function() {
				                return this.y;
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'center',
						x: -10,
						y: 100,
						borderWidth: 0
					},
					series: [{
						name: 'Emissão',
						data: <?=$Obra?>
					}]
				});
				
				
			});
				
		</script>
		
	</head>
	<body>
		
		<!-- 3. Add the container -->
		<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
		
				
	</body>
</html>
