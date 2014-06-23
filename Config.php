<?
$sql = mysql_connect("177.52.160.26", "hostplaz_daniel", "]IoK0zd9") or die (mysql_error()); 
mysql_select_db ("hostplaz_escad") or die("não foi possivel");

function dataSql($data){
	$result = explode('/',$data); 
	return  $result[2]."-".$result[1]."-".$result[0];
}

function data($data) {
if($data!='--'){	
$result = explode('-',$data); 
	if(count($result)>1){
		return  "$result[2]/$result[1]/$result[0]";
	} else {
		return '';
	}
} else{
	return '';
}
	
}
function CalculaDias($tipo,$dt,$dias){

	
	$d = explode('/',$dt); 
	if($tipo=='D'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1],$d[0]+$dias,$d[2]));
	}
	if($tipo=='M'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1]+$dias,$d[0],$d[2]));
	}
	if($tipo=='A'){
		$Data = date("Y-m-d",mktime (0,0,0,$d[1],$d[0],$d[2]+$dias));
	}
	return $Data;
	
}
function countIntervaloDias($dtInicio,$dtFinal,$dtInicioCompara,$dtFinalCompara,$Uteis='N'){
	if($dtInicio>$dtInicioCompara){
		$di = explode("-",$dtInicio);
	} else {
		$di = explode("-",$dtInicioCompara);
	}
	if($dtFinal<$dtFinalCompara){
		$df = explode("-",$dtFinal);
	} else {
		$df = explode("-",$dtFinalCompara);
	}
	
	$d1 = mktime(0,0,0,$di[1],$di[2]-1, $di[0]);
	$d2 = mktime(0,0,0,$df[1],$df[2], $df[0]);
	$tempo_unix = $d2-$d1;
	$dias = floor($tempo_unix /(24*60*60));
	if($Uteis=='S'){
		$dias-=countDiasNaoUteis($di[0].'-'.$di[1].'-'.$di[2],$df[0].'-'.$df[1].'-'.$df[2]);
	}
	
	if($dias<0){
		return 0;
	} else {
		return $dias;
	}
}
function countIntervaloMes($dtInicio,$dtFinal){
	//if($dtInicio>$dtInicioCompara){
		$di = explode("-",$dtInicio);
	//} else {
		//$di = explode("-",$dtInicioCompara);
	//}
	//if($dtFinal<$dtFinalCompara){
		$df = explode("-",$dtFinal);
	//} else {
		//$df = explode("-",$dtFinalCompara);
	//}
	$d1 = mktime(0,0,0,$di[1],$di[2], $di[0]);
	$d2 = mktime(0,0,0,$df[1],$df[2], $df[0]);
	$tempo_unix = $d2-$d1;
	$dias = floor($tempo_unix /(24*60*60));
	//echo '<br>';
	$MESES=array();
	$M='';
	$Q=0;
	for($i=0;$i<=$dias;$i++){
	if($M!=date("Y-m",mktime (0,0,0,$di[1],$di[2]+$i, $di[0]))){
		$Q++;
		$MESES[]=date("Y-m",mktime (0,0,0,$di[1],$di[2]+$i, $di[0]));
	}
	$M=date("Y-m",mktime (0,0,0,$di[1],$di[2]+$i, $di[0]));
	//echo "<br>";	
	
		
	}
	
	//if($dias<0){
		//return 0;
	//} else {
		return $MESES;
	//}
}
function countDiasNaoUteis($dtInicio,$dtFinal){
	//if($dtInicio>$dtInicioCompara){
		$di = explode("-",$dtInicio);
	//} else {
		//$di = explode("-",$dtInicioCompara);
	//}
	//if($dtFinal<$dtFinalCompara){
		$df = explode("-",$dtFinal);
	//} else {
		//$df = explode("-",$dtFinalCompara);
	//}
	$d1 = mktime(0,0,0,$di[1],$di[2], $di[0]);
	$d2 = mktime(0,0,0,$df[1],$df[2], $df[0]);
	$tempo_unix = $d2-$d1;
	$dias = floor($tempo_unix /(24*60*60));
	//echo '<br>';
	$MESES=array();
	$M='';
	$Q=0;
	for($i=0;$i<=$dias;$i++){
	if(date("w",mktime (0,0,0,$di[1],$di[2]+$i, $di[0]))=='0' ||date("w",mktime (0,0,0,$di[1],$di[2]+$i, $di[0]))=='6'){
		$Q++;
	}
	//echo "<br>";	
	
		
	}
	
	//if($dias<0){
		//return 0;
	//} else {
		return $Q;
	//}
}
function cortar($frase, $quantidade) {
	$frase = $frase;
    $tamanho = strlen($frase);
    if($tamanho > $quantidade)
        $frase = substr_replace($frase, "...", $quantidade, $tamanho - $quantidade);
    return $frase;
}
function labelStatusProposta($var){
	switch($var){
	case 'A': $a= 'Aguardando Aprovação';break;
	case 'N': $a= 'Em aberto';break;
	case 'L': $a= 'Não Confirmada';break;
	case 'C': $a= 'Confirmada';break;
	case 'F': $a= 'Finalizada';break;
	case 'T': $a= 'Excluida';break;
	}
	return $a;
}
?>