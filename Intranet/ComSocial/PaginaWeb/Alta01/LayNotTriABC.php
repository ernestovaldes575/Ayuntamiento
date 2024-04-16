<?php 
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];
$MesTrab  = $ABusqMae[2];

$BandMens = true;
$TipoMovi = $_POST['C01'];
$ConsBusq = $_POST['C02']; 
$TituLaye = $_POST['C03']; 
$DescLaye = $_POST['C04'];
$FechInic = $_POST['C05']; 
$FechFina = $_POST['C06']; 
$ArchMost = $_POST['C07']; 
$LigaRefe = $_POST['C08']; 
$MostArch = $_POST['C09']; 

//posibles querys
switch( $TipoMovi ){
	case "A": #Alta
			/* `LConsecut`, `LAyuntamiento`, `LUnidad`, 
            `LEjercicio`, `LMesRegi`, 
            `LTipoDocu`, `LTitulo`, `LDescripcion`, 
            `LSerPubCre`, `LFechAlta`, 
            `LFechPublI`, `LFechPublF`,
             `LSerPubRev`, `LFechRevi`, `LSerPubAuto`, `LFechAuto`, `LFechPubl`, `LSerPubCier`, `LFechaCier`, 
             `LEstaSegu`, `LPublicacion`, `LVentRefe`, `LAbrirLiDoIm`, `LLiga`, `LArchDocu`, `LImagColo`, `LImagBlan`, `LSenaSord`, `LEstado`
			*/
			$InstSql = "INSERT INTO stlayers ". 
			"VALUES (Null,'".$ClavAyun."',".$ConsUnid.",". 
					"'".$EjerTrab."', '".$MesTrab. "', ".
					"'".$TipoDocu."', '".$TituLaye."', '".$DescLaye."', ".
					"'".$ConsUsua."', date(now()), ".
					"'".$FechInic."', '".$FechFina."', ". 
					"-1, '', -1,  '', '', ". 
                    "-1, '',".
					"'I','I',". 
					"'".$ArchMost."','".$LigaRefe."','',". 
					"'','','','".$MostArch."','A')";

			break;
	case "M": #Modificacion
			$InstSql = "UPDATE stlayers ". 
					   "SET LTitulo = '".$TituLaye."', ".
							"LDescripcion = '".$DescLaye."', ".
							"LFechPublI = '".$FechInic."', ".
							"LFechPublF = '".$FechFina."', ".
							"LAbrirLiDoIm = '".$ArchMost."', ". 
							"LLiga = '".$LigaRefe."', ".
							"LVentRefe = '".$MostArch."' ".
					   "WHERE LAyuntamiento = '".$ClavAyun."' AND ".
							 "LEjercicio = '".$EjerTrab."' AND ".
							 "LTipoDocu = '".$TipoDocu."' AND ". 
							 "LConsecut = ".$ConsBusq." ";
					break;
	case "B": #Baja
			$InstSql = "UPDATE stlayers ". 
						"SET   LEstado = 'B' ".
						"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
							  "LEjercicio = '".$EjerTrab."' AND ".
							  "LTipoDocu = '".$TipoDocu."' AND ". 
							  "LConsecut = ".$ConsBusq." ";
					break;	  
  }

 if ($BandMens)  echo '1)'.$InstSql.'<br>';	
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();

$MensResp = "Algo ha fallado!!!";
if ($ResuSql) 
	$MensResp = "Registro actualizado correctamente";
echo '<script>alert("'.$MensResp.'");</script>';

//Cerrar conexion
$ResuSql->closeCursor();

//Regresar a pagina
header("location: LayNotTriList.php");

?>    