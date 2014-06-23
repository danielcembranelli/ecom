// JavaScript Document
function ValidaAddCliente(form){
	var erro =0;
	var msg = '';
	var cnpj = form.Cli_CGC.value;
	
		if(cnpj == ''){
			erro++;
			msg += ' - CNPJ\n'; 
		}
		
		if(erro>0){
			alert('Verifique os seguintes campos:\n'+msg+'Obrigado!');
			return false
		} else {
			return true
		}	
}
function vcnpj( c ) {

     var numeros, digitos, soma, i, resultado, pos, tamanho, digitos_iguais, cnpj = c.value.replace(/\D+/g, '');
     digitos_iguais = 1;
	 if(cnpj.length>0){
		
		if (cnpj.length != 14) 
				{
					 alert('CNPJ inválido');
					 c.focus();
					 return false;
					 }
	
		 for (i = 0; i < cnpj.length - 1; i++)
			   if (cnpj.charAt(i) != cnpj.charAt(i + 1))
					 {
					 digitos_iguais = 0;
					 break;
					 }
		 if (!digitos_iguais)
			   {
			   tamanho = cnpj.length - 2
			   numeros = cnpj.substring(0,tamanho);
			   digitos = cnpj.substring(tamanho);
			   soma = 0;
			   pos = tamanho - 7;
			   for (i = tamanho; i >= 1; i--)
					 {
					 soma += numeros.charAt(tamanho - i) * pos--;
					 if (pos < 2)
						   pos = 9;
					 }
			   resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			   if (resultado != digitos.charAt(0))
	{
					 alert('CNPJ inválido');
					 c.focus();
					 return false;
					 }
	
			   tamanho = tamanho + 1;
			   numeros = cnpj.substring(0,tamanho);
			   soma = 0;
			   pos = tamanho - 7;
			   for (i = tamanho; i >= 1; i--)
					 {
					 soma += numeros.charAt(tamanho - i) * pos--;
					 if (pos < 2)
						   pos = 9;
					 }
			   resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			   if (resultado != digitos.charAt(1)){
					 alert('CNPJ inválido');
					 c.focus();
					 return false;
					 }
			   else {
		
				$.post("_ValidaCliente.php",{CNPJ:c.value}, function(data){
					if(data!='NOVO'){
						alert('ATENÇÃO\nCliente "'+data+'" já cadastrado no sistema.\nCadastro não autorizado, entre em contato com a Gerencia Comercial.\nObrigado!');
						c.value='';
						c.focus();
					}
		});
				}
			   }
		 else{
			   alert('CNPJ inválido');
			   c.focus();
			   return false;
			   }
	 }
}
