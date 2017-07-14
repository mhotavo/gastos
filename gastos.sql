-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2017 a las 15:21:22
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gastos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `ID_CONCEPTO` int(11) NOT NULL,
  `CONCEPTO` varchar(40) NOT NULL,
  `TIPO` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`ID_CONCEPTO`, `CONCEPTO`, `TIPO`) VALUES
(3, 'Apuesta', 'G'),
(5, 'Etb', 'G'),
(7, 'Comida', 'G'),
(8, 'Sueldo', 'I'),
(9, 'PREMIO APUESTA', 'I'),
(10, 'ARREGLO PC/CEL', 'I'),
(11, 'Icetex', 'G'),
(12, 'PAGO CREDITOS', 'G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE `creditos` (
  `ID` int(11) NOT NULL,
  `CREDITO` text,
  `SALDO` double DEFAULT NULL,
  `FECHA_VEN` date DEFAULT NULL,
  `TOTAL_CUOTAS` int(3) DEFAULT NULL,
  `CUOTAS_PAGAS` int(3) DEFAULT NULL,
  `INTERES` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`ID`, `CREDITO`, `SALDO`, `FECHA_VEN`, `TOTAL_CUOTAS`, `CUOTAS_PAGAS`, `INTERES`) VALUES
(2, 'Tarjeta Joven Bancolombia', 1000002, '2017-12-31', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaccion`
--

CREATE TABLE `transaccion` (
  `ID_TRANSACCION` int(11) NOT NULL,
  `ID_CONCEPTO` int(11) NOT NULL,
  `ID_CREDITO` int(11) DEFAULT NULL,
  `DESCRIPCION` text,
  `VALOR` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`ID_TRANSACCION`, `ID_CONCEPTO`, `ID_CREDITO`, `DESCRIPCION`, `VALOR`, `FECHA`, `ID_USUARIO`) VALUES
(1, 3, NULL, 'prueb', 3000, '2017-07-13', 1),
(2, 8, NULL, 'Sueldo Julio', 1283000, '2017-07-13', 1),
(3, 11, NULL, 'Pago de Julio', 180000, '2017-07-13', 1),
(4, 7, NULL, 'Perro caliente al lado de la iglesia', 5000, '2017-07-13', 1),
(5, 12, NULL, '.', 1, '2017-07-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `USER` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `PASS` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `NOMBRES` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `P_APELLIDO` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `S_APELLIDO` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `USER`, `PASS`, `EMAIL`, `NOMBRES`, `P_APELLIDO`, `S_APELLIDO`) VALUES
(1, 'admin', 'admin', 'milton.otavo@gmail.com', 'MILTON', 'OTAVO', 'VARON');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`ID_CONCEPTO`);

--
-- Indices de la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD PRIMARY KEY (`ID_TRANSACCION`),
  ADD KEY `ID_CONCEPTO` (`ID_CONCEPTO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_USUARIO_2` (`ID_USUARIO`),
  ADD KEY `ID_CREDITO` (`ID_CREDITO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `ID_CONCEPTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `ID_TRANSACCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transaccion`
--
ALTER TABLE `transaccion`
  ADD CONSTRAINT `FK_CONCEP_TRAN` FOREIGN KEY (`ID_CONCEPTO`) REFERENCES `conceptos` (`ID_CONCEPTO`),
  ADD CONSTRAINT `FK_USU_TRAN` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
