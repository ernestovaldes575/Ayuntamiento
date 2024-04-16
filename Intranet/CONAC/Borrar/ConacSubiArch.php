
<?php

include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$EjerTrab = $ABusqMae[0];	//Ejercicio 
$ClavTiCl = $ABusqMae[1];	//Clave Tipo deClasificacion 
$DescTiCl = $ABusqMae[2];	//Descri Tipo de Clasificacion
$ArchCarg = $ABusqMae[3];	//Nivel Clasificacion 1 o 2
$Clasific = $ABusqMae[4];	//Clave de la Clasificacion

if( trim($_GET['Param1']) != ''){
    $Subclasi = $_GET["Param1"];	#Sub Clasificacion
    $ConsCona = $_GET["Param2"];	#Consecutivo del conac
    $ArCooki4  = $Subclasi.'|'.$ConsCona.'|';
	setcookie("CImpoArc", "$ArCooki4");
}
echo '$Subclasi: '.$Subclasi.'<br>';

/* Param0:	0.-Archivo con mismo nombre 1.- Archivo con nombre por parte del usuario
   Param1:	Ruta del del archivo
   Param2:	Nombre del archvio por el usuario
   Param3:	Archivo con extencion
   Param4:	Redireccionara a otro archivo SinP.- Sin redireccionar pagina */

setcookie("CSubiArc", "",time()-1);

$CarpAdic = ($ArchCarg == 1) ? "/": "/I".$Subclasi."/";

$Tipo = '1';
$Ruta = $_SERVER['DOCUMENT_ROOT'].'/ExpeElectroni/'.
        $ClavAyun.'/'.$EjerTrab.'/CONAC/'.$ClavTiCl.$CarpAdic;

$Nomb = $ClavTiCl.'_'.$Clasific.'_'.$Subclasi;
$Pagi = '/Intranet/CONAC/ConacSalvArch.php';
$ArCooki5  = $Tipo .'|'. $Ruta .'|'. $Nomb .'|' .$Pagi. '|';
setcookie("CSubiArc", "$ArCooki5",time() + (60*60*24*90),'/');

echo '<br>---------------<br>'; 
echo '$Tipo: '.$Tipo.'<br>';
echo '$Ruta: '.$Ruta.'<br>';
echo '$Nomb: '.$Nomb.'<br>';
echo '$Pagi: '.$Pagi.'<br>';

if ( isset( $_COOKIE['CSubiArc']) )
 {
    $ArCooki6 = $_COOKIE['CSubiArc'];
    $ASubiArc = explode("|", $ArCooki6);
    $Tipo1 = $ASubiArc[0]; 
    $Ruta1 = $ASubiArc[1]; 
    $Nomb1 = $ASubiArc[2]; 
    $Pagi1 = $ASubiArc[3]; 

    echo '<br>---------------<br>'; 
    echo '$Tipo: '.$Tipo1.'<br>';
    echo '$Ruta: '.$Ruta1.'<br>';
    echo '$Nomb: '.$Nomb1.'<br>';
    echo '$Pagi: '.$Pagi1.'<br>';
 }    
header('location: /CargArch/SubirArch.php');
?>