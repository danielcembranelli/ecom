<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />
<body>

<?

$idVendedor = $_POST[idVendedor];
$dtInicial = dataSql($_POST[dtInicial]);
$dtFinal = dataSql($_POST[dtFinal]);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr height="8">
        <td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
    </tr>
    <tr>
        <td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
        <td width="100%"><span class="smalltext">&nbsp;AVALIAÇÃO DE ATUAÇÃO COMERCIAL NO PERÍODO</span></td>
    </tr>
    <tr height="4">
        <td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
    </tr>
    <tr height="1">
        <td colspan="2" bgcolor="#CCCCCC"><img src="themes/admin_default/space.gif" height="1" width="1"></td>
    </tr>
    <tr>
<td colspan="2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
    
    <table width="100%" border="0" cellspacing="3">
    <tr>
        <td width="50%">
    <!--Visistas-->    
        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Relacionamento Comercial</td>
                        </tr>
                        </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
            
            <tr>
            <td class="tabletitlerow" width="40%" align="center" colspan="2" nowrap>&nbsp;Carteira Atual</td>
            <td class="tabletitlerow" width="60%" align="center" colspan="3" nowrap>&nbsp;Visitas no Periodo</td>
            </tr>
            <?
			$SqlCA = mysql_query("Select count(*) as total from clientes where idVendedor='".$idVendedor."' And dtcadCli between '".$dtInicial." 00:00:01' and '".$dtFinal." 23:59:59' And Cli_Status!='E'") or die (mysql_error());
			$sCA = mysql_fetch_array($SqlCA);
			
			$SqlCT = mysql_query("Select count(*) as total from clientes where idVendedor='".$idVendedor."' And Cli_Status!='E'") or die (mysql_error());
			$sCT = mysql_fetch_array($SqlCT);
			
			$SqlVN = mysql_query("Select count(*) as total from relacionamento_cliente rc inner join clientes c on (c.Cli_ID=rc.idCliente) where rc.idVendedor='".$idVendedor."' And rc.dtRc between '".$dtInicial."' and '".$dtFinal."' And statusRc!='E' And c.dtcadCli between '".$dtInicial." 00:00:01' and '".$dtFinal." 23:59:59' And c.Cli_Status!='E'") or die (mysql_error());
			$sVN = mysql_fetch_array($SqlVN);

			$SqlVC = mysql_query("Select count(*) as total from relacionamento_cliente rc inner join clientes c on (c.Cli_ID=rc.idCliente) where rc.idVendedor='".$idVendedor."' And rc.dtRc between '".$dtInicial."' and '".$dtFinal."' And statusRc!='E' And c.dtcadCli < '".$dtInicial." 00:00:01' And c.Cli_Status!='E'") or die (mysql_error());
			$sVC = mysql_fetch_array($SqlVC);
			?>
            <tr id="trid1466" class="row1">
            <td width="20%" colspan="" align="center"><span class="tabletitle">Periodo</span></td>
            <td colspan="" align="center"><?=$sCA[total]?></td>
            <td colspan="" align="center"><span class="tabletitle">Total</span></td>
            <td colspan="" align="center"><span class="tabletitle">Novos</span></td>
            <td colspan="" align="center"><span class="tabletitle">Carteira</span></td>
            </tr>
            <tr class="row2">
              <td colspan="" align="center"><span class="tabletitle">Acumulada</span></td>
              <td colspan="" align="center"><?=$sCT[total]?></td>
              <td colspan="" align="center"><?=($sVN[total]+$sVC[total])?></td>
              <td colspan="" align="center"><?=$sVN[total]?></td>
              <td colspan="" align="center"><?=$sVC[total]?></td>
          </tr>        
                        </table>
            </td></tr></tbody></table>
        
    <!-- Fim Visitas-->    
        </td>
        <td width="50%">
    
    <!--Emissão de Proposta-->
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Emissão de Proposta</td>
                        </tr>
                        </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
            
            <tr>
            
            <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Emitidas</td>
            <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Confirmadas</td>
            <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Não Confirmadas</td>
            <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Em Aberto</td>
            <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Concluidas</td>
            
            </tr>
            <? 
            $montaWhere = "SELECT p.idVendedor,l.nome, count(*) as total FROM proposta p inner join login l on (l.id=p.idVendedor) ";
            $montaWhere .= " And p.idVendedor='".$idVendedor."'";
            $montaWhere .= "where p.dtcadProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";
            $montaWhere .= " And statusProposta!='T' group by idVendedor";
            
            $sqlUsuario = mysql_query($montaWhere) or die ("Could not connect to database: ".mysql_error());
            while ($sU = mysql_fetch_array($sqlUsuario)){
            $cor = ($coralternada++ %2 ? "row2" : "row1");  
            ?>
            
            <tr id="trid1466" class="<?=$cor?>" height="40">
           
            <td colspan="" align="center">&nbsp;<?=$sU[total];?></td>
            <td colspan="" align="center">&nbsp;<?
            $sl = "SELECT count(*) as confirma FROM proposta p where idVendedor='".$sU[idVendedor]."' And statusProposta!='T'";
            $sl .= " And p.confirmaProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";
            $SqlC = mysql_query($sl);
            $sC = mysql_fetch_array($SqlC);
            echo $sC[confirma];?></td>
            <td colspan="" align="center">&nbsp;<?
            $sl = "SELECT count(*) as confirma FROM proposta p where idVendedor='".$sU[idVendedor]."' And statusProposta='L'";
            $sl .= " And p.dtcancelaProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";
            
            $SqlC = mysql_query($sl);
            $sC = mysql_fetch_array($SqlC);
            echo $sC[confirma];?></td>
            <td colspan="" align="center">&nbsp;<?
            $sl = "SELECT count(*) as confirma FROM proposta p where idVendedor='".$sU[idVendedor]."' And statusProposta='N'";
            $sl .= " And p.dtcadProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";
            
            $SqlC = mysql_query($sl);
            $sC = mysql_fetch_array($SqlC);
            echo $sC[confirma];?></td>
            <td colspan="" align="center">&nbsp;<?
            $sc = "SELECT count(*) as conclui FROM proposta p where idVendedor='".$sU[idVendedor]."' And statusProposta!='T'";
            $sc .= " And p.concluiProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";
            $SqlC = mysql_query($sc);
            
            $sC = mysql_fetch_array($SqlC);
            echo $sC[conclui];?></td>
            
            </tr>
            <? } ?>
            
            
            </table>
            
            </td></tr></tbody></table>
    <!--FIM DE EMISSAO DE PROPOSTA-->
            </td>
            </tr>
            </table>
    
    
    
    
    
    </td>       
    </tr>
    </table>
