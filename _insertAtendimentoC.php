<script type="text/javascript">
function chec(tabela,valor){
	if(valor==true){
	document.getElementById(tabela).style.display = 'block'
	} else {
	document.getElementById(tabela).style.display = 'none'
	}
}

$().ready(function() {
	
	
	function formatItem(row) {
		return row[0];
	}
	function formatResult(row) {
		//alert(row[1]);
		//document.formAtendimento.idPaciente.value=row[1];
		document.formAtendimento.dtnascPaciente.value=row[1];
		document.formAtendimento.enderecoPaciente.value=row[2];
		document.formAtendimento.cepPaciente.value=row[3];
		document.formAtendimento.bairroPaciente.value=row[4];
		document.formAtendimento.cidadePaciente.value=row[5];
		document.formAtendimento.ufPaciente.value=row[6];
		document.formAtendimento.dddtelefonePaciente.value=row[7];
		document.formAtendimento.telefonePaciente.value=row[8];
		document.formAtendimento.dddcelularPaciente.value=row[9];
		document.formAtendimento.celularPaciente.value=row[10];
		document.formAtendimento.emailPaciente.value=row[11];
		document.formAtendimento.profissaoPaciente.value=row[12];
		//document.getElementById('trId').style.display = 'block';
		//return row[0].replace(/(<.+?>)/gi, '');
	}
	
$("#singleBirdRemote").autocomplete("search.php", {
		formatItem: formatItem,
		autoFill: false,
		formatResult: formatResult
	});
	
	});

	</script>
				<script language="javascript">
        // Função responsável por inserir linhas na tabela
        
function delRow(valor)
{
document.getElementById('insereConduta').deleteRow(valor)
}


		function inserirLinhaTabela() {

            // Captura a referência da tabela com id “minhaTabela”
            var table = document.getElementById("insereConduta");
            // Captura a quantidade de linhas já existentes na tabela
            var numOfRows = table.rows.length;
            // Captura a quantidade de colunas da última linha da tabela
            var numOfCols = table.rows[numOfRows-1].cells.length;

            // Insere uma linha no fim da tabela.
            var newRow = table.insertRow(numOfRows);
			newRow.className = 'row2';
 
            // Faz um loop para criar as colunas
            
                // Insere uma coluna na nova linha 
                
				newCell = newRow.insertCell(0);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<a href="javascript:delRow('+ numOfRows +');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a>'
				
				newCell = newRow.insertCell(1);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input type="text" class="swifttext" name="condutaCID[]" id="titulomenu" value="" size="10" /></center>';
				newCell = newRow.insertCell(2);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><textarea name="condutaDESC[]" id="textarea" cols="45" rows="2" style="width:90%"></textarea></center>';
            

        } 
</script>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=form&_a=managerAtendimento" title="Manager Atendimento">Manager Atendimento </a> &raquo; <a href="index.php?_m=form&amp;_a=insertAtendimentoC" title="Inserir Atendimento">Inserir Atendimento Clínico</a></span></td>
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
						
						<form name="formAtendimento" id="downloadfileform" action="index.php" method="POST" enctype="multipart/form-data">

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Paciente</td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="trId" style="display:none">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Id</span></td>
<td align="left" valign="top" colspan="" width="50%">	<div>

<input type="text" class="swifttext" name="idPaciente" value="" readonly="readonly" size="30" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nome</span></td>
<td align="left" valign="top" colspan="" width="50%">	<div>

<input type="text" class="swifttext" name="nomePaciente" id="singleBirdRemote" value="" size="30" style="width:90%;" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Data de Nascimento</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="dtnascPaciente" type="text" class="swifttext" id="titulomenu" value="" size="20" maxlength="10" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Convênio</span></td>
<td align="left" valign="top" colspan="" width="50%">
<select name="idPlano" id="itemmenu">
 <option value="0">Selecione o plano</option>
