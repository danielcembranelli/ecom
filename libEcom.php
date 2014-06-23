<?
function SalvaHoraMedicao($dtMe,$idPe,$idEo,$hreqptoMe,$hroperador1Me,$hroperador2Me,$hroperador3Me,$status){
	$verifica = mysql_query("Select idMe from medicao_equipamento where dtMe='".$dtMe."' And idEo='".$idEo."' Limit 1") or die (mysql_error());
	$n = mysql_num_rows($verifica);
	if($n>0){
		//Atualiza Produto	
		
		$Sql = mysql_query("Update medicao_equipamento set idPe='".$idPe."', idEo='".$idEo."', dtMe='".$dtMe."', hreqptoMe='".$hreqptoMe."', hroperador1Me='".$hroperador1Me."', hroperador2Me='".$hroperador2Me."', hroperador3Me='".$hroperador3Me."', statusMe='".$status."' where dtMe='".$dtMe."' And idEo='".$idEo."' Limit 1");
		
	} else {
		//Insere Produto
		$Sql = mysql_query("Insert into medicao_equipamento (`dtMe`,`idPe`,`idEo`, `hreqptoMe`, `hroperador1Me`, `hroperador2Me`, `hroperador3Me`, `statusMe`) VALUES ('".$dtMe."','".$idPe."','".$idEo."','".$hreqptoMe."','".$hroperador1Me."','".$hroperador2Me."','".$hroperador3Me."','".$status."')");
	}	
	
	echo $erro = mysql_error();
	if($erro!=''){
		echo '#ERROR: '.$erro;
	} else {
		echo '#SUCESSO';	
	}
}
function formatarCPF_CNPJ($campo, $formatado = true){
    //retira formato
    $codigoLimpo = ereg_replace("[' '-./ t]",'',$campo);
    // pega o tamanho da string menos os digitos verificadores
    $tamanho = (strlen($codigoLimpo) -2);
    //verifica se o tamanho do código informado é válido
    if ($tamanho != 9 && $tamanho != 12){
        return false;
    }
 
    if ($formatado){
        // seleciona a máscara para cpf ou cnpj
        $mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##';
 
        $indice = -1;
        for ($i=0; $i < strlen($mascara); $i++) {
            if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
        }
        //retorna o campo formatado
        $retorno = $mascara;
 
    }else{
        //se não quer formatado, retorna o campo limpo
        $retorno = $codigoLimpo;
    }
 
    return $retorno;
 
}

?>