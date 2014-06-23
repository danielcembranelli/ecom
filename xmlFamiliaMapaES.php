<?
include("Config.php");
header("Content-type: application/xml;charset=iso-8859-1");


$xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
$xml .= "<familias>\n";
 
$sqlUsuario = mysql_query("SELECT id, nome from familia where master='".$_REQUEST[Master]."' And nome!='' ORDER BY nome") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){

      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$sU[id]."</codigo>\n";                  
      $xml .= "<descricao>".$sU[nome]."</descricao>\n";         
      $xml .= "</cidade>\n";    
   }//FECHA FOR                 
   
   $xml.= "</familias>\n";
   echo $xml;
?>