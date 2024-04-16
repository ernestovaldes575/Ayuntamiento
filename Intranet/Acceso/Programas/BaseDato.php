<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Base de Datos</title>
	<link rel="stylesheet" href="../../Archivos/CSS/BaseDato.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
</head>
<body>
	<script language="javascript">
		function CargaEjercicio(Param)
		{ location.href = "mostNA.php?Param1="+Param; }
	</script>
	<?php

		//Carga las variables
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');
		//archivo de conexion a la bd
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');
		//query pars la tabla
	$sql = "SELECT CMEClave, CMETitulo, CMEBasDat FROM acmenu";
	$resultado = $con->prepare($sql);
	$resultado->execute();
	$tot_rows = $resultado->rowCount();
	$row = $resultado->fetchAll();
	?>
	<!--encabezado-->
	<header> <?php include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> </header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2>Bases de datos</h2></div>
		<div class="botones">
			<a href="../../menuintranet.php" class="regresar">Regresar</a>
		</div>

		<table>
			<thead>
				<tr>
					<td>Bases de datos</td>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($row as $fila):
					$ClavMenu = $fila['CMEClave'];
					$DescMenu = $fila['CMETitulo'];
					$BaseDato = $fila['CMEBasDat'];
					?>
					<tr>
						<td><a href="TipoServLista.php?Param1=<?=$ClavMenu?>&Param2=<?=$DescMenu?>&Param3=<?=$BaseDato?>"><?=$DescMenu?></a></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>