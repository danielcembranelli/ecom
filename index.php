<?
include("Verifica.php");

if($_REQUEST[_a]!=''){
	$a=$_REQUEST[_a];
}
if($_POST[_a]!=''){
	$a=$_POST[_a];
}
if($a==''){
	$a='index';	
}
if($_REQUEST[_m]!=''){
	$m=$_REQUEST[_m];
}
if($_POST[_m]!=''){
	$m=$_POST[_m];
}


if($_REQUEST[step]!=''){
	$step=$_REQUEST[step];
}
if($_POST[step]!=''){
	$step=$_POST[step];
}

$query_string = "";
if ($_POST) {
  $kv = array();
  foreach ($_POST as $key => $value) {
    $kv[] = "$key=$value";
  }
  $query_string = join("&", $kv);
}
else {
  $query_string = $_SERVER['QUERY_STRING'];
}
$Log = mysql_query("Insert into log_ecom (idUsuario, dtLe, aLe, mLe, stepLe, urlLe, postLe) values ('".$dl[id]."',NOW(),'".$a."','".$m."','".$step."','".$_SERVER['QUERY_STRING']."','".$query_string."')") or die ('Erro ao criar o log'.mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eCom :: Extranet</title>

<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />
<script language="Javascript">
var themepath = "themes/admin_default/";
var swiftpath = "";
var BLANK_IMAGE="themes/admin_default/space.gif";
var swiftsessionid = "d36e1720d517163a6a2a9744dc7fe143";
var swiftiswinapp = "0";
var cparea = "admin";
</script>
<link rel="stylesheet" type="text/css" media="all" href="themes/admin_default/calendar-blue.css" title="winter" />
<script type="text/javascript" src="js/PlanoDeAcao.js"></script>
<script type="text/javascript" src="themes/admin_default/calendar.js"></script>
<script type="text/javascript" src="themes/admin_default/lang/calendar-en-us.js"></script>
<script type="text/javascript" src="themes/admin_default/calendar-setup.js"></script>
<script type="text/javascript" src="includes/Spellcheck/spellChecker.js"></script>

<script type="text/javascript" src="themes/admin_default/main.js"></script>
<script type="text/javascript">
</script>
<script type="text/javascript" src="js/staffcpmenuclick.js"></script><script language="Javascript">
//HTMLArea.loadPlugin("TableOperations");
function loadAllData() { preloadMenuImages(); 			var irsField = browserObject("staffirs");
		if (irsField)
		{
			window.$IRS = globalirs = new IRSAutoComplete(document.getElementById('staffirs'));
		}
	}
</script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type="text/javascript" src="libEcom.js"></script>

<script type='text/javascript' src='jquery-autocomplete/lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='jquery-autocomplete/lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='jquery-autocomplete/lib/thickbox-compressed.js'></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.price_format.1.3.js"></script>
<script type='text/javascript' src='jquery-autocomplete/jquery.autocomplete.js'></script>
<script type="text/javascript" src="jquery-autocomplete/jquery.maskedinput-1.2.2.min.js"></script>
<script type="text/javascript" src="jquery-autocomplete/jquery.dimensions.pack.js"></script>
<script type="text/javascript" src="jquery/vTip_v2/vtip.js"></script>
<script type="text/javascript" src="js/meiomask.js"></script>
<script type="text/javascript" src="js/mascara_input.js"></script>
<link rel="stylesheet" type="text/css" href="jquery/vTip_v2/css/vtip.css" />


<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css" />
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" background="themes/admin_default/bgblocks.gif" onLoad="javascript:loadAllData();">
 
 <script language="Javascript"> 
 var code="code";var url="url";var targ="target";var sub="sub";

// ITEMS, TRANSLATE THE CODE TEXT ONLY!

var MENU_PREFERENCES =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[23,180], "itemoff":[21,0], "leveloff":[10,59], "delay":1000, "style":VSTYLE, dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"Clientes Novos", "format":{"itemoff":[0,0], "image":themepath+"menu_settings.gif", "oimage":themepath+"menu_settings.gif", "imgsize":[20,22]}, url:"index.php?_m=livesupport&_a=&_a=relCadCliente"},
	{code:"Clientes Inativos", url:"index.php?_m=livesupport&_a=relNaoEmissaoProposta", "format":{"image":themepath+"menu_calendarschedule.gif", "oimage":themepath+"menu_calendarschedule.gif", "imgsize":[20,22]}}
];
	
	//{code:"Change Password", url:"index.php?_m=core&_a=changepassword", "format":{"image":themepath+"menu_lock.gif", "oimage":themepath+"menu_lock.gif", "imgsize":[20,22]}} 
 
