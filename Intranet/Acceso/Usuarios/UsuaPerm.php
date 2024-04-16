<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Permisos</title>
	<link rel="stylesheet" href="../../Archivos/CSS/OpcionMe.css">
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

	$ArCooki3 = $_COOKIE['CPermMenu'];
	$APermMen = explode("|", $ArCooki3);
	$ConsUsua = $APermMen[0];
	$NombUsua = $APermMen[1];
	$ClavMenu = $APermMen[2];
	$DescMenu = $APermMen[3];
	$BaseDato = $APermMen[4];

		//archivo de conexion a la bd
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');

	if(isset($_POST['Enviar'])){ 

		$OpciMenu = $_POST['C03'];
		$OpciSubm = $_POST['C05'];
		$PermCons = ( !empty($_POST['C07']) ) ? "A": "I";
		$PermAlta = ( !empty($_POST['C08']) ) ? "A": "I";
		$PermModi = ( !empty($_POST['C09']) ) ? "A": "I";
		$PermBaja = ( !empty($_POST['C10']) ) ? "A": "I";
		
		$sql = "INSERT INTO ".$BaseDato.".adpermi (PAyuntamiento, PConsServ, PTipoServ, POpciServ, PConsulta, PAlta, PModifica, PBaja) VALUES ('".$ClavAyun."', '".$ConsUsua."', '".$OpciMenu."', '".$OpciSubm."', '".$PermCons."', '".$PermAlta."', '".$PermModi."', '".$PermBaja."')";
		$resultado = $con->prepare($sql);
		$resultado->execute();

		$MensResp = "Algo ha fallado!!!";
		if ($resultado) 
			$MensResp = "Registro actualizado correctamente";


		$PagiRegr = "location: UsuaPerm.php";
		header($PagiRegr);
		echo '<script>alert("'.$MensResp.'");</script>';
		$resultado->closeCursor();
	}


	if ( isset($_GET["Param1"]) ){
		$ClavMenu = $_GET["Param1"];
		$DescMenu = $_GET["Param2"];
		$BaseDato = $_GET["Param3"];
		$ArCooki4 = $ConsUsua.'|'.$NombUsua.'|'.$ClavMenu.'|'.$DescMenu.'|'.$BaseDato.'|';
		setcookie("CPermMenu", "$ArCooki4");
	}
		//query pars la tabla estructura organica 
	$sql = "SELECT `PTipoServ`,`CTSDescripcion`,`POpciServ`,`COSDescripcion`,".
	"`PConsulta`,`PAlta`,`PModifica`,`PBaja`,`PNumePerm` ".
	"FROM ".$BaseDato.".adpermi ".
	"inner join ".$BaseDato.".actipser on `CTSClave` = `PTipoServ` ".
	"inner join ".$BaseDato.".acopcser ON `COSTipSer`= `PTipoServ` AND `COSClave`=`POpciServ` ".
	"WHERE `PAyuntamiento`='".$ClavAyun."' and `PConsServ`='".$ConsUsua."'";     	   
	$resultado = $con->prepare($sql);
	$resultado->execute();
	$tot_rows = $resultado->rowCount();
	$row = $resultado->fetchAll();
	?>	
	<!--encabezado-->
	<header> <?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> </header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2>Permisos</h2></div>
		<div class="botones">
			<a href="BaseDatos.php" class="regresar">Regresar</a>
			<a href="javascript:window.open('OpciMenu.php','','width=500,height=300,left=430,top=200,resizable=yes,scrollbars=yes');void 0" class="opciones"><i class="fa fa-bars" aria-hidden="true" title="Cargar Datos"></i></a>
		</div>
		<form method="post" name="formulario" onsubmit="return validar(this)">
			<table class="formulario">
				<tr>
					<th>Menu</th>
					<td><input type="text" name="C03" id="C03" placeholder="Digita clave del Menu" readonly>
						<input type="text" name="C04" id="C04" placeholder="Digita clave del Menu" readonly>
					</td>
				</tr>
				<tr>
					<th>Sumbmenu</th>
					<td><input type="text" name="C05" id="C05" placeholder="Digita clave del submenu" readonly>
						<input type="text" name="C06" id="C06" placeholder="Digita clave del submenu" readonly></td>
					</tr>
					<tr>
						<th>Servidor Activo</th>
						<td> <input type="checkbox" name="C07" id="C07" value="A" checked="checked"> Consulta
							&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="C08" id="C08" value="A" checked="checked"> Alta
							&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="C09" id="C09" value="A" checked="checked"> Modificar
							&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="C10" id="C10" value="A" checked="checked"> Eliminar
						</td>
					</tr>
				</table>
				<div class="botones">
					<input type="submit" name="Enviar" class="Cargar" value="Cargar" >
				</div>
			</form>
			<br><br>
			<table>
				<thead>
					<tr>
						<td>Menú</td>
						<td>Submenú</td>
						<td>Consulta</td>
						<td>Alta</td>
						<td>Modificación</td>
						<td>Baja</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($row as $fila):
						$OpciMenu = $fila['PTipoServ'];
						$DescMenu = $fila['CTSDescripcion'];
						$OpciSubm = $fila['POpciServ'];
						$DescSubm = $fila['COSDescripcion'];
						$PermCons = $fila['PConsulta'];
						$PermAlta = $fila['PAlta'];
						$PermModi = $fila['PModifica'];
						$PermBaja = $fila['PBaja'];
						$NumePerm = $fila['PNumePerm'];
						?>
						<tr>
							<td><?=$OpciMenu?>, <?=$DescMenu?></td>
							<td><?=$OpciSubm?>, <?=$DescSubm?></td>
							<td><?=$PermCons?></td>
							<td><?=$PermAlta?></td>
							<td><?=$PermModi?></td>
							<td><?=$PermBaja?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</body>
	</html>