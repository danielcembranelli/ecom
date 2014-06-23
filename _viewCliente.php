<?
include("Verifica.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eCom :: Extranet</title>
<style type="text/css">
<!--
.style1 {font-size: 18px}
.style2 {font-size: 14px}
-->
</style>
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
<script type="text/javascript">
function chec(tabela,valor){
	if(valor==true){
	document.getElementById(tabela).style.display = 'block'
	} else {
	document.getElementById(tabela).style.display = 'none'
	}
}
</script>		
<?
$sqlUsuario = mysql_query("Select c.expiraCliente, DATE_FORMAT(c.dtexpiraCliente,'%d/%m/%Y') as dtExpira, c.ideditCliente, l.nome as nomeCadastro, c.Cla_ID, c.Ori_ID, c.antigoidCliente, c.Cli_ID, DATE_FORMAT(c.Cli_Cadastro,'%d/%m/%Y %H:%i:%s') as dtcad1,DATE_FORMAT(c.dtcadCli,'%d/%m/%Y %H:%i:%s') as dtcad,DATE_FORMAT(c.dtaltCli,'%d/%m/%Y %H:%i:%s') as dtalt, c.* from clientes c left join login l on (l.id=c.idcadCliente) where  c.Cli_ID ='".$_REQUEST[idCliente]."' Limit 1") or die ("Could not connect to database: ".mysql_error());
$sU = mysql_fetch_array($sqlUsuario);
?>       		
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="79"><img src="images/logoEscad.jpg" width="79" height="122" /></td>
    <td><div align="center"><span class="style1">Ficha do Cliente</span></div></td>
    <td width="60"><a href="javascript:window.print();"><img src="images/print-icon.jpg" width="60" height="50" border="0" /></a></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

					<tr height="4">
						<td width="105%"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td>
						
<table cellpadding="0" cellspacing="0" border="0" width="100%" style="">
<thead>
<tr>
  <td align="left" nowrap>&nbsp;</td>
  <td class="tickettextred style2" colspan="" align="left" nowrap>&nbsp;</td>
</tr>
<tr>
  <td align="left" nowrap>&nbsp;</td>
  <td class="tickettextred style2" colspan="" align="left" nowrap>&nbsp;</td>
</tr>
<tr>
<td width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tickettextred style2" width="100%" colspan="" align="left" nowrap>Detalhes do Cliente</td>
</tr>
</thead>
<tbody><tr><td  colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" height="20" colspan="" width="100"><span class="tabletitle">ID</span></td>
<td colspan="2" align="left" valign="top"><b><?=$sU[Cli_ID]?></b></td>
</tr>

<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="100"><span class="tabletitle">CNPJ</span></td>
<td align="left" valign="top" colspan=""><?=$sU[Cli_CGC]?></td>
<td width="50%" align="left" valign="top"><span class="tabletitle">Avaliação Cadastral</span></td>
</tr>

<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Nome</span></td>
  <td align="left" valign="top"><?=$sU[Cli_Fantasia]?></td>
  <td rowspan="11" align="left" valign="top"><?=$sU[Cli_Historico]?>
 </td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Razão Social</span></td>
<td align="left" valign="top"><?=$sU[Cli_Nome]?></td>
</tr>

<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">I.E.</span></td>
  <td align="left" valign="top"><?=$sU[Cli_Inscricao]?></td>
  </tr>

<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Contato</span></td>
<td align="left" valign="top"<?=$sU[Cli_Contato]?></td>
</tr>

<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Endere&ccedil;o</span></td>
  <td align="left" valign="top"><?=$sU[Cli_Endereco]?></td>
  </tr>
  <tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Numero</span></td>
  <td align="left" valign="top"><?=$sU[Cli_Numero]?></td>
  </tr>
  <tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Complemento</span></td>
  <td align="left" valign="top"><?=$sU[Cli_Complemento]?></td>
  </tr>
  
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Bairro</span></td>
  <td align="left" valign="top"><?=$sU[Cli_Bairro]?></td>
  </tr>
  
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">CEP</span></td>
  <td align="left" valign="top"><?=$sU[Cli_CEP]?></td>
  </tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Cidade</span></td>
  <td align="left" valign="top"><?=$sU[Cli_Cidade]?></td>
  </tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Estado</span></td>
  <td align="left" valign="top"><?=$sU[Cli_UF]?></td>
  </tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Pais</span></td>
  <td align="left" valign="top"><?=$sU[Cli_Pais]?></td>
  <td align="left" valign="top"><span class="tabletitle">CPF</span></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Telefone 1</span></td>
  <td align="left" valign="top">(<?=$sU[Cli_DDD1]?>) <?=$sU[Cli_Fone1]?></td>
  <td align="left" valign="top"><?=$sU[Cli_CPF]?></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Telefone 2</span></td>
  <td align="left" valign="top">
       (<?=$sU[Cli_DDD2]?>) <?=$sU[Cli_Fone2]?></td>
  <td align="left" valign="top"><span class="tabletitle">R.G.</span></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Telefone 3</span></td>
  <td align="left" valign="top">
       (<?=$sU[Cli_DDD3]?>) <?=$sU[Cli_Fone3]?></td>
  <td align="left" valign="top"><?=$sU[Cli_RG]?></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Fax</span></td>
  <td align="left" valign="top">(<?=$sU[Cli_DDD4]?>) <?=$sU[Cli_Fax1]?></td>
  <td align="left" valign="top"><span class="tabletitle">Origem</span></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">E-mail</span></td>
  <td align="left" valign="top"><?=$sU[Cli_EMail]?></td>
  <td align="left" valign="top"><select name="idOrigem" id="idFilial" <? if($_REQUEST[acao]!='editar'){?>readonly="readonly"<? }?>>
<option>Selecione a origem</option>
<?
$Sql = mysql_query("Select Ori_ID, Ori_Descricao from origens order by Ori_Descricao") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[Ori_ID]?>" <? if($dom[Ori_ID]==$sU[Ori_ID]){?>selected="selected"<? } ?>><?=$dom[Ori_Descricao]?></option>
<? } ?>
</select></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Website</span></td>
  <td align="left" valign="top"><?=$sU[Cli_URL]?></td>
  <td align="left" valign="top">&nbsp;</td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Status</span></td>
  <td align="left" valign="top">&nbsp;<?=labelStatusCliente($sU[Cli_Status]);?></td>
  <td align="left" valign="top"><? if($sU[expiraCliente]=='S'){?><strong>Expira em <?=$sU[dtExpira]?></strong><? } ?></td>
