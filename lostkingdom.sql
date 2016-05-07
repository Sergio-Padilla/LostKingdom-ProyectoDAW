-- phpMyAdmin SQL Dump
-- version 4.3.11.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-05-2016 a las 09:20:03
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.4.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lostkingdom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facciones`
--

CREATE TABLE IF NOT EXISTS `facciones` (
  `fac_id` int(11) NOT NULL,
  `fac_nombre` varchar(20) NOT NULL,
  `fac_descripcion` varchar(100) NOT NULL,
  `fac_ptstotal` int(11) NOT NULL,
  `fac_ptsjuego1` int(11) NOT NULL,
  `fac_ptsjuego2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE IF NOT EXISTS `partidas` (
  `par_id` int(11) NOT NULL,
  `par_pts` int(11) NOT NULL,
  `par_juego` varchar(20) NOT NULL,
  `par_fecha` date NOT NULL,
  `par_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE IF NOT EXISTS `personajes` (
  `pj_id` int(11) NOT NULL,
  `pj_sexo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_id` int(11) NOT NULL,
  `usu_nick` varchar(20) NOT NULL,
  `usu_mail` varchar(100) NOT NULL,
  `usu_pass` varchar(20) NOT NULL,
  `usu_pais` varchar(100) NOT NULL,
  `usu_fnacim` date NOT NULL,
  `usu_faccion` int(11) NOT NULL,
  `usu_pj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facciones`
--
ALTER TABLE `facciones`
  ADD PRIMARY KEY (`fac_id`), ADD KEY `fac_id` (`fac_id`);

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`par_id`), ADD KEY `par_usuario` (`par_usuario`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`pj_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`), ADD UNIQUE KEY `usu_mail` (`usu_mail`), ADD KEY `usu_faccion` (`usu_faccion`), ADD KEY `usu_pj` (`usu_pj`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facciones`
--
ALTER TABLE `facciones`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `par_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `pj_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `partidas`
--
ALTER TABLE `partidas`
ADD CONSTRAINT `partidas_ibfk_1` FOREIGN KEY (`par_usuario`) REFERENCES `usuarios` (`usu_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`usu_pj`) REFERENCES `personajes` (`pj_id`),
ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usu_faccion`) REFERENCES `facciones` (`fac_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
