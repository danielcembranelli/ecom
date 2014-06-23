<? include("Config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />

<title>Relatório de Familia</title>
</head>

<body>
<h2>Ralatório de Família - <?=date("d/m/Y");?></h2>
<table>
<tr>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Nome</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Marca</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Modelo</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Categoria</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;Valor do Bem</td>
<td class="tabletitlerow" width="5%" colspan="2" align="center" nowrap>&nbsp;Seguro</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;Consumo</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;Operador</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;Preço 1</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;Preço 2</td>
<td class="tabletitlerow" width="5%" align="center" nowrap>&nbsp;Preço 3</td>
</tr>

<? 
$sqlUsuario = mysql_query("SELECT id, nome,grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, A.consumoFamilia, A.seguroFamilia, A.idOt FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where A.statusFamilia='A' ORDER BY nome1, marca, categoria, modelo") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
$sqlPreco = mysql_query("SELECT valor1Preco, valor2Preco, valor3Preco, minimoPreco FROM preco where statusPreco ='A' And idFamilia = '".$sU[id]."' Limit 1") or die ("PRECO: ".mysql_error());
$sP = mysql_fetch_array($sqlPreco);
mysql_free_result($sqlPreco);

$sqlFamilia = mysql_query("SELECT o.valorOt, f.valorbemFamilia, f.seguroFamilia FROM familia f left join operadortipo o on(o.idOt=f.idOt) where f.id='".$sU[id]."' Limit 1") or die ("FAMILIA: ".mysql_error());
$sF = mysql_fetch_array($sqlFamilia);
mysql_free_result($sqlFamilia);

?>
<tr class="<?=$cor?>">
<td colspan="" width="" align="center" valign="">&nbsp;<?=$sU[nome1];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[marca];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[modelo];?></td>
<td colspan="" align="center"><?=$sU[categoria];?></td>
<td colspan="" align="center">R$ <?=number_format($sF[valorbemFamilia], 2, ',', '.')?></td>
<td colspan="" align="center"><?=number_format($sU[seguroFamilia],2,',','');?>%</td>
<td colspan="" align="center">R$ <?=number_format((((($sF[valorbemFamilia]/100)*$sF[seguroFamilia])/12)/200), 2, ',', '')?></td>
<td colspan="" align="center"><?=$sU[consumoFamilia];?></td>
<td colspan="" align="center">R$<?=number_format($sF[valorOt],2,',','.');?></td>
<td colspan="" align="center">R$<?=number_format($sP[valor1Preco],2,',','.');?></td>
<td colspan="" align="center">R$<?=number_format($sP[valor2Preco],2,',','.');?></td>
<td colspan="" align="center">R$<?=number_format($sP[valor3Preco],2,',','.');?></td>

</tr>
<? } ?>

</table>

</body>
</html>
