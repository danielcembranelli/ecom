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

							},
							
						}
					},
					exporting:{
        enabled: false
    },
				    series: [{
						type: 'pie',
						name: 'Equipamentos Prospectados',
						data: [
						<?
if($_POST[idFm]!=''){
	if($_SESSION[buscaLocMaq][idFm]!=$_POST[idFm]){
			$_SESSION[buscaLocMaq][idFm]=$_POST[idFm];
	}
}
if($_POST[groupProposta]!=''){
	if($_SESSION[buscaLocMaq][groupProposta]!=$_POST[groupProposta]){
			$_SESSION[buscaLocMaq][groupProposta]=$_POST[groupProposta];
	}
}
if($_SESSION[buscaLocMaq][groupProposta]==''){
	$_SESSION[buscaLocMaq][groupProposta]='idFamilia';
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
if($_POST[statusProposta]!=''){
	if($_SESSION[buscaLocMaq][statusProposta]!=$_POST[statusProposta]){
			$_SESSION[buscaLocMaq][statusProposta]=$_POST[statusProposta];
	}
}
if($_POST[statusProposta]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaLocMaq][statusProposta]='';
}
if($_SESSION[buscaLocMaq][statusProposta]==''){
	$_SESSION[buscaLocMaq][statusProposta]='TO';
}
						
$Sql = "Select p.dtcadProposta, pe.idFamilia, L.nomeLegenda as nome, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, SUM(pe.qtdaPe) as qtda from proposta_equipamento pe inner join proposta p on (pe.idProposta=p.idProposta) left join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda)";

$montaWhere = ' where pe.statusPe="A"';
//	if($dl[tipoUsuario]=='V'){
//		$Sql.=" And p.idVendedor='".$dl[id]."'";
//	}
//	$type = 1;
if($_SESSION[buscaLocMaq][statusProposta]=='TO'){
	$montaWhere .= ' And p.statusProposta!="T"';
} else {
	$montaWhere .= ' And p.statusProposta="'.$_SESSION[buscaLocMaq][statusProposta].'"';
}


if($_REQUEST[idCliente]!=''){
	$montaWhere .= " And p.idCliente='$_REQUEST[idCliente]'";
}
if($dl[tipoUsuario]=='V'){
$_POST[idVendedor]=$dl[id];
//$Sql.="where p.idVendedor='".$dl[id]."'";
}
if($_SESSION[buscaLocMaq][idFm]!=''){
	if($_SESSION[buscaLocMaq][idFm]!='0'){
		$montaWhere .= " And A.master='".$_SESSION[buscaLocMaq][idFm]."'";
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
if($_SESSION[buscaproposta][tipoProposta]!=''){
	if($_SESSION[buscaproposta][tipoProposta]!='0'){
		$montaWhere .= " And p.tipoProposta='".$_SESSION[buscaproposta][tipoProposta]."'";
		$type = 1;
	}
}

if($_POST[dtInicial]!=''){
	
	$dti = explode('/',$_SESSION[buscaLocMaq][dtInicial]);
	$dtf = explode('/',$_SESSION[buscaLocMaq][dtFinal]);
	
	$montaWhere .= " And p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}
if($_SESSION[buscaproposta][nrProposta]!=''){

	$montaWhere .= " And p.idProposta Like '%".$_SESSION[buscaproposta][nrProposta]."%'";

}


$montaWhere1 .= " group by ".$_SESSION[buscaLocMaq][groupProposta];
//Paginação
$numreg = 250; // Quantos registros por página vai ser mostrado
        if (!isset($_REQUEST[pg])) {
                $_REQUEST[pg] = 0;
        }						
$Sql = mysql_query($Sql.$montaWhere.$montaWhere1) or die ("Could not connect to database: ".mysql_error());

while ($dom = mysql_fetch_array($Sql)){
	?>
							['<?=$dom[nome]?>',<?=$dom[qtda]?>],
		<? } ?>					
						]
					}]
				});
			});
				
		</script>
		
	</head>
	<body>
		
		<!-- 3. Add the container -->
		<div id="container" style="width: 1200px; height: 600px; margin: 0 auto"></div>
		
				
	</body>
</html>
