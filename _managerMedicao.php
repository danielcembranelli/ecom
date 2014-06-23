<script>
function ConfirmaDel(valor)
{
var r=confirm("Você confima a exclusão?")
if (r==true)
  {
	window.location.replace("index.php?_m=form&_a=managerMedicao&step=3&id="+valor)
  }
  
}
</script>

<style>
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
</style>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=core&_a=managerMedicao" title="Manager Medição">Manager Medição</a></span></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr height="1">
						<td colspan="2" bgcolor="#CCCCCC"><img src="themes/admin_default/space.gif" height="1" width="1"></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr>
						<td colspan="2"><span class="smalltext"></span></td>
					</tr>

					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td colspan="2">
<? 


if($_POST[step]=='1'){


	$insereFamilia = mysql_query("Insert into medicao (idProposta, dtMedicao, tipoMedicao, vlhoraseqptoMedicao, vlcustoMedicao, vldescontoMedicao, hrvendidasMedicao, dtvencimentoMedicao, nrnotafiscalMedicao, idUsuario, inicioMedicao, finalMedicao, idFilial, dtnotafiscalMedicao) VALUES ('".$_POST[idProposta]."',NOW(),'".$_POST[TIPOMEDICAO]."','".$_POST[vltotalHoras]."','".$_POST[vltotalCusto]."','".$_POST[vltotalDesconto]."','".$_POST[horasvendidas]."','".dataSql($_POST[dtvencimento])."','".$_POST[nrnotafiscal]."','".$dl[id]."','".dataSql($_POST[dtinicio])."','".dataSql($_POST[dtfinal])."','".$_POST[idFilial]."','".dataSql($_POST[dtnotafiscal])."')") or die (mysql_error());
	
	$IdMedicao=mysql_insert_id();
	
for($i=0;$i<count($_POST[idMtc]);$i++){
	
	$_POST[vlRtc][$i] = str_replace('.','',$_POST[vlRtc][$i]);
	$_POST[vlRtc][$i] = str_replace(',','.',$_POST[vlRtc][$i]);
	$i = mysql_query("Insert into medicao_valores (tipoMv, vlMv, descricaoMv, opcaoMv, idMedicao) values ('".$_POST[idMtc][$i]."','".$_POST[vlRtc][$i]."','".$_POST[textoRtc][$i]."','C','".$IdMedicao."')");	
}

for($i=0;$i<count($_POST[idRtd]);$i++){
	$_POST[vlRtd][$i] = str_replace('.','',$_POST[vlRtd][$i]);
	$_POST[vlRtd][$i] = str_replace(',','.',$_POST[vlRtd][$i]);
	$i = mysql_query("Insert into medicao_valores (tipoMv, vlMv, descricaoMv, opcaoMv, idMedicao) values ('".$_POST[idRtd][$i]."','".$_POST[vlRtd][$i]."','".$_POST[textoRtd][$i]."','D','".$IdMedicao."')");	
}

for($i=0;$i<count($_POST[idMe]);$i++){
	$e = mysql_query("Update medicao_equipamento set idMedicao='".$IdMedicao."' where idMe='".$_POST[idMe][$i]."'") or die (mysql_error());
}
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Medição cadastrada com sucesso! <a href="/Medicao/?p=<?=base64_encode($IdMedicao)?>" target="_blank" title="Gerar Medição">Imprimir</a></span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_POST[step]=='2'){

		//Data de Nascimento
	$nF = explode("#",$_POST[idCliente]);
	//Verifica Paciente
	$dt = explode("/",$_POST[dtinicio]);
	$dtini=$dt[2].'-'.$dt[1].'-'.$dt[0];
	$cDias = CalculaDias($_POST[tipoprevisao],$_POST[dtinicio],$_POST[previsao]);
	$insereFamilia = mysql_query("Update proposta set tipoProposta='".$_POST[tipoProposta]."',validadeProposta='".$_POST[validade]."', idCliente='".$nF[0]."', idVendedor='".$_POST[idVendedor]."', idFilial='".$_POST[idFilial]."',descricaoObra='".nl2br($_POST[endereco])."', contatoProposta='".$_POST[contato]."',idContato='".$_POST[idContato]."' ,statusMedicao='".$_POST[statusMedicao]."', obsgeraisProposta='".nl2br($_POST[OBSGERAL])."', dtiniProposta='".$dtini."', previsaoProposta='".$_POST[previsao]."', tipoprevisaoProposta='".$_POST[tipoprevisao]."', dtprevisaoProposta='".$cDias."' where idProposta = '".$_POST[id]."'") or die (mysql_error());
	
	$IdProposta=$_POST[id];
	
	for($i=0;$i<count($_POST[clauleg]);$i++){
		if($_POST[clauid][$i]!=0){
	
		if($_POST[ID_CLAU][$i]==''){
	
	$sqlClausula = mysql_query("Insert into proposta_clausula (idProposta,idLegenda,idClausula,textoPc) VALUES ('".$IdProposta."','".$_POST[clauleg][$i]."','".$_POST[clauid][$i]."','".nl2br($_POST[clautext][$i])."')") or die (mysql_error());
	
		} else {
			if($_POST[clautext][$i]==''){
				$sqlClausula = mysql_query("Delete from proposta_clausula where idPc='".$_POST[ID_CLAU][$i]."'Limit 1") or die (mysql_error());
			} else {
				$sqlClausula = mysql_query("Update proposta_clausula set idClausula='".$_POST[clauid][$i]."',textoPc='".nl2br($_POST[clautext][$i])."' where idPc='".$_POST[ID_CLAU][$i]."'Limit 1") or die (mysql_error());
			}
		}
		}
		

	}


for($i=0;$i<count($_POST[IDFAMILIA]);$i++){
		
		if($_POST[IDPE][$i]==''){

		if($_POST[PRECO][$i]==0){
			$_POST[PRECO][$i] = $_POST[PRECO_O][$i];
						
		}
		if($_POST[COMBUSTIVEL][$i]!='S'){
			$_POST[COMBUSTIVEL][$i]='N';
		}
		
		$PRECO = str_replace('.','',$_POST[PRECO][$i]);
		$PRECO = str_replace(',','.',$PRECO);
		
		$vCOMBUSTIVEL = str_replace('.','',$_POST[COMBUSTIVEL_V][$i]);
		$vCOMBUSTIVEL = str_replace(',','.',$vCOMBUSTIVEL);
		
		if($_POST[OPERADOR][$i]!='S'){
			$_POST[OPERADOR][$i]='N';
		}
		
		$vOPERADOR = str_replace('.','',$_POST[OPERADOR_V][$i]);
		$vOPERADOR = str_replace(',','.',$vOPERADOR);
		
		if($_POST[SEGURO][$i]!='S'){
			$_POST[SEGURO][$i]='N';
		}
		
		$vSEGURO = str_replace('.','',$_POST[SEGURO_V][$i]);
		$vSEGURO = str_replace(',','.',$vSEGURO);
		
		$vFRETE = str_replace('.','',$_POST[FRETE][$i]);
		$vFRETE = str_replace(',','.',$vFRETE);
		
		$vFRETED = str_replace('.','',$_POST[FRETED][$i]);
		$vFRETED = str_replace(',','.',$vFRETED);		
		
		$sqlClausula = mysql_query("Insert into proposta_equipamento (idProposta, idFamilia, precoPe, combustivelPe, valorcombustivelPe, operadorPe, valoroperadorPe, seguroPe, valorseguroPe, fretePe, qtdaPe, fretedPe) VALUES ('".$IdProposta."','".$_POST[IDFAMILIA][$i]."','".$PRECO."','".$_POST[COMBUSTIVEL][$i]."','".$vCOMBUSTIVEL."','".$_POST[OPERADOR][$i]."','".$vOPERADOR."','".$_POST[SEGURO][$i]."','".$vSEGURO."','".$vFRETE."','".$_POST[QTDA][$i]."','".$vFRETED."')") or die (mysql_error());
	
		
		} else {
		
			if($_POST[DEL_EQPTO][$i]=='S'){
				
				echo $_POST[IDPE][$i];
				//$sqlClausula = mysql_query("Update proposta_equipamento set statusPe='E' where idPe='".$_POST[IDPE][$i]."'") or die (mysql_error());
				
			} else {		
		
		if($_POST[PRECO][$i]==0){
			$_POST[PRECO][$i] = $_POST[PRECO_O][$i];			
		}
		if($_POST[COMBUSTIVEL][$i]!='S'){
			$_POST[COMBUSTIVEL][$i]='N';
		}
		
		$PRECO = str_replace('.','',$_POST[PRECO][$i]);
		$PRECO = str_replace(',','.',$PRECO);
		
		$vCOMBUSTIVEL = str_replace('.','',$_POST[COMBUSTIVEL_V][$i]);
		$vCOMBUSTIVEL = str_replace(',','.',$vCOMBUSTIVEL);
		
		if($_POST[OPERADOR][$i]!='S'){
			$_POST[OPERADOR][$i]='N';
		}
		
		$vOPERADOR = str_replace('.','',$_POST[OPERADOR_V][$i]);
		$vOPERADOR = str_replace(',','.',$vOPERADOR);
		
		if($_POST[SEGURO][$i]!='S'){
			$_POST[SEGURO][$i]='N';
		}
		
		$vSEGURO = str_replace('.','',$_POST[SEGURO_V][$i]);
		$vSEGURO = str_replace(',','.',$vSEGURO);
		
		$vFRETE = str_replace('.','',$_POST[FRETE][$i]);
		$vFRETE = str_replace(',','.',$vFRETE);		
		
		$vFRETED = str_replace('.','',$_POST[FRETED][$i]);
		$vFRETED = str_replace(',','.',$vFRETED);	
		
				$sqlClausula = mysql_query("Update proposta_equipamento set precoPe='".$PRECO."', combustivelPe='".$_POST[COMBUSTIVEL][$i]."', operadorPe='".$_POST[OPERADOR][$i]."', seguroPe='".$_POST[SEGURO][$i]."', fretePe='".$vFRETE."', fretedPe='".$vFRETED."', qtdaPe='".$_POST[QTDA][$i]."', valorcombustivelPe='".$vCOMBUSTIVEL."', valoroperadorPe='".$vOPERADOR."', valorseguroPe='".$vSEGURO."' where idPe='".$_POST[IDPE][$i]."'") or die (mysql_error());
			}
		}
	
	}
	
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Proposta Cadastrada com Sucesso <? if($dl[statusMedicaoUsuario]=='N'){?>- <a href="/Proposta/?p=<?=base64_encode($IdProposta)?>" target="_blank" title="Gerar Proposta">Imprimir</a><? } ?></span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<? if($_REQUEST[step]=='4'){
	
	$insereFamilia = mysql_query("Update proposta set statusMedicao='C', confirmaProposta=NOW() where idProposta='".$_REQUEST[id]."' Limit 1") or die (mysql_error());
	$IP = InfoProposta($_REQUEST[id],'idCliente');
	
	$AC = mysql_query("Update clientes set idPropostaC='".$_REQUEST[id]."', expiraCliente='N', Cli_Status='A', dtCli_Status=NOW() where Cli_ID = '".$IP[0]."' Limit 1") or die ('ERRO AC:'.mysql_error());
	statusMedicao($_REQUEST[id],'C','Confirmação de Proposta no Sistema');

if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Proposta Confirmada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<? if($_REQUEST[step]=='5'){
	
	$insereFamilia = mysql_query("Update proposta set statusMedicao='F', concluiProposta=NOW() where idProposta='".$_REQUEST[id]."' Limit 1") or die (mysql_error());
	
	$IP = InfoProposta($_REQUEST[id],'idCliente');
	$dtExpira = date("Y-m-d",mktime (0,0,0,date("m"),date("d")+180,date("Y")));
	
	$AC = mysql_query("Update clientes set expiraCliente='S', dtexpiraCliente='".$dtExpira."' where Cli_ID = '".$IP[0]."' Limit 1") or die ('ERRO AC:'.mysql_error());
	
	statusMedicao($_REQUEST[id],'F','Finalização de Proposta no Sistema');

if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Proposta Concluida com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_POST[step]=='6'){
	
	$insereFamilia = mysql_query("Update medicao set statusMedicao='N', dtaprovacaoMedicao=NOW(), idContato='".$_POST[idContato]."', dtnotafiscalMedicao='".dataSql($_POST[dtnotafiscal])."', nrnotafiscalMedicao='".$_POST[nrnotafiscal]."', dtvencimentoMedicao='".$_POST[dtvencimento]."', dtvencimentoMedicao='".dataSql($_POST[dtvencimento])."', idFilial='".$_POST[idFilial]."' where idMedicao='".$_POST[idMedicao]."' Limit 1") or die (mysql_error());
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Medição Aprovada com Sucesso!</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<? if($_POST[step]=='7'){
	
	$insereFamilia = mysql_query("Update medicao set statusMedicao='F',  dtpagamentoMedicao='".dataSql($_POST[dtpagamento])."' where idMedicao='".$_POST[idMedicao]."' Limit 1") or die (mysql_error());
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Medição Baixada com Sucesso!</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<? if($_REQUEST[step]=='3'){
	
	$insereFamilia = mysql_query("Update medicao set statusMedicao='T' where idMedicao='".$_REQUEST[id]."' Limit 1") or die (mysql_error());
	$insereFamilia = mysql_query("Update medicao_equipamento set idMedicao='0' where idMedicao='".$_REQUEST[id]."'") or die (mysql_error());
	//statusMedicao($_REQUEST[id],'T','Exclusão de Proposta no Sistema');
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Medição Apagada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<?
//SESSION PESQUISA FILTRO
if($_POST[statusMedicao]!=''){
	if($_SESSION[buscaproposta][statusMedicao]!=$_POST[statusMedicao]){
			$_SESSION[buscaproposta][statusMedicao]=$_POST[statusMedicao];
	}
}
if($_POST[statusMedicao]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaproposta][statusMedicao]='';
}
if($_SESSION[buscaproposta][statusMedicao]==''){
	$_SESSION[buscaproposta][statusMedicao]='TO';
}

if($_POST[tipoProposta]!=''){
	if($_SESSION[buscaproposta][tipoProposta]!=$_POST[tipoProposta]){
			$_SESSION[buscaproposta][tipoProposta]=$_POST[tipoProposta];
	}
}
if($_POST[tipoProposta]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaproposta][tipoProposta]='';
}
if($_POST[idVendedor]!=''){
	if($_SESSION[buscaproposta][idVendedor]!=$_POST[idVendedor]){
			$_SESSION[buscaproposta][idVendedor]=$_POST[idVendedor];
	}
}
if($_POST[idVendedor]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaproposta][idVendedor]='';
}



if($_POST[idFilial]!=''){
	if($_SESSION[buscaproposta][idFilial]!=$_POST[idFilial]){
			$_SESSION[buscaproposta][idFilial]=$_POST[idFilial];
	}
}
if($_POST[idFilial]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaproposta][idFilial]='';
}

if($_POST[nrProposta]!=''){
	if($_SESSION[buscaproposta][nrProposta]!=$_POST[nrProposta]){
			$_SESSION[buscaproposta][nrProposta]=$_POST[nrProposta];
	}
}
if($_POST[nrProposta]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaproposta][nrProposta]='';
}
if($_POST[dtInicial]!=''){
	if($_SESSION[buscaproposta][dtInicial]!=$_POST[dtInicial]){
			$_SESSION[buscaproposta][dtInicial]=$_POST[dtInicial];
	}
}
if($_POST[dtInicial]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaproposta][dtInicial]='';
}
if($_REQUEST[idCliente]!=''){
	if($_SESSION[buscaproposta][idCliente]!=$_REQUEST[idCliente]){
			$_SESSION[buscaproposta][idCliente]=$_REQUEST[idCliente];
	}
}
if($_REQUEST[idCliente]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaproposta][idCliente]='';
}
if($_POST[dtFinal]!=''){
	if($_SESSION[buscaproposta][dtFinal]!=$_POST[dtFinal]){
			$_SESSION[buscaproposta][dtFinal]=$_POST[dtFinal];
	}
}
if($_POST[dtFinal]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaproposta][dtFinal]='';
}


