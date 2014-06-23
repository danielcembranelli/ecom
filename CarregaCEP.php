<?
header("Content-Type: text/html;  charset=ISO-8859-1",true);
$CEP = explode('-',$_REQUEST[CEP]);
echo file_get_contents('http://cep.republicavirtual.com.br/web_cep.php?cep='.$CEP[0].$CEP[1].'&formato=javascript');
?>