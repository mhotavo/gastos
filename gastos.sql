-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2017 a las 06:22:10
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

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
  `TIPO` varchar(2) DEFAULT NULL,
  `MENSUAL` varchar(2) NOT NULL DEFAULT 'N',
  `FECHA_VEN` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`ID_CONCEPTO`, `CONCEPTO`, `TIPO`, `MENSUAL`, `FECHA_VEN`) VALUES
(3, 'Apuesta', 'G', 'N', NULL),
(8, 'Sueldo', 'I', 'N', NULL),
(9, 'PREMIO APUESTA', 'I', 'N', NULL),
(10, 'FORMATEO', 'I', 'N', NULL),
(12, 'PAGO CREDITOS', 'G', 'S', NULL),
(13, 'ETB MOVIL', 'G', 'S', 5),
(14, 'SPOTIFY', 'G', 'N', NULL),
(15, 'TRANSPORTE', 'G', 'N', 15),
(16, 'RECIBO DE LA LUZ', 'G', 'S', 16),
(17, 'COMIDA', 'G', 'N', NULL),
(18, 'ROPA', 'G', 'N', NULL),
(19, 'OTROS', 'G', 'N', NULL),
(20, 'AHORRO', 'I', 'N', NULL),
(22, 'CINE', 'G', 'N', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE `creditos` (
  `ID` int(11) NOT NULL,
  `CREDITO` text,
  `SALDO` double DEFAULT NULL,
  `FECHA_VEN` int(2) DEFAULT NULL,
  `TOTAL_CUOTAS` int(3) DEFAULT '0',
  `CUOTAS_PAGAS` int(3) DEFAULT '0',
  `INTERES` double DEFAULT NULL,
  `ULTIMO_PAGO` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`ID`, `CREDITO`, `SALDO`, `FECHA_VEN`, `TOTAL_CUOTAS`, `CUOTAS_PAGAS`, `INTERES`, `ULTIMO_PAGO`) VALUES
(3, 'ICETEX', 7984630, 10, 55, 1, 0, '2017-07-15'),
(4, 'TUYA EXITO', 940000, 17, 0, 0, 0, NULL),
(5, 'TARJETA BANCOLOMBIA', 1269786, 17, 1, 0, 0, NULL);

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
  `ID_USUARIO` int(11) NOT NULL,
  `FECHALOG` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transaccion`
--

INSERT INTO `transaccion` (`ID_TRANSACCION`, `ID_CONCEPTO`, `ID_CREDITO`, `DESCRIPCION`, `VALOR`, `FECHA`, `ID_USUARIO`, `FECHALOG`) VALUES
(10, 8, NULL, 'PAGO QUEEN - Julio 2017', 1233000, '2017-07-13', 1, '2017-07-15 16:04:02'),
(11, 20, NULL, 'Ahorro sueldo Julio', 50000, '2017-07-14', 1, '2017-07-14 18:10:06'),
(14, 22, NULL, 'Los minions en royal films', 30000, '2017-07-14', 1, '2017-07-15 15:02:06'),
(15, 9, NULL, 'Saldo de apuestas anteriores ', 39000, '2017-07-15', 1, '2017-07-15 15:04:50'),
(16, 13, NULL, 'Junio- Julio', 40000, '2017-07-04', 1, '2017-07-15 16:41:45'),
(17, 19, NULL, 'Mama y Hugo', 10000, '2017-07-15', 1, '2017-07-15 18:51:58'),
(20, 12, 3, 'ICETEX', 180000, '2017-07-13', 1, '2017-07-15 21:28:49');

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
  `S_APELLIDO` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CORTE` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `USER`, `PASS`, `EMAIL`, `NOMBRES`, `P_APELLIDO`, `S_APELLIDO`, `CORTE`) VALUES
(1, 'admin', 'admin', 'milton.otavo@gmail.com', 'MILTON', 'OTAVO', 'VARON', 10);

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
  MODIFY `ID_CONCEPTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `transaccion`
--
ALTER TABLE `transaccion`
  MODIFY `ID_TRANSACCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
