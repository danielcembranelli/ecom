<? 
session_start();
if($_SESSION["StatusLogin"]!='A'){
	$_SESSION[URL] = $_SERVER["SCRIPT_NAME"].'?'.$_SERVER['QUERY_STRING'];
?>
<script>window.location.replace("Login.php")
</script>
<?
}else{

include("Config.php");
include("libEcom.php");
$dados_login = mysql_query("SELECT A.*
FROM login A WHERE A.id = '$_SESSION[idLogin]'
ORDER BY A.nome");
$dl = mysql_fetch_array($dados_login); 


}
 


function datahora($datahora) {
$dh = explode(' ',$datahora);
$result = explode('-',$dh[0]); 
return  $result[2]."/".$result[1]."/".$result[0]." ".$dh[1];
}

function dia_mes($data) {
$result = explode('-',$data); 
return  "$result[2]/$result[1]";
}

function fClass($i)
{
	switch($i)
	{
	case "O": $retorno = "Ótimo";
	case "R": $retorno = "Regular";
	case "P": $retorno = "Problemático";
	}
	
	return $retorno;

}

function legenda($id){
$sqlLegenda = mysql_query("SELECT nomeLegenda FROM legendas where idLegenda = '".$id."' Limit 1") or die ("Could not connect to database: ".mysql_error());
$sL = mysql_fetch_array($sqlLegenda);
return $sL[nomeLegenda];
}

function nomeFamilia($id){
$sqlFamilia = mysql_query("SELECT id, nome,grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where A.id='".$id."' ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
$sF = mysql_fetch_array($sqlFamilia);
return $sF[nome1].' '.$sF[marca].' '.$sF[modelo].' '.$sF[categoria];
}
function StatusProposta($idProposta,$status,$texto){
	return $Sql = mysql_query("Insert into proposta_status (idProposta, idUsuario, statusPs, dtPs, textoPs) Values ('".$idProposta."','".$_SESSION[idLogin]."','".$status."',NOW(),'".nl2br($texto)."')") or die (mysql_error());
}
function InfoProposta($idProposta,$Campo){
	$sqlFamilia = mysql_query("SELECT ".$Campo." from proposta where idProposta='".$idProposta."' Limit 1") or die ("Could not connect to database: ".mysql_error());
return mysql_fetch_array($sqlFamilia);
}
function labelStatusCliente($Status){
switch($Status){
	case 'A': $r= 'Ativo';break;
	case 'I': $r= 'Inativo';break;
	case 'E': $r= 'Excluido';break;
	case 'P': $r= 'Prospecção';break;
	case 'Q': $r= 'Prospecção Prorrogada';break;
	}
	return $r;
}
function EnvioConclusaoDeObra($idProposta){
	$sqlFamilia = mysql_query("SELECT ".$Campo." from proposta where idProposta='".$idProposta."' Limit 1") or die ("Could not connect to database: ".mysql_error());
return mysql_fetch_array($sqlFamilia);
}
function labelTipoRelacionamento($Status){
switch($Status){
	case 'E': $r= 'E-mail';break;
	case 'T': $r= 'Telefonema';break;
	case 'V': $r= 'Visita';break;
	}
	return $r;
}
function labelModoRelacionamento($Status){
switch($Status){
	case 'A': $r= 'ESCAD';break;
	case 'P': $r= 'CLIENTE';break;
	}
	return $r;
}
?>