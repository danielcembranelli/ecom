<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script>
function Remove(frase){
$.post("ListaEmailE.php",{PALAVRA:frase}, function(data){
	alert('Sucesso!');
});
}
</script>
<form id="form1" name="form1" method="post" action="ListaEmail.php">
  <label>Excluir Palavra&nbsp;<input type="text" name="PALAVRA" /> </label>
  <input type="submit" name="button" id="button" value="Submit" />
</form>

<?
include("Config.php");
$i=1;

function exclusoes($FRASE){
	$retorno=1;
	$sqlConsulta = mysql_query("SELECT stringLf FROM lib_filtros") or die ("Could not connect to database: ".mysql_error());
	while($c = mysql_fetch_array($sqlConsulta)){
		if(stristr($FRASE,$c[stringLf])) {
       		$retorno=0;
		}
	}
	return $retorno;
}
if($_POST[PALAVRA]!=''){
	$SqlInsert = mysql_query("Insert into `lib_filtros` (stringLf) Values ('".$_POST[PALAVRA]."')") or die (mysql_error());
}
$Sql = mysql_query("SELECT emailCe, idCe FROM contatos_email where statusCe='A' order by idCe desc;") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	if(exclusoes($dom[emailCe])){
		$a = explode('@',$dom[emailCe]);
	echo $i++.' - '.$dom[emailCe].' <a href=javascript:Remove("'.$dom[emailCe].'")>excluir e-mail</a>     <a href=javascript:Remove("'.$a[1].'")>excluir dominio</a><br>';
	} else {
		$SqlInsert = mysql_query("Update `contatos_email` set statusCe='E' where idCe='".$dom[idCe]."' Limit 1;") or die (mysql_error());
	}
	//echo $data = CalculaDias($dom[tipoprevisaoProposta],$dom[dtini],$dom[previsaoProposta]);
	
	//echo $dom[dtini].' '.CalculaDias($dom[tipoprevisaoProposta],$dom[dtini],$dom[previsaoProposta]).'<br>';
	//if($dom[dtini]!='00/00/0000'){
		//$AlteraDataInicio = mysql_query("Update contatos set nextelContato='".$dom[nrfone2]."', dddfone2='', nrfone2='' where idContato='".$dom[idContato]."'");
	//}
}

?>
<br /><br />

