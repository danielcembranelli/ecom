<?
include("Verifica.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true);



$Sql = "SELECT p.idProposta, c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, pa.nome, p.statusProposta, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, p.descricaoObra, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id)";

$nSql = "SELECT p.idProposta FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id)";
$type=0;

if($_SESSION[buscaproposta][statusProposta]=='TO'){
	$montaWhere = ' where p.statusProposta!="'.$_SESSION[buscaproposta][statusProposta].'"';
} else {
	$montaWhere = ' where p.statusProposta="'.$_SESSION[buscaproposta][statusProposta].'"';
}
if($dl[tipoUsuario]=='V'){
$montaWhere.=" And p.idVendedor='".$dl[id]."'";
}



if($_SESSION[buscaproposta][idCliente]!=''){
	$montaWhere .= " And p.idCliente='".$_SESSION[buscaproposta][idCliente]."'";
}
if($dl[tipoUsuario]=='V'){
$_POST[idVendedor]=$dl[id];
//$Sql.="where p.idVendedor='".$dl[id]."'";
}
if($_SESSION[buscaproposta][idVendedor]!=''){
	if($_SESSION[buscaproposta][idVendedor]!='0'){
		$montaWhere .= " And p.idVendedor='".$_SESSION[buscaproposta][idVendedor]."'";
		$type = 1;
	}
}
if($_SESSION[buscaproposta][tipoProposta]!=''){
	if($_SESSION[buscaproposta][tipoProposta]!='0'){
		$montaWhere .= " And p.tipoProposta='".$_SESSION[buscaproposta][tipoProposta]."'";
		$type = 1;
	}
}

if($_POST[dtInicial]!=''){
	
	$dti = explode('/',$_SESSION[buscaproposta][dtInicial]);
	$dtf = explode('/',$_SESSION[buscaproposta][dtFinal]);
	
	$montaWhere .= " And p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}
if($_SESSION[buscaproposta][nrProposta]!=''){

	$montaWhere .= " And p.idProposta Like '%".$_SESSION[buscaproposta][nrProposta]."%'";

}


$montaWhere .= "order by p.idProposta desc";
//Paginação
$numreg = 20; // Quantos registros por página vai ser mostrado
        if (!isset($_REQUEST[pg])) {
                $_REQUEST[pg] = 0;
        }
$inicial = $_REQUEST[pg] * $numreg;
$sqlPaginacao = mysql_query($nSql.$montaWhere) or die ("Could not connect to database: ".mysql_error());;
$quantreg = mysql_num_rows($sqlPaginacao);

$quant_pg = ceil($quantreg/$numreg);

//echo '--'.$Sql.$montaWhere.'--';
$sqlUsuario = mysql_query($Sql.$montaWhere.' Limit '.$inicial.','.$numreg) or die ("Could not connect to database: ".mysql_error());
if(mysql_num_rows($sqlUsuario)>0){?>

<div class="trrelacao">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Numero</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Vendedor</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Status</td>
<td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>

</tr>

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=form&_a=editProposta&id=<?=$sU[idProposta]?>"><?=$sU[idProposta];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=editProposta&id=<?=$sU[idProposta]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=editProposta&id=<?=$sU[idProposta]?>"><?=$sU[nome];?></a></td>
<td colspan="" align="center"><a href="index.php?_m=form&_a=editProposta&id=<?=$sU[idProposta]?>">
<?
	switch($sU[statusProposta]){
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'Não Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}
?></a></td>
<td colspan="" align="center"><?=$sU[data];?></td>
<td colspan="" width="" align="center" valign=""><a href="/Proposta/?p=<?=base64_encode($sU[idProposta])?>" target="_blank" title="Gerar Proposta">Imprimir</a> | <a href="index.php?_m=form&_a=editProposta&id=<?=$sU[idProposta]?>" title="Editar Proposta">Visualizar</a> | <? if($sU[statusProposta]=='N'){?><a href="javascript:ConfirmaCon('<?=$sU[idProposta]?>');" title="Confirmar?">Confirmar</a> - <a href="javascript:CancelaProposta('<?=$sU[idProposta]?>');" title="Não Confirmar?">Não Confirmar</a><? } ?><? if($sU[statusProposta]=='C'){?><a href="javascript:ConfirmaFim('<?=$sU[idProposta]?>');" title="Conclui">Concluir</a><? } ?> | <a href="javascript:ConfirmaDel('<?=$sU[idProposta]?>');" title="Cancelar Proposta">Excluir</a></td>
</tr>
<tr>
<td colspan="6" class="<?=$cor?>"><b>Endereço:</b> <?=$sU[descricaoObra]?><br />
<b>Início da Obra:</b> <?=$sU[dtini]?><br />
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Frete</b></td>
</tr>
<? $iEsql = mysql_query("Select pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$sU[idProposta]."' And pe.statusPe='A'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
$cor = ($coralternada++ %2 ? "row2" : "row1");	  
  ?>
  <tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="center" nowrap>&nbsp;<?=$iE[nome1]?> <?=$iE[marca]?> <?=$iE[modelo]?> <?=$iE[categoria]?></td>
<td align="center" nowrap>&nbsp;<?=$iE[qtdaPe]?></td>
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
</div>
<? }?>