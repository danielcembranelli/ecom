<?
include("Config.php");
header("Content-type: application/html;charset=iso-8859-1");
?>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type="text/javascript" src="libEcom.js"></script>
<script type="text/javascript" src="js/meiomask.js"></script>
<script type="text/javascript" src="js/mascara_input.js"></script>
<br />
<script>
function inserirLinhaTabela() {

            // Captura a referência da tabela com id "minhaTabela"
            var table = document.getElementById("insereCusto");
            // Captura a quantidade de linhas já existentes na tabela
            var numOfRows = table.rows.length;
            // Captura a quantidade de colunas da última linha da tabela
            var numOfCols = table.rows[numOfRows-1].cells.length;

            // Insere uma linha no fim da tabela.
            var newRow = table.insertRow(numOfRows);
			newRow.className = 'row2';
 
            // Faz um loop para criar as colunas
            
                // Insere uma coluna na nova linha 
				newCell = newRow.insertCell(0);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><a href="javascript:delRow('+ numOfRows +');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></center>'
				
				newCell = newRow.insertCell(1);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><select name="idMtc[]" id="idContato"><option value="0">Selecione..</option><?
	$Sql = mysql_query("SELECT idMtc, tituloMtc FROM medicao_tipo_custo order by tituloMtc") or die (mysql_error());
	while ($dom = mysql_fetch_array($Sql)){
	?><option value="<?=$dom[idMtc]?>"><?=$dom[tituloMtc]?></option><?  }?></select></center>';
        // Função responsável por inserir linhas na tabela
				newCell = newRow.insertCell(2);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input name="vlRtc[]" id="vlRtc" type="text" onchange="TotalCusto();" class="swifttext" tipo="custo" value="" size="20" alt="valor" /></center>';
				newCell = newRow.insertCell(3);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input name="textoRtc[]" type="text" class="swifttext" id="dtVc2" value="" size="50" maxlength="80" /></center>';
				$('input:text').setMask();
				TotalCusto();
}
function inserirLinhaTabela2() {

            // Captura a referência da tabela com id "minhaTabela"
            var table = document.getElementById("insereDesconto");
            // Captura a quantidade de linhas já existentes na tabela
            var numOfRows = table.rows.length;
            // Captura a quantidade de colunas da última linha da tabela
            var numOfCols = table.rows[numOfRows-1].cells.length;

            // Insere uma linha no fim da tabela.
            var newRow = table.insertRow(numOfRows);
			newRow.className = 'row2';
 
            // Faz um loop para criar as colunas
            
                // Insere uma coluna na nova linha 
				newCell = newRow.insertCell(0);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><a href="javascript:delRow('+ numOfRows +');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></center>'
				
				newCell = newRow.insertCell(1);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><select name="idRtd[]" id="idContato"><option value="0">Selecione..</option><?
	$Sql = mysql_query("SELECT idMtd, tituloMtd FROM medicao_tipo_desconto order by tituloMtd") or die (mysql_error());
	while ($dom = mysql_fetch_array($Sql)){
	?><option value="<?=$dom[idMtd]?>"><?=$dom[tituloMtd]?></option><?  }?></select></center>';
        // Função responsável por inserir linhas na tabela
				newCell = newRow.insertCell(2);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input name="vlRtd[]" id="vlRtc" onchange="TotalDesconto();" type="text" class="swifttext" value="" tipo="desconto" size="20" alt="valor" /></center>';
				newCell = newRow.insertCell(3);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input name="textoRtd[]" type="text" class="swifttext" id="dtVc2" value="" size="50" maxlength="80" /></center>';
				$('input:text').setMask();
				TotalDesconto();
}
</script>
<?
$p = explode('/',$_REQUEST[idProposta]);

$SqlJaLancado = mysql_query("SELECT MIN(me.dtMe) as dtmenor, MAX(me.dtMe) as dtmaior FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) where pe.idProposta='".$p[0]."' And me.dtMe between  '".dataSql($_REQUEST[dtinicio])."' and '".dataSql($_REQUEST[dtfinal])."' group by pe.idProposta") or die (mysql_error());
$t = mysql_fetch_array($SqlJaLancado);

$Dias = countIntervaloDias($t[dtmenor],$t[dtmaior],$t[dtmenor],$t[dtmaior],'N');

$Sql = "SELECT pe.idPe, f.nome, e.codigo, pe.precoPe, pe.combustivelPe, pe.seguroPe, pe.valorseguroPe, pe.valorcombustivelPe FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) left join equipamento_obra eo  on (me.idEo=eo.id) left join equipamento e on (e.id=eo.equipamento) left join familia f on (f.id=e.familia) where pe.idProposta='".$p[0]."' And me.dtMe between  '".dataSql($_REQUEST[dtinicio])."' and '".dataSql($_REQUEST[dtfinal])."' group by pe.idPe";
$SqlJaLancado = mysql_query($Sql) or die (mysql_error());


