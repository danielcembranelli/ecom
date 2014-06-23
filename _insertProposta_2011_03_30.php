
<script language="JavaScript">
//window.onbeforeunload = ConfirmExit;
function ConfirmExit()
{
    //Pode se utilizar um window.confirm aqui também...
    return "Você está prestes a descartar a proposta sem salva-lá.";
}
</script>
<script type="text/javascript">
function chec(tabela,valor){
	if(valor==true){
	document.getElementById(tabela).style.display = 'block'
	} else {
	document.getElementById(tabela).style.display = 'none'
	}
}


function adicionaFamilia(id){

	if(id!='0'){
	$.get("buscaPreco.php",{id:id}, function(data){
	vars = data.split('|')
	inserirLinhaTabela(id,vars[0],vars[1],vars[2],vars[3],vars[4],vars[5],vars[6]);
	});
	}


}
function currencyFormat(fld, milSep, decSep, e) {
	var milSep = ',';
	var decSep = '.';
	var sep = 0;
	var key = '';
	var i = j = 0;
	var len = len2 = 0;
	var strCheck = '0123456789';
	var aux = aux2 = '';
	var whichCode = (window.Event) ? e.which : e.keyCode;
	if (whichCode == 13) return true;
	key = String.fromCharCode(whichCode);
	if (strCheck.indexOf(key) == -1) return false;
	len = fld.value.length;
	for(i = 0; i < len; i++)
	if ((fld.value.charAt(i) != '0') && (fld.value.charAt(i) != decSep)) break;
	aux = '';
	for(; i < len; i++)
	if (strCheck.indexOf(fld.value.charAt(i))!=-1) aux += fld.value.charAt(i);
	aux += key;
	len = aux.length;
	if (len == 0) fld.value = '';
	if (len == 1) fld.value = '0'+ decSep + '0' + aux;
	if (len == 2) fld.value = '0'+ decSep + aux;
	if (len > 2) {
	aux2 = '';
	for (j = 0, i = len - 3; i >= 0; i--) {
	if (j == 3) {
	aux2 += milSep;
	j = 0;
	}
	aux2 += aux.charAt(i);
	j++;
	}
	fld.value = '';
	len2 = aux2.length;
	for (i = len2 - 1; i >= 0; i--)
	fld.value += aux2.charAt(i);
	fld.value += decSep + aux.substr(len - 2, len);
	}
	return false;
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

	</script>
				<script language="javascript">
        // Função responsável por inserir linhas na tabela

function EnviaForm(){
	var paciente = document.teamworkAtendimento.idCliente.value.split('#')
	if(isNaN(paciente[0])){
		alert('Cliente não localizado!!!\nVerifique o cadastro.');
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
			document.teamworkAtendimento.contato.value=vars[0];
			//alert(vars[1]);
			if(vars[1]!=0){
				$('#idCliente').addClass('swifttext'+vars[1]);
			} else {
					$('#idCliente').addClass('swifttext');
			}
			//document.getElementById('trId').style.display = 'block'
			//document.formAtendimento.nomePaciente.value=paciente[1];
		
		});
		//alert(row[1]);
		//
	}
	}


function checboxOPERADOR(id,campo){
	if(campo==true){
	document.getElementById("OPERADOR_"+id).style.display="block";
	} else {
	document.getElementById("OPERADOR_"+id).style.display="none";
	}
}
function checboxPRECO(id,campo){
	if(campo==0){
	document.getElementById("PRECO_"+id).style.display="block";
	} else {
	document.getElementById("PRECO_"+id).style.display="none";
	}
}
function checboxFRETE(id,campo){
	if(campo==true){
	document.getElementById("FRETE_"+id).style.display="block";
	} else {
	document.getElementById("FRETE_"+id).style.display="none";
	}
}

