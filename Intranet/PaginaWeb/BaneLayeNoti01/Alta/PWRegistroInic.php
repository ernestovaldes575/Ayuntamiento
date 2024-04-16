<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');
date_default_timezone_set('America/Mexico_City');

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
  $BandMens = true;

//Fecha del sistema
$FechSist = getdate();
$EjerTrab = $FechSist['year'];
$MesTrab  = $FechSist['mon'];
$MesTrab  = ($MesTrab  < 10) ? '0'.$MesTrab : $MesTrab;
$DiaTrab  = $FechSist['mday'];
$DiaTrab  = ($DiaTrab  < 10) ? '0'.$DiaTrab : $DiaTrab;
$HoraTrab = $FechSist['hours'] .":". $FechSist['minutes'] .":". $FechSist['seconds'];
echo "Día: $DiaTrab  <br>";
echo "Mes: $MesTrab  <br>";
echo "Año: $EjerTrab <br>";
echo "Hora:$HoraTrab <br>";

$TipoDocu  = "01";	
if ( isset($_GET["Param1"]) ){
	$TipoDocu = $_GET["Param1"];

	//Datos del Catalogo
	$InstSql = "SELECT CTDDescri,CTDCarpeta,". 
					  "CTDAncImgPag,CTDLagImgPag,". //Caracteristicas de la pagina
					  "CTDAncImgSub,CTDLarImgSub,". //Caracteristicas el archivo a ver
					  "CTDTamImgSub  ".				
			   "FROM   PCTipoDocu ". 
			   "WHERE  CTDClave = '$TipoDocu' ";
	if ($BandMens)  echo "1)<br>$InstSql<br>"; 
	$EjInSql = $ConeBase->prepare($InstSql);
	$EjInSql->execute();
	$ResuSql = $EjInSql->fetch();
    
	//Valores de la tabla
	$VC02 = ""; $VC03 = ""; 
	$VC04 = 0;  $VC05 = 0;
	$VC06 = 0;  $VC07 = 0; $VC08 = 0;
			   
	if ( $ResuSql )
	 { $VC02 = $ResuSql['CTDDescri'];		//Desctipcion 
	   $VC03 = $ResuSql['CTDCarpeta'];		//Cartpeta donde se guarda la informacion
	   
	   //Carcateriditicas de la imagen de la pagina q se muestra en l aprincipal
	   $VC04 = $ResuSql['CTDAncImgPag'];	//Ancho de la imagen de la pagina
	   $VC05 = $ResuSql['CTDLagImgPag'];	//Largo de la imagen de la pagina

	   //Carcateristicas del doc/img/pdf que mostraran
	   $VC06 = $ResuSql['CTDAncImgSub'];	//Ancho de la imagen
	   $VC07 = $ResuSql['CTDLarImgSub'];	//Largo de la imagen 
	   $VC08 = $ResuSql['CTDTamImgSub'];	//Tamaño del archivo
	 }	

	// Cerrar la conexión a la base de datos	 
	// $ResuSql->closeCursor();
	// $ConeBase->close();
	 
	$ArCook01  = $TipoDocu .'|'. $VC02 .'|'. $VC03 .'|'. 
				 $VC04 .'|'. $VC05 .'|'. 
				 $VC06 .'|'. $VC07 .'|'. $VC08 .'|'; 
	setcookie("CCaraImg", "$ArCook01");

	$EstaRevi = "00";
	$ArCook02  = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi;
	setcookie("CBusqMae", "$ArCook02");
	}

//header( "Location: PWRegistroList.php" );
if (!$BandMens) 
 header( "Location: PWRegistroList.php" );
exit;
?>	