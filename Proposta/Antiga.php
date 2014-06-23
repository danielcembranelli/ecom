<?
include("../config.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000;
}
</style>
</head>

<body>
<?
$Sql = "SELECT p.Orc_ID, p.Orc_Contato, c.Cli_Fantasia, p.ORC_LOCALOBRA,p.Orc_ObrigaEscad, p.Orc_ObrigaCliente, c.Cli_Contato, p.Orc_Status, DATE_FORMAT(p.Orc_Cadastro,'%d/%m/%Y %H:%i') as data, DATE_FORMAT(p.Orc_InicioObra,'%d/%m/%Y') as dtIni, p.Orc_LocaMinima, p.ORC_OUTRASOBS, p.Orc_CustoOperacional, p.Orc_CustoTransp, p.Orc_OutrosCustos, p.Orc_CondPag, p.Orc_Reajuste FROM antigo_orcamentos p inner join clientes c on (p.Cli_ID=c.antigoidCliente) where Orc_ID='".$_REQUEST[idProposta]."'";
$sqlUsuario=mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());
$sU = mysql_fetch_array($sqlUsuario);
?>
A <?=$sU[Cli_Fantasia]?><br />
A/C <?=$sU[Orc_Contato]?><br />
OBRA <?=$sU[ORC_LOCALOBRA]?><br />
<br />
<br />
<br />
<center><strong>PROPOSTA/CONTRATO PARA LOCA&Ccedil;&Atilde;O DE EQUIPAMENTOS N&ordm; <?=$sU[Orc_ID]?></strong></center><br />
<center>Agradecendo a oportunidade, apresentamos esta proposta/contrato com o objetivo de agilizar vosso pedido.</center>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th width="40%" scope="col">EQUIPAMENTO</th>
    <th width="12%" scope="col">PRE&Ccedil;O<br />
    (HORA)</th>
    <th width="12%" scope="col">OPERADOR<br />
    (HORA)</th>
    <th width="12%" scope="col">SEGURO<br />
    (HORA)</th>
    <th width="12%" scope="col">DIESEL<br />
    (HORA)</th>
    <th width="12%" scope="col">FRETE<br />
    UNIT&Aacute;RIO</th>
  </tr>
  <? $iEsql = mysql_query("SELECT f.Fam_Descricao, a.IOrc_PrecoDia, a.IOrc_PrecoDiesel, a.IOrc_PrecoMO, a.IOrc_SeguroDia, a.IOrc_FreteUnitario FROM antigo_itensdeorcamentos a inner join antigo_familias f on(f.Fam_ID=a.Fam_ID) where a.Orc_ID = '".$sU[Orc_ID]."'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
$cor = ($coralternada++ %2 ? "row2" : "row1");	  
  ?>
  <tr>
    <td>&nbsp;<?=$iE[Fam_Descricao]?></td>
    <td align="center">&nbsp;R$ <?=number_format($iE[IOrc_PrecoDia],2,',','.');?></td>
    <td align="center">&nbsp;R$ <?=number_format($iE[IOrc_PrecoMO],2,',','.');?></td>
    <td align="center">&nbsp;R$ <?=number_format($iE[IOrc_SeguroDia],2,',','.');?></td>
    <td align="center">&nbsp;R$ <?=number_format($iE[IOrc_PrecoDiesel],2,',','.');?></td>
    <td align="center">&nbsp;R$ <?=number_format($iE[IOrc_FreteUnitario],2,',','.');?></td>
  </tr>
  <? } ?>
</table>
<p><br />
  <br />
  <strong>LOCA&Ccedil;&Atilde;O M&Iacute;NIMA</strong><br />
  <?=$sU[Orc_LocaMinima]?>
  <br />
  <br />
  <strong>OBRIGA&Ccedil;&Otilde;ES ESCAD</strong><br />
  <?=$sU[Orc_ObrigaEscad]?>
  <strong><br />
  OBRIGA&Ccedil;&Otilde;ES CLIENTE</strong><br />
  <?=$sU[Orc_ObrigaCliente]?>
  <br />
  <strong>TRANSPORTE</strong><br />
  <?=$sU[Orc_CustoTransp]?>
  <br />
  <br />
  <strong>CUSTOS ADICIONAIS</strong><br />
  <?=$sU[Orc_OutrosCustos]?>
  <br />
  <br />
  <strong>CONDI&Ccedil;&Atilde;O DE PAGAMENTO</strong><br />
  <?=$sU[Orc_CondPag]?>
  <br />
  <br />
  <strong>REAJUSTE</strong><br />
  <?=$sU[Orc_Reajuste]?>
  <br />
  <br />
  <strong>OUTRAS OBSERVA&Ccedil;&Otilde;ES</strong><br />
  <?=$sU[ORC_OUTRASOBS]?>
  <br />
</p>
</body>
</html>