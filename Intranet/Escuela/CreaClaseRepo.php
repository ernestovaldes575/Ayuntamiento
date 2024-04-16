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
$ConsAsis = $ABusqMae[0]; 
$FechInic = $ABusqMae[1];
$FechTerm = $ABusqMae[2];


//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

if ( isset($_GET["Param1"]) ){
	$ConsAsis = $_GET["Param1"];
	$FechInic = $_GET["Param2"];
	$FechTerm = $_GET["Param3"];
	$ArCooki4 = $ConsAsis .'|'. $FechInic .'|'. $FechTerm .'|';
	setcookie("CBusqMae", "$ArCooki4");

 }

$InstSql = "SELECT AConsAlumn, AMatricula, ANombre,". 
				  "SUM(CASE WHEN  HOUR(AHoraAsisten) = 0 ". 
				  		   "THEN 1 ELSE 0 END) as Falta,". 
				  "SUM(CASE WHEN  HOUR(AHoraAsisten) = 0 ". 
				  		   "THEN 0 ELSE 1 END) Asistencia ". 
		   "FROM cdhoraclas ". 
		   "inner join CDAsistencia ON AConsHoraClas = HConsecutivo ". 
		   "inner join CTAlumno ON Aconsecutivo = AConsAlumn ". 
		   "WHERE HMateProf = $ConsAsis AND ". 
		   		"HFechaCrea between '$FechInic' and '$FechTerm' ". 
		   "Group by AConsAlumn,AMatricula,ANombre; ";
if ($BandMens) echo 	$InstSql."<br>";	   
$RespSql = $con->prepare($InstSql);
$RespSql->execute();
$ResuSql = $RespSql->fetchAll();

?>	
	<!--encabezado-->

	<div class="tabla">
		<div class="titulo"><h2><?=$NumeProf ?> / <?=$NombProf ?><br>
	    del <?=$FechInic?> <?=$FechTerm?>
	</h2></div>
		<div class="botones">
			<a href="CreaClase.php" class="regresar">Regresar</a>		
		</div>

		<table>
				<tr>
					<td style="width:20%">Matricula</td>	 <!--Cambiar-->
					<td style="width:20%">Alumnos</td> <!--Cambiar-->
					<td style="width:20%">Falta</td>
					<td style="width:20%">Asisten</td>
				</tr>
			<?php 
			foreach ($ResuSql as $RegiTabl): 
			    $VC03=$RegiTabl[0];		//AHoraAsisten
				$VC04=$RegiTabl[1];		//AMatricula
				$VC05=$RegiTabl[2];		//ANombre
				$VC06=$RegiTabl[3];		//ANombre
				$VC07=$RegiTabl[4];		//ANombre	
			?>
				<tr onMouseOver="this.style.background='#D6D6D6';" onMouseOut="this.style.background = '';"> 
					<td><?=$VC04?></td>	<!--Cambiar-->
					<td><?=$VC05?></td>					<!--Cambiar-->
					<td><a href="CreaClaseRepo01.php?Param1=<?=$VC03?>&Param2=F">
						<?=$VC06?></a></td>					<!--Cambiar-->
					<td><a href="CreaClaseRepo01.php?Param1=<?=$VC03?>&Param2=A">
					    <?=$VC07?></a></td>					<!--Cambiar-->
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>