</td>
</tr>
    <tr height="8">
        <td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
    </tr>
    <tr>
        <td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
        <td width="100%"><span class="smalltext">&nbsp;AVALIAÇÃO DE RESULTADO COMERCIAL HISTÓRICO</span></td>
    </tr>
        <tr height="4">
        <td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
    </tr>
    <tr height="1">
        <td colspan="2" bgcolor="#CCCCCC"><img src="themes/admin_default/space.gif" height="1" width="1"></td>
    </tr>
    <tr>
<td colspan="2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
    
    <table width="100%" border="0" cellspacing="3">
    <tr>
        <td width="50%">
    <!--Visistas--> 
    <?
	$SqlOA = mysql_query("SELECT count(*) as total FROM proposta p inner join obra o on (o.idProposta=p.idProposta) where (p.idVendedor='".$idVendedor."' And o.inicio<='".$dtFinal."' And o.fim='' And o.status='a') or (p.idVendedor='".$idVendedor."' And o.fim >= '".$dtFinal."' And o.status='b')");
	$sOA = mysql_fetch_array($SqlOA);
	$SqlON = mysql_query("SELECT count(*) as total FROM proposta p inner join obra o on (o.idProposta=p.idProposta) where (p.idVendedor='".$idVendedor."' And o.inicio<='".$dtFinal."' And o.fim='' And o.status='a') or (p.idVendedor='".$idVendedor."' And o.inicio<='".$dtFinal."' And o.fim >= '".$dtFinal."' And o.status='b')");
	$sON = mysql_fetch_array($SqlON);
	$SqlOI = mysql_query("SELECT count(*) as total FROM proposta p inner join obra o on (o.idProposta=p.idProposta) where p.idVendedor='".$idVendedor."' And o.inicio between '".$dtInicial."' and '".$dtFinal."'") or die (mysql_error());
	$sOI = mysql_fetch_array($SqlOI);
	$SqlOF = mysql_query("SELECT count(*) as total FROM proposta p inner join obra o on (o.idProposta=p.idProposta) where p.idVendedor='".$idVendedor."' And o.fim between '".$dtInicial."' and '".$dtFinal."'") or die (mysql_error());
	$sOF = mysql_fetch_array($SqlOF);
	?>
       
        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Resultado em Obras</td>
                        </tr>
                        </thead><tbody><tr>
                          <td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
            
            <tr>
              <td width="25%" colspan="" rowspan="3" align="center" class="row1"><span class="tabletitle">Obras em Andamento</span><span class="tabletitle"></span></td>
              <td width="20%" colspan="" rowspan="3" align="center" class="row2"><?=$sOA[total]?></td>
              <td width="25%" colspan="" align="center" class="row1"><span class="tabletitle">Anterior</span></td>
              <td width="30%" colspan="" align="center" class="row2"><?=$sON[total]?></td>
              </tr>
            <tr class="row2">
              <td colspan="" align="center" class="row1"><span class="tabletitle">Iniciada</span></td>
              <td colspan="" align="center" class="row2"><?=$sOI[total]?></td>
              </tr>
            <tr class="row1">
              <td colspan="" align="center" class="row1"><span class="tabletitle">Finalizada</span></td>
              <td colspan="" align="center" class="row2"><?=$sOF[total]?></td>
              </tr>        
           </table>
            </td></tr></tbody></table>
        
    <!-- Fim Visitas-->    
        </td>
        <td width="50%">
    
    <!--Emissão de Proposta-->
    <?
	$SqlEA = mysql_query("SELECT count(*) as total FROM proposta p inner join obra o on (o.idProposta=p.idProposta) left join equipamento_obra eo on (eo.obra=o.id) where (p.idVendedor='".$idVendedor."' And eo.inicio<='".$dtFinal."' And eo.fim='' And eo.status='a') or (p.idVendedor='".$idVendedor."' And eo.fim >= '".$dtFinal."' And eo.status='b')");
	$sEA = mysql_fetch_array($SqlEA);
	$SqlEN = mysql_query("SELECT count(*) as total FROM proposta p inner join obra o on (o.idProposta=p.idProposta) left join equipamento_obra eo on (eo.obra=o.id) where (p.idVendedor='".$idVendedor."' And eo.inicio<='".$dtFinal."' And eo.fim='' And eo.status='a') or (p.idVendedor='".$idVendedor."' And eo.inicio<='".$dtFinal."' And eo.fim >= '".$dtFinal."' And eo.status='b')");
	$sEN = mysql_fetch_array($SqlEN);
	$SqlEI = mysql_query("SELECT count(*) as total FROM proposta p inner join obra o on (o.idProposta=p.idProposta) left join equipamento_obra eo on (eo.obra=o.id) where p.idVendedor='".$idVendedor."' And eo.inicio between '".$dtInicial."' and '".$dtFinal."'") or die (mysql_error());
	$sEI = mysql_fetch_array($SqlEI);
	$SqlEF = mysql_query("SELECT count(*) as total FROM proposta p inner join obra o on (o.idProposta=p.idProposta) left join equipamento_obra eo on (eo.obra=o.id) where p.idVendedor='".$idVendedor."' And eo.fim between '".$dtInicial."' and '".$dtFinal."'") or die (mysql_error());
	$sEF = mysql_fetch_array($SqlEF);
	?>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Resultado em Equipamentos</td>
                        </tr>
                        </thead><tbody><tr>
                          <td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
            
            <tr>
              <td width="25%" colspan="" rowspan="3" align="center" class="row1"><span class="tabletitle">Eqptos Operando</span><span class="tabletitle"></span></td>
              <td width="20%" colspan="" rowspan="3" align="center" class="row2"><?=$sEA[total]?></td>
              <td width="25%" colspan="" align="center" class="row1"><span class="tabletitle">Anterior</span></td>
              <td width="30%" colspan="" align="center" class="row2"><?=$sEN[total]?></td>
              </tr>
            <tr class="row2">
              <td colspan="" align="center" class="row1"><span class="tabletitle">Iniciada</span></td>
              <td colspan="" align="center" class="row2"><?=$sEI[total]?></td>
              </tr>
            <tr class="row1">
              <td colspan="" align="center" class="row1"><span class="tabletitle">Finalizada</span></td>
              <td colspan="" align="center" class="row2"><?=$sEF[total]?></td>
              </tr>      
           </table>
            </td></tr></tbody></table>
    <!--FIM DE EMISSAO DE PROPOSTA-->
            </td>
            </tr>
            </table>
    
    
    
    
    
    </td>       
    </tr>
    </table>
