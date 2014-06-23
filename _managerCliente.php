<script type="text/javascript"> 
function ConfirmaDel(valor)
{
var r=confirm("Você confima a exclusão?")
if (r==true)
  {
	window.location.replace("index.php?_m=livesupport&_a=managerCliente&step=3&id="+valor)
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
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=livesupport&_a=managerCliente" title="Manager Cliente">Manager Cliente</a></span></td>
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
<? if($_POST[step]=='1'){
$Data=date("Y-m-d");
$obsCliente=nl2br($_POST[obsCliente]);

if($_POST[Cli_TIPO]=='J'){
	$Sql ="Select count(*) as total from clientes where (Cli_CGC='".formatarCPF_CNPJ($_POST[Cli_CGC],true)."') or (Cli_CGC='".formatarCPF_CNPJ($_POST[Cli_CGC],false)."')";
} else {
	$Sql ="Select count(*) as total from clientes where (Cli_CPF='".formatarCPF_CNPJ($_POST[Cli_CPF],true)."') or (Cli_CPF='".formatarCPF_CNPJ($_POST[Cli_CPF],false)."')";
}
$Sql = mysql_query($Sql) or die (mysql_error());
$n = mysql_fetch_array($Sql);
if($n[total]>'0' &&  $dl[tipoUsuario]!='A'){
	$Salva=0;
} else {
	$Salva=1;	
}

if($Salva==1){
$dtExpira = date("Y-m-d",mktime (0,0,0,date("m"),date("d")+90,date("Y")));
$sqlIncluir = mysql_query("Insert into clientes (`idPerfil`,`Cli_Tipo`,`Cli_Fantasia`,`Cli_Nome`, `Cli_CGC`, `Cli_Inscricao`, `Cli_Contato`, `Cli_Endereco`, `Cli_Numero`, `Cli_Cidade`, `Cli_Bairro`, `Cli_UF`, `Cli_Pais`, `Cli_Fone1`, `Cli_Fone2`, `Cli_Fone3`, `Cli_Fax1`, `Cli_Fax2`, `Cli_Fax3`, `Cli_EMail`, `Cli_URL`, `Cli_EndCob`, `Cli_CidCob`, `Cli_BaiCob`, `Cli_CepCob`, `Cli_UFCob`, `Cli_EndEnt`, `Cli_CidEnt`, `Cli_BaiEnt`, `Cli_CepEnt`, `Cli_UFEnt`, `Cli_Historico`, `idVendedor`,`Cli_DDD1`,`Cli_DDD2`,`Cli_DDD3`,`Cli_DDD4`, `dtcadCli`,`Cli_CEP`,`idFilial`,`Cli_RG`,`Cli_CPF`,`Cli_Complemento`,`Ori_ID`,`Cla_ID`,`Cli_ComEnt`,`Cli_ComCob`,`Cli_NumEnt`,`Cli_NumCob`,`idcadCliente`,`dtCli_Status`,`dtexpiraCliente`) values ('$_POST[idPefil]','$_POST[Cli_Tipo]','$_POST[Cli_Fantasia]','$_POST[Cli_Nome]', '$_POST[Cli_CGC]', '$_POST[Cli_Inscricao]', '$_POST[Cli_Contato]', '$_POST[Cli_Endereco]', '$_POST[Cli_Numero]', '$_POST[Cli_Cidade]',  '$_POST[Cli_Bairro]', '$_POST[Cli_UF]', '$_POST[Cli_Pais]', '$_POST[Cli_Fone1]', '$_POST[Cli_Fone2]', '$_POST[Cli_Fone3]', '$_POST[Cli_Fax1]', '$_POST[Cli_Fax2]', '$_POST[Cli_Fax3]', '$_POST[Cli_Email]', '$_POST[Cli_URL]', '$_POST[Cli_EndCob]', '$_POST[Cli_CidCob]', '$_POST[Cli_BaiCob]', '$_POST[Cli_CepCob]', '$_POST[Cli_UFCob]', '$_POST[Cli_EndEnt]', '$_POST[Cli_CidEnt]', '$_POST[Cli_BaiEnt]', '$_POST[Cli_CepEnt]', '$_POST[Cli_UFEnt]', '$obsCliente', '$_POST[idVendedor]', '$_POST[dddtelefone1]', '$_POST[dddtelefone2]', '$_POST[dddtelefone3]', '$_POST[dddfax1]',NOW(), '$_POST[Cli_CEP]', '$_POST[idFilial]', '$_POST[Cli_RG]', '$_POST[Cli_CPF]',  '$_POST[Cli_Complemento]',  '$_POST[idOrigem]', '$_POST[idClassificacao]', '$_POST[Cli_ComEnt]', '$_POST[Cli_ComCob]', '$_POST[Cli_NumEnt]','$_POST[Cli_NumCob]', '$_POST[idVendedor2]',NOW(),'$dtExpira')") or die (mysql_error());
$id=mysql_insert_id();

if($_POST[CODIGOACAO]!=''){
	$Sql = mysql_query("Insert into clientes_cartao (Cli_ID,dtentregaCc,idVendedor,nrCc) values ('".$id."','".dataSql($_POST[DATAENTREGA])."','".$_POST[idVendedor]."','".$_POST[CODIGOACAO]."')") or die (mysql_error());
}
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Cliente "<?=$_POST[Cli_Fantasia]?>" Cadastrada com Sucesso</span></td></tr></table></td></tr></tbody></table>
<script>window.location='?_m=livesupport&_a=editCliente&id=<?=$id?>'</script><BR />
<? }

} else {
?>	
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="errorbox"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_error.gif" border="0" /></td><td align="left"><span class="smalltext">Cliente já cadastrado!</span></td></tr></table></td></tr></tbody></table>
<?	
}

} ?>



<?
//echo '--'.$_POST[BAICOB];
 if($_POST[step]=='2'){
$Data=date("Y-m-d");
$obsCliente=nl2br($_POST[obsCliente]);
$sqlIncluir = mysql_query("Update clientes set `idPerfil`='$_POST[idPerfil]',`Cli_Tipo`='$_POST[Cli_Tipo]',`ideditCliente`='$dl[id]', `Cli_Fantasia`='$_POST[Cli_Fantasia]',`Cli_Nome`='$_POST[Cli_Nome]', `Cli_CGC`='$_POST[Cli_CGC]', `Cli_Inscricao`='$_POST[Cli_Inscricao]', `Cli_Contato`='$_POST[Cli_Contato]', `Cli_Endereco`='$_POST[Cli_Endereco]', `Cli_Numero`='$_POST[Cli_Numero]', `Cli_Cidade`='$_POST[Cli_Cidade]', `Cli_Bairro`='$_POST[Cli_Bairro]', `Cli_UF`='$_POST[Cli_UF]', `Cli_Pais`='$_POST[Cli_Pais]', `Cli_Fone1`='$_POST[Cli_Fone1]', `Cli_Fone2`='$_POST[Cli_Fone2]', `Cli_Fone3`='$_POST[Cli_Fone3]', `Cli_Fax1`='$_POST[Cli_Fax1]', `Cli_Fax2`='$_POST[Cli_Fax2]', `Cli_Fax3`='$_POST[Cli_Fax3]', `Cli_EMail`='$_POST[Cli_Email]', `Cli_URL`='$_POST[Cli_URL]', `Cli_EndCob`='$_POST[Cli_EndCob]', `Cli_CidCob`='$_POST[Cli_CidCob]', `Cli_BaiCob`='$_POST[BAICOB]', `Cli_CepCob`='$_POST[Cli_CepCob]', `Cli_UFCob`='$_POST[UFCOB]', `Cli_EndEnt`='$_POST[Cli_EndEnt]', `Cli_CidEnt`='$_POST[Cli_CidEnt]', `Cli_BaiEnt`='$_POST[Cli_BaiEnt]', `Cli_CepEnt`='$_POST[Cli_CepEnt]', `Cli_UFEnt`='$_POST[Cli_UFEnt]', `Cli_Historico`='$obsCliente', `idFilial`='$_POST[idFilial]', `Cli_RG`='$_POST[Cli_RG]', `Cli_CPF`='$_POST[Cli_CPF]',  `Cli_Complemento`='$_POST[Cli_Complemento]',`Ori_ID`='$_POST[idOrigem]', `Cla_ID`='$_POST[idClassicacao]', `dtaltCli`=NOW(), `Cli_CEP`='$_POST[Cli_CEP]', `Cli_ComEnt`='$_POST[Cli_ComEnt]',`Cli_ComCob`='$_POST[Cli_ComCob]', `Cli_NumEnt`='$_POST[Cli_NumEnt]', `Cli_NumCob`='$_POST[Cli_NumCob]',`Cli_DDD1`='$_POST[dddfone1]',`Cli_DDD2`= '$_POST[dddfone2]',`Cli_DDD3`= '$_POST[dddfone3]',`Cli_DDD4`= '$_POST[dddfax1]' where Cli_ID = '$_POST[id]' Limit 1") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Cliente "<?=$_POST[Cli_Fantasia]?>" Editado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<script>window.location='?_m=livesupport&_a=editCliente&id=<?=$_POST[id]?>'</script>
<? }
} ?>

