<script type="text/javascript">
function chec(tabela,valor){
	if(valor==true){
	document.getElementById(tabela).style.display = 'block'
	} else {
	document.getElementById(tabela).style.display = 'none'
	}
}
function FilialMaisProxima(){
	
	var cidade = document.Cliente.Cli_Cidade.value;
	var uf = document.Cliente.Cli_UF.value;
	
	$.get("_DistanciaFilial.php",{to:cidade+' -'+uf}, function(data){
	
		for(i=0; i<document.getElementById('idFilial').options.length; i++)	{
				if(document.getElementById('idFilial').options[i].value==Number(data)){
						document.getElementById('idFilial').options[i].selected=true
				};
			}
	});
	}
	
function BuscaCEP(CEP){
	$.get("CarregaCEP.php",{CEP:CEP}, function(data){
	eval(data);
	
	document.Cliente.Cli_Endereco.value=unescape(resultadoCEP['tipo_logradouro'])+' '+unescape(resultadoCEP['logradouro']);
	document.Cliente.Cli_Bairro.value=unescape(resultadoCEP['bairro']);
	document.Cliente.Cli_Cidade.value=unescape(resultadoCEP['cidade']);
	document.Cliente.Cli_UF.value=unescape(resultadoCEP['uf']);
	
	document.Cliente.Cli_EndEnt.value=unescape(resultadoCEP['tipo_logradouro'])+' '+unescape(resultadoCEP['logradouro']);
	document.Cliente.Cli_BaiEnt.value=unescape(resultadoCEP['bairro']);
	document.Cliente.Cli_CidEnt.value=unescape(resultadoCEP['cidade']);
	document.Cliente.Cli_UFEnt.value=unescape(resultadoCEP['uf']);
	document.Cliente.Cli_CepEnt.value=unescape(CEP);
	
	document.Cliente.Cli_EndCob.value=unescape(resultadoCEP['tipo_logradouro'])+' '+unescape(resultadoCEP['logradouro']);
	document.Cliente.Cli_BaiCob.value=unescape(resultadoCEP['bairro']);
	document.Cliente.Cli_CidCob.value=unescape(resultadoCEP['cidade']);
	document.Cliente.Cli_UFCob.value=unescape(resultadoCEP['uf']);
	document.Cliente.Cli_CepCob.value=unescape(CEP);
	});
	
	
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
$("#Cli_Cidade").autocomplete("searchCidade.php", {
		formatItem: formatItem,
		autoFill: false,
		formatResult: formatResult
	});
	
	});	
</script>				<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=livesupport&_a=managerCliente" title="Manager Cliente">Manager Cliente </a> &raquo; <a href="index.php?_m=livesupport&amp;_a=insertCliente" title="Insert File">Inserir Cliente </a></span></td>
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
						
						<form name="Cliente" id="downloadfileform" action="index.php" method="POST" <?
if($dl[tipoUsuario]!='A'){
	?> onsubmit=" return ValidaAddCliente(this)"<? } ?> enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Cliente</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" colspan="" width="100"><span class="tabletitle">Tipo</span></td>
<td align="left" colspan="">
<input name="Cli_TIPO" type="radio" id="radioCTJ" value="J" checked="checked" />
    <label for="radioCTJ">Juridica</label>
    <input type="radio" name="Cli_TIPO" id="radioCTF" value="F" />
    <label for="radioCTF">Física</label>