//echo '||'.$_SESSION[buscaproposta][nrProposta].'||';

?>

						<form name="users" id="users" action="index.php" method="POST">
<input type="hidden" name="_m" value="core"/>
<input type="hidden" name="_a" value="managerMedicao"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder" style="display:none"><tr><td class="highlightpage">Atendimento 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=core&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1">

Status <select name="statusMedicao" class="quicksearch">
<option value="TO" <? if($_SESSION[buscaproposta][statusMedicao]=='TO'){?>selected="selected"<? } ?>>Todos</option>
<option value="A" <? if($_SESSION[buscaproposta][statusMedicao]=='A'){?>selected="selected"<? } ?>>Aguardando Aprovação</option>
<option value="N" <? if($_SESSION[buscaproposta][statusMedicao]=='N'){?>selected="selected"<? } ?>>Em aberto</option>
<option value="L" <? if($_SESSION[buscaproposta][statusMedicao]=='L'){?>selected="selected"<? } ?>>Não Confirmada</option>
<option value="C" <? if($_SESSION[buscaproposta][statusMedicao]=='C'){?>selected="selected"<? } ?>>Confirmada</option>
<option value="F" <? if($_SESSION[buscaproposta][statusMedicao]=='F'){?>selected="selected"<? } ?>>Finalizada</option>
<option value="T" <? if($_SESSION[buscaproposta][statusMedicao]=='T'){?>selected="selected"<? } ?>>Excluida</option>
</select> 

