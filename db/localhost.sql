-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-01-2019 a las 06:19:27
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
(49, 2, 'CHINA TOWN', 0, 'FORUM COATZACOALCOS', 'A@A.COM', '7451', 'PEPE PECAS CON UN PICO', 0),
(53, 8, 'DESPACHO JURIDICO', 1, 'PARQUE JUAREZ NO. 9', 'MARTINZARATE@HOTMAIL.COM', '66564', 'LIC. MARTIN ZARATE', 0),
(54, 5, 'FARMACIA DEL AHORRO', 1, 'TUXTLA GUTIERREZ CHIAPAS', 'CONTACTO@FARMAHORRO.COM', '5465464', 'ING. LUIS ANTONIO MAGANDA PATRICIO', 0),
(55, 8, 'H. AYUNTAMIENTO CONSTITUCIONAL', 1, 'INDEPENDENCIA 15, COATZACOALCOS VERACRUZ', 'AA@A.COM', '5646545', 'ING. ANA KAREN COUTOLEM', 0),
(56, 3, 'CAFETERIA DEL PARQUE', 1, 'PARQUE', 'A@A.COM', '852', 'ING. VALDOMERO PERES ASCANIO', 1),
(57, 5, 'FRUTAS Y VERDURAS CABADA', 1, 'CERRO, CENTRO. ', 'A@A.COM', '963', 'CAROLINA ASCENCIO DOMINGUEZ', 0),
(58, 4, 'ZAPATERIA CUERNAVACA', 1, '20 DE NOVIEMBRE 306', 'A@A.COM', '963', 'CANDELARIA DOMINICK TORETO', 0),
(59, 8, 'PEMEX S.A DE C.V', 1, 'DESCONOCIDA', 'A@A.COM', '963', 'GERMAN MARIANO ROSAL', 0),
(168, 2, 'QUESADILLAS HIDALGUENSES', 1, 'PARQUE JUARES NO. 12', 'HIDALGEUNSE@QUESADILLAS.COM', '65656', 'NO SE SABE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa_gallery`
--

CREATE TABLE `empresa_gallery` (
  `id` int(11) NOT NULL,
  `empresa` int(11) NOT NULL,
  `url` varchar(254) NOT NULL,
  `url_img` varchar(254) NOT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(254) NOT NULL,
  `descripcion` varchar(254) NOT NULL,
  `tags` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa_gallery`
--

INSERT INTO `empresa_gallery` (`id`, `empresa`, `url`, `url_img`, `premium`, `title`, `descripcion`, `tags`) VALUES
(1, 1, '../../public/images/clients/1.jpg', '../../public/images/clients/1.jpg', 0, 'BOSQUE', 'ARBOLES DE EL BOSQUE FRIÓ EN ESTADOS UNIDOS DE NORTE AMERICA', 'NATURALEZA, AMANECER, ARBOLES ALTOS'),
(2, 1, '../../public/images/clients/2.jpg', '../../public/images/clients/2.jpg', 0, 'AVE', 'IMAGEN DE UN AVE DESCONOCIDA', 'NATURALEZA, AVE, MONTE'),
(3, 1, '../../public/images/clients/3.jpg', '../../public/images/clients/3.jpg', 0, 'EDIFICIOS', 'EDIFICIOS DONDE LO ÚNICO QUE LOS DIVIDE ES EL AGUA, Y NO EL AMOR. ', 'CONSTRUCCIÓN, NATURALEZA, PLANETA'),
(4, 1, '../../public/images/clients/4.jpg', '../../public/images/clients/4.jpg', 1, 'ROSA', 'ROSA CULTIVADA EN EL HOGAR DE UNA FAMILIA MEXICANA', 'NATURALEZA, ROSA, PLANETA'),
(5, 1, '../../public/images/clients/5.jpg', '../../public/images/clients/5.jpg', 0, 'BALLENA AZUL', 'BALLENA NADANDO LIBREMENTE', 'NATURALEZA, MAR, AGUA, BALLENA, LIBERTAD'),
(8, 1, '../../public/images/clients/6.jpg', '../../public/images/clients/6.jpg', 0, 'RIO EN LA SELVA', 'RIO DE AGUA AZUL EN MEDIO DE LA SELVA', 'RIO, SELVA, ARENA, AGUA, NATURALEZA'),
(22, 1, '../../public/images/clients/1_20181228051856.jpg', '../../public/images/clients/1_20181228051856.jpg', 1, 'CONTROL DE SOCIOS', 'SISTEMA PARA ADMINISTRACIÓN DE SOCIOS POR HUELLA DIGITAL', 'CLTA, ADMINISTRACION'),
(24, 49, '../../public/images/clients/49_20181228052755.jpg', '../../public/images/clients/49_20181228052755.jpg', 0, 'OFERTA', 'IMPRESIONES 50 CENTAVOS', 'IMPRESIONES, OFERTA, ECONOMIA'),
(27, 1, 'https://www.youtube.com/watch?v=pvTsR3xMPIM', '../../public/images/clients/1_20181228191056.jpg', 0, 'cómo elaborar un estanque para tortugas', 'buenas para todos y todas cómo elaborar un estanque para tortugas .', 'ESTANQUE, TORTUGAS'),
(28, 1, 'https://www.youtube.com/watch?v=65u2h0ZDFtQ', '../../public/images/clients/1_20181228191146.jpg', 1, 'MONTAR FILTRO', 'DESPUES DE VER ESTO YA NO PODRAS MONTAR TU FILTRO MAL', 'FILTO, ACUARIO, PECES'),
(29, 1, '../../public/images/clients/1_20181228191315.jpg', '../../public/images/clients/1_20181228191315.jpg', 1, 'OFERTA IMPRESIONES', 'IMPRESIONES A SOLO 60 CTVOS', '60, CENTAVOS'),
(30, 49, '../../public/images/clients/49_20181228191747.jpg', '../../public/images/clients/49_20181228191747.jpg', 0, 'CONTROL DE SOCIOS', 'CONTROL DE SOCIOS, HUELLA BIOMETRIA', 'HUELLA, SOCIOS'),
(31, 49, 'https://www.youtube.com/watch?v=bPpfCPrCSxI', '../../public/images/clients/49_20181228191816.jpg', 0, 'TACAÑO EXTREMO', 'TACAÑOS XTREMOS CAP. 150', 'TACAÑO, AHORRO, ETC'),
(33, 168, '../../public/images/clients/168_20181230045249.jpg', '../../public/images/clients/168_20181230045249.jpg', 0, 'TACOS AL PASTOS', 'DESCRIPCION DE LOS TACOS', 'TRAGS'),
(34, 168, '../../public/images/clients/168_20181230045317.jpeg', '../../public/images/clients/168_20181230045317.jpeg', 0, 'EMPANADAS CON QUESO ', 'DESCRIPCIÓN DE LAS EMPANADAS CON QUESO ', 'ETIQUETAS'),
(35, 56, '../../public/images/clients/56_20181230045425.jpg', '../../public/images/clients/56_20181230045425.jpg', 0, 'POSTRES DRAGOIN', 'POSTRES CON DRAGON ', 'DRAGON'),
(37, 56, '../../public/images/clients/56_20181230045534.jpg', '../../public/images/clients/56_20181230045534.jpg', 0, 'FELICIDADES', 'FELICES FIESTAS TE DESEA EL PERSONAL DE LA CAFETRIA.', ''),
(38, 57, '../../public/images/clients/57_20181230045630.jpg', '../../public/images/clients/57_20181230045630.jpg', 0, 'QUE TE COMES ?', 'ERES LO QUE COMES ?', ''),
(39, 57, '../../public/images/clients/57_20181230045648.jpg', '../../public/images/clients/57_20181230045648.jpg', 0, 'TOMATE ?', 'SOPA DE TOMATE', ''),
(40, 58, '../../public/images/clients/58_20181230045750.jpg', '../../public/images/clients/58_20181230045750.jpg', 0, 'HOLA VERANO ! ', 'MODA VERANO ', ''),
(41, 58, '../../public/images/clients/58_20181230045809.jpg', '../../public/images/clients/58_20181230045809.jpg', 0, 'ATRÉVETE ! ', 'SOLO SE VIVE UNA VEZ ! ', ''),
(43, 59, '../../public/images/clients/59_20181230045942.jpeg', '../../public/images/clients/59_20181230045942.jpeg', 0, 'SUCIO ?', 'EL PAÍS VALE ESTO Y MUCHO MAS !', ''),
(44, 59, '../../public/images/clients/59_20181230050023.jpg', '../../public/images/clients/59_20181230050023.jpg', 0, 'UNA Y NOS VAMOS ', 'SIEMPRE LIMPIO !', ''),
(45, 54, '../../public/images/clients/54_20181230050216.jpg', '../../public/images/clients/54_20181230050216.jpg', 0, 'NO TECONFUNDAS ! ', 'NO SOMOS LOS UNICOS, PERO SI LOS MEJORES', ''),
(46, 54, '../../public/images/clients/54_20181230050233.jpg', '../../public/images/clients/54_20181230050233.jpg', 0, 'FARMACIA DEL AHORRO CENTRO ! ', 'SIEMPRE LISTOS  ! ', ''),
(47, 53, '../../public/images/clients/53_20181230050348.jpg', '../../public/images/clients/53_20181230050348.jpg', 0, 'DIA OCUPADO', 'DIA OCUPADO, LA ULTIMA Y TERMINAMOS ', ''),
(48, 53, '../../public/images/clients/53_20181230050425.jpg', '../../public/images/clients/53_20181230050425.jpg', 0, 'REUNIONES CON STYLO ! ', 'OFICINAS SUC. MADERO', ''),
(49, 55, '../../public/images/clients/55_20181230050534.jpg', '../../public/images/clients/55_20181230050534.jpg', 0, 'NUEVA AMBULANCIA', 'NUEVO VEHÍCULO OFICIAL ', ''),
(50, 55, '../../public/images/clients/55_20181230050551.jpg', '../../public/images/clients/55_20181230050551.jpg', 0, 'AGUINALDO ?', 'QUEREMOS TU AGUINALDO ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `magazine`
--

CREATE TABLE `magazine` (
  `id` int(11) NOT NULL,
  `nombre` varchar(254) NOT NULL,
  `numero` int(11) NOT NULL,
  `url_img` varchar(254) NOT NULL,
  `f_publicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `magazine`
--

INSERT INTO `magazine` (`id`, `nombre`, `numero`, `url_img`, `f_publicacion`) VALUES
(1, 'camcon', 1, '../../public/images/magazine/2.jpg', '2019-01-31'),
(2, 'CAPCOM', 2, '../../public/images/magazine/2.jpg', '2019-01-04'),
(3, 'EDGE', 3, '../../public/images/magazine/3.jpg', '2019-01-05'),
(4, 'SMASH', 4, '../../public/images/magazine/4.jpg', '2019-01-09'),
(5, 'prueba 1', 5, '../../public/images/magazine/1.jpg', '2019-01-02'),
(6, 'prueba 1', 5, '../../public/images/magazine/1.jpg', '2019-01-02'),
(7, 'prueba 1', 5, '../../public/images/magazine/2.jpg', '2019-01-02'),
(8, 'prueba 1', 5, '../../public/images/magazine/3.jpg', '2019-01-02'),
(9, 'prueba 1', 5, '../../public/images/magazine/4.jpg', '2019-01-02'),
(10, 'prueba 1', 5, '../../public/images/magazine/1.jpg', '2019-01-02'),
(11, 'prueba 1', 5, '../../public/images/magazine/2.jpg', '2019-01-02'),
(12, 'prueba 1', 5, '../../public/images/magazine/3.jpg', '2019-01-02'),
(13, 'prueba 1', 5, '../../public/images/magazine/4.jpg', '2019-01-02'),
(14, 'prueba 1', 5, '../../public/images/magazine/1.jpg', '2019-01-02'),
(15, 'prueba 1', 5, '../../public/images/magazine/2.jpg', '2019-01-02'),
(16, 'prueba 1', 5, '../../public/images/magazine/3.jpg', '2019-01-02'),
(17, 'prueba 1', 5, '../../public/images/magazine/4.jpg', '2019-01-02'),
(18, 'prueba 1', 5, '../../public/images/magazine/1.jpg', '2019-01-02');

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
-- Indices de la tabla `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `magazine`
--
ALTER TABLE `magazine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
