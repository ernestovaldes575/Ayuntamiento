<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');

//********************************************************************
//Carga las variables
$ArCook01 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCook01);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];
$MesTrab  = $ABusqMae[2];
$EstaRevi = $ABusqMae[3];

$ArCook02 = $_COOKIE['CCaraImg'];
$ACaraImg = explode("|", $ArCook02);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$CarpTiDo = $ACaraImg[2]; 

//********************************************************************
//Informacion de la Lista

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//Ejercicio
if ( isset($_GET["Param1"]) ){
	$EjerTrab = $_GET["Param1"];
	$ArCooki4 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi .'|';
	setcookie("CBusqMae", "$ArCooki4");
}

//Estado de la revision
if ( isset($_GET["Param2"]) ){
	$EstaRevi = $_GET["Param2"];
	$ArCooki4 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi .'|';
	setcookie("CBusqMae", "$ArCooki4");
}

//*****************************************************************
//Para operacion A B C
if ( isset($_POST['C00']) ) 
 {  $CRUD =  $_POST['C00'];
	//echo "2) CRUD: $CRUD ";  

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

switch ( $CRUD )
{ case "GET": 
		//Carga el registro para ABC	
		if( isset($_GET['PaAMB01']) != ''){	
			$TipoMovi = $_GET["PaAMB01"];	#Tipo de Movimiento 
			$ConsBusq = $_GET["PaAMB02"];	#Consecutivo de busqueda
			$EstaSegu = $_GET["PaAMB03"];	#Estado del seguimiento
			echo "EstaSegu $EstaSegu <br>";
			$InstSql =  "SELECT PEjercicio,PMesRegi,". 
							   "PTitulo, PDescripcion,". 
							   "PFechPublI,PFechPublF,".
							   "TRIM(PImagenPagi) AS ImagPagi,".
							   "PDocuLiga ,TRIM(PDocumento) AS Docume, PLiga,  ". 
							   "PVentRefe ".
						"FROM  PTPagina ".
						"WHERE PAyuntamiento = '".$ClavAyun."' AND ".
							  "PEjercicio = '".$EjerTrab."' AND ".
							  "PTipoDocu = '".$TipoDocu."' AND ". 
							  "PConsecut = ".$ConsBusq." ";
			if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
			$EjInSql = $ConeBase->prepare($InstSql);
			$EjInSql->execute();
			$ResuSql = $EjInSql->fetch();

			//Valores de la tabla
			$VC03 = "";  $VC04 = ""; 
			$VC05 = "";  $VC06 = ""; $VC07 = "";
			$VC08 = "N"; $VC09 = ""; $VC10 = ""; 
			$VC11 = "N";
			
			if ($ResuSql)
			  { $VC01 = $ResuSql['PEjercicio'];	
				$VC02 = $ResuSql['PMesRegi'];	

				$VC03 = $ResuSql['PTitulo'];	
				$VC04 = $ResuSql['PDescripcion'];	

				$VC05 = $ResuSql['PFechPublI'];	//LFechPublI
				$VC06 = $ResuSql['PFechPublF'];	//LFechPublF
				
				$VC07 = $ResuSql['ImagPagi'];	//LAbrirLiDoIm

				$VC08 = $ResuSql['PDocuLiga'];	//LLiga
				$VC09 = $ResuSql['Docume'];	//LVentRefe
				$VC10 = $ResuSql['PLiga'];	//LImagen

				$VC11 = $ResuSql['PVentRefe'];	//LAImagDocu
			  }
			
			  $RutaArch = "/ExpeElectroni/$ClavAyun/PaguWeb/$EjerTrab/$CarpTiDo/";
			//-----------------------------------------------------------  	
			//Archivo a mostrar  
			$AbrirN = ""; $AbrirI = ""; $AbrirL = ""; $AbrirA = "";
			$EjecInst = '$Abrir'.$VC08.'= "checked"; '; 
			eval($EjecInst );	
			
			//-----------------------------------------------------------  	
			//Archivo el archio en ventana o  
			$MostraN = ""; $MostraV = ""; $MostraP = ""; 
			$EjecInst = '$Mostra'.$VC11.'= "checked"; '; 
			eval($EjecInst );
			
			//------------------------------------------------------------------------
		  //Datos del Catalogo
		  $InstSql = "SELECT CMDClave,CMDDescri ". 
		  			 "FROM   pcmostdoclig ";
		  if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
		  $EjInSql = $ConeBase->prepare($InstSql);
		  $EjInSql->execute();
		  $CataMoDo = $EjInSql->fetchAll(); 
		  //------------------------------------------------------------------------
		  //Datos del Catalogo
		  $InstSql = "SELECT CVDClave,CVDDescrip ". 
		  			 "FROM   pcverdoclig ";
		  if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
		  $EjInSql = $ConeBase->prepare($InstSql);
		  $EjInSql->execute();
		  $CataDoVe = $EjInSql->fetchAll(); 
			
		}
		else
		{ //Carga el registro para Consulta
		  $InstSql = "SELECT PConsecut,PEjercicio,PMesRegi,". 
		  					"PTitulo,PDescripcion,". 
		  					"PFechPublI,PFechPublF,PFechaCier,". 
							"TRIM(PImagenPagi) AS ImagPagi,".
   							"PDocuLiga,TRIM(PDocumento) AS Docume, PLiga,". 
   							"PVentRefe,PEstaSegu ".
					  "FROM  PTPagina ".
					  "WHERE PAyuntamiento = '".$ClavAyun."' AND ".
							"PUnidad =".$ConsUnid." AND ".
							"PEjercicio = '".$EjerTrab."' AND ".
							"PTipoDocu = '".$TipoDocu."' AND ". 
							"PEstado = 'A' ";
			$InstSql .=	( $EstaRevi != '00') ? " AND PEstaSegu = '".$EstaRevi."' " : "";
			
		  if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
		  $EjInSql = $ConeBase->prepare($InstSql);
		  $EjInSql->execute();
		  $ResuSql = $EjInSql->fetchAll();
		  //------------------------------------------------------------------------
		  //Datos del Catalogo
		  $InstSql = "SELECT * ".
					 "FROM Acceso.ACEjercicio";
		  if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
		  $EjInSql = $ConeBase->prepare($InstSql);
		  $EjInSql->execute();
		  $CataEjer = $EjInSql->fetchAll(); 
		  //------------------------------------------------------------------------
		  //Datos del Catalogo
		  $InstSql = "SELECT '00' AS CEPClave, 'Todos' AS CEPDescri ". 
					 "UNION ".
					 "SELECT CEPClave,CEPDescri  ".
					 "FROM   PCEstaPagi ".  
					 "ORDER BY CEPClave ";
		  if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
		  $EjInSql = $ConeBase->prepare($InstSql);
		  $EjInSql->execute();
		  $CataEsta = $EjInSql->fetchAll(); 
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
		$InstSql = "INSERT INTO PTPagina ". 
		"VALUES (Null,'$ClavAyun',$ConsUnid,". 
				"'$EjerTrab', '$MesTrab', ".
				"'$TipoDocu', '$TituLaye', '$DescLaye', ".
				"'$ConsUsua', date(now()), '$FechInic', '$FechFina', ". //Crea
				"-1, '', -1,  '', ". 	//Revisa,  Autoriza
				"-1, '', 'I',".			//Publica
				"-1, '',". 				//Cierra
				"'I','',". //I:Inic R:Revi A:Apro P:Publi C:Cierr
				"'$ArchMost','','$LigaRefe',". 
				"'$DondAbri','','A')";
		break;
	case "PUT": //Cambio
		$InstSql = "UPDATE PTPagina ". 
				   "SET    PTitulo = '$TituLaye', ".
						  "PDescripcion = '$DescLaye',". 
						  "PFechPublI = '$FechInic',". 
						  "PFechPublF = '$FechFina',". 
						  "PDocuLiga = '$ArchMost',".  
						  "PLiga = '$LigaRefe',". 
						  "PVentRefe = '$DondAbri'". 
				   "WHERE PAyuntamiento = '$ClavAyun' AND ".
						 "PEjercicio = '$EjerTrab' AND ".
						 "PTipoDocu = '$TipoDocu' AND ". 
						 "PConsecut = $ConsBusq ";
		break;
	case "DELETE": //Eliminar
		$InstSql = "UPDATE PTPagina ". 
					"SET   PEstado = 'B' ".
					"WHERE PAyuntamiento = '$ClavAyun' AND ".
						  "PEjercicio = '$EjerTrab' AND ".
						  "PTipoDocu = '$TipoDocu' AND ". 
						  "PConsecut = $ConsBusq ";
		break;	

}		

//Para las altas bajas y modificaciones
if ( $CRUD != "GET")
{ //Ejecuta la instruccion
   $BandMens = true;
  if ($BandMens)  echo '1)'.$InstSql.'<br>';	
  $ResuSql = $ConeBase->prepare($InstSql);
  $ResuSql->execute();

  $MensResp = ($ResuSql) ?  "Algo ha fallado!!!" : "Registro actualizado correctamente";
  if (!$ResuSql) 
    echo '<script>alert("'.$MensResp.'");</script>'; 

  //Regresa la secuencia del ALTA
  if  ($CRUD == "POST") 
   { //Recupera la secuencia 
	 $InstSql = "SELECT @@identity AS id "; 	
	 if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	 $RespSql = $ConeBase->prepare($InstSql);
	 $RespSql->execute();
	 $ResuSql = $RespSql->fetch();

	 $ConsBusq = 0;		
	 if ($ResuSql)
	    $ConsBusq = $ResuSql[0];

	 
   }

  // Cerrar la conexión a la base de datos	 
  $ResuSql->closeCursor();
  //$ConeBase->close();
  //$PagiRegr = ($CRUD == "DELETE" ) ? "PWRegistroList.php":
  //									   "PWRegistro.php?PaAMB01=M&PaAMB02=".$ConsBusq;
  $PagiRegr = "PWRegistroList.php";
  if ($BandMens)	 
   { $PagiRegr = "location: $PagiRegr";
     header($PagiRegr); } 
}
else
 if ( isset($_GET['PaAMB01']) != '') {
    $MesnTiMo = "";
    switch( $TipoMovi ){
      case "A":	$MesnTiMo = "Registrar";  
                  $CRUD = "POST";             break;
      case "M":	$MesnTiMo = "Actualizar"; 
                  $CRUD = "PUT";		        break;
      case "B":	$MesnTiMo = "Eliminar";
                  $CRUD = "DELETE";		    break;
     }
 }
?>	
