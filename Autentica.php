<? 
session_start();
include("Config.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<!-- default stylesheet -->
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />
<script type="text/javascript" src="themes/admin_default/main.js"></script>
</head>
<body>
<?
$sql = mysql_query("Select id as idUsuario, nrLogUsuario from login where login = '$_POST[username]' And senha = '$_POST[password]' And statusUsuario = 'A'");
if(mysql_num_rows($sql)>0){
$sq = mysql_fetch_array($sql);

$data = date("Y-m-d H:i:s");
$log = mysql_query("Update login set nrLogUsuario=nrLogUsuario+1, dtAntLogUsuario=dtLogUsuario, dtLogUsuario='$data' where id = $sq[idUsuario]");
$Log = mysql_query("Insert into log_ecom (idUsuario, dtLe, aLe) values ('".$sq[idUsuario]."',NOW(),'autentica')") or die ('Erro ao criar o log'.mysql_error());
$_SESSION[StatusLogin] = 'A';
$_SESSION[idLogin] = $sq[idUsuario];
if($sq[nrLogUsuario]==0){

?>
<meta http-equiv="Refresh" content="1; URL=index.php?_a=MinhaConta">
<?
} else {
	if($_SESSION[URL]!=''){
?>
<script>window.location.replace("<?=$_SESSION[URL]?>")</script>
<? } else { ?>
<script>window.location.replace("index.php")</script>
<? } }?>
<table cellpadding="2" cellspacing="1" border="0" width="100%" class="tborder" style="">
<tr class="rowinfo" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="rowinfo" align="center" valign="middle" colspan="2" width=""><table border="0" cellpading="0" cellspacing="3"><tr><td align="center"><span class="mediumtext">Processando Login...</span></td></tr><tr><td><span class="smalltext"><a href="index.php?_a=index">Por favor, clique aqui caso seu browser n&atilde;o redirecione automaticamente voc&ecirc;</a></span></td></tr></table>
</td>
</tr>
</table>
<? } else {?>
<script>window.location.replace("Login.php?Status=Erro")</script>
<? } ?>