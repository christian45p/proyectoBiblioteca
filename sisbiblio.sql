-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2019 a las 02:50:04
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `tbl_items`
--

CREATE TABLE IF NOT EXISTS `tbl_items` (
`itemId` int(11) NOT NULL,
  `itemHeader` varchar(512) NOT NULL COMMENT 'Heading',
  `itemSub` varchar(1021) NOT NULL COMMENT 'sub heading',
  `itemDes` text NOT NULL COMMENT 'content or description',
  `itemImage` varchar(80) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedDtm` datetime NOT NULL,
  `updatedBy` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_items`
--

INSERT INTO `tbl_items` (`itemId`, `itemHeader`, `itemSub`, `itemDes`, `itemImage`, `isDeleted`, `createdBy`, `createdDtm`, `updatedDtm`, `updatedBy`) VALUES
(1, 'jquery.validation.js', 'Contribution towards jquery.validation.js', 'jquery.validation.js is the client side javascript validation library authored by Jörn Zaefferer hosted on github for us and we are trying to contribute to it. Working on localization now', 'validation.png', 0, 1, '2019-10-22 00:00:00', '2019-10-09 00:00:00', 0),
(2, 'CodeIgniter User Management', 'Demo for user management system', 'This the demo of User Management System (Admin Panel) using CodeIgniter PHP MVC Framework and AdminLTE bootstrap theme. You can download the code from the repository or forked it to contribute. Usage and installation instructions are provided in ReadMe.MD', 'cias.png', 0, 1, '2019-10-15 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reset_password`
--

CREATE TABLE IF NOT EXISTS `tbl_reset_password` (
`id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdBy` bigint(20) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) NOT NULL,
  `updatedDtm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
`roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'Administrador'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
`userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) NOT NULL COMMENT 'full name of user',
  `mobile` varchar(20) NOT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updateDtm` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updateDtm`) VALUES
(1, 'admin@bewithdhanu.in', '$2y$10$SAvFim22ptA9gHVORtIaru1dn9rhgerJlJCPxRNA02MjQaJnkxawq', 'Administrador', '9890098900', 1, 0, 1, '2019-10-08 00:00:00', 1, '2019-10-08 00:00:00'),
(2, 'manager@bewithdhanu.in', '$2y$10$Gkl9ILEdGNoTIV9w/xpf3.mSKs0LB1jkvvPKK7K0PSYDsQY7GE9JK', 'Manager', '9890098900', 2, 0, 1, '2019-10-08 00:00:00', 1, '2019-10-15 00:00:00'),
(3, 'employee@bewithdhanu.in', '$2y$10$MB5NIu8i28XtMCnuExyFB.Ao1OXSteNpCiZSiaMSRPQx1F1WLRId2', 'Employee', '9890098900', 3, 0, 1, '2019-10-15 00:00:00', 1, '2019-10-08 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indices de la tabla `tbl_items`
--
ALTER TABLE `tbl_items`
 ADD PRIMARY KEY (`itemId`);

--
-- Indices de la tabla `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
 ADD PRIMARY KEY (`roleId`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
 ADD PRIMARY KEY (`userId`);

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
MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
MODIFY `ejem_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `tbl_items`
--
ALTER TABLE `tbl_items`
MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_roles`
--
ALTER TABLE `tbl_roles`
MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `usua_id` int(11) NOT NULL AUTO_INCREMENT;
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
