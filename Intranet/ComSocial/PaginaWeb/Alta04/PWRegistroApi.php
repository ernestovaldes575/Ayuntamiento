<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');

//********************************************************************
//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];
$MesTrab  = $ABusqMae[2];
$EstaRevi = $ABusqMae[3];

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
	echo "Valor CRUD: $CRUD ";  

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

			//Valores de la tabla
			$VC03 = "";  $VC04 = ""; 
			$VC05 = "";  $VC06 = "";
			$VC07 = "N"; $VC08 = ""; $VC09 = "N";
			
			if ($ResuSql)
			  { $VC03 = $ResuSql['LTitulo'];	//LTitulo
				$VC04 = $ResuSql[1];	//LDescripcion
				$VC05 = $ResuSql[2];	//LFechPublI
				$VC06 = $ResuSql[3];	//LFechPublF
				$VC07 = $ResuSql[4];	//LAbrirLiDoIm
				$VC08 = $ResuSql[5];	//LLiga
				$VC09 = $ResuSql[6];	//LVentRefe
			
				$VC10 = $ResuSql[7];	//LImagen
				$VC11 = $ResuSql[8];	//LAImagDocu
				$VC12 = $ResuSql[9];	//CTDCarpeta
			  }
			
			  $RutaArch = '/ExpeElectroni/'.$ClavAyun.'/PaguWeb/'.$EjerTrab.'/'.$VC12.'/';
			//-----------------------------------------------------------  	
			//Archivo a mostrar  
			$AbrirN = ""; $AbrirI = ""; $AbrirL = ""; $AbrirA = "";
			$EjecInst = '$Abrir'.$VC07.'= "checked"; '; 
			eval($EjecInst );	
			
			//-----------------------------------------------------------  	
			//Archivo el archio en ventana o  
			$MostraN = ""; $MostraV = ""; $MostraP = ""; 
			$EjecInst = '$Mostra'.$VC09.'= "checked"; '; 
			eval($EjecInst );	
			
		}
		else
		{ //Carga el registro para Consulta
		  $InstSql = "SELECT LConsecut,LEjercicio,LMesRegi,". 
		  					"LTitulo,LDescripcion,". 
		  					"LFechPublI,LFechPublF,LFechaCier,LEstaSegu,".
   							"TRIM(LImagen),LAbrirLiDoIm,TRIM(LAImagDocu),". 
   							"LLiga,LVentRefe, TRIM(CTDCarpeta), ".
							"LEstaCrea,LEstaRevi,LEstaPubl,LEstaSegu ".
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
		  //------------------------------------------------------------------------
		  //Datos del Catalogo
		  $InstSql = "SELECT CEPClave,CEPDescri  ".
					 "FROM cestapagi ". 
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
  $PagiRegr = "PWRegistroList01.php";
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
