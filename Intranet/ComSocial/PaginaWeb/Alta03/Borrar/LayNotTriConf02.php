<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');

//Bandera de visualizar msg
$BandMens = true;

//------------------------------------------------------------------------
//Datos del Layer
$InstSql =  "SELECT LConsecut,LEjercicio,LMesRegi,". 
					   "RTRIM(LTitulo),RTRIM(LDescripcion),LFechAlta, ".
					   "RTRIM(LImagen), LAbrirLiDoIm, ". 
					   "RTRIM(LAImagDocu), RTRIM(LLiga), LVentRefe, ". 
					   "RTRIM(LSenaSord), RTRIM(CTDCarpeta), LEstaSegu ".
				"FROM  stlayers ".
				"INNER JOIN sctipodocu ON ctdclave = LTipoDocu ".				
				"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
					  "LUnidad =".$ConsUnid." AND ".
					  "LEjercicio = '".$EjerTrab."' AND ".
					  "LTipoDocu = '".$TipoDocu."' AND ". 
					  "LEstaSegu = '".$EstaRevi."' AND ".
					  "LEstado = 'A' ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$tot_rows = $ResuSql->rowCount();
$ListLaye = $ResuSql->fetchAll();

//------------------------------------------------------------------------
//Datos del Catalogo
$InstSql = 	"SELECT * ".
			"FROM acceso.acejercicio";
if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$CataEjer = $ResuSql->fetchAll(); 


// Cerrar la conexión a la base de datos
//$ConeBase->close();

?>	
