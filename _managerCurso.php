<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerCurso" title="Manager Curso">Manager Curso</a></span></td>
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

$Html = str_replace('"','',$_POST[FCKeditor1]);
$sqlIncluir = mysql_query("Insert into cursos (`tCurso`,`lCurso`, `nomeCurso`, `chCurso`, `vagasCurso`, `dscCurso`) values ('$_POST[tCurso]','$_POST[lCurso]', '$_POST[nomeCurso]', '$_POST[chCurso]', '$_POST[vagasCurso]', '$Html')") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Curso "<?=$_POST[nomeCurso]?>" Cadastrada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_POST[step]=='2'){

$dt = explode('/',$_POST[Data]);
$Data = $dt[2].'-'.$dt[1].'-'.$dt[0];

$Valor = str_replace('.','',$_POST[valor]);
$Valor = str_replace(',','.',$_POST[valor]);

$Html = str_replace('"','',$_POST[FCKeditor1]);
$sqlIncluir = mysql_query("Update cursos set `tCurso`='$_POST[tCurso]',`lCurso`='$_POST[lCurso]', `nomeCurso`='$_POST[nomeCurso]', `chCurso`='$_POST[chCurso]', `vagasCurso`='$_POST[vagasCurso]', `dscCurso`='$Html' where idCurso='$_POST[idCurso]'") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Curso "<?=$_POST[nomeCurso]?>" Cadastrada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

						<form name="users" id="users" action="index.php" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Turma 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=teamwork&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1"><input type="text" name="quicksearch" class="quicksearch" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

<td class="navpageselected" nowrap><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Opções">Opções</a></td>
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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Cursos</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>

<td class="tabletitlerow" width="230" align="center" nowrap>&nbsp;Curso</td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Tipo</td>

</tr>

<? 
$sqlUsuario = mysql_query("SELECT C.idCurso, C.nomeCurso, C.tCurso FROM cursos C ORDER BY nomeCurso") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, 'row2');">
<td colspan="" width="" align="" valign="">&nbsp;<a href="index.php?_m=teamwork&_a=editCurso&id=<?=$sU[idCurso]?>" title="Editar"><?=$sU[nomeCurso]?></a></td>
<td colspan="" width="80" align="center" valign="">
<?
$r='';
switch($sU[tCurso]){
case 'C': $r = 'Cursos e treinamentos';break;
case 'P': $r = 'Palestras';break;
case 'W': $r = 'Workshops';break;
case 'I': $r = 'Internacional';break;
}
echo $r;
?>


</td>
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
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="manageusers"/>

</form>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

