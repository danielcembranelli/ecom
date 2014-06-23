<? 
include("Config.php");
include("libEcom.php");
	
	$vl = str_replace('.','',$_POST[CNPJ]);
	$vl = str_replace('-','',$vl);
	$vl = str_replace('/','',$vl);
	$Sql = mysql_query("SELECT Cli_CGC,Cli_Nome, Cli_Fantasia, Cli_Status FROM clientes c where (Cli_CGC='".$_POST[CNPJ]."') or (Cli_CGC='".formatarCPF_CNPJ($vl,false)."') or (Cli_CGC='".formatarCPF_CNPJ($vl,true)."')") or die (mysql_error());
	
	if(mysql_num_rows($Sql)>0){
	$dom = mysql_fetch_array($Sql);
		echo $dom[Cli_Nome];
	} else {
	echo 'NOVO';
	}
	
	

?>
