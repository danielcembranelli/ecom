<?php

header("Content-Type: text/html;  charset=ISO-8859-1",true);
	// PHP5 Implementation - uses MySQLi.
	// mysqli('localhost', 'yourUsername', 'yourPassword', 'yourDatabase');
$db = mysql_connect("hostplaza.com.br", "hostplaz_escad", "]IoK0zd9") or die (mysql_error()); 
mysql_select_db ("hostplaz_escad") or die("não foi possivel");

	
	if(!$db) {
		// Show error if we cannot connect.
		echo 'ERROR: Could not connect to the database.';
	} else {
		// Is there a posted query string?
		if(isset($_GET['q'])) {
			$queryString = $_GET['q'];
			
			// Is the string length greater than 0?
			
				// Run the query: We use LIKE '$queryString%'
				// The percentage sign is a wild-card, in my example of countries it works like this...
				// $queryString = 'Uni';
				// Returned data = 'United States, United Kindom';
				
				// YOU NEED TO ALTER THE QUERY TO MATCH YOUR DATABASE.
				// eg: SELECT yourColumnName FROM yourTable WHERE yourColumnName LIKE '$queryString%' LIMIT 10
				
				$query =mysql_query("SELECT idLegenda, nomeLegenda FROM legendas WHERE nomeLegenda LIKE '%$queryString%' And tipoLegenda = '".$_REQUEST[tipo]."' LIMIT 20");
				$n = mysql_num_rows($query);
				if($query) {
					// While there are results loop through them - fetching an Object (i like PHP5 btw!).
					while ($result = mysql_fetch_array($query)){
						// Format the results, im using <li> for the list, you can change it.
						// The onClick function fills the textbox with the result.
						$tel = explode('#',$result[telefonePaciente]);
						$cel = explode('#',$result[celularPaciente]);
						// YOU MUST CHANGE: $result->value to $result->your_colum
	         			echo "$result[idLegenda]#$result[nomeLegenda]\n";
						//echo "$result[nomePaciente]|$value\n";
	         		}
					mysql_free_result($query);

			} else {
				// Dont do anything.
			} // There is a queryString.
		} else {
			echo 'There should be no direct access to this script!';
		}
	}
?>