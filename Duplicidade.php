<? include("Config.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true);
$a='';
$n='';
$m='';
$c='';
$o='';

$sqlPreco = mysql_query("SELECT id, nome,L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) ORDER BY nome1, marca, categoria, modelo") or die ("PRECO: ".mysql_error());
while($s = mysql_fetch_array($sqlPreco)){
	$t=0;
	if($n==$s[nome1]){
		$t++;
	}
	if($m=$s[marca]){
		$t++;
	}
	if($c==$s[categoria]){
		$t++;
	}
	if($o=$s[modelo]){
		$t++;
	}
	
	if($a==$s[nome1].' '.$s[marca].' '.$s[categoria].' '.$s[modelo]){
		echo '<strong>';
	}
	echo $s[nome1].' '.$s[marca].' '.$s[categoria].' '.$s[modelo].' | '.$t;
	if($a==$s[nome1].' '.$s[marca].' '.$s[categoria].' '.$s[modelo]){
		echo '</strong>';
	}
	echo '<br>';
	
	$a=$s[nome1].' '.$s[marca].' '.$s[categoria].' '.$s[modelo];
	
	$n=$s[nome1];
	$m=$s[marca];
	$c=$s[categoria];
	$o=$s[modelo];
}
mysql_free_result($sqlPreco);
?>