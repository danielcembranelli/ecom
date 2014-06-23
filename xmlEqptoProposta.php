<? include("config.php");         
//RECEBE PARÃMETRO                     
//QUERY 
$sql = "SELECT pa.nrAditivo, pe.idPe, pe.fretedPe, L.nomeLegenda as nome1, L2.nomeLegenda as marca, L1.nomeLegenda as categoria, L3.nomeLegenda as modelo, pe.operadorPe, pe.valoroperadorPe, pe.precoPe, pe.combustivelPe, pe.valorcombustivelPe, pe.seguroPe, pe.valorseguroPe, pe.fretePe, pe.qtdaPe FROM proposta_equipamento pe left join proposta_aditivo pa on (pe.idAditivo=pa.idAditivo) left join familia A on (A.id=pe.idFamilia) LEFT JOIN legendas L ON ( A.nomeid = L.idLegenda) LEFT JOIN legendas L1 ON ( A.categoriaid = L1.idLegenda) LEFT JOIN legendas L2 ON ( A.marcaid = L2.idLegenda) LEFT JOIN legendas L3 ON ( A.modeloid = L3.idLegenda) left join obra o on (o.idProposta=pe.idProposta) where pe.statusPe='A' And pe.idProposta='".$_REQUEST[id]."' order by nome1, marca, categoria, modelo, pe.idAditivo";            
//EXECUTA A QUERY               
$sql = mysql_query($sql) or die (mysql_error());       

$row = mysql_num_rows($sql);    
//VERIFICA SE VOLTOU ALGO 
//XML
   $xml  = "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
   $xml .= "<cidades>\n";               
   //PERCORRE ARRAY    
while ($s = mysql_fetch_array($sql)){
      $xml .= "<cidade>\n";     
      $xml .= "<codigo>".$s[idPe]."</codigo>\n";                  
      $xml .= "<descricao>".$s[nome1]." ".$s[marca]." ".$s[modelo]." ".$s[categoria]." (R$ ".$s[precoPe].")";
	  if($s[nrAditivo]!=''){
	  $xml .= " Aditivo: ".$s[nrAditivo];         	  
	  }
	  $xml .= "</descricao>\n";         
      $xml .= "</cidade>\n";    
   }
   $xml.= "</cidades>\n";
   //CABEÇALHO
   Header("Content-type: application/xml; charset=iso-8859-1"); 
//PRINTA O RESULTADO  
echo $xml;
mysql_free_result($sql);             
?>
