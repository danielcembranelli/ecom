<?
include("Verifica.php");
include("libEmarketing.php");
$sqlEnvia = mysql_query("SELECT m.subjectMensagem, m.remetenteMensagem, m.emailMensagem, m.emailrespostaMensagem, m.leituraMensagem, m.htmlMensagem FROM  mensagem m  where m.idMensagem='".$_REQUEST[idMensagem]."' Limit 1;") or die (mysql_error());
$sE = mysql_fetch_array($sqlEnvia);


	echo $mail = SendEmail($sE[subjectMensagem],$sE[remetenteMensagem],$sE[emailMensagem],$sE[emailrespostaMensagem],$sE[leituraMensagem],$sE[htmlMensagem],$sE[idEnvio],$sE[nomeCadastro],$_REQUEST[Email]);
	
?>