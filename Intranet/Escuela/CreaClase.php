<!DOCTYPE html>
<html lang="es">

<script language="javascript">
function CreaClase(Param)
{ //
  ClavClas = prompt("Clave de Clase:","");
  location.href = "CreaClase.php?Param2="+Param+"&Param3="+ClavClas; 
} 

function RepoFalt(Param)
{ //
  FechInic = prompt("Fecha Inicial(YYYY/MM/DD) :","");
  FechTerm = prompt("Fecha Final(YYYY/MM/DD) :","");
  location.href = "CreaClaseRepo.php?Param1="+Param+"&Param2="+FechInic+"&Param3="+FechTerm; 
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

	//Crea la clase general
	$ConMaPr = $_GET["Param2"];
	$ClavClas = $_GET["Param3"];
	$InstSql = "INSERT INTO cdhoraclas Values (NULL,DATE(NOW()),$ClavClas,'A',$ConMaPr) ";
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
				   		  "HMateProf  = MPConsecutivo) AS ClaActi, ".
				  "(SELECT count(*) ".
				   "FROM   cdmatprofalu ". 
				   "WHERE  MPAConsMaPr = MPConsecutivo) AS TotaAlum ".
		   "FROM cdmateprof ". 
		   "INNER JOIN CTMateria ON MConsecutivo = MPMateria ". 
		   "WHERE MPProfesor = $ConsProf AND ". 
		   		 "Mclave = '$ClavMate' ";
if ($BandMens) echo 	$InstSql."<br>";	   
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
					<td style="width:20%">Clave</td>	 <!--Cambiar-->
					<td style="width:25%">Materia</td> <!--Cambiar-->
					<td style="width:10%">Grupo</td>	 <!--Cambiar-->
					<td style="width:10%">Alumnos</td>
					<td style="width:10%">Edo Clas</td>
					<td style="width:10%">Asisten</td>
					<td style="width:10%">Repo Falta</td>
				</tr>
			<?php 
			foreach ($ResuSql as $RegiTabl): 
			    $VC03=$RegiTabl[0];		//MPConsecutivo, , , 
				$VC04=$RegiTabl[1];		//MPMateria,
				$VC05=$RegiTabl[2];		//MDescripcion,

			    $VC06=$RegiTabl[3];		//MPGrupo,
				$VC07=$RegiTabl[4]; //ClaActi
				$VC08=$RegiTabl[5]; //Tota AlumClaActi	
			?>
				<tr onMouseOver="this.style.background='#D6D6D6';" onMouseOut="this.style.background = '';"> 
					<td><?=$VC04?></td>	<!--Cambiar-->
					<td><?=$VC05?></td>					<!--Cambiar-->
					<td><?=$VC06?></td>					<!--Cambiar-->
					<td><?=$VC08?></td>
					<td>
					<?php
					    if ( $VC07 == 0 ) { ?> 	
					    <a href="CreaClase.php?Param2=<?=$VC03?>"> 
						<a href="#" onclick="CreaClase(<?=$VC03?>)">
						Por Crear </a>
					<?php } else { ?>
						Creada
					 <?php  }?>  

					</td>
					<td>
					  <a href="CreaClaseLista.php?Param1=<?=$VC03?>">	
						Lista</a>
					</td>
					<td>	
						<a href="#" onclick="RepoFalt(<?=$VC03?>)">
						Reporte </a>
					</td>		
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>