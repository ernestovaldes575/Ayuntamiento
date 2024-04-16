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
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasDesEcon.php');

$BandMens = false;

$TipoMovi = $_POST['C01'];
$ConsBusq = $_POST['C02']; 

$NombEmpr = $_POST['C03']; 
$Represen = $_POST['C04'];
$DatoCont = $_POST['C05']; 
$TeleCont = $_POST['C06']; 
$HoraAten = $_POST['C07']; 
$CorrAcce = $_POST['C08']; 
$ContAcce = $_POST['C09']; 

//posibles querys
switch( $TipoMovi ){
	case "A": #Alta
			/*INSERT INTO `etempresa`(`EConsecut`, `EAyuntamiento`, `EEmpresa`, `ERespresentante`, `EContacto`, `ETeleCont`, `EHoraAten`, `ECorreo`, `EContra`, `ESerPubMo`, `EFechModi`, `EEstado`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]')
			*/
			$InstSql = "INSERT INTO etempresa ". 
					   "VALUES (Null,'".$ClavAyun."',". 
							  "'" .$NombEmpr. "', '".$Represen."', ". 
							  "'" .$DatoCont. "', '".$TeleCont."', '".$HoraAten."', ".
							  "'" .$CorrAcce. "', '".$ContAcce."', ". 
							  "'" .$ConsUsua. "', date(now()),'A') ";
			break;		
	case "M": #Modificacion
			$InstSql = "UPDATE etempresa ". 
					   "SET EEmpresa = '".$NombEmpr."', ".
							"ERespresentante = '".$Represen."', ".
							"EContacto = '".$DatoCont."', ".
							"ETeleCont = '".$TeleCont."', ".
							"EHoraAten = '".$HoraAten."', ". 
							"ECorreo = '".$CorrAcce."', ".
							"EContra = '".$ContAcce."' ".
						"WHERE EAyuntamiento = '".$ClavAyun."' AND ".
							  "EConsecut = ".$ConsBusq." ";
			break;
	case "B": #Baja
			$InstSql = "UPDATE etempresa ". 
						"SET   EEstado = 'B' ".
						"WHERE EAyuntamiento = '".$EAyuntamiento."' AND ".
							  "EConsecut = ".$ConsBusq." ";
			break;	  
	}

if ($BandMens)  echo '1)'.$InstSql.'<br>';	
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();

$MensResp = "Algo ha fallado!!!";
if ($ResuSql) 
	$MensResp = "Registro actualizado correctamente";
$ResuSql->closeCursor();

$PagiRegr = "location: EmpresaList.php";
if (!$BandMens) header($PagiRegr);
echo '<script>alert("'.$MensResp.'");</script>';

?>	
</body>
</html>