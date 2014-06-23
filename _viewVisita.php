
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
		});
		//alert(row[1]);
		//
	}
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
						
						
                        <form name="teamworkAtendimento" onsubmit="return EnviaForm();" id="downloadfileteamwork" action="index.php" method="POST" enctype="multipart/form-data">

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

$Sql = "SELECT l.nome, rc.*, c.Cli_Fantasia, DATE_FORMAT(dtRc,'%d/%m/%Y') as dt FROM relacionamento_cliente rc left join clientes c on (c.Cli_ID=rc.idCliente) left join login l on (l.id=rc.idVendedor) where rc.statusRc='A' And rc.idRc='".$_REQUEST[id]."'";
$sqlCli = mysql_query($Sql) or die ("Could not connect to database: ".mysql_error());
$sC = mysql_fetch_array($sqlCli);
?>


<td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Tipo</span></td>
<td align="left" valign="top" colspan="" width="50%"><?=labelTipoRelacionamento($sC[tipoRc])?></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Modo</span></td>
<td align="left" valign="top" colspan="" width="50%"><?=labelModoRelacionamento($sC[modoRc])?></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Cliente</span></td>
<td align="left" valign="top" colspan="" width="50%"><?=$sC[Cli_Fantasia]?></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Vendedor</span></td>
<td align="left" valign="top" colspan="" width="50%"><?=$sC[nome]?></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Contato</span></td>
  <td align="left" valign="top" colspan=""><?
	$Sql = mysql_query("SELECT c.idContato, nomeContato, cargoContato FROM relacionamento_contato rc left join contatos c on (c.idContato=rc.idContato) where idRc='".$_REQUEST[id]."' order by nomeContato") or die (mysql_error());
	while ($dom = mysql_fetch_array($Sql)){	?>
  <?=$dom[nomeContato]?> (<?=$dom[cargoContato]?>)<br />
<? }?>
</td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Data do Contato</span></td>
  <td align="left" valign="top" colspan=""><input name="dtVc" id="dtVc" type="text" class="swifttext" value="<?=$sC[dt]?>" size="12" alt="data2" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Entrega de Material Institucional</span></td>
<td align="left" valign="top" colspan="" width="50%"><? if($sC[emiRc]=='S'){?>SIM<? } else {?>NÃO <? }?></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nova Proposta</span></td>
<td align="left" valign="top" colspan="" width="50%"><? if($sC[novapropostaRc]=='S'){?>SIM <? if($sC[idProposta]!=0){?>| <a href="http://ecom.escad.com.br/index.php?_m=form&_a=viewProposta&id=<?=$sC[idProposta]?>" target="_blank">Visualizar a Proposta</a><? } else { ?> Proposta ainda não emitida<? } } else {?>NÃO <? }?></td>
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
    Descritivo do contato com o cliente abordando os seguintes itens:<br />
  
  <ul>
    <li>Ha outras equipamentos em obra? Quais?
    <center><textarea name="P1" rows="4" style="width:99%;" id="P1"><?=strip_tags($sC[p1Rc])?></textarea></center><br /></li>
    <li>Existe necessidade de outros equipamentos para o cliente?
    <center><textarea name="P2" rows="4" style="width:99%;" id="P2"><?=strip_tags($sC[p2Rc])?></textarea></center><br /></li>
    <li>O cliente possui outras obras? Que não estamos trabalhando? Quais?
    <center><textarea name="P3" rows="4" style="width:99%;" id="P3"><?=strip_tags($sC[p3Rc])?></textarea></center><br /></li>
    <li>A Escad entrou na obra substituindo outra empresa?
    <center><textarea name="P4" rows="4" style="width:99%;" id="P4"><?=strip_tags($sC[p4Rc])?></textarea></center><br /></li>
    <li>Como está o nosso conceito com esta empresa?<center><textarea name="P5" rows="3" style="width:99%;" id="P5"><?=strip_tags($sC[p5Rc])?></textarea></center><br /></li>
    <li>Concorrencia
    <center><textarea name="P6" rows="4" style="width:99%;" id="P6"><?=strip_tags($sC[p6Rc])?></textarea></center><br /></li>
  </ul>
  
  <center><textarea name="obs" rows="5" style="width:99%;" id="obs"><?=strip_tags($sC[textoRc])?></textarea></center>
  </td>
