<!DOCTYPE html>
<html lang="es">
<?php 
//include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Includes/Header.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/ConeEscuela.php');

$ArCooki2 = $_COOKIE['CEncaAcc'];
$AEncaMae = explode("|", $ArCooki2);
$ConsAlum = $AEncaMae[0]; 
$MatrAlum = $AEncaMae[1]; 
$NombAlum = $AEncaMae[2]; 
$ConsMate = $AEncaMae[3]; 
$ClavMate = $AEncaMae[4]; 
$NombMate = $AEncaMae[5]; 
$ConsProf = $AEncaMae[6]; 
$NombProf = $AEncaMae[7]; 
$ConsMaPr = $AEncaMae[8]; 

$BandPaLi = false;
if(isset($_POST['Enviar'])){ 
	$ClasCrea = $_POST['C01'];
	$ClavClas = $_POST['C02'];
	$ClavDigi = $_POST['C03'];

	if ( $ClavClas == $ClavDigi )
	 {
		$InstSql = "UPDATE cdasistencia ". 
				   "SET AHoraAsisten = time(now()) ". 
		   		   "WHERE AConsHoraClas = $ClasCrea AND ". 
		   				 "AConsAlumn = $ConsAlum;";
		//echo "1)<br>".$InstSql."<br>";
		$ResuSql = $con->prepare($InstSql);
		$ResuSql->execute();
		$result = $ResuSql->fetch();
	 }
	else
	 { $BandPaLi = true; } 
}	

$InstSql = "SELECT HConsecutivo,HClavRegi,HClasActCer ". 
		   "FROM cdhoraclas ".
		   "WHERE HFechaCrea = Date(NOW()) AND ". 
		   		"HMateProf = $ConsMaPr";
//echo "1)<br>".$InstSql."<br>";				
$ResuSql = $con->prepare($InstSql);
$ResuSql->execute();
$result = $ResuSql->fetch();

$ClasCrea = 0; $ClavClas="";
if( $result ){
	$ClasCrea = $result['HConsecutivo'];
	$ClavClas = $result['HClavRegi'];
	$ActiCerr = $result['HClasActCer'];
}

$InstSql = "SELECT Hour(AHoraAsisten) AS HoraAsis, ". 
				  "Minute(AHoraAsisten) AS MinuAsis ". 
		   "FROM cdasistencia ". 
		   "WHERE AConsHoraClas = $ClasCrea AND ". 
		   		 "AConsAlumn = $ConsAlum;";
//echo "2)<br>".$InstSql."<br>";
$ResuSql = $con->prepare($InstSql);
$ResuSql->execute();
$result = $ResuSql->fetch();

$HoraAsis = 0; $MinuAsis=0;
if( $result ){
	$HoraAsis = $result['HoraAsis'];
	$MinuAsis = $result['MinuAsis'];
}

$Hora = intval($HoraAsis) + intval($MinuAsis);
?>
	
<!--encabezado-->
<br>
<!--formulario de Actualizacion-->
<div class="principal">
	<div class="contenedor__formulario">
		<form method="post" name="formulario" >
			<input type="hidden" name="C01" value="<?=$ClasCrea?>">
			<input type="hidden" name="C02" value="<?=$ClavClas?>">
			<h1><?=$MatrAlum?> <?=$NombAlum?></h1>	
			<div class="titulo">
				<label for="title">Materia</label><?=$ClavMate?> <?=$NombMate?>
			</div>				
			<div class="inicio__public">
				<?php 
				  if ( $ActiCerr == "A") {
				  if ( $BandPaLi ) { 
					 echo "La clave no es correcta"; 
				  }	
				  if ( $Hora == 0 ) { ?>
				<label for="inicio">Codigo</label>				
				<input type="text" id="inicio" name="C03" size="10px">
				<?php } else { ?>
					Realizo su pase de lista <?=$HoraAsis?>:<?=$MinuAsis?>
				<?php } 
				  } else {	?>
				     Lista de Asistencia Cerrada	
				<?php } ?>  
			</div>

			<div class="botones">
				<a href="/Intranet/MenuAlum.php" name="cancelar" class="cancelar">Regresar</a>
				<?php if ( $Hora == 0  && $ActiCerr == "A")	{ ?>
				<input type="submit" name="Enviar" value="Guardar">
				<?php } ?>
			</div>			
		</form>
	</div>
</div>
</body>
</html>