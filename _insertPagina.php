				<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=form&_a=managerAtendimento" title="Manager Atendimento">Manager Atendimento </a> &raquo; <a href="index.php?_m=form&amp;_a=insertAtendimentoC" title="Inserir Atendimento">Inserir Atendimento Clínico </a></span></td>
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
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Página</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Titulo Página</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="titulo" id="titulo" value="" size="30" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Url</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="url" id="url" value="" size="30" /></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Menu</span></td>
  <td align="left" valign="top" colspan=""><input name="iSuperior" type="checkbox" id="iSuperior" value="S" />
    <label for="iSuperior">Superior</label>
     <input type="checkbox" name="iLateral" id="iLateral" />
     <label for="iLateral">Lateral</label> <input type="checkbox" name="iInferior" id="iInferior" />
     <label for="iInferior">Inferior</label></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Item Menu</span></td>
  <td align="left" valign="top" colspan=""><label for="itemmenu"></label>
    <select name="itemmenu" id="itemmenu">
      <option value="0">Inicial</option>
<? $sqlUsuario = mysql_query("SELECT titulomenuPag, idPag FROM Atendimentos A where itemmenuPag=0 ORDER BY ordemPag") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
      <option value="<?=$sU[idPag]?>"><?=$sU[titulomenuPag]?></option>
      <? }?>
    </select>    </td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Titulo Menu</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="titulomenu" id="titulomenu" value="" size="30" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Ordem Menu</span></td>
  <td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="ordem" id="ordem" value="" size="10" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Link</span></td>
  <td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="link" id="link" value="" size="60" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Onde Abrir</span></td>
  <td align="left" valign="top" colspan=""><label for="frame"></label>
    <select name="frame" id="frame">
      <option value="B">Nova P&aacute;gina</option>
      <option value="S" selected="selected">Atendimento Atual</option>
            </select></td>
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
$oFCKeditor->Height	= '700' ;
$oFCKeditor->Value		= '' ;
$oFCKeditor->Create() ;
?>
  
  </td>
  </tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
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
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerAtendimento"/>
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
						<td><span class="smalltext"><a href="index.php?_m=form&amp;_a=managerAtendimento" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			