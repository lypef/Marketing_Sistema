-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-02-2019 a las 06:15:57
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
(1, 'RESTAURANTES', 'TODOS LOS RESTAURANTES AQUI\r\n', '../../public/images/category/1.JPG'),
(2, 'COMIDA RAPIDA', 'RESTAURANTES DE COMIDA RAPIDA', '../../public/images/category/2.JPG'),
(3, 'CAFETERIAS', 'CAFETERÍAS Y DEMÁS ', '../../public/images/category/3.JPG'),
(4, 'BELLEZA', 'TIENDAS DE BELLEZA', '../../public/images/category/4.JPG'),
(5, 'SALUD / BIENESTAR', 'SALUD Y BELLEZA', '../../public/images/category/5.JPG'),
(6, 'ANTROS / BARES', 'ANTROS, BARES Y DIVERSION', '../../public/images/category/6.JPG'),
(7, 'HOTELES', 'SERVICIOS HOTELEROS', '../../public/images/category/7.JPG'),
(8, 'SERVICIOS PROFESIONALES', 'SERVICIOS', '../../public/images/category/8.JPG'),
(9, 'Postres, Helados y Dulces', 'Postres, Helados y Dulces', '../../public/images/category/9.JPG'),
(10, 'Escuelas', 'Escuelas', '../../public/images/category/10.JPG'),
(11, 'Disciplinas, Centros y tiendas deportivas', 'Disciplinas, Centros y tiendas deportivas', '../../public/images/category/11.JPG'),
(12, 'Moda y calzado', 'Moda y calzado', '../../public/images/category/12.JPG'),
(13, 'Hogar', 'Hogar', '../../public/images/category/13.JPG'),
(14, 'Autos', 'Autos', '../../public/images/category/14.JPG'),
(15, 'Entretenimiento', 'Entretenimiento', '../../public/images/category/15.JPG'),
(16, 'Cadenas comerciales/ints. bancarias', 'Cadenas comerciales/Instituciones bancarias', '../../public/images/category/16.JPG');

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
(1, 1, 'PAMPAS S.A DE C.V', 1, 'DIRECCION NUEVA s', 'A@a.COM', '45455', 'EFRAIN MARTINEZ CASTRO', 1),
(49, 2, 'CHINA TOWN', 0, 'FORUM COATZACOALCOS', 'A@A.COM', '7451', 'PEPE PECAS CON UN PICO', 0),
(53, 8, 'DESPACHO JURIDICO', 1, 'PARQUE JUAREZ NO. 9', 'MARTINZARATE@HOTMAIL.COM', '66564', 'LIC. MARTIN ZARATE', 0),
(54, 5, 'FARMACIA DEL AHORRO', 1, 'TUXTLA GUTIERREZ CHIAPAS', 'CONTACTO@FARMAHORRO.COM', '5465464', 'ING. LUIS ANTONIO MAGANDA PATRICIO', 1),
(55, 8, 'H. AYUNTAMIENTO CONSTITUCIONAL', 1, 'INDEPENDENCIA 15, COATZACOALCOS VERACRUZ', 'AA@A.COM', '5646545', 'ING. ANA KAREN COUTOLEM', 0),
(56, 3, 'CAFETERIA DEL PARQUE', 1, 'PARQUE', 'A@A.COM', '852', 'ING. VALDOMERO PERES ASCANIO', 1),
(57, 5, 'FRUTAS Y VERDURAS CABADA', 1, 'CERRO, CENTRO. ', 'A@A.COM', '963', 'CAROLINA ASCENCIO DOMINGUEZ', 0),
(58, 4, 'ZAPATERIA CUERNAVACA', 1, '20 DE NOVIEMBRE 306', 'A@A.COM', '963', 'CANDELARIA DOMINICK TORETO', 0),
(59, 8, 'PEMEX S.A DE C.V', 1, 'DESCONOCIDA', 'A@A.COM', '963', 'GERMAN MARIANO ROSAL', 0),
(168, 2, 'QUESADILLAS HIDALGUENSES', 1, 'PARQUE JUARES NO. 12', 'HIDALGEUNSE@QUESADILLAS.COM', '65656', 'NO SE SABE', 1),
(169, 2, 'qwdwdq', 1, '', '', '', '', 0),
(170, 2, 'qwdwdwd', 1, '', '', '', '', 0),
(171, 4, 'qwdwdwdwq', 1, '', '', '', '', 0),
(172, 2, 'qwdwqdw', 1, '', '', '', '', 0),
(173, 2, 'dwqdqwdwq', 1, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_zacatecas`
--

CREATE TABLE `c_zacatecas` (
  `id` int(11) NOT NULL,
  `url` varchar(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `c_zacatecas`
--

INSERT INTO `c_zacatecas` (`id`, `url`, `name`, `text`) VALUES
(1, '../../public/images/c_zacatecas/jerez.jpg', 'Jerez de García Salinas', 'Ubicado a 57 km de la capital, uno de los seis Pueblos Mágicos del estado de Zacatecas y sin duda, el más visitado tanto por los capitalinos como por los turistas provenientes de otras ciudades. Debido a sus tradiciones, fiestas y su  belleza natural y arquitectónica, sin dejar de mencionar su música conocida como “Tamborazo Zacatecano” o bien sus deliciosas nieves de garrafa y sus típicas tostadas de trompa y de carnitas, hacen que visitar el municipio de Jerez sea una experiencia que se quiera repetir. '),
(2, '../../public/images/c_zacatecas/laquemada.jpg', 'La Quemada', 'El estado de Zacatecas guarda a 57 km de la capital, el asentamiento monumental más importante del centro norte de México, se cree que esta zona arqueológica fue construida por diversos habitantes del lugar entre los años 350 y 1150 d.C., época en la que hubieron varios asentamientos culturales en esa región. En ella, se construyeron grandes salones, enormes columnas, una cancha para el juego de pelota, una pirámide y una red de calzadas que comunicaban con asentamientos inferiores por las que circulaban las ofrendas, mercancía que sostenía a la comunidad,además de sus procesiones para honrar a sus dioses. La Quemada es un lugar lleno de historia y enigmas aún sin revelar, por eso, vale la pena visitar este atractivo.'),
(3, '../../public/images/c_zacatecas/nochistlan.jpg', 'Nochistlán', 'Son 230 kilómetros los que separan a la capital de este hermoso Pueblo Mágico lleno de historia pues es considerado la segunda cabecera municipal más antigua del estado de Zacatecas, ya que fue en este lugar en el año de 1532 cuando los españoles fundaron por primera vez Guadalajara para luego ser trasladada a su actual ubicación en el estado de Jalisco. Pero sin duda, son sus suculentos platillos de birria o las gorditas y el platillo típico del lugar llamado “Pollo a la Valentina”, sus piezas de arte popular y las famosas coleaderas suertes charras típicas de la zona\r\n\r\n las que hacen de Nochistlán un pueblo que conserva la esencia de la cultura mexicana.'),
(4, '../../public/images/c_zacatecas/organos.jpg', 'Parque Nacional Sierra de Órganos', 'A 30 km del municipio de Sombrerete se esconde este imponente atractivo turístico regalado por la naturaleza, son 1,125 hectáreas donde podrás admirar las impactantes formaciones rocosas creadas por el viento, el agua y el origen volcánico, dándole una similitud a las pipas musicales de un órgano, de ahí su peculiar nombre. En este lugar, podrás practicar alpinismo, excursionismo e incluso acampar en medio de la naturaleza o si lo prefieres, rentar una de las cabañas disponibles del lugar. Sin lugar a dudas, el Parque Nacional Sierra de Órganos es un lugar que todo espíritu aventurero no debe perderse.'),
(5, '../../public/images/c_zacatecas/ortega.jpg', 'Teúl de González Ortega', 'Al sur de la capital, a 213 km, se encuentra este acogedor Pueblo Mágico característico por sus calzadas de piedra y famoso por sus bebidas a base de mezcal y cremas de agave de exquisitos sabores como coco, maracuyá, piñón, café entre otros. En su arquitectura podrás encontrar edificaciones del siglo XVIII, casas muy antiguas y gárgolas de cantera que resguardan este bello pueblo y sin olvidarnos de los trabajos de alfarería que realizan los locatarios y los deliciosos dulces regionales como el taninole (combinación de calabaza enmielada y leche), el ponteduro (maíz dulce o prieto con piloncillo), la torta de arroz con piloncillo, entre otros que podrás encontrar en el mercado municipal de este bello municipio.'),
(6, '../../public/images/c_zacatecas/pinos.jpg', 'Pinos', 'En la frontera con el estado de San Luis Potosí a 125 km de la capital zacatecana, se encuentra uno de los municipios que fuera de los más importantes para la minería entre el siglo XIV y XIX, hoy es un lugar ideal para disfrutar de una armoniosa tranquilidad y recorrer aquellas edificaciones con historia, adquirir las típicas artesanías de barro y degustar de su extensa gastronomía que en su mayoría va acompañada de nopales, además de los platillos regionales como el conejo con mole de pinole, las gorditas de horno y los patoles blancos (frijoles). Si amas la gastronomía, Pinos es el lugar indicado para satisfacer al  paladar.'),
(7, '../../public/images/c_zacatecas/plateros.jpg', 'Santuario de Plateros', 'Este santuario es el tercero más importante para los devotos católicos después de la Basílica de Guadalupe y la iglesia de San Juan de los Lagos y se encuentra 66 km de la capital zacatecana en el municipio de Fresnillo. El Santuario de Plateros alberga a más de 1.5 millones de peregrinos cada año, esto debido, por una parte a la gran cantidad de milagros que se cuentan, realizó el Santo Niño de Atocha y por otro lado, la arquitectura y el patrimonio artístico-religioso único en todo México, atrae a los menos creyentes pero amantes de la historia. Sin importar las creencias religiosas, el santuario es un lugar digno de admirar por su riqueza y belleza general.'),
(8, '../../public/images/c_zacatecas/sombrerete.jpg', 'Sombrerete', 'Uno de los municipios más hermosos y ricos en tradiciones del Estado; a 170 km de Zacatecas capital se encuentra esta bella tierra que alberga uno de los Parques Nacionales más imponentes de México llamado “Parque Nacional Sierra de Órganos”, además de contar con una deliciosa gastronomía en la que resaltan las llamadas “brujitas”, que son empanadas de maíz fritas en aceite y rellenas de carne deshebrada o frijoles y el famoso pan ranchero cuya cocción se realiza en un horno de adobe, ladrillo y lodo, mismo que le brinda un sabor único y exquisito. Las plazuelas y jardines del centro hacen de Sombrerete un pueblo pintoresco que no puede dejar de visitarse.');

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
(45, 54, '../../public/images/clients/54_20181230050216.jpg', '../../public/images/clients/54_20181230050216.jpg', 1, 'NO TECONFUNDAS ! ', 'NO SOMOS LOS UNICOS, PERO SI LOS MEJORES', ''),
(46, 54, '../../public/images/clients/54_20181230050233.jpg', '../../public/images/clients/54_20181230050233.jpg', 0, 'FARMACIA DEL AHORRO CENTRO ! ', 'SIEMPRE LISTOS  ! ', ''),
(47, 53, '../../public/images/clients/53_20181230050348.jpg', '../../public/images/clients/53_20181230050348.jpg', 0, 'DIA OCUPADO', 'DIA OCUPADO, LA ULTIMA Y TERMINAMOS ', ''),
(48, 53, '../../public/images/clients/53_20181230050425.jpg', '../../public/images/clients/53_20181230050425.jpg', 0, 'REUNIONES CON STYLO ! ', 'OFICINAS SUC. MADERO', ''),
(49, 55, '../../public/images/clients/55_20181230050534.jpg', '../../public/images/clients/55_20181230050534.jpg', 0, 'NUEVA AMBULANCIA', 'NUEVO VEHÍCULO OFICIAL ', ''),
(50, 55, '../../public/images/clients/55_20181230050551.jpg', '../../public/images/clients/55_20181230050551.jpg', 0, 'AGUINALDO ?', 'QUEREMOS TU AGUINALDO ', ''),
(52, 1, '../../public/images/clients/1_20190109070942.jpg', '../../public/images/clients/1_20190109070942.jpg', 0, '', '', ''),
(53, 1, '../../public/images/clients/1_20190109071540.jpg', '../../public/images/clients/1_20190109071540.jpg', 0, '', '', ''),
(54, 1, '../../public/images/clients/1_20190109071613.jpg', '../../public/images/clients/1_20190109071613.jpg', 0, '', '', ''),
(55, 1, 'https://www.youtube.com/watch?v=CAaXHE4Yhl8', '../../public/images/clients/1_20190109071945.jpg', 0, 'ghjkl', 'tgyhjkl', 'ghujkl'),
(56, 1, 'https://www.youtube.com/watch?v=-gVCM_x42_s', '../../public/images/clients/1_20190109073859.jpg', 0, '', '', ''),
(57, 1, 'https://www.youtube.com/watch?v=-gVCM_x42_s', '../../public/images/clients/1_20190109074147.jpg', 0, '', '', ''),
(58, 1, 'https://www.youtube.com/watch?v=-gVCM_x42_s', '../../public/images/clients/1_20190109074214.jpg', 0, '2 POTENCIAS SE UNEN', 'ESCORPIÓN DORADO Y JAIME DUENDE', 'JAIME, MASCARA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `url` varchar(254) NOT NULL,
  `title` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`id`, `url`, `title`) VALUES
(1, '../../public/images/clients/1.jpg', '1'),
(2, '../../public/images/clients/2.jpg', 'd'),
(3, '../../public/images/clients/1.jpg', 'a'),
(4, '../../public/images/clients/1.jpg', 'a'),
(5, '../../public/images/clients/1.jpg', 'a'),
(6, '../../public/images/clients/1.jpg', 'a'),
(7, '../../public/images/clients/1.jpg', 'a'),
(8, '../../public/images/clients/1.jpg', 'a'),
(9, '../../public/images/clients/1.jpg', 'a'),
(10, '../../public/images/clients/1.jpg', 'a'),
(11, '../../public/images/clients/1.jpg', 'a'),
(12, '../../public/images/clients/1.jpg', 'a'),
(13, '../../public/images/clients/1.jpg', 'a'),
(14, '../../public/images/clients/1.jpg', 'a'),
(15, '../../public/images/clients/1.jpg', 'a'),
(16, '../../public/images/clients/1.jpg', 'a'),
(17, '../../public/images/clients/1.jpg', 'a'),
(18, '../../public/images/clients/1.jpg', 'a'),
(19, '../../public/images/clients/1.jpg', 'a'),
(20, '../../public/images/clients/1.jpg', 'a'),
(21, '../../public/images/clients/1.jpg', 'a'),
(22, '../../public/images/clients/1.jpg', 'a'),
(23, '../../public/images/clients/1.jpg', 'a'),
(24, '../../public/images/clients/1.jpg', 'a'),
(25, '../../public/images/clients/1.jpg', 'a'),
(26, '../../public/images/clients/1.jpg', 'a'),
(27, '../../public/images/clients/1.jpg', 'a'),
(28, '../../public/images/clients/1.jpg', 'a'),
(29, '../../public/images/clients/1.jpg', 'a'),
(30, '../../public/images/clients/1.jpg', 'a'),
(31, '../../public/images/clients/1.jpg', 'a'),
(32, '../../public/images/clients/1.jpg', 'a'),
(33, '../../public/images/clients/1.jpg', 'a'),
(34, '../../public/images/clients/1.jpg', 'a'),
(35, '../../public/images/clients/1.jpg', 'a'),
(36, '../../public/images/clients/1.jpg', 'a'),
(37, '../../public/images/clients/1.jpg', 'a'),
(38, '../../public/images/clients/1.jpg', 'a'),
(39, '../../public/images/clients/2.jpg', 'qwef'),
(40, '../../public/images/clients/2.jpg', 'qwef'),
(41, '../../public/images/clients/2.jpg', 'qwef'),
(42, '../../public/images/clients/2.jpg', 'qwef'),
(43, '../../public/images/clients/2.jpg', 'qwef'),
(44, '../../public/images/clients/2.jpg', 'qwef'),
(45, '../../public/images/clients/2.jpg', 'qwef'),
(46, '../../public/images/clients/2.jpg', 'qwef'),
(47, '../../public/images/clients/2.jpg', 'qwef'),
(48, '../../public/images/clients/2.jpg', 'qwef'),
(49, '../../public/images/clients/2.jpg', 'qwef'),
(50, '../../public/images/clients/2.jpg', 'qwef'),
(51, '../../public/images/clients/2.jpg', 'qwef'),
(52, '../../public/images/clients/2.jpg', 'qwef'),
(53, '../../public/images/clients/2.jpg', 'qwef'),
(54, '../../public/images/clients/2.jpg', 'qwef'),
(55, '../../public/images/clients/2.jpg', 'qwef'),
(56, '../../public/images/clients/2.jpg', 'qwef'),
(57, '../../public/images/clients/2.jpg', 'qwef'),
(58, '../../public/images/clients/2.jpg', 'qwef'),
(59, '../../public/images/clients/2.jpg', 'qwef'),
(60, '../../public/images/clients/2.jpg', 'qwef'),
(61, '../../public/images/clients/2.jpg', 'qwef'),
(62, '../../public/images/clients/2.jpg', 'qwef'),
(63, '../../public/images/clients/2.jpg', 'qwef'),
(64, '../../public/images/clients/2.jpg', 'qwef'),
(65, '../../public/images/clients/2.jpg', 'qwef'),
(66, '../../public/images/clients/2.jpg', 'qwef'),
(67, '../../public/images/clients/2.jpg', 'qwef'),
(68, '../../public/images/clients/2.jpg', 'qwef'),
(69, '../../public/images/clients/2.jpg', 'qwef'),
(70, '../../public/images/clients/2.jpg', 'qwef'),
(71, '../../public/images/clients/2.jpg', 'qwef'),
(72, '../../public/images/clients/2.jpg', 'qwef'),
(73, '../../public/images/clients/2.jpg', 'qwef'),
(74, '../../public/images/clients/2.jpg', 'qwef'),
(75, '../../public/images/clients/2.jpg', 'qwef'),
(76, '../../public/images/clients/2.jpg', 'qwef'),
(87, '../../public/images/gallery/magazine_20190223063931.png', 'df'),
(88, '../../public/images/gallery/magazine_20190223063953.png', 'ZACATECAS');

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
(1, 'CAPCOM', 1500, '../../public/images/magazine/2.jpg', '2019-01-31'),
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
-- Estructura de tabla para la tabla `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `descripcion` varchar(254) NOT NULL,
  `url` varchar(254) NOT NULL,
  `qr_img` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promotions`
--

INSERT INTO `promotions` (`id`, `client`, `name`, `descripcion`, `url`, `qr_img`) VALUES
(2, 1, 'MUJERES AL 2 X 1 ! ', 'sss', 'http://google.com', '../../public/images/qr_promotions/qr_promo_20190117172546..png'),
(3, 49, 'TODOS COMEN GRATIS ! ', 'FELIZ DIA DE LOS SANTOS INOCENTES ! ', 'http:/goo.com', '../../public/images/qr_promotions/qr_promo_20190117172838..png'),
(4, 53, 'FRANCISCO EDUARDO ASCENCIO  D', '', 'https://mail.google.com/mail/u/0/#inbox', '../../public/images/qr_promotions/qr_promo_20190117173301..png'),
(5, 49, 'CERVEZAS 2 X 1 !', 'CERVEZA CORONA 2 X 1 , SOLO DOMINGOS ! ', 'https://mail.google.com/mail/u/0/#inbox', '../../public/images/qr_promotions/qr_promo_20190117174027..png'),
(8, 56, 'ECFEWEW', 'WEFEWEW', 'https://s3.amazonaws.com/statics3.cinemex.com/uploads/cms/promosie/56-image.jpg', '../../public/images/qr_promotions/qr_promo_20190222170237..png'),
(9, 56, 'FWEFEWFEWF', 'FEWEWFEWFEW', 'http://localhost/index.php/all/promotions?id_img=27&pag=1', '../../public/images/qr_promotions/qr_promo_20190222170548..png'),
(10, 56, 'd', 'd', 'http://localhost/index.php/all/promotions?id_img=73&pag=1', '../../public/images/qr_promotions/qr_promo_20190222174754..png'),
(11, 53, 'COMBO LUNES', 'JKHJKHJKHJKHK', 'http://localhost/index.php/all/promotions?id_img=65&pag=1', '../../public/images/qr_promotions/qr_promo_20190222175210..png'),
(12, 49, 'COMBO LUNES', 'JKHJKHJKHJKHK', 'http://localhost/index.php/all/promotions?id_img=71&pag=1', '../../public/images/qr_promotions/qr_promo_20190222175319..png'),
(13, 168, 'COMBO LUNES', 'CON INVITADO ESPECIAL', 'http://localhost/index.php/all/promotions?id_img=71&pag=1', '../../public/images/qr_promotions/qr_promo_20190222175439..png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotions_locals`
--

CREATE TABLE `promotions_locals` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `url` varchar(254) NOT NULL,
  `price` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promotions_locals`
--

INSERT INTO `promotions_locals` (`id`, `name`, `url`, `price`) VALUES
(2, 'Nombre publicidads', '../../public/images/promotions/promo_20190118060306.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(4, 'Nombre publicidad', '../../public/images/promotions/promo_20190118060810.jpg', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(5, 'Nombre publicidad', '../../public/images/promotions/promo_20190118060817.jpg', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(6, 'Nombre publicidad', '../../public/images/promotions/promo_20190118060824.jpg', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(7, 'Nombre publicidad', '../../public/images/promotions/promo_20190118060852.jpg', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(8, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(9, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(10, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(11, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(12, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(13, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(14, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(15, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(16, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(17, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(18, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(19, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(20, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(21, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(22, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(23, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(24, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(25, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(26, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(27, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(28, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(29, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(30, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(31, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(32, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(33, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(34, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(35, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(36, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(37, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(38, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(39, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(40, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(41, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(42, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(43, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(44, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(45, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(46, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(47, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(48, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(49, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(50, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(51, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(52, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(53, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(54, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(55, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(56, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(57, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(58, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(59, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(60, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(61, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(62, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(63, 'Nombre publicidad', '../../public/images/promotions/promo_20190118055721.png', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(64, 'NUEVO NOMBRE', '../../public/images/promotions/promo_20190118065925.jpg', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(65, 'EFEFW', '../../public/images/promotions/promo_20190118070021.jpg', 'Antes: $ 155.00 MXN / Ahora $ 125.00 MXN'),
(67, 'PROMOCION', '../../public/images/promotions/promo_20190222171630.png', 'OFERTA SOLO $ 999.99'),
(68, 'COMBO LUNES', '../../public/images/promotions/promo_20190222171910.png', 'OFERTA SOLO $ 999.99'),
(69, 'cfecfwfcew', '../../public/images/promotions/promo_20190222172058.png', 'OFERTA SOLO $ 999.99'),
(70, 'COMBO LUNES', '../../public/images/promotions/promo_20190222172155.png', 'OFERTA SOLO $ 999.99'),
(71, 'COMBO LUNES', '../../public/images/promotions/promo_20190222172303.png', 'OFERTA SOLO $ 999.99'),
(72, 'COMBO LUNES', '../../public/images/promotions/promo_20190222172416.png', 'OFERTA SOLO $ 999.99'),
(73, ':D', '../../public/images/promotions/promo_20190222172442.png', 'OFERTA SOLO $ 999.99');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `register_magazine`
--

CREATE TABLE `register_magazine` (
  `id` varchar(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `direccion` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `phone` varchar(254) NOT NULL,
  `info_email` tinyint(1) NOT NULL,
  `promo_nego` tinyint(1) NOT NULL,
  `estatus` tinyint(1) NOT NULL,
  `f_ini` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `register_magazine`
--

INSERT INTO `register_magazine` (`id`, `name`, `direccion`, `email`, `phone`, `info_email`, `promo_nego`, `estatus`, `f_ini`) VALUES
('00000513117005', 'FRANCISCO EDUARDO ASCENCIO  DOMINGUEZ', '20 DE NOVIEMBRE, NO. 306, COLONIA CENTRO, FRENTE A PORTÓN  DE COPPEL', 'A@A.COM', '9231200505', 1, 1, 0, '2019-01-31'),
('000025011174005', 'FULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 1, '2019-01-10'),
('0000301117005', 'FULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 1, '2019-01-10'),
('000535001117005', 'FULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 1, '2019-01-10'),
('9003001117005', 'aaFULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 0, '2019-01-10'),
('90530001117005', 'AFULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 1, '2019-01-10'),
('98000001117005', 'FULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 1, '2019-01-10'),
('98000001146128', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-16'),
('98000001146136', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-16'),
('98000001146151', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-16'),
('98000001146169', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-16'),
('98000001146177', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-16'),
('98000001163495', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-18'),
('98000001163503', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-18'),
('98000001172439', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-20'),
('98000001173122', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-21'),
('98000001173130', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-21'),
('98000001173148', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-21'),
('98000001173155', 'FRANCISCO EDUARDO ASCENCIO  D', 'VEINTE DE NOVIEMBRE', 'LYPEF@LIVE.COM', '+529231200505', 1, 1, 0, '2019-01-21'),
('980000051117005', 'FULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 0, '2019-01-10'),
('9800002501117005', 'FULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 1, '2019-01-10'),
('98000025011174005', 'FULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 1, '2019-01-10'),
('980005001117005', 'FULANITO PEREZ', 'DIRECCION', 'A@A.COM', '+529231200505', 0, 0, 1, '2019-01-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `name` varchar(254) NOT NULL,
  `mail` varchar(254) NOT NULL,
  `video` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `mail`, `video`) VALUES
(1, 'root', 'b9be11166d72e9e3ae7fd407165e4bd2', 'Francisco Eduardo Ascencio Dominguez', 'lypef@live.com', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(2, 'carlitos_015', 'b9be11166d72e9e3ae7fd407165e4bd2', 'CARLOS PEREZ ISIDORO', 'carlos@empresa.com', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(3, 'carly052', 'b9be11166d72e9e3ae7fd407165e4bd2', 'JACINTO PEREZ ISIDORO', 'carlos@empresa.com', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(4, 'carly1456', 'b9be11166d72e9e3ae7fd407165e4bd2', 'ALFREDO PEREZ ISIDORO', 'carlos@empresa.com', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(5, 'especial_456', 'B9be11166d72e9e3ae7fd407165e4bd2', 'MARTIN PEREZ ISIDORO', 'carlos@empresa.com', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(7, 'carly1852', 'B9be11166d72e9e3ae7fd407165e4bd2', 'CLEOTILDE PEREZ ISIDORO', 'carlos@empresa.com\r\n', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(8, 'carly852', 'B9be11166d72e9e3ae7fd407165e4bd2', 'TADEO PEREZ ISIDORO', 'carlos@empresa.com\r\n', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(11, 'demo', '6c5ac7b4d3bd3311f033f971196cfa75', 'USUARIO DEMO', 'demo@cyberchoapoas.com', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(13, 'demoo', '3da4b5b994b07d7faa6e2251437f2b80', 'a', 'a@a.com', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/NTFjleENYEo\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

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
-- Indices de la tabla `c_zacatecas`
--
ALTER TABLE `c_zacatecas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa_gallery`
--
ALTER TABLE `empresa_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_gallery_multi` (`empresa`);

--
-- Indices de la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `magazine`
--
ALTER TABLE `magazine`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_promo` (`client`);

--
-- Indices de la tabla `promotions_locals`
--
ALTER TABLE `promotions_locals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `register_magazine`
--
ALTER TABLE `register_magazine`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `c_zacatecas`
--
ALTER TABLE `c_zacatecas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `empresa_gallery`
--
ALTER TABLE `empresa_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `magazine`
--
ALTER TABLE `magazine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `promotions_locals`
--
ALTER TABLE `promotions_locals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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

--
-- Filtros para la tabla `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `client_promo` FOREIGN KEY (`client`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
