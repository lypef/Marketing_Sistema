-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-12-2018 a las 07:49:18
-- Versión del servidor: 10.2.17-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marketing`
--
CREATE DATABASE IF NOT EXISTS `marketing` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `marketing`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `description` varchar(254) NOT NULL,
  `image` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`) VALUES
(1, 'RESTAURANTES', 'TODOS LOS RESTAURANTES AQUI\r\n', '/imagen/1.jpg'),
(2, 'COMIDA RAPIDA', 'RESTAURANTES DE COMIDA RAPIDA', '/imagen/1.jpg'),
(3, 'CAFETERIAS', 'CAFETERÍAS Y DEMÁS ', '/imagen/1.jpg'),
(4, 'BELLEZA', 'TIENDAS DE BELLEZA', '/imagen/1.jpg'),
(5, 'SALUD / BELLEZA', 'SALUD Y BELLEZA', '/imagen/1.jpg'),
(6, 'ANTROS / BARES', 'ANTROS, BARES Y DIVERSION', '/imagen/1.jpg'),
(7, 'HOTELES', 'SERVICIOS HOTELEROS', '/imagen/1.jpg'),
(8, 'SERVICIOS PROFESIONALES', 'SERVICIOS', '/imagen/1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `empresa` varchar(254) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `direccion` varchar(254) NOT NULL,
  `mail` varchar(254) NOT NULL,
  `telefono` varchar(254) NOT NULL,
  `responsable` varchar(254) NOT NULL,
  `premium5` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `category`, `empresa`, `active`, `direccion`, `mail`, `telefono`, `responsable`, `premium5`) VALUES
(1, 1, 'PAMPAS S.A DE C.V', 1, 'DIRECCION NUEVA s', 'A@A.COM', '45455', 'EFRAIN MARTINEZ CASTRO', 1),
(49, 2, 'CHINA TOWN', 0, 'FORUM COATZACOALCOS', 'A@A.COM', '7451', 'ALFONSO LOAIZA', 0),
(53, 8, 'DESPACHO JURIDICO', 1, 'PARQUE JUAREZ NO. 9', 'MARTINZARATE@HOTMAIL.COM', '66564', 'LIC. MARTIN ZARATE', 0),
(54, 5, 'FARMACIA DEL AHORRO', 1, 'TUXTLA GUTIERREZ CHIAPAS', 'CONTACTO@FARMAHORRO.COM', '5465464', 'ING. LUIS ANTONIO MAGANDA PATRICIO', 0),
(55, 8, 'H. AYUNTAMIENTO CONSTITUCIONAL', 1, 'INDEPENDENCIA 15, COATZACOALCOS VERACRUZ', 'AA@A.COM', '5646545', 'ING. ANA KAREN COUTOLEM', 0),
(56, 3, 'CAFETERIA DEL PARQUE', 1, 'PARQUE', 'A@A.COM', '852', 'ING. VALDOMERO PERES ASCANIO', 1),
(57, 3, 'FRUTAS Y VERDURAS CABADA', 1, 'CERRO, CENTRO. ', 'A@A.COM', '963', 'CAROLINA ASCENDIO DOMINGUEZ', 0),
(58, 3, 'ZAPATERIA CUERNAVACA', 1, '20 DE NOVIEMBRE 306', 'A@A.COM', '963', 'CANDELARIA DOMINICK TORETO', 0),
(59, 3, 'PEMEX S.A DE C.V', 1, 'DESCONOCIDA', 'A@A.COM', '963', 'GERMAN MARIANO ROSAL', 0),
(60, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(61, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(62, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(63, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(64, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHEz JUANES', 0),
(65, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(66, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(67, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(68, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(69, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(70, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(71, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(72, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(73, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(74, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(75, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(76, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(77, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(78, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(79, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(80, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(81, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(82, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(83, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(84, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(85, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(86, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(87, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(88, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(89, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(90, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(91, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(92, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(93, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(94, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(95, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(96, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(97, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(98, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(99, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(100, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(101, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(102, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(103, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(104, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(105, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(106, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(107, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(108, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(109, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(110, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(111, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(112, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(113, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(114, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(115, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(116, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(117, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(118, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(119, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(120, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(121, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(122, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(123, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(124, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(125, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(126, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(127, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(128, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(129, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(130, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(131, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(132, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(133, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(134, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(135, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(136, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(137, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(138, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(139, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(140, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(141, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(142, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(143, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(144, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(145, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(146, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(147, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(148, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(149, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(150, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(151, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(152, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(153, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(154, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(155, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(156, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(157, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(158, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(159, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(160, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(161, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(162, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(163, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(164, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(165, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(166, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(167, 3, 'demo', 1, 'DIRECCION', 'A@A.COM', '963', 'PEREZ MARTINES SANCHES SIRPIANO', 0),
(168, 2, 'QUESADILLAS HIDALGUENSES', 1, 'PARQUE JUARES NO. 12', 'HIDALGEUNSE@QUESADILLAS.COM', '65656', 'NO SE SABE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_gallery`
--

CREATE TABLE `empresa_gallery` (
  `id` int(11) NOT NULL,
  `empresa` int(11) NOT NULL,
  `url` varchar(254) NOT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(254) NOT NULL,
  `descripcion` varchar(254) NOT NULL,
  `tags` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa_gallery`
--

INSERT INTO `empresa_gallery` (`id`, `empresa`, `url`, `premium`, `title`, `descripcion`, `tags`) VALUES
(1, 1, '../../public/images/clients/1.jpg', 0, 'BOSQUE', 'ARBOLES DE EL BOSQUE FRIÓ EN ESTADOS UNIDOS DE NORTE AMERICA', 'NATURALEZA, AMANECER, ARBOLES ALTOS'),
(2, 1, '../../public/images/clients/2.jpg', 1, 'AVE', 'IMAGEN DE UN AVE DESCONOCIDA', 'NATURALEZA, AVE, MONTE'),
(3, 1, '../../public/images/clients/3.jpg', 1, 'EDIFICIOS', 'EDIFICIOS DONDE LO ÚNICO QUE LOS DIVIDE ES EL AGUA, Y NO EL AMOR. ', 'CONSTRUCCIÓN, NATURALEZA, PLANETA'),
(4, 1, '../../public/images/clients/4.jpg', 1, 'ROSA', 'ROSA CULTIVADA EN EL HOGAR DE UNA FAMILIA MEXICANA', 'NATURALEZA, ROSA, PLANETA'),
(5, 1, '../../public/images/clients/5.jpg', 0, 'BALLENA AZUL', 'BALLENA NADANDO LIBREMENTE', 'NATURALEZA, MAR, AGUA, BALLENA, LIBERTAD'),
(8, 1, '../../public/images/clients/6.jpg', 0, 'RIO EN LA SELVA', 'RIO DE AGUA AZUL EN MEDIO DE LA SELVA', 'RIO, SELVA, ARENA, AGUA, NATURALEZA'),
(12, 1, 'https://www.youtube.com/watch?v=65u2h0ZDFtQ', 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `mail` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `mail`) VALUES
(1, 'root', '63a9f0ea7bb98050796b649e85481845', 'Francisco Eduardo Acecion Dominguez', 'contacto@cyberchoapas.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_category` (`category`);

--
-- Indices de la tabla `empresa_gallery`
--
ALTER TABLE `empresa_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_gallery_multi` (`empresa`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `empresa_gallery`
--
ALTER TABLE `empresa_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `client_category` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa_gallery`
--
ALTER TABLE `empresa_gallery`
  ADD CONSTRAINT `empresa_gallery_multi` FOREIGN KEY (`empresa`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
