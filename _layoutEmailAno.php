<? include("Config.php");
set_time_limit(0);
$dt = explode('-',$_REQUEST[dt]);
$dat = $dt[2].'/'.$dt[1].'/'.$dt[0];
$dtSql = $_REQUEST[dt];
?>
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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Estatistica de Proposta Emitida de 2011</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2">
            

            
        <table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr>
<td class="tabletitlerow" width="40%" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Propostas Emitidas</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Confirmadas</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Concluidas</td>

</tr>
<? 
$montaWhere = "SELECT p.idCliente, Cli_ID, Cli_Fantasia, Cli_CGC,dtcadCli, Cli_Status, count(*) as total FROM proposta p left join clientes c on (p.idCliente=c.Cli_ID) where p.dtcadProposta between '2011-01-01 00:00:01' and '2011-12-31 23:59:59' And p.statusProposta!='T' And p.idCliente!='0' group by p.idCliente order by total desc ";
$type=0;

//if($_POST[statusProposta]==''){
//$_POST[statusProposta]='T';
//	$montaWhere = $Sql.' where p.statusProposta!="'.$_POST[statusProposta].'"';
//} else {
//	$montaWhere = $Sql.' where p.statusProposta="'.$_POST[statusProposta].'"';
//}
//	if($dl[tipoUsuario]=='V'){
//		$Sql.=" And p.idVendedor='".$dl[id]."'";
//	}
//	$type = 1;



//if($_REQUEST[idCliente]!=''){
//	$montaWhere .= " And p.idCliente='$_REQUEST[idCliente]'";
//}
//if($dl[tipoUsuario]=='V'){
//$_POST[idVendedor]=$dl[id];
//$Sql.="where p.idVendedor='".$dl[id]."'";
//}
//if($_POST[idVendedor]!=''){
//	$montaWhere .= " And p.idVendedor='$_POST[idVendedor]'";
//	$type = 1;
//}
	
	
//	$montaWhere .= "where p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[0]."-".$dtf[1]."-".$dtf[2]." 23:59:59'";

//if($_POST[nrProposta]!=''){

	//$montaWhere .= " And p.idProposta = '".$_POST[nrProposta]."'";

//}
	//$montaWhere .= " And statusProposta!='T' group by idVendedor";
	//echo $montaWhere;
$sqlUsuario = mysql_query($montaWhere) or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" align="left">&nbsp;<?=$sU[Cli_Fantasia];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[total];?></td>
<td colspan="" align="center">&nbsp;<?
$sl = "SELECT count(*) as confirma FROM proposta p where idCliente='".$sU[idCliente]."' And statusProposta!='T'";
$sl .= " And p.confirmaProposta between '2011-01-01 00:00:01' and '2011-12-31 23:59:59'";

$SqlC = mysql_query($sl);
$sC = mysql_fetch_array($SqlC);
echo $sC[confirma];?></td>
<td colspan="" align="center">&nbsp;<?
$sc = "SELECT count(*) as conclui FROM proposta p where idCliente='".$sU[idCliente]."' And statusProposta!='T'";
$sc .= " And p.concluiProposta between '2011-01-01 00:00:01' and '2011-12-31 23:59:59'";


$SqlC = mysql_query($sc);

$sC = mysql_fetch_array($SqlC);
echo $sC[conclui];?></td>

</tr>
<? } ?>

</table>

            
</td>
</tr>
</tbody>
</table>

</td>
</tr>
</table>
<br />
