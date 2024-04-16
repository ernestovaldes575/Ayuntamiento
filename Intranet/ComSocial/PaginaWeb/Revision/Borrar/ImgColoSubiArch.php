
<?php

include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];
$MesTrab  = $ABusqMae[2];
echo '$TipoDocu: '.$TipoDocu.'<br>';

if( trim($_GET['Param1']) != ''){
    $ConsNoti = $_GET["Param1"];	#Consecutivo de la noticia a trabajar
    $EjerNoti = $_GET["Param2"];	#Ejercicio de la noticia
    $MesNoti  = $_GET["Param3"];	#Mes de la noticia
    $ArchTrab = $_GET["Param4"];	#Arhivo con el que se va a trabajr (Pdf, Img Blan, Img Colo, Señal )
    $ArCooki4  = $ConsNoti.'|'.$ArchTrab.'|';
	setcookie("CImpoArc", "$ArCooki4");
}
echo '$ConsNoti: '.$ConsNoti.'<br>';

$CarpArch = "";
switch( $TipoDocu ){
    case "01":	$CarpArch = "Baners";    break;
    case "02":	$CarpArch = "LayerInfo";    break;
    case "03":	$CarpArch = "LayerSegu";    break;
    case "04":	$CarpArch = "Noticias";    break;
}

echo '$CarpArch: '.$CarpArch.'<br>';

/* Param0:	0.-Archivo con mismo nombre 1.- Archivo con nombre por parte del usuario
   Param1:	Ruta del del archivo
   Param2:	Nombre del archvio por el usuario
   Param3:	Archivo con extencion
   Param4:	Redireccionara a otro archivo SinP.- Sin redireccionar pagina */

setcookie("CSubiArc", "",time()-1);

$Tipo = '1';
$Ruta = $_SERVER['DOCUMENT_ROOT'].'/ExpeElectroni/'.$ClavAyun.'/PaguWeb/'.$EjerNoti.'/'.$CarpArch.'/';
$Nomb = $ConsNoti.'_'.$ArchTrab;
$Pagi = '/Intranet/ComSocial/PaginaWeb/Revision/ImgColoSalvArch.php';
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
header('location: /Intranet/CargArch/SubirArch.php');
?>