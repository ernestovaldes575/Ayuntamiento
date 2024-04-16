<!DOCTYPE html>
	<html lang="es">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Form Facultades de área</title>
		<link rel="stylesheet" href="../../Archivos/CSS/CRUD.css">
		<!--icono de la pestaña (logo)-->
		<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
		<!--jquery para validar campos-->
		<script src="../../Archivos/JS/jquery-1.11.1.js"></script>
	</head>
	<body>
	<?php 

	include_once "../../Archivos/Conexiones/conexion.php";

		//Carga las variables
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');

	if(isset($_POST['Enviar'])){ 
		
		$TipoMovi = $_POST['C01'];
		$ConFacAr = $_POST['C02']; 

		
		$AFechIni = htmlentities(addslashes($_POST['AFechaInicio']));
		$AFechTer = htmlentities(addslashes($_POST['AFechaTermino']));
		$ADenomin = htmlentities(addslashes($_POST['ADenominacion']));
		$AFundame = htmlentities(addslashes($_POST['AFundamento']));
		$AHipervi = htmlentities(addslashes($_POST['AHipervinculo']));
		$AAreaRes = htmlentities(addslashes($_POST['AAreaResp']));
		$ANota    = htmlentities(addslashes( $_POST['ANota']));

		//posibles querys
		switch( $TipoMovi ){
			case "A": #Alta
			$sql = "INSERT INTO ttfadear (AAyuntamiento, AEjercicio, AFechaInicio, AFechaTermino, AArea, ADenominacion, AFundamento, AHipervinculo, AAreaResp, ANota) VALUES ('".$ClavAyun."', '".$EjerTrab."', '".$AFechIni."', '".$AFechTer."', '".$ConsUnid."', '".$ADenomin."', '".$AFundame."', '".$AHipervi."', '".$AAreaRes."', '".$ANota."')";
			break;
			case "M": #Modificacion
			$sql = "UPDATE ttfadear SET AFechaInicio = '".$AFechIni."', AFechaTermino = '".$AFechTer."', ADenominacion = '".$ADenomin."', AFundamento = '".$AFundame."', AHipervinculo = '".$AHipervi."', AAreaResp = '".$AAreaRes."', ANota = '".$ANota."' WHERE AConsecutivo = $ConFacAr";
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
		$PagiRegr = "location: FacdeAreCons.php";
		header($PagiRegr);
		echo '<script>alert("'.$MensResp.'");</script>';
		$resultado->closeCursor();
	}else{

		$BandQuer = true;

		if( trim($_GET['Param1']) != ''){
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

		$r1 = ""; $r2 = ""; $r3 = ""; $r4 = ""; $r5 = ""; $r6 = ""; $r7 = ""; $r8 = ""; $r9 = ""; $r10 = "";
		if($result){
			$r1 = $result['AAyuntamiento'];
			$r2 = $result['AEjercicio'];
			$r3 = $result['AFechaInicio'];
			$r4 = $result['AFechaTermino'];
			$r5 = $result['AArea'];
			$r6 = $result['ADenominacion'];
			$r7 = $result['AFundamento'];
			$r8 = $result['AHipervinculo'];
			$r9 = $result['AAreaResp'];
			$r10 = $result['ANota'];
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
			<h1>Formulario Facultades de Área</h1>
			<form method="post" name="formulario" onsubmit="return validar(this)">
				<!-- opciones de crud-->
				<input type="hidden" name="C01" value="<?=$TipoMovi?>">
				<input type="hidden" name="C02" value="<?=$ConFacAr?>">
				<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
				<table >
					<tr>
						<th>Fecha de Inicio</th>
						<td><input type="date" name="AFechaInicio" id="AFechaInicio" value="<?=$r3?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Fecha de Termino</td>
						<td><input type="date" name="AFechaTermino" id="AFechaTermino" value="<?=$r4?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Denominacion</td>
						<td><input type="text" name="ADenominacion" id="ADenominacion" placeholder="Digitar Denominacion" value="<?=$r6?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Fundamento</td>
						<td><input type="text" name="AFundamento" id="AFundamento" placeholder="Digitar Fundamento" value="<?=$r7?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Hipervinculo</td>
						<td><input type="text" name="AHipervinculo" id="AHipervinculo" placeholder="Digitar Hipervinculo" value="<?=$r8?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Área Responsable</td>
						<td>
							<select name="AAreaResp">
								<?php 
									foreach($CataArea as $valor): 
										$ClavCata = $valor['CARClave'];
										$DescCata = $valor['CARDescripcion']; 
										$Activo = "";
										if ( $ClavCata == $r9)
											$Activo = "selected"; 
								?>
								<option value="<?=$ClavCata?>" <?=$Activo?>><?=$DescCata?> </option>
								<?php	
									endforeach;
								?>
							</select>
						</td>
					</tr>
					<tr>
						<th>Nota</label></td>
						<td><input type="text" name="ANota" id="ANota" placeholder="Digitar Nota" value="<?=$r10?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
				</table>
				<!--mensaje de validacion-->
				<div id="mensaje1" class="errores">Campos vacios!</div>
				<!--fin de mensajes de validacion-->
				<div class="botones">
					<a href="FacdeAreCons.php" name="cancelar" class="cancelar">Cancelar</a>
					<input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" >
				</div>
			</form>
		</div>
		<?php
			}
		?>	
		<!-- script de validacion-->
		<script src="../../Archivos/JS/FacdeAreVali.js"></script>
	</body>
</html>