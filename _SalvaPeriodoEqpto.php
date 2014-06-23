<?
include("Verifica.php");
header("Content-type: application/html;charset=iso-8859-1");
print_r($_POST);
for($i=0;$i<count($_POST[dtMe]);$i++){
	if($_POST[hreqptoMe][$i]!=''){
	echo SalvaHoraMedicao($_POST[dtMe][$i], $_POST[idPe], $_POST[idEo], $_POST[hreqptoMe][$i],$_POST[hroperador1Me][$i],$_POST[hroperador2Me][$i],$_POST[hroperador3Me][$i],$_POST[STATUS]);
	}
}
?>
