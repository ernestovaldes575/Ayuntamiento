<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];
$MesTrab  = $ABusqMae[2];

//Para operacion A B C
if (isset($_POST['C00'])) 
 {  $CRUT =  $_POST['C00'];

	echo "Valor CURT: $CRUT ";  
	$TipoMovi = $_POST['C01'];
	$ConsBusq = $_POST['C02']; 
	$TituLaye = $_POST['C03']; 
	$DescLaye = $_POST['C04'];
	$FechInic = $_POST['C05']; 
	$FechFina = $_POST['C06']; 
	$ArchMost = $_POST['C07']; 	//Imagen, PDF o Liga
	$LigaRefe = $_POST['C08']; 
	$DondAbri = $_POST['C09'];	//Ventana, Pagina 
 }	

 $BandMens = true;
switch ($CRUT)
{ case "GET": 
		//Carga el registro para ABC	
		if( isset($_GET['PaAMB01']) != ''){	
			$TipoMovi = $_GET["PaAMB01"];	#Tipo de Movimiento 
			$ConsBusq = $_GET["PaAMB02"];	#COINCIDENCIA CON LA BD  				
			
			$InstSql =  "SELECT LTitulo,LDescripcion,". 
						"LFechPublI,LFechPublF,".
						"LAbrirLiDoIm,LLiga,LVentRefe, ". 
						"TRIM(LImagen), TRIM(LAImagDocu), TRIM(CTDCarpeta) ".
						"FROM  stlayers ".
						"INNER JOIN sctipodocu ON ctdclave = LTipoDocu ".					
						"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
							"LEjercicio = '".$EjerTrab."' AND ".
							"LTipoDocu = '".$TipoDocu."' AND ". 
							"LConsecut = ".$ConsBusq." ";
			if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
			$EjInSql = $ConeBase->prepare($InstSql);
			$EjInSql->execute();
			$ResuSql = $EjInSql->fetch();
		}
		else
		{ //Carga el registro para Consulta
		  $InstSql = "SELECT LConsecut,LEjercicio,LMesRegi,". 
		  					"LTitulo,LDescripcion,". 
		  					"LFechPublI,LFechPublF,LFechaCier,LEstaSegu,".
   							"TRIM(LImagen),LAbrirLiDoIm,TRIM(LAImagDocu),". 
   							"LLiga,LVentRefe, TRIM(CTDCarpeta) ".
					  "FROM  stlayers ".
					  "INNER JOIN sctipodocu ON ctdclave = LTipoDocu ".				
					  "WHERE LAyuntamiento = '".$ClavAyun."' AND ".
							"LUnidad =".$ConsUnid." AND ".
							"LEjercicio = '".$EjerTrab."' AND ".
							"LTipoDocu = '".$TipoDocu."' AND ". 
							"LEstaSegu = '".$EstaRevi."' AND ".
							"LEstado = 'A' ";
			
		  if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
		  $EjInSql = $ConeBase->prepare($InstSql);
		  $EjInSql->execute();
		  $ResuSql = $EjInSql->fetchAll();
		  //------------------------------------------------------------------------
		  //Datos del Catalogo
		  $InstSql = "SELECT * ".
					 "FROM acceso.acejercicio";
		  if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
		  $EjInSql = $ConeBase->prepare($InstSql);
		  $EjInSql->execute();
		  $CataEjer = $EjInSql->fetchAll(); 
		}	
		break;
	case "POST": //Alta
	  /*`LConsecut`, `LAyuntamiento`, `LUnidad`, 
		`LEjercicio`, `LMesRegi`, 
		`LTipoDocu`, `LTitulo`, `LDescripcion`, 
		`LSerPubCre`, `LFechAlta`, `LFechPublI`, `LFechPublF`, 
		`LSerPubRev`, `LFechRevi`, `LSerPubAuto`, `LFechAuto`, 
		`LSerPubPub`, `LFechPubl`, `LPublicacion`, 
		`LSerPubCier`, `LFechaCier`, 
		`LEstaSegu`, `LImagen`, 
		`LAbrirLiDoIm`, `LAImagDocu`, `LLiga`, 
		`LVentRefe`, `LSenaSord`, `LEstado` */
		$InstSql = "INSERT INTO stlayers ". 
		"VALUES (Null,'".$ClavAyun."',".$ConsUnid.",". 
				"'".$EjerTrab."', '".$MesTrab. "', ".
				"'".$TipoDocu."', '".$TituLaye."', '".$DescLaye."', ".
				"'".$ConsUsua."', date(now()),  '".$FechInic."', '".$FechFina."', ". //Crea
				"-1, '', -1,  '', ". 	//Revisa,  Autoriza
				"-1, '', 'I',".			//Publica
				"-1, '',". 				//Cierra
				"'I','',". //I:Inic R:Revi A:Apro P:Publi C:Cierr
				"'".$ArchMost."','','".$LigaRefe."',". 
				"'".$DondAbri."','','A')";
		break;
	case "PUT": //Cambio
		$InstSql = "UPDATE stlayers ". 
				   "SET LTitulo = '".$TituLaye."', ".
						"LDescripcion = '".$DescLaye."', ".
						"LFechPublI = '".$FechInic."', ".
						"LFechPublF = '".$FechFina."', ".
						"LAbrirLiDoIm = '".$ArchMost."', ". 
						"LLiga = '".$LigaRefe."', ".
						"LVentRefe = '".$DondAbri."' ".
				   "WHERE LAyuntamiento = '".$ClavAyun."' AND ".
						 "LEjercicio = '".$EjerTrab."' AND ".
						 "LTipoDocu = '".$TipoDocu."' AND ". 
						 "LConsecut = ".$ConsBusq." ";
		break;
	case "DELETE": //Eliminar
		$InstSql = "UPDATE stlayers ". 
		"SET   LEstado = 'B' ".
		"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
			  "LEjercicio = '".$EjerTrab."' AND ".
			  "LTipoDocu = '".$TipoDocu."' AND ". 
			  "LConsecut = ".$ConsBusq." ";
		break;	

}		

//Para las altas bajas y modificaciones
if ( $CRUT != "GET")
{ //Ejecuta la instruccion
   $BandMens = true;
  if ($BandMens)  echo '1)'.$InstSql.'<br>';	
  $ResuSql = $ConeBase->prepare($InstSql);
  $ResuSql->execute();

  $MensResp = ($ResuSql) ?  "Algo ha fallado!!!" : "Registro actualizado correctamente";
  if (!$ResuSql) 
    echo '<script>alert("'.$MensResp.'");</script>'; 

  //Para Regresar a la ALTA
  $PagiRegr = "PWRegistroList.php"; 
  if  ($CRUT == "POST") 
   { //Recupera la secuencia 
	 $InstSql = "SELECT @@identity AS id "; 	
	 if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	 $RespSql = $ConeBase->prepare($InstSql);
	 $RespSql->execute();
	 $ResuSql = $RespSql->fetch();

	 $ConsBusq = 0;		
	 if ($ResuSql)
	    $ConsBusq = $ResuSql[0];

	 $PagiRegr = "PWRegistro.php?PaAMB01=M&PaAMB02=".$ConsBusq;
   }
 	
  if ($BandMens)	 
   { $PagiRegr = "location: $PagiRegr";
     header($PagiRegr); } 

  // Cerrar la conexión a la base de datos	 
  $ResuSql->closeCursor();
  //$ConeBase->close();
}

?>	
