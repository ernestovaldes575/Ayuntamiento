<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Encabezado/EstiIntr.css">
</head>
<body>
<script language="JavaScript" src="Supervi.js"></script>	
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
include 'SuperviApi.php';
?>	
<table class="ListInfo">
  <thead>
	<tr>
		<th>No Empleado</th>
		<th>Nombre</th>
		<th>Categoria</th>
		<th>Foto</th>	
		<th>
		 <button class='Nuev'  
			style="cursor: pointer; background-color:#40826D; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#49B675';" onMouseOut="this.style.background = '#40826D ';">
		  +Nuevo
		 </button>  
		</th>	
	</tr>
  </thead>
  <tbody>
	<?php 
	foreach ($ListSupe as $RegiTabl): 
		    $VC03=$RegiTabl[0];		//SConsecut
			$VC04=$RegiTabl[1];		//SNumeEmpl
			$VC05=$RegiTabl[2];		//SServPubli
			$VC06=$RegiTabl[3];		//SCategoria
			$VC07=$RegiTabl[4];		//SFoto
			$RutaArch = '/ExpeElectroni/'.$ClavAyun.'/Supervisor/'.$VC07;
	?>
	<tr>
		<td><?=$VC04?></td>				<!--Cambiar-->
		<td><?=$VC05?></td>				<!--Cambiar-->
		<td><?=$VC06?></td>				<!--Cambiar-->
		<td>
		  <a href="#" onclick="CargImag(<?= $VC03?>)">
		  Doc</a>
		<? if ( $VC10 != "" ) { ?>
		  <a href="javascript:window.open('<?=$RutaArch?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
		  img </a>  
		<? } ?>					
		</td>	
		
		<!-- iconos dentro de la libreria font-awesome.min.css -->
		<td>
		 <?php if($Baja == "A" ){ ?>	
			<button class='Elim' data-id='<?= $VC03?>' 
			style="cursor: pointer; background-color:#820000 ; border-color:blue; color:white; border-radius: 8px;" 
			class="flex-1 shadow-2xl bg-gray-800 text-white flex justify-center gap-2 items-center p-3 focus:bg-red-500"
			onMouseOver="this.style.background='#E21313';" onMouseOut="this.style.background = '#820000 ';"
			> Eliminar </button>
		 <?php } ?>
		</td>
		<td>
		  <?php if($Modi == "A" ){ ?>
			<button class='Modi' data-id='<?= $VC03?>' 
			style="cursor: pointer; background-color:#EB6320; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#FF8000';" onMouseOut="this.style.background = '#EB6320';">			
			 Modificar </button>
		  <?php } ?>
		</td>
	</tr>
	<?php endforeach ?>
  </tbody>
</table>
</body>
</html>