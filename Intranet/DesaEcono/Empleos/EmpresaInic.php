<!DOCTYPE html>
<html lang="es">
<head>  
	<title>Facultades de área</title>
</head>
<body> 
<?php
//echo 'ubicacion'.$_SERVER['DOCUMENT_ROOT'].'<br>';
include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasDesEcon.php');
	
//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
$BandMens = true;

$ConsEmpr = 0;
if ( isset($_GET["Param1"]) )
	$ConsEmpr = $_GET["Param1"];

//Datos del Layer
$InstSql =  "SELECT EConsecut, EEmpresa, ERespresentante, ". 
					   "EContacto, ETeleCont, EHoraAten ".
				"FROM etempresa ".
				"WHERE  EConsecut = ".$ConsEmpr." ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$DatoEmpr = $ResuSql->fetch();

$VC03 = $ConsEmpr;  $VC04 = ""; 
$VC05 = "";  $VC06 = "";
$VC07 = "";  $VC08 = ""; 
if ($DatoEmpr)
  { $VC03=$DatoEmpr[0];		//EConsecut
	$VC04=$DatoEmpr[1];		//EEmpresa,
	$VC05=$DatoEmpr[2];		//ERespresentante,

	$VC06=$DatoEmpr[3];		//EContacto
	$VC07=$DatoEmpr[4];		//ETeleCont
	$VC08=$DatoEmpr[5];		//EHoraAten
  }	

$ArCooki  = $VC03 .'|'. $VC04 .'|'. $VC05 .'|'. $VC06 .'|';
setcookie("CBusqMae", "$ArCooki");

header("Location: EmpleosList.php");
?>
</body>
</html>