<? if($dl[tipoUsuario]!='V'){?><select name="idVendedor" id="idVendedor" class="quicksearch">
<option value="">Selecione o vendedor</option>
<option value="0" <? if($_SESSION[buscaproposta][idVendedor]=='0'){?>selected="selected"<? } ?>>Todos</option>
<?
if($dl[tipoUsuario]=='G'){
	$Sql = mysql_query("Select l.id, l.nome from login l inner join login_vendedor lv on (lv.idVendedor=l.id) where lv.idUsuario='".$dl[id]."' order by l.nome") or die (mysql_error());
} else {
	$Sql = mysql_query("Select id, nome from login where (statusUsuario='A' And tipoUsuario='A') or (statusUsuario='A' And tipoUsuario='C') or (statusUsuario='A' And tipoUsuario='V') or (statusUsuario='A' And tipoUsuario='G')  order by nome") or die (mysql_error());
}
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($_SESSION[buscaproposta][idVendedor]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } ?>
</select><? } ?>

<? if($dl[tipoUsuario]!='V'){?><select name="idFilial" class="quicksearch">
<option value="">Selecione a filial</option>
<option value="0" <? if($_SESSION[buscaproposta][idFilial]=='0'){?>selected="selected"<? } ?>>Todos</option>
<?


$Sql = mysql_query("Select ID_PATIO, NOME_PATIO from patio order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[ID_PATIO]?>" <? if($_SESSION[buscaproposta][idFilial]==$dom[ID_PATIO]){?>selected="selected"<? } ?>><?=$dom[NOME_PATIO]?></option>
<? } ?>
</select><? } ?>
 &nbsp;Medição Nr. <input type="text" name="nrProposta" value="<?=$_SESSION[buscaproposta][nrProposta]?>" class="quicksearch" /> Filtro de <input type="text" name="dtInicial" value="<?=$_SESSION[buscaproposta][dtInicial]?>" class="quicksearch" /> até <input type="text" name="dtFinal" class="quicksearch" value="<?=$_SESSION[buscaproposta][dtFinal]?>" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

