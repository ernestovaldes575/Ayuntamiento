<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="../../Archivos/CSS/Consu.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
	<link rel="stylesheet" href="../Archivos/CSS/EstiMenu.css">
</head>
<body> 
	<script language="javascript">
		function CargaEjercicio(Param)
		{ location.href = "FacdeAreCons.php?Param1="+Param; }
	</script>	
	
	<?php
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');

	if ( isset($_GET["Param1"]) ){
		$EjerTrab = $_GET["Param1"];
		$ArCooki3 = $ConsUsua.'|'.$ClavAyun.'|'.$DescAyun.'|'.$ConsUnid.'|'.$DescUnid.'|'.$EjerTrab.'|';
		setcookie("CEncaMae", "$ArCooki3");
	}

		//archivo de conexion a la bd
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conexion.php');
		//query pars la tabla Facultades de area 
	$sql = "SELECT * ".
		   "FROM ttfadear ".				//Cambiar
		   "WHERE AAyuntamiento = '".$ClavAyun."' AND AEjercicio = '".$EjerTrab."'";	   
	$resultado = $conexion->prepare($sql);
	$resultado->execute();
	$tot_rows = $resultado->rowCount();
	$row = $resultado->fetchAll();

		//Datos del Catalogo
	$sql2 = $conexion->prepare("SELECT * FROM tcejercicio");
	$sql2->execute();
	$CEJClave = $sql2->fetchAll();
	?>	
	<!--encabezado-->
	<header><?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> </header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2>Facultades de Área</h2></div>
		<div class="botones">
			<a href="../../menuintranet.php" class="regresar">Regresar</a>
			<div class="lista">
				<select name="AAreaResp" onChange="CargaEjercicio(this.value)" class="AAreaResp">
					<?php 
					foreach($CEJClave as $valor): 
						$ClavCata = $valor['CEJClave'];		
						$DescCata = $valor['CEJDescripcion'];  
						$Activo = "";
						if ( $ClavCata == $EjerTrab)
							$Activo = "selected"; 
						?>
						<option value="<?=$ClavCata?>" <?=$Activo?>> <?=$ClavCata?> </option>
						<?php	
					endforeach;
					?>
				</select>
			</div>
			<?php 
			if($Alta == "A"){ 
				?>
				<a href="FacdeAreForm.php?Param1=A&Param2=0" class="nuevo">+Nuevo</a>			
			<?php } ?>
		</div>

		<table>
			<thead>
				<tr>
					<td>Fecha Inicio</td>			<!--Cambiar-->
					<td>Fecha Termino</td>			<!--Cambiar-->
					<td>Area</td>					<!--Cambiar-->
					<td>Denominacion</td>			<!--Cambiar-->
					<td>Eliminar</td>	
					<td>Editar</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($row as $fila): 
				    $VC03=$fila['AConsecutivo'];	//Cambiar
				    $VC04=$fila['AFechaInicio'];	//Cambiar
				    $VC05=$fila['AFechaTermino'];	//Cambiar
				    $VC06=$fila['AArea'];			//Cambiar
				    $VC07=$fila['ADenominacion'];	//Cambiar
				?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->
					<td><?=$VC06?></td>				<!--Cambiar-->
					<td><?=$VC07?></td>				<!--Cambiar-->
						 
						<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
						<?php if($Baja == "A"){ ?>
							<a href="FacdeAreForm.php?Param1=B&Param2=<?= $VC03?>" class="btn_delete"><i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>
						<?php } ?>
					</td>
					<td data-titulo="Editar: ">
						<?php if($Modi == "A"){ ?>
							<a href="FacdeAreForm.php?Param1=M&Param2=<?= $VC03?>" class="btn_update"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>