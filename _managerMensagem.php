<? include("libEmarketing.php");?>
<script type="text/javascript"> 
function ConfirmaDel(valor)
{
var r=confirm("Voc� confima a exclus�o?")
if (r==true)
  {
	window.location.replace("index.php?_m=oper&_a=managerMensagem&step=3&id="+valor)
  }
  
}
</script>
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
						<td width="100%"><span class="smalltext">&nbsp;Manager Mensagem</span></td>
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
if($_POST[txtLeitura]==''){
		$_POST[txtLeitura]='0';
		}
	
		$f = CriarMensagem($_POST[txtNome],nl2br($_POST[txtDesc]), $_POST[txtAssunto], $_POST[txtNomeRemetente], $_POST[txtEmailRemetente], $_POST[txtResposta], $_POST[txtHTML], $_POST[txtCampanha], $_POST[txtLeitura]);

if($f){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Mensagem Cadastrada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} 


if($_POST[step]=='2'){
$Data=date("Y-m-d");
if($_POST[txtLeitura]==''){
		$_POST[txtLeitura]='0';
		}
	
		$f = EditarMensagem($_POST[txtNome],nl2br($_POST[txtDesc]), $_POST[txtAssunto], $_POST[txtNomeRemetente], $_POST[txtEmailRemetente], $_POST[txtResposta], $_POST[txtHTML], $_POST[txtCampanha], $_POST[txtLeitura], $_POST[id]);

if($f){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Mensagem Cadastrada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} 
if($_REQUEST[step]=='3'){
$f = updateStatusMensagem($_REQUEST[id],'T');
if($f){
?>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<tbody><tr class="row2"><td>

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr><td width="16" align="left" valign="middle"><img src="themes/admin_default/icon_info.gif" border="0" /></td><td align="left"><span class="smalltext">Mensagem Apagada com Sucesso</span></td></tr></table></td></tr></tbody></table><BR />
<? }
} 
?>

						<form name="users" id="users" action="index.php" method="POST">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">P�gina 1 de 1</td>
 <td class='navpageselected'><a href='index.php?_m=core&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td><td width="100%" align="right" valign="middle" width="1"><input type="text" name="quicksearch" class="quicksearch" /></td><td width="1"><img src="themes/admin_default/space.gif" width="4" height="1" /></td><td align="right" width="1"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="navpageselected" nowrap><a onclick="javascript:document.users.submit();" href="#" title="Quick Search">Pesquisar</a></td>

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
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Mensagens</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" align="left" nowrap>&nbsp;Identifica��o</td>
<td class="tabletitlerow" width="200" align="center" nowrap>&nbsp;&uacute;ltima altera&ccedil;&atilde;o</td>

<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Status</td>
<td class="tabletitlerow" width="200" align="center" nowrap>&nbsp;A��o</td>


</tr>

<? 
$sqlUsuario = mysql_query("SELECT m.idMensagem, m.identificadorMensagem, DATE_FORMAT(m.dtMensagem,'%d/%m/%Y %H:%i') as dtMensagem, m.statusMensagem, DATE_FORMAT(m.dtstatusMensagem,'%d/%m/%Y %h:%m') as dtAlteracao, m.subjectMensagem FROM mensagem m where m.statusMensagem!='T' order by idMensagem") or die ("Could not connect to database: ".mysql_error());
while ($sV = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, 'row2');">

<td colspan="" width="" align="left" valign=""><a href="index.php?_m=oper&_a=editMensagem&idMensagem=<?=$sV[idMensagem];?>" title="Editar"><?=$sV[identificadorMensagem];?></a></td>
<td colspan="" width="200" align="center" valign="">&nbsp;<a href="index.php?_m=oper&_a=editMensagem&idMensagem=<?=$sV[idMensagem];?>" title="Editar"><? if($sV[dtAlteracao]==''){ echo $sV[dtMensagem]; }?><?=$sV[dtAlteracao]?></a></td>
<td colspan="" width="150" align="center" valign=""><?=nameStatus($sV[statusMensagem]);?></td>
<td align="center"><a href="index.php?_m=oper&_a=editMensagem&idMensagem=<?=$sV[idMensagem];?>" title="Editar">Editar</a> | <a href="javascript:TesteEmail('<?=$sV[idMensagem];?>','<?=$sV[subjectMensagem];?>')">Testar</a> | <a href="index.php?_m=oper&_a=managerFila&idMensagem=<?=$sV[idMensagem];?>" title="Consultar Envio">Fila</a> | <a href="javascript:ConfirmaDel('<?=$sV[idMensagem];?>')">Excluir</a></td>
</tr>
<? } ?>
</table>

</td></tr></tbody></table>
<tr><td><img src="themes/admin_default/space.gif" width="1" height="6" /></tr></td>
<tr><td><table width="100%"  border="0" cellspacing="0" cellpadding="0" style="display:none"><tr valign="top"><td align="left"><table border="0" cellpadding="0" cellspacing="1" class="tborder"><tr><td class="highlightpage">P�gina 1 de 2</td>
 <td class='navpageselected'><a href='index.php?_m=core&_a=manageusers&offset=0' title='Page 1 of 2'>1</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100' title='Page 2 of 2'>2</a></td>
<td class='navpage'><a href='index.php?_m=core&_a=manageusers&offset=100'>&gt;</a></td>
</tr></table></td></tr></table></tr></td>
</tr></td></table>
<input type="hidden" name="_m" value="core"/>
<input type="hidden" name="_a" value="manageusers"/>

</form>
</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>
                                    
<div id="TesteMensagem" style="width:500px; height:150px; position:absolute;z-index:9999; display:none" class="window">
<form name="frTestaMensagem">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Enviar e-mail de teste</td>
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
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Assunto</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="txtAssunto" id="txtNome" readonly="readonly" value="<?=$sE[identificadorMensagem]?>" size="50" /><input type="hidden" class="swifttext" name="idMensagem" id="txtNome" readonly="readonly" value="<?=$sE[identificadorMensagem]?>" size="50" /></td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Enviar para</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="txtEmail" id="txtNome" value="<?=$sE[identificadorMensagem]?>" size="50" /></td>
</tr>
     
            
        </table>

            
</td>
</tr>
</tbody>
</table>
<br /><center><input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Enviar" onclick="EnviaEmail();" />&nbsp;&nbsp;<input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Cancelar" id="cancelar" /></center>
</form>
</div>

 <div id="mask"></div> 
<script>
function EnviaEmail(){
	var id = document.frTestaMensagem.idMensagem.value;
	var email = document.frTestaMensagem.txtEmail.value;
	$.get("_testeEmail.php",{idMensagem:id,Email:email}, function(data){
	alert(data);
	$('#mask').hide();
	$('.window').hide();
	});
	
	
}
function TesteEmail(id,titulo){
	
	document.frTestaMensagem.txtAssunto.value=titulo;
	document.frTestaMensagem.idMensagem.value=id;
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


<!--<div style="position:fixed; bottom:0; right:0;">ABC</div>-->