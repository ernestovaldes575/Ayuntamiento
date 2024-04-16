<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Base de Datos</title>
	<link rel="stylesheet" href="../../Archivos/CSS/Baseda.css">
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

	$ArCooki3 = $_COOKIE['CPermMenu'];
	$APermMen = explode("|", $ArCooki3);
	$ClavBaDa = $APermMen[0];
	$DescBaDa = $APermMen[1];
	$BaseDato = $APermMen[2];
	$ClavMenu = $APermMen[3];
	$DescMenu = $APermMen[4];

	if ( isset($_GET["Param1"]) ){
		$ClavBaDa = $_GET["Param1"];
		$DescBaDa = $_GET["Param2"];
		$BaseDato = $_GET["Param3"];
		$ArCooki3 = $ClavBaDa.'|'.$DescBaDa.'|'.$BaseDato.'|||';
		setcookie("CPermMenu", "$ArCooki3");
	}

		//archivo de conexion a la bd
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');
		//query pars la tabla
	$sql = "SELECT CTSClave,CTSDescripcion FROM $BaseDato.actipser ORDER BY CTSClave ";
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
			<a href="BaseDato.php" class="regresar">Regresar</a>
		</div>
		<table width="199" border="1">
			<tr>
				<td width="85">&nbsp;</td>
				<td width="98">&nbsp;</td>
			</tr>
			<tr>
				<td>
					<table>
						<tr>
							<td><a href="AltTipSer.php?Param1=A&Param2=00" class="new" target="CaptDato">Alta</a></td>
						</tr>
						<?php
						foreach ($row as $fila):
							$ClavMenu = $fila['CTSClave'];
							$DescMenu = $fila['CTSDescripcion']; ?>
							<tr>
								<td><a href="OpciServLista.php?Param1=<?=$ClavMenu?>&Param2=<?=$DescMenu?>" target="ListDato"><?=$ClavMenu?>&nbsp;&nbsp;<?=$DescMenu?></a></td>
							</tr>
						<?php endforeach ?>
					</table>
				</td>
				<td rowspan="2">
					<iframe  name="CaptDato" id ="CaptDato" target="_self" width="580px" src="../../Archivos/Img/MEBlanco.gif" height="238px" style="overflow:auto;"  frameborder="0">
						Tu Navegador no est&aacute; configurado para soportar estos frames
					</iframe>
				</td>
			</tr>
			<tr>
				<td>
					<iframe  name="ListDato" id ="ListDato" target="_self" width="580px" src="../../Archivos/Img/MEBlanco.gif" height="238px" style="overflow:auto;"  frameborder="0">
						Tu Navegador no est&aacute; configurado para soportar estos frames
					</iframe>
				</td>
			</tr>
		</table>
	</div>
</body>
</html>