<? if($_REQUEST[step]=='3'){
$Data=date("Y-m-d");
$obsCliente=nl2br($_POST[obsCliente]);
$sqlIncluir = mysql_query("Update clientes set `Cli_Status`='E', dtCli_Status=NOW(), expiraCliente='N' where Cli_ID = '$_REQUEST[id]' Limit 1") or die (mysql_error());
if($sqlIncluir){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Cliente "<?=$_POST[Cli_Fantasia]?>" Editado com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} ?>

						<form name="users" id="users" action="index.php" method="POST">
                        <input type="hidden" name="_m" value="livesupport"/>
<input type="hidden" name="_a" value="managerCliente"/>
                        

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
$Sql = "SELECT A.antigoidCliente, A.Cli_ID, A.Cli_Fantasia, Cli_Nome, A.Cli_CGC, A.Cli_Contato, A.Cli_Fone1, A.Cli_DDD1, A.Cli_Endereco, A.Cli_Cidade, A.Cli_UF, A.Cli_CEP, A.dtcadCli, A.Cli_Status, A.expiraCliente, DATE_FORMAT(A.dtexpiraCliente,'%d/%m/%Y') as dtExpira, A.idVendedor FROM clientes A where ";


	
	if($dl[tipoUsuario]=='G' || $dl[tipoUsuario]=='V'){
		$i=0;
		$SqlFilial = mysql_query("Select idVendedor from login_vendedor where idUsuario='".$dl[id]."'") or die (mysql_error());
		$nFilial = mysql_num_rows($SqlFilial);
		while($sF = mysql_fetch_array($SqlFilial)){
			$i++;
			
		$Sql.="(Cli_Status!='E'";
		
		if($_POST[quicksearch]!=''){
		$Sql.=" And UPPER(".$_SESSION[buscacliente][campoForm].") Like '%".strtoupper($_SESSION[buscacliente][quicksearch])."%'";
		}
		
		//if($_POST[quicksearch]!='' && $dl[tipoUsuario]=='V'){
		//$Sql.="where (Cli_Status='A' And Cli_Fantasia Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_Nome Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_CGC Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."')";
		//}
		
		$Sql .= " And idVendedor = '".$sF[idVendedor]."'";
			if($i!=$nFilial){
				$Sql .= ") or ";
			} else {
				$Sql .= ") or";
			}
		}
		$i=0;
		$SqlFilial = mysql_query("Select idPatio from login_patio where idUsuario='".$dl[id]."'") or die (mysql_error());
		$nFilial = mysql_num_rows($SqlFilial);
		while($sF = mysql_fetch_array($SqlFilial)){
			$i++;
			
		$Sql.="(Cli_Status!='E'";
		
		if($_POST[quicksearch]!=''){
		$Sql.=" And UPPER(".$_SESSION[buscacliente][campoForm].") Like '%".strtoupper($_SESSION[buscacliente][quicksearch])."%'";
		}
		
		//if($_POST[quicksearch]!='' && $dl[tipoUsuario]=='V'){
		//$Sql.="where (Cli_Status='A' And Cli_Fantasia Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_Nome Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_CGC Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."')";
		//}
		
		$Sql .= " And idFilial = '".$sF[idPatio]."'";
			if($i!=$nFilial){
				$Sql .= ") or ";
			} else {
				$Sql .= ") or ";
			}
		}
	} else {
	
		$Sql.="(Cli_Status!='E'";
		
		if($_POST[quicksearch]!=''){
		$Sql.=" And UPPER(".$_SESSION[buscacliente][campoForm].") Like '%".strtoupper($_SESSION[buscacliente][quicksearch])."%'";
		}
		
		//if($_POST[quicksearch]!='' && $dl[tipoUsuario]=='V'){
		//$Sql.="where (Cli_Status='A' And Cli_Fantasia Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_Nome Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."') or (Cli_Status='A' And Cli_CGC Like '%".$_POST[quicksearch]."%' And idVendedor='".$dl[id]."')";
		//}
		
		if($dl[tipoUsuario]=='V'){
		//$Sql.= " And idVendedor='".$dl[id]."' ";
		}
		
		$Sql.=") or";
	}
//if($dl[id]=='27'){
//$seismeses = date("Y-m-d",mktime (0,0,0,date("m")+6,date("d"),date("Y")));
//$Sql.=" or (idFilial=3 And Cli_DataEmitido < '".$seismeses." 23:59:59'";

//if($_POST[quicksearch]!=''){
//$Sql.=" And ".$_SESSION[buscacliente][campoForm]." Like '%".$_SESSION[buscacliente][quicksearch]."%'";
//}
//$Sql.=")";
//}

		$Sql.="(Cli_Status!='E'";
		
		if($_POST[quicksearch]!=''){
		$Sql.=" And UPPER(".$_SESSION[buscacliente][campoForm].") Like '%".strtoupper($_SESSION[buscacliente][quicksearch])."%'";
		}
		$Sql.= " And idVendedor='".$dl[id]."')";

$Sql.="ORDER BY A.Cli_Status, A.Cli_Fantasia";

//echo $Sql;

$numreg = 300; // Quantos registros por página vai ser mostrado
        if (!isset($_REQUEST[pg])) {
                $_REQUEST[pg] = 0;
        }
$inicial = $_REQUEST[pg] * $numreg;
//echo $Sql;
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
<select name="campoForm" class="quicksearch">
<option <? if($_SESSION[buscacliente][campoForm]=='Cli_Nome'){?>selected="selected"<? } ?> value="Cli_Nome">Razão Social:</option>
<option <? if($_SESSION[buscacliente][campoForm]=='Cli_Fantasia'){?>selected="selected"<? } ?> value="Cli_Fantasia">Nome Fantasia:</option>
<option <? if($_SESSION[buscacliente][campoForm]=='Cli_CGC'){?>selected="selected"<? } ?> value="Cli_CGC">CNPJ:</option>
<option <? if($_SESSION[buscacliente][campoForm]=='Cli_Endereço'){?>selected="selected"<? } ?> value="Cli_Endereco">Endereço: </option>
<option <? if($_SESSION[buscacliente][campoForm]=='Cli_Cidade'){?>selected="selected"<? } ?> value="Cli_Cidade">Cidade:</option>
<option <? if($_SESSION[buscacliente][campoForm]=='Cli_UF'){?>selected="selected"<? } ?> value="Cli_UF">Estado:</option>
<option <? if($_SESSION[buscacliente][campoForm]=='Cli_CEP'){?>selected="selected"<? } ?> value="Cli_CEP">Cep:</option>
</select><input type="text" name="quicksearch" class="quicksearch" value="<?=$_SESSION[buscacliente][quicksearch]?>" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

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
<? 
if($dl[tipoUsuario]=='V'){
?>
<td class="tabletitlerow" width="16" align="center" nowrap></td>
<? } ?>
<td class="tabletitlerow" width="" align="" nowrap>&nbsp;Nome&nbsp;<img src="themes/admin_default/sortasc.gif" border="0" /></a></td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Razão Social</td>
<td class="tabletitlerow" width="200" align="center" nowrap>&nbsp;CNPJ</td>

<?
if($_SESSION[buscacliente][campoForm]=='Cli_Fantasia'){
	$campoOculto=0;	
}
if($_SESSION[buscacliente][campoForm]=='Cli_Nome'){
	$campoOculto=0;	
}
if($_SESSION[buscacliente][campoForm]=='Cli_CGC'){
	$campoOculto=0;	
}
if($_SESSION[buscacliente][campoForm]=='Cli_Endereco'){
	$campoOculto=1;	
	$label='Endereço';	
}
if($_SESSION[buscacliente][campoForm]=='Cli_Cidade'){
	$campoOculto=1;	
	$label='Cidade';	
}
if($_SESSION[buscacliente][campoForm]=='Cli_UF'){
	$campoOculto=1;	
	$label='Estado';	
}
if($_SESSION[buscacliente][campoForm]=='Cli_CEP'){
	$campoOculto=1;	
	$label='CEP';	
}
if($campoOculto=='1'){
	
	?>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;<?=$label?></td>
<? } ?>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Contato</td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Telefone</td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Status</td>
<td class="tabletitlerow" width="45" align="center" nowrap>&nbsp;</td>

</tr>
<?

while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td align="center"><input id="messageids" name="cliente[]" type="checkbox" value="<?=$sU[Cli_ID]?>" /></td>
<? 
$cadeado ='N';
if($dl[tipoUsuario]=='V'){
	
?>
<td colspan="" align="center" valign="">
	<? if($sU[idVendedor]==$dl[id] || $sU[Cli_Status]=='I'){ $cadeado ='N';?><img src="menu/ico_locker_open.png" /><? } else { $cadeado ='S';?><img src="menu/ico_locker_close.png" /><? } ?></td>
<? } ?>
<td colspan="" width="150" align="" valign="">&nbsp;<? if($cadeado=='N'){?><a href="index.php?_m=livesupport&_a=editCliente&id=<?=$sU[Cli_ID]?>" title="Edit"><? } ?><?=$sU[Cli_Fantasia]?><? if($cadeado=='N'){?></a><? }?></td>
<td colspan="" width="150" align="center" valign=""><? if($cadeado=='N'){?><a href="index.php?_m=livesupport&_a=editCliente&id=<?=$sU[Cli_ID]?>" title="Edit"><? } ?><?=$sU[Cli_Nome]?><? if($cadeado=='N'){?></a><? } ?></td>
<td colspan="" width="150" align="center" valign=""><?=$sU[Cli_CGC]?></td>
<?
if($campoOculto=='1'){	
	?>
<td colspan="" width="80" align="center" valign=""><?=$sU[$_SESSION[buscacliente][campoForm]]?></td>
<? } ?>
<td colspan="" width="80" align="center" valign=""><? if($cadeado=='N'){ ?><?=$sU[Cli_Contato]?><? } else { echo 'Restrito'; }?></td>
<td colspan="" width="80" align="center" valign=""><? if($cadeado=='N'){  if($sU[Cli_DDD1]!=''){?>(<?=$sU[Cli_DDD1]?>) <? } ?><?=$sU[Cli_Fone1]?> <? } else { echo 'Restrito'; }?></td>
<td colspan="" width="80" align="center" valign=""><? if($sU[expiraCliente]=='S'){?><span class="vtip" title="Expira em <?=$sU[dtExpira]?>"><? } ?><?=labelStatusCliente($sU[Cli_Status]);?><? if($sU[expiraCliente]=='S'){?></span><? } ?></td>
<td colspan="" width="" align="center" valign="">
<? if($cadeado=='N'){?><a href="index.php?_m=form&_a=insertProposta&idCliente=<?=$sU[Cli_ID]?>" title="Nova Proposta"><img src="themes/admin_default/bar_logs.gif" border="0"></a><? } ?>
<? if($sU[antigoidCliente]==0 && $sU[dtcadCli]=='0000-00-00 00:00:00'){?><a href="index.php?_m=livesupport&_a=managerClienteAntigo&idCliente=<?=$sU[Cli_ID]?>" title="Vincular Cliente"><img src="themes/admin_default/icon_export.gif" border="0"></a><? }?>
<? if($dl[tipoUsuario]=='A' || $dl[tipoUsuario]=='C'){?>&nbsp;<a href="javascript:ConfirmaDel('<?=$sU[Cli_ID]?>');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a><? } ?></td>

</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
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
				echo "<td class='".$css."'><a href='index.php?_m=livesupport&_a=managerCliente&pg=".$i_pg."' title='Pag. ".$i_pg." of ".$quant_pg."'>".$i_pg."</a></td>";
        }
?>
<td class='navpage' style="display:none"><a href='index.php?_m=form&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td></tr></table></tr></td>
</tr></td></table>
<? if($frEnviaFila==1){?>
<table>
<tr>
<td>
	<select name="idMensagem">
    <? 
$sqlUsuario = mysql_query("SELECT m.idMensagem, m.identificadorMensagem FROM mensagem m where m.statusMensagem!='T' order by idMensagem") or die ("Could not connect to database: ".mysql_error());
while ($sV = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
   		<option value="<?=$sV[idMensagem]?>"><?=$sV[identificadorMensagem]?></option>
        <? } ?>
    </select> 
    </td><td><input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Colocar em fila" onclick="enviaFila();" /></td>
    </tr>
    </table>
<? } ?>


</form>

<script>
function enviaFila(){
	document.users.action='_enviaFila.php';
	document.users.submit()
	
}
</script>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>

