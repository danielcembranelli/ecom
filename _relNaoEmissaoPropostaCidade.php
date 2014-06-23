<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Relatório de Cliente sem emissão de proposta por cidade</span></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr height="1">
						<td colspan="2" bgcolor="#CCCCCC"><img src="themes/admin_default/space.gif" height="1" width="1"></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr>
						<td colspan="2"><span class="smalltext"></span></td>
					</tr>

					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td colspan="2">
<?
//SESSION PESQUISA FILTRO


if($_POST[idVendedor]!=''){
	if($_SESSION[buscaUltimo][idVendedor]!=$_POST[idVendedor]){
			$_SESSION[buscaUltimo][idVendedor]=$_POST[idVendedor];
	}
}
if($_POST[idFilial]!=''){
	if($_SESSION[buscaUltimo][idFilial]!=$_POST[idFilial]){
			$_SESSION[buscaUltimo][idFilial]=$_POST[idFilial];
	}
}
if($_POST[Dias]!=''){
	if($_SESSION[buscaUltimo][Dias]!=$_POST[Dias]){
			$_SESSION[buscaUltimo][Dias]=$_POST[Dias];
	}
}

//echo '||'.$_SESSION[buscaUltimo][dtInicial].'||';

?>

<form name="users" id="users" action="index.php" method="POST">
<input type="hidden" name="_m" value="<?=$_POST[_m]?>"/>
<input type="hidden" name="_a" value="relNaoEmissaoPropostaCidade"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" <? if($_SERVER["SCRIPT_NAME"]=='/Relatorio.php'){?>style="display:none"<? } ?>><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder" style="display:none"><tr><td class="highlightpage">Atendimento 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1">
<select name="Cli_UF" class="quicksearch">
<option value="">Estado</option>
<?


$Sql = mysql_query("Select ID_PATIO, NOME_PATIO from patio order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[ID_PATIO]?>" <? if($_SESSION[buscaUltimo][idFilial]==$dom[ID_PATIO]){?>selected="selected"<? } ?>><?=$dom[NOME_PATIO]?></option>
<? } ?>
</select>
<? if($dl[tipoUsuario]!='V'){?>
<select name="idVendedor" id="idVendedor" class="quicksearch">
<option value="">Vendedor Cliente</option>
<option value="0" <? if($_SESSION[buscaUltimo][idVendedor]=='0'){?>selected="selected"<? } ?>>Todos</option>
<?
if($dl[tipoUsuario]=='G'){
	$Sql = mysql_query("Select l.id, l.nome from login l inner join login_vendedor lv on (lv.idVendedor=l.id) where lv.idUsuario='".$dl[id]."' order by l.nome") or die (mysql_error());
} else {
	$Sql = mysql_query("Select id, nome from login where (tipoUsuario='A') or (tipoUsuario='C') or (tipoUsuario='V')  order by nome") or die (mysql_error());
}
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($_SESSION[buscaproposta][idVendedor]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } ?>
</select> 
<? } ?>
<select name="Dias" id="idVendedor" class="quicksearch">
<option value="">Periodo</option>
<option value="3" <? if($_SESSION[buscaUltimo][Dias]=='3'){?>selected="selected"<? } ?>>3 meses</option>
<option value="6" <? if($_SESSION[buscaUltimo][Dias]=='6'){?>selected="selected"<? } ?>>6 meses</option>
<option value="12" <? if($_SESSION[buscaUltimo][Dias]=='12'){?>selected="selected"<? } ?>>12 meses</option>
<option value="18" <? if($_SESSION[buscaUltimo][Dias]=='18'){?>selected="selected"<? } ?>>18 meses</option>
<option value="24" <? if($_SESSION[buscaUltimo][Dias]=='24'){?>selected="selected"<? } ?>>24 meses</option>
<option value="36" <? if($_SESSION[buscaUltimo][Dias]=='36'){?>selected="selected"<? } ?>>36 meses</option>
<option value="48" <? if($_SESSION[buscaUltimo][Dias]=='48'){?>selected="selected"<? } ?>>48 meses</option>
<option value="50" <? if($_SESSION[buscaUltimo][Dias]=='50'){?>selected="selected"<? } ?>>50 meses</option>

