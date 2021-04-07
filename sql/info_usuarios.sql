-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2021 a las 19:45:13
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_usuarios`
--

CREATE TABLE `info_usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `foto_perfil` varchar(60) NOT NULL,
  `direccion` varchar(11) NOT NULL,
  `biografia` text NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `info_usuarios`
--

INSERT INTO `info_usuarios` (`id_usuario`, `foto_perfil`, `direccion`, `biografia`, `fecha_nacimiento`) VALUES
(1, '', '', '', '0000-00-00'),
(2, 'nuriacarrascosa.jpg', '', '', '1999-12-25'),
(3, 'sergiofrutos.jpg', '', '', '1998-11-25'),
(4, 'patrilla.jpg', '', '', '1999-07-17'),
(5, 'carlosram.jpg', '', '', '1999-02-13'),
(6, 'nicobeni.jpg', '', '', '1999-12-13'),
(7, 'semuñoz.jpg', '', '', '1999-04-02'),
(8, '', '', '', '1999-11-08'),
(9, '', '', '', '1999-04-22'),
(10, '', '', '', '1999-07-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `info_usuarios`
--
ALTER TABLE `info_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `info_usuarios`
--
ALTER TABLE `info_usuarios`
  ADD CONSTRAINT `info_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
