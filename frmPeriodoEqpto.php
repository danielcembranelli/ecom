<?
include("Config.php");
header("Content-type: application/html;charset=iso-8859-1");
?>
<?
$Sql =  "SELECT pe.idPe, pe.fretedPe, pe.operadorPe, pe.valoroperadorPe, pe.precoPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe, pe.valorseguroPe, pe.fretePe, pe.qtdaPe FROM proposta_equipamento pe where pe.statusPe='A' And pe.idPe='".$_REQUEST[idPe]."'";

$p = mysql_query($Sql) or die (mysql_error());
$p = mysql_fetch_array($p);

$Sql =  "SELECT eo.id, f.nome, e.codigo, eo.inicio, eo.fim, eo.status FROM equipamento_obra eo inner join equipamento e on (e.id=eo.equipamento) left join obra o on (o.id=eo.obra) left join familia f on (f.id=e.familia) where eo.id='".$_REQUEST[idEo]."'";
$s = mysql_query($Sql) or die (mysql_error());
$s = mysql_fetch_array($s);

if($s[fim]=='' ||$s[fim]=='--'){
	$s[fim] =dataSql($_REQUEST[dt2]);
}

$Dias = countIntervaloDias($s[inicio],$s[fim],dataSql($_REQUEST[dt1]),dataSql($_REQUEST[dt2]),$Uteis='N');

if($s[inicio]>dataSql($_REQUEST[dt1])){
	$_REQUEST[dt1] = data($s[inicio]);
}
?>
<br />

<input type="hidden" name="idEo" value="<?=$_REQUEST[idEo]?>" />
<input type="hidden" name="idPe" value="<?=$_REQUEST[idPe]?>" />
<?
$SqlJaLancado = mysql_query("Select dtMe, hreqptoMe, hroperador1Me, hroperador2Me, hroperador3Me from medicao_equipamento where dtMe between '".dataSql($_REQUEST[dt1])."' and '".dataSql($_REQUEST[dt2])."' And idEo='".$_REQUEST[idEo]."'") or die (mysql_error());
while ($q = mysql_fetch_array($SqlJaLancado)){
	$eh[$q[dtMe]]=$q[hreqptoMe];
	$eo1[$q[dtMe]]=$q[hroperador1Me];
	$eo2[$q[dtMe]]=$q[hroperador2Me];
	$eo3[$q[dtMe]]=$q[hroperador3Me];
	
}
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Subtotal</td>
</tr>
</thead>
<tbody>
<tr>
<td class="contenttableborder" colspan="2">
<table width="100%">
<thead>
<tr class="row1">
<td width="25%"><span class="tabletitle">Total de Horas</span></td>
<td><input name="TotalDeHoras" class="swifttext" style="text-align:center" onchange="DivideTotalHoras(this.value,'tipo','hora')" type="text" size="10" onclick="this.value=''" /></td>
</tr>
</thead>
</table>
</td>
</tr>
</tbody>
</table>
<br />
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
<?
$cor = ($coralternada++ %2 ? "row2" : "row1");
?>
<table width="100%">
<thead>
<tr>
<td <? if($p[operadorPe]=='S'){?>rowspan="2"<? } ?> align="center" nowrap class="<?=$cor?>">Equipamento</td>
<td <? if($p[operadorPe]=='S'){?>rowspan="2"<? } ?> align="center" nowrap class="<?=$cor?>">Código</td>
<td  <? if($p[operadorPe]=='S'){?>rowspan="2"<? } ?> align="center" nowrap class="<?=$cor?>">Data</td>
<td  <? if($p[operadorPe]=='S'){?>rowspan="2"<? } ?> align="center" nowrap class="<?=$cor?>">&nbsp;Equipamento/h</td>
<? if($p[operadorPe]=='S'){?><td colspan="3" align="center" nowrap class="<?=$cor?>">Operador/h</td><? }?>
</tr>
<? if($p[operadorPe]=='S'){?>
<tr class="<?=$cor?>">
  <td colspan="" align="center">1&ordm; Periodo</td>
  <td colspan="" align="center">2&ordm; Periodo</td>
  <td colspan="" align="center">3&ordm; Periodo</td>
</tr>
<? } ?>
</thead>
<tbody>
<?
$l=1;
for($i=0;$i<$Dias;$i++){
$cor = ($coralternada++ %2 ? "row2" : "row1");
?>
<tr class="<?=$cor?>">
<td colspan="" align="center"><?=$s[nome]?></td>
<td colspan="" align="center"><?=$s[codigo]?></td>
<td colspan="" align="center">
<input type="hidden" name="dtMe[]" value="<?=CalculaDias('D',$_REQUEST[dt1],$i)?>" />
<?=data(CalculaDias('D',$_REQUEST[dt1],$i))?></td>
<td align="center">
<input name="hreqptoMe[]" tipo="hora" class="swifttext"  style="text-align:center" id="st<?=$a?>" onchange="SomaTotalHoras();" value="<?=$eh[CalculaDias('D',$_REQUEST[dt1],$i)]?>" type="text" tabindex="<?=$l++?>" size="6" onclick="this.value=''" />
</td>
<? if($p[operadorPe]=='S'){?>
<td colspan="" align="center"><input class="swifttext" type="text" name="hroperador1Me[]" size="6" value="<?=$eo1[CalculaDias('D',$_REQUEST[dt1],$i)]?>" style="text-align:center" tabindex="<?=$l++?>" produto="<?=$a?>" id="q<?=$i?>2" onclick="this.value=''"/></td>
<td colspan="" align="center"><input class="swifttext" type="text" name="hroperador2Me[]" size="6" value="<?=$eo2[CalculaDias('D',$_REQUEST[dt1],$i)]?>" style="text-align:center" tabindex="<?=$l++?>" class="swifttext" produto="<?=$a?>" id="q<?=$i?>3" onclick="this.value=''" /></td>
<td colspan="" align="center"><input type="text" name="hroperador3Me[]" size="6" value="<?=$eo3[CalculaDias('D',$_REQUEST[dt1],$i)]?>" style="text-align:center" tabindex="<?=$l++?>" produto="<?=$a?>" class="swifttext" id="q<?=$i?>4" onclick="this.value=''" /></td>
<? }?>
</tr>
<? } ?>
</tbody>
</table>
</td></tr></tbody></table>
<br />
<center><input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Salvar Horas" tabindex="<?=$l++?>" onclick="SalvaHoraMedicao()" /></center>
<script>SomaTotalHoras();</script>