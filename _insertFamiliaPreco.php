
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=teamwork&_a=managerFamiliaPreco" title="Manager Família Preço">Manager Família Preço</a> &raquo; <a href="index.php?_m=teamwork&amp;_a=insertFamiliaPreco" title="Inserir Família Preço">Novo Preço</a></span></td>
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
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Preço</td>
</tr>
</thead>
<tbody>
<tr><td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Familia</span></td>
<td align="left" valign="top" colspan="" width="50%"><select name="familia" id="itemmenu">
 <option value="0">Selecione a familia master</option>
<? $sqlUsuario = mysql_query("SELECT id, L.nomeLegenda as nome, L2.nomeLegenda as marca, L1.nomeLegenda as categoria FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
?>
      <option value="<?=$sU[id]?>"<? if($_REQUEST[familia]==$sU[id]){?>selected="selected"<? } ?>><?=$sU[nome]?> <?=$sU[marca]?> <?=$sU[categoria]?></option>
      <? }?>
    </select></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Legenda</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="legenda" value="" size="30" style="width:90%;" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Data Inicial</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" name="dtinicial" id="f_date_c" size="12" readonly="1" value="<?=date("d/m/Y")?>" class="swifttext"/>
 &nbsp;<img src="themes/admin_default/calendar.gif" id="f_trigger_c" style="cursor: pointer;" title="" align="absmiddle"/></span>
  	<script type="text/javascript">
    Calendar.setup({
        inputField     :    "f_date_c",
        button         :    "f_trigger_c",
        ifFormat       :    "%d/%m/%Y",
        align          :    "Tl",        singleClick    :    true
    });
		isTicketPage = true;
		ticketPageTicketID = "1243";
		ticketPageTicketEmail = "alexquiambao@gmail.com";
	</script></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Data Final</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" name="dtfinal" id="f_date_d" size="12" readonly="1" value="" class="swifttext"/>
 &nbsp;<img src="themes/admin_default/calendar.gif" id="f_trigger_d" style="cursor: pointer;" title="" align="absmiddle"/></span>
  	<script type="text/javascript">
    Calendar.setup({
        inputField     :    "f_date_d",
        button         :    "f_trigger_d",
        ifFormat       :    "%d/%m/%Y",
        align          :    "Tl",        singleClick    :    true
    });
		isTicketPage = true;
		ticketPageTicketID = "1243";
		ticketPageTicketEmail = "alexquiambao@gmail.com";
	</script></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Preço 1</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="preco1" id="preco1" value="" size="10" /> /h</td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Preço 2</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="preco2" id="preco2" value="" size="10" /> /h</td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Preço 3</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="preco3" id="preco3" value="" size="10" /> /h</td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Preço Mínimo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" class="swifttext" name="minimo" id="minimo" value="" size="10" /> /h</td>
</tr>


</table></td></tr></tbody></table>
<br />
<script>
$('#preco1').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: ''
});
$('#preco2').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: ''
}); 
$('#preco3').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: ''
}); 
$('#minimo').priceFormat({
    prefix: 'R$ ',
    centsSeparator: ',',
    thousandsSeparator: ''
}); 
</script>
<center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></center>
<input type="hidden" name="_m" value="teamwork"/>
<input type="hidden" name="_a" value="managerFamiliaPreco"/>
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
			