<? include("config.php");         
//RECEBE PARÃMETRO                     
//QUERY 
$sql = "SELECT eo.id, f.nome, e.codigo, eo.inicio, eo.fim, eo.status FROM equipamento_obra eo inner join equipamento e on (e.id=eo.equipamento) left join obra o on (o.id=eo.obra) left join familia f on (f.id=e.familia) where ";
$sql .="(o.idProposta='".$_REQUEST[id]."' And eo.inicio <= '".dataSql($_REQUEST[dt1])."' And eo.fim >= '".dataSql($_REQUEST[dt2])."')";
$sql .=" or (o.idProposta='".$_REQUEST[id]."' And eo.inicio <= '".dataSql($_REQUEST[dt2])."' And eo.fim = '' And eo.status='a')";
$sql .=" or (o.idProposta='".$_REQUEST[id]."' And eo.fim between '".dataSql($_REQUEST[dt1])."' and '".dataSql($_REQUEST[dt2])."') ";
$sql .="or (o.idProposta='".$_REQUEST[id]."' And eo.inicio <= '".dataSql($_REQUEST[dt2])."' And eo.status='a')";
$sql .="or (o.idProposta='".$_REQUEST[id]."' And eo.inicio <= '".dataSql($_REQUEST[dt2])."' And eo.fim >= '".dataSql($_REQUEST[dt2])."' And eo.status='b')"; 
$sql .= "order by nome, codigo";            
//EXECUTA A QUERY               
$sql = mysql_query($sql) or die (mysql_error());       

$row = mysql_num_rows($sql);    
//VERIFICA SE VOLTOU ALGO 

	

   //XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   
   //PERCORRE ARRAY    
	   
	   for($i=0; $i<$row; $i++) {  
      $codigo    = mysql_result($sql, $i, "id"); 
	  $descricao = mysql_result($sql, $i, "nome");
	  $total = mysql_result($sql, $i, "codigo");
	  $inicio = mysql_result($sql, $i, "inicio");
	  $fim = mysql_result($sql, $i, "fim");
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$codigo."</codigo>\n";                  
      $xml .= "<descricao>".$descricao." (".$total.") ".$inicio." ".$fim."</descricao>\n";         
      $xml .= "</cidade>\n";    

	   
   }
   $xml.= "</cidades>\n";
   
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
                                               

//PRINTA O RESULTADO  
echo $xml;
mysql_free_result($sql);             
?>
