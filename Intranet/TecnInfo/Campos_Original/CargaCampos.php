<!DOCTYPE html>
<html lang="es">
<head> 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CargaCampos</title>
	<link rel="stylesheet" href="../../Archivos/CSS/Consultas.css">
	<!--icono de la pestaña (logo)-->
	<link rel="shortcut icon" href="../../Archivos/Img/logoEnc.ico" />
	<!-- iconos -->
	<link rel="stylesheet" href="../../Archivos/CSS/font-awesome.min.css">
</head>
<body>	
	<?php
	
	//Carga las variables
	$ArCooki1 = $_COOKIE['CMenu'];
	$AMenu = explode("|", $ArCooki1);
	$ClavMenu = $AMenu[0];  
	$DescMenu = $AMenu[1];  
	$BaseDato = $AMenu[2]; 
	$TablBaDa = $AMenu[3]; 

	//archivo de conexion a la bd
	include($_SERVER['DOCUMENT_ROOT'].'/Intranet/Archivos/Conexiones/conteinf.php');

	//Borrar datos de la tabla
	$sql = "DELETE FROM pdcampos ".
	"WHERE CTabla='".$TablBaDa."'";
	$resultado = $cone->prepare($sql);
	$resultado->execute();

	//Recuperamos los campos de la tabla  
	$sql2 = $cone->prepare("DESCRIBE ".$BaseDato.".".$TablBaDa."");
	$sql2->execute();
	$NumeRegi = 1;
	While($Fila2 = $sql2->fetch()){
		$Campo   = $Fila2[0];
		$Valor   = $Fila2[1];
		$letras = preg_match('/\d+/', $Valor, $matches);
		$ancho = $matches[0];
		$Valor = preg_replace('/\(\d+\)/', '', $Valor);
		

		$sql = "INSERT INTO pdcampos (CTabla, CNumero, CDescripcion, CTipo, CAncho, CListaKey, CListaDefa, CDespLista, CBusqLista, CPagiRefe, CCampoCapt, CCampoTama, CCampokey, CCampDefa, CUtilCata, CCatalogo, CClaveCata, CDescriCata) VALUES ('".$TablBaDa."', '".$NumeRegi."', '".$Campo."', '".$Valor."', '".$ancho."', 'I', '', 'I', 'I', 'I', 'I', 'I', 'I', '', 'I', '', '', '')";
		$resultado = $cone->prepare($sql);
		$resultado->execute();
		$NumeRegi++;
	}

	header("location: VisualizarCampos.php");
	?>	
</body>
</html>