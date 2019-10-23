-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2019 a las 15:21:42
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sisbiblio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
`auto_id` int(11) NOT NULL,
  `auto_nombres` varchar(45) DEFAULT NULL,
  `auto_apellidos` varchar(45) DEFAULT NULL,
  `auto_biografia` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`auto_id`, `auto_nombres`, `auto_apellidos`, `auto_biografia`) VALUES
(1, 'fdfs', 'fdsgfdshdsadasd', 'dffgdsfgdfsgsdfg'),
(2, 'gfdsg', 'gdsfg', 'fdsgdsfg'),
(3, 'hskfbadsf', 'fsdfd', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`cate_id` int(11) NOT NULL,
  `cate_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar`
--

CREATE TABLE IF NOT EXISTS `ejemplar` (
`ejem_id` int(11) NOT NULL,
  `ejem_titulo` varchar(150) DEFAULT NULL,
  `ejem_editorial` varchar(45) DEFAULT NULL,
  `ejem_paginas` int(11) DEFAULT NULL,
  `ejem_isbn` varchar(20) DEFAULT NULL,
  `ejem_idioma` varchar(45) DEFAULT NULL,
  `ejem_portada` varchar(45) DEFAULT NULL,
  `ejem_digital` varchar(45) DEFAULT NULL,
  `ejem_audio` varchar(45) DEFAULT NULL,
  `ejem_resumen` varchar(255) DEFAULT NULL,
  `ejem_tipo_id` int(11) DEFAULT NULL,
  `ejem_cate_id` int(11) DEFAULT NULL,
  `ejem_valoracion` tinyint(1) DEFAULT NULL,
  `ejem_anio` int(11) DEFAULT NULL,
  `ejem_nprestamos` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejemplar`
--

INSERT INTO `ejemplar` (`ejem_id`, `ejem_titulo`, `ejem_editorial`, `ejem_paginas`, `ejem_isbn`, `ejem_idioma`, `ejem_portada`, `ejem_digital`, `ejem_audio`, `ejem_resumen`, `ejem_tipo_id`, `ejem_cate_id`, `ejem_valoracion`, `ejem_anio`, `ejem_nprestamos`) VALUES
(2, 'Los perros hambrientos', 'El limeño', 200, '13-1234-1234', 'Español', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Poder Sin Límites', 'DelBolsillo', 479, '1123-134-1234', 'Español', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Moby Dick', 'AudioBock', 300, '1232-13-41-234', 'Ingles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_autor`
--

CREATE TABLE IF NOT EXISTS `ejemplar_autor` (
  `rela_auto_id` int(11) NOT NULL,
  `rela_ejem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_tipo`
--

CREATE TABLE IF NOT EXISTS `ejemplar_tipo` (
`tipo_id` int(11) NOT NULL,
  `tipo_nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE IF NOT EXISTS `favorito` (
  `favo_usua_id` int(11) NOT NULL,
  `favo_ejem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `histo_id` int(11) NOT NULL,
  `histo_usua_id` int(11) DEFAULT NULL,
  `histo_termino` varchar(45) DEFAULT NULL,
  `histo_fechareg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticion`
--

CREATE TABLE IF NOT EXISTS `peticion` (
`peti_id` int(11) NOT NULL,
  `peti_ejem_id` int(11) DEFAULT NULL,
  `peti_dias` int(11) DEFAULT NULL,
  `peti_usua_id` int(11) DEFAULT NULL,
  `peti_fechareg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
`pres_id` int(11) NOT NULL,
  `pres_usua_id` int(11) DEFAULT NULL,
  `pres_ejem_id` int(11) DEFAULT NULL,
  `pres_fechareg` datetime DEFAULT NULL,
  `pres_dias` int(11) DEFAULT NULL,
  `pres_fechaprestamo` date DEFAULT NULL,
  `pres_fechadevolucion` date DEFAULT NULL,
  `pres_estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usua_id` int(11) NOT NULL,
  `usua_login` varchar(45) DEFAULT NULL,
  `usua_password` varchar(45) DEFAULT NULL,
  `usua_codigo` int(11) DEFAULT NULL,
  `usua_nombres` varchar(45) DEFAULT NULL,
  `usua_apellidos` varchar(45) DEFAULT NULL,
  `usua_direccion` varchar(150) DEFAULT NULL,
  `usua_email` varchar(70) DEFAULT NULL,
  `usua_telefono` varchar(20) DEFAULT NULL,
  `usua_esadmin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usua_id`, `usua_login`, `usua_password`, `usua_codigo`, `usua_nombres`, `usua_apellidos`, `usua_direccion`, `usua_email`, `usua_telefono`, `usua_esadmin`) VALUES
(1, 'administrador', '81dc9bdb52d04dc20036dbd8313ed055', 103176, 'Christian André', 'Urviola García', 'Jr. puno', 'andreurviola@hotmail.com', '969591277', 1),
(3, 'perez', '81dc9bdb52d04dc20036dbd8313ed055', 999999, 'Goku', 'Perez', 'jr. asdr 1234', 'perez@hotm.com', '954857456', 0),
(4, 'Cejas', '81dc9bdb52d04dc20036dbd8313ed055', 293842, 'ElCejas', 'blablabla', 'jr. elceja 1324', 'elceja@jldakjf.com', '984234857', 0),
(5, 'usuario', '81dc9bdb52d04dc20036dbd8313ed055', 584756, 'usuario', 'usuario', 'jr. usuario 34', 'usuario@afdsafa.com', '954236878', 0),
(7, 'sandra', '827ccb0eea8a706c4c34a16891f84e7b', 185243, 'Sandra', 'Van Dyk', 'Jr. los robles', 'sandra@gmail.com', '950313253', 0),
(8, 'milton', 'e10adc3949ba59abbe56e057f20f883e', 185489, 'milton', 'jarata quispe', 'Jr. los robles', 'milton@gmail.com', '950313253', 0),
(9, 'adderly', 'fcea920f7412b5da7be0cf42b8c93759', 185243, 'lokmom', 'dsad', 'Jr. Nueva York', 'adderly@gmail.com', '95031323', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
 ADD PRIMARY KEY (`auto_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`cate_id`);

--
-- Indices de la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
 ADD PRIMARY KEY (`ejem_id`), ADD KEY `fk_ejemplar_ejemplar_tipo_idx` (`ejem_tipo_id`), ADD KEY `fk_ejemplar_categoria1_idx` (`ejem_cate_id`);

--
-- Indices de la tabla `ejemplar_autor`
--
ALTER TABLE `ejemplar_autor`
 ADD PRIMARY KEY (`rela_auto_id`,`rela_ejem_id`), ADD KEY `fk_ejemplar_autor_ejemplar1_idx` (`rela_ejem_id`);

--
-- Indices de la tabla `ejemplar_tipo`
--
ALTER TABLE `ejemplar_tipo`
 ADD PRIMARY KEY (`tipo_id`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
 ADD PRIMARY KEY (`favo_usua_id`,`favo_ejem_id`), ADD KEY `fk_favorito_ejemplar1_idx` (`favo_ejem_id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
 ADD PRIMARY KEY (`histo_id`), ADD KEY `fk_historial_usuario1_idx` (`histo_usua_id`);

--
-- Indices de la tabla `peticion`
--
ALTER TABLE `peticion`
 ADD PRIMARY KEY (`peti_id`), ADD KEY `fk_peticion_ejemplar1_idx` (`peti_ejem_id`), ADD KEY `fk_peticion_usuario1_idx` (`peti_usua_id`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
 ADD PRIMARY KEY (`pres_id`), ADD KEY `fk_prestamo_usuario1_idx` (`pres_usua_id`), ADD KEY `fk_prestamo_ejemplar1_idx` (`pres_ejem_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usua_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
MODIFY `ejem_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ejemplar_tipo`
--
ALTER TABLE `ejemplar_tipo`
MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `peticion`
--
ALTER TABLE `peticion`
MODIFY `peti_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
MODIFY `pres_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usua_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
ADD CONSTRAINT `fk_ejemplar_categoria1` FOREIGN KEY (`ejem_cate_id`) REFERENCES `categoria` (`cate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ejemplar_ejemplar_tipo` FOREIGN KEY (`ejem_tipo_id`) REFERENCES `ejemplar_tipo` (`tipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ejemplar_autor`
--
ALTER TABLE `ejemplar_autor`
ADD CONSTRAINT `fk_ejemplar_autor_autor1` FOREIGN KEY (`rela_auto_id`) REFERENCES `autor` (`auto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ejemplar_autor_ejemplar1` FOREIGN KEY (`rela_ejem_id`) REFERENCES `ejemplar` (`ejem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
ADD CONSTRAINT `fk_favorito_ejemplar1` FOREIGN KEY (`favo_ejem_id`) REFERENCES `ejemplar` (`ejem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_favorito_usuario1` FOREIGN KEY (`favo_usua_id`) REFERENCES `usuario` (`usua_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
ADD CONSTRAINT `fk_historial_usuario1` FOREIGN KEY (`histo_usua_id`) REFERENCES `usuario` (`usua_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `peticion`
--
ALTER TABLE `peticion`
ADD CONSTRAINT `fk_peticion_ejemplar1` FOREIGN KEY (`peti_ejem_id`) REFERENCES `ejemplar` (`ejem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_peticion_usuario1` FOREIGN KEY (`peti_usua_id`) REFERENCES `usuario` (`usua_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
ADD CONSTRAINT `fk_prestamo_ejemplar1` FOREIGN KEY (`pres_ejem_id`) REFERENCES `ejemplar` (`ejem_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_prestamo_usuario1` FOREIGN KEY (`pres_usua_id`) REFERENCES `usuario` (`usua_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
