// JavaScript Document
function ValidaAddCliente(form){
	var objRadio = form.Cli_TIPO;
    for(i=0; i < objRadio.length; i++ ) {
        if (objRadio[i].checked == true)
		 var TIPO = objRadio[i].value;
    }
	
	if(TIPO=='J'){
	var erro =0;
	var msg = '';
	var cnpj = form.Cli_CGC.value;
	//var contato = new Number(form.idContato.value);
		if(cnpj == ''){
			erro++;
			msg += ' - CNPJ\n'; 
		}
		//if(contato==0){
			//erro++;
			//msg += ' - Contato\n'; 
		//}
		if(erro>0){
			alert('Verifique os seguintes campos:\n'+msg+'Obrigado!');
			return false
		} else {
			return true
		}
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
function CarregaXMLFamilia(id){
		document.teamworkAtendimento.familia.options.length = 1;
	    idOpcao  = document.getElementById("opcoes");
		idOpcao.innerHTML = "Carregando...!"; 
		$.get("xmlFamilia.php",{Master:id}, function(data){
			processXML(data);
		}); 
}
function processXML(obj){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("familia");
      
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//contéudo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
			
	        idOpcao.innerHTML = "--Selecione uma das opções abaixo--";
			
			//cria um novo option dinamicamente  
			var novo = document.createElement("option");
			    //atribui um ID a esse elemento
			    novo.setAttribute("id", "opcoes");
				//atribui um valor
			    novo.value = codigo;
				//atribui um texto
			    novo.text  = descricao;
				//finalmente adiciona o novo elemento
				document.teamworkAtendimento.familia.options.add(novo);
		 }
	  }
	  else {
	    //caso o XML volte vazio, printa a mensagem abaixo
		idOpcao.innerHTML = "-- Sem familia --";
	  }	  
   }
   
   function SubmitRelatorio(){
	document.users.action='Relatorio.php';
	document.users.target='_blank';
	document.users.submit();
}
///FUNCAO DE FORMA DE PROPOSTA
function MontaFormaProposta(tipo){
	if(tipo=='A'){
		document.getElementById("FORMULARIO").style.display='none';
		document.getElementById("ARQUIVO").style.display='block';
	} else {
		document.getElementById("FORMULARIO").style.display='block';
		document.getElementById("ARQUIVO").style.display='none';
	}
}
function FuncaoXML(obj,form){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("cidade");
      document.getElementById(form).options.length = 1;
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//contéudo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("descricao")[0].firstChild.nodeValue;
			
	        //idOpcao.innerHTML = "--Selecione uma das opções abaixo--";
			
			//cria um novo option dinamicamente  
			var novo = document.createElement("option");
			    //atribui um ID a esse elemento
			    novo.setAttribute("id", "opcoes");
				//atribui um valor
			    novo.value = codigo;
				//atribui um texto
			    novo.text  = descricao;
				//finalmente adiciona o novo elemento
				document.getElementById(form).options.add(novo);
				//document.addMercadoria.products_atributo.options.add(novo);
		 }
	  }
	  else {
		  alert('Retorno Vazio');
	    //caso o XML volte vazio, printa a mensagem abaixo
		//idOpcao.innerHTML = "--Sem complemento para o destino--";
	  }	  
}
function CarregaXMLFamiliaMapaES(id){
		$.get("xmlFamiliaMapaES.php",{Master:id}, function(data){
			//processXML(data);
			//alert(data);
			
			FuncaoXML(data,'midFEquipamento')
		}); 
}
function ValidaEmail(){
	email = document.Contatos.email.value
$.post("xmlContatoEmail.php",{id:email}, function(data){
			Campo = data;	
	});
	if(Campo>0){
			alert('ATENÇÃO\n E-mail já cadastrado em nossa base de dados');
			returno= false
		} else {
			returno= true
		}
		
}
function listaRegiaoEstado(){
	//alert($('#formfamilia').serialize());
	$.post("xmlRegiaoUF.php",$('#formREGIAO').serialize(), function(data){
		FuncaoXML(data,'UF')
		document.getElementById('CIDADE').options.length=1;
		document.getElementById('BAIRRO').options.length=1;
		});   
}
function listaRegiaoCidade(){
	//alert($('#formfamilia').serialize());
	$.post("xmlRegiaoCidade.php",$('#formREGIAO').serialize(), function(data){
		FuncaoXML(data,'CIDADE')
		document.getElementById('BAIRRO').options.length=1;
		});   
}
function listaRegiaoBairro(){
	//alert($('#formfamilia').serialize());
	$.post("xmlRegiaoBairro.php",$('#formREGIAO').serialize(), function(data){
		FuncaoXML(data,'BAIRRO')
		});   
}
//Função de Calculo de Horas
function AtualizaSubtotal(produto,frtotal){
	var qtda = new Number(document.getElementById('q'+produto).value);
	var valor = new Number(document.getElementById('vl'+produto).value);
	document.getElementById('st'+produto).value = (qtda*valor).toFixed(2);
	if(frtotal=='S'){
		total();
		//totalCompra();
	}

}
function total(){
	soma=0;
if (!document.getElementsByTagName){ return; }
			var anchors = document.getElementsByTagName('input');
			// loop through all anchor tags
			
		for (var i=0; i<anchors.length; i++){
			var anchor = anchors[i];
			var relAttribute = String(anchor.getAttribute('caixa'));
			if(relAttribute=='SUBTOTAL'){
				soma += new Number(anchor.value)
			}
			}
			
			//if(document.addMercadoria.custoEnvio.value!=''){
				//soma += new Number(document.addMercadoria.custoEnvio.value);
			//}
			//if(document.addMercadoria.custoAdicional.value!=''){
				//soma += new Number(document.addMercadoria.custoAdicional.value);
			//}

			document.getElementById('total').value=soma.toFixed(2);

}
//Cadastro de Horas De Equipamento
function carregaContrato(id){
	ct = id.split('/');
	id = ct[0];
	$.get("infoContrato.php",{idProposta:id}, function(data){
		dt = data.split('|');
		document.frmObra.cliente.value=dt[0];
		document.frmObra.endereco.value=dt[1];
	});   
}
function FiltraPeriodo(){
	id = document.frmObra.idProposta.value
	dt1 = document.frmObra.dtinicio.value
	dt2 = document.frmObra.dtfinal.value
	ct = id.split('/');
	id = ct[0];
	$.get("xmlEqptoObra.php",{id:id,dt1:dt1,dt2:dt2}, function(data){
		FuncaoXML(data,'idEo');
	});
	$.get("xmlEqptoProposta.php",{id:id}, function(data){
		FuncaoXML(data,'idPe');
	});
}
function FichaPeriodoEqpto(){
	$('#FormularioDeDias').html("Carregando Aguarde...<img src='jquery-autocomplete/demo/indicator.gif'>");
		idPe= document.frmObra.idPe.value
		idEo= document.frmObra.idEo.value
		dt1 = document.frmObra.dtinicio.value
		dt2 = document.frmObra.dtfinal.value
		$.get("frmPeriodoEqpto.php",{id:id,dt1:dt1,dt2:dt2,idEo:idEo,idPe:idPe}, function(data){
			$("#FormularioDeDias").empty();
			$("#FormularioDeDias").append(data);
		});
}

