<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr height="8">
<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
</tr>
<tr>
<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerTtd" title="Manager Famlia Preo">Manager Familia</a> &raquo; Configurao de Dados</span></td>
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
foreach($_POST["CAMPO"] as $chave=>$opcao){
$s = mysql_query("SELECT idTtd FROM tabela_tecnica_dados where idTtl='".$chave."' And idFamilia='".$_POST[idFamilia]."'") or die ("#ERRO".mysql_error());
$s = mysql_fetch_array($s);
if($s[idTtd]=='' || $s[idTtd]=='0'){
$sqlIncluir = mysql_query("Insert into tabela_tecnica_dados (`idFamilia`,`idTtl`,valorTtd) values ('$_POST[idFamilia]','$chave','$opcao')") or die (mysql_error());
} else {
$sqlIncluir = mysql_query("Update tabela_tecnica_dados set valorTtd='$opcao' where idTtl='".$chave."' And idFamilia='".$_POST[idFamilia]."'") or die (mysql_error());
}
}
if($sqlIncluir){
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Dados Cadastrado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>
<form name="teamworkAtendimento" id="downloadfileteamwork" action="index.php" method="POST" enctype="multipart/teamwork-data">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes</td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Familia</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idFamilia" id="itemmenu" class="swifttext" style="width:500px;">
<option value="0">Selecione a familia master</option>
<? $sqlUsuario = mysql_query("SELECT id, L.nomeLegenda as nome, L2.nomeLegenda as marca, L1.nomeLegenda as categoria FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
<option value="<?=$sU[id]?>"<? if($_POST[idFamilia]==$sU[id]){?>selected="selected"<? } ?>><?=$sU[nome]?> <?=$sU[marca]?>  <?=$sU[modelo]?> <?=$sU[categoria]?></option>
<? }?>
</select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Modelo</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idModelo" id="itemmenu" class="swifttext">
<option value="0">Selecione a familia master</option>
<? $sqlUsuario = mysql_query("SELECT nomeTtm, idFm, nome from tabela_tecnica_modelo ttm left join familia_master fm on (fm.id=ttm.idFm) group by idFm, nomeTtm order by nome, nomeTtm") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
<option value="<?=$sU[idFm]?>#<?=$sU[nomeTtm]?>"<? if($_POST[idModelo]==$sU[idFm].'#'.$sU[nomeTtm]){?>selected="selected"<? } ?>><?=$sU[nome]?> (<?=$sU[nomeTtm]?>)</option>
<? }?>
</select></td>
</tr>
</table></td></tr></tbody></table>
<br /><center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Abrir" /></center>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerTtd"/>
</form>
<br />
<br />
<? if($_POST[idFamilia]!=''){?>
<form name="teamworkAtendimento" id="downloadfileteamwork" action="index.php" method="POST" enctype="multipart/teamwork-data">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Campos</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="tabletitlerow" width="20" align="center" nowrap></td>
<td class="tabletitlerow" width="20" align="center" nowrap></td>
<td class="tabletitlerow" width="250" align="center" nowrap>&nbsp;Valor</td>
</tr>
<?
$m = explode('#',$_POST[idModelo]);
$sqlUsuario = mysql_query("SELECT count(*) as total, ttl2.tituloTtl as parent FROM tabela_tecnica_modelo ttm inner join tabela_tecnica_linhas ttl on (ttl.idTtl=ttm.idTtl) left join tabela_tecnica_linhas ttl2 on (ttl2.idTtl=ttl.parentTtl) where ttm.idFm='".$m[0]."' And ttm.nomeTtm='".$m[1]."' group by parent ") or die (mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$c[$sU[parent]]=$sU[total];
}
$b='';
$sqlUsuario = mysql_query("SELECT ttm.nomeTtm, ttm.idFm, ttl.tituloTtl, ttm.idTtm, ttl.idTtl, ttl2.tituloTtl as parent FROM tabela_tecnica_modelo ttm inner join tabela_tecnica_linhas ttl on (ttl.idTtl=ttm.idTtl) left join tabela_tecnica_linhas ttl2 on (ttl2.idTtl=ttl.parentTtl) where ttm.idFm='".$m[0]."' And ttm.nomeTtm='".$m[1]."' order by parent, ttl.tituloTtl") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$s = mysql_query("SELECT valorTtd FROM tabela_tecnica_dados where idTtl='".$sU[idTtl]."' And idFamilia='".$_POST[idFamilia]."'") or die ("#ERRO".mysql_error());
$s = mysql_fetch_array($s);
$cor = ($coralternada++ %2 ? "row2" : "row1");
?>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<? if($sU[parent]!=''){?>
<? if($b!=$sU[parent]){?>
<td align="center" valign="center" width="20%" <? if($c[$sU[parent]]>1){?>rowspan="<?=$c[$sU[parent]]?>"<? } ?>><span class="tabletitle"><?=$sU[parent]?></span></td>
<? }
$b=$sU[parent];
} ?>
<td align="center" valign="top" <? if($sU[parent]==''){?>colspan="2"<? } ?> width="30%"><span class="tabletitle"><?=$sU[tituloTtl]?></span></td>
<td align="center" valign="top" colspan="" width="70%"><input type="text" name="CAMPO[<?=$sU[idTtl]?>]" class="swifttext" size="70"  value="<?=$s[valorTtd]?>" /></td>
</tr>
<? } ?>
</table></td></tr></tbody></table>
<br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="idFamilia" value="<?=$_POST[idFamilia]?>"/>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerTtd"/>
<input type="hidden" name="step" value="1"/>
</form>
<? }?>
</td>
</tr>
<tr height="4">
<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
</tr>
<tr>
<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
<td><span class="smalltext"><a href="index.php?_m=teamwork&amp;_a=managerTtd" title="Back">&nbsp;Voltar</a></span></td>
</tr></table>
</tr>
									</table>
