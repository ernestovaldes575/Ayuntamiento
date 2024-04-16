<!DOCTYPE html>
<html lang="es">
	<head> 
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Permisos</title>
		<link rel="stylesheet" href="../../Archivos/CSS/OpcioMen.css">
		<!--icono de la pestaña (logo)-->
		<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
		<!-- iconos -->
		<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
	</head>
	<body>
<?php

//Carga las variables
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');

$ArCooki3 = $_COOKIE['CPermMenu'];
$APermMen = explode("|", $ArCooki3);
$ConsUsua = $APermMen[0];
$NombUsua = $APermMen[1];
$ClavMenu = $APermMen[2];
$DescMenu = $APermMen[3];
$BaseDato = $APermMen[4];



		//archivo de conexion a la bd
		include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');
		//query pars la tabla estructura organica 
		$sql = "SELECT `CTSClave`,`CTSDescripcion` ".
			   "FROM ".$BaseDato.".actipser ".
		       "Order by  `CTSClave` ";     	   
		$resultado = $con->prepare($sql);
		$resultado->execute();
		$tot_rows = $resultado->rowCount();
		$row = $resultado->fetchAll();
		?>	
		<div class="tabla">
			<br><br>
			<table>
				<thead>
					<tr>
						<td>Menú</td>
						<td>Submenú</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($row as $fila):
					       $OpciMenu = $fila['CTSClave'];
					       $DescMenu = $fila['CTSDescripcion'];
					        ?>
						<tr>
							<td><a href="OpciSubm.php?Param1=<?=$OpciMenu?>&Param2=<?=$DescMenu?>"><?=$OpciMenu?></a></td>
							<td><?=$DescMenu?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</body>
</html>