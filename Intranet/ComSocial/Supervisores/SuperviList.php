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
	include($_SERVER['DOCUMENT_ROOT'].'/Encabezado/EncaCook.php');
	include($_SERVER['DOCUMENT_ROOT'].'/Conexion/ConBasComSoc.php');
	
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
		<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>
		<div class="botones">
			<a href="SuperviDepe.php" class="regresar">Regresar</a>
		</div>
		<table>
			<thead>
				<tr>
					<td>No Empleado</td>
					<td>Nombre</td>
					<td>Categoria</td>
					<td>Foto</td>	
					<td>
					  <a href="Supervi.php?Param1=A&Param2=0" class="nuevo"> alta </a></td>	
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
					<td><?=$VC04?></td>				<!--Cambiar-->
					<td><?=$VC05?></td>				<!--Cambiar-->
					<td><?=$VC06?></td>				<!--Cambiar-->
					<td>
					<a href="#" onclick="CargImag(<?= $VC03?>)">
					   Doc</a>
					   <? if ( $VC10 != "" ) { ?>
					     <a href="javascript:window.open('<?=$RutaArch?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					     img </a>  
						<? } ?>					
					</td>	
					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
					  <?php if($Baja == "A" ){ ?>
							<a href="Supervi.php?Param1=B&Param2=<?= $VC03?>" class="btn_delete">
							<i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>
						<?php } ?>
					</td>
					<td data-titulo="Editar: ">
						<?php if($Modi == "A" ){ ?>
							<a href="Supervi.php?Param1=M&Param2=<?= $VC03?>" class="btn_update">
							<i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>