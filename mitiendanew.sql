-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2021 a las 23:39:41
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mitiendanew`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `idcaracteristica` int(11) NOT NULL,
  `productoid` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`idcaracteristica`, `productoid`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 08:37:07'),
(2, 1, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 08:37:07'),
(3, 1, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 08:37:07'),
(4, 1, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 08:37:07'),
(5, 1, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 08:37:07'),
(6, 2, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 07:54:10'),
(7, 2, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 07:54:10'),
(8, 2, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 07:54:10'),
(9, 2, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 07:54:10'),
(10, 2, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 07:54:10'),
(11, 3, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(12, 3, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(13, 3, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(14, 3, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(15, 3, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(16, 4, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(17, 4, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(18, 4, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(19, 4, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(20, 4, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(21, 5, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(22, 5, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(23, 5, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(24, 5, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(25, 5, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(26, 6, 'Lorem ipsum dolor adipisicing sit amet consectetu', NULL, NULL),
(27, 6, 'Lorem ipsum dolor adipisicing sit amet consectetu', NULL, NULL),
(28, 6, 'Lorem ipsum dolor adipisicing sit amet consectetu', NULL, NULL),
(29, 6, 'Lorem ipsum dolor adipisicing sit amet consectetu', NULL, NULL),
(30, 6, 'Lorem ipsum dolor adipisicing sit amet consectetu', NULL, NULL),
(31, 7, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(32, 7, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(33, 7, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(34, 7, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(35, 7, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(36, 8, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(37, 8, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(38, 8, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(39, 8, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(40, 8, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(41, 9, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(42, 9, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(43, 9, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(44, 9, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(45, 9, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(46, 10, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(47, 10, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(48, 10, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(49, 10, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(50, 10, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(51, 11, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(52, 11, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(53, 11, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(54, 11, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(55, 11, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(56, 12, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(57, 12, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(58, 12, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(59, 12, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(60, 12, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(61, 13, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(62, 13, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(63, 13, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(64, 13, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(65, 13, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(66, 14, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(67, 14, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(68, 14, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(69, 14, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(70, 14, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(71, 15, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(72, 15, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(73, 15, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(74, 15, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(75, 15, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(76, 16, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(77, 16, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(78, 16, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(79, 16, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(80, 16, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(81, 17, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-26 18:03:39'),
(82, 17, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-26 18:03:39'),
(83, 17, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-26 18:03:39'),
(84, 17, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-26 18:03:39'),
(85, 17, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-26 18:03:39'),
(86, 18, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(87, 18, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(88, 18, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(89, 18, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(90, 18, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(91, 19, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 09:04:45'),
(92, 19, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 09:04:45'),
(93, 19, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 09:04:45'),
(94, 19, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 09:04:45'),
(95, 19, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, '2021-04-08 09:04:45'),
(96, 20, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(97, 20, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(98, 20, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(99, 20, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(100, 20, 'Lorem ipsum dolor adipisicing sit amet consectetur', NULL, NULL),
(101, 21, 'fdgdgdfgdgf', NULL, NULL),
(102, 21, 'dfgdfgdfgfdgf', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `imagen_referencia` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `descripcion`, `imagen_referencia`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Audífonos', 'a10_01.jpg', 1, NULL, '2021-04-08 09:02:11'),
(2, 'Computadoras y accesorios', 'co09_01.jpg', 1, NULL, '2021-04-08 09:59:23'),
(3, 'Smartphones', 's08_02.jpg', 1, NULL, NULL),
(4, 'Cámaras', 'c05_01.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalleventa` int(11) NOT NULL,
  `ventaid` int(11) DEFAULT NULL,
  `productoid` int(11) DEFAULT NULL,
  `precio_unitario` varchar(20) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`iddetalleventa`, `ventaid`, `productoid`, `precio_unitario`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '599', 1, NULL, NULL),
