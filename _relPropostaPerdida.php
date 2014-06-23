<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Relatório de Proposta N&atilde;o Confirmada</span></td>
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

if($_POST[idFm]!=''){
	if($_SESSION[buscaLocMaq][idFm]!=$_POST[idFm]){
			$_SESSION[buscaLocMaq][idFm]=$_POST[idFm];
	}
}
if($_POST[idVendedor]!=''){
	if($_SESSION[buscaLocMaq][idVendedor]!=$_POST[idVendedor]){
			$_SESSION[buscaLocMaq][idVendedor]=$_POST[idVendedor];
	}
}
if($_POST[idFilial]!=''){
	if($_SESSION[buscaLocMaq][idFilial]!=$_POST[idFilial]){
			$_SESSION[buscaLocMaq][idFilial]=$_POST[idFilial];
	}
}
if($_POST[dtInicial]!=''){
	if($_SESSION[buscaLocMaq][dtInicial]!=$_POST[dtInicial]){
			$_SESSION[buscaLocMaq][dtInicial]=$_POST[dtInicial];
	}
}
if($_POST[dtInicial]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaLocMaq][dtInicial]='';
}
if($_POST[dtFinal]!=''){
	if($_SESSION[buscaLocMaq][dtFinal]!=$_POST[dtFinal]){
			$_SESSION[buscaLocMaq][dtFinal]=$_POST[dtFinal];
	}
}
if($_POST[dtFinal]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaLocMaq][dtFinal]='';
}

if($_POST[_a]!=''){
	if($_SESSION[buscaUltimo][_a]!=$_POST[_a]){
			$_SESSION[buscaUltimo][_a]=$_POST[_a];
	}
}
//echo '||'.$_SESSION[buscaLocMaq][dtInicial].'||';

?>

<form name="users" id="users" action="index.php" target="_self" method="POST">
<input type="hidden" name="_m" value="ate"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<table width="100%"  border="0" cellspacing="0" cellpadding="0" <? if($_SERVER["SCRIPT_NAME"]=='/Relatorio.php'){?>style="display:none"<? } ?>><tr valign="top"><td align="left">
<table border="0" cellpadding="0" cellspacing="1" class="tborder" style="display:none"><tr><td class="highlightpage">Atendimento 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1" >
<select name="idFm" class="quicksearch">
<option value="">Motivo</option>
<option value="0" <? if($_SESSION[buscaLocMaq][idFm]=='0'){?>selected="selected"<? } ?>>Todas</option>
<?


$Sql = mysql_query("Select idMp, labelMp from motivo_proposta order by labelMp") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[idMp]?>" <? if($_SESSION[buscaLocMaq][idFm]==$dom[idMp]){?>selected="selected"<? } ?>><?=$dom[labelMp]?></option>
<? } ?>
</select>
<select name="idFilial" class="quicksearch">
<option value="">Filial</option>
<option value="0" <? if($_SESSION[buscaLocMaq][idFilial]=='0'){?>selected="selected"<? } ?>>Todas</option>
<?


$Sql = mysql_query("Select ID_PATIO, NOME_PATIO from patio order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[ID_PATIO]?>" <? if($_SESSION[buscaLocMaq][idFilial]==$dom[ID_PATIO]){?>selected="selected"<? } ?>><?=$dom[NOME_PATIO]?></option>
<? } ?>
</select>
<select name="idVendedor" id="idVendedor" class="quicksearch">
<option value="">Vendedor</option>
<option value="0" <? if($_SESSION[buscaLocMaq][idVendedor]=='0'){?>selected="selected"<? } ?>>Todos</option>
<?


