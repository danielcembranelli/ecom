<? include("config.php");    
header("Content-Type: text/html;  charset=ISO-8859-1",true);     
$sqlProposta = mysql_query("SELECT p.statusProposta,c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, p.tipoProposta, p.obsgeraisProposta, p.contatoProposta, pa.nome, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y') as data FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) where p.idProposta = '".$_REQUEST[idProposta]."'") or die ("Could not connect to database: ".mysql_error());
$sP = mysql_fetch_array($sqlProposta);
//RECEBE PARÃMETRO                     
//PRINTA O RESULTADO  
echo strtoupper($sP[Cli_Fantasia]).'|'.strip_tags($sP[descricaoObra]).'|'.$sP[statusProposta];
mysql_free_result($sqlProposta);             
?>
