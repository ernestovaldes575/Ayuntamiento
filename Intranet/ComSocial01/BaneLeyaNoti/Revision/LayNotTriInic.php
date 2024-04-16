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

//Tipo de Archivo
$TipoDocu  = "01";	
if ( isset($_GET["Param1"]) ){
	$TipoDocu = $_GET["Param1"];
	//Fecha del sistema
	$FechSist = getdate();
	$EjerTrab = $FechSist['year'];
	$MesTrab  = $FechSist['mon'];
	$DiaTrab  = $FechSist['mday'];
	$HoraTrab = $FechSist['hours'] .":". $FechSist['minutes'] .":". $FechSist['seconds'];
	echo "Día:  " .$DiaTrab. "<br>";
	echo "Mes:  " .$MesTrab. "<br>";
	echo "Año:  " .$EjerTrab. "<br>";
	echo "Hora: " .$HoraTrab ;

	$ArCooki  = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|';
	setcookie("CBusqMae", "$ArCooki");
}

header("Location: LayNotTriList.php");

?>	

</body>
</html>