<? include("config.php");         

//RECEBE PARÃMETRO                     
        

//QUERY 
$sql = "SELECT p.idProposta, c.nomeContato, DATE_FORMAT(p.dtcadProposta,'%d/%m/%Y %H:%i') as data, DATE_FORMAT(p.dtcadProposta,'%Y') as ano, p.statusProposta FROM proposta p inner join contatos c on (p.idContato=c.idContato) where c.idCliente='".$_REQUEST[id]."' And p.statusProposta!='T' order by idProposta desc";            
//EXECUTA A QUERY               
$sql = mysql_query($sql) or die (mysql_error());       

$row = mysql_num_rows($sql);    
//VERIFICA SE VOLTOU ALGO 

	

   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   
   //PERCORRE ARRAY    
	   $xml .= "<cidade>\n";     
      $xml .= "<codigo>0</codigo>\n";                  
      $xml .= "<descricao>Proposta ainda não foi emitida!</descricao>\n";         
      $xml .= "</cidade>\n";
	   for($i=0; $i<$row; $i++) {  
      $codigo    = mysql_result($sql, $i, "idProposta"); 
	  $descricao = mysql_result($sql, $i, "nomeContato");
	  $ano = mysql_result($sql, $i, "ano");
	  $total = mysql_result($sql, $i, "statusProposta");
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$codigo."</codigo>\n";                  
      $xml .= "<descricao>".$codigo."/".$ano." (".labelStatusProposta($total).")</descricao>\n";         
      $xml .= "</cidade>\n";    

	   
   }
   $xml.= "</cidades>\n";
   
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
                                               

//PRINTA O RESULTADO  
echo $xml;
mysql_free_result($sql);             
?>
