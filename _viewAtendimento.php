                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=form&_a=managerAtendimento" title="Manager Atendimento">Manager Atendimento </a> &raquo; <a href="index.php?_m=form&amp;_a=viewAtendimento" title="Visualizar Atendimento">Visualizar Atendimento Clínico</a></span></td>
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
<?
$sqlUsuario = mysql_query("SELECT J.idProntuario,DATE_FORMAT(J.dtProntuario , '%d/%m/%Y') as dt, P.nomePaciente, A.nomeAtendimento, DATE_FORMAT(P.dtnascPaciente, '%d/%m/%Y') as dtnasc, J.obsProntuario, P.emailPaciente, P.telefonePaciente, P.celularPaciente FROM prontuario J inner join paciente P on (J.idPaciente=P.idPaciente) left join atendimento A on (J.idAtendimento=A.idAtendimento) where idProntuario='$_REQUEST[id]'") or die ("Could not connect to database: ".mysql_error());
$sU = mysql_fetch_array($sqlUsuario);
?>
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
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nome</span></td>
<td align="left" valign="top" colspan="" width="50%">&nbsp;<?=$sU[nomePaciente]?></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Data de Nascimento</span></td>
<td align="left" valign="top" colspan="" width="50%"><?=$sU[dtnasc]?></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">E-mail</span></td>
<td align="left" valign="top" colspan="" width="50%"><?=$sU[emailPaciente]?></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Telefone</span></td>
<td align="left" valign="top" colspan="" width="50%">(<?=str_replace('#',') ',$sU[telefonePaciente])?></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Celular</span></td>
<td align="left" valign="top" colspan="" width="50%">(<?=str_replace('#',') ',$sU[celularPaciente])?></td>
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

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Data</span></td>
<td align="left" valign="top" colspan="">
&nbsp;<?=$sU[dt]?></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Local</span></td>
  <td align="left" valign="top" colspan=""><label for="itemmenu"></label>
    &nbsp;<?=$sU[nomeAtendimento]?>    </td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan="2"><?=$sU[obsProntuario]?></td>
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
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Cid</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Descritivo</td>
</tr>
<? 
$sqlConduta = mysql_query("SELECT * from prontuario_itens where idProntuario = '$sU[idProntuario]'") or die ("Could not connect to database: ".mysql_error());
while ($sC = mysql_fetch_array($sqlConduta)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="center" colspan=""><span class="tabletitle"><?=$sC[idCid]?></span></td>
  <td align="left" valign="top" colspan="">&nbsp;<?=$sC[condutaPi]?>    </td>
</tr>
<? } ?>
</table></td></tr></tbody></table>

<? 
$sqlAgenda = mysql_query("SELECT DATE_FORMAT(A.dtAgenda , '%d/%m/%Y %Hh%imin') as dt, T.obsCirurgia, M.codigoAmb, M.localAmb, M.procedimentoAmb, E.nomeAtendimento from agenda A inner join cirurgia T on (A.idTipoagenda=T.idCirurgia) left join tabelaamb M on (T.codigoAmb=M.codigoAmb) left join atendimento E on (E.idAtendimento=T.idAtendimento) where  idProntuario = '$sU[idProntuario]' And tipoAgenda = 'C' ") or die ("Could not connect to database: ".mysql_error());
while ($sC = mysql_fetch_array($sqlAgenda)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="1" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left">Cirurgia</td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="tabelaCirurgia">


<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Local</span></td>
  <td align="left" valign="top" colspan=""><label for="itemmenu"></label>
<?=$sC[nomeAtendimento]?></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%"><?=$sC[localAmb]?> - <?=$sC[procedimentoAmb]?> (<?=$sC[codigoAmb]?>)</td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data</span></td>
 <td align="left" valign="top" colspan=""><?=$sC[dt]?>
 </td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Observação</span></td>
  <td align="left" valign="top" colspan=""><label for="obsCirurgia"></label>
    <?=$sC[obsCirurgia]?></td>
</tr>
</table></td></tr></tbody></table>
<? }?>

<? 
$sqlAgenda = mysql_query("SELECT T.labelTipoagenda, DATE_FORMAT(A.dtAgenda , '%d/%m/%Y') as dt, obsAgenda from agenda A inner join tipoagenda T on (A.idTipoagenda=T.idTipoagenda) where idProntuario = '$sU[idProntuario]' And tipoAgenda = 'A'") or die ("Could not connect to database: ".mysql_error());
while ($sC = mysql_fetch_array($sqlAgenda)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>
  <label for="ctabelaAgendamento">Novo Agendamento</label></td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="tabelaAgendamento">




<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%">
 
<?=$sC[labelTipoagenda]?>  

</td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data</span></td>
 <td align="left" valign="top" colspan=""><?=$sC[dt]?>  </td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Observação</span></td>
  <td align="left" valign="top" colspan=""><?=$sC[obsAgenda]?></td>
</tr>
</table></td></tr></tbody></table>
<? }?>
<br />
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
			