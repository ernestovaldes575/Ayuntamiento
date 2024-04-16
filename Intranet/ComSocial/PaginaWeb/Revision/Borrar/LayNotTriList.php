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

	function CargImag(Param1,Param2,Param3,Param4)
		{ Ruta = "ImgColoSubiArch.php?Param1="+Param1+
									"&Param2="+Param2+
									"&Param3="+Param3+
									"&Param4="+Param4; 
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
	$TipoDocu = $ABusqMae[0]; 
	$EjerTrab = $ABusqMae[1];
	$MesTrab  = $ABusqMae[2];
	
	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
		$BandMens = true;

	//Ejercicio
	if ( isset($_GET["Param1"]) ){
		$EjerTrab = $_GET["Param1"];
		$ArCooki4 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|';
		setcookie("CBusqMae", "$ArCooki4");
	}

	//Datos del Layer
	$InstSql =  "SELECT LConsecut,LEjercicio,LMesRegi,". 
					   "RTRIM(LTitulo),RTRIM(LDescripcion),LFechAlta, ".
					   "RTRIM(LImagen), RTRIM(LAImagDocu), ". 
					   "RTRIM(CTDCarpeta), LEstaSegu ".
				"FROM  stlayers ".
				"INNER JOIN sctipodocu ON ctdclave = LTipoDocu ".				
				"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
					  "LUnidad =".$ConsUnid." AND ".
					  "LEjercicio = '".$EjerTrab."' AND ".
					  "LTipoDocu = '".$TipoDocu."' AND ". 
					  "LEstaSegu in ('I','R') AND ".
					  "LEstado = 'A' ";
	if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
	$ResuSql = $ConeBase->prepare($InstSql);
	$ResuSql->execute();
	$tot_rows = $ResuSql->rowCount();
	$ListLaye = $ResuSql->fetchAll();

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
			<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>
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
			.
		</div>

		<table>
			<thead>
				<tr>
					<td>Titulo</td>				<!--Cambiar-->
					<td>Descripcion</td>		<!--Cambiar-->
					<td>Fecha de Registro</td>	<!--Cambiar-->
					<td>Doc. Mostr</td>
					<td>Img Color</td>
					<td>Img Blanco</td>
					<td>Señales</td>
					<td>Eliminar</td>	
					<td>Editar</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($ListLaye as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//LConsecut,,,
					$VC04=$RegiTabl[1];		//LEjercicio,
					$VC05=$RegiTabl[2];		//LMesRegi,

				    $VC06=$RegiTabl[3];		//LTitulo,
				    $VC07=$RegiTabl[4];		//LDescripcion
					$VC08=$RegiTabl[5];		//LFechAlta

				    $VC09=$RegiTabl[6];		//LImagen
				    $VC10=$RegiTabl[7];		//LAImagDocu

				    $VC13=$RegiTabl[8];	//CTDCarpeta,  ,
					$VC14=$RegiTabl[9];	//LEstaSegu

					$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/PaguWeb/'.$VC04.'/'.$VC13.'/';
				?>
				<tr>
					<td><?=$VC06?></td>				<!--Cambiar-->
					<td><?=$VC07?></td>				<!--Cambiar-->
					<td><?=$VC08?></td>				<!--Cambiar-->
					<td>
					  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'I')">
					   Doc</a>
					   <? if ( $VC09 != "") { ?> 
					   <a href="javascript:window.open('<?=$RutaArch.$VC09?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					   img </a> 
					   <? } ?>
					</td>				<!--Cambiar-->				 
					<td>
					  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'D')">
					   Doc</a>
					   <? if ( $VC10 != "" ) { ?>
					     <a href="javascript:window.open('<?=$RutaArch.$VC10?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					     img </a>  
						<? } ?>
					</td>				<!--Cambiar-->				 
					<td>
					  
					</td>				<!--Cambiar-->				 
					<td>
					  
					</td>				<!--Cambiar-->				 

					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
					  <?php if($Baja == "A" && ( $VC14 == "I" || $VC14 == "R" ) ){ ?>
							<a href="LayNotTri.php?Param1=B&Param2=<?= $VC03?>" class="btn_delete">
							<i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>
						<?php } ?>
					</td>
					<td data-titulo="Editar: ">
						<?php if($Modi == "A"  && ( $VC14 == "I" || $VC14 == "R" )){ ?>
							<a href="LayNotTri.php?Param1=M&Param2=<?= $VC03?>" class="btn_update">
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