</tr>

<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Classifica&ccedil;&atilde;o</span></td>
<td align="left" valign="top"><select name="idClassicacao"  <? if($_REQUEST[acao]!='editar'){?>readonly="readonly"<? }?> id="tipoCliente">
<option>Selecione a classificação</option>
<?
$Sql = mysql_query("Select Cla_ID, Cla_Descricao from classificacao order by Cla_Descricao") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[Cla_ID]?>"<? if($dom[Cla_ID]==$sU[Cla_ID]){?>selected="selected"<? } ?>><?=$dom[Cla_Descricao]?></option>
<? } ?>
</select></td>
<td align="left" valign="top"></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Vendedor</span></td>
<td align="left" valign="top" colspan="2"><select name="idVendedor" id="idVendedor" <? if($_REQUEST[acao]!='editar'){?>readonly="readonly"<? }?>>
<option>Selecione o vendedor</option>

<?
$Sql = mysql_query("Select id, nome from login where (tipoUsuario='A') or (tipoUsuario='C') or (tipoUsuario='V')  order by nome") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($sU[idVendedor]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } ?>
</select></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Filial</span></td>
<td align="left" valign="top" colspan="2"><select name="idFilial" id="idFilial">
<option>Selecione a filial</option>
<?
$Sql = mysql_query("Select ID_PATIO, NOME_PATIO from patio order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[ID_PATIO]?>"<? if($sU[idFilial]==$dom[ID_PATIO]){?>selected="selected"<? } ?>><?=$dom[NOME_PATIO]?></option>
<? } ?>
</select></td>
</tr>
<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Dt Cadastro</span></td>
<td align="left" valign="top" colspan="2"><? if($sU[dtcadCli]=='0000-00-00 00:00:00'){?><?=$sU[dtcad1]?>
<? } else {?><?=$sU[dtcad]?><? } ?> por <?=$sU[nomeCadastro]?></td>
</tr>
<? if($sU[dtaltCli]!='0000-00-00 00:00:00'){

$Sql = mysql_query("Select nome from login where id='".$sU[ideditCliente]."'") or die (mysql_error());
$dom = mysql_fetch_array($Sql);
?>
<tr title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Dt Alteração</span></td>
<td align="left" valign="top" colspan="2"><?=$sU[dtalt]?> por <?=$dom[nome]?></td>
</tr>
<? } ?>
</table></td></tr></tbody></table>
<br />


