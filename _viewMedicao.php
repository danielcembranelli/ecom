<style>
#mask {
	margin-top:132px;
  	position:absolute;
  	left:0;
  	top:0;
  	z-index:9000;
  	background-color:#000;
}
</style>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="30%"><span class="smalltext">&nbsp;Manager Medi&ccedil;&atilde;o &raquo; Visualizar Medi&ccedil;&atilde;o</span></td>
						<td width="70%" align="right">
                        <table>
                        <tr>
                        <? if($sP[statusProposta]=='C'){?><td>&nbsp;</td>
                       <? } ?>
                       <? if($sP[statusProposta]!='A'){?><td> <input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Status Medi&ccedil;&atilde;o" onclick="window.open('_statusProposta.php?idProposta=<?=$_REQUEST[id]?>',null,'height=350,width=650,status=yes,toolbar=no,menubar=no,location=no,top=300,left=200,scrollbars=yes')" /></td><td><input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Imprimir" onclick="window.open('/Medicao/?m=<?=base64_encode($_REQUEST[id])?>')" /></td>
                       <? }?>
                       <?
$SqlAditivoM = mysql_query("SELECT idAditivo, nrAditivo, obsgeraisAditivivo FROM proposta_aditivo where idProposta='".$_REQUEST[id]."'") or die (mysql_error());
$NrAditivoM=mysql_num_rows($SqlAditivoM);
if($NrAditivoM==0){?>
                       <td> 
                       
                       <input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Editar" onclick="window.location='index.php?_m=form&_a=editMedicao&id=<?=$_REQUEST[id]?>&modulo=editar'" /> </td>
                       <? } else {?>
                       <td>
                       
                       <table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Editar</td>

<!-- <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>-->
<td>
<select onChange="if(options[selectedIndex].value) window.location.href = (options[selectedIndex].value)" class="quicksearch">
<option value="#">Selecione...</option>
<option value="index.php?_m=form&_a=editProposta&id=<?=$_REQUEST[id]?>&modulo=editar">Proposta</option>
<?
while($sAM = mysql_fetch_array($SqlAditivoM)){;
?>
<option value="index.php?_m=form&_a=editAditivoProposta&id=<?=$_REQUEST[id]?>&a=<?=$sAM[nrAditivo]?>">Aditivo <?=$sAM[nrAditivo]?></option>
<? } ?>
</select>
</td>

</tr></table>

</td>
<? } ?>

</tr></table>
</td>
                       
                       </td>
					</tr>
					<tr height="4">
						<td colspan="3"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr height="1">
						<td colspan="3" bgcolor="#CCCCCC"><img src="themes/admin_default/space.gif" height="1" width="1"></td>
					</tr>
					<tr height="4">
						<td colspan="3"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr>
						<td colspan="3"><span class="smalltext"></span></td>
					</tr>

					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td colspan="3">
<?
$Sql = "SELECT DATE_FORMAT(m.dtpagamentoMedicao,'%d/%m/%Y') as dtpagamento, DATE_FORMAT(m.dtnotafiscalMedicao,'%d/%m/%Y') as dtnotafiscal, m.nrnotafiscalMedicao, DATE_FORMAT(m.inicioMedicao,'%d/%m/%Y') as dtinicio, DATE_FORMAT(m.finalMedicao,'%d/%m/%Y') as dtfinal, p.descricaoObra, m.idMedicao, DATE_FORMAT(m.dtMedicao,'%d/%m/%Y') as dtmedicao, pa.nome,  m.idProposta, m.statusMedicao, m.tipoMedicao, m.vlhoraseqptoMedicao, m.vlcustoMedicao, m.vldescontoMedicao, DATE_FORMAT(m.dtaprovacaoMedicao,'%d/%m/%Y') as dtaprovacao, DATE_FORMAT(m.dtvencimentoMedicao,'%d/%m/%Y') as dtvencimento, c.Cli_Fantasia FROM medicao m inner join proposta p on (p.idProposta=m.idProposta) left join clientes c on (p.idCliente=c.Cli_ID)  left join login pa on (p.idUsuario=pa.id) where idMedicao='".$_REQUEST[id]."'";
$mS = mysql_query($Sql);
$M = mysql_fetch_array($mS);
?>




