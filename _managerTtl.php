<script type="text/javascript">
function ConfirmaDel(valor)
{
var r=confirm("Voc� confima a exclus�o?")
if (r==true)
  {
	window.location.replace("index.php?_m=teamwork&_a=managerTtl&step=3&idOperadora="+valor)
  }
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerTtl" title="Manager Nome Coluna">Manager Nome Coluna</a></span></td>
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
<? if($_POST[step]=='1'){

$sqlIncluir = mysql_query("Insert into tabela_tecnica_linhas (`tituloTtl`,`parentTtl`) values ('$_POST[titulo]','$_POST[parent]')") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Nome "<?=$_POST[titulo]?>" Cadastrado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_POST[step]=='2'){


$sqlIncluir = mysql_query("Update tabela_tecnica_linhas set `tituloTtl`='$_POST[titulo]', `parentTtl`='$_POST[parent]' where idTtl='$_POST[id]'") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Nome Salvo com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>




						<form name="users" id="users" action="index.php" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Turma 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=teamwork&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1"><input type="text" name="quicksearch" class="quicksearch" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

<td class="navpageselected" nowrap><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Op��es">Op��es</a></td>
</tr></table></td></tr></table></tr></td>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse;width: 100%; height: 100%;DISPLAY: none;" id="gridtableoptusers"><tr style="height: 1em"><td align="left"><div id="gridoptusers"><ul id="tab"><li><a class="currenttab" href="#" onClick="this.blur(); return switchGridTab('massaction', 'gridoptions')" id="massaction" title="Mass Action">Mass Action</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('search', 'gridoptions')" id="search" title="Advanced Search">Advanced Search</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('settings', 'gridoptions');" id="settings" title="Settings">Settings</a></li></ul></div></td></tr>
<tr style="height: 1em"><td align="left"><div id="tab_massaction" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborder"><tr class="row1"><td align="left" width="60">Action: </td><td align="left"><select name="mass_action" onChange="javascript:return doFormConfirm('Are you sure you wish to continue?', this);" class="swiftselect"><option name="firstselect" value="">- Select -</option>
<option value="f2a6c498fb90ee345d997f888fce3b18">Delete</option>
<option value="c4908aca0e352a94cb6207103087070a">Mark as Validated</option>
<option value="6e1de310751f1262fffe196798e21a5d">Mark as Validation Pending</option>
</select></td></tr></table><BR /> </div><div id="tab_search" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" class="tborder" width="100%"><tr class="row1"><td align="left" width="60">Query: </td><td align="left"><input type="text" name="search_query" class="swifttext" /></td></tr><tr class="row2"><td align="left" width="60">Field: </td><td align="left"><select name="search_field" class="swiftselect"><option value="0" selected>Full Name & Email</option>
<option value="1">Full Name</option>
<option value="2">Email</option>
</select></td></tr><tr class="row1"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Search" class="yellowbuttonbig" /></td></tr></table><BR /> </div><div id="tab_settings" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" class="tborder" width="100%"><tr class="row1"><td align="left" width="120">Results Per Page: </td><td align="left"><input type="text" name="set_resultsperpage" value="100" class="swifttext" size="10" /></td></tr><tr class="row2"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Submit" class="yellowbuttonbig" /></td></tr></table><BR /> </div></td></tr></table>

<form action="index.php" method="post">
<? if($_REQUEST[funcao]=='edit'){
$sqlEdita = mysql_query("SELECT idTtl, tituloTtl, parentTtl FROM tabela_tecnica_linhas where idTtl  ='".$_REQUEST[id]."'") or die ("#ERRO:".mysql_error());
$sE = mysql_fetch_array($sqlEdita);
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Edi��o de Nome</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Titulo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="titulo" value="<?=$sE[tituloTtl]?>" size="30" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Parent</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="parent">
<option value="0" <? if($dom[idTtl]=='0'){?>selected="selected"<? } ?>>Raiz</option>
<?
$Sql = mysql_query("Select idTtl,tituloTtl from tabela_tecnica_linhas where parentTtl='0' order by tituloTtl") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[idTtl]?>" <? if($dom[idTtl]==$sP[parentTtl]){?>selected="selected"<? } ?>><?=$dom[tituloTtl]?></option>
<? } ?>
</select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="center" valign="top" colspan="2"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
     </td>
</tr>
</table></td></tr></tbody></table><br />

<input type="hidden" name="id" value="<?=$sE[idTtl]?>"/>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerTtl"/>
<input type="hidden" name="step" value="2"/>

<? } else {?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Cadastro de Nome</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Titulo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="titulo" value="<?=$sE[tituloTtl]?>" size="30" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Parent</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="parent">
<option value="0" <? if($dom[idTtl]=='0'){?>selected="selected"<? } ?>>Raiz</option>
<?
$Sql = mysql_query("Select idTtl,tituloTtl from tabela_tecnica_linhas where parentTtl='0' order by tituloTtl") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[idTtl]?>" <? if($dom[idTtl]==$sP[parentTtl]){?>selected="selected"<? } ?>><?=$dom[tituloTtl]?></option>
<? } ?>
</select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="center" valign="top" colspan="2"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
</tr>
</table></td></tr></tbody></table><br />

<input type="hidden" name="id" value="<?=$sE[idMp]?>"/>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerTtl"/>
<input type="hidden" name="step" value="1"/>
<? } ?>
</form>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Colunas</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" align="left" nowrap>&nbsp;Nome</td>
</tr>

<? 
$sqlUsuario = mysql_query("SELECT ttl.idTtl, ttl.tituloTtl, ttl2.tituloTtl as parent FROM tabela_tecnica_linhas ttl left join tabela_tecnica_linhas ttl2 on (ttl2.idTtl=ttl.parentTtl)  ORDER BY ttl.parentTtl, ttl.tituloTtl") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="" valign="">&nbsp;<a href="index.php?_m=teamwork&_a=managerTtl&funcao=edit&id=<?=$sU[idTtl]?>" title="Editar"><?=$sU[tituloTtl]?> <? if($sU[parent]!=''){?>(<?=$sU[parent]?>)<? } ?></a></td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Turma 1 de 2</td>
 <td class='navpageselected'><a href='index.php?_m=teamwork&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td></tr></table></tr></td>
</tr></td></table>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerTtl"/>

</form>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

