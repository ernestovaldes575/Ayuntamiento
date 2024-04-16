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
	
	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;

	//Eliminar Unidad
	if ( isset($_GET["Param1"]) )
	  { $ConsCons = $_GET["Param1"];
		$InstSql =  "DELETE FROM etsupeunid ".
					"WHERE SAyuntamiento = '".$ClavAyun."' AND ". 
						   "SUnidad = ".$ConsCons." "; 
		if ($BandMens)  echo '1)'.$InstSql.'<br>';	
		$ResuSql = $ConeBase->prepare($InstSql);
		$ResuSql->execute();
	  }

	//Cargar Unidad
	if ( isset($_GET["Param2"]) )
	  { $ConsCons = $_GET["Param2"];
		$InstSql =  "INSERT INTO etsupeunid ".
					"VALUES ('".$ClavAyun."',".$ConsCons.") "; 
		if ($BandMens)  echo '1)'.$InstSql.'<br>';	
		$ResuSql = $ConeBase->prepare($InstSql);
		$ResuSql->execute();
	  }

	//Datos de la Unidad
	$InstSql =  "SELECT SUnidad,CUNClaveUnidad,CUNDescripcion ". 
				"FROM etsupeunid ". 
				"INNER JOIN acceso.ACUnidades ON SUnidad=CUNConsecutivo ". 
				"WHERE SAyuntamiento = '".$ClavAyun."' ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$UnidSupe = $ResuSql->fetchAll();

	//Catalogo de Unidad
	$InstSql =  "SELECT CUNConsecutivo,CUNClaveUnidad,CUNDescripcion ". 
				"FROM acceso.ACUnidades ". 
				"WHERE CUNAyuntamiento = '".$ClavAyun."' ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$CataUnid = $ResuSql->fetchAll();


	?>	
	<!--encabezado-->
	<header>
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
	</header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>
		<div class="botones">
			<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>
		</div>

		<table>
			<thead>
				<tr>
					<td>Titulo</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($UnidSupe as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//SUnidad, , 
					$VC04=$RegiTabl[1];		//CUNClaveUnidad,
					$VC05=$RegiTabl[2];		//CUNDescripcion,
				?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->

					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
					  <?php if($Baja == "A" ){ ?>
							<a href="SupeUnidRegi.php?Param1=<?= $VC03?>" class="btn_delete">
							<i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<br>
		<table>
			<thead>
				<tr>
					<td>Titulo</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($CataUnid as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//CUNConsecutivo
					$VC04=$RegiTabl[1];		//CUNClaveUnidad
					$VC05=$RegiTabl[2];		//CUNDescripcion
				?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->

					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
					  <?php if($Baja == "A"  ){ ?>
						<a href="SupeUnidRegi.php?Param2=<?= $VC03?>" class="btn_update">
							<i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>