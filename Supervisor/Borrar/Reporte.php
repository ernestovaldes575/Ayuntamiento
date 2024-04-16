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

include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');

$ClavAyun = 105; 
//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
//Datos de la unidad
$ConUniTr = $ABusqMae[0]; 
$ClaUniTr = $ABusqMae[1];
$DesUniTr = $ABusqMae[2];

//Datos del supervisor
$ConSupTr = $ABusqMae[3];
$NumEmpSu = $ABusqMae[4];
$NombreSu = $ABusqMae[5];
$CategoSu = $ABusqMae[6];
$FotogrSu = $ABusqMae[7];

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

if( trim($_GET['Param1']) != ''){
	$TipoMovi = $_GET["Param1"];	#Tipo de Movimiento 
	$ConsBusq = $_GET["Param2"];	#COINCIDENCIA CON LA BD  
}

//----------------------------------------------------------- 
//Datos del Layer
$InstSql =  "SELECT RFechaRepo, RHoraRepo, ". 
				   "RLugarEchos, RReporte, ".
				   "RCiudadano ".
			"FROM streporte ".	   
			"WHERE RAyuntamiento = '" .$ClavAyun."' AND ".
	 			  "RConsecut =" .$ConsBusq." ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$ListSupe = $ResuSql->fetch();
		
$VC03 = "";  $VC04 = ""; 
$VC05 = "";  $VC06 = ""; $VC07 = "";
if ($ListSupe)
  { $VC03 = $ListSupe[0];	//RFechaRepo
	$VC04 = $ListSupe[1];	//RHoraRepo
	$VC05 = $ListSupe[2];	//RLugarEchos
	$VC06 = $ListSupe[3];	//RReporte
	$VC07 = $ListSupe[4];	//RCiudadano
  }

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
	<h2>Servidor Publico<?=$NumEmpSu?> <?=$NombreSu?> <br>
	    Unidad <?=$ClaUniTr?> <?=$DesUniTr?>
    </h2>
	<form method="post" name="PideDato" action="ReporteABC.php">
		<!-- opciones de crud-->
		<input type="hidden" name="C01" value="<?=$TipoMovi?>">
		<input type="hidden" name="C02" value="<?=$ConsBusq?>">
		<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
		<table >
			<tr>
				<th>Fecha</th>
				<td><input type="date" name="C03" value="<?=$VC03?>" onkeyup="checaMensaje(this.value)" placeholder="DD/MM/YYYY"></td>
			</tr>
			<tr>
				<th>Hora</td>
				<td><input type="text" name="C04" placeholder="HH:MM" value="<?=$VC04?>" onkeyup="checaMensaje(this.value)" >
					</td>
			</tr>
			<tr>
				<th>Lugar de echos</td>
				<td><input type="text" name="C05" placeholder="Digitar Lugar de echos" value="<?=$VC05?>" onkeyup="checaMensaje(this.value)">
			</tr>
			<tr>
				<th>Reporte</td>
				<td><input type="text" name="C06" placeholder="Digitar la anomalia" value="<?=$VC06?>" onkeyup="checaMensaje(this.value)">
			</tr>	
			<tr>
				<th>Ciudadano "opcional"</td>
				<td><input type="text" name="C07" placeholder="Digitar la anomalia" value="<?=$VC07?>" onkeyup="checaMensaje(this.value)">
			</tr>	

		</table>
		<!--mensaje de validacion-->
		<div id="mensaje1" class="errores">Campos vacios!</div>
		<!--fin de mensajes de validacion-->
	
		<div class="botones">
		  <a href="SuperviList.php" name="cancelar" class="cancelar">Cancelar</a>
		  <input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" >
		</div>
	</form>
</div>
<!-- script de validacion-->
<script src="../../Archivos/JS/FacdeAreVali.js"></script>
</body>
</html>