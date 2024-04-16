<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Encabezado/EstiIntr.css">
</head>
<script language="JavaScript" >
function CargImag(Param1)
{ Ruta = "ImgPagSubiArch.php?Param1="+Param1; 
  Dime = "width=450 height=350 top=10 left=10 scrollbars";
  Cata = window.open(Ruta,"Carga documento",Dime);
}
</script>
<body> 
 <header>
  <?php 
   //Varibales Globales
   include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
   //Encabezado	
   require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaPrin.php'); 
   include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Conexion/ConBasComSoc.php');
  ?> 
 </header>
 	
<?php 



//Carga las variables
$ArCooki3 = $_COOKIE['CBusqMae'];
$ABusqMae = explode("|", $ArCooki3);
//echo '$ABusqMae'.$ABusqMae.'<br>';
$TipoDocu = $ABusqMae[0];
$EjerTrab = $ABusqMae[1];

//Bandera de visualizar msg */
$BandMens = false;
if ( isset($_GET["Param0"]) )
	$BandMens = true;

//Carga de la Informacion	
$CRUT = "GET";
include 'ConacClasApi.php';
		
$VC03 = "";  $VC04 = ""; 
$VC05 = "";  $VC06 = "";
if ($ResuSql)
  { $VC03 = $ResuSql[0];	//CNumeCona
	$VC04 = $ResuSql[1];	//CDescDocu
	$VC05 = $ResuSql[2];	//CTDCarpeta
	$VC06 = $ResuSql[3];	//CArchivo
  }
  
  $RutaArch = '/ExpeElectroni/'.$ClavAyun.'/'.$EjerTrab.'/'.$VC05.'/';
		
$MesnTiMo = "";
switch( $TipoMovi ){
	case "A": $MesnTiMo = "Alta";  
			  $CURT = "POST";		  break;
	case "M": $MesnTiMo = "Modificar"; 
			  $CURT = "PUT";		  break;
	case "B": $MesnTiMo = "Eliminar";   
			  $CURT = "DELETE";		  break;
  } ?>
	
<!--encabezado-->
<br>
<!--formulario de Actualizacion-->
		<form method="post" name="formulario" id="formulario" onsubmit="validarFormulario()" action="ConacClasApi.php">
			<h1><?=$DescTiSe?></h1>	
			<!-- opciones de crud-->
			<input type="hidden" name="C00" value="<?=$CURT?>">
			<input type="hidden" name="C01" value="<?=$TipoMovi?>">
			<input type="hidden" name="C02" value="<?=$ConsBusq?>">
			<table width="300" border="1">
			  <tr>
			    <td>&nbsp;</td>
			    <td><span class="botones"><a href="ConacList.php" name="cancelar" class="cancelar">Regresar</a></span></td>
		      </tr>
			  <tr>
			    <td><span class="titulo">Titulo</span></td>
			    <td><span class="titulo">
			      <input type="text" name="C03" 
									value="<?=$VC03?>"
									id="title2" 
									onKeyUp="checaMensaje(this.value)" placeholder="Titulo">
			    </span></td>
		      </tr>
			  <tr>
			    <td><span class="titulo">
                <label for="title">Descripcion</label>
			    </span></td>
			    <td><span class="titulo">
			      <input type="text" name="C04" 
									value="<?=$VC04?>"
									id="title" 
									onKeyUp="checaMensaje(this.value)" placeholder="Titulo">
			    </span></td>
		      </tr>
			  <tr>
			    <td><span class="termino__public">Imagen pagina</span></td>
			    <td><span class="termino__public"><a href="#" onClick="CargImag(<?= $VC03?>)"><img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" title="Subir Imagen de la Pagina"  width="25px" height="25px"/> </a>
                    <!-- Visualizar Image -->
                    <?php if ( $VC06 != '' ) { ?>
                    <a href="javascript:window.open('<?=$RutaArch.$VC06?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0"> <img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px" height="25px"/> </a>
                    <?php  } ?>
                </span></td>
		      </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td>
                 <?php if  ( $TipoMovi == "M" ) { ?>
			      <input type="submit" name="Enviar" value="<?=$MesnTiMo?>" >
                 <?php }	 ?>	 
			   </td>
		      </tr>
	      </table>
		</form>
</body>
</html>