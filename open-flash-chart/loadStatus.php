<?php

// generate some random data
srand((double)microtime()*1000000);

$data = array();
$links = array();
for( $i=0; $i<5; $i++ )
{
    $val = rand(5,15);
    $data[] = $val;
    $links[] = "javascript:alert('$val')";
}

include_once( 'ofc-library/open-flash-chart.php' );
$g = new graph();

$g->bg = '#E4F0DB';
$g->pie(60,'#E4F0DB','{display:none;}',false,1);
//
// pass in two arrays, one of data, the other data labels
//
$g->pie_values( $data, array('IE','Firefox','Opera','Wii','Other','Slashdot'), $links );
//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
$g->pie_slice_colours( array('#d01f3c','#356aa0','#C79810') );
$g->set_tool_tip( 'Label: #x_label#<br>Value: #val#%' );

$g->title( 'Pie Chart', '{font-size:18px; color: #d01f3c}' );

echo $g->render();
?>
