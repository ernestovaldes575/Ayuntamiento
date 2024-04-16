<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
$TipoDocu = $ABusqMae[0];
$EjerTrab = $ABusqMae[1];
$ClavClas = $ABusqMae[2];
$SubcClas = $ABusqMae[3];

//Para operacion A B C
if (isset($_POST['C00'])) 
 {  $CRUT =  $_POST['C00'];

	echo "Valor CURT: $CRUT ";  
	$TipoMovi = $_POST['C01'];
	$ConsBusq = $_POST['C02']; 
	$NumeCona = $_POST['C03']; 
	$DescCona = $_POST['C04'];
 }	

 $BandMens = true;
switch ($CRUT)
{ case "GET": 
		//Consulta 02 para Subclasificacion	
		if( isset($_GET['ParBus01']) != ''){	
			$ClavClas = $_GET["ParBus01"];	#Clasificacion

			$ArCooki  =  $TipoDocu .'|'. $EjerTrab .'|'. $ClavClas .'|';
			setcookie("CBusqMae", "$ArCooki");
			
			$InstSql = "SELECT CSCClave,CSCDescripcion,".
							  "(SELECT count(*) ".
						 	   "FROM ctconac ".
							   "WHERE CAyuntamiento = '$ClavAyun' AND ".
							   		 "CEjercicio= $EjerTrab AND ".
							   		 "CTipo = '$TipoDocu' AND ".
							   		 "CClasifica = CSCClasifi AND ". 
									 "Csubclasifi = CSCClave ) AS TotaRegi ".
					  "FROM   ccsubcalsifica ".
					  "WHERE  CSCClasifi = '$ClavClas' ".
					  "GROUP BY CSCClave";
		 }
		//------------------------------------------------------------ 
		//Consulta 03 para conac
		elseif( isset($_GET['ParBus02']) != '')
		 { $SubcClas = $_GET["ParBus02"];	//Subclasificacion 

		   $ArCooki  =  $TipoDocu .'|'. $EjerTrab .'|'. 
						 $ClavClas .'|'. $SubcClas .'|';
		   setcookie("CBusqMae", "$ArCooki");

			$InstSql = "SELECT CNumeCona, CDescDocu, CTDCarpeta,CArchivo ". 
					   "FROM   ctconac ". 
					   "INNER JOIN CCTipoDocu ON CTipo = CTDClave ". 
					   "WHERE  CAyuntamiento = '$ClavAyun' AND ". 
							  "CEjercicio= $EjerTrab AND ". 
							  "CClasifica = '$ClavClas' AND ". 
							  "Csubclasifi = '$SubcClas' ".
		   			   "ORDER BY CNumeCona ";  
		   }
	    
		//------------------------------------------------------------   
		//Consulta 04 para conac ABC
		elseif( isset($_GET['PaAMB01']) != '')
		 { $TipoMovi = $_GET["PaAMB01"];	#Tipo de Movimiento 
		   $ConsBusq = $_GET["PaAMB02"];	#COINCIDENCIA CON LA BD  
		   $BandMens = true;
		   //REcupera el siguiente numero
		   if ( $TipoMovi == "A" )
		    { $InstSql = "SELECT CASE WHEN MAX(CNumeCona) IS NULL ".
		   						  "THEN 1 ".
								  "ELSE MAX(CNumeCona) ". 
					   "FROM   ctconac ". 
					   "INNER JOIN CCTipoDocu ON CTipo = CTDClave ". 
					   "WHERE  CAyuntamiento = '$ClavAyun' AND ". 
							  "CEjercicio= $EjerTrab AND ". 
							  "CClasifica = '$ClavClas' AND ". 
							  "Csubclasifi = '$SubcClas'  ";
			  if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
			  $RespSql = $ConeBase->prepare($InstSql);
			  $RespSql->execute();
			  $ResuSql = $RespSql->fetch();
						 
			  $NumeSigu = 0;		
			  if ($ResuSql)
				$NumeSigu = $ResuSql[0]; 				  
			}  

		   $InstSql = "SELECT CNumeCona, CDescDocu, CTDCarpeta, CArchivo ". 
					   "FROM   ctconac ". 
					   "INNER JOIN CCTipoDocu ON CTipo = CTDClave ". 
					   "WHERE  CAyuntamiento = '$ClavAyun' AND ". 
							  "CEjercicio= $EjerTrab AND ". 
							  "CClasifica = '$ClavClas' AND ". 
							  "Csubclasifi = '$SubcClas' AND ".
							  "CNumeCona = $ConsBusq ";
		   }
		//------------------------------------------------------------
		//Consulta 01 para Clasificacion
		else
		  { //Datos del Catalogo
			$InstSql = "SELECT * ".
					   "FROM acceso.acejercicio ".
					   "ORDER BY CEJclave ";
		    if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
			$EjInSql = $ConeBase->prepare($InstSql);
			$EjInSql->execute();
			$CataEjer = $EjInSql->fetchAll(); 

		  	//--------------------------------------------------	
			//Carga el registro para Consulta
			$InstSql = "SELECT CCLClave, CCLDescripcion,".	
			 				   "(SELECT count(*) ".
							    "FROM   ctconac ". 
							    "WHERE  CAyuntamiento = '$ClavAyun' AND ". 
									   "CEjercicio= $EjerTrab AND ". 
									   "CTipo = CCLTipoDocu AND ".
									   "CClasifica = CCLClave ) AS TotaRegi ". 
					   "FROM  CCClasifica ".
					   "WHERE CCLTipoDocu = '$TipoDocu' ". 
					   "ORDER BY CCLClave "; 

		}	

		if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
		$EjInSql = $ConeBase->prepare($InstSql);
		$EjInSql->execute();

		if ( isset($_GET['PaAMB01']) != '')
		  $ResuSql = $EjInSql->fetch(); 	//Para uno solo
		else
		  $ResuSql = $EjInSql->fetchAll();	//Para varios

		//if ($BandMens)  echo '1)'.$ResuSql[0].'<br>'; 

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
