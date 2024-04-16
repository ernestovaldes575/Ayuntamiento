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
include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasDesEcon.php');

//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$ConsEmpr = $ABusqMae[0]; 
$NombEmpr = $ABusqMae[1];
$ReprEmpr = $ABusqMae[2];

//Bandera de visualizar msg
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//Datos del Layer
$InstSql =  "SELECT PConsecut, PPuesto, PSueldo, PEscolaridad ". 
			"FROM   edplaza ".
			"WHERE  PConsEmpr = " .$ConsEmpr. " AND ". 
				   "PEstado = 'A' ";
if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
$ResuSql = $ConeBase->prepare($InstSql);
$ResuSql->execute();
$ListEmpr = $ResuSql->fetchAll();
?>	
<!--encabezado-->
<header>
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
</header>
<br>
<div class="tabla">
	<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>
	<div class="botones">
		<a href="EmpresaList.php" class="regresar">Regresar</a>
		<?=$NombEmpr?>
		<?php if ($Alta == "A"){  ?>
		  <a href="Empleos.php?Param1=A&Param2=0" class="nuevo">+Nuevo</a>			
		<?php } ?>
	</div>

	<table>
		<thead>
			<tr>
				<td>No</td>				<!--Cambiar-->
				<td>Puesto</td>		<!--Cambiar-->
				<td>Sueldo</td>	<!--Cambiar-->
				<td>Experiencia</td>
				<td>Eliminar</td>	
				<td>Editar</td>
				</tr>
			</thead>
		<tbody>
			<?php 
				$NumeRegi = 1;
				foreach ($ListEmpr as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//PConsecut, , , 
					$VC04=$RegiTabl[1];		//PPuesto,
					$VC05=$RegiTabl[2];		//PSueldo,
				    $VC06=$RegiTabl[3];		//PEscolaridad
				?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->
					<td><?=$VC06?></td>				<!--Cambiar-->

					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
					  <?php if($Baja == "A" ){ ?>
							<a href="Empleos.php?Param1=B&Param2=<?= $VC03?>" class="btn_delete">
							<i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>
						<?php } ?>
					</td>
					<td data-titulo="Editar: ">
						<?php if($Modi == "A" ){ ?>
							<a href="Empleos.php?Param1=M&Param2=<?= $VC03?>" class="btn_update">
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