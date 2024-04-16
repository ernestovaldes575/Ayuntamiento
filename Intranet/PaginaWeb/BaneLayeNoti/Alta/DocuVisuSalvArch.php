
<?php
 include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
 include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasPagWeb.php');

 $BandMens = true;
   
//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$TipoDocu = $ABusqMae[0]; 
$EjerTrab = $ABusqMae[1];

$ArCooki4 = $_COOKIE['CImpoArc'];
$AImpoArc = explode("|", $ArCooki4);
$ConsNoti = $AImpoArc[0]; 
$ArchTrab = $AImpoArc[1];

$CampModi = "";
switch( $ArchTrab ){
    case "I":	$CampModi = "PDocumento";  break;  //Imagen Pagina
    case "A":	$CampModi = "PDocumento";   break;  //Documento Mostrar
    case "S":	$CampModi = "LSenaSord";    break;  //Imagen de Señal
}

$ArCooki5 = $_COOKIE['CSubiArc'];
$ASubiArc = explode("|", $ArCooki5);
$NomArcP = $ASubiArc[4]; 

$InstSql = "UPDATE PTPagina ". 
           "SET ".$CampModi." = '".$NomArcP."' ".
           "WHERE PAyuntamiento = '".$ClavAyun."' AND ".
                 "PEjercicio = '".$EjerTrab."' AND ".
                 "PConsecut = ".$ConsNoti." ";

if ($BandMens)  echo '1)'.$InstSql.'<br>';	
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();

setcookie("CImpoArc", "",time()-1);
setcookie("CSubiArc", "",time()-1);

$MensResp = "Algo ha fallado!!!";
if ($ResuSql) 
    $MensResp = "Registro actualizado correctamente";

?>
<script language="javascript">
window.close();
opener.top.location.reload();
</script>