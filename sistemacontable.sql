-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2017 a las 03:30:02
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemacontable`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `idcatalogo` int(11) NOT NULL,
  `codigocuenta` varchar(10) NOT NULL,
  `nombrecuenta` varchar(40) NOT NULL,
  `tipocuenta` varchar(20) NOT NULL,
  `saldo` varchar(20) NOT NULL,
  `r` varchar(1) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`idcatalogo`, `codigocuenta`, `nombrecuenta`, `tipocuenta`, `saldo`, `r`, `nivel`) VALUES
(1, '1', 'Activo', 'ACTIVO', 'DEUDOR', '', 1),
(2, '11', 'Activo Corriente', 'ACTIVO', 'DEUDOR', 'R', 2),
(3, '111', 'Caja', 'ACTIVO', 'DEUDOR', 'R', 3),
(4, '2', 'Pasivo', 'PASIVO', 'ACREEDOR', 'R', 1),
(5, '21', 'Pasivo Corriente', 'PASIVO', 'ACREEDOR', 'R', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`idcatalogo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `idcatalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
