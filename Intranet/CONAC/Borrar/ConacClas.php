<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Archivos/CSS/Consu.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="/Intranet/Archivos/Img/logoEnc.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="/Intranet/Archivos/CSS/font-awesome.min.css">
	<link rel="stylesheet" href="/Intranet/Archivos/CSS/EstiMenu.css">
</head>
<body> 
	
	<?php
	//echo 'ubicacion'.$_SERVER['DOCUMENT_ROOT'].'<br>';
	include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');
	include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');
	
	//Carga las variables
	$ArCooki3 = $_COOKIE['CBusqMae'];
	$ABusqMae = explode("|", $ArCooki3);
	//echo '$ABusqMae'.$ABusqMae.'<br>';
	$EjerTrab = $ABusqMae[0];	//Ejercicio 
	$ClavTiCl = $ABusqMae[1];	//Clave del tipo de Clasificacion
	$DescTiCl = $ABusqMae[2];	//Descri del tipo de Clasificacion
	$ArchCarg = $ABusqMae[3];	//Nivel Clasificacion 1 o 2

	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;

	//Datos del Layer
	$InstSql =  "SELECT CCLClave, CCLDescripcion ". 
				"FROM ccclasifica ". 
				"WHERE CCLClave < 10 ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$ListClas = $ResuSql->fetchAll();

	?>	
	<!--encabezado-->
	<header>
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
	</header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>
		<div class="botones">
			<a href="ConacList.php" class="regresar">Regresar</a>
			Ejercicio:<?=$EjerTrab?>
			Clasificacion: <?=$DescTiCl?>
		</div>

		<table>
			<thead>
				<tr>
					<td>Titulo</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
					<td>Editar</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($ListClas as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//LConsecut,,,
					$VC04=$RegiTabl[1];		//LEjercicio,
				?>
				<tr>
					<td><?=$VC03?></td>				<!--Cambiar-->
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td data-titulo="Editar: ">
						<a href="ConacSubCla.php?Param1=<?= $VC03?>" class="btn_update">
						<i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>