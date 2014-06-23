<?php 
include("config.php");
ini_set ('max_execution_time','999999999999999999999999999999999'); 
$fp = fopen('sql/amb.csv', "r");

while ($data = fgetcsv($fp, filesize('sql/amb.csv'), ";")) { 
    $table[] = $data; 
} 
fclose($fp); 


foreach($table as $row) {

	echo mysql_query('Insert into tabelaamb VALUES ("'.$row[0].'","'.$row[1].'","'.$row[2].'","'.$row[3].'","'.$row[4].'","'.$row[5].'");') or die (mysql_error());

echo $row[1].'<br>';

}
?>
