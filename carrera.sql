-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2021 a las 07:08:40
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sac1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `ID_CARRERA` int(11) NOT NULL,
  `CARRERA` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `RETICULA` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `NIVEL_ESCOLAR` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CLAVE_OFICIAL` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NOMBRE_CARRERA` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `NOMBRE_REDUCIDO` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CARGA_MAXIMA` smallint(5) UNSIGNED DEFAULT NULL,
  `CREDITOS_TOTALES` smallint(6) DEFAULT NULL,
  `NIVEL` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `MODALIDAD` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`ID_CARRERA`, `CARRERA`, `RETICULA`, `NIVEL_ESCOLAR`, `CLAVE_OFICIAL`, `NOMBRE_CARRERA`, `NOMBRE_REDUCIDO`, `CARGA_MAXIMA`, `CREDITOS_TOTALES`, `NIVEL`, `MODALIDAD`) VALUES
(1, 'Informática', 'II', 'escolarizado', 'IINF-2010-2020', 'Ingeniería Informática', 'Ing. infor', 260, 260, 'Educativo', 'Distancia');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`ID_CARRERA`),
  ADD UNIQUE KEY `MODALIDAD_UNIQUE` (`MODALIDAD`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
