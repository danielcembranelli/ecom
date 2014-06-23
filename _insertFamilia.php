<script type="text/javascript">
function chec(tabela,valor){
	if(valor==true){
	document.getElementById(tabela).style.display = 'block'
	} else {
	document.getElementById(tabela).style.display = 'none'
	}
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
	
$("#nomeF").autocomplete("seachLegenda.php?tipo=N", {
		formatItem: formatItem,
		autoFill: false,
		formatResult: formatResult
	});
	
$("#marcaF").autocomplete("seachLegenda.php?tipo=M", {
		formatItem: formatItem,
		autoFill: false,
		formatResult: formatResult
	});	
$("#categoriaF").autocomplete("seachLegenda.php?tipo=C", {
		formatItem: formatItem,
		autoFill: false,
		formatResult: formatResult
	});
$("#modeloF").autocomplete("seachLegenda.php?tipo=O", {
		formatItem: formatItem,
		autoFill: false,
		formatResult: formatResult
	});		
	
	});

	</script>
				<script language="javascript">
        // Função responsável por inserir linhas na tabela
        
function delRow(valor)
{
document.getElementById('insereConduta').deleteRow(valor)
}


		function inserirLinhaTabela() {

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
                newCell.innerHTML = '<center><input type="text" class="swifttext" name="condutaCID[]" id="titulomenu" value="" size="10" /></center>';
				newCell = newRow.insertCell(2);
                // Insere um conteúdo na coluna
                newCell.innerHTML = '<center><textarea name="condutaDESC[]" id="textarea" cols="45" rows="2" style="width:90%"></textarea></center>';
            

        } 
</script>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerFamilia" title="Manager Família">Manager Família </a> &raquo; <a href="index.php?_m=teamwork&amp;_a=insertFamilia" title="Inserir Família">Inserir Família</a></span></td>
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
						
						<form name="teamworkAtendimento" id="downloadfileteamwork" action="index.php" method="POST" enctype="multipart/teamwork-data">

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Fam&iacute;lia</td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nome</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="nomeFamilia" id="nomeF" value="" size="30" style="width:90%;" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Marca</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="marcaFamilia" id="marcaF" value="" size="30" style="width:90%;" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Modelo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="modeloFamilia" id="modeloF" value="" size="30" style="width:90%;" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Categoria</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="categoriaFamilia" id="categoriaF" value="" size="30" style="width:90%;" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Familia Master</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="idFamiliamaster" onchange="CarregaXMLFamiliaMapaES(this.value)" id="itemmenu">
 <option value="0">Selecione a familia master</option>
<? $sqlMaster = mysql_query("SELECT id, nome FROM familia_master A ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
while ($sM = mysql_fetch_array($sqlMaster)){
?>
      <option value="<?=$sM[id]?>" <? if($sU[master]==$sM[id]){?>selected="selected"<? } ?>><?=$sM[nome]?></option>
      <? }?>
    </select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Equipamento</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="midFEquipamento" id="midFEquipamento">
 <option value="0">Selecione a familia do equipamento</option>
<? 
$SQL = "SELECT id, nome FROM familia where nome!=''";
if($sU[master]!=''){
	$SQL.=" And master='".$sU[master]."'"; 	
}
$SQL.=" ORDER BY nome";

$sqlMaster = mysql_query($SQL) or die ("Could not connect to database: ".mysql_error());
while ($sM = mysql_fetch_array($sqlMaster)){
?>
      <option value="<?=$sM[id]?>" <? if($sU[midFEquipamento]==$sM[id]){?>selected="selected"<? } ?>><?=$sM[nome]?></option>
      <? }?>
    </select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Acessório 1</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="midFAcessorio1" id="itemmenu">
 <option value="0">Selecione a familia de acessorio</option>
<? $sqlMaster = mysql_query("SELECT id, nome FROM familia_acessorio A ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
while ($sM = mysql_fetch_array($sqlMaster)){
?>
      <option value="<?=$sM[id]?>" <? if($sU[midFAcessorio1]==$sM[id]){?>selected="selected"<? } ?>><?=$sM[nome]?></option>
      <? }?>
    </select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Acessório 2</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="midFAcessorio2" id="itemmenu">
 <option value="0">Selecione a familia de acessorio</option>
<? $sqlMaster = mysql_query("SELECT id, nome FROM familia_acessorio A ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
while ($sM = mysql_fetch_array($sqlMaster)){
?>
      <option value="<?=$sM[id]?>" <? if($sU[midFAcessorio2]==$sM[id]){?>selected="selected"<? } ?>><?=$sM[nome]?></option>
      <? }?>
    </select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Grupo</span></td>
<td align="left" valign="top" colspan="" width="50%"><select size="1" name="grupo" class=form-especial>
			<option  value="1" >A</option>
						<option  value="2" >B</option>
						<option  value="3" >C</option>
						<option  value="4">D</option></select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Visivel no MapaES</span></td>
<td align="left" valign="top" colspan="" width="50%"><select size="1" name="mapaes" class=form-especial>
			<option  value="S" >Sim</option>
						<option  value="N" >Não</option></select></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Valor do bem</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="valorbem" id="preco3" value="<?=number_format($sU[valorbemFamilia], 2, ',', '')?>" size="30" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Consumo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="consumo" id="consumo" value="<?=str_replace('.',',',$sU[consumoFamilia])?>" size="30" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Potência</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="potencia" value="<?=$sU[potenciaFamilia]?>" size="30" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Seguro</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="seguro" id="seguro" value="<?=str_replace('',',',$sU[seguroFamilia])?>" size="30" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Operador</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="operador" id="itemmenu">
 <option value="0">Selecione o operador</option>
<? $sqlMaster = mysql_query("SELECT idOt, labelOt FROM operadortipo A ORDER BY labelOt") or die ("Could not connect to database: ".mysql_error());
while ($sM = mysql_fetch_array($sqlMaster)){
?>
      <option value="<?=$sM[idOt]?>" <? if($sU[idOt]==$sM[idOt]){?>selected="selected"<? } ?>><?=$sM[labelOt]?></option>
      <? }?>
    </select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Descritivo</span></td>
<td align="center" valign="top" colspan="" width="50%"><textarea name="desc" cols="30" style="width:99%" rows="3"></textarea></td>
</tr>
</table></td></tr></tbody></table>
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
$('#seguro').priceFormat({
    prefix: '% ',
    centsSeparator: ',',
    thousandsSeparator: '',
	centsLimit: 4
}); 
</script>
<br />
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerFamilia"/>
<input type="hidden" name="step" value="1"/>

</teamwork>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=teamwork&amp;_a=managerFamilia" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			