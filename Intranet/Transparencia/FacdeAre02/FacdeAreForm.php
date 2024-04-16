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
<script language="JavaScript" src="FacdeAreaVali.js"></script>	
<?php 
$BandQuer = true;
$CRUD = "GET";
include 'FacdeAreaApi.php';
?>
<br>
<form method="post" name="formulario" onsubmit="return validar(this)"
action="FacdeAreaApi.php">
  <!-- opciones de crud-->
  <input type="hidden" name="C00" value="<?=$CRUD?>">
  <input type="hidden" name="C01" value="<?=$TipoMovi?>">
  <input type="hidden" name="C02" value="<?=$ConFacAr?>">
  <!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->
  <table class="ListInfo01" width="50%">
  <caption>
    Lista de xxxx
  </caption>
  <thead>
	<tr>
	  <th>Listado</th>
	  <th><a href="FacdeAreCons.php">Regresar</a></th>	
	</tr>
  </thead>		
  <tbody>	
	<tr>
	  <th width="200px">Fecha de Inicio</th>
	  <td width="200px"><input type="date" name="AFechaInicio" id="AFechaInicio" value="<?=$r3?>" onkeyup="checaMensaje(this.value)"></td>
	</tr>
	<tr>
	  <th>Fecha de Termino</td>
	  <td><input type="date" name="AFechaTermino" id="AFechaTermino" value="<?=$r4?>" onkeyup="checaMensaje(this.value)"></td>
	</tr>
	<tr>
	  <th>Denominacion</td>
	  <td><input type="text" name="ADenominacion" id="ADenominacion" placeholder="Digitar Denominacion" value="<?=$r6?>" onkeyup="checaMensaje(this.value)"></td>
	</tr>
	<tr>
	  <th>Fundamento</td>
	  <td><input type="text" name="AFundamento" id="AFundamento" placeholder="Digitar Fundamento" value="<?=$r7?>" onkeyup="checaMensaje(this.value)"></td>
	</tr>
	<tr>
	  <th>Hipervinculo</td>
	  <td><input type="text" name="AHipervinculo" id="AHipervinculo" placeholder="Digitar Hipervinculo" value="<?=$r8?>" onkeyup="checaMensaje(this.value)"></td>
	</tr>
	<tr>
	<th>Área Responsable</td>
	  <td>
	  <select name="AAreaResp">
	  <?php foreach($CataArea as $valor): 
				$ClavCata = $valor['CARClave'];
				$DescCata = $valor['CARDescripcion']; 
				$Activo = ( $ClavCata == $r9) ? "selected" : ""; ?>
			<option value="<?=$ClavCata?>" <?=$Activo?>><?=$DescCata?> </option>
	  <?php	endforeach;	?>
	  </select>
	  </td>
	</tr>
	<tr>
	  <th>Nota</label></td>
	  <td><input type="text" name="ANota" id="ANota" placeholder="Digitar Nota" value="<?=$r10?>" onkeyup="checaMensaje(this.value)"></td>
	</tr>
	</tbody>	
	<tfoot>
	  <tr>
		<td> </td>	
		<td><input type="submit" name="Enviar" class="registrar" value="<?=$MesnTiMo?>" ></td>	
	  </tr>		
	</tfoot>	
	</table>
</form>
<?php
		//	}
		?>	
		<!-- script de validacion-->
		
	</body>
</html>