<td class="navpageselected" nowrap style="DISPLAY: none;" ><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Opções">Opções</a></td>
</tr></table></td></tr></table></tr></td>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse;width: 100%; height: 100%;DISPLAY: none;" id="gridtableoptusers"><tr style="height: 1em"><td align="left"><div id="gridoptusers"><ul id="tab"><li><a class="currenttab" href="#" onClick="this.blur(); return switchGridTab('massaction', 'gridoptions')" id="massaction" title="Mass Action">Mass Action</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('search', 'gridoptions')" id="search" title="Advanced Search">Advanced Search</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('settings', 'gridoptions');" id="settings" title="Settings">Settings</a></li></ul></div></td></tr>
<tr style="height: 1em"><td align="left"><div id="tab_massaction" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborder"><tr class="row1"><td align="left" width="60">Action: </td><td align="left"><select name="mass_action" onChange="javascript:return doformConfirm('Are you sure you wish to continue?', this);" class="swiftselect"><option name="firstselect" value="">- Select -</option>
<option value="f2a6c498fb90ee345d997f888fce3b18">Delete</option>
<option value="c4908aca0e352a94cb6207103087070a">Mark as Validated</option>
<option value="6e1de310751f1262fffe196798e21a5d">Mark as Validation Pending</option>
</select></td></tr></table><BR /> </div><div id="tab_search" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" class="tborder" width="100%"><tr class="row1"><td align="left" width="60">Query: </td><td align="left"><input type="text" name="search_query" class="swifttext" /></td></tr><tr class="row2"><td align="left" width="60">Field: </td><td align="left"><select name="search_field" class="swiftselect"><option value="0" selected>Full Name & Email</option>
<option value="1">Full Name</option>
<option value="2">Email</option>
</select></td></tr><tr class="row1"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Search" class="yellowbuttonbig" /></td></tr></table><BR /> </div><div id="tab_settings" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" class="tborder" width="100%"><tr class="row1"><td align="left" width="120">Results Per Page: </td><td align="left"><input type="text" name="set_resultsperpage" value="100" class="swifttext" size="10" /></td></tr><tr class="row2"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Submit" class="yellowbuttonbig" /></td></tr></table><BR /> </div></td></tr></table><table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Proposta</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr>
<td class="tabletitlerow" width="50" align="center" nowrap>&nbsp;Numero</td>
<td class="tabletitlerow" width="50" align="center" nowrap>&nbsp;Proposta</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Vendedor</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Periodo</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Status</td>
<td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>
</tr>            

