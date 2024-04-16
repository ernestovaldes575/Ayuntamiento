<!DOCTYPE html>
	<html lang="es">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Form Facultades de área</title>
		<link rel="stylesheet" href="/Intranet/Archivos/CSS/CRUD.css">
		<!--icono de la pestaña (logo)-->
		<link rel="shortcut icon" href="/Intranet/Archivos/Img/logoEnc.ico" />
		<!--jquery para validar campos-->
		<script src="/Intranet/Archivos/JS/jquery-1.11.1.js"></script>
	</head>
<body>
<?php 

include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasDesEcon.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$ConsEmpr = $ABusqMae[0]; 
$NombEmpr = $ABusqMae[1];
$ReprEmpr = $ABusqMae[2];

//Bandera de visualizar msg
$BandMens = true;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

if ( trim($_GET['Param1']) != ''){
	$TipoMovi = $_GET["Param1"];	#Tipo de Movimiento 
	$ConsBusq = $_GET["Param2"];	#COINCIDENCIA CON LA BD  
}

//----------------------------------------------------------- 
//Datos del Catalogo
$InstSql = 	"SELECT CSEClave, CSEDescripcion ".
			"FROM ecsexo ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 			
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$CataSexo = $ResuSql->fetchAll();

//Datos del puesto
$InstSql =  "SELECT PPuesto, PSexo, PEdad, ". 
				   "PSueldo, PEscolaridad, PExperiencia, PPlazAcIn ". 
			"FROM   edplaza ".
			"WHERE  PConsEmpr = " .$ConsEmpr. " AND ". 
				   "PConsecut = " .$ConsBusq. " ";
if ($BandMens)  echo '2)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$DatoEmpr = $ResuSql->fetch();
		
$VC03 = "";  $VC04 = "M"; 
$VC05 = "";  $VC06 = "";
$VC07 = "";  $VC08 = ""; $VC09 = "A";
if ($DatoEmpr)
  { $VC03 = $DatoEmpr[0];	//PPuesto
	$VC04 = $DatoEmpr[1];	//PSexo
	$VC05 = $DatoEmpr[2];	//PEdad
	$VC06 = $DatoEmpr[3];	//PSueldo
	$VC07 = $DatoEmpr[4];	//PEscolaridad
	$VC08 = $DatoEmpr[5];	//PExperiencia
	$VC09 = $DatoEmpr[6];	//PPlazAcIn		
  }

$EstaPlaA = ( $VC09 == "A")? "checked":"";
$EstaPlaI = ( $VC09 == "I")? "checked":"";
  
$MesnTiMo = "";
switch( $TipoMovi ){
	case "A":	$MesnTiMo = "Registrar";  break;
	case "M":	$MesnTiMo = "Actualizar"; break;
	case "B":	$MesnTiMo = "Eliminar";   break;
  }
?>
	
<!--encabezado-->
<header> 
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
</header>
<br>

<!--formulario de Actualizacion-->
<div class="principal">
	<h1><?=$DescTiSe?></h1>
	<form method="post" name="formulario" onsubmit="return validar(this)" action="EmpleosABC.php">
		<!-- opciones de crud-->
		<input type="hidden" name="C01" value="<?=$TipoMovi?>">
		<input type="hidden" name="C02" value="<?=$ConsBusq?>">
		<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
		<table >
			<tr>
				<th>Puesto</th>
				<td><input type="text" name="C03" value="<?=$VC03?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
			<th>Sexo</td>
				<td>
				<select name="C04" >
					<?php 
					foreach($CataSexo as $RegiTabl): 
						$ClavCata = $RegiTabl[0];		
						$DescCata = $RegiTabl[1];  
						$Activo = ( $ClavCata == $VC04) ? "selected" : ""; 
						?>
						<option value="<?=$ClavCata?>" <?=$Activo?>> <?=$DescCata?> </option>
						<?php	
					endforeach;
					?>
				</select>
				</td>
			</tr>
			<tr>
				<th>Edad</td>
				<td><input type="text" name="C05" value="<?=$VC05?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
				<th>Sueldo</td>
				<td><input type="text" name="C06" value="<?=$VC06?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>

			<tr>
				<th>Escolaridad</td>
				<td><input type="text" name="C07" value="<?=$VC07?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
				<th>Experiencia</td>
				<td><input type="text" name="C08" value="<?=$VC08?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
				<th>Estado</td>
				<td>
					<input type="checkbox" name="C09" value="A" <?=$EstaPlaA?>> Activo &nbsp;&nbsp; 
					<input type="checkbox" name="C09" value="I" <?=$EstaPlaI?>> Inactivo	
				</td>
			</tr>

		</table>
		<!--mensaje de validacion-->
		<div id="mensaje1" class="errores">Campos vacios!</div>
		<!--fin de mensajes de validacion-->
		<div class="botones">
			<a href="EmpleosList.php" name="cancelar" class="cancelar">Cancelar</a>
			<input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" >
		</div>
	</form>
</div>

<!-- script de validacion-->
<script src="../../Archivos/JS/FacdeAreVali.js"></script>
</body>
</html>