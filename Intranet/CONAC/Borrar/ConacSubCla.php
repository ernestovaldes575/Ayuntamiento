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
function CargImag(Param1,Param2)
		{ Ruta = "ConacSubiArch.php?Param1="+Param1+"&Param2="+Param2; 
    	  Dime = "width=450 height=350 top=10 left=10 scrollbars";
    	  Cata = window.open(Ruta,"Carga documento",Dime);
	 }
</script>	
	<?php
	//echo 'ubicacion'.$_SERVER['DOCUMENT_ROOT'].'<br>';
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
	
	//Carga las variables
	$ArCooki3 = $_COOKIE['CBusqMae'];
	$ABusqMae = explode("|", $ArCooki3);
	//echo '$ABusqMae'.$ABusqMae.'<br>';
	$EjerTrab = $ABusqMae[0];	//Ejercicio 
	$ClavTiCl = $ABusqMae[1];	//Clave Tipo deClasificacion 
	$DescTiCl = $ABusqMae[2];	//Descri Tipo de Clasificacion
	$ArchCarg = $ABusqMae[3];	//Nivel Clasificacion 1 o 2
	$Clasific = $ABusqMae[4];	//Clave de la Clasificacion


	//Bandera de visualizar msg
	$BandMens = true;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;

	//Ejercicio
	if ( isset($_GET["Param1"]) ){
		$Clasific = $_GET["Param1"];
		$ArCooki4 = $EjerTrab .'|'. $ClavTiCl .'|'. $DescTiCl .'|'. $ArchCarg .'|'. $Clasific .'|';
		setcookie("CBusqMae", "$ArCooki4");
	}

	//Datos del Layer
	$InstSql =  "SELECT CSCClave, CSCDescripcion, ". 
					   "CASE WHEN CConsect IS  NULL THEN 0 ELSE CConsect END AS ConsCona,". 
					   "CArchivo ". 
				"FROM   ccsubcalsifica ". 
				"LEFT JOIN CTConac ON CAyuntamiento = $ClavAyun AND ". 
									 "CEjercicio = $EjerTrab and ". 
									 "CClasifica = CSCClasifi AND ". 
									 "CSubClasifi = CSCClave ". 
				"WHERE CSCClasifi = '$Clasific' ". 
				"ORDER BY CSCClave ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$ListSubC = $ResuSql->fetchAll();

	$PagiRegr = ($ArchCarg == 1) ? "ConacList.php": "ConacClas.php";
	?>	
	<!--encabezado-->
	<header>
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
	</header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>
		<div class="botones">
			<a href="<?=$PagiRegr?>" class="regresar">Regresar</a>
			Ejercicio:<?=$EjerTrab?>
			Clasificacion: <?=$DescTiCl?>
		</div>
		<table>
			<thead>
				<tr>
					<td>Titulo</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
					<td>Img Color</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				
				$SubCarp = ($ArchCarg == 1) ? "/": "/I".$Clasific."/";
				$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/'.$EjerTrab.
							'/CONAC/'.$ClavTiCl.$SubCarp;

				foreach ($ListSubC as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//CSCClave
					$VC04=$RegiTabl[1];		//CSCDescripcion

					$VC05=$RegiTabl[2];		//CConsect
					$VC06=$RegiTabl[3];		//CArchivo
				?>
				<tr>
					<td><?=$VC03?></td>				<!--Cambiar-->
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td>
					  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC05?>)">
					   Doc</a>
					   <? if ( $VC05 != "") { ?> 
					   <a href="javascript:window.open('<?=$RutaArch.$VC06?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					   img </a> 
					   <? } ?>
					</td>				<!--Cambiar-->				 
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>