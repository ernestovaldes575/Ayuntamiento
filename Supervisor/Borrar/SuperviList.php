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
	function CargImag(Param1)
		{ Ruta = "SuperviSubiArch.php?Param1="+Param1; 
    	  Dime = "width=450 height=350 top=10 left=10 scrollbars";
    	  Cata = window.open(Ruta,"Carga documento",Dime);
	 }
	</script>	

<?php
	//echo 'ubicacion'.$_SERVER['DOCUMENT_ROOT'].'<br>';
	include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');
	
	$ClavAyun = 105; 

	//Carga las variables
	$ArCooki3 = $_COOKIE['CBusqMae'];
	$ABusqMae = explode("|", $ArCooki3);
	//echo '$ABusqMae'.$ABusqMae.'<br>';
	$ConUniTr = $ABusqMae[0]; 
	$ClaUniTr = $ABusqMae[1];
	$DesUniTr = $ABusqMae[2];

	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
		$BandMens = true;
	

	//Listado de Supervisores
	$InstSql =  "SELECT SConsecut, SNumeEmpl, SServPubli, SCategoria, SFoto ". 
				"FROM  stsupervisor ".
				"WHERE SAyuntamiento = '".$ClavAyun."' AND ".
					  "SUnidad =".$ConUniTr." AND ".
					  "SEstado = 'A' ". 
				"ORDER BY SNumeEmpl"	  ;
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$ListSupe = $ResuSql->fetchAll();

	?>	
	<!--encabezado-->
	<header>
		<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
	</header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2></h2></div>
		<div class="botones">
			<a href="SuperviDepe.php" class="regresar">Regresar</a>
		</div>
		<table>
			<thead>
				<tr>
					<td>No Empleado</td>
					<td>Datos</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($ListSupe as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//SConsecut
					$VC04=$RegiTabl[1];		//SNumeEmpl
					$VC05=$RegiTabl[2];		//SServPubli
					$VC06=$RegiTabl[3];		//SCategoria
					$VC07=$RegiTabl[4];		//SFoto

					$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/Supervisor/'.$VC07;
				?>
				<tr>
				    <td rowspan="4">
						<? if ( $VC10 != "" ) { ?>
							<embed src="<?=$RutaArch?>" type="application/pdf" width="100px" height="100px" />
							<a href="javascript:window.open('<?=$RutaArch?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
							Ver
							</a>  
							<? } ?>		
					</td>
					<td>N empleado: <?=$VC04?></td>				<!--Cambiar-->
				</tr>	
				<tr>
					<td>Nombre: <?=$VC05?></td>				<!--Cambiar-->
				</tr>
				<tr>
					<td>Cargo:<?=$VC06?></td>				<!--Cambiar-->
				</tr>
				<tr>
					<td><a href="ReporteInc.php?Param1=<?=$VC03?>">Reporte</a></td>				<!--Cambiar-->
				</tr>
				<?php endforeach ?>

			</tbody>
		</table>
	</div>
</body>
</html>