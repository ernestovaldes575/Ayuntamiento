<!DOCTYPE html>
<html lang="es">

<?php 
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');

$ArCook01 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCook01);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];
$MesTrab  = $ABusqMae[2];

if ( isset($_GET["CambSegu"]) ) {
  $ConsCamb =  $_GET["ConsDocu"];
  $NuevSegu =  $_GET["CambSegu"];

   //Regresar al inicio 
  $CampAdic = " ";
  if ( $NuevSegu == "01" )
   $CampAdic = "PEstaCrea = 'C', PSerPubRev= -1, ";

  $InstSql = "UPDATE PTPagina ". 
             "SET    $CampAdic PEstaSegu = '$NuevSegu' ".
             "WHERE  PAyuntamiento = '$ClavAyun' AND ".
                    "PEjercicio = '$EjerTrab' AND ".
                    "PTipoDocu = '$TipoDocu' AND ". 
                    "PConsecut = $ConsCamb ";
  echo  "1)<br> $InstSql <br>";
  $ResuSql = $ConeBase->prepare($InstSql);
  $ResuSql->execute();

  $MensResp = ($ResuSql) ?  "Algo ha fallado!!!" : "Registro actualizado correctamente";
  if (!$ResuSql) 
    echo '<script>alert("'.$MensResp.'");</script>';

    header( "Location: PWRegistro.php?PaAMB01=M&PaAMB02=$ConsCamb&PaAMB03=$NuevSegu" );  
    
 } 
?>  
</table>  
</body>
</html>