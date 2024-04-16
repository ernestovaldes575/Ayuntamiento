<!DOCTYPE html>
<html lang="es">
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Facultades de área</title>
	<link rel="stylesheet" type="text/css" href="/Intranet/Encabezado/EstiIntr.css">
</head>
<script language="JavaScript" src="FacdeAreaCons.js"></script>
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
if ( isset($_GET["Param1"]) ){
	 $EjerTrab = $_GET["Param1"];
	 $ArCooki3 = $ConsUsua.'|'.$ClavAyun.'|'.$DescAyun.'|'.$ConsUnid.'|'.$DescUnid.'|'.$EjerTrab.'|';
	 setcookie("CEncaMae", "$ArCooki3");
 }

$CRUT = "GET";
include 'FacdeAreaApi.php';

?>	

<br>
<table class="tabla">
  <thead>
	<tr>
	  <th>
		<select name="AAreaResp" onChange="CargaEjercicio(this.value)" class="AAreaResp">
		  <?php foreach($CataEjer as $RegiTabl): 
				  $ClavCata = $RegiTabl['CEJClave'];		
				  $DescCata = $RegiTabl['CEJDescripcion'];  
				  $Activo =  ( $ClavCata == $EjerTrab) ? "selected"  : ""; ?>
				  <option value="<?=$ClavCata?>" <?=$Activo?>> <?=$ClavCata?> </option>
		  <?php endforeach; ?>
		</select>
	  </th>
	  <th colspan="3"><h2>Facultades de Área</h2></th>
	  <th colspan="2">
		<a href="/Intranet/menuintranet.php" class="regresar">Regresar</a>
	  </th>	
	</tr>

	<tr>
	  <td></td>			<!--Cambiar-->
	  <td>Fecha Termino</td>			<!--Cambiar-->
	  <td>Area</td>					<!--Cambiar-->
	  <td>Denominacion</td>			<!--Cambiar-->
	  <td colspan="2">
		<?php if($Alta == "A") { ?>
				<button data-id='0' 
			style="cursor: pointer; background-color:#40826D; border-color:blue; color:white; border-radius: 5px;" 
			class="flex-1 shadow-2xl transition-all opacity-50 bg-green-500 text-white flex justify-center gap-2 items-center p-3 focus:bg-black"
			onMouseOver="this.style.background='#49B675';" onMouseOut="this.style.background = '#40826D ';">
		  +Nuevo</a> 			
		<?php } ?> </td>
	  </tr>
	</thead>
	<tbody>
	  <?php 
		foreach ($ResuSql as $RegiTabl): 
		    $VC03=$RegiTabl['AConsecutivo'];	//Cambiar
		    $VC04=$RegiTabl['AFechaInicio'];	//Cambiar
		    $VC05=$RegiTabl['AFechaTermino'];	//Cambiar
		    $VC06=$RegiTabl['AArea'];			//Cambiar
		    $VC07=$RegiTabl['ADenominacion'];	//Cambiar ?>
	  <tr>
		<td><?=$VC04?></td>				<!--Cambiar-->
		<td><?=$VC05?></td>				<!--Cambiar-->
		<td><?=$VC06?></td>				<!--Cambiar-->
		<td><?=$VC07?></td>				<!--Cambiar-->
				 
		<!-- iconos dentro de la libreria font-awesome.min.css -->
		<td data-titulo="Eliminar: ">
		  <?php if ($Baja == "A") { ?>
				  <button class='Elim' CampRefe='<?= $VC03?>' 
					style="cursor: pointer; background-color:#820000 ; border-color:blue; color:white; border-radius: 8px;" 
					class="flex-1 shadow-2xl bg-gray-800 text-white flex justify-center gap-2 items-center p-3 focus:bg-red-500"
					onMouseOver="this.style.background='#E21313';" onMouseOut="this.style.background = '#820000 ';"> Eliminar </button>
		  <?php } ?>
		</td>
		<td data-titulo="Editar: ">
		  <?php if ($Modi == "A") { ?>
				  <button class='Modi' class="BotoModi" CampRefe='<?= $VC03?>'>
			 	  Modificar </button></a>
		  <?php } ?>
		</td>
	  </tr>
	  <?php endforeach ?>
	</tbody>
</table>
</body>
</html>