<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
    <td>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" style="">
    <thead>
    <tr>
    <td width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
    <td width="100%" colspan="" align="left" nowrap class="tickettextred style2">Endere&ccedil;o de Cobran&ccedil;a</td>
    </tr>
    </thead>
    <tbody><tr><td  colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%" id="Cobranca2">
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Endere&ccedil;o</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_EndEnt]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Numero</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_NumEnt]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Complemento</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_ComEnt]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Bairro</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_BaiEnt]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">CEP</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_CepEnt]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Cidade</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_CidEnt]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Estado</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_UFEnt]?></td>
      </tr>
    </table></td></tr></tbody></table>    </td> <td width="15"></td><td>
    
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="">
    <thead>
    <tr>
    <td width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
    <td width="100%" colspan="" align="left" class="tickettextred style2" nowrap>Endere&ccedil;o de Faturamento</td>
    </tr>
    </thead>
    <tbody><tr><td  colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%" id="Cobranca">
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Endere&ccedil;o</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_EndCob]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Numero</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_NumCob]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Complemento</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_ComCob]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Bairro</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_BaiCob]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">CEP</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_CepCob]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Cidade</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_CidCob]?></td>
      </tr>
      <tr title="" onmouseover="" onmouseout="" onclick="" style="">
        <td align="left" valign="top" colspan="">Estado</td>
        <td align="left" valign="top" colspan=""><?=$sU[Cli_UFCob]?></td>
      </tr>
    </table></td></tr></tbody></table>
    
    
    
    
    
    
    </td>
    </tr>
    </table></td>
					</tr>
	
    <tr><td>
    <br />
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Relação de Contatos</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Nome</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;E-mail</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Telefone 1</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Telefone 2</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Celular</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Fax</td>


</tr>

<? 
$sqlUsuario = mysql_query("SELECT * from contatos where  idCliente = '".$sU[idCliente]."' And statusContato='A' ORDER BY nomeContato") or die ("Could not connect to database: ".mysql_error());
while ($sUa = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, 'row2');">
<td colspan="" width="" align="center" valign=""><?=$sUa[nomeContato];?></td>
<td colspan="" align="center"><?=$sUa[emailContato];?></td>
<td colspan="" align="center">(<?=$sUa[dddfone1];?>) <?=$sUa[nrfone1];?></td>
<td colspan="" align="center">(<?=$sUa[dddfone2];?>) <?=$sUa[nrfone2];?></td>
<td colspan="" align="center">(<?=$sUa[dddcelular];?>) <?=$sUa[nrcelular];?></td>
<td colspan="" align="center">(<?=$sUa[dddfax];?>) <?=$sUa[nrfax];?></td>
</tr>
<? } ?>
<? 
$sqlUsuario = mysql_query("SELECT * from contatosdeclientes where  Cli_ID = '".$sU[idCliente]."' ORDER BY CCli_Nome") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, 'row2');">
<td colspan="" width="" align="center" valign=""><?=$sU[CCli_Nome];?></td>
<td colspan="" align="center"><?=$sU[CCli_EMail];?></td>
<td colspan="" align="center"><?=$sU[CCli_Fone];?></td>
<td colspan="" align="center">(<?=$sU[dddfone2];?>) <?=$sU[nrfone2];?></td>
<td colspan="" align="center">(<?=$sU[dddcelular];?>) <?=$sU[nrcelular];?></td>
<td colspan="" align="center">(<?=$sU[dddfax];?>) <?=$sU[nrfax];?></td>
<td colspan="" width="" align="center" valign=""><a href="index.php?_m=livesupport&_a=managerContatos&step=edit&idCliente=<?=$_REQUEST[idCliente]?>&idContato=<?=$sU[idContato]?>"><img src="themes/admin_default/icon_edit.gif" border="0"></a> <a href="javascript:ConfirmaDel('<?=$sU[idContato]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
    
    </td></tr>
    
    									<tr height="4">
						<td><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>
			