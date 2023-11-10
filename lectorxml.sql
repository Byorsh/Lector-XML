-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2023 a las 23:58:11
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lectorxml`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id` int(11) NOT NULL,
  `claveProdServ` varchar(200) NOT NULL,
  `claveUnidad` varchar(10) NOT NULL,
  `unidad` varchar(20) NOT NULL,
  `cantidad` float NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `valorUnitario` float NOT NULL,
  `descuento` float NOT NULL,
  `importeBase` float NOT NULL,
  `base` float NOT NULL,
  `idFactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `claveProdServ`, `claveUnidad`, `unidad`, `cantidad`, `descripcion`, `valorUnitario`, `descuento`, `importeBase`, `base`, `idFactura`) VALUES
(1, '44103103', 'H87', 'PIEZA', 1, 'TONER HP 79A COMPATIBLE', 361.11, 0, 28.89, 361.11, 1),
(2, '43231500', 'H87', 'PIEZA', 1, 'ACT.ESP CONTPAQi FACTURA ELECTRÓNICA/ COMERCIAL START', 2966.5, 741.63, 355.98, 2224.87, 2),
(3, '43231505', 'H87', 'PIEZA', 1, 'ACT.ESPECIAL CONTPAQ i NOMINAS MONOUSUARIONo. Pedido: 797114', 5006.5, 1251.63, 600.78, 3754.87, 2),
(4, '44103100', 'H87', 'PIEZA', 1, 'ROLLO TERMICO EC, 80 X 70 MM, CAJA BC C/50', 1388.89, 0, 111.11, 1388.89, 3),
(5, '55121600', 'H87', 'PIEZA', 2, 'ROLLO DE ETIQUETA P/BASCULA C/1000 DE 51 X 25', 87.96, 0, 14.07, 175.93, 3),
(6, '44103105', 'H87', 'PIEZA', 1, 'CARTUCHO EPSON T544 MAGENTA 65ML', 240.74, 0, 19.26, 240.74, 3),
(7, '44103105', 'H87', 'PIEZA', 1, 'CARTUCHO EPSON T544 CYAN 65ML', 240.74, 0, 19.26, 240.74, 3),
(8, '44103105', 'H87', 'PIEZA', 1, 'CARTUCHO EPSON T544 AMARILLO 65ML', 240.74, 0, 19.26, 240.74, 3),
(9, '44103105', 'H87', 'PIEZA', 1, 'CARTUCHO EPSON T544 NEGRO 65M', 240.74, 0, 19.26, 240.74, 3),
(10, '43222609', 'H87', 'PIEZA', 1, 'ROUTER INALAMBRICO GIGABIT DUAL BAND AC ARCHER TP-LINK ARCHE', 1041.67, 0, 83.33, 1041.67, 4),
(11, '81112300', 'E48', 'SERVICIO', 1, 'Mantenimiento y soporte de equipo de computo\nREVISION DE CONFIGURACION DE IMPRESORA Y\r\nCONFIGURACION DE ACCESS POINT.', 185.19, 0, 14.82, 185.18, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `uuid` varchar(100) NOT NULL,
  `serie` varchar(10) NOT NULL,
  `folio` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `lugarExpedicion` varchar(10) NOT NULL,
  `metodoPago` varchar(10) NOT NULL,
  `moneda` varchar(10) NOT NULL,
  `subtotal` float NOT NULL,
  `costoBase` float NOT NULL,
  `importeIva` float NOT NULL,
  `tasa` float NOT NULL,
  `total` float NOT NULL,
  `rfcEmisor` varchar(50) NOT NULL,
  `nombreEmisor` varchar(200) NOT NULL,
  `regimenFiscalEmisor` varchar(100) NOT NULL,
  `rfcReceptor` varchar(50) NOT NULL,
  `nombreReceptor` varchar(200) NOT NULL,
  `regimenFiscalReceptor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `uuid`, `serie`, `folio`, `fecha`, `lugarExpedicion`, `metodoPago`, `moneda`, `subtotal`, `costoBase`, `importeIva`, `tasa`, `total`, `rfcEmisor`, `nombreEmisor`, `regimenFiscalEmisor`, `rfcReceptor`, `nombreReceptor`, `regimenFiscalReceptor`) VALUES
(1, 'B1549B59-96C3-466B-9F6F-EF3330CB2657', 'B', '18', '2023-05-09', '84259', 'PUE', 'MXN', 361.11, 361.11, 28.89, 0.08, 390, 'CENC760114TP2', 'CARMEN CERVANTES NUÑEZ', '621', 'PEGA921217UN8', 'ALAN OSWALDO PEÑA GARCIA', '612'),
(2, '0E9A9F4C-C510-4F18-86BB-4D1D191F4C3B', 'IB', '14015', '2023-10-20', '83180', 'PPD', 'MXN', 7973, 5979.74, 956.76, 0.16, 6936.5, 'ASC950126882', 'ASESORES EN SISTEMAS COMPUTACIONALES', '601', 'BABG7709091Z8', 'GEORGINO BARRAZA BRACAMONTES', '621'),
(3, '81E96CC3-2486-4964-9094-1EDBF9237265', 'B', '61', '2023-08-03', '84259', 'PUE', 'MXN', 2527.78, 2527.78, 202.22, 0.08, 2730, 'CENC760114TP2', 'CARMEN CERVANTES NUÑEZ', '621', 'QUBL810323B2A', 'LAURA OLIVIA QUINTERO BELTRAN', '612'),
(4, '7A4B4339-6C7D-44FB-A56D-5992E4663C1A', 'CR', '192', '2023-08-02', '84259', 'PPD', 'MXN', 1226.85, 1226.85, 98.15, 0.08, 1325, 'CENC760114TP2', 'CARMEN CERVANTES NUÑEZ', '621', 'PENF451206R34', 'FRANCISCO JAVIER PERALTA NUÑEZ', '612');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFactura` (`idFactura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD CONSTRAINT `conceptos_ibfk_1` FOREIGN KEY (`idFactura`) REFERENCES `factura` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
