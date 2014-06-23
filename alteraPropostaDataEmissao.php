<? include("Config.php");
$dt = explode('-',$_REQUEST[dt]);
$dat = $dt[2].'/'.$dt[1].'/'.$dt[0];
$dtSql = $_REQUEST[dt];
?>
<link rel="stylesheet" type="text/css" media="all" href="http://ecom.escad.com.br/staff/index.css" />
<img src="http://ecom.escad.com.br/themes/admin_default/logo.jpg" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="http://ecom.escad.com.br/themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;Movimentação de Proposta em <?=$dat;?></span></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr height="1">
						<td colspan="2" bgcolor="#CCCCCC"><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="1" width="1"></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr>
						<td colspan="2"><span class="smalltext"></span></td>
					</tr>

					<tr height="4">
						<td colspan="2"><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td colspan="2" align="center">


						
                        
                        <table cellpadding="0" cellspacing="0" border="0" width="95%" class="tborder">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Proposta Emitida</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2">
            

            
        <table border="0" cellpadding="3" cellspacing="1" width="100%">
        
        <? 
        
        //echo '--'.$Sql.$montaWhere.'--';
        $sqlUsuario = mysql_query("SELECT  `idCliente` ,  `dtcadProposta` 
FROM  `proposta` ") or die ("Could not connect to database: ".mysql_error());
        while ($sU = mysql_fetch_array($sqlUsuario)){
        $cor = ($coralternada++ %2 ? "row2" : "row1"); 
		$updateCliente = mysql_query("Update clientes set Cli_DataEmitido='".$sU[dtcadProposta]."' where Cli_ID='".$sU[idCliente]."' Limit 1"); 
        ?>
        <tr>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Numero</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cliente</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Vendedor</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Status</td>
        <td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
        <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>
        
        </tr>
        
        <tr id="trid1466" class="<?=$cor?>">
        <td colspan="" width="" align="center" valign="">&nbsp;<?=$sU[idCliente];?></td>
        <td colspan="" align="center">&nbsp;<?=$sU[Cli_Fantasia];?></td>
            <td colspan="" align="center">&nbsp;<?=$sU[nome];?></td>
            <td colspan="" align="center">
            <?
                switch($sU[statusProposta]){
                case 'N': echo 'Em aberto';break;
                case 'L': echo 'Não Confirmada';break;
                case 'C': echo 'Confirmada';break;
                case 'F': echo 'Finalizada';break;
                case 'T': echo 'Excluida';break;
                }
            ?></td>
            <td colspan="" align="center"><?=$sU[dtcadProposta];?></td>
            <td colspan="" width="" align="center" valign=""><a href="http://ecom.escad.com.br/Proposta/?p=<?=base64_encode($sU[idProposta])?>" target="_blank" title="Vizualizar">Visualizar</a> </td>
            </tr>
           
            <? } ?>
            
        </table>

            
</td>
</tr>
</tbody>
</table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="95%" class="tborder">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Proposta Confirmada</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2">
            

            
        <table border="0" cellpadding="3" cellspacing="1" width="100%">
        
        <? 
        
        //echo '--'.$Sql.$montaWhere.'--';
        $sqlUsuario = mysql_query("SELECT p.idProposta, c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, pa.nome, p.statusProposta, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, p.descricaoObra FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) where DATE_FORMAT(p.confirmaProposta,'%Y-%m-%d') = '".$dtSql."'") or die ("Could not connect to database: ".mysql_error());
        while ($sU = mysql_fetch_array($sqlUsuario)){
        $cor = ($coralternada++ %2 ? "row2" : "row1");  
        ?>
        <tr>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Numero</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cliente</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Vendedor</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Status</td>
        <td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
        <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>
        
        </tr>
        
        <tr id="trid1466" class="<?=$cor?>">
        <td colspan="" width="" align="center" valign="">&nbsp;<?=$sU[idProposta];?></td>
        <td colspan="" align="center">&nbsp;<?=$sU[Cli_Fantasia];?></td>
            <td colspan="" align="center">&nbsp;<?=$sU[nome];?></td>
            <td colspan="" align="center">
            <?
                switch($sU[statusProposta]){
                case 'N': echo 'Em aberto';break;
                case 'L': echo 'Não Confirmada';break;
                case 'C': echo 'Confirmada';break;
                case 'F': echo 'Finalizada';break;
                case 'T': echo 'Excluida';break;
                }
            ?></td>
            <td colspan="" align="center"><?=$sU[data];?></td>
            <td colspan="" width="" align="center" valign=""><a href="http://ecom.escad.com.br/Proposta/?p=<?=base64_encode($sU[idProposta])?>" target="_blank" title="Vizualizar">Visualizar</a> </td>
            </tr>
            <tr>
            <td colspan="6" class="<?=$cor?>"><b>Endereço:</b> <?=$sU[descricaoObra]?><br />
                <table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
                <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
                <td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Frete</b></td>
                </tr>
                <? $iEsql = mysql_query("Select pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$sU[idProposta]."' And pe.statusPe='A'") or die (mysql_error());
                  while($iE = mysql_fetch_array($iEsql)){
                $cor = ($coralternada++ %2 ? "row2" : "row1");	  
                  ?>
                  <tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
                <td align="center" nowrap>&nbsp;<?=$iE[nome1]?> <?=$iE[marca]?> <?=$iE[modelo]?> <?=$iE[categoria]?></td>
                <td align="center" nowrap>&nbsp;<?=$iE[qtdaPe]?></td>
                <td align="center" nowrap>&nbsp;R$ <?=number_format($iE[precoPe],2,',','.');?></td>
                <td align="center" nowrap><center><input type="checkbox" name="COMBUSTIVEL[]" disabled="disabled" value="S" id="cc<?=$iE[idPe]?>" <? if($iE[combustivelPe]=='S'){?> checked="checked"<? } ?>> <label for="cc<?=$iE[idPe]?>">R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?></label></center></td>
                <td align="center" nowrap><input type="checkbox" name="OPERADOR[]" value="S" disabled="disabled" id="co<?=$iE[idPe]?>" <? if($iE[operadorPe]=='S'){?> checked="checked"<? } ?>> <label for="co<?=$iE[idPe]?>">R$ <?=number_format($iE[valoroperadorPe],2,',','.');?></td>
                <td align="center" nowrap><input type="checkbox" name="SEGURO[]" value="S" disabled="disabled" id="cs<?=$iE[idPe]?>" <? if($iE[seguroPe]=='S'){?> checked="checked"<? } ?>> <label for="cs<?=$iE[idPe]?>">R$ <?=number_format($iE[valorseguroPe],2,',','.');?></label></center></td>
                <td align="center" nowrap><center>R$ <?=number_format($iE[fretePe],2,',','.');?></center></td>
                </tr>
                  <? }?>
                
                
                </table>
            
            
            
            </td>
            </tr>
            <? } ?>
            
        </table>

            
</td>
</tr>
</tbody>
</table>
<br />
<table cellpadding="0" cellspacing="0" border="0" width="95%" class="tborder">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="http://ecom.escad.com.br/themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Proposta Concluida</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2">
            

            
        <table border="0" cellpadding="3" cellspacing="1" width="100%">
        
        <? 
        
        //echo '--'.$Sql.$montaWhere.'--';
        $sqlUsuario = mysql_query("SELECT p.idProposta, c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, pa.nome, p.statusProposta, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, p.descricaoObra FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) where DATE_FORMAT(p.concluiProposta,'%Y-%m-%d') = '".$dtSql."'") or die ("Could not connect to database: ".mysql_error());
        while ($sU = mysql_fetch_array($sqlUsuario)){
        $cor = ($coralternada++ %2 ? "row2" : "row1");  
        ?>
        <tr>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Numero</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cliente</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Vendedor</td>
        <td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Status</td>
        <td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
        <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;</td>
        
        </tr>
        
        <tr id="trid1466" class="<?=$cor?>">
        <td colspan="" width="" align="center" valign="">&nbsp;<?=$sU[idProposta];?></td>
        <td colspan="" align="center">&nbsp;<?=$sU[Cli_Fantasia];?></td>
            <td colspan="" align="center">&nbsp;<?=$sU[nome];?></td>
            <td colspan="" align="center">
            <?
                switch($sU[statusProposta]){
                case 'N': echo 'Em aberto';break;
                case 'L': echo 'Não Confirmada';break;
                case 'C': echo 'Confirmada';break;
                case 'F': echo 'Finalizada';break;
                case 'T': echo 'Excluida';break;
                }
            ?></td>
            <td colspan="" align="center"><?=$sU[data];?></td>
            <td colspan="" width="" align="center" valign=""><a href="http://ecom.escad.com.br/Proposta/?p=<?=base64_encode($sU[idProposta])?>" target="_blank" title="Vizualizar">Visualizar</a> </td>
            </tr>
            <tr>
            <td colspan="6" class="<?=$cor?>"><b>Endereço:</b> <?=$sU[descricaoObra]?><br />
                <table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
                <tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
                <td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
                <td width="10%" align="center" nowrap><b>&nbsp;Frete</b></td>
                </tr>
                <? $iEsql = mysql_query("Select pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$sU[idProposta]."' And pe.statusPe='A'") or die (mysql_error());
                  while($iE = mysql_fetch_array($iEsql)){
                $cor = ($coralternada++ %2 ? "row2" : "row1");	  
                  ?>
                  <tr class="<?=$cor?>" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
                <td align="center" nowrap>&nbsp;<?=$iE[nome1]?> <?=$iE[marca]?> <?=$iE[modelo]?> <?=$iE[categoria]?></td>
                <td align="center" nowrap>&nbsp;<?=$iE[qtdaPe]?></td>
                <td align="center" nowrap>&nbsp;R$ <?=number_format($iE[precoPe],2,',','.');?></td>
                <td align="center" nowrap><center><input type="checkbox" name="COMBUSTIVEL[]" disabled="disabled" value="S" id="cc<?=$iE[idPe]?>" <? if($iE[combustivelPe]=='S'){?> checked="checked"<? } ?>> <label for="cc<?=$iE[idPe]?>">R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?></label></center></td>
                <td align="center" nowrap><input type="checkbox" name="OPERADOR[]" value="S" disabled="disabled" id="co<?=$iE[idPe]?>" <? if($iE[operadorPe]=='S'){?> checked="checked"<? } ?>> <label for="co<?=$iE[idPe]?>">R$ <?=number_format($iE[valoroperadorPe],2,',','.');?></td>
                <td align="center" nowrap><input type="checkbox" name="SEGURO[]" value="S" disabled="disabled" id="cs<?=$iE[idPe]?>" <? if($iE[seguroPe]=='S'){?> checked="checked"<? } ?>> <label for="cs<?=$iE[idPe]?>">R$ <?=number_format($iE[valorseguroPe],2,',','.');?></label></center></td>
                <td align="center" nowrap><center>R$ <?=number_format($iE[fretePe],2,',','.');?></center></td>
                </tr>
                  <? }?>
                
                
                </table>
            
            
            
            </td>
            </tr>
            <? } ?>
            
        </table>

            
</td>
</tr>
</tbody>
</table>

</td>
</tr>
</table>
<br />
