<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');	

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//*****************************************************************
//Para operacion A B C
if ( isset($_POST['C00']) ) 
 {  $CRUD 	  =  $_POST['C00'];
	$TipoMovi = $_POST['C01'];
	$ConsBusq = $_POST['C02']; 
	
	$NombExtr = $_POST['C03']; 
	$FechExtr = $_POST['C04'];
 }	

switch ( $CRUD )
 { case "GET":
			if( isset($_GET['PaCRUD01']) != ''){
				$BandMens = true;
				//Leer dotos de un registro
				$TipoMovi = $_GET["PaCRUD01"];	#Tipo de Movimiento 
				$ConsBusq = $_GET["PaCRUD02"];	#COINCIDENCIA CON LA BD 

				$InstSql =  "SELECT BPersoExtra, BFechExtra  ". 
							"FROM   BTBoletinExtr ".
							"WHERE  BAyuntamiento = '$ClavAyun' AND ".
								   "BConsecut =$ConsBusq ";
				if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
				$ResuSql = $ConeBase->prepare($InstSql);
				$ResuSql->execute();
				$ListSupe = $ResuSql->fetch();

				//Variables
				$VC03 = "";  $VC04 = ""; 
				if ($ListSupe)
				{ 	$VC03 = $ListSupe['BPersoExtra'];	
					$VC04 = $ListSupe['BFechExtra'];
				}

			 }
			else
			 {  //Listado de Supervisores
				$InstSql =  "SELECT BConsecut, BPersoExtra, BFechExtra, BFoto ". 
							"FROM   BTBoletinExtr ".
							"WHERE BAyuntamiento = '$ClavAyun' AND ".
								  "BEstado = 'A' ". 
								  "ORDER BY BFechExtra"	  ;
					if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
					$ResuSql = $ConeBase->prepare($InstSql);
					$ResuSql->execute();
					$tot_rows = $ResuSql->rowCount();
					$ListSupe = $ResuSql->fetchAll();
			 }
			break;
	case "POST": #Alta
			$InstSql = "INSERT INTO BTBoletinExtr ". 
					   "VALUES (Null,'$ClavAyun', '$NombExtr','$FechExtr',".
							   "'',$ConsUsua,date(now()),'A')";
	
			break;
	case "PUT": #Modificacion
			$InstSql = "UPDATE BTBoletinExtr ". 
						"SET   BPersoExtra = '$NombExtr', ".
							  "BFechExtra = '$FechExtr', ".
							  "BSerPubMo = $ConsUsua,".
							  "BFechModi = date(now()) ".
						"WHERE BAyuntamiento = '$ClavAyun' AND ".
							  "BConsecut = $ConsBusq ";
				break;
	case "DELETE": #Baja
			$InstSql = "UPDATE BTBoletinExtr ". 
					   "SET   BEstado = 'B' ".
							"BSerPubMo = $ConsUsua,".
							"BFechModi = date(now()) ".
						"WHERE BAyuntamiento = '$ClavAyun' AND ".
							"BConsecut = $ConsBusq ";
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

  // Cerrar la conexión a la base de datos	 
  //$ResuSql->closeCursor();
  //$ConeBase->close();
  /*$PagiRegr = ($CRUD == "DELETE" ) ? "PWRegistroList.php":
  									 "PWRegistro.php?PaAMB01=M&PaAMB02=".$ConsBusq;*/
  $PagiRegr = "BoletinList.php";
  if ($BandMens)	 
   { $PagiRegr = "location: $PagiRegr";
     header($PagiRegr); } 
}
else
 if ( isset($_GET['PaCRUD01']) != '') {
    $MesnTiMo = "";
    switch( $TipoMovi ){
      case "A":	$MesnTiMo = "Registrar";  
                $CRUD = "POST";         break;
      case "M":	$MesnTiMo = "Actualizar"; 
                $CRUD = "PUT";		  break;
      case "B":	$MesnTiMo = "Eliminar";
                $CRUD = "DELETE";		  break;
     }
 }

?>	
