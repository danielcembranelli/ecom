<?php
include("config.php");

// generate some random data
srand((double)microtime()*1000000);

$data = array();
$obra = array();
$manutencao = array();
$disponivel = array();
$ob = array();
$max = 10;
$Sql = mysql_query("SELECT DATE_FORMAT(dtcadCli,'%Y-%m-%d') as dt,DATE_FORMAT(dtcadCli,'%m/%Y') as label, count(*) as total FROM clientes c where DATE_FORMAT(dtcadCli,'%Y-%m')!='0000-00' group by dt order by dt desc Limit 12;");

while ($sq = mysql_fetch_array($Sql)){
	if($max<$sq[total]){
		$max=$sq[total];	
	}
    $obra[$sq[dt]] = number_format($sq[total],0);
    
}

$Sql = mysql_query("SELECT DATE_FORMAT(dtcadProposta,'%Y-%m-%d') as dt, count(*) as total FROM proposta group by dt desc Limit 12");

while ($sq = mysql_fetch_array($Sql)){
	if($max<$sq[total]){
		$max=$sq[total];	
	}
    $proposta[$sq[dt]] = number_format($sq[total],0);
    
}

$Sql = mysql_query("SELECT DATE_FORMAT(dtcadProposta,'%Y-%m-%d') as dt, DATE_FORMAT(dtcadProposta,'%d/%m') as label FROM proposta group by dt desc Limit 12");

while ($sq = mysql_fetch_array($Sql)){
	$data[] = $sq[label];
    $p[] = number_format($proposta[$sq[dt]],0);
	$c[] = number_format($obra[$sq[dt]],0);
    
}
mysql_free_result($Sql);



//array_reverse($data);

include_once( 'open-flash-chart/ofc-library/open-flash-chart.php' );
$g = new graph();
$g->title( 'Movimento dos Ultimos 12 Dias', '{font-size: 14px;}' );
$g->bg_colour = '#FFFFFF';
$g->set_data(array_reverse($c));
$g->line_hollow( 2, 4, '#20558a', 'Cadastro de Cliente Novo', 10 );

$g->set_data(array_reverse($p));
$g->line_hollow( 2, 4, '#009661', 'Emissao de Proposta', 10 );

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
