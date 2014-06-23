<?
$key = 'ABQIAAAARL4SRCG12qPC_Yw07z0ekBQ69F8f8UXA2mBZMfjklbF_0RycrRTCgNDBl8lPPgltOkbrsusfNFNwGg';
$endereco = 'Av. Presidente Vargas, 1.145 - Senador Valadares - Pará de Minas - MG';
?>
<head>
<script src=" http://maps.google.com/?file=api&v=3.x&key=<?=$key?>" type="text/javascript"></script>
<link href="http://www.grupoosper.com.br/css/estilos.css" type="text/css" rel="stylesheet" media="all">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css">
table.directions th {
background-color:#EEEEEE;
}
#directions td{
	font-size:10px !important;
}

#directions { float:left;}
</style>
<script type="text/javascript">
var map;
var gdir;
var geocoder = null;
var addressMarker;
function initialize() {
if (GBrowserIsCompatible()) {
gdir = new GDirections(map, document.getElementById("directions"));
GEvent.addListener(gdir, "load", onGDirectionsLoad);
GEvent.addListener(gdir, "error", handleErrors);
setDirections("<?=$endereco?>", "<?=$endereco?>", "pt_BR");
}
}
function setDirections(fromAddress, toAddress, locale) {
gdir.load("from: " + fromAddress + " to: " + toAddress ,{ "locale": locale });
}
function handleErrors(){
if (gdir.getStatus().code == G_GEO_UNKNOWN_ADDRESS) {
alert("Local não encontrado! \n Digite: 'Endereço, cidade, estado'");
} else if (gdir.getStatus().code == G_GEO_SERVER_ERROR) {
alert("A geocoding or directions request could not be successfully processed, yet the exact reason for the failure is not known.\n Error code: " + gdir.getStatus().code);
} else if (gdir.getStatus().code == G_GEO_MISSING_QUERY) {
alert("The HTTP q parameter was either missing or had no value. For geocoder requests, this means that an empty address was specified as input. For directions requests, this means that no query was specified in the input.\n Error code: " + gdir.getStatus().code);
} else if (gdir.getStatus().code == G_GEO_BAD_KEY) {
alert("Chave do google maps inválida!");
} else if (gdir.getStatus().code == G_GEO_BAD_REQUEST) {
alert("Local não encontrado! \n Digite: 'Endereço, cidade, estado'");
} else {
alert("Local não encontrado! \n Digite: 'Endereço, cidade, estado'");
}
}
function onGDirectionsLoad(){
// Use this function to access information about the latest load()
// results.

// e.g.
// document.getElementById("getStatus").innerHTML = gdir.getStatus().code;
// and yada yada yada...
}
</script>
</head>
<body onLoad="initialize()" onUnload="GUnload()">
<h2>Como Chegar?</h2>
<form action="#" onSubmit="setDirections(this.to.value, '<?=$endereco?>', 'pt_BR'); return false">
<table>
<tr>
<th align="right">
  Aonde você está?: 
</th>
<td align="right"><select name="to" id="to" onChange="setDirections(this.value, '<?=$endereco?>', 'pt_BR'); return false">
  <option>Selecione sua origem...</option>
  <option value="Belo Horizonte - MG">Belo Horizonte</option>
  <option value="Pitangui - MG">Pitangui</option>
  <option value="Papagaios - MG">Papagaios</option>
  <option value="Uberlandia - MG">Uberlandia</option>
  <option value="S&atilde;o Paulo - SP">S&atilde;o Paulo</option>
  <option value="Rio de Janeiro - RJ">Rio de Janeiro</option>
</select>  <input name="submit" type="submit" value="Como chegar" />
</td>
</tr>
</table>
</form>
<br/>
<table class="directions">
<tr>
<th>
Caminho
</th>
<th>
Mapa
</th>
</tr>
<tr>
<td valign="top">
<div id="directions" style="width: 200px; font-size:12px"></div>
</td>

<td valign="top">
<div id="map_canvas" style="width: 500px; height: 400px; "></div>
</td>

</tr>
</table>
</head>