</td>
</tr>

    <tr>
<td colspan="2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>
    
    <table width="100%" border="0" cellspacing="3">
    <tr>
        <td width="50%">
    <!--Visistas--> 
    <?
	$SqlPE = mysql_query("Select AVG(pe.precoPe) as Med, SUM(pe.qtdaPe) as qtda from proposta_equipamento pe inner join proposta p on (pe.idProposta=p.idProposta) where (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='C' And pe.statusPe='A') or (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='F' And pe.statusPe='A') group by p.idVendedor") or die (mysql_error());
	$sPE = mysql_fetch_array($SqlPE);
	
	$SqlPC = mysql_query("Select  AVG(pe.valorcombustivelPe) as Med, count(*) as qtda from proposta_equipamento pe inner join proposta p on (pe.idProposta=p.idProposta) where (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='C' And pe.statusPe='A' And pe.combustivelPe='S') or (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='F' And pe.statusPe='A' And pe.combustivelPe='S') group by p.idVendedor") or die (mysql_error());
	$sPC = mysql_fetch_array($SqlPC);
	$SqlPO = mysql_query("Select  AVG(pe.valoroperadorPe) as Med, count(*) as qtda from proposta_equipamento pe inner join proposta p on (pe.idProposta=p.idProposta) where (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='C' And pe.statusPe='A' And pe.operadorPe='S') or (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='F' And pe.statusPe='A' And pe.operadorPe='S') group by p.idVendedor") or die (mysql_error());
	$sPO = mysql_fetch_array($SqlPO);
	$SqlPS = mysql_query("Select  AVG(pe.valorseguroPe) as Med, count(*) as qtda from proposta_equipamento pe inner join proposta p on (pe.idProposta=p.idProposta) where (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='C' And pe.statusPe='A' And pe.seguroPe='S') or (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='F' And pe.statusPe='A' And pe.seguroPe='S') group by p.idVendedor") or die (mysql_error());
	$sPS = mysql_fetch_array($SqlPS);
	$SqlPF = mysql_query("Select  AVG(pe.fretePe) as Med, AVG(pe.fretedPe) as Med2, count(*) as qtda from proposta_equipamento pe inner join proposta p on (pe.idProposta=p.idProposta) left join proposta_clausula pc on (pc.idProposta=p.idProposta) left join legendas l on (pc.idLegenda=l.idLegenda) left join clausulas c on (c.idClausula=pc.idClausula) where (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='C' And pe.statusPe='A' And l.idLegenda='634' And c.responsavelClausula='E') or (p.idVendedor='".$idVendedor."' And p.dtcadProposta between '".$dtInicial."' and '".$dtFinal."' And p.statusProposta='F' And pe.statusPe='A' And l.idLegenda='634' And c.responsavelClausula='E') group by p.idVendedor") or die (mysql_error());
	$sPF = mysql_fetch_array($SqlPF);
	?>
       
        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
            <thead>
                        <tr>
                        <td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
                        <td class="tcat" width="100%" colspan="" align="left" nowrap>Efetiva&ccedil;&atilde;o de Vendas</td>
                        </tr>
                        </thead><tbody><tr>
                          <td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
            
            <tr>
            <td class="tabletitlerow" width="40%" align="center" colspan="2" nowrap>&nbsp;Produtos</td>
            <td class="tabletitlerow" width="20%" align="center" nowrap>&nbsp;Total Neg.</td>
            <td width="40%" colspan="2" align="center" nowrap class="tabletitlerow">&nbsp;Preço Médio</td>
            </tr>
            <tr class="row1">
            <td width="20%" colspan="" align="center"><span class="tabletitle">Loca&ccedil;&atilde;o</span></td>
            <td colspan="" align="center">Eqptos/Aces.</td>
            <td colspan="" align="center"><?=number_format($sPE[qtda])?></td>
            <td colspan="2" align="center">R$ <?=number_format($sPE[Med],2,',','.')?></td>
            </tr>
            <tr class="row2">
              <td colspan="" rowspan="4" align="center"><span class="tabletitle">Servi&ccedil;o</span></td>
              <td colspan="" align="center">Frete</td>
              <td colspan="" align="center"><?=number_format($sPF[qtda])?></td>
              <td align="center">R$ <?=number_format($sPF[Med],2,',','.')?></td>
              <td align="center">R$ <?=number_format($sPF[Med2],2,',','.')?></td>
              </tr>
            <tr class="row1">
              <td colspan="" align="center">Seguro</td>
              <td colspan="" align="center"><?=number_format($sPS[qtda])?></td>
            <td colspan="2" align="center">R$ <?=number_format($sPS[Med],2,',','.')?></td>
              </tr>
            <tr class="row2">
              <td colspan="" align="center">Operador</td>
              <td colspan="" align="center"><?=number_format($sPO[qtda])?></td>
            <td colspan="2" align="center">R$ <?=number_format($sPO[Med],2,',','.')?></td>
              </tr>
            <tr class="row1">
              <td colspan="" align="center">Combustivel</td>
              <td colspan="" align="center"><?=number_format($sPC[qtda])?></td>
            <td colspan="2" align="center">R$ <?=number_format($sPC[Med],2,',','.')?></td>
              </tr>        
                        </table>
            </td></tr></tbody></table>
        
    <!-- Fim Visitas-->    
        </td>
        <td width="50%">
    
    <!--Emissão de Proposta--><!--FIM DE EMISSAO DE PROPOSTA-->
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
              <thead>
                <tr>
                  <td class="tcat" width="1" align="left" nowrap="nowrap"><img src="themes/admin_default/space.gif" alt="" width="4" height="21" /></td>
                  <td class="tcat" width="100%" colspan="" align="left" nowrap="nowrap">Proje&ccedil;&atilde;o de Vendas</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
                    <tr>
                      <td class="tabletitlerow" width="40%" align="center" nowrap="nowrap">&nbsp;Periodo</td>
                      <td class="tabletitlerow" width="20%" align="center" nowrap="nowrap">Acumulado</td>
                      </tr>
                    <tr class="row1">
                      <td colspan="" align="center">&nbsp;</td>
                      <td colspan="" align="center">&nbsp;</td>
                      </tr>
                    <tr class="row2">
                      <td colspan="" align="center">&nbsp;</td>
                      <td colspan="" align="center">&nbsp;</td>
                      </tr>
                    <tr class="row1">
                      <td colspan="" align="center">&nbsp;</td>
                      <td colspan="" align="center">&nbsp;</td>
                      </tr>
                    <tr class="row2">
                      <td colspan="" align="center">&nbsp;</td>
                      <td colspan="" align="center">&nbsp;</td>
                      </tr>
                    <tr class="row1">
                      <td colspan="" align="center">&nbsp;</td>
                      <td colspan="" align="center">&nbsp;</td>
                      </tr>
                  </table></td>
                </tr>
              </tbody>
            </table></td>
            </tr>

            </table>
    
    </td>       
    </tr>
    </table>
