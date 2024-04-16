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
  <table width="66%" class="ListInfo01" with="50%">
    <caption>
      <?=$DescTiSe?>
    </caption>
  	<thead>	
	  <tr>
		<th width="191">Campo</th>
		<td colspan="2"><a href="PWRegistroList.php" name="cancelar" class="cancelar">Regresar</a></td>
    </thead>
	  <tr>
		<th>Titulo
			></th>
		<td colspan="2">
			<input type="text" name="C03" value="<?=$VC03?>" 
					onkeyup="checaMensaje(this.value)" placeholder="Titulo"></td>
	  <tr>
		<th>Descripcion</th>
	  <td colspan="2"><input type="text" name="C04" value="<?=$VC04?>"
				onkeyup="checaMensaje(this.value)" placeholder="Titulo">      
	  <tr>
		<th><?= $ConsBusq?>,<?=$VC01?>,<?=$VC02?>
			<a href="#" onclick="CargImag()">
			Imagen de la página</a></th>
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
			</a> 
	  <?php  } ?>      
	  <tr>
		<th>Publicacion</th>
		<td width="269" >Incio: <input type="date" id="inicio" name="C05" 
					value="<?=$VC05?>"  onkeyup="checaMensaje(this.value)" size="10px">
		</td>
		<td width="430">
			Termino: <input type="date" name="C06" 
					value="<?=$VC06?>" onkeyup="checaMensaje(this.value)" size="10px">
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
	  <tr>
		<th>Documento a mostrar</th>
		<td colspan="2"><!-- Ayuda imagen -->
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
	<?php  } ?>            
	<tr>
		<th>Liga</th>
		<td colspan="2"><input type="text" name="C08" 
					value="<?=$VC10?>" onkeyup="checaMensaje(this.value)" placeholder="Liga"></td>
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
	<tr>
		<th>Seguimiento</th>
		<td colspan="2">
		 <table width="300" border="1">
		  <tr>
			<?php 
			  $DescSegi = "Publicar Documento";
			  switch($EstaSegu)
				{ case "01": $DescSegi = "Creación de Documento";		break;
				  case "02": $DescSegi="Enviar documento a Com. Social";break;
				  case "03": $DescSegi="Recepcin de Com Social";		break;
				  case "04": $DescSegi="Asignar SP ";					break;
				  case "05": $DescSegi="Enviar a Analisis";				break;
				  case "06": $DescSegi="Recibir para su Analisis";		break;
				  case "07": $DescSegi="Analisis";						break;
				  case "08": $DescSegi="Publicacion";					break;
				  case "09": $DescSegi="Cierre";						break;
				} ?>
		    <td width="90" style="background-color:#fabeb8; font-size:14px;">
             <img src="/Intranet/PaginaWeb/Imagen/EstaSegu<?=$EstaSegu?>.gif" 
				title="<?=$DescSegi?>" witch="25px" height = "25px"/>
			 <?=$DescSegi?>
            </td>
		    <td width="94">
			  <a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=08">
              <img src="/Intranet/PaginaWeb/Imagen/EstaSegu08.gif" 
				title="Publicación" witch="25px" height = "25px"/>
			  </a><br>
			  Publicación
			</td>
		    <td width="94">
			  <a href="PWEstado.php?ConsDocu=<?=$ConsBusq?>&CambSegu=09"> 
              <img src="/Intranet/PaginaWeb/Imagen/EstaSegu09.gif" 
				title="Cierre de la publicación" witch="25px" height = "25px"/>
              </a>
			  Cierre
			</td>
	      </tr>
	    </table></td>
	</tr>		
	<tr>
		<td></td>
		<td  colspan="2">
		  <?php if ( $EstaSegu == '01' ) { ?>
			<input type="submit" name="Enviar" value="<?=$MesnTiMo?>" >
		  <?php } ?>	
		</td>
        
	</tr>	
</table>	
</body>
</html>