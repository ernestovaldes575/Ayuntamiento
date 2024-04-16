
<?php
 include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');
 include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');

 $BandMens = true;
   
//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$EjerTrab = $ABusqMae[0];	//Ejercicio 
$ClavTiCl = $ABusqMae[1];	//Clave Tipo deClasificacion 
$DescTiCl = $ABusqMae[2];	//Descri Tipo de Clasificacion
$ArchCarg = $ABusqMae[3];	//Nivel Clasificacion 1 o 2
$Clasific = $ABusqMae[4];	//Clave de la Clasificacion

$ArCooki4 = $_COOKIE['CImpoArc'];
$AImpoArc = explode("|", $ArCooki4);
$Subclasi = $AImpoArc[0]; 
$ConsCona = $AImpoArc[1]; 

$ArCooki5 = $_COOKIE['CSubiArc'];
$ASubiArc = explode("|", $ArCooki5);
$NomArcP = $ASubiArc[4]; 

$InstSql = "INSERT INTO ctconac ". 
           "VALUES (NULL,'$ClavAyun','$EjerTrab',".
                   "'$ClavTiCl','$Clasific','$Subclasi','$NomArcP')";

if ( $ConsCona > 0 )
  $InstSql = "UPDATE ctconac ". 
             "SET    CArchivo = '$NomArcP' ".
             "WHERE CAyuntamiento = '$ClavAyun' AND ".
                   "CConsect = '$EjerTrab' ";

if ($BandMens)  echo '1)'.$InstSql.'<br>';	
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();

$MensResp = "Algo ha fallado!!!";
if ($ResuSql) 
    $MensResp = "Registro actualizado correctamente";

setcookie("CImpoArc", "",time()-1);
setcookie("CSubiArc", "",time()-1);
?>