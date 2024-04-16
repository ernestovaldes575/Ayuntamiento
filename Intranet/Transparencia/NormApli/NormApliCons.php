<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Normatividad Aplicable</title>
	<link rel="stylesheet" type="text/css" href="../../Archivos/CSS/Consu.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
</head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conexion.php');	//archivo de conexion a la bd

$BandSql =  ( isset($_GET["Param0"]) ) ? true:false;				//Visualizar codigo SQL

if ( isset($_GET["Param1"]) ){
		$EjerTrab = $_GET["Param1"];	#Tipo de Movimiento
		$ArCookie = $EjerTrab.'|';
		setcookie("CEncaMae", "$ArCookie");
	}

	//Datos del Catalogo ejercicio
	$sql = "SELECT * FROM tcejercicio ";
	if ($BandSql) echo "1:<br>".$sql."<br><br>";
	$resultado = $conexion->prepare($sql);
	$resultado->execute();
	$CataEjer = $resultado->fetchAll();

	//Datos de Normatividad
	$sql = "SELECT * ".
		"FROM normap  ".
		"INNER JOIN tcnormatividad ON ATipoNorma = CNOClave ".
		"WHERE AAyuntamiento = '".$ClavAyun."' AND ".
		"AEjercicio = '".$EjerTrab."' AND ".
		"AAreaResp = '".$ConsUnid."' " ;
	if ($BandSql) echo "2:<br>".$sql."<br><br>";
	$resultado = $conexion->prepare($sql);
	$resultado->execute();
	$tot_rows = $resultado->rowCount();
	$row = $resultado->fetchAll();
?>
	<!--encabezado-->
	<header> <?php require_once('../../Archivos/Files/header.php'); ?> </header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2>Normatividad Aplicable<br>
							<?=$DescUnid?></h2>
		</div>
		<div class="botones">
			<a href="../../menuintranet.php" class="regresar">Regresar</a>
			<div class="lista">
				<select name="AAreaResp" onChange="CargaEjercicio(this.value)" class="AAreaResp">
					<?php
						foreach($CataEjer as $valor):
							$ClavCata = $valor['CEJClave'];		
							$DescCata = $valor['CEJDescripcion'];  
							$Activo = "";;
							if ( $ClavCata == $EjerTrab)
							$Activo = "selected"; 
					?>
					<option value="<?=$ClavCata?>" <?=$Activo?>><?=$ClavCata?> </option>
					<?php
						endforeach;
					?>
				</select>
			</div>
			<?php if ( $Alta == "A" ) {  ?>
			<a href="NormApliForm.php?Param1=A&Param2=0" class="nuevo">+Nuevo</a>
			<?php }  ?>
		</div>

		<table>
			<thead>
				<tr>

                    <td data-titulo="AFechaInicio: ">Fecha Inicio</td>
					<td data-titulo="AFechaTermino: ">Fecha Termino</td>
					<td data-titulo="ATipoNorma: ">ATipoNorma</td>
                    <td data-titulo="ATipoNormaOtro: ">ATipoNormaOtro</td>
					<td data-titulo="ADenominacion: ">Denominacion</td>

					<td data-titulo="Eliminar: ">Eliminar</td>
					<td data-titulo="Editar: ">Editar</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				  foreach ($row as $fila): 
				    $VC01=$fila['AConsecutivo'];
					$VC02=$fila['AFechaInicio'];
					$VC03=$fila['AFechaTermino'];
					$VC04=$fila['CNODescripcion'];
					$VC05=$fila['ATipoNormaOtro'];
					$VC06=$fila['ADenominacion'];
					 ?>
				<tr>
                    <td data-titulo="AFechaInicio: "><?=$VC02?></td>
					<td data-titulo="AFechaTermino: "><?=$VC03?></td>
					<td data-titulo="ATipoNorma: "><?=$VC04?></td>
                    <td data-titulo="ATipoNormaOtro: "><?=$VC05?></td>
					<td data-titulo="ADenominacion: "><?=$VC06?></td>
					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
					<?php if ( $Baja == "A" ) {  ?>	
						 <a href="NormApliForm.php?Param1=B&Param2=<?=$VC01?>" class="btn_delete"><i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>
					<?php }  ?>	 
					</td>
					<td data-titulo="Editar: ">
					<?php if ( $Modi == "A" ) {  ?>
						  <a href="NormApliForm.php?Param1=M&Param2=<?=$VC01?>" class="btn_update"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>
					<?php }  ?>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>