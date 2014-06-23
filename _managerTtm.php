<script type="text/javascript">
function ConfirmaDel(valor)
{
var r=confirm("Você confima a exclusão?")
if (r==true)
  {
	window.location.replace("index.php?_m=teamwork&_a=managerTtm&step=3&idOperadora="+valor)
  }
}
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerTtm" title="Manager Nome Coluna">Manager Modelo</a></span></td>
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
foreach($_POST["ID"] as $opcao){
	$sqlIncluir = mysql_query("Insert into tabela_tecnica_modelo (`nomeTtm`,`idFm`,`idTtl`) values ('$_POST[nome]','$_POST[idFm]','$opcao')") or die (mysql_error());
}
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Nome "<?=$_POST[nome]?>" Cadastrado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
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
    <tr>
    	<td>
            <table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr valign="top">
                <td align="right" width="1">
                	<table border="0" cellpadding="0" cellspacing="1" class="tborder">
                    <tr>
                        <td class="navpageselected" nowrap><a href="index.php?_m=teamwork&_a=insertTtm" title="Novo Modelo">Novo Modelo</a></td>
                    </tr>
				</table>
</td>
</tr>
</table>
</tr>
</td>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr>
</table>


<form action="index.php" method="post">
<? if($_REQUEST[funcao]=='edit'){
$sqlEdita = mysql_query("SELECT idTtl, tituloTtl, parentTtl FROM tabela_tecnica_linhas where idTtl  ='".$_REQUEST[id]."'") or die ("#ERRO:".mysql_error());
$sE = mysql_fetch_array($sqlEdita);
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Edição de Modelo</td>
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
<input type="hidden" name="_a" value="managerTtm"/>
<input type="hidden" name="step" value="2"/>

<? } 
if($_REQUEST[funcao]=='insert'){?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Cadastro de Modelo</td>
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
<input type="hidden" name="_a" value="managerTtm"/>
<input type="hidden" name="step" value="1"/>
<? } ?>
</form>
<? if($_REQUEST[funcao]==''){?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Modelos</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" align="left" nowrap>&nbsp;Nome</td>
<td class="tabletitlerow" align="left" nowrap>&nbsp;Familia</td>
</tr>

<? 
$sqlUsuario = mysql_query("SELECT nomeTtm, idFm, nome from tabela_tecnica_modelo ttm left join familia_master fm on (fm.id=ttm.idFm) group by idFm, nomeTtm order by nome, nomeTtm ") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=teamwork&_a=editTtm&idFm=<?=$sU[idFm]?>&nomeTtm=<?=$sU[nomeTtm]?>" title="Editar"><?=$sU[nomeTtm]?></a></td>
<td colspan="" width="" align="" valign="">&nbsp;<a href="index.php?_m=teamwork&_a=editTtm&idFm=<?=$sU[idFm]?>&nomeTtm=<?=$sU[nomeTtm]?>" title="Editar"><?=$sU[nome]?></a></td>
</tr>
<? } ?>

</table>
<? } ?>
</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
</td>
</tr></td></table>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerTtm"/>

</form>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

