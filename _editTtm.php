<script>
function adicionaCampo(id){
if(id!='0'){
$.get("buscaCampo.php",{id:id}, function(data){
vars = data.split('|')
inserirLinhaTabela(vars[0],vars[1]);
});
} else {
alert('Selecione o campo');
}
}
function delEquipamento(id){
if(id!='0'){
$.get("delLinha.php",{id:id}, function(data){
//alert(data);
if(data=='TRUE'){
elev="pe"+id;
var superior = document.getElementById(elev).parentNode;
var remover = document.getElementById(elev);
superior.removeChild(remover);
} else {
alert('No foi possivel remover o equipamento');
}
});
}
}
function delRow(valor)
{
document.getElementById('insereConduta').deleteRow(valor)
}
function inserirLinhaTabela(id,nome) {
// Captura a referncia da tabela com id "minhaTabela"
var table = document.getElementById("insereConduta");
// Captura a quantidade de linhas j existentes na tabela
var numOfRows = table.rows.length;
// Captura a quantidade de colunas da ltima linha da tabela
var numOfCols = table.rows[numOfRows-1].cells.length;
// Insere uma linha no fim da tabela.
var newRow = table.insertRow(numOfRows);
newRow.className = 'row2';
// Faz um loop para criar as colunas
// Insere uma coluna na nova linha
newCell = newRow.insertCell(0);
// Insere um contedo na coluna
newCell.innerHTML = '<a href="javascript:delRow('+ numOfRows +');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a>'
newCell = newRow.insertCell(1);
// Insere um contedo na coluna
newCell.innerHTML = '<center><input type="hidden" name="ID[]" value="'+id+'">'+nome+'</center>';
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr height="8">
<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
</tr>
<tr>
<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerTtm" title="Manager Famlia Preo">Manager Modelo</a> &raquo; Novo Modelo</span></td>
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
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Familia Master</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idFm" id="itemmenu">
<option value="0">Selecione a familia master</option>
<? $sqlUsuario = mysql_query("SELECT id, nome from familia_master ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
<option value="<?=$sU[id]?>" <? if($_REQUEST[idFm]==$sU[id]){?>selected="selected"<? }?>><?=$sU[nome]?></option>
<? }?>
</select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Legenda</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="nome" value="<?=$_REQUEST[nomeTtm]?>" size="30" style="width:90%;" /></td>
</tr>
</table></td></tr></tbody></table>
<br />
<br />
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
<td class="tabletitlerow" width="250" align="center" nowrap>&nbsp;Titulo</td>
</tr>
<?
$sqlUsuario = mysql_query("SELECT ttm.idTtm,ttm.nomeTtm, ttm.idFm, ttl.tituloTtl, ttm.idTtm, ttl.idTtl, ttl2.tituloTtl as parent FROM tabela_tecnica_modelo ttm inner join tabela_tecnica_linhas ttl on (ttl.idTtl=ttm.idTtl) left join tabela_tecnica_linhas ttl2 on (ttl2.idTtl=ttl.parentTtl) where ttm.idFm='".$_REQUEST[idFm]."' And ttm.nomeTtm='".$_REQUEST[nomeTtm]."' order by parent, tituloTtl") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");
?>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="pe<?=$sU[idTtm]?>" style="">
<td width="50"><a href="javascript:delEquipamento('<?=$sU[idTtm]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></td>
<td align="center" valign="top"><span class="tabletitle"><?=$sU[tituloTtl]?> <? if($sU[parent]!=''){?>(<?=$sU[parent]?>)<? } ?></span></td>
</tr>
<? } ?>
</table></td></tr></tbody></table>
<table width="100%" style="margin-top:3px;" border="0" cellspacing="0" cellpadding="0"><tr>
<td><select name="idCampo" id="itemmenu" onchange="adicionaCampo(this.value);">
<option value="0">Selecione o campo</option>
<?
//SELECT L.idLegenda, L.nomeLegenda as nome1 FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) where A.statusFamilia='A' group by A.nomeid order by L.nomeLegenda
$sqlMaster = mysql_query("SELECT ttl.idTtl, ttl.tituloTtl FROM tabela_tecnica_linhas ttl where ttl.parentTtl='0' ORDER BY ttl.tituloTtl") or die ("Could not connect to database: ".mysql_error());
while ($sM = mysql_fetch_array($sqlMaster)){
$sql = mysql_query("SELECT ttl.idTtl, ttl.tituloTtl FROM tabela_tecnica_linhas ttl where ttl.parentTtl='".$sM[idTtl]."' ORDER BY ttl.tituloTtl") or die ("Could not connect to database: ".mysql_error());
$t=mysql_num_rows($sql);
?>
<option value="<? if($t>0){?>0<? } else {?><?=$sM[idTtl]?><? }?>"><?=$sM[tituloTtl]?></option>
<? while ($sA = mysql_fetch_array($sql)){?>
<option value="<?=$sA[idTtl]?>"> - <?=$sA[tituloTtl]?></option>
<? } ?>
<? } ?>
</select><a href="javascript:" onclick="adicionaCampo(document.teamworkAtendimento.idCampo.options[document.teamworkAtendimento.idCampo.selectedIndex].value);" title="Back"><img src="themes/admin_default/action_add.gif" border="0">
</a></td>
</tr></table>
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerTtm"/>
<input type="hidden" name="step" value="1"/>
</form>
</td>
</tr>
<tr height="4">
<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
</tr>
<tr>
<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
<td><span class="smalltext"><a href="index.php?_m=teamwork&amp;_a=managerTtm" title="Back">&nbsp;Voltar</a></span></td>
</tr></table>
</tr>
									</table>
