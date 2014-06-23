<? include("Verifica.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />

<title>Relatório de Familia</title>
</head>

<body>
<h2>Alteração de Preço - <?=date("d/m/Y");?></h2>
<center>
<form method="post" action="AlteraPrecos.php">
Filtrar por Familia: &nbsp;<select name="idFamiliamaster" id="itemmenu">
 <option value="0">Selecione a familia master</option>
<? $sqlMaster = mysql_query("SELECT id, nome FROM familia_master A ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
while ($sM = mysql_fetch_array($sqlMaster)){
?>
      <option value="<?=$sM[id]?>" <? if($_POST[idFamiliamaster]==$sM[id]){?>selected="selected"<? } ?>><?=$sM[nome]?></option>
      <? }?>
    </select><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Filtrar" />
    </form>
    
</center>
<form method="post" action="SalvaPreco.php">
<br />
<table>
<tr>
<td class="tabletitlerow" width="10%" align="center" nowrap>&nbsp;Nome</td>
<td class="tabletitlerow" width="10%" align="center" nowrap>&nbsp;Marca</td>
<td class="tabletitlerow" width="10%" align="center" nowrap>&nbsp;Modelo</td>
<td class="tabletitlerow" width="10%" align="center" nowrap>&nbsp;Categoria</td>
<td class="tabletitlerow" width="10%" align="center" nowrap>&nbsp;Preço 1</td>
<td class="tabletitlerow" width="10%" align="center" nowrap>&nbsp;Preço 2</td>
<td class="tabletitlerow" width="10%" align="center" nowrap>&nbsp;Preço 3</td>
</tr>

<? 
$sqlUsuario = mysql_query("SELECT id, nome,grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, A.consumoFamilia, A.seguroFamilia, A.idOt FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where A.statusFamilia='A' And master='".$_POST[idFamiliamaster]."' ORDER BY nome1, marca, categoria, modelo") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
$sqlPreco = mysql_query("SELECT idPreco, valor1Preco, valor2Preco, valor3Preco, minimoPreco FROM preco where statusPreco ='A' And idFamilia = '".$sU[id]."' Limit 1") or die ("PRECO: ".mysql_error());
$sP = mysql_fetch_array($sqlPreco);


$quantreg = mysql_num_rows($sqlPreco);
mysql_free_result($sqlPreco);

if($quantreg>0){
?>
<tr class="<?=$cor?>">
<td colspan="" width="" align="center" valign="">&nbsp;<?=$sU[nome1];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[marca];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[modelo];?></td>
<td colspan="" align="center"><?=$sU[categoria];?></td>
<td colspan="" align="center"><input type="hidden" name="ID[]" value="<?=$sP[idPreco];?>" />
<input type="text" name="PRECO1[]" value="<?=number_format($sP[valor1Preco],2,',','.');?>" /></td>
<td colspan="" align="center"><input type="text" name="PRECO2[]" value="<?=number_format($sP[valor2Preco],2,',','.');?>" /></td>
<td colspan="" align="center"><input type="text" name="PRECO3[]" value="<?=number_format($sP[valor3Preco],2,',','.');?>" /></td>

</tr>
<? } }?>

</table>
<br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
</form>
</body>
</html>
