<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="?_a=MinhaConta" title="News">Minha Conta </a></span></td>
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
if($dl[nrLogUsuario]==1){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="errorbox" style="">
<tbody><tr class="rowerror"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td>
<td align="left">Aten&ccedil;&atilde;o esse &eacute; seu primeiro acesso.<br />
  Recomendamos que mude sua senha. 
</td>
</tr></table></td></tr></tbody></table><BR />
<?
} 
?>
						<form name="swiftform" id="swiftform" action="index.php" method="POST">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Usu&aacute;rio </td>
</tr>
</thead>


<tbody>

<tr>
<td class="contenttableborder" colspan="2">

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="descrow" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="descrow" align="left" valign="top" colspan="5" >Informa&ccedil;&otilde;es Gerais  </td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nome</span></td>
<td class="row2" align="left" valign="top" colspan="" width=""><label for="yperm[perm_canviewregister]">
<input type="text" class="swifttext" name="NomeUsuario" id="NomeAuditor" value="<? echo $dl[nome] ?>" size="30" />
</label>
<label for="nperm[perm_canviewregister]"></label></td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row1" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">E-mail</span></td>
<td class="row1" align="left" valign="top" colspan="" width=""><input type="text" class="swifttext" value="<? echo $dl[emailUsuario] ?>" name="EmailUsuario" id="NomeAuditor2" size="30" /></td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Telefone</span></td>
<td class="row2" align="left" valign="top" colspan="" width=""><input type="text" class="swifttext" value="<? echo $dl[telefoneUsuario] ?>" name="TelefoneUsuario" id="NomeAuditor3" size="30" /></td>
</tr>
<tr class="descrow" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="descrow" align="left" valign="top" colspan="5" width="50%">Acesso  </td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td width="50%" height="20" colspan="" align="left" valign="top"><span class="tabletitle">Login </span></td>
<td width="" height="20" colspan="" align="left" valign="middle">&nbsp;<? echo $dl[login] ?></td>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Senha </span></td>
<td class="row2" align="left" valign="top" colspan="" width=""><input type="text" class="swifttext" name="SenhaUsuario" id="NomeAuditor5" size="30" /></td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td width="50%" colspan="" align="left" valign="top"><span class="tabletitle">Senha(Confirma&ccedil;&atilde;o) </span></td>
<td width="" colspan="" align="left" valign="top" class="row1"><input type="text" class="swifttext" name="ConfirmaSenha" id="NomeAuditor6" size="30" /></td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td width="50%" height="20" colspan="" align="left" valign="top" class="row1"><span class="tabletitle">&Uacute;ltimo Acesso</span></td>
<td width="" height="20" colspan="" align="left" valign="middle" class="row1">&nbsp;<? if($dl[nrLogUsuario]==1){ echo datahora($dl[dtLogUsuario]); }else{ echo datahora($dl[dtAntLogUsuario]);} ?></td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>

<input type="hidden" name="_m" value=""/>
<input type="hidden" name="_a" value="AlteraMinhaConta"/>
<input type="hidden" name="step" value="1"/>

</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=news&_a=managenews" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?&amp;_p=index" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>