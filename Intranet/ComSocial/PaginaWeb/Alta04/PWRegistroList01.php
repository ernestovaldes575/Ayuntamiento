<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Intranet</title>
	<link rel="shortcut icon" href="Archivos/Img/logoEnc.ico"/>
	<link rel="stylesheet" href="/Intranet/Estilos/Header.css">
</head>
<style>
  .tb { border-collapse: collapse; width:300px; }
  .tb th, .tb td { padding: 5px; border: solid 1px #777; }
  .tb th { background-color: lightblue; }
</style>
<script language="JavaScript" src="PWRegistro01.js"></script>
<body>
	<header class="header">
		<img class="img-1" src="http://201.122.44.34/img/SIMGA_intra01.png" alt="">
		<img class="img-2" src="http://201.122.44.34/img/SIMGA02.png" alt="">
	</header>
<?php
$CRUD = "GET";
include 'PWRegistroApi.php';
?>	
<!--encabezado-->
<table class="tb">
  <tr>
	<td>
		<select name="AAreaResp" onChange="CargEjer(this.value)">
			<?php 
				foreach($CataEjer as $RegiTabl): 
					$ClavCata = $RegiTabl[0];		
					$DescCata = $RegiTabl[1];  
					$Activo = ( $ClavCata == $EjerTrab) ? "selected" : ""; 
			?>
			<option value="<?=$ClavCata?>" <?=$Activo?>> <?=$ClavCata?> </option>
			<?php	
				endforeach;
			?>
		</select>
	</td>
	<td colspan="13">
	<select name="EstaDocu" onChange="CargEsta(this.value)">
			<?php 
				foreach($CataEsta as $RegiTabl): 
					$ClavCata = $RegiTabl[0];		
					$DescCata = $RegiTabl[1];  
					$Activo = ( $ClavCata == $EstaRevi) ? "selected" : ""; 
			?>
			<option value="<?=$ClavCata?>" <?=$Activo?>> 
			  <?=$ClavCata?> <?=$DescCata?> </option>
			<?php	
				endforeach;
			?>
		</select>
	</td>
	<td>
	<?php 
		if ($Alta == "A"){ ?>
		  <button class='Nuev' data-id='0' 
			style="cursor: pointer; background-color:#40826D; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#49B675';" onMouseOut="this.style.background = '#40826D ';">
		  +Nuevo</a>
	<?php } ?>	
	</td>
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
	  <img src="/Intranet/ComSocial/Imagen/BtnInfo01.jpg" Title="Subir" width="25px" height="25px"/>
	</th>
	<th colspan="3">
	  Doc Mostrar
	  <a href="javascript:window.open('PWAyuda.php?Ayuda02=S','','width=500,height=600,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
	  <img src="/Intranet/ComSocial/Imagen/BtnInfo02.jpg" Title="Subir" width="25px" height="25px"/>
	</th>
	<th>
	Vis. Inf.
	<a href="javascript:window.open('PWAyuda.php?Ayuda03=S','','width=500,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
	  <img src="/Intranet/ComSocial/Imagen/BtnInfo03.jpg" Title="Subir" width="25px" height="25px"/>
    </th>
	<th>Crea</th>
	<th>Rev</th>
	<th>Pub</th>
	<th></th>
	<th></th>
  </tr>
  <?php 
	foreach ($ResuSql as $RegiTabl): 
		$VC03=$RegiTabl[0];		//LConsecut,
		$VC04=$RegiTabl[1];		//LEjercicio,
		$VC05=$RegiTabl[2];		//LMesRegi

		$VC06=$RegiTabl[3];		//LTitulo
		$VC07=$RegiTabl[4];		//LDescripcion,

		$VC08=$RegiTabl[5];		//LFechPublI,
	    $VC09=$RegiTabl[6];		//LFechPublF,
	    $VC10=$RegiTabl[7];		//LFechaCier

		$VC11=$RegiTabl[8];		//LEstaSegu

		$VC12=$RegiTabl[9];		//LImagen
	    $VC13=$RegiTabl[10];	//LAbrirLiDoIm
	    $VC14=$RegiTabl[11];	//LAImagDocu
		$VC15=$RegiTabl[12];	//LLiga

		$VC16=$RegiTabl[13];	//LVentRefe
		$VC17=$RegiTabl[14];	//CTDCarpeta

		//Creacion	
		$EC18 = "01"; $DC18= "Creacion"; 
		$VC18 = $RegiTabl[15];	//Esta Revi
		switch ($VC18 )
		 { case "C": $EC18="01"; $DC18= "Creacion"; break; //Creacion
		   case "E": $EC18="02"; $DC18= "Envio"; break;//Envio
		}
		
		//Revision
		$EC19 = "03"; $DC19="Pendiente";
		$VC19=$RegiTabl[16];	//EstaAuto
		switch ($VC19 )
		 { case "P": $EC19="03"; $DC19="Pendiente"; break;	//Pendiente
		   case "R": $EC19="04"; $DC19="Recepcion"; break;	//Recepcion 
		   case "A": $EC19="05"; $DC19="Asiganar SP"; break;	//Asinacion a SP 
		}

		//Publicacion
		$EC20 = "06"; $DC20="Pendiente";
		$VC20=$RegiTabl[17];	//Esta Publi
		switch ($VC20 )
		 { case "P": $EC20="06"; $DC20="Pendiente"; break; //Pendiente
		   case "A": $EC20="07"; $DC20="Analisis"; break; //Analisi
		   case "U": $EC20="08"; $DC20="Publicacion"; break; //Publicacion
		}

		$VC21=$RegiTabl[18];	//Esta Seguimiento

		//Mostrar documento
		$DocuMost = ""; $BanDocMo=0;
		switch( $VC13  ){
			case "N": $DocuMost = "No Mostrar";	break;
			case "I": $DocuMost = "Imagen";		$BanDocMo=1;	break;
			case "L": $DocuMost = "Liga";		break;
			case "A": $DocuMost = "Archivo";	$BanDocMo=1;	break;
			}

		//echo "Valor".$BanDocMo."<br>";
		//-----------------------------------------------------------  	
		//Donde se va a mostrar
		$DondAbri = ""; 
		switch( $VC16 ){
			case "N": $DondAbri = "No Mostra";	break;
			case "V": $DondAbri = "Ventana";	break;
			case "P": $DondAbri = "Pagina";		break;
			}
		$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/PaguWeb/'.$EjerTrab.'/'.$VC17.'/';
	?>

  <tr>
    <td><?=$VC06?></td>
    <td><?=$VC07?></td>
    <td><?=$VC08?></td>
    <td><?=$VC09?></td>
    <td><?=$VC10?></td>
	<!-- Imagen de la paguina -->
    <td>
	  <?php if ($VC18 == "C") { ?>	
	  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'I')">
	  <img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" 
	  	   title="Subir Imagen de la Pagina"  width="25px" height="25px"/></a>
	  <?php  } ?> 	   
	</td>
	<td>
	  <?php if ( $VC12 != '' ) { ?> 
	    <a href="javascript:window.open('<?=$RutaArch.$VC12?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
		<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px"
  height="25px"/> </a> 
	  <?php  } ?>
	</td>
	<!-- Documento a Visualiza Img, Liga Archivo-->
	<td>
	  <img src="/Intranet/ComSocial/Imagen/BtnTipo<?=$VC13?>.png" width="25px"
  height="25px" title="Documento a Mostrar: <?=$DocuMost?>"/>	
	</td>
	<td>
	<?php if ( $VC13 != 'N' ) { ?> 
	  <a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'<?=$VC13?>')">
	  <img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" Title="Subir <?=$DocuMost?>" width="25px"
  height="25px"/>
      </a>
	 <?php } ?>	
	</td>	
	<td>
	 <?php if ( $VC13 != 'N'  && $VC14 != '' ) { ?> 
	    <a href="javascript:window.open('<?=$RutaArch.$VC14?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
		<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px"
  height="25px"/> </a> 
	  <?php  } ?>
	</td>
	<!-- como se Visualiza -->
	<td>
	  <img src="/Intranet/ComSocial/Imagen/BtnMost<?=$VC16?>.png" width="25px"
  height="25px" title="Mostrar en: <?=$DondAbri?>"/>
	</td>
	<!-- iconos de los Estado -->
	<td><img src="/Intranet/ComSocial/Imagen/EstaSegu<?=$EC18?>.gif" 
	  	   title="<?=$DC18?>"  width="20px" height="20px"/></td>
	<td><img src="/Intranet/ComSocial/Imagen/EstaSegu<?=$EC19?>.gif" 
	  	   title="<?=$DC19?>"  width="20px" height="20px"/></td>
	<td><img src="/Intranet/ComSocial/Imagen/EstaSegu<?=$EC20?>.gif" 
	  	   title="<?=$DC20?>"  width="20px" height="20px"/>

	</td>
	<!-- iconos dentro de la libreria font-awesome.min.css -->
	<td data-titulo="Eliminar: " >
	  <?php if($Baja == "A" && $VC21 == "01" ){ ?>
			<button class='Elim' data-id='<?= $VC03?>' 
			style="cursor: pointer; background-color:#820000 ; border-color:blue; color:white; border-radius: 8px;" 
			class="flex-1 shadow-2xl bg-gray-800 text-white flex justify-center gap-2 items-center p-3 focus:bg-red-500"
			onMouseOver="this.style.background='#E21313';" onMouseOut="this.style.background = '#820000 ';"
			> Eliminar </button>
	  <?php } ?>
	</td>
	<td data-titulo="Editar: ">
		<?php if($Modi == "A"  && $VC21 == "01"){ ?>
			<button class='Modi' data-id='<?= $VC03?>' 
			style="cursor: pointer; background-color:#EB6320; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#FF8000';" onMouseOut="this.style.background = '#EB6320';">
			
			 Modificar </button></a>
		<?php } ?>
	</td>
  </tr>
  <?php	endforeach; ?> 
</table>
</body>
</html>