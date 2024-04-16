<?php
//echo 'ubicacion'.$_SERVER['DOCUMENT_ROOT'].'<br>';
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
	
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

$InstSql =  "SELECT LConsecut,LEjercicio,LMesRegi,". 
				"RTRIM(LTitulo),RTRIM(LDescripcion),LFechAlta, ".
				"RTRIM(LImagen), RTRIM(LArchDocu),". 
				"RTRIM(LLiga), RTRIM(LSenaSord), ". 
				"RTRIM(CTDCarpeta), LEstaSegu ".
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

//Datos del Catalogo
$InstSql = 	"SELECT * ".
"FROM acceso.acejercicio";
if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$CataEjer = $ResuSql->fetchAll();
?>	
