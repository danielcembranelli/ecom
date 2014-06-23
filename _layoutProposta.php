<? include("Config.php");
$sqlUsuario = mysql_query("SELECT p.statusProposta, p.idCliente, count(*) as total FROM proposta p left join clientes c on (p.idCliente=c.Cli_ID) where p.dtcadProposta between '".$_REQUEST[ANO]."-01-01 00:00:01' and '".$_REQUEST[ANO]."-12-31 23:59:59' And p.statusProposta!='T' And p.idCliente!='0' group by p.idCliente, p.statusProposta order by p.idCliente") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
	$a[$sU[idCliente]][$sU[statusProposta]]=$sU[total];
}
?>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
		<link rel="stylesheet" href="jquery/themes/blue/style.css" type="text/css" media="print, projection, screen" />
		<script type="text/javascript" src="jquery/jquery.tablesorter.js"></script>
		<script type="text/javascript" src="jquery/addons/pager/jquery.tablesorter.pager.js"></script>
        
       <script>
	   
	   $(document).ready(function()  {
			
			
			$("#Relacao").tablesorter({widthFixed: true, widgets: ['zebra'],sortList:[[2,1]]}); 
	   });
			</script> 
<link rel="stylesheet" type="text/css" media="all" href="http://ecom.escad.com.br/staff/index.css" />
<img src="http://ecom.escad.com.br/themes/admin_default/logo.jpg" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="http://ecom.escad.com.br/themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Movimentação de Cliente em 2011</span></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr height="1">
						<td colspan="2" bgcolor="#CCCCCC"><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="1" width="1"></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr>
						<td colspan="2"><span class="smalltext"></span></td>
					</tr>

					<tr height="4">
						<td colspan="2"><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td colspan="2" align="center">
<table cellpadding="0" cellspacing="0" border="0" width="95%" class="tborder">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Estatistica de Proposta Emitida de <?=$_REQUEST[ANO]?></td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2">
            
<table border="0" cellpadding="3" cellspacing="1" width="100%" class="tablesorter" id="Relacao">
<thead> 
<tr>
<th width="40%" align="center" nowrap>&nbsp;Cliente</th>
<th align="center" nowrap>&nbsp;Vendedor</th>
<th align="center" nowrap>&nbsp;Propostas Emitidas</th>
<th align="center" nowrap>&nbsp;Confirmadas</th>
<th align="center" nowrap>&nbsp;Não Confirma</th>

</tr>
</thead> 
<tbody> 
<? 
$montaWhere = "SELECT p.idCliente, Cli_ID, Cli_Fantasia, Cli_Status, count(*) as total, l.nome FROM proposta p left join clientes c on (p.idCliente=c.Cli_ID) left join login l on (l.id=c.idVendedor) where p.dtcadProposta between '".$_REQUEST[ANO]."-01-01 00:00:01' and '".$_REQUEST[ANO]."-12-31 23:59:59' And p.statusProposta!='T' And p.idCliente!='0' group by p.idCliente order by total desc ";
$type=0;

$sqlUsuario = mysql_query($montaWhere) or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){

	$tC = number_format($a[$sU[idCliente]]['C']+$a[$sU[idCliente]]['F']);
	$tN = number_format($a[$sU[idCliente]]['L']+$a[$sU[idCliente]]['N']+$a[$sU[idCliente]]['A']);
	if($tN>$tC){
	$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>

<tr id="trid1466" class="<?=$cor?>">
<td colspan="" align="left">&nbsp;<?=$sU[Cli_Fantasia];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[nome];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[total];?></td>
<td colspan="" align="center">&nbsp;<?=$tC?></td>
<td colspan="" align="center">&nbsp;<?=$tN?></td>
</tr>
<? } }?>
</tbody> 
</table>

            
</td>
</tr>
</tbody>
</table>

</td>
</tr>
</table>
<br />
