<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=form&_a=managerpagina" title="Manager Página">Manager Atendimento</a></span></td>
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
if($_POST[localAtendimento]!=''){
	$_SESSION[LocalAtendimento]=$_POST[localAtendimento];
}

if($_POST[step]=='1'){

	//Data de Nascimento
	
	$dtNascimento = dataSql($_POST[dtnascPaciente]);


	//Verifica Paciente
	
	$paciente = explode('#',$_POST[nomePaciente]);
		if($paciente[1]==''){
			$inserePaciente = mysql_query("Insert into paciente VALUES ('','".$_POST[idPlano]."','".$_POST[nomePaciente]."','".$dtNascimento."','".$_POST[enderecoPaciente]."','".$_POST[bairroPaciente]."','".$_POST[cidadePaciente]."','".$_POST[ufPaciente]."','".$_POST[cepPaciente]."','".$_POST[profissaoPaciente]."','','".$_POST[emailPaciente]."','".$_POST[dddtelefonePaciente]."#".$_POST[telefonePaciente]."','".$_POST[dddtelefonePaciente]."#".$_POST[celularPaciente]."')") or die ('INSERE PACIENTE - '.mysql_error());
			$IdPaciente = mysql_insert_id();
		} else {
			$atualizaPaciente = mysql_query("Update paciente set idPlano='".$_POST[idPlano]."',nomePaciente='".$paciente[1]."',dtnascPaciente='".$dtNascimento."',enderecoPaciente='".$_POST[enderecoPaciente]."',bairroPaciente='".$_POST[bairroPaciente]."',cidadePaciente='".$_POST[cidadePaciente]."',ufPaciente='".$_POST[ufPaciente]."',cepPaciente='".$_POST[cepPaciente]."',profissaoPaciente='".$_POST[profissaoPaciente]."',emailPaciente='".$_POST[emailPaciente]."',telefonePaciente='".$_POST[dddtelefonePaciente]."#".$_POST[telefonePaciente]."',celularPaciente='".$_POST[dddcelularPaciente]."#".$_POST[celularPaciente]."' where idPaciente='$paciente[0]' Limit 1") or die ('ATUALIZA PACIENTE - '.mysql_error());
			$IdPaciente = $paciente[0];
		}
	


	//Inclusão do Prontuario
	
	$insereProntuario = mysql_query("Insert into prontuario VALUES 
	('','".dataSql($_POST[dtAtendimento])."','".$_POST[localAtendimento]."','".dataSql($_POST[dtRetorno])."','".nl2br($_POST[obsAtendimento])."',NOW(),'".$_SESSION[idLogin]."','".$IdPaciente."')") or die ('INSERE ATENDIMENTO - '.mysql_error());
	$IdProntuario = mysql_insert_id();
	
	for($c=0;$c<count($_POST[condutaCID]);$c++){
		$insereconduta = mysql_query("Insert into prontuario_itens VALUES ('','".$IdProntuario."','".$_POST[condutaCID][$c]."','".nl2br($_POST[condutaDESC][$c])."',NOW())") or die ('INSERE CONDUTA - '.mysql_error());
	}
	//Cadastro de Cirurgia	
	if($_POST[cCirurgia]=='S'){
	
		$inserecirurgia = mysql_query("Insert into cirurgia VALUES ('','".$_POST[localCirurgia]."','".$_POST[tipoCirurgia]."','".nl2br($_POST[obsCirurgia])."','".$IdPaciente."',NOW(),'".$_SESSION[idLogin]."')") or die ('INSERE CIRURGIA - '.mysql_error());
		$IdCirurgia = mysql_insert_id();
		
		$insereagenda = mysql_query("Insert into agenda VALUES ('','".dataSql($_POST[dtCirurgia])." ".$_POST[horaCirurgia]."','C','".$IdCirurgia."','',NOW(),'".$_SESSION[idLogin]."','".$IdPaciente."','".$IdProntuario."')") or die ('INSERE AGENDA CIRURGIA - '.mysql_error());
	}
	if($_POST[cAgendamento]=='S'){
	
		$insereagenda = mysql_query("Insert into agenda VALUES ('','".dataSql($_POST[dtRetorno])."','A','".$_POST[tipoRetorno]."','".nl2br($_POST[obsRetorno])."',NOW(),'".$_SESSION[idLogin]."','".$IdPaciente."','".$IdProntuario."')") or die ('INSERE AGENDA - '.mysql_error());
	}
if($insereProntuario){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Atendimento Cadastrado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_POST[step]=='2'){
if($_POST[iSuperior]!='S'){
$_POST[iSuperior]='N';
}
if($_POST[iLateral]!='S'){
$_POST[iLateral]='N';
}
if($_POST[iInferior]!='S'){
$_POST[iInferior]='N';
}

$Html = str_replace('"','',$_POST[FCKeditor1]);
$sqlIncluir = mysql_query("Update paginas set `dtaltPag`=NOW(),`urlPag`='$_POST[url]', `menusupPag`='$_POST[iSuperior]', `menulinkPag`='$_POST[iLateral]', `menuinfPag`='$_POST[iInferior]', `titulomenuPag`='$_POST[titulomenu]', `itemmenuPag`='$_POST[itemmenu]', `ordemPag`='$_POST[ordem]', `linkPag`='$_POST[link]', `targetPag`='$_POST[target]', `tituloPag`='$_POST[titulo]', `htmlPag`='$Html', `statuspag`='$_POST[status]' where idPag='$_POST[idPag]'") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Atendimento "<?=$_POST[titulo]?>" Cadastrada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

						<form name="users" id="users" action="index.php" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Atendimento 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Atendimentos</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="60" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" width="230" align="center" nowrap>&nbsp;Paciente</td>
<td class="tabletitlerow" width="250" align="center" nowrap>&nbsp;Local</td>

</tr>

<? 
$sqlUsuario = mysql_query("SELECT J.idProntuario,DATE_FORMAT(J.dtProntuario , '%d/%m/%Y') as dt, P.nomePaciente, A.nomeAtendimento FROM prontuario J inner join paciente P on (J.idPaciente=P.idPaciente) left join atendimento A on (J.idAtendimento=A.idAtendimento) ORDER BY dtProntuario, idProntuario desc") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, 'row2');">
<td colspan="" width="" align="center" valign=""><a href="index.php?_m=form&_a=viewAtendimento&id=<?=$sU[idProntuario]?>" title="Visualizar"><?=$sU[dt]?></a></td>
<td colspan="" width="" align="" valign="">&nbsp;<a href="index.php?_m=form&_a=viewAtendimento&id=<?=$sU[idProntuario]?>"><?=$sU[nomePaciente]?></a></td>
<td colspan="" valign=""><?=$sU[nomeAtendimento]?></td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Atendimento 1 de 2</td>
 <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
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

