<?
/**
 * gMaps Class
 *
 * Pega as informa��es de latitude, longitude e zoom de um endere�o usando a API do Google Maps
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 */
class gMaps {
	// Host do GoogleMaps
	private $mapsHost = 'maps.google.com';
	// Sua Google Maps API Key
	public $mapsKey = 'ABQIAAAARL4SRCG12qPC_Yw07z0ekBRqgqJMpTbcRHqZlxJXQaGgPIxcbBSm_kILujNlocyYFQ3jdsf9nL-V3g';

	function __construct($key = null) {
		if (!is_null($key)) {
			$this->mapsKey = $key;
		}
	}

	function carregaUrl($url) {
		if (function_exists('curl_init')) {
			$cURL = curl_init($url);
			curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($cURL, CURLOPT_FOLLOWLOCATION, true);
			$resultado = curl_exec($cURL);
			curl_close($cURL);
		} else {
			$resultado = file_get_contents($url);
		}

		if (!$resultado) {
			return false;
			//trigger_error('N�o foi poss�vel carregar o endere�o: <strong>' . $url . '</strong>');
		} else {
			return $resultado;
		}
	}

	function geoLocal($endereco) {
		$url = 'http://'. $this->mapsHost .'/maps/geo?output=csv&key='. $this->mapsKey .'&q='. urlencode($endereco);
		$dados = $this->carregaUrl($url);
		list($status, $zoom, $latitude, $longitude) = explode(',', $dados);
		if ($status != 200) {
			return false;
			//trigger_error('N�o foi poss�vel carregar o endere�o <strong>"'.$endereco.'"</strong>, c�digo de resposta: ' . $status);
		}
		return array('lat' => $latitude, 'lon' => $longitude, 'zoom' => $zoom, 'endereco' => $endereco);
	}
	
}


?>