<? if($M[statusMedicao]=='L'){?>
<table cellpadding="3" cellspacing="0" border="0" width="100%" class="errorbox" style="">
<tbody><tr class="row2">
  <td>

<table width="100%" border="0" cellpadding="6" cellspacing="1" class="rowerror">
<tr>
  <td width="16" align="left" valign="middle" class="errorbox"><img src="themes/admin_default/icon_error.gif" border="0" /></td>
  <td align="left" class="errorbox"><span class="smalltext"><strong>Medição Não Confirmada</strong><br>
    <?=$M[txtcancelaProposta]?>
</span></td></tr></table></td></tr></tbody></table><BR />
<? } ?>

<? if($M[statusMedicao]=='N'){?>
<table cellpadding="5" cellspacing="0" border="0" width="100%" style="" class="searchrule1">
<tbody><tr><td>

<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
  <td width="50%" align="left"><span class="smalltext"><span class="tickettextblue"><font size="+2">Confirmar Pagamento?</font></span></span>
    </td>
  <td align="center"><input type="button" name="submitbutton2" class="bluebuttonsuperbig" value="Registrar" onclick="ConfirmaPagamento('<?=$M[idMedicao]?>');" /></td></tr></table></td></tr></tbody></table><BR />
  <? } ?>
  <?
  if($M[statusMedicao]=='A'){
	  ?>
<table cellpadding="5" cellspacing="0" border="0" width="100%" style="" class="searchrule1">
<tbody><tr><td>

<table width="100%" border="0" cellpadding="3" cellspacing="1">
<tr>
  <td width="50%" align="left"><span class="smalltext"><span class="tickettextblue"><font size="+1">Medição Nova, Aprovar?</font></span></span>
    </td>
  <td align="center"><input type="button" name="submitbutton2" class="bluebuttonsuperbig" value="Aprovar" onclick="ConfirmaMedicao('<?=$M[idMedicao]?>');" /></td></tr></table></td></tr></tbody></table><BR />
  <?  } ?>


<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Medição</td>
</tr>
</thead>
<tbody>
<tr>
<td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="TabelaBase"><hr />

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Proposta</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="idProposta" value="<?=$M[idProposta]?>" size="30" readonly="readonly" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Cliente</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="cliente" id="idCliente" value="<?=$M[Cli_Fantasia]?>" readonly="readonly" size="30" style="width:90%;"/></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Local da Obra<br />
</span></td>
<td align="center" valign="top" colspan=""><textarea name="endereco" rows="3" style="width:99%"><?=$M[descricaoObra]?></textarea></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Periodo</span></td>
  <td align="left" valign="top" colspan=""><input name="dtinicio" type="text" class="swifttext" value="<?=$M[dtinicio]?>" size="12" maxlength="10" /> a <input name="dtfinal" type="text" class="swifttext" alt="data2" value="<?=$M[dtfinal]?>" size="12" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Tipo</span></td>
  <td align="left" valign="top" colspan=""><label><input type="radio" name="TIPOMEDICAO" <? if($M[tipoMedicao]=='E'){?>checked="checked"<? } ?> value="E" />Equipamento</label><label><input type="radio" name="TIPOMEDICAO"  <? if($M[tipoMedicao]=='O'){?>checked="checked"<? } ?> value="O" />Operador</label></td>
</tr>
</table></td></tr></tbody></table>
<br />












<?
$SqlJaLancado = mysql_query("SELECT MIN(me.dtMe) as dtmenor, MAX(me.dtMe) as dtmaior FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) where me.idMedicao='".$M[idMedicao]."' group by me.idMedicao") or die (mysql_error());
$t = mysql_fetch_array($SqlJaLancado);

$Dias = countIntervaloDias($t[dtmenor],$t[dtmaior],$t[dtmenor],$t[dtmaior],'N');

$Sql = "SELECT pe.idPe, f.nome, e.codigo, pe.precoPe, pe.combustivelPe, pe.seguroPe, pe.valorseguroPe, pe.valorcombustivelPe FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) left join equipamento_obra eo  on (me.idEo=eo.id) left join equipamento e on (e.id=eo.equipamento) left join familia f on (f.id=e.familia) where me.idMedicao='".$M[idMedicao]."' group by pe.idPe";
$SqlJaLancado = mysql_query($Sql) or die (mysql_error());

