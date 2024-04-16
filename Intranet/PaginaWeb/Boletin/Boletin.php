<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Encabezado/EstiIntr.css">
</head>
<body>
<header>
<?php 
  //Varibales Globales
  include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
  //Encabezado	
  require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaPrin.php'); 
  ?> 
 </header>  
<?php
$CRUD = "GET";
include 'BoletinApi.php';
?>	
<br>
<!--formulario de Actualizacion-->
<form method="post" name="PideDato" action="BoletinApi.php">
	<!-- opciones de crud-->
	<input type="hidden" name="C00" value="<?=$CRUD?>">
	<input type="hidden" name="C01" value="<?=$TipoMovi?>">
	<input type="hidden" name="C02" value="<?=$ConsBusq?>">
	<table class="ListInfo">
		<tr>
			<td></td>
			<td><a href="BoletinList.php" name="cancelar">Regresar</a></td>
		</tr>	
		<tr>
			<th>Nombre </th>
			<td><input type="text" name="C03" value="<?=$VC03?>" ></td>
		</tr>
		<tr>
			<th>Fecha Extraviio</td>
			<td><input type="date" name="C04" placeholder="DD/MM/YYYY" value="<?=$VC04?>">
			</td>
		</tr>
		<tr>
			<td></td>	
			<td><input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" ></td>	
		</tr>	
	</table>
</form>
</body>
</html>