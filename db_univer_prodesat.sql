-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2020 a las 06:13:34
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_univer_prodesat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_alumnos`
--

CREATE TABLE `cat_alumnos` (
  `icodigoalumno` int(11) NOT NULL,
  `vchnombres` varchar(50) NOT NULL,
  `vchapellidos` varchar(50) NOT NULL,
  `dtfechanac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_alumnos`
--

INSERT INTO `cat_alumnos` (`icodigoalumno`, `vchnombres`, `vchapellidos`, `dtfechanac`) VALUES
(3333, 'ARTURO', 'RESENDIZ', '1993-06-26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_materias`
--

CREATE TABLE `cat_materias` (
  `vchcodigomateria` varchar(5) NOT NULL,
  `vchmateria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cat_materias`
--

INSERT INTO `cat_materias` (`vchcodigomateria`, `vchmateria`) VALUES
('qwert', 'Español');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_rel_alumno_materia`
--

CREATE TABLE `cat_rel_alumno_materia` (
  `cat_alumnos_icodigoalumno` int(11) NOT NULL,
  `cat_materias_vchcodigomateria` varchar(5) NOT NULL,
  `fcalificacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_alumnos`
--
ALTER TABLE `cat_alumnos`
  ADD PRIMARY KEY (`icodigoalumno`);

--
-- Indices de la tabla `cat_materias`
--
ALTER TABLE `cat_materias`
  ADD PRIMARY KEY (`vchcodigomateria`);

--
-- Indices de la tabla `cat_rel_alumno_materia`
--
ALTER TABLE `cat_rel_alumno_materia`
  ADD KEY `cat_rel_alumno_materia_cat_alumnos_fk` (`cat_alumnos_icodigoalumno`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_rel_alumno_materia`
--
ALTER TABLE `cat_rel_alumno_materia`
  ADD CONSTRAINT `cat_rel_alumno_materia_cat_alumnos_fk` FOREIGN KEY (`cat_alumnos_icodigoalumno`) REFERENCES `cat_alumnos` (`icodigoalumno`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
