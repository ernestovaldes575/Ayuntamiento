<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CargaCampos</title>
	<link rel="stylesheet" href="../../Archivos/CSS/Consu.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
</head>
<body>	
	<?php
	//archivo de conexion a la bd
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conteinf.php');
	//Carga las variables
	$ArCooki1 = $_COOKIE['CMenu'];
	$AMenu = explode("|", $ArCooki1);
	$ClavMenu = $AMenu[0];  
	$DescMenu = $AMenu[1];  
	$BaseDato = $AMenu[2]; 
	$TablBaDa = $AMenu[3];
	$ArchList = $AMenu[4]; 
	$ArchMovi = $AMenu[5];
	$RutaArch = $AMenu[6]; 

	if(isset($_POST['Enviar'])){

		$ArchList = $_POST['ArchList'];
		$ArchMovi = $_POST['ArchMovi'];
		$RutaArch = $_POST['RutaArch'];

		$ArCooki2 = $ClavMenu.'|'.$DescMenu.'|'.$BaseDato.'|'.$TablBaDa.'|'.$ArchList.'|'.$ArchMovi.'|'.$RutaArch.'|';
		setcookie("CMenu", "$ArCooki2");

			//query  
		$sql = "SELECT * ".
				"FROM pdcampos ".
				"WHERE CTabla= '".$TablBaDa."' ".
				"ORDER BY CNumero";	   
		$resultado = $cone->prepare($sql);
		$resultado->execute();
		$tot_rows = $resultado->rowCount();
		$row = $resultado->fetchAll();

		foreach ($row as $fila):
			$Tabla     = $fila['CTabla'];
			$NumeRegi  = $fila['CNumero'];
			//						  Col, ren		
			$EstaLiKe = isset($_POST['C01'.$NumeRegi]) ? "A":"I";
			$DefaList = $_POST['C2'.$NumeRegi];
			$EstaDeLi = isset($_POST['C3'.$NumeRegi]) ? "A":"I";
			$EstaBuLi = isset($_POST['C4'.$NumeRegi]) ? "A":"I";
			$EstaPaRe = isset($_POST['C5'.$NumeRegi]) ? "A":"I";
			$EstaCaC  = isset($_POST['C6'.$NumeRegi]) ? "A":"I";
			$EstaCak  = isset($_POST['C7'.$NumeRegi]) ? "A":"I";
			$CampDef  = $_POST['C8'.$NumeRegi];
			$EstaCCa  = isset($_POST['C9'.$NumeRegi]) ? "A":"I";
			$LogoCat  = $_POST['C10'.$NumeRegi];
			$ClavCat  = $_POST['C11'.$NumeRegi];
			$DescCat  = $_POST['C12'.$NumeRegi];	

			$sql = "UPDATE pdcampos ".
				   "SET CListaKey   = '$EstaLiKe', ".
				   		"CListaDefa = '$DefaList', ".
						"CDespLista = '$EstaDeLi', ".
						"CBusqLista = '$EstaBuLi', ".
						"CPagiRefe = '$EstaPaRe', ".//-------------------------
						"CCampoCapt = '$EstaCaC', ".
						"CCampoKey = '$EstaCak', ".
						"CCampDefa = '$CampDef', ".
						"CUtilCata = '$EstaCCa', ".
						"CCatalogo = '$LogoCat', ".
						"CClaveCata = '$ClavCat', ".
						"CDescriCata = '$DescCat' ".
				   "WHERE CTabla = '$Tabla' AND ".
				   		"CNumero = $NumeRegi ";
			//echo $sql."<br>";	
			$resultado1 = $cone->prepare($sql);
			$resultado1->execute();
		endforeach;		
	}

	//query pars la tabla estructura organica 
	$sql = "SELECT * ".
			"FROM pdcampos ".
			"WHERE CTabla= '".$TablBaDa."' ".
			"ORDER BY CNumero";	   
	$resultado = $cone->prepare($sql);
	$resultado->execute();
	$tot_rows = $resultado->rowCount();
	$row = $resultado->fetchAll();
	?>	
	<!--encabezado-->
	<header> <?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> </header>
	<br>
	<div class="tabla">
		<div class="titulo"><h2>Cargar Campos</h2></div>
		<div class="botones">
			<a href="MenuTabla.php" class="regresar">Regresar</a>
		</div>
	<form action="" method="POST" name="formulario">
		<table>
			<thead>
				<tr>
					<td colspan="18">Ruta para guardar el archivo<input type="text" name="RutaArch" style="width: 190px;" size="80" value="<?=$RutaArch?>"> <a href="javascript:window.open('2dir.php?carpeta=','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">Imagen</a></td>
				</tr>
				<tr>
					<td colspan="10">
						Nombre Archivo Consulta
						<input name="ArchList" type="text" value="<?= $ArchList ?>"> 
						<a href="CrearLista.php" class="nuevo">Crear</a>
					</td>
					<td colspan="8" style="background-color: yellow;">
						Nombre Archivo de ABC<input name="ArchMovi" type="text" value="<?= $ArchMovi ?>"> <a href="CrearMovi.php" class="nuevo">Crear</a></td>
				</tr>
				<tr>
					<td>Tabla</td>
					<td>Número</td>
					<td>Descripción</td>
					<td>Tipo</td>
					<td>Ancho</td>
					<td>L. Key <!--(col 1)--></td>
					<td>L. Default <!--(col 2)--></td>
					<td>Desp. Lista<!--(col 3)--></td>
					<td>Busq. Lista<!--(col 4)--></td>
					<td>Pag. Ref.<!--(col 5)--></td>
					<td style="background-color: yellow;">Campo Capt.<!--(col 6)--></td>
					<td style="background-color: yellow;">Campo Key<!--(col 7)--></td>
					<td style="background-color: yellow;">Campo Defa.<!--(col 8)--></td>
					<td style="background-color: yellow;">Útil Cata.<!--(col 9)--></td>
					<td style="background-color: yellow;">Catalogo<!--(col 10)--></td>
					<td style="background-color: yellow;">Clave Cata.<!--(col 11)--></td>
					<td style="background-color: yellow;">Desc. Cata.<!--(col 12)--></td>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($row as $fila):
					  	$Tabla    = $fila['CTabla'];
						$NumeRegi = $fila['CNumero'];
						$Descrip  = $fila['CDescripcion'];
						$Tipo     = $fila['CTipo'];
						$Ancho    = $fila['CAncho'];

						$ListaK   = $fila['CListaKey'];
						$EstaLiKe = ($ListaK == "A") ? "checked":"";

						$DefaList = $fila['CListaDefa'];

						$DespList = $fila['CDespLista'];
						$EstaDeLi = ($DespList == "A") ? "checked":"";

						$BusqList = $fila['CBusqLista'];
						$EstaBuLi = ($BusqList == "A") ? "checked":"";

						$PagiRef  = $fila['CPagiRefe'];
						$EstaPaRe = ($PagiRef == "A") ? "checked":"";

						$CampCap  = $fila['CCampoCapt'];
						$EstaCaC = ($CampCap == "A") ? "checked":"";

						$CampKey  = $fila['CCampokey'];
						$EstaCak = ($CampKey == "A") ? "checked":"";

						$CampDef  = $fila['CCampDefa'];

						$UtilCat  = $fila['CUtilCata'];
						$EstaCCa = ($UtilCat == "A") ? "checked":"";

						$LogoCat  = $fila['CCatalogo'];

						$ClavCat  = $fila['CClaveCata'];

						$DescCat  = $fila['CDescriCata'];		

				?>
					<tr>
						<td><?=$Tabla?></td>
						<td><?=$NumeRegi?></td>
						<td><?=$Descrip?></td>
						<td><?=$Tipo?></td>
						<td><?=$Ancho?></td>
						<td><input name="C01<?=$NumeRegi?>" type="checkbox" <?= $EstaLiKe ?>></td>
						<td><input name="C2<?=$NumeRegi?>" type="text" value = "<?= $DefaList ?>" style="width: 55px;"></td>
						<td><input name="C3<?=$NumeRegi?>" type="checkbox" <?= $EstaDeLi ?>></td>
						<td><input name="C4<?=$NumeRegi?>" type="checkbox" <?= $EstaBuLi ?>></td>
						<td><input name="C5<?=$NumeRegi?>" type="checkbox" <?= $EstaPaRe ?>></td>
						<td><input name="C6<?=$NumeRegi?>" type="checkbox" <?= $EstaCaC ?>></td>
						<td><input name="C7<?=$NumeRegi?>" type="checkbox" <?= $EstaCak ?>></td>
						<td><input name="C8<?=$NumeRegi?>" type="text" value = "<?= $CampDef ?>" style="width: 55px;"></td>
						<td><input name="C9<?=$NumeRegi?>" type="checkbox" <?= $EstaCCa ?>></td>
						<td><input name="C10<?=$NumeRegi?>" type="text" value = "<?= $LogoCat ?>" style="width: 55px;"></td>
						<td><input name="C11<?=$NumeRegi?>" type="text" value = "<?= $ClavCat ?>" style="width: 55px;"></td>
						<td><input name="C12<?=$NumeRegi?>" type="text" value = "<?= $DescCat ?>" style="width: 55px;"></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<input type="submit" name="Enviar" value="Guardar">
	</form>
	</div>
</body>
</html>