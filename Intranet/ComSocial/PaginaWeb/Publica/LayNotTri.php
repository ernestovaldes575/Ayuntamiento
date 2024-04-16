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

	if(isset($_POST['Enviar'])){ 
		$BandMens = false;

		$TipoMovi = $_POST['C01'];
		$ConsBusq = $_POST['C02']; 
		$EstaSegu = $_POST['C03']; 
		$Publicac = $_POST['C04']; 
		$FechPubl = $_POST['C05'];

		$ActuEsta = ( $Publicac == "A") ? "P":"R";
		//Modificacion
		$InstSql = "UPDATE stlayers ". 
				   "SET LEstaSegu = '".$ActuEsta."',".
					   "LPublicacion = '".$Publicac."',".
					   "LFechPubl = '".$FechPubl."', ".
					   "LSerPubAuto = '".$ConsUsua."', ". 
					   "LFechAuto= date(now()) ".
				   "WHERE LAyuntamiento = '".$ClavAyun."' AND ".
						 "LEjercicio = '".$EjerTrab."' AND ".
						 "LTipoDocu = '".$TipoDocu."' AND ". 
						 "LConsecut = ".$ConsBusq." ";
		if ($BandMens)  echo '1)'.$InstSql.'<br>';	
		$ResuSql = $ConeBase->prepare($InstSql);
		$ResuSql->execute();

		$MensResp = "Algo ha fallado!!!";
		if ($ResuSql) 
			$MensResp = "Registro actualizado correctamente";
		
		echo '<script>alert("'.$MensResp.'");</script>';
		$ResuSql->closeCursor();

		$PagiRegr = "location: LayNotTriList.php";
		if ( !$BandMens ) header($PagiRegr);
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

		//Datos del Layer
		$InstSql =  "SELECT LEjercicio, LMesRegi,". 
						   "LTitulo,LDescripcion,LFechPublI,LFechPublF,".
						   "LAbrirLiDoIm, LVentRefe,".
						   "LLiga, LArchDocu, LImagColo, ctdcarpeta, ".
						   "LPublicacion, LFechPubl, LEstaSegu ".
					"FROM  stlayers ".
					"INNER JOIN sctipodocu ON ctdClave = LTipoDocu ".				
					"WHERE LAyuntamiento = '".$ClavAyun."' AND ".
						  "LEjercicio = '".$EjerTrab."' AND ".
						  "LTipoDocu = '".$TipoDocu."' AND ". 
						  "LConsecut = ".$ConsBusq." ";
		if ($BandMens)  echo '1)'.$InstSql.'<br>'; 
		$ResuSql = $ConeBase->prepare($InstSql);
		$ResuSql->execute();
		$ListLaye = $ResuSql->fetch();
		
		$VC03 = "";  $VC04 = ""; 
		$VC05 = "";  $VC06 = "";$VC07 = "";  $VC08 = "";

		$VC09 = "N"; $VC10 = "N"; 
		$VC11 = "";  $VC12 = ""; $VC13 = ""; $VC14 = "";
		
		$VC15 = "N"; $VC16 = ""; $VC17 = "R"; 
		if ($ListLaye)
		 { $VC03 = $ListLaye[0];	//LEjercicio
		   $VC04 = $ListLaye[1];	//LMesRegi

		   $VC05 = $ListLaye[2];	//LTitulo
		   $VC06 = $ListLaye[3];	//LDescripcion
		   $VC07 = $ListLaye[4];	//LFechPublI
		   $VC08 = $ListLaye[5];	//LFechPublF
		   $VC09 = $ListLaye[6];	//LAbrirLiDoIm
		   $VC10 = $ListLaye[7];	//LVentRefe
		   $VC11 = $ListLaye[8];	//LLiga
		   $VC12 = $ListLaye[9];	//LArchDocu
		   $VC13 = $ListLaye[10];	//LImagColo
		   $VC14 = $ListLaye[11];	//ctdcarpeta
		   
		   $VC15 = $ListLaye[12];	//LPublicacion
		   $VC16 = $ListLaye[13];	//LFechPubl
		   $VC17 = $ListLaye[14];	//LEstaSegu		
		}

		//-----------------------------------------------------------  	
		//Documento a abrir	
		$ArchAbri = "";
		$AbrLiDoI = "Sin documento";
		switch( $VC09 ) {
			case "N": //Sin documento
					  $ArchAbri = "#";
					  $AbrLiDoI = "Sin documento";	
					  break;
			case "I": //Imagen
					  $ArchAbri = $VC13;
					  $AbrLiDoI = "Imagen";			
					  break;
			case "L": //Liga
					  $ArchAbri = $VC11;
					  $AbrLiDoI = "Liga";			
					  break; 
			case "P": //archivo pdf
					  $ArchAbri = $VC12;
				 	  $AbrLiDoI = "Documento";		
					  break;
		}
		$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/PaguWeb/'. 
					$VC03.'/'.$VC14.'/'.$ArchAbri;

		//-----------------------------------------------------------  	
		//Donde se abre el documento
		$FormAbri = "Sin documento";
		switch( $VC10 ) {
			case "N": $FormAbri = "Sin documento";	break;
			case "V": $FormAbri = "Ventana";		break;
			case "R": $FormAbri = "Referencia";		break; 
		}	

		//Publicar 	
		$PublDocA= ( $VC15 == "A") ? "checked" : "";	//Activo 
		$PublDocI= ( $VC15 == "I") ? "checked" : ""; 	//Inactivo
		?>
	
		<!--encabezado-->
		<header> 
			<?php require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/header.php'); ?> 
		</header>
		<br>
		<!--formulario de Actualizacion-->
		<div class="principal">
			<h1>Revision de <?=$DescTiSe?></h1>
			<form method="post" name="formulario" onsubmit="return validar(this)">
				<!-- opciones de crud-->
				<input type="hidden" name="C01" value="<?=$TipoMovi?>">
				<input type="hidden" name="C02" value="<?=$ConsBusq?>">
				<input type="hidden" name="C03" value="<?=$VC17?>">
				<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
				<table >
					<tr>
						<th>Titulo</th>
						<td><?=$VC03?></td>
					</tr>
					<tr>
						<th>Descripción</td>
						<td><?=$VC04?></td>
					</tr>
					<tr>
						<th>Inicio de publicación</td>
						<td><?=$VC05?></td>
					</tr>
					<tr>
						<th>Termino de publicación</td>
						<td><?=$VC06?></td>
					</tr>	
					<tr>
						<th>Documento abrir <?=$VC09?></td>
						<td><?=$AbrLiDoI?> 
						<a href="javascript:window.open('<?=$RutaArch?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
					     img </a> 
					    </td>
					</tr>	
					<tr>
						<th>Forma de abrir <?=$VC10?></td>
						<td><?=$FormAbri?></td>
					</tr>	
					<tr>
						<th>Publicación</td>
						<td>
							<input type="checkbox" name="C04" value="A" <?=$PublDocA?>> Si
							&nbsp;&nbsp;
							<input type="checkbox" name="C04" value="I" <?=$PublDocI?>> No

						</td>
					</tr>

					<tr>
						<th>Fecha Autorizacion </td>
						<td><input type="date" name="C05" value="<?=$VC16?>" onkeyup="checaMensaje(this.value)"></td>
					</tr>

				</table>
				<!--mensaje de validacion-->
				<div id="mensaje1" class="errores">Campos vacios!</div>
				<!--fin de mensajes de validacion-->
				<div class="botones">
					<a href="LayNotTriList.php" name="cancelar" class="cancelar">Regresar</a>
					<input type="submit" name="Enviar" class="registrar" value="Modicar" >
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