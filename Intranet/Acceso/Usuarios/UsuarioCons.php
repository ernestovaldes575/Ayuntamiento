<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuarios</title>
	<link rel="stylesheet" href="../../Archivos/CSS/CRUDPerm.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
</head>
<body>
	<script language="javascript">
		function CargaEjercicio(Param)
		{ location.href = "UsuarioCons.php?Param1="+Param; }
	</script>		
	<?php

		//Carga las variables
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');

	if ( isset($_GET["Param1"]) ){
		$EjerTrab = $_GET["Param1"];
		$ArCooki3 = $ConsUsua.'|'.$ClavAyun.'|'.$DescAyun.'|'.$ConsUnid.'|'.$DescUnid.'|'.$EjerTrab.'|';
		setcookie("CEncaMae", "$ArCooki3");
	}

		//archivo de conexion a la bd
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');
		//query pars la tabla estructura organica 
	$sql = "SELECT `UConsecut`, `UNumeroEmpleado`, `UNombre`,`UPaterno`,`UMaterno` ".
		   "FROM atusuario ".
		   "WHERE UAyuntamiento = '".$ClavAyun."' ";	   
	$resultado = $con->prepare($sql);
	$resultado->execute();
	$tot_rows = $resultado->rowCount();
	$row = $resultado->fetchAll();
	?>	
	<!--encabezado-->
	<header> <?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> </header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2>Usuarios</h2></div>
		<div class="botones">
			<a href="../../menuintranet.php" class="regresar">Regresar</a>
			<?php 
			if($Alta == "A"){ 
				?>
				<a href="UsuaForm.php?Param1=A&Param2=0" class="nuevo">+Nuevo</a>			
			<?php } ?>
		</div>

		<table>
			<thead>
				<tr>
					<td>Fecha Inicio</td>
					<td>Fecha Termino</td>
					<td>Area</td>
					<td>Denominacion</td>
					<td>Permiso</td>
					<td>Acceso</td>
					<td>Eliminar</td>
					<td>Editar</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($row as $fila):
					$ConsUsua = $fila['UConsecut'];
					$NombUsua = $fila['UNombre']; ?>
					<tr>
						<td><?=$fila['UNumeroEmpleado']?></td>
						<td><?=$fila['UNombre']?></td>
						<td><?=$fila['UPaterno']?></td>
						<td><?=$fila['UMaterno']?></td>
						<td><a href="BaseDatos.php?Param1=<?= $ConsUsua; ?>&Param2=<?= $NombUsua; ?>" class="extra"><i class="fa fa-eye-slash" aria-hidden="true" title="Permisos"></i></a></td>
						<td><a href="#" class="extra"><i class="fa fa-wrench" aria-hidden="true" title="Acceso"></i></a></td>
						<!-- iconos dentro de la libreria font-awesome.min.css -->
						<td data-titulo="Eliminar: ">
							<?php if($Baja == "A"){ ?>
								<a href="UsuaForm.php?Param1=B&Param2=<?= $ConsUsua; ?>" class="btn_delete"><i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>
							<?php } ?>
						</td>
						<td data-titulo="Editar: ">
							<?php if($Modi == "A"){ ?>
								<a href="UsuaForm.php?Param1=M&Param2=<?= $ConsUsua; ?>" class="btn_update"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>
							<?php } ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>