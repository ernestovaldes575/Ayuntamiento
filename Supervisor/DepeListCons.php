<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
date_default_timezone_set('America/Mexico_City');
$ClavAyun = '105';

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

	$ArCooki  = $VC01 .'|'. $VC02 .'|'. $VC03 .'|';
	setcookie("CBusqMae", "$ArCooki");
}

//Carga los supervisores 
$InstSql =  "SELECT SConsecut, SNumeEmpl, SServPubli, SCategoria, SFoto ". 
            "FROM  stsupervisor ".
            "WHERE SAyuntamiento = '".$ClavAyun."' AND ".
				  "SUnidad =".$ConsUnid." AND ".
				  "SEstado = 'A' ". 
            "ORDER BY SNumeEmpl";
$resultado = $ConeBase->query($InstSql);

// Crear un arreglo para almacenar los datos
$InfTab01 = array();

// Verificar si hay resultados
if ($resultado->num_rows > 0) 
    while ($fila = $resultado->fetch_assoc()) 
        $InfTab01[] = $fila; 


// Convertir el arreglo de InfoTabl a formato JSON
$InfTab01_json = json_encode($InfTab01);

if (!$BandMens) header("Location: SupeList.php");

?>	