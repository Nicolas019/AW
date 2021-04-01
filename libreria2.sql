-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2021 a las 19:10:02
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
-- Base de datos: `libreria2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_Autor` int(11) NOT NULL,
  `descripcionA` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_Autor`, `descripcionA`) VALUES
(1, 'J.K.ROWLING'),
(2, 'CARLOS RUIZ ZAFÓN'),
(3, 'BRANDON SANDERSON'),
(4, 'STEPHEN KING'),
(5, 'J.R.R TOLKIEN'),
(6, 'GABRIEL GARCIA MARQUEZ'),
(7, 'GEORGE ORWELL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_Comentario` int(11) NOT NULL,
  `id_Libro` int(11) NOT NULL,
  `descripcionC` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id_Editorial` int(11) NOT NULL,
  `descripcionE` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id_Editorial`, `descripcionE`) VALUES
(1, 'Planeta Comic'),
(2, ' Alianza Editorial'),
(3, 'ALAMUT'),
(4, 'ALFAGUARA'),
(5, 'NOVA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_Genero` int(11) NOT NULL,
  `descripcionG` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_Genero`, `descripcionG`) VALUES
(1, 'CIENCIA FICCION'),
(2, 'FANTASIA'),
(3, 'ROMANCE'),
(4, 'NOVELA POLICIACA'),
(5, 'TERROR'),
(6, 'NOVELA'),
(7, 'NOVELA HISTORICA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_Libro` int(11) NOT NULL,
  `titulo` varchar(1000) DEFAULT NULL,
  `id_Autor` int(11) DEFAULT NULL,
  `id_Genero` int(11) DEFAULT NULL,
  `id_Editorial` int(11) DEFAULT NULL,
  `precio` double NOT NULL,
  `numero_Paginas` int(11) DEFAULT NULL,
  `sinopsis` varchar(1000) DEFAULT NULL,
  `valoracion` double NOT NULL,
  `ruta_imagen` varchar(1000) DEFAULT NULL,
  `NumVentas` int(11) NOT NULL DEFAULT 0,
  `fecha_Lanzamiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_Libro`, `titulo`, `id_Autor`, `id_Genero`, `id_Editorial`, `precio`, `numero_Paginas`, `sinopsis`, `valoracion`, `ruta_imagen`, `NumVentas`, `fecha_Lanzamiento`) VALUES
