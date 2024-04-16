<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
</head>
<body> 
<?php

	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;

	//Ejercicio
	$FechSist = getdate();
	$EjerTrab = $FechSist['year'];
	$ArCooki1 =  $EjerTrab .'|';
	setcookie("CBusqMae", "$ArCooki1");

	if (!$BandMens) header("Location: conacList.php");

?>	
</body>
</html>