<? include("Config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />
<title>Relat&oacute;rio de Comiss&atilde;o</title>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type="text/javascript" src="libEcom.js"></script>
<script type="text/javascript" src="js/meiomask.js"></script>
<script type="text/javascript" src="js/mascara_input.js"></script>
</head>
<style>
*{
	font-size:9px; !important
}
.style1 {font-size: 18px}
.style2 {font-size: 14px}
</style>
<body>
<?
$a=0;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="79"><img src="images/logoEscad.jpg" width="79" height="122" /></td>
    <td><div align="center"><span class="style1">Relatório de Comissão</span></div></td>
    <td width="60"><a href="javascript:window.print();"><img src="images/print-icon.jpg" width="60" height="50" border="0" /></a></td>
  </tr>
</table>
<form action="RelatorioPropostaComissao.php" method="post">
  <table width="500" border="0">
    <tr>
      <th scope="col">Data Inicial</th>
      <th scope="col">Data Final</th>
      <th scope="col">Vendedor</th>
      <th scope="col">&nbsp;</th>
    </tr>
    <tr>
      <td align="center"><input name="DTI" type="text" id="DTI" value="<?=$_POST[DTI]?>" maxlength="10" class="quicksearch" alt="data2"/></td>
      <td align="center"><input name="DTF" type="text" id="DTF" value="<?=$_POST[DTF]?>" maxlength="10" class="quicksearch" alt="data2" /></td>
      <td><select name="idVendedor" id="idVendedor" class="quicksearch">
<option value="">Selecione o vendedor</option>
<option value="0" <? if($_SESSION[buscaproposta][idVendedor]=='0'){?>selected="selected"<? } ?>>Todos</option>
<?
$Sql = mysql_query("Select id, nome from login where (statusUsuario='A' And tipoUsuario='A') or (statusUsuario='A' And tipoUsuario='C') or (statusUsuario='A' And tipoUsuario='V') or (statusUsuario='A' And tipoUsuario='G')  order by nome") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($_POST[idVendedor]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } ?>
</select></td>
      <td align="center"><input name="button" type="submit" class="yellowbutton" id="button" value="Filtrar" /></td>
    </tr>
  </table>
</form>
<? if($_POST[DTI]!='' && $_POST[DTF]!=''){?>
<h2>Relatório de Comissão - <?=$_POST[DTI]?> - <?=$_POST[DTF]?></h2>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="Tabela">
<thead>
<tr>
<td rowspan="2" colspan="2" align="center" nowrap class="row1">&nbsp;Contrato / Proposta</td>
<td colspan="2" align="center" nowrap class="row1">Equipamento</td>
<td rowspan="2" align="center" nowrap class="row1">Medição</td>
<td colspan="4" align="center" nowrap class="row1">Datas da Obra</td>
<td colspan="4" align="center" nowrap class="row1">Controle de Pagamento</td>
<td width="60" colspan="3" align="center" nowrap class="row1">Status</td>
<td width="60" rowspan="2" align="center" nowrap class="row1">Horas</td>
<td width="40" rowspan="2" align="center" nowrap class="row1">%</td>
<td colspan="3" align="center" nowrap class="row1">Calculo</td>
</tr>

<tr class="row1">
  <td align="center" nowrap class="row1">Descri&ccedil;&atilde;o</td>
  <td align="center" nowrap class="row1">C&oacute;digo</td>
  <td align="center">inicio</td>
  
  <td align="center">de </td>
  <td align="center">at&eacute;</td>
  <td align="center">fim </td>
  <td align="center" nowrap class="row1">NF</td>
  <td align="center" nowrap class="row1">Emiss&atilde;o NF</td>
  <td align="center" nowrap class="row1">Data Vcto NF</td>
  <td align="center" nowrap class="row1">Pagamento</td>
  <td align="center" nowrap class="row1">P</td>
  <td align="center" nowrap class="row1">V</td>
  <td align="center" nowrap class="row1">A</td>
  <td align="center">P/h E</td>
  <td colspan="" align="center">Subtotal</td>
  <td align="center">Comiss&atilde;o</td>
  </tr>

</thead>
<tbody>
<? 

$THORA=0;
$TEQPTO=0;
$TCOMISSAO=0;

$Sql = "Select m.inicioMedicao, m.finalMedicao, e.codigo, eo.equipamento, DATE_FORMAT(eo.inicio,'%d/%m/%Y') as inicio, DATE_FORMAT(eo.fim,'%d/%m/%Y') as fim, DATE_FORMAT(m.inicioMedicao,'%d/%m/%Y') as dtinicio, DATE_FORMAT(m.finalMedicao,'%d/%m/%Y') as dtfinal, m.idMedicao, DATE_FORMAT(m.dtvencimentoMedicao,'%d/%m/%Y') as dtvencimento,DATE_FORMAT(m.dtnotafiscalMedicao,'%d/%m/%Y') as dtnotafiscal, m.nrnotafiscalMedicao, m.dtvencimentoMedicao, DATE_FORMAT(m.dtpagamentoMedicao,'%d/%m/%Y') as dtpagamento, pr.valor1Preco, pr.valor2Preco, pr.valor3Preco, co.pcpadraoCt, co.pcmaiorCt, co.pinf1Ct, co.pinf2Ct, co.pcmedioCt, co.pmenorCt, co.pcmenorCt, c.Cli_Fantasia, pe.fretedPe, p.dtiniProposta, p.dtprevisaoProposta, L.nomeLegenda as nome1, p.idProposta, pe.operadorPe, pe.valoroperadorPe, pe.precoPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe, pe.valorseguroPe, pe.fretePe, pe.qtdaPe, SUM(me.hreqptoMe) as threqptoMe, SUM(me.hroperador1Me) as throperador1Me, SUM(me.hroperador2Me) as throperador2Me, SUM(me.hroperador3Me) as throperador3Me from medicao_equipamento me inner join proposta_equipamento pe on (me.idPe=pe.idPe) left join proposta p on (p.idProposta=pe.idProposta) left join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) left join obra o on (o.idProposta=pe.idProposta) left join clientes c on (p.idCliente=c.Cli_ID) left join login lo on (lo.id=p.idVendedor) left join comissao_tipo co on (co.idCt=lo.idCt) left join preco pr on (pr.idFamilia=A.id) left join medicao m on (m.idMedicao=me.idMedicao) left join equipamento_obra eo on (eo.id=me.idEo) left join equipamento e on (e.id=eo.equipamento)  where m.dtnotafiscalMedicao between '".dataSql($_POST[DTI])."' and '".dataSql($_POST[DTF])."' And p.idVendedor='".$_POST[idVendedor]."' group by me.idPe, me.idMedicao order by Cli_Fantasia";

$sqlUsuario = mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){

	
$SqlHoraEquipamento = mysql_query("SELECT pe.idProposta, e.codigo, SUM(me.hreqptoMe) as threqptoMe FROM medicao_equipamento me inner join equipamento_obra eo on (eo.id=me.idEo) left join equipamento e on (e.id=eo.equipamento) left join proposta_equipamento pe on (pe.idPe=me.idPe) where me.dtMe between '".$sU[inicioMedicao]."' and '".$sU[finalMedicao]."' And e.codigo='".$sU[codigo]."' And pe.idProposta = '".$sU[idProposta]."' group by e.codigo");
$sHE = mysql_fetch_array($SqlHoraEquipamento);
mysql_free_result($SqlHoraEquipamento);


$sqlPreco = mysql_query("SELECT p.idProposta, c.horaMaquina, c.horaOperador FROM proposta_clausula p inner join clausulas c on (c.idClausula=p.idClausula) where c.grupoClausula='25' And p.idProposta = '".$sU[idProposta]."' Limit 1") or die ("PRECO: ".mysql_error());
$sP = mysql_fetch_array($sqlPreco);
mysql_free_result($sqlPreco);
$cor = ($coralternada++ %2 ? "row1" : "row2");  
$a++;
?>

<tr class="<?=$cor?>">
<td colspan="" width="" align="center" valign=""><?=$sU[idProposta];?></td>
<td colspan="" width="" align="center" valign=""><?=$sU[Cli_Fantasia];?></td>
<td colspan="" width="" align="center" valign=""><?=$sU[nome1];?></td>
<td colspan="" align="center"><?=$sU[codigo];?></td>
<td colspan="" align="center"><?=$sU[idMedicao];?></td>
<td align="center"><?=$sU[inicio];?></td>
<td colspan="" align="center"><?=$sU[dtinicio];?></td>
<td align="center"><?=$sU[dtfinal];?></td>
<td colspan="" align="center"><?=$sU[fim];?></td>
<td align="center"><?=$sU[nrnotafiscalMedicao]?></td>
<td align="center"><?=$sU[dtnotafiscal]?></td>
<td colspan="" align="center"><?=$sU[dtvencimento];?></td>
<td colspan="" align="center">
<? if($sU[dtpagamento]=='00/00/0000'){
	if($sU[dtvencimentoMedicao]<date('Y-m-d')){
		echo '<strong>Vencido</strong>';
		
	} else {
		
		echo 'Em Aberto';
	}
	?>	
<? } else {?>
<?=$sU[dtpagamento];?>
<? }?>
</td>
<td align="center"><? if($sU[dtpagamento]!='00/00/0000'){?>X<? } ?></td>
<td align="center"><? if($sU[dtpagamento]=='00/00/0000' && $sU[dtvencimentoMedicao]<date('Y-m-d')){?>X<? } ?></td>
<td align="center"><? if($sU[dtpagamento]=='00/00/0000' && $sU[dtvencimentoMedicao]>date('Y-m-d')){?>X<? } ?></td>
<td colspan="" align="center"><?=number_format($sHE[threqptoMe],1,',','')?></td>
<td colspan="" align="center">
<?
$c=$sU[pcpadraoCt];
if($sU[valor1Preco]<$sU[precoPe]){
	$c = $sU[pcmaiorCt];
}
if($sU[valor3Preco]>$sU[precoPe]){
	 $pDesconto = (100-(100/$sU[valor3Preco])*$sU[precoPe]);
	 if($pDesconto>$sU[pmenorCt]){
		$c = $sU[pcmenorCt]; 
	 } else {
		 $c = $sU[pcmedioCt];
	 }
}
echo number_format($c,1,',','');;
?>

</td>
<td align="center">R$ <?=number_format($sU[precoPe],2,',','.')?></td>
<td align="center">R$ <?=number_format($sU[precoPe]*$sHE[threqptoMe], 2,',', '.')?></td>
<td align="center">R$ <?=number_format((($sU[precoPe]/100)*$c)*$sHE[threqptoMe], 2,',', '.')?></td>
</tr>
<?	

$THORA+=$sHE[threqptoMe];
$TEQPTO+=$sU[precoPe]*$sHE[threqptoMe];
$TCOMISSAO+=(($sU[precoPe]/100)*$c)*$sU[threqptoMe];

} $cor = ($coralternada++ %2 ? "row2" : "row1");  ?>

</tbody>
<tfoot>
<tr class="<?=$cor?>">
<th colspan="16" align="right" valign=""><strong>Total</strong></td>
<th colspan="" align="center"><strong><?=number_format($THORA, 2, ',', '.')?></strong></th>
<th  colspan="2" align="center">&nbsp;</th>
<th align="center">R$ <?=number_format($TEQPTO, 2, ',', '.')?></strong></th>
<th align="center">R$ <?=number_format($TCOMISSAO, 2, ',', '.')?></strong></th>
</tr>
</tfoot>
</table>
<? } ?>


</body>
</html>