</td>
</tr>
</table>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
  <thead>
    <tr>
      <td class="tcat" width="1" align="left" nowrap="nowrap"><img src="themes/admin_default/space.gif" alt="" width="4" height="21" /></td>
      <td class="tcat" width="100%" colspan="" align="left" nowrap="nowrap">Aproveitamento Comercial</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
        <tr>
          <td class="tabletitlerow" width="40" align="center" colspan="2" nowrap="nowrap">Emiss&atilde;o de Proposta</td>
          <td class="tabletitlerow" width="60" align="center" colspan="2" nowrap="nowrap">Aprova&ccedil;&atilde;o de Proposta</td>
        </tr>
        <?
		
		$Sql = "SELECT count(*) as total FROM relacionamento_cliente rc where rc.statusRc='A'";
		$Sql.= " And rc.idVendedor='".$idVendedor."' ";
		$Sql.= " And rc.dtRc between '".$dtInicial."' And '".$dtFinal."' ";
		//$Sql.=" And rc.novapropostaRc='S'";
		$Sql.="ORDER BY rc.dtRc";

			$SqlCV = mysql_query($Sql) or die (mysql_error());
			$sCV = mysql_fetch_array($SqlCV);
		
		
		
		$Sql = "SELECT count(*) as total FROM relacionamento_cliente rc where rc.statusRc='A'";
		$Sql.= " And rc.idVendedor='".$idVendedor."' ";
		$Sql.= " And rc.dtRc between '".$dtInicial."' And '".$dtFinal."' ";
		$Sql.=" And rc.novapropostaRc='S'";
		$Sql.="ORDER BY rc.dtRc";

			$SqlCA = mysql_query($Sql) or die (mysql_error());
			$sCA = mysql_fetch_array($SqlCA);
			
			
		$montaWhere ="SELECT count(*) FROM relacionamento_cliente r left join proposta p on (r.idProposta=p.idProposta) where";
		$montaWhere.=" p.idVendedor='".$idVendedor."'";
		//$montaWhere .= " And p.dtcadProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";
		$montaWhere .= " And p.confirmaProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";
		$montaWhere .= ' And p.statusProposta!="T"';
		//echo $montaWhere;
		$SqlCC = mysql_query($montaWhere) or die (mysql_error());
		$sCC = mysql_fetch_array($SqlCC);	
						?>
        <tr class="row2" height="40">

          <td colspan="" width="25%" align="center"><?=number_format($sCA[total])?></td>
          <td colspan="" width="25%" align="center"><?=number_format((100/$sCV[total])*$sCA[total],2)?>%</td>
          <td colspan="" width="25%" align="center"><?=number_format($sCC[total])?></td>
          <td colspan="" width="25%" align="center"><?=number_format((100/$sCV[total])*$sCC[total],2)?>%</td>
        </tr>
      </table></td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
  <thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Visitas</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr>
