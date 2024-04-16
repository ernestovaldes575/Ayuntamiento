<!DOCTYPE html>
<html lang="es">
	<head> 
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Base de Datos</title>
		<link rel="stylesheet" href="../../Archivos/CSS/frames.css">
		<!-- iconos -->
		<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
	</head>
	<body>
<script language="javascript">
function CargaEjercicio(Param)
{ location.href = "mostNA.php?Param1="+Param; }
</script>
<?php

//Carga las variables
include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Files/EncaCook.php');

$ArCooki3 = $_COOKIE['CPermMenu'];
$APermMen = explode("|", $ArCooki3);
$ClavBaDa = $APermMen[0];
$DescBaDa = $APermMen[1];
$BaseDato = $APermMen[2];

if ( isset($_GET["Param1"]) ){
	$ClavMenu = $_GET["Param1"];
	$DescMenu = $_GET["Param2"];
	$ArCooki4 = $ClavBaDa.'|'.$DescBaDa.'|'.$BaseDato.'|'.$ClavMenu.'|'.$DescMenu.'|';
	setcookie("CPermMenu", "$ArCooki4");
 }

		//archivo de conexion a la bd
		include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conlogin.php');
		//query pars la tabla
		$sql = "SELECT COSClave,COSDescripcion FROM $BaseDato.acopcser WHERE COSTipSer='".$ClavMenu."' ORDER BY COSClave ";
		$resultado = $con->prepare($sql);
		$resultado->execute();
		$tot_rows = $resultado->rowCount();
		$row = $resultado->fetchAll();
		?>
		
		<div class="tabla">
			<table>
				<td></td>
				<td><a href="OpciservABC.php?Param1=A&Param2=000" class="nuevo" target="CaptDato">+Nuevo</a></td>
			
				<?php foreach ($row as $fila):
					       $ClavSubm = $fila['COSClave'];
					       $DescSubm = $fila['COSDescripcion'];
					        ?>
						<tr>
							<td><?=$ClavSubm?>&nbsp;&nbsp;&nbsp;<?=$DescSubm?></td>
							<td data-titulo="Editar:"><a href="OpciservABC.php?Param1=M&Param2=<?=$ClavSubm?>" class="btn_update" target="CaptDato"><i class="fa fa-pencil-square-o" aria-hidden="true" title="Editar Registro"></i></a></td>
							<!-- MODificado -->
							<!-- MODificado -->
						</tr>
				<?php endforeach ?>
			</table>
		</div>
	</body>
</html>