var swticketdepartments = swmenulist = new Array();
swticketdepartments = [['General', '1', '1'], ];
swmenulist = [['dpreferences', 'MENU_PREFERENCES'],['dvisitas',' MENU_CREATEUSERTICKET']];
buildMainMenus();
 
var MENU_CREATEUSERTICKET =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[22,180], "itemoff":[21,0], "leveloff":[10,59], "delay":1000, "style":VSTYLE, "imgsize":[20,17], dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"Send E-mail", "format":{"style":VSTYLEBORDER,"itemoff":[0,0], "leveloff":[5,179], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10], "image":themepath+"menu_ticketnormal.gif", "oimage":themepath+"menu_ticketnormal.gif", "imgsize":[20,22]}, url:"javascript:void(0);",
					sub: [
						{"itemoff":[21,0]},
																		{code:"General", "format":{"image":themepath+"menu_folderblue.gif", "oimage":themepath+"menu_folderblue.gif", "style":SUBPOPUPTOP, "imgsize":[20,22]}, url:"index.php?_m=tickets&_a=newticket&type=generic&departmentid=1&userid="},																													]
		},
	{code:"Phone Ticket", url:"javascript:void(0);", "format":{"itemoff":[21,0], "leveloff":[5,179], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10], "image":themepath+"menu_ticketphone.gif", "oimage":themepath+"menu_ticketphone.gif", "imgsize":[20,22]},
					sub: [
						{"itemoff":[21,0]},
																		{code:"General", "format":{"image":themepath+"menu_folderblue.gif", "oimage":themepath+"menu_folderblue.gif", "style":SUBPOPUPTOP, "imgsize":[20,22]}, url:"index.php?_m=tickets&_a=newticket&type=phone&departmentid=1&userid="},																													]
		}
];
var MENU_USEARCHTICKET =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[22,180], "itemoff":[20,0], "leveloff":[2,179], "delay":1500, "style":VSTYLE, dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"", "format":{"style":VSTYLEBORDER, "itemoff":[0,0], "image":themepath+"menu_users.gif", "oimage":themepath+"menu_users.gif", "imgsize":[20,22], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10]}, url:"index.php?_m=tickets&_a=search&userid=",
					sub: [
						{"itemoff":[21,0]},
											]
	},	{code:"", "format":{"image":themepath+"menu_usergroup.gif", "oimage":themepath+"menu_usergroup.gif", "imgsize":[20,22], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10], "arrow":themepath+"icon_rightarrowblue.gif", "oarrow":themepath+"icon_rightarrowblue.gif", "arrsize":[10,10]}, url:"index.php?_m=tickets&_a=search&usergroupid=",
					sub: [
						{"itemoff":[21,0]},
											]
	},
];
var MENU_UMARKAS =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[22,180], "itemoff":[20,0], "leveloff":[10,59], "delay":1500, "style":VSTYLE, dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"", "format":{"style":VSTYLEBORDER, "itemoff":[0,0], "image":themepath+"menu_user.gif", "oimage":themepath+"menu_user.gif", "imgsize":[20,22]}, url:"index.php?_m=core&_a=edituser&userid=&markas=validated"},
	{code:"", "format":{"image":themepath+"menu_validationpending.gif", "oimage":themepath+"menu_validationpending.gif", "imgsize":[20,22]}, url:"index.php?_m=core&_a=edituser&userid=&markas=validationpending"},
];
var MENU_UOPTIONS =
[
	{"popup":1, "popupoff":[0,0], "pos":[0,0], "zindex":50, "size":[22,200], "itemoff":[20,0], "leveloff":[10,59], "delay":1500, "style":VSTYLE, dynamic: true, https_fix_blank_doc:themepath+'blank.html'},
	{code:"", "format":{"style":VSTYLEBORDER, "itemoff":[0,0], "image":themepath+"menu_repliedmessages.gif", "oimage":themepath+"menu_repliedmessages.gif", "imgsize":[20,22]}, url:"index.php?_m=core&_a=edituser&userid=&do=sendveriemail"}
];
var tuserticket = new COOLjsMenuPRO("tuserticket", MENU_CREATEUSERTICKET);
tuserticket.initTop();
tuserticket.init();
var tusearchticket = new COOLjsMenuPRO("tusearchticket", MENU_USEARCHTICKET);
tusearchticket.initTop();
tusearchticket.init();
var tumarkas = new COOLjsMenuPRO("tumarkas", MENU_UMARKAS);
tumarkas.initTop();
tumarkas.init();
var tuoptions = new COOLjsMenuPRO("tuoptions", MENU_UOPTIONS);
tuoptions.initTop();
tuoptions.init();
 
