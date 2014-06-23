<?php
require('PDF_Label.php');

/*------------------------------------------------
To create the object, 2 possibilities:
either pass a custom format via an array
or use a built-in AVERY name
------------------------------------------------*/

// Example of custom format
// $pdf = new PDF_Label(array('paper-size'=>'A4', 'metric'=>'mm', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99, 'height'=>38, 'font-size'=>14));

// Standard format
$pdf = new PDF_Label('6281');

$pdf->AddPage();

$et = $_REQUEST[coluna]*$_REQUEST[linha];
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==1){
	$et = 1;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==2){
	$et = 3;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==3){
	$et = 5;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==4){
	$et = 7;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==5){
	$et = 9;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==6){
	$et = 11;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==7){
	$et = 13;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==8){
	$et = 15;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==9){
	$et = 17;
}
if($_POST[COLUNA]==1 && $_POST[ETIQUETA]==10){
	$et = 19;
}


if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==1){
	$et = 2;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==2){
	$et = 4;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==3){
	$et = 6;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==4){
	$et = 8;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==5){
	$et = 10;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==6){
	$et = 12;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==7){
	$et = 14;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==8){
	$et = 16;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==9){
	$et = 18;
}
if($_POST[COLUNA]==2 && $_POST[ETIQUETA]==10){
	$et = 20;
}

for($i=1;$i<$et;$i++) {
	//$text = sprintf("%s\n%s\n%s\n%s %s, %s", "Laurent $i", 'Immeuble Toto', 'av. Fragonard', '06000', 'NICE', 'FRANCE');
	$pdf->Add_Label($text);
}
// Print labels
//for($i=1;$i<=5;$i++) {
	//$text = sprintf("%s\n%s\n%s\n%s %s, %s", "Etiqueta $i", 'Immeuble Toto', 'av. Fragonard', '06000', 'NICE', 'FRANCE');
    $text = $_POST[LINHA1]."\n".$_POST[LINHA2]."\n".$_POST[LINHA3]."\n".$_POST[CEP]."-".$_POST[CIDADE]."-".$_POST[UF]."\n".$_POST[DESTINO];
	$pdf->Add_Label($text);
//}

$pdf->Output();
?>