<? include('../Config.php');

$IdProposta = base64_decode($_REQUEST[p]);

if($_REQUEST[a]>0){

$SqlAditivo = mysql_query("SELECT idAditivo, nrAditivo, obsgeraisAditivivo, DATE_FORMAT(dtcadAditivo,'%d/%m/%Y') as data FROM proposta_aditivo where idProposta='".$IdProposta."' And nrAditivo='".$_REQUEST[a]."'");
$sA = mysql_fetch_array($SqlAditivo);

}
$IdAditivo = number_format($sA[idAditivo],0);

$sqlProposta = mysql_query("SELECT o.NOME_PATIO, t.nomeContato, t.cargoContato, c.Cli_Nome, c.Cli_CGC, c.Cli_Inscricao, c.Cli_EndCob, c.Cli_NumCob, c.Cli_CidCob, c.Cli_BaiCob, c.Cli_CepCob, c.Cli_UFCob, c.Cli_Contato, p.descricaoObra, p.validadeProposta, p.tipoProposta, p.obsgeraisProposta, p.contatoProposta, pa.nome, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y') as data, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) left join contatos t on (t.idContato=p.idContato) left join patio o on (p.idFilial=o.ID_PATIO) where p.idProposta = '".$IdProposta."'") or die ("Could not connect to database: ".mysql_error());
$sP = mysql_fetch_array($sqlProposta);
?>
<?
$Colpan=4;
//Verifica FRETE
 $sqlClusulaFRETE = mysql_query("Select c.idClausula, c.responsavelClausula FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where l.idLegenda='634' And idProposta = '".$IdProposta."' And idAditivo='".$IdAditivo."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
$sCF = mysql_fetch_array($sqlClusulaFRETE);


if($sCF[responsavelClausula]=='C'){
	$vFRETE = 0;
} else {
	$vFRETE = 1;
}	
//Verifica MO
$sqlClusulaMO = mysql_query("Select c.responsavelClausula FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where l.idLegenda='606' And idProposta = '".$IdProposta."' And idAditivo='".$IdAditivo."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
$sCMO = mysql_fetch_array($sqlClusulaMO);

if($sCMO[responsavelClausula]=='C'){
	$vMO = 0;
	$Colpan--;
} else {
	$vMO = 1;
	
}
//Verifica Gaz
$sqlClusulaG = mysql_query("Select c.idClausula, c.responsavelClausula FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where l.idLegenda='631' And idProposta = '".$IdProposta."' And idAditivo='".$IdAditivo."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
$sCG = mysql_fetch_array($sqlClusulaG);
if($sG[idClausula]!='26'){
	if($sCG[responsavelClausula]=='C'){
		$vG = 0;
		$Colpan--;
	} else {
		$vG = 1;
	}
} else { 
	$vG = 1;
}

//Verifica SEGURO
$sqlClusulaS = mysql_query("Select c.responsavelClausula FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where l.idLegenda='635' And idProposta = '".$IdProposta."' And idAditivo='".$IdAditivo."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
$sCS = mysql_fetch_array($sqlClusulaS);
if($sCS[responsavelClausula]=='C'){
	$vS = 0;
	$Colpan--;
} else {
	$vS = 1;
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Proposta N&ordm; <?=$IdProposta?> <? if($IdAditivo>0){?>Aditivo N&ordm; <?=$sA[nrAditivo]?><? } ?> </title>

<style media="print">
body{
	font-family:Calibri;
	font-size:14px;
}
table{
font-size:10px;
}
#formulario{
	display:none;
}
</style>
<style media="screen">
body{
	font-family:Calibri;
	font-size:14px;
}
table{
font-size:10px;
}
#formulario{
	padding:5px;
	left:50%;
	margin-left:-200px;
	width:400px;
	height:30px;
	background:#FFC;
	position:fixed;
	bottom:0px;
	text-align:center;
	font-size:18px;
}
A:active {
	COLOR: #000000; TEXT-DECORATION: none; FONT-FAMILY: Calibri; FONT-SIZE: 18px;
}
A:visited {
	COLOR: #000000; TEXT-DECORATION: none; FONT-FAMILY: Calibri; FONT-SIZE: 18px;
}
A:hover {
	COLOR: #3894E5; TEXT-DECORATION: none; FONT-FAMILY: Calibri; FONT-SIZE: 18px;
}
A:link {
	COLOR: #000000; TEXT-DECORATION: none; FONT-FAMILY: Calibri; FONT-SIZE: 18px;
}
</style>
</head>

<body>
<?
$SqlAditivoM = mysql_query("SELECT idAditivo, nrAditivo, obsgeraisAditivivo FROM proposta_aditivo where idProposta='".$IdProposta."'") or die (mysql_error());
$NrAditivoM=mysql_num_rows($SqlAditivoM);
?>
<div id="formulario"> 
<select onChange="if(options[selectedIndex].value) window.location.href = (options[selectedIndex].value)" class="quicksearch">
<option value="?p=<?=$_REQUEST[p]?>&m=S<? if($_REQUEST[a]!=''){?>&a=<?=$_REQUEST[a]?><? } ?>" <? if($_REQUEST[m]=='S'){?> selected="selected"<? } ?>>Simples</option>
<option value="?p=<?=$_REQUEST[p]?>&m=C<? if($_REQUEST[a]!=''){?>&a=<?=$_REQUEST[a]?><? } ?>" <? if($_REQUEST[m]=='C'){?> selected="selected"<? } ?>>Completa</option>
</select>
<? if($NrAditivoM>0){?>Visualizar:
<select onChange="if(options[selectedIndex].value) window.location.href = (options[selectedIndex].value)" class="quicksearch">
<option value="?p=<?=$_REQUEST[p]?>">Proposta</option>
<?
while($sAM = mysql_fetch_array($SqlAditivoM)){;
?>
<option value="?p=<?=$_REQUEST[p]?>&a=<?=$sAM[nrAditivo]?>" <? if($_REQUEST[a]==$sAM[nrAditivo]){?> selected="selected"<? } ?>>Aditivo <?=$sAM[nrAditivo]?></option>
<? } ?></select> | <? } ?><a href="javascript:self.print()">Imprimir</a> | <a href="ProcessaWord.php?p=<?=$_REQUEST[p]?>&a=<?=$sAM[nrAditivo]?>&m=<? if($_REQUEST[m]=='C'){?>C<? }else {?>S<? } ?>">Word</a>
</div>

<img src="topo.jpg" width="640" height="137" />

<div style="width:665px;">

<?
if($sP[tipoProposta]!="C"){?>
<p>�<br />
  <?=$sP[Cli_Nome]?><br />
  A/C.: <? if($sP[nomeContato]==''){?><?=$sP[contatoProposta]?><? } else {?><?=$sP[nomeContato]?><? } ?></p>
<? } ?>
<? if($IdAditivo>0){?>
<center><p style="color:#FF0000; text-transform:uppercase"><strong>ADITIVO N&ordm; <?=$sA[nrAditivo]?></strong></p></center>
<? } ?>


<?
if($sP[tipoProposta]=="C"){?>

<center><p style="color:#FF0000; text-transform:uppercase"><strong>Contrato de Loca��o de Equipamentos<? if($vMO==1){?> COM<? } else {?> SEM<? }?> M�O DE OBRA N&ordm; <?=$IdProposta?>/<?=date("Y");?></strong></p></center>

<font style="text-transform:uppercase">
<strong>LOCATARIO:</strong>&nbsp;&nbsp;		<?=$sP[Cli_Nome]?><br />
<i>ENDERE�O:</i>&nbsp;				<i><?=$sP[Cli_EndCob]?>, N� <?=$sP[Cli_NumCob]?> � <?=$sP[Cli_BaiCob]?> � CEP: <?=$sP[Cli_CepCob]?> - <?=$sP[Cli_CidCob]?> � <?=$sP[Cli_UFCob]?></i><br />
<i>CNPJ:</i>&nbsp;			<?=$sP[Cli_CGC]?>     IE: <?=$sP[Cli_Inscricao]?><br />
<br />
<strong>LOCADOR:</strong>		ESCAD RENTAL LOCADORA DE EQUIPAMENTOS PARA TERRAPLENAGEM LTDA.<br />
<i>ENDERE�O:</i>				<i>Avenida Utinga, 1501 � Vila Metal�rgica � Santo Andr� � SP</i><br />
<i>CNPJ:</i>					<i>	53.712.535/0001-51    IE: 626.685.015.111</i><br />
</font>
<br />
<i>Pelo presente instrumento particular, as partes acima mencionadas e qualificadas, por meio de seus representantes ao final assinados, t�m entre si justo e acertado o contrato de LOCA��O DE EQUIPAMENTOS<? if($vMO==1){?> COM M�O DE OBRA<? } ?>, de acordo com as condi��es a seguir:</i>


<? } else { ?>
<center><p style="color:#FF0000; text-transform:uppercase"><strong><? if($sP[tipoProposta]=="C"){?>Contrato<? } else {?>Proposta<? } ?> de Loca��o de Equipamentos N&ordm; <?=$IdProposta?>/<?=date("Y");?></strong></p></center>
<? }?>

<? if($IdAditivo==0){?>
<p>Obra/Local: <em><?=$sP[descricaoObra]?></em></p>

<? if($sP[dtini]!='00/00/0000'){?><p>In�cio da Obra: <em><?=$sP[dtini]?></em></p><? } ?>
<?
if($sP[tipoProposta]!="C"){?>
<p><strong>Introdu&ccedil;&atilde;o:</strong></p>
<p>Agradecemos a oportunidade, e apresentamos  nossa proposta comercial para loca&ccedil;&atilde;o de equipamentos, com o objetivo de  viabilizar vosso projeto.</p>
<? } ?>
<p><strong>Conte&uacute;do</strong></p>
<p> Tabela de equipamentos/pre&ccedil;o para loca&ccedil;&atilde;o:</p>
<? } else { ?>
<p>Este aditivo refere-se � inclus�o do equipamento abaixo listado, conforme condi��es descritas na tabela</p>
<? } ?>







<table border="1" cellspacing="0" cellpadding="0" width="640" bordercolor="#666666">
  <tr bgcolor="#F0F0F0">
    <td rowspan="2"><p align="center"><strong>Qtde</strong></p></td>
    <td rowspan="2"><p align="center"><strong>Equipamentos</strong></p></td>
    <td rowspan="2"><p align="center"><strong>Categoria</strong></p></td>
    <td rowspan="2"><p align="center"><strong>Marcas</strong></p></td>
    <td rowspan="2"><p align="center"><strong>Modelos</strong></p></td>
    <td colspan="<?=$Colpan?>"><p align="center"><strong>PRE&Ccedil;O POR HORA</strong></p></td>
    <? if($vFRETE==1){?>
    <td rowspan="1" colspan="2"><p align="center"><strong>PRE�O UNIT�RIO</strong></p></td>
    <? } ?>
  </tr>
  <tr>
    <td><p align="center"><strong>Equipamento</strong></p></td>
    <? if($vMO==1){?>
    <td align="center">Operador</td>
    <? }?>
    <? if($vG==1){?>
    <td align="center">Combustivel</td>
    <? } ?>
    <? if($vS==1){?>
    <td><p align="center"><strong>Seguro</strong></p></td>
    <? } ?>
    <? if($vFRETE==1){?>
    <td><p align="center"><strong>Mobiliza��o</strong></p></td>
    <td><p align="center"><strong>Desmobiliza��o</strong></p></td>
    <? } ?>
  </tr>
  <? 
$sqlUsuario = mysql_query("Select  L.nomeLegenda as nome1, count(*) as total from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) where pe.idProposta = '".$IdProposta."' And pe.idAditivo='".$IdAditivo."' And statusPe='A' group by nome1");
while ($sU = mysql_fetch_array($sqlUsuario)){
	$c[$sU[nome1]]=$sU[total];	
}
print_r($c);
$b='';  
  
$iEsql = mysql_query("Select pe.qtdaPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe,pe.seguroPe, pe.valorseguroPe, pe.fretePe, pe.fretedPe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$IdProposta."' And pe.idAditivo='".$IdAditivo."' And statusPe='A' order by nome1, marca, categoria, modelo") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
  ?>
  <tr>
    <td><p align="center"><?=$iE[qtdaPe]?></p></td>
    <? if($b!=$iE[nome1]){?>	
    <td <? if($c[$iE[nome1]]>1){?>rowspan="<?=$c[$iE[nome1]]?>"<? } ?>><p align="center"><?=$iE[nome1]?></p></td>
    <? } $b=$iE[nome1]; ?>
    <td height="36"><p align="center"><?=$iE[categoria]?></p></td>
    <td><p align="center"><?=$iE[marca]?></p></td>
    <td><p align="center"><?=$iE[modelo]?></p></td>
    <td><p align="center">R$ <?=number_format($iE[precoPe],2,',','.');?></p></td>
    <? if($vMO==1){?>
    <td><p align="center"><? if($iE[operadorPe]=='S'){?>R$ <?=number_format($iE[valoroperadorPe],2,',','.');?><? } else {?> - - x - - <? } ?></p></td>
    <? } ?>
    <? if($vG==1){?>
    <td><p align="center"><? if($iE[combustivelPe]=='S'){?>R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?><? } else {?> - - x - -<? } ?></p></td>
    <? }?>
    <? if($vS==1){?>
    <td><p align="center"><? if($iE[seguroPe]=='S'){?>R$ <?=number_format($iE[valorseguroPe],2,',','.');?><? } else {?> - - x - -<? } ?></p></td>
    <? } ?>
    <? if($vFRETE==1){?>
    <td><p align="center">R$ <?=number_format($iE[fretePe],2,',','.');?></p></td>
    <td><p align="center">R$ <?=number_format($iE[fretedPe],2,',','.');?></p></td>
    <? } ?>
  </tr>
  <? } ?>
</table>
<?
$a=0;
?>
<center><p style="color:#FF0000; text-transform:uppercase"><strong>Condi&ccedil;&otilde;es Comerciais</strong></p></center>

	<? if($_REQUEST[m]=='C' || $sP[tipoProposta]=="C" ){?>
    
    <? 
            $sqlClusula = mysql_query("Select pc.idPc, l.nomeLegenda, pc.textoPc FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where idProposta = '".$IdProposta."' And idAditivo='".$IdAditivo."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
            while ($sC = mysql_fetch_array($sqlClusula)){
            $cor = ($coralternada++ %2 ? "row2" : "row1");  
            $a++;?>
            
  <p><strong>Cl&aacute;usula <?=$a?> &ndash; <?=$sC[nomeLegenda]?>:</strong></p>
            <ul>
              <li><?=$sC[textoPc]?></li>
            </ul>
            <? }
            $a++;
            if($IdAditivo>0){
            ?>
            <p><strong>Cl&aacute;usula <?=$a?> &ndash; OBSERVA��O:</strong></p>
            <ul>
            <? if($sA[obsgeraisAditivivo]!=''){?>
              <li><?=$sA[obsgeraisAditivivo]?></li>
            <? } ?>  
              <li>As demais condi��es de loca��o, tais como responsabilidades da CONTRATADA E CONTRATANTE,, permanecer�o as mesmas contidas no <? if($sP[tipoProposta]=="C"){?>Contrato<? } else {?>Proposta<? } ?> N&ordm; <?=$IdProposta?>/<?=date("Y");?>, firmado entre as partes.</li>
            </ul>
            <? 	
            } else {
            if($sP[obsgeraisProposta]!=''){
            ?>
            <p><strong>Cl&aacute;usula <?=$a?> &ndash; OBSERVA��O:</strong></p>
            <ul>
              <li><?=$sP[obsgeraisProposta]?></li>
            </ul>
  <? } }?>
            
    
    <? } else {?>
    
    
    
    <table width="640" border="1" bordercolor="#000000" cellspacing="0" cellpadding="6">
  <tr bgcolor="#F0F0F0">
    <td width="200" rowspan="2" align="center">CL&Aacute;USULA</td>
    <td colspan="2" align="center">RESPONSAVEL</td>
    <td rowspan="2" align="center">OBSERVA&Ccedil;&Atilde;O</td>
  </tr>
  

  
  
  <tr bgcolor="#F0F0F0">
    <td width="60" align="center">CLIENTE</td>
    <td width="60" align="center">ESCAD</td>
  </tr>
  
    <? 
            $sqlClusula = mysql_query("Select pc.idPc, l.nomeLegenda, c.responsavelClausula, c.obsClausula FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where l.idLegenda!='25' And idProposta = '".$IdProposta."' And idAditivo='".$IdAditivo."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
            while ($sC = mysql_fetch_array($sqlClusula)){
            $cor = ($coralternada++ %2 ? "row2" : "row1");  
            $a++;?>
  <tr>
  
    <td align="center"><?=$sC[nomeLegenda]?></td>
  <? if($sC[responsavelClausula]!='A'){?>
    <td align="center"><? if($sC[responsavelClausula]=='C'){?>X<? } else {?> &nbsp; <? } ?></td>
    <td align="center"><? if($sC[responsavelClausula]=='E'){?>X<? } else {?> &nbsp; <? } ?></td>
   <? }?> 
    <td <? if($sC[responsavelClausula]=='A'){?>colspan="3"<? } ?> align="center"><?=$sC[obsClausula]?></td>
  </tr>  
  <? } ?>
  <? 
            $sqlClusula = mysql_query("Select pc.idPc, l.nomeLegenda, c.responsavelClausula, c.obsClausula FROM proposta_clausula pc inner join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where l.idLegenda='25' And idProposta = '".$IdProposta."' And idAditivo='".$IdAditivo."' order by c.ordemClausula") or die ("Could not connect to database: ".mysql_error());
            while ($sC = mysql_fetch_array($sqlClusula)){
            $cor = ($coralternada++ %2 ? "row2" : "row1");  
            $a++;?>
  <tr>
  
    <td align="center"><?=$sC[nomeLegenda]?></td>
  <? if($sC[responsavelClausula]!='A'){?>
    <td align="center"><? if($sC[responsavelClausula]=='C'){?>X<? } else {?> &nbsp;a <? } ?></td>
    <td align="center"><? if($sC[responsavelClausula]=='E'){?>X<? } else {?> &nbsp;a <? } ?></td>
   <? }?> 
    <td <? if($sC[responsavelClausula]=='A'){?>colspan="3"<? } ?> align="center"><?=$sC[obsClausula]?></td>
  </tr>  
  <? } ?>
   <? if($sP[obsgeraisProposta]!=''){
            ?>
  <tr>
  	<td align="center">OBSERVA��O</td>
     <td colspan="3" align="center"><?=$sP[obsgeraisProposta]?></td>
     </tr>
     <? } ?>
</table>		

			
            
            <? }?>
<br />
<? if($IdAditivo==0){?>
Proposta v�lida por <?=$sP[validadeProposta]?> dias da emiss�o
<br />
<p><strong>Conclus&atilde;o</strong></p>
<p>Reafirmamos nossa posi&ccedil;&atilde;o de parceiros,  comprometidos com o resultado de vosso projeto. <br />
  Nos colocamos a disposi&ccedil;&atilde;o para quaisquer  esclarecimentos, e ajustes necess&aacute;rios</p>
<p>Estamos prontos para atend&ecirc;-los </p>
<? } ?>
<p>&nbsp;</p>
<p>____________________________________________<br />
  <?=$sP[nome]?></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Aprovado: ___________________________________  Data: _____/_____/_____<br />
  Cliente:  <?=$sP[Cli_Nome]?><br />
  Contato: <? if($sP[nomeContato]==''){?><?=$sP[contatoProposta]?><? } else {?><?=$sP[nomeContato]?><? } ?></p>
<p>&nbsp;</p>
<?
if($IdAditivo>0){
$dt = explode('/',$sA[data]);
} else {
$dt = explode('/',$sP[data]);	
}
switch($dt[1])
{
case "01" : $mesext = "Janeiro";         break;
case "02" : $mesext = "Fevereiro";         break;
case "03" : $mesext = "Mar�o";                 break;
case "04" : $mesext = "Abril";                 break;
case "05" : $mesext = "Maio";                 break;
case "06" : $mesext = "Junho";                 break;
case "07" : $mesext = "Julho";                 break;
case "08" : $mesext = "Agosto";                 break;
case "09" : $mesext = "Setembro";         break;
case "10" : $mesext = "Outubro";         break;
case "11" : $mesext = "Novembro";         break;
case "12" : $mesext = "Dezembro";         break;
}
$e = explode('-',$sP[NOME_PATIO]);
?>
<div style="text-align:right; text-transform:uppercase"><p><?=$e[0]?>, <?=$dt[0]?> de <?=$mesext?> de <?=$dt[2]?></p></div>
</div>
</div>
<div id="_VReportFooter"><img src="rodape.jpg" /></div>

</body>
</html>
