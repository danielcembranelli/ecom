						<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="top">

<div class="dashboardtitle">dashboard</div>
<table cellspacing="0" cellpadding="0" border="0" width="100%" id="caltableopt">
<tr style="height: 1em;"><td align="left"><div id="tab_main" style="DISPLAY: block;" class="tabcontent">
<table cellspacing="0" cellpadding="4" border="0" width="100%" class="dashborder">
<tr style="height: 1em">
<td align="left" valign="top">

<table cellspacing="0" cellpadding="2" height="300" border="0" width="100%" class="dashcontent">
<tr><td align="left" valign="top">

				<table width="100%"  border="0" cellspacing="1" cellpadding="2"><tr>
			<td width="100" class="darkredtext" nowrap><!--Overdue Tickets--></td>
			<td valign="middle"><div class="linediv"><img src="themes/admin_default/space.gif" height="1" width="1" /></div></td></tr>
			</table>
            
           <center>
        <table width="100%">
		<? if($chart_7dias==1){?>
        <tr>
        <td colspan="3"><div id="chart1"></div></td></tr> <? }?>
        <tr>
        	<td>
       <? if($chart_7dias==1){?>  <div id="chart"></div> <? } ?>
	        </td>
            <td>
        <div id="chart2"></div> 
        </td>
       <? if($chart_7dias==1){?> <td>
        <div id="chart3"></div> 
        </td><? }?>
        </tr>
         <tr>
         <? if($chart_7dias==1){?> <td>
        <div id="chart4"></div> 
        </td><? }?>
         <td>
        <div id="chart5"></div> 
        </td><td>
        <div id="chart6"></div> 
        </td>
        </tr>
        <? if($chart_7dias==1){?><tr><td colspan="3"><div id="chartNovo"></div></td></tr> <? }?>
                 <tr>
         <td>
        <div id="chartMapaEs"></div> 
        </td>
         <td>
        <div id="chartCancela"></div> 
        </td><td>
        </td>
        </tr>
        </table>
       </center>
        <script type="text/javascript" src="open-flash-chart/js/swfobject.js"></script>
        <script type="text/javascript"> 
		<? if($chart_7dias==1){?>
		var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc1", "95%", "150", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatus7dias.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chart1");
		
		var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc1", "95%", "150", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatusClienteNovo.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chartNovo");
		
		var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "225", "190", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatusConfirmado.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chart3");
		var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "225", "190", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadCadastroNovo.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chart");
		//var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "225", "190", "9", "#FFFFFF");
        //so.addVariable("data", "Grafico_loadStatusLocadoNoMes.php");
        //so.addParam("allowScriptAccess", "always" );//"sameDomain");
		//so.addParam("wmode","transparent");
        //so.write("chart4");
		var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "225", "190", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatusAcessorio.php?l=<?=$dl[tipoUsuario]?>");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chart2");
		
		var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "225", "190", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadCancelaProposta.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chartCancela");
        <? } ?>
        var so = new SWFObject("open-flash-chart/actionscript/open-flash-chart.swf", "ofc", "225", "190", "9", "#FFFFFF");
        so.addVariable("data", "Grafico_loadStatus.php");
        so.addParam("allowScriptAccess", "always" );//"sameDomain");
		so.addParam("wmode","transparent");
        so.write("chartMapaEs");
		
		
		
		
		
		
        
        </script> 
        </div> 
            
		<table width="100%"  border="0" cellspacing="1" cellpadding="2" style="display:none"><tr>
		<td width="60" class="smalltext" nowrap></td>
		<td valign="middle"><div class="linediv"><img src="themes/admin_default/space.gif" height="1" width="1" /></div></td></tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="2">
					<tr class="smalltext">
			<td width="1" nowrap>&nbsp;</td>
			</tr>
					<tr class="smalltext">
			<td width="1" nowrap>&nbsp;</td>
			</tr>
				</table>



