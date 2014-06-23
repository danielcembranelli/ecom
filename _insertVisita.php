
<script language="JavaScript">
//window.onbeforeunload = ConfirmExit;
function ConfirmExit()
{
    //Pode se utilizar um window.confirm aqui também...
    return "Você está prestes a descartar a proposta sem salva-lá.";
}

$().ready(function() {
		 
	function formatItem(row) {
		return row[0];
	}
	function formatResult(row) {
		//alert(row[1]);
		//document.teamworkAtendimento.idPaciente.value=row[1];
		//document.getElementById('trId').style.display = 'block';
		return row[0].replace(/(<.+?>)/gi, '');
	}
	
$("#idCliente").autocomplete("searchCliente.php", {
		formatItem: formatItem,
		autoFill: false,
		formatResult: formatResult
	});
	

	
	});
	
function SelecionaOrigem(id){
	
	if(id!='P'){
		document.teamworkAtendimento.KMORIGEM.focus();
		$("#tituloOrigem").hide();
		$("#campoOrigem").hide();
	} else {
		document.teamworkAtendimento.KMORIGEM.focus();
		$("#tituloOrigem").show();
		$("#campoOrigem").show();
	}
	
}
function SelecionaDestino(id){
	
	if(id!='P'){
		document.teamworkAtendimento.KMDESTINO.focus();
		$("#tituloDestino").hide();
		$("#campoDestino").hide();
	} else {
		document.teamworkAtendimento.KMORIGEM.focus();
		$("#tituloDestino").show();
		$("#campoDestino").show();
	}
	
}
function delRow(valor)
{
document.getElementById('insereCusto').deleteRow(valor)
}
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
                newCell.innerHTML = '<center><select name="idRtc[]" id="idContato"><option value="0">Selecione..</option><?
	$Sql = mysql_query("SELECT idRtc, tituloRtc FROM relacionamento_tipo_custo order by tituloRtc") or die (mysql_error());
	while ($dom = mysql_fetch_array($Sql)){
	?><option value="<?=$dom[idRtc]?>"><?=$dom[tituloRtc]?></option><?  }?></select></center>';
        // Função responsável por inserir linhas na tabela
				newCell = newRow.insertCell(2);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input name="vlRtc[]" id="vlRtc" type="text" class="swifttext" value="" size="20" alt="valor" /></center>';
				newCell = newRow.insertCell(3);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input name="textoRtc[]" type="text" class="swifttext" id="dtVc2" value="" size="50" maxlength="80" /></center>';
				$('input:text').setMask();
}


function EnviaForm(){
	
	var objRadio =  document.teamworkAtendimento.tipo;
    for(i=0; i < objRadio.length; i++ ) {
        if (objRadio[i].checked == true)
		 var TIPO = objRadio[i].value;
    }
	
	var paciente = document.teamworkAtendimento.idCliente.value
	var KMORIGEM = document.teamworkAtendimento.KMORIGEM.value
	var KMDESTINO = document.teamworkAtendimento.KMDESTINO.value
	var m ='';
	var i =Number(0);
	if(paciente==''){
		m+='Cliente não localizado!!!\nVerifique o cadastro.';
		i++;
	}
	if(KMORIGEM==''){
		if(TIPO=='V'){
		m+='\nInforme o KM Inicial.';
		i++;
		}
	}
	if(KMDESTINO==''){
		if(TIPO=='V'){
		m+='\nInforme o KM Destino.';
		i++;
		}
	} 
	
	if(i>0){
		alert(m);
		return false;
	} else {
		return true;
	}
	
}

function CarregaDados(row) {
		var paciente = row.split('#')
		if(paciente.length==2){
		//alert('Carregando Contato do Cliente')
		$.get("CarregaDados.php",{q:paciente[0]}, function(data){
		vars = data.split('|')
		//alert(vars[0]);
			//document.teamworkAtendimento.contato.value=vars[0];
			//alert(vars[1]);
			if(vars[1]!=0){
				$('#idCliente').addClass('swifttext'+vars[1]);
			} else {
					$('#idCliente').addClass('swifttext');
			}
			//document.getElementById('trId').style.display = 'block'
			//document.formAtendimento.nomePaciente.value=paciente[1];
			$.get("xmlContatoCliente.php",{id:paciente[0]}, function(data){
			FuncaoXML(data,'idContato')
			});
			$.get("xmlClienteProposta.php",{id:paciente[0]}, function(data){
			FuncaoXML(data,'idProposta')
			}); 
		});
		//alert(row[1]);
		//
	}
	}
