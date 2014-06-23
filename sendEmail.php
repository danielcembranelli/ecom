<?
include("config.php");
include("libEmarketing.php");
ini_set("sendmail_from","mapaes@mapaes.escad.com.br");

$E=0;
$S=0;
$T=0;

$sqlEnvia = mysql_query("SELECT m.subjectMensagem,m.htmlMensagem, m.remetenteMensagem, m.emailMensagem, m.emailrespostaMensagem, m.leituraMensagem, c.Cli_Nome, c.Cli_Email, e.idEnvio FROM envio e inner join clientes c on (c.Cli_ID=e.cadastro_idCadastro) left join mensagem m on (e.mensagem_idMensagem=m.idMensagem) where statusEnvio='W' ORDER BY RAND() Limit 1000;") or die (mysql_error());
while($sE = mysql_fetch_array($sqlEnvia)){
set_time_limit(990);
	$T++;
	if($sE[Cli_Email]!=''){
		$mail = SendEmail($sE[subjectMensagem],$sE[remetenteMensagem],$sE[emailMensagem],$sE[emailrespostaMensagem],$sE[leituraMensagem],$sE[htmlMensagem],$sE[idEnvio],$sE[Cli_Nome],$sE[Cli_Email]);
		if($mail==1)
		{
			updateEnvioEmail($sE[idEnvio]);
			$S++;
		} else {
			updateEnvioEmailFalha($sE[idEnvio]);
			$E++;
		}
	echo ' - '.$sE[idEnvio].'<br>';
	} else {
		
		updateEnvioEmailFalha($sE[idEnvio]);
	}
}
mysql_free_result($sqlEnvia);

echo $E.' - '.$S.' - '.$T;
?>


