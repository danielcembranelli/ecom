<? include('../Config.php');

$IdProposta = base64_decode($_REQUEST[p]);
$sqlProposta = mysql_query("SELECT c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, p.obsgeraisProposta, p.contatoProposta, pa.nome, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y') as data FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) where p.idProposta = '".$IdProposta."'") or die ("Could not connect to database: ".mysql_error());
$sP = mysql_fetch_array($sqlProposta);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Proposta N&ordm; <?=$IdProposta?></title>
    <link rel="stylesheet" type="text/css" href="VReport_print.css" media="print" />
    <link rel="stylesheet" type="text/css" href="VReport_screen.css" media="screen" />
<style>
body{
	font-family:Calibri;
	font-size:14px;
}
table{
font-size:10px;
}
</style>
</head>

<body>
<div id="_VReportHeader"><img src="topo.jpg" /></div>
<div id="_VReportContent">
<div style="width:665px;">
<p>À<br />
  <?=$sP[Cli_Fantasia]?><br />
  A/C.: <?=$sP[contatoProposta]?></p>
<p><strong>Referente a Proposta para Locação de Equipamentos N&ordm; <?=$IdProposta?>/<?=date("Y");?></strong></p>
<p>Obra/Local: <em><?=$sP[descricaoObra]?></em></p>


<p><strong>Introdu&ccedil;&atilde;o:</strong></p>
<p>Agradecemos a oportunidade, e apresentamos  nossa proposta comercial para loca&ccedil;&atilde;o de equipamentos, com o objetivo de  viabilizar vosso projeto.</p>
<p><strong>Conte&uacute;do</strong></p>
<p> Tabela de equipamentos/pre&ccedil;o para loca&ccedil;&atilde;o:</p>
<table border="1" cellspacing="0" cellpadding="0" width="100%" bordercolor="#666666">
  <tr>
    <td rowspan="2"><p align="center"><strong>Qtde</strong></p></td>
    <td rowspan="2"><p align="center"><strong>Equipamentos</strong></p></td>
    <td rowspan="2"><p align="center"><strong>Categoria</strong></p></td>
    <td rowspan="2"><p align="center"><strong>Marcas</strong></p></td>
    <td rowspan="2"><p align="center"><strong>Modelos</strong></p></td>
    <td colspan="4"><p align="center"><strong>PRE&Ccedil;O POR HORA</strong></p></td>
    <td rowspan="1"><p align="center"><strong>PREÇO UNITÁRIO</strong></p></td>
  </tr>
  <tr>
    <td><p align="center"><strong>Equipamento</strong></p></td>
    <td align="center">Operador</td>
    <td align="center">Combustivel</td>
    <td><p align="center"><strong>Seguro</strong></p></td>
    <td><p align="center"><strong>Frete</strong></p></td>
  </tr>
  <? $iEsql = mysql_query("Select pe.qtdaPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.valorseguroPe, pe.fretePe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$IdProposta."' And statusPe='A'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
  ?>
  <tr>
    <td><p align="center"><?=$iE[qtdaPe]?></p></td>
    <td><p align="center"><?=$iE[nome1]?></p></td>
    <td height="36"><p align="center"><?=$iE[categoria]?></p></td>
    <td><p align="center"><?=$iE[marca]?></p></td>
    <td><p align="center"><?=$iE[modelo]?></p></td>
    <td><p align="center">R$ <?=number_format($iE[precoPe],2,',','.');?></p></td>
    <td><p align="center"><? if($iE[operadorPe]=='S'){?>R$ <?=number_format($iE[valoroperadorPe],2,',','.');?><? } else {?> - - x - - <? } ?></p></td>
    <td><p align="center"><? if($iE[combustivelPe]=='S'){?>R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?><? } else {?> - - x - -<? } ?></p></td>
    <td><p align="center">R$ <?=number_format($iE[valorseguroPe],2,',','.');?></p></td>
    <td><p align="center">R$ <?=number_format($iE[fretePe],2,',','.');?></p></td>
  </tr>
  <? } ?>
</table>
<?
$a=0;
?>
<p>Condi&ccedil;&otilde;es Comerciais:</p>
<? 
$sqlClusula = mysql_query("Select pc.idPc, l.nomeLegenda, pc.textoPc FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where idProposta = '".$IdProposta."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
while ($sC = mysql_fetch_array($sqlClusula)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
$a++;?>
<p><strong>Cl&aacute;usula <?=$a?> &ndash; <?=$sC[nomeLegenda]?>:</strong></p>
<ul>
  <li><?=$sC[textoPc]?></li>
</ul>
<? }
$a++;

if($sP[obsgeraisProposta]!=''){
?>
<p><strong>Cl&aacute;usula <?=$a?> &ndash; OBSERVAÇÃO:</strong></p>
<ul>
  <li><?=$sP[obsgeraisProposta]?></li>
</ul>
<? }?>
<p><strong>Conclus&atilde;o</strong></p>
<p>Reafirmamos nossa posi&ccedil;&atilde;o de parceiros,  comprometidos com o resultado de vosso projeto. <br />
  Nos colocamos a disposi&ccedil;&atilde;o para quaisquer  esclarecimentos, e ajustes necess&aacute;rios</p>
<p>Estamos prontos para atend&ecirc;-los </p>
<p>&nbsp;</p>
<p>____________________________________________<br />
  <?=$sP[nome]?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Aprovado: ___________________________________  Data: _____/_____/_____<br />
  Cliente:  <?=$sP[Cli_Fantasia]?><br />
  Contato: <?=$sP[contatoProposta]?></p>
<p>&nbsp;</p>
<?
$dt = explode('/',$sP[data]);
switch($dt[1])
{
case "01" : $mesext = "Janeiro";         break;
case "02" : $mesext = "Fevereiro";         break;
case "03" : $mesext = "Maro";                 break;
case "04" : $mesext = "Abril";                 break;
case "05" : $mesext = "Maio";                 break;
case "06" : $mesext = "Junho";                 break;
case "07" : $mesext = "Julho";                 break;
case "08" : $mesext = "Agosto";                 break;
case "09" : $mesext = "Setembro";         break;
case "10" : $mesext = "Outubro";         break;
case "11" : $mesext = "Novembro";         break;
case "12" : $mesext = "Dezembro";         break;
}

?>
<p>Santo Andr&eacute;, <?=$dt[0]?> de <?=$mesext?> de <?=$dt[2]?></p>
</div>
</div>
<div id="_VReportFooter"><img src="rodape.jpg" /></div>

<script src="VReport.js" type="text/javascript"></script>
</body>
</html>
