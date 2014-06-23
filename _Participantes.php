<script>
function rem_one_option(my_value) {
  var my_index=-1
  for (var m=0; m<document.getElementById("idItem").options.length; m++) // first we have to retrieve the index ! if someone knows a better function ... i'm sure there is ...
       if (document.getElementById("idItem").options[m].value==my_value) 
           my_index=m;
  // so now the index should be in my_index
  if (my_index==-1) // someting wrong happened
  {
     //alert("well i'm not able to find the index of the element corresponding to the value "+my_value)
     return false;
   }
   else     
      document.getElementById("idItem").options.remove(my_index)
}
</script>
<?
$sqlAltera = mysql_query("SELECT * FROM calendario WHERE idCalendario = '$_REQUEST[Id]'");
$sA = mysql_fetch_array($sqlAltera); 
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="?_m=teamwork&amp;_a=calendar" title="News">Calendário</a> &raquo; <a href="?_m=teamwork&amp;_a=insertevent" title="Editar Participação">Editar Participação</a></span></td>
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
						
						<form name="swiftform" id="swiftform" action="index.php" method="POST">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Evento </td>
</tr>
</thead>


<tbody>

<tr>
<td class="contenttableborder" colspan="2">

<table border="0" cellpadding="3" cellspacing="1" width="100%">


<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Data</span></td>
<td class="row2" align="left" valign="top" colspan="" width="50%"><?=data($sA[dtCalendario])?></span></td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row1" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td class="row1" align="left" valign="top" colspan="" width="50%">

<? if($sA[tipoCalendario]=="O"){?>Formulário Oficial<? } ?>
<? if($sA[tipoCalendario]=="P"){?>Formulário Preventivo<? } ?>
<? if($sA[tipoCalendario]=="V"){?>Visita<? } ?>
<? if($sA[tipoCalendario]=="N"){?>Outros<? } ?>
</td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Descritivo</span></td>
<td class="row2" align="left" valign="top" colspan="" width="50%"><?=$sA[txtCalendario]?></td>
</tr>
<tr class="descrow" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="descrow" align="left" valign="top" colspan="5" width="50%">Participantes  </td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td width="50%" colspan="" align="left" valign="top"><span class="tabletitle">Usu&aacute;rios</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idItem[]" id="idItem" size="5" multiple="multiple">
<? 
$sqlAuditor = mysql_query("Select idUsuario, nomeUsuario from usuarios where statusUsuario = 'A' order by nomeUsuario");
while ($sA = mysql_fetch_array($sqlAuditor)){ 
?>
   <OPTION value="<?=$sA[idUsuario]?>"><?=$sA[nomeUsuario]?></OPTION>
<? } ?>   
</SELECT>
  </td>
</tr>

<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td width="50%" colspan="" align="left" valign="top"><span class="tabletitle">Usu&aacute;rios já ativos</span></td>
<td align="left" valign="top" colspan="" width="50%">
<? 
$sqlAuditor = mysql_query("Select A.idItem, B.idUsuario, B.nomeUsuario from calendario_itens A inner join usuarios B on (A.idUsuario=B.idUsuario) where idCalendario = '$_REQUEST[Id]' order by B.nomeUsuario") or die ("Altera Dado: ".mysql_error());
while ($sA = mysql_fetch_array($sqlAuditor)){ 
?>
<script>rem_one_option('<?=$sA[idUsuario]?>')</script>
<input name="Del[]" type="checkbox" value="<?=$sA[idItem]?>" /><?=$sA[nomeUsuario]?><br />
<? } ?>   

  </td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
  <td align="center" valign="middle" colspan="2">&nbsp;</td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Editar Participação" /></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>
<input type="hidden" name="Id" value="<?=$_REQUEST[Id]?>"/>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="manageevent"/>
<input type="hidden" name="step" value="4"/>

</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=news&_a=managenews" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&_p=managenews" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>