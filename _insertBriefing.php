				<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="index.php?_m=ate&_a=managerBriefing" title="Manager Briefing">Manager Briefing </a> &raquo; <a href="index.php?_m=ate&amp;_a=insertBriefing" title="Insert File">Inserir Briefing </a></span></td>
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
						
						<form name="downloadfileform" id="downloadfileform" action="index.php" method="POST" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Briefing</td>
</tr>
</thead>
<tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Cliente</span></td>
<td align="left" valign="top" colspan="" width="">
<SELECT name="idCliente" class="swiftselect">
<? 
$sqlCliente = mysql_query("Select idCadastro, nomeCadastro from cadastro where telaCadastro = 'C' order by nomeCadastro");
while ($sC = mysql_fetch_array($sqlCliente)){ 
?>
   <OPTION value="<?=$sC[idCadastro]?>"><?=$sC[nomeCadastro]?></OPTION>
<? } ?>   
</SELECT></td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Job</span></td>
<td align="left" valign="top" colspan="" width="">
<SELECT name="idJob" class="swiftselect">
<? 
$sqlJob = mysql_query("Select idJob, tituloJob from job order by idJob");
while ($sJ = mysql_fetch_array($sqlJob)){ 
?>
   <OPTION value="<?=$sJ[idJob]?>"> Job nº <?=$sJ[idJob]?> (<?=$sJ[tituloJob]?>)</OPTION>
<? } ?>   
   <OPTION value="NOVO" selected="selected"> Novo Job</OPTION>
</SELECT></td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Produto</span></td>
<td align="left" valign="top" colspan="" width="">
<SELECT name="idProduto" class="swiftselect">
<? 
$sqlProduto = mysql_query("Select idProduto, nomeProduto from produto order by nomeProduto");
while ($sP = mysql_fetch_array($sqlProduto)){ 
?>
   <OPTION value="<?=$sP[idProduto]?>"><?=$sP[nomeProduto]?></OPTION>
<? } ?>   
</SELECT></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Entrada</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" name="Data" id="f_date_c" size="12" readonly="1" value="<?=date("d/m/Y")?>" class="swifttext"/>&nbsp;<img src="themes/admin_default/calendar.gif" id="f_trigger_c" style="cursor: pointer;" title="" align="absmiddle"/></span>
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

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Prazo</span></td>
<td align="left" valign="top" colspan="" width="50%"><input type="text" name="Data2" id="f_date_b" size="12" readonly="1" class="swifttext"/>&nbsp;<img src="themes/admin_default/calendar.gif" id="f_trigger_b" style="cursor: pointer;" title="" align="absmiddle"/></span>
  	<script type="text/javascript">
    Calendar.setup({
        inputField     :    "f_date_b",
        button         :    "f_trigger_b",
        ifFormat       :    "%d/%m/%Y",
        align          :    "Tl",        singleClick    :    true
    });
		isTicketPage = true;
		ticketPageTicketID = "1243";
		ticketPageTicketEmail = "alexquiambao@gmail.com";
	</script></td>
</tr>
<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="40%">PRINCIPAL DIFERENCIAL A SER EXPLORADO (Descrição/Propriedades/Histórico)</td>
</tr>

<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="top" colspan="6"><label for="yperm[perm_canviewregister]">
  <textarea name="descBrifing" cols="100" rows="7" id="descBrifing" style="WIDTH:99%;" tabindex="99" onselect="javascript:storeCaret(this);" onclick="javascript:storeCaret(this);" onkeyup="javascript:storeCaret(this);"></textarea>
</label></td>
</tr>

<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="40%">OBJETIVO/ PROBLEMA A SER RESOLVIDO</td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="top" colspan="6"><label for="yperm[perm_canviewregister]">
  <textarea name="objBrifing" cols="100" rows="7" id="objBrifing" style="WIDTH:99%;" tabindex="99" onselect="javascript:storeCaret(this);" onclick="javascript:storeCaret(this);" onkeyup="javascript:storeCaret(this);"></textarea>
</label></td>
</tr>

<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="40%">PÚBLICO-ALVO (Grupo de idade/sexo/nível de renda/posição social e cultural/nível de escolaridade/localização)</td>
</tr>

<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="top" colspan="6"><label for="yperm[perm_canviewregister]">
  <textarea name="publicBrifing" cols="100" rows="7" id="publicBrifing" style="WIDTH:99%;" tabindex="99" onselect="javascript:storeCaret(this);" onclick="javascript:storeCaret(this);" onkeyup="javascript:storeCaret(this);"></textarea>
</label></td>
</tr>

<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="40%">CONCORRÊNCIA DIRETA E INDIRETA (Vantagens e desvantagens relativas à concorrência/imagem de cada um/objetivos/estratégias de marketing)</td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="top" colspan="6"><label for="yperm[perm_canviewregister]">
  <textarea name="concBrifing" cols="100" rows="7" id="concBrifing" style="WIDTH:99%;" tabindex="99" onselect="javascript:storeCaret(this);" onclick="javascript:storeCaret(this);" onkeyup="javascript:storeCaret(this);"></textarea>
</label></td>
</tr>

<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="40%">INSTRUÇÕES ESPECÍFICAS/OBRIGATORIEDADES (Pontos obrigatórios a serem destacados ou evitados)</td>
</tr>

<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="top" colspan="6"><label for="yperm[perm_canviewregister]">
  <textarea name="instBrifing" cols="100" rows="7" id="instBrifing" style="WIDTH:99%;" tabindex="99" onselect="javascript:storeCaret(this);" onclick="javascript:storeCaret(this);" onkeyup="javascript:storeCaret(this);"></textarea>
</label></td>
</tr>

<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="40%">ESTRATÉGIA (Comunicação sugerida/Regiões/Segmentos/Sugestão Approach criativo/Veículos sugeridos/Estilo da empresa (linha, marca) a ser seguido)</td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="top" colspan="6"><label for="yperm[perm_canviewregister]">
  <textarea name="estrBrifing" cols="100" rows="7" id="estrBrifing" style="WIDTH:99%;" tabindex="99" onselect="javascript:storeCaret(this);" onclick="javascript:storeCaret(this);" onkeyup="javascript:storeCaret(this);"></textarea>
</label></td>
</tr>

<tr class="tcat" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="left" valign="top" colspan="6" width="40%">OBSERVAÇÕES (Oportunidades que facilitam atingir os objetivos/Influências geográficas, sazonais, demográficas) </td>
</tr>

<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="top" colspan="6"><label for="yperm[perm_canviewregister]">
  <textarea name="obsBrifing" cols="100" rows="7" id="obsBrifing" style="WIDTH:99%;" tabindex="99" onselect="javascript:storeCaret(this);" onclick="javascript:storeCaret(this);" onkeyup="javascript:storeCaret(this);"></textarea>
</label></td>
</tr>



<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="row1" align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Salvar" /></td>
</tr>
</table></td></tr></tbody></table>
<input type="hidden" name="_m" value="form"/>
<input type="hidden" name="_a" value="managerBriefing"/>
<input type="hidden" name="step" value="1"/>

</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=ate&_a=managerBriefing" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=ate&_a=managerBriefing" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>
			