//echo "SELECT me.dtMe, pe.idPe, me.idMe, me.hreqptoMe, pe.precoPe, pe.combustivelPe, pe.seguroPe, pe.valorseguroPe, pe.valorcombustivelPe, pe.valoroperadorPe, me.hroperador1Me, me.hroperador2Me, me.hroperador3Me FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) where me.idMedicao='".$M[idMedicao]."'";
$sqlBusca = mysql_query("SELECT me.dtMe, pe.idPe, me.idMe, me.hreqptoMe, pe.precoPe, pe.combustivelPe, pe.seguroPe, pe.valorseguroPe, pe.valorcombustivelPe, pe.valoroperadorPe, me.hroperador1Me, me.hroperador2Me, me.hroperador3Me FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) where me.idMedicao='".$M[idMedicao]."'") or die (mysql_error());
$total=0;
//print_r(mysql_fetch_array($sqlBusca));
while ($b = mysql_fetch_array($sqlBusca)){
	
	$COMBUSTIVEL=0;
	$SEGURO=0;
	if($b[combustivelPe]=='S'){
		$COMBUSTIVEL=$b[valorcombustivelPe];
	}
	if($b[seguroPe]=='S'){
		$SEGURO=$b[valorseguroPe];
	}
	$preco=($b[precoPe]+$SEGURO+$COMBUSTIVEL);
	$ev[$b[idPe]][$b[dtMe]]=($preco*$b[hreqptoMe]);	
	$eh[$b[idPe]][$b[dtMe]]=$b[hreqptoMe];
	
	$hv1[$b[idPe]][$b[dtMe]]=$b[hroperador1Me]*$b[valoroperadorPe];	
	$hh1[$b[idPe]][$b[dtMe]]=$b[hroperador1Me];
	
	$hv2[$b[idPe]][$b[dtMe]]=$b[hroperador2Me]*$b[valoroperadorPe];	
	$hh2[$b[idPe]][$b[dtMe]]=$b[hroperador2Me];
	
	$hv3[$b[idPe]][$b[dtMe]]=$b[hroperador3Me]*$b[valoroperadorPe];	
	$hh3[$b[idPe]][$b[dtMe]]=$b[hroperador3Me];
	
	$t[$b[idPe]]['H'] += $b[hreqptoMe];
	$t[$b[idPe]]['P'] += ($b[precoPe]+$SEGURO+$COMBUSTIVEL);
	$t[$b[idPe]]['V'] += $b[hreqptoMe]*($b[precoPe]+$SEGURO+$COMBUSTIVEL);
	$t['GERAL']['H'] += $b[hreqptoMe];
	$t['GERAL']['V'] += $b[hreqptoMe]*($b[precoPe]+$SEGURO+$COMBUSTIVEL);

?>
<input type="hidden" name="idMe[]" value="<?=$b[idMe]?>" />
<?
}
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Medição</td>
</tr>
</thead>
<tbody>
<tr>
<td class="contenttableborder" colspan="2">
<div style="overflow:auto;" id="ScroolCss">
<table width="100%">
<thead>
<tr>
<td align="center" width="200" class="tabletitlerow">Equipamento</td>
<td align="center" nowrap class="tabletitlerow">Código</td>
<td align="center" nowrap class="tabletitlerow">Negociado</td>
<?
for($i=0;$i<$Dias;$i++){
?>
	<td align="center" <? if($M[tipoMedicao]=='O'){?>colspan="6"<? } else {?>colspan="2"<? } ?> nowrap class="tabletitlerow"><?=data(CalculaDias('D',data($t[dtmenor]),$i));?></td>
<? } ?>
</tr>
</thead>
<tbody>
<?
$l=1;
while ($q = mysql_fetch_array($SqlJaLancado)){
$cor = ($coralternada++ %2 ? "row2" : "row1");

	if($q[combustivelPe]=='S'){
		$COMBUSTIVEL=$q[valorcombustivelPe];
	}
	if($q[seguroPe]=='S'){
		$SEGURO=$q[valorseguroPe];
	}
?>
<tr class="<?=$cor?>">
<td width="200" align="center"><?=$q[nome]?></td>
<td colspan="" align="center"><?=$q[codigo]?></td>
<td colspan="" align="center"><?=number_format($q[precoPe],1,',','.')?><? if($q[seguroPe]=='S'){?>+<?=number_format($q[valorseguroPe],2,',','.');}?>								<? if($q[combustivelPe]=='S'){?>+<?=number_format($q[valorcombustivelPe],2,',','.');}?></td>
<?
for($i=0;$i<$Dias;$i++){
?>
<td colspan="" align="center"><?=number_format($eh[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)],2,',','.')?></td>
<td colspan="" align="center">R$ <?=number_format($ev[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)],2,',','.')?></td>
<? } ?>
</tr>
<? } ?>
</tbody>
</table>
</div>
</td></tr></tbody></table>











