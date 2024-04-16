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

include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$ConUniTr = $ABusqMae[0]; 
$ClaUniTr = $ABusqMae[1];
$DesUniTr = $ABusqMae[2];

$BandMens = false;

$TipoMovi = $_POST['C01'];
$ConsBusq = $_POST['C02']; 
$NumeEmpl = $_POST['C03']; 
$ServPubl = $_POST['C04']; 
$Categori = $_POST['C05']; 

//posibles querys
switch( $TipoMovi ){
	case "A": #Alta
		/* `SConsecut`, `SAyuntamiento`, `SUnidad`, 
				`SNumeEmpl`, `SServPubli`, `SCategoria`, 
				`SFoto`, `SSerPubMo`, `SFechModi`, `SEstado`
			*/
			$InstSql = "INSERT INTO stsupervisor ". 
					   "VALUES (Null,'".$ClavAyun."',".$ConUniTr.",". 
								"'".$NumeEmpl."', '".$ServPubl. "','".$Categori."',".
							   "'',".$ConsUsua.",date(now()),'A')";

			break;
	case "M": #Modificacion
			$InstSql = "UPDATE stsupervisor ". 
						   "SET SNumeEmpl = '".$NumeEmpl."', ".
								"SServPubli = '".$ServPubl."', ".
								"SCategoria = '".$Categori."', ".
								"SSerPubMo = ".$ConsUsua.",".
								"SFechModi = date(now()) ".
							"WHERE SAyuntamiento = '".$ClavAyun."' AND ".
								  "SConsecut =".$ConsBusq." ";
			break;
	case "B": #Baja
			$InstSql = "UPDATE stsupervisor ". 
						"SET   SEstado = 'B', ".
							  "SSerPubMo = ".$ConsUsua.",".
							  "SFechModi = date(now()) ".
						"WHERE SAyuntamiento = '".$ClavAyun."' AND ".
							  "SConsecut =".$ConsBusq." ";
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