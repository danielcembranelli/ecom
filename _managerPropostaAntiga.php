<style>
#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=form&_a=managerPropostaAntiga" title="Manager Proposta">Manager Proposta Antigas</a></span></td>
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
if($_POST[statusProposta]!=''){
	if($_SESSION[buscapropostaantiga][statusProposta]!=$_POST[statusProposta]){
			$_SESSION[buscapropostaantiga][statusProposta]=$_POST[statusProposta];
	}
}
if($_POST[statusProposta]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscapropostaantiga][statusProposta]='';
}
if($_SESSION[buscapropostaantiga][statusProposta]==''){
	$_SESSION[buscapropostaantiga][statusProposta]='TO';
}

if($_POST[tipoProposta]!=''){
	if($_SESSION[buscapropostaantiga][tipoProposta]!=$_POST[tipoProposta]){
			$_SESSION[buscapropostaantiga][tipoProposta]=$_POST[tipoProposta];
	}
}
if($_POST[tipoProposta]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscapropostaantiga][tipoProposta]='';
}
if($_POST[idVendedor]!=''){
	if($_SESSION[buscapropostaantiga][idVendedor]!=$_POST[idVendedor]){
			$_SESSION[buscapropostaantiga][idVendedor]=$_POST[idVendedor];
	}
}
if($_POST[idVendedor]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscapropostaantiga][idVendedor]='';
}
if($_POST[nrProposta]!=''){
	if($_SESSION[buscapropostaantiga][nrProposta]!=$_POST[nrProposta]){
			$_SESSION[buscapropostaantiga][nrProposta]=$_POST[nrProposta];
	}
}
if($_POST[nrProposta]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscapropostaantiga][nrProposta]='';
}
if($_POST[dtInicial]!=''){
	if($_SESSION[buscapropostaantiga][dtInicial]!=$_POST[dtInicial]){
			$_SESSION[buscapropostaantiga][dtInicial]=$_POST[dtInicial];
	}
}
if($_POST[dtInicial]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscapropostaantiga][dtInicial]='';
}
if($_REQUEST[idCliente]!=''){
	if($_SESSION[buscapropostaantiga][idCliente]!=$_REQUEST[idCliente]){
			$_SESSION[buscapropostaantiga][idCliente]=$_REQUEST[idCliente];
	}
}
if($_REQUEST[idCliente]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscapropostaantiga][idCliente]='';
}
if($_POST[dtFinal]!=''){
	if($_SESSION[buscapropostaantiga][dtFinal]!=$_POST[dtFinal]){
			$_SESSION[buscapropostaantiga][dtFinal]=$_POST[dtFinal];
	}
}
if($_POST[dtFinal]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscapropostaantiga][dtFinal]='';
}


//echo '||'.$_SESSION[buscapropostaantiga][nrProposta].'||';

?>

						<form name="users" id="users" action="index.php?idCliente=<?=$_REQUEST[idCliente]?>" method="POST">
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerPropostaAntiga"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder" style="display:none"><tr><td class="highlightpage">Atendimento 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1">
Tipo <select name="tipoProposta" class="quicksearch">
<option value="0" <? if($_SESSION[buscapropostaantiga][tipoProposta]=='0'){?>selected="selected"<? } ?>>Todos</option>
<option value="P" <? if($_SESSION[buscapropostaantiga][tipoProposta]=='P'){?>selected="selected"<? } ?>>Proposta</option>
<option value="C" <? if($_SESSION[buscapropostaantiga][tipoProposta]=='C'){?>selected="selected"<? } ?>>Contrato</option>
</select>
 &nbsp;Proposta Nr. <input type="text" name="nrProposta" value="<?=$_SESSION[buscapropostaantiga][nrProposta]?>" class="quicksearch" /> Filtro de <input type="text" name="dtInicial" value="<?=$_SESSION[buscapropostaantiga][dtInicial]?>" class="quicksearch" /> at� <input type="text" name="dtFinal" class="quicksearch" value="<?=$_SESSION[buscapropostaantiga][dtFinal]?>" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

<td class="navpageselected" nowrap style="DISPLAY: none;" ><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Op��es">Op��es</a></td>
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



$Sql = "SELECT p.Orc_ID, c.Cli_Fantasia, p.ORC_LOCALOBRA, c.Cli_Contato, p.Orc_Status, DATE_FORMAT(p.Orc_Cadastro,'%d/%m/%Y %H:%i') as data, DATE_FORMAT(p.Orc_InicioObra,'%d/%m/%Y') as dtIni  FROM antigo_orcamentos p inner join clientes c on (p.Cli_ID=c.antigoidCliente)";

$nSql = "SELECT p.Orc_ID, c.Cli_Fantasia, c.Cli_Contato, DATE_FORMAT(p.Orc_Cadastro,'%d/%m/%Y %H:%i') as data FROM antigo_orcamentos p inner join clientes c on (p.Cli_ID=c.antigoidCliente) ";
$type=0;






	$montaWhere .= " And p.Cli_ID='".$_REQUEST[idCliente]."'";

if($_POST[dtInicial]!=''){
	
	$dti = explode('/',$_SESSION[buscapropostaantiga][dtInicial]);
	$dtf = explode('/',$_SESSION[buscapropostaantiga][dtFinal]);
	
	$montaWhere .= " And p.dtcadProposta between '".$dti[2]."-".$dti[1]."-".$dti[0]." 00:00:00' and '".$dtf[2]."-".$dtf[1]."-".$dtf[0]." 23:59:59'";
}
if($_SESSION[buscapropostaantiga][nrProposta]!=''){

	$montaWhere .= " And p.idProposta Like '%".$_SESSION[buscapropostaantiga][nrProposta]."%'";

}


