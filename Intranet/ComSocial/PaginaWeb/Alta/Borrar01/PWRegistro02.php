<!DOCTYPE html>
<html lang="es">
<?php include '../../../Includes/Header.php'?>
<script language="JavaScript" src="PWRegistro.js"></script>
<?php 
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');

//Bandera de visualizar msg */

$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//Carga de la Informacion	
$CRUT = "GET";
include 'PWRegistroApi.php';
		
$VC03 = "";  $VC04 = ""; 
$VC05 = "";  $VC06 = "";
$VC07 = "N"; $VC08 = ""; $VC09 = "N";
if ($ResuSql)
  { $VC03 = $ResuSql[0];	//LTitulo
	$VC04 = $ResuSql[1];	//LDescripcion
	$VC05 = $ResuSql[2];	//LFechPublI
	$VC06 = $ResuSql[3];	//LFechPublF
	$VC07 = $ResuSql[4];	//LAbrirLiDoIm
	$VC08 = $ResuSql[5];	//LLiga
	$VC09 = $ResuSql[6];	//LVentRefe

	$VC09 = $ResuSql[6];	//LVentRefe
	$VC09 = $ResuSql[6];	//LVentRefe
	$VC09 = $ResuSql[6];	//LVentRefe
  }
			
//-----------------------------------------------------------  	
//Archivo a mostrar  
$AbrirN = ""; $AbrirI = ""; $AbrirL = ""; $AbrirA = "";
$EjecInst = '$Abrir'.$VC07.'= "checked"; '; 
eval($EjecInst );	

//-----------------------------------------------------------  	
//Archivo el archio en ventana o  
$MostraN = ""; $MostraV = ""; $MostraP = ""; 
$EjecInst = '$Mostra'.$VC09.'= "checked"; '; 
eval($EjecInst );	
		
$MesnTiMo = "";
switch( $TipoMovi ){
	case "A": $MesnTiMo = "Alta";  
			  $CURT = "POST";			  break;
	case "M": $MesnTiMo = "Modificar"; 
			  $CURT = "PUT";			  break;
	case "B": $MesnTiMo = "Eliminar";   
			  $CURT = "DELETE";		  break;
  } ?>
	
<!--encabezado-->
<br>
<!--formulario de Actualizacion-->
<div class="principal">
	<div class="contenedor__formulario">
		<form method="post" name="formulario" onsubmit="return validar(this)" action="PWRegistroApi.php">
			<h1><?=$DescTiSe?></h1>	
			<!-- opciones de crud-->
			<input type="hidden" name="C00" value="<?=$CURT?>">
			<input type="hidden" name="C01" value="<?=$TipoMovi?>">
			<input type="hidden" name="C02" value="<?=$ConsBusq?>">
			<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
			<div class="titulo">
				<label for="title">Titulo</label>
				<input type="text" name="C03" 
									value="<?=$VC03?>"
									id="title" 
									onkeyup="checaMensaje(this.value)" placeholder="Titulo">
			</div>
			<div class="titulo">
				<label for="title">Descripcion</label><input type="text" name="C04" 
									value="<?=$VC04?>"
									id="title" 
									onkeyup="checaMensaje(this.value)" placeholder="Titulo">
			</div>						
			<div class="inicio__public">
				<label for="inicio">Inicio de Publicacion</label>	
				<input type="date" id="inicio" name="C05" 
						value="<?=$VC05?>" 
						onkeyup="checaMensaje(this.value)" size="10px">
			</div>
			<div class="termino__public">
				<label for="termino">Termino de la Publicacion</label>
				<input type="date" name="C06"
								value="<?=$VC06?>"
								id="termino" 
								onkeyup="checaMensaje(this.value)">
			</div>

  			<?php if  ( $TipoMovi == "M" ) { ?>	 
			<div class="termino__public">
				<label for="termino">Imagen Pagina</label> 
				  Doc 
				  Img
			</div>
			<?php }	 ?>	
			<div class="abrir">
				<label for="title">Archivo a mostrar</label>
					<input type="checkbox" name="C07" value="N" <?=$AbrirN?>>Nada&nbsp;&nbsp; 
					<input type="checkbox" name="C07" value="I" <?=$AbrirI?>>Imagen&nbsp;&nbsp;
					<input type="checkbox" name="C07" value="L" <?=$AbrirL?>>Liga&nbsp;&nbsp;
					<input type="checkbox" name="C07" value="A" <?=$AbrirA?>>Pdf
			</div>

			<?php if  ( $TipoMovi == "M" ) { ?>		
			<div class="termino__public">
				<label for="termino">Archivo Mostrar</label>
				Doc
				Img
			</div>
			<?php }	 ?>

			<div class="liga">
				<label for="liga">Liga</label>
				<input type="text" name="C08" 
								value="<?=$VC08?>"
								id="liga" 
								onkeyup="checaMensaje(this.value)" placeholder="Liga">
			</div>
			<div class="mostrar">
			    <label for="title">Donde se va a mostrar</label>
				<input type="checkbox" name="C09" value="N" <?=$MostraN?>> Nada &nbsp;&nbsp; 
				<input type="checkbox" name="C09" value="V" <?=$MostraV?>> Ventana &nbsp;&nbsp;
				<input type="checkbox" name="C09" value="P" <?=$MostraP?>> Pagina
			</div>
					
			<!--mensaje de validacion-->
			<!-- <div id="mensaje1" class="errores">Campos vacios!</div> -->
			<!--fin de mensajes de validacion-->
			<div class="botones">
				<a href="PWRegistroList.php" name="cancelar" class="cancelar">Regresar</a>
				<input type="submit" 
									name="Enviar" 
									class="registrar" 
									value="<?=$MesnTiMo?>" >
			</div>
		</form>
	</div>
</div>
</body>
</html>