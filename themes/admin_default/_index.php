						<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td align="left" valign="top">

<div class="dashboardtitle">mural de recados</div>
<table cellspacing="0" cellpadding="0" border="0" width="100%" id="caltableopt">
<tr style="height: 1em;"><td align="left"><div id="tab_main" style="DISPLAY: block;" class="tabcontent">
<table cellspacing="0" cellpadding="4" border="0" width="100%" class="dashborder">
<tr style="height: 1em">
<td align="left" valign="top">

<table cellspacing="0" cellpadding="2" height="300" border="0" width="100%" class="dashcontent">
<tr><td align="left" valign="top">

				<table width="100%"  border="0" cellspacing="1" cellpadding="2"><tr>
			<td width="100" class="darkredtext" nowrap><!--Overdue Tickets--></td>
			<td valign="middle"><div class="linediv"><img src="themes/admin_default/space.gif" height="1" width="1" /></div></td></tr>
			</table>
			    <table width="100%" border="0" cellspacing="1" cellpadding="2">
							
                            <tr>
				<td width="1"><img src="themes/admin_default/icon_task.gif" border="0" /></td>
				<td valign="middle" align="left" class="smalltext"><a href="index.php?_m=teamwork&_a=edittask&calendartaskid=2646"><!--Ultimos Envios--></a></td>
					<td width="100" align="right" class="smalltext"></td>
					<td width="100" align="right" class="smalltext"><!--Undated--></td>
					</tr>
                    
                    
					</table>	
                    
                    	<table width="100%"  border="0" cellspacing="1" cellpadding="2"><tr>
		<td width="60" class="smalltext" nowrap></td>
		<td valign="middle"><div class="linediv"><img src="themes/admin_default/space.gif" height="1" width="1" /></div></td></tr>
		</table>
		<table width="100%" border="0" cellspacing="1" cellpadding="2">
					<tr class="smalltext">
			<td width="1" nowrap>&nbsp;</td>
			</tr>
					<tr class="smalltext">
			<td width="1" nowrap>&nbsp;</td>
			</tr>
				</table>



</td></tr>
</table>
</td>
</tr>
</table>
</div>
</td></tr>
<tr style="height: 1em"><td align="left"><div><ul id="btab">
	<!--<li><a class="currenttab" href="index.php?_m=core&_a=dashboard" onClick="javascript:void(0);" id="dashtoday" title="Today">Hoje</a></li>-->
    <!--<li><a href="index.php?_m=core&_a=dashboard&type=news" id="dashnews" title="News (%s)">E-mails (0)</a></li>--></ul></div></td></tr>
</table>
</td>
<td align="right" valign="top" width="5"><img src="themes/admin_default/space.gif" border="0" width="5" height="5" /></td>
<td align="right" valign="top" width="50%"><div class="dashboardtitle">&nbsp;recados</div>
<table cellspacing="0" cellpadding="0" border="0" width="100%" id="caltableopt">
<tr style="height: 1em"><td align="left">
<div id="tab_twday" style="DISPLAY: block;" class="tabcontent"><table border="0" cellpadding="3" cellspacing="1" width="100%" class="tborderround"><tr><td class="row1"><span class="smalltext">
	
	<?
if($_POST[acao]=='insert'){
			
}
	$sqlCalendario = mysql_query("SELECT DATE_FORMAT(P.dtRecado , '%d/%m') as td, A.nome, P.textoRecado FROM recados A inner join login P on (A.id=P.idRecado) order by dtRecado");

	
	//while($sC = mysql_fetch_array($sqlCalendario)){
	$cal[]=$sC[td];
	$txt[]=$sC[textoRecado];
	
	//}
	?>
	<table border="0" cellpadding="0" cellspacing="0" width="100%" class="calborder">
	<? for($l=0;$l<count($cal);$l++){?>
	
	<? if($Dt!=$cal[$l]){?>
	<tr class="calactivehour">
	<td width="60" style="PADDING: 3px;" class="calhrbg" valign="top"><span class="tabletitle"><?=$cal[$l]?></span></td>
	<td width="1"  class="calendarsplitter"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td>
	<td width="100%" style="margin-bottom:5px; margin-left:5px; margin-right:5px; margin-top:5px;">
	<? } ?>
	<? $Dt=$cal[$l]?>
	<div style="margin-left:6px">
	<?=$txt[$l]?></div>
	<? if($Dt==$cal[$l+1]){?>
	<HR class="calhr" />
	<? }?>
	<? if($Dt!=$cal[$l+1]){?>
	</td></tr>
	<tr height="1" class="calendarsplitter">
	<td colspan="3"><img src="themes/admin_default/space.gif" border="0" width="1" height="1" /></td>
	</tr>
	<? }?>
	
	
	<? } ?>
	

	
	
	
	</table>
    
    <form action="index.php" method="post"><textarea name="texto" rows="3" style="width:99%"></textarea>
    <input type="hidden" name='acao' value="insert" />
    </form>
</span></td></tr></table></div>
	
	
	</td>
	</tr>
	<tr style="height: 1em">
	<td align="left">
	<div>
	<ul id="btab">
	<li><a class="currenttab" href="#" onClick="javascript:void(0);" id="twday" title="Dias">Semana</a></li>
	<li><a href="index.php?_m=teamwork&_a=calendar&calendartype=month" id="twmonth" title="Mês">Mês</a></li>
	</ul>
	</div>
	</td>
	</tr>
</table>
</td>
</tr>
</table>

	
		
		