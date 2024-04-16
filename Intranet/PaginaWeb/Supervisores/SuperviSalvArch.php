
<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');

 $BandMens = true;
   
$ArCooki4 = $_COOKIE['CImpoArc'];
$AImpoArc = explode("|", $ArCooki4);
$ConsBusq = $AImpoArc[0]; 
if ($BandMens)  echo '1)'.$ConsBusq.'<br>';	

$ArCooki5 = $_COOKIE['CSubiArc'];
$ASubiArc = explode("|", $ArCooki5);
$NomArcP = $ASubiArc[4]; 
if ($BandMens)  echo '2)'.$NomArcP.'<br>';	

$InstSql = "UPDATE stsupervisor ". 
           "SET SFoto = '$NomArcP' ".
           "WHERE SAyuntamiento = '$ClavAyun' AND ".
                 "SConsecut =$ConsBusq ";

if ($BandMens)  echo '3)'.$InstSql.'<br>';	
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();

setcookie("CImpoArc", "",time()-1);
setcookie("CSubiArc", "",time()-1);

$MensResp = "Algo ha fallado!!!";
if ($ResuSql) 
    $MensResp = "Registro actualizado correctamente";



?>