<? include("Config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />
<title>Relat&oacute;rio de Medi&ccedil;&otilde;es</title>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type="text/javascript" src="libEcom.js"></script>
<script type="text/javascript" src="js/meiomask.js"></script>
<script type="text/javascript" src="js/mascara_input.js"></script>
</head>
<style>
*{
	font-size:9px; !important
}
</style>
<body>
<?
$a=0;
?>
<form action="RelatorioPropostaMedicao.php" method="post">
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
      <td></td>
      <td align="center"><input name="button" type="submit" class="yellowbutton" id="button" value="Filtrar" /></td>
    </tr>
  </table>
</form>
<? if($_POST[DTI]!='' && $_POST[DTF]!=''){?>
<h2>Relatório de Medições - <?=$_POST[DTI]?> - <?=$_POST[DTF]?></h2>
<table width="100%" border="1" cellpadding="0" cellspacing="0" class="Tabela">
<thead>
<tr>
<td colspan="3" align="center" nowrap class="row1">&nbsp;Contrato / Proposta</td>
<td colspan="3" align="center" nowrap class="row1">Dados da Obra</td>

<td colspan="7" align="center" nowrap class="row1">Medição</td>

<td width="40" rowspan="2" align="center" nowrap class="row1">Vendedor</td>
</tr>

<tr class="row1">
  <td align="center" nowrap class="row1">#</td>
  <td align="center" nowrap class="row1">Cliente</td>
  <td align="center" nowrap class="row1">Status</td>

  <td align="center">inicio</td>
  <td align="center">fim </td>
  <td align="center">status</td>
  <td align="center" nowrap class="row1">Periodo</td>
  <td align="center" nowrap class="row1">Valor</td>

  <td align="center" nowrap class="row1">NF</td>
  <td align="center" nowrap class="row1">Emiss&atilde;o NF</td>
  <td align="center" nowrap class="row1">Data Vcto NF</td>
  <td align="center" nowrap class="row1">Pagamento</td>
  <td width="60" align="center" nowrap class="row1">Status</td>
  </tr>

</thead>
<tbody>
<? 

$THORA=0;
$TEQPTO=0;
$TCOMISSAO=0;

$Sql = "SELECT o.status, p.dtprevisaoProposta, p.statusProposta, DATE_FORMAT(p.dtprevisaoProposta,'%d/%m/%Y') as dtprevisao, DATE_FORMAT(o.inicio,'%d/%m/%Y') as inicio, DATE_FORMAT(o.fim,'%d/%m/%Y') as fim, lo.nome as nomeVendedor, c.Cli_Fantasia, pe.fretedPe, p.dtiniProposta, p.dtprevisaoProposta, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, p.idProposta, pe.operadorPe, pe.valoroperadorPe, pe.precoPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe, pe.valorseguroPe, pe.fretePe, pe.qtdaPe FROM proposta_equipamento pe inner join proposta p on (p.idProposta=pe.idProposta) left join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) left join obra o on (o.idProposta=pe.idProposta) left join clientes c on (p.idCliente=c.Cli_ID) left join login lo on (lo.id=p.idVendedor) where ";

$Sql .= "(p.statusProposta='C' And o.status='a') or ";
$Sql.="(p.confirmaProposta<='".dataSql($_POST[DTI])."' And p.concluiProposta>='".dataSql($_POST[DTI])."') or";
$Sql.="(p.statusProposta='F' And p.concluiProposta>='".dataSql($_POST[DTI])."') or";
$Sql.="(p.statusProposta='C' And p.dtprevisaoProposta>='".dataSql($_POST[DTI])."')";

$Sql.="group by p.idProposta";
//echo $Sql;
$sqlUsuario = mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){

	$SqlM = "SELECT m.vlhoraseqptoMedicao, m.vlcustoMedicao, vldescontoMedicao, DATE_FORMAT(m.inicioMedicao,'%d/%m/%Y') as dtinicio, DATE_FORMAT(m.finalMedicao,'%d/%m/%Y') as dtfinal, m.idMedicao, DATE_FORMAT(m.dtvencimentoMedicao,'%d/%m/%Y') as dtvencimento,DATE_FORMAT(m.dtnotafiscalMedicao,'%d/%m/%Y') as dtnotafiscal, m.nrnotafiscalMedicao, m.dtvencimentoMedicao, DATE_FORMAT(m.dtpagamentoMedicao,'%d/%m/%Y') as dtpagamento FROM medicao m where m.idProposta='".$sU[idProposta]."' And m.statusMedicao!='T'";
	
	$sqlMedicao = mysql_query($SqlM) or die ("Could not connect to database: ".mysql_error());
	
	
	
	$cor = ($coralternada++ %2 ? "row1" : "row2"); 
?>
            <tr class="<?=$cor?>">
            <td colspan="" width="" align="center" valign=""><?=$sU[idProposta];?></td>
            <td width="160" align="center" valign=""><?=$sU[Cli_Fantasia];?></td>
            <td colspan="" width="" align="center" valign="">
            <?
                switch($sU[statusProposta]){
                case 'A': echo 'Aguardando Aprovação';break;
                case 'N': echo 'Em aberto';break;
                case 'L': echo 'Não Confirmada';break;
                case 'C': echo 'Confirmada';break;
                case 'F': echo 'Finalizada';break;
                case 'T': echo 'Excluida';break;
                }
            ?>
            </td>
            
                <? if($sU[status]==''){?>
                <td align="center" colspan="10">Obra não iniciada no MapaES</td>
                <? } else {?>
                <td align="center"><?=$sU[inicio];?></td>
                <td colspan="" align="center"><? 
                    if($sU[status]=='a'){
                    
                        echo '<strong><i>'.$sU[dtprevisao].'</i></strong>';
                    } else {
                        echo $sU[fim];
                    }?></td>
                <td align="center"><?
                switch($sU[status]){
                case 'a': echo 'Em andamento';break;
                case 'b': echo 'Concluido';break;
                }
                
                ?></td>
            

                <td colspan="7" align="center">
                <? if(mysql_num_rows($sqlMedicao)>0){?>
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
					<th align="center" nowrap class="<?=$cor?>">Periodo</th>
                  	<th align="center" nowrap class="<?=$cor?>">Valor</th>
                  	<th align="center" nowrap class="<?=$cor?>">NF</th>
                  	<th align="center" nowrap class="<?=$cor?>">Emiss&atilde;o NF</th>
                  	<th align="center" nowrap class="<?=$cor?>">Data Vcto NF</th>
                  	<th align="center" nowrap class="<?=$cor?>">Pagamento</th>
                  	<th width="60" align="center" nowrap class="<?=$cor?>">Status</th>
                
                </tr>    
				<? 
				while ($sM = mysql_fetch_array($sqlMedicao)){
				?>	
                <tr>
                <td align="center" nowrap class="<?=$cor?>"><?=$sM[dtinicio]?> até <?=$sM[dtfinal]?> </td>
				<td align="center" nowrap class="<?=$cor?>">R$ <?=number_format(($sM[vlhoraseqptoMedicao]+$sM[vlcustoMedicao])-$sM[vldescontoMedicao],2,',','.')?></td>
                <td align="center" nowrap class="<?=$cor?>"><?=$sM[nrnotafiscalMedicao]?></td>
                <td align="center" nowrap class="<?=$cor?>"><?=$sM[dtnotafiscal]?></td>
                <td align="center" nowrap class="<?=$cor?>"><?=$sM[dtvencimento]?></td>
                <td align="center" nowrap class="<?=$cor?>"><?=$sM[dtpagamento]?></td>
                <td width="60" align="center" nowrap class="<?=$cor?>">
                <? if($sM[dtpagamento]=='00/00/0000'){
	if($sM[dtvencimentoMedicao]<date('Y-m-d')){
		echo 'Vencido';
		
	} else {
		
		echo 'Em Aberto';
	}
	?>	
<? } else {?>
Baixado
<? }?>
                
                </td>
				</tr>
				<? } ?>
                </table>
                
                <? } else {?>
                Sem Medição Emitida para o Contrato
                <? } ?>
                </td>
                
                <? } ?>
                <td colspan="" align="center" width="80"><?=$sU[nomeVendedor];?></td>
                
    </tr>
<?	
} 
?>

</tbody>
<tfoot>
<tr class="<?=$cor?>">
<th colspan="13" align="right" valign=""><strong></strong></td>

<th align="center">&nbsp;</th>
</tr>
</tfoot>
</table>
<? } ?>
</body>
</html>