<? 



$Sql = "SELECT DATE_FORMAT(m.inicioMedicao,'%d/%m/%Y') as dtinicio, DATE_FORMAT(m.finalMedicao,'%d/%m/%Y') as dtfinal, p.descricaoObra, m.idMedicao, DATE_FORMAT(m.dtMedicao,'%d/%m/%Y') as dtmedicao, pa.nome,  m.idProposta, m.statusMedicao, m.tipoMedicao, (m.vlhoraseqptoMedicao+m.vlcustoMedicao+m.vldescontoMedicao) as vlfatura, DATE_FORMAT(m.dtaprovacaoMedicao,'%d/%m/%Y') as dtaprovacao, DATE_FORMAT(m.dtvencimentoMedicao,'%d/%m/%Y') as dtvencimento, c.Cli_Fantasia FROM medicao m inner join proposta p on (p.idProposta=m.idProposta) left join clientes c on (p.idCliente=c.Cli_ID)  left join login pa on (p.idUsuario=pa.id) where";

$nSql = "SELECT p.idProposta FROM medicao m inner join proposta p on (p.idProposta=m.idProposta) left join clientes c on (p.idCliente=c.Cli_ID)  left join login pa on (p.idUsuario=pa.id) where";
$type=0;
	
	if($dl[tipoUsuario]=='G'){
		$i=0;
		$SqlFilial = mysql_query("Select idVendedor from login_vendedor where idUsuario='".$dl[id]."'") or die (mysql_error());
		$nFilial = mysql_num_rows($SqlFilial);
		while($sF = mysql_fetch_array($SqlFilial)){
			$i++;
			$montaWhere .= '(';
	
	
				if($_SESSION[buscaproposta][statusMedicao]=='TO'){
					$montaWhere .= ' m.statusMedicao!="T"';
				} else {
					$montaWhere .= ' m.statusMedicao="'.$_SESSION[buscaproposta][statusMedicao].'"';
				}
				if($dl[tipoUsuario]=='V'){
				$montaWhere.=" And p.idVendedor='".$dl[id]."'";
				}
				
				
				
				if($_SESSION[buscaproposta][idCliente]!=''){
					$montaWhere .= " And p.idCliente='".$_SESSION[buscaproposta][idCliente]."'";
				}
				if($dl[tipoUsuario]=='V'){
				$_POST[idVendedor]=$dl[id];
				//$Sql.="where p.idVendedor='".$dl[id]."'";
				}
				if($_SESSION[buscaproposta][idVendedor]!=''){
					if($_SESSION[buscaproposta][idVendedor]!='0'){
						$montaWhere .= " And p.idVendedor='".$_SESSION[buscaproposta][idVendedor]."'";
						$type = 1;
					}
				}
				if($_SESSION[buscaproposta][idFilial]!=''){
					if($_SESSION[buscaproposta][idFilial]!='0'){
						$montaWhere .= " And p.idFilial='".$_SESSION[buscaproposta][idFilial]."'";
						$type = 1;
					}
				}
				if($_SESSION[buscaproposta][tipoProposta]!=''){
					if($_SESSION[buscaproposta][tipoProposta]!='0'){
						$montaWhere .= " And p.tipoProposta='".$_SESSION[buscaproposta][tipoProposta]."'";
						$type = 1;
					}
				}
				
				if($_POST[dtInicial]!=''){
					
					$dti = explode('/',$_SESSION[buscaproposta][dtInicial]);
					$dtf = explode('/',$_SESSION[buscaproposta][dtFinal]);
					
					$montaWhere .= " And p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
				}
				if($_SESSION[buscaproposta][nrProposta]!=''){
				
					$montaWhere .= " And m.idMedicao Like '%".$_SESSION[buscaproposta][nrProposta]."%'";
				
				}
	
			$montaWhere .= " And p.idVendedor = '".$sF[idVendedor]."'";
			if($i!=$nFilial){
				$montaWhere .= ") or ";
			} else {
				$montaWhere .= ")";
			}
			
		}
		
		
		$SqlFilial = mysql_query("Select idPatio from login_patio where idUsuario='".$dl[id]."'") or die (mysql_error());
		$nFilial = mysql_num_rows($SqlFilial);
		while($sF = mysql_fetch_array($SqlFilial)){
			$i++;
			$montaWhere .= '(';
	
	
				if($_SESSION[buscaproposta][statusMedicao]=='TO'){
					$montaWhere .= ' m.statusMedicao!="T"';
				} else {
					$montaWhere .= ' m.statusMedicao="'.$_SESSION[buscaproposta][statusMedicao].'"';
				}
				if($dl[tipoUsuario]=='V'){
				$montaWhere.=" And p.idVendedor='".$dl[id]."'";
				}
				
				
				
				if($_SESSION[buscaproposta][idCliente]!=''){
					$montaWhere .= " And p.idCliente='".$_SESSION[buscaproposta][idCliente]."'";
				}
				if($dl[tipoUsuario]=='V'){
				$_POST[idVendedor]=$dl[id];
				//$Sql.="where p.idVendedor='".$dl[id]."'";
				}
				if($_SESSION[buscaproposta][idVendedor]!=''){
					if($_SESSION[buscaproposta][idVendedor]!='0'){
						$montaWhere .= " And p.idVendedor='".$_SESSION[buscaproposta][idVendedor]."'";
						$type = 1;
					}
				}
				if($_SESSION[buscaproposta][idFilial]!=''){
					if($_SESSION[buscaproposta][idFilial]!='0'){
						$montaWhere .= " And p.idFilial='".$_SESSION[buscaproposta][idFilial]."'";
						$type = 1;
					}
				}
				if($_SESSION[buscaproposta][tipoProposta]!=''){
					if($_SESSION[buscaproposta][tipoProposta]!='0'){
						$montaWhere .= " And p.tipoProposta='".$_SESSION[buscaproposta][tipoProposta]."'";
						$type = 1;
					}
				}
				
				if($_POST[dtInicial]!=''){
					
					$dti = explode('/',$_SESSION[buscaproposta][dtInicial]);
					$dtf = explode('/',$_SESSION[buscaproposta][dtFinal]);
					
					$montaWhere .= " And p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
				}
				if($_SESSION[buscaproposta][nrProposta]!=''){
				
					$montaWhere .= " And p.idProposta Like '%".$_SESSION[buscaproposta][nrProposta]."%'";
				
				}
	
			$montaWhere .= " And p.idFilial = '".$sF[idPatio]."'";
			if($i!=$nFilial){
				$montaWhere .= ") or ";
			} else {
				$montaWhere .= ")";
			}
			
		}
		
		
		
		} else {
		
		if($_SESSION[buscaproposta][statusMedicao]=='TO'){
					$montaWhere .= ' m.statusMedicao!="T"';
				} else {
					$montaWhere .= ' m.statusMedicao="'.$_SESSION[buscaproposta][statusMedicao].'"';
				}
				if($dl[tipoUsuario]=='V'){
				$montaWhere.=" And p.idVendedor='".$dl[id]."'";
				}
				
				if($_SESSION[buscaproposta][idFilial]!=''){
					if($_SESSION[buscaproposta][idFilial]!='0'){
						$montaWhere .= " And p.idFilial='".$_SESSION[buscaproposta][idFilial]."'";
						$type = 1;
					}
				}
				
				if($_SESSION[buscaproposta][idCliente]!=''){
					$montaWhere .= " And p.idCliente='".$_SESSION[buscaproposta][idCliente]."'";
				}
				if($dl[tipoUsuario]=='V'){
				$_POST[idVendedor]=$dl[id];
				//$Sql.="where p.idVendedor='".$dl[id]."'";
				}
				if($_SESSION[buscaproposta][idVendedor]!=''){
					if($_SESSION[buscaproposta][idVendedor]!='0'){
						$montaWhere .= " And p.idVendedor='".$_SESSION[buscaproposta][idVendedor]."'";
						$type = 1;
					}
				}
				if($_SESSION[buscaproposta][tipoProposta]!=''){
					if($_SESSION[buscaproposta][tipoProposta]!='0'){
						$montaWhere .= " And p.tipoProposta='".$_SESSION[buscaproposta][tipoProposta]."'";
						$type = 1;
					}
				}
				
				if($_POST[dtInicial]!=''){
					
					$dti = explode('/',$_SESSION[buscaproposta][dtInicial]);
					$dtf = explode('/',$_SESSION[buscaproposta][dtFinal]);
					
					$montaWhere .= " And p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
				}
				if($_SESSION[buscaproposta][nrProposta]!=''){
				
					$montaWhere .= " And p.idProposta Like '%".$_SESSION[buscaproposta][nrProposta]."%'";
				
				}
		}
		
		
