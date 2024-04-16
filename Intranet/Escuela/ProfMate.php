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
	$ConMate = $_GET["Param2"];
	$InstSql = "INSERT INTO cdmateprof Values (NULL,$ConMate,$ConsProf,'','A') ";
	if ($BandMens) echo "1)".$InstSql."<br><br>";
	$RespSql = $con->prepare($InstSql);
	$RespSql->execute();
}

$Alta = "A";
$Modi = "A";
$Baja = "A";

$InstSql = "SELECT MConsecutivo, MClave, MDescripcion, ".
				  "(SELECT count(*) ". 
				   "FROM   cdmateprof ". 
				   "WHERE  MPProfesor = $ConsProf AND ".
				   		  "MPMateria = MConsecutivo) AS ClasAsig ". 
		   "FROM  ctmateria ". 
		   "ORDER BY MClave";
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
					<td>Descripción</td>	<!--Cambiar-->
					<td>Materia</td>
				</tr>
			<?php 
			foreach ($ResuSql as $RegiTabl): 
			    $VC03=$RegiTabl[0];		//MConsecutivo, , , , , 
				$VC04=$RegiTabl[1];		//MClave,
				$VC05=$RegiTabl[2];		//MDescripcion,

			    $VC06=$RegiTabl[3];		//ClasAsig,
			?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->
					<td>
					<?php
					    if ( $VC06 == 0 ) { ?> 	
					    <a href="ProfMate.php?Param2=<?=$VC03?>"> Por Asignar </a>
					<?php } else { ?>
						Asignada
					 <?php  }?>  

					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>