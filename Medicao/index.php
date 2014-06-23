<?
include('../Config.php');

$IdMedicao = base64_decode($_REQUEST[m]);
$Sql = "SELECT DATE_FORMAT(m.dtpagamentoMedicao,'%d/%m/%Y') as dtpagamento, DATE_FORMAT(m.dtnotafiscalMedicao,'%d/%m/%Y') as dtnotafiscal, m.nrnotafiscalMedicao, DATE_FORMAT(m.inicioMedicao,'%d/%m/%Y') as dtinicio, DATE_FORMAT(m.finalMedicao,'%d/%m/%Y') as dtfinal, p.descricaoObra, m.idMedicao, DATE_FORMAT(m.dtMedicao,'%d/%m/%Y') as dtmedicao, pa.nome,  m.idProposta, m.statusMedicao, m.tipoMedicao, m.vlhoraseqptoMedicao, m.vlcustoMedicao, m.vldescontoMedicao, DATE_FORMAT(m.dtaprovacaoMedicao,'%d/%m/%Y') as dtaprovacao, DATE_FORMAT(m.dtvencimentoMedicao,'%d/%m/%Y') as dtvencimento, c.Cli_Fantasia FROM medicao m inner join proposta p on (p.idProposta=m.idProposta) left join clientes c on (p.idCliente=c.Cli_ID)  left join login pa on (p.idUsuario=pa.id) where idMedicao='".$IdMedicao."'";
$mS = mysql_query($Sql);
$M = mysql_fetch_array($mS);
$SqlJaLancado = mysql_query("SELECT MIN(me.dtMe) as dtmenor, MAX(me.dtMe) as dtmaior FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) where me.idMedicao='".$M[idMedicao]."' group by me.idMedicao") or die (mysql_error());
$t = mysql_fetch_array($SqlJaLancado);


$Dias = countIntervaloDias($t[dtmenor],$t[dtmaior],$t[dtmenor],$t[dtmaior],'N');

$Sql = "SELECT pe.idPe, f.nome, e.codigo, pe.precoPe, pe.combustivelPe, pe.seguroPe, pe.valorseguroPe, pe.valorcombustivelPe FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) left join equipamento_obra eo  on (me.idEo=eo.id) left join equipamento e on (e.id=eo.equipamento) left join familia f on (f.id=e.familia) where me.idMedicao='".$M[idMedicao]."' group by pe.idPe";
$SqlJaLancado = mysql_query($Sql) or die (mysql_error());
$SqlJaLancado2 = mysql_query($Sql) or die (mysql_error());

