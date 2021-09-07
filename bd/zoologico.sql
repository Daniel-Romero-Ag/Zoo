-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2021 a las 03:08:00
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zoologico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(120) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_larga` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `edad_minima` tinyint(4) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `equipo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `id_horarios` int(11) DEFAULT NULL,
  `id_categorias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre`, `descripcion`, `descripcion_larga`, `edad_minima`, `precio`, `equipo`, `id_horarios`, `id_categorias`) VALUES
(2, 'Nado con delfines', 'En esta actividad se nadará por un plazo de media hora con delfines', 'En esta actividad se nadará con 2 delfines, acompañados de un instructor que en todo momento se asegurará de la seguridad de los participantes, también se educará a los niños sobre los delfines y su importancia para el ecosistema', 6, '1000', 'Chaleco salvavidas', 2, 6),
(5, 'Visita a los elefantes', 'Se podrá ver a los elefantes en su habitad natural', 'Se buscará a los elefantes dentro de su habitad, el transporte será en un coche especialmente adaptado para hacerlo seguro, los veremos a una distancia segura con binoculares', 5, '0', 'Casco', 2, 7),
(6, 'Alimenta a las jirafas', 'Podrás alimentar a las jirafas con ayuda del personal', 'Ven y vive una experiencia inolvidable alimentando a estos majestuosos animales, se les dará su alimento en su habitad natural', 5, '0', 'Casco', 2, 7),
(7, 'Conoce a las cebras', 'Se podrá ver a las cebras en su habitad natural', 'Se buscará a la manada de cebras dentro de su habitad, el transporte será en un coche especialmente adapatado para hacerlo seguro, las veremos a una distancia segura con binoculares', 5, '0', 'Ninguno', 2, 7),
(8, 'Sumergete con los tiburones', 'Ve de cerca a estos hermosos animales desde la seguridad de una jaula', 'En esta actividad se verán tiburones toro desde una jaula de metal reforzada, nos sumerguiremos mientras respiramos con un tubo de aire', 8, '500', 'Ninguno', 1, 6),
(9, 'Descubre nuestro acuario', 'Conoce a las mas de 30 especies diferentes de peces, moluscos, crustaceos y cefalópodos que tenemos', 'Pasearán por nuestro acuario, los animales están en peceras, algunas especies conviven juntas y otras son demasiado territoriales por lo que cuentan con su propia pecera', 0, '0', 'Ninguno', 3, 6),
(10, 'Almuerza en nuestra hermosa área de picnics', 'Ven, relajate y disfruta de la comida en familia', 'Contamos con un área de picnics, tenemos todo lo necesario para pasar un buen momento, adicionalmente podemos vender carne si desea asar carne', 0, '0', 'Ninguno', 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Categoría Pendiente',
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(6, 'Acuatica', 'Son Actividades en las cuales las personas deben sumergirse total o parcialmente'),
(7, 'Terrestre', 'Son actividades realizadas en contacto con la tierra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `hora_inicio`, `hora_fin`) VALUES
(1, '10:00:00', '19:00:00'),
(2, '08:00:00', '14:00:00'),
(3, '10:00:00', '20:00:00'),
(5, '16:00:00', '20:00:00'),
(6, '16:00:00', '20:00:00'),
(7, '16:00:00', '20:00:00'),
(8, '16:00:00', '20:00:00'),
(9, '16:00:00', '20:00:00'),
(10, '16:00:00', '20:00:00'),
(11, '16:00:00', '20:00:00'),
(12, '16:00:00', '20:00:00'),
(13, '16:00:00', '20:00:00'),
(14, '16:00:00', '20:00:00'),
(15, '16:00:00', '20:00:00'),
(16, '16:00:00', '20:00:00'),
(17, '16:00:00', '20:00:00'),
(18, '16:00:00', '20:00:00'),
(19, '16:00:00', '20:00:00'),
(20, '16:00:00', '20:00:00'),
(21, '16:00:00', '20:00:00'),
(22, '16:00:00', '20:00:00'),
(23, '16:00:00', '20:00:00'),
(24, '16:00:00', '20:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_actividades_horarios` (`id_horarios`),
  ADD KEY `fk_actividades_categorias` (`id_categorias`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `fk_actividades_categorias` FOREIGN KEY (`id_categorias`) REFERENCES `categorias` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_actividades_horarios` FOREIGN KEY (`id_horarios`) REFERENCES `horarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
