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
						<td width="100%"><span class="smalltext">&nbsp;Manager Medição &raquo; Cadastro de Horas</span></td>
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
						
						
<form name="frmObra" id="frmMedicao" action="index.php" method="POST" enctype="multipart/form-data">

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes da Proposta</td>
</tr>
</thead>
<tbody>
<tr>
<td class="contenttableborder" colspan="2">
<table border="0" cellpadding="3" cellspacing="1" width="100%" id="TabelaBase"><hr />

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle">Proposta</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="idProposta" value="" size="30" onblur="carregaContrato(this.value);"  /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Cliente</span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" name="cliente" id="idCliente" value="" size="30" style="width:90%;"/></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan=""><span class="tabletitle">Local da Obra<br />
</span></td>
<td align="center" valign="top" colspan=""><textarea name="endereco" rows="3" style="width:99%"></textarea></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Periodo</span></td>
  <td align="left" valign="top" colspan=""><input name="dtinicio" type="text" class="swifttext" value="" alt="data2" size="12" maxlength="10" /> a <input name="dtfinal" type="text" class="swifttext" alt="data2" value="" size="12" maxlength="10" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle">Tipo</span></td>
  <td align="left" valign="top" colspan=""><label><input type="radio" name="TIPOMEDICAO" value="E" />Equipamento</label><!--<label><input type="radio" name="TIPOMEDICAO" value="O" />Operador</label>--></td>
</tr>
</table></td></tr></tbody></table>
<br />
<center><input type="button" name="submitbutton" class="yellowbuttonbigbig" value="Carregar" onclick="FichaPeriodoEqptoMedicao()" /></center>


<div id="FormularioDeDias"></div>



<input type="hidden" name="_m" value="core"/>
<input type="hidden" name="_a" value="managerMedicao"/>
<input type="hidden" name="step" value="1"/>


</form>
					
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=downloads&_a=managerMedicao" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&amp;_a=managerMedicao" title="Back">&nbsp;Voltar 


</a></span></td>
						</tr></table>

					</tr>
									</table>
