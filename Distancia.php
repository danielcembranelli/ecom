<? include("Config.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
    <title>Distancias com roteiros e mapa entre cidades</title>
<body>

  </head>
  
  
 <div align=center> <h2>Distancias da Filial</h2>
  <form action="Distancia.php" method="post">

  <table>

   <tr>
   <th align="right">&nbsp;&nbsp;Para:&nbsp;</th>
   <td align="right"><input type="text" size="25" id="toAddress" value="<?=$_POST[to]?>" name="to" /></td>
 <td align="right"><input type=hidden value="pt" id="locale" name="locale">
    <input name="submit" type="submit" value="Roteiro" /></td></tr>
   <tr>
     <th align="right">&nbsp;</th>
     <td align="right">Exemplo : Salvador-BA</td>
     <td align="right">&nbsp;</td>
   </tr>
  </table><br /><br />
  <div align=center><strong><?=$_POST[to]?></strong></div>
</form>

<br/>

<?
if($_POST[to]!=''){
	
	$Sql = mysql_query("Select NOME_PATIO from patio where statusPatio='A' order by NOME_PATIO") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	
	$lines = file_get_contents('http://maps.google.com/maps?saddr='.urlencode($dom[NOME_PATIO]).'&daddr='.urlencode($_POST[to]).'&hl=en&z=1');
	$dados = split("distance:'", $lines);
	//print_r($dados);
	$dist  = split("'",$dados[1]);
	echo $dom[NOME_PATIO].': '.$dist[0].'<br>';
	
}
	
}
?>
</div>
  </body>
</html>
