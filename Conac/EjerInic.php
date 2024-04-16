<?php 
date_default_timezone_set('America/Mexico_City');

// Bandera de visualizar msg
$BandMens = false;
if (isset($_GET["Param0"])) {
    $BandMens = true;
}

// Fecha del sistema
$FechSist = getdate();
$EjerTrab = $FechSist['year'];
$MesTrab  = $FechSist['mon'];
$DiaTrab  = $FechSist['mday'];
$HoraTrab = $FechSist['hours'] .":". $FechSist['minutes'] .":". $FechSist['seconds'];

	// Creación de la cookie
	$ArCooki  = $EjerTrab .'|';
	setcookie("CBusqMae", "$ArCooki");

	// Redirección después de la creación de la cookie
	header("Location: EjerLista.php");
	//Asegurarse de terminar la ejecución del script después de la redirección
	exit;
?>
