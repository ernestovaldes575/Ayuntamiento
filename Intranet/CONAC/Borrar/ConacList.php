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
	<script language="javascript">
	function CargaEjercicio(Param)
		{ location.href = "LayNotTriList.php?Param1="+Param; }

	</script>	
	<?php
	//echo 'ubicacion'.$_SERVER['DOCUMENT_ROOT'].'<br>';
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
	
	//Carga las variables
	$ArCooki3 = $_COOKIE['CBusqMae'];
	$ABusqMae = explode("|", $ArCooki3);
	//echo '$ABusqMae'.$ABusqMae.'<br>';
	$EjerTrab = $ABusqMae[0];	//Ejercicio de trabajo


	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;

	//Ejercicio
	if ( isset($_GET["Param1"]) ){
		$FechSist = getdate();
		$EjerTrab = $FechSist['year'];
		$ArCooki4 =  $EjerTrab .'|';
		setcookie("CBusqMae", "$ArCooki4");
	}

	//Datos del Layer
	$InstSql =  "SELECT CTCClave, CTCDescripcion, CTCNivel ". 
				"FROM cctipoclas ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$ListClas = $ResuSql->fetchAll();

	//Datos del Catalogo
	$InstSql = 	"SELECT * ".
				"FROM acceso.acejercicio";
	if ($BandMens)  echo '2)'.$InstSql.'<br>'; 			
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$CataEjer = $ResuSql->fetchAll();
	?>	
	<!--encabezado-->
	<header>
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
	</header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>

		<div class="botones">
			<div class="lista">
				<select name="AAreaResp" onChange="CargaEjercicio(this.value)" class="AAreaResp">
					<?php 
					foreach($CataEjer as $RegiTabl): 
						$ClavCata = $RegiTabl[0];		
						$DescCata = $RegiTabl[1];  
						$Activo = "";
						if ( $ClavCata == $EjerTrab)
							$Activo = "selected"; 
						?>
						<option value="<?=$ClavCata?>" <?=$Activo?>> <?=$ClavCata?> </option>
						<?php	
					endforeach;
					?>
				</select>
			</div>
		</div>

		<table>
			<thead>
				<tr>
					<td>Titulo</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
					<td>Editar</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($ListClas as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//CTCClave
					$VC04=$RegiTabl[1];		//CTCDescripcion
					$VC05=$RegiTabl[2];		//CTCNivel
				?>
				<tr>
					<td><?=$VC03?></td>				<!--Cambiar-->
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td data-titulo="Editar: ">
							<a href="ConacClasI.php?Param1=<?= $VC03?>&Param2=<?= $VC04?>&Param3=<?= $VC05?>" class="btn_update">
							<i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>