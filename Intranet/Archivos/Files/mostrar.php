<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Normatividad Aplicable</title>
	<link rel="stylesheet" href="../css/Consulta.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../img/logo.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">
</head>
<body>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/files/EncaCook.php');   //archivo de cokkies
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexiones/conexion.php'); 	//archivo de conexion a la bd

$BandSql =  ( isset($_GET["Param0"]) ) ? true:false;				//Visualizar codigo SQL

if ( isset($_GET["Param1"]) ){
		$EjerTrab = $_GET["Param1"];	#Tipo de Movimiento
		$ArCookie = $EjerTrab.'|';
		setcookie("CEncaMae", "$ArCookie");
	}

	//Datos del Catalogo ejercicio
	$sql = "SELECT * FROM ttfadear ";
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
	<header> <?php require_once('../files/header.php'); ?> </header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2>Normatividad Aplicable<br>
							<?=$DescUnid?></h2>
		</div>
		<div class="botones">
			<a href="../menuintra.php" class="regresar">Regresar</a>
			<div class="lista">
				<ul class="nav">
					<li>Ejercicio
						<ul>
							<?php
							foreach($CataEjer as $valor):
								$CEJClave = $valor['CEJClave'];
								$CEJDescr = $valor['CEJDescripcion'];
								?>
								<li><a href="mostNA.php?Param1=<?=$CEJClave?>"><?=$CEJClave?></a></li>
								<?php
							endforeach;
							?>
						</ul>
					</li>
				</ul>
			</div>
			<?php if ( $Alta == "A" ) {  ?>
			<a href="modNA.php?Param1=A&Param2=0" class="nuevo">+Nuevo</a>
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
						 <a href="modNA.php?Param1=B&Param2=<?=$VC01?>" class="btn_delete"><i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>
					<?php }  ?>	 
					</td>
					<td data-titulo="Editar: ">
					<?php if ( $Modi == "A" ) {  ?>
						  <a href="modNA.php?Param1=M&Param2=<?=$VC01?>" class="btn_update"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>
					<?php }  ?>
					</td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>