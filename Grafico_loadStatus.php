<?php
include("config.php");
// generate some random data
srand((double)microtime()*1000000);

$data = array();
$links = array();
$label = array();
$Sql = mysql_query("SELECT E.ativo, D.labelDesc, count(*) as valor, (100/(Select count(*) from equipamento where excluido='n'))*count(*) as total FROM hostplaz_escad.equipamento E inner join hostplaz_escad.desc_status D on (D.ativoDesc=E.ativo) where excluido='n' group by ativo");

while ($sq = mysql_fetch_array($Sql)){
	$label[] = $sq[labelDesc];
    $data[] = $sq[total];
    $links[] = "javascript:ListAtivo('$sq[ativo]')";
}
mysql_free_result($Sql);
include_once( 'open-flash-chart/ofc-library/open-flash-chart.php' );
$g = new graph();

$g->bg_colour = '#FFFFFF';
$g->pie(60,'#FFFFFF','{display:none;}',false,1);
//
// pass in two arrays, one of data, the other data labels
//
$g->pie_values( $data, $label, $links );
//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
$g->pie_slice_colours( array('#d01f3c','#C79810','#009661','#20558a','#356aa0') );
$g->set_tool_tip( 'Frota em #x_label#<br>Qtde: #val#%' );

echo $g->render();
?>
