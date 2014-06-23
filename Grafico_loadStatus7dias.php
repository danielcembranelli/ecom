<?php
include("config.php");

// generate some random data
srand((double)microtime()*1000000);

$data = array();
$obra = array();
$manutencao = array();
$disponivel = array();
$ob = array();
$max = 15;
$AnoAnterior = date('Y',mktime (0,0,0,date('m'),date('d'),date('Y')-1,-1));

for($i=0;$i<=19;$i++){
$DtFinal = date('m-d',mktime (0,0,0,date('m'),date('d')-$i,date('Y'),-1));
$Data = date('d',mktime (0,0,0,date('m'),date('d')-$i,date('Y'),-1));

//echo "SELECT  count(*) as total, DATE_FORMAT(dtcadProposta,'%d/%m/%Y') as data from proposta where DATE_FORMAT(dtcadProposta,'%Y/%m/%d')='".date("Y").'-'.$DtFinal."' group by data".'<br>';

$Sql = mysql_query("SELECT count(*) as total, DATE_FORMAT(dtcadProposta,'%d/%m/%Y') as data from proposta where dtcadProposta between '".date("Y").'-'.$DtFinal." 00:00:01' and '".date("Y").'-'.$DtFinal." 23:59:59' group by data") or die (mysql_error());
$sqA = mysql_fetch_array($Sql);

$SqlAnte = mysql_query("SELECT count(*) as total, DATE_FORMAT(dtcadProposta,'%d/%m/%Y') as data from proposta where dtcadProposta between '".$AnoAnterior.'-'.$DtFinal." 00:00:01' and '".$AnoAnterior.'-'.$DtFinal." 23:59:59' group by data") or die (mysql_error());
$sqM = mysql_fetch_array($SqlAnte);
//print_r($sqA);
//while ($sq = mysql_fetch_array($Sql)){
	$data[] = $Data;
	
	if($max<$sq[total]){
		$max=$sq[total];	
	}
    $obra[] = number_format($sqA[total]);
    
	if($max<$sqM[total]){
		$max=$sqM[total];	
	}
	$manutencao[]=number_format($sqM[total]);
}

//mysql_free_result($Sql);



//array_reverse($data);

include_once( 'open-flash-chart/ofc-library/open-flash-chart.php' );
$g = new graph();
$g->title( 'Propostas Emitidas Ultimos 20 dias', '{font-size: 14px;}' );
$g->bg_colour = '#FFFFFF';
$g->set_data(array_reverse($obra));
$g->line_hollow( 2, 4, '#20558a', 'Emitidas em '.date("Y"), 10 );

$g->set_data(array_reverse($manutencao));
$g->line_hollow( 2, 4, '#009661', 'Emitida em '.$AnoAnterior, 10 );

//$g->set_data(array_reverse($disponivel));
//$g->line_hollow( 2, 4, '#C79810', 'Disponivel', 10 );

//$g->set_data(array_reverse($ob));
//$g->line_hollow( 2, 4, '#d01f3c', 'Ob', 10 );
// label each point with its value
$g->set_x_labels(array_reverse($data));
$g->set_tool_tip( '#val#' );
// set the Y max
$g->set_y_max($max+5);
// label every 20 (0,20,40,60)
$g->y_label_steps(5);

//$g->bg_colour = '#FFFFFF';
//$g->pie(60,'#FFFFFF','{display:none;}',false,1);
//
// pass in two arrays, one of data, the other data labels
//
//$g->pie_values( $data, $label, $links );
//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
//$g->pie_slice_colours( array('#d01f3c','#C79810','#009661','#20558a','#356aa0') );
//$g->set_tool_tip( 'Frota em #x_label#<br>Qtde: #val#%' );

echo $g->render();
?>
