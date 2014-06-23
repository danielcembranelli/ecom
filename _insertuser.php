<script language="JavaScript">

   function Dados(valor) {
      //verifica se o browser tem suporte a ajax
	  try {
         ajax = new ActiveXObject("Microsoft.XMLHTTP");
      } 
      catch(e) {
         try {
            ajax = new ActiveXObject("Msxml2.XMLHTTP");
         }
	     catch(ex) {
            try {
               ajax = new XMLHttpRequest();
            }
	        catch(exc) {
               alert("Esse browser não tem recursos para uso do Ajax");
               ajax = null;
            }
         }
      }
	  //se tiver suporte ajax
	  if(ajax) {
	     //deixa apenas o elemento 1 no option, os outros são excluídos
		 document.getElementById("idItem").options.length = 1;
	     
		 idOpcao  = document.getElementById("opcoes");
		 
	     ajax.open("POST", "xml_usuario.php", true);
		 ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		 
		 ajax.onreadystatechange = function() {
            //enquanto estiver processando...emite a msg de carregando
			if(ajax.readyState == 1) {
			   idOpcao.innerHTML = "Carregando...!"; 
			   document.getElementById("idItem").size=1;  
	        }
			//após ser processado - chama função processXML que vai varrer os dados
            if(ajax.readyState == 4 ) {
			   if(ajax.responseXML) {
			      processXML(ajax.responseXML);
			   }
			   else {
			       //caso não seja um arquivo XML emite a mensagem abaixo
				   idOpcao.innerHTML = "--Selecione um Grupo--";
			   }
            }
         }
		 //passa o código do estado escolhido
	     var params = "tipo="+valor;
         ajax.send(params);
      }
   }
   
   function processXML(obj){
      //pega a tag cidade
      var dataArray   = obj.getElementsByTagName("cidade");
      
	  //total de elementos contidos na tag cidade
	  if(dataArray.length > 0) {
	     //percorre o arquivo XML paara extrair os dados
         for(var i = 0 ; i < dataArray.length ; i++) {
            var item = dataArray[i];
			//contéudo dos campos no arquivo XML
			var codigo    =  item.getElementsByTagName("codigo")[0].firstChild.nodeValue;
			var descricao =  item.getElementsByTagName("nome")[0].firstChild.nodeValue;
			
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
				document.getElementById("idItem").options.add(novo);
				document.getElementById("idItem").size++;
		 }
	  }
	  else {
	    //caso o XML volte vazio, printa a mensagem abaixo
		idOpcao.innerHTML = "--Não é necessário --";
	  }	  
   }
function Cargo(idCargo,Nome)
{
alert(idCargo);
document.swiftform.idCargo.value=idCargo;
document.swiftform.Cargo.value=Nome;
}   
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
								  <tr height="8">
					<td><img src="themes/admin_default/space.gif" height="8" width="1" border="0" /></td>
				  </tr>
					<tr>
						<td width="5" valign="middle" align="left"><img src="themes/admin_default/doublearrowsnav.gif"></td>
						<td width="100%"><span class="smalltext">&nbsp;<a href="?_m=core&amp;_a=manageusers" title="News">Usu&aacute;rios</a> &raquo; <a href="?_m=core&amp;_a=insertuser" title="Insert">Inserir Usu&aacute;rio </a></span></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr height="1">
						<td colspan="2" bgcolor="#CCCCCC"><img src="themes/admin_default/space.gif" height="1" width="1"></td>
					</tr>
					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>

					<tr>
						<td colspan="2"><span class="smalltext"></span></td>
					</tr>

					<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
										<tr>
						<td colspan="2">
						
						<form name="swiftform" id="swiftform" action="index.php" method="POST">
<table cellpadding="0" cellspacing="0" border="0" width="100%" class="tborder" style="">
<thead>
<tr>
<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>
<td class="tcat" width="100%" colspan="" align="left" nowrap>Detalhes do Usu&aacute;rio </td>
</tr>
</thead>


<tbody>