function BuscaCEP_O(CEP){
	$.get("CarregaCEP.php",{CEP:CEP}, function(data){
	eval(data);
	document.teamworkAtendimento.ENDERECOORIGEM.value=unescape(resultadoCEP['tipo_logradouro'])+' '+unescape(resultadoCEP['logradouro']);
	document.teamworkAtendimento.BAIRROORIGEM.value=unescape(resultadoCEP['bairro']);
	document.teamworkAtendimento.CIDADEORIGEM.value=unescape(resultadoCEP['cidade']);
	document.teamworkAtendimento.UFORIGEM.value=unescape(resultadoCEP['uf']);
	document.teamworkAtendimento.NRORIGEM.focus();
	});
}
function BuscaCEP_D(CEP){
	$.get("CarregaCEP.php",{CEP:CEP}, function(data){
	eval(data);
	document.teamworkAtendimento.ENDERECODESTINO.value=unescape(resultadoCEP['tipo_logradouro'])+' '+unescape(resultadoCEP['logradouro']);
	document.teamworkAtendimento.BAIRRODESTINO.value=unescape(resultadoCEP['bairro']);
	document.teamworkAtendimento.CIDADEDESTINO.value=unescape(resultadoCEP['cidade']);
	document.teamworkAtendimento.UFDESTINO.value=unescape(resultadoCEP['uf']);
	document.teamworkAtendimento.NRDESTINO.focus();
	});	
}
</script>


                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Manager Relacionamento &raquo; Novo Contato</span></td>
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
						
						
<form name="teamworkAtendimento" onsubmit="return EnviaForm();" id="downloadfileteamwork" action="index.php<? if($_REQUEST[idCliente]!=''){?>?idCliente=<?=$_REQUEST[idCliente]?><? }?>" method="POST" enctype="multipart/form-data">

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Contato</td>
</tr>
</thead>
<tbody>
<tr>
<?
if($_REQUEST[idCliente]!=''){
$Sql = "SELECT A.Cli_ID, A.Cli_Fantasia, A.Cli_Contato, A.Cla_ID FROM clientes A where  A.Cli_ID = '$_REQUEST[idCliente]'";
$sqlCli = mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());
$sC = mysql_fetch_array($sqlCli);
}
?>


