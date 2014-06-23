<script>
function ConfirmaArquivo(valor)
{
var r=confirm("Excluir arquivo?")
if (r==true)
  {
	window.location.replace("index.php?_m=form&_a=viewProposta&id=<?=$_REQUEST[id]?>&step=4&idPa="+valor)
  }
  
}
function Aprovada(valor)
{
var r=confirm("ATENÇÃO\nVocê aprova a proposta?")
if (r==true)
  {
	window.location.replace("index.php?_m=form&_a=managerProposta&step=7&id="+valor)
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
<?
$sqlProposta = mysql_query("SELECT p.formaProposta, t.nomeContato, p.previsaoProposta, p.tipoprevisaoProposta, p.idProposta, p.validadeProposta, c.Cli_ID,c.Cli_Fantasia, c.Cli_Contato, p.tipoProposta, p.descricaoObra, p.contatoProposta,p.obsgeraisProposta, p.idVendedor, p.idFilial, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini, p.statusProposta, p.txtcancelaProposta FROM proposta p left join clientes c on (p.idCliente=c.Cli_ID) left join contatos t on (t.idContato=p.idContato) where p.idProposta = '".$_REQUEST[id]."'") or die ("Could not connect to database: ".mysql_error());
$sP = mysql_fetch_array($sqlProposta);
?>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="30%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerProposta" title="Manager Proposta">Manager Proposta</a> &raquo; Visualizar Proposta</span></td>
						<td width="70%" align="right">
                        <table>
                        <tr>
                        <? if($sP[statusProposta]=='C'){?><td>
                       <input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Novo Aditivo" onclick="window.location='index.php?_m=form&_a=insertAditivoProposta&id=<?=$_REQUEST[id]?>'" /></td>
                       <? } ?>
                       <? if($sP[statusProposta]!='A'){?>
                       <? if($dl[tipoUsuario]!='V'){?><td> 
                       
                       <input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Status Proposta" onclick="window.open('_statusProposta.php?idProposta=<?=$_REQUEST[id]?>',null,'height=350,width=650,status=yes,toolbar=no,menubar=no,location=no,top=300,left=200,scrollbars=yes')" /></td>
                       <? }?>
                       <td><input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Imprimir" onclick="window.open('/Proposta/?p=<?=base64_encode($_REQUEST[id])?>')" />
                       </td>
                       <? }?>
                       <?
$SqlAditivoM = mysql_query("SELECT idAditivo, nrAditivo, obsgeraisAditivivo FROM proposta_aditivo where idProposta='".$_REQUEST[id]."'") or die (mysql_error());
$NrAditivoM=mysql_num_rows($SqlAditivoM);
if($NrAditivoM==0){?>
                       <td> 
                       
                       <input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Editar" onclick="window.location='index.php?_m=form&_a=editProposta&id=<?=$_REQUEST[id]?>&modulo=editar'" /> </td>
                       <? } else {?>
                       <td>
                       
                       <table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Editar</td>

<!-- <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>-->
<td>
<select onChange="if(options[selectedIndex].value) window.location.href = (options[selectedIndex].value)" class="quicksearch">
<option value="#">Selecione...</option>
<option value="index.php?_m=form&_a=editProposta&id=<?=$_REQUEST[id]?>&modulo=editar">Proposta</option>
<?
while($sAM = mysql_fetch_array($SqlAditivoM)){;
?>
<option value="index.php?_m=form&_a=editAditivoProposta&id=<?=$_REQUEST[id]?>&a=<?=$sAM[nrAditivo]?>">Aditivo <?=$sAM[nrAditivo]?></option>
<? } ?>
</select>
</td>

</tr></table>

</td>
<? } ?>

</tr></table>
</td>
                       
                       </td>
					</tr>
					<tr height="4">
						<td colspan="3"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr height="1">
						<td colspan="3" bgcolor="#CCCCCC"><img src="themes/admin_default/space.gif" height="1" width="1"></td>
					</tr>
					<tr height="4">
						<td colspan="3"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr>
						<td colspan="3"><span class="smalltext"></span></td>
					</tr>

					<tr height="4">
						<td colspan="3"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td colspan="3">
                        
                        

<? 


if($_POST[step]=='1'){

	//Nr Aditivo
	
	$SqlAditivo = mysql_query("SELECT idProposta FROM proposta_aditivo where idProposta='".$_POST[id]."'");
	$NrAditivo=mysql_num_rows($SqlAditivo)+1;

	//Verifica Paciente
	
	$insereFamilia = mysql_query("Insert into proposta_aditivo (idProposta, idUsuario, dtcadAditivo, obsgeraisAditivivo,nrAditivo) VALUES ('".$_POST[id]."','".$_POST[idVendedor]."',NOW(),'".nl2br($_POST[OBSGERAL])."','".$NrAditivo."')") or die (mysql_error());
	
	
	$IdAditivo=mysql_insert_id();
	//StatusProposta($IdProposta,'N','Lançamento de Proposta no Sistema');
	for($i=0;$i<count($_POST[clauleg]);$i++){
		if($_POST[clauid][$i]!=0){
			$sqlClausula = mysql_query("Insert into proposta_clausula (idProposta, idAditivo, idLegenda, idClausula, textoPc) VALUES ('".$_POST[id]."','".$IdAditivo."','".$_POST[clauleg][$i]."','".$_POST[clauid][$i]."','".nl2br($_POST[clautext][$i])."')") or die (mysql_error());
		}
		

	}


for($i=0;$i<count($_POST[IDFAMILIA]);$i++){

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
		
		$sqlClausula = mysql_query("Insert into proposta_equipamento (idProposta,idAditivo, idFamilia, precoPe, combustivelPe, valorcombustivelPe, operadorPe, valoroperadorPe, seguroPe, valorseguroPe, fretePe, qtdaPe) VALUES ('".$_POST[id]."','".$IdAditivo."','".$_POST[IDFAMILIA][$i]."','".$PRECO."','".$_POST[COMBUSTIVEL][$i]."','".$vCOMBUSTIVEL."','".$_POST[OPERADOR][$i]."','".$vOPERADOR."','".$_POST[SEGURO][$i]."','".$vSEGURO."','".$vFRETE."','".$_POST[QTDA][$i]."')") or die (mysql_error());
		
	
	}
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Aditivo Cadastrado com Sucesso - <a href="/Proposta/?p=<?=base64_encode($IdProposta)?>&a=<?=$NrAditivo?>" target="_blank" title="Gerar Proposta">Imprimir</a></span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>




<? if($_POST[step]=='2'){
	
	$insereFamilia = mysql_query("Update proposta_aditivo set obsgeraisAditivivo='".nl2br($_POST[OBSGERAL])."' where idAditivo = '".$_POST[Aditivo]."'") or die (mysql_error());
	
	
	$IdProposta=$_POST[id];
	
	for($i=0;$i<count($_POST[clauleg]);$i++){
		if($_POST[clauid][$i]!=0){
	
		if($_POST[ID_CLAU][$i]==''){
	
	$sqlClausula = mysql_query("Insert into proposta_clausula (idProposta,idLegenda,idClausula,textoPc,idAditivo) VALUES ('".$IdProposta."','".$_POST[clauleg][$i]."','".$_POST[clauid][$i]."','".nl2br($_POST[clautext][$i])."','".$_POST[Aditivo]."')") or die (mysql_error());
	
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
		
		$sqlClausula = mysql_query("Insert into proposta_equipamento (idProposta, idFamilia, precoPe, combustivelPe, valorcombustivelPe, operadorPe, valoroperadorPe, seguroPe, valorseguroPe, fretePe, qtdaPe, idAditivo) VALUES ('".$IdProposta."','".$_POST[IDFAMILIA][$i]."','".$PRECO."','".$_POST[COMBUSTIVEL][$i]."','".$vCOMBUSTIVEL."','".$_POST[OPERADOR][$i]."','".$vOPERADOR."','".$_POST[SEGURO][$i]."','".$vSEGURO."','".$vFRETE."','".$_POST[QTDA][$i]."','".$_POST[Aditivo]."')") or die (mysql_error());
	
		
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
		
		
				$sqlClausula = mysql_query("Update proposta_equipamento set precoPe='".$PRECO."', combustivelPe='".$_POST[COMBUSTIVEL][$i]."', operadorPe='".$_POST[OPERADOR][$i]."', seguroPe='".$_POST[SEGURO][$i]."', fretePe='".$vFRETE."', qtdaPe='".$_POST[QTDA][$i]."', valorcombustivelPe='".$vCOMBUSTIVEL."', valoroperadorPe='".$vOPERADOR."', valorseguroPe='".$vSEGURO."' where idPe='".$_POST[IDPE][$i]."'") or die (mysql_error());
			}
		}
	
	}
	
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Aditivo Editado com Sucesso - <a href="/Proposta/?p=<?=base64_encode($IdProposta)?>" target="_blank" title="Gerar Proposta">Imprimir</a></span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_POST[step]=='3'){
	
	$idCliente = InfoProposta($_POST[idProposta],'idCliente');

if(!file_exists('biblioteca/'.$idCliente[0])){
	mkdir('biblioteca/'.$idCliente[0],0777);
}
if(!file_exists('biblioteca/'.$idCliente[0].'/propostas')){
	mkdir('biblioteca/'.$idCliente[0].'/propostas',0777);
}


					
		$SQL = mysql_query("Insert into proposta_arquivos (textoPa, idUsuario, dtPa, nomePa, idProposta) Values ('".nl2br($_POST[ARQUIVO_DESCRITIVO])."','".$dl[id]."',NOW(),'".$_FILES[ARQUIVO][name]."','".$_POST[idProposta]."')") or die (mysql_error());
	$iA=mysql_insert_id();

	move_uploaded_file($_FILES["ARQUIVO"]["tmp_name"],"biblioteca/".$idCliente[0]."/propostas/".$iA."_".$_FILES[ARQUIVO][name]);

}
if($_REQUEST[step]=='4'){
	
					
		$SQL = mysql_query("Update proposta_arquivos set statusPa='E' where idPa='".$_REQUEST[idPa]."'") or die (mysql_error());
if($SQL){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Arquvio excluido com sucesso!</span></td></tr></table></td></tr></tbody></table><BR />
<? }
}
?>




<? if($sP[statusProposta]=='L'){?>
<table cellpadding="3" cellspacing="0" border="0" width="100%" class="errorbox" style="">
<tbody><tr class="row2">
  <td>

<table width="100%" border="0" cellpadding="6" cellspacing="1" class="rowerror">
<tr>
  <td width="16" align="left" valign="middle" class="errorbox"><img src="themes/admin_default/icon_error.gif" border="0" /></td>
  <td align="left" class="errorbox"><span class="smalltext"><strong>Proposta Não Confirmada</strong><br>
    <?=$sP[txtcancelaProposta]?>
</span></td></tr></table></td></tr></tbody></table><BR />
<? } ?>

<? if($sP[statusProposta]=='N'){?>
<table cellpadding="5" cellspacing="0" border="0" width="100%" style="" class="searchrule1">
<tbody><tr><td>

<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
  <td width="50%" align="left"><span class="smalltext"><span class="tickettextblue"><font size="+2">Confirmar Proposta?</font></span></span>
    </td>
  <td align="center"><input type="button" name="submitbutton2" class="bluebuttonsuperbig" value="Sim" onclick="ConfirmaCon('<?=$sP[idProposta]?>');" /> &nbsp;&nbsp;<input type="button" name="submitbutton2" class="yellowbuttonbigbig" value="Não" onclick="CancelaProposta('<?=$sP[idProposta]?>');" /></td></tr></table></td></tr></tbody></table><BR />
  <? } ?>
  <?
  
  echo $sP[statusProposta].'&&'.$dl[tipoUsuario].'&&'.$dl[statuspropostaUsuario];
  if($dl[statuspropostaUsuario]!='A'){
  if($sP[statusProposta]=='A' && $dl[tipoUsuario]!='V'){
	  ?>
<table cellpadding="5" cellspacing="0" border="0" width="100%" style="" class="searchrule1">
<tbody><tr><td>

<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
  <td width="50%" align="left"><span class="smalltext"><span class="tickettextblue"><font size="+2">Proposta Nova, Aprovar?</font></span></span>
    </td>
  <td align="center"><input type="button" name="submitbutton2" class="bluebuttonsuperbig" value="Aprovar" onclick="Aprovada('<?=$sP[idProposta]?>');" /></td></tr></table></td></tr></tbody></table><BR />
  <? } } ?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Proposta -  Proposta Nº <?=$sP[idProposta]?></td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Cliente</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="idCliente" <? if($_REQUEST[modulo]!='editar'){?> readonly="readonly"<? } ?> id="idCliente" value="<?=$sP[Cli_ID]?>#<?=$sP[Cli_Fantasia]?>" size="30" style="width:90%;" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Filial</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idFilial" id="idFilial">
<?
$Sql = mysql_query("Select ID_PATIO, NOME_PATIO from patio where statusPatio='A' order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[ID_PATIO]?>" <? if($dom[ID_PATIO]==$sP[idFilial]){?>selected="selected"<? } ?>><?=$dom[NOME_PATIO]?></option>
<? } ?>
</select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Vendedor</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idVendedor" id="idVendedor">
<?
if($dl[tipoUsuario]=='V'){
	?>
  <option value="<?=$dl[id]?>" selected="selected"><?=$dl[nome]?></option>
  <?
} else {

$Sql = mysql_query("Select id, nome from login where (statusUsuario='A' And tipoUsuario='A') or (statusUsuario='A' And tipoUsuario='C') or (statusUsuario='A' And tipoUsuario='V')  order by nome") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($sP[idVendedor]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } } ?>
</select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Contato</span></td>
  <td align="left" valign="top" colspan=""><input name="contato" type="text" class="swifttext" value="<? if($sP[nomeContato]==''){?><?=$sP[contatoProposta]?><? } else {?><?=$sP[nomeContato]?><? } ?>" size="30" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Local da Obra</span></td>
<td align="center" valign="top" colspan="" width="50%"><textarea name="endereco" rows="3" style="width:99%" <? if($_REQUEST[modulo]!='editar'){?> readonly="readonly"<? } ?>><?=strip_tags($sP[descricaoObra]);?></textarea></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Início da Obra</span></td>
  <td align="left" valign="top" colspan=""><input name="dtinicio" type="text" class="swifttext" <? if($_REQUEST[modulo]!='editar'){?> readonly="readonly"<? } ?> value="<?=$sP[dtini]?>" size="12" maxlength="10" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="tipoProposta" type="radio" id="radio" value="P" <? if($sP[tipoProposta]=="P"){?>checked="checked"<? } ?> />
  <label for="tipoProposta">Proposta</label> <input type="radio" name="tipoProposta" id="radio2" value="C" <? if($sP[tipoProposta]=="C"){?>checked="checked"<? } ?> />
  <label for="tipoProposta">Contrato</label></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Validade da Proposta</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="validade" type="text" class="swifttext" value="<?=$sP[validadeProposta]?>" size="5" <? if($_REQUEST[modulo]!='editar'){?> readonly="readonly"<? } ?> /> dias</td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Previsão</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="previsao" type="text" class="swifttext" value="<?=$sP[previsaoProposta]?>"  size="5" /> <select name="tipoprevisao" class="swifttext">
<option value="D" <? if($sP[tipoprevisaoProposta]=='D'){?>selected="selected"<? } ?>>Dias</option>
<option value="M" <? if($sP[tipoprevisaoProposta]=='M'){?>selected="selected"<? } ?>>Mês</option>
<option value="A" <? if($sP[tipoprevisaoProposta]=='A'){?>selected="selected"<? } ?>>Ano</option>
</select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Forma</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="formaProposta" type="radio" id="formaPropostaF" <? if($sP[formaProposta]=="F"){?>checked="checked"<? } ?> value="F" checked="checked" />
  <label for="formaPropostaF">Formulário</label> <input type="radio" <? if($sP[formaProposta]=="A"){?>checked="checked"<? } ?> name="formaProposta" id="formaPropostaA" value="A" />
  <label for="formaPropostaA">Arquivo</label></td>
</tr>
</table></td></tr></tbody></table>
<br />
<? if($sP[formaProposta]=='A'){?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Uploads</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
 <?
$sqlClusula = mysql_query("SELECT p.idPa, p.textoPa, l.nome, DATE_FORMAT(p.dtPa,'%d/%m/%Y %H:%i') as dt, p.nomePa FROM proposta_arquivos p left join login l on (l.id=p.idUsuario) where p.idProposta='".$_REQUEST[id]."' And statusPa='A' order by p.dtPa") or die ("Could not connect to database: ".mysql_error());
while ($sC = mysql_fetch_array($sqlClusula)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
$a++;?>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="20%"><span class="tabletitle"><?=$sC[nome]?></span><br /><?=$sC[dt]?><br /><br /><center><a target="_new" href="biblioteca/<?=$sP[Cli_ID]?>/propostas/<?=$sC[idPa]?>_<?=$sC[nomePa]?>">Visualizar</a>&nbsp;|&nbsp;<a href="javascript:ConfirmaArquivo('<?=$sC[idPa]?>')">Excluir</a></center>
</td>
<td align="left" valign="top" colspan="" width="80%">
<textarea name="clautext[]" <? if($_REQUEST[modulo]!='editar'){?> readonly="readonly"<? } ?> rows="4" style="width:99%; height:100%"><?=strip_tags($sC[textoPa])?></textarea></td>
</tr>
<? }?>
</table></td></tr></tbody></table>
<br />
<form name="teamworkAtendimento" action="index.php?_m=form&_a=viewProposta&id=<?=$_REQUEST[id]?>" method="POST" enctype="multipart/form-data">

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Nova Versão</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="20%"><span class="tabletitle">Arquivo</span></td>
<td align="left" valign="top" colspan="" width="80%"><input name="ARQUIVO" class="swifttext" size="60" type="file" /></td>
</tr>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="20%"><span class="tabletitle">Descritivo</span></td>
<td align="left" valign="top" colspan="" width="80%"><textarea name="ARQUIVO_DESCRITIVO" class="swifttext" rows="2" style="width:99%; height:100%"></textarea></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
<input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="viewProposta"/>
<input type="hidden" name="step" value="3"/>
<input type="hidden" name="idProposta" value="<?=$_REQUEST[id]?>"/>
</form>
<? } ?>

<? if($sP[formaProposta]=="F"){?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Condições Comerciais</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
 <?
$sqlClusula = mysql_query("Select pc.idPc, l.nomeLegenda, pc.textoPc FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where idProposta = '".$_REQUEST[id]."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
while ($sC = mysql_fetch_array($sqlClusula)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
$a++;?>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="20%"><span class="tabletitle"><?=$sC[nomeLegenda]?></span><br />
</td>
<td align="left" valign="top" colspan="" width="80%">
<textarea name="clautext[]" <? if($_REQUEST[modulo]!='editar'){?> readonly="readonly"<? } ?> rows="4" style="width:99%; height:100%"><?=strip_tags($sC[textoPc])?></textarea></td>
</tr>
<? }?>
<? $cor = ($coralternada++ %2 ? "row2" : "row1");?>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="20%"><span class="tabletitle">OBSERVAÇÃO</span><br /></td>
<td align="left" valign="top" colspan="" width="80%"><textarea name="OBSGERAL" rows="4" style="width:99%; height:100%"><?=strip_tags($sP[obsgeraisProposta])?></textarea></td>
</tr>
</table></td></tr></tbody></table>
<br />
<?
$dados_login = mysql_query("Select co.pcpadraoCt, co.pcmaiorCt, co.pinf1Ct, co.pinf2Ct, co.pcmedioCt, co.pmenorCt, co.pcmenorCt  from login lo left join comissao_tipo co on (co.idCt=lo.idCt)where lo.id='".$sP[idVendedor]."'") or die (mysql_error());
$sU = mysql_fetch_array($dados_login); 
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Equipamentos</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<? if($_REQUEST[modulo]=='editar'){?>
<td class="tabletitlerow" width="20" align="center" nowrap></td>
<? } ?>
<td class="tabletitlerow" width="250" align="center" nowrap>&nbsp;Equipamento</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Qtda</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Preço</td>
<? if($dl[tipoUsuario]=='A'){?>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Comissão</td>
<? } ?>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Combustivel</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Operador</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Seguro</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Mobilização</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Desmobilização</td>
</tr>
<? $iEsql = mysql_query("Select pr.valor3Preco, pe.fretedPe, pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda)left join preco pr on (pr.idFamilia=A.id) where pe.idProposta = '".$_REQUEST[id]."' And pe.statusPe='A'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
$cor = ($coralternada++ %2 ? "row2" : "row1");	  
  ?>
  <tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="pe<?=$iE[idPe]?>" style="">
<? if($_REQUEST[modulo]=='editar'){?>
<td width="20" align="center" nowrap><a href="javascript:delEquipamento('<?=$iE[idPe]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a><input type="hidden" name="IDPE[]" value="<?=$iE[idPe]?>" /><input type="hidden" name="IDFAMILIA[]" value="<?=$iE[idFamilia]?>" /></td>
<? } ?>
<td align="center" nowrap>&nbsp;<?=$iE[nome1]?> <?=$iE[marca]?> <?=$iE[modelo]?> <?=$iE[categoria]?></td>
<td align="center" nowrap><?=$iE[qtdaPe]?></td>

<td align="center" nowrap>&nbsp;R$ <?=number_format($iE[precoPe],2,',','.');?></td>
<? if($dl[tipoUsuario]=='A'){?>
<td align="center" nowrap>&nbsp;<?
$c=$sU[pcpadraoCt];
if($sU[valor1Preco]<$sU[precoPe]){
	$c = $sU[pcmaiorCt];
}
if($iE[valor3Preco]>$iE[precoPe]){
	 $pDesconto = (100-(100/$iE[valor3Preco])*$iE[precoPe]);
	 if($pDesconto>$sU[pmenorCt]){
		$c = $sU[pcmenorCt]; 
	 } else {
		 $c = $sU[pcmedioCt];
	 }
}
echo number_format($c,1,',','');;
?> % (R$ <?=number_format(($iE[precoPe]/100)*$c,2,',','.');?>)</td>
<? } ?>

<td align="center" nowrap><center><? if($iE[combustivelPe]=='S'){?>R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><? if($iE[operadorPe]=='S'){?> R$ <?=number_format($iE[valoroperadorPe],2,',','.');?><? } else {?> - X -<? }?></td>
<td align="center" nowrap><? if($iE[seguroPe]=='S'){?>R$ <?=number_format($iE[valorseguroPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretePe],2,',','.');?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretedPe],2,',','.');?></center></td>
</tr>
  <? }?>
</table></td></tr></tbody></table>
<? } ?>
<br />

<script>
$('#preco3').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: ''
}); 
$('#consumo').priceFormat({
    prefix: '',
    centsSeparator: ',',
    thousandsSeparator: ''
}); 
</script>
<br />

					
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&amp;_a=managerProposta" title="Back">&nbsp;Voltar 


</a></span></td>
					  </tr></table>					</tr>
									</table>

<div id="TesteMensagem" style="width:500px; height:150px; position:fixed;z-index:9999; display:none" class="window">
<form name="frTestaMensagem" action="index.php" method="post">
<input type="hidden" name="_m" value="form"/> 
<input type="hidden" name="_a" value="managerProposta"/> 
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
<br /><center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Enviar"/>&nbsp;&nbsp;<input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Cancelar" id="cancelar" /></center>
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