<tr>
<td class="contenttableborder" colspan="2">

<table border="0" cellpadding="3" cellspacing="1" width="100%">
<tr class="descrow" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="descrow" align="left" valign="top" colspan="5" >Informa&ccedil;&otilde;es Gerais  </td>
</tr>

<tr class="row2" title="" onmouseover="" onmouseout="" onclick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Nome</span></td>
<td class="row2" align="left" valign="top" colspan="" width=""><label for="yperm[perm_canviewregister]">
<input type="text" class="swifttext" name="NomeUsuario" id="NomeAuditor" size="30" />
</label>
<label for="nperm[perm_canviewregister]"></label></td>
</tr>

<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row1" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">E-mail</span></td>
<td class="row1" align="left" valign="top" colspan="" width=""><input type="text" class="swifttext" name="EmailUsuario" id="NomeAuditor2" size="30" /></td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Telefone</span></td>
<td class="row2" align="left" valign="top" colspan="" width=""><input type="text" class="swifttext" name="TelefoneUsuario" id="NomeAuditor3" size="30" /></td>
</tr>
<tr class="descrow" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="descrow" align="left" valign="top" colspan="5" width="50%">Acesso  </td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td width="50%" colspan="" align="left" valign="top"><span class="tabletitle">Login </span></td>
<td align="left" valign="top" colspan="" width="">
<input type="text" class="swifttext" name="LoginUsuario" id="email" size="30" /></td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Senha </span></td>
<td class="row2" align="left" valign="top" colspan="" width=""><input type="text" class="swifttext" name="SenhaUsuario" id="NomeAuditor5" size="30" /></td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td width="50%" colspan="" align="left" valign="top"><span class="tabletitle">Senha(Confirma&ccedil;&atilde;o) </span></td>
<td width="" colspan="" align="left" valign="top" class="row1"><input type="text" class="swifttext" name="ConfirmaSenha" id="NomeAuditor6" size="30" /></td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Grupo</span></td>
<td class="row2" align="left" valign="top" colspan="" width="">
<SELECT name="idGrupo" class="swiftselect" onChange="Dados(this.value);">
<? 
$sqlAuditor = mysql_query("Select idGrupo, titGrupo from grupo_usuario order by titGrupo");
while ($sA = mysql_fetch_array($sqlAuditor)){ 
?>
   <OPTION value="<?=$sA[idGrupo]?>"><?=$sA[titGrupo]?></OPTION>
<? } ?>   
</SELECT></td>
</tr>
<tr class="row2" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td class="row2" align="left" valign="top" colspan="" width="50%"><span class="tabletitle">Itens</span></td>
<td class="row2" align="left" valign="top" colspan="" width="">
<SELECT name="idItem[]" multiple="multiple" class="swiftselect" id="idItem">
   <OPTION id="opcoes"></OPTION>

</SELECT></td>
</tr>
<tr class="row1" title="" onMouseOver="" onMouseOut="" onClick="" id="" style="">
<td align="center" valign="middle" colspan="2" width="50%"><input type="submit" name="submitbutton" class="yellowbuttonbigbig" value="Inserir Usu&aacute;rio" /></td>
</tr>
</table>
</td>
</tr>
</tbody>
</table>

<input type="hidden" name="_m" value="core"/>
<input type="hidden" name="_a" value="manageusers"/>
<input type="hidden" name="step" value="1"/>

</form>
					</td>
					</tr>
										<tr height="4">
						<td colspan="2"><img src="themes/admin_default/space.gif" height="4" width="1"></td>
					</tr>
					<tr>
						<td colspan="2"><table width="100%"  border="0" cellspacing="0" cellpadding="0"><tr>
						<td width="16"><a href="index.php?_m=news&_a=managenews" title="Back"><img src="themes/admin_default/icon_back.gif" border="0"></a></td>
						<td><span class="smalltext"><a href="index.php?_m=form&_p=managenews" title="Back">&nbsp;Voltar</a></span></td>
						</tr></table>

					</tr>
									</table>