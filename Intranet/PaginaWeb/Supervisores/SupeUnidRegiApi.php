<?php 
//Varibales Globales
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
   
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');
//include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//Eliminar Unidad
if ( isset($_GET["Param1"]) )
  { $ConsCons = $_GET["Param1"];
	$InstSql =  "DELETE FROM STSupeUnid ".
				"WHERE SAyuntamiento = '".$ClavAyun."' AND ". 
					  "SUnidad = ".$ConsCons." "; 
	if ($BandMens)  echo '1)'.$InstSql.'<br>';	
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
  }

//Cargar Unidad
if ( isset($_GET["Param2"]) )
  { $ConsCons = $_GET["Param2"];
	$InstSql =  "INSERT INTO STSupeUnid ".
				"VALUES ('".$ClavAyun."',".$ConsCons.") "; 
	if ($BandMens)  echo '1)'.$InstSql.'<br>';	
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
  }

//Datos de la Unidad
$InstSql =  "SELECT SUnidad,CUNClaveUnidad,CUNDescripcion ". 
			"FROM   STSupeUnid ". 
			"INNER JOIN acceso.ACUnidades ON SUnidad=CUNConsecutivo ". 
			"WHERE SAyuntamiento = '".$ClavAyun."' ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
//$tot_rows = $ResuSql->rowCount();
$UnidSupe = $ResuSql->fetchAll();

//Catalogo de Unidad
$InstSql =  "SELECT CUNConsecutivo,CUNClaveUnidad,CUNDescripcion ". 
			"FROM acceso.ACUnidades ". 
			"WHERE CUNAyuntamiento = '".$ClavAyun."' ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$tot_rows = $ResuSql->rowCount();
$CataUnid = $ResuSql->fetchAll();
?>	