(1, 'El camino de los reyes (Saga del archivo de las tormentas 1)', 3, 2, 5, 34.9, 1200, 'El camino de los reyes es el primer volumen de «El Archivo de las Tormentas», el resultado de más de una década de construcción y escritura de universos, convertido en una obra maestra de la fantasía contemporánea en diez volúmenes. Con ella, Brandon Sanderson se postula como el autor del género que más lectores está ganando en todo el mundo.', 9.9, 'ElCaminoDeLosReyes.jpg', 1000000, '2010-10-31'),
(2, 'IT (ESO)', 4, 5, 2, 12.95, 1503, '¿Quién o qué mutila y mata a los niños de un pequeño pueblo norteamericano?\r\n¿Por qué llega cíclicamente el horror a Derry en forma de un payaso siniestro que va sembrando la destrucción a su paso?\r\n\r\nEsto es lo que se proponen averiguar los protagonistas de esta novela. Tras veintisiete años de tranquilidad y lejanía, una antigua promesa infantil les hace volver al lugar en el que vivieron su infancia y juventud como una terrible pesadilla. Regresan a Derry para enfrentarse con su pasado y enterrar definitivamente la amenaza que los amargó durante su niñez.\r\n\r\nSaben que pueden morir, pero son conscientes de que no conocerán la paz hasta que aquella cosa sea destruida para siempre.', 7.9, 'It.jpg', 0, NULL),
(3, 'Harry Potter y la Piedra Filosofal: 1', 1, 2, 2, 14.25, 223, 'Harry Potter y la piedra filosofal es el primer volumen de la ya clásica serie de novelas fantásticas de la autora británica J.K. Rowling.\r\n\r\n«Con las manos temblorosas, Harry le dio la vuelta al sobre y vio un sello de lacre púrpura con un escudo de armas: un león, un águila, un tejón y una serpiente, que rodeaban una gran letra H.»\r\n\r\nHarry Potter nunca ha oído hablar de Hogwarts hasta que empiezan a caer cartas en el felpudo del número 4 de Privet Drive. Llevan la dirección escrita con tinta verde en un sobre de pergamino amarillento con un sello de lacre púrpura, y sus horripilantes tíos se apresuran a confiscarlas. Más tarde, el día que Harry cumple once años, Rubeus Hagrid, un hombre gigantesco cuyos ojos brillan como escarabajos negros, irrumpe con una noticia extraordinaria: Harry Potter es un mago, y le han concedido una plaza en el Colegio Hogwarts de Magia y Hechicería. ¡Está a punto de comenzar una aventura increíble!', 8.6, 'HarryPotter1.jpg', 200, NULL),
(4, 'Rebelión en la granja', 7, 6, 2, 8.5, 126, 'Un rotundo alegato a favor de la libertad y en contra del totalitarismo que se ha convertido en un clásico de la literatura del siglo XX.\r\n\r\nEsta sátira de la Revolución rusa y el triunfo del estalinismo, escrita en 1945, se ha convertido por derechos propio en un hito de la cultura contemporánea y en uno de los libros más mordaces de todos los tiempos. Ante el auge de los animales de la Granja Solariega, pronto detectamos las semillas de totalitarismo en una organización aparentemente ideal; y en nuestros líderes más carismáticos, la sombra de los opresores más crueles.\r\nLa presente edición, avalada por The Orwell Foundation, sigue fielmente el texto definitivo de las obras completas del autor, fijado por el profesor Peter Davison. Incluye un epílogo del periodista y ensayista Christopher Hitchens, que pone de relieve la importancia del autor en nuestro tiempo. Marcial Souto firma la estupenda traducción, que se publicó por primera vez en 2013 y es la más reciente de la obra.', 9, 'RebelionEnLaGranja.jpg', 200, NULL),
(5, 'El señor de los anillos I: La comunidad del anillo', 5, 2, 2, 20.95, 488, 'En la adormecida e idílica Comarca, un joven hobbit recibe un encargo: custodiar el Anillo Único y emprender el viaje para su destrucción en la Grieta del Destino. Acompañado por magos, hombres, elfos y enanos, atravesará la Tierra Media y se internará en las sombras de Mordor, perseguido siempre por las huestes de Sauron, el Señor Oscuro, dispuesto a recuperar su creación para establecer el dominio definitivo del Mal.', 8.5, 'ElSenorDeLosAnillos1.jpg', 10, NULL),
(6, 'Cien años de soledad', 6, 6, 2, 9.5, 471, '«Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo. Macondo era entonces una aldea de veinte casas de barro y cañabrava construidas a la orilla de un río de aguas diáfanas que se precipitaban por un lecho de piedras pulidas, blancas y enormes como huevos prehistóricos. El mundo era tan reciente, que muchas cosas carecían de nombre, y para mencionarlas había que señalarlas con el dedo.»', 10, 'CienAnosDeSoledad.jpg', 50, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `contrasenia` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `tipo_usuario` enum('superlector','lector aficionado','lector novato','lector errante','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `email`, `contrasenia`, `nombre`, `apellidos`, `tipo_usuario`) VALUES
(1, 'admin', 'admin@athenea.com', 'admin', 'Administrador', 'Athenea', 'administrador'),
(2, 'nuriacarrascosa', 'nucarr02@ucm.es', 'nuriacarrascosa', 'Nuria', 'Carrascosa Cascajo', 'superlector'),
(3, 'sergiofrutos', 'sefrutos@ucm.es', '1234', 'Sergio', 'Frutos Serrano', 'lector novato'),
(4, 'patrilla', 'patrilla@ucm.es', '9876', 'Patricia', 'Llamas Roque', 'lector aficionado'),
(5, 'carlosram', 'carami02@ucm.es', 'qwerty', 'Carlos', 'Ramírez Martínez', 'lector errante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_Autor`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_Comentario`),
  ADD KEY `id_Libro` (`id_Libro`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id_Editorial`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_Genero`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_Libro`),
  ADD KEY `id_Editorial` (`id_Editorial`),
  ADD KEY `id_Autor` (`id_Autor`),
  ADD KEY `id_Genero` (`id_Genero`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_Comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_Editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_Genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_Libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_Libro`) REFERENCES `libro` (`id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_Genero`) REFERENCES `genero` (`id_Genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`id_Autor`) REFERENCES `autor` (`id_Autor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_4` FOREIGN KEY (`id_Editorial`) REFERENCES `editorial` (`id_Editorial`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
