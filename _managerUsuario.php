<script type="text/javascript"> 
function ConfirmaDel(valor)
{
var r=confirm("Você confima a exclusão?")
if (r==true)
  {
	window.location.replace("index.php?_m=downloads&_a=managerUsuario&step=3&id="+valor)
  }
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=core&_a=managerUsuario" title="Manager Usuário">Manager Usuário</a></span></td>
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
$data = date("Y-m-d");
$sqlIncluir = mysql_query("Insert into login (`nome`,`emailUsuario`,`telefoneUsuario`,`login`,`senha`,`tipoUsuario`,`statuspropostaUsuario`,`idCt`) values ('$_POST[nome]','$_POST[email]','$_POST[telefone]','$_POST[login]','$_POST[senha]','$_POST[perfil]','$_POST[statusP]','$_POST[idCt]')") or die ("Could not connect to database: ".mysql_error());
$idUsuario = mysql_insert_id();
if($sqlIncluir){

?>



<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Usuário "<?=$_POST[nome]?>" Cadastrado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>


<? if($_POST[step]=='2'){

$data = date("Y-m-d H:i:s");
$sqlIncluir = mysql_query("Update login set nome='$_POST[nome]', emailUsuario='$_POST[email]', telefoneUsuario='$_POST[telefone]', login='$_POST[login]',senha='$_POST[senha]', tipoUsuario='$_POST[perfil]',`statuspropostaUsuario`='$_POST[statusP]', `idCt`='$_POST[idCt]'  where id = $_POST[idUsuario]") or die ("Altera Dado: ".mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Usuário "<?=$_POST[nome]?>" Alterado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_REQUEST[step]=='3'){

$data = date("Y-m-d H:i:s");
$sqlIncluir = mysql_query("Update login set statusUsuario='B' where id = $_REQUEST[id]") or die ("Altera Dado: ".mysql_error());
if($sqlIncluir){
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Usuário Apagado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
						<form name="users" id="users" action="index.php" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Página 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=core&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1"><input type="text" name="quicksearch" class="quicksearch" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

<!--<td class="navpageselected" nowrap><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Options">Options</a></td>-->
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
</select></td></tr><tr class="row1"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Search" class="yellowbuttonbig" /></td></tr></table><BR /> </div><div id="tab_settings" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" class="tborder" width="100%"><tr class="row1"><td align="left" width="120">Results Per Page: </td><td align="left"><input type="text" name="set_resultsperpage" value="100" class="swifttext" size="10" /></td></tr><tr class="row2"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Submit" class="yellowbuttonbig" /></td></tr></table><BR /> </div></td></tr></table><table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Usuários</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" align="center" valign="middle" width=20 nowrap><input type="checkbox" name="allselect" class="swiftcheckbox" onClick="javascript:toggleAll(document.users);if (this.checked) { displayGridTabData('users', true);hideTabOn('gridoptusers', 'massaction'); }"></td>
<td class="tabletitlerow" width="" align="" nowrap>&nbsp;<a href="index.php?_m=core&_a=manageusers&sortby=useremails-email&sortorder=desc" title="Sort Descending">Nome&nbsp;<img src="themes/admin_default/sortasc.gif" border="0" /></a></td>
<td class="tabletitlerow" width="200" align="center" nowrap>&nbsp;<a href="index.php?_m=core&_a=manageusers&sortby=users-fullname&sortorder=asc" title="Sort Ascending">E-mail</a></td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;<a href="index.php?_m=core&_a=manageusers&sortby=users-userid&sortorder=asc" title="Sort Ascending">ID</a></td>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;<a href="index.php?_m=core&_a=manageusers&sortby=usergroups-title&sortorder=asc" title="Sort Ascending">Grupo</a></td>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;<a href="index.php?_m=core&_a=manageusers&sortby=users-dateline&sortorder=asc" title="Sort Ascending">Último Acesso</a></td>
<td>&nbsp;</td>
</tr>

<? 
$sqlUsuario = mysql_query("SELECT A.id,A.nome, A.emailUsuario, A.dtLogUsuario, A.tipoUsuario FROM login A where A.statusUsuario='A' ORDER BY A.nome");
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, 'row2');" onclick="if (document.users.itemhighlight1466.value == '1') { this.className = 'rowselect';} else { this.className = 'row2';}">
<td align="center" valign="middle"><input type='checkbox' name='itemid[]' value='1466' class="swiftcheckbox" onclick="if (document.users.itemhighlight1466.value == '0') {document.users.itemhighlight1466.value = '1';} else {document.users.itemhighlight1466.value = '0';  } if (this.checked) { displayGridTabData('users', true);hideTabOn('gridoptusers', 'massaction'); }"><input type='hidden' name='itemhighlight1466' value='0'></td>
<td colspan="" width="" align="" valign=""><img src="themes/admin_default/icon_user.gif" align="absmiddle" border="0" />&nbsp;<a href="index.php?_m=downloads&_a=editUsuario&userid=<?=$sU[id]?>" title="Edit"><?=$sU[nome]?></a></td>
<td colspan="" width="200" align="center" valign=""><a href="index.php?_m=downloads&_a=editUsuario&userid=<?=$sU[id]?>" title="Edit"><?=$sU[emailUsuario]?></a></td>
<td colspan="" width="80" align="center" valign=""><?=$sU[id]?></td>
<td colspan="" width="150" align="center" valign=""><img src="themes/admin_default/icon_usergroupregistered.gif" border="0" /> <?=$sU[tipoUsuario]?></td>
<td colspan="" width="150" align="center" valign=""><?=$sU[dtLogUsuario]?></td>
<td colspan="" width="" align="center" valign=""><a href="javascript:ConfirmaDel('<?=$sU[id]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Página 1 de 2</td>
 <td class='navpageselected'><a href='index.php?_m=core&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td></tr></table></tr></td>
</tr></td></table>
<input type="hidden" name="_m" value="core"/>
<input type="hidden" name="_a" value="manageusers"/>

</form>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

