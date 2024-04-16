<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
</head>
<body> 
<?php
	//Carga las variables
	$ArCooki3 = $_COOKIE['CBusqMae'];
	$ABusqMae = explode("|", $ArCooki3);
	//echo '$ABusqMae'.$ABusqMae.'<br>';
	$EjerTrab = $ABusqMae[0];	//Ejercicio de trabajo

	//Bandera de visualizar msg
	$BandMens = false;

	if ( isset($_GET["Param0"]) )
	$BandMens = true;
	
	$ClavTiCl = $_GET["Param1"];	//Clave del tipo de  Clasificacion
	$DescTiCl = $_GET["Param2"];	//Descri del tipo de Clasificacion
	$ArchCarg = $_GET["Param3"];	//Nivel Clasificacion 1 o 2

	//En base a la clave de clsificacion
	//se coloca la subclasificacion
	$Clasific = "1";	
	switch( $ClavTiCl )
	 { case "CP": //Cuenta Publica
				  $Clasific = "50";
				  break;
	   case "PA": //PAE
				  $Clasific = "60";
				  break;
	   case "PR": //Presupuesto
				  $Clasific = "70";
				  break;				  				
	}


	//Ejercicio
	$ArCooki4 =  $EjerTrab .'|'. $ClavTiCl .'|'. $DescTiCl .'|'. $ArchCarg .'|'. $Clasific .'|';
	setcookie("CBusqMae", "$ArCooki4");

	$PagiSegu = ($ArchCarg == 1 ) ? "Location: ConacSubCla.php?Param1=".$Clasific:
									"Location: ConacClas.php";
									
	echo "$PagiSegu".$PagiSegu."<br>";								
	if (!$BandMens) header($PagiSegu);
?>	
</body>
</html>