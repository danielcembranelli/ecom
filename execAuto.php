<?
//'http://mapaes.escad.com.br/_layRelDiario.php?dt='.date("Y-m-d")
$lines = file_get_contents('http://ecom.escad.com.br/_layoutEmail.php?dt='.date("Y-m-d"));
require_once('lib/Mail/class.phpmailer.php');
$mail             = new PHPMailer();
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->Host       = "smtp.escad.com.br"; // SMTP server
			$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only
			$mail->Timeout = 160;
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->Host       = "smtp.escad.com.br"; // sets the SMTP server
			$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
			$mail->Username   = "mapaes@escad.com.br"; // SMTP account username
			$mail->Password   = "3sc@dr3nt@l";        // SMTP account password
			$mail->From       = "mapaes@escad.com.br";
			$mail->FromName   = "MAPAES - Escad Rental";			
			$mail->Subject    = "ECOM: Movimentaчуo de Proposta em ".date("d/m/Y");
			$mail->AltBody    = $lines;
			$mail->MsgHTML($lines);
/* Enviando a mensagem */

			//$mail->AddAddress('grace@escad.com.br','Grace Fabiana');
			//$mail->AddAddress('daniel@escad.com.br','Eurimilson Daniel');
			$mail->AddAddress('edmilson@escad.com.br','Edmilson Daniel');
			$mail->AddBCC('daniel@cembranelli.com.br','Daniel Cembranelli');
			if(!$mail->Send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  echo "Message sent!";
			}

$data = date("Y-m-d");
$hora = date("h:i");
include("Config.php");
$sql = mysql_query ("INSERT INTO `auto` ( `id` , `data`  , `hora`, `modo` ) VALUES ('', '$data', '$hora', 'rel_mapaes');");
if (!$sql){
echo "No foi possivel a consulta.";}
else{}
?>