</script>
 
  <div id="overDiv" style="position:absolute; visibility:hidden; z-index:1000;"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
  <tr>
    <td>
	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2" width="30%" align="left" valign="middle" height="60"><a href="index.php">
    <? if($dl[id]=='6'){?>
    <img src="themes/admin_default/logo_grace.jpg" height="70" border="0">
    <? } else {?>
    <img src="themes/admin_default/logo.jpg" width="280" height="70" border="0">
    <? } ?>
    
    </a></td>
    <td align="right" valign="top"><span class="smalltext"></span>&nbsp;</td>
  </tr>
  <tr>
    <td align="right" valign="bottom"><span class="smalltext"><font color="#333333">Logado com: <? echo $dl[nome] ?></font> | <a href="?_a=MinhaConta" id="blue" title="Minha Conta">Minha Conta</a>&nbsp;| <a href="index.php" id="blue" title="Home"><strong>Home</strong></a>&nbsp; | <a href="?_a=Sair" id="blue" title="Logout"><strong>Sair</strong></a>&nbsp;</span></td>
  </tr>
</table></td>
  </tr>
  <tr height="4">
    <td><img src="themes/admin_default/space.gif" width="1" height="4"></td>
  </tr>
  <tr height="1">
    <td bgcolor="#C6C3C6"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
  </tr>
  <tr height="4">
    <td bgcolor="#F0F0F0"><img src="themes/admin_default/space.gif" width="1" height="4"></td>
  </tr>
    <tr>
    <td>

<?
if($dl[tipoUsuario]=='V'){
	$btcliente = 1;
	$btproposta = 1;
	$btrelatorio = 0;
	$btbiblioteca = 0;
	$btemarketing = 0;
	$frEnviaFila=0;
	$btpropostacliente=1; //Botao de Propostas na tela de Cliente
	$bteditarcliente=1; //Botao Editar Cliente na tela de Cliente
	$chart_7dias = 0;
	$btmedicao=0;

}
if($dl[tipoUsuario]=='S'){
	$btcliente = 1;
	$btproposta = 0;
	$btrelatorio = 0;
	$btbiblioteca = 0;
	$btemarketing = 0;
	$frEnviaFila = 0;
	$bteditarcliente=0;
	$btpropostacliente=0;
	$chart_7dias = 0;
	$btmedicao=0;

}
if($dl[tipoUsuario]=='G'){
	$btcliente = 1;
	$btproposta = 1;
	$btrelatorio = 0;
	$btbiblioteca = 0;
	$btemarketing = 0;
	$frEnviaFila = 0;
	$bteditarcliente=1;
	$btpropostacliente=1;
	$chart_7dias = 0;
	$btmedicao=1;

}
if($dl[tipoUsuario]=='C'){
	$btcliente = 1;
	$btproposta = 1;
	$btrelatorio = 0;
	$btbiblioteca = 1;
	$btfamilia = 1;
	$btemarketing = 0;
	$frEnviaFila = 0;
	$bteditarcliente=1;
	$btpropostacliente=1;
	$chart_7dias = 0;
	$btmedicao=0;

}
if($dl[tipoUsuario]=='A'){
	$btcliente = 1;
	$btproposta = 1;
	$btfamilia = 1;
	$btrelatorio = 1;
	$btbiblioteca = 1;
	$btemarketing = 1;
	$bteditarcliente=1;
	$frEnviaFila =1;
	$btpropostacliente=1;
	$chart_7dias = 1;
	$btmedicao=1;

}
if($dl[tipoUsuario]=='F'){
	$btcliente = 1;
	$btproposta = 1;
	$btfamilia = 0;
	$btrelatorio = 0;
	$btbiblioteca = 0;
	$btemarketing = 0;
	$frEnviaFila =0;
	$bteditarcliente=0;
	$btpropostacliente=1;
	$chart_7dias = 0;
	$btmedicao=1;

}
if($dl[tipoUsuario]=='E'){
	$btcliente = 1;
	$btproposta = 0;
	$btfamilia = 0;
	$btrelatorio = 1;
	$btbiblioteca = 0;
	$btemarketing = 1;
	$frEnviaFila =1;
	$bteditarcliente=0;
	$btpropostacliente=0;
	$chart_7dias = 1;

}
?>
<!--Inicio Menu-->
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
				<td onClick="javascript:window.location.href='index.php';">

