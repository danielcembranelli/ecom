<?
include("Verifica.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eCom :: Extranet || Status de Proposta</title>
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
</script>	

<body>
			<table width="650" border="0" cellspacing="0" cellpadding="0">
<tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Manager Proposta &raquo; Status da Proposta</span></td>
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
<?
$sqlProposta = mysql_query("SELECT p.idProposta, p.validadeProposta, p.statusProposta, c.Cli_ID,c.Cli_Fantasia, c.Cli_Contato, p.tipoProposta, p.descricaoObra, p.contatoProposta,p.obsgeraisProposta, p.idVendedor, p.idFilial, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) where p.idProposta = '".$_REQUEST[idProposta]."'") or die ("Could not connect to database: ".mysql_error());
$sP = mysql_fetch_array($sqlProposta);
?>
						<form name="etiqueta" id="downloadfileform" action="SalvaStatus.php" method="POST" enctype="multipart/form-data">
						  <table cellpadding="0" cellspacing="0" border="0" width="95%" class="tborder" style="">
						    <thead>
						      <tr>
						        <td class="tcat" width="1" align="left" nowrap="nowrap"><img src="themes/admin_default/space.gif" alt="" width="4" height="21" /></td>
						        <td class="tcat" width="100%" colspan="2" align="left" col nowrap="nowrap">Status da Proposta</td>
					          </tr>
					        </thead>
						    <tbody>
                            
						      <tr>
						        <td class="contenttableborder" colspan="2">
                                <table border="0" cellpadding="3" cellspacing="1" width="100%">
                                <tr>
                            <td class="tabletitlerow" align="center" nowrap>&nbsp;Data</td>
                            <td class="tabletitlerow" align="center" nowrap>&nbsp;Status</td>
                            <td class="tabletitlerow" align="center" nowrap>&nbsp;Usuário</td>
                            <td class="tabletitlerow" align="center" nowrap>&nbsp;Ação</td>
                            </tr>
                           <?
						    $sqlUsuario = mysql_query("SELECT l.nome, p.statusPs, DATE_FORMAT(p.dtPs,'%d/%m/%Y %H:%i') as dt, p.textoPs FROM proposta_status p left join login l on (l.id=p.idUsuario) where p.idProposta = '".$_REQUEST[idProposta]."' order by p.dtPs") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1"); 
                            
      ?>
						          <tr class="<?=$cor?>">
						            <td align="left" width="" valign="top">&nbsp;<?=$sU[dt]?></td>
   						            <td align="left" width="" valign="top">&nbsp;<? switch($sU[statusPs]){
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'Não Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}?>
    </td>
						            <td align="left" valign="top">&nbsp;						              <?=$sU[nome]?></td>
                                      <td align="left" valign="top">&nbsp;						              <?=$sU[textoPs]?></td>
					              </tr>
                                  <? }?>
						          </table></td>
					          </tr>
					        </tbody>
					      </table>
                        <input type="hidden" name="idProposta" value="<?=$_REQUEST[idProposta]?>" />
<table cellpadding="0" cellspacing="0" border="0" width="95%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Altera&ccedil;&atilde;o do Status</td>
</tr>
</thead>
<tbody><tr>
  <td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td width="30%" align="left" valign="top">&nbsp;<span class="tabletitle">Cliente</span></td>
  <td width="70%" align="left" valign="top">&nbsp;<?=$sP[Cli_Fantasia]?></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top">&nbsp;<span class="tabletitle">Proposta</span></td>
  <td align="left" valign="top">&nbsp;<?=$sP[idProposta]?></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top">&nbsp;<span class="tabletitle">Status Atual</span></td>
  <td align="left" valign="top">&nbsp;<?
  switch($sP[statusProposta]){
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'Não Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}?></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top">&nbsp;<span class="tabletitle">Novo Status</span></td>
  <td height="15" align="left" valign="top"><select name="status" class="quicksearch" id="status">
<option>Selecione...</option>
<option value="N">Em aberto</option>
<option value="L">Não Confirmada</option>
<option value="C">Confirmada</option>
<option value="F">Finalizada</option>
<option value="T">Excluida</option>
</select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top">&nbsp;<span class="tabletitle">Motivo</span></td>
  <td align="left" valign="top"><textarea name="texto" id="texto" cols="45" rows="3"></textarea></td>
</tr>
  </table>
      </td>
</tr></tbody></table>
<br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Mudar" />
</center>
</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>
</body>
</html>
