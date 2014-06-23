<script type="text/javascript"> 
function ConfirmaDel(valor)
{
var r=confirm("Você confima a exclusão?")
if (r==true)
  {
	window.location.replace("index.php?_m=livesupport&_a=managerVisita&step=3<? if($_REQUEST[idCliente]!=''){?>&idCliente=<?=$_REQUEST[idCliente]?><? }?>&id="+valor)
  }
}
function marcarTodos(field, box)
{
  if(!field.length)
  	field.checked = box.checked;
  for (i = 0; i < field.length; i++){
  	field[i].checked = box.checked;
  }
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td><span class="smalltext">&nbsp;Manager Relacionamento</span></td>
						<td width="50%" align="right">&nbsp;<? if($_REQUEST[idCliente]!=''){?><input onclick="window.location='index.php?_m=livesupport&_a=insertVisita&idCliente=<?=$_REQUEST[idCliente]?>'" type="image" src="menu/novoRelacionamento.png" title="Novo Relacionamento Comercial" /><? }?></td>
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
						<td colspan="3"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td colspan="3">
<? if($_POST[step]=='1'){

$id = explode('#',$_POST[idCliente]);

$sqlIncluir = mysql_query("Insert into relacionamento_cliente (`idCliente`,`tipoRc`,`modoRc`,`idVendedor`, `dtRc`, `emiRc`, `novapropostaRc`, `idProposta`, `textoRc`,`p1Rc`,`p2Rc`,`p3Rc`, `p4Rc`,`p5Rc`, `p6Rc`,`dtcadRc`,`ceporigemRc`,`cepdestinoRc`,`kminicialRc`,`kmfinalRc`) values ('".$id[0]."','".$_POST[tipo]."','".$_POST[modo]."','".$_POST[idVendedor]."', '".dataSql($_POST[dtVc])."','".$_POST[emi]."','".$_POST[novaproposta]."','".$_POST[idProposta]."','".nl2br($_POST[obs])."', '".$_POST[P1]."', '".$_POST[P2]."','".$_POST[P3]."','".$_POST[P4]."', '".$_POST[P5]."', '".$_POST[P6]."',NOW(),'".$_POST[CEPORIGEM]."','".$_POST[CEPDESTINO]."','".$_POST[KMORIGEM]."','".$_POST[KMDESTINO]."')") or die (mysql_error());
	$idRc=mysql_insert_id();
	
	
	$Sql =  mysql_query("Insert into relacionamento_endereco (idRc, tipoRe, cepRe, enderecoRe, nrRe, complementoRe, bairroRe, cidadeRe, ufRe, kmRe,descricaoRe, opcaoRe) Values ('".$idRc."','O','".$_POST[CEPORIGEM]."','".$_POST[ENDERECOORIGEM]."','".$_POST[NRORIGEM]."','".$_POST[COMPLEMENTOORIGEM]."','".$_POST[BAIRROORIGEM]."','".$_POST[CIDADEORIGEM]."','".$_POST[UFORIGEM]."','".$_POST[KMORIGEM]."','".$_POST[DESCRICAOORIGEM]."','".$_POST[idOrigem]."')");
	
	$Sql =  mysql_query("Insert into relacionamento_endereco (idRc, tipoRe, cepRe, enderecoRe, nrRe, complementoRe, bairroRe, cidadeRe, ufRe, kmRe,descricaoRe, opcaoRe) Values ('".$idRc."','D','".$_POST[CEPDESTINO]."','".$_POST[ENDERECODESTINO]."','".$_POST[NRDESTINO]."','".$_POST[COMPLEMENTODESTINO]."','".$_POST[BAIRRODESTINO]."','".$_POST[CIDADEDESTINO]."','".$_POST[UFDESTINO]."','".$_POST[KMDESTINO]."','".$_POST[DESCRICAODESTINO]."','".$_POST[idDestino]."')");
	
	for($i=0;$i<count($_POST[idContato]);$i++){
		$Sql =  mysql_query("Insert into relacionamento_contato (idRc, idContato) Values ('".$idRc."','".$_POST[idContato][$i]."')");
	}
	for($i=0;$i<count($_POST[idRtc]);$i++){
		
		$_POST[vlRtc][$i] = str_replace('.','',$_POST[vlRtc][$i]);
		$_POST[vlRtc][$i] = str_replace(',','.',$_POST[vlRtc][$i]);
		$Sql =  mysql_query("Insert into relacionamento_custo (idRc,idRtc,valorRct,textoRct) Values ('".$idRc."','".$_POST[idRtc][$i]."','".$_POST[vlRtc][$i]."','".$_POST[textoRtc][$i]."')");
	}
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Relacionamento Cadastrado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>



<?
//echo '--'.$_POST[BAICOB];
 if($_POST[step]=='2'){
$id = explode('#',$_POST[idCliente]);

$sqlIncluir = mysql_query("Update visitas_cliente set `idCliente`='".$id[0]."',`idVendedor`='".$_POST[idVendedor]."', `dtVc`='".dataSql($_POST[dtVc])."', `contatoVc`='".$_POST[contatoVc]."', `descricaoVc`='".nl2br($_POST[descricaoVc])."', `idProposta`='".$_POST[idProposta]."', `materialVc`='".$_POST[materialVc]."', `dtproximaVc`='".dataSql($_POST[dtproximaVc])."' where idVc = '$_POST[idVc]' Limit 1") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Visita Editada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

<? if($_REQUEST[step]=='3'){
$sqlIncluir = mysql_query("Update relacionamento_cliente set `statusRc`='E', dtaltRc=NOW() where idRc = '$_REQUEST[id]' Limit 1") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Visita Excluida com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

						<form name="users" id="users" action="index.php" method="POST">
                        

<? 


if($_POST[campoForm]!=''){
	if($_SESSION[buscacliente][campoForm]!=$_POST[campoForm]){
			$_SESSION[buscacliente][campoForm]=$_POST[campoForm];
	}
}

if($_POST[quicksearch]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscacliente][quicksearch]='';
}
if($_POST[quicksearch]!=''){
	if($_SESSION[buscacliente][quicksearch]!=$_POST[quicksearch]){
			$_SESSION[buscacliente][quicksearch]=$_POST[quicksearch];
	}
}
$Sql = "SELECT l.nome, l.id, rc.idRc, c.Cli_Fantasia, rc.tipoRc, rc.modoRc, DATE_FORMAT(dtRc,'%d/%m/%Y') as dt, rc.novapropostaRc FROM relacionamento_cliente rc left join clientes c on (c.Cli_ID=rc.idCliente) left join login l on (l.id=rc.idVendedor) where rc.statusRc='A'";

if($_POST[quicksearch]!=''){
$Sql.=" And ".$_SESSION[buscacliente][campoForm]." Like '%".$_SESSION[buscacliente][quicksearch]."%'";
}

//if($_POST[quicksearch]!='' && $dl[tipoUsuario]=='V'){
//$Sql.="where (Cli_Status='A' And Cli_Fantasia Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_Nome Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_CGC Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."')";
//}

if($dl[tipoUsuario]=='V'){
$Sql.= " And rc.idVendedor='".$dl[id]."' ";
}
if($_REQUEST[idCliente]!=''){
$Sql.= " And rc.idCliente='".$_REQUEST[idCliente]."' ";
}
$Sql.="ORDER BY rc.dtRc";
//echo $Sql;



$numreg = 300; // Quantos registros por página vai ser mostrado
        if (!isset($_REQUEST[pg])) {
                $_REQUEST[pg] = 0;
        }
$inicial = $_REQUEST[pg] * $numreg;
$sqlPaginacao = mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());;
$quantreg = mysql_num_rows($sqlPaginacao);

$quant_pg = ceil($quantreg/$numreg);

//echo '--'.$Sql.$montaWhere.'--';
$sqlUsuario = mysql_query($Sql.' Limit '.$inicial.','.$numreg) or die ("Could not connect to database: ".mysql_error());
?>
                        
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td></tr></td>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td>

<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse;width: 100%; height: 100%;DISPLAY: none;" id="gridtableoptusers"><tr style="height: 1em"><td align="left"><div id="gridoptusers"><ul id="tab"><li><a class="currenttab" href="#" onClick="this.blur(); return switchGridTab('massaction', 'gridoptions')" id="massaction" title="Mass Action">Mass Action</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('search', 'gridoptions')" id="search" title="Advanced Search">Advanced Search</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('settings', 'gridoptions');" id="settings" title="Settings">Settings</a></li></ul></div></td></tr>
<tr style="height: 1em"><td align="left"><div id="tab_massaction" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborder"><tr class="row1"><td align="left" width="60">Action: </td><td align="left"><select name="mass_action" onChange="javascript:return doFormConfirm('Are you sure you wish to continue?', this);" class="swiftselect"><option name="firstselect" value="">- Select -</option>
<option value="f2a6c498fb90ee345d997f888fce3b18">Delete</option>
<option value="c4908aca0e352a94cb6207103087070a">Mark as Validated</option>
<option value="6e1de310751f1262fffe196798e21a5d">Mark as Validation Pending</option>
</select></td></tr></table><BR /> </div><div id="tab_search" style="DISPLAY: none;" class="tabcontent"><BR /> </div><div id="tab_settings" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" class="tborder" width="100%"><tr class="row1"><td align="left" width="120">Results Per Page: </td><td align="left"><input type="text" name="set_resultsperpage" value="100" class="swifttext" size="10" /></td></tr><tr class="row2"><td align="left" colspan="2"><input type="submit" name="searchbutton" value="Submit" class="yellowbuttonbig" /></td></tr></table><BR /> </div></td></tr></table><table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Visitas</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="5" align="center" nowrap><input name="" onClick="marcarTodos(document.getElementById('users').messageids,this);" type="checkbox" value="" /></td>
<td class="tabletitlerow" width="40" align="center" nowrap>&nbsp;Tipo</td>
<td class="tabletitlerow" width="40" align="center" nowrap>&nbsp;Ação</td>
<td class="tabletitlerow" width="200" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" width="200" align="center" nowrap>&nbsp;Vendedor</td>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Nova Proposta</td>
<td class="tabletitlerow" width="45" align="center" nowrap>&nbsp;</td>

</tr>
<?
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td align="center"><input id="messageids" name="cliente[]" type="checkbox" value="<?=$sU[Cli_ID]?>" /></td>

<td colspan="" align="center" valign=""><?=labelTipoRelacionamento($sU[tipoRc])?></td>
<td colspan="" align="center" valign=""><?=labelModoRelacionamento($sU[modoRc])?></td>
<td colspan="" width="150" align="" valign="">&nbsp;<a href="index.php?_m=livesupport&_a=viewVisita&id=<?=$sU[idRc]?>" title="View"><?=$sU[Cli_Fantasia]?></a></td>
<td colspan="" width="150" align="center" valign=""><a href="index.php?_m=livesupport&_a=viewVisita&id=<?=$sU[idRc]?>" title="View"><?=$sU[nome]?></a></td>
<td colspan="" width="80" align="center" valign=""><?=$sU[dt]?></td>
<td colspan="" width="80" align="center" valign=""><? if($sU[novapropostaRc]=='S'){?>SIM<? } else {?>NÃO <? }?></td>

<td colspan="" width="" align="center" valign="">

<? if($dl[tipoUsuario]=='A' || $dl[tipoUsuario]=='C' || $dl[id]=$sU[id]){?>

&nbsp;<a href="javascript:ConfirmaDel('<?=$sU[idRc]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a>

<? } ?>
</td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td></table>
<input type="hidden" name="_m" value="livesupport"/>
<input type="hidden" name="_a" value="managerVisita"/>

</form>

<td colspan="2"></td>
					</tr>
										<tr height="4">
						<td colspan="3"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

