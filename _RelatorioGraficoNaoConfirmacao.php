<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>R</title>
		
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="grafico/js/highcharts.js"></script>
		
		<!-- 1a) Optional: add a theme file -->
		<!--
			<script type="text/javascript" src="../js/themes/gray.js"></script>
		-->
		
		<!-- 1b) Optional: the exporting module -->
		<script type="text/javascript" src="grafico/js/modules/exporting.js"></script>
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		
			var chart;
			$(document).ready(function() {
				chart = new Highcharts.Chart({
					chart: {
						renderTo: 'container',
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false
					},
					title: {
						text: 'Propostas Nao Confirmadas - Vendedor'
					},
					plotOptions: {
						pie: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: {
								enabled: true,
								color: '#000000',
								connectorColor: '#000000',
								formatter: function() {
									return '<b>'+ this.point.name +'</b>: '+ this.y +'';
								}
							}
						}
					},
					exporting:{
        enabled: false
    },
				    series: [{
						type: 'pie',
						name: 'Propostas Não Confirmadas - Vendedor',
						data: [
						<?
if($_POST[idFm]!=''){
	if($_SESSION[buscaLocMaq][idFm]!=$_POST[idFm]){
			$_SESSION[buscaLocMaq][idFm]=$_POST[idFm];
	}
}
if($_POST[idVendedor]!=''){
	if($_SESSION[buscaLocMaq][idVendedor]!=$_POST[idVendedor]){
			$_SESSION[buscaLocMaq][idVendedor]=$_POST[idVendedor];
	}
}
if($_POST[idFilial]!=''){
	if($_SESSION[buscaLocMaq][idFilial]!=$_POST[idFilial]){
			$_SESSION[buscaLocMaq][idFilial]=$_POST[idFilial];
	}
}
if($_POST[dtInicial]!=''){
	if($_SESSION[buscaLocMaq][dtInicial]!=$_POST[dtInicial]){
			$_SESSION[buscaLocMaq][dtInicial]=$_POST[dtInicial];
	}
}
if($_POST[dtInicial]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaLocMaq][dtInicial]='';
}
if($_POST[dtFinal]!=''){
	if($_SESSION[buscaLocMaq][dtFinal]!=$_POST[dtFinal]){
			$_SESSION[buscaLocMaq][dtFinal]=$_POST[dtFinal];
	}
}
if($_POST[dtFinal]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaLocMaq][dtFinal]='';
}

if($_POST[_a]!=''){
	if($_SESSION[buscaUltimo][_a]!=$_POST[_a]){
			$_SESSION[buscaUltimo][_a]=$_POST[_a];
	}
}
						

$montaWhere = ' where p.statusProposta="L"';
//	if($dl[tipoUsuario]=='V'){
//		$Sql.=" And p.idVendedor='".$dl[id]."'";
//	}
//	$type = 1;

if($_SESSION[buscaLocMaq][idFm]!=''){
	if($_SESSION[buscaLocMaq][idFm]!='0'){
		$montaWhere .= " And p.idMp='".$_SESSION[buscaLocMaq][idFm]."'";
		$type = 1;
	}
}
if($_SESSION[buscaLocMaq][idVendedor]!=''){
	if($_SESSION[buscaLocMaq][idVendedor]!='0'){
		$montaWhere .= " And p.idVendedor='".$_SESSION[buscaLocMaq][idVendedor]."'";
		$type = 1;
	}
}
if($_SESSION[buscaLocMaq][idFilial]!=''){
	if($_SESSION[buscaLocMaq][idFilial]!='0'){
		$montaWhere .= " And p.idFilial='".$_SESSION[buscaLocMaq][idFilial]."'";
		$type = 1;
	}
}

if($_POST[dtInicial]!=''){
	
	$dti = explode('/',$_SESSION[buscaLocMaq][dtInicial]);
	$dtf = explode('/',$_SESSION[buscaLocMaq][dtFinal]);
	
	$montaWhere .= " And p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}
						
$Sql = mysql_query("SELECT mp.nome, count(*) as total FROM proposta p inner join login mp on (mp.id=p.idVendedor) ".$montaWhere." group by mp.nome order by total") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
							['<?=$dom[nome]?>',<?=$dom[total]?>],
		<? } ?>					
						]
					}]
				});
			});
				
		</script>
		
	</head>
	<body>
		
		<!-- 3. Add the container -->
		<div id="container" style="width: 600px; height: 400px; margin: 0 auto"></div>
		
				
	</body>
</html>
