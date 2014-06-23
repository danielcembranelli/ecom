				<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerCurso" title="Manager Curso">Manager Curso </a> &raquo; <a href="index.php?_m=teamwork&amp;_a=insertCurso" title="Inserir Curso">Inserir Curso </a></span></td>
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
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Curso</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nome</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="nomeCurso" id="nomeCurso" value="" size="30" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="tCurso" id="tCurso">
  <option value="C">Cursos e treinamentos</option>
  <option value="P">Palestras</option>
  <option value="W">Workshops</option>
  <option value="I">Internacionais</option>

 
</select></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Presencial</span></td>
  <td align="left" valign="top" colspan=""><input name="lCurso" type="radio" id="radio" value="P" checked="checked" />
    <label for="lCurso">Sim</label>
    <input type="radio" name="lCurso" id="radio2" value="O" />
    <label for="lCurso">Não</label></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Carga Hor&aacute;ria</span></td>
  <td align="left" valign="top" colspan=""><label for="itemmenu">
    <input type="text" class="swifttext" name="chCurso" id="chCurso" value="" size="30" />
  </label></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Vagas</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="vagasCurso" id="vagas" value="" size="20" /></td>
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
$oFCKeditor->Height	= '500' ;
$oFCKeditor->Value		= '' ;
$oFCKeditor->Create() ;
?>  </td>
  </tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="row1" align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
</tr>
</table></td></tr></tbody></table>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerCurso"/>
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
						<td><span class="smalltext"><a href="index.php?_m=teamwork&amp;_a=managerCurso" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			