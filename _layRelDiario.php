<?
include("config.php");

$dt = explode('-',$_REQUEST[dt]);
$dat = $dt[2].'/'.$dt[1].'/'.$dt[0];

function statusE($id) {
?>
<?
$tec1 = mysql_query("SELECT nome FROM status where id = '$id' ");
$te1 = mysql_fetch_array($tec1);
return $te1[nome];
}


?>
<style>
body{
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
}
.style1 {color: #FFFFFF}
</style>
<body>
<center>
<h2>RELATÓRIO DIÁRIO DE ENTRADA (<?=$dat?>)</h2>
  <table width="800" border="1" bordercolor="#000000" cellpadding="5" cellspacing="0">
  <tr>
	<td width="10" bgcolor="#FF0000"><div align="center" class="style1">Item</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Contrato</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Cliente</div></td>
    <td width="15%" height="30" bgcolor="#FF0000"><div align="center" class="style1">Família</div></td>
    <td width="15%" height="30" bgcolor="#FF0000"><div align="center" class="style1">Código</div></td>
    <td bgcolor="#FF0000"><div align="center" class="style1">Operador</div></td>
    <td bgcolor="#FF0000"><div align="center" class="style1">Acessório</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Inicio</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Final</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Horimetro Incio</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Horimetro Final</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Motivo</div></td>
    <td width="15%" bgcolor="#FF0000"><div align="center" class="style1">Status Final</div></td>
  </tr>
  <?
	$SqlObra = mysql_query("SELECT c.contrato, c.cliente, f.nome as NOMEFAMILIA,q.status, e.motivo_final, e.obra,q.CODIGO as eqtoCodigo ,e.operador, o.nome as operadorNome, e.acessorio, a.CODIGO as acessorioCodigo, DATE_FORMAT(e.inicio,'%d/%m/%Y') as dtInicio, DATE_FORMAT(e.fim,'%d/%m/%Y') as dtFim, e.horimetro_ida, e.horimetro_volta FROM equipamento_obra e inner join equipamento q on (q.id=e.equipamento) left join familia f on (q.familia=f.id) left join acessorio a on (a.id=e.acessorio) left join operador o on (o.id=e.operador) left join obra c on (c.id=e.obra) where e.dtvoltaRel='".$_REQUEST[dt]."';") or die (mysql_error());
	$i=0;
	while ($sE = mysql_fetch_array($SqlObra)){
		$i++;
	$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
	if($sE[operadorNome]==''){
		$sE[operadorNome]=$sE[operador];
	}
	if($sE[acessorioCodigo]==''){
		$sE[acessorioCodigo]=$sE[acessorio];
	}
		
?>
  <tr bgcolor="#<?=$cor?>" height="20">
  <td><div align="center"><?=$i?></div></td>
  <td><div align="center"><?=$sE[contrato]?></div></td>
  <td><div align="center"><?=$sE[cliente]?></div></td>
    <td><div align="center"><?=$sE[NOMEFAMILIA]?></div></td>
	<td><div align="center"><?=$sE[eqtoCodigo]?></div></td>
    <td><div align="center"><?=$sE[operadorNome]?></div></td>
    <td><div align="center"><?=$sE[acessorioCodigo]?></div></td>
    <td><div align="center"><?=$sE[dtInicio]?></div></td>
    <td><div align="center"><?=$sE[dtFim]?></div></td>
    <td><div align="center"><?=$sE[horimetro_ida]?></div></td>
    <td><div align="center"><?=$sE[horimetro_volta]?></div></td>
    <td><div align="center"><?=$sE[motivo_final]?></div></td>
    <td><div align="center"><?=statusE($sE[status])?></div></td>
  </tr>
<?
	}
?>
</table>
<h2>RELATÓRIO DIÁRIO DE SAIDAS (<?=$dat?>)</h2>
  <table width="800" border="1" bordercolor="#000000" cellpadding="5" cellspacing="0">
  <tr>
	<td width="10" bgcolor="#1f497d"><div align="center" class="style1">Item</div></td>
    <td width="15%" bgcolor="#1f497d"><div align="center" class="style1">Contrato</div></td>
    <td width="15%" bgcolor="#1f497d"><div align="center" class="style1">Cliente</div></td>
    <td width="15%" height="30" bgcolor="#1f497d"><div align="center" class="style1">Família</div></td>
    <td width="15%" height="30" bgcolor="#1f497d"><div align="center" class="style1">Código</div></td>
    <td bgcolor="#1f497d"><div align="center" class="style1">Operador</div></td>
    <td bgcolor="#1f497d"><div align="center" class="style1">Acessório</div></td>
    <td width="15%" bgcolor="#1f497d"><div align="center" class="style1">Inicio</div></td>
    <td width="15%" bgcolor="#1f497d"><div align="center" class="style1">Horimetro</div></td>
  </tr>
  <?
	$SqlObra = mysql_query("SELECT c.contrato, c.cliente, f.nome as NOMEFAMILIA, e.obra,q.CODIGO as eqtoCodigo ,e.operador, o.nome as operadorNome, e.acessorio, a.CODIGO as acessorioCodigo, DATE_FORMAT(e.inicio,'%d/%m/%Y') as dtInicio, DATE_FORMAT(e.fim,'%d/%m/%Y') as dtFim, e.horimetro_ida, e.horimetro_volta FROM equipamento_obra e inner join equipamento q on (q.id=e.equipamento) left join familia f on (q.familia=f.id) left join acessorio a on (a.id=e.acessorio) left join operador o on (o.id=e.operador) left join obra c on (c.id=e.obra) where e.dtinicioRel='".$_REQUEST[dt]."';");
	$i=0;
	while ($sE = mysql_fetch_array($SqlObra)){
		$i++;
	$cor = ($coralternada++ %2 ? "FFFFFF" : "FFFFDC");
	if($sE[operadorNome]==''){
		$sE[operadorNome]=$sE[operador];
	}
	if($sE[acessorioCodigo]==''){
		$sE[acessorioCodigo]=$sE[acessorio];
	}
		
?>
  <tr bgcolor="#<?=$cor?>" height="20">
  <td><div align="center"><?=$i?></div></td>
  <td><div align="center"><?=$sE[contrato]?></div></td>
  <td><div align="center"><?=$sE[cliente]?></div></td>
    <td><div align="center"><?=$sE[NOMEFAMILIA]?></div></td>
	<td><div align="center"><?=$sE[eqtoCodigo]?></div></td>
    <td><div align="center"><?=$sE[operadorNome]?></div></td>
    <td><div align="center"><?=$sE[acessorioCodigo]?></div></td>
    <td><div align="center"><?=$sE[dtInicio]?></div></td>
    <td><div align="center"><?=$sE[horimetro_ida]?></div></td>
  </tr>
<?
	}
?>
</table>
</center>