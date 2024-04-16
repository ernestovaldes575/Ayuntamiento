-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2022 a las 19:54:13
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
-- Base de datos: `transparencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acopcser`
--

CREATE TABLE `acopcser` (
  `COSTipSer` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `COSClave` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `COSDescripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `COSDireccion` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `acopcser`
--

INSERT INTO `acopcser` (`COSTipSer`, `COSClave`, `COSDescripcion`, `COSDireccion`) VALUES
('01', '001', 'Facultades de área', 'Transparencia/FacdeAre/FacdeAreCons.php'),
('01', '002', 'Metas y Objetivos de Área', 'Transparencia/MetYObje/MetYObjeCons.php'),
('01', '003', 'Normatividad Aplicable', 'Transparencia/NormApli/NormApliCons.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actipser`
--

CREATE TABLE `actipser` (
  `CTSClave` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `CTSDescripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `actipser`
--

INSERT INTO `actipser` (`CTSClave`, `CTSDescripcion`) VALUES
('01', 'Transparencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adpermi`
--

CREATE TABLE `adpermi` (
  `PAyuntamiento` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `PConsServ` int(11) NOT NULL,
  `PTipoServ` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `POpciServ` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `PConsulta` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `PAlta` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `PModifica` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `PBaja` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `PNumePerm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `adpermi`
--

INSERT INTO `adpermi` (`PAyuntamiento`, `PConsServ`, `PTipoServ`, `POpciServ`, `PConsulta`, `PAlta`, `PModifica`, `PBaja`, `PNumePerm`) VALUES
('105', 1, '01', '002', 'A', 'A', 'A', 'A', 1),
('105', 2, '01', '002', 'A', 'A', 'A', 'A', 2),
('105', 2, '01', '001', 'A', 'A', 'A', 'A', 3),
('105', 1, '01', '001', 'A', 'A', 'A', 'A', 5),
('105', 2, '01', '003', 'A', 'A', 'A', 'A', 6),
('105', 1, '01', '003', 'A', 'A', 'A', 'A', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `normap`
--

CREATE TABLE `normap` (
  `AConsecutivo` int(11) NOT NULL,
  `AAyuntamiento` char(3) CHARACTER SET utf8mb4 NOT NULL,
  `AEjercicio` int(11) NOT NULL,
  `AFechaInicio` date NOT NULL,
  `AFechaTermino` date NOT NULL,
  `ATipoNorma` int(11) NOT NULL,
  `ATipoNormaOtro` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `ADenominacion` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `AFechaDOF` date NOT NULL,
  `AFechaUltima` date NOT NULL,
  `AHipervinculo` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `AAreaResp` int(11) NOT NULL,
  `ANota` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `normap`
--

INSERT INTO `normap` (`AConsecutivo`, `AAyuntamiento`, `AEjercicio`, `AFechaInicio`, `AFechaTermino`, `ATipoNorma`, `ATipoNormaOtro`, `ADenominacion`, `AFechaDOF`, `AFechaUltima`, `AHipervinculo`, `AAreaResp`, `ANota`) VALUES
(0, '105', 2022, '0000-00-00', '0000-00-00', 1, '', '', '0000-00-00', '0000-00-00', '', 87, ''),
(5, '105', 2020, '2020-09-22', '2020-09-17', 2, '8', '7', '2021-09-15', '2021-09-30', 'www.google.com', 37, 'google'),
(34, '105', 2020, '2020-09-15', '2020-09-15', 1, 'Ejemplo  444', 'Ejemplo 444', '2021-09-15', '2021-09-15', 'paso', 37, 'hola'),
(38, '105', 2019, '2019-09-16', '2019-09-16', 4, '44', '34', '2020-09-23', '2020-09-30', 'www.lapser.com', 37, 'non'),
(40, '105', 2019, '2019-09-01', '2019-09-01', 2, '46', 'origen', '2021-09-29', '2021-09-29', 'www.uippe.com', 37, 'no'),
(42, '105', 2021, '2021-09-15', '2021-09-29', 1, 'norma 65', 'org', '2021-09-14', '2021-09-24', 'www.lookboock.com', 37, 'none'),
(43, '105', 2021, '2021-09-08', '2021-09-17', 1, 'norma 82', 'no', '2021-09-07', '2021-09-15', 'www.block.com', 37, 'standart'),
(44, '105', 2021, '2021-09-06', '2021-09-24', 1, 'norma 21', 'eject', '2021-09-14', '2021-09-28', 'www.papitas.com', 37, 'end'),
(45, '105', 2021, '2021-09-23', '2021-09-23', 2, 'Ejemplo tesoreria', '345', '2021-09-23', '2021-09-23', 'ddd', 37, 'dadas'),
(47, '105', 2021, '0000-00-00', '0000-00-00', 1, '', '', '0000-00-00', '0000-00-00', '', 37, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarea`
--

CREATE TABLE `tcarea` (
  `CARClave` int(11) NOT NULL,
  `CARDescripcion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tcarea`
--

INSERT INTO `tcarea` (`CARClave`, `CARDescripcion`) VALUES
(1, 'Secretaría del Ayuntamiento'),
(2, 'Instituto de Cultura Física y Deporte'),
(3, 'Unidad de Información, Planeación, Programación y Evaluación'),
(4, 'Dirección de Administración'),
(5, 'Tesorería Municipal'),
(6, 'Dirección de Gestión de Programas Sociales'),
(7, 'Desarrollo Económico'),
(8, 'Presidencia Municipal - Secretario Particular'),
(9, 'Unidad de Transparencia'),
(10, 'Órgano de Control Interno'),
(11, 'Coordinación de Mejora Regulatoria'),
(12, 'Coordinación de Comunicación Social'),
(13, 'Dirección de Infraestructura y Obra Pública'),
(14, 'Dirección de Medio Ambiente'),
(15, 'Defensoría Municipal de Derechos Humanos'),
(16, 'Dirección de Servicios Públicos'),
(17, 'Coordinación Jurídica'),
(18, 'Dirección de Cultura y Educación'),
(19, 'Instituto de  la Juventud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcejercicio`
--

CREATE TABLE `tcejercicio` (
  `CEJClave` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `CEJDescripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tcejercicio`
--

INSERT INTO `tcejercicio` (`CEJClave`, `CEJDescripcion`) VALUES
('2019', '2019 Año'),
('2020', '2019 Año'),
('2021', '2021. Añ0'),
('2022', '2022 Año');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcnormatividad`
--

CREATE TABLE `tcnormatividad` (
  `CNOClave` int(11) NOT NULL,
  `CNODescripcion` varchar(60) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tcnormatividad`
--

INSERT INTO `tcnormatividad` (`CNOClave`, `CNODescripcion`) VALUES
(1, 'Normatividad 01'),
(2, 'Normatividad 02'),
(3, 'Normatividad 03'),
(4, 'Normatividad 04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttfadear`
--

CREATE TABLE `ttfadear` (
  `AConsecutivo` int(11) NOT NULL,
  `AAyuntamiento` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `AEjercicio` int(11) NOT NULL,
  `AFechaInicio` date NOT NULL,
  `AFechaTermino` date NOT NULL,
  `AArea` int(11) NOT NULL,
  `ADenominacion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `AFundamento` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `AHipervinculo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `AAreaResp` int(11) NOT NULL,
  `ANota` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ttfadear`
--

INSERT INTO `ttfadear` (`AConsecutivo`, `AAyuntamiento`, `AEjercicio`, `AFechaInicio`, `AFechaTermino`, `AArea`, `ADenominacion`, `AFundamento`, `AHipervinculo`, `AAreaResp`, `ANota`) VALUES
(0, '', 0, '2021-11-25', '2021-11-25', 87, 'deno', 'funda', 'hiper', 0, ''),
(1, '', 2021, '2021-10-07', '2021-10-02', 0, '123', '123', '123', 1, '123'),
(2, '', 2021, '2021-10-01', '2021-10-22', 0, '345', '345', '345', 1, '345'),
(3, '', 2021, '2021-10-08', '2021-10-13', 0, '12', '12', '12', 16, '12'),
(4, '', 2021, '2021-10-08', '2021-10-13', 0, '12', '12', '12', 16, '12'),
(11, '105', 2021, '2021-12-15', '2021-12-17', 87, 'denominacion', 'fundamento', 'hiper', 3, 'nota'),
(19, '105', 2022, '2022-03-24', '2022-04-20', 87, 'denomina', 'dundamen', 'hipervincu', 18, 'nota'),
(24, '', 0, '2022-11-25', '2022-11-25', 0, 'hola deno', 'hola funda', 'hola hiper', 0, 'no hay nota'),
(25, '', 0, '2022-11-25', '2022-11-25', 0, 'hdeno', 'hfunda', 'hhiper', 13, 'notah'),
(26, '105', 2022, '0000-00-00', '0000-00-00', 10, 'aa', 'aa', 'aa', 0, 'aa'),
(27, '105', 2022, '2022-11-25', '2022-11-25', 87, 'hola funda', 'hola hiper', 'hnhh', 12, 'nota');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acopcser`
--
ALTER TABLE `acopcser`
  ADD PRIMARY KEY (`COSDescripcion`);

--
-- Indices de la tabla `actipser`
--
ALTER TABLE `actipser`
  ADD PRIMARY KEY (`CTSClave`);

--
-- Indices de la tabla `adpermi`
--
ALTER TABLE `adpermi`
  ADD PRIMARY KEY (`PNumePerm`);

--
-- Indices de la tabla `normap`
--
ALTER TABLE `normap`
  ADD PRIMARY KEY (`AConsecutivo`);

--
-- Indices de la tabla `tcarea`
--
ALTER TABLE `tcarea`
  ADD PRIMARY KEY (`CARClave`);

--
-- Indices de la tabla `tcejercicio`
--
ALTER TABLE `tcejercicio`
  ADD PRIMARY KEY (`CEJClave`);

--
-- Indices de la tabla `tcnormatividad`
--
ALTER TABLE `tcnormatividad`
  ADD PRIMARY KEY (`CNOClave`);

--
-- Indices de la tabla `ttfadear`
--
ALTER TABLE `ttfadear`
  ADD PRIMARY KEY (`AConsecutivo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adpermi`
--
ALTER TABLE `adpermi`
  MODIFY `PNumePerm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tcarea`
--
ALTER TABLE `tcarea`
  MODIFY `CARClave` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `ttfadear`
--
ALTER TABLE `ttfadear`
  MODIFY `AConsecutivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
