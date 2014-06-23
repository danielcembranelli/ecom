				<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Relat&oacute;rio &raquo; Clientes por Cidade</span></td>
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
						
						<form name="downloadfileform" id="downloadfileform" action="RelatorioClienteCidade.php"  target="_blank" method="POST" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Filtro</td>
</tr>
</thead>
<tbody>
 
<tr>
  <td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Cidade</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="CIDADE[]" id="CIDADE[]" size="10" multiple="multiple">
<?
$sqlUsuario = mysql_query("SELECT Cli_UF, Cli_Cidade, count(*) as total FROM clientes c group by Cli_Cidade order by Cli_UF, Cli_Cidade") or die ("Could not connect to database: ".mysql_error());
while($sU = mysql_fetch_array($sqlUsuario)){
?>
<option value="<?=$sU[Cli_Cidade]?>"><?=$sU[Cli_UF]?> - <?=$sU[Cli_Cidade]?> (<?=$sU[total]?>)</option>
<?	
}
?>

</select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Ultima emissão de proposta</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="Dias" id="idVendedor" class="quicksearch">
<option value="">Periodo</option>
<option value="3" <? if($_SESSION[buscaUltimo][Dias]=='3'){?>selected="selected"<? } ?>>3 meses</option>
<option value="6" <? if($_SESSION[buscaUltimo][Dias]=='6'){?>selected="selected"<? } ?>>6 meses</option>
<option value="12" <? if($_SESSION[buscaUltimo][Dias]=='12'){?>selected="selected"<? } ?>>12 meses</option>
<option value="18" <? if($_SESSION[buscaUltimo][Dias]=='18'){?>selected="selected"<? } ?>>18 meses</option>
<option value="24" <? if($_SESSION[buscaUltimo][Dias]=='24'){?>selected="selected"<? } ?>>24 meses</option>
<option value="36" <? if($_SESSION[buscaUltimo][Dias]=='36'){?>selected="selected"<? } ?>>36 meses</option>
<option value="48" <? if($_SESSION[buscaUltimo][Dias]=='48'){?>selected="selected"<? } ?>>48 meses</option>
<option value="50" <? if($_SESSION[buscaUltimo][Dias]=='50'){?>selected="selected"<? } ?>>50 meses</option>

</select></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
  <td class="row2" align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Consultar" /></td>
</tr>
</table></td></tr></tbody></table>
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerProduto"/>
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
						<td><span class="smalltext"><a href="index.php?_m=downloads&amp;_a=managecategories" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			