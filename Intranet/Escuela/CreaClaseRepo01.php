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
	$ConsAlum = $_GET["Param1"];
	$FaltAsis = $_GET["Param2"];

	$CondFaAs = ($FaltAsis == "F" ) ? "= 0 " : "<> 0";
	$DescFaAs = ($FaltAsis == "F" ) ? "Falta" : "Asistencia";

 }


$InstSql = "SELECT AMatricula, ANombre ". 
		   "FROM CTAlumno ".
		   "WHERE AConsecutivo = $ConsAlum";
//echo "1)<br>".$InstSql."<br>";				
$ResuSql = $con->prepare($InstSql);
$ResuSql->execute();
$result = $ResuSql->fetch();

$ClasCrea = 0; $ClavClas="";
if( $result ){
	$MatrAlum = $result['AMatricula'];
	$NombAlum = $result['ANombre'];
}

$InstSql = "SELECT HFechaCrea, AHoraAsisten ". 
		   "FROM cdhoraclas ". 
		   "inner join CDAsistencia ON AConsHoraClas = HConsecutivo ".  
		   "WHERE HMateProf = $ConsAsis AND ". 
		   		 "HFechaCrea between '$FechInic' and '$FechTerm' AND ".
				 "AConsAlumn = $ConsAlum AND ". 
				 "HOUR(AHoraAsisten)  ".$CondFaAs." ". 
		   "Order by HFechaCrea ";
//if ($BandMens) 
echo 	$InstSql."<br>";	   
$RespSql = $con->prepare($InstSql);
$RespSql->execute();
$ResuSql = $RespSql->fetchAll();

?>	
	<!--encabezado-->

	<div class="tabla">
		<div class="titulo"><h2><?=$MatrAlum ?> / <?=$NombAlum ?><br>
								<?=$DescFaAs?> del  <?=$FechInic?> <?=$FechTerm?>
								</h2></div>
		<div class="botones">
			<a href="CreaClaseRepo.php" class="regresar">Regresar</a>		
		</div>

		<table>
				<tr>
					<td style="width:20%">Fecha</td>	 <!--Cambiar-->
					<td style="width:20%">Hora</td> <!--Cambiar-->
				</tr>
			<?php 
			foreach ($ResuSql as $RegiTabl): 
			    $VC03=$RegiTabl[0];		//AHoraAsisten
				$VC04=$RegiTabl[1];		//AMatricula
			?>
				<tr onMouseOver="this.style.background='#D6D6D6';" onMouseOut="this.style.background = '';"> 
					<td><?=$VC03?></td>	<!--Cambiar-->
					<td><?=$VC04?></td>					<!--Cambiar-->
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>