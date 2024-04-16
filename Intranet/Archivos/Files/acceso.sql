-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2022 a las 19:52:59
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
-- Base de datos: `acceso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acayuntamiento`
--

CREATE TABLE `acayuntamiento` (
  `CAYClave` char(3) NOT NULL,
  `CAYDescripcion` varchar(50) NOT NULL,
  `CAYCalle` varchar(65) NOT NULL,
  `CAYNoExt` varchar(10) NOT NULL,
  `CAYNoInt` varchar(30) NOT NULL,
  `CAYColonia` varchar(65) NOT NULL,
  `CAYCodPostal` varchar(5) NOT NULL,
  `CAYMunicipio` varchar(3) NOT NULL,
  `CAYEstado` varchar(2) NOT NULL,
  `CAYTelefono` varchar(10) NOT NULL,
  `CAYCorreo` varchar(30) NOT NULL,
  `CAYPaginaWeb` varchar(40) NOT NULL,
  `CAYTelefonoN` varchar(10) NOT NULL,
  `CAYCorreoN` varchar(30) NOT NULL,
  `CAYRFC` varchar(15) NOT NULL,
  `CAYCuentaPago` varchar(30) NOT NULL,
  `CAYRegistroPatronal` varchar(30) NOT NULL,
  `CAYAdquiValiTitu` char(1) NOT NULL,
  `CAYAreaConsTallMec` int(11) NOT NULL,
  `CAYIGECEM` char(3) NOT NULL,
  `CAYINEGI` char(3) NOT NULL,
  `CAYTipo` char(1) NOT NULL,
  `CAYOSFEM` char(3) NOT NULL,
  `CAYToponimia` char(1) NOT NULL,
  `CAYPalacio` char(1) NOT NULL,
  `CAYLatitud` varchar(20) NOT NULL,
  `CAYLongitud` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acayuntamiento`
--

INSERT INTO `acayuntamiento` (`CAYClave`, `CAYDescripcion`, `CAYCalle`, `CAYNoExt`, `CAYNoInt`, `CAYColonia`, `CAYCodPostal`, `CAYMunicipio`, `CAYEstado`, `CAYTelefono`, `CAYCorreo`, `CAYPaginaWeb`, `CAYTelefonoN`, `CAYCorreoN`, `CAYRFC`, `CAYCuentaPago`, `CAYRegistroPatronal`, `CAYAdquiValiTitu`, `CAYAreaConsTallMec`, `CAYIGECEM`, `CAYINEGI`, `CAYTipo`, `CAYOSFEM`, `CAYToponimia`, `CAYPalacio`, `CAYLatitud`, `CAYLongitud`) VALUES
('105', 'Zinacantepec', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acmenu`
--

CREATE TABLE `acmenu` (
  `CMEClave` int(11) NOT NULL,
  `CMETitulo` char(20) COLLATE utf8_spanish2_ci NOT NULL,
  `CMEDescri` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `CMEBasDat` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `CMEConexion` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `CMEVariable` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `acmenu`
--

INSERT INTO `acmenu` (`CMEClave`, `CMETitulo`, `CMEDescri`, `CMEBasDat`, `CMEConexion`, `CMEVariable`) VALUES
(1, 'Acceso', 'Acceso', 'acceso', 'conlogin.php', ''),
(2, 'Transparencia', 'Transparencia', 'transparencia', 'conexion.php', ''),
(3, 'TecnInfo', 'Tecnologías de la Información', 'tecninfo', 'conteinf.php', '');

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
('01', '001', 'Usuarios', 'Acceso/Usuarios/UsuarioCons.php'),
('01', '002', 'Programas', 'Acceso/Programas/BaseDato.php');

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
('01', 'Catalogos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acunidades`
--

CREATE TABLE `acunidades` (
  `CUNConsecutivo` int(11) NOT NULL,
  `CUNAyuntamiento` char(3) NOT NULL,
  `CUNDependencia` char(3) NOT NULL,
  `CUNSubdireccion` char(1) NOT NULL,
  `CUNDepartamento` char(1) NOT NULL,
  `CUNClaveUnidad` varchar(20) NOT NULL,
  `CUNDescripcion` char(65) NOT NULL,
  `CUNDescriCorta` char(65) NOT NULL,
  `CUNHorario` char(70) NOT NULL,
  `CUNTelefonoOficina` char(70) NOT NULL,
  `CUNCorreo` char(70) NOT NULL,
  `CUNDomicilio` varchar(100) NOT NULL,
  `CUNProfesion` char(10) NOT NULL,
  `CUNTitular` int(11) NOT NULL,
  `CUNTitularEncarga` char(1) NOT NULL,
  `CUNCargoTitular` char(80) NOT NULL,
  `CUNTelefonoTitular` varchar(50) NOT NULL,
  `CUNCorreoTitular` varchar(50) NOT NULL,
  `CUNFotoTitular` varchar(50) NOT NULL,
  `CUNEnlaceAdministrativo` int(11) NOT NULL,
  `CUNTelefonoEnlace` varchar(50) NOT NULL,
  `CUNCorreoEnlace` varchar(50) NOT NULL,
  `CUNFotoEnlace` varchar(20) NOT NULL,
  `CUNLatitud` varchar(20) NOT NULL,
  `CUNLongitud` varchar(20) NOT NULL,
  `CUNEstado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acunidades`
--

INSERT INTO `acunidades` (`CUNConsecutivo`, `CUNAyuntamiento`, `CUNDependencia`, `CUNSubdireccion`, `CUNDepartamento`, `CUNClaveUnidad`, `CUNDescripcion`, `CUNDescriCorta`, `CUNHorario`, `CUNTelefonoOficina`, `CUNCorreo`, `CUNDomicilio`, `CUNProfesion`, `CUNTitular`, `CUNTitularEncarga`, `CUNCargoTitular`, `CUNTelefonoTitular`, `CUNCorreoTitular`, `CUNFotoTitular`, `CUNEnlaceAdministrativo`, `CUNTelefonoEnlace`, `CUNCorreoEnlace`, `CUNFotoEnlace`, `CUNLatitud`, `CUNLongitud`, `CUNEstado`) VALUES
(1, '105', 'A00', '0', '0', 'A00', 'Presidencia', 'Presidencia', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(2, '105', 'A00', '0', '0', 'A00-01', 'Secretaria Particular', 'Secretaria Particular', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(3, '105', 'A00', '0', '0', 'A00-01-01', 'Coordinación de logística', 'Logística', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(5, '105', 'A01', '0', '0', 'A00-18', 'Coordinación de Comunicación Social', 'Comunicación Social', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(6, '105', 'A00', '0', '0', '', 'Departamento de Enlace con Medios', 'Depto. de Enlace con Medios', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(7, '105', 'A00', '0', '0', '', 'Departamento Área de Información', 'Área de Información', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(8, '105', 'A02', '0', '0', 'A00-26', 'Defensoría Municipal de los Derechos Humanos', 'Derechos Humanos', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(9, '105', 'B01', '0', '0', 'B01', 'Sindicatura', 'Sindicatura', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(16, '105', 'C01', '0', '0', 'C01', 'Primer Regiduría', 'Primer Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(17, '105', 'C02', '0', '0', 'C02', 'Segunda Regiduría', 'Segunda Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(18, '105', 'C03', '0', '0', 'C03', 'Tercer Regiduría', 'Tercer Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(19, '105', 'C04', '0', '0', 'C04', 'Cuarta Regiduría', 'Cuarta Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(20, '105', 'C05', '0', '0', 'C05', 'Quinta Regiduría', 'Quinta Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(21, '105', 'C06', '0', '0', 'C06', 'Sexta Regiduría', 'Sexta Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(22, '105', 'C07', '0', '0', 'C07', 'Séptima Regiduría', 'Séptima Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(23, '105', 'C08', '0', '0', 'C08', 'Octava Regiduría', 'Octava Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(24, '105', 'C09', '0', '0', 'C09', 'Novena Regiduría', 'Novena Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(25, '105', 'C10', '0', '0', 'C10', 'Decima Regiduría', 'Decima Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(26, '105', 'C11', '0', '0', 'C11', 'Decima primer Regiduría', 'Decima primer Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(27, '105', 'C12', '0', '0', 'C12', 'Decima primer Regiduría', 'Decima primer Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(28, '105', 'C13', '0', '0', 'C13', 'Decima segunda Regiduría', 'Decima segunda Regiduría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(29, '105', 'D00', '0', '0', 'A00-03', 'Secretaría del Ayuntamiento', 'Secretaría del Ayuntamiento', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(30, '105', 'D00', '0', '0', 'A00-03-04', 'Cronista Municipal', 'Cronista Municipal', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(31, '105', 'D00', '0', '0', '', 'Subdirección Técnica y de Normatividad', 'Sub. Tec. y de Normatividad', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(32, '105', 'D00', '0', '0', '', 'Area Técnica de Cabildo', 'Técnico de Cabildo', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(37, '105', 'E00', '0', '0', 'A00-08', 'Dirección de Administración', 'Administración', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(38, '105', 'E00', '0', '0', '', 'Subdirección de Recursos Humanos', 'Recursos Humanos', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(39, '105', 'E00', '0', '0', '', 'Departamento de Relaciones Laborales', 'Relaciones Laborales', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(40, '105', 'E00', '0', '0', '', 'Departamento de Nominas', 'Depto de Nominas', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(41, '105', 'E00', '0', '0', '', 'Subdirección de Recursos Materiales', 'Recursos Materiales', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(42, '105', 'E00', '0', '0', '', 'Departamento de Servicios Generales', 'Servicios Generales', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(45, '105', 'E00', '0', '0', '', 'Departamento de Adquisiciones', 'Adquisiciones', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(48, '105', 'S00', '0', '0', 'A00-14', 'Unidad de Información, Planeación, Programación y Evaluación', 'UIPPE', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(50, '105', 'S00', '0', '0', '', 'Subdirección de Planeación', 'Planeación', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(51, '105', 'E01', '0', '0', '', 'Subdirección de Tecnologías de la Información', 'Tecnologías de la Información', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(53, '105', 'E01', '0', '0', '', 'Subdirección de Financiamiento de Proyectos', 'Financiamiento de Proyectos', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(55, '105', 'F00', '0', '0', 'A00-06-03', 'Subdirección de Desarrollo Urbano', 'Desarrollo Urbano', '09:00 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(58, '105', 'F00', '0', '0', '', 'Departamento de Licencias de Construcción y Uso de Suelo', 'Licencias de Construcción', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(59, '105', 'F00', '0', '0', '', 'Departamento de Normatividad y Publicidad Vial', 'Normatividad y Publicidad Vial', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(62, '105', 'F00', '0', '0', 'A00-06', 'Dirección de Obras Públicas', 'Obras Públicas', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(63, '105', 'L00', '0', '0', '', 'Departamento de Control Presupuestal', 'Depto. de Control Presupuestal', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(64, '105', 'F00', '0', '0', '', 'Subdirección de Construcción', 'Sub.  de Construcción', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(65, '105', 'F00', '0', '0', '', 'Departamento de Proyectos y Presupuesto', 'Depto de Proyectos y Presupuesto', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(66, '105', 'F00', '0', '0', '', 'Subdirección de Normatividad', 'Sub. de Normatividad', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(67, '105', 'F00', '0', '0', '', 'Departamento de Concursos Contratos, Estimaciones y Precios Unita', 'Concursos Contratos, Estimaciones y Precios Unita', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(68, '105', 'G00', '0', '0', 'A00-13', 'Dirección de Medio Ambiente', 'Medio Ambiente', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(69, '105', 'H00', '0', '0', 'A00-17', 'Dirección de Servicios Públicos', 'Servicios Públicos', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(70, '105', 'H00', '0', '0', '', 'Departamento de Operación Sanitaria', 'Depto de Operación Sanitaria', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(74, '105', 'I00', '0', '0', 'A00-07-01', 'Dirección de Desarrollo Humano y Bienestar Social', 'Des. Humano y Bienestar Social', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(75, '105', '00I', '0', '0', '', 'Departamento de Planeación y Análisis', 'Depto de Planeación y Análisis', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(76, '105', '00I', '0', '0', '', 'Departamento de Programas Sociales Federales', 'Depto de Programas Sociales Federales', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(77, '105', 'J00', '0', '0', 'A00-10', 'Dirección de Gobernación', 'Gobernación', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(81, '105', 'K00', '0', '0', 'A00-11', 'Organo Interno de Control', 'Organo Interno de Control', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(83, '105', 'K00', '0', '0', '', 'Subcontraloría', 'Subcontraloría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(84, '105', 'K00', '0', '0', '', 'Departamento de Auditoría', 'Dep. de Auditoría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(85, '105', 'K00', '0', '0', '', 'Departamento de Quejas y Procedimientos', 'Depto de Quejas y Procedimientos', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(87, '105', 'L00', '0', '0', 'A00-09', 'Tesorería Municipal', 'Tesorería Municipal', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(88, '105', 'L00', '0', '0', 'A00-09-01', 'Subdirección de Ingresos', 'Ingresos', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(89, '105', 'L00', '0', '0', '', 'Departamento de Fiscalización', 'Dep. Fiscalización', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(90, '105', 'L00', '0', '0', '', 'Caja General', 'Caja General', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(91, '105', 'L00', '0', '0', 'A00-09-04', 'Subdirección de Catastro', 'Catastro', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(92, '105', 'L00', '0', '0', '', 'Departmento de Información Geografica y Catastral\r\n', 'Dep. de Inf. Geografica y Catastral\r\n', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(93, '105', 'L00', '0', '0', '', 'Departamento de Valuación', 'Dep. de Valuación', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(94, '105', 'L00', '0', '0', '', 'Subdirección de Egresos', 'Sub. de Egresos', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(95, '105', 'L00', '0', '0', '', 'Presupuesto', 'Presupuesto', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(96, '105', 'L00', '', '', 'A00-09-02-01', 'Departamento de Contabilidad', 'Dep. de Contabilidad', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(97, '105', 'N00', '0', '0', 'A00-05', 'Dirección de Desarrollo Económico', 'Desarrollo Económico', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(98, '105', 'N00', '0', '0', '', 'Departamento de Des Econo 01', 'Des. Eco 01', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(100, '105', 'N00', '0', '0', '', 'Departamento de Des Econo 02', 'Des. Eco 02', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(102, '105', 'O00', '0', '0', 'A00-12', 'Dirección de Educación, Cultura', 'Educación, Cultura', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(103, '105', 'O00', '0', '0', '', 'Coordinador de Educación', 'Coordinador de Educación', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(104, '105', 'N00', '0', '0', 'A00-15', 'Direccion de Turismo', 'Turismo', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(105, '105', 'Q00', '0', '0', 'A00-04', 'Dirección de Seguridad Pública', 'Seguridad Pública', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(109, '105', 'Q00', '0', '0', '', 'Subdirección de Seguridad Pública', 'Sub.  de Seguridad Pública', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(111, '105', 'T00', '0', '0', 'A00-16', 'Coordinación de Protección Civil y Bomberos', 'Protección Civil y Bomberos', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(113, '105', 'A00', '0', '0', 'A00-19', 'Secretaría Técnica de Seguridad Publica', 'Sria Tec. de Seguridad Publica', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(114, '105', 'S00', '0', '0', '', 'Departamento de Planeación y Evaluación', 'Planeación y Evaluación', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(115, '105', 'E01', '0', '0', '', 'Departamento de Innovación', 'Innovación', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(116, '105', 'F00', '0', '0', '', 'Departamento de Mantenimiento y Maquinaria', 'Depto. de Mantenimiento y Maquinaria', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(117, '105', 'F00', '0', '0', '', 'Departamento de Supervisión de Obras', 'Depto de Supervisión de Obras', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(119, '105', 'A00', '0', '0', 'A00-02', 'Secretaria Técnica', 'Secretaria Técnica', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(120, '105', 'A00', '0', '0', '', 'Coordinación Jurídica', 'Jurídico', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(121, '105', 'G00', '0', '0', '', 'Departamento Ambiental', 'Depto Ambiental', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(122, '105', 'OPD', '0', '0', '', 'OPDAPAS', 'OPDAPAS', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(125, '105', 'D00', '0', '0', 'A00-03-06', 'Registro Civil 01', 'Registro Civil 01', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(129, '105', 'DIF', '0', '0', '', 'Sistema Municipal DIF', 'Sistema Municipal DIF', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(142, '105', 'H00', '0', '0', 'A00-17-02', 'Rastro Municipal', 'Rastro Municipal', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(143, '105', 'IMC', '0', '0', '', 'IMCUFIDEZ', 'IMCUFIDEZ', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(144, '105', 'K00', '0', '0', '', 'Intervenciones de Control', 'Intervenciones de Control', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(145, '105', 'A00', '0', '0', '', 'Asuntos Laborales', 'Asuntos Laborales', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(146, '105', 'A00', '0', '0', '', 'Ofiliacilia de hechos de transito', 'Ofiliacilia de hechos de transito', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(147, '105', 'A00', '0', '0', '', 'Oficilia Mediadora y Conciciliadora', 'Oficilia Mediadora y Conciciliadora', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(148, '105', 'A00', '0', '0', '', 'Oficilia Calificadora', 'Oficilia Calificadora', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(149, '105', 'M00', '0', '0', 'A00-23', 'Coordinación Juridica', 'Coordinación Juridica', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(150, '105', 'D00', '0', '0', 'A00-03-07', 'Registro Civil 02', 'Registro Civil 02', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(151, '105', 'D00', '0', '0', '', 'Salon del Pueblo', 'Salon del Pueblo', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(152, '105', 'D00', '0', '0', '', 'Salon de Cabildo', 'Salon de Cabildo', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(153, '105', 'D00', '0', '0', '', 'Reclutamiento', 'Reclutamiento', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(154, '105', 'H00', '0', '0', 'A00-17-01', 'Peatones', 'Peatones', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(155, '105', 'E00', '0', '0', '', 'Intendencia', 'Intendencia', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(156, '105', 'E00', '0', '0', '', 'Control Patrimonial', 'Control Patrimonial', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(157, '105', 'O00', '0', '0', '', 'Bibliotecas', 'Bibliotecas', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(158, '105', 'D00', '0', '0', '', 'Archivo Municipal', 'Archivo Municipal', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(159, '105', 'H00', '0', '0', '', 'Antirrabico', 'Antirrabico', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(160, '105', 'D00', '0', '0', '', 'Oficilia de partes', 'Oficilia de partes', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(161, '105', 'I00', '0', '0', 'A00-25', 'Instituto Municipal de la Juventud', 'Instituto Municipal de la Juventud', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(162, '105', 'I00', '0', '0', 'A00-24', 'Instituto Municipal de la Mujer', 'Instituto Municipal de la Mujer', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(163, '105', 'C01', '0', '0', '', 'Primer Regiduría B', 'Primer Regiduría B', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(164, '105', 'D00', '0', '0', '', 'Departamento Patrimonial', 'Departamento Patrimonial', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(165, '105', 'D00', '0', '0', '', 'Junta Municipal', 'Junta Municipal', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(166, '105', 'A00', '0', '0', 'A00-20', 'Unidad de Transparencia y Accesos a la Información', 'Transparencia y Accesos a la Información', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(167, '105', 'H00', '0', '0', 'A00-17-03', 'Area de Alumbrado Publico', 'Alumbrado Publico', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(168, '105', 'H00', '0', '0', 'A00-17-06', 'Area de Parques y Jardines', 'Parques y Jardines', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(169, '105', 'N00', '0', '0', '', 'Departamento del Empleo', 'Depto Empleo', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(170, '105', 'A00', '0', '0', '', 'Coordinación General de Mejora Regulatoria', 'Mejora Regulatoria', '', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(171, '105', 'N00', '0', '0', '', 'Coordinación de Desarrollo Agropecuario', 'Desarrollo Agropecuario', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(172, '105', 'F00', '0', '0', 'A00-06-03-02', 'Desarrollo Metropolitano y Movilidad', 'Desarrollo Metropolitano y Movilidad', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(173, '105', 'N00', '0', '0', '', 'Coordinación de Transporte', 'Transporte', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(174, '105', 'I00', '0', '0', 'A00-07', 'Dirección de Programas Sociales', 'Programas Sociales', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(175, '105', '00I', '0', '0', '', 'Coordinador de Programas Estatales y Federales', 'Programas Estatales y Federales', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(176, '105', 'A00', '0', '0', '', 'Coordinación de Atención Ciudadana', 'Atención Ciudadana', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(177, '105', 'A00', '0', '0', '', 'Coordinación de Gestión Social', 'Gestión Social', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(178, '105', 'N00', '0', '0', '', 'Coordinación Desarrollo Agro', 'Coordinación Desarrollo Agro', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(179, '105', 'DIF', '0', '0', '', 'DIF Alimentacion', 'DIF Alimentacion', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(180, '105', 'DIF', '0', '0', '', 'DIF Prevención', 'DIF Prevención', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(181, '105', 'DIF', '0', '0', '', 'DIF Adultos Mayores', 'DIF Adultos Mayores', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(182, '105', 'DIF', '0', '0', '', 'DIF Salud y Atención a la Discapacidad', 'DIF Salud y Atención a la Discapacidad', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(183, '105', 'DIF', '0', '0', '', 'DIF Administración y Finanzas', 'DIF Administración y Finanzas', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', ''),
(184, '105', 'DIF', '0', '0', '', 'DIF Contraloría', 'DIF Contraloría', '09:00 a 18:00', '', '', '', '', 0, '', '', '', '', '', 0, '', '', '', '', '', '');

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
('105', 2, '01', '001', 'A', 'A', 'A', 'A', 1),
('105', 2, '01', '002', 'A', 'A', 'A', 'A', 2),
('105', 1, '01', '001', 'I', 'A', 'I', 'A', 3),
('105', 2, '01', '003', 'A', 'A', 'A', 'A', 4),
('105', 1, '01', '002', 'A', 'A', 'A', 'A', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atacceso`
--

CREATE TABLE `atacceso` (
  `AConsecut` int(11) NOT NULL,
  `AClaceAcce` char(6) NOT NULL,
  `AContAcce` char(6) NOT NULL,
  `AAyuntamiento` char(3) NOT NULL,
  `ANombre` varchar(50) NOT NULL,
  `AUnidAdmi` char(5) NOT NULL,
  `ATipoUnid` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `atacceso`
--

INSERT INTO `atacceso` (`AConsecut`, `AClaceAcce`, `AContAcce`, `AAyuntamiento`, `ANombre`, `AUnidAdmi`, `ATipoUnid`) VALUES
(1, '000001', '000001', '105', 'Horacio Reyes Ramirez', '37', 'A'),
(2, '000002', '000002', '105', 'Diego Castro de Jesus', '87', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atpermen`
--

CREATE TABLE `atpermen` (
  `PAyuntamiento` char(3) COLLATE utf8_spanish2_ci NOT NULL,
  `PConsServ` int(11) NOT NULL,
  `PMenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `atpermen`
--

INSERT INTO `atpermen` (`PAyuntamiento`, `PConsServ`, `PMenu`) VALUES
('105', 1, 2),
('105', 2, 2),
('105', 1, 1),
('105', 2, 1),
('105', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atusuario`
--

CREATE TABLE `atusuario` (
  `UConsecut` int(11) NOT NULL,
  `UAyuntamiento` char(3) NOT NULL,
  `UNumeroEmpleado` char(10) NOT NULL,
  `UStatus` char(1) NOT NULL,
  `UNombre` varchar(50) NOT NULL,
  `UPaterno` varchar(50) NOT NULL,
  `UMaterno` varchar(50) NOT NULL,
  `UUnidad` int(11) NOT NULL,
  `UPuestoFuncional` varchar(30) NOT NULL,
  `UFoto` varchar(20) NOT NULL,
  `UFechaAlta` date NOT NULL,
  `UFechaBaja` date NOT NULL,
  `UFechMod` date NOT NULL,
  `UServidorAct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `atusuario`
--

INSERT INTO `atusuario` (`UConsecut`, `UAyuntamiento`, `UNumeroEmpleado`, `UStatus`, `UNombre`, `UPaterno`, `UMaterno`, `UUnidad`, `UPuestoFuncional`, `UFoto`, `UFechaAlta`, `UFechaBaja`, `UFechMod`, `UServidorAct`) VALUES
(1, '105', '04682', 'O', 'Horacio', 'Reyes', 'Ramirez', 37, 'Ingeniero', 'hh', '2021-11-16', '2021-12-01', '2021-11-25', 1),
(2, '105', '00002', 'O', 'Diego Armando', 'Castro', 'de Jesus', 87, 'no se', '123', '2021-11-02', '2021-11-18', '2021-12-02', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acmenu`
--
ALTER TABLE `acmenu`
  ADD PRIMARY KEY (`CMEClave`);

--
-- Indices de la tabla `acopcser`
--
ALTER TABLE `acopcser`
  ADD PRIMARY KEY (`COSTipSer`,`COSClave`);

--
-- Indices de la tabla `acunidades`
--
ALTER TABLE `acunidades`
  ADD PRIMARY KEY (`CUNConsecutivo`);

--
-- Indices de la tabla `adpermi`
--
ALTER TABLE `adpermi`
  ADD PRIMARY KEY (`PNumePerm`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adpermi`
--
ALTER TABLE `adpermi`
  MODIFY `PNumePerm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
