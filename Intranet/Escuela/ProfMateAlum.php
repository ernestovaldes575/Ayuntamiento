<!DOCTYPE html>
<html lang="es">
<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Includes/Header.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/ConeEscuela.php');

//Carga las variables
$ArCooki2 = $_COOKIE['CEncaAcc'];
$AEncaMae = explode("|", $ArCooki2);
$ConsProf = $AEncaMae[0]; 
$NumeProf = $AEncaMae[1];
$NombProf = $AEncaMae[2];

echo "ConsProf".$ConsProf."<br>";

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//Ejercicio
if ( isset($_GET["Param1"]) ){
	$EjerTrab = $_GET["Param1"];
	$ArCooki4 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi .'|';
	setcookie("CBusqMae", "$ArCooki4");
}


if ( isset($_GET["Param2"]) ){
	$BandMens = true;

	//Crea la clase general
	$ConMaPr = $_GET["Param2"];
	$InstSql = "INSERT INTO cdhoraclas Values (NULL,DATE(NOW()),$ConMaPr) ";
	if ($BandMens) echo "1)".$InstSql."<br><br>";
	$RespSql = $con->prepare($InstSql);
	$RespSql->execute();

	//Recupera el consecutivo
	$InstSql = "SELECT @@IDENTITY as ConsHoCl ";
	if ($BandMens) echo "2)".$InstSql."<br><br>";	
	$ResuSql = $con->prepare($InstSql);
	$ResuSql->execute();
	$result = $ResuSql->fetch();
	$ConsHoCl = $result['ConsHoCl'];
	if ($BandMens) echo "3)ConsHoCl: ".$ConsHoCl."<br><br>";

	//Crea la Asistencia de la clase
	$InstSql = "INSERT INTO cdasistencia ". 
			   "SELECT $ConsHoCl, MPAConsAlum, NULL ". 
			   "FROM   cdmatprofalu ". 
			   "WHERE  MPAConsMaPr = $ConMaPr ";
			   if ($BandMens) echo "2)".$InstSql."<br><br>";			   	
	$RespSql = $con->prepare($InstSql);
	$RespSql->execute();
}

$Alta = "A";
$Modi = "A";
$Baja = "A";

$InstSql = "SELECT MPConsecutivo, MPMateria, MDescripcion, MPGrupo, ".
				  "(SELECT count(*) ". 
				   "FROM   cdhoraclas ". 
				   "WHERE  HFechaCrea = DATE(NOW()) AND ". 
				   		  "HMateProf  = MPConsecutivo) AS ClaActi ". 
		   "FROM cdmateprof ". 
		   "INNER JOIN CTMateria ON MClave = MPMateria ". 
		   "WHERE MPProfesor = $ConsProf ";
echo 	$InstSql."<br>";	   
$RespSql = $con->prepare($InstSql);
$RespSql->execute();
$ResuSql = $RespSql->fetchAll();

?>	
	<!--encabezado-->

	<div class="tabla">
		<div class="titulo"><h2><?=$NumeProf ?> / <?=$NombProf ?></h2></div>
		<div class="botones">
			<?php 
			  if($Alta == "A"){ ?>
				<button class='Nuev'>+Nuevo</button>
			<?php } ?>

			<a href="/Intranet/MenuProfe.php" class="regresar">Regresar</a>		
		</div>

		<table>
				<tr>
					<td>Clave</td>				<!--Cambiar-->
					<td>Materia</td>		<!--Cambiar-->
					<td>Grupo</td>	<!--Cambiar-->
					<td>Clase</td>
				</tr>
			<?php 
			foreach ($ResuSql as $RegiTabl): 
			    $VC03=$RegiTabl[0];		//MPConsecutivo, , , 
				$VC04=$RegiTabl[1];		//MPMateria,
				$VC05=$RegiTabl[2];		//MDescripcion,

			    $VC06=$RegiTabl[3];		//MPGrupo,
				$VC07=$RegiTabl[4]; //ClaActi
			?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->
					<td><?=$VC06?></td>				<!--Cambiar-->
					<td>
					<?php
					    if ( $VC07 == 0 ) { ?> 	
					    <a href="MateProfList.php?Param2=<?=$VC03?>"> Por Crear </a>
					<?php } else { ?>
						Creada
					 <?php  }?>  

					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>