//echo "SELECT me.dtMe, pe.idPe, me.idMe, me.hreqptoMe, pe.precoPe, pe.combustivelPe, pe.seguroPe, pe.valorseguroPe, pe.valorcombustivelPe, pe.valoroperadorPe, me.hroperador1Me, me.hroperador2Me, me.hroperador3Me FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) where me.idMedicao='".$M[idMedicao]."'";
$sqlBusca = mysql_query("SELECT me.dtMe, pe.idPe, me.idMe, me.hreqptoMe, pe.precoPe, pe.combustivelPe, pe.seguroPe, pe.valorseguroPe, pe.valorcombustivelPe, pe.valoroperadorPe, me.hroperador1Me, me.hroperador2Me, me.hroperador3Me FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) where me.idMedicao='".$M[idMedicao]."'") or die (mysql_error());
$total=0;
//print_r(mysql_fetch_array($sqlBusca));
while ($b = mysql_fetch_array($sqlBusca)){
	
	$COMBUSTIVEL=0;
	$SEGURO=0;
	if($b[combustivelPe]=='S'){
		$COMBUSTIVEL=$b[valorcombustivelPe];
	}
	if($b[seguroPe]=='S'){
		$SEGURO=$b[valorseguroPe];
	}
	$preco=($b[precoPe]+$SEGURO+$COMBUSTIVEL);
	$ev[$b[idPe]][$b[dtMe]]=($preco*$b[hreqptoMe]);	
	$eh[$b[idPe]][$b[dtMe]]=$b[hreqptoMe];
	
	$hv1[$b[idPe]][$b[dtMe]]=$b[hroperador1Me]*$b[valoroperadorPe];	
	$hh1[$b[idPe]][$b[dtMe]]=$b[hroperador1Me];
	
	$hv2[$b[idPe]][$b[dtMe]]=$b[hroperador2Me]*$b[valoroperadorPe];	
	$hh2[$b[idPe]][$b[dtMe]]=$b[hroperador2Me];
	
	$hv3[$b[idPe]][$b[dtMe]]=$b[hroperador3Me]*$b[valoroperadorPe];	
	$hh3[$b[idPe]][$b[dtMe]]=$b[hroperador3Me];
	$t[$b[idPe]]['P'] += ($b[precoPe]+$SEGURO+$COMBUSTIVEL);
	$t[$b[idPe]]['H'] += $b[hreqptoMe];
	$t[$b[idPe]]['V'] += $b[hreqptoMe]*($b[precoPe]+$SEGURO+$COMBUSTIVEL);
	$t['GERAL']['H'] += $b[hreqptoMe];
	$t['GERAL']['V'] += $b[hreqptoMe]*($b[precoPe]+$SEGURO+$COMBUSTIVEL);
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Medição N&ordm; <?=$M[idMedicao]?> Proposta N&ordm; <?=$M[idProposta]?></title>
</head>
<style>
v\:* {behavior:url(#default#VML);}
o\:* {behavior:url(#default#VML);}
x\:* {behavior:url(#default#VML);}
.shape {behavior:url(#default#VML);}
</style>
<![endif]-->
<link rel=Stylesheet href=stylesheet.css>
<style>
<!--table
	{mso-displayed-decimal-separator:"\.";
	mso-displayed-thousand-separator:"\,";}
@page
	{margin:.35in .51in .31in .51in;
	mso-header-margin:.31in;
	mso-footer-margin:.31in;
	mso-page-orientation:landscape;
	mso-horizontal-page-align:center;
	mso-vertical-page-align:center;}
-->
</style>

<body>
<table border=0 cellpadding=0 cellspacing=0 width=1155 style='border-collapse:
 collapse;table-layout:fixed;width:881pt'>
 <col width=93 style='mso-width-source:userset;mso-width-alt:3401;width:70pt'>
 <col width=131 style='mso-width-source:userset;mso-width-alt:4790;width:98pt'>
 <col width=30 span=7 style='mso-width-source:userset;mso-width-alt:1097;
 width:23pt'>
 <col width=31 style='mso-width-source:userset;mso-width-alt:1133;width:23pt'>
 <col width=30 span=23 style='mso-width-source:userset;mso-width-alt:1097;
 width:23pt'>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
   <td colspan=33 height=10 class=xl89 style='height:7.5pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 height=20 class=xl90 style='height:15.0pt'> Cliente</td>
  <td colspan=14 class=xl91 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;<?=utf8_encode($M[Cli_Fantasia])?></td>
  <td colspan=4 class=xl90 style='border-left:none'>Contato</td>
  <td colspan=13 class=xl91 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;</td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 height=20 class=xl94 style='border-right:.5pt solid black;
  height:15.0pt'> Obra</td>
  <td colspan=14 class=xl96 width=1155 style='border-right:.5pt solid black;
  border-left:none;width:322pt'><?=utf8_encode($M[descricaoObra])?></td>
  <td colspan=4 class=xl94 style='border-right:.5pt solid black;border-left:
  none'>Período</td>
  <td colspan=13 class=xl100 style='border-right:.5pt solid black;border-left:
  none'><?=$M[dtinicio]?> até <?=$M[dtfinal]?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 height=20 class=xl90 style='height:15.0pt'> Contrato</td>
  <td colspan=14 class=xl103 style='border-left:none'><?=$M[idProposta]?></td>
  <td colspan=4 class=xl90>Emissão</td>
  <td colspan=13 class=xl103 style='border-right:.5pt solid black;border-left:
  none'><?=$M[dtnotafiscal]?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 height=20 class=xl90 style='height:15.0pt'>Data da Locação</td>
  <td colspan=14 class=xl103 style='border-left:none'>&nbsp;</td>
  <td colspan=4 class=xl90>Vencimento</td>
  <td colspan=13 class=xl103 style='border-right:.5pt solid black;border-left:
  none'><?=$M[dtvencimento]?></td>
 </tr>
 <tr height=20 style='mso-height-source:userset;height:15.0pt'>
  <td colspan=2 height=20 class=xl90 style='height:15.0pt'>Filial</td>
  <td colspan=14 class=xl91 style='border-left:none'>&nbsp;</td>
  <td colspan=4 class=xl90>Mão de Obra</td>
  <td colspan=13 class=xl91 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;</td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td colspan=33 height=10 class=xl105 style='height:7.5pt'>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl74 style='height:15.75pt;border-top:none'>Item</td>
  <td colspan=10 class=xl74 style='border-left:none'>Descrição dos Equipamentos</td>
  <td colspan=4 class=xl74 style='border-left:none'>Cód. Interno</td>
  <td colspan=3 class=xl74 style='border-left:none'>Unidade</td>
  <td colspan=5 class=xl74 style='border-left:none'>Horas Trabalhadas</td>
  <td colspan=4 class=xl74 style='border-left:none'>Preço Unitário</td>
  <td colspan=6 class=xl74 style='border-left:none'>Valor Parcial</td>
 </tr>
 <?
$l=1;
$W=1;
while ($q = mysql_fetch_array($SqlJaLancado)){
$cor = ($coralternada++ %2 ? "row2" : "row1");

	if($q[combustivelPe]=='S'){
		$COMBUSTIVEL=$q[valorcombustivelPe];
	}
	if($q[seguroPe]=='S'){
		$SEGURO=$q[valorseguroPe];
	}
?>
 
 <tr height=20 style='height:15.0pt'>
   <td height=20 class=xl70 style='height:15.0pt'><?=$W++?></td>
   <td colspan=10 class=xl72 style='border-right:.5pt solid black;border-left:
  none'><?=$q[nome]?></td>
   <td colspan=4 class=xl81><?=$q[codigo]?></td>
   <td colspan=3 class=xl72 style='border-right:.5pt solid black'>&nbsp;</td>
   <td colspan=5 class=xl72 style='border-right:.5pt solid black;border-left:
  none'><?=$t[$q[idPe]]['H']?></td>
   <td colspan=4 class=xl106 style='border-right:.5pt solid black;border-left:none'>R$<?=number_format($t[$q[idPe]]['P'],2,',','.')?></td>
   <td colspan=6 class=xl107 style='border-right:.5pt solid black'>R$ <?=number_format($t[$q[idPe]]['V'],2,',','.')?></td>
 </tr>
 
<? } ?> 
 <tr height=21 style='height:15.75pt'>
   <td colspan=27 height=21 class=xl117 style='border-right:.5pt solid black;
  height:15.75pt'>Total de Equipamentos</td>
   <td colspan=6 class=xl120 style='border-left:none'>R$ <?=number_format($t['GERAL']['V'],2,',','.')?></td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td colspan=33 height=10 class=xl121 style='border-right:.5pt solid black;
  height:7.5pt'>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=33 height=21 class=xl124 style='border-right:.5pt solid black;
  height:15.75pt'>Relatório Diário dos Equipamentos</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
   <td colspan="33" class=xl129 style='border-bottom:.5pt solid black;
  height:30.0pt;border-top:none;width:70pt'>
  <table width="1170" cellpadding="0" cellspacing="0">
  <tr height=20 style='height:15.0pt'>
<td rowspan=2 height=40 class=xl127 width=1155 style='border-bottom:.5pt solid black;
  height:30.0pt;border-top:none;width:70pt'>Código <br>
    Interno</td>
  <td class=xl65 width=1155 style='border-top:none;width:98pt'>Dia</td>
  <td class=xl66 style='border-top:none;border-left:none' colspan="<?=$Dias?>">&nbsp;</td>

 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl65 width=1155 style='height:15.0pt;border-top:none;
  width:98pt'>Semana</td>
  
  
  
  <?
for($i=0;$i<$Dias;$i++){
?>
	<td class=xl69 style='border-top:none;border-left:none'><?=data(CalculaDias('D',data($t[dtmenor]),$i));?></td>
<? } ?>

  
 </tr>
 
 <?
$l=1;
while ($q = mysql_fetch_array($SqlJaLancado2)){
$cor = ($coralternada++ %2 ? "row2" : "row1");

	if($q[combustivelPe]=='S'){
		$COMBUSTIVEL=$q[valorcombustivelPe];
	}
	if($q[seguroPe]=='S'){
		$SEGURO=$q[valorseguroPe];
	}
?>
 <tr height=20 style='height:15.0pt'>
  <td colspan=2 height=20 class=xl129 style='border-right:.5pt solid black;
  height:15.0pt'><?=$q[codigo]?></td>
  
  <?
for($i=0;$i<$Dias;$i++){
?>
<td  class=xl67 style='border-top:none;border-left:none'><?=number_format($eh[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)],2,',','.')?></td>
<? } ?>

 </tr>
 <? } ?>
 </table>
  
  
  
  </td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
   <td colspan=33 height=10 class=xl134 style='border-right:.5pt solid black;
  height:7.5pt'>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
   <td height=21 class=xl74 style='height:15.75pt;border-top:none'>Item</td>
   <td colspan=13 class=xl74 style='border-left:none'>Cobrança Adicional</td>
   <td colspan=4 class=xl74 style='border-left:none'>Cód. Interno</td>
   <td colspan=5 class=xl114 style='border-left:none'>Quantidade</td>
   <td colspan=5 class=xl114 style='border-right:.5pt solid black'>Preço
    Unitário</td>
   <td colspan=5 class=xl74 style='border-left:none'>Valor Parcial</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
   <td height=20 class=xl73 style='height:15.0pt'>2</td>
   <td colspan=13 class=xl73>&nbsp;</td>
   <td colspan=4 class=xl138 style='border-right:.5pt solid black'>&nbsp;</td>
   <td colspan=5 class=xl139>&nbsp;</td>
   <td colspan=5 class=xl141><span style='mso-spacerun:yes'> </span>R$<span
  style='mso-spacerun:yes'>                                     </span>-<span
  style='mso-spacerun:yes'>   </span></td>
   <td colspan=5 class=xl143 style='border-right:.5pt solid black'><span
  style='mso-spacerun:yes'> </span>R$<span
  style='mso-spacerun:yes'>                                     </span>-<span
  style='mso-spacerun:yes'>   </span></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=28 height=21 class=xl146 style='height:15.75pt'>Subtotal</td>
  <td colspan=5 class=xl148><span style='mso-spacerun:yes'> </span>R$<span
  style='mso-spacerun:yes'>                          </span>-<span
  style='mso-spacerun:yes'>   </span></td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl76 style='height:7.5pt'>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl77 style='border-top:none'>&nbsp;</td>
  <td class=xl78 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
   <td height=21 class=xl74 style='height:15.75pt;border-top:none'>Item</td>
   <td colspan=13 class=xl74 style='border-left:none'>Descontos</td>
   <td colspan=4 class=xl74 style='border-left:none'>Cód. Interno</td>
   <td colspan=5 class=xl114 style='border-left:none'>Quantidade</td>
   <td colspan=5 class=xl114 style='border-right:.5pt solid black'>Preço
    Unitário</td>
   <td colspan=5 class=xl74 style='border-left:none'>Valor Parcial</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
   <td height=20 class=xl71 style='height:15.0pt'>2</td>
   <td colspan=13 class=xl137>&nbsp;</td>
   <td colspan=4 class=xl153 style='border-right:.5pt solid black'>&nbsp;</td>
   <td colspan=5 class=xl153 style='border-right:.5pt solid black;border-left:
  none'>&nbsp;</td>
   <td colspan=5 class=xl156 style='border-right:.5pt solid black;border-left:
  none'><span style='mso-spacerun:yes'> </span>R$<span
  style='mso-spacerun:yes'>                                     </span>-<span
  style='mso-spacerun:yes'>   </span></td>
   <td colspan=5 class=xl143 style='border-right:.5pt solid black;border-left:
  none'><span style='mso-spacerun:yes'> </span>R$<span
  style='mso-spacerun:yes'>                                     </span>-<span
  style='mso-spacerun:yes'>   </span></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=28 height=21 class=xl146 style='height:15.75pt'>Subtotal</td>
  <td colspan=5 class=xl159><span style='mso-spacerun:yes'> </span>R$<span
  style='mso-spacerun:yes'>                          </span>-<span
  style='mso-spacerun:yes'>   </span></td>
 </tr>
 <tr height=10 style='mso-height-source:userset;height:7.5pt'>
  <td height=10 class=xl76 style='height:7.5pt'>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl77>&nbsp;</td>
  <td class=xl78>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=33 height=21 class=xl124 style='border-right:.5pt solid black;
  height:15.75pt'>Observações</td>
 </tr>
 <tr height=70 style='mso-height-source:userset;height:52.5pt'>
  <td colspan=33 height=70 class=xl180 style='border-right:.5pt solid black;
  height:52.5pt'>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=21 height=21 class=xl160 style='height:15.75pt'>&nbsp;</td>
  <td colspan=7 rowspan=9 class=xl162 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black'>Total</td>
  <td colspan=5 rowspan=9 class=xl171 style='border-right:.5pt solid black;
  border-bottom:.5pt solid black'><span
  style='mso-spacerun:yes'> </span>R$<?=number_format(($M[vlhoraseqptoMedicao]+$M[vlcustoMedicao])-$M[vldescontoMedicao],2,',','.')?></td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td height=21 class=xl80 style='height:15.75pt'>&nbsp;</td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
  <td class=xl79></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=21 height=20 class=xl83 style='height:15.0pt'>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=8 height=21 class=xl80 style='height:15.75pt'>____________________________</td>
  <td colspan=13 class=xl109>_______________________________</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=8 height=21 class=xl80 style='height:15.75pt'>Depto. Medição /
  Faturamento</td>
  <td colspan=13 class=xl79>Depto. Comercial</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=21 height=20 class=xl83 style='height:15.0pt'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=21 height=20 class=xl83 style='height:15.0pt'>&nbsp;</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=8 height=21 class=xl80 style='height:15.75pt'>____________________________</td>
  <td colspan=13 class=xl109>________ / ________ / ________</td>
 </tr>
 <tr height=21 style='height:15.75pt'>
  <td colspan=8 height=21 class=xl184 style='height:15.75pt'>Aprovação do
  Cliente</td>
  <td colspan=13 class=xl185>Data Aprovação</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=33 height=20 class=xl109 style='height:15.0pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=33 height=20 class=xl109 style='height:15.0pt'></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td colspan=33 height=20 class=xl183 style='height:15.0pt'><span
  style='mso-spacerun:yes'>   </span>site: www.escad.com.br<span
  style='mso-spacerun:yes'>                           </span>e-mails:
  jessica@escad.com.br / barbara@escad.com.br<span
  style='mso-spacerun:yes'>                             </span>Fone: (11)
  2128.5688 / Fax: (11) 2128.5675<span style='mso-spacerun:yes'>      </span></td>
 </tr>
 <![if supportMisalignedColumns]>
 <tr height=0 style='display:none'>
  <td width=1155 style='width:70pt'></td>
  <td width=1155 style='width:98pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
  <td width=1155 style='width:23pt'></td>
 </tr>
 <![endif]>
</table>
</body>
</html>