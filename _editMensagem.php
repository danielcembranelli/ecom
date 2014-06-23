				<?
		$sqlEdita = mysql_query("SELECT m.idMensagem,m.descMensagem, m.identificadorMensagem, m.campanha_idCampanha, m.subjectMensagem, m.remetenteMensagem, m.emailMensagem, m.emailrespostaMensagem, m.leituraMensagem, m.htmlMensagem FROM mensagem m where m.idMensagem='$_REQUEST[idMensagem]' order by idMensagem Limit 1") or die (mysql_error());
		$sE = mysql_fetch_array($sqlEdita);
		?>
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Manager Mensagem </a> &raquo; Editar Mensagem</span></td>
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
						
						<form name="downloadfileform" id="downloadfileform" action="index.php" method="POST" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Mensagem</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nome</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="txtNome" id="txtNome" value="<?=$sE[identificadorMensagem]?>" size="50" /></td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Descri&ccedil;&atilde;o</span></td>
<td align="left" valign="top" colspan="" width="50%"><textarea name="txtDesc" cols="50" class="swifttext" id="txtDesc"><?=strip_tags($sE[descMensagem]);?></textarea></td>
</tr>

<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="50%">Informa&ccedil;&otilde;es da Mensagem</td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Assunto (subject)</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="txtAssunto" id="txtAssunto" value="<?=$sE[subjectMensagem]?>" size="50" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nome Remetente</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="txtNomeRemetente" id="txtNomeRemetente" value="<?=$sE[remetenteMensagem]?>" size="50" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">E-mail Remetente</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="txtEmailRemetente" id="txtEmailRemetente" value="<?=$sE[emailMensagem]?>" size="50" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">E-mail de Resposta</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="txtResposta" id="txtResposta" value="<?=$sE[emailrespostaMensagem]?>" size="50" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Notifica&ccedil;&atilde;o de Entrega</span></td>
<td align="left" valign="top" colspan="" width="50%"><label>
  <input name="txtLeitura" type="checkbox" id="txtLeitura"<? if($sE[leituraMensagem]==1){?>checked="checked"<? }?> value="1" />
  Confirmação de Leitura</label></td>
</tr>

<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="50%">Conte&uacute;do da Mensagem</td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="top" colspan="6"><?php
	include("fckeditor/fckeditor.php") ;
// Automatically calculates the editor base path based on the _samples directory.
// This is usefull only for these samples. A real application should use something like this:
// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.
$sBasePath = $_SERVER['PHP_SELF']."/fckeditor" ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
$sBasePath = 
$oFCKeditor = new FCKeditor('txtHTML') ;
$oFCKeditor->BasePath	= 'fckeditor/' ;
$oFCKeditor->Value		= $sE[htmlMensagem];
$oFCKeditor->Create() ;
?></td>
</tr>



<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
  <td class="row1" align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
</tr>
</table></td></tr></tbody></table>
<input type="hidden" name="_m" value="oper"/>
<input type="hidden" name="_a" value="managerMensagem"/>
<input type="hidden" name="step" value="2"/>
<input type="hidden" name="id" value="<?=$sE[idMensagem];?>" />

</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=ate&_a=managerBriefing" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=ate&_a=managerBriefing" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			