function delRow(valor)
{
document.getElementById('insereConduta').deleteRow(valor)
}


		function inserirLinhaTabela(id,nome,valor1,valor2,valor3,operador,combustivel,seguro) {

            // Captura a referência da tabela com id “minhaTabela”
            var table = document.getElementById("insereConduta");
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
                newCell.innerHTML = '<a href="javascript:delRow('+ numOfRows +');" title="Apagar"><img src="themes/admin_default/action_delete.gif" border="0"></a>'
				
				newCell = newRow.insertCell(1);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input type="hidden" name="IDFAMILIA[]" value="'+id+'">'+nome+'</center>';

				newCell = newRow.insertCell(2);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input type="text" size="15" value="1" name="QTDA[]"></center>';

				newCell = newRow.insertCell(3);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><table><tr><td><select name="PRECO[]" onChange="checboxPRECO('+id+',options[selectedIndex].value);"><option>'+valor1+'</option><option>'+valor2+'</option><option>'+valor3+'</option><option value="0">OUTRO</option></select></td><td><input type="text" name="PRECO_O[]" id="PRECO_'+id+'" value="" size="6" style="display:none"></td></tr></table></center>';
   				newCell = newRow.insertCell(4);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input type="checkbox" name="COMBUSTIVEL[]" value="S" id="cc'+id+'"> <label for="cc'+id+'">R$ <input type="text" name="COMBUSTIVEL_V[]" id="PRECO_'+id+'" value="'+combustivel+'"></label></center>';
				newCell = newRow.insertCell(5);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><table><tr><td><input type="checkbox" name="OPERADOR[]" value="S" onclick="checboxOPERADOR('+id+',this.checked)"></td><td><input type="text" name="OPERADOR_V[]" id="OPERADOR_'+id+'" value="'+operador+'" size="15" style="display:none"></td></tr></table></center>';
				newCell = newRow.insertCell(6);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input type="checkbox" id="cs'+id+'" name="SEGURO[]" value="S"> <label for="cs'+id+'">R$ <input type="text" name="SEGURO_V[]" id="PRECO_'+id+'" value="'+seguro+'"></label></center>';
				newCell = newRow.insertCell(7);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><input type="text" size="15" name="FRETE[]" id="FRETE_'+id+'" ></center>';
        } 
</script>
<style>
#mask {
	margin-top:132px;
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#FFF;
}
</style>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerProposta" title="Manager Proposta">Manager Proposta</a> &raquo; <a href="index.php?_m=teamwork&amp;_a=insertProposta" title="Inserir Proposta">Inserir Proposta</a></span></td>
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
						
						
                        <form name="teamworkAtendimento" onsubmit="return EnviaForm();" id="downloadfileteamwork" action="index.php" method="POST" enctype="multipart/form-data">

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Proposta</td>
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
<table border="0" cellpadding="3" cellspacing="1" width="100%"><hr />

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Cliente</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext<?=$sC[Cla_ID]?>" name="idCliente" id="idCliente" value="<? if($_REQUEST[idCliente]!=''){?><?=$sC[Cli_ID]?>#<?=$sC[Cli_Fantasia]?><? } ?>" size="30" style="width:90%;" onblur="CarregaDados(this.value);"  /></td>
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
  <td align="left" valign="top" colspan=""><input name="contato" type="text" class="swifttext" value="<?=$sC[Cli_Contato]?>" size="40" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Local da Obra<br />
  (<a href="http://ecom.escad.com.br/distancia.php" target="_blank">Medir Dist&acirc;ncia</a>)
</span></td>
<td align="center" valign="top" colspan="" width="50%"><textarea name="endereco" rows="3" style="width:99%"></textarea></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Início da Obra</span></td>
  <td align="left" valign="top" colspan=""><input name="dtinicio" type="text" class="swifttext" value="" size="12" maxlength="10" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="tipoProposta" type="radio" id="radio" value="P" checked="checked" />
  <label for="tipoProposta">Proposta</label> <input type="radio" name="tipoProposta" id="radio2" value="C" />
  <label for="tipoProposta">Contrato</label></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Validade da Proposta</span></td>
<td align="left" valign="top" colspan="" width="50%"><input name="validade" type="text" class="swifttext" value="<?=$sC[validadeProposta]?>" size="5" /> dias</td>
</tr>
</table></td></tr></tbody></table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Condições Comerciais</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<? $sqlUsuario = mysql_query("SELECT DISTINCT idLegenda, nomeLegenda FROM legendas L inner join clausulas C on (L.idLegenda=C.grupoClausula) WHERE tipoLegenda = 'G'") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");
?>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="20%"><span class="tabletitle"><?=$sU[nomeLegenda]?></span><br />
<? $sqlC = mysql_query("SELECT * FROM `clausulas` where grupoClausula = '".$sU[idLegenda]."' And statusClausula='P'") or die ("Could not connect to database: ".mysql_error());
while ($sC = mysql_fetch_array($sqlC)){
?>
<input type="radio" name="g<?=$sU[idLegenda]?>" id="rd<?=$sC[idClausula]?>" value="radio" onclick="document.getElementById('idc<?=$sU[idLegenda]?>').value='<?=$sC[idClausula]?>'; document.getElementById('c<?=$sU[idLegenda]?>').value='<?=str_replace('<br />','\n',$sC[textoClausula])?>'" ondblclick="cleanit(document.getElementById('idc<?=$sU[idLegenda]?>'));" /><label for="rd<?=$sC[idClausula]?>"><?=$sC[legendaClausula]?></label><br />
<? } ?>

</td>
<td align="left" valign="top" colspan="" width="80%"><input type="hidden" name="clauleg[]" value="<?=$sU[idLegenda]?>" /><input type="hidden" name="clauid[]" id="idc<?=$sU[idLegenda]?>" value="0" /><textarea name="clautext[]" id="c<?=$sU[idLegenda]?>" id="c<?=$sU[idLegenda]?>" rows="4" style="width:99%; height:100%"></textarea></td>
</tr>
<? }?>
<? $cor = ($coralternada++ %2 ? "row2" : "row1");?>
<tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="20%"><span class="tabletitle">OBSERVAÇÃO</span><br />
</td>
<td align="left" valign="top" colspan="" width="80%"><textarea name="OBSGERAL" rows="4" style="width:99%; height:100%"></textarea></td>
</tr>
</table></td></tr></tbody></table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Equipamentos</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="tabletitlerow" width="20" align="center" nowrap></td>
<td class="tabletitlerow" width="250" align="center" nowrap>&nbsp;Equipamento</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Qtda</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Preço</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Combustivel</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Operador</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Seguro</td>
<td class="tabletitlerow" align="center" nowrap>&nbsp;Frete</td>
</tr>
</table></td></tr></tbody></table>
<table width="100%" style="margin-top:3px;" border="0" cellspacing="0" cellpadding="0"><tr>
<td><select name="familia" id="itemmenu"><option value="0">SELECIONE A FAMILIA</option><? $sqlUsuario = mysql_query("SELECT id, nome,grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where A.statusFamilia='A' ORDER BY nome1, marca, categoria, modelo") or die ("Could not connect to database: ".mysql_error());while ($sU = mysql_fetch_array($sqlUsuario)){?><option value="<?=$sU[id]?>"><?=$sU[nome1]?> <?=$sU[marca]?> <?=$sU[modelo]?> <?=$sU[categoria]?></option><? }?></select><a href="javascript:" onclick="adicionaFamilia(document.teamworkAtendimento.familia.options[document.teamworkAtendimento.familia.selectedIndex].value);" title="Back"><img src="themes/admin_default/action_add.gif" border="0">

