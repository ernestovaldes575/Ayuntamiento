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
<body>
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
		<td><a href="PWRegistroList01.php" name="cancelar" class="cancelar">Regresar</a></td>
	  <tr> 	
	</thead>

	  <tr>
		<th>Titulo
			></th>
		<td>
			<input type="text" name="C03" value="<?=$VC03?>" 
					onkeyup="checaMensaje(this.value)" placeholder="Titulo"></td>
	  <tr> 
	  <tr>
		<th>Descripcion</th>
		<td><input type="text" name="C04" value="<?=$VC04?>"
				onkeyup="checaMensaje(this.value)" placeholder="Titulo"><td>
	  <tr> 
	  <?php 
		//SE activa para la modificacion
		if  ( $TipoMovi == "M" ) { ?>		
	  <tr>
		<th>Imagen de la página</th>
		<td><!-- Ayuda imagen -->
			<a href="javascript:window.open('PWAyuda.php?Ayuda01=S','','width=500,height=300,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
			<img src="/Intranet/ComSocial/Imagen/BtnInfo01.jpg" Title="Subir" width="25px" height="25px"/>
			</a>
			<!-- Subir imagen -->
			<a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'I')">
			<img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" title="Subir Imagen de la Pagina"  width="25px" height="25px"/>
			</a>
			<!-- Visualizar Image -->
			<?php if ( $VC10 != '' ) { ?> 
			<a href="javascript:window.open('<?=$RutaArch.$VC10?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
				<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px" height="25px"/> 
			</a> 
			<?php  } ?><td>
	  <tr> 
	  <?php }	 ?>	
	  <tr>
		<th>Publicacion</th>
		<td>Incio: <input type="date" id="inicio" name="C05" 
					value="<?=$VC05?>"  onkeyup="checaMensaje(this.value)" size="10px">
			Termino: <input type="date" name="C06" 
					value="<?=$VC06?>" onkeyup="checaMensaje(this.value)" size="10px">
		<td>
	  <tr> 
	  <tr>
		<th>Al dar clik se Mostrar</th>
		<td><input type="checkbox" name="C07" value="N" <?=$AbrirN?>>Nada&nbsp;&nbsp; 
						<input type="checkbox" name="C07" value="I" <?=$AbrirI?>>Imagen&nbsp;&nbsp;
						<input type="checkbox" name="C07" value="L" <?=$AbrirL?>>Liga&nbsp;&nbsp;
						<input type="checkbox" name="C07" value="A" <?=$AbrirA?>>Pdf<td>
	  <tr> 
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
			<a href="#" onclick="CargImag(<?= $VC03?>,<?=$VC04?>,<?=$VC05?>,'I')">
			<img src="/Intranet/ComSocial/Imagen/BtnSubiImag.jpg" title="Subir Imagen de la Pagina"  width="25px" height="25px"/>
			</a>
			<!-- Visualizar Image -->
			<?php if ( $VC11 != '' ) { ?> 
			<a href="javascript:window.open('<?=$RutaArch.$VC10?>','','width=600,height=400,left=50,top=50,resizable=yes,scrollbars=yes');void 0">
				<img src="/Intranet/ComSocial/Imagen/BtnVisuImag.jpg"  width="25px" height="25px"/> 
			</a> 
			<?php  } ?><td>
	<tr> 
	<?php }	 ?>	

	<tr>
		<th>Liga</th>
		<td><input type="text" name="C08" 
					value="<?=$VC08?>" onkeyup="checaMensaje(this.value)" placeholder="Liga"></td>
	<tr> 

	<tr>
		<th>Donde se va a mostrar</th>
		<td><input type="checkbox" name="C09" value="N" <?=$MostraN?>> Nada &nbsp;&nbsp; 
			<input type="checkbox" name="C09" value="V" <?=$MostraV?>> Ventana &nbsp;&nbsp;
			<input type="checkbox" name="C09" value="P" <?=$MostraP?>> Pagina</td>
	<tr> 
	<tr>
		<td></td>
		<td><input type="submit" name="Enviar" value="<?=$MesnTiMo?>" ></td>
	</tr>	
</table>	
</body>
</html>