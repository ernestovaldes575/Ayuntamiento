-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2022 a las 19:53:50
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tecninfo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acopcser`
--

CREATE TABLE `acopcser` (
  `COSTipSer` char(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `COSClave` char(3) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `COSDescripcion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `COSDireccion` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acopcser`
--

INSERT INTO `acopcser` (`COSTipSer`, `COSClave`, `COSDescripcion`, `COSDireccion`) VALUES
('01', '001', 'Generar Código', 'TecnInfo/Campos/BaseDatos.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actipser`
--

CREATE TABLE `actipser` (
  `CTSClave` char(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `CTSDescripcion` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actipser`
--

INSERT INTO `actipser` (`CTSClave`, `CTSDescripcion`) VALUES
('01', 'Programas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adpermi`
--

CREATE TABLE `adpermi` (
  `PAyuntamiento` char(3) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `PConsServ` int(11) NOT NULL,
  `PTipoServ` char(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `POpciServ` char(3) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `PConsulta` char(1) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `PAlta` char(1) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `PModifica` char(1) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `PBaja` char(1) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `PNumePerm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `adpermi`
--

INSERT INTO `adpermi` (`PAyuntamiento`, `PConsServ`, `PTipoServ`, `POpciServ`, `PConsulta`, `PAlta`, `PModifica`, `PBaja`, `PNumePerm`) VALUES
('105', 2, '01', '001', 'A', 'A', 'A', 'A', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pdcampos`
--

CREATE TABLE `pdcampos` (
  `CTabla` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CNumero` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `CDescripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CTipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CAncho` int(11) NOT NULL,
  `CListaKey` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `CListaDefa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CDespLista` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `CBusqLista` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `CPagiRefe` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `CCampoCapt` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `CCampoTama` int(11) NOT NULL,
  `CCampokey` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `CCampDefa` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CUtilCata` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `CCatalogo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CClaveCata` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `CDescriCata` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pdcampos`
--

INSERT INTO `pdcampos` (`CTabla`, `CNumero`, `CDescripcion`, `CTipo`, `CAncho`, `CListaKey`, `CListaDefa`, `CDespLista`, `CBusqLista`, `CPagiRefe`, `CCampoCapt`, `CCampoTama`, `CCampokey`, `CCampDefa`, `CUtilCata`, `CCatalogo`, `CClaveCata`, `CDescriCata`) VALUES
('ttfadear', '1', 'AConsecutivo', 'int', 11, 'I', '', 'I', 'I', 'I', 'I', 0, 'A', '', 'I', '', '', ''),
('ttfadear', '2', 'AAyuntamiento', 'char', 3, 'A', '$ClavAyun', 'I', 'I', 'I', 'I', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '3', 'AEjercicio', 'int', 11, 'A', '$EjerTrab', 'I', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '4', 'AFechaInicio', 'date', 0, 'I', '', 'A', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '5', 'AFechaTermino', 'date', 0, 'I', '', 'A', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '6', 'AArea', 'int', 11, 'I', '', 'I', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '7', 'ADenominacion', 'varchar', 50, 'I', '', 'A', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '8', 'AFundamento', 'varchar', 50, 'I', '', 'I', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '9', 'AHipervinculo', 'varchar', 50, 'I', '', 'I', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '10', 'AAreaResp', 'int', 11, 'I', '', 'I', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', ''),
('ttfadear', '11', 'ANota', 'varchar', 50, 'I', '', 'A', 'I', 'I', 'A', 0, 'I', '', 'I', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pttabla`
--

CREATE TABLE `pttabla` (
  `TNombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `TTipoMovi` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `TNumero` int(11) NOT NULL,
  `TInstruccion` varchar(450) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pttabla`
--

INSERT INTO `pttabla` (`TNombre`, `TTipoMovi`, `TNumero`, `TInstruccion`) VALUES
('aa', 'X', 1, '\''),
('ttfadear', 'L', 1, '<!DOCTYPE html>'),
('ttfadear', 'L', 2, '<html lang=\"es\">'),
('ttfadear', 'L', 3, '<head>'),
('ttfadear', 'L', 4, '	<meta charset=\"UTF-8\">'),
('ttfadear', 'L', 5, '	<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">'),
('ttfadear', 'L', 6, '	<title>ListaFac</title>'),
('ttfadear', 'L', 7, '	<link rel=\"stylesheet\" type=\"text/css\" href=\"../../Archivos/CSS/Consu.css\">'),
('ttfadear', 'L', 8, '	<!--icono de la pestaña (logo)-->'),
('ttfadear', 'L', 9, '	<link rel=\"shortcut icon\" href=\"../../Archivos/Img/logoEnc.ico\" />'),
('ttfadear', 'L', 10, '	<!-- iconos -->'),
('ttfadear', 'L', 11, '	<link rel=\"stylesheet\" href=\"../../Archivos/CSS/font-awesome.min.css\">'),
('ttfadear', 'L', 12, '</head>'),
('ttfadear', 'L', 13, '<body>'),
('ttfadear', 'L', 14, '	<script language=\"javascript\">'),
('ttfadear', 'L', 15, '		function CargaEjercicio(Param)'),
('ttfadear', 'L', 16, ' 		{ location.href = \"ListaFac.php?Param1=\"+Param; }'),
('ttfadear', 'L', 17, '	</script>'),
('ttfadear', 'L', 18, ' '),
('ttfadear', 'L', 19, '	<?php'),
('ttfadear', 'L', 20, '		//Carga las variables'),
('ttfadear', 'L', 21, '	include($_SERVER[\"DOCUMENT_ROOT\"].\"/Intranet/Archivos/Files/EncaCook.php\");'),
('ttfadear', 'L', 22, ' '),
('ttfadear', 'L', 23, '	if ( isset($_GET[\"Param1\"]) ){'),
('ttfadear', 'L', 24, '		$EjerTrab = $_GET[\"Param1\"];'),
('ttfadear', 'L', 25, ' 		$ArCooki3 = $ConsUsua.\"|\".$ClavAyun.\"|\".$DescAyun.\"|\".$ConsUnid.\"|\".$DescUnid.\"|\".$EjerTrab.\"|\";'),
('ttfadear', 'L', 26, ' 		setcookie(\"CEncaMae\", \"$ArCooki3\");'),
('ttfadear', 'L', 27, '	}'),
('ttfadear', 'L', 28, '		//archivo de conexion a la bd'),
('ttfadear', 'L', 29, '	include($_SERVER[\"DOCUMENT_ROOT\"].\"/Intranet/Archivos/Conexiones/conexion.php\");'),
('ttfadear', 'L', 30, '		//query pars la tabla ListaFac-'),
('ttfadear', 'L', 31, '	$sql = \"SELECT * \".'),
('ttfadear', 'L', 32, '   	       \"FROM ttfadear \".'),
('ttfadear', 'L', 33, '           \"WHERE AAyuntamiento = \".$ClavAyun.'),
('ttfadear', 'L', 34, '           \" AND AEjercicio = \".$EjerTrab;'),
('ttfadear', 'L', 35, '	$resultado = $conexion->prepare($sql);'),
('ttfadear', 'L', 36, '	$resultado->execute();'),
('ttfadear', 'L', 37, '	$tot_rows = $resultado->rowCount();'),
('ttfadear', 'L', 38, '	$row = $resultado->fetchAll();'),
('ttfadear', 'L', 39, ' '),
('ttfadear', 'L', 40, '		//Datos del Catalogo'),
('ttfadear', 'L', 41, '	$sql2 = $conexion->prepare(\"SELECT * FROM tcejercicio\");'),
('ttfadear', 'L', 42, '	$sql2->execute();'),
('ttfadear', 'L', 43, '	$CEJClave = $sql2->fetchAll();'),
('ttfadear', 'L', 44, '	?>'),
('ttfadear', 'L', 45, ' '),
('ttfadear', 'L', 46, '		<!--encabezado-->'),
('ttfadear', 'L', 47, '	<header> <?php require_once(\"../../Archivos/Files/header.php\"); ?> </header>'),
('ttfadear', 'L', 48, '	<br>'),
('ttfadear', 'L', 49, '	<div class=\"tabla\">'),
('ttfadear', 'L', 50, '		<div class=\"titulo\"><h2>ListaFac</h2></div>'),
('ttfadear', 'L', 51, '		<div class=\"botones\">'),
('ttfadear', 'L', 52, '			<a href=\"../../menuintranet.php\" class=\"regresar\">Regresar</a>'),
('ttfadear', 'L', 53, '			<div class=\"lista\">'),
('ttfadear', 'L', 54, '				<select name=\"AAreaResp\" onChange=\"CargaEjercicio(this.value)\" class=\"AAreaResp\">'),
('ttfadear', 'L', 55, '				<?php'),
('ttfadear', 'L', 56, '				foreach($CEJClave as $valor):'),
('ttfadear', 'L', 57, '					$ClavCata = $valor[\"CEJClave\"];'),
('ttfadear', 'L', 58, '					$DescCata = $valor[\"CEJDescripcion\"];'),
('ttfadear', 'L', 59, '					$Activo = \"\";'),
('ttfadear', 'L', 60, '					if ( $ClavCata == $EjerTrab)'),
('ttfadear', 'L', 61, '						$Activo = \"selected\";'),
('ttfadear', 'L', 62, '				?>'),
('ttfadear', 'L', 63, '					<option value=\"<?=$ClavCata?>\" <?=$Activo?>><?=$ClavCata?> </option>'),
('ttfadear', 'L', 64, '				<?php'),
('ttfadear', 'L', 65, '				endforeach;'),
('ttfadear', 'L', 66, '				?>'),
('ttfadear', 'L', 67, '				</select>'),
('ttfadear', 'L', 68, '			</div>'),
('ttfadear', 'L', 69, '			<?php '),
('ttfadear', 'L', 70, '			if($Alta == \"A\"){ '),
('ttfadear', 'L', 71, '			?>'),
('ttfadear', 'L', 72, '				<a href=\"MoviFac.php?Param1=A&Param2=0\" class=\"nuevo\">+Nuevo</a>'),
('ttfadear', 'L', 73, '			<?php } ?>'),
('ttfadear', 'L', 74, '		</div>'),
('ttfadear', 'L', 75, ' '),
('ttfadear', 'L', 76, '		<table>'),
('ttfadear', 'L', 77, '			<thead>'),
('ttfadear', 'L', 78, '				<tr>'),
('ttfadear', 'L', 79, '					<td>AFechaInicio</td>'),
('ttfadear', 'L', 80, '					<td>AFechaTermino</td>'),
('ttfadear', 'L', 81, '					<td>ADenominacion</td>'),
('ttfadear', 'L', 82, '					<td>ANota</td>'),
('ttfadear', 'L', 83, '					<td>Eliminar</td>'),
('ttfadear', 'L', 84, '					<td>Editar</td>'),
('ttfadear', 'L', 85, '				</tr>'),
('ttfadear', 'L', 86, '			</thead>'),
('ttfadear', 'L', 87, '			<tbody>'),
('ttfadear', 'L', 88, '				<?php'),
('ttfadear', 'L', 89, '				foreach ($row as $fila):'),
('ttfadear', 'L', 90, '					$VC03 = $fila[\"AFechaInicio\"];'),
('ttfadear', 'L', 91, '					$VC04 = $fila[\"AFechaTermino\"];'),
('ttfadear', 'L', 92, '					$VC05 = $fila[\"ADenominacion\"];'),
('ttfadear', 'L', 93, '					$VC06 = $fila[\"ANota\"];'),
('ttfadear', 'L', 94, '				?>'),
('ttfadear', 'L', 95, '				<tr>'),
('ttfadear', 'L', 96, '					<td><?=$VC03?></td>'),
('ttfadear', 'L', 97, '					<td><?=$VC04?></td>'),
('ttfadear', 'L', 98, '					<td><?=$VC05?></td>'),
('ttfadear', 'L', 99, '					<td><?=$VC06?></td>'),
('ttfadear', 'L', 100, ' '),
('ttfadear', 'L', 101, '						<!-- iconos dentro de la libreria font-awesome.min.css -->'),
('ttfadear', 'L', 102, '					<td>'),
('ttfadear', 'L', 103, '					<?php if($Baja == \"A\"){ ?>'),
('ttfadear', 'L', 104, '						<a href=\"MoviFac.php?Param1=B&Param2=<?= $VC03?>\" class=\"btn_delete\"><i class=\"fa fa-close\" aria-hidden=\"true\" title=\"Eliminar Registro\"></i></a>'),
('ttfadear', 'L', 105, '					<?php } ?>'),
('ttfadear', 'L', 106, '					</td>'),
('ttfadear', 'L', 107, '					<td>'),
('ttfadear', 'L', 108, '					<?php if($Modi == \"A\"){ ?>'),
('ttfadear', 'L', 109, '						<a href=\"MoviFac.php?Param1=M&Param2=<?= $VC03?>\" class=\"btn_update\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\" title=\"Editar Registro\"></i></a>'),
('ttfadear', 'L', 110, '					<?php } ?>'),
('ttfadear', 'L', 111, '					</td>'),
('ttfadear', 'L', 112, '				</tr>'),
('ttfadear', 'L', 113, '				<?php endforeach ?>'),
('ttfadear', 'L', 114, '			</tbody>'),
('ttfadear', 'L', 115, '		</table>'),
('ttfadear', 'L', 116, '	</div>'),
('ttfadear', 'L', 117, '</body>'),
('ttfadear', 'L', 118, '</html>'),
('ttfadear', 'M', 1, '<!DOCTYPE html>'),
('ttfadear', 'M', 2, '	<html lang=\"es\">'),
('ttfadear', 'M', 3, '	<head>'),
('ttfadear', 'M', 4, '		<meta charset=\"UTF-8\">'),
('ttfadear', 'M', 5, '		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">'),
('ttfadear', 'M', 6, '		<title>Form MoviFac</title>'),
('ttfadear', 'M', 7, '		<link rel=\"stylesheet\" href=\"../../Archivos/CSS/CRUD.css\">'),
('ttfadear', 'M', 8, '		<!--icono de la pestaña (logo)-->'),
('ttfadear', 'M', 9, '		<link rel=\"shortcut icon\" href=\"../../Archivos/Img/logoEnc.ico\" />'),
('ttfadear', 'M', 10, '		<!--jquery para validar campos-->'),
('ttfadear', 'M', 11, '		<script src=\"../../Archivos/JS/jquery-1.11.1.js\"></script>'),
('ttfadear', 'M', 12, '	</head>'),
('ttfadear', 'M', 13, '	<body>'),
('ttfadear', 'M', 14, '	<?php'),
('ttfadear', 'M', 15, ' '),
('ttfadear', 'M', 16, '		include_once \"../../Archivos/Conexiones/conexion.php\";'),
('ttfadear', 'M', 17, ' '),
('ttfadear', 'M', 18, '			//Carga las variables'),
('ttfadear', 'M', 19, ''),
('ttfadear', 'M', 20, '		include($_SERVER[\"DOCUMENT_ROOT\"].\"/Intranet/Archivos/Files/EncaCook.php\");'),
('ttfadear', 'M', 21, '		if(isset($_POST[\"Enviar\"])){'),
('ttfadear', 'M', 22, '			$TipoMovi = $_POST[\"C01\"];'),
('ttfadear', 'M', 23, '			$ConFacAr = $_POST[\"C02\"]; '),
('ttfadear', 'M', 24, '			$C03 = htmlentities(addslashes($_POST[\"C03\"]));'),
('ttfadear', 'M', 25, '			$C04 = htmlentities(addslashes($_POST[\"C04\"]));'),
('ttfadear', 'M', 26, '			$C05 = htmlentities(addslashes($_POST[\"C05\"]));'),
('ttfadear', 'M', 27, '			$C06 = htmlentities(addslashes($_POST[\"C06\"]));'),
('ttfadear', 'M', 28, '			$C07 = htmlentities(addslashes($_POST[\"C07\"]));'),
('ttfadear', 'M', 29, '			$C08 = htmlentities(addslashes($_POST[\"C08\"]));'),
('ttfadear', 'M', 30, '			$C09 = htmlentities(addslashes($_POST[\"C09\"]));'),
('ttfadear', 'M', 31, '			$C010 = htmlentities(addslashes($_POST[\"C010\"]));'),
('ttfadear', 'M', 32, '			$C011 = htmlentities(addslashes($_POST[\"C011\"]));'),
('ttfadear', 'M', 33, ' '),
('ttfadear', 'M', 34, '			//posibles querys'),
('ttfadear', 'M', 35, '			switch( $TipoMovi ){'),
('ttfadear', 'M', 36, '				case \"A\": #Alta'),
('ttfadear', 'M', 37, '				$sql = \"INSERT INTO ttfadear \".'),
('ttfadear', 'M', 38, '					   \"(AAyuntamiento, AEjercicio,AEjercicio, AFechaInicio, AFechaTermino, AArea, ADenominacion, AFundamento, AHipervinculo, AAreaResp, ANota ) VALUES (\'\".$ClavAyun.\"\', \'\".$EjerTrab.\"\', \'\".$C03.\"\', \'\".$C04.\"\', \'\".$C05.\"\', \'\".$C06.\"\', \'\".$C07.\"\', \'\".$C08.\"\', \'\".$C09.\"\', \'\".$C010.\"\', \'\".$C011.\"\' )\";'),
('ttfadear', 'M', 39, '				break;'),
('ttfadear', 'M', 40, '				case \"M\": #Modificacion'),
('ttfadear', 'M', 41, '				$sql = \"UPDATE ttfadear SET \".'),
('ttfadear', 'M', 42, '					   \"AEjercicio = \'\".$C03.\"\', AFechaInicio = \'\".$C04.\"\', AFechaTermino = \'\".$C05.\"\', AArea = \'\".$C06.\"\', ADenominacion = \'\".$C07.\"\', AFundamento = \'\".$C08.\"\', AHipervinculo = \'\".$C09.\"\', AAreaResp = \'\".$C010.\"\', ANota = \'\".$C011.\"\' \".'),
('ttfadear', 'M', 43, '					   \"WHERE AConsecutivo = $ConFacAr\";'),
('ttfadear', 'M', 44, '				break;'),
('ttfadear', 'M', 45, '				case \"B\": #Baja'),
('ttfadear', 'M', 46, '				$sql = \"DELETE FROM ttfadear WHERE AConsecutivo = $ConFacAr\";'),
('ttfadear', 'M', 47, '				break;'),
('ttfadear', 'M', 48, '			}'),
('ttfadear', 'M', 49, '			$resultado = $conexion->prepare($sql);'),
('ttfadear', 'M', 50, '			$resultado->execute();'),
('ttfadear', 'M', 51, '			$MensResp = \"Algo ha fallado!!!\";'),
('ttfadear', 'M', 52, '			if ($resultado) '),
('ttfadear', 'M', 53, '				$MensResp = \"Registro actualizado correctamente\";'),
('ttfadear', 'M', 54, '			$PagiRegr = \"location: ListaFac.php\";'),
('ttfadear', 'M', 55, '			header($PagiRegr);'),
('ttfadear', 'M', 56, '			echo \"<script>alert(\".$MensResp.\");</script>\";'),
('ttfadear', 'M', 57, '			$resultado->closeCursor();'),
('ttfadear', 'M', 58, '		}else{'),
('ttfadear', 'M', 59, '			$BandQuer = true;'),
('ttfadear', 'M', 60, '			if( trim($_GET[\"Param1\"]) != \"\"){'),
('ttfadear', 'M', 61, '				$TipoMovi = $_GET[\"Param1\"];	#Tipo de Movimiento'),
('ttfadear', 'M', 62, '				$ConFacAr = $_GET[\"Param2\"];	#COINCIDENCIA CON LA BD  '),
('ttfadear', 'M', 63, '			}'),
('ttfadear', 'M', 64, '				//Datos del Catalogo'),
('ttfadear', 'M', 65, '			$sql = $conexion->prepare(\"SELECT * FROM tcarea\");'),
('ttfadear', 'M', 66, '			$sql->execute();'),
('ttfadear', 'M', 67, '			$CataArea = $sql->fetchAll();'),
('ttfadear', 'M', 68, '				//Datos de la tabla'),
('ttfadear', 'M', 69, '			$sql = \"SELECT * FROM ttfadear WHERE AConsecutivo = $ConFacAr\";'),
('ttfadear', 'M', 70, '			$resultado = $conexion->prepare($sql);'),
('ttfadear', 'M', 71, '			$resultado->execute();'),
('ttfadear', 'M', 72, '			$result = $resultado->fetch();'),
('ttfadear', 'M', 73, '			$r1 = \"\";'),
('ttfadear', 'M', 74, '			$r2 = \"\";'),
('ttfadear', 'M', 75, '			$r3 = \"\";'),
('ttfadear', 'M', 76, '			$r4 = \"\";'),
('ttfadear', 'M', 77, '			$r5 = \"\";'),
('ttfadear', 'M', 78, '			$r6 = \"\";'),
('ttfadear', 'M', 79, '			$r7 = \"\";'),
('ttfadear', 'M', 80, '			$r8 = \"\";'),
('ttfadear', 'M', 81, '			$r9 = \"\";'),
('ttfadear', 'M', 82, ''),
('ttfadear', 'M', 83, '			if($result){ '),
('ttfadear', 'M', 84, '				$r1 = $result[\"AEjercicio\"];'),
('ttfadear', 'M', 85, '				$r2 = $result[\"AFechaInicio\"];'),
('ttfadear', 'M', 86, '				$r3 = $result[\"AFechaTermino\"];'),
('ttfadear', 'M', 87, '				$r4 = $result[\"AArea\"];'),
('ttfadear', 'M', 88, '				$r5 = $result[\"ADenominacion\"];'),
('ttfadear', 'M', 89, '				$r6 = $result[\"AFundamento\"];'),
('ttfadear', 'M', 90, '				$r7 = $result[\"AHipervinculo\"];'),
('ttfadear', 'M', 91, '				$r8 = $result[\"AAreaResp\"];'),
('ttfadear', 'M', 92, '				$r9 = $result[\"ANota\"];'),
('ttfadear', 'M', 93, '			}'),
('ttfadear', 'M', 94, '			$MesnTiMo = \"\";'),
('ttfadear', 'M', 95, '			switch( $TipoMovi ){'),
('ttfadear', 'M', 96, '				case \"A\":	$MesnTiMo = \"Registrar\";  break;'),
('ttfadear', 'M', 97, '				case \"M\":	$MesnTiMo = \"Actualizar\"; break;'),
('ttfadear', 'M', 98, '				case \"B\":	$MesnTiMo = \"Eliminar\";   break;'),
('ttfadear', 'M', 99, ''),
('ttfadear', 'M', 100, '			}'),
('ttfadear', 'M', 101, '			?>'),
('ttfadear', 'M', 102, '			<!--encabezado-->'),
('ttfadear', 'M', 103, '			<header> <?php require_once($_SERVER[\"DOCUMENT_ROOT\"].\"/Intranet/Archivos/Files/header.php\"); ?> </header>'),
('ttfadear', 'M', 104, '			<br>'),
('ttfadear', 'M', 105, '			<!--formulario de Actualizacion-->'),
('ttfadear', 'M', 106, '			<div class=\"principal\">'),
('ttfadear', 'M', 107, '				<h1>Formulario MoviFac</h1>'),
('ttfadear', 'M', 108, '				<form method=\"post\" name=\"formulario\" onsubmit=\"return validar(this)\">'),
('ttfadear', 'M', 109, '					<!-- opciones de crud-->'),
('ttfadear', 'M', 110, '					<input type=\"hidden\" name=\"C01\" value=\"<?=$TipoMovi?>\">'),
('ttfadear', 'M', 111, '					<input type=\"hidden\" name=\"C02\" value=\"<?=$ConFacAr?>\">'),
('ttfadear', 'M', 112, '					<!--el value de todos los inputs es lo que esta en la base de datos correspondiente al elemento que se pulso-->'),
('ttfadear', 'M', 113, '					<table >'),
('ttfadear', 'M', 114, '						<tr>\r\n	    					<th>AEjercicio</th>\r\n	    					<td><input type=\"text\" name=\"C03\" value=\"<?=$r1?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 115, '						<tr>\r\n	    					<th>AFechaInicio</th>\r\n	    					<td><input type=\"text\" name=\"C04\" value=\"<?=$r2?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 116, '						<tr>\r\n	    					<th>AFechaTermino</th>\r\n	    					<td><input type=\"text\" name=\"C05\" value=\"<?=$r3?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 117, '						<tr>\r\n	    					<th>AArea</th>\r\n	    					<td><input type=\"text\" name=\"C06\" value=\"<?=$r4?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 118, '						<tr>\r\n	    					<th>ADenominacion</th>\r\n	    					<td><input type=\"text\" name=\"C07\" value=\"<?=$r5?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 119, '						<tr>\r\n	    					<th>AFundamento</th>\r\n	    					<td><input type=\"text\" name=\"C08\" value=\"<?=$r6?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 120, '						<tr>\r\n	    					<th>AHipervinculo</th>\r\n	    					<td><input type=\"text\" name=\"C09\" value=\"<?=$r7?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 121, '						<tr>\r\n	    					<th>AAreaResp</th>\r\n	    					<td><input type=\"text\" name=\"C010\" value=\"<?=$r8?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 122, '						<tr>\r\n	    					<th>ANota</th>\r\n	    					<td><input type=\"text\" name=\"C011\" value=\"<?=$r9?>\" onkeyup=\"checaMensaje(this.value)\"></td>\r\n	    				</tr>'),
('ttfadear', 'M', 123, '				</table>'),
('ttfadear', 'M', 124, '				<div class=\"botones\">'),
('ttfadear', 'M', 125, '					<a href=\"ListaFac.php\" name=\"cancelar\" class=\"cancelar\">Cancelar</a>'),
('ttfadear', 'M', 126, '					<input type=\"submit\" name=\"Enviar\" class=\"registrar\" value=\"<?=$MesnTiMo?>\" >'),
('ttfadear', 'M', 127, '				</div>'),
('ttfadear', 'M', 128, '			</form>'),
('ttfadear', 'M', 129, '		</div>'),
('ttfadear', 'M', 130, '		<?php'),
('ttfadear', 'M', 131, '			}'),
('ttfadear', 'M', 132, '		?>'),
('ttfadear', 'M', 133, '	</body>'),
('ttfadear', 'M', 134, '</html>');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acopcser`
--
ALTER TABLE `acopcser`
  ADD PRIMARY KEY (`COSClave`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
