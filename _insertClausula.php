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
		//document.downloadsAtendimento.idPaciente.value=row[1];
		//document.getElementById('trId').style.display = 'block';
		return row[0].replace(/(<.+?>)/gi, '');
	}
	
$("#grupo").autocomplete("seachLegenda.php?tipo=G", {
		formatItem: formatItem,
		autoFill: false,
		formatResult: formatResult
	});
	
	
	});

	</script>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=downloads&_a=managerClausula" title="Manager Família">Manager Cláusula</a> &raquo; <a href="index.php?_m=downloads&amp;_a=insertClausula" title="Inserir Cláusula">Inserir Cláusula</a></span></td>
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
						
						<form name="downloadsAtendimento" id="downloadfiledownloads" action="index.php" method="POST" enctype="multipart/downloads-data">

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Cláusula</td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Grupo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="grupo" id="grupo" value="" size="30" style="width:90%;" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Legenda</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="legenda" id="legenda" value="" size="30" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
  <td align="center" valign="top" colspan="2"><label for="texto"></label>
    <textarea name="texto" id="texto" cols="45" rows="7" style="width:99%"></textarea></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Ordem</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="ordem" value="<?=$sU[ordemClausula]?>" size="10" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Responsável</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="responsavel" type="radio" id="radioCTJ" value="E" checked="checked" />
    <label for="radioCTJ">ESCAD</label>
    <input type="radio" name="responsavel" id="radioCTF" value="C" />
    <label for="radioCTF">Cliente</label>
    <input type="radio" name="responsavel" <? if($sU[responsavelClausula]=='A'){?>checked="checked"<? } ?> id="radioCTA" value="A" />
    <label for="radioCTA">Apenas Observação</label></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Observação</span></td>
<td align="left" valign="top" colspan="" width="50%"><textarea name="obs" id="texto" cols="45" rows="3" style="width:99%"></textarea></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Status</span></td>
<td align="left" valign="top" colspan="" width="50%"><select size="1" name="status" class=form-especial id="status">
			<option  value="A">Arquivada</option>
						<option  value="P" >Publicada</option>
						<option  value="R" >Rascunho</option></select></td>
</tr>
</table></td></tr></tbody></table>
<br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="downloads"/>
<input type="hidden" name="_a" value="managerClausula"/>
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
						<td><span class="smalltext"><a href="index.php?_m=downloads&amp;_a=managerClausula" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			