<br />



































































<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Faturamento</td>
</tr>
</thead>
<tbody>
<tr>
<td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="TabelaBase"><hr />

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Valor Horas</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" readonly="readonly" name="vltotalHoras" alt="valor" value="<?=number_format($M[vlhoraseqptoMedicao],2,',','.')?>" size="30"  /></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Custo Extra</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="vltotalCusto"  alt="valor" value="<?=number_format($M[vlcustoMedicao],2,',','.')?>" readonly="readonly" size="30"  /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Desconto</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="vltotalDesconto" readonly="readonly" alt="valor" value="<?=number_format($M[vldescontoMedicao],2,',','.')?>" size="30"  /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Horas Vendidas</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" readonly="readonly" name="horasvendidas" alt="valor2" id="idCliente" value="<?=number_format($M[dtvencimento])?>" size="30"/></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Total da Medição</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" readonly="readonly" name="vltotalFatura" value="<?=number_format(($M[vlhoraseqptoMedicao]+$M[vlcustoMedicao])-$M[vldescontoMedicao],2,',','.')?>" size="30"  /></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Nº Nota Fiscal</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="nrnotafiscal" value="<?=$M[nrnotafiscalMedicao]?>" size="30"  /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Dt Nota Fiscal</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="dtnotafiscal" value="<?=$M[dtnotafiscal]?>" alt="data2" size="12" maxlength="10" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data de Vencimento</span></td>
  <td align="left" valign="top" colspan=""><input name="dtvencimento" type="text" class="swifttext" value="<?=$M[dtvencimento]?>" alt="data2" size="12" maxlength="10" /></td>
</tr>
<? if($M[statusMedicao]=='F'){?>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data de Pagamento</span></td>
  <td align="left" valign="top" colspan=""><input name="dtvencimento" type="text" class="swifttext" value="<?=$M[dtpagamento]?>" alt="data2" size="12" maxlength="10" /></td>
</tr>
<? } ?>
</table></td></tr></tbody></table>

<br />




					
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managerMedicao" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&amp;_a=managerMedicao" title="Back">&nbsp;Voltar 


</a></span></td>
						</tr></table>

					</tr>
									</table>
                                    
                                    
                                    
<!-- Open ao não confirmar a proposta -->

<div id="TesteMensagem" style="width:500px; height:150px; position:fixed;z-index:9999; display:none" class="window">



</div>

 <div id="mask"></div> 
<script>
	t = ($(window).width()-28);
	$('#ScroolCss').css({'width':t});
	
function ConfirmaMedicao(id){

	//document.frTestaMensagem.idProposta.value=id;
	//document.frTestaMensagem.idMensagem.value=id;
		$.get("frmAprovaMedicao.php",{idMedicao:id}, function(data){
			$("#TesteMensagem").html(data);
		});
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});
 
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
		var winH = $(window).height();
		var winW = $(window).width();
              
		$('#TesteMensagem').css('top',  winH/2-$('#TesteMensagem').height()/2);
		$('#TesteMensagem').css('left', winW/2-$('#TesteMensagem').width()/2);
	
		$('#TesteMensagem').fadeIn(2000);
		$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});
	$('#cancelar').click(function () {
		$('#mask').hide();
		$('.window').hide();
	});
	
}
function ConfirmaPagamento(id){

	//document.frTestaMensagem.idProposta.value=id;
	//document.frTestaMensagem.idMensagem.value=id;
		$.get("frmPagamentoMedicao.php",{idMedicao:id}, function(data){
			$("#TesteMensagem").html(data);
		});
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});
 
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
		var winH = $(window).height();
		var winW = $(window).width();
              
		$('#TesteMensagem').css('top',  winH/2-$('#TesteMensagem').height()/2);
		$('#TesteMensagem').css('left', winW/2-$('#TesteMensagem').width()/2);
	
		$('#TesteMensagem').fadeIn(2000);
		$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});
	$('#cancelar').click(function () {
		$('#mask').hide();
		$('.window').hide();
	});
	
}
		</script>                                    