<table width="80"  border="0" cellspacing="0" cellpadding="0">
          <tr height="21">
			
            <td id="tb_menusection1" align="center" class="menusectiondefault">Home</td>
          </tr>
        </table></td>
		<? if($btproposta=='1'){?>
        <td onClick="javascript:switchTab(2, 2);"><table width="100"  border="0" cellspacing="0" cellpadding="0">
          <tr height="21">
						<td bgcolor="#414142" width="1"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
            <td width="1" class="menudefbg"><img src="themes/admin_default/space.gif" width="1" height="21"></td>
			
            <td id="tb_menusection2" align="center" class="menusectiondefault">Propostas</td>
          </tr>
        </table></td>
		<? } ?>
        <? if($btcliente==1){?>
				<td onClick="javascript:switchTab(3, 3);"><table width="120"  border="0" cellspacing="0" cellpadding="0">
          <tr height="21">
						<td bgcolor="#414142" width="1"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
            <td width="1" class="menudefbg"><img src="themes/admin_default/space.gif" width="1" height="21"></td>
			
            <td id="tb_menusection3" align="center" class="menusectiondefault">Clientes</td>
          </tr>
        </table></td>
        <? } ?>
		<? if($btfamilia=='1'){?>
				<td onClick="javascript:switchTab(8, 4);"><table width="120"  border="0" cellspacing="0" cellpadding="0">
          <tr height="21">
						<td bgcolor="#414142" width="1"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
            <td width="1" class="menudefbg"><img src="themes/admin_default/space.gif" width="1" height="21"></td>
			
            <td id="tb_menusection8" align="center" class="menusectiondefault">Família</td>
          </tr>
        </table></td>
		<? } ?>
        <? if($btbiblioteca=='1'){?>
				<td onClick="javascript:switchTab(5, 6);"><table width="110"  border="0" cellspacing="0" cellpadding="0">
          <tr height="21">
						<td bgcolor="#414142" width="1"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
            <td width="1" class="menudefbg"><img src="themes/admin_default/space.gif" width="1" height="21"></td>
			
            <td id="tb_menusection5" align="center" class="menusectiondefault">Biblioteca</td>
          </tr>
        </table></td>
        <? } ?>
		<? if($btrelatorio=='1'){?>		
				<td onClick="javascript:switchTab(4, 5);"><table width="140"  border="0" cellspacing="0" cellpadding="0">
          <tr height="21">
						<td bgcolor="#414142" width="1"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
            <td width="1" class="menudefbg"><img src="themes/admin_default/space.gif" width="1" height="21"></td>
			
            <td id="tb_menusection4" align="center" class="menusectiondefault">Relatórios</td>
          </tr>
        </table></td>
		<? } ?>
        <? if($btemarketing=='1'){?>	
				<td onClick="javascript:switchTab(6, 1);"><table width="140"  border="0" cellspacing="0" cellpadding="0">
          <tr height="21">
						<td bgcolor="#414142" width="1"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
            <td width="1" class="menudefbg"><img src="themes/admin_default/space.gif" width="1" height="21"></td>
			
            <td id="tb_menusection6" align="center" class="menusectiondefault">E-mailmarketing</td>
          </tr>
        </table></td>
        <? } ?>
		 <? if($btmedicao=='1'){?>	
				<td onClick="javascript:switchTab(9, 3);"><table width="90"  border="0" cellspacing="0" cellpadding="0">
          <tr height="21">
						<td bgcolor="#414142" width="1"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
            <td width="1" class="menudefbg"><img src="themes/admin_default/space.gif" width="1" height="21"></td>
			
            <td id="tb_menusection9" align="center" class="menusectiondefault">Medição</td>
          </tr>
        </table></td>
		<? } ?>
        <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
			<td bgcolor="#414142" width="1"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
            <td width="1" class="menudefbg"><img src="themes/admin_default/space.gif" width="1" height="21"></td>
            <td class="menusectiondefault">&nbsp;</td>
          </tr>
        </table></td>
        <td width="100%" class="menusectiondefault"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="themes/admin_default/space.gif" width="1" height="21"></td>
          </tr>
        </table></td>
      </tr>
	  
      <tr id="tb_menuline" class="menuline2" height="1">
        <td colspan="11"><img src="themes/admin_default/space.gif" width="1" height="5"></td>
      </tr>
      
	  <tr id="tb_menulinks" align="left" class="menulinks2" valign="middle">
        <td colspan="11"> <table width="100%"  border="0" cellspacing="0" cellpadding="0" height="5" height="100%">
          <tr valign="middle">
            <td width="94%" valign="middle"><div id="linksdiv" class="menulinks2" style="padding-left:5px;padding-top:5px;padding-bottom:5px;width:100%;height:13px;">
			<script language="Javascript">
			<? if($_REQUEST[_m]==downloads){?>
			switchTab(5, 6);
			<? } elseif($_REQUEST[_m]==core){?>
			switchTab(9, 3);
			<? } elseif($_REQUEST[_m]==oper){?>
			switchTab(6, 1);
			<? } elseif($_REQUEST[_m]==ate){?>
			switchTab(4, 5);
			<? } elseif($_REQUEST[_m]==form){?>
			switchTab(2, 2);
			<? } elseif($_REQUEST[_m]==livesupport){?>
			switchTab(3, 3);
			<? } elseif($_REQUEST[_m]==teamwork){?>
			switchTab(8, 4);
			<? } else {?>
			switchTab(1, 1);
			<? }?></script></div></td>
            <td width="6%"><img src="themes/admin_default/space.gif" width="1"></td>
          </tr>
        </table>
		</td>
		</tr>
		</table>

