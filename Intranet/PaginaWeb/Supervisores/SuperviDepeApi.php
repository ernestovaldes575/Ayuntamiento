<?php 
  //Varibales Globales
 // include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
  //Encabezado	
  include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php'); 
	
	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;

	//Datos del Layer
	$InstSql =  "SELECT SUnidad,CUNClaveUnidad,CUNDescripcion ". 
				"FROM Stsupeunid ". 
				"INNER JOIN acceso.ACUnidades ON SUnidad=CUNConsecutivo ". 
				"WHERE SAyuntamiento = '".$ClavAyun."' ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$UnidSupe = $ResuSql->fetchAll();
	?>	
