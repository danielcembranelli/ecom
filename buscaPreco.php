<? include("Verifica.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true);
$sqlPreco = mysql_query("SELECT valor1Preco, valor2Preco, valor3Preco, minimoPreco FROM preco where statusPreco ='A' And idFamilia = '".$_REQUEST[id]."' Limit 1") or die ("PRECO: ".mysql_error());
$sP = mysql_fetch_array($sqlPreco);
mysql_free_result($sqlPreco);
$sqlFamilia = mysql_query("SELECT o.valorOt, f.consumoFamilia, f.seguroFamilia, f.valorbemFamilia FROM familia f left join operadortipo o on(o.idOt=f.idOt) where f.id='".$_REQUEST[id]."' Limit 1") or die ("FAMILIA: ".mysql_error());
$sF = mysql_fetch_array($sqlFamilia);
mysql_free_result($sqlFamilia);
$sqlCombustivel = mysql_query("SELECT valorParametro FROM parametro p where idParametro='1' Limit 1") or die ("COMBUSTIVEL: ".mysql_error());
$sC = mysql_fetch_array($sqlCombustivel);
mysql_free_result($sqlCombustivel);
?>
<?=nomeFamilia($_REQUEST[id])?>|<?=number_format($sP[valor1Preco], 2, ',', '');?>|<?=number_format($sP[valor2Preco], 2, ',', '');?>|<?=number_format($sP[valor3Preco], 2, ',', '');?>|<?=number_format($sF[valorOt], 2, ',', '');?>|<?=number_format($sF[consumoFamilia]*$sC[valorParametro], 2, ',', '');?>|<?=number_format((((($sF[valorbemFamilia]/100)*$sF[seguroFamilia])/365)/9), 2, ',', '')?>|<?=$sF[valorbemFamilia]?>
