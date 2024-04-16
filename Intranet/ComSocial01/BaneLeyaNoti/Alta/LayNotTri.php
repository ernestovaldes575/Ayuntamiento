<!DOCTYPE html>
	<html lang="es">
		<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Form Facultades de área</title>
		<link rel="stylesheet" href="/Intranet/Archivos/CSS/CRUD.css">
		<!--icono de la pestaña (logo)-->
		<link rel="shortcut icon" href="/Intranet/Archivos/Img/logoEnc.ico" />
		<!--jquery para validar campos-->
		<script src="/Intranet/Archivos/JS/jquery-1.11.1.js"></script>
	</head>
	<body>
	<?php 

	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');

	//Carga las variables
	$ArCooki3 = $_COOKIE['CBusqMae'];
	$ABusqMae = explode("|", $ArCooki3);
	$TipoDocu = $ABusqMae[0]; 
	$EjerTrab = $ABusqMae[1];
	$MesTrab  = $ABusqMae[2];

	if(isset($_POST['Enviar'])){ 
		$BandMens = true;

		$TipoMovi = $_POST['C01'];
		$ConsBusq = $_POST['C02']; 
		$TituLaye = $_POST['C03']; 
		$DescLaye = $_POST['C04'];
		$FechInic = $_POST['C05']; 
		$FechFina = $_POST['C06']; 
		$ArchMost = $_POST['C07']; 
		$LigaRefe = $_POST['C08']; 
		$MostArch = $_POST['C09']; 

		//posibles querys
		switch( $TipoMovi ){
			case "A": #Alta
			/* `LConsecut`, `LAyuntamiento`, `LUnidad`, `LEjercicio`, `LMesRegi`, 
			   `LTipoDocu`, `LTitulo`, `LDescripcion`, 
			   `LSerPubCre`, `LFechAlta`, 
			   `LFechPublI`, `LFechPublF`, 
			   `LSerPubRev`, `LFechRevi`, `LSerPubAuto`, `LFechAuto`, `LFechPubl`, 
			   `LEstaSegu`, `LPublicacion`, 
			   `LAbrirLiDoIm`, `LLiga`, `LArchDocu`, 
			   `LImagColo`, `LImagBlan`, `LSenaSord`, `LVentRefe`, 
			   `LEstado`
			*/
			$InstSql = "INSERT INTO stlayers ". 
			"VALUES (Null,'".$ClavAyun."',".$ConsUnid.",". 
					"'".$EjerTrab."', '".$MesTrab. "', ".
					"'".$TipoDocu."', '".$TituLaye."', '".$DescLaye."', ".
					"'".$ConsUsua."', date(now()), ".
					"'".$FechInic."', '".$FechFina."', ". 
					"-1, '', -1,  '', '', ". 
					"'I','I',". 
					"'".$ArchMost."','".$LigaRefe."','',". 
					"'','','','".$MostArch."','A')";

			break;
			case "M": #Modificacion
					$InstSql = "UPDATE stlayers ". 
							   "SET LTitulo = '".$TituLaye."', ".
									"LDescripcion = '".$DescLaye."', ".
									"LFechPublI = '".$FechInic."', ".
									"LFechPublF = '".$FechFina."', ".
									"LAbrirLiDoIm = '".$ArchMost."', ". 
									"LLiga = '".$LigaRefe."', ".
									"LVentRefe = '".$MostArch."' ".
							   "WHERE LAyuntamiento = '".$ClavAyun."' AND ".
									 "LEjercicio = '".$EjerTrab."' AND ".
									 "LTipoDocu = '".$TipoDocu."' AND ". 
									 "LConsecut = ".$ConsBusq." ";
					break;
			case "B": #Baja
			$InstSql = "UPDATE stlayers ". 
						"SET   LEstado = 'B' ".
						"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
							  "LEjercicio = '".$EjerTrab."' AND ".
							  "LTipoDocu = '".$TipoDocu."' AND ". 
							  "LConsecut = ".$ConsBusq." ";
					break;	  
		}
		if ($BandMens)  echo '1)'.$InstSql.'<br>';	
		$ResuSql = $ConeBase->prepare($InstSql);
		$ResuSql->execute();

		$MensResp = "Algo ha fallado!!!";
		if ($ResuSql) 
			$MensResp = "Registro actualizado correctamente";
		$PagiRegr = "location: LayNotTriList.php";
		header($PagiRegr);
		echo '<script>alert("'.$MensResp.'");</script>';
		$ResuSql->closeCursor();
	} 
   else
    { 	//Bandera de visualizar msg
		$BandMens = false;
		if ( isset($_GET["Param0"]) )
		$BandMens = true;

		if( trim($_GET['Param1']) != ''){
			$TipoMovi = $_GET["Param1"];	#Tipo de Movimiento 
			$ConsBusq = $_GET["Param2"];	#COINCIDENCIA CON LA BD  
		}

		//----------------------------------------------------------- 
		//Datos del Layer
		$InstSql =  "SELECT LTitulo,LDescripcion,". 
						   "LFechPublI,LFechPublF,".
						   "LAbrirLiDoIm,LLiga,LVentRefe ".
					"FROM  stlayers ".				
					"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
						"LEjercicio = '".$EjerTrab."' AND ".
						"LTipoDocu = '".$TipoDocu."' AND ". 
						"LConsecut = ".$ConsBusq." ";
		if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
		$ResuSql = $ConeBase->prepare($InstSql);
		$ResuSql->execute();
		$ListLaye = $ResuSql->fetch();
		
		$VC03 = "";  $VC04 = ""; 
		$VC05 = "";  $VC06 = "";
		$VC07 = "N"; $VC08 = ""; $VC09 = "N";
		if ($ListLaye)
		 { $VC03 = $ListLaye[0];	//LTitulo
		   $VC04 = $ListLaye[1];	//LDescripcion
		   $VC05 = $ListLaye[2];	//LFechPublI
		   $VC06 = $ListLaye[3];	//LFechPublF
		   $VC07 = $ListLaye[4];	//LAbrirLiDoIm
		   $VC08 = $ListLaye[5];	//LLiga
		   $VC09 = $ListLaye[6];	//LVentRefe
		}
			
		//-----------------------------------------------------------  	
		//Archivo a mostrar  
		$AbrirN = ""; $AbrirI = ""; $AbrirL = ""; $AbrirP = ""; 	
		switch( $VC07  ){
			case "N":	$AbrirN = "checked";	break;	//No Mostra nadfa
			case "I":	$AbrirI = "checked";	break;	//Imagen
			case "L":	$AbrirL = "checked";	break;	//Referencia
			case "P":	$AbrirP = "checked";	break;	//Archivo pdf
		}

		//-----------------------------------------------------------  	
		//Archivo el archio en ventana o  
		$MostraN = ""; $MostraV = ""; $MostraP = ""; 	
		switch( $VC09  ){
			case "N":	$MostraN = "checked";	break;	//No Mostra nadfa
			case "V":	$MostraV = "checked";	break;	//Ventana
			case "P":	$MostraP = "checked";	break;	//Pagina princial
		}
		
		$MesnTiMo = "";
		switch( $TipoMovi ){
			case "A":	$MesnTiMo = "Registrar";  break;
			case "M":	$MesnTiMo = "Actualizar"; break;
			case "B":	$MesnTiMo = "Eliminar";   break;
		}
		?>
	
		<!--encabezado-->
		<header> 
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
		</header>
		<br>
		<!--formulario de Actualizacion-->
		<div class="principal">
			<h1><?=$DescTiSe?></h1>
			<form method="post" name="formulario" onsubmit="return validar(this)">
				<!-- opciones de crud-->
				<input type="hidden" name="C01" value="<?=$TipoMovi?>">
				<input type="hidden" name="C02" value="<?=$ConsBusq?>">
				<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
				<table >
					<tr>
						<th>Titulo</th>
						<td><input type="text" name="C03" value="<?=$VC03?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Descripción</td>
						<td><input type="text" name="C04" placeholder="Digitar Descripcion" value="<?=$VC04?>" onkeyup="checaMensaje(this.value)">
						</td>
					</tr>
					<tr>
						<th>Inicio de Publicacion</td>
						<td><input type="date" name="C05" value="<?=$VC05?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Termino de Publicacion</td>
						<td><input type="date" name="C06" value="<?=$VC06?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>

					<tr>
						<th>Abrir</td>
						<td>
						    <input type="checkbox" name="C07" value="N" <?=$AbrirN?>> Nada  
						    &nbsp;&nbsp; 
							<input type="checkbox" name="C07" value="I" <?=$AbrirI?>> Imagen
							&nbsp;&nbsp;
							<input type="checkbox" name="C07" value="L" <?=$AbrirL?>> Liga
							&nbsp;&nbsp;
							<input type="checkbox" name="C07" value="P" <?=$AbrirP?>> Pdf
						</td>
					</tr>
					<tr>
						<th>Liga</td>
						<td><input type="text" name="C08" value="<?=$VC08?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>
					<tr>
						<th>Mostra </td>
						<td>
						    <input type="checkbox" name="C09" value="N" <?=$MostraN?>> Nada  
						    &nbsp;&nbsp; 
							<input type="checkbox" name="C09" value="V" <?=$MostraV?>> Ventana
							&nbsp;&nbsp;
							<input type="checkbox" name="C09" value="P" <?=$MostraP?>> Paguina
						</td>
					</tr>					
				</table>
				<!--mensaje de validacion-->
				<div id="mensaje1" class="errores">Campos vacios!</div>
				<!--fin de mensajes de validacion-->
				<div class="botones">
					<a href="LayNotTriList.php" name="cancelar" class="cancelar">Cancelar</a>
					<input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" >
				</div>
			</form>
		</div>
		<?php
			}
		?>	
		<!-- script de validacion-->
		<script src="../../Archivos/JS/FacdeAreVali.js"></script>
	</body>
</html>