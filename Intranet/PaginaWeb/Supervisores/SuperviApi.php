<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');	

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$ConUniTr = $ABusqMae[0]; 
$ClaUniTr = $ABusqMae[1];
$DesUniTr = $ABusqMae[2];

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//*****************************************************************
//Para operacion A B C
if ( isset($_POST['C00']) ) 
 {  $CRUD =  $_POST['C00'];
	$TipoMovi = $_POST['C01'];
	$ConsBusq = $_POST['C02']; 
	
	$NumeEmpl = $_POST['C03']; 
	$ServPubl = $_POST['C04'];
	$Categori = $_POST['C05']; 
 }	

switch ( $CRUD )
 { case "GET":
			if( isset($_GET['PaCRUD01']) != ''){
				$BandMens = true;
				//Leer dotos de un registro
				$TipoMovi = $_GET["PaCRUD01"];	#Tipo de Movimiento 
				$ConsBusq = $_GET["PaCRUD02"];	#COINCIDENCIA CON LA BD 

				$InstSql =  "SELECT SNumeEmpl, SServPubli, SCategoria ". 
							"FROM  stsupervisor ".
							"WHERE SAyuntamiento = '$ClavAyun' AND ".
								"SConsecut =$ConsBusq ";
				if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
				$ResuSql = $ConeBase->prepare($InstSql);
				$ResuSql->execute();
				$ListSupe = $ResuSql->fetch();

				//Variables
				$VC03 = "";  $VC04 = ""; 
				$VC05 = "";  $VC06 = "";
				if ($ListSupe)
				{ 	$VC03 = $ListSupe['SNumeEmpl'];	
					$VC04 = $ListSupe['SServPubli'];
					$VC05 = $ListSupe['SCategoria'];
				}

				$MesnTiMo = "";
				switch( $TipoMovi ){
					case "A":	$MesnTiMo = "Registrar";  break;
					case "M":	$MesnTiMo = "Actualizar"; break;
					case "B":	$MesnTiMo = "Eliminar";   break;
				}	

			 }
			else
			 {  //Listado de Supervisores
				$InstSql =  "SELECT SConsecut, SNumeEmpl, SServPubli, SCategoria, SFoto ". 
							"FROM  stsupervisor ".
							"WHERE SAyuntamiento = '".$ClavAyun."' AND ".
								  "SUnidad =".$ConUniTr." AND ".
								  "SEstado = 'A' ". 
								  "ORDER BY SNumeEmpl"	  ;
					if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
					$ResuSql = $ConeBase->prepare($InstSql);
					$ResuSql->execute();
					$tot_rows = $ResuSql->rowCount();
					$ListSupe = $ResuSql->fetchAll();
			 }
			break;
	case "POST": #Alta
			/* `SConsecut`, `SAyuntamiento`, `SUnidad`, 
					`SNumeEmpl`, `SServPubli`, `SCategoria`, 
					`SFoto`, `SSerPubMo`, `SFechModi`, `SEstado`
				*/
			$InstSql = "INSERT INTO stsupervisor ". 
					   "VALUES (Null,'$ClavAyun',$ConUniTr,". 
							   "'$NumeEmpl', '$ServPubl','$Categori',".
							   "'',$ConsUsua,date(now()),'A')";
	
			break;
	case "PUT": #Modificacion
			$InstSql = "UPDATE stsupervisor ". 
						"SET   SNumeEmpl = '$NumeEmpl', ".
							  "SServPubli = '$ServPubl', ".
							  "SCategoria = '$Categori', ".
							  "SSerPubMo = $ConsUsua,".
							  "SFechModi = date(now()) ".
						"WHERE SAyuntamiento = '$ClavAyun' AND ".
							  "SConsecut = $ConsBusq ";
				break;
	case "DELETE": #Baja
			$InstSql = "UPDATE stsupervisor ". 
							"SET   SEstado = 'B', ".
								  "SSerPubMo = $ConsUsua,".
								  "SFechModi = date(now()) ".
							"WHERE SAyuntamiento = '$ClavAyun' AND ".
								  "SConsecut = $ConsBusq ";
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
  $PagiRegr = "SuperviList.php";
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