</a></td>
</tr></table>
<br />

<script>
$('#preco3').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: ''
}); 
$('#consumo').priceFormat({
    prefix: '',
    centsSeparator: ',',
    thousandsSeparator: ''
}); 
</script>
<br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerProposta"/>
<input type="hidden" name="step" value="1"/>

</teamwork>
					
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&amp;_a=managerProposta" title="Back">&nbsp;Voltar 


</a></span></td>
						</tr></table>

					</tr>
									</table>
			
            
 <?
 $seismeses = date("Y-m-d",mktime (0,0,0,date("m"),date("d")-60,date("Y")));
$sqlUsuario = mysql_query("SELECT count(*) as total FROM proposta p where idVendedor='".$dl[id]."' And statusProposta='N' And dtcadProposta between '2010-10-01 00:00:01' and '".$seismeses." 23:59:59'") or die ("Could not connect to database: ".mysql_error());
$sQ = mysql_fetch_array($sqlUsuario);
	if($sQ[total]>0 && $dl[tipoUsuario]!='A'){
?>           
            
<div id="TesteMensagem" style="width:500px; height:100px; position:fixed;z-index:9999; background-color:#FFF; border:2px #999 solid; padding:10px;" class="window">
<table width="100%" border="0">
  <tr>
    <td width="120" align="center"><img src="images/Cadeado.jpg" width="103" height="100" /></td>
    <td align="center"><span class="tabletitle">Emissão de proposta não permitida!<br />
Existe Propostas <font color="#990066">Em Aberto</font> a mais de 60 dias</span></td>
  </tr>
</table>
</div>
 <div id="mask"></div> 

<script>
 var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':'100%','height':maskHeight-130});
 
		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
		var winH = $(window).height();
		var winW = $(window).width();
		$('#TesteMensagem').css('top',  winH/2-$('#TesteMensagem').height()/2);
		$('#TesteMensagem').css('left', winW/2-$('#TesteMensagem').width()/2);
	
		$('#TesteMensagem').fadeIn(2000);
		</script>
<? } ?>