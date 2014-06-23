<?
include("Verifica.php");
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
<script type="text/javascript" src="files/3ec0a57a0e43e8142b8bcf0793fc3ba9.js"></script>

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
<link rel="stylesheet" type="text/css" href="jquery/vTip_v2/css/vtip.css" />


<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css" />
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
 
 
 
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
    <td align="right" valign="bottom"><span class="smalltext"><font color="#333333">Logado com: <? echo $dl[nome] ?></font></span></td>
  </tr>
</table></td>
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
<!--Inicio Menu--></td>
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
<script>window.location.replace("Login.php")</script>
<?
}
else{
include("_erro.php");
}
?>
</td>
</tr>
  <tr>
    <td>&nbsp;</td>
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
window.print();
</script>
</center>
</body>
</html>
