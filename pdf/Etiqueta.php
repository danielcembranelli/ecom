<?php
define('FPDF_FONTPATH','font/');
require_once('PDF_Label.php');
include("../Config.php");
/*-------------------------------------------------
To create the object, 2 possibilities:
either pass a custom format via an array
or use a built-in AVERY name
-------------------------------------------------*/

// Example of custom format; we start at the second column
//$pdf = new PDF_Label(array('name'=>'perso1', 'paper-size'=>'A4', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99.1, 'height'=>38.1, 'metric'=>'mm', 'font-size'=>14), 1, 2);
// Standard format
$pdf = new PDF_Label('L7163', 'mm', 0, 2);

$pdf->Open();
$pdf->AddPage();

// Print labels
$sqlUsuario = mysql_query("SELECT A.* FROM cadastro A where telaCadastro = '$_REQUEST[Tipo]' And statusCadastro = '$_REQUEST[statusCliente]' ORDER BY nomeCadastro") or die ("Could not connect to database: ".mysql_error());
while ($sU = mysql_fetch_array($sqlUsuario)){
	$pdf->Add_PDF_Label(sprintf("%s\n%s, %s - %s\n%s, %s\nCEP: %s", $sU[nomeCadastro], $sU[enderecoCadastro], $sU[numeroCadastro],$sU[complementoCadastro], $sU[cidadeCadastro], $sU[ufCadastro], $sU[cepCadastro]));
}

$pdf->Output();
?> 
