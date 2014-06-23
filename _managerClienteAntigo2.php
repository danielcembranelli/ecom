<? include("Config.php");?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=livesupport&_a=managerClienteAntigo" title="Manager Cliente">Manager Cliente Antigo</a></span></td>
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



<? if($_POST[step]=='2'){
//$sqlIncluir = mysql_query("UPDATE `clientes` SET `antigoidCliente` =  '12130' WHERE  `Cli_ID` =  '127' LIMIT 1 ;") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Cliente "<?=$_POST[Cli_Fantasia]?>" Editado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

						<form name="users" id="users" action="index.php?idCliente=<?=$_REQUEST[idCliente]?>" method="POST">
                        

<? 
$Sql1 = "SELECT A.Cli_ID, A.Cli_Fantasia, Cli_Nome, A.Cli_CGC, A.Cli_Contato, A.Cli_Fone1, A.Cli_DDD1, A.Cli_Endereco, A.Cli_Cidade, A.Cli_UF, A.Cli_CEP FROM clientes A where antigoidCliente ='0' order by RAND() Limit 150";

$sqlNovo = mysql_query($Sql1) or die ("Erro Cliente Atual: ".mysql_error());

while($sC = mysql_fetch_array($sqlNovo)){
?>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Cliente <?=$sC[Cli_Fantasia]?> (<?=$sC[Cli_Nome]?>) selecionado </span></td></tr></table></td></tr></tbody></table><BR />
<?
if($_POST[campoForm]!=''){
	if($_SESSION[buscaantigo][campoForm]!=$_POST[campoForm]){
			$_SESSION[buscaantigo][campoForm]=$_POST[campoForm];
	}
}

if($_POST[quicksearch]=='' && $_REQUEST[pg]==''){
	$_SESSION[buscaantigo][quicksearch]='';
}
if($_POST[quicksearch]!=''){
	if($_SESSION[buscaantigo][quicksearch]!=$_POST[quicksearch]){
			$_SESSION[buscaantigo][quicksearch]=$_POST[quicksearch];
	}
}
$Sql = "SELECT A.Cli_ID, A.Cli_Fantasia, Cli_Nome, A.Cli_CGC, A.Cli_Contato, A.Cli_Fone1, A.Cli_DDD1, A.Cli_Endereco, A.Cli_Cidade, A.Cli_UF, A.Cli_CEP FROM cliente2 A where A.ja=0";

if($_POST[quicksearch]!=''){
$Sql.=" And ".$_SESSION[buscaantigo][campoForm]." Like '%".$_SESSION[buscaantigo][quicksearch]."%'";
}

if($sC[Cli_CEP]!='' && $_POST[quicksearch]==''){
$Sql.=" And A.Cli_CEP Like '%".$sC[Cli_CEP]."%'";
}

//if($sC[Cli_Nome]!=''){
//$Sql.=" And A.Cli_Nome Like '%".$sC[Cli_Nome]."%'";
//}

if($sC[Cli_UF]!=''){
//$Sql.=" And A.Cli_UF = '".$sC[Cli_UF]."'";
}

if($sC[Cli_Contato]!=''){
//$Sql.=" And A.Cli_Contato Like '%".$sC[Cli_Contato]."%'";
}
if($sC[Cli_CGC]!=''){
//$Sql.=" And A.Cli_CGC Like '%".$sC[Cli_CGC]."%'";
}

//if($_POST[quicksearch]!='' && $dl[tipoUsuario]=='V'){
//$Sql.="where (Cli_Status='A' And Cli_Fantasia Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_Nome Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_CGC Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."')";
//}


//$Sql.="ORDER BY A.Cli_Fantasia";
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
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td align="left"><table style="display:none" border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">Página 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=form&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1">
</td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1" style="display:none"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

<!--<td class="navpageselected" nowrap><a onclick="javascript:displayGridTabData('users', false);hideTabOn('gridoptusers', 'massaction');" href="#" title="Options">Options</a></td>-->
</tr></table></td></tr></table></tr></td>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td>

<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border-collapse: collapse;width: 100%; height: 100%;DISPLAY: none;" id="gridtableoptusers"><tr style="height: 1em"><td align="left"><div id="gridoptusers"><ul id="tab"><li><a class="currenttab" href="#" onClick="this.blur(); return switchGridTab('massaction', 'gridoptions')" id="massaction" title="Mass Action">Mass Action</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('search', 'gridoptions')" id="search" title="Advanced Search">Advanced Search</a></li><li><a href="#" onClick="this.blur(); return switchGridTab('settings', 'gridoptions');" id="settings" title="Settings">Settings</a></li></ul></div></td></tr>
<tr style="height: 1em"><td align="left"><div id="tab_massaction" style="DISPLAY: none;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborder"><tr class="row1"><td align="left" width="60">Action: </td><td align="left"><select name="mass_action" onChange="javascript:return doFormConfirm('Are you sure you wish to continue?', this);" class="swiftselect"><option name="firstselect" value="">- Select -</option>
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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Clientes</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="5" align="center" nowrap><input name="" onClick="marcarTodos(document.getElementById('users').messageids,this);" type="checkbox" value="" /></td>
<td class="tabletitlerow" width="" align="" nowrap>&nbsp;Nome&nbsp;<img src="themes/admin_default/sortasc.gif" border="0" /></a></td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Razão Social</td>
<td class="tabletitlerow" width="200" align="center" nowrap>&nbsp;CNPJ</td>

<?
if($_SESSION[buscaantigo][campoForm]=='Cli_Fantasia'){
	$campoOculto=0;	
}
if($_SESSION[buscaantigo][campoForm]=='Cli_Nome'){
	$campoOculto=0;	
}
if($_SESSION[buscaantigo][campoForm]=='Cli_CGC'){
	$campoOculto=0;	
}
if($_SESSION[buscaantigo][campoForm]=='Cli_Endereco'){
	$campoOculto=1;	
	$label='Endereço';	
}
if($_SESSION[buscaantigo][campoForm]=='Cli_Cidade'){
	$campoOculto=1;	
	$label='Cidade';	
}
if($_SESSION[buscaantigo][campoForm]=='Cli_UF'){
	$campoOculto=1;	
	$label='Estado';	
}
if($_SESSION[buscaantigo][campoForm]=='Cli_CEP'){
	$campoOculto=1;	
	$label='CEP';	
}
if($campoOculto=='1'){
	
	?>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;<?=$label?></td>
<? } ?>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Contato</td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Telefone</td>
<? if($dl[tipoUsuario]=='A'){?><td class="tabletitlerow" width="10" align="center" nowrap>&nbsp;</td><? } ?>

</tr>
<?
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  

if($sU[Cli_Nome]==$sC[Cli_Nome]){
mysql_query("UPDATE `clientes` SET `antigoidCliente` =  '".$sU[Cli_ID]."' WHERE  `Cli_ID` =  '".$sC[Cli_ID]."' LIMIT 1 ;");
//) or die (mysql_error());
mysql_query("UPDATE  `cliente2` SET `ja` =  '1' WHERE  `Cli_ID` =  '".$sU[Cli_ID]."' LIMIT 1");
}
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td align="center"><input id="messageids" name="cliente[]" <? if($sU[Cli_Nome]==$sC[Cli_Nome]){?>checked="checked" <? } ?>type="checkbox" value="<?=$sU[Cli_ID]?>" /></td>
<td colspan="" width="150" align="" valign="">&nbsp;<?=$sU[Cli_Fantasia]?></td>
<td colspan="" width="150" align="center" valign=""><?=$sU[Cli_Nome]?></td>
<td colspan="" width="150" align="center" valign=""><?=$sU[Cli_CGC]?></td>
<?
if($campoOculto=='1'){	
	?>
<td colspan="" width="80" align="center" valign=""><?=$sU[$_SESSION[buscaantigo][campoForm]]?></td>
<? } ?>
<td colspan="" width="80" align="center" valign=""><?=$sU[Cli_Contato]?></td>
<td colspan="" width="80" align="center" valign=""><? if($sU[Cli_DDD1]!=''){?>(<?=$sU[Cli_DDD1]?>) <? } ?><?=$sU[Cli_Fone1]?></td>
<? if($dl[tipoUsuario]=='A'){?>
<td colspan="" width="" align="center" valign=""><a href="javascript:ConfirmaDel('<?=$sU[Cli_ID]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a></td>
<? } ?>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>



<tr style="display:none"><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr>
<td class="highlightpage">Cliente <?=$_REQUEST[pg]?> de <?=$quant_pg?></td>

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
				echo "<td class='".$css."'><a href='index.php?_m=livesupport&_a=managerClienteAntigo&pg=".$i_pg."' title='Pag. ".$i_pg." of ".$quant_pg."'>".$i_pg."</a></td>";
        }
?>
<td class='navpage' style="display:none"><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td></tr></table></tr></td>
</tr></td></table>

<? }?>
<input type="hidden" name="atualid" value="<?=$_REQUEST[idCliente]?>" />
<input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Vincular" onclick="vincular();" />
<input type="hidden" name="_m" value="livesupport"/>
<input type="hidden" name="_a" value="managerClienteAntigo"/>

</form>
<script>
function vincular(){
	document.users.action='_ligaCliente.php';
	document.users.target='_blank';
	document.users.submit()

	
}
</script>

</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