$Sql = mysql_query("Select id, nome from login where (tipoUsuario='A') or (tipoUsuario='C') or (tipoUsuario='V')  order by nome") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($_SESSION[buscaLocMaq][idVendedor]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } ?>
</select> &nbsp; Filtro de <input type="text" name="dtInicial" value="<?=$_SESSION[buscaLocMaq][dtInicial]?>" class="quicksearch" /> até <input type="text" name="dtFinal" class="quicksearch" value="<?=$_SESSION[buscaLocMaq][dtFinal]?>" />
<select name="_a" class="quicksearch">
<option value="relPropostaPerdida" <? if($_SESSION[buscaUltimo][_a]=='relNaoEmissaoProposta'){?>selected="selected"<? } ?>>Padrão</option>
<option value="RelatorioGraficoNaoConfirmacao" <? if($_SESSION[buscaUltimo][_a]=='RelatorioGraficoNaoConfirmacao'){?>selected="selected"<? } ?>>Grafico por Vendedor</option>
<option value="RelatorioGraficoNaoConfirmacaoMotivo" <? if($_SESSION[buscaUltimo][_a]=='RelatorioGraficoNaoConfirmacaoMotivo'){?>selected="selected"<? } ?>>Grafico por Motivo</option>
</select>
</td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.target='_sef';document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

<td class="navpageselected" nowrap><a onclick="javascript:SubmitRelatorio();" href="#" title="Opções">Imprimir</a></td>
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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Proposta Não Confirmadas</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 



$Sql = "SELECT p.idProposta, c.Cli_Nome, v.nome, DATE_FORMAT(p.dtcancelaProposta,'%d/%m/%Y %H:%i') as dt, p.txtcancelaProposta, mp.labelMp FROM proposta p inner join clientes c on (c.Cli_ID=p.idCliente) left join login v on (v.id=p.idVendedor) left join motivo_proposta mp on (mp.idMp=p.idMp)";

$nSql = "SELECT p.idProposta FROM proposta p inner join clientes c on (c.Cli_ID=p.idCliente) left join login v on (v.id=p.idVendedor) left join motivo_proposta mp on (mp.idMp=p.idMp)";
$type=0;


$montaWhere = ' where p.statusProposta="L"';
//	if($dl[tipoUsuario]=='V'){
//		$Sql.=" And p.idVendedor='".$dl[id]."'";
//	}
//	$type = 1;

if($_SESSION[buscaLocMaq][idFm]!=''){
	if($_SESSION[buscaLocMaq][idFm]!='0'){
		$montaWhere .= " And p.idMp='".$_SESSION[buscaLocMaq][idFm]."'";
		$type = 1;
	}
}
if($_SESSION[buscaLocMaq][idVendedor]!=''){
	if($_SESSION[buscaLocMaq][idVendedor]!='0'){
		$montaWhere .= " And p.idVendedor='".$_SESSION[buscaLocMaq][idVendedor]."'";
		$type = 1;
	}
}
if($_SESSION[buscaLocMaq][idFilial]!=''){
	if($_SESSION[buscaLocMaq][idFilial]!='0'){
		$montaWhere .= " And p.idFilial='".$_SESSION[buscaLocMaq][idFilial]."'";
		$type = 1;
	}
}

if($_POST[dtInicial]!=''){
	
	$dti = explode('/',$_SESSION[buscaLocMaq][dtInicial]);
	$dtf = explode('/',$_SESSION[buscaLocMaq][dtFinal]);
	
	$montaWhere .= " And p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}



//Paginação
$numreg = 250; // Quantos registros por página vai ser mostrado
        if (!isset($_REQUEST[pg])) {
                $_REQUEST[pg] = 0;
        }
$inicial = $_REQUEST[pg] * $numreg;

//if($montaWhere!=''){
	//$montaWhere  = ' where '.$montaWhere;
//}
$sqlPaginacao = mysql_query($nSql.$montaWhere.$montaWhere1) or die ("Could not connect to database: ".mysql_error());;
$quantreg = mysql_num_rows($sqlPaginacao);

$quant_pg = ceil($quantreg/$numreg);

//echo '--'.$Sql.$montaWhere.'--';
$sqlUsuario = mysql_query($Sql.$montaWhere.$montaWhere1.' order by idProposta Limit '.$inicial.','.$numreg) or die ("Could not connect to database: ".mysql_error());
//echo $Sql.$montaWhere;
?>
<tr>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Proposta</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Vendedor</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Motivo</td>
<td class="tabletitlerow" width="400" align="center" nowrap>&nbsp;Observação</td>



</tr>
<?
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta];?>"><?=$sU[idProposta];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta];?>"><?=$sU[Cli_Nome];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta];?>"><?=$sU[nome];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta];?>"><?=$sU[dt];?></a></td>
<td colspan="" align="center"><a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta];?>"><?=$sU[labelMp];?></a></td>
<td colspan="" align="center"><a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta];?>"><?=$sU[txtcancelaProposta];?></a></td>