</td></tr>
</table>
</td>
</tr>
</table>
</div>
</td></tr>
<tr style="height: 1em"><td align="left"><div><ul id="btab">
	<!--<li><a class="currenttab" href="index.php?_m=core&_a=dashboard" onClick="javascript:void(0);" id="dashtoday" title="Today">Hoje</a></li>-->
    <!--<li><a href="index.php?_m=core&_a=dashboard&type=news" id="dashnews" title="News (%s)">E-mails (0)</a></li>--></ul></div></td></tr>
</table>
</td>
<td align="right" valign="top" width="5"><img src="themes/admin_default/space.gif" border="0" width="5" height="5" /></td>
<td align="right" valign="top" width="50%"><div class="dashboardtitle">&nbsp;proposta em aberto</div>
<table cellspacing="0" cellpadding="0" border="0" width="100%" id="caltableopt">
<tr style="height: 1em"><td align="left">
<div id="tab_twday" style="DISPLAY: block;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborderround"><tr><td class="row1"><span class="smalltext">
	































<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Proposta</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 
$seismeses = date("Y-m-d",mktime (0,0,0,date("m"),date("d")-10,date("Y")));
$sqlUsuario = mysql_query("SELECT count(*) as total FROM proposta p where idVendedor='".$dl[id]."' And statusProposta='N' And dtcadProposta between '2010-10-01 00:00:01' and '".$seismeses." 23:59:59'") or die ("Could not connect to database: ".mysql_error());
$sQ = mysql_fetch_array($sqlUsuario);


$Sql = "SELECT p.idProposta, c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, pa.nome, p.statusProposta, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, p.descricaoObra, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini FROM proposta p left join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id)";



	$montaWhere = ' where p.statusProposta="N"';

	$montaWhere.=" And p.idVendedor='".$dl[id]."'";
	$montaWhere.=" And p.dtcadProposta>='2010-10-01 00:00:01'";


$montaWhere .= "order by p.idProposta";

$sqlUsuario = mysql_query($Sql.$montaWhere) or die ("Could not connect to database: ".mysql_error());
$quantreg = mysql_num_rows($sqlUsuario);
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Numero</td>
<td class="tabletitlerow" width="50%" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" width="22" align="center" nowrap>&nbsp;</td>

</tr>

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[idProposta];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" align="center"><?=$sU[data];?></td>
<td colspan="" width="22" align="center" valign=""><a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>" title="Visualizar Proposta"><img src="themes/admin_default/icon_menukbarticle.gif" border="0" /></a></td>
</tr>
<tr>
<td colspan="4" class="<?=$cor?>"><b>Endereço:</b> <?=$sU[descricaoObra]?><br />
<b>Início da Obra:</b> <?=$sU[dtini]?><br />
<!--<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Frete</b></td>
</tr>
<? $iEsql = mysql_query("Select pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$sU[idProposta]."' And pe.statusPe='A' Limit 0") or die (mysql_error());
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


</table>-->



</td>
</tr>
<? } ?>

</table>
</td>
</tr>
</tbody>
</table>
</span>



































</td></tr></table></div>
	
	
	</td>
	</tr>
	<tr style="height: 1em">
	<td align="left">
	<div style="display:none">
	<ul id="btab">
	<li><a class="currenttab" href="#" onClick="javascript:void(0);" id="twday" title="Dias">Semana</a></li>
	<li><a href="index.php?_m=teamwork&_a=calendar&calendartype=month" id="twmonth" title="Mês">Mês</a></li>
	</ul>
	</div>
	</td>
	</tr>
</table>
</td>
</tr>
</table>

	<?
	if($sQ[total]>0){
?>
<script>alert('ATENÇÃO!!\n\n<? echo $dl[nome] ?>, verfique as Propostas em Aberto com mais de 10 dias!!\n\nPropostas em Aberto: <?=$quantreg?>\nHá mais de 10 dias: <?=$sQ[total]?>\n\nPara parar de receber este alerta, modifique os Status da Proposta');</script>
<?	
	
}?>
		
		