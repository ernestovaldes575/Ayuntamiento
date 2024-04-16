<?php include '../../../Includes/Header.php'?>

	<script language="javascript">
	function CargaEjercicio(Param)
		{ location.href = "LayNotTriList.php?Param1="+Param; }

	function CargaEsta(Param)
		{ location.href = "LayNotTriList.php?Param2="+Param; }

	function CargImag(Param1,Param2,Param3,Param4)
		{ Ruta = "ImgPagSubiArch.php?Param1="+Param1+
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
	$EstaRevi = $ABusqMae[3];


	//Bandera de visualizar msg
	$BandMens = false;
	if ( isset($_GET["Param0"]) )
	$BandMens = true;

	//Ejercicio
	if ( isset($_GET["Param1"]) ){
		$EjerTrab = $_GET["Param1"];
		$ArCooki4 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi .'|';
		setcookie("CBusqMae", "$ArCooki4");
	}

	//Estado de la revision
	if ( isset($_GET["Param2"]) ){
		$EstaRevi = $_GET["Param2"];
		$ArCooki4 = $TipoDocu .'|'. $EjerTrab .'|'. $MesTrab .'|'. $EstaRevi .'|';
		setcookie("CBusqMae", "$ArCooki4");
	}
	
	$EstaRevI = ""; $EstaRevR = ""; $EstaRevP = ""; $EstaRevT = ""; 
	switch( $EstaRevi ){
		case "I":	$EstaRevI = "checked";	break;	//Registro inicial
		case "R":	$EstaRevR = "checked";	break;	//Revision
		case "P":	$EstaRevP = "checked";	break;	//Publicacion
		case "T":	$EstaRevT = "checked";	break;	//Terminacion de publicacion
	}

	//Datos del Layer
	$InstSql =  "SELECT LConsecut,LEjercicio,LMesRegi,". 
					   "RTRIM(LTitulo),RTRIM(LDescripcion),LFechAlta, ".
					   "RTRIM(LImagen), RTRIM(LArchDocu),". 
					   "RTRIM(LLiga), RTRIM(LSenaSord), ". 
					   "RTRIM(CTDCarpeta), LEstaSegu ".
				"FROM  stlayers ".
				"INNER JOIN sctipodocu ON ctdclave = LTipoDocu ".				
				"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
					  "LUnidad =".$ConsUnid." AND ".
					  "LEjercicio = '".$EjerTrab."' AND ".
					  "LTipoDocu = '".$TipoDocu."' AND ". 
					  "LEstaSegu = '".$EstaRevi."' AND ".
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

	<div class="tabla">
		<div class="titulo"><h2><?=$DescTiSe ?> / <?=$DescOpSe ?></h2></div>
		<div class="botones">
			<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>
			<input type="checkbox" name="C06" value="I" onChange="CargaEsta('I')" <?=$EstaRevI?>>
			Propuesta
			&nbsp;&nbsp; 
			<input type="checkbox" name="C06" value="R" onChange="CargaEsta('R')" <?=$EstaRevR?>> Revision
			&nbsp;&nbsp;
			<input type="checkbox" name="C06" value="P" onChange="CargaEsta('P')" <?=$EstaRevP?>> Publicación 
			&nbsp;&nbsp;
			<input type="checkbox" name="C06" value="T" onChange="CargaEsta('T')" <?=$EstaRevT?>> Termino de la Publicacion

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
			<?php 
			if($Alta == "A"){ 
				?>
				<a href="LayNotTri.php?Param1=A&Param2=0" class="nuevo">
					+Nuevo
				</a>			
			<?php } ?>
		</div>

		<table class="table">
			<thead class="thead">
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
			<tbody class="tbody">
				<?php 
				foreach ($ListLaye as $RegiTabl): 
				    $VC03=$RegiTabl[0];		//LConsecut,,,
					$VC04=$RegiTabl[1];		//LEjercicio,
					$VC05=$RegiTabl[2];		//LMesRegi,

				    $VC06=$RegiTabl[3];		//LTitulo,
				    $VC07=$RegiTabl[4];		//LDescripcion
					$VC08=$RegiTabl[5];		//LFechAlta

				    $VC09=$RegiTabl[6];		//LArchDocu
				    $VC10=$RegiTabl[7];		//LImagColo
					$VC11=$RegiTabl[8];		//LImagBlan
					$VC12=$RegiTabl[9];		//LSenaSord

				    $VC13=$RegiTabl[10];	//CTDCarpeta,  ,
					$VC14=$RegiTabl[11];	//LEstaSegu

					$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/PaguWeb/'.$VC04.'/'.$VC13.'/';
				?>
				<tr>
					<td><?=$VC06?></td>				<!--Cambiar-->
					<td><?=$VC07?></td>				<!--Cambiar-->
					<td><?=$VC08?></td>				<!--Cambiar-->
					<td>
					  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'P')">
					   Doc</a>
					   <? if ( $VC09 != "") { ?> 
					   <a href="javascript:window.open('<?=$RutaArch.$VC09?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					   img </a> 
					   <? } ?>
					</td>				<!--Cambiar-->				 
					<td>
					  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'C')">
					   Doc</a>
					   <? if ( $VC10 != "" ) { ?>
					     <a href="javascript:window.open('<?=$RutaArch.$VC10?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					     img </a>  
						<? } ?>
					</td>				<!--Cambiar-->				 
					<td>
					  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'B')">
					   Doc</a>
					</td>				<!--Cambiar-->				 
					<td>
					  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'S')">
					   Doc</a>
					</td>				<!--Cambiar-->				 

					<!-- iconos dentro de la libreria font-awesome.min.css -->
					<td data-titulo="Eliminar: ">
					  <?php if($Baja == "A" && $VC14 == "I" ){ ?>
							<a href="LayNotTri.php?Param1=B&Param2=<?= $VC03?>" class="btn_delete">
							<i class="bi bi-trash-fill"></i>
						<?php } ?>
					</td>
					<td data-titulo="Editar: ">
						<?php if($Modi == "A"  && $VC14 == "I"){ ?>
							<a href="LayNotTri.php?Param1=M&Param2=<?= $VC03?>" class="btn_update">
							<i class="bi bi-pencil-fill"></i>
						<?php } ?>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>