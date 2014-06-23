<? include("Verifica.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true);
$sqlPreco = mysql_query("SELECT ttl.idTtl, ttl.tituloTtl, ttl2.tituloTtl as parent FROM tabela_tecnica_linhas ttl left join tabela_tecnica_linhas ttl2 on (ttl2.idTtl=ttl.parentTtl) where ttl.idTtl='".$_REQUEST[id]."' Limit 1") or die ("PRECO: ".mysql_error());
$sP = mysql_fetch_array($sqlPreco);
mysql_free_result($sqlPreco);?>
<?=$sP[idTtl]?>|<?=$sP[tituloTtl]?> <? if($sP[parent]!=''){?>(<?=$sP[parent]?>)<? } ?>
