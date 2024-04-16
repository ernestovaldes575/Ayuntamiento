<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Encabezado/EstiIntr.css">
</head>
<body>
<script language="JavaScript" src="SuperviDepe.js"></script>	
<header>
<?php 
  //Varibales Globales
  include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaCook.php');
  //Encabezado	
  require_once($_SERVER['DOCUMENT_ROOT'].'/Intranet/Encabezado/EncaPrin.php'); 
  ?> 
 </header> 
<?php	
include 'SuperviDepeApi.php';
?>	
<br>
<table class="ListInfo">
	<thead>
		<tr>
			<td width="35">Clave</td>				<!--Cambiar-->
			<td width="138">Descripcion</td>		<!--Cambiar-->
			<td width="79">
				<button class='Regr' 
				style="cursor: pointer; background-color:#EB6320; border-color:blue; color:white; border-radius: 5px;" 
				class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
				onMouseOver="this.style.background='#FF8000';" onMouseOut="this.style.background = '#EB6320';">Regresar</button>
			</td>	<!--Cambiar-->
		</tr>
	</thead>
	<tbody>
	<?php 
		foreach ($UnidSupe as $RegiTabl): 
		    $VC03=$RegiTabl[0];		//SUnidad
			$VC04=$RegiTabl[1];		//CUNClaveUnidad
			$VC05=$RegiTabl[2];		//CUNDescripcion
				?>
		<tr>
			<td><?=$VC04?></td>				<!--Cambiar-->
			<td><?=$VC05?></td>				<!--Cambiar-->
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