<td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="tipo" type="radio" id="tipoV" value="V" checked="checked" />
  <label for="tipoV">Visita</label> <input type="radio" name="tipo" id="tipoT" value="T" />
  <label for="tipoT">Telefonema</label> <input type="radio" name="tipo" id="tipoE" value="E" />
  <label for="tipoE">E-mail</label></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Modo de Açào</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="modo" type="radio" id="modoA" value="A" checked="checked" />
  <label for="modoA">ESCAD</label> <input type="radio" name="modo" id="modoP" value="P" />
  <label for="modoP">CLIENTE</label></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Cliente</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext<?=$sC[Cla_ID]?>" name="idCliente" id="idCliente" value="<? if($_REQUEST[idCliente]!=''){?><?=$sC[Cli_ID]?>#<?=$sC[Cli_Fantasia]?><? } ?>" size="30" style="width:90%;" onblur="CarregaDados(this.value);"  /></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Vendedor</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idVendedor" id="idVendedor">
<?
if($dl[tipoUsuario]=='V'){
	?>
  <option value="<?=$dl[id]?>" selected="selected"><?=$dl[nome]?></option>
  <?
} else {

$Sql = mysql_query("Select id, nome from login where (statusUsuario='A' And tipoUsuario='A') or (statusUsuario='A' And tipoUsuario='C') or (statusUsuario='A' And tipoUsuario='V')  order by nome") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($dl[id]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } } ?>
</select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Contato</span></td>
  <td align="left" valign="top" colspan=""><select name="idContato[]" size="3" multiple="multiple" id="idContato">
<option value="0">Selecione o contato..</option>
<?
if($_REQUEST[idCliente]!=''){
	$Sql = mysql_query("SELECT idContato, nomeContato, cargoContato FROM contatos c where idCliente='".$sC[Cli_ID]."' And statusContato='A' order by nomeContato") or die (mysql_error());
	while ($dom = mysql_fetch_array($Sql)){

	?>
  <option value="<?=$dom[idContato]?>"><?=$dom[nomeContato]?> (<?=$dom[cargoContato]?>)</option>
<? } }?>
</select></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data do Contato</span></td>
  <td align="left" valign="top" colspan=""><input name="dtVc" id="dtVc" type="text" class="swifttext" value="" size="12" alt="data2" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Entrega de Material Institucional</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="emi" type="radio" id="radio" value="S" checked="checked" />
  <label for="radio">Sim</label> <input type="radio" name="emi" id="radio2" value="N" />
  <label for="radio2">Não</label></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nova Proposta</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="novaproposta" type="radio" id="radiov" value="S" checked="CHECKED" />
  <label for="radiov">Sim</label> <input type="radio" name="novaproposta" id="radio2v" value="N" />
  <label for="radio2v">Não </label>&nbsp;&nbsp;<select name="idProposta" id="idProposta">
<option value="A">Selecione a proposta..</option>
<option value="0">Proposta ainda não emitida..</option>
<?
if($_REQUEST[idCliente]!=''){
	$Sql = mysql_query("SELECT p.idProposta, c.nomeContato, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, DATE_FORMAT(p.dtcadProposta,'%Y') as ano, p.statusProposta FROM proposta p inner join contatos c on (p.idContato=c.idContato) where c.idCliente='".$sC[Cli_ID]."' And p.statusProposta!='T' order by idProposta desc") or die (mysql_error());
	while ($dom = mysql_fetch_array($Sql)){

	?>
  <option value="<?=$dom[idProposta]?>"><?=$dom[idProposta]?>/<?=$dom[ano]?> (<?=labelStatusProposta($dom[statusProposta])?>)</option>
<? } }?>
</select></td>
</tr>
</table></td></tr></tbody></table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Descri&ccedil;&atilde;o do Contato</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
  <td valign="top" colspan="2">
    Fa&ccedil;a um descritivo do contato com o cliente abordando os seguintes itens:<br />
  <ul>
    <li>Ha outras equipamentos em obra? Quais?
    <center><textarea name="P1" rows="3" style="width:99%; height:100%" id="P1"></textarea></center><br /></li>
    <li>Existe necessidade de outros equipamentos para o cliente?
    <center><textarea name="P2" rows="3" style="width:99%; height:100%" id="P2"></textarea></center><br /></li>
    <li>O cliente possui outras obras? Que não estamos trabalhando? Quais?
    <center><textarea name="P3" rows="3" style="width:99%; height:100%" id="P3"></textarea></center><br /></li>
    <li>A Escad entrou na obra substituindo outra empresa?
    <center><textarea name="P4" rows="3" style="width:99%; height:100%" id="P4"></textarea></center><br /></li>
    <li>Como está o nosso conceito com esta empresa?<center><textarea name="P5" rows="3" style="width:99%; height:100%" id="P5"></textarea></center><br /></li>
    <li>Concorrencia
    <center><textarea name="P6" rows="3" style="width:99%; height:100%" id="P6"></textarea></center><br /></li>
  </ul>
  <center><textarea name="obs" rows="3" style="width:99%; height:100%" id="obs"></textarea><br /></center>
  </td>
</tr>
</table></td></tr></tbody></table>
<br /><br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Endere&ccedil;o de Origem</td>
                        </tr>
                        </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                        <tr id="trid1466" class="row1">
            <td colspan="" align="center">Local</td>
            <td colspan="2"><select id="idOrigem" onchange="SelecionaOrigem(this.value);">
  <option>Selecione o Local</option>
  <?
$Sql = mysql_query("Select ID_PATIO, NOME_PATIO from patio order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
              <option value="<?=$dom[ID_PATIO]?>">Filial <?=$dom[NOME_PATIO]?></option>
  <? } ?>
              <option value="P">Personalizado</option>
</select></td>
            <td align="center">KM Inicial</td>
            <td colspan="4"><input name="KMORIGEM" type="text" class="swifttext" value="" size="15" id="KMORIGEM"/></td>
            </tr> 
            
            <tr id="tituloOrigem">
            <td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Cep</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Endere&ccedil;o</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>N&ordm;</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Complemento</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Bairro</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Cidade</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>UF</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Descri&ccedil;&atilde;o</td>
            </tr>            
            <tr class="row1" id="campoOrigem">
            <td colspan="" align="center"><input name="CEPORIGEM"type="text" class="swifttext" value="" size="12" alt="cep"onkeyup="if(this.value.length == 9){BuscaCEP_O(this.value);}" /></td>
            <td colspan="" align="center"><input name="ENDERECOORIGEM" type="text" class="swifttext" value="" size="60" id="ENDERECOORIGEM" /></td>
            <td colspan="" align="center"><input name="NRORIGEM" type="text" class="swifttext" value="" size="10" id="NRORIGEM"/></td>
            <td align="center"><input name="COMPLEMENTOORIGEM" type="text" class="swifttext" value="" size="15" id="COMPLEMENTOORIGEM"/></td>
            <td align="center"><input name="BAIRROORIGEM" type="text" class="swifttext" value="" size="20" id="BAIRROORIGEM"/></td>
            <td align="center"><input name="CIDADEORIGEM" type="text" class="swifttext" value="" size="20" id="CIDADEORIGEM"/></td>
            <td align="center"><input name="UFORIGEM" type="text" class="swifttext" value="" size="4" maxlength="2" id="UFORIGEM" /></td>
            <td colspan="" align="center"><input name="DESCRICAOORIGEM" type="text" class="swifttext" value="" size="15" id="DESCRICAOORIGEM"/></td>
            </tr>       
            </table>
            
            </td></tr></tbody></table>
<br /><br /><br />
<br /><br /><br />
<br /><br /><br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Endere&ccedil;o de Destino</td>
                        </tr>
          </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
            <tr id="trid1466" class="row1">
            <td colspan="" align="center">Local</td>
            <td colspan="2"><select id="idDestino" name="idDestino" onchange="SelecionaDestino(this.value);">
  <option>Selecione o Local</option>
              <option value="C">Endereço do Cliente</option>
              <option value="P">Personalizado</option>
</select></td>
            <td align="center">KM Final</td>
            <td colspan="4"><input name="KMDESTINO" type="text" class="swifttext" value="" size="15" id="KMDESTINO"/></td>
            </tr> 
            <tr id="tituloDestino">
            <td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Cep</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Endere&ccedil;o</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>N&ordm;</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Complemento</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Bairro</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Cidade</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>UF</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Descrição</td>
            </tr>            
            <tr id="campoDestino" class="row1">
            <td colspan="" align="center"><input name="CEPDESTINO"type="text" class="swifttext" value="" size="12" alt="cep" id="CEPDESTINO" onkeyup="if(this.value.length == 9){BuscaCEP_D(this.value);}" /></td>
            <td colspan="" align="center"><input name="ENDERECODESTINO" type="text" class="swifttext" value="" size="60" id="ENDERECODESTINO" /></td>
            <td colspan="" align="center"><input name="NRDESTINO" type="text" class="swifttext" value="" size="10" id="NRDESTINO"/></td>
            <td align="center"><input name="COMPLEMENTODESTINO" type="text" class="swifttext" value="" size="15" id="COMPLEMENTODESTINO"/></td>
            <td align="center"><input name="BAIRRODESTINO" type="text" class="swifttext" value="" size="20" id="BAIRRODESTINO"/></td>
            <td align="center"><input name="CIDADEDESTINO" type="text" class="swifttext" value="" size="20" id="CIDADEDESTINO"/></td>
            <td align="center"><input name="UFDESTINO" type="text" class="swifttext" value="" size="3" maxlength="2" id="UFDESTINO" /></td>
            <td colspan="" align="center"><input name="DESCRICAODESTINO" type="text" class="swifttext" value="" size="15"/></td>
            </tr>       
            </table>
            
            </td></tr></tbody></table>
<br /><br /><br />
<br /><br /><br />
<br /><br /><br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Custo do Contato</td>
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
<br />
<br />

  <a href="javascript:inserirLinhaTabela();"><img src="themes/admin_default/action_add.gif" width="16" height="16" alt="Adicionar Custo" /> Adicionar Novo Custo ao Contato</a>
  <br />
  <br />
  <center>
<input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="livesupport"/>
<input type="hidden" name="_a" value="managerVisita"/>
<input type="hidden" name="step" value="1"/>

</form>
					
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&amp;_a=managerVisita" title="Back">&nbsp;Voltar 


</a></span></td>
						</tr></table>

					</tr>
									</table>
