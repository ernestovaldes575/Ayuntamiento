<!DOCTYPE html>
	<html lang="es">
		<head>
		<meta charset="UTF-8">
		<title>Form Facultades de área</title>
	</head>
<body>
<?php 

include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasDesEcon.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$ConsEmpr = $ABusqMae[0]; 
$NombEmpr = $ABusqMae[1];
$ReprEmpr = $ABusqMae[2];

$BandMens = false;

//Caragra variables
$TipoMovi = $_POST['C01'];
$ConsBusq = $_POST['C02']; 

$PuesSoli = $_POST['C03']; 
$SexoPues = $_POST['C04'];
$EdadPues = $_POST['C05']; 
$SuelPues = $_POST['C06']; 
$EscoPues = $_POST['C07']; 
$ExpePues = $_POST['C08']; 
$PlazAcIn = $_POST['C09']; 

//posibles querys
switch( $TipoMovi ){
	case "A": #Alta
			/* `PConsecut`, `PConsEmpr`, `PPuesto`, `PSexo`, `PEdad`, `PSueldo`, `PEscolaridad`, `PExperiencia`, `EDeEcEmpr`, `PServModi`, `PFechModi`, `PPlazAcIn`, `PEstado` 
			*/
			$InstSql = "INSERT INTO edplaza ". 
					   "VALUES (Null,'".$ConsEmpr."',". 
							  "'" .$PuesSoli. "', '".$SexoPues."', ". 
							  "'" .$EdadPues. "', '".$SuelPues."', '".$EscoPues."', ".
							  "'" .$ExpePues. "', 'E', ". 
							  "'" .$ConsUsua. "', date(now()),'".$PlazAcIn."','A') ";
			break;		
	case "M": #Modificacion
			$InstSql = "UPDATE edplaza ". 
					   "SET PPuesto = '".$PuesSoli."', ".
							"PSexo = '".$SexoPues."', ".
							"PEdad = '".$EdadPues."', ".
							"PSueldo = '".$SuelPues."', ".
							"PEscolaridad = '".$EscoPues."', ". 
							"PExperiencia = '".$ExpePues."', ".
							"PPlazAcIn = '".$PlazAcIn."', ".
							"PServModi = ".$ConsUsua.",". 
							"PFechModi = date(now()) ".
						"WHERE  PConsEmpr = " .$ConsEmpr. " AND ". 
							"PConsecut = " .$ConsBusq. " ";
			break;
	case "B": #Baja
			$InstSql = "UPDATE edplaza ". 
						"SET   PEstado = 'B' ".
						"WHERE  PConsEmpr = " .$ConsEmpr. " AND ". 
								"PConsecut = " .$ConsBusq. " ";
			break;	  
	}

if ($BandMens)  echo '1)'.$InstSql.'<br>';	
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();

$MensResp = "Algo ha fallado!!!";
if ($ResuSql) 
	$MensResp = "Registro actualizado correctamente";
$ResuSql->closeCursor();

$PagiRegr = "location: EmpleosList.php";
if (!$BandMens) header($PagiRegr);
echo '<script>alert("'.$MensResp.'");</script>';

?>	
</body>
</html>