<?php
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
	
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conteinf.php');
		//Borrar datos de la tabla
	$sql = "DELETE FROM pttabla WHERE TNombre = '".$TablBaDa."' AND TTipoMovi = 'L'";
	$resultado = $cone->prepare($sql);
	$resultado->execute();

//----------------------------------------------------------------------------------
	$intruccion = array('<!DOCTYPE html>',
						'<html lang="es">',
						'<head>',
						'	<meta charset="UTF-8">',
						'	<meta name="viewport" content="width=device-width, initial-scale=1.0">',
						'	<title>'.$ArchList.'</title>',
						'	<link rel="stylesheet" type="text/css" href="../../Archivos/CSS/Consu.css">',
						'	<!--icono de la pestaña (logo)-->',
						'	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />',
						'	<!-- iconos -->',
						'	<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">',
						'</head>',
						'<body>',
						'	<script language="javascript">', 
						'		function CargaEjercicio(Param)', 
						' 		{ location.href = "'.$ArchList.'.php?Param1="+Param; }', 
						'	</script>', 
						' ',
						'	<?php', 
						'		//Carga las variables', 
						'	include($_SERVER["DOCUMENT_ROOT"]."/Intranet/Archivos/Files/EncaCook.php");',
						' ',  
						'	if ( isset($_GET["Param1"]) ){', 
						'		$EjerTrab = $_GET["Param1"];',
						' 		$ArCooki3 = $ConsUsua."|".$ClavAyun."|".$DescAyun."|".$ConsUnid."|".$DescUnid."|".$EjerTrab."|";', 
						' 		setcookie("CEncaMae", "$ArCooki3");', 
						'	}', 
						'		//archivo de conexion a la bd', 
						'	include($_SERVER["DOCUMENT_ROOT"]."/Intranet/Archivos/Conexiones/conexion.php");', 
						'		//query pars la tabla '.$ArchList.'-',
						'	$sql = "SELECT * ".');

	for ($i=0, $NumeReng = 1; $i<=30; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}

//**************************************************************************************************
//Armar la condicion del where
	$Sql = "SELECT CDescripcion,CListaDefa FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CListaKey = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();
	$row = $Resultado->fetchAll();//fetch ->una fila que coincida con la clausula
	$TotaRegi = $Resultado->rowCount();	//Total de Registros
	$No=1;
	if ($TotaRegi > 0){
		$intruccion[0] = '   	       "FROM '.$TablBaDa.' ".';
		foreach ($row as $Fila):
			$Campo01 = $Fila['CDescripcion'];
			$Campo02 = $Fila['CListaDefa'];
			$intruccion[$No] = ($No == 1) ? '           "WHERE ': '           " AND ';
		    $intruccion[$No] .= ''.$Campo01.' = ".'.$Campo02;
		    $intruccion[$No] .= ($No == $TotaRegi) ? ';':'.';

		  	$No++;
		endforeach;
		for ($i=0; $i < $No; $i++, $NumeReng++){ 
			$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[$i]."' )";
			$resultado = $cone->prepare($sql);
			$resultado->execute();
		}	
	}
	else
	 { $intruccion[0] = '   	       "FROM '.$TablBaDa.' ";';
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[0]."' )";
				$resultado = $cone->prepare($sql);
				$resultado->execute();
	 
	   }	


