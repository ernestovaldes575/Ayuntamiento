<!DOCTYPE html>
	<html lang="es">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Form Facultades de área</title>
		<link rel="stylesheet" href="../../Archivos/Css/CRUD.css">
		<!--icono de la pestaña (logo)-->
		<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
		<!--jquery para validar campos-->
		<script src="../../Archivos/JS/jquery-1.11.1.js"></script>
	</head>
	<body>
	<?php 
	//archivo de conexion a la bd
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');
	
	if(isset($_POST['Enviar'])){ 
		
		$TipoMovi = $_POST['C01'];
		$ConFacAr = $_POST['C02']; 

		$UNumEmpl = $_POST['UNumeroEmpleado'];
		$UStatus  = $_POST['UStatus'];
		$UNombre  = $_POST['UNombre'];
		$UPaterno = $_POST['UPaterno'];
		$UMaterno = $_POST['UMaterno'];
		$UPueFuna = $_POST['UPuestoFuncional'];
		$UFoto    = $_POST['UFoto'];
		$UFechAlt = $_POST['UFechaAlta'];
		$UFechBaj = $_POST['UFechaBaja'];
		$UFechMod = $_POST['UFechMod'];
		$UServAct = $_POST['UServidorAct'];

		//posibles querys
		switch( $TipoMovi ){
			case "A": #Alta
			$sql = "INSERT INTO atusuario (UAyuntamiento, UNumeroEmpleado, UStatus, UNombre, UPaterno, UMaterno, UUnidad, UPuestoFuncional, UFoto, UFechaAlta, UFechaBaja, UFechMod, UServidorAct) VALUES ('".$ClavAyun."', '".$UNumEmpl."', '".$UStatus."', '".$UNombre."', '".$UPaterno."', '".$UMaterno."', '".$ConsUnid."', '".$UPueFuna."', '".$UFoto."', '".$UFechAlt."', '".$UFechBaj."', '".$UFechMod."', '".$UServAct."')";
			break;
			case "M": #Modificacion
			$sql = "UPDATE atusuario SET UNumeroEmpleado = '".$UNumEmpl."', UStatus = '".$UStatus."', UNombre = '".$UNombre."', UPaterno = '".$UPaterno."', UMaterno = '".$UMaterno."', UPuestoFuncional = '".$UPueFuna."', UFoto = '".$UFoto."', UFechaAlta = '".$UFechAlt."', UFechaBaja = '".$UFechBaj."', UFechMod = '".$UFechMod."', UServidorAct = '".$UServAct."' WHERE UConsecut = $ConFacAr";
			break;
			case "B": #Baja
			$sql = "DELETE FROM atusuario WHERE UConsecut = $ConFacAr";
			break;	  
		}
		$resultado = $con->prepare($sql);
		$resultado->execute();

		$MensResp = "Algo ha fallado!!!";
		if ($resultado) 
			$MensResp = "Registro actualizado correctamente";


		$PagiRegr = "location: UsuarioCons.php";
		header($PagiRegr);
		echo '<script>alert("'.$MensResp.'");</script>';
		$resultado->closeCursor();
	}else{

		$BandQuer = true;

		if( trim($_GET['Param1']) != ''){
			$TipoMovi = $_GET["Param1"];	#Tipo de Movimiento 
			$ConFacAr = $_GET["Param2"];	#COINCIDENCIA CON LA BD  
		}
		
		//Datos de la tabla
		$sql = "SELECT * FROM atusuario WHERE UConsecut = $ConFacAr";
		$resultado = $con->prepare($sql);
		$resultado->execute();
		$result = $resultado->fetch();

		$r1 = ""; $r2 = ""; $r3 = ""; $r4 = ""; $r5 = ""; $r6 = ""; $r7 = ""; $r8 = ""; $r9 = ""; $r10 = ""; $r11 = ""; $r12 = ""; $r13 = "";
		if($result){
			$r1 = $result['UAyuntamiento'];
			$r2 = $result['UNumeroEmpleado'];
			$r3 = $result['UStatus'];
			$r4 = $result['UNombre'];
			$r5 = $result['UPaterno'];
			$r6 = $result['UMaterno'];
			$r7 = $result['UUnidad'];
			$r8 = $result['UPuestoFuncional'];
			$r9 = $result['UFoto'];
			$r10 = $result['UFechaAlta'];
			$r11 = $result['UFechaBaja'];
			$r12 = $result['UFechMod'];
			$r13 = $result['UServidorAct'];
		}		
		$MesnTiMo = "";
		switch( $TipoMovi ){
			case "A":	$MesnTiMo = "Registrar";  break;
			case "M":	$MesnTiMo = "Actualizar"; break;
			case "B":	$MesnTiMo = "Eliminar";   break;
		}
		?>
	
		<!--encabezado-->
		<header> <?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> </header>
		<br>
		<!--formulario de Actualizacion-->
		<div class="principal">
			<h1>Formulario de Usuarios</h1>
			<form method="post" name="formulario" onsubmit="return validar(this)">
				<!-- opciones de crud-->
				<input type="hidden" name="C01" value="<?=$TipoMovi?>">
				<input type="hidden" name="C02" value="<?=$ConFacAr?>">
				<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
				<table >
					<tr>
						<th>Numero de Empleado</th>
						<td><input type="text" name="UNumeroEmpleado" id="UNumeroEmpleado" value="<?=$r2?>" placeholder="Digita Número de Empleado" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Estatus</th>
						<td><input type="text" name="UStatus" id="UStatus" value="<?=$r3?>" placeholder="Digita Estatus" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Nombre</th>
						<td><input type="text" name="UNombre" id="UNombre" value="<?=$r4?>" placeholder="Digita Nombre" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Apellido Paterno</th>
						<td><input type="text" name="UPaterno" id="UPaterno" value="<?=$r5?>" placeholder="Digita Apellido Paterno" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Apellido Materno</th>
						<td><input type="text" name="UMaterno" id="UMaterno" value="<?=$r6?>" placeholder="Digita Apellido Materno" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<!-- pedir unidad-->
					<tr>
						<th>Puesto Funcional</th>
						<td><input type="text" name="UPuestoFuncional" id="UPuestoFuncional" value="<?=$r8?>" placeholder="Digita Puesto Funcional" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Foto</th>
						<td><input type="text" name="UFoto" id="UFoto" value="<?=$r9?>" placeholder="Digita foto" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Fecha de Alta</th>
						<td><input type="date" name="UFechaAlta" id="UFechaAlta" value="<?=$r10?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Fecha de Baja</th>
						<td><input type="date" name="UFechaBaja" id="UFechaBaja" value="<?=$r11?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Fecha de Modificación</th>
						<td><input type="date" name="UFechMod" id="UFechMod" value="<?=$r12?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Servidor Activo</th>
						<td><input type="text" name="UServidorAct" id="UServidorAct" value="<?=$r13?>" placeholder="Digita Servidor Activo" onkeyup="checaMensaje(this.value)"></td>
					</tr>
				</table>
				<!--mensaje de validacion-->
				<div id="mensaje1" class="errores">Campos vacios!</div>
				<!--fin de mensajes de validacion-->
				<div class="botones">
					<a href="UsuarioCons.php" name="cancelar" class="cancelar">Cancelar</a>
					<input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" >
				</div>
			</form>
		</div>
		<?php
			}
		?>	
		<!-- script de validacion-->
		<script src="../../Archivos/JS/UsuaVali.js"></script>
	</body>
</html>