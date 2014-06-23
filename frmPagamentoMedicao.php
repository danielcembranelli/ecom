<?
include("Config.php");
header("Content-type: application/html;charset=iso-8859-1");

$Sql = "SELECT DATE_FORMAT(m.dtnotafiscalMedicao,'%d/%m/%Y') as dtnotafiscal, p.idCliente, m.nrnotafiscalMedicao, DATE_FORMAT(m.inicioMedicao,'%d/%m/%Y') as dtinicio, DATE_FORMAT(m.finalMedicao,'%d/%m/%Y') as dtfinal, p.descricaoObra, m.idMedicao, DATE_FORMAT(m.dtMedicao,'%d/%m/%Y') as dtmedicao, pa.nome,  m.idProposta, m.statusMedicao, m.tipoMedicao, m.vlhoraseqptoMedicao, m.vlcustoMedicao, m.vldescontoMedicao, DATE_FORMAT(m.dtaprovacaoMedicao,'%d/%m/%Y') as dtaprovacao, DATE_FORMAT(m.dtvencimentoMedicao,'%d/%m/%Y') as dtvencimento, c.Cli_Fantasia FROM medicao m inner join proposta p on (p.idProposta=m.idProposta) left join clientes c on (p.idCliente=c.Cli_ID)  left join login pa on (p.idUsuario=pa.id) where idMedicao='".$_REQUEST[idMedicao]."'";
$mS = mysql_query($Sql);
$M = mysql_fetch_array($mS);
?>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type="text/javascript" src="libEcom.js"></script>
<script type="text/javascript" src="js/meiomask.js"></script>
<script type="text/javascript" src="js/mascara_input.js"></script>

<form name="frTestaMensagem" action="index.php" method="post">
<input type="hidden" name="_m" value="core"/> 
<input type="hidden" name="_a" value="managerMedicao"/> 
<input type="hidden" name="step" value="7"/> 
<input type="hidden" name="idMedicao" value="<?=$_REQUEST[idMedicao]?>"/> 
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap><?=utf8_decode('Confirmar Pagamento');?></td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2">
            

            
        <table border="0" cellpadding="3" cellspacing="1" width="100%">

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" width="50%" colspan=""><span class="tabletitle"><?=utf8_decode('Data Emissão NF')?></span></td>
  <td align="left" valign="top" colspan=""><input name="dtnotafiscal" type="text" readonly="readonly" class="swifttext" value="<?=$M[dtnotafiscal]?>" alt="data2" size="12" maxlength="10" /></td>
</tr>
<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td align="left" valign="top" colspan="" width="25%"><span class="tabletitle"><?=utf8_decode('Nº Nota Fiscal')?></span></td>
<td align="left" valign="top" colspan=""><input type="text" class="swifttext" readonly="readonly" name="nrnotafiscal" value="<?=$M[nrnotafiscalMedicao]?>" size="15"  /></td>
</tr>
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle"><?=utf8_decode('Data de Vencimento')?></span></td>
  <td align="left" valign="top" colspan=""><input name="dtvencimento" type="text" readonly="readonly" class="swifttext" value="<?=$M[dtvencimento]?>" alt="data2" size="12" maxlength="10" /></td>
</tr>

<tr class="row1" title="" onmouseover="" onmouseout="" onclick="" style="">
  <td align="left" valign="top" colspan=""><span class="tabletitle"><?=utf8_decode('Data de Pagamento')?></span></td>
  <td align="left" valign="top" colspan=""><input name="dtpagamento" type="text" class="swifttext" value="" alt="data2" size="12" maxlength="10" /></td>
</tr>

        </table>

            
</td>
</tr>
<tr>
	<td colspan="2" height="50">
    <center><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Baixar" /></center>
    </td>
</tr>
</tbody>
</table>
</form>