</tr>

<tr style="display:none">
            <td colspan="5" class="<?=$cor?>">
                <table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
                <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
                <td width="10%" align="center" nowrap><b>&nbsp;Proposta</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Cliente </b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Frete</b></td>
                </tr>
                <? $iEsql = mysql_query("Select c.Cli_Fantasia, p.idCliente, p.idProposta, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y') as dtProposta, DATE_FORMAT(p.confirmaProposta,'%d/%m/%Y') as dtConfirmada, pe.idFamilia, L.nomeLegenda as nome, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe as qtda from proposta_equipamento pe inner join proposta p on (pe.idProposta=p.idProposta) left join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) LEFT JOIN clientes c ON (c.Cli_ID = p.idCliente)".$montaWhere." And pe.idFamilia='".$sU[idFamilia]."' Limit 0") or die (mysql_error());
                  while($iE = mysql_fetch_array($iEsql)){
                $cor = ($coralternada++ %2 ? "row2" : "row1");	  
                  ?>
                  <tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
                <td align="center" nowrap>&nbsp;<?=$iE[idProposta]?></td>
                <td align="center" nowrap>&nbsp;<?=$iE[Cli_Fantasia]?></td>
                <td align="center" nowrap>&nbsp;<?=$iE[qtda]?></td>
                <td align="center" nowrap>&nbsp;R$ <?=number_format($iE[precoPe],2,',','.');?></td>
                <td align="center" nowrap><center><input type="checkbox" name="COMBUSTIVEL[]" disabled="disabled" value="S" id="cc<?=$iE[idPe]?>" <? if($iE[combustivelPe]=='S'){?> checked="checked"<? } ?>> <label for="cc<?=$iE[idPe]?>">R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?></label></center></td>
                <td align="center" nowrap><input type="checkbox" name="OPERADOR[]" value="S" disabled="disabled" id="co<?=$iE[idPe]?>" <? if($iE[operadorPe]=='S'){?> checked="checked"<? } ?>> <label for="co<?=$iE[idPe]?>">R$ <?=number_format($iE[valoroperadorPe],2,',','.');?></td>
                <td align="center" nowrap><input type="checkbox" name="SEGURO[]" value="S" disabled="disabled" id="cs<?=$iE[idPe]?>" <? if($iE[seguroPe]=='S'){?> checked="checked"<? } ?>> <label for="cs<?=$iE[idPe]?>">R$ <?=number_format($iE[valorseguroPe],2,',','.');?></label></center></td>
                <td align="center" nowrap><center>R$ <?=number_format($iE[fretePe],2,',','.');?></center></td>
                </tr>
                  <? }?>
                
                
                </table>
            
            
            
            </td>
            </tr>

<? } ?>

</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td align="left">


<table border="0" cellpadding="0" cellspacing="1" class="tborder" <? if($_SERVER["SCRIPT_NAME"]=='/Relatorio.php'){?>style="display:none"<? } ?>><tr><td class="highlightpage">Resultado <?=$_REQUEST[pg]?> de <?=$quant_pg?></td>

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
				echo "<td class='".$css."'><a href='index.php?_m=ate&_a=relUltimaProposta&pg=".$i_pg."' title='Pag. ".$i_pg." of ".$quant_pg."'>".$i_pg."</a></td>";
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