//----------------------------------------------------------------------------------
//----------------------------------------------------------------------------------
	$intruccion = array('	$resultado = $conexion->prepare($sql);',
						'	$resultado->execute();',
						'	$tot_rows = $resultado->rowCount();',
						'	$row = $resultado->fetchAll();',
						' ',
						'		//Datos del Catalogo',
						'	$sql2 = $conexion->prepare("SELECT * FROM tcejercicio");',
						'	$sql2->execute();',
						'	$CEJClave = $sql2->fetchAll();',
						'	?>',
						' ',
						'		<!--encabezado-->',
						'	<header> <?php require_once("../../Archivos/Files/header.php"); ?> </header>',
						'	<br>',
						'	<div class="tabla">',
						'		<div class="titulo"><h2>'.$ArchList.'</h2></div>',
						'		<div class="botones">',
						'			<a href="../../menuintranet.php" class="regresar">Regresar</a>',
						'			<div class="lista">',
						'				<select name="AAreaResp" onChange="CargaEjercicio(this.value)" class="AAreaResp">',
						'				<?php',
						'				foreach($CEJClave as $valor):',
						'					$ClavCata = $valor["CEJClave"];',
						'					$DescCata = $valor["CEJDescripcion"];',
						'					$Activo = "";',
						'					if ( $ClavCata == $EjerTrab)',
						'						$Activo = "selected";',
						'				?>',
						'					<option value="<?=$ClavCata?>" <?=$Activo?>><?=$ClavCata?> </option>',
						'				<?php',
						'				endforeach;',
						'				?>',
						'				</select>',
						'			</div>',
						'			<?php ',
						'			if($Alta == "A"){ ',
						'			?>',
						'				<a href="'.$ArchMovi.'.php?Param1=A&Param2=0" class="nuevo">+Nuevo</a>',
						'			<?php } ?>',
						'		</div>',
						' ',
						'		<table>',
						'			<thead>',
						'				<tr>');
		//insertar intrucciones a la tabla
	for ($i=0; $i<=43; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
		
//**************************************************************************************************
		//llamar los encabezados
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CDespLista = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();
	$No=0;
	$row = $Resultado->fetchAll();//fetch ->una fila que coincida con la clausula
	foreach ($row as $Fila):
		$Campo = $Fila['CDescripcion'];
	    $intruccion[$No] = '					<td>'.$Campo.'</td>';		
	  	$No++;
	endforeach;
	for ($i=0; $i < $No; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
		//--------------------------------------------------------------------------------------
		//--------------------------------------------------------------------------------------
	$intruccion = array('					<td>Eliminar</td>',
						'					<td>Editar</td>',
						'				</tr>',
						'			</thead>',
						'			<tbody>',
						'				<?php',
						'				foreach ($row as $fila):');

		//insertar intrucciones a la tabla
	for ($i=0; $i<=6; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
//**************************************************************************************************
//**************************************************************************************************
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CDespLista = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();																				
	$No=0;
	$NumeVari = 3;
	$row = $Resultado->fetchAll(); 
	foreach ($row as $Fila):
		$Campo   = $Fila[0];
	    $intruccion[$No] = '					$VC0'.$NumeVari.' = $fila["'.$Campo.'"];';	
	  	$No++;
	  	$NumeVari++;
	endforeach;
	$intruccion[$No] = '				?>'; $No++;
	$intruccion[$No] = '				<tr>'; $No++;
		//insertar intrucciones a la tabla
	for ($i=0; $i < $No; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
		//-----------------------------------------------------------------
		//-------------------------------------------------------------------------------------
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CDespLista = 'A' ";	
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();
	$No=0;
	$NumeVari = 3; 
	$row = $Resultado->fetchAll(); 
	foreach ($row as $Fila):
		$Campo = $Fila[0];
	    $intruccion[$No] = '					<td><?=$VC0'.$NumeVari.'?></td>';		
	  	$No++;
	  	 $NumeVari++;
	endforeach;
		//insertar intrucciones a la tabla
	for ($i=0; $i < $No; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
		//--------------------------------------------------------------------------------------------	
		//--------------------------------------------------------------------------------------------
	$intruccion = array(' ',
						'						<!-- iconos dentro de la libreria font-awesome.min.css -->',
						'					<td>',
						'					<?php if($Baja == "A"){ ?>',
						'						<a href="'.$ArchMovi.'.php?Param1=B&Param2=<?= $VC03?>" class="btn_delete"><i class="fa fa-close" aria-hidden="true" title="Eliminar Registro"></i></a>',
						'					<?php } ?>',
						'					</td>',
						'					<td>',
						'					<?php if($Modi == "A"){ ?>',
						'						<a href="'.$ArchMovi.'.php?Param1=M&Param2=<?= $VC03?>" class="btn_update"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a>',
						'					<?php } ?>',
						'					</td>',
						'				</tr>',
						'				<?php endforeach ?>',
						'			</tbody>',
						'		</table>',
						'	</div>',
						'</body>',
						'</html>');
		//insertar intrucciones a la tabla
	for ($i=0; $i<=18; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'L', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
	
		//---------------------------------------------------------------------------------------------------

	//query para traer los datos de la tabla y despues escribirlos
	$sql = "SELECT * FROM pttabla WHERE TNombre = '".$TablBaDa."' AND TTipoMovi = 'L'";	   
	$resultado = $cone->prepare($sql);
	$resultado->execute();
	$row = $resultado->fetchAll();
	
		//escribir las instrucciones en el archivo
	$NombArch = $_SERVER['DOCUMENT_ROOT']. 
				"/Intranet/".$RutaArch."/".$ArchList.".php";	
	$file = fopen($NombArch, "w");
	foreach ($row as $fila):
		fwrite($file, $fila['TInstruccion'].PHP_EOL);
	endforeach;
	fclose($file);

	header("location: VisualizarCampos.php");
?>