function SalvaHoraMedicao(){
	$.post("_SalvaPeriodoEqpto.php",$("#downloadfileteamwork").serialize(), function(data){
		alert('Operação Realizada com Sucesso!');
		$("#FormularioDeDias").empty();
		$("#FormularioDeDias").append('');
	});
}

// Medicao

function FichaPeriodoEqptoMedicao(){
	$('#FormularioDeDias').html("Carregando Aguarde...<img src='jquery-autocomplete/demo/indicator.gif'>");
		$.get("frmPeriodoEqptoMedicao.php",$("#frmMedicao").serialize(), function(data){
			//$('#FormularioDeDias').html(data);
			$("#FormularioDeDias").empty();
			$("#FormularioDeDias").append(data);
		});
}
//Subtotal
function TotalDesconto(){
	soma=0;
if (!document.getElementsByTagName){ return; }
			var anchors = document.getElementsByTagName('input');
			// loop through all anchor tags
		for (var i=0; i<anchors.length; i++){
			var anchor = anchors[i];
			var relAttribute = String(anchor.getAttribute('tipo'));
			if(relAttribute=='desconto'){
				preco=anchor.value.replace('.','');
				preco=preco.replace(',','.');
				soma += new Number(preco)
			}
			}
			
		document.frmObra.vltotalDesconto.value=soma.toFixed(2);
		TotalMedicao()
}
function TotalCusto(){
	soma=0;
if (!document.getElementsByTagName){ return; }
			var anchors = document.getElementsByTagName('input');
			// loop through all anchor tags
		for (var i=0; i<anchors.length; i++){
			var anchor = anchors[i];
			var relAttribute = String(anchor.getAttribute('tipo'));
			if(relAttribute=='custo'){
				preco=anchor.value.replace('.','');
				preco=preco.replace(',','.');
				soma += new Number(preco)
			}
			}
			
		document.frmObra.vltotalCusto.value=soma.toFixed(2);
		TotalMedicao();
}

