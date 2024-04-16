<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Encabezado/EstiIntr.css">
</head>
<script language="JavaScript" src="PWRegistro.js"></script>
<body>
<header>
  <?php 
   //Varibales Globales
   include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
   //Encabezado	
   require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaPrin.php'); 
  ?> 
 </header>
<?php
$CRUD = "GET";
include 'PWRegistroApi.php';
?>	
<!--encabezado-->
<table class="ListInfo">
  <tr>
	<td>
	 <?php //Catalogo de Ejercicio
	    	$DatoList = "01";
			include ('PWRegistroListA.php');
			 ?>
	</td>
	<td colspan="13">
	<?php //Catalogo de Ejercicio
	    	$DatoList = "02";
			include ('PWRegistroListA.php'); ?>	
	</td>
	<td></td>
	<td>
		<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>
	</td>
  </tr>
  <tr>
    <th>Titulo</th>
    <th>Descripción</th>
    <th>Inic Publ </th>
    <th>Term Publ </th>
    <th>Conc Publ</th>
    <th colspan="2">
	  Img Pagina
	  <a href="javascript:window.open('PWAyuda.php?Ayuda01=S','','width=500,height=300,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
	  <img src="/Intranet/Paginaweb/Imagen/BtnInfo01.jpg" Title="Subir" width="25px" height="25px"/>
	</th>
	<th colspan="3">
	  Doc Mostrar
	  <a href="javascript:window.open('PWAyuda.php?Ayuda02=S','','width=500,height=600,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
	  <img src="/Intranet/Paginaweb/Imagen/BtnInfo02.jpg" Title="Subir" width="25px" height="25px"/>
	</th>
	<th>
	Vis. Inf.
	<a href="javascript:window.open('PWAyuda.php?Ayuda03=S','','width=500,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
	  <img src="/Intranet/Paginaweb/Imagen/BtnInfo03.jpg" Title="Subir" width="25px" height="25px"/>
    </th>
	<th colspan="3">Edo Seg</th>
	<th></th>
	<th></th>
  </tr>
  <?php 
	foreach ($ResuSql as $RegiTabl):
		$DatoList = "03"; 
		include ('PWRegistroListA.php'); 	
	?>
  <tr>
    <td><?=$VC06?></td>
    <td><?=$VC07?></td>
    <td><?=$VC08?></td>
    <td><?=$VC09?></td>
    <td><?=$VC10?></td>
	<!--Subrie Imagen de la paguina -->
    <td>
	  <?php if ($VC19 == "01") { ?>	
	  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'I')">
	  <img src="/Intranet/Paginaweb/Imagen/BtnSubiImag.jpg" 
	  	   title="Subir Imagen de la Pagina"  width="25px" height="25px"/></a>
	  <?php  } ?> 	   
	</td>
	<!-- Ver Imagen de la paguina -->
	<td>
	  <?php if ( $VC11 != "" ) { ?> 
	    <a href="javascript:window.open('<?=$RutaArch.$VC11?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
		<img src="/Intranet/Paginaweb/Imagen/BtnVisuImag.jpg"  width="25px"
  height="25px"/> </a> 
	  <?php  } ?>
	</td>
	<!-- Documento a mostrar :Img, Archivo, Liga-->
	<td>
	  <img src="/Intranet/Paginaweb/Imagen/BtnTipo<?=$VC12?>.png" width="25px"
  height="25px" title="<?=$DocuMost?>"/>	
	</td>
	<td>
	<?php if ( $VC13 != "" && $VC19 == "01" ) { ?> 
	  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'<?=$VC12?>')">
	  <img src="/Intranet/Paginaweb/Imagen/BtnSubiImag.jpg" Title="Subir <?=$DocuMost?>" width="25px"
  height="25px"/>
      </a>
	 <?php } ?>	
	</td>	
	<td>
	 <?php if ( $VC13 != '' ) { ?> 
	    <a href="javascript:window.open('<?=$RutaArch.$VC13?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
		<img src="/Intranet/Paginaweb/Imagen/BtnVisuImag.jpg"  width="25px"
  height="25px"/> </a> 
	  <?php  } ?>
	</td>
	<!-- Documento se Visualiza la Img, Archivo, Liga-->
	<td>
	  <img src="/Intranet/Paginaweb/Imagen/BtnMost<?=$VC15?>.png" width="25px"
  height="25px" title="<?=$DondAbri?>"/>
	</td>
	<!-- iconos de los Estado -->
	<td>
	<?php 
		$BotoSegi="01";
		$DescSegi="Creacion";
		switch($VC19)
			{ case "01": $BotoSegi="01"; $DescSegi="Creacion";					break;
			  case "02": $BotoSegi="02"; $DescSegi="Envio a Com Social";		break;	
			  case "03": $BotoSegi="04"; $DescSegi="Recepcin de Com Social";	break;	
			  case "04": $BotoSegi="05"; $DescSegi="Asignar SP ";				break;	
			  case "05": $BotoSegi="06"; $DescSegi="Enviar a Analisis";			break;	
			  case "06": $BotoSegi="06"; $DescSegi="Recibir para su Analisis";	break;	
			  case "07": $BotoSegi="07"; $DescSegi="Analisis";					break;	
			  case "08": $BotoSegi="08"; $DescSegi="Publicacion"; 				break;
			  case "09": $BotoSegi="09"; $DescSegi="Cierre"; 					break;		  	
			 }
		?>
		<img src="/Intranet/PaginaWeb/Imagen/EstaSegu<?=$BotoSegi?>.gif" 
						Title="<?=$DescSegi?>" witch="35px" height = "35px"/>
			  
	</td>
	<td><?=$VC19?></td>
	<td><?=$DescSegi?></td>

	<!-- iconos dentro de la libreria font-awesome.min.css -->
	<td data-titulo="Eliminar: " >
	  <?php if($Baja == "A" && ($VC19 == '01' ) ) { //&& ($VC19 > '01' && $VC19 < '06') ?>
			<button class='Elim' data-id='<?= $VC03?>' data-edo='<?= $VC19?>' 
			style="cursor: pointer; background-color:#820000 ; border-color:blue; color:white; border-radius: 8px;" 
			class="flex-1 shadow-2xl bg-gray-800 text-white flex justify-center gap-2 items-center p-3 focus:bg-red-500"
			onMouseOver="this.style.background='#E21313';" onMouseOut="this.style.background = '#820000 ';"
			> Eliminar </button>
	  <?php } ?>
	</td>
	<td data-titulo="Editar: ">
		<?php if($Modi == "A" ){ //&& ($VC19 > '01' && $VC19 < '06' )?>
			<button class='Modi' data-id='<?= $VC03?>' data-edo='<?= $VC19?>'
			style="cursor: pointer; background-color:#EB6320; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#FF8000';" onMouseOut="this.style.background = '#EB6320';">
			
			 Modificar </button></a>
		<?php } ?>
	</td>
  </tr>
  <?php	endforeach; ?> 
</table>
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/PiePagi.php'); 
?>
</body>
</html>