<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Permisos</title>
	<link rel="stylesheet" href="../../Archivos/CSS/OpcioMen.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
</head>
<body>
	<script language="javascript">
		function CierVent(param1,param2,param3,param4){
			if (window.opener && !window.opener.closed)
				{ window.opener.document.formulario.C03.value = param1;
					window.opener.document.formulario.C04.value = param2;
					window.opener.document.formulario.C05.value = param3;
					window.opener.document.formulario.C06.value = param4; 
				}
				window.close();
			}

		</script>		
		<?php

//Carga las variables
		include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');

		$ArCooki3 = $_COOKIE['CPermMenu'];
		$APermMen = explode("|", $ArCooki3);
		$ConsUsua = $APermMen[0];
		$NombUsua = $APermMen[1];
		$ClavMenu = $APermMen[2];
		$DescMenu = $APermMen[3];
		$BaseDato = $APermMen[4];

		if ( isset($_GET["Param1"]) )
			{  $ClavMenu = $_GET["Param1"];
		$DescMenu = $_GET["Param2"]; }
		


		//archivo de conexion a la bd
		include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');
		//query pars la tabla estructura organica 
		$sql = "SELECT `COSClave`,`COSDescripcion` ".
		"FROM ".$BaseDato.".acopcser ".
		"WHERE `COSTipSer`='".$ClavMenu."' ";     	   
		$resultado = $con->prepare($sql);
		$resultado->execute();
		$tot_rows = $resultado->rowCount();
		$row = $resultado->fetchAll();
		?>	
		<div class="tabla">
			<br><br>
			<table>
				<thead>
					<tr>
						<td>Menú</td>
						<td>Submenú</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($row as $fila):
						$OpciSubm = $fila['COSClave'];
						$DescSubm = $fila['COSDescripcion'];
						?>
						<tr>
							<td><a href="javascript:CierVent('<?=$ClavMenu?>','<?=$DescMenu?>','<?=$OpciSubm?>','<?=$DescSubm?>');"><?=$OpciSubm?></a></td>
							<td><?=$DescSubm?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</body>
	</html>