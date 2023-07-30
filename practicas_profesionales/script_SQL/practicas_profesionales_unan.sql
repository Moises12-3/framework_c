-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2023 a las 09:15:09
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicas_profesionales_unan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `ID_Precio` int(11) NOT NULL,
  `Cantidad_Producto` int(255) NOT NULL,
  `Code_Producto` varchar(255) NOT NULL,
  `Name_producto` varchar(255) NOT NULL,
  `Descripcion_producto` varchar(255) NOT NULL,
  `Precio_Venta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`ID_Precio`, `Cantidad_Producto`, `Code_Producto`, `Name_producto`, `Descripcion_producto`, `Precio_Venta`) VALUES
(1, 56, '642e49334ca8c', 'Arroz Faisan', 'Faisan', 22.05),
(2, 194, '642f54e7286e9', 'Ranchita', 'Ranchita', 20),
(3, 300, '642f87825f6e9', 'Fosforo', 'Cerillo', 3.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `ID_reporte` int(11) NOT NULL,
  `ID_USUARIO_reporte` int(255) NOT NULL,
  `Cant_venta_reporte` int(255) NOT NULL,
  `ID_Producto_reporte` varchar(255) NOT NULL,
  `Total_pagar_reporte` varchar(255) NOT NULL,
  `Fecha_reporte` date DEFAULT NULL,
  `Hora_reporte` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`ID_reporte`, `ID_USUARIO_reporte`, `Cant_venta_reporte`, `ID_Producto_reporte`, `Total_pagar_reporte`, `Fecha_reporte`, `Hora_reporte`) VALUES
(23, 1, 3, '642e49334ca8c', '66.15', '2023-04-09', '00:12:53'),
(24, 1, 2, '642f54e7286e9', '40', '2023-04-09', '00:15:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(30) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Codigo` varchar(255) NOT NULL,
  `Celular` varchar(2555) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `Fecha_Reg` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `Nombre`, `Apellido`, `Codigo`, `Celular`, `Email`, `Password`, `User`, `Fecha_Reg`) VALUES
(1, 'Aaron Moises', 'Carrasco Thomas UDO-LEON', '642ba977a6709', '78716444', 'maaroncarrasco@gmail.com', 'c408ca3dda9a8f3d0927add0020f6672', 'aaronM', '2023-04-03 22:37:11'),
(2, 'Aaron', 'Thomas', '64326524ed9ef', '86829306', 'maaroncarrasco@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'universal', '2023-04-09 01:11:32');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`ID_Precio`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`ID_reporte`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `ID_Precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `ID_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
