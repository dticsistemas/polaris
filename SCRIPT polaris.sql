-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2023 a las 23:42:36
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `polaris`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `enlace` varchar(250) NOT NULL,
  `modulo` varchar(150) NOT NULL,
  `active` varchar(1) DEFAULT NULL,
  `icono` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id`, `nombre`, `enlace`, `modulo`, `active`, `icono`) VALUES
(1, 'Administrar Mensaje de Bienvenida', 'admin/mensajes', '3', '0', 'admin_mensajes.png'),
(2, 'Seleccionar Productos Destacados', 'admin/destacados', '3', '0', 'admin_destacados.png'),
(3, 'Administrar Diapositivas', 'admin/diapositivas', '3', '0', 'admin_diapositivas.png'),
(4, 'Banner  publicitarios', 'admin/categorias_banners', '3', '0', 'admin_banner.png'),
(5, 'Ver Informacion de la WEB', 'admin/informacion', '3', '1', 'admin_informacion.png'),
(6, 'Administrar Sucursales', 'admin/sucursales', '1', '0', 'admin_sucursales'),
(7, 'Administrar Usuarios', 'admin/usuarios', '2', '0', 'admin_usuarios.png'),
(8, 'Bitacora', 'admin/bitacora', '2', '0', 'admin_bitacora.png'),
(9, 'Crear Backup Base de Datos', 'admin/backup', '2', '1', 'admin_backup.png'),
(10, 'Administrar Productos', 'admin/productos', '1', '0', 'admin_productos.png'),
(12, 'Administrar Categorias de los Productos', 'admin/categorias', '1', '0', 'admin_categorias.png'),
(13, 'Descargar Catalogo  de Productos PDF', 'admin/catalogo_pdf', '3', '0', 'admin_catalogo_pdf.png'),
(15, 'INVENTARIO', 'admin/inventario_productos', '7', '0', 'admin_inventarios.png'),
(16, 'Ventas al contado', 'ventas/ventas_contado', '5', '0', 'admin_ventas.png'),
(17, 'Ventas Suspendidas', 'ventas/ventas_suspendidas', '5', '0', 'admin_ventas_administrador.png'),
(18, 'Ventas Credito', 'ventas/ventas_credito', '5', '0', 'admin_ventas_credito.png'),
(19, 'Ventas Credito Administrador', 'ventas/ventas_credito_admin', '5', '0', 'admin_ventas_credito_administrador.png'),
(20, 'Configuracion sistema', 'admin/settings', '2', '0', 'admin_settings.png'),
(21, 'Administrar Dispositivos', 'admin/dispositivos', '2', '0', 'admin_dispositivos.png'),
(22, 'Administrar Clientes', 'admin/clientes', '5', '0', 'admin_clientes.png'),
(23, 'Administrar Personal', 'admin/personal', '1', '0', 'admin_personas.png'),
(24, 'Reportes Ventas', 'reportes/ventas', '8', '0', 'reportes_ventas.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `titulo`, `imagen`, `descripcion`) VALUES
(1, 'Publicite AQUI, Tus datos', 'a3475-registrooferta.jpg', '<p>\r\n	Emplearemos los datos indicados con anterioridad para el env&iacute;o de nuestras newsletters, SMS y para nuestras campa&ntilde;as de redes sociales, podr&aacute;s anular tu suscripci&oacute;n en cualquier momento.</p>\r\n'),
(2, 'Polaris APK , PUBLICIDAD ESPECIAL', 'a40fd-siguiente.jpg', '<p>\r\n	Las tiendas Polaris APK somos l&iacute;deres en inform&aacute;tica, electr&oacute;nica, electrodom&eacute;sticos y otros complementos para el entretenimiento, siempre con las mejores marcas al mejor precio.</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `id_accion` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip` varchar(20) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `id_accion`, `fecha`, `ip`, `id_usuario`, `data`) VALUES
(1, 1, '2018-08-23 19:45:59', '127.0.0.1', 4, ''),
(2, 1, '2018-08-23 19:48:04', '127.0.0.1', 4, ''),
(3, 1, '2018-08-23 19:48:25', '127.0.0.1', 4, ''),
(4, 1, '2018-08-23 19:50:04', '127.0.0.1', 4, ''),
(5, 1, '2018-08-23 19:54:34', '127.0.0.1', 4, ''),
(6, 2, '2018-08-23 20:38:34', '127.0.0.1', 4, ''),
(7, 1, '2018-08-23 20:38:45', '127.0.0.1', 4, ''),
(8, 1, '2018-08-24 00:30:35', '127.0.0.1', 4, ''),
(9, 1, '2018-08-24 10:30:43', '127.0.0.1', 4, ''),
(10, 2, '2018-08-24 10:45:11', '127.0.0.1', 4, ''),
(11, 1, '2018-08-24 10:45:26', '127.0.0.1', 4, ''),
(12, 6, '2018-08-24 11:30:27', '127.0.0.1', 4, '6'),
(13, 6, '2018-08-24 11:33:43', '127.0.0.1', 4, '7'),
(14, 1, '2018-08-24 11:37:05', '127.0.0.1', 4, ''),
(15, 1, '2018-08-25 11:48:41', '127.0.0.1', 6, ''),
(16, 2, '2018-08-25 20:29:40', '127.0.0.1', 6, ''),
(17, 1, '2018-08-25 20:31:20', '127.0.0.1', 6, ''),
(18, 2, '2018-08-25 20:31:26', '127.0.0.1', 6, ''),
(19, 1, '2018-08-25 20:32:03', '127.0.0.1', 6, ''),
(20, 2, '2018-08-25 20:32:05', '127.0.0.1', 6, ''),
(21, 1, '2018-08-25 20:32:13', '127.0.0.1', 6, ''),
(22, 2, '2018-08-25 20:34:47', '127.0.0.1', 6, ''),
(23, 1, '2018-08-25 20:35:54', '127.0.0.1', 6, ''),
(24, 2, '2018-08-25 20:35:56', '127.0.0.1', 6, ''),
(25, 1, '2018-08-25 20:38:44', '127.0.0.1', 6, ''),
(26, 2, '2018-08-25 20:41:08', '127.0.0.1', 6, ''),
(27, 1, '2018-08-25 22:23:47', '127.0.0.1', 6, ''),
(28, 1, '2018-08-25 22:34:14', '127.0.0.1', 6, ''),
(29, 2, '2018-08-25 23:19:32', '127.0.0.1', 6, ''),
(30, 1, '2018-08-25 23:20:59', '127.0.0.1', 6, ''),
(31, 2, '2018-08-25 23:21:58', '127.0.0.1', 6, ''),
(32, 1, '2018-08-25 23:22:07', '127.0.0.1', 6, ''),
(33, 2, '2018-08-25 23:23:59', '127.0.0.1', 6, ''),
(34, 1, '2018-08-25 23:24:48', '127.0.0.1', 6, ''),
(35, 2, '2018-08-25 23:25:13', '127.0.0.1', 6, ''),
(36, 1, '2018-08-25 23:25:18', '127.0.0.1', 6, ''),
(37, 2, '2018-08-25 23:27:43', '127.0.0.1', 6, ''),
(38, 1, '2018-08-25 23:27:47', '127.0.0.1', 6, ''),
(39, 2, '2018-08-25 23:28:37', '127.0.0.1', 6, ''),
(40, 1, '2018-08-25 23:28:41', '127.0.0.1', 6, ''),
(41, 2, '2018-08-25 23:28:56', '127.0.0.1', 6, ''),
(42, 1, '2018-08-25 23:29:00', '127.0.0.1', 6, ''),
(43, 2, '2018-08-25 23:44:22', '127.0.0.1', 6, ''),
(44, 1, '2018-08-25 23:44:27', '127.0.0.1', 6, ''),
(45, 2, '2018-08-25 23:55:45', '127.0.0.1', 6, ''),
(46, 1, '2018-08-25 23:55:49', '127.0.0.1', 6, ''),
(47, 1, '2018-08-26 02:33:10', '127.0.0.1', 6, ''),
(48, 1, '2018-08-26 02:38:24', '127.0.0.1', 6, ''),
(49, 1, '2018-08-26 10:35:43', '127.0.0.1', 6, ''),
(50, 2, '2018-08-26 10:50:43', '127.0.0.1', 6, ''),
(51, 1, '2018-08-26 21:33:14', '127.0.0.1', 6, ''),
(52, 2, '2018-08-26 21:34:14', '127.0.0.1', 6, ''),
(53, 1, '2018-08-26 22:35:19', '127.0.0.1', 6, ''),
(54, 1, '2018-08-27 10:47:09', '127.0.0.1', 6, ''),
(55, 1, '2018-08-27 20:57:37', '127.0.0.1', 6, ''),
(56, 2, '2018-08-27 22:28:53', '127.0.0.1', 6, ''),
(57, 1, '2018-08-28 10:53:55', '127.0.0.1', 6, ''),
(58, 1, '2018-08-28 15:34:33', '127.0.0.1', 6, ''),
(59, 1, '2018-08-30 19:14:38', '127.0.0.1', 6, ''),
(60, 1, '2018-09-01 14:53:57', '127.0.0.1', 6, ''),
(61, 1, '2018-09-20 21:55:05', '127.0.0.1', 6, ''),
(62, 1, '2019-02-12 11:25:59', '127.0.0.1', 6, ''),
(63, 1, '2019-03-11 00:34:56', '127.0.0.1', 6, ''),
(64, 1, '2019-03-11 01:34:26', '127.0.0.1', 6, ''),
(65, 1, '2019-03-11 11:36:46', '127.0.0.1', 6, ''),
(66, 1, '2019-03-11 12:02:02', '127.0.0.1', 6, ''),
(67, 1, '2019-03-11 17:21:56', '127.0.0.1', 6, ''),
(68, 9, '2019-03-11 18:37:00', '127.0.0.1', 6, ''),
(69, 9, '2019-03-11 18:37:08', '127.0.0.1', 6, ''),
(70, 9, '2019-03-11 18:37:35', '127.0.0.1', 6, ''),
(71, 9, '2019-03-11 18:37:44', '127.0.0.1', 6, ''),
(72, 9, '2019-03-11 18:39:11', '127.0.0.1', 6, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(46, 1511722145, '127.0.0.1', 'IQ6TV2Ad'),
(47, 1511722147, '127.0.0.1', '6IJHoPm4'),
(48, 1511722185, '127.0.0.1', 'RpinTdLr'),
(49, 1511722225, '127.0.0.1', 'IBH1OASE'),
(50, 1511722227, '127.0.0.1', 'G8bEcVsc'),
(51, 1511722595, '127.0.0.1', '8jUxdjKz'),
(52, 1511722605, '127.0.0.1', 'xYYrzbgb'),
(53, 1534360319, '127.0.0.1', 'xij1RMJu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` enum('Activo','Inactivo') DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `tipo`, `id_categoria`) VALUES
(1, 'COLCHONES', '<p>\r\n	Venta de colchones</p>\r\n', 'Activo', NULL),
(2, 'SOMIERS', '<p>\r\n	somnier para colchones</p>\r\n', 'Activo', NULL),
(3, 'MUEBLES', '<p>\r\n	Venta de muebles, juegos para sala</p>\r\n', 'Activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_productos`
--

CREATE TABLE `categoria_productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria_productos`
--

INSERT INTO `categoria_productos` (`id_producto`, `id_categoria`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 2),
(7, 2),
(8, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT 0,
  `data` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `sexo` enum('Hombre','Mujer') NOT NULL,
  `ci` varchar(11) NOT NULL,
  `nit` varchar(11) DEFAULT NULL,
  `procedencia` varchar(15) DEFAULT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fotografia` varchar(125) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `dir_trabajo` varchar(50) DEFAULT NULL,
  `oficio` varchar(50) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `sexo`, `ci`, `nit`, `procedencia`, `direccion`, `telefono`, `fecha_nacimiento`, `fotografia`, `email`, `facebook`, `dir_trabajo`, `oficio`, `referencia`) VALUES
(0, 'NN', 'Hombre', '0', '0', 'Desconocida', 'Desconocida', '0', NULL, NULL, '', '', NULL, NULL, NULL),
(1, 'Juan carlos', 'Mujer', '654321', '121212', '', 'B/Roca y Coronado', '77844152', '1994-08-15', 'a666a-user1-128x128.jpg', 'jua_carlo_villa@gmail.com', 'juan_carlo_villa7745@faceebook.com', 'Av. Guaracal Edif.Central Of.:15', 'Gerente auxiliar', '745145421-5545454'),
(2, 'Juan carlos', 'Mujer', '123', '', '', 'S/N', '000', '0000-00-00', NULL, '', '', '', '', ''),
(3, 'Juan carlos', 'Hombre', '', '', 'NN', 'S/N', '77771213', '2018-08-15', '41b1d-user8-128x128.jpg', '', '', NULL, NULL, NULL),
(4, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(5, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(6, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(7, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(8, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(9, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(10, 'Carlos cadima suarez', 'Hombre', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(11, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(12, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(13, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(14, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(15, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(16, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(17, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(18, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(19, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(20, 'Carlos cadima suarez', 'Hombre', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(21, 'Juan carlos', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(22, 'Carlos cadima suarez', 'Hombre', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(23, 'Gabriela Cesar ticona', 'Mujer', '', '', 'NN', 'S/N', '000', '0000-00-00', NULL, '', '', NULL, NULL, NULL),
(25, 'nn', 'Hombre', '', '', '', '', '', NULL, NULL, '', '', NULL, NULL, NULL),
(31, '', 'Mujer', '', NULL, '', '', '', '0000-00-00', NULL, '', '', '', '', ''),
(32, '', 'Mujer', '', NULL, '', '', '', '0000-00-00', NULL, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `vendedor` varchar(250) NOT NULL,
  `id_usuraio` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `monto` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(125) NOT NULL,
  `resenia` varchar(150) NOT NULL,
  `lema` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `nombre`, `resenia`, `lema`) VALUES
(1, 'Polaris', 'Sistema catalogo de Ventas WEB', 'Sistema CVOFF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_cliente`
--

CREATE TABLE `cuenta_cliente` (
  `id_cliente` int(11) NOT NULL,
  `monto_credito_maximo` double NOT NULL,
  `deuda` double NOT NULL,
  `saldo` double NOT NULL,
  `estado` varchar(1) NOT NULL,
  `tipo` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta_cliente`
--

INSERT INTO `cuenta_cliente` (`id_cliente`, `monto_credito_maximo`, `deuda`, `saldo`, `estado`, `tipo`, `fecha_creacion`) VALUES
(1, 3500, 9000, 0, 'P', 0, '2018-08-27 22:20:06'),
(2, 3500, 1000, 0, 'P', 0, '2018-08-27 22:23:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id_plan_pago` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto_cuota` double NOT NULL,
  `monto_pagado` double NOT NULL,
  `fecha_pagada` date NOT NULL,
  `estado` varchar(1) NOT NULL,
  `id_cobrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id_plan_pago`, `numero`, `fecha_pago`, `monto_cuota`, `monto_pagado`, `fecha_pagada`, `estado`, `id_cobrador`) VALUES
(4, 1, '2018-08-01', 950, 0, '0000-00-00', 'R', 0),
(4, 2, '2018-09-01', 950, 0, '0000-00-00', 'R', 0),
(4, 3, '2018-10-01', 950, 0, '0000-00-00', 'R', 0),
(4, 4, '2018-11-01', 950, 0, '0000-00-00', 'R', 0),
(5, 1, '2018-08-01', 334, 0, '0000-00-00', 'A', 0),
(5, 2, '2018-09-01', 334, 0, '0000-00-00', 'A', 0),
(5, 3, '2018-10-01', 332, 0, '0000-00-00', 'A', 0),
(6, 1, '2018-08-30', 1000, 0, '0000-00-00', 'R', 0),
(6, 2, '2018-09-30', 1000, 0, '0000-00-00', 'R', 0),
(6, 3, '2018-10-30', 1000, 0, '0000-00-00', 'R', 0),
(6, 4, '2018-11-30', 1000, 0, '0000-00-00', 'R', 0),
(6, 5, '2018-12-30', 1000, 0, '0000-00-00', 'R', 0),
(7, 1, '2018-08-05', 800, 0, '0000-00-00', 'R', 0),
(7, 2, '2018-09-05', 800, 0, '0000-00-00', 'R', 0),
(7, 3, '2018-10-05', 800, 0, '0000-00-00', 'R', 0),
(7, 4, '2018-11-05', 800, 0, '0000-00-00', 'R', 0),
(7, 5, '2018-12-05', 800, 0, '0000-00-00', 'R', 0),
(7, 6, '2019-01-05', 800, 0, '0000-00-00', 'R', 0),
(7, 7, '2019-02-05', 800, 0, '0000-00-00', 'R', 0),
(7, 8, '2019-03-05', 400, 0, '0000-00-00', 'R', 0),
(8, 1, '2018-08-31', 1000, 0, '0000-00-00', 'R', 0),
(8, 2, '2018-10-01', 1000, 0, '0000-00-00', 'R', 0),
(8, 3, '2018-11-01', 1000, 0, '0000-00-00', 'R', 0),
(8, 4, '2018-12-01', 1000, 0, '0000-00-00', 'R', 0),
(8, 5, '2019-01-01', 1000, 0, '0000-00-00', 'R', 0),
(8, 6, '2019-02-01', 1000, 0, '0000-00-00', 'R', 0),
(8, 7, '2019-03-01', 1000, 0, '0000-00-00', 'R', 0),
(9, 1, '2018-08-31', 1500, 0, '0000-00-00', 'R', 0),
(9, 2, '2018-10-01', 1500, 0, '0000-00-00', 'R', 0),
(9, 3, '2018-11-01', 1500, 0, '0000-00-00', 'R', 0),
(9, 4, '2018-12-01', 1500, 0, '0000-00-00', 'R', 0),
(9, 5, '2019-01-01', 1500, 0, '0000-00-00', 'R', 0),
(9, 6, '2019-02-01', 500, 0, '0000-00-00', 'R', 0),
(10, 1, '2018-08-31', 1550, 0, '0000-00-00', 'A', 0),
(10, 2, '2018-10-01', 1550, 0, '0000-00-00', 'A', 0),
(10, 3, '2018-11-01', 1550, 0, '0000-00-00', 'A', 0),
(10, 4, '2018-12-01', 1550, 0, '0000-00-00', 'A', 0),
(10, 5, '2019-01-01', 1550, 0, '0000-00-00', 'A', 0),
(10, 6, '2019-02-01', 1250, 0, '0000-00-00', 'A', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacados`
--

CREATE TABLE `destacados` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nota` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destacados`
--

INSERT INTO `destacados` (`id`, `id_producto`, `nota`) VALUES
(1, 3, 'Hermoso colchon de 2 plaza, ideal para habitaciones grandes'),
(2, 8, 'Este Sofa puede convertirse en una comoda cama'),
(3, 7, 'Somier estilo moderno para ccolchones de 1 plaza y media'),
(4, 1, 'Para una habitacion minimalista una comodo colchon de 1 plaza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `id` int(11) NOT NULL,
  `id_dispositivo` varchar(25) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) NOT NULL,
  `estado` enum('Habilitado','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`id`, `id_dispositivo`, `fecha_registro`, `id_usuario`, `estado`) VALUES
(2, 'e41bb1ad47830d1e', '2018-08-16 14:55:57', 2, 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `imagen` varchar(250) CHARACTER SET utf8 NOT NULL,
  `id_producto` int(11) NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `imagen`, `id_producto`, `orden`, `descripcion`) VALUES
(38, 'b2e4a2.jpg', 1, NULL, NULL),
(40, '5db95a.jpg', 2, NULL, NULL),
(41, '0a5c7d.jpg', 3, NULL, NULL),
(42, '0e1b31.jpg', 4, NULL, NULL),
(43, 'e5e8d8.jpg', 5, NULL, NULL),
(44, '85aa6a.jpg', 6, NULL, NULL),
(45, 'fb3537.jpg', 7, NULL, NULL),
(46, 'e7fc51.jpg', 8, 4, NULL),
(47, '2950f8.jpg', 8, 2, NULL),
(48, '64384e.jpg', 8, 1, NULL),
(49, 'fb9e1f.jpg', 8, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarios`
--

CREATE TABLE `inventarios` (
  `id_producto` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` enum('Habilitado','Deshabilitado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventarios`
--

INSERT INTO `inventarios` (`id_producto`, `id_sucursal`, `cantidad`, `estado`) VALUES
(1, 1, 100, 'Habilitado'),
(1, 2, 85, 'Habilitado'),
(2, 1, 2, 'Habilitado'),
(2, 2, 0, 'Habilitado'),
(3, 1, 5540, 'Habilitado'),
(3, 2, 50000, 'Habilitado'),
(4, 1, 0, 'Habilitado'),
(4, 2, 0, 'Habilitado'),
(5, 1, 0, 'Habilitado'),
(5, 2, 0, 'Habilitado'),
(6, 1, 0, 'Habilitado'),
(6, 2, 0, 'Habilitado'),
(7, 1, 0, 'Habilitado'),
(7, 2, 0, 'Habilitado'),
(8, 1, 0, 'Habilitado'),
(8, 2, 0, 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `inventario_global`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `inventario_global` (
`id_producto` int(11)
,`cantidad` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `mensaje`) VALUES
(1, 'Eleva tu estilo de vida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` enum('Hombre','Mujer') DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(25) DEFAULT NULL,
  `fotografia` varchar(125) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT NULL,
  `tipo` enum('VENDEDOR','GERENTE','COBRADOR') NOT NULL,
  `id_sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `apellidos`, `fecha_nacimiento`, `sexo`, `direccion`, `telefono`, `fotografia`, `estado`, `tipo`, `id_sucursal`) VALUES
(2, 'Antonio', 'Rejas Manza', '1978-08-01', 'Hombre', 'B/ Roca y Coronadao', '77844512', '32171-user1-128x128.jpg', NULL, 'VENDEDOR', 1),
(3, 'Rita', 'Suarez Ergues', NULL, NULL, NULL, NULL, NULL, NULL, 'VENDEDOR', 1),
(4, 'Rosa', 'Mendoza Lujan', NULL, NULL, NULL, NULL, NULL, NULL, 'GERENTE', 1),
(5, 'Julio', 'Mercado Guzman', '2018-08-10', 'Hombre', 'B/ Guaracal Zona sur nro 145', NULL, NULL, NULL, 'COBRADOR', 1),
(6, 'Bismarck', 'Veizaga Moron', NULL, NULL, NULL, NULL, NULL, NULL, 'VENDEDOR', 1),
(7, 'Juan Carlos', 'Mendoza Paz', NULL, NULL, NULL, NULL, NULL, NULL, 'VENDEDOR', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_pagos`
--

CREATE TABLE `plan_pagos` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `monto_total` double NOT NULL,
  `deuda_anterior` double NOT NULL,
  `monto_inicial` double NOT NULL,
  `nro_cuotas` int(11) NOT NULL,
  `tipo_periodico` int(11) NOT NULL,
  `monto_cuotas` double NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(1) NOT NULL,
  `id_plan_anterior` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plan_pagos`
--

INSERT INTO `plan_pagos` (`id`, `id_cliente`, `monto_total`, `deuda_anterior`, `monto_inicial`, `nro_cuotas`, `tipo_periodico`, `monto_cuotas`, `fecha_inicio`, `fecha_creacion`, `estado`, `id_plan_anterior`) VALUES
(4, 1, 3800, 0, 1000, 4, 1, 950, '2018-08-01', '2018-08-27 22:20:06', 'R', 0),
(5, 2, 1000, 0, 600, 3, 1, 334, '2018-08-01', '2018-08-27 22:23:13', 'A', 0),
(6, 1, 5000, 3800, 200, 5, 1, 1000, '2018-08-30', '2018-08-28 11:43:02', 'R', 4),
(7, 1, 6000, 5000, 600, 8, 1, 800, '2018-08-05', '2018-08-28 11:52:51', 'R', 6),
(8, 1, 7000, 6000, 600, 7, 1, 1000, '2018-08-31', '2018-08-28 11:59:04', 'R', 7),
(9, 1, 8000, 7000, 600, 6, 1, 1500, '2018-08-31', '2018-08-28 12:00:10', 'R', 8),
(10, 1, 9000, 8000, 600, 6, 1, 1550, '2018-08-31', '2018-08-28 12:29:05', 'A', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` double NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(1) NOT NULL,
  `precio_mayor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `subtitulo` varchar(150) DEFAULT NULL,
  `especificaciones` text DEFAULT NULL,
  `descripcion` text NOT NULL,
  `servicios` text DEFAULT NULL,
  `precio_base` double NOT NULL,
  `unidad_mayor` enum('Docena','Unitario','Cuarta') NOT NULL,
  `precio_mayor` double NOT NULL,
  `activo` enum('Habilitado','Deshabilitado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `titulo`, `subtitulo`, `especificaciones`, `descripcion`, `servicios`, `precio_base`, `unidad_mayor`, `precio_mayor`, `activo`) VALUES
(1, '1000', 'Colchon 1 Plaza', 'DUQUE AMERICANO', 'Colchon duque americano', NULL, '', NULL, 1600, 'Unitario', 1600, NULL),
(2, '1001', 'Colchon 1 1/2  Plaza', 'DUQUE AMERICANO', 'Colchon duque americano', NULL, '', NULL, 1800, 'Unitario', 1800, NULL),
(3, '1002', 'Colchon 2 Plaza', 'DUQUE AMERICANO', 'Colchon duque americano', NULL, '', NULL, 2000, 'Unitario', 2000, NULL),
(4, '1003', 'Colchon 2 1/2  Plaza', 'DUQUE AMERICANO', 'Colchon duque americano', NULL, '', NULL, 2400, 'Unitario', 2400, NULL),
(5, '1004', 'Colchon 3 Plaza', 'DUQUE AMERICANO', 'Colchon duque americano', NULL, '', NULL, 2800, 'Unitario', 2800, NULL),
(6, '2000', 'SOMIER 2 plaza', 'BASES SOMIER', 'Base somier para colchon', NULL, '', NULL, 1400, 'Unitario', 1400, NULL),
(7, '2001', 'SOMIER 1 1/2 plaza', 'BASES SOMIER', 'Base somier para colchon', NULL, '', NULL, 1200, 'Unitario', 1200, NULL),
(8, '3000', 'Sofa cama', 'Sofa Cama', 'Sofa Cama', NULL, '', NULL, 1800, 'Unitario', 1800, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `nombre`) VALUES
(1, 'fdsfsdfd'),
(2, 'fadsfdsfasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reposiciones`
--

CREATE TABLE `reposiciones` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_sucursal_destino` int(11) NOT NULL,
  `id_sucursal_origen` int(11) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nota` varchar(250) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reposiciones`
--

INSERT INTO `reposiciones` (`id`, `id_producto`, `cantidad`, `id_sucursal_destino`, `id_sucursal_origen`, `tipo`, `id_usuario`, `nota`, `fecha`) VALUES
(1, 1, 150, 1, NULL, 1, 0, 'nueva mecadria adquirida', '2019-03-11 13:15:42'),
(2, 1, 2, 1, NULL, 1, 0, 'nuevo producto adicionado', '2019-03-11 13:16:36'),
(3, 1, 1, 1, NULL, 2, 0, 'producto defectuoso', '2019-03-11 13:16:53'),
(4, 1, 19, 2, 1, 3, 0, 'surtiendo productos', '2019-03-11 00:00:00'),
(5, 3, 5540, 1, 2, 3, 0, 'repo', '2019-03-30 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_inventario`
--

CREATE TABLE `revision_inventario` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_inventario_producto`
--

CREATE TABLE `revision_inventario_producto` (
  `id_inventario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `observacion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `validar_stock` tinyint(1) NOT NULL,
  `mostrar_venta_realizada` tinyint(1) NOT NULL,
  `clientes_sn` tinyint(1) NOT NULL,
  `facturable` tinyint(1) NOT NULL,
  `venta_imprimible` tinyint(1) NOT NULL,
  `monto_base_credito_liente` tinyint(1) NOT NULL,
  `confirmar_recepcion_traslado_producto` tinyint(1) NOT NULL,
  `porcentaje_utilidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slideshow`
--

INSERT INTO `slideshow` (`id`, `title`, `url`, `priority`) VALUES
(23, '', '07ae66.jpg', NULL),
(24, '', 'ba6b73.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `email` varchar(125) DEFAULT NULL,
  `nota` varchar(500) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `direccion`, `telefono`, `email`, `nota`, `tipo`, `location`) VALUES
(1, 'Oficina Central', 'Av. 16 de Julio esquina Aroma Nro 145', '335-2574', 'jaime_gerente@polaris.com', NULL, 0, '451,522'),
(2, 'Sucursal Viedma', 'Av. Viedma entre 2° y 3° anillo, calle lazareto', '331-4752', 'pedro_rrhh@polaris.com', NULL, 0, '451,1224');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencias_apk`
--

CREATE TABLE `transferencias_apk` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_venta_apk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `password`, `estado`, `logged_in`, `id_grupo`, `id_persona`, `id_sucursal`, `created_at`) VALUES
(4, 'klon', '$2y$10$aJfEjxoIlTQGL21zv50hdOS9dcryrfmF0Ci033JcU/U6e2dfV1s1S', 0, 0, 0, 4, 0, '2018-08-23 19:37:49'),
(6, 'leonmc', '$2y$10$2uQbqWhqb2shcKZr4a8ZHuVb8qQjhnuoZgu8j4Di67jZ1Mxd51RPq', 0, 0, 0, 5, 0, '2018-08-24 11:30:26'),
(7, 'admin', '$2y$10$SgBcQ3k6/NuIsWyduez17eiz.SXCjg2fHs8AqNcDfQSx3TBw.M4K.', 0, 0, 0, 0, 0, '2018-08-24 11:33:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacios`
--

CREATE TABLE `vacios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1500) NOT NULL,
  `llave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacios`
--

INSERT INTO `vacios` (`id`, `nombre`, `llave`) VALUES
(1, '749===>0///', 19),
(1, '949===>0///Array\n(\n    [cantidad] => 200\n    [nota] => \n    [id_producto] => 1\n    [id_sucursal_origen] => 5\n    [tipo] => 3\n    [id_usuario] => 2\n)\n', 18),
(1, '0===>0///Array\n(\n    [cantidad] => 3\n    [id_sucursal_destino] => 6\n    [nota] => \n    [id_producto] => 1\n    [id_sucursal_origen] => 5\n    [tipo] => 3\n    [id_usuario] => 2\n)\n', 17),
(1, '749===>0///', 19),
(1, '949===>0///Array\n(\n    [cantidad] => 200\n    [nota] => \n    [id_producto] => 1\n    [id_sucursal_origen] => 5\n    [tipo] => 3\n    [id_usuario] => 2\n)\n', 18),
(1, '0===>0///Array\n(\n    [cantidad] => 3\n    [id_sucursal_destino] => 6\n    [nota] => \n    [id_producto] => 1\n    [id_sucursal_origen] => 5\n    [tipo] => 3\n    [id_usuario] => 2\n)\n', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nota` varchar(150) NOT NULL,
  `total` double NOT NULL,
  `estado` varchar(1) NOT NULL,
  `transferida` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_sucursal` int(11) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `fecha`, `id_cliente`, `nota`, `total`, `estado`, `transferida`, `id_vendedor`, `id_sucursal`, `tipo`) VALUES
(1, 6, '2018-08-25 19:20:00', 0, 'Venta suspendida al contado ', 12000, '', 0, 1, 2, 2),
(2, 6, '2018-08-25 19:20:00', 0, 'Venta suspendida al contado ', 12000, '', 0, 1, 2, 2),
(3, 6, '2018-08-25 19:23:00', 0, 'Venta suspendida al contado ', 1600, '', 0, 1, 1, 2),
(4, 6, '2018-08-25 19:23:00', 0, 'Venta suspendida al contado ', 10000, '', 0, 1, 2, 2),
(5, 6, '2018-08-25 19:24:00', 0, 'Venta suspendida al contado ', 8000, '', 0, 1, 2, 2),
(6, 6, '2018-08-25 19:24:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(7, 6, '2018-08-25 19:24:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(8, 6, '2018-08-25 19:24:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(9, 6, '2018-08-25 19:24:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(10, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(11, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(12, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(13, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(14, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(15, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(16, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(17, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(18, 6, '2018-08-25 19:48:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 1, 1, 2),
(19, 6, '2018-08-25 23:56:01', 1, 'Ventas al contado ', 1600, '', 0, 5, 1, 0),
(20, 6, '2018-08-25 23:56:00', 0, 'Venta suspendida al contado ', 3200, '', 0, 2, 1, 2),
(21, 6, '2018-08-25 23:59:15', 0, 'Ventas al contado ', 3200, '', 0, 5, 1, 0),
(22, 6, '2018-08-27 22:16:00', 1, 'Venta suspendida al contado ', 4800, '', 0, 2, 1, 2),
(23, 6, '2018-08-27 22:22:00', 2, 'Venta suspendida al contado ', 1600, '', 0, 2, 1, 2),
(24, 6, '2018-08-28 11:42:00', 1, 'Venta suspendida al contado ', 1600, '', 0, 2, 1, 2),
(25, 6, '2018-08-28 11:46:00', 1, 'Venta suspendida al contado ', 1600, '', 0, 2, 1, 1),
(26, 6, '2018-08-28 11:56:00', 1, 'Venta suspendida al contado ', 1600, '', 0, 2, 1, 1),
(27, 6, '2018-08-28 11:59:00', 1, 'Venta suspendida al contado ', 1600, '', 0, 2, 1, 1),
(28, 6, '2018-08-28 12:01:00', 1, 'Venta suspendida al contado ', 1600, '', 0, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_productos`
--

CREATE TABLE `venta_productos` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta_productos`
--

INSERT INTO `venta_productos` (`id_venta`, `id_producto`, `orden`, `cantidad`, `precio`) VALUES
(1, 3, 1, 6, 12000),
(2, 3, 1, 6, 12000),
(3, 1, 1, 1, 1600),
(4, 3, 1, 5, 10000),
(5, 3, 1, 4, 8000),
(6, 1, 1, 1, 1600),
(6, 1, 2, 1, 1600),
(7, 1, 1, 1, 1600),
(7, 1, 2, 1, 1600),
(8, 1, 1, 1, 1600),
(8, 1, 2, 1, 1600),
(9, 1, 1, 1, 1600),
(9, 1, 2, 1, 1600),
(10, 1, 1, 1, 1600),
(10, 1, 2, 1, 1600),
(11, 1, 1, 1, 1600),
(11, 1, 2, 1, 1600),
(12, 1, 1, 1, 1600),
(12, 1, 2, 1, 1600),
(13, 1, 1, 1, 1600),
(13, 1, 2, 1, 1600),
(14, 1, 1, 1, 1600),
(14, 1, 2, 1, 1600),
(15, 1, 1, 1, 1600),
(15, 1, 2, 1, 1600),
(16, 1, 1, 1, 1600),
(16, 1, 2, 1, 1600),
(17, 1, 1, 1, 1600),
(17, 1, 2, 1, 1600),
(18, 1, 1, 1, 1600),
(18, 1, 2, 1, 1600),
(19, 1, 1, 1, 1600),
(20, 1, 1, 1, 1600),
(20, 1, 2, 1, 1600),
(21, 1, 1, 1, 1600),
(21, 1, 2, 1, 1600),
(22, 1, 1, 3, 4800),
(23, 1, 1, 1, 1600),
(24, 1, 1, 1, 1600),
(25, 1, 1, 1, 1600),
(26, 1, 1, 1, 1600),
(27, 1, 1, 1, 1600),
(28, 1, 1, 1, 1600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Zona A', '<p>\r\n	Comprende todo el segundo anillo hasta la AV. Paragua</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura para la vista `inventario_global`
--
DROP TABLE IF EXISTS `inventario_global`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventario_global`  AS SELECT `inventarios`.`id_producto` AS `id_producto`, sum(`inventarios`.`cantidad`) AS `cantidad` FROM `inventarios` GROUP BY `inventarios`.`id_producto``id_producto`  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_productos`
--
ALTER TABLE `categoria_productos`
  ADD PRIMARY KEY (`id_producto`,`id_categoria`);

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuenta_cliente`
--
ALTER TABLE `cuenta_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id_plan_pago`,`numero`);

--
-- Indices de la tabla `destacados`
--
ALTER TABLE `destacados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id_producto`,`id_sucursal`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plan_pagos`
--
ALTER TABLE `plan_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reposiciones`
--
ALTER TABLE `reposiciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `revision_inventario`
--
ALTER TABLE `revision_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `revision_inventario_producto`
--
ALTER TABLE `revision_inventario_producto`
  ADD PRIMARY KEY (`id_inventario`,`id_producto`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transferencias_apk`
--
ALTER TABLE `transferencias_apk`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_productos`
--
ALTER TABLE `venta_productos`
  ADD PRIMARY KEY (`id_venta`,`id_producto`,`orden`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `destacados`
--
ALTER TABLE `destacados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `plan_pagos`
--
ALTER TABLE `plan_pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reposiciones`
--
ALTER TABLE `reposiciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `revision_inventario`
--
ALTER TABLE `revision_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transferencias_apk`
--
ALTER TABLE `transferencias_apk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
