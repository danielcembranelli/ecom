				<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=form&_a=managerTurma" title="Manager Turma">Manager Turma </a> &raquo; <a href="index.php?_m=form&amp;_a=insertTurma" title="Inserir Turma">Inserir Turma </a></span></td>
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
						
						<form name="downloadfileform" id="downloadfileform" action="index.php" method="POST" enctype="multipart/form-data">
<? $sqlE = mysql_query("SELECT A.*, DATE_FORMAT(A.dtData , '%d/%m/%Y') as dt from cursos_data A where idData='$_REQUEST[id]'") or die ("Could not connect to database: ".mysql_error());
$sE = mysql_fetch_array($sqlE);
?>     
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Turma</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Curso</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idCurso" id="idCurso">
   <? $sqlUsuario = mysql_query("SELECT idCurso, nomeCurso FROM cursos ORDER BY nomeCurso") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
  <option value="<?=$sU[idCurso]?>"<? if($sE[idCurso]==$sU[idCurso]){?>selected="selected"<? }?>>
  <?=$sU[nomeCurso]?>
  </option>
  <? }?>
</select></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Legenda</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="labelData" id="labelData" value="<?=$sE[labelData]?>" size="30" /></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Local</span></td>
  <td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="localData" id="localData" value="<?=$sE[localData]?>" size="30" />  </td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data</span></td>
  <td align="left" valign="top" colspan="">
 <input type="text" name="Data" id="f_date_c" size="12" readonly="1" value="<?=$sE[dt]?>" class="swifttext"/>&nbsp;<img src="themes/admin_default/calendar.gif" id="f_trigger_c" style="cursor: pointer;" title="" align="absmiddle"/></span>
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
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Valor</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="valor" id="valor" value="<?=number_format($sE[valorData], 2, ',', '.');?>
" size="30" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Status</span></td>
  <td align="left" valign="top" colspan=""><select name="status" id="status">
    <option value="1"<? if($sE[statusData]=='1'){?>selected="selected"<? }?>>Aberta</option>
    <option value="2"<? if($sE[statusData]=='2'){?>selected="selected"<? }?>>Esgotada</option>
    <option value="3"<? if($sE[statusData]=='3'){?>selected="selected"<? }?>>Concluida</option>
      </select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="row1" align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
</tr>
</table></td></tr></tbody></table>
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerTurma"/>
<input type="hidden" name="step" value="2"/>
<input type="hidden" name="idData" value="<?=$sE[idData]?>"/>

</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=teamwork&amp;_a=managerTurma" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			