// JavaScript Document
function ConfirmaSubmit()
{
			var OpcaoPlanoDeAcao=0;
			var SomaOpcoes=0;
			var SomaTotal=0;
			var txt ='';
		if (!document.getElementsByTagName){ return; }
			var anchors = document.getElementsByTagName('input');
			// loop through all anchor tags
			
		for (var i=0; i<anchors.length; i++){
			var anchor = anchors[i];
			var relAttribute = String(anchor.getAttribute('ppr'));
			
			if(relAttribute!='' && relAttribute!='null' && anchor.checked==true && anchor.value!=10)
			{
			//txt += "- "+anchor.checked+"\n";
			OpcaoPlanoDeAcao=1;
			}
			
			if(relAttribute!='' && relAttribute!='null' && anchor.checked==true)
			{
			//txt += "- "+anchor.checked+"\n";
			SomaOpcoes+=new Number(anchor.value);

			}
			
			if(relAttribute!='' && relAttribute!='null' && anchor.value==10)
			{
			var frmName = String(anchor.name);
			//var Str = String('this.swiftform.'+frmName+'[0].value')
			//alert(this.swiftform.r01[0].value);
			//if(
			//txt += "- "+anchor.checked+"\n";
			SomaTotal+=new Number(anchor.value);
			
			}
			
		}
		txt += "- "+SomaOpcoes+"\n";
		txt += "- "+SomaTotal+"\n";
		
		//var PORC1 = 100/SomaTotal;
		//var TOTAL1 = SomaOpcoes*PORC1;
		//divconceito.innerHTML = TOTAL1.toFixed(1)+" %";
		
		//alert(txt);
		
		if(OpcaoPlanoDeAcao==1)
		{
		MontaJanela()
		document.getElementById("divconfirma").style.display="block";
		} else {
		document.swiftform.submit();
		}
}
function SubmitCancelar()
{
	document.getElementById("divconfirma").style.display="none";
}
function SubmitBotao(Valor)
{
	document.swiftform._p.value=Valor;
	document.swiftform.submit();
}
function MontaJanela()
{
	//document.write("Teste");
	var html ='<table cellpadding="0" cellspacing="0" border="0" width="400" class="tborder" style="">';
		html +='<thead>';
		html +='<tr>';
		html +='<td class="tcat" width="1" align="left" nowrap><img src="themes/admin_default/space.gif" width="4" height="21"></td>';
		html +='<td class="tcat" width="100%" colspan="" align="left" nowrap>Alerta</td>';
		html +='</tr>';
		html +='</thead>';
		html +='<tbody>';
		html +='<tr>';
		html +='<td class="row1" colspan="2" height="40" align="center">';
		html +='<span class="tabletitle">Você deseja preencher o Plano de Ação?</span>';
		html +='</td>';
		html +='</tr>';
		html +='<td class="row1" colspan="2" height="60" align="center">';
		html +='<input type="button" name="submitbutton" class="yellowbuttonbig" onclick="SubmitBotao(\'S\');" value="Sim" />&nbsp;<input type="button" name="submitbutton" class="yellowbuttonbig" value="Não" onclick="SubmitBotao(\'N\');" />&nbsp;<input type="button" name="submitbutton" class="bluebuttonbig" onclick="SubmitCancelar()" value="Cancelar" />';
		html +='</td>';
		html +='</tr>';
		html +='</tbody>';
		html +='</table>';
		html +='';
		
		///var cp = document.createElement(html);
		//document.body.insertBefore(cp);
		
		var newRadioButton = document.createElement("div");
		newRadioButton.setAttribute("id", "divconfirma");
    	document.body.insertBefore(newRadioButton);
		document.getElementById("divconfirma").innerHTML = html;
}
