<?

function addEmail($Nome,$Email){
set_time_limit(500);

$Nome = str_replace("'","",$Nome);
$Nome = str_replace('"',"",$Nome); 

	$sql_addEmail = mysql_query("Insert into cadastro (`emailCadastro`,`nomeCadastro`, `dtCadastro`, `idUsuario`) values ('$Email','$Nome',NOW(),'$_SESSION[idUsuario]')") or die (mysql_error());
	
	return $sql_addEmail;
}

function addEmailEnvio($idCadastro,$idMensagem){
set_time_limit(500);
	$sql_addEmailEnvio = mysql_query("Insert into envio (`cadastro_idCadastro`,`mensagem_idMensagem`, `dtcadEnvio`, `idUsuario`) values ('$idCadastro','$idMensagem',NOW(),'$_SESSION[idUsuario]')") or die (mysql_error());
	
	return $sql_addEmailEnvio;
}
function viewEmail($idEnvio){
	$sql_viewEmail = mysql_query("Update envio set dtshowEnvio=NOW(), qtdashowEnvio=qtdashowEnvio+1, statusEnvio='E' where idEnvio='".hexdec($idEnvio)."' Limit 1") or die (mysql_error());
	
	return $sql_viewEmail;
}

function updateEnvioEmail($idEnvio){
	$sql_viewEmail = mysql_query("Update envio set dtsendEnvio=NOW(), statusEnvio='S' where idEnvio='$idEnvio' Limit 1") or die (mysql_error());
	
	return $sql_viewEmail;
}
/* Funчуo Altera o Status do E-mail com erro ao enviar*/
function updateEnvioEmailFalha($idEnvio){
	$sql_viewEmail = mysql_query("Update envio set statusEnvio='F' where idEnvio='$idEnvio' Limit 1") or die (mysql_error());
	
	return $sql_viewEmail;
}
/*Funчуo Altera o Ststus do E-mail enviado*/
function updateEmailFalha($idEnvio){
	$sql_viewEmail = mysql_query("Update envio, cadastro set envio.statusEnvio='F' where cadastro.idCadastro=envio.cadastro_idCadastro And cadastro.emailCadastro='$idEnvio' And envio.mensagem_idMensagem=1") or die (mysql_error());
	
	return $sql_viewEmail;
}
/*Funчуo de Remoчуo de Cadastro*/
function trashCadastro($idEnvio){

	$sql = mysql_query("Update envio, cadastro set cadastro.statusCadastro='T', cadastro.dtstatusCadastro=NOW() where cadastro.idCadastro=envio.cadastro_idCadastro And cadastro.emailCadastro='$idEnvio'") or die (mysql_error());
	return $sql;

}

function cancelLista($varID){
	$sql = mysql_quey("Update lista set statusLista='E', dtstatusLista=NOW() where idLista='".$varID."' Limit 1") or die (mysql_error());
	$sql = mysql_query("Update cadastrolista set statusCadLis='E', dtstatusCadLis=NOW() where lista_idLista='".$varID."' Limit 1") or die (mysql_error());
	return $sql;
}
/* Function de Formataчуo do E-mail*/
function SendEmail($SubjectEmail,$RemetenteMensagem,$EmailMensagem,$EmailResposta,$Leitura,$htmlMensagem,$keyEmail,$NomeEmail,$EnderecoEmail){
	
	/*Altera Simbolos*/
	$SubjectEmail = str_replace("%%KEY%%",dechex($keyEmail),$SubjectEmail);
	$htmlMensagem = str_replace("%%KEY%%",dechex($keyEmail),$htmlMensagem);
	
	/*Header do E-mail*/
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Subject: ".$SubjectEmail."\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	$headers .= "From:".$RemetenteMensagem." <".$EmailMensagem.">\n";
	$headers .= "Return-Path: marketing@escad.com.br\n";
	$headers .= "X-Mailer: Emarketing\n";
	$headers .= "Emarketing: [#".dechex($keyEmail)."]\n";
	$headers .= "Reply-To:".$EmailResposta."\n";
	$headers .= "Content-Language: pt-br\n";
	if($Leitura=='1'){
		$headers .= "Disposition-Notification-To: ".$EmailMensagem."\n";
	}
	$headers .= "Importance: normal\n";
	$headers .= "Priority: normal\n";
	ini_set("sendmail_from","mapaes@mapaes.escad.com.br");
	return mail($EnderecoEmail,$SubjectEmail,$htmlMensagem,$headers);
}

