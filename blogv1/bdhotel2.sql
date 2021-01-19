-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2021 a las 02:35:21
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdhotel2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `Denominacion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `Denominacion`) VALUES
(2, 'BEBIDAS FRIAS'),
(3, 'BOCADITOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Celular` varchar(15) NOT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `TipDocumento` varchar(20) NOT NULL,
  `NumDocumento` varchar(15) NOT NULL,
  `Direccion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo`
--

CREATE TABLE `consumo` (
  `IdConsumo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` decimal(18,2) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  `FechConsumo` datetime NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdReserva` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `Num_Hab` int(11) NOT NULL,
  `Descripcion` varchar(250) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Precio` decimal(18,2) NOT NULL,
  `IdTipoHabitacion` int(11) NOT NULL,
  `IdNivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`Num_Hab`, `Descripcion`, `Estado`, `Precio`, `IdTipoHabitacion`, `IdNivel`) VALUES
(1, 'ninguna', 'DISPONIBLE', '30.00', 5, 4),
(2, 'ninguna', 'DISPONIBLE', '30.00', 5, 4),
(3, 'ninguna', 'DISPONIBLE', '30.00', 5, 4),
(20, 'ninguno', 'DISPONIBLE', '60.00', 5, 4),
(21, 'ninguno', 'DISPONIBLE', '60.00', 6, 5),
(22, 'ninguno', 'DISPONIBLE', '60.00', 6, 5),
(30, 'ninguno', 'DISPONIBLE', '70.00', 7, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `IdNivel` int(11) NOT NULL,
  `Denominacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`IdNivel`, `Denominacion`) VALUES
(4, 'Piso 1'),
(5, 'Piso 2'),
(6, 'Piso 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IdPago` int(11) NOT NULL,
  `TipoComprobante` varchar(20) DEFAULT NULL,
  `NumComprobante` varchar(12) DEFAULT NULL,
  `Igv` decimal(18,2) DEFAULT NULL,
  `TotalPago` decimal(18,2) NOT NULL,
  `FechaEmision` datetime DEFAULT NULL,
  `FechaPago` datetime NOT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Penalidad` decimal(18,2) DEFAULT NULL,
  `IdReserva` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `NombProducto` varchar(40) NOT NULL,
  `Imagen` varchar(40) NOT NULL,
  `Precio` decimal(18,2) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `NombProducto`, `Imagen`, `Precio`, `Descripcion`, `IdCategoria`) VALUES
(1, 'COCA COLA', 'a.jpg', '3.00', 'personal', 2),
(3, 'FANTA', 'fanta.jpg', '3.00', 'ninguna', 2),
(4, 'POWERADE', 'Powerade.jpg', '4.00', 'ninguna', 2),
(5, 'Torta de chocolate', 'torta.jpg', '2.00', 'Torta bañada en chocolate con chispas', 3),
(6, 'Torta de fresa', '357torta-fresa.jpg', '2.00', 'Torta helada de fresa', 3),
(7, 'EMPANADAS', 'empanadas-de-pollo.jpg', '4.00', 'Empanadas de pollo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `IdReserva` char(10) NOT NULL,
  `FechReserva` date DEFAULT NULL,
  `FechEntrada` date DEFAULT NULL,
  `FechSalida` date NOT NULL,
  `CostoAlojamiento` decimal(18,2) NOT NULL,
  `Observacion` varchar(200) DEFAULT NULL,
  `Estado` varchar(20) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `Num_Hab` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohabitacion`
--

CREATE TABLE `tipohabitacion` (
  `IdTipoHabitacion` int(11) NOT NULL,
  `Denominacion` varchar(50) NOT NULL,
  `Descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipohabitacion`
--

INSERT INTO `tipohabitacion` (`IdTipoHabitacion`, `Denominacion`, `Descripcion`) VALUES
(5, 'Personal', 'Una cama / sin servicios a la habitación'),
(6, 'Doble', '1 cama x2 / mesita de noche'),
(7, 'Triple', '#2 camas x2/x1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `NumDocumento` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `Estado` varchar(30) NOT NULL,
  `Celular` varchar(15) DEFAULT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `NumDocumento`, `Nombre`, `Apellido`, `password`, `Estado`, `Celular`, `email`) VALUES
(1, '62603083', 'KEVIN', 'MARCAS HUAMANI', '$2y$10$aC66j3wL5CY5/rPCVnwMF.sr0Z7l/NFQxOwK5dXmIIcw5D0YMffp2', 'ACTIVO', '930367269', 'Kevinmarcas3@gmail.com'),
(3, '74685689', 'YAKS ANDERSON', 'GONZALES CONDORI', '$2y$10$.fXOV14QR8GHb3PnRmxxiewlts.M2Ioq59wFj8inzKWrYBreEsoFi', 'ACTIVO', '921356991', 'agonzales159753@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `consumo`
--
ALTER TABLE `consumo`
  ADD PRIMARY KEY (`IdConsumo`),
  ADD KEY `fk_1` (`IdProducto`),
  ADD KEY `fk_2` (`IdReserva`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`Num_Hab`),
  ADD KEY `fk_3` (`IdTipoHabitacion`),
  ADD KEY `fk_4` (`IdNivel`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`IdNivel`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IdPago`),
  ADD KEY `fk_5` (`IdReserva`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `fk_6` (`IdCategoria`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`IdReserva`),
  ADD KEY `fk_7` (`IdCliente`),
  ADD KEY `fk_8` (`Num_Hab`),
  ADD KEY `fk_9` (`IdUsuario`);

--
-- Indices de la tabla `tipohabitacion`
--
ALTER TABLE `tipohabitacion`
  ADD PRIMARY KEY (`IdTipoHabitacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `consumo`
--
ALTER TABLE `consumo`
  MODIFY `IdConsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `IdNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IdPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipohabitacion`
--
ALTER TABLE `tipohabitacion`
  MODIFY `IdTipoHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consumo`
--
ALTER TABLE `consumo`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`IdReserva`) REFERENCES `reserva` (`IdReserva`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `fk_3` FOREIGN KEY (`IdTipoHabitacion`) REFERENCES `tipohabitacion` (`IdTipoHabitacion`),
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`IdNivel`) REFERENCES `nivel` (`IdNivel`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_5` FOREIGN KEY (`IdReserva`) REFERENCES `reserva` (`IdReserva`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_6` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_7` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`),
  ADD CONSTRAINT `fk_8` FOREIGN KEY (`Num_Hab`) REFERENCES `habitacion` (`Num_Hab`),
  ADD CONSTRAINT `fk_9` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
