
<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');

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
$AnchImag = $ACaraImg[3];
$AltoImag = $ACaraImg[4];

if( trim($_GET['Param1']) != ''){
    $ConsNoti = $_GET["Param1"];	#Consecutivo de la noticia a trabajar
    $EjerNoti = $_GET["Param2"];	#Ejercicio de la noticia
    $MesNoti  = $_GET["Param3"];	#Mes de la noticia
    $ArchTrab = $_GET["Param4"];	#Arhivo con el que se va a trabajr (Pdf, Img Blan, Img Colo, Señal )
}

$ArCook03  = $ConsNoti.'|'.$ArchTrab.'|'.
             $CarpTiDo.'|'.$AnchImag .'|'.$AltoImag .'|';
setcookie("CImpoArc", "$ArCook03",time() + (60*60),'/');

echo '$ConsNoti: '.$ConsNoti.'<br>';
echo '$CarpArch: '.$CarpArch.'<br>';

/* Param0:	0.-Archivo con mismo nombre 1.- Archivo con nombre por parte del usuario
   Param1:	Ruta del del archivo
   Param2:	Nombre del archvio por el usuario
   Param3:	Archivo con extencion
   Param4:	Redireccionara a otro archivo SinP.- Sin redireccionar pagina */

setcookie("CSubiArc", "",time()-1);

$Tipo = '1';
$Ruta = $_SERVER['DOCUMENT_ROOT']."/ExpeElectroni/$ClavAyun/PaguWeb/$EjerNoti/$CarpTiDo/";
$Nomb = $ConsNoti.'_'.$ArchTrab;
$Pagi = '/Intranet/PaginaWeb/BaneLayeNoti/Alta/ImgPagiSalvArch.php';
$ArCook04  = $Tipo .'|'. $Ruta .'|'. $Nomb .'|' .$Pagi. '|';
setcookie("CSubiArc", "$ArCook04",time() + (60*60),'/');

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
header('location: /Intranet/CargArch/SubirArchD.php');
?>