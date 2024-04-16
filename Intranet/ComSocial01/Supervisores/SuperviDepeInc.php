<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
</head>
<body> 
<?php
include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');
date_default_timezone_set('America/Mexico_City');

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
  $BandMens = true;

//Tipo de Archivo
$ConsUnid  = 0;	
if ( isset($_GET["Param1"]) ){
	$ConsUnid = $_GET["Param1"];

	$InstSql =  "SELECT CUNConsecutivo,CUNClaveUnidad,CUNDescripcion ". 
				"FROM   acceso.ACUnidades ". 
				"WHERE  CUNAyuntamiento = '".$ClavAyun."' AND ". 
					   "CUNConsecutivo = ".$ConsUnid." ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$CataUnid = $ResuSql->fetch();

	$VC01 = 0; $VC02 = 'SinUnid'; $VC03='Sin Unidad';
	if ($CataUnid)
	{ $VC01 = $CataUnid[0];	//LTitulo
	  $VC02 = $CataUnid[1];	//LDescripcion
	  $VC03 = $CataUnid[2];	//LFechPublI
	}	

	//Fecha del sistema
	$FechSist = getdate();
	$EjerTrab = $FechSist['year'];
	$MesTrab  = $FechSist['mon'];
	$DiaTrab  = $FechSist['mday'];
	$HoraTrab = $FechSist['hours'] .":". $FechSist['minutes'] .":". $FechSist['seconds'];

	$EstaRevi = "I";
	$ArCooki  = $VC01 .'|'. $VC02 .'|'. $VC03 .'|';
	setcookie("CBusqMae", "$ArCooki");
}

if (!$BandMens) header("Location: SuperviList.php");

?>	

</body>
</html>