<td class="tabletitlerow" width="40" align="center" nowrap>&nbsp;Tipo</td>
<td class="tabletitlerow" width="40" align="center" nowrap>&nbsp;Modo</td>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" width="150" align="center" nowrap>&nbsp;Data</td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Nova Proposta</td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Custo</td>
<td class="tabletitlerow" width="80" align="center" nowrap>&nbsp;Distancia</td>
</tr>
<?
$Sql = "SELECT l.nome, l.id, rc.idRc, c.Cli_Fantasia, rc.tipoRc, rc.modoRc, DATE_FORMAT(dtRc,'%d/%m/%Y') as dt, rc.novapropostaRc, rc.kminicialRc, rc.kmfinalRc FROM relacionamento_cliente rc left join clientes c on (c.Cli_ID=rc.idCliente) left join login l on (l.id=rc.idVendedor) where rc.statusRc='A'";
$Sql.= " And rc.idVendedor='".$idVendedor."' ";
$Sql.= " And rc.dtRc between '".$dtInicial."' And '".$dtFinal."' ";
$Sql.="ORDER BY rc.dtRc";
$sqlUsuario = mysql_query($Sql);
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1"); 

$SqlCusto =  mysql_query("Select SUM(valorRct) as total from relacionamento_custo where idRc='".$sU[idRc]."' group by idRc"); 
$sC = mysql_fetch_array($SqlCusto);
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" align="center" valign=""><?=labelTipoRelacionamento($sU[tipoRc])?></td>
<td colspan="" align="center" valign=""><?=labelModoRelacionamento($sU[modoRc])?></td>
<td colspan="" width="150" align="" valign="">&nbsp;<a href="index.php?_m=livesupport&_a=viewVisita&id=<?=$sU[idRc]?>" target="_blank" title="View"><?=$sU[Cli_Fantasia]?></a></td>
<td colspan="" width="80" align="center" valign=""><?=$sU[dt]?></td>
<td colspan="" width="80" align="center" valign=""><? if($sU[novapropostaRc]=='S'){?>SIM<? } else {?>NÃO <? }?></td>
<td colspan="" width="80" align="center" valign="">R$ <?=number_format($sC[total],2,'.',',')?></td>
<td colspan="" width="80" align="center" valign=""><?=($sU[kmfinalRc]-$sU[kminicialRc])?></td>