</tr>
</table></td></tr></tbody></table>
<? if($sC[tipoRc]=='V'){?>
<br />
<br /><br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Endere&ccedil;o de Origem</td>
                        </tr>
                        </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
            
            <tr>
            <td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Cep</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Endere&ccedil;o</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>N&ordm;</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Complemento</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Bairro</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Cidade</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>UF</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>KM Inicial</td>
            </tr>       
            <?
	$SqlO = mysql_query("SELECT * FROM relacionamento_endereco rc where tipoRe='O' And idRc='".$_REQUEST[id]."'") or die (mysql_error());
	$dO = mysql_fetch_array($SqlO);
			?>
            <tr id="trid1466" class="row1">
            <td colspan="" align="center"><input name="CEPORIGEM"type="text" class="swifttext" value="<?=$dO[cepRe]?>" size="12" alt="cep" /></td>
            <td colspan="" align="center"><input name="ENDERECOORIGEM" type="text" class="swifttext" value="<?=$dO[enderecoRe]?>" size="60" id="ENDERECOORIGEM" /></td>
            <td colspan="" align="center"><input name="NRORIGEM" type="text" class="swifttext" value="<?=$dO[nrRe]?>" size="10" id="NRORIGEM"/></td>
            <td align="center"><input name="COMPLEMENTOORIGEM" type="text" class="swifttext" value="<?=$dO[complementoRe]?>" size="15" id="COMPLEMENTOORIGEM"/></td>
            <td align="center"><input name="BAIRROORIGEM" type="text" class="swifttext" value="<?=$dO[bairroRe]?>" size="20" id="BAIRROORIGEM"/></td>
            <td align="center"><input name="CIDADEORIGEM" type="text" class="swifttext" value="<?=$dO[cidadeRe]?>" size="20" id="CIDADEORIGEM"/></td>
            <td align="center"><input name="UFORIGEM" type="text" class="swifttext" value="<?=$dO[ufRe]?>" size="4" maxlength="2" id="UFORIGEM" /></td>
            <td colspan="" align="center"><input name="KMORIGEM" type="text" class="swifttext" value="<?=$dO[kmRe]?>" size="15" id="KMORIGEM"/></td>
            </tr>       
            </table>
            
            </td></tr></tbody></table>
<br /><br /><br />
<br /><br /><br />

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Endere&ccedil;o de Destino</td>
                        </tr>
                        </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
            
            <tr>
            <td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Cep</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>&nbsp;Endere&ccedil;o</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>N&ordm;</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Complemento</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Bairro</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>Cidade</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>UF</td>
            <td class="tabletitlerow" width="25%" align="center" nowrap>KM Inicial</td>
            </tr>       
            <?
	$SqlO = mysql_query("SELECT * FROM relacionamento_endereco rc where tipoRe='D' And idRc='".$_REQUEST[id]."'") or die (mysql_error());
	$dO = mysql_fetch_array($SqlO);
			?>
            <tr id="trid1466" class="row1">
            <td colspan="" align="center"><input name="CEPORIGEM"type="text" class="swifttext" value="<?=$dO[cepRe]?>" size="12" alt="cep" /></td>
            <td colspan="" align="center"><input name="ENDERECOORIGEM" type="text" class="swifttext" value="<?=$dO[enderecoRe]?>" size="60" id="ENDERECOORIGEM" /></td>
            <td colspan="" align="center"><input name="NRORIGEM" type="text" class="swifttext" value="<?=$dO[nrRe]?>" size="10" id="NRORIGEM"/></td>
            <td align="center"><input name="COMPLEMENTOORIGEM" type="text" class="swifttext" value="<?=$dO[complementoRe]?>" size="15" id="COMPLEMENTOORIGEM"/></td>
            <td align="center"><input name="BAIRROORIGEM" type="text" class="swifttext" value="<?=$dO[bairroRe]?>" size="20" id="BAIRROORIGEM"/></td>
            <td align="center"><input name="CIDADEORIGEM" type="text" class="swifttext" value="<?=$dO[cidadeRe]?>" size="20" id="CIDADEORIGEM"/></td>
            <td align="center"><input name="UFORIGEM" type="text" class="swifttext" value="<?=$dO[ufRe]?>" size="4" maxlength="2" id="UFORIGEM" /></td>
            <td colspan="" align="center"><input name="KMORIGEM" type="text" class="swifttext" value="<?=$dO[kmRe]?>" size="15" id="KMORIGEM"/></td>
            </tr>       
            </table>
            
            </td></tr></tbody></table>


<br /><br /><br />
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
<?
$sqlUsuario = mysql_query("Select rc.valorRct, rc.textoRct, rtc.tituloRtc from relacionamento_custo rc left join relacionamento_tipo_custo rtc on (rtc.idRtc=rc.idRtc) where idRc='".$_REQUEST[id]."'");
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
            <tr>
            <td class="tabletitlerow" width="40%" align="center" colspan="2" nowrap><?=$su[tituloRtc]?></td>
            <td class="tabletitlerow" width="20%" align="center" nowrap><?=number_format($su[valorRtc],2,',')?></td>
            <td class="tabletitlerow" width="40%" align="center" nowrap><?=$su[textoRtc]?></td>
            </tr>
<? } ?>            
            </table>
            </td></tr></tbody></table>
<br />
<br />
<br />
<? }?>
  <br />
  <center></center>
<input type="hidden" name="_m" value="livesupport"/>
<input type="hidden" name="_a" value="managerVisita"/>
<input type="hidden" name="step" value="1"/>

</form>
					
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=livesupport&_a=manageVisita" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=livesupport&amp;_a=managerVisita" title="Back">&nbsp;Voltar 


</a></span></td>
						</tr></table>

					</tr>
									</table>
