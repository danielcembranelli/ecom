<?
include("Verifica.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eCom :: Extranet || Impress&atilde;o de Etiqueta</title>
</head>
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />
<script language="Javascript">
var themepath = "themes/admin_default/";
var swiftpath = "";
var BLANK_IMAGE="themes/admin_default/space.gif";
var swiftsessionid = "d36e1720d517163a6a2a9744dc7fe143";
var swiftiswinapp = "0";
var cparea = "admin";
</script>
<link rel="stylesheet" type="text/css" media="all" href="themes/admin_default/calendar-blue.css" title="winter" />
<script type="text/javascript" src="js/PlanoDeAcao.js"></script>
<script type="text/javascript" src="themes/admin_default/calendar.js"></script>
<script type="text/javascript" src="themes/admin_default/lang/calendar-en-us.js"></script>
<script type="text/javascript" src="themes/admin_default/calendar-setup.js"></script>
<script type="text/javascript" src="includes/Spellcheck/spellChecker.js"></script>
<script type="text/javascript" src="files/3ec0a57a0e43e8142b8bcf0793fc3ba9.js"></script>

<script type="text/javascript" src="themes/admin_default/main.js"></script>
<script type="text/javascript">
</script>
<script type="text/javascript" src="js/staffcpmenuclick.js"></script><script language="Javascript">
//HTMLArea.loadPlugin("TableOperations");
function loadAllData() { preloadMenuImages(); 			var irsField = browserObject("staffirs");
		if (irsField)
		{
			window.$IRS = globalirs = new IRSAutoComplete(document.getElementById('staffirs'));
		}
	}
</script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type='text/javascript' src='jquery-autocomplete/lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='jquery-autocomplete/lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='jquery-autocomplete/lib/thickbox-compressed.js'></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.price_format.1.3.js"></script>
<script type='text/javascript' src='jquery-autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css" />
<script type="text/javascript">
function chec(tabela,valor){
	if(valor==true){
	document.getElementById(tabela).style.display = 'block'
	} else {
	document.getElementById(tabela).style.display = 'none'
	}
}
</script>				<table width="650" border="0" cellspacing="0" cellpadding="0">
<tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Manager Cliente &raquo; Impress&atilde;o de Etiqueta</span></td>
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
						<td colspan="2" align="center">
						
						<form name="etiqueta" id="downloadfileform" action="report/Label.php" target="_blank" method="POST" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="95%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Etiqueta para Cliente</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td  width="30%"align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><span class="tabletitle">Formulário Pimaco</span></td>
    </tr>
    <tr>
      <td align="center">
<input name="MODELO" type="radio" id="radio" value="6281" checked="checked" />
<label for="MODELO">2 Colunas (6281)</label>	</td>
    </tr>
    <tr>
      <td align="center">
      <input type="radio" name="radio2" id="radio2" value="radio2" disabled="disabled" />
<label for="radio2">3 Colunas (6280)</label>      </td>
    </tr>
  </table></td>
<td width="20%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><span class="tabletitle">Coluna</span></td>
    </tr>
    <tr>
      <td align="center">
        <input name="COLUNA" type="radio" id="radio3" value="1" checked="checked" />
        <label for="COLUNA">1</label>
        <input type="radio" name="COLUNA" id="radio4" value="2" />
        <label for="COLUNA">2</label>	</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>  </td>
<td width="50%" align="left" valign="top">

<?
$sqlUsuario = mysql_query("Select DATE_FORMAT(c.Cli_Cadastro,'%d/%m/%Y %H:%i:%s') as dtcad1,DATE_FORMAT(c.dtcadCli,'%d/%m/%Y %H:%i:%s') as dtcad,DATE_FORMAT(c.dtaltCli,'%d/%m/%Y %H:%i:%s') as dtalt, c.* from clientes c where Cli_ID ='".$_REQUEST[idCliente]."' Limit 1") or die ("Could not connect to database: ".mysql_error());
$sU = mysql_fetch_array($sqlUsuario);
?>     
<script> 
function DadosBasicos(){
	document.etiqueta.LINHA1.value = '<?=$sU[Cli_Nome]?>';
	document.etiqueta.LINHA2.value = '<?=$sU[Cli_Endereco]?>, <?=$sU[Cli_Numero]?> <?=$sU[Cli_Complemento]?>';
	document.etiqueta.LINHA3.value = '<?=$sU[Cli_Bairro]?>';
	document.etiqueta.CEP.value = '<?=$sU[Cli_CEP]?>';
	document.etiqueta.CIDADE.value = '<?=$sU[Cli_Cidade]?>';
	document.etiqueta.UF.value = '<?=$sU[Cli_UF]?>';
}
function Cobranca(){
	document.etiqueta.LINHA1.value = '<?=$sU[Cli_Nome]?>';
	document.etiqueta.LINHA2.value = '<?=$sU[Cli_EndCob]?>, <?=$sU[Cli_NumCob]?> <?=$sU[Cli_ComCob]?>';
	document.etiqueta.LINHA3.value = '<?=$sU[Cli_BaiCob]?>';
	document.etiqueta.CEP.value = '<?=$sU[Cli_CepCob]?>';
	document.etiqueta.CIDADE.value = '<?=$sU[Cli_CidCob]?>';
	document.etiqueta.UF.value = '<?=$sU[Cli_UFCob]?>';
}
function Entrega(){
	document.etiqueta.LINHA1.value = '<?=$sU[Cli_Nome]?>';
	document.etiqueta.LINHA2.value = '<?=$sU[Cli_EndEnt]?>, <?=$sU[Cli_NumEnt]?> <?=$sU[Cli_ComEnt]?>';
	document.etiqueta.LINHA3.value = '<?=$sU[Cli_BaiEnt]?>';
	document.etiqueta.CEP.value = '<?=$sU[Cli_CepEnt]?>';
	document.etiqueta.CIDADE.value = '<?=$sU[Cli_CidEnt]?>';
	document.etiqueta.UF.value = '<?=$sU[Cli_UFEnt]?>';
}
function Outro(){
	document.etiqueta.LINHA1.value = '';
	document.etiqueta.LINHA2.value = '';
	document.etiqueta.LINHA3.value = '';
	document.etiqueta.CEP.value = '';
	document.etiqueta.CIDADE.value = '';
	document.etiqueta.UF.value = '';
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="5"><span class="tabletitle">Etiqueta</span></td>
    </tr>
    <tr>
      <td align="center"><span style="width:95%; height:60px">
        <input name="ETIQUETA" type="radio" id="radio5" value="1" checked="checked" />
        <label for="ETIQUETA">1</label>
        <label for="label"></label>
      </span></td>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio7" value="3" />
        <label for="ETIQUETA">3</label>
      </span></td>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio9" value="5" />
        <label for="ETIQUETA">5</label>
      </span></td>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio11" value="7" />
        <label for="ETIQUETA">7</label>
      </span></td>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio13" value="9" />
        <label for="ETIQUETA">9</label>
      </span></td>
    </tr>
    <tr>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio6" value="2" />
        <label for="ETIQUETA">2</label>
      </span></td>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio8" value="4" />
        <label for="ETIQUETA">4</label>
      </span></td>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio10" value="6" />
        <label for="ETIQUETA">6 </label>
        <label for="label"></label>
      </span></td>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio12" value="8" />
        <label for="ETIQUETA">8</label>
      </span></td>
      <td align="center"><span style="width:95%; height:60px">
        <input type="radio" name="ETIQUETA" id="radio14" value="10" />
        <label for="ETIQUETA">10</label>
      </span></td>
    </tr>
  </table></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td colspan="2" align="left" valign="top">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><span class="tabletitle">A/C</span></td>
    </tr>
    <tr>
      <td height="40" align="center"><input type="text" class="swifttext" name="DESTINO" value="<?=$sU[Cli_Contato]?>" id="DESTINO" size="40" /></td>
    </tr>
  </table>  </td>
  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2" class="tabletitle">Endere&ccedil;o</td>
    </tr>
    <tr>
      <td align="left"><input type="radio" name="TIPO" id="radio15" value="radio3" onclick="DadosBasicos();" />
          <label for="radio15">Dados B&aacute;sicos</label></td>
      <td><input type="radio" name="TIPO" id="radio16" value="radio4" onclick="Entrega();" />
        <label for="radio16">Entrega</label></td>
    </tr>
    <tr>
      <td><input type="radio" name="TIPO" id="radio17" value="radio3" onclick="Cobranca();" />
        <label for="radio17">Cobran&ccedil;a</label></td>
      <td><input type="radio" name="TIPO" id="radio18" value="radio3" onclick="Outro();" />
        <label for="radio18">Outro</label></td>
    </tr>
  </table></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td colspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="tabletitle">Etiqueta</td>
  </tr>
  <tr>
    <td align="center"><input type="text" class="swifttext" name="LINHA1" id="LINHA1" size="50" /></td>
  </tr>
  <tr>
    <td align="center"><input type="text" class="swifttext" name="LINHA2" id="LINHA2" size="50" /></td>
  </tr>
  <tr>
    <td align="center"><input type="text" class="swifttext" name="LINHA3" id="LINHA3" size="50" /></td>
  </tr>
  <tr>
    <td align="center"><input type="text" class="swifttext" name="CEP" id="CEP" size="9" />
      <input type="text" class="swifttext" name="CIDADE" id="CIDADE" size="32" />
      <input name="UF" type="text" class="swifttext" id="UF" size="3" maxlength="2" /></td>
  </tr>
</table></td>
</tr>
</table>
      </td>
</tr></tbody></table>
<br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Gerar" />
</center>
</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>
</body>
