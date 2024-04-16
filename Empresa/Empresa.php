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
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasDesEcon.php');

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

if ( trim($_GET['Param1']) != ''){
	$TipoMovi = $_GET["Param1"];	#Tipo de Movimiento 
	$ConsBusq = $_GET["Param2"];	#COINCIDENCIA CON LA BD  
}

//----------------------------------------------------------- 
//Datos del Layer
$InstSql =  "SELECT EEmpresa, ERespresentante,". 
				   "EContacto, ETeleCont, EHoraAten, ".
				   "ECorreo, EContra ".
			"FROM  etempresa ".				
			"WHERE EConsecut = ".$ConsBusq." ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$DatoEmpr = $ResuSql->fetch();
		
$VC03 = "";  $VC04 = ""; 
$VC05 = "";  $VC06 = "";
$VC07 = "";  $VC08 = ""; $VC09 = "";
if ($DatoEmpr)
  { $VC03 = $DatoEmpr[0];	//EEmpresa
	$VC04 = $DatoEmpr[1];	//ERespresentante
	$VC05 = $DatoEmpr[2];	//EContacto
	$VC06 = $DatoEmpr[3];	//ETeleCont
	$VC07 = $DatoEmpr[4];	//EHoraAten
	$VC08 = $DatoEmpr[5];	//ECorreo
	$VC09 = $DatoEmpr[6];	//EContra		

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
	<h1>Actualizacion</h1>
	<form method="post" name="formulario" onsubmit="return validar(this)" action="EmpresaABC.php">
		<!-- opciones de crud-->
		<input type="hidden" name="C01" value="<?=$TipoMovi?>">
		<input type="hidden" name="C02" value="<?=$ConsBusq?>">
		<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
		<table >
			<tr>
				<th>Empresa</th>
				<td><input type="text" name="C03" value="<?=$VC03?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
			<th>Representante Legal</td>
				<td><input type="text" name="C04" placeholder="Digitar Descripcion" value="<?=$VC04?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
				<th>Contacto</td>
				<td><input type="text" name="C05" value="<?=$VC05?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
				<th>Tel Contacto</td>
				<td><input type="text" name="C06" value="<?=$VC06?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>

			<tr>
				<th>Hora de atencion</td>
				<td><input type="text" name="C07" value="<?=$VC07?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
				<th>Correo</td>
				<td><input type="text" name="C08" value="<?=$VC08?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>
			<tr>
				<th>Clave</td>
				<td><input type="password" name="C09" value="<?=$VC09?>" onkeyup="checaMensaje(this.value)"></td>
			</tr>

		</table>
		<!--mensaje de validacion-->
		<div id="mensaje1" class="errores">Campos vacios!</div>
		<!--fin de mensajes de validacion-->
		<div class="botones">
			<a href="EmpresaList.php" name="cancelar" class="cancelar">Cancelar</a>
			<input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" >
		</div>
	</form>
</div>

<!-- script de validacion-->
<script src="../../Archivos/JS/FacdeAreVali.js"></script>
</body>
</html>