/* Function de Cadastro de E-mail em Lista*/
function addEmailLista($varCadastro, $varLista){
	$sql = mysql_query("Insert into cadastrolista (`cadastro_idCadastro`,`lista_idLista`, `dtCadLis`, `idUsuario`) values ('$varCadastro', '$varLista',NOW(),'$_SESSION[idUsuario]')") or die (mysql_error());
	return $sql;
}

/* Function Exclusуo de E-mail em Lista*/
function cancelEmailLista($varId){
	$sql = mysql_query("Update cadastrolista set statusCadLis='E', dtstatusCadLis=NOW() where idCadlis='".$varId."' Limit 1") or die (mysql_error());
	return $sql;
}

/* Function de Cadastro de Lista*/
function addLista($varNome,$varDescricao){
	$sql = mysql_query("Insert into lista (`nomeLista`,`descLista`, `dtcadLista`, `idUsuario`) values ('$varNome','$varDescricao',NOW(),'$_SESSION[idUsuario]')") or die (mysql_error());
	return $sql;
}
/*Funчуo de Ediчуo da Lista*/
function editLista($varID,$varNome,$varDescricao){
	$sql = mysql_quey("Update lista set nomeLista='$varNome', descLista='$varDescricao', dtstatusLista=NOW() where idLista='$varID' Limit 1") or die (mysql_error());
	return $sql;
	
}
/* Function de Cadastro de Lista*/
function addCampanha($varNome,$varDescricao){
	$sql = mysql_query("Insert into campanha (`nomeCampanha`,`descCampanha`, `dtCampanha`) values ('$varNome','$varDescricao',NOW(),'$_SESSION[idUsuario]')") or die (mysql_error());
	return $sql;
}
/*Funчуo de Ediчуo da Lista*/
function editCampanha($varID,$varNome,$varDescricao){
	$sql = mysql_quey("Update lista set nomeLista='$varNome', descLista='$varDescricao', dtstatusLista=NOW() where idLista='$varID' Limit 1") or die (mysql_error());
	return $sql;
	
}
function addCadastro($Nome,$Email,$Sobrenome,$Nascimento,$Sexo,$Empresa,$Departamento,$Cargo,$CPF,$RG,$Residencial,$Comercial,$Celular,$Endereco,$Nr,$Complemento,$Bairro,$Cidade,$UF,$Cep,$Email2,$EmailComercial,$OBS){

$Nome = str_replace("'","",$Nome);
$Nome = str_replace('"',"",$Nome); 
$OBS=nl2br($OBS);

	$sql_addEmail = mysql_query("Insert into cadastro (`emailCadastro`,`nomeCadastro`, `dtCadastro`,`sobrenomeCadastro`, `dtnascimentoCadastro`, `sexoCadastro`,`empresaCadastro`, `departamentoCadastro`, `cargoCadastro`, `idUsuario`, `cpfCadastro`, `rgCadastro`, `telresCadastro`, `telcomCadastro`, `telcelCadastro`, `enderecoCadastro`, `nrCadastro`, `complementoCadastro`, `bairroCadastro`, `cidadeCadastro`, `ufCadastro`, `cepCadastro`, `email2Cadastro`, `emailcomercialCadastro`, `obsCadastro`) values ('$Email','$Nome',NOW(),'$Sobrenome', '$Nascimento', '$Sexo', '$Empresa', '$Departamento', '$Cargo','$_SESSION[idUsuario]','$CPF','$RG','$Residencial','$Comercial','$Celular','$Endereco','$Nr','$Complemento','$Bairro','$Cidade','$UF','$Cep','$Email2','$EmailComercial','$OBS')") or die (mysql_error());
	
	return $sql_addEmail;
}
function editCadastro($Nome,$Email,$Sobrenome,$Nascimento,$Sexo,$Empresa,$Departamento,$Cargo,$CPF,$RG,$Residencial,$Comercial,$Celular,$Endereco,$Nr,$Complemento,$Bairro,$Cidade,$UF,$Cep,$Email2,$EmailComercial,$OBS,$Id){

$Nome = str_replace("'","",$Nome);
$Nome = str_replace('"',"",$Nome); 
$OBS=nl2br($OBS);

	$sql_addEmail = mysql_query("Update cadastro set `emailCadastro`='$Email',`nomeCadastro`='$Nome', `sobrenomeCadastro`='$Sobrenome', `dtnascimentoCadastro`='$Nascimento', `sexoCadastro`='$Sexo',`empresaCadastro`='$Empresa', `departamentoCadastro`='$Departamento', `cargoCadastro`='$Cargo', `cpfCadastro`='$CPF', `rgCadastro`='$RG', `telresCadastro`='$Residencial', `telcomCadastro`='$Comercial', `telcelCadastro`='$Celular', `enderecoCadastro`='$Endereco', `nrCadastro`='$Nr', `complementoCadastro`='$Complemento', `bairroCadastro`='$Bairro', `cidadeCadastro`='$Cidade', `ufCadastro`='$UF', `cepCadastro`='$Cep', `email2Cadastro`='$Email2',`emailcomercialCadastro`='$EmailComercial', `obsCadastro`='$OBS', `dtstatusCadastro`=NOW() where `idCadastro`='$Id'") or die (mysql_error());
	
	return $sql_addEmail;
}
function cancelCadastro($Id){

$Nome = str_replace("'","",$Nome);
$Nome = str_replace('"',"",$Nome); 

	$sql_addEmail = mysql_query("Update cadastro set `statusCadastro`='T', `dtstatusCadastro`=NOW() where `idCadastro`='$Id'") or die (mysql_error());
	$sql_addEmail = mysql_query("Update cadastrolista set statusCadLis='T', dtstatusCadLis=NOW() where cadastro_idCadastro='".$Id."' Limit 1") or die (mysql_error());
	
	return $sql_addEmail;
}
function CriarMensagem($Identificador, $Descricao, $Subject, $Remetente, $Email, $Resposta, $HTML, $Campanha, $Leitura){

	$sql = mysql_query("Insert into mensagem (`identificadorMensagem`, `descMensagem`, `subjectMensagem`, `remetenteMensagem`, `emailMensagem`, `emailrespostaMensagem`, `htmlMensagem`, `campanha_idCampanha`, `leituraMensagem`, `dtMensagem`, `idUsuario`) values ('$Identificador', '$Descricao', '$Subject', '$Remetente', '$Email', '$Resposta', '$HTML', '$Campanha', '$Leitura', NOW(),'$_SESSION[idUsuario]');") or die (mysql_error());

	return $sql;

}

