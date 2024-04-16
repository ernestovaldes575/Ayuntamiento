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

if ( isset($_GET["Param1"]) ){
	$ConsAsis = $_GET["Param1"];
	$ArCooki4 = $ConsPrMa .'|';
	setcookie("CBusqMae", "$ArCooki4");
 }
$Alta = "A";
$Modi = "A";
$Baja = "A";

$InstSql = "SELECT AHoraAsisten,AMatricula,ANombre ". 
		   "FROM  cdasistencia ". 
		   "LEFT OUTER JOIN ctalumno ON AConsAlumn = AConsecutivo ". 
		   "WHERE AConsHoraClas = $ConsAsis ";
if ($BandMens) echo 	$InstSql."<br>";	   
$RespSql = $con->prepare($InstSql);
$RespSql->execute();
$ResuSql = $RespSql->fetchAll();

?>	
	<!--encabezado-->

	<div class="tabla">
		<div class="titulo"><h2><?=$NumeProf ?> / <?=$NombProf ?></h2></div>
		<div class="botones">
			<a href="CreaClaseLista.php?Param1=<?=$ConsPrMa?>" class="regresar">Regresar</a>		
		</div>

		<table>
				<tr>
					<td style="width:20%">Hora</td>	 <!--Cambiar-->
					<td style="width:20%">Matricula</td> <!--Cambiar-->
					<td style="width:40%">Alumnos</td>
				</tr>
			<?php 
			foreach ($ResuSql as $RegiTabl): 
			    $VC03=$RegiTabl[0];		//AHoraAsisten
				$VC04=$RegiTabl[1];		//AMatricula
				$VC05=$RegiTabl[2];		//ANombre

			?>
				<tr onMouseOver="this.style.background='#D6D6D6';" onMouseOut="this.style.background = '';"> 
					<td><?=$VC03?></td>	<!--Cambiar-->
					<td><?=$VC04?></td>					<!--Cambiar-->
					<td><?=$VC05?></td>					<!--Cambiar-->
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>