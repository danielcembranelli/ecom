<? 
include('../Config.php');

$SqlAditivo = mysql_query("SELECT arquivoPa, nomePa FROM proposta_arquivos where idPa='".$_REQUEST[ID]."'");
$sA = mysql_fetch_array($SqlAditivo);


header('Content-type: application/vnd.ms-excel');
//header('Content-Disposition: attachment; filename="ESCAD_'.base64_decode($_REQUEST[p]).'-'.date('Y').'.doc"');
echo $sA[arquivoPa];
?>

