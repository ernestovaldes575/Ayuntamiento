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
//Carga de la Informacion	
$CRUD = "GET";
include 'PWRegistroApi.php';
echo "Valor CRUD: $CRUD ";
?>
<form method="post" name="formulario" onsubmit="validarFormulario()" action="PWRegistroApi.php">
  <input type="hidden" name="C00" value="<?=$CRUD?>">
  <input type="hidden" name="C01" value="<?=$TipoMovi?>">
  <input type="hidden" name="C02" value="<?=$ConsBusq?>">
  <table class="ListInfo01" with="50%">
    <caption>
      <?=$DescTiSe?>
    </caption>
  	<thead>	
	<tr>
		<th>Campo</th>
		<td><a href="PWRegistroList.php" name="cancelar" class="cancelar">Regresar</a></td>
	<tr> 	
	</thead>
	<tr>
		<th>Titulo
			></th>
		<td>
			<input type="text" name="C03" value="<?=$VC03?>" 
					onkeyup="checaMensaje(this.value)" placeholder="Titulo">
		</td>
	</tr> 
	<tr>
		<th>Descripcion</th>
		<td><input type="text" name="C04" value="<?=$VC04?>"
				onkeyup="checaMensaje(this.value)" placeholder="Titulo">
		<td>
	<tr> 
	<?php 
		//SE activa para la modificacion
		if  ( $TipoMovi == "M" ) { ?>		
	<tr>
		<th><?= $ConsBusq?>,<?=$VC01?>,<?=$VC02?>
			<a href="#" onclick="CargImag()">
			Imagen de la página</a></th>
		<td><!-- Ayuda imagen -->
			<a href="javascript:window.open('PWAyuda.php?Ayuda01=S','','width=500,height=300,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
			<img src="/Intranet/ComSocial/Imagen/BtnInfo01.jpg" Title="Subir" width="25px" height="25px"/>
			</a>
			<!-- Subir imagen -->
			<a href="#" onclick="CarImgPa(<?= $ConsBusq?>,<?=$VC01?>,<?=$VC02?>,'I')">
			<img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" title="Subir Imagen de la Pagina"  width="25px" height="25px"/>
			</a>
			<!-- Visualizar Image -->
			<?php if ( $VC07 != '' ) { ?> 
			<a href="javascript:window.open('<?=$RutaArch.$VC07?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
				<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px" height="25px"/> 
			</a> 
			<?php  } ?><td>
	<tr> 
	<?php }	 ?>	
	<tr>
		<th>Publicacion</th>
		<td >Incio: <input type="date" id="inicio" name="C05" 
					value="<?=$VC05?>"  onkeyup="checaMensaje(this.value)" size="10px">
		</td>
		<td>
			Termino: <input type="date" name="C06" 
					value="<?=$VC06?>" onkeyup="checaMensaje(this.value)" size="10px">
		<td>
	</tr> 
	<tr>
		<th>Al dar clik se Mostrar</th>
		<td><select name="C07" >
			<?php foreach($CataMoDo as $RegiTabl): 
						$ClavCata = $RegiTabl[0];		
						$DescCata = $RegiTabl[1];  
						$Activo = ( $ClavCata == $VC08) ? "selected" : ""; ?>
				<option value="<?=$ClavCata?>" <?=$Activo?>>
				  <?=$ClavCata?> <?=$DescCata?></option>
			<?php  endforeach; ?>
			</select>
			<td>
	</tr> 
	<?php 
		//SE activa para la modificacion
		if  ( $TipoMovi == "M" ) { ?>		
	<tr>
		<th>Documento a mostrar</th>
		<td><!-- Ayuda imagen -->
			<a href="javascript:window.open('PWAyuda.php?Ayuda02=S','','width=500,height=300,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
			<img src="/Intranet/ComSocial/Imagen/BtnInfo01.jpg" Title="Subir" width="25px" height="25px"/>
			</a>
			<!-- Subir imagen -->
			<a href="#" onclick="CargArchi(<?= $ConsBusq?>,<?=$VC01?>,<?=$VC02?>,'<?=$VC09?>')">
			<img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" title="Subir Imagen de la Pagina"  width="25px" height="25px"/>
			</a>
			<!-- Visualizar Image -->
			<?php if ( $VC09 != '' ) { ?> 
			<a href="javascript:window.open('<?=$RutaArch.$VC09?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
				<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px" height="25px"/> 
			</a> 
			<?php  } ?><td>
	</tr> 
	<?php }	 ?>	

	<tr>
		<th>Liga</th>
		<td><input type="text" name="C08" 
					value="<?=$VC10?>" onkeyup="checaMensaje(this.value)" placeholder="Liga">
		</td>
	</tr> 

	<tr>
		<th>Donde se visuzaliza documento</th>
		<td>
			<select name="C09" >
			<?php foreach($CataDoVe as $RegiTabl): 
						$ClavCata = $RegiTabl[0];		
						$DescCata = $RegiTabl[1];  
						$Activo = ( $ClavCata == $VC11) ? "selected" : ""; ?>
				<option value="<?=$ClavCata?>" <?=$Activo?>>
				  <?=$ClavCata?> <?=$DescCata?></option>
			<?php  endforeach; ?>
			</select>		
		</td>
	</tr> 
	<tr>
		<th>Seguimiento</th>
		<td>
		  <table>
			<tr>	
			  <td style="background-color:#fabeb8; font-size:10px;">
			  <?php 
			    $BotoSegi="01"; $BandMovi = false;
				$DescSegi="Creacion";
			    switch($EstaSegu)
				{ case "01": $BotoSegi="01"; $DescSegi="Regresar Doc"; $BandMovi = true;	break;
				  case "03": $BotoSegi="04"; $DescSegi="Resivir Doc";  $BandMovi = true;	break;	
				  case "04": $BotoSegi="05"; $DescSegi="Asignar SP ";  $BandMovi = true;	break;	
				  case "05": $BotoSegi="06"; $DescSegi="Enviar a Analisis";$BandMovi = true;break;	
				  case "06": $DescSegi="Recibir para su Analisis";		break;
				  case "07": $DescSegi="Analisis";						break;
				  case "08": $DescSegi="Publicacion";					break;
				  case "09": $DescSegi="Cierre";						break;
				 }
			  ?>	
			  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu<?=$BotoSegi?>.gif" 
						Title="$DescSegi" witch="35px" height = "35px"/>
			  <?=$DescSegi?>
			  </td>		
			  <td>
				<?php if ($BandMovi) { ?>
				<a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=01"> <?php } ?>
				  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu03.gif" 
					   Title="Regresar al área Usuaria" witch="25px" height = "25px"/>    
				<?php if ($BandMovi) echo "</a>"; ?><br>
				Reg Doc.		
			  </td>
			  <td>
			  <?php if ($BandMovi) { ?>
				<a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=03"> <?php } ?>
				  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu04.gif" 
					   Title="Recibir Documento en Comunicacion social" witch="25px" height = "25px"/>    
				<?php if ($BandMovi) echo "</a>"; ?><br>
				Recibir Doc.	
			  </td>
			  <td>
			  <?php if ($BandMovi) { ?>
				<a href="PWServPubl.php?ConsDocu=<?=$ConsBusq?>">	<?php } ?>
				  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu05.gif" 
						Title="Asignar Servidor de Com Social" witch="25px" height = "25px"/>    
				<?php if ($BandMovi) echo "</a>"; ?><br>
				Asig Ser Pub		
			  </td>
			  <td>
			  <?php if ($BandMovi) { ?>
				<a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=05">	<?php } ?>	
				  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu06.gif" 
						Title="Enviar al Serv Publico" witch="25px" height = "25px"/>    
			  <?php if ($BandMovi) echo "</a>"; ?><br>Enviar Ser Pub		
			  </td>
			</tr>	
			<tr>

			</tr>	
		</table>
	  </td>
	</tr>		
	<tr>
		<td></td>
		<td>
		  <?php if ( $EstaSegu == '01' ) { ?>
			<input type="submit" name="Enviar" value="<?=$MesnTiMo?>" >
		  <?php } ?>	
		</td>
	</tr>	
</table>	
</body>
</html>