


<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Manager Contatos</span></td>
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
if($_REQUEST[familia]==''){
	$_REQUEST[familia]=$_POST[familia];
}

if($_POST[step]=='1'){
$data = explode('/',$_POST[aniversario]);
$dtnasc= '0000-'.$data[1].'-'.$data[0];
	//Verifica Paciente	
	$insereFamilia = mysql_query("Insert into contatos (idCliente, nomeContato, emailContato, cargoContato, dtnascContato, dddfone1, nrfone1, dddfone2, nrfone2, dddcelular, nrcelular,dddfax,nrfax,idCg, nextelContato) VALUES ('".$_POST[idCliente]."','".$_POST[nome]."','".$_POST[email]."','".$_POST[cargo]."','".$dtnasc."','".$_POST[dddfone1]."','".$_POST[nrfone1]."','".$_POST[dddfone2]."','".$_POST[nrfone2]."','".$_POST[dddcelular]."','".$_POST[nrcelular]."','".$_POST[dddfax]."','".$_POST[nrfax]."','".$_POST[idCg]."','".$_POST[nextel]."')") or die (mysql_error());
	
	
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Contato Cadastrado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_REQUEST[step]=='2'){
$data = explode('/',$_POST[aniversario]);
$dtnasc= '0000-'.$data[1].'-'.$data[0];
	
	$sql = "Update contatos set nomeContato='".$_POST[nome]."', emailContato='".$_POST[email]."', cargoContato='".$_POST[cargo]."', dtnascContato='".$dtnasc."', dddfone1='".$_POST[dddfone1]."', nrfone1='".$_POST[nrfone1]."', dddfone2='".$_POST[dddfone2]."', nrfone2='".$_POST[nrfone2]."', dddcelular='".$_POST[dddcelular]."', nrcelular='".$_POST[nrcelular]."', dddfax='".$_POST[dddfax]."', nrfax='".$_POST[nrfax]."', idCg='".$_POST[idCg]."', nextelContato='".$_POST[nextel]."'";
	
	if($_POST[aemail]!=$_POST[email]){
		$sql .=", statusemailContato='A'";
	}
	
	$sql .=" where idContato='".$_POST[idContato]."' Limit 1";
	$insereFamilia = mysql_query($sql) or die (mysql_error());

if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Contato Editado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>




<? if($_REQUEST[step]=='3'){

	$insereFamilia = mysql_query("Update contatos set statusContato='E' where idContato='".$_REQUEST[idContato]."' Limit 1") or die (mysql_error());

if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Contato Apagado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_REQUEST[step]=='4'){

	$insereFamilia = mysql_query("Update contatosdeclientes set status='E' where CCli_ID='".$_REQUEST[idContato]."' Limit 1") or die (mysql_error());

if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Contato Apagado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<script type="text/javascript"> 
function ConfirmaDel(valor)
{
var r=confirm("Você confima a exclusão?")
if (r==true)
  {
	window.location.replace("index.php?_m=livesupport&_a=managerContatos&step=3&idCliente=<?=$_REQUEST[idCliente]?>&idAntigo=<?=$_REQUEST[idAntigo]?>&idContato="+valor)
  }
}
function ConfirmaDelAntigo(valor)
{
var r=confirm("Você confima a exclusão?")
if (r==true)
  {
	window.location.replace("index.php?_m=livesupport&_a=managerContatos&step=4&idCliente=<?=$_REQUEST[idCliente]?>&idAntigo=<?=$_REQUEST[idAntigo]?>&idContato="+valor)
  }
}
</script>

<? if($_REQUEST[step]=='edit'){?>
<? 
$sqlUsuario = mysql_query("SELECT DATE_FORMAT(dtnascContato,'%d/%m') as dt, c.* from contatos c where idContato = '".$_REQUEST[idContato]."' And statusContato='A' ORDER BY nomeContato") or die ("Could not connect to database: ".mysql_error());
$sU = mysql_fetch_array($sqlUsuario);
?>
<form action="index.php?idCliente=<?=$_REQUEST[idCliente]?>&idAntigo=<?=$_REQUEST[idAntigo]?>" method="post">
<input type="hidden" class="swifttext" name="aemail" id="Cli_CGC" value="<?=$sU[emailContato]?>" size="30" />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Edição de Contato</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
 
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Nome</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="nome" id="Cli_CGC" value="<?=$sU[nomeContato]?>" size="30" /></td>
</tr>
 <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Grupo </span></td>
<td align="left" valign="top" colspan=""><select name="idCg" id="idFilial">
<option>Selecione..</option>
<?
$Sql = mysql_query("Select idCg, labelCg from contatos_grupo where statusCg='A' order by labelCg") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[idCg]?>" <? if($dom[idCg]==$sU[idCg]){?>selected="selected"<? } ?>><?=$dom[labelCg]?></option>
<? } ?>
</select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Cargo</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="cargo" id="Cli_CGC" value="<?=$sU[cargoContato]?>" size="30" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">E-mail</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="email" id="Cli_CGC" value="<?=$sU[emailContato]?>" size="30" /></td>
</tr>
 <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Telefone 1 </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dddfone1" id="Cli_CGC" value="<?=$sU[dddfone1]?>" size="3" maxlength="2" /> <input type="text" class="swifttext" name="nrfone1" id="Cli_CGC" value="<?=$sU[nrfone1]?>" size="15" maxlength="9" alt="fone" /></td>
</tr>
 <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Telefone 2 </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dddfone2" id="Cli_CGC" value="<?=$sU[dddfone2]?>" size="3" maxlength="2" /> <input type="text" class="swifttext" name="nrfone2" id="Cli_CGC" value="<?=$sU[nrfone2]?>" size="15" maxlength="9" alt="fone" /></td>
</tr>
 <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Celular </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dddcelular" id="Cli_CGC" value="<?=$sU[dddcelular]?>" size="3" maxlength="2" /> <input type="text" class="swifttext" name="nrcelular" id="celular" value="<?=$sU[nrcelular]?>" size="15" maxlength="10" alt="fone" /></td>
</tr>
 <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">ID Nextel </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="nextel" id="Cli_CGC" value="<?=$sU[nextelContato]?>" size="15"/></td>
</tr>
 <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Fax </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dddfax" id="Cli_CGC" value="<?=$sU[dddfax]?>" size="3" maxlength="2" /> <input type="text" class="swifttext" name="nrfax" id="Cli_CGC" value="<?=$sU[nrfax]?>" size="15" maxlength="9" alt="fone" /></td>
</tr>
 <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Dt do Aniversário </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="aniversario" id="Cli_CGC" value="<?=$sU[dt]?>" size="10" maxlength="5" /> DD/MM</td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="center" valign="top" colspan="2"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Editar" /></td>
     </td>
</tr>
</table></td></tr></tbody></table><br />
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerContatos"/>
<input type="hidden" name="idContato" value="<?=$_REQUEST[idContato]?>" />
<input type="hidden" name="step" value="2"/>
</form>
<? } else {?>
<form action="index.php?idAntigo=<?=$_REQUEST[idAntigo]?>" method="post" name="Contatos">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Cadastro de Contato</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
 
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Nome</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="nome" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="30" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Grupo </span></td>
<td align="left" valign="top" colspan=""><select name="idCg" id="idFilial">
<option>Selecione..</option>
<?
$Sql = mysql_query("Select idCg, labelCg from contatos_grupo where statusCg='A' order by labelCg") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[idCg]?>"><?=$dom[labelCg]?></option>
<? } ?>
</select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Cargo</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="cargo" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="30" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">E-mail</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="email" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="30" /></td>
</tr>
 <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Telefone 1 </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dddfone1" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="3" maxlength="2" /> <input type="text" class="swifttext" name="nrfone1" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="15" maxlength="9" alt="fone" /></td>
</tr>
 <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Telefone 2 </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dddfone2" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="3" maxlength="2" /> <input type="text" class="swifttext" name="nrfone2" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="15" maxlength="9" alt="fone" /></td>
</tr>
 <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Celular </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dddcelular" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="3" maxlength="2" /> <input type="text" class="swifttext" name="nrcelular" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="15" maxlength="9" alt="fone" /></td>
</tr>
 <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">ID Nextel </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="nextel" id="Cli_CGC" value="<?=$sU[nextelContato]?>" size="15"/></td>
</tr>
 <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Fax </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dddfax" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="3" maxlength="2" /> <input type="text" class="swifttext" name="nrfax" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="15" maxlength="9" alt="fone"/></td>
</tr>
 <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="150"><span class="tabletitle">Dt do Aniversário </span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="aniversario" id="Cli_CGC" value="<?=$sU[Cli_CGC]?>" size="10" maxlength="5" /> DD/MM</td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="center" valign="top" colspan="2"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Adicionar" /></td>
     </td>
</tr>
</table></td></tr></tbody></table><br />
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerContatos"/>
<input type="hidden" name="idCliente" value="<?=$_REQUEST[idCliente]?>" />
<input type="hidden" name="step" value="1"/>
</form>

<? } ?>
						<teamwork name="users" id="users" action="index.php" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Atendimento 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=teamwork&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1"><input type="text" name="quicksearch" class="quicksearch" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