<? $sqlUsuario = mysql_query("SELECT idOperadora, nomeOperadora FROM operadora A ORDER BY nomeOperadora") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
      <option value="<?=$sU[idOperadora]?>"><?=$sU[nomeOperadora]?></option>
      <? }?>
    </select>   

</td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Endereço</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="enderecoPaciente" id="titulomenu" value="" size="60" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">CEP</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="cepPaciente" id="cepPaciente" value="" size="15" maxlength="9" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Bairro</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="bairroPaciente" id="bairroPaciente" value="" size="30" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Cidade / UF</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="cidadePaciente" id="cidadePaciente" value="" size="30" />
 / <input type="text" class="swifttext" name="ufPaciente" id="ufPaciente" value="" size="10" maxlength="2" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Telefone Fixo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="dddtelefonePaciente" type="text" class="swifttext" id="dddtelefonePaciente" value="" size="3" maxlength="2" />
  <input type="text" class="swifttext" name="telefonePaciente" id="telefonePaciente" value="" size="30" /> </td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Telefone Celular</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="dddcelularPaciente" type="text" class="swifttext" id="dddcelularPaciente" value="" size="3" maxlength="2" />
  <input type="text" class="swifttext" name="celularPaciente" id="celularPaciente" value="" size="30" /> </td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">E-mail</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="emailPaciente" id="emailPaciente" value="" size="60" /> </td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Profissão</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="profissaoPaciente" id="profissaoPaciente" value="" size="30" /> </td>
</tr>

</table></td></tr></tbody></table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Atendimento</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Data</span></td>
<td align="left" valign="top" colspan="">
 <input type="text" name="dtAtendimento" id="f_date_c" size="12" readonly="1" value="<?=date("d/m/Y")?>" class="swifttext"/>
 &nbsp;<img src="themes/admin_default/calendar.gif" id="f_trigger_c" style="cursor: pointer;" title="" align="absmiddle"/></span>
  	<script type="text/javascript">
    Calendar.setup({
        inputField     :    "f_date_c",
        button         :    "f_trigger_c",
        ifFormat       :    "%d/%m/%Y",
        align          :    "Tl",        singleClick    :    true
    });
		isTicketPage = true;
		ticketPageTicketID = "1243";
		ticketPageTicketEmail = "alexquiambao@gmail.com";
	</script></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Local</span></td>
  <td align="left" valign="top" colspan=""><label for="itemmenu"></label>
    <select name="localAtendimento" id="itemmenu">
<? $sqlUsuario = mysql_query("SELECT idAtendimento, nomeAtendimento FROM atendimento where clinicaAtendimento='S' ORDER BY nomeAtendimento") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
      <option value="<?=$sU[idAtendimento]?>" <? if($_SESSION[LocalAtendimento]==$sU[idAtendimento]){?>selected="selected"<? }?>><?=$sU[nomeAtendimento]?></option>
      <? }?>
    </select>    </td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan="2"><center><textarea name="obsAtendimento" id="obsAtendimento" cols="45" style="width:99%" rows="4"></textarea>
  </center></td>
  </tr>
</table></td></tr></tbody></table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Conduta</td>
</tr>

</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="tabletitlerow" width="20" align="center" nowrap></td>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Cid</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Descritivo</td>
</tr>
</table></td></tr></tbody></table>

<table width="100%" style="margin-top:3px;" border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="javascript:inserirLinhaTabela();" title="Back"><img src="themes/admin_default/action_add.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="javascript:inserirLinhaTabela();" title="Nova Conduta">&nbsp;Nova Conduta</a></span></td>
						</tr></table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="1" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left"><input type="checkbox" name="cCirurgia" value="S" onclick="chec('tabelaCirurgia',this.checked)" id="ctabelaCirurgia" />
  <label for="ctabelaCirurgia">Cirurgia</label></td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="tabelaCirurgia" style="display:none">