</select> </td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>
<td class="navpageselected" nowrap><a onclick="javascript:SubmitRelatorio();" href="#" title="Opções">Imprimir</a></td>
<td class="navpageselected" nowrap style="display:none"><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Opções">Opções</a></td>
</tr></table></td></tr></table></tr></td>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td>
<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse;width: 100%; height: 100%;DISPLAY: none;" id="gridtableoptusers"><tr style="height: 1em"><td align="left"><div id="gridoptusers"><ul id="tab"><li><a class="currenttab" href="#" onClick="this.blur(); return switchGridTab('massaction', 'gridoptions')" id="massaction" title="Mass Action">Mass Action</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('search', 'gridoptions')" id="search" title="Advanced Search">Advanced Search</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('settings', 'gridoptions');" id="settings" title="Settings">Settings</a></li></ul></div></td></tr>
<tr style="height: 1em"><td align="left"><div id="tab_massaction" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborder"><tr class="row1"><td align="left" width="60">Action: </td><td align="left"><select name="mass_action" onChange="javascript:return doformConfirm('Are you sure you wish to continue?', this);" class="swiftselect"><option name="firstselect" value="">- Select -</option>
<option value="f2a6c498fb90ee345d997f888fce3b18">Delete</option>
<option value="c4908aca0e352a94cb6207103087070a">Mark as Validated</option>
<option value="6e1de310751f1262fffe196798e21a5d">Mark as Validation Pending</option>
</select></td></tr></table><BR /> </div><div id="tab_search" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" class="tborder" width="100%"><tr class="row1"><td align="left" width="60">Query: </td><td align="left"><input type="text" name="search_query" class="swifttext" /></td></tr><tr class="row2"><td align="left" width="60">Field: </td><td align="left"><select name="search_field" class="swiftselect"><option value="0" selected>Full Name & Email</option>
<option value="1">Full Name</option>
<option value="2">Email</option>
</select></td></tr><tr class="row1"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Search" class="yellowbuttonbig" /></td></tr></table><BR /> </div><div id="tab_settings" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" class="tborder" width="100%"><tr class="row1"><td align="left" width="120">Results Per Page: </td><td align="left"><input type="text" name="set_resultsperpage" value="100" class="swifttext" size="10" /></td></tr><tr class="row2"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Submit" class="yellowbuttonbig" /></td></tr></table><BR /> </div></td></tr></table><table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Proposta</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 



$Sql = "SELECT c.idProposta, pr.statusProposta, lo.nome as nmVProposta, c.antigoidCliente, c.Cli_ID, c.Cli_Fantasia, DATE_FORMAT(c.Cli_DataEmitido,'%d/%m/%Y') as dt, c.dtcadCli, c.idFilial, p.NOME_PATIO, c.idVendedor, l.nome FROM clientes c left join patio p on (p.ID_PATIO=c.idFilial) left join login l on (l.id=c.idVendedor) left join proposta pr on (pr.idProposta=c.idProposta) left join login lo on (lo.id=pr.idVendedor)";

$nSql = "SELECT c.idProposta FROM clientes c left join patio p on (p.ID_PATIO=c.idFilial) left join login l on (l.id=c.idVendedor) left join proposta pr on (pr.idProposta=c.idProposta) left join login lo on (lo.id=pr.idVendedor)";
$type=0;


$montaWhere = ' where c.Cli_Status="A"';
//	if($dl[tipoUsuario]=='V'){
//		$Sql.=" And p.idVendedor='".$dl[id]."'";
//	}
//	$type = 1;



