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
  <table width="48%" class="ListInfo01">
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
		<th>Titulo</th>
		<td colspan="2">
			<input type="text" name="C03" value="<?=$VC03?>" 
					onkeyup="checaMensaje(this.value)" placeholder="Titulo">
		</td>
	</tr>	
	<tr>
		<th>Descripcion</th>
		<td colspan="2">
			<input type="text" name="C04" value="<?=$VC04?>"
			onkeyup="checaMensaje(this.value)" placeholder="Descripción">
		</td>	  
	</tr>	
	<?php if ( $TipoMovi != "A" ) { ?>	    
	<tr>
		<th>Imagen de la página</a></th>
		<td colspan="2"><!-- Ayuda imagen -->
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
			<?php if ( $VC07 != '' ) echo "</a> "; } ?> 
		</td>	
	</tr>
	<?php  } ?>      
	<tr>
		<th>Publicacion</th>
		<td width="137" >Incio: <input type="date" id="inicio" name="C05" 
			value="<?=$VC05?>"  onkeyup="checaMensaje(this.value)" size="10px">
		</td>
		<td width="184">Termino: <input type="date" name="C06" 
					value="<?=$VC06?>" onkeyup="checaMensaje(this.value)" size="10px">
		</td>			
	</tr>	
	<tr>
		<th>Al dar clik se Mostrar</th>
		<td colspan="2"><select name="C07" >
			<?php foreach($CataMoDo as $RegiTabl): 
						$ClavCata = $RegiTabl[0];		
						$DescCata = $RegiTabl[1];  
						$Activo = ( $ClavCata == $VC08) ? "selected" : ""; ?>
				<option value="<?=$ClavCata?>" <?=$Activo?>>
				  <?=$ClavCata?> <?=$DescCata?></option>
			<?php  endforeach; ?>
			</select>
		</td>
	</tr>	
    	
	<?php if ( $TipoMovi != "A" && ( $VC08 != 'N' && $VC08 != 'L' ) ) { ?>
	<tr>
		<th>Documento a mostrar <?=$VC08?> </th>
		<td colspan="2"><!-- Ayuda imagen -->
			<a href="javascript:window.open('PWAyuda.php?Ayuda02=S','','width=500,height=300,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
			<img src="/Intranet/ComSocial/Imagen/BtnInfo01.jpg" Title="Subir" width="25px" height="25px"/>
			</a>
			<!-- Subir imagen -->
			<a href="#" onclick="CargArchi(<?= $ConsBusq?>,<?=$VC01?>,<?=$VC02?>,'<?=$VC08?>')">
			<img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" title="Subir Imagen de la Pagina"  width="25px" height="25px"/>
			</a>
			<!-- Visualizar Image -->
			<?php if ( $VC09 != '' ) { ?> 
			<a href="javascript:window.open('<?=$RutaArch.$VC09?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
				<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px" height="25px"/> 
			<?php if ( $VC09 != '' ) echo "</a> "; } ?>  
		</td>	
	</tr>	
	<?php  }
	
	if ( $VC08 == 'L' ) {  ?>            
	<tr>
		<th>Liga</th>
		<td colspan="2"><input type="text" name="C08" 
					value="<?=$VC10?>" onkeyup="checaMensaje(this.value)" placeholder="Liga">
		</td>
	</tr>	
    <?php } 
	
	if ( $VC08 != 'N') { ?>
	<tr>
		<th>Donde se visuzaliza documento</th>
		<td colspan="2">
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
	<?php 
	}
	if ( $TipoMovi != "A" ) { ?>	<tr>
		<th>Seguimiento</th>
		<td>
		  <table>
			<tr>	
			  <td style="background-color:#fabeb8; font-size:14px;">
			  <?php 
			    $BotoSegi="01";		$BandMovi = false;
				$DescSegi="Creacion";
			    switch($EstaSegu)
				{ case "01": $DescSegi = "Creación de Documento";			break;
				  case "02": $DescSegi = "Enviar documento a Com. Social";	break;
				  case "03": $DescSegi = "Recepcin de Com Social";			break;
				  case "04": $DescSegi = "Asignar SP ";						break;
				  case "05": $BotoSegi = "06"; $DescSegi = "Regresar Documento";	
							 $BandMovi = true;		break;
				  case "06": $BotoSegi = "04"; $DescSegi = "Recibir Documento";
							 $BandMovi = true;		break;
				  case "07": $BotoSegi = "07"; $DescSegi = "Analisar Documento";
							 $BandMovi = true;		break;
				  case "08": $BotoSegi = "08"; $DescSegi = "Publicar Documento";
							 $BandMovi = true;		break;
				  case "09": $BotoSegi = "09"; $DescSegi = "Cierre";
							 						break;

				 }
			  ?>	
			  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu<?=$BotoSegi?>.gif" 
						Title="$DescSegi" witch="35px" height = "35px"/>
			  <?=$DescSegi?>
			  </td>		
			  <td>
				<?php if ($BandMovi) { ?>
				<a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=04"> <?php } ?>
				  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu03.gif" 
					   Title="Regresar al área Usuaria" witch="25px" height = "25px"/>    
				<?php if ($BandMovi) echo "</a>"; ?><br>
				Reg Doc.		
			  </td>
			  <td>
			  <?php if ($BandMovi) { ?>
				<a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=06"> <?php } ?>
				  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu04.gif" 
					   Title="Recibir Documento en Comunicacion social" witch="25px" height = "25px"/>    
			  <?php if ($BandMovi) echo "</a>"; ?><br>
				Recibir Doc.	
			  </td>
			  <td>
				<?php if ($BandMovi) { ?>
				<a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=07"> <?php } ?>
				  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu07.gif" 
						Title="Asignar Servidor de Com Social" witch="25px" height = "25px"/>    
				<?php if ($BandMovi) echo "</a>"; ?><br>
				Analisar Documento		
			  </td>
			  <td>
			  <?php if ($BandMovi) { ?>
				<a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=08">	<?php } ?>
				  <img src="/Intranet/PaginaWeb/Imagen/EstaSegu08.gif" 
						Title="Enviar al Serv Publico" witch="25px" height = "25px"/>    
			  <?php if ($BandMovi) echo "</a>"; ?><br>
				Publicar Documento		
			  </td>
			</tr>	
			<tr>

			</tr>	
		</table>
	  </td>
	</tr>
    <?php } ?>		
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