<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Local</span></td>
  <td align="left" valign="top" colspan=""><label for="itemmenu"></label>
    <select name="localCirurgia" id="itemmenu">
<? $sqlUsuario = mysql_query("SELECT idAtendimento, nomeAtendimento FROM atendimento where cirurgiaAtendimento='S' ORDER BY nomeAtendimento") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
      <option value="<?=$sU[idAtendimento]?>"><?=$sU[nomeAtendimento]?></option>
      <? }?>
    </select>    </td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%">
<select name="tipoCirurgia" id="itemmenu">
<? $sqlUsuario = mysql_query("SELECT codigoAmb, localAmb, procedimentoAmb FROM tabelaamb A ORDER BY codigoAMB") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
      <option value="<?=$sU[codigoAmb]?>"><?=$sU[codigoAmb]?> | <?=$sU[localAmb]?> - <?=$sU[procedimentoAmb]?></option>
      <? }?>
    </select>  

</td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data</span></td>
 <td align="left" valign="top" colspan="">
 <input type="text" name="dtCirurgia" id="f_date_r" size="12" value="" class="swifttext"/>
 &nbsp;<img src="themes/admin_default/calendar.gif" id="f_trigger_r" style="cursor: pointer;" title="" align="absmiddle"/></span>
  	<script type="text/javascript">
    Calendar.setup({
        inputField     :    "f_date_r",
        button         :    "f_trigger_r",
        ifFormat       :    "%d/%m/%Y",
        align          :    "Tl",        singleClick    :    true
    });
		isTicketPage = true;
		ticketPageTicketID = "1243";
		ticketPageTicketEmail = "alexquiambao@gmail.com";
	</script></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Horario</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="horaCirurgia" id="horaCirurgia" value="" size="5" /> </td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Observação</span></td>
  <td align="left" valign="top" colspan=""><label for="obsCirurgia"></label>
    <textarea name="obsCirurgia" id="obsCirurgia" cols="45" rows="2"></textarea>
    <label for="iInferior"></label></td>
</tr>
</table></td></tr></tbody></table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap><input name="cAgendamento" type="checkbox" id="ctabelaAgendamento" onclick="chec('tabelaAgendamento',this.checked)" value="S" />
  <label for="ctabelaAgendamento">Novo Agendamento</label></td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="tabelaAgendamento" style="display:none">




<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%">
 
<select name="tipoRetorno" id="itemmenu">
<? $sqlUsuario = mysql_query("SELECT idTipoagenda, labelTipoagenda FROM tipoagenda A ORDER BY labelTipoagenda") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
      <option value="<?=$sU[idTipoagenda]?>"><?=$sU[labelTipoagenda]?></option>
      <? }?>
    </select>   

</td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data</span></td>
 <td align="left" valign="top" colspan="">
 <input type="text" name="dtRetorno" id="f_dtRetorno" size="12" value="" class="swifttext"/>
 &nbsp;<img src="themes/admin_default/calendar.gif" id="f_trigger_rRetorno" style="cursor: pointer;" title="" align="absmiddle"/></span>
  	<script type="text/javascript">
    Calendar.setup({
        inputField     :    "f_dtRetorno",
        button         :    "f_trigger_rRetorno",
        ifFormat       :    "%d/%m/%Y",
        align          :    "Tl",        singleClick    :    true
    });
		isTicketPage = true;
		ticketPageTicketID = "1243";
		ticketPageTicketEmail = "alexquiambao@gmail.com";
	</script></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Observação</span></td>
  <td align="left" valign="top" colspan=""><label for="obsCirurgia"></label>
    <textarea name="obsRetorno" id="obsRetorno" cols="45" rows="2"></textarea>
    <label for="iInferior"></label></td>
</tr>
</table></td></tr></tbody></table><br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerAtendimento"/>
<input type="hidden" name="step" value="1"/>

</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&amp;_a=managerAtendimento" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			