</td>
<td width="50%" align="left"><span class="tabletitle">Avaliação Cadastral</span></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" colspan="" width="100"><span class="tabletitle">CNPJ</span></td>
<td align="left" colspan=""><input type="text" class="swifttext" name="Cli_CGC" onblur="vcnpj(this)" alt="cnpj" id="Cli_CGC" value="" size="30" /></td>
<td rowspan="11" align="left"><textarea style="WIDTH:99%; height:100%" name="obsCliente" cols="100" rows="20" tabindex="99" onselect="javascript:storeCaret(this);" onclick="javascript:storeCaret(this);" onkeyup="javascript:storeCaret(this);" id="obsCliente"><?=strip_tags($sU[Cli_Historico])?>
  </textarea></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Nome</span></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_Fantasia" id="Cli_Fantasia" value="" size="50" /></td>
  
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" colspan=""><span class="tabletitle">Razão Social</span></td>
<td align="left"><input type="text" class="swifttext" name="Cli_Nome" id="Cli_Nome" value="" size="50" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">I.E.</span></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_Inscricao" id="Cli_Inscricao" value="" size="30" /></td>
  </tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" colspan=""><span class="tabletitle">Contato</span></td>
<td align="left"><input type="text" class="swifttext" name="Cli_Contato" id="Cli_Contato" value="" size="30" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">CEP</span></td>
  <td align="left"><input  name="Cli_CEP" type="text" class="swifttext" id="Cli_CEP" onchange="document.Cliente.Cli_CepEnt.value=this.value;document.Cliente.Cli_CepCob.value=this.value;" onkeyup="if(this.value.length == 9){BuscaCEP(this.value);}" value="" size="30" maxlength="9" /> 
  <span class="tabletitle">Formato 00000-000</span></td>
  </tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Endere&ccedil;o</span></td>
  <td align="left"><input type="text" class="swifttext" onchange="document.Cliente.Cli_EndEnt.value=this.value; document.Cliente.Cli_EndCob.value=this.value;" name="Cli_Endereco" id="Cli_Endereco" value="" size="60" /></td>
  </tr>
  
  <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Numero</span></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_Numero" id="Cli_Numero" onchange="document.Cliente.Cli_NumEnt.value=this.value; document.Cliente.Cli_NumCob.value=this.value;"  value="<?=$sU[Cli_Numero]?>" size="30" /></td>
  </tr>
  <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Complemento</span></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_Complemento" onchange="document.Cliente.Cli_ComEnt.value=this.value; document.Cliente.Cli_ComCob.value=this.value;" value="<?=$sU[Cli_Complemento]?>" size="30" /></td>
  </tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Bairro</span></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_Bairro" onchange="document.Cliente.Cli_BaiEnt.value=this.value;document.Cliente.Cli_BaiCob.value=this.value;"  id="Cli_Bairro" value="" size="30" /></td>
  </tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Cidade</span></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_Cidade" onchange="document.Cliente.Cli_CidCob.value=this.value;document.Cliente.Cli_CidEnt.value=this.value;"  id="Cli_Cidade" value="" size="30" /></td>
  </tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Estado</span></td>
  <td align="left"><input name="Cli_UF" type="text" onblur="document.Cliente.Cli_UFEnt.value=this.value;document.Cliente.Cli_UFCob.value=this.value;FilialMaisProxima();" class="swifttext" id="Cli_UF" value="" size="5" maxlength="2" /></td>
  </tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Pais</span></td>
  <td align="left"><input name="Cli_Pais" type="text" class="swifttext" id="Cli_Pais" value="" size="30" /></td>
  <td align="left"><span class="tabletitle">CPF</span></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Telefone 1</span></td>
  <td align="left"><input name="dddtelefone1" type="text" class="swifttext" id="dddtelefone1" value="" size="3" maxlength="2" />
       <input name="Cli_Fone1" type="text" class="swifttext" id="Cli_Fone1" value="" size="30" maxlength="15" /></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_CPF" id="Cli_CPF" value="" size="30" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Telefone 2</span></td>
  <td align="left"><input name="dddtelefone2" type="text" class="swifttext" id="dddtelefone2" value="" size="3" maxlength="2" />
       <input name="Cli_Fone2" type="text" class="swifttext" id="Cli_Fone2" value="" size="30" maxlength="15" /></td>
  <td align="left"><span class="tabletitle">R.G.</span></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Telefone 3</span></td>
  <td align="left"><input name="dddtelefone3" type="text" class="swifttext" id="dddtelefone3" value="" size="3" maxlength="2" />
       <input name="Cli_Fone3" type="text" class="swifttext" id="Cli_Fone3" value="" size="30" maxlength="15" /></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_RG" id="Cli_RG" value="" size="30" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Fax</span></td>
  <td align="left"><input name="dddfax1" type="text" class="swifttext" id="dddfax1" value="" size="3" maxlength="2" />
       <input name="Cli_Fax1" type="text" class="swifttext" id="Cli_Fax1" value="" size="30" maxlength="15" /></td>
  <td align="left"><span class="tabletitle">Origem</span></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">E-mail</span></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_Email" id="Cli_Email" value="" size="30" /></td>
  <td align="left"><select name="idOrigem">
