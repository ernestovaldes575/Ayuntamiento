<?php
 //archivo de conexion a la bd
 include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conexion.php');

 //******************************************************
 //Parametros de la Lista
 if ( isset($_GET["Param1"]) ){
    $EjerTrab = $_GET["Param1"];
    $ArCooki3 = $ConsUsua.'|'.$ClavAyun.'|'.$DescAyun.'|'.$ConsUnid.'|'.$DescUnid.'|'.$EjerTrab.'|';
    setcookie("CEncaMae", "$ArCooki3");
}

//******************************************************
 //Parametros del CRUD
 if (isset($_POST['C00'])) 
 { $CRUD =  $_POST['C00'];
   echo "Valor CURT: $CRUD "; 

   $TipoMovi = $_POST['C01'];
   $ConsBusq = $_POST['C02']; 
   
   //Modificar 
   $AFechIni = htmlentities(addslashes($_POST['AFechaInicio']));
   $AFechTer = htmlentities(addslashes($_POST['AFechaTermino']));
   $ADenomin = htmlentities(addslashes($_POST['ADenominacion']));
   $AFundame = htmlentities(addslashes($_POST['AFundamento']));
   $AHipervi = htmlentities(addslashes($_POST['AHipervinculo']));
   $AAreaRes = htmlentities(addslashes($_POST['AAreaResp']));
   $ANota    = htmlentities(addslashes( $_POST['ANota']));
 }

 //******************************************************
 //Instrucciones SQL
 switch ($CRUD)
 { case "GET":
            //Cargar los datos del CRUD
            if ( isset($_GET['PaCRUD01']) != '') {
              $TipoMovi = $_GET["PaCRUD01"];	#Tipo de Movimiento 
              $ConFacAr = $_GET["PaCRUD02"];	#COINCIDENCIA CON LA BD  
		
              //Datos de la tabla
              $InstSql = "SELECT * ". 
                         "FROM ttfadear ". 
                         "WHERE AConsecutivo = $ConFacAr";
              $EjInSql = $conexion->prepare($InstSql);
              $EjInSql->execute();
              $RegiTabl = $EjInSql->fetch();

              $r1 = ""; $r2 = ""; $r3 = ""; 
              $r4 = ""; $r5 = ""; $r6 = ""; 
              $r7 = ""; $r8 = ""; $r9 = ""; $r10 = "";
              if ($RegiTabl)
               { $r1  = $RegiTabl['AAyuntamiento'];
                 $r2  = $RegiTabl['AEjercicio'];
                 $r3  = $RegiTabl['AFechaInicio'];
                 $r4  = $RegiTabl['AFechaTermino'];
                 $r5  = $RegiTabl['AArea'];
                 $r6  = $RegiTabl['ADenominacion'];
                 $r7  = $RegiTabl['AFundamento'];
                 $r8  = $RegiTabl['AHipervinculo'];
                 $r9  = $RegiTabl['AAreaResp'];
                 $r10 = $RegiTabl['ANota']; }

              //Datos del Catalogo
              $InstSql = "SELECT * ".
                         "FROM tcarea";
              $EjInSql = $conexion->prepare($InstSql);
              $EjInSql->execute();
              $CataArea = $EjInSql->fetchAll();

             } else {
              //Lista los registros 
              $InstSql = "SELECT * ".
                         "FROM   ttfadear ".				//Cambiar
                         "WHERE  AAyuntamiento = '".$ClavAyun."' AND ".
                                "AEjercicio = '".$EjerTrab."'";
              $EjInSql = $conexion->prepare($InstSql);
              $EjInSql->execute();
              //$tot_rows = $resultado->rowCount();
              $ResuSql = $EjInSql->fetchAll();

              //Datos del Catalogo
              $InstSql = "SELECT * ". 
                         "FROM tcejercicio";
              $EjInSql = $conexion->prepare($InstSql);
              $EjInSql->execute();
              $CataEjer = $EjInSql->fetchAll();
            }
            break;
    case "POST": //Alta 
                $InstSql = "INSERT INTO ttfadear (AAyuntamiento, AEjercicio, ".
                                         "AFechaInicio, AFechaTermino, AArea, ADenominacion, AFundamento, AHipervinculo, AAreaResp, ANota) ".
                            "VALUES ('$ClavAyun', $EjerTrab, '$AFechIni', '$AFechTer',". 
                                    " $ConsUnid ,'$ADenomin','$AFundame', '$AHipervi',".
                                    "'$AAreaRes', '$ANota')";
            break;
    case "PUT": //Cambio  
               $InstSql = "UPDATE ttfadear ".
                          "SET AFechaInicio = '$AFechIni', AFechaTermino = '$AFechTer',". 
                              "ADenominacion = '$ADenomin', AFundamento = '$AFundame',". 
                              "AHipervinculo = '$AHipervi', AAreaResp = '$AAreaRes', ". 
                              "ANota = '$ANota' ".
                          "WHERE AConsecutivo = $ConsBusq";        
            break;
    case "DELETE": //Eliminar 
                  $InstSql = "DELETE FROM ttfadear ".
                             "WHERE AConsecutivo = $ConsBusq";       

            break;
 }            

 //****************************************************** 
//Para las altas bajas y modificaciones
if ( $CRUD != "GET")
{ //Ejecuta la instruccion
  $BandMens = true;
  if ($BandMens)  echo "1)$InstSql<br>";	
  $ResuSql = $conexion->prepare($InstSql);
  $ResuSql->execute();

  $MensResp = ($ResuSql) ?  "Algo ha fallado!!!" : "Registro actualizado correctamente";
  if (!$ResuSql) 
    echo '<script> alert("'.$MensResp.'");</script>'; 

  //Para la ALTA
  if  ($CRUD == "POST") 
   { //Recupera la secuencia 
	 $InstSql = "SELECT @@identity AS id "; 	
	 if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	 $RespSql = $conexion->prepare($InstSql);
	 $RespSql->execute();
	 $ResuSql = $RespSql->fetch();

	 $ConsBusq = 0;		
	 if ($ResuSql)
	    $ConsBusq = $ResuSql[0];
    }

    // Cerrar la conexión a la base de datos	 
    $ResuSql->closeCursor();
    //$ConeBase->close();

    //Regresar pagina
	$PagiRegr = ($CRUD == "DELETE")? "FacdeAreCons.php" : 
                                     "FacdeAreForm.php?PaCRUD01=M&PaCRUD02=".$ConsBusq;
                                     
    $PagiRegr = "FacdeAreCons.php";

  if ($BandMens)	 
   { $PagiRegr = "location: $PagiRegr";
     header($PagiRegr); } 

}
else
 if ( isset($_GET['PaCRUD01']) != '') {
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