<?php
include("Verifica.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true);
// generate some random data
srand((double)microtime()*1000000);

$data = array();
$links = array();
$label = array();

$Sql = "SELECT l.nome, count(*) as total FROM clientes c left join login l on (l.id=c.idVendedor) where DATE_FORMAT(c.dtcadCli,'%Y-%m') = DATE_FORMAT(NOW(),'%Y-%m') group by c.idVendedor;";
$squ = mysql_query($Sql) or die (mysql_error());
while ($sq = mysql_fetch_array($squ)){
	
	$label[] = $sq[nome];
    $data[] = $sq[total];
    $links[] = "javascript:')";
}
mysql_free_result($squ);
include_once( 'open-flash-chart/ofc-library/open-flash-chart.php' );
$g = new graph();

$g->bg_colour = '#FFFFFF';
$g->title( 'Cadastro Novo', '{font-size: 14px;}' );
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
$g->pie_slice_colours( array('#d01f3c','#C79810','#009661','#20558a','#356aa0','#b7a66d','#00ac35','#9e00ac','#ac0069') );
$g->set_tool_tip( '#x_label#<br>Qtde: #val#' );

echo $g->render();
?>