if($_REQUEST[idCliente]!=''){
	$montaWhere .= " And p.idCliente='$_REQUEST[idCliente]'";
}
if($dl[tipoUsuario]=='V'){
$_POST[idVendedor]=$dl[id];
$montaWhere .=" And c.idVendedor='".$dl[id]."'";
}
if($_SESSION[buscaUltimo][idVendedor]!='' && $dl[tipoUsuario]!='V'){
	if($_SESSION[buscaUltimo][idVendedor]!='0'){
		$montaWhere .= " And c.idVendedor='".$_SESSION[buscaUltimo][idVendedor]."'";
		$type = 1;
	}
}
if($_SESSION[buscaUltimo][idFilial]!=''){
	if($_SESSION[buscaUltimo][idFilial]!='0'){
		$montaWhere .= " And c.idFilial='".$_SESSION[buscaUltimo][idFilial]."'";
		$type = 1;
	}
}
if($_SESSION[buscaproposta][tipoProposta]!=''){
	if($_SESSION[buscaproposta][tipoProposta]!='0'){
		$montaWhere .= " And p.tipoProposta='".$_SESSION[buscaproposta][tipoProposta]."'";
		$type = 1;
	}
}
if($_SESSION[buscaUltimo][Dias]!=''){
	
	$seismeses = date("Y-m-d",mktime (0,0,0,date("m")-$_SESSION[buscaUltimo][Dias],date("d"),date("Y")));
	$montaWhere .= " And c.Cli_DataEmitido < '".$seismeses." 23:59:59'";
}

$montaWhere .= "order by c.Cli_DataEmitido desc";
//Paginação
$numreg = 500; // Quantos registros por página vai ser mostrado
        if (!isset($_REQUEST[pg])) {
                $_REQUEST[pg] = 0;
        }
$inicial = $_REQUEST[pg] * $numreg;

//if($montaWhere!=''){
	//$montaWhere  = ' where '.$montaWhere;
//}
if($_SESSION[buscaUltimo][Dias]!=''){
	$sqlPaginacao = mysql_query($nSql.$montaWhere) or die ("Could not connect to database: ".mysql_error());;
	$quantreg = mysql_num_rows($sqlPaginacao);
	
	$quant_pg = ceil($quantreg/$numreg);
	
	//echo '--'.$Sql.$montaWhere.'--';
	$sqlUsuario = mysql_query($Sql.$montaWhere.' Limit '.$inicial.','.$numreg) or die ("Could not connect to database: ".mysql_error());

}
?>
<tr>
<td class="tabletitlerow" width="30%" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Vendedor Cliente</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Filial</td>
<td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" width="35%" colspan="3" align="center" nowrap>&nbsp;Proposta</td>
</tr>
<?
if($_SESSION[buscaUltimo][Dias]!=''){
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="left" valign="">&nbsp;<a href="index.php?_m=livesupport&_a=editCliente&id=<?=$sU[Cli_ID]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" align="center">&nbsp;<?=$sU[nome];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[NOME_PATIO];?></td>
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
<? } }?>

</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td align="left">


<table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Resultado <?=$_REQUEST[pg]?> de <?=$quant_pg?></td>

<!-- <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>-->
<?

for($i_pg=1;$i_pg<$quant_pg;$i_pg++) { 
                // Verifica se a página que o navegante esta e retira o link do número para identificar visualmente
                //if ($pg == ($i_pg-1)) { 
                        //echo " <span class=pgoff>[$i_pg]</span> ";
                //} else {
                        //$i_pg2 = $i_pg-1;
                        //echo " <a href=".$PHP_SELF."?pg=$i_pg2 class=pg><b>$i_pg</b></a> ";
                //}
				if($_REQUEST[pg]==$i_pg){
					$css = "navpageselected";
				} else {
					$css = "navpage";
				}
				echo "<td class='".$css."'><a href='index.php?_m=ate&_a=relNaoEmissaoProposta&pg=".$i_pg."' title='Pag. ".$i_pg." of ".$quant_pg."'>".$i_pg."</a></td>";
        }
?>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td></tr></table></tr></td>
</tr></td></table>


</form>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