function EditarMensagem($Identificador, $Descricao, $Subject, $Remetente, $Email, $Resposta, $HTML, $Campanha, $Leitura,$id){

	$sql = mysql_query("Update mensagem set `identificadorMensagem`='$Identificador', `descMensagem`='$Descricao', `subjectMensagem`='$Subject', `remetenteMensagem`='$Remetente', `emailMensagem`='$Email', `emailrespostaMensagem`='$Resposta', `htmlMensagem`='$HTML', `campanha_idCampanha`='$Campanha', `leituraMensagem`='$Leitura', `dtstatusMensagem`=NOW() where idMensagem='$id' Limit 1;") or die (mysql_error());

	return $sql;

}
function updateStatusMensagem($varId,$varStatus){
	$sql = mysql_query("Update mensagem set statusMensagem='$varStatus', dtstatusMensagem=NOW() where idMensagem='$varId' Limit 1") or die (mysql_error());
	return $sql;
}
function updateStatusFila($varId,$varStatus){
	$sql = mysql_query("Update envio set statusEnvio='$varStatus' where idEnvio='$varId' Limit 1") or die (mysql_error());
	return $sql;
}
function nameStatus($name){

	switch ($name) {
		case 'R' : $retorno = "Rascunho";break;
		case 'F' : $retorno = "Fila";break;
		case 'E' : $retorno = "Enviado";break;
		case 'T' : $retorno = "Cancelada";break;
	}
	
	return $retorno;
}
function envioStatus($name){

	switch ($name) {
		case 'W' : $retorno = "Fila";break;
		case 'S' : $retorno = "Enviado";break;
		case 'V' : $retorno = "Visualizado";break;
		case 'T' : $retorno = "Cancelado";break;
		case 'F' : $retorno = "Erro";break;
	}
	
	return $retorno;
}
?>