<td class="navpageselected" nowrap><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Opções">Opções</a></td>
</tr></table></td></tr></table></tr></td>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse;width: 100%; height: 100%;DISPLAY: none;" id="gridtableoptusers"><tr style="height: 1em"><td align="left"><div id="gridoptusers"><ul id="tab"><li><a class="currenttab" href="#" onClick="this.blur(); return switchGridTab('massaction', 'gridoptions')" id="massaction" title="Mass Action">Mass Action</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('search', 'gridoptions')" id="search" title="Advanced Search">Advanced Search</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('settings', 'gridoptions');" id="settings" title="Settings">Settings</a></li></ul></div></td></tr>
<tr style="height: 1em"><td align="left"><div id="tab_massaction" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborder"><tr class="row1"><td align="left" width="60">Action: </td><td align="left"><select name="mass_action" onChange="javascript:return doteamworkConfirm('Are you sure you wish to continue?', this);" class="swiftselect"><option name="firstselect" value="">- Select -</option>
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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Relação de Contatos</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="50" align="center" nowrap>&nbsp;Grupo</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Nome</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;E-mail</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Cargo</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Telefone 1</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Celular</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;</td>

</tr>

<?
$sqlUsuario = mysql_query("SELECT cg.idCg, count(*) as total from contatos c left join contatos_grupo cg on (cg.idCg=c.idCg) where  idCliente = '".$_REQUEST[idCliente]."' And statusContato='A' group by cg.idCg");
while ($sU = mysql_fetch_array($sqlUsuario)){
	$c[$sU[idCg]]=$sU[total];	
}
//print_r($c);
$b=0; 
$sqlUsuario = mysql_query("SELECT * from contatos c left join contatos_grupo cg on (cg.idCg=c.idCg) where  idCliente = '".$_REQUEST[idCliente]."' And statusContato='A' ORDER BY labelCg, nomeContato") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<? if($b!=$sU[idCg]){
	
?>	
<td <? if($c[$sU[idCg]]>1){?>rowspan="<?=$c[$sU[idCg]]?>"<? } ?> width="" align="center" valign=""><?=$sU[labelCg];?></td>
<? }
$b=$sU[idCg]; ?>
<td colspan="" width="" align="center" valign=""><?=$sU[nomeContato];?></td>
<td colspan="" align="center" <? if($sU[statusemailContato]=='E'){?>class="vtip" title="E-mail relatou erro no ultimo envio"<? } ?>><? if($sU[statusemailContato]=='E'){?><img src="themes/admin_default/icon_error.gif" /> &nbsp; <? } ?> <?=$sU[emailContato];?></td>
<td colspan="" align="center"><?=$sU[cargoContato];?></td>
<td colspan="" align="center">(<?=$sU[dddfone1];?>) <?=$sU[nrfone1];?></td>
<td colspan="" align="center">(<?=$sU[dddcelular];?>) <?=$sU[nrcelular];?></td>
<td colspan="" width="" align="center" valign=""><a href="index.php?_m=livesupport&_a=managerContatos&step=edit&idCliente=<?=$_REQUEST[idCliente]?>&idContato=<?=$sU[idContato]?>"><img src="themes/admin_default/icon_edit.gif" border="0"></a> <a href="javascript:ConfirmaDel('<?=$sU[idContato]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table><br />
<br /><font color="#FFFFFF">a</font>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Relação de Contatos Antigos</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Nome</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;E-mail</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Telefone 1</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Telefone 2</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Celular</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Fax</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;</td>

</tr>

<? 
$sqlUsuario = mysql_query("SELECT * from contatosdeclientes where  Cli_ID = '".$_REQUEST[idAntigo]."' And status='A' ORDER BY CCli_Nome") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, 'row2');">
<td colspan="" width="" align="center" valign=""><?=$sU[CCli_Nome];?></td>
<td colspan="" align="center"><?=$sU[CCli_EMail];?></td>
<td colspan="" align="center"><?=$sU[CCli_Fone];?></td>
<td colspan="" align="center">(<?=$sU[dddfone2];?>) <?=$sU[nrfone2];?></td>
<td colspan="" align="center">(<?=$sU[dddcelular];?>) <?=$sU[nrcelular];?></td>
<td colspan="" align="center">(<?=$sU[dddfax];?>) <?=$sU[nrfax];?></td>
<td colspan="" width="" align="center" valign=""><a href="javascript:ConfirmaDelAntigo('<?=$sU[CCli_ID]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table><br />

<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Atendimento 1 de 2</td>
 <td class='navpageselected'><a href='index.php?_m=teamwork&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td></tr></table></tr></td>
</tr></td></table>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="manageusers"/>

</teamwork>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

