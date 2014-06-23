				<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=form&_a=managerPagina" title="Manager Página">Manager Página </a> &raquo; <a href="index.php?_m=form&amp;_a=editPagina" title="Editar Página">Editar Página </a></span></td>
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
<? $sqlE = mysql_query("SELECT * from paginas where idpag=$_REQUEST[id]") or die ("Could not connect to database: ".mysql_error());
$sE = mysql_fetch_array($sqlE);
?>                        
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
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="titulo" id="titulo" value="<?=$sE[tituloPag]?>" size="30" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Url</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="url" id="url" value="<?=$sE[urlPag]?>" size="30" /></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Menu</span></td>
  <td align="left" valign="top" colspan=""><input name="iSuperior" type="checkbox" id="iSuperior" value="S" <? if($sE[menusupPag]=='S'){?>checked="checked"<? }?> />
    <label for="iSuperior">Superior</label>
     <input type="checkbox" name="iLateral" id="iLateral" <? if($sE[menulinkPag]=='S'){?>checked="checked"<? }?> />
     <label for="iLateral">Lateral</label> <input type="checkbox" name="iInferior" id="iInferior" <? if($sE[menuinfPag]=='S'){?>checked="checked"<? }?> />
     <label for="iInferior">Inferior</label></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Item Menu</span></td>
  <td align="left" valign="top" colspan=""><label for="itemmenu"></label>
    <select name="itemmenu" id="itemmenu">
      <option value="0"<? if($sE[itemmenuPag]==0){?>selected="selected"<? }?>>Inicial</option>
<? $sqlUsuario = mysql_query("SELECT titulomenuPag, idPag FROM paginas A where itemmenuPag=0 ORDER BY ordemPag") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
      <option value="<?=$sU[idPag]?>" <? if($sE[itemmenuPag]==$sU[idPag]){?>selected="selected"<? }?>><?=$sU[titulomenuPag]?></option>
      <? }?>
    </select>    </td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Titulo Menu</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="titulomenu" id="titulomenu" value="<?=$sE[titulomenuPag]?>" size="30" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Ordem Menu</span></td>
  <td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="ordem" id="ordem" value="<?=$sE[ordemPag]?>" size="10" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Link</span></td>
  <td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="link" id="link" value="<?=$sE[linkPag]?>" size="60" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Onde Abrir</span></td>
  <td align="left" valign="top" colspan=""><label for="frame"></label>
    <select name="frame" id="frame">
      <option value="B" <? if($sE[targetPag]=='B'){?>selected="selected"<? }?>>Nova P&aacute;gina</option>
      <option value="S" <? if($sE[itemmenuPag]=='S'){?>selected="selected"<? }?>>Pagina Atual</option>
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
$oFCKeditor->Value		= html_entity_decode($sE[htmlPag]) ;
$oFCKeditor->Create() ;
?>
  
  </td>
  </tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Status</span></td>
  <td align="left" valign="top" colspan=""><select name="status" id="status">
    <option value="R"<? if($sE[statusPag]=='R'){?>selected="selected"<? }?>>Rascunho</option>
    <option value="P"<? if($sE[statusPag]=='P'){?>selected="selected"<? }?>>Publicado</option>
    <option value="A"<? if($sE[statusPag]=='A'){?>selected="selected"<? }?>>Arquivado</option>
        </select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="row1" align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
</tr>
</table></td></tr></tbody></table>
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerPagina"/>
<input type="hidden" name="step" value="2"/>
<input type="hidden" name="idPag" value="<?=$sE[idPag]?>"/>

</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&amp;_a=managerPagina" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			