<option>Selecione a origem</option>
<?
$Sql = mysql_query("Select Ori_ID, Ori_Descricao from origens order by Ori_Descricao") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[Ori_ID]?>"><?=$dom[Ori_Descricao]?></option>
<? } ?>
</select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Website</span></td>
  <td align="left"><input type="text" class="swifttext" name="Cli_URL" id="Cli_URL" value="" size="30" /></td>
  <td align="left"><span class="tabletitle">&nbsp;Captador do Cliente</span></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" colspan=""><span class="tabletitle">Status</span></td>
  <td align="left"><input name="statusCliente" type="radio" id="radio" value="A" checked="checked" />
    <label for="radio">Ativo
    <input type="radio" name="statusCliente" id="radio2" value="I" />
    Inativo</label></td>
  <td align="left"><select name="idVendedor2" id="idVendedor2">
    <?
if($dl[tipoUsuario]=='V'){
	?>
    <option value="<?=$dl[id]?>" selected="selected">
      <?=$dl[nome]?>
      </option>
    <?
} else {

$Sql = mysql_query("Select id, nome from login order by nome") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
    <option value="<?=$dom[id]?>" <? if($dl[id]==$dom[id]){?>selected="selected"<? } ?>>
      <?=$dom[nome]?>
      </option>
    <? } } ?>
  </select></td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" colspan=""><span class="tabletitle">Classifica&ccedil;&atilde;o</span></td>
<td align="left"><select name="idClassificacao">
<option>Selecione a classificação</option>
<?
$Sql = mysql_query("Select Cla_ID, Cla_Descricao from classificacao order by Cla_Descricao") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[Cla_ID]?>"><?=$dom[Cla_Descricao]?></option>
<? } ?>
</select></td>
<td align="left"><span class="tabletitle">A&ccedil;&atilde;o Promocional</span></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" colspan=""><span class="tabletitle">Vendedor</span></td>
<td align="left"><select name="idVendedor" id="idVendedor">
<?
if($dl[tipoUsuario]=='V'){
	?>
  <option value="<?=$dl[id]?>" selected="selected"><?=$dl[nome]?></option>
  <?
} else {

$Sql = mysql_query("Select id, nome from login where (tipoUsuario='A') or (tipoUsuario='C') or (tipoUsuario='V') or (tipoUsuario='G')  order by nome") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[id]?>" <? if($dl[id]==$dom[id]){?>selected="selected"<? } ?>><?=$dom[nome]?></option>
<? } } ?>
</select></td>
<td align="left"><input type="text" class="swifttext" name="CODIGOACAO" id="CODIGOACAO" value="" size="30" /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" colspan=""><span class="tabletitle">Filial</span></td>
<td align="left"><select name="idFilial" id="idFilial">
<option>Selecione a filial</option>
<?
$Sql = mysql_query("Select ID_PATIO, NOME_PATIO from patio order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[ID_PATIO]?>"><?=$dom[NOME_PATIO]?></option>
<? } ?>
</select></td>
<td align="left"><span class="tabletitle">Data Entrega</span></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" colspan=""><span class="tabletitle">Perfil</span></td>
<td align="left"><select name="idPerfil" id="idPerfil">
<option>Selecione o perfil</option>
<?
$Sql = mysql_query("Select idPerfil, nomePerfil from perfil") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	?>
  <option value="<?=$dom[idPerfil]?>"><?=$dom[nomePerfil]?></option>
