<!DOCTYPE html>
<html lang="es">

<script language="javascript">
function CreaClase(Param)
{ //
  ClavClas = prompt("Clave de Clase:","");
  location.href = "CreaClase.php?Param2="+Param+"&Param3="+ClavClas; 
} 
</script>	
<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Includes/Header.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/ConeEscuela.php');

//Carga las variables
$ArCooki2 = $_COOKIE['CEncaAcc'];
$AEncaMae = explode("|", $ArCooki2);
$ConsProf = $AEncaMae[0]; 
$NumeProf = $AEncaMae[1];
$NombProf = $AEncaMae[2];
$ConsMate = $AEncaMae[3];
$ClavMate = $AEncaMae[4];
$DescMate = $AEncaMae[5];


$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
$ConsPrMa = $ABusqMae[0]; 

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//Ejercicio
if ( isset($_GET["Param1"]) ){
	$ConsPrMa = $_GET["Param1"];
	$ArCooki4 = $ConsPrMa .'|';
	setcookie("CBusqMae", "$ArCooki4");
}


if ( isset($_GET["Param2"]) ){
	$ConsHoCl = $_GET["Param2"];
	$EstaHoCl = $_GET["Param3"];
	$CambEsta = ( $EstaHoCl == "A" ) ? "I" : "A"; 
	$InstSql = "UPDATE cdhoraclas ".
			   "SET   HClasActCer = '$CambEsta' ".
			   "WHERE HConsecutivo = $ConsHoCl ";
	if ($BandMens) echo 	$InstSql."<br>";	   
	$RespSql = $con->prepare($InstSql);
	$RespSql->execute();
	$ResuSql = $RespSql->fetchAll();				
}


$Alta = "A";
$Modi = "A";
$Baja = "A";

$InstSql = "SELECT HConsecutivo,HFechaCrea,HClavRegi, HClasActCer, ".
				 "(SELECT sum( CASE WHEN  HOUR(AHoraAsisten) = 0 ". 
						"THEN 0 ELSE 1 END) ". 
				  "FROM cdasistencia ".
				  "WHERE AConsHoraClas= HConsecutivo) AS Asisten ".
		   "FROM cdhoraclas ". 
		   "WHERE HMateProf = $ConsPrMa ". 
		   "ORDER BY HFechaCrea DESC";
if ($BandMens) echo 	$InstSql."<br>";	   
$RespSql = $con->prepare($InstSql);
$RespSql->execute();
$ResuSql = $RespSql->fetchAll();

?>	
	<!--encabezado-->

	<div class="tabla">
		<div class="titulo"><h2><?=$NumeProf ?> / <?=$NombProf ?></h2></div>
		<div class="botones">
			<a href="CreaClase.php" class="regresar">Regresar</a>		
		</div>

		<table>
				<tr>
					<td style="width:20%">Fecha</td>	 <!--Cambiar-->
					<td style="width:20%">Clave</td> <!--Cambiar-->
					<td style="width:15%">Edo</td> <!--Cambiar-->
					<td style="width:15%">Alumnos</td>
					<td style="width:15%">Detalle</td>
				</tr>
			<?php 
			foreach ($ResuSql as $RegiTabl): 
			    $VC03=$RegiTabl[0];		//HConsecutivo,,, , , 
				$VC04=$RegiTabl[1];		//HFechaCrea,
				$VC05=$RegiTabl[2];		//HClavRegi,
				$VC06=$RegiTabl[3];		//HClavRegi,
				$VC07=$RegiTabl[4];		//HClavRegi,

			?>
				<tr onMouseOver="this.style.background='#D6D6D6';" onMouseOut="this.style.background = '';"> 
					<td><?=$VC04?></td>	<!--Cambiar-->
					<td><?=$VC05?></td>					<!--Cambiar-->
					<td>
					 <a href="CreaClaseLista.php?Param2=<?=$VC03?>&Param3=<?=$VC06?>"> <?=$VC06?> </a></td>	
					<td><?=$VC07?></td>					<!--Cambiar-->
					<td><a href="CreaClaseLista01.php?Param1=<?=$VC03?>"> 
						Detalle </a>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>