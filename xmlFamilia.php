<?
include("Config.php");
header("Content-type: application/xml;charset=iso-8859-1");


$xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
$xml .= "<familias>\n";
 
$sqlUsuario = mysql_query("SELECT id, nome,grupo, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo FROM familia A LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) where A.statusFamilia='A' And A.master='".$_REQUEST[Master]."' ORDER BY marca, categoria, modelo") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){

      $xml .= "<familia>\n";     
      $xml .= "<codigo>".$sU[id]."</codigo>\n";                  
      $xml .= "<descricao>".$sU[nome1]." ".$sU[marca]." ".$sU[modelo]." ".$sU[categoria]."</descricao>\n";         
      $xml .= "</familia>\n";    
   }//FECHA FOR                 
   
   $xml.= "</familias>\n";
   echo $xml;
?>