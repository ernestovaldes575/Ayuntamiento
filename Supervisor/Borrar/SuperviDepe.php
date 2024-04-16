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
	include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');
	
	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;

	$ClavAyun = 105;

	//Datos del Layer
	$InstSql =  "SELECT SUnidad,CUNClaveUnidad,CUNDescripcion, ".
					   "(SELECT COUNT(*) ". 
					   "FROM stsupervisor ".
					   "WHERE SUnidad = SUnidad ) AS  TotaInsp ". 
				"FROM etsupeunid ". 
				"INNER JOIN acceso.ACUnidades ON SUnidad=CUNConsecutivo ". 
				"WHERE SAyuntamiento = '".$ClavAyun."' ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$UnidSupe = $ResuSql->fetchAll();
	?>	
	<!--encabezado-->
	<header>
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
	</header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2>Area </h2></div>
		<div class="botones">
			<a href="/index.php" class="regresar">Regresar</a>
		</div>

		<table>
			<thead>
				<tr>
					<td>Clave</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
					<td>Inspectores</td>
					<td></td>	<!--Cambiar-->
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($UnidSupe as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//SUnidad
					$VC04=$RegiTabl[1];		//CUNClaveUnidad
					$VC05=$RegiTabl[2];		//CUNDescripcion
					$VC06=$RegiTabl[3];		//TotaInsp
				?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->
					<td><?=$VC06?></td> 
					<td data-titulo="Editar: ">
						<a href="SuperviDepeInc.php?Param1=<?= $VC03?>" class="btn_update">
						ver</a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>