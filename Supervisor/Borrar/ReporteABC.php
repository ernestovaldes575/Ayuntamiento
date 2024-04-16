<!DOCTYPE html>
	<html lang="es">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Form Facultades de área</title>
		<link rel="stylesheet" href="/Intranet/Archivos/CSS/CRUD.css">
		<!--icono de la pestaña (logo)-->
		<link rel="shortcut icon" href="/Intranet/Archivos/Img/logoEnc.ico" />
		<!--jquery para validar campos-->
		<script src="/Intranet/Archivos/JS/jquery-1.11.1.js"></script>
	</head>
<body>
<?php 

include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');

//Carga las variables
$ClavAyun = 105; 
//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
//Datos de la unidad
$ConUniTr = $ABusqMae[0]; 
$ClaUniTr = $ABusqMae[1];
$DesUniTr = $ABusqMae[2];

//Datos del supervisor
$ConSupTr = $ABusqMae[3];
$NumEmpSu = $ABusqMae[4];
$NombreSu = $ABusqMae[5];
$CategoSu = $ABusqMae[6];
$FotogrSu = $ABusqMae[7];


$BandMens = false;

$TipoMovi = $_POST['C01'];
$ConsBusq = $_POST['C02']; 
$FechRepo = $_POST['C03']; 
$HoraRepo = $_POST['C04']; 
$LugaEcho = $_POST['C05']; 
$Reporte  = $_POST['C06']; 
$Ciudadan = $_POST['C07']; 

//posibles querys
switch( $TipoMovi ){
	case "A": #Alta
		/* `RConsecut`, `RAyuntamiento`, `RConsSupe`,
		   `RFechaRepo`, `RHoraRepo`, `RLugarEchos`, 
		   `RReporte`, `RCiudadano`, 
		   `RServAsiga`, `RFechAsig`, `REstaRepo`, 
		   `RSerPubMo`, `RFechMovi`, `REstado`
			*/
			$InstSql = "INSERT INTO streporte ". 
					   "VALUES (Null,'".$ClavAyun."',".$ConSupTr.",". 
								"'".$FechRepo."', '".$HoraRepo. "','".$LugaEcho."',".
								"'".$Reporte."', '".$Ciudadan. "',".
							   "0,'','R',". 
							   "0,date(now()),'A')";

			break;
	case "M": #Modificacion
			$InstSql = "UPDATE streporte ". 
					   "SET  RFechaRepo = '".$FechRepo."', ".
							"RHoraRepo = '".$HoraRepo."', ".
							"RLugarEchos = '".$LugaEcho."', ".
							"RReporte = '".$Reporte."', ".
							"RCiudadano = '".$Ciudadan."', ".
							"RSerPubMo = ".$ConsUsua.",".
							"RFechMovi = date(now()) ".
						"WHERE RAyuntamiento = '" .$ClavAyun."' AND ".
							  "RConsecut =" .$ConsBusq." ";
			break;
	case "B": #Baja
			$InstSql = "UPDATE streporte ". 
					   "SET    REstado = 'B', ".
							  "RSerPubMo = ".$ConsUsua.",".
							  "RFechMovi = date(now()) ".
					   "WHERE RAyuntamiento = '" .$ClavAyun."' AND ".
							  "RConsecut =" .$ConsBusq." ";
			break;	  
	}

if ($BandMens)  echo '1)'.$InstSql.'<br>';	
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();

$MensResp = "Algo ha fallado!!!";
if ($ResuSql) 
	$MensResp = "Registro actualizado correctamente";
$PagiRegr = "location: SuperviList.php";
if (!$BandMens) header($PagiRegr);
echo '<script>alert("'.$MensResp.'");</script>';
$ResuSql->closeCursor();
?>	
</body>
</html>