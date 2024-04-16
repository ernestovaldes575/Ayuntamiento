<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Encabezado/EstiIntr.css">
</head>
<script language="JavaScript" src="SupeUnidRegi.js"></script>
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
	include 'SupeUnidRegiApi.php';
?>	
<br>
<table class="ListInfo">
  <thead>
	<tr>
		<th width="34">Titulo</th>
		<th width="72">Descripcion</th>
		<th width="31"><span class="botones"><a href="/Intranet/menuintranet.php" class="regresar">Regresar</a></span></th>		
	</tr>
  </thead>
  <tbody>
  <?php 
	foreach ($UnidSupe as $RegiTabl): 
 			 $VC03=$RegiTabl[0];		//SUnidad, , 
			 $VC04=$RegiTabl[1];		//CUNClaveUnidad,
			 $VC05=$RegiTabl[2];		//CUNDescripcion,
	?>
	<tr>
		<td><?=$VC04?></td>				<!--Cambiar-->
		<td><?=$VC05?></td>
		<td>
		<?php if($Baja == "A" ){ ?>
			<button class='Elim' data-id='<?= $VC03?>'
			style="cursor: pointer; background-color:#820000 ; border-color:blue; color:white; border-radius: 8px;" 
			class="flex-1 shadow-2xl bg-gray-800 text-white flex justify-center gap-2 items-center p-3 focus:bg-red-500"
			onMouseOver="this.style.background='#E21313';" onMouseOut="this.style.background = '#820000 ';"
			>
		  -Borrar</a>		
		<?php } ?>
        </td>				
	</tr>
	<?php endforeach ?>
  </tbody>
</table>
<br>
<table class="ListInfo">
  <thead>
	<tr>
		<th width="34">Titulo</th>
		<th width="72">Descripcion</th>
		<th width="31">&nbsp;</th>
	</tr>
  </thead>
  <tbody>
	<?php 
	foreach ($CataUnid as $RegiTabl): 
		    $VC03=$RegiTabl[0];		//CUNConsecutivo
			$VC04=$RegiTabl[1];		//CUNClaveUnidad
			$VC05=$RegiTabl[2];		//CUNDescripcion
	?>
	<tr>
		<td><?=$VC04?></td>				<!--Cambiar-->
		<td><?=$VC05?></td>
		<td>
		 <?php if($Baja == "A"  ){ ?>
			<button class='Nuev' data-id='<?= $VC03?>' 
			style="cursor: pointer; background-color:#40826D; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#49B675';" onMouseOut="this.style.background = '#40826D ';">
		  +Agregar</a>	
		  <?php } ?>		
		</td>				
	</tr>
	<?php endforeach ?>
  </tbody>
</table>
</body>
</html>