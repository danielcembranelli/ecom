<? include("config.php");         

//RECEBE PARÃMETRO                     
        

//QUERY 
$sql = "SELECT idContato, nomeContato, cargoContato FROM contatos c where idCliente='".$_REQUEST[id]."' And statusContato='A' order by nomeContato";            
//EXECUTA A QUERY               
$sql = mysql_query($sql) or die (mysql_error());       

$row = mysql_num_rows($sql);    
//VERIFICA SE VOLTOU ALGO 

	

   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   
   //PERCORRE ARRAY    
	   
	   for($i=0; $i<$row; $i++) {  
      $codigo    = mysql_result($sql, $i, "idContato"); 
	  $descricao = mysql_result($sql, $i, "nomeContato");
	  $total = mysql_result($sql, $i, "cargoContato");
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$codigo."</codigo>\n";                  
      $xml .= "<descricao>".$descricao." (".$total.")</descricao>\n";         
      $xml .= "</cidade>\n";    

	   
   }
   $xml.= "</cidades>\n";
   
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
                                               

//PRINTA O RESULTADO  
echo $xml;
mysql_free_result($sql);             
?>
