<?php
include("Config.php"); 
$arquivo ="evento.csv";
$fp = fopen($arquivo, "r"); 
while ($data = fgetcsv($fp, filesize($arquivo), ";")) { 
    $table[] = $data; 
} 
fclose($fp); 

// imprime uma tabelinha com esses dados do arquivo csv 
$data = date("Y-m-d"); 

foreach ($table as $row) { 
echo $row[0];
echo "<br>";
echo $row[1];
echo "<br>";
echo $row[2];
echo "<br>";
	$sqlUsuario = mysql_query("SELECT A.idUsuario
	FROM usuarios A
	INNER JOIN grupo B ON ( A.grupoUsuario = B.idGrupo ) where A.grupoUsuario = '3'
	ORDER BY A.idUsuario");
	while ($sU = mysql_fetch_array($sqlUsuario)){
	echo $sU[idUsuario];
	echo "<br>";
	
	
	$sqlIncluir = mysql_query("Insert into calendario (`idUsuario`,`dataCal`,`tipoCal`,`arqFormulario`,`txtCal`) values ('$sU[idUsuario];','$row[0]','F','$row[2]','$row[1]')") or die ("Could not connect to database: ".mysql_error());
	
	}

}



?>