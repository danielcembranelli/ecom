<? include("Config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="all" href="staff/index.css" />

<title>Relatório de Familia</title>
</head>

<body>
<?

for($i=0;$i<count($_POST[ID]);$i++){
	
	$preco1 = str_replace("R$ ","",$_POST[PRECO1][$i]);
	$preco1 = str_replace(".","",$preco1);
	$preco1 = str_replace(",",".",$preco1);
		
	$preco2 = str_replace("R$ ","",$_POST[PRECO2][$i]);
	$preco2 = str_replace(".","",$preco2);
	$preco2 = str_replace(",",".",$preco2);	
	
	$preco3 = str_replace("R$ ","",$_POST[PRECO3][$i]);
	$preco3 = str_replace(".","",$preco3);
	$preco3 = str_replace(",",".",$preco3);
	

	$insereFamilia = mysql_query("Update preco set valor1Preco='".$preco1."', valor2Preco='".$preco2."', valor3Preco='".$preco3."' where idPreco='".$_POST[ID][$i]."' Limit 1") or die (mysql_error());
	
}
?>
<center>Operação realizada com sucesso!!</center>
</body>
</html>
