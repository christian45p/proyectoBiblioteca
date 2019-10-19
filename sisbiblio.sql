-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-10-2019 a las 18:40:22
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisbiblio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `ID_AUT` int(10) NOT NULL AUTO_INCREMENT,
  `NOMBRES_AUT` varchar(50) NOT NULL,
  `APELLIDOS_AUT` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_AUT`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`ID_AUT`, `NOMBRES_AUT`, `APELLIDOS_AUT`) VALUES
(1, 'Taha', 'Hamdy A.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar`
--

DROP TABLE IF EXISTS `ejemplar`;
CREATE TABLE IF NOT EXISTS `ejemplar` (
  `ejem_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `ejem_nprestamos` int(11) DEFAULT NULL,
  PRIMARY KEY (`ejem_id`),
  KEY `fk_ejemplar_ejemplar_tipo_idx` (`ejem_tipo_id`),
  KEY `fk_ejemplar_categoria1_idx` (`ejem_cate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejemplar`
--

INSERT INTO `ejemplar` (`ejem_id`, `ejem_titulo`, `ejem_editorial`, `ejem_paginas`, `ejem_isbn`, `ejem_idioma`, `ejem_portada`, `ejem_digital`, `ejem_audio`, `ejem_resumen`, `ejem_tipo_id`, `ejem_cate_id`, `ejem_valoracion`, `ejem_anio`, `ejem_nprestamos`) VALUES
(2, 'Los perros hambrientos', 'El limeño', 200, '13-1234-1234', 'Español', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Poder Sin Límites', 'DelBolsillo', 479, '1123-134-1234', 'Español', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'La biologia de la creencia', 'ipensa españa', 312, '90002', 'español', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'La fuerza de Sheccid', 'Mexico DF', 108, '735210', 'español', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_autor`
--

DROP TABLE IF EXISTS `ejemplar_autor`;
CREATE TABLE IF NOT EXISTS `ejemplar_autor` (
  `rela_auto_id` int(11) NOT NULL,
  `rela_ejem_id` int(11) NOT NULL,
  PRIMARY KEY (`rela_auto_id`,`rela_ejem_id`),
  KEY `fk_ejemplar_autor_ejemplar1_idx` (`rela_ejem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar_tipo`
--

DROP TABLE IF EXISTS `ejemplar_tipo`;
CREATE TABLE IF NOT EXISTS `ejemplar_tipo` (
  `tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

DROP TABLE IF EXISTS `favorito`;
CREATE TABLE IF NOT EXISTS `favorito` (
  `favo_usua_id` int(11) NOT NULL,
  `favo_ejem_id` int(11) NOT NULL,
  PRIMARY KEY (`favo_usua_id`,`favo_ejem_id`),
  KEY `fk_favorito_ejemplar1_idx` (`favo_ejem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `histo_id` int(11) NOT NULL,
  `histo_usua_id` int(11) DEFAULT NULL,
  `histo_termino` varchar(45) DEFAULT NULL,
  `histo_fechareg` datetime DEFAULT NULL,
  PRIMARY KEY (`histo_id`),
  KEY `fk_historial_usuario1_idx` (`histo_usua_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticion`
--

DROP TABLE IF EXISTS `peticion`;
CREATE TABLE IF NOT EXISTS `peticion` (
  `peti_id` int(11) NOT NULL AUTO_INCREMENT,
  `peti_ejem_id` int(11) DEFAULT NULL,
  `peti_dias` int(11) DEFAULT NULL,
  `peti_usua_id` int(11) DEFAULT NULL,
  `peti_fechareg` datetime DEFAULT NULL,
  PRIMARY KEY (`peti_id`),
  KEY `fk_peticion_ejemplar1_idx` (`peti_ejem_id`),
  KEY `fk_peticion_usuario1_idx` (`peti_usua_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
CREATE TABLE IF NOT EXISTS `prestamo` (
  `pres_id` int(11) NOT NULL AUTO_INCREMENT,
  `pres_usua_id` int(11) DEFAULT NULL,
  `pres_ejem_id` int(11) DEFAULT NULL,
  `pres_fechareg` datetime DEFAULT NULL,
  `pres_dias` int(11) DEFAULT NULL,
  `pres_fechaprestamo` date DEFAULT NULL,
  `pres_fechadevolucion` date DEFAULT NULL,
  `pres_estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pres_id`),
  KEY `fk_prestamo_usuario1_idx` (`pres_usua_id`),
  KEY `fk_prestamo_ejemplar1_idx` (`pres_ejem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `usua_id` int(11) NOT NULL AUTO_INCREMENT,
  `usua_login` varchar(45) DEFAULT NULL,
  `usua_password` varchar(45) DEFAULT NULL,
  `usua_codigo` int(11) DEFAULT NULL,
  `usua_nombres` varchar(45) DEFAULT NULL,
  `usua_apellidos` varchar(45) DEFAULT NULL,
  `usua_direccion` varchar(150) DEFAULT NULL,
  `usua_email` varchar(70) DEFAULT NULL,
  `usua_telefono` varchar(20) DEFAULT NULL,
  `usua_esadmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`usua_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usua_id`, `usua_login`, `usua_password`, `usua_codigo`, `usua_nombres`, `usua_apellidos`, `usua_direccion`, `usua_email`, `usua_telefono`, `usua_esadmin`) VALUES
(1, 'administrador', '81dc9bdb52d04dc20036dbd8313ed055', 103176, 'Christian André', 'Urviola García', 'Jr. puno', 'andreurviola@hotmail.com', '969591277', 1),
(2, 'rara', '81dc9bdb52d04dc20036dbd8313ed055', 457863, 'roro', 'rorororo', 'jr sdfa', 'asdfasdf@sadfas.cads', '985214756', 0),
(3, 'perez', '81dc9bdb52d04dc20036dbd8313ed055', 999999, 'Goku', 'Perez', 'jr. asdr 1234', 'perez@hotm.com', '954857456', 0),
(4, 'Cejas', '81dc9bdb52d04dc20036dbd8313ed055', 293842, 'ElCejas', 'blablabla', 'jr. elceja 1324', 'elceja@jldakjf.com', '984234857', 0),
(5, 'usuario', '81dc9bdb52d04dc20036dbd8313ed055', 584756, 'usuario', 'usuario', 'jr. usuario 34', 'usuario@afdsafa.com', '954236878', 0),
(6, 'momazo', '81dc9bdb52d04dc20036dbd8313ed055', 258741, 'momazo', 'momazo', 'jr momazos 342', 'momazo@hotma.com', '947362738', 0),
(7, 'wils', 'a7e7400fc8b1409a6d00194f632d0a6e', 104799, 'wilson', 'valerian', 'jr bolognesi', 'wils@wils.com', '0910283', 0);

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
  ADD CONSTRAINT `fk_ejemplar_autor_autor1` FOREIGN KEY (`rela_auto_id`) REFERENCES `autor` (`ID_AUT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