<? } ?>
</select></td>
<td align="left"><input name="DATAENTREGA" type="text" class="swifttext" id="DATAENTREGA" value="" size="20" maxlength="10" /></td>
</tr>
</table>
      </td>
</tr></tbody></table>
<br />
<table width="100%" cellpadding="0" cellspacing="0">
	<tr>
    <td>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
    <thead>
    <tr>
    <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
    <td class="tcat" width="100%" colspan="" align="left" nowrap>Endere&ccedil;o de Cobran&ccedil;a</td>
    </tr>
    </thead>
    <tbody><tr><td class="contenttableborder" colspan="2">
    <table border="0" cellpadding="3" cellspacing="1" width="100%" id="Cobranca">
    
    <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Endere&ccedil;o</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_EndEnt" value="<?=$sU[Cli_EndEnt]?>" size="60" /></td>
    </tr>
    <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Numero</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_NumEnt" value="<?=$sU[Cli_BaiEnt]?>" size="15" /></td>
    </tr>
    <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Complemento</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_ComEnt" value="" size="30" /></td>
    </tr>
    <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Bairro</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_BaiEnt" value="<?=$sU[Cli_BaiEnt]?>" size="30" /></td>
    </tr>
    <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">CEP</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_CepEnt" value="<?=$sU[Cli_CepEnt]?>" size="30" /></td>
    </tr>
    <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Cidade</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_CidEnt" value="<?=$sU[Cli_CidEnt]?>" size="30" /></td>
    </tr>
    <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Estado</span></td>
      <td align="left" colspan=""><input name="Cli_UFEnt" type="text" class="swifttext" value="<?=$sU[Cli_UFEnt]?>" size="5" maxlength="2" /></td>
    </tr>
    </table></td></tr></tbody></table>    </td> <td width="15"></td><td>
    
        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
    <thead>
    <tr>
    <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
    <td class="tcat" width="100%" colspan="" align="left" nowrap>Endere&ccedil;o de Faturamento</td>
    </tr>
    </thead>
    <tbody><tr><td class="contenttableborder" colspan="2">
    <table border="0" cellpadding="3" cellspacing="1" width="100%" id="Cobranca">
    
    <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Endere&ccedil;o</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_EndCob" id="enderecoCliente" value="<?=$sU[Cli_EndCob]?>" size="60" /></td>
    </tr>
    <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Numero</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_NumCob" id="bairroCliente" value="<?=$sU[Cli_BaiEnt]?>" size="15" /></td>
    </tr>
    <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Complemento</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_ComCob" id="bairroCliente" value="<?=$sU[Cli_BaiCob]?>" size="30" /></td>
    </tr>
    <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Bairro</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_BaiCob" id="bairroCliente" value="<?=$sU[Cli_BaiCob]?>" size="30" /></td>
    </tr>
    <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">CEP</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_CepCob" value="<?=$sU[Cli_CepCob]?>" size="30" /></td>
    </tr>
    <tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Cidade</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_CidCob" /></td>
    </tr>
    <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
      <td align="left" colspan=""><span class="tabletitle">Estado</span></td>
      <td align="left" colspan=""><input type="text" class="swifttext" name="Cli_UFCob" value="<?=$sU[Cli_UFCob]?>" size="5" maxlength="2" /></td>
    </tr>
    </table></td></tr></tbody></table>
    
    
    
    
    
    
    
    
    </td>
    </tr>
    </table><br /><center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerCliente"/>
<input type="hidden" name="step" value="1"/>

</form>
<script>
//$("#Cli_CGC").mask("99.999.999/9999-99");
$("#CODIGOACAO").mask("99.999.999");
$("#DATAENTREGA").mask("99/99/9999");
document.Cliente.Cli_CGC.focus();
</script>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managefiles" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=downloads&amp;_a=managecategories" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			