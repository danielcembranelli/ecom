<?
include('../Config.php');
require_once 'excel_reader2.php';
set_time_limit(180);
$data = new Spreadsheet_Excel_Reader("export2.xls");
echo $totalLinhas = $data->rowcount();
echo '<br>';
echo $totalColunas= $data->colcount();
 
for($i = 1; $i <=$totalLinhas; $i++){
	
		$email = $data->val($i,1);
		
		$sqlUsuario = mysql_query("SELECT idContato from contatos c where emailContato = '".$email."' And statusContato='A' ORDER BY nomeContato") or die ("Could not connect to database: ".mysql_error());
$sU = mysql_fetch_array($sqlUsuario);
		if($sU[idContato]>0){
			$insereFamilia = mysql_query("Update contatos set statusemailContato='E' where idContato='".$sU[idContato]."' Limit 1") or die (mysql_error());
		}
		if($sU[idContato]==''){
			$sqlUsuario = mysql_query("SELECT Cli_ID from clientes c where Cli_Email = '".$email."'") or die ("Could not connect to database: ".mysql_error());
$sU = mysql_fetch_array($sqlUsuario);
			if($sU[Cli_ID]>0){
				$insereFamilia = mysql_query("Update clientes set Cli_Statusemail='E' where Cli_ID='".$sU[Cli_ID]."' Limit 1") or die (mysql_error());
			}
		}

		
}
?>