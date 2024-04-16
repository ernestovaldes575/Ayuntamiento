<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Form MoviFac</title>
		<link rel="stylesheet" href="../../Archivos/CSS/CRUD.css">
		<!--icono de la pestaña (logo)-->
		<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
		<!--jquery para validar campos-->
		<script src="../../Archivos/JS/jquery-1.11.1.js"></script>
	</head>
	<body>
	<?php
 
		include($_SERVER["DOCUMENT_ROOT"]."/Intranet/Archivos/Conexiones/conexion.php");
 
			//Carga las variables

		include($_SERVER["DOCUMENT_ROOT"]."/Intranet/Archivos/Files/EncaCook.php");
		if(isset($_POST["Enviar"])){
			$TipoMovi = $_POST["C01"];
			$ConFacAr = $_POST["C02"]; 
			$C03 = htmlentities(addslashes($_POST["C03"]));
			$C04 = htmlentities(addslashes($_POST["C04"]));
			$C05 = htmlentities(addslashes($_POST["C05"]));
			$C06 = htmlentities(addslashes($_POST["C06"]));
			$C07 = htmlentities(addslashes($_POST["C07"]));
			$C08 = htmlentities(addslashes($_POST["C08"]));
			$C09 = htmlentities(addslashes($_POST["C09"]));
 
			//posibles querys
			switch( $TipoMovi ){
				case "A": #Alta
				$sql = "INSERT INTO ttfadear ".
					   "(AAyuntamiento, AEjercicio,AFechaInicio, AFechaTermino, ADenominacion, AFundamento, AHipervinculo, AAreaResp, ANota ) VALUES ('".$ClavAyun."', '".$EjerTrab."', '".$C03."', '".$C04."', '".$C05."', '".$C06."', '".$C07."', '".$C08."', '".$C09."' )";
				break;
				case "M": #Modificacion
				$sql = "UPDATE ttfadear SET ".
					   "AFechaInicio = '".$C03."', AFechaTermino = '".$C04."', ADenominacion = '".$C05."', AFundamento = '".$C06."', AHipervinculo = '".$C07."', AAreaResp = '".$C08."', ANota = '".$C09."' ".
					   "WHERE AConsecutivo = $ConFacAr";
				break;
				case "B": #Baja
				$sql = "DELETE FROM ttfadear WHERE AConsecutivo = $ConFacAr";
				break;
			}
			$resultado = $conexion->prepare($sql);
			$resultado->execute();
			$MensResp = "Algo ha fallado!!!";
			if ($resultado) 
				$MensResp = "Registro actualizado correctamente";
			$PagiRegr = "location: ListaFac.php";
			header($PagiRegr);
			echo "<script>alert(".$MensResp.");</script>";
			$resultado->closeCursor();
		}else{
			$BandQuer = true;
			if( trim($_GET["Param1"]) != ""){
				$TipoMovi = $_GET["Param1"];	#Tipo de Movimiento
				$ConFacAr = $_GET["Param2"];	#COINCIDENCIA CON LA BD  
			}
				//Datos del Catalogo
			$sql = $conexion->prepare("SELECT * FROM tcarea");
			$sql->execute();
			$CataArea = $sql->fetchAll();
				//Datos de la tabla
			$sql = "SELECT * FROM ttfadear WHERE AConsecutivo = $ConFacAr";
			$resultado = $conexion->prepare($sql);
			$resultado->execute();
			$result = $resultado->fetch();
			$r1 = "";
			$r2 = "";
			$r3 = "";
			$r4 = "";
			$r5 = "";
			$r6 = "";
			$r7 = "";

			if($result){ 
				$r1 = $result["AFechaInicio"];
				$r2 = $result["AFechaTermino"];
				$r3 = $result["ADenominacion"];
				$r4 = $result["AFundamento"];
				$r5 = $result["AHipervinculo"];
				$r6 = $result["AAreaResp"];
				$r7 = $result["ANota"];
			}
			$MesnTiMo = "";
			switch( $TipoMovi ){
				case "A":	$MesnTiMo = "Registrar";  break;
				case "M":	$MesnTiMo = "Actualizar"; break;
				case "B":	$MesnTiMo = "Eliminar";   break;

			}
			?>
			<!--encabezado-->
			<header> <?php require_once($_SERVER["DOCUMENT_ROOT"]."/Intranet/Archivos/Files/header.php"); ?> </header>
			<br>
			<!--formulario de Actualizacion-->
			<div class="principal">
				<h1>Formulario MoviFac</h1>
				<form method="post" name="formulario" onsubmit="return validar(this)">
					<!-- opciones de crud-->
					<input type="hidden" name="C01" value="<?=$TipoMovi?>">
					<input type="hidden" name="C02" value="<?=$ConFacAr?>">
					<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
					<table >
						<tr>
	    					<th>AFechaInicio</th>
	    					<td><input type="text" name="C03" value="<?=$r1?>" onkeyup="checaMensaje(this.value)"></td>
	    				</tr>
						<tr>
	    					<th>AFechaTermino</th>
	    					<td><input type="text" name="C04" value="<?=$r2?>" onkeyup="checaMensaje(this.value)"></td>
	    				</tr>
						<tr>
	    					<th>ADenominacion</th>
	    					<td><input type="text" name="C05" value="<?=$r3?>" onkeyup="checaMensaje(this.value)"></td>
	    				</tr>
						<tr>
	    					<th>AFundamento</th>
	    					<td><input type="text" name="C06" value="<?=$r4?>" onkeyup="checaMensaje(this.value)"></td>
	    				</tr>
						<tr>
	    					<th>AHipervinculo</th>
	    					<td><input type="text" name="C07" value="<?=$r5?>" onkeyup="checaMensaje(this.value)"></td>
	    				</tr>
						<tr>
	    					<th>AAreaResp</th>
	    					<td><input type="text" name="C08" value="<?=$r6?>" onkeyup="checaMensaje(this.value)"></td>
	    				</tr>
						<tr>
	    					<th>ANota</th>
	    					<td><input type="text" name="C09" value="<?=$r7?>" onkeyup="checaMensaje(this.value)"></td>
	    				</tr>
				</table>
				<div class="botones">
					<a href="ListaFac.php" name="cancelar" class="cancelar">Cancelar</a>
					<input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" >
				</div>
			</form>
		</div>
		<?php
			}
		?>
	</body>
</html>
