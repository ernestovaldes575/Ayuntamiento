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
	
	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;


	//Datos del Layer
	$InstSql =  "SELECT EConsecut, EEmpresa, ERespresentante, ". 
					   "EContacto, ETeleCont, EHoraAten, ".
					   "(SELECT COUNT(*) ". 
					    "FROM edplaza ". 
						"WHERE PConsEmpr = EConsecut AND ". 
							  "PPlazAcIn = 'A' AND ". 
							  "PEstado = 'A' ) AS PlazActi ". 
				"FROM etempresa ".
				"WHERE  EEstado = 'A' ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
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
			<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>
			<?php 
			if($Alta == "A"){ 
				?>
				<a href="../Empresa/Empresa.php?Param1=A&Param2=0" class="nuevo">+Nuevo</a>			
			<?php } ?>
		</div>

		<table>
			<thead>
				<tr>
					<td>No</td>				<!--Cambiar-->
					<td>Empresa</td>		<!--Cambiar-->
					<td>Representante</td>	<!--Cambiar-->
					<td>Contacto</td>
					<td>Eliminar</td>	
					<td>Editar</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$NumeRegi = 1;
				foreach ($ListEmpr as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//EConsecut
					$VC04=$RegiTabl[1];		//EEmpresa,
					$VC05=$RegiTabl[2];		//ERespresentante,

				    $VC06=$RegiTabl[3];		//EContacto
				    $VC07=$RegiTabl[4];		//ETeleCont
					$VC08=$RegiTabl[5];		//LFecEHoraAtenhAlta
					$VC09=$RegiTabl[6]; 	//PlazActi
				?>
				<tr>
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->
					<td><?=$VC06?></td>				<!--Cambiar-->
					<td><?=$VC07?></td>				<!--Cambiar-->	
					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td><?=$VC09?></td>
					<td data-titulo="Editar: ">
						<?php if($Modi == "A" ){ ?>
							<a href="EmpresaInic.php?Param1=<?= $VC03?>" class="btn_update">
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