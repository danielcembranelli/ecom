<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerFamiliaPreco" title="Manager Família Preço">Manager Família Preço</a></span></td>
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

	//Data de Nascimento
	$preco1 = str_replace("R$ ","",$_POST[preco1]);
	$preco1 = str_replace(".","",$preco1);
	$preco1 = str_replace(",",".",$preco1);
		
	$preco2 = str_replace("R$ ","",$_POST[preco2]);
	$preco2 = str_replace(".","",$preco2);
	$preco2 = str_replace(",",".",$preco2);	
	
	$preco3 = str_replace("R$ ","",$_POST[preco3]);
	$preco3 = str_replace(".","",$preco3);
	$preco3 = str_replace(",",".",$preco3);
	
	$minimo = str_replace("R$ ","",$_POST[minimo]);
	$minimo = str_replace(".","",$minimo);
	$minimo = str_replace(",",".",$minimo);

	//Verifica Paciente	
	$insereFamilia = mysql_query("Insert into preco (idFamilia, dtinicialPreco, dtfinalPreco, legendaPreco, valor1Preco, valor2Preco, valor3Preco, minimoPreco) VALUES ('".$_POST[familia]."','".dataSql($_POST[dtinicial])."','".dataSql($_POST[dtfinal])."','".$_POST[legenda]."','".$preco1."','".$preco2."','".$preco3."','".$minimo."')") or die (mysql_error());
	
	
if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Preço Cadastrado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_POST[step]=='2'){

	$preco1 = str_replace("R$ ","",$_POST[preco1]);
	$preco1 = str_replace(".","",$preco1);
	$preco1 = str_replace(",",".",$preco1);
		
	$preco2 = str_replace("R$ ","",$_POST[preco2]);
	$preco2 = str_replace(".","",$preco2);
	$preco2 = str_replace(",",".",$preco2);	
	
	$preco3 = str_replace("R$ ","",$_POST[preco3]);
	$preco3 = str_replace(".","",$preco3);
	$preco3 = str_replace(",",".",$preco3);
	
	$minimo = str_replace("R$ ","",$_POST[minimo]);
	$minimo = str_replace(".","",$minimo);
	$minimo = str_replace(",",".",$minimo);

	$insereFamilia = mysql_query("Update preco set idFamilia='".$_POST[familia]."', dtinicialPreco='".dataSql($_POST[dtinicial])."', dtfinalPreco='".dataSql($_POST[dtfinal])."', legendaPreco='".$_POST[legenda]."', valor1Preco='".$preco1."', valor2Preco='".$preco2."', valor3Preco='".$preco3."', minimoPreco='".$minimo."' where idPreco='".$_POST[id]."' Limit 1") or die (mysql_error());

if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Preço Alterado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<? if($_REQUEST[step]=='3'){
	
	$insereFamilia = mysql_query("Update preco set statusPreco='E' where idPreco='".$_REQUEST[id]."' Limit 1") or die (mysql_error());

if($insereFamilia){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Preço Excluido com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<script type="text/javascript"> 
function ConfirmaDel(valor)
{
var r=confirm("Você confima a exclusão?")
if (r==true)
  {
	window.location.replace("index.php?_m=teamwork&_a=managerFamiliaPreco&step=3&familia=<?=$_REQUEST[familia]?>&id="+valor)
  }
}
</script>
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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Preços - <?=nomeFamilia($_REQUEST[familia])?></td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Legenda</td>
<td class="tabletitlerow"  align="center" nowrap>&nbsp;Data inicial</td>
<td class="tabletitlerow"  align="center" nowrap>&nbsp;Data Final</td>
<td class="tabletitlerow"  align="center" nowrap>&nbsp;Valor 1</td>
<td class="tabletitlerow"  align="center" nowrap>&nbsp;Valor 2</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Valor 3</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Mínimo</td>
<td class="tabletitlerow" nowrap>&nbsp; </td>

</tr>

<? 
$sqlUsuario = mysql_query("SELECT idPreco as id, legendaPreco as nome, DATE_FORMAT(dtinicialPreco , '%d/%m/%Y') as dtinicio, DATE_FORMAT(dtfinalPreco, '%d/%m/%Y') as dtfinal, valor1Preco, valor2Preco, valor3Preco, minimoPreco FROM preco where idFamilia = '".$_REQUEST[familia]."' And statusPreco = 'A' ORDER BY legendaPreco") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign=""><a href="index.php?_m=teamwork&_a=editFamiliaPreco&id=<?=$sU[id]?>" title="Editar"><?=$sU[nome]?></a></td>
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=teamwork&_a=editFamiliaPreco&id=<?=$sU[id]?>"><?=$sU[dtinicio];?></a></td>
<td colspan="" align="center">&nbsp;<?=$sU[dtfinal];?></td>
<td colspan="" align="center">R$ <?=number_format($sU[valor1Preco], 2, ',', '');?></td>
<td colspan="" align="center">R$ <?=number_format($sU[valor2Preco], 2, ',', '');?></td>
<td colspan="" align="center">R$ <?=number_format($sU[valor3Preco], 2, ',', '');?></td>
<td colspan="" align="center">R$ <?=number_format($sU[minimoPreco], 2, ',', '');?></td>
<td colspan="" width="" align="center" valign=""><a href="javascript:ConfirmaDel('<?=$sU[id]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table><br />
<table width="100%" style="margin-top:10px;" border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="javascript:inserirLinhaTabela();" title="Back"><img src="themes/admin_default/action_add.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=teamwork&_a=insertFamiliaPreco&familia=<?=$_REQUEST[familia]?>" title="Nova Conduta">&nbsp;Novo Preço</a></span></td>
						</tr></table>
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

