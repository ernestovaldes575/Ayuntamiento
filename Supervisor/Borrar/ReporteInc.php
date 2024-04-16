<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
</head>
<body> 
<?php
//echo 'ubicacion'.$_SERVER['DOCUMENT_ROOT'].'<br>';
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');

$ClavAyun = 105; 

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

//Supervisor
$ConSupBu  = 0;	
if ( isset($_GET["Param1"]) )
{ $ConSupBu = $_GET["Param1"];

  $InstSql =  "SELECT  SNumeEmpl, SServPubli, SCategoria, SFoto ". 
			  "FROM  stsupervisor ".
			  "WHERE SAyuntamiento = '".$ClavAyun."' AND ".
					"SUnidad =".$ConUniTr." AND ".
					"SConsecut = ".$ConSupBu." "; 
  if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
  $ResuSql = $ConeBase->prepare($InstSql);
  $ResuSql->execute();
  $CataUnid = $ResuSql->fetch();

$VC01 = 0; $VC02 = ''; $VC03=''; $VC04='';
if ($CataUnid)
 { $VC01=$RegiTabl[0];		//SNumeEmpl
   $VC02=$RegiTabl[1];		//SServPubli
   $VC03=$RegiTabl[2];		//SCategoria
   $VC04=$RegiTabl[2];		//SFoto
 }	

    $ArCooki  = $ConUniTr .'|'. $ClaUniTr .'|'. $DesUniTr .'|'. 
 	  		   $ConSupBu .'|'. $VC01 .'|'. $VC02 .'|'. $VC03 .'|'. $VC04 .'|';
   setcookie("CBusqMae", "$ArCooki");
 
}

if (!$BandMens) header("Location: Reporte.php?Param1=A&Param2=0");

?>	

</body>
</html>