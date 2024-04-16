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
	$sql = "DELETE FROM pttabla WHERE TNombre = '".$TablBaDa."' AND TTipoMovi = 'M'";
	$resultado = $cone->prepare($sql);
	$resultado->execute();

//----------------------------------------------------------------------------------
	$intruccion = array('<!DOCTYPE html>',
		'	<html lang="es">',
		'	<head>',
		'		<meta charset="UTF-8">',
		'		<meta name="viewport" content="width=device-width, initial-scale=1.0">',
		'		<title>Form '.$ArchMovi.'</title>',
		'		<link rel="stylesheet" href="../../Archivos/CSS/CRUD.css">',
		'		<!--icono de la pestaña (logo)-->',
		'		<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />',
		'		<!--jquery para validar campos-->',
		'		<script src="../../Archivos/JS/jquery-1.11.1.js"></script>',
		'	</head>',
		'	<body>',
		'	<?php',
		' ',
		'		include($_SERVER["DOCUMENT_ROOT"]."/Intranet/Archivos/Conexiones/conexion.php");',
		' ',
		'			//Carga las variables',
		'',
		'		include($_SERVER["DOCUMENT_ROOT"]."/Intranet/Archivos/Files/EncaCook.php");',
		'		if(isset($_POST["Enviar"])){',
		'			$TipoMovi = $_POST["C01"];',
		'			$ConFacAr = $_POST["C02"]; ');
	for ($i=0, $NumeReng = 1; $i<=22; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
//**************************************************************************************
//REcibir la condicion del Entradas inputs
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CCampoCapt = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();	
	$row = $Resultado->fetchAll();																			
	$No=0;
	$NumeVari = 3;
	foreach($row as $Fila):
		$Campo = $Fila[0];
	    $intruccion[$No] = '			$C0'.$NumeVari.' = htmlentities(addslashes($_POST["C0'.$NumeVari.'"]));';	
	  	$No++;
	  	$NumeVari++;
	endforeach;
		//insertar intrucciones a la tabla
	for ($i=0; $i < $No; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
//---------------------------------------------------------------------------------------------------
	$intruccion = array(' ',
		'			//posibles querys',
		'			switch( $TipoMovi ){',
		'				case "A": #Alta',
		'				$sql = "INSERT INTO '.$TablBaDa.' ".');
	for ($i=0; $i<=4; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
//**************************************************************************************
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CCampoCapt = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();	
	$row = $Resultado->fetchAll();																			
	$No=3;
	$total = $Resultado->rowCount();
	$total = $total+2;
	$InsIns01 = ''; $InsIns02 = '';
	$InsUpd01 = ''; $InsUpd02 = '';

	foreach($row as $Fila):
		$Campo = $Fila[0];

		//Los campos para el Insert
	    $InsIns01 .= $Campo;
	   	$InsIns01 .= ($No == $total)? " ":", ";

	    $InsIns02 .= '?".$C0'.$No.'."?';
	   	$InsIns02 .= ($No == $total)? " ":", ";

	   	//Los campos para el Insert
	    $InsUpd01 .= $Campo .' = ?".$C0'.$No.'."?';
	   	$InsUpd01 .= ($No == $total)? " ":", ";

	  	$No++;
	  	$NumeVari++;

	endforeach;
	//$NumeReng++;
	$intruccion = array('					   "(AAyuntamiento, AEjercicio,'.$InsIns01 .') VALUES (?".$ClavAyun."?, ?".$EjerTrab."?, '.$InsIns02.')";',
		'				break;',
		'				case "M": #Modificacion',
		'				$sql = "UPDATE '.$TablBaDa.' SET ".',
		'					   "'.$InsUpd01 .'".');
	for ($i=0; $i<=4; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();

		if ($i==0 || $i==4)
			{ $sql = "UPDATE pttabla ".
					 "SET `TInstruccion`=REPLACE(`TInstruccion`,'?','\'') ".
					 "WHERE `TNumero` = ".$NumeReng." AND `TTipoMovi` = 'M' ";
			 		$resultado = $cone->prepare($sql);
		$resultado->execute();		 

			}
	}	
	//**************************************************************************************
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CCampoKey = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();	
	$row = $Resultado->fetchAll();																			
	$No=0;
	foreach($row as $Fila):
		$Campo = $Fila[0];
	endforeach;
	$intruccion = array('					   "WHERE '.$Campo.' = $ConFacAr";',
		'				break;',
		'				case "B": #Baja',
		'				$sql = "DELETE FROM '.$TablBaDa.' WHERE '.$Campo.' = $ConFacAr";',
		'				break;',
		'			}',
		'			$resultado = $conexion->prepare($sql);',
		'			$resultado->execute();',
		'			$MensResp = "Algo ha fallado!!!";',
		'			if ($resultado) ',
		'				$MensResp = "Registro actualizado correctamente";',
		'			$PagiRegr = "location: '.$ArchList.'.php";',
		'			header($PagiRegr);',
		'			echo "<script>alert(".$MensResp.");</script>";',
		'			$resultado->closeCursor();',
		'		}else{',
		'			$BandQuer = true;',
		'			if( trim($_GET["Param1"]) != ""){',
		'				$TipoMovi = $_GET["Param1"];	#Tipo de Movimiento',
		'				$ConFacAr = $_GET["Param2"];	#COINCIDENCIA CON LA BD  ',
		'			}',
		'				//Datos del Catalogo',
		'			$sql = $conexion->prepare("SELECT * FROM tcarea");',
		'			$sql->execute();',
		'			$CataArea = $sql->fetchAll();',
		'				//Datos de la tabla',
		'			$sql = "SELECT * FROM '.$TablBaDa.' WHERE '.$Campo.' = $ConFacAr";',
		'			$resultado = $conexion->prepare($sql);',
		'			$resultado->execute();',
		'			$result = $resultado->fetch();');
	for ($i=0; $i<=29; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
//***********************************************************************************************************
	//Calcular cantidad de salidas input
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CCampoCapt = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();	
	$row = $Resultado->fetchAll();																			
	$No=0;
	$Result = 1;
	foreach($row as $Fila):
		$Campo = $Fila[0];
	    $intruccion[$No] = '			$r'.$Result.' = "";';	
	  	$No++;
	  	$Result++;
	endforeach;
		//insertar intrucciones a la tabla
	for ($i=0; $i < $No; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
//---------------------------------------------------------------------------------------------------
	$intruccion = array('',
		'			if($result){ ');
	for ($i=0; $i<=1; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
//***********************************************************************************************************
	//Calcular cantidad de salidas input
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CCampoCapt = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();	
	$row = $Resultado->fetchAll();																			
	$No=0;
	$Result = 1;
	foreach($row as $Fila):
		$Campo = $Fila[0];
	    $intruccion[$No] = '				$r'.$Result.' = $result["'.$Campo.'"];';	
	  	$No++;
	  	$Result++;
	endforeach;
		//insertar intrucciones a la tabla
	for ($i=0; $i < $No; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}
//---------------------------------------------------------------------------------------------------
	$intruccion = array('			}',
		'			$MesnTiMo = "";',
		'			switch( $TipoMovi ){',
		'				case "A":	$MesnTiMo = "Registrar";  break;',
		'				case "M":	$MesnTiMo = "Actualizar"; break;',
		'				case "B":	$MesnTiMo = "Eliminar";   break;',
		'',
		'			}',
		'			?>',
		'			<!--encabezado-->',
		'			<header> <?php require_once($_SERVER["DOCUMENT_ROOT"]."/Intranet/Archivos/Files/header.php"); ?> </header>',
		'			<br>',
		'			<!--formulario de Actualizacion-->',
		'			<div class="principal">',
		'				<h1>Formulario '.$ArchMovi.'</h1>',
		'				<form method="post" name="formulario" onsubmit="return validar(this)">',
		'					<!-- opciones de crud-->',
		'					<input type="hidden" name="C01" value="<?=$TipoMovi?>">',
		'					<input type="hidden" name="C02" value="<?=$ConFacAr?>">',
		'					<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->',
		'					<table >');
	for ($i=0; $i<=20; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}

//*************************************************************************************************
	//armar inputs
	$Sql = "SELECT CDescripcion FROM pdcampos WHERE CTabla='".$TablBaDa."' AND CCampoCapt = 'A' ";
	$Resultado = $cone->prepare($Sql);
	$Resultado->execute();	
	$row = $Resultado->fetchAll();																			
	$No=0;
	$NumeVari = 3;
	$Result = 1;
	foreach($row as $Fila):
		$Campo = $Fila[0];
	    $intruccion[$No] = '						<tr>
	    					<th>'.$Campo.'</th>
	    					<td><input type="text" name="C0'.$NumeVari.'" value="<?=$r'.$Result.'?>" onkeyup="checaMensaje(this.value)"></td>
	    				</tr>';	
	  	$No++;
	  	$NumeVari++;
	  	$Result++;
	endforeach;
		//insertar intrucciones a la tabla
	for ($i=0; $i < $No; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}

//----------------------------------------------------------------------------------------------------
	$intruccion = array('				</table>',
		'				<div class="botones">',
		'					<a href="'.$ArchList.'.php" name="cancelar" class="cancelar">Cancelar</a>',
		'					<input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" >',
		'				</div>',
		'			</form>',
		'		</div>',
		'		<?php',
		'			}',
		'		?>',
		'	</body>',
		'</html>');
	for ($i=0; $i<=11; $i++, $NumeReng++){ 
		$sql = "INSERT INTO pttabla (TNombre, TTipoMovi, TNumero, TInstruccion) VALUES ('".$TablBaDa."', 'M', '".$NumeReng."', '".$intruccion[$i]."' )";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
	}

//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	$sql = "SELECT * FROM pttabla WHERE TNombre = '".$TablBaDa."' AND TTipoMovi = 'M'";	   
	$resultado = $cone->prepare($sql);
	$resultado->execute();
	$row = $resultado->fetchAll();
	
		//escribir las instrucciones en el archivo
	$file = fopen($_SERVER['DOCUMENT_ROOT']."/Intranet".$RutaArch.$ArchMovi.".php", "w");
	foreach ($row as $fila):
		fwrite($file, $fila['TInstruccion'].PHP_EOL);
	endforeach;
	fclose($file);
	header("location: VisualizarCampos.php");
?>