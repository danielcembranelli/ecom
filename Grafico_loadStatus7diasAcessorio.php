<?php
include("config.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true);
// generate some random data
srand((double)microtime()*1000000);

$data = array();
$aobra = array();
$amanutencao = array();
$adisponivel = array();
$aob = array();

$Sql = mysql_query("SELECT data, mes, aobra, amanutencao, adisponivel,aob, (100/(aobra+amanutencao+adisponivel+aob)) as porcem FROM dip_diaria_geral d order by dia desc Limit 7;");

while ($sq = mysql_fetch_array($Sql)){
	$data[] = $sq[data].'/'.$sq[mes];
    	$aobra[] = $sq[aobra]*$sq[porcem];
  	$amanutencao[] = $sq[amanutencao]*$sq[porcem];
  	$adisponivel[] = $sq[adisponivel]*$sq[porcem];	
	$aob[] = $sq[aob]*$sq[porcem];
    
}
mysql_free_result($Sql);

//array_reverse($data);

include_once( 'open-flash-chart/ofc-library/open-flash-chart.php' );
$g = new graph();
$g->title( 'Ultimos 7 dias - Acessorio', '{font-size: 14px;}' );
$g->bg_colour = '#FFFFFF';
$g->set_data(array_reverse($aobra));
$g->line_hollow( 2, 4, '#20558a', 'Obra', 10 );

$g->set_data(array_reverse($amanutencao));
$g->line_hollow( 2, 4, '#009661', 'Manutencao', 10 );

$g->set_data(array_reverse($adisponivel));
$g->line_hollow( 2, 4, '#C79810', 'Disponivel', 10 );

$g->set_data(array_reverse($aob));
$g->line_hollow( 2, 4, '#d01f3c', 'Ob', 10 );
// label each point with its value
$g->set_x_labels(array_reverse($data));
$g->set_tool_tip( '#val#%' );
// set the Y max
$g->set_y_max(100);
// label every 20 (0,20,40,60)
$g->y_label_steps(6);

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
