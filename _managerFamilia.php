<script type="text/javascript">
function ConfirmaDel(valor)
{
var r=confirm("Voc confima a excluso?")
if (r==true)
{
window.location.replace("index.php?_m=teamwork&_a=managerFamilia&step=3&id="+valor)
}
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr height="8">
<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
</tr>
<tr>
<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerFamilia" title="Manager Famlia">Manager Famlia</a></span></td>
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
if($_POST[step]=='1'){
//Data de Nascimento
$nF = explode("#",$_POST[nomeFamilia]);
if($nF[1]==''){
$insere = mysql_query("Insert into legendas VALUES ('','N','".$_POST[nomeFamilia]."')") or die (mysql_error());
$IdNomeFamilia = mysql_insert_id();
} else {
$IdNomeFamilia = $nF[0];
}
$mF = explode("#",$_POST[marcaFamilia]);
if($mF[1]==''){
$insere = mysql_query("Insert into legendas VALUES ('','M','".$_POST[marcaFamilia]."')") or die (mysql_error());
$IdMarcaFamilia = mysql_insert_id();
} else {
$IdMarcaFamilia = $mF[0];
}
$cF = explode("#",$_POST[categoriaFamilia]);
if($cF[1]==''){
$insere = mysql_query("Insert into legendas VALUES ('','C','".$_POST[categoriaFamilia]."')") or die (mysql_error());
$IdCategoriaFamilia = mysql_insert_id();
} else {
$IdCategoriaFamilia = $cF[0];
}
$cO = explode("#",$_POST[modeloFamilia]);
if($cO[1]==''){
$insere = mysql_query("Insert into legendas VALUES ('','O','".$_POST[modeloFamilia]."')") or die (mysql_error());
$IdModeloFamilia = mysql_insert_id();
} else {
$IdModeloFamilia = $cO[0];
}
$preco1 = str_replace("R$ ","",$_POST[valorbem]);
$preco1 = str_replace(".","",$preco1);
$preco1 = str_replace(",",".",$preco1);
$seguro = str_replace("% ","",$_POST[seguro]);
$seguro = str_replace(".","",$seguro);
$seguro = str_replace(",",".",$seguro);
$consumo = str_replace(',','.',$_POST[consumo]);
//Verifica Paciente
$insereFamilia = mysql_query("Insert into familia (grupo, master, nomeid, marcaid, categoriaid, modeloid, mapaes,valorbemFamilia,potenciaFamilia,consumoFamilia,idOt,descFamilia,seguroFamilia, midFEquipamento, midFAcessorio1, midFAcessorio2) VALUES ('".$_POST[grupo]."','".$_POST[idFamiliamaster]."','".$IdNomeFamilia."','".$IdMarcaFamilia."','".$IdCategoriaFamilia."','".$IdModeloFamilia."','".$_POST[mapaes]."','".$preco1."','".$_POST[potencia]."','".$consumo."','".$_POST[operador]."','".nl2br($_POST[desc])."','".$seguro."','".$_POST[midFEquipamento]."','".$_POST[midFAcessorio1]."','".$_POST[midFAcessorio2]."')") or die (mysql_error());
if($insereFamilia){
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Familia Cadastrada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<? if($_POST[step]=='2'){
$nF = explode("#",$_POST[nomeFamilia]);
if($nF[1]==''){
$insere = mysql_query("Insert into legendas VALUES ('','N','".$_POST[nomeFamilia]."')") or die ('ERRO 1: '.mysql_error());
$IdNomeFamilia = mysql_insert_id();
} else {
$insere = mysql_query("Update legendas set nomeLegenda='".$nF[1]."' where idLegenda='".$nF[0]."'") or die ('ERRO 2: '.mysql_error());
$IdNomeFamilia = $nF[0];
}
$mF = explode("#",$_POST[marcaFamilia]);
if($mF[1]==''){
$insere = mysql_query("Insert into legendas VALUES ('','M','".$_POST[marcaFamilia]."')") or die ('ERRO 3: '.mysql_error());
$IdMarcaFamilia = mysql_insert_id();
} else {
$insere = mysql_query("Update legendas set nomeLegenda='".$mF[1]."' where idLegenda='".$mF[0]."' ") or die ('ERRO 4: '.mysql_error());
$IdMarcaFamilia = $mF[0];
}
$cF = explode("#",$_POST[categoriaFamilia]);
if($cF[1]==''){
$insere = mysql_query("Insert into legendas (tipoLegenda,nomeLegenda) VALUES ('C','".$_POST[categoriaFamilia]."')") or die ('ERRO 5: '.mysql_error());
$IdCategoriaFamilia = mysql_insert_id();
} else {
$insere = mysql_query("Update legendas set nomeLegenda='".$cF[1]."' where idLegenda='".$cF[0]."' ") or die ('ERRO 6: '.mysql_error());
$IdCategoriaFamilia = $cF[0];
}
$cO = explode("#",$_POST[modeloFamilia]);
if($cO[1]==''){
$insere = mysql_query("Insert into legendas VALUES ('','O','".$_POST[modeloFamilia]."')") or die ('ERRO 7: '.mysql_error());
$IdModeloFamilia = mysql_insert_id();
} else {
$insere = mysql_query("Update legendas set nomeLegenda='".$cO[1]."' where idLegenda='".$cO[0]."' ") or die ('ERRO 8: '.mysql_error());
$IdModeloFamilia = $cO[0];
}
//Verifica Paciente
$preco1 = str_replace("R$ ","",$_POST[valorbem]);
$preco1 = str_replace(".","",$preco1);
$preco1 = str_replace(",",".",$preco1);
$seguro = str_replace("%","",$_POST[seguro]);
$seguro = str_replace(".","",$seguro);
$seguro = str_replace(",",".",$seguro);
$consumo = str_replace(',','.',$_POST[consumo]);
move_uploaded_file($_FILES[imagem][tmp_name],'equipamento\\'.$_POST[id].'_'.$_FILES[imagem][name]);
//	echo "Update familia set grupo='".$_POST[grupo]."', master='".$_POST[idFamiliamaster]."', nomeid='".$IdNomeFamilia."', marcaid='".$IdMarcaFamilia."', modeloid='".$IdModeloFamilia."', categoriaid='".$IdCategoriaFamilia."', mapaes='".$_POST[mapaes]."', valorbemFamilia='".$preco1."', potenciaFamilia='".$_POST[potencia]."', consumoFamilia='".$consumo."', seguroFamilia='".$seguro."', idOt='".$_POST[operador]."', descFamilia='".nl2br($_POST[desc])."', midFEquipamento='".$_POST[midFEquipamento]."',midFAcessorio1='".$_POST[midFAcessorio1]."',midFAcessorio2='".$_POST[midFAcessorio2]."' where id='".$_POST[id]."' Limit 1";
$insereFamilia = mysql_query("Update familia set grupo='".$_POST[grupo]."', master='".$_POST[idFamiliamaster]."', nomeid='".$IdNomeFamilia."', marcaid='".$IdMarcaFamilia."', modeloid='".$IdModeloFamilia."', categoriaid='".$IdCategoriaFamilia."', mapaes='".$_POST[mapaes]."', valorbemFamilia='".$preco1."', potenciaFamilia='".$_POST[potencia]."', consumoFamilia='".$consumo."', seguroFamilia='".$seguro."', idOt='".$_POST[operador]."', descFamilia='".nl2br($_POST[desc])."', midFEquipamento='".$_POST[midFEquipamento]."',midFAcessorio1='".$_POST[midFAcessorio1]."',midFAcessorio2='".$_POST[midFAcessorio2]."', imgFamilia='".$_POST[id]."_".$_FILES[imagem][name]."' where id='".$_POST[id]."' Limit 1") or die ('ERRO 9: '.mysql_error());
if($insereFamilia){
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Familia Alterada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<? if($_REQUEST[step]=='3'){
$insereFamilia = mysql_query("Update familia set statusFamilia='E' where id='".$_REQUEST[id]."' Limit 1") or die (mysql_error());
if($insereFamilia){
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Familia Excluida com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<teamwork name="users" id="users" action="index.php" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Atendimento 1 de 1</td>
<td class='navpageselected'><a href='index.php?_m=teamwork&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=teamwork&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1"><input type="text" name="quicksearch" class="quicksearch" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>
<td class="navpageselected" nowrap><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Opes">Opes</a></td>
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
<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Familias</td>
</tr>
</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Nome</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Marca</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Modelo</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Categoria</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;Grupo</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>
</tr>
<?
$sqlUsuario = mysql_query("SELECT midFEquipamento, id, nome,grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where A.statusFamilia='A' ORDER BY nome1, marca, categoria, modelo") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<? if($sU[nome1]==''){?>
<td colspan="4" width="" align="left" valign="">(<?=$sU[midFEquipamento];?>)&nbsp;<a href="index.php?_m=teamwork&_a=editFamilia&id=<?=$sU[id]?>"><?=$sU[nome];?></a></td>
<? } else { ?>
<td colspan="" width="" align="center" valign="">(<?=$sU[midFEquipamento];?>)&nbsp;<a href="index.php?_m=teamwork&_a=editFamilia&id=<?=$sU[id]?>"><?=$sU[nome1];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=teamwork&_a=editFamilia&id=<?=$sU[id]?>"><?=$sU[marca];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=teamwork&_a=editFamilia&id=<?=$sU[id]?>"><?=$sU[modelo];?></a></td>
<td colspan="" align="center"><a href="index.php?_m=teamwork&_a=editFamilia&id=<?=$sU[id]?>"><?=$sU[categoria];?></a></td>
<? } ?>
<td colspan="" align="center"><?=$sU[grupo];?></td>
<td colspan="" width="" align="center" valign=""><a href="index.php?_m=teamwork&_a=managerFamiliaPreco&familia=<?=$sU[id]?>" title="Configurar Preo">Preo</a> | <a href="index.php?_m=teamwork&_a=managerFamiliaIrma&familia=<?=$sU[id]?>" title="Configurar Equivalente">Equivalente</a> | <a href="javascript:ConfirmaDel('<?=$sU[id]?>');" title="Apagar">Excluir</a></td>
</tr>
<? } ?>
</table>
</td></tr></tbody></table>
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