</tr>
<? } ?>
</table>
</td></tr></tbody></table>
<DIV style="page-break-after:always"></DIV> 
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Lista de Clientes</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 
$Sql = "SELECT c.Cli_Status, c.Cli_ID, c.Cli_Fantasia, DATE_FORMAT(c.dtcadCli,'%d/%m/%Y') as dt, c.idFilial, p.NOME_PATIO, c.idVendedor, l.nome FROM clientes c left join patio p on (p.ID_PATIO=c.idFilial) left join login l on (l.id=c.idVendedor)";
$nSql = "SELECT c.Cli_ID FROM clientes c left join patio p on (p.ID_PATIO=c.idFilial) left join login l on (l.id=c.idcadCliente)";
$montaWhere = ' where c.Cli_Status!="E"';
$montaWhere .= " And c.idVendedor='".$idVendedor."'";
$montaWhere .= " And c.dtcadCli between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";
$montaWhere .= "order by c.dtcadCli";
$sqlUsuario = mysql_query($Sql.$montaWhere) or die ("Could not connect to database: ".mysql_error());
?>
<tr>
<td class="tabletitlerow" width="50%" align="center" nowrap>&nbsp;Cliente</td>
<td class="tabletitlerow" align="center" nowrap="nowrap">Status</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Cadastrado por</td>
<td class="tabletitlerow" width="15%" align="center" nowrap>&nbsp;Filial</td>
<td class="tabletitlerow" width="20" align="center" nowrap>&nbsp;Data</td>
</tr>
<?
while ($sU = mysql_fetch_array($sqlUsuario)){
$cor = ($coralternada++ %2 ? "row2" : "row1");  
?>
<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="left" valign="">&nbsp;<a target="_blank" href="index.php?_m=livesupport&_a=editCliente&id=<?=$sU[Cli_ID]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" width="80" align="center" valign=""><?=labelStatusCliente($sU[Cli_Status]);?></td>
<td colspan="" align="center">&nbsp;<?=$sU[nome];?></td>
<td colspan="" align="center">&nbsp;<?=$sU[NOME_PATIO];?></td>
<td colspan="" align="center"><?=$sU[dt];?></td>
</tr>
<? } ?>
</table>
</td></tr></tbody></table>


 <DIV style="page-break-after:always"></DIV> 
 

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Propostas Emitidas</td>
			</tr>
			</thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 
$montaWhere='';
$Sql = "SELECT p.formaProposta, p.idProposta, c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, pa.nome, p.statusProposta, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, p.descricaoObra, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) where";
				$montaWhere .= '(p.statusProposta!="T"';
				$montaWhere.=" And p.idVendedor='".$idVendedor."'";
				$montaWhere .= " And p.dtcadProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59')";
				$montaWhere .= "order by p.idProposta";