$sqlBusca = mysql_query("SELECT me.dtMe, pe.idPe, me.idMe, me.hreqptoMe, pe.precoPe, pe.combustivelPe, pe.seguroPe, pe.valorseguroPe, pe.valorcombustivelPe, pe.valoroperadorPe, me.hroperador1Me, me.hroperador2Me, me.hroperador3Me FROM medicao_equipamento me inner join proposta_equipamento pe on (pe.idPe=me.idPe) where pe.idProposta='".$p[0]."' And me.dtMe between  '".dataSql($_REQUEST[dtinicio])."' and '".dataSql($_REQUEST[dtfinal])."'") or die (mysql_error());
$total=0;
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
	<td align="center" <? if($_REQUEST[TIPOMEDICAO]=='O'){?>colspan="6"<? } else {?>colspan="2"<? } ?> nowrap class="tabletitlerow"><?=data(CalculaDias('D',data($t[dtmenor]),$i));?></td>
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
<? if($_REQUEST[TIPOMEDICAO]=='E'){?>
<td colspan="" align="center"><?=number_format($eh[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)],2)?></td>
<td colspan="" align="center">R$ <?=number_format($ev[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)],2,',','.')?></td>
<? } else {?>
<td colspan="" align="center"><?=number_format($hh1[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)])?></td>
<td colspan="" align="center">R$ <?=number_format($hv1[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)],2,',','.')?></td>
<td colspan="" align="center"><?=number_format($hh2[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)])?></td>
<td colspan="" align="center">R$ <?=number_format($hv2[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)],2,',','.')?></td>
<td colspan="" align="center"><?=number_format($hh3[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)])?></td>
<td colspan="" align="center">R$ <?=number_format($hv3[$q[idPe]][CalculaDias('D',data($t[dtmenor]),$i)],2,',','.')?></td>

<? } ?>
<? } ?>
</tr>
<? } ?>
</tbody>
</table>
</div>
</td></tr></tbody></table>
</div>
<br />
<? if($_REQUEST[TIPOMEDICAO]=='O'){?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Base de Horas</td>
                        </tr>
          </thead><tbody><tr>
            <td class="contenttableborder" colspan="2">
            <table border="0" cellpadding="3" cellspacing="1" width="100%">
            
            <tr>
            <td class="tabletitlerow" width="33%" align="center" nowrap>H1</td>
            <td class="tabletitlerow" width="33%" align="center" nowrap>H2</td>
            <td class="tabletitlerow" width="33%" align="center" nowrap>H3</td>
            </tr>
           <tr class="row1">
            <td align="center" valign="top" colspan=""><input type="text" class="swifttext" name="idProposta" size="10"  />%</td>
            <td align="center" valign="top" colspan=""><input type="text" class="swifttext" name="idProposta" size="10"  />%</td>
            <td align="center" valign="top" colspan=""><input type="text" class="swifttext" name="idProposta" size="10"  />%</td>
            </tr>
            
            </table>
            </td></tr></tbody></table>
            <br /><br />
<? } ?>            

<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Custo Adicionais</td>
                        </tr>
          </thead><tbody><tr>
            <td class="contenttableborder" colspan="2">
            <table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereCusto">
            
            <tr>
            <td class="tabletitlerow" width="40%" align="center" colspan="2" nowrap>&nbsp;Tipo</td>
            <td class="tabletitlerow" width="20%" align="center" nowrap>Valor</td>
            <td class="tabletitlerow" width="40%" align="center" nowrap>Descritivo</td>
            </tr>
            </table>
            </td></tr></tbody></table>
<br />
<br />
<a href="javascript:inserirLinhaTabela();"><img src="themes/admin_default/action_add.gif" width="16" height="16" alt="Adicionar Custo" />Adicionar Novo Custo</a>
  <br />
<br />
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Desconto</td>
                        </tr>
          </thead><tbody><tr>
            <td class="contenttableborder" colspan="2">
            <table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereDesconto">
            
            <tr>
            <td class="tabletitlerow" width="40%" align="center" colspan="2" nowrap>&nbsp;Tipo</td>
            <td class="tabletitlerow" width="20%" align="center" nowrap>Valor</td>
            <td class="tabletitlerow" width="40%" align="center" nowrap>Descritivo</td>
            </tr>            
            </table>
            </td></tr></tbody></table>
<br />
<br />
<a href="javascript:inserirLinhaTabela2();"><img src="themes/admin_default/action_add.gif" width="16" height="16" alt="Adicionar Desconto" />Adicionar Novo Desconto</a>
  <br />
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
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" readonly="readonly" name="vltotalHoras" value="<?=number_format($t['GERAL']['V'],2,'.','')?>" size="30"  /></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Custo Extra</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="vltotalCusto" value="" readonly="readonly" size="30"  /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Desconto</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="vltotalDesconto" readonly="readonly" value="" size="30"  /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Horas Vendidas</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" readonly="readonly" name="horasvendidas" alt="valor2" id="idCliente" value="<?=number_format($t['GERAL']['H'],2)?>" size="30"/></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Total da Medição</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" readonly="readonly" name="vltotalFatura" value="" size="30"  /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data Emissão NF</span></td>
  <td align="left" valign="top" colspan=""><input name="dtnotafiscal" type="text" class="swifttext" value="" alt="data2" size="12" maxlength="10" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Nº Nota Fiscal</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="nrnotafiscal" value="" size="30"  /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data de Vencimento</span></td>
  <td align="left" valign="top" colspan=""><input name="dtvencimento" type="text" class="swifttext" value="" alt="data2" size="12" maxlength="10" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Filial</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idFilial" id="idFilial">
<option>Selecione a Filial</option>
<?
$Sql = mysql_query("Select ID_PATIO, NOME_PATIO from patio where statusPatio='A' order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[ID_PATIO]?>"><?=$dom[NOME_PATIO]?></option>
<? } ?>
</select></td>
</tr>
</table></td></tr></tbody></table>

<br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Cadastrar" /></center>
<script>
	t = ($(window).width()-28);
	$('#ScroolCss').css({'width':t});
	TotalMedicao();
</script>	