//$montaWhere .= "order by p.idProposta desc";
//Pagina��o
$numreg = 80; // Quantos registros por p�gina vai ser mostrado
        if (!isset($_REQUEST[pg])) {
                $_REQUEST[pg] = 0;
        }
$inicial = $_REQUEST[pg] * $numreg;
$sqlPaginacao = mysql_query($nSql.$montaWhere) or die ("Could not connect to database: ".mysql_error());;
$quantreg = mysql_num_rows($sqlPaginacao);

$quant_pg = ceil($quantreg/$numreg);

//echo '--'.$Sql.$montaWhere.'--';
$sqlUsuario = mysql_query($Sql.$montaWhere.' Limit '.$inicial.','.$numreg) or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Numero</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Status</td>
<td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>

</tr>

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<?=$sU[Orc_ID];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[Cli_Fantasia];?></td>
<td colspan="" align="center"><?=$sU[Orc_Status]?>
<?
	switch($sU[Orc_Status]){
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'N�o Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}
?></td>
<td colspan="" align="center"><?=$sU[data];?></td>
<td colspan="" width="" align="center" valign=""><a href="/Proposta/Antiga.php?idProposta=<?=$sU[Orc_ID]?>" target="_blank" title="Gerar Proposta">Imprimir</a></td>
</tr>
<tr>
<td colspan="5" class="<?=$cor?>"><b>Endere�o:</b> <?=$sU[ORC_LOCALOBRA]?><br />
<b>In�cio da Obra:</b> <?=$sU[dtIni]?><br />
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Pre�o</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Frete</b></td>
</tr>
<? $iEsql = mysql_query("SELECT f.Fam_Descricao, a.IOrc_PrecoDia, a.IOrc_PrecoDiesel, a.IOrc_PrecoMO, a.IOrc_SeguroDia, a.IOrc_FreteUnitario FROM antigo_itensdeorcamentos a inner join antigo_familias f on(f.Fam_ID=a.Fam_ID) where a.Orc_ID = '".$sU[Orc_ID]."'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
$cor = ($coralternada++ %2 ? "row2" : "row1");	  
  ?>
  <tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="center" nowrap>&nbsp;<?=$iE[Fam_Descricao]?></td>
<td align="center" nowrap>&nbsp;R$ <?=number_format($iE[IOrc_PrecoDia],2,',','.');?></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[IOrc_PrecoDiesel],2,',','.');?></label></center></td>
<td align="center" nowrap>R$ <?=number_format($iE[IOrc_PrecoMO],2,',','.');?></td>
<td align="center" nowrap>R$ <?=number_format($iE[IOrc_SeguroDia],2,',','.');?></label></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[IOrc_FreteUnitario],2,',','.');?></center></td>
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


<table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Proposta <?=$_REQUEST[pg]?> de <?=$quant_pg?></td>

<!-- <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>-->
<?

for($i_pg=1;$i_pg<$quant_pg;$i_pg++) { 
                // Verifica se a p�gina que o navegante esta e retira o link do n�mero para identificar visualmente
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
				echo "<td class='".$css."'><a href='index.php?_m=form&_a=managerPropostaAntiga&idCliente=".$_REQUEST[idCliente]."&pg=".$i_pg."' title='Pag. ".$i_pg." of ".$quant_pg."'>".$i_pg."</a></td>";
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

<!-- Open ao n�o confirmar a proposta -->

<div id="TesteMensagem" style="width:500px; height:150px; position:fixed;z-index:9999; display:none" class="window">
<form name="frTestaMensagem" action="index.php" method="post">
<input type="hidden" name="_m" value="form"/> 
<input type="hidden" name="_a" value="managerPropostaAntiga"/> 
<input type="hidden" name="step" value="6"/> 
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>N�o Confirma��o de Proposta</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2">
            

            
        <table border="0" cellpadding="3" cellspacing="1" width="100%">
        
       <!--
        <tr>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Numero</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cliente</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Vendedor</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Status</td>
        <td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
        <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>
        </tr>-->
        <tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Motivo</span></td>
<td align="left" valign="top" colspan="" width="50%">
<select name="idMotivo" id="idVendedor" class="quicksearch">
<option value="">Selecione o motivo</option>
<?


$Sql = mysql_query("Select idMp, labelMp from motivo_proposta order by labelMp") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[idMp]?>"><?=$dom[labelMp]?></option>
<? } ?>
</select><input type="hidden" class="swifttext" name="idProposta" id="txtNome" readonly="readonly" value="<?=$sE[identificadorMensagem]?>" size="50" /></td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td valign="top" colspan="2" align="center"><textarea rows="4" style="width:99%" name="txtMotivo"></textarea></td>
</tr>
     
            
        </table>

            
</td>
</tr>
</tbody>
</table>
<br /><center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Enviar" onclick="EnviaEmail();" />&nbsp;&nbsp;<input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Cancelar" id="cancelar" /></center>
</form>
</div>

 <div id="mask"></div> 
<script>
function EnviaEmail(idProposta){
	var id = document.frTestaMensagem.idMensagem.value;
	var email = document.frTestaMensagem.txtEmail.value;
	$.get("_testeEmail.php",{idMensagem:id,Email:email}, function(data){
	alert(data);
	$('#mask').hide();
	$('.window').hide();
	});
	
	
}
function CancelaProposta(id){
	
	document.frTestaMensagem.idProposta.value=id;
	//document.frTestaMensagem.idMensagem.value=id;
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
<!-- Final do Open ao n�o confirmar a proposta-->
