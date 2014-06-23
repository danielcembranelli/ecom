<?
include("Verifica.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>eCom :: Extranet || Status de Proposta</title>
</head>
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
<script type='text/javascript' src='jquery-autocomplete/lib/jquery.bgiframe.min.js'></script>
<script type='text/javascript' src='jquery-autocomplete/lib/jquery.ajaxQueue.js'></script>
<script type='text/javascript' src='jquery-autocomplete/lib/thickbox-compressed.js'></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.price_format.1.3.js"></script>
<script type='text/javascript' src='jquery-autocomplete/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css" />
<script type="text/javascript">
function chec(tabela,valor){
	if(valor==true){
	document.getElementById(tabela).style.display = 'block'
	} else {
	document.getElementById(tabela).style.display = 'none'
	}
}
</script>
<body>
<br />
<br />
<br />
<?
$Sql = StatusProposta($_POST[idProposta],$_POST[status],$_POST[texto]);
if($_POST[status]=='N'){
	
	$insereFamilia = mysql_query("Update proposta set statusProposta='N' where idProposta='".$_POST[idProposta]."' Limit 1") or die (mysql_error());
}
if($_POST[status]=='T'){
	
	$insereFamilia = mysql_query("Update proposta set statusProposta='T' where idProposta='".$_POST[idProposta]."' Limit 1") or die (mysql_error());
}
if($_POST[status]=='L'){
$insereFamilia = mysql_query("Update proposta set statusProposta='L', dtcancelaProposta=NOW(), idMp='".$_POST[idMotivo]."', txtcancelaProposta='".nl2br($_POST[texto])."' where idProposta='".$_POST[idProposta]."' Limit 1") or die (mysql_error());
}
if($_POST[status]=='F'){
$insereFamilia = mysql_query("Update proposta set statusProposta='F', concluiProposta=NOW() where idProposta='".$_POST[idProposta]."' Limit 1") or die (mysql_error());
}
if($_POST[status]=='C'){
	$insereFamilia = mysql_query("Update proposta set statusProposta='C', confirmaProposta=NOW() where idProposta='".$_POST[idProposta]."' Limit 1") or die (mysql_error());
}
if($Sql){?>
<center>Opera&ccedil;&atilde;o Realizada Com Sucesso!!</center>
<? }?>
</body>
</html>
