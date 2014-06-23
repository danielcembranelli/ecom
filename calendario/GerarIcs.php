<?
ini_set("sendmail_from","mapaes@mapaes.escad.com.br");
$to = 'grace@escad.com.br';
$subject = "Agenda Outlook";
$message = "Thank you for participating in the Technical Certification training program.\n\n";
//==================
$headers = 'Content-Type:text/calendar; Content-Disposition: inline; charset=utf-8;\r\n';
$headers .= "Content-Type: text/plain;charset=\"utf-8\"\r\n";
$messaje = "BEGIN:VCALENDAR\n";
$messaje .= "VERSION:2.0\n";
$messaje .= "PRODID:PHP\n";
$messaje .= "METHOD:REQUEST\n";
$messaje .= "BEGIN:VEVENT\n";
$messaje .= "DTSTART:20091208T003000Z\n";
$messaje .= "DTEND:20091208T040000Z\n";
$messaje . "DESCRIPTION: You have registered for the class\n";
$messaje .= "SUMMARY:Technical Training\n";
$messaje .= "ORGANIZER; CN=\"Corporate\":mailto:training@corporate.com\n";
$messaje .= "Location:" . $location . "\n";
$messaje .= "UID:040000008200E00074C5B7101A82E00800000006FC30E6 C39DC004CA782E0C002E01A81\n";
$messaje .= "SEQUENCE:0\n";
$messaje .= "DTSTAMP:".date('Ymd').'T'.date('His')."\n";
$messaje .= "END:VEVENT\n";
$messaje .= "END:VCALENDAR\n";
$headers .= $messaje;
echo mail($to, $subject, $message, $headers);
?>