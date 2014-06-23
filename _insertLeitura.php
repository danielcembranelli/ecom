				<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=livesupport&_a=managerLeitura" title="Manager Leitura">Manager Leitura</a> &raquo; <a href="index.php?_m=livesupport&amp;_a=insertLeitura" title="Inserir Leitura">Inserir Leitura</a></span></td>
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
						
						<form name="downloadfilelivesupport" id="downloadfilelivesupport" action="index.php" method="POST" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Leitura</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="tipo" id="tipo">
  <option value="A">Artigos</option>
  <option value="F">Filmes</option>
  <option value="N">Not&iacute;cias</option>
  <option value="L">Livros</option>
  <option value="R">Resenhas</option>
</select></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Titulo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="titulo" id="titulo" value="" size="50" /></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Descri&ccedil;&atilde;o</span></td>
  <td align="left" valign="top" colspan=""><label for="textarea"></label>
    <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea>
    <label for="iInferior"></label></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Imagem</span></td>
  <td align="left" valign="top" colspan=""><label for="itemmenu"></label>
    <input type="text" class="swifttext" name="imagem" id="imagem" value="" size="30" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan="2">
<?php
	include("fckeditor/fckeditor.php") ;
// Automatically calculates the editor base path based on the _samples directory.
// This is usefull only for these samples. A real application should use something like this:
// $oFCKeditor->BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.
$sBasePath = $_SERVER['PHP_SELF']."/fckeditor" ;
$sBasePath = substr( $sBasePath, 0, strpos( $sBasePath, "_samples" ) ) ;
$sBasePath = 
$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath	= 'fckeditor/' ;
$oFCKeditor->Height	= '300' ;
$oFCKeditor->Value		= '' ;
$oFCKeditor->Create() ;
?>  </td>
  </tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Endere&ccedil;o de Refer&ecirc;ncia</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="url" id="url" value="" size="50" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Status</span></td>
  <td align="left" valign="top" colspan=""><select name="status" id="status">
    <option value="R">Rascunho</option>
    <option value="P" selected="selected">Publicado</option>
    <option value="A">Arquivado</option>
        </select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="row1" align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
</tr>
</table></td></tr></tbody></table>
<input type="hidden" name="_m" value="livesupport"/>
<input type="hidden" name="_a" value="managerLeitura"/>
<input type="hidden" name="step" value="1"/>

</livesupport>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=livesupport&amp;_a=managerPagina" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			