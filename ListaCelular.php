<?
include("Config.php");
$i=1;


function sendMultiple($account,$code,$type,$msg_list){

        // Prepara os dados para HTTP POST
        $postdata  = "dispatch=sendMultiple&";
        $postdata .= "account=".$account."&";
        $postdata .= "code=".$code."&";
        $postdata .= "type=".$type."&";
        $postdata .= "list=".$msg_list;

        $host = "system.human.com.br";
        $uri = "/GatewayIntegration/msgSms.do";
        $da = fsockopen($host, 80, $errno, $errstr);

        if (!$da && $errno != 0) {
           echo "$errstr ($errno)<br/>\n";
           echo $da;
        } else {
                $response = "";
                $output ="POST $uri  HTTP/1.0\r\n";
                $output.="Host: $host\r\n";
                $output.="User-Agent: PHP Script\r\n";
                $output.="Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1\r\n";
                $output.="Content-Length: ".strlen($postdata)."\r\n";
                $output.="Connection: close\r\n\r\n";
                $output.=$postdata;
                fwrite($da, $output);
                while (!feof($da)) $response.=fgets($da, 128);
                $response=split("\r\n\r\n",$response);
                $header=$response[0];
                $responsecontent=$response[1];
                if(!(strpos($header,"Transfer-Encoding: chunked")===false)){
                        $aux=split("\r\n",$responsecontent);
                        for($i=0;$i<count($aux);$i++)
                        if($i==0 || ($i%2==0))
                           $aux[$i]="";
                        $responsecontent=implode("",$aux);
                } //if
                return chop($responsecontent);
        } //else
}

$Sql = mysql_query("SELECT idContato, nomeContato, dddfone1, nrfone1, dddfone2, nrfone2, dddcelular, nrcelular FROM contatos where (nrcelular !='' And statusContato='A') or (nrfone1 Like '6%' And statusContato='A') or (nrfone1 Like '7%' And statusContato='A') or (nrfone1 Like '8%' And statusContato='A') or (nrfone1 Like '9%' And statusContato='A') or (nrfone2 Like '6%' And statusContato='A') or (nrfone2 Like '7%' And statusContato='A') or (nrfone2 Like '8%' And statusContato='A') or (nrfone2 Like '9%' And statusContato='A')") or die (mysql_error());
while ($dom = mysql_fetch_array($Sql)){
	echo '<b>'.$dom[nomeContato].'</b><br>';
	if($dom[nrfone1][0]>=6){
	echo $i++.' - '.ereg_replace("[' '-./ t]",'',$dom[dddfone1].$dom[nrfone1]).'<br>';
	//$msg_list  .= "55".ereg_replace("[' '-./ t]",'',$dom[dddfone1].$dom[nrfone1]).";ESCAD Rental agora mais perto de você, sempre com maiores vantagens. Alugue equipamentos 0800.770.5005;".date("Ymd")."1".$dom[idContato]."\n";
	}
	if($dom[nrfone2][0]>=6){
	echo $i++.' - '.ereg_replace("[' '-./ t]",'',$dom[dddfone2].$dom[nrfone2]).'<br>'; 
	//$msg_list  .= "55".ereg_replace("[' '-./ t]",'',$dom[dddfone2].$dom[nrfone2]).";ESCAD Rental agora mais perto de você, sempre com maiores vantagens. Alugue equipamentos 0800.770.5005;".date("Ymd")."2".$dom[idContato]."\n";
	}
	if($dom[nrcelular][0]>=6){
	echo $i++.' - '.ereg_replace("[' '-./ t]",'',$dom[dddcelular].$dom[nrcelular]).'<br>';
	//$msg_list  .= "55".ereg_replace("[' '-./ t]",'',$dom[dddcelular].$dom[nrcelular]).";ESCAD Rental agora mais perto de você, sempre com maiores vantagens. Alugue equipamentos 0800.770.5005;".date("Ymd")."3".$dom[idContato]."\n";
	}
	//echo $data = CalculaDias($dom[tipoprevisaoProposta],$dom[dtini],$dom[previsaoProposta]);
	
	//echo $dom[dtini].' '.CalculaDias($dom[tipoprevisaoProposta],$dom[dtini],$dom[previsaoProposta]).'<br>';
	//if($dom[dtini]!='00/00/0000'){
		//$AlteraDataInicio = mysql_query("Update contatos set nextelContato='".$dom[nrfone2]."', dddfone2='', nrfone2='' where idContato='".$dom[idContato]."'");
	//}
}
//$msg_list  .= "551196472721;ESCAD Rental agora mais perto de você, sempre com maiores vantagens. Alugue equipamentos 0800.770.5005;".date("Ymd")."0001\n";
//$msg_list  .= "551176013260;ESCAD Rental agora mais perto de você, sempre com maiores vantagens. Alugue equipamentos 0800.770.5005;".date("Ymd")."0002\n";
//echo $msg_list;

//$response = sendMultiple("urocabral", "MkYxbyaFWb", "C", $msg_list);
?>
<br /><br />
<?
//echo $response;
?>
