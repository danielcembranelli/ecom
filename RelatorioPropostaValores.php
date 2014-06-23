<? include("Config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />

<title>Relatório de Familia</title>
</head>

<body>
<form action="RelatorioPropostaValores.php" method="post">
  <table width="500" border="0">
    <tr>
      <th scope="col">Data Inicial</th>
      <th scope="col">Data Final</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td align="center"><input name="DTI" type="text" id="DTI" value="<?=$_POST[DTI]?>" maxlength="10" /></td>
      <td align="center"><input name="DTF" type="text" id="DTF" value="<?=$_POST[DTF]?>" maxlength="10" /></td>
      <td align="center"><input name="button" type="submit" class="yellowbutton" id="button" value="Filtrar" /></td>
    </tr>
  </table>
</form>
<? if($_POST[DTI]!='' && $_POST[DTF]!=''){?>
<h2>Previsão de Faturamento - <?=$_POST[DTI]?> - <?=$_POST[DTF]?></h2>
<table>
<thead>
<tr>
<td width="5%" rowspan="2" align="center" nowrap class="tabletitlerow">&nbsp;Nome</td>
<td width="5%" rowspan="2" align="center" nowrap class="tabletitlerow">&nbsp;Marca</td>
<td width="5%" rowspan="2" align="center" nowrap class="tabletitlerow">&nbsp;Modelo</td>
<td width="5%" rowspan="2" align="center" nowrap class="tabletitlerow">&nbsp;Categoria</td>
<td width="2%" rowspan="2" align="center" nowrap class="tabletitlerow">&nbsp;Qtde</td>
<td width="2%" rowspan="2" align="center" nowrap class="tabletitlerow">&nbsp;Dias</td>
<td class="tabletitlerow" width="15%" colspan="2" align="center" nowrap>&nbsp;Equipamento</td>
<td class="tabletitlerow" width="15%" colspan="2" align="center" nowrap>&nbsp;Seguro</td>
<td class="tabletitlerow" width="15%" colspan="2" align="center" nowrap>&nbsp;Consumo</td>
<td class="tabletitlerow" width="15%" colspan="2" align="center" nowrap>&nbsp;Operador</td>
<td class="tabletitlerow" width="15%" colspan="2" align="center" nowrap>&nbsp;Frete</td>
</tr>

<tr class="tabletitlerow">
  <td colspan="" align="center">Di&aacute;rio</td>
  <td colspan="" align="center">Mensal</td>
  <td colspan="" align="center">Di&aacute;rio</td>
  <td colspan="" align="center">Mensal</td>
  <td colspan="" align="center">Di&aacute;rio</td>
  <td colspan="" align="center">Mensal</td>
  <td colspan="" align="center">Di&aacute;rio</td>
  <td colspan="" align="center">Mensal</td>
  <td colspan="" align="center">Mobilização</td>
  <td colspan="" align="center">Desmobilização</td>
</tr>

</thead>
<tbody>
<? 

$TEQPTO=0;
$TVALOR=0;
$TSEGURO=0;
$TCOMBUSTIVEL=0;
$TOPERADOR=0;
$TMOBILIZACAO=0;
$TDESMOBILIZACAO=0;

$MTEQPTO=0;
$MTVALOR=0;
$MTSEGURO=0;
$MTCOMBUSTIVEL=0;
$MTOPERADOR=0;

$sqlUsuario = mysql_query("SELECT  pe.fretedPe, p.dtiniProposta, p.dtprevisaoProposta, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, p.idProposta, pe.operadorPe, pe.valoroperadorPe, pe.precoPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe, pe.valorseguroPe, pe.fretePe, pe.qtdaPe FROM proposta_equipamento pe inner join proposta p on (p.idProposta=pe.idProposta) left join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) left join obra o on (o.idProposta=pe.idProposta) where (p.statusProposta='C' And o.status='a' And pe.statusPe='A') or (p.statusProposta='F' And o.status='a' And p.dtprevisaoProposta>='".dataSql($_POST[DTI])."' And pe.statusPe='A')") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
	


$sqlPreco = mysql_query("SELECT p.idProposta, c.horaMaquina, c.horaOperador FROM proposta_clausula p inner join clausulas c on (c.idClausula=p.idClausula) where c.grupoClausula='25' And p.idProposta = '".$sU[idProposta]."' Limit 1") or die ("PRECO: ".mysql_error());
$sP = mysql_fetch_array($sqlPreco);
mysql_free_result($sqlPreco);

//$sqlFamilia = mysql_query("SELECT o.valorOt, f.valorbemFamilia, f.seguroFamilia FROM familia f left join operadortipo o on(o.idOt=f.idOt) where f.id='".$sU[id]."' Limit 1") or die ("FAMILIA: ".mysql_error());
//$sF = mysql_fetch_array($sqlFamilia);
//mysql_free_result($sqlFamilia);

$Dias = countIntervaloDias($sU[dtiniProposta],$sU[dtprevisaoProposta],dataSql($_POST[DTI]),dataSql($_POST[DTF]));
if($Dias>0){
$TEQPTO+=$sU[qtdaPe];
$TVALOR+=($sU[precoPe]*$sP[horaMaquina])*$sU[qtdaPe];
$TSEGURO+=($sU[valorseguroPe]*$sP[horaMaquina])*$sU[qtdaPe];
$TCOMBUSTIVEL+=($sU[valorcombustivelPe]*$sP[horaMaquina])*$sU[qtdaPe];
$TOPERADOR+=($sU[valoroperadorPe]*$sP[horaOperador])*$sU[qtdaPe];
$TMOBILIZACAO=$sU[fretePe];
$TDESMOBILIZACAO=$sU[fretedPe];


$MTEQPTO+=$sU[qtdaPe];
$MTVALOR+=(($sU[precoPe]*$sP[horaMaquina])*$sU[qtdaPe])*$Dias;
$MTSEGURO+=(($sU[valorseguroPe]*$sP[horaMaquina])*$sU[qtdaPe])*$Dias;
$MTCOMBUSTIVEL+=(($sU[valorcombustivelPe]*$sP[horaMaquina])*$sU[qtdaPe])*$Dias;
$MTOPERADOR+=(($sU[valoroperadorPe]*$sP[horaOperador])*$sU[qtdaPe])*$Dias;

$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>

<tr class="<?=$cor?>">
<td colspan="" width="" align="center" valign=""><?=$sU[id];?>&nbsp;<?=$sU[nome1];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[marca];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[modelo];?></td>
<td colspan="" align="center"><?=$sU[categoria];?></td>
<td colspan="" align="center"><?=$sU[qtdaPe];?></td>
<td colspan="" align="center"><?=$Dias;?></td>
<td colspan="" align="center">R$ <?=number_format(($sU[precoPe]*$sP[horaMaquina])*$sU[qtdaPe], 2, ',', '.')?></td>
<td colspan="" align="center">R$ <?=number_format((($sU[precoPe]*$sP[horaMaquina])*$sU[qtdaPe])*$Dias, 2, ',', '.')?></td>
<td colspan="" align="center"><? if($sU[seguroPe]=='S'){?>R$ <?=number_format(($sU[valorseguroPe]*$sP[horaMaquina])*$sU[qtdaPe],2,',','.');?><? } else {?> - X -<? }?></td>
<td colspan="" align="center"><? if($sU[seguroPe]=='S'){?>R$ <?=number_format((($sU[valorseguroPe]*$sP[horaMaquina])*$sU[qtdaPe])*$Dias,2,',','.');?><? } else {?> - X -<? }?></td>
<td colspan="" align="center"><? if($sU[combustivelPe]=='S'){?>R$ <?=number_format(($sU[valorcombustivelPe]*$sP[horaMaquina])*$sU[qtdaPe],2,',','.');?><? } else {?> - X -<? }?></td>
<td colspan="" align="center"><? if($sU[combustivelPe]=='S'){?>R$ <?=number_format((($sU[valorcombustivelPe]*$sP[horaMaquina])*$sU[qtdaPe])*$Dias,2,',','.');?><? } else {?> - X -<? }?></td>
<td colspan="" align="center"><? if($sU[operadorPe]=='S'){?>R$ <?=number_format(($sU[valoroperadorPe]*$sP[horaOperador])*$sU[qtdaPe],2,',','.');?><? } else {?> - X -<? }?></td>
<td colspan="" align="center"><? if($sU[operadorPe]=='S'){?>R$ <?=number_format((($sU[valoroperadorPe]*$sP[horaOperador])*$sU[qtdaPe])*$Dias,2,',','.');?><? } else {?> - X -<? }?></td>
<td colspan="" align="center"><? if($sU[dtiniProposta]>=dataSql($_POST[DTI])){?>R$ <?=number_format($sU[fretePe],2,',','.');?><? } else {?> - X -<? }?></td>
<td colspan="" align="center"><? if($sU[dtprevisaoProposta]<=dataSql($_POST[DTF])){?>R$ <?=number_format($sU[fretedPe],2,',','.');?><? } else {?> - X -<? }?></td>
</tr>
<? }	} $cor = ($coralternada++ %2 ? "row2" : "row1");  ?>

</tbody>
<tfoot>
<tr class="<?=$cor?>">
<td colspan="4" width="" align="left" valign=""></td>
<td width="" align="left" valign=""><strong>Total</strong></td>
<td colspan="" align="center"><strong><?=$TEQPTO;?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($TVALOR, 2, ',', '.')?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($MTVALOR, 2, ',', '.')?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($TSEGURO,2,',','.');?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($MTSEGURO,2,',','.');?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($TCOMBUSTIVEL,2,',','.');?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($MTCOMBUSTIVEL,2,',','.');?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($TOPERADOR,2,',','.');?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($MTOPERADOR,2,',','.');?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($TMOBILIZACAO,2,',','.');?></strong></td>
<td colspan="" align="center"><strong>R$ <?=number_format($TDESMOBILIZACAO,2,',','.');?></strong></td>
</tr>
</tfoot>
</table>
<? } ?>
</body>
</html>
