<!DOCTYPE html>
<html lang="es">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Form Facultades de área</title>
		<link rel="stylesheet" href="/Intranet/Archivos/CSS/CRUD.css">
		<!--icono de la pestaña (logo)-->
		<link rel="shortcut icon" href="/Intranet/Archivos/Img/logoEnc.ico" />
		<!--jquery para validar campos-->
		<script src="/Intranet/Archivos/JS/jquery-1.11.1.js"></script>
</head>
	
<body>
<?php
$CRUD = "GET";
include 'SuperviApi.php';
?>	
	
<!--encabezado-->
<header> 
	<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
</header>
<br>
<!--formulario de Actualizacion-->
<form method="post" name="PideDato" action="SuperviApi.php">
	<!-- opciones de crud-->
	<input type="hidden" name="C00" value="<?=$CRUD?>">
	<input type="hidden" name="C01" value="<?=$TipoMovi?>">
	<input type="hidden" name="C02" value="<?=$ConsBusq?>">
	<table class="ListInfo">
		<tr>
			<td></td>
			<td><a href="SuperviList.php" name="cancelar">Regresar</a></td>
		</tr>	
		<tr>
			<th>No empleado</th>
			<td><input type="text" name="C03" value="<?=$VC03?>" ></td>
		</tr>
		<tr>
			<th>Nombre</td>
			<td><input type="text" name="C04" placeholder="Digitar Nombre" value="<?=$VC04?>">
			</td>
		</tr>
		<tr>
			<th>Categoria</td>
			<td><input type="text" name="C05" placeholder="Digitar Categoria" value="<?=$VC05?>">
		</tr>
		<tr>
			<td></td>	
			<td><input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" ></td>	
		</tr>	
	</table>
</form>
</body>
</html>