(2, 1, 20, '889', 2, NULL, NULL),
(3, 2, 1, '459', 2, NULL, NULL),
(4, 2, 5, '3799', 1, NULL, NULL),
(5, 3, 7, '599', 1, NULL, NULL),
(6, 4, 20, '889', 1, NULL, NULL),
(7, 5, 7, '599', 1, NULL, NULL),
(8, 6, 1, '459', 1, NULL, NULL),
(9, 7, 17, '1000', 1, NULL, NULL),
(10, 8, 1, '459', 3, NULL, NULL),
(11, 9, 1, '459', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `idespecificacion` int(11) NOT NULL,
  `productoid` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especificaciones`
--

INSERT INTO `especificaciones` (`idespecificacion`, `productoid`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 08:37:07'),
(2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 08:37:07'),
(3, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 08:37:07'),
(4, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 08:37:07'),
(5, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 08:37:07'),
(6, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 07:54:10'),
(7, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 07:54:10'),
(8, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 07:54:10'),
(9, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 07:54:10'),
(10, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 07:54:10'),
(11, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(12, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(13, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(14, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(15, 3, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(16, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(17, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(18, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(19, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(20, 4, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(21, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(22, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(23, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(24, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(25, 5, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(26, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(27, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(28, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(29, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(30, 6, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(31, 7, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(32, 7, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(33, 7, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(34, 7, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(35, 7, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(36, 8, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(37, 8, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(38, 8, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(39, 8, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(40, 8, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(41, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(42, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(43, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(44, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(45, 9, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(46, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(47, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(48, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(49, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(50, 10, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(51, 11, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(52, 11, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(53, 11, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(54, 11, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(55, 11, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(56, 12, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(57, 12, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(58, 12, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(59, 12, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(60, 12, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(61, 13, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(62, 13, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(63, 13, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(64, 13, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(65, 13, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(66, 14, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(67, 14, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(68, 14, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(69, 14, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(70, 14, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(71, 15, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(72, 15, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(73, 15, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(74, 15, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(75, 15, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(76, 16, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(77, 16, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(78, 16, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(79, 16, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(80, 16, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(81, 17, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-26 18:03:39'),
(82, 17, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-26 18:03:39'),
(83, 17, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-26 18:03:39'),
(84, 17, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-26 18:03:39'),
(85, 17, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-26 18:03:39'),
(86, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(87, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(88, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(89, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(90, 18, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(91, 19, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 09:04:45'),
(92, 19, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 09:04:45'),
(93, 19, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 09:04:45'),
(94, 19, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 09:04:45'),
(95, 19, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, '2021-04-08 09:04:45'),
(96, 20, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(97, 20, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(98, 20, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(99, 20, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(100, 20, 'Lorem ipsum dolor sit amet consectetur adipisicing', NULL, NULL),
(101, 21, 'askdmadskmads', NULL, NULL),
(102, 21, 'asdasdasdad', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_producto`
--

CREATE TABLE `imagenes_producto` (
  `idimagen` int(11) NOT NULL,
  `productoid` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes_producto`
--

INSERT INTO `imagenes_producto` (`idimagen`, `productoid`, `imagen`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'a01.jpg', NULL, NULL, NULL),
(2, 1, 'a01_02.jpg', NULL, NULL, NULL),
(3, 1, 'a01_03.jpg', NULL, NULL, NULL),
(4, 2, 'co01_01.jpg', NULL, NULL, NULL),
(5, 2, 'co01_02.jpg', NULL, NULL, NULL),
(6, 2, 'co01_03.jpg', NULL, NULL, NULL),
(7, 3, 's01_01.jpg', NULL, NULL, NULL),
(8, 3, 's01_02.jpg', NULL, NULL, NULL),
(9, 3, 's01_03.jpg', NULL, NULL, NULL),
(10, 4, 'a02_01.jpg', NULL, NULL, NULL),
(11, 4, 'a02_02.jpg', NULL, NULL, NULL),
(12, 4, 'a02_03.jpg', NULL, NULL, NULL),
(13, 5, 'co02_01.jpg', NULL, NULL, NULL),
(14, 5, 'co02_02.jpg', NULL, NULL, NULL),
(15, 5, 'co02_03.jpg', NULL, NULL, NULL),
(16, 6, 's02_01.jpg', NULL, NULL, NULL),
(17, 6, 's02_02.jpg', NULL, NULL, NULL),
(18, 6, 's03_03.jpg', NULL, NULL, NULL),
(19, 7, 'a03_01.jpg', NULL, NULL, NULL),
(20, 7, 'a03_02.jpg', NULL, NULL, NULL),
(21, 7, 'a03_03.jpg', NULL, NULL, NULL),
(22, 8, 'co03_01.jpg', NULL, NULL, NULL),
(23, 8, 'co03_02.jpg', NULL, NULL, NULL),
(24, 8, 'co03_03.jpg', NULL, NULL, NULL),
(25, 9, 's03_01.jpg', NULL, NULL, NULL),
(26, 9, 's03_02.jpg', NULL, NULL, NULL),
(27, 9, 's03_03.jpg', NULL, NULL, NULL),
(28, 10, 'a04_01.jpg', NULL, NULL, NULL),
(29, 10, 'a04_02.jpg', NULL, NULL, NULL),
(30, 10, 'a04_03.jpg', NULL, NULL, NULL),
(31, 11, 'co04_01.jpg', NULL, NULL, NULL),
(32, 11, 'co04_02.jpg', NULL, NULL, NULL),
(33, 11, 'co04_03.jpg', NULL, NULL, NULL),
(34, 12, 's04_01.jpg', NULL, NULL, NULL),
(35, 12, 's04_02.jpg', NULL, NULL, NULL),
(36, 12, 's04_03.jpg', NULL, NULL, NULL),
(37, 13, 'a05_01.jpg', NULL, NULL, NULL),
(38, 13, 'a05_02.jpg', NULL, NULL, NULL),
(39, 13, 'a05_03.jpg', NULL, NULL, NULL),
(40, 14, 'co05_01.jpg', NULL, NULL, NULL),
(41, 14, 'co05_02.jpg', NULL, NULL, NULL),
(42, 14, 'co05_03.jpg', NULL, NULL, NULL),
(43, 15, 's05_01.jpg', NULL, NULL, NULL),
(44, 15, 's05_02.jpg', NULL, NULL, NULL),
(45, 15, 's05_03.jpg', NULL, NULL, NULL),
(46, 16, 'a06_01.jpg', NULL, NULL, NULL),
(47, 16, 'a06_02.jpg', NULL, NULL, NULL),
(48, 16, 'a06_03.jpg', NULL, NULL, NULL),
(49, 17, 'co06_01.jpg', NULL, NULL, NULL),
(50, 17, 'co06_02.jpg', NULL, NULL, NULL),
(51, 17, 'co06_03.jpg', NULL, NULL, NULL),
(52, 18, 's06_01.jpg', NULL, NULL, NULL),
(53, 18, 's06_02.jpg', NULL, NULL, NULL),
(54, 18, 's06_03.jpg', NULL, NULL, NULL),
(55, 19, 'c01_01.jpg', NULL, NULL, NULL),
(56, 19, 'c01_02.jpg', NULL, NULL, NULL),
(57, 19, 'c01_03.jpg', NULL, NULL, NULL),
(58, 20, 'c04_01.jpg', NULL, NULL, NULL),
(59, 20, 'c04_02.jpg', NULL, NULL, NULL),
(60, 20, 'c04_03.jpg', NULL, NULL, NULL),
(61, 21, 'co08_01.jpg', NULL, NULL, NULL),
(62, 21, 'co08_02.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_empresa`
--

CREATE TABLE `info_empresa` (
  `registro` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `hora_entrada` varchar(20) DEFAULT NULL,
  `hora_salida` varchar(20) DEFAULT NULL,
  `url_facebook` varchar(30) DEFAULT NULL,
  `url_twitter` varchar(30) DEFAULT NULL,
  `url_instagram` varchar(30) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `info_empresa`
--

INSERT INTO `info_empresa` (`registro`, `telefono`, `correo`, `hora_entrada`, `hora_salida`, `url_facebook`, `url_twitter`, `url_instagram`, `logo`, `created_at`, `updated_at`) VALUES
(1, '963258964', NULL, '08:00', '17:00', NULL, NULL, NULL, 'logo.jpg', '2021-05-29 21:39:08', '2021-05-30 02:39:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `categoriaid` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sku` varchar(8) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `categoriaid`, `nombre`, `descripcion`, `precio`, `stock`, `sku`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Audifono Multiplataforma', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '459', 12, '12345678', 1, NULL, '2021-04-08 08:37:07'),
(2, 2, 'Dell Gamming G3 15.5\'\'', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '3999', 12, '12345677', 1, NULL, '2021-04-08 07:54:10'),
(3, 3, 'Xiaomi Redmi 9 US', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '1799', 12, '12345676', 1, NULL, NULL),
(4, 1, 'Headset Gaming H300', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '499', 12, '12345675', 1, NULL, NULL),
(5, 2, 'HP Pavillion Gaming 15', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '3799', 12, '12345674', 1, NULL, NULL),
(6, 3, 'Iphone SE Black', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '2699', 12, '12345672', 1, NULL, NULL),
(7, 1, 'Auricular LAMIA H320', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '599', 12, '12345671', 1, NULL, NULL),
(8, 2, 'Gamer Nitro 5 AN515', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '5399', 12, '12345670', 1, NULL, NULL),
(9, 3, 'Motorola One Fusion', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '1299', 12, '12345669', 1, NULL, NULL),
(10, 1, 'Audifonos Gamer Corsair', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '1299', 12, '12345668', 1, NULL, NULL),
(11, 2, 'HP Pavilion TG01', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '4999', 12, '12345667', 0, NULL, '2021-04-08 09:05:08'),
(12, 3, 'Motorola E7', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '1399', 12, '12345666', 1, NULL, NULL),
(13, 1, 'Audifono Gamer SE', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '789', 12, '12345665', 1, NULL, NULL),
(14, 2, 'Dell Inspiron 5406', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '5999', 12, '12345664', 1, NULL, NULL),
(15, 3, 'Galaxy S21 Gris', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '1489', 12, '12345663', 1, NULL, NULL),
(16, 1, 'Audifonos Gamer Photum', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '689', 12, '12345662', 1, NULL, NULL),
(17, 2, 'Silla Gamer Rex 150°', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '1000', 12, '12345661', 1, NULL, '2021-04-26 18:03:39'),
(18, 3, 'Realme 6 4bg', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '1289', 12, '12345660', 1, NULL, NULL),
(19, 4, 'Go Pro Hero 8 Black', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '669', 12, '12345659', 1, NULL, '2021-04-08 09:04:45'),
(20, 4, 'Drone Battle Shark', 'Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Quos expedita, ducimus veniam facilis qui libero.', '889', 12, '12345658', 1, NULL, NULL),
(21, 2, 'PruebaPc1', 'aksdmaksdm loremasdkamsd asdmkamsdkmasdmakdsm', '799', 12, '96385285', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `rolid` int(11) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `rolid`, `nombres`, `apellidos`, `email`, `telefono`, `clave`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Encodepe', 'Encode.pe', 'support@encode.pe', '987654321', '$2y$10$ko0BMkqnhPAn6e7ukGqVFe4PNtdRURckRB0GxSXfgU.AHdMBT4hRW', 1, NULL, '2021-05-26 22:18:53'),
(4, 1, 'UsuarioPrueba 01', 'PruebaUsuario 01', 'user01@encode.pe', '988899999', '$2y$10$945yjM4yiH6S0zCTcS5S0uaFOJOmPOeKpgXQt83QD7YMYH2Op0DeW', 0, NULL, '2021-05-29 17:50:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL,
  `usuarioid` int(11) DEFAULT NULL,
  `pagoid` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `resumen` varchar(255) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventa`, `usuarioid`, `pagoid`, `fecha`, `email`, `direccion`, `resumen`, `estado`, `created_at`, `updated_at`) VALUES
(1, 3, 'pi_1Idq14HTbfxeD8f4Uhf8V87R', '2021-04-08', 'user02', '932145875', '2021-04-08-05-03-27.pdf', 0, NULL, '2021-04-08 10:04:19'),
(2, 2, 'pi_1IdqbwHTbfxeD8f4OiavN37v', '2021-04-08', 'User 01', '963258741', '2021-04-08-05-41-27.pdf', 0, NULL, '2021-04-25 18:24:42'),
(3, 2, 'pi_1IkAfBHTbfxeD8f4AlHU1Ztm', '2021-04-25', 'User 01', '963258741', '2021-04-25-16-19-00.pdf', 1, NULL, NULL),
(4, 2, 'pi_1InkV1HTbfxeD8f4Fyov2E3S', '2021-05-05', 'User 01', '963258741', '2021-05-05-13-11-03.pdf', 1, NULL, NULL),
(5, NULL, 'pi_1IuICbHTbfxeD8f4PWqejY5q', '2021-05-23', 'krowed@gmail.com', 'asdadadadadsad', '2021-05-23-14-23-08.pdf', 0, NULL, '2021-05-26 19:59:24'),
(6, NULL, 'pi_1IvsyRHTbfxeD8f4mkmUf07s', '2021-05-27', 'krowed17@gmail.com', 'asdasdadadadadadsadad adasd', '2021-05-27-23-51-26.pdf', 0, NULL, '2021-05-28 04:52:31'),
(7, NULL, 'pi_1IvwFVHTbfxeD8f4Qe1KXXgR', '2021-05-28', 'pruebacompra@gmail.com', 'Dirección de prueba, etc...', '2021-05-28-03-21-00.pdf', 0, NULL, '2021-05-28 08:21:31'),
(8, NULL, 'pi_1IwRaYHTbfxeD8f4kr2F33gS', '2021-05-29', 'prueba@gmail.com', 'Direccion de prueba...', '2021-05-29-12-49-00.pdf', 1, NULL, NULL),
(9, NULL, 'pi_1IwXsRHTbfxeD8f4YMqmHC2i', '2021-05-29', 'prueba04@gmail.com', 'amsdkamsdkmaskdmaskdmads', '2021-05-29-19-31-59.pdf', 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`idcaracteristica`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalleventa`);

--
-- Indices de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD PRIMARY KEY (`idespecificacion`);

--
-- Indices de la tabla `imagenes_producto`
--
ALTER TABLE `imagenes_producto`
  ADD PRIMARY KEY (`idimagen`);

--
-- Indices de la tabla `info_empresa`
--
ALTER TABLE `info_empresa`
  ADD PRIMARY KEY (`registro`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `idcaracteristica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  MODIFY `idespecificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `imagenes_producto`
--
ALTER TABLE `imagenes_producto`
  MODIFY `idimagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `info_empresa`
--
ALTER TABLE `info_empresa`
  MODIFY `registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