$sqlUsuario = mysql_query($Sql.$montaWhere) or die ("Could not connect to database: ".mysql_error());
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

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[idProposta];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[nome];?></a></td>
<td colspan="" align="center"><a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>">
<?
	switch($sU[statusProposta]){
	case 'A': echo 'Aguardando Aprovação';break;
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'Não Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}
?></a></td>
<td colspan="" align="center"><?=$sU[data];?></td>
<td colspan="" width="" align="center" valign=""><a href="/Proposta/?p=<?=base64_encode($sU[idProposta])?>" target="_blank" title="Gerar Proposta">Imprimir</a></td>
</tr>
<tr>
<td colspan="6" class="<?=$cor?>"><b>Endereço:</b> <?=$sU[descricaoObra]?><br />
<?
$SqlData = mysql_query("SELECT DATE_FORMAT(inicio,'%d/%m/%Y') as dataini, DATE_FORMAT(fim,'%d/%m/%Y') as datafim, status FROM `obra` WHERE `idProposta` ='".$sU[idProposta]."' Limit 1") or die (mysql_error());
$sD = mysql_fetch_array($SqlData);
?>
<b>Início da Obra:</b> <? if($sU[dtini]=='00/00/0000'){?><?=$sD[dataini]?><? } else {?><?=$sU[dtini]?><? } ?><br />
<? if($sD[status]=='b'){?>
<b>Final da Obra:</b> <?=$sD[datafim]?><br />
<? } ?>

<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Mobilização</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Desmobilização</b></td>
</tr>
<? $iEsql = mysql_query("Select pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe,pe.fretedPe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$sU[idProposta]."' And pe.statusPe='A'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
$cor = ($coralternada++ %2 ? "row2" : "row1");	  
  ?>
  <tr class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td align="center" nowrap>&nbsp;<?=cortar($iE[nome1].' '.$iE[marca].' '.$iE[modelo].' '.$iE[categoria], 90)?></td>
<td align="center" nowrap>&nbsp;<?=$iE[qtdaPe]?></td>
<td align="center" nowrap>&nbsp;R$ <?=number_format($iE[precoPe],2,',','.');?></td>
<td align="center" nowrap><center><? if($iE[combustivelPe]=='S'){?>R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><? if($iE[operadorPe]=='S'){?> R$ <?=number_format($iE[valoroperadorPe],2,',','.');?><? } else {?> - X -<? }?></td>
<td align="center" nowrap><? if($iE[seguroPe]=='S'){?>R$ <?=number_format($iE[valorseguroPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretePe],2,',','.');?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretedPe],2,',','.');?></center></td>
</tr>
  <? }?>


</table>



</td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<br /><br /><br />&nbsp;<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Propostas Confirmadas</td>
			</tr>
  </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 
$montaWhere='';
$Sql = "SELECT p.formaProposta, p.idProposta, c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, pa.nome, p.statusProposta, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, p.descricaoObra, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) where";
				$montaWhere .= ' p.statusProposta!="T"';	
				$montaWhere.=" And p.idVendedor='".$idVendedor."'";			
				$montaWhere .= " And p.confirmaProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59'";


				$montaWhere .= "order by p.idProposta desc";


$sqlUsuario = mysql_query($Sql.$montaWhere) or die ("Could not connect to database: ".mysql_error());
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

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[idProposta];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[nome];?></a></td>
<td colspan="" align="center"><a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>">
<?
	switch($sU[statusProposta]){
	case 'A': echo 'Aguardando Aprovação';break;
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'Não Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}
?></a></td>
<td colspan="" align="center"><?=$sU[data];?></td>
<td colspan="" width="" align="center" valign=""><a href="/Proposta/?p=<?=base64_encode($sU[idProposta])?>" target="_blank" title="Gerar Proposta">Imprimir</a></td>
</tr>
<tr>
<td colspan="6" class="<?=$cor?>"><b>Endereço:</b> <?=$sU[descricaoObra]?><br />
<?
$SqlData = mysql_query("SELECT DATE_FORMAT(inicio,'%d/%m/%Y') as dataini, DATE_FORMAT(fim,'%d/%m/%Y') as datafim, status FROM `obra` WHERE `idProposta` ='".$sU[idProposta]."' Limit 1") or die (mysql_error());
$sD = mysql_fetch_array($SqlData);
?>
<b>Início da Obra:</b> <? if($sU[dtini]=='00/00/0000'){?><?=$sD[dataini]?><? } else {?><?=$sU[dtini]?><? } ?><br />
<? if($sD[status]=='b'){?>
<b>Final da Obra:</b> <?=$sD[datafim]?><br />
<? } ?>

<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Mobilização</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Desmobilização</b></td>
</tr>
<? $iEsql = mysql_query("Select pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe,pe.fretedPe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$sU[idProposta]."' And pe.statusPe='A'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
$cor = ($coralternada++ %2 ? "row2" : "row1");	  
  ?>
  <tr class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td align="center" nowrap>&nbsp;<?=cortar($iE[nome1].' '.$iE[marca].' '.$iE[modelo].' '.$iE[categoria], 90)?></td>
<td align="center" nowrap>&nbsp;<?=$iE[qtdaPe]?></td>
<td align="center" nowrap>&nbsp;R$ <?=number_format($iE[precoPe],2,',','.');?></td>
<td align="center" nowrap><center><? if($iE[combustivelPe]=='S'){?>R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><? if($iE[operadorPe]=='S'){?> R$ <?=number_format($iE[valoroperadorPe],2,',','.');?><? } else {?> - X -<? }?></td>
<td align="center" nowrap><? if($iE[seguroPe]=='S'){?>R$ <?=number_format($iE[valorseguroPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretePe],2,',','.');?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretedPe],2,',','.');?></center></td>
</tr>
  <? }?>


</table>



</td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<br /><br /><br />&nbsp;<br />
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Propostas Concluidas</td>
			</tr>
  </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 
$montaWhere='';
$Sql = "SELECT p.formaProposta, p.idProposta, c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, pa.nome, p.statusProposta, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, p.descricaoObra, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) where";

				$montaWhere .= ' (p.statusProposta!="T"';
				$montaWhere.=" And p.idVendedor='".$idVendedor."'";
				$montaWhere .= " And p.concluiProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59')";
				$montaWhere .= "order by p.idProposta desc";


$sqlUsuario = mysql_query($Sql.$montaWhere) or die ("Could not connect to database: ".mysql_error());
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

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[idProposta];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[nome];?></a></td>
<td colspan="" align="center"><a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>">
<?
	switch($sU[statusProposta]){
	case 'A': echo 'Aguardando Aprovação';break;
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'Não Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}
?></a></td>
<td colspan="" align="center"><?=$sU[data];?></td>
<td colspan="" width="" align="center" valign=""><a href="/Proposta/?p=<?=base64_encode($sU[idProposta])?>" target="_blank" title="Gerar Proposta">Imprimir</a></td>
</tr>
<tr>
<td colspan="6" class="<?=$cor?>"><b>Endereço:</b> <?=$sU[descricaoObra]?><br />
<?
$SqlData = mysql_query("SELECT DATE_FORMAT(inicio,'%d/%m/%Y') as dataini, DATE_FORMAT(fim,'%d/%m/%Y') as datafim, status FROM `obra` WHERE `idProposta` ='".$sU[idProposta]."' Limit 1") or die (mysql_error());
$sD = mysql_fetch_array($SqlData);
?>
<b>Início da Obra:</b> <? if($sU[dtini]=='00/00/0000'){?><?=$sD[dataini]?><? } else {?><?=$sU[dtini]?><? } ?><br />
<? if($sD[status]=='b'){?>
<b>Final da Obra:</b> <?=$sD[datafim]?><br />
<? } ?>

<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Mobilização</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Desmobilização</b></td>
</tr>
<? $iEsql = mysql_query("Select pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe,pe.fretedPe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$sU[idProposta]."' And pe.statusPe='A'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
$cor = ($coralternada++ %2 ? "row2" : "row1");	  
  ?>
  <tr class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td align="center" nowrap>&nbsp;<?=cortar($iE[nome1].' '.$iE[marca].' '.$iE[modelo].' '.$iE[categoria], 90)?></td>
<td align="center" nowrap>&nbsp;<?=$iE[qtdaPe]?></td>
<td align="center" nowrap>&nbsp;R$ <?=number_format($iE[precoPe],2,',','.');?></td>
<td align="center" nowrap><center><? if($iE[combustivelPe]=='S'){?>R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><? if($iE[operadorPe]=='S'){?> R$ <?=number_format($iE[valoroperadorPe],2,',','.');?><? } else {?> - X -<? }?></td>
<td align="center" nowrap><? if($iE[seguroPe]=='S'){?>R$ <?=number_format($iE[valorseguroPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretePe],2,',','.');?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretedPe],2,',','.');?></center></td>
</tr>
  <? }?>


</table>



</td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
<br /><br /><br />&nbsp;<br />

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="float: left; position: relative;">
<thead>
			<tr>
			<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
			<td class="tcat" width="100%" colspan="" align="left" nowrap>Propostas Canceladas</td>
			</tr>
  </thead><tbody><tr><td class="contenttableborder" colspan="2"><table border="0" cellpadding="3" cellspacing="1" width="100%">

<? 
$montaWhere='';
$Sql = "SELECT p.formaProposta, p.idProposta, c.Cli_Fantasia, c.Cli_Contato, p.descricaoObra, pa.nome, p.statusProposta, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, p.descricaoObra, DATE_FORMAT(p.dtiniProposta,'%d/%m/%Y') as dtini FROM proposta p inner join clientes c on (p.idCliente=c.Cli_ID) left join login pa on (p.idVendedor=pa.id) where";

				$montaWhere .= ' (p.statusProposta!="T"';
				$montaWhere.=" And p.idVendedor='".$idVendedor."'";
				$montaWhere .= " And p.dtcancelaProposta between '".$dtInicial." 00:00:00' and '".$dtFinal." 23:59:59')";
				$montaWhere .= "order by p.idProposta desc";


$sqlUsuario = mysql_query($Sql.$montaWhere) or die ("Could not connect to database: ".mysql_error());
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

<tr id="trid1466" class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td colspan="" width="" align="center" valign="">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[idProposta];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[Cli_Fantasia];?></a></td>
<td colspan="" align="center">&nbsp;<a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>"><?=$sU[nome];?></a></td>
<td colspan="" align="center"><a href="index.php?_m=form&_a=viewProposta&id=<?=$sU[idProposta]?>">
<?
	switch($sU[statusProposta]){
	case 'A': echo 'Aguardando Aprovação';break;
	case 'N': echo 'Em aberto';break;
	case 'L': echo 'Não Confirmada';break;
	case 'C': echo 'Confirmada';break;
	case 'F': echo 'Finalizada';break;
	case 'T': echo 'Excluida';break;
	}
?></a></td>
<td colspan="" align="center"><?=$sU[data];?></td>
<td colspan="" width="" align="center" valign=""><a href="/Proposta/?p=<?=base64_encode($sU[idProposta])?>" target="_blank" title="Gerar Proposta">Imprimir</a></td>
</tr>
<tr>
<td colspan="6" class="<?=$cor?>"><b>Endereço:</b> <?=$sU[descricaoObra]?><br />
<?
$SqlData = mysql_query("SELECT DATE_FORMAT(inicio,'%d/%m/%Y') as dataini, DATE_FORMAT(fim,'%d/%m/%Y') as datafim, status FROM `obra` WHERE `idProposta` ='".$sU[idProposta]."' Limit 1") or die (mysql_error());
$sD = mysql_fetch_array($SqlData);
?>
<b>Início da Obra:</b> <? if($sU[dtini]=='00/00/0000'){?><?=$sD[dataini]?><? } else {?><?=$sU[dtini]?><? } ?><br />
<? if($sD[status]=='b'){?>
<b>Final da Obra:</b> <?=$sD[datafim]?><br />
<? } ?>

<table border="0" cellpadding="3" cellspacing="1" width="100%" id="insereConduta">
<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td width="40%" align="center" nowrap><b>&nbsp;Equipamento</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Qtda</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Preço</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Combustivel</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Operador</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Seguro</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Mobilização</b></td>
<td width="10%" align="center" nowrap><b>&nbsp;Desmobilização</b></td>
</tr>
<? $iEsql = mysql_query("Select pe.idFamilia, pe.idPe, pe.precoPe, pe.operadorPe, pe.valoroperadorPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe,pe.valorseguroPe, pe.fretePe,pe.fretedPe, A.id, A.nome,A.grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.qtdaPe from proposta_equipamento pe inner join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where pe.idProposta = '".$sU[idProposta]."' And pe.statusPe='A'") or die (mysql_error());
  while($iE = mysql_fetch_array($iEsql)){
$cor = ($coralternada++ %2 ? "row2" : "row1");	  
  ?>
  <tr class="<?=$cor?>" onmouseover="showHighlight(this);" onmouseout="clearHighlight(this, '<?=$cor?>');">
<td align="center" nowrap>&nbsp;<?=cortar($iE[nome1].' '.$iE[marca].' '.$iE[modelo].' '.$iE[categoria], 90)?></td>
<td align="center" nowrap>&nbsp;<?=$iE[qtdaPe]?></td>
<td align="center" nowrap>&nbsp;R$ <?=number_format($iE[precoPe],2,',','.');?></td>
<td align="center" nowrap><center><? if($iE[combustivelPe]=='S'){?>R$ <?=number_format($iE[valorcombustivelPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><? if($iE[operadorPe]=='S'){?> R$ <?=number_format($iE[valoroperadorPe],2,',','.');?><? } else {?> - X -<? }?></td>
<td align="center" nowrap><? if($iE[seguroPe]=='S'){?>R$ <?=number_format($iE[valorseguroPe],2,',','.');?><? } else {?> - X -<? }?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretePe],2,',','.');?></center></td>
<td align="center" nowrap><center>R$ <?=number_format($iE[fretedPe],2,',','.');?></center></td>
</tr>
  <? }?>


</table>



</td>
</tr>
<? } ?>

</table>

</td></tr></tbody></table>
</body>
</html>