$montaWhere .= "order by m.idMedicao desc";


//echo '--'.$Sql.$montaWhere.'--';




//Paginação



$numreg = 60; // Quantos registros por página vai ser mostrado
        if (!isset($_REQUEST[pg])) {
                $_REQUEST[pg] = 0;
        }
$inicial = $_REQUEST[pg] * $numreg;
$sqlPaginacao = mysql_query($nSql.$montaWhere) or die ("Could not connect to database: ".mysql_error());;
$quantreg = mysql_num_rows($sqlPaginacao);

$quant_pg = ceil($quantreg/$numreg);

$sqlUsuario = mysql_query($Sql.$montaWhere.' Limit '.$inicial.','.$numreg) or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>


<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=core&_a=viewMedicao&id=<?=$sU[idMedicao]?>"><?=$sU[idMedicao];?></a></td>
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=core&_a=viewMedicao&id=<?=$sU[idMedicao]?>"><?=$sU[idProposta];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=core&_a=viewMedicao&id=<?=$sU[idMedicao]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=core&_a=viewMedicao&id=<?=$sU[idMedicao]?>"><?=$sU[nome];?></a></td>
<td colspan="" align="center">&nbsp;<?=$sU[dtinicio]?> até <?=$sU[dtfinal]?></td>
<td colspan="" align="center"><a href="index.php?_m=core&_a=viewMedicao&id=<?=$sU[idMedicao]?>">
<?
	switch($sU[statusMedicao]){
	case 'A': echo 'Aguardando Aprovação';break;
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'Não Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}
?></a></td>
<td colspan="" align="center"><?=$sU[dtmedicao];?></td>
<td colspan="" width="" align="center" valign=""><a href="index.php?_m=core&_a=viewMedicao&id=<?=$sU[idMedicao]?>" title="Visualizar Medicao">Visualizar</a><? if($sU[statusMedicao]!='A'){?> | <a href="/Medicao/?p=<?=base64_encode($sU[idMedicao])?>" target="_blank" title="Gerar Medição">Imprimir</a> <? if($sU[statusMedicao]=='C'){?>| <a href="javascript:ConfirmaFim('<?=$sU[idMedicao]?>');" title="Conclui">Concluir</a><? } ?><? }?> | <a href="javascript:ConfirmaDel('<?=$sU[idMedicao]?>');" title="Excluir Medição">Excluir</a></td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td align="left">


<table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Medição <?=$_REQUEST[pg]+1?> de <?=$quant_pg?></td>

<!-- <td class='navpageselected'><a href='index.php?_m=core&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>-->
<td>
<select onChange="if(options[selectedIndex].value) window.location.href = (options[selectedIndex].value)" class="quicksearch">

<?
$quant_pg+=2;
for($i_pg=1;$i_pg<($quant_pg-1);$i_pg++) { 
                // Verifica se a página que o navegante esta e retira o link do número para identificar visualmente
                //if ($pg == ($i_pg-1)) { 
                        //echo " <span class=pgoff>[$i_pg]</span> ";
                //} else {
                        //$i_pg2 = $i_pg-1;
                        //echo " <a href=".$PHP_SELF."?pg=$i_pg2 class=pg><b>$i_pg</b></a> ";
                //}
				$a_pg = $i_pg-1;
				if($_REQUEST[pg]==$a_pg){
					$css = 'selected="selected"';
				} else {
					$css = "";
				}
				$a_pg = $i_pg-1;
				//echo "<option><a href='index.php?_m=core&_a=managerMedicao&pg=".$i_pg."' title='Pag. ".$i_pg." of ".$quant_pg."'>".$i_pg."</a></td>";
				echo "<option value='index.php?_m=core&_a=managerMedicao&pg=".$a_pg."' $css>Página ".$i_pg."</option>";
        }
?>
</select>
</td>
<td class='navpage' style="display:none"><a href='index.php?_m=core&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td></tr></table></tr></td>
</tr></td></table>


</form>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

<!-- Open ao não confirmar a proposta -->

<div id="TesteMensagem" style="width:500px; height:150px; position:fixed;z-index:9999; display:none" class="window">
<form name="frTestaMensagem" action="index.php" method="post">
<input type="hidden" name="_m" value="core"/> 
<input type="hidden" name="_a" value="managerMedicao"/> 
<input type="hidden" name="step" value="6"/> 
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Não Confirmação de Proposta</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2">
            

            
        <table border="0" cellpadding="3" cellspacing="1" width="100%">
        
       <!--
        <tr>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Numero</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cliente</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Vendedor</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Status</td>
        <td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
        <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>
        </tr>-->
        <tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Motivo</span></td>
<td align="left" valign="top" colspan="" width="50%">
<select name="idMotivo" id="idVendedor" class="quicksearch">
<option value="">Selecione o motivo</option>
<?


$Sql = mysql_query("Select idMp, labelMp from motivo_proposta order by labelMp") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[idMp]?>"><?=$dom[labelMp]?></option>
<? } ?>
</select><input type="hidden" class="swifttext" name="idProposta" id="txtNome" readonly="readonly" value="<?=$sE[identificadorMensagem]?>" size="50" /></td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td valign="top" colspan="2" align="center"><textarea rows="4" style="width:99%" name="txtMotivo"></textarea></td>
</tr>
     
            
        </table>

            
</td>
</tr>
</tbody>
</table>
<br /><center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Enviar" onclick="EnviaEmail();" />&nbsp;&nbsp;<input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Cancelar" id="cancelar" /></center>
</form>
</div>

 <div id="mask"></div> 
<script>
function EnviaEmail(idProposta){
	var id = document.frTestaMensagem.idMensagem.value;
	var email = document.frTestaMensagem.txtEmail.value;
	$.get("_testeEmail.php",{idMensagem:id,Email:email}, function(data){
	alert(data);
	$('#mask').hide();
	$('.window').hide();
	});
	
	
}
function CancelaProposta(id){
	
	document.frTestaMensagem.idProposta.value=id;
	//document.frTestaMensagem.idMensagem.value=id;
var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});
 
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
		var winH = $(window).height();
		var winW = $(window).width();
              
		$('#TesteMensagem').css('top',  winH/2-$('#TesteMensagem').height()/2);
		$('#TesteMensagem').css('left', winW/2-$('#TesteMensagem').width()/2);
	
		$('#TesteMensagem').fadeIn(2000);
		$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});
	$('#cancelar').click(function () {
		$('#mask').hide();
		$('.window').hide();
	});
	
}
		</script>
<!-- Final do Open ao não confirmar a proposta-->
