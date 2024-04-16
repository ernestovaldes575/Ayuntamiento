
<?php

include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');

//Inicializa cookies
setcookie("CSubiArc", "",time()-1);
setcookie("CImpoArc", "",time()-1);

if( trim($_GET['Param1']) != ''){
    $ConsBusq = $_GET["Param1"];	#Consecutivo de la noticia a trabajar
    $ArCooki4  = $ConsBusq.'||';
	 setcookie("CImpoArc", "$ArCooki4");
}
echo '$ConsBusq: '.$ConsBusq.'<br>';


/* Param0:	0.-Archivo con mismo nombre 1.- Archivo con nombre por parte del usuario
   Param1:	Ruta del del archivo
   Param2:	Nombre del archvio por el usuario
   Param3:	Archivo con extencion
   Param4:	Redireccionara a otro archivo SinP.- Sin redireccionar pagina */

$Tipo = '1';
$Ruta = $_SERVER['DOCUMENT_ROOT'].'/ExpeElectroni/'.$ClavAyun.'/'.$EjerTrab.'/BoleExtr/';
$Nomb = $ConsBusq.'_Bole';
$Pagi = '/Intranet/PaginaWeb/Boletin/BoletinSalvArch.php';
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