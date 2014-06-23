<?php
include("config.php");
// generate some random data
srand((double)microtime()*1000000);

$data = array();
$obra = array();
$manutencao = array();
$disponivel = array();
$ob = array();
$link = array();

$Sql = mysql_query("SELECT dia, ano, mes, AVG(obra) as obra, AVG(manutencao) as manutencao, AVG(disponivel) as disponivel,AVG(ob) as ob, (100/(AVG(obra)+AVG(manutencao)+AVG(disponivel)+AVG(ob))) as porcem FROM dip_diaria_geral d group by ano, mes order by dia desc Limit 12;");

while ($sq = mysql_fetch_array($Sql)){
	$data[] = $sq[mes].'/'.$sq[ano];
    $obra[] = $sq[obra]*$sq[porcem];
    $manutencao[] = $sq[manutencao]*$sq[porcem];
    $disponivel[] = $sq[disponivel]*$sq[porcem];	
    $ob[] = $sq[ob]*$sq[porcem];
    $links[] = "javascript:AbreRelatorio('$sq[mes]-$sq[ano]');";
}
mysql_free_result($Sql);
include_once( 'open-flash-chart/ofc-library/open-flash-chart.php' );
$g = new graph();
$g->title( 'Ultimos 12 Meses', '{font-size: 14px;}' );
$g->bg_colour = '#FFFFFF';
$g->set_data(array_reverse($obra));
$g->set_links(array_reverse($links));
$g->line_hollow( 2, 4, '#CC3399', 'Obra', 10 );

$g->set_data(array_reverse($manutencao));
$g->set_links(array_reverse($links));
$g->line_hollow( 2, 4, '0x80a033', 'Manutencao', 10 );

$g->set_data(array_reverse($disponivel));
$g->set_links(array_reverse($links));
$g->line_hollow( 2, 4, '#C79810', 'Disponivel', 10 );

$g->set_data(array_reverse($ob));
$g->set_links(array_reverse($links));
$g->line_hollow( 2, 4, '#356aa0', 'Ob', 10 );
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