<!--Fim Menu-->
		


	</td>
  </tr>
    <tr height="1">
    <td bgcolor="#C6C3C6" colspan="6" id="popupRef"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
  </tr>
  <tr>
  <td>
<? 
if($_REQUEST[_a] == index  || $_REQUEST[_a] == Home || $_REQUEST[_a] == ''){
$_REQUEST[_a]="index";
}
if(file_exists("_".$_REQUEST[_a].".php")){



?>
		<table border="0" cellspacing="0" cellpadding="0" width="100%" height="400"><tr>
			<td width="145" valign="top" align="left" bgcolor="#F0EADE" class="staffnavbar">

<? 
if($_REQUEST[_m]==''){
$_REQUEST[_m]="index";
}
if(file_exists("m_".$_REQUEST[_m].".php")){

include("m_".$_REQUEST[_m].".php");
}

?>
<center>
</center>

			</td>
			<td width="1" valign="top" align="left" bgcolor="#CDCDCD"><img src="themes/admin_default/space.gif" width="1" height="1"></td>
			<td width="8" valign="top" align="left"><img src="themes/admin_default/space.gif" width="8" height="1"></td>
			<td valign="top" align="left" width="100%">
				
				
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
									<tr>
						<td colspan="2">
						
						
						<? include("_".$_REQUEST[_a].".php");?>
						
						
						
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
									</table>
			</td>
			<td width="8" valign="top" align="left"><img src="themes/admin_default/space.gif" width="8" height="1"></td>
		</tr></table>
<?
}

else if($_REQUEST[_a]==Sair){
unset($_SESSION[idLogin]);
unset($_SESSION[StatusLogin]);
?>
<script>window.location.replace("index.php")</script>
<?
}
else{
include("_erro.php");
}
?>
</td>
</tr>
  <tr>
    <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="5" bgcolor="#E1E1E1"><img src="themes/admin_default/space.gif" width="1" height="5"></td>
      </tr>
      <tr>
        <td height="8" bgcolor="#707070"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="569" align="left" valign="middle"><span class="smalltext">&nbsp;<a href="?pag=Home" id="lightgray">Home</a></span>
			</td>
            <td align="right"><span class="smalltext"><font color="#EFEFEF">Copyright &copy; 2009 - <?=date("Y");?> Escad.</font></span></td>
            <td width="1" align="right"><img src="themes/admin_default/space.gif" width="1" height="15"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#4E4E4E"><img src="themes/admin_default/space.gif" width="1" height="2"></td>
      </tr>
    </table></td>
  </tr>
</table>

<div id="popProposta" style="width:200px; height:70px; position:fixed; bottom:10px; right:20px; display:none">
<table cellpadding="2" cellspacing="1" border="0" width="100%" height="100%" class="tborder" style="">
<tr class="rowinfo" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="middle" colspan="2" width=""><table border="0" cellpading="0" cellspacing="3"><tr><td><img src="menu/popNovaProposta.png" /></td><td align="center"><span class="mediumtext">Processando Login...</span></td></tr></table>
</td>
</tr>
</table>
</div>

<script>
//$("#popProposta").show(100);
</script>
</center>
</body>
</html>
