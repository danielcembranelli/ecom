<? include("Verifica.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Relatório de Clientes por Cidade</title>
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />
</head>

<body>
<? for($i=0;$i<count($_POST[CIDADE]);$i++){?>
<h2><?=$_POST[CIDADE][$i]?></h2>
<?

$montaWhere = "SELECT A.Cli_Status, A.idProposta, pr.statusProposta, lo.nome as nmVProposta, DATE_FORMAT(A.Cli_DataEmitido,'%d/%m/%Y') as dt, A.antigoidCliente, p.NOME_PATIO, l.nome, A.Cli_ID, A.Cli_Fantasia, Cli_Nome, A.Cli_CGC, A.Cli_Contato, A.Cli_Fone1, A.Cli_DDD1, A.Cli_Endereco, A.Cli_Cidade, A.Cli_Email, A.Cli_URL, A.Cli_UF, A.Cli_CEP, A.dtcadCli FROM clientes A left join patio p on (p.ID_PATIO=A.idFilial) left join login l on (l.id=A.idVendedor)left join proposta pr on (pr.idProposta=A.idProposta) left join login lo on (lo.id=pr.idVendedor) where Cli_Cidade='".$_POST[CIDADE][$i]."'";
// Cli_Status='A' And
if($_POST[Dias]!=''){
	
	$seismeses = date("Y-m-d",mktime (0,0,0,date("m")-$_POST[Dias],date("d"),date("Y")));
	//$montaWhere .= " And A.Cli_DataEmitido < '".$seismeses." 23:59:59'";
}

$Sql = mysql_query($montaWhere." order by Cli_Fantasia") or die (mysql_error());
//echo $montaWhere;
?>

<table width="100%">
<td class="tabletitlerow" width="" align="" nowrap>&nbsp;Nome&nbsp;</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Razão Social</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;CNPJ</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Contato</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Endereço</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Telefone</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Email</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Site</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Status</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Vendedor</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Filial</td>
<td class="tabletitlerow" colspan="4" align="center" nowrap>&nbsp;Proposta</td>
<?
while ($sU = mysql_fetch_array($Sql)){
$cor = ($coralternada++ %2 ? "row2" : "row1"); 
?>
<tr id="trid1466" class="<?=$cor?>">
<td colspan="" align="" valign="">&nbsp;<?=$sU[Cli_Fantasia]?></td>
<td colspan="" align="center" valign=""><?=$sU[Cli_Nome]?></td>
<td colspan="" align="center" valign=""><?=$sU[Cli_CGC]?></td>
<td colspan="" align="center" valign=""><?=$sU[Cli_Contato]?></td>
<td colspan="" align="center" valign=""><?=$sU[Cli_Endereco]?></td>
<td colspan="" align="center" valign=""><? if($sU[Cli_DDD1]!=''){?>(<?=$sU[Cli_DDD1]?>) <? } ?><?=$sU[Cli_Fone1]?></td>
<td colspan="" align="center" valign=""><?=$sU[Cli_Email]?></td>
<td colspan="" align="center" valign=""><?=$sU[Cli_URL]?></td>
<td colspan="" width="80" align="center" valign=""><?=labelStatusCliente($sU[Cli_Status]);?></td>
<td colspan="" align="center" valign=""><?=$sU[nome]?></td>
<td colspan="" align="center" valign=""><?=$sU[NOME_PATIO]?></td>
<td colspan="" align="center"><?=$sU[dt];?></td>
<td colspan="" align="center"><?=$sU[idProposta];?></td>
<td colspan="" align="center"><?=$sU[nmVProposta];?></td>
<td colspan="" align="center"><?
 switch($sU[statusProposta]){
                case 'N': echo 'Em aberto';break;
                case 'L': echo 'Não Confirmada';break;
                case 'C': echo 'Confirmada';break;
                case 'F': echo 'Finalizada';break;
                case 'T': echo 'Excluida';break;
                }?></td>
</tr>
<? }?>
</table>
<? } ?>
</body>
</html>