<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=ate&_a=relProposta" title="Estatística de Proposta">Estatística de Proposta</a></span></td>
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
<form name="users" id="users" action="index.php" method="POST">
<input type="hidden" name="_m" value="ate"/>
<input type="hidden" name="_a" value="relProposta"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" <? if($_SERVER["SCRIPT_NAME"]=='/Relatorio.php'){?>style="display:none"<? } ?>><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder" style="display:none"><tr><td class="highlightpage">Atendimento 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1"><!--Status <select name="statusProposta">
<option value="N" <? if($_POST[statusProposta]=='N'){?>selected="selected"<? } ?>>Em aberto</option>
<option value="L" <? if($_POST[statusProposta]=='L'){?>selected="selected"<? } ?>>Não Confirmada</option>
<option value="C" <? if($_POST[statusProposta]=='C'){?>selected="selected"<? } ?>>Confirmada</option>
<option value="F" <? if($_POST[statusProposta]=='F'){?>selected="selected"<? } ?>>Finalizada</option>
<option value="T" <? if($_POST[statusProposta]=='T'){?>selected="selected"<? } ?>>Excluida</option>
</select> <? if($dl[tipoUsuario]!='V'){?>Filtro por <select name="idVendedor" id="idVendedor">
<option value="">Selecione o vendedor</option>
<?


$Sql = mysql_query("Select id, nome from login where (tipoUsuario='A') or (tipoUsuario='C') or (tipoUsuario='V')  order by nome") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($_REQUEST[idVendedor]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } ?>
</select><? } ?> &nbsp;Proposta Nr. <input type="text" name="nrProposta" value="<?=$_POST[nrProposta]?>" class="quicksearch" /> -->Filtro de <input type="text" name="dtInicial" value="<?=$_POST[dtInicial]?>" class="quicksearch" /> até <input type="text" name="dtFinal" class="quicksearch" value="<?=$_POST[dtFinal]?>" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>
<td class="navpageselected" nowrap><a onclick="javascript:SubmitRelatorio();" href="#" title="Opções">Imprimir</a></td>
<td class="navpageselected" nowrap style="display:none"><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Opções">Opções</a></td>
</tr></table></td></tr></table></tr></td>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse;width: 100%; height: 100%;DISPLAY: none;" id="gridtableoptusers"><tr style="height: 1em"><td align="left"><div id="gridoptusers"><ul id="tab"><li><a class="currenttab" href="#" onClick="this.blur(); return switchGridTab('massaction', 'gridoptions')" id="massaction" title="Mass Action">Mass Action</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('search', 'gridoptions')" id="search" title="Advanced Search">Advanced Search</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('settings', 'gridoptions');" id="settings" title="Settings">Settings</a></li></ul></div></td></tr>
<tr style="height: 1em"><td align="left"><div id="tab_massaction" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborder"><tr class="row1"><td align="left" width="60">Action: </td><td align="left"><select name="mass_action" onChange="javascript:return doformConfirm('Are you sure you wish to continue?', this);" class="swiftselect"><option name="firstselect" value="">- Select -</option>
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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Proposta</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr>
<td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Vendedor</td>
<td class="tabletitlerow" width="18%" align="center" nowrap>&nbsp;Propostas Emitidas</td>
<td class="tabletitlerow" width="18%" align="center" nowrap>&nbsp;Confirmadas</td>
<td class="tabletitlerow" width="18%" align="center" nowrap>&nbsp;Não Confirmadas</td>
<td class="tabletitlerow" width="18%" align="center" nowrap>&nbsp;Concluidas</td>

</tr>
<? 
$montaWhere = "SELECT p.idVendedor,l.nome, count(*) as total FROM proposta p inner join login l on (l.id=p.idVendedor) ";
$type=0;

//if($_POST[statusProposta]==''){
//$_POST[statusProposta]='T';
//	$montaWhere = $Sql.' where p.statusProposta!="'.$_POST[statusProposta].'"';
//} else {
//	$montaWhere = $Sql.' where p.statusProposta="'.$_POST[statusProposta].'"';
//}
//	if($dl[tipoUsuario]=='V'){
//		$Sql.=" And p.idVendedor='".$dl[id]."'";
//	}
//	$type = 1;



//if($_REQUEST[idCliente]!=''){
//	$montaWhere .= " And p.idCliente='$_REQUEST[idCliente]'";
//}
//if($dl[tipoUsuario]=='V'){
//$_POST[idVendedor]=$dl[id];
//$Sql.="where p.idVendedor='".$dl[id]."'";
//}
//if($_POST[idVendedor]!=''){
//	$montaWhere .= " And p.idVendedor='$_POST[idVendedor]'";
//	$type = 1;
//}

if($_POST[dtInicial]!=''){
	
	$dti = explode('/',$_POST[dtInicial]);
	$dtf = explode('/',$_POST[dtFinal]);
	
	$montaWhere .= "where p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}
//if($_POST[nrProposta]!=''){

	//$montaWhere .= " And p.idProposta = '".$_POST[nrProposta]."'";

//}
	$montaWhere .= " And statusProposta!='T' group by idVendedor";
	//echo $montaWhere;
$sqlUsuario = mysql_query($montaWhere) or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" align="left">&nbsp;<?=$sU[nome];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[total];?></td>
<td colspan="" align="center">&nbsp;<?
$sl = "SELECT count(*) as confirma FROM proposta p where idVendedor='".$sU[idVendedor]."' And statusProposta!='T'";
if($_POST[dtInicial]!=''){
$sl .= " And p.confirmaProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}

$SqlC = mysql_query($sl);
$sC = mysql_fetch_array($SqlC);
echo $sC[confirma];?></td>
<td colspan="" align="center">&nbsp;<?
$sl = "SELECT count(*) as confirma FROM proposta p where idVendedor='".$sU[idVendedor]."' And statusProposta='L'";
if($_POST[dtInicial]!=''){
$sl .= " And p.dtcancelaProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}

$SqlC = mysql_query($sl);
$sC = mysql_fetch_array($SqlC);
echo $sC[confirma];?></td>
<td colspan="" align="center">&nbsp;<?
$sc = "SELECT count(*) as conclui FROM proposta p where idVendedor='".$sU[idVendedor]."' And statusProposta!='T'";
if($_POST[dtInicial]!=''){
$sc .= " And p.concluiProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}

$SqlC = mysql_query($sc);

$sC = mysql_fetch_array($SqlC);
echo $sC[conclui];?></td>

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


</form>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