function TotalMedicao(){
	custo = Number(document.frmObra.vltotalCusto.value)
	desconto = Number(document.frmObra.vltotalDesconto.value)
	horas = Number(document.frmObra.vltotalHoras.value);	
	total = (custo+horas)-desconto;	
	document.frmObra.vltotalFatura.value=Number(total)
}

function SomaTotalHoras(){
	soma=0;
if (!document.getElementsByTagName){ return; }
			var anchors = document.getElementsByTagName('input');
			// loop through all anchor tags
		for (var i=0; i<anchors.length; i++){
			var anchor = anchors[i];
			var relAttribute = String(anchor.getAttribute('tipo'));
			if(relAttribute=='hora'){
				preco=anchor.value
				soma += new Number(preco)
			}
			}
		document.frmObra.TotalDeHoras.value=soma.toFixed(2);
}
function DivideTotalHoras(valor,tipo,campo){
	Roleta = 0;
	TotaldeCampos=0;
	TotalDoInput=0;
	ValorTotal = new Number(valor);
	
		if (!document.getElementsByTagName){ return; }
			var anchors = document.getElementsByTagName('input');
			// loop through all anchor tags
		for (var i=0; i<anchors.length; i++){
			var anchor = anchors[i];
			var relAttribute = String(anchor.getAttribute(tipo));
			if(relAttribute==campo){
				TotaldeCampos += new Number(1)
			}
		}
		
		Divisao = new Number(ValorTotal/TotaldeCampos);
		ValorDoInput  = Divisao.toFixed(2)
		
		if (!document.getElementsByTagName){ return; }
			var anchors = document.getElementsByTagName('input');
			// loop through all anchor tags
		for (var i=0; i<anchors.length; i++){

			var anchor = anchors[i];
			var relAttribute = String(anchor.getAttribute(tipo));
			if(relAttribute==campo){
				Roleta++;
				TotalDoInput+=new Number(ValorDoInput);
				if(Roleta==TotaldeCampos){
					if(TotalDoInput<ValorTotal){
					//Diferenca = new Number(ValorTotal-TotalDoInput)	
					//ValorDoInput = new Number(ValorDoInput+Diferenca);
					}
					//alert(new Number(ValorTotal-TotalDoInput));
				}
				anchor.value=new Number(ValorDoInput);

			}
		}
		if(TotalDoInput!=ValorTotal){
			alert('Atenção\nNecessário correção manual');	
		}
		
		SomaTotalHoras();
		//document.frmObra.TotalDeHoras.value=soma.toFixed(2);
}
function PreencheClausula(CLAUSULA,GRUPO){
$.get("_preencheClausula.php",{id:CLAUSULA}, function(data){
document.getElementById('idc'+GRUPO).value=CLAUSULA;
document.getElementById('c'+GRUPO).value=data;
})
}