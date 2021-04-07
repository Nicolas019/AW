-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2021 a las 17:20:13
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

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
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id_libro` int(11) NOT NULL,
  `estado` enum('nuevo','como nuevo','buen estado','aceptable') NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id_libro`, `estado`, `stock`) VALUES
(3, 'nuevo', 2);

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
(7, 'GEORGE ORWELL'),
(8, 'STEVEN ERIKSON'),
(9, 'ISAAC ASIMOV'),
(10, 'FRANK HERBERT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_libro` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_Comentario` int(11) NOT NULL,
  `id_Libro` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `descripcionC` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_Comentario`, `id_Libro`, `id_usuario`, `descripcionC`) VALUES
(4, 3, 2, 'Todo el mundo debería leer este libro.');

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
(5, 'NOVA'),
(6, 'DEBOLSILLO');

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
(6, 'Cien años de soledad', 6, 6, 2, 9.5, 471, '«Muchos años después, frente al pelotón de fusilamiento, el coronel Aureliano Buendía había de recordar aquella tarde remota en que su padre lo llevó a conocer el hielo. Macondo era entonces una aldea de veinte casas de barro y cañabrava construidas a la orilla de un río de aguas diáfanas que se precipitaban por un lecho de piedras pulidas, blancas y enormes como huevos prehistóricos. El mundo era tan reciente, que muchas cosas carecían de nombre, y para mencionarlas había que señalarlas con el dedo.»', 10, 'CienAnosDeSoledad.jpg', 50, NULL),
(7, 'Palabras Radiantes (Saga del archivo de las tormentas 2)', 3, 2, 5, 30, 1087, 'Los Caballeros Radiantes deben volver a alzarse.\r\n\r\nLos antiguos juramentos por fin se han pronunciado. Los hombres buscan lo que se perdió. Temo que la búsqueda los destruya.\r\n\r\nEs la naturaleza de la magia. Un alma rota tiene grietas donde puede colarse algo más. Las potencias, los poderes de la creación misma, pueden abrazar un alma rota, pero también pueden ampliar sus fisuras.\r\n\r\nEl Corredor del Viento está perdido en una tierra quebrada, en equilibro entre la venganza y el honor. La Tejedora de Luz, lentamente consumida por su pasado, busca la mentira en la que debe convertirse. El Forjador de Vínculos, nacido en la sangre y la muerte, se esfuerza ahora por reconstruir lo que fue destruido. La Exploradora, a caballo entre los destinos de dos pueblos, se ve obligada a elegir entre una muerte lenta y una terrible traición a todo en lo que cree.', 9.3, 'PalabrasRadiantes.jpg', 0, '2014-03-04'),
(8, 'Juramentada (El Archivo de las Tormentas 3)', 3, 2, 5, 33.15, 1408, 'La humanidad se enfrenta a una nueva Desolación con el regreso de los Portadores del Vacío, un enemigo tan grande en número como en sed de venganza. La victoria fugaz de los ejércitos alezi de Dalinar Kholin ha tenido consecuencias: el enemigo parshendi ha convocado la violenta tormenta eterna, que arrasa el mundo y hace que los hasta ahora pacíficos parshmenios descubran con horror que llevan un milenio esclavizados por los humanos. Al mismo tiempo, en una desesperada huida para alertar a su familia de la amenaza, Kaladin se pregunta si la repentina ira de los parshmenios está justificada.\r\n\r\nEntretanto, en la torre de la ciudad de Urithiru, a salvo de la tormenta, Shallan Davar investiga las maravillas de la antigua fortaleza de los Caballeros Radiantes y desentierra oscuros secretos que acechan en las profundidades. Dalinar descubre entonces que su sagrada misión de unificar su tierra natal de Alezkar era corta de miras. A menos que todas las naciones sean capaces de unirse y dejar ', 10, 'Juramentada.jpg', 0, '2018-04-05'),
(9, 'El Ritmo de la Guerra (El Archivo de las Tormentas 4)', 3, 2, 5, 34.9, 1408, 'La esperada continuación de Juramentada. Brandon Sanderson, en la cima de su carrera. Tras forjar una coalición de resistencia humana contra la invasión enemiga, Dalinar Kholin y sus Caballeros Radiantes llevan un año librando una guerra brutal. Ningún bando tiene ventaja. Mientras los nuevos descubrimientos tecnológicos cambian la contienda, el enemigo prepara una operación peligrosa. La carrera armamentística resultante desafiará el núcleo de los ideales Radiantes y quizá revele los secretos de la antiquísima torre en la que una vez residió toda su fuerza.\r\n\r\nTras forjar una coalición de resistencia humana contra la invasión enemiga, Dalinar Kholin y sus Caballeros Radiantes llevan un año librando una guerra prolongada y brutal. Ningún bando ha logrado obtener ventaja. Mientras los nuevos descubrimientos tecnológicos cambian el trasfondo de la contienda, el enemigo prepara una operación audaz y peligrosa. La carrera armamentística resultante desafiará el mismo núcleo de los ideales R', 9.6, 'ElRitmoDeLaGuerra.jpg', 0, '2020-11-19'),
(13, 'Elantris', 3, 2, 5, 26.5, 800, 'Bienvenidos a la ciudad de Elantris, la poderosa y bella capital de Arelon llamada «la ciudad de los dioses». Antaño famosa sede de inmortales, lugar repleto de poderosa magia, Elantris ha caído en desgracia. Ahora solo acoge a los nuevos «muertos en vida», postrados en una insufrible «no-vida» tras una misteriosa y terrible transformación.\r\n\r\nUn matrimonio de Estado destinado a unir los reinos de Arelon y Teod se frustra, ya que el novio, Raoden, el príncipe de Arelon, sufre inesperadamente la Transformación, se convierte en un «muerto en vida» y debe refugiarse en Elantris. Su reciente esposa, la princesa Sarene de Teod, creyéndolo muerto, se veobligada a incorporarse a la vida de Arelon y su nueva capital, Kae. Mientras, el embajador y alto sacerdote de otro reino vecino, Fjordell, usará su habilidad política para intentar dominar Arelod y Teod con el propósito de someterlos a su emperador y su dios', 8.7, 'Elantris.jpg', 0, '2020-10-01'),
(14, 'El imperio final (Nacidos de la bruma 1)', 3, 2, 5, 19.85, 672, 'Durante mil años han caído cenizas del cielo. Durante mil años nada ha florecido. Durante mil años los skaa han sido esclavizados y viven en la miseria, sumidos en un miedo inevitable. Durante mil años el Lord Legislador ha reinado con poder absoluto, dominando gracias al terror, a sus poderes y a su inmortalidad, ayudado por «obligadores» e «inquisidores», junto a la poderosa magia de la alomancia.\r\n\r\nPero los nobles a menudo han tenido trato sexual con jóvenes skaa y, aunque la ley lo prohíbe, algunos de sus bastardos han sobrevivido y heredado los poderes alománticos: son los «nacidos de la bruma» (mistborn).\r\n\r\nAhora, Kelsier, el «superviviente», el único queha logrado huir de los Pozos de Hathsin, ha encontrado a Vin, una pobre chica skaa con mucha suerte... Tal vez los dos, con el mejor equipo criminal jamás reunido, unidos a la rebelión que los skaa intentan desde hace mil años, logren cambiar el mundo y acabar con la atroz mano de hierro del Lord Legislador.', 9.3, 'ElImperioFinal.jpg', 0, '2006-07-17'),
(15, 'El Pozo de la Ascensión (Nacidos de la bruma 2)', 3, 2, 5, 19.85, 784, 'Durante mil años nada ha cambiado: han caído las cenizas, los skaa han sido esclavizados y el Lord Legislador ha dominado el mundo. Pero lo imposible ha sucedido. El Lord Legislador ha muerto. Sin embargo, vencer y matarlo fue la parte sencilla. El verdadero desafío será sobrevivir a las consecuencias de su caída.\r\n\r\nTomar el poder tal vez resultó fácil, pero ¿qué ocurre después?, ¿cómo se utiliza? La tarea de reconstruir el mundo, ahora que Kelsier no está, ha quedado en manos de Vin. Y las brumas, desde que el Lord Legislador cayó, se han vuelto cada vez más impredecibles...\r\n\r\nA medida que el asedio se intensifica, la antigua leyenda del Pozo de la Ascensión ofrece un único rayo de esperanza.\r\n\r\nEn ese mundo de aventura épica, la estrategia política y religiosa debe lidiar con los siempre misteriosos poderes de la alomancia...', 9, 'ElPozoDeLaAscension.jpg', 0, '2017-08-21'),
(16, 'El Héroe de las Eras (Nacidos de la bruma 3)', 3, 2, 5, 19.85, 768, 'Durante mil años nada ha cambiado: han caído las cenizas, los skaa han sido esclavizados y el Lord Legislador ha dominado el mundo. Kelsier, el «superviviente», el único que ha logrado huir de los Pozos de Hathsin, junto a Vin, una pobre chica skaa, se une a la rebelión. Y por fin lo imposible sucede: por fin la revolución ha triunfado. Pero acabar con el Lord Legislador es la parte sencilla. El verdadero desafío consistirá en sobrevivir a las consecuencias de su caída... sin Kelsier.\r\n\r\nVin y el Rey Elend buscan en los últimos escondites de recursos del Lord Legislador y, engañado, el Rey libera del Pozo de la Ascensión algoque debería haber quedado oculto para siempre. Un enorme peligro acecha a la humanidad, y la verdadera pregunta es si conseguirán detenerlo a tiempo.\r\n\r\nEn El héroe de las eras se comprende el porqué de la niebla y las cenizas, las tenebrosas acciones del Lord Legislador y la naturaleza del Pozo de la Ascensión. Esta aventura lleva a la trilogía a un clímax dramáti', 9.1, 'ElHeroedelasEras.jpg', 0, '2008-10-14'),
(17, 'Los jardines de la Luna (Malaz: El Libro de los Caídos 1)', 8, 2, 5, 23.75, 776, 'Tras guerras interminables y amargas luchas internas, el descontento se ha apoderado del Imperio de Malaz. Incluso las tropas imperiales, siempre ansiosas por derramar sangre, necesitan un respiro. Sin embargo, las pretensiones expansionistas de la emperatriz Laseen no tienen límites, más aun cuando son reforzadas por sus temibles agentes de la Garra.\r\n\r\nEl sargento Whiskeyjack y su escuadrón necesitan tiempo para llorar los muertos del último asedio, pero Darujhistan, la última de las Ciudades Libres de Genabackis, los espera; en ella ha puesto la emperatriz su mirada depredadora', 8.8, 'LosJardinesdelaLuna.jpg', 0, '1999-04-01'),
(18, 'Las puertas de la Casa de la Muerte (Malaz: El Libro de los Caídos 2)', 8, 2, 5, 23.75, 880, 'Debilitado por los acontecimientos en Darujhistan, el Imperio de Malaz se halla al borde de la anarquía. En el vasto dominio de las Siete Ciudades, en el desierto Santo Raraku, la vidente Sha\'ik y sus seguidores se preparan para el Torbellino, la sublevación profetizada desde hace mucho tiempo. Será un brote de fanatismo que envolverá al imperio en un salvajismo y una sed de sangre sin precedentes. Estallará uno de los conflictos más sangrientos de su historia y surgirán nuevos destinos y leyendas...\r\n\r\nEn las minas de otaralita, Felisin sueña con vengarse de su hermana, que la condenó a una vida de esclava. Los ahora-proscritos Abrasapuentes, Violín y el asesino Kalam han jurado devolver a Apsalar a su patria y matar a la emperatriz Laseen.\r\n\r\nMientras tanto, Coltaine, el carismático comandante malazano, conduce a sus soldados a una última batalla para salvar la vida de treinta mil refugiados. ', 8.6, 'LasPuertasdelaMuerte.jpg', 0, '2000-09-01'),
(19, 'Memorias de hielo (Malaz: El Libro de los Caídos 3)', 8, 2, 5, 25.55, 1184, 'Una fuerza aterradora ha surgido en el continente asolado de Genabackis. Como una marea de sangre corrompida, el Dominio Painita cruza el continente como lava hirviente que consume a todos los que no escuchan la palabra de su profeta, el Vidente Painita. En su camino se interpone una alianza incómoda: la hueste de Dujek Unbrazo y los veteranos Abrasapuentes de Whiskeyjack, junto con antiguos adversarios: el caudillo Caladan Brood, Anomander Rake y sus tiste andii. Superados en número y desconfiando de todo y de todos, deben hacer llegarel mensaje a cualquier posible aliado, incluyendo las Espadas Grises, una hermandad mercenaria que ha jurado defender a toda costa la ciudad sitiada de Capustan.\r\n\r\nPero son más los clanes antiguos que se están reuniendo. Los t#lan imass se alzan para responder a una antigua llamada primitiva. Algo maligno amenaza este mundo: las sendas están envenenadas y abundan los rumores sobre un dios que se ha deshecho de sus cadenas y está empeñado en vengarse...', 9, 'MemoriasDelHielo.jpg', 0, '2001-12-06'),
(20, 'La casa de cadenas (Malaz: El Libro de los Caídos 4)', 8, 2, 5, 23.65, 944, 'Este volumen comienza en el norte de Genabackis, el día que empieza el extraordinario destino de Karsa Orlong, uno de los tres guerreros salvajes que descienden las montañas para atacar las tierras del sur. Pasados unos años, Tavore, la inexperta consejera de la emperatriz, debe adiestrar a doce mil soldados para convertirlos en una fuerza capaz de desafiar a las hordas de la elegida, Sha\'ik, que aguardan en el desierto. Allí, sus caudillos están enzarzados en una lucha de poder que amenaza al alma de la rebelión, mientras que Sha\'ik se obsesiona con la que cree que es su mayor enemiga: su hermana.', 9.4, 'LaCasadelasCadenas.jpg', 0, '2002-12-02'),
(21, 'Mareas de Medianoche (Malaz: El Libro de los Caídos 5)', 8, 2, 5, 23.65, 896, 'Después de décadas de guerras intestinas, las tribus de los Tiste Edur al fin se han unido bajo el mando del Rey Warlock.\r\n\r\nHay paz, pero el precio ha sido terrible: un pacto hecho con un poder oculto cuyos motivos son, en el mejor de los casos, sospechosos, y, en el peor, mortales. Al sur, el rapaz reino de Lether, impaciente por ver cumplido el papel que profetizaron para él largo tiempo atrás como imperio renacido, ha esclavizado a sus vecinos menos civilizados. Es decir, a todos salvo a los Tiste Edur. El destino ha decretado que también ellos han de caer. Y, sin embargo, la lucha inminente que librarán estos dos pueblos no es más que un pálido reflejo de un conflicto más primitivo. Se están reuniendo antiguas fuerzas y con ellas la herida todavía abierta de una vieja traición y un ansia de venganza...', 9.3, 'MareasdeMedianoche.jpg', 0, '2004-03-01'),
(22, 'Los cazahuesos (Malaz: El Libro de los Caídos 6)', 8, 2, 5, 25.55, 1120, 'Los cazahuesos comienza dos meses después de los eventos de La Casa de Cadenas. El Decimocuarto Ejército de Malaz ha destruido el ejército del Torbellino, y la Consejera Tavore Paran ha ejecutado a Sha\'ik. El Decimocuarto ahora está presionando hacia el oeste, persiguiendo los restos de la rebelión del Torbellino (bajo el mando de Leoman de los Mayales), mientras busca refugio en la ciudad fortaleza de Y\'Ghatan, donde el Imperio de Malaz ha enfrentado cruentas derrotas en el pasado. Mientras tanto, Dujek Unbrazo, que se ha ganado de nuevo el favor de la emperatriz Laseen, ha aterrizado en la costa norte de Siete Ciudades para completar la tarea de aplacar a la rebelión, pero allí se ha desatado una plaga mortal. Ganoes Paran, el nuevo maestro de la baraja de dragones, llega a Genabackis para ayudar a lidiar con el caos.', 9.6, 'LosCazahuesos.jpg', 0, '2006-03-01'),
(23, 'La tempestad del segador (Malaz: El Libro de los Caídos 7)', 8, 2, 5, 33.15, 1168, 'En el imperio letherii reina el desconcierto. Mientras el emperador Rhulad Sengar, rodeado de aduladores y comisionados de su maquiavélico canciller, se precipita a la locura, los agentes secretos letherii llevan a cabo una campaña de terror contra su propia gente. El Errante, en otro tiempo un dios clarividente, parece ahora incapaz de ver el futuro. Las conspiraciones recorren el palacio y el imperio, manejado por corruptos e interesados, está al borde de una guerra sin precedentes con los reinos vecinos.\r\n\r\nPor otra parte, la flota Edur se encuentra cada vez más cerca. Entre sus guerreros se hallan Karsa Orlong e Icarium Robavida, cuya mera presencia significa que correrá sangre. Pero una pequeña banda de fugitivos está decidida a escapar del imperio y salvar al emperador. Se aproxima un ajuste de cuentas y su magnitud será inimaginable.', 8.5, 'LaTempestaddelSegador.jpg', 0, '2007-05-07'),
(24, 'Doblan por los mastines (Malaz: El Libro de los Caídos 8)', 8, 2, 5, 33.15, 1, 'En Darujhistan, la ciudad del fuego azul, se dice que el amor y la muerte llegarán bailando. Transcurre el verano y el calor es sofocante, pero al hombre redondo y pequeño con el chaleco rojo desteñido le molesta algo más que el sol. Las cosas no van bien. Funestos presagios plagan sus noches y acechan las calles de la ciudad como demonios de las sombras. Los asesinos acechan por los callejones, pero han cambiado las tornas y los cazadores son presas.\r\n\r\nUnas manos ocultas rompen las ataduras de la tiranía. Mientras los bardos cantan sus trágicas historias, en algún lugar lejano se oye el aullido de los mastines... Y en la distante ciudad de Coral Negro, donde gobierna el Hijo de la Oscuridad, hay sed de venganza. Parece que el amor y la muerte van a llegar de la mano... y bailando.', 8.8, 'DoblanporlosMastines.jpg', 0, '2008-06-30'),
(25, 'Polvo de sueños (Malaz: El Libro de los Caídos 9)', 8, 2, 5, 33.15, 1170, 'En el continente Letherii, el ejército exiliado malazano, comandado por la consejera Tavore, comienza la marcha hacia los eriales del este para combatir por una causa desconocida contra un enemigo que jamás ha sido visto. El destino que aguarda a los Cazahuesos es por demás incierto. Nada saben del enemigo y la única arma que merece ser empuñada es el coraje.\r\n\r\nEn la guerra todos pierden, y esta certeza se percibe en la mirada de cualquier soldado. El último gran ejército del Imperio de Malaz busca una batalla final en nombre de la redención, pero quedan por responder algunas preguntas finales...', 8, 'PolvodeSueños.jpg', 0, '2009-07-01'),
(26, 'El Dios Tullido (Malaz: El Libro de los Caídos 10)', 8, 2, 5, 33.15, 1168, 'Masacrados por los k\'chain nah\'ruk, los Cazahuesos marchan hacia Kolanse, donde les aguarda un destino desconocido. El ejército está al filo del motín, pero la consejera Tavore no cede. Queda un acto final. Tavore pretende desafiar a los dioses, pero sus tropas pueden matarla a ella antes. Los forkrul assail esperan a Tavore y a sus aliados; son los árbitros finales de la humanidad. Ansían aniquilar a todos los humanos para comenzar de nuevo.\r\n\r\nEn el reino de Kurald Galain, una muchedumbre de refugiados se reúne en la Primera Orilla. Liderados por Yedan Derryg, esperan la fractura de Cascada de Luz y la llegada de los tiste liosan. Es una guerra que no pueden ganar, y morirán en nombre de una ciudad vacía y de una reina sin súbditos.', 9.7, 'ElDiosTullido.jpg', 0, '2011-02-15'),
(27, 'Fundación', 9, 1, 6, 8.5, 264, 'esde hace doce mil años el hombre se ha dispersado por los planetas de la galaxia, unificada alrededor de un Imperio pacífico cuya capital es la majestuosa ciudad de Trántor. El sistema funcionó y prosperó durante incontables generaciones, pero ahora se ha convertido en el centro de todas las intrigas y en símbolo de la corrupción imperial. Solamente Hari Seldon, creador de la psicohistoria -la ciencia revolucionaria que se basa en el estudio matemático de los hechos históricos-, fue capaz de prever el derrumbamiento del Imperio y el retorno a la barbarie durante varios milenios.\r\n\r\nTratando de minimizar los efectos de esta catástrofe, Seldon reúne a las mentes más brillantes del Imperio y establece dos Fundaciones en ambos extremos de la galaxia. Fundación narra la historia de la primera.', 9.1, 'Fundacion.jpg', 0, '1942-05-01'),
(28, 'Fundación e Imperio', 9, 1, 6, 11.95, 336, 'Guiada por su fundador, el gran psicohistoriador Hari Seldon, y gracias a su superioridad científica y tecnológica, la Fundación ha logrado sobrevivir a la amenaza de barbarie y avaricia de sus planetas vecinos. Pero ahora debe enfrentarse al Imperio, que, pese a su decadencia, sigue siendo la fuerza más poderosa de la galaxia.\r\n\r\nCuando un ambicioso general empeñado en restaurar la gloria del Imperio envía una vasta flota imperial a destruir la Fundación, la única esperanza para el pequeño planeta de eruditos y científicos se encuentra en las profecías de Hari Seldon. Pero ni siquiera el mismo Hari Seldon podría haber previsto el nacimiento de una extraordinaria criatura llamada el Mulo, una inteligencia mutante dotada de poderes paranormales capaces de convertir al humano de voluntad más férrea en el más dócil esclavo', 9.2, 'FundacioneImperio.jpg', 0, '1952-04-01'),
(29, 'Segunda Fundación', 9, 1, 6, 9.45, 320, 'Tras años de esfuerzo, la Fundación yace en ruinas, destrozada por la inteligencia mutante del Mulo. Sin embargo, se rumorea que Hari Seldon estableció una segunda Fundación secreta, cuyo emplazamiento era desconocido incluso para los dirigentes de la primera. La misión de esta segunda Fundación era custodiar el conocimiento de la humanidad y protegerlo durante los siglos que durara el período de barbarie.\r\n\r\nAhora que la primera Fundación ha sido destruida, la segunda Fundación se ve obligada a revelar su existencia. La finalidad del Mulo no es otra que la de descubrir el emplazamiento de esta segunda Fundación para destruirla, pero no es el único, los supervivientes de la primera Fundación también quieren acabar con ella... antes de que ella acabe con ellos.', 8.9, 'SegundaFundacion.jpg', 0, '1953-04-13'),
(30, 'Dune(Las crónicas de Dune 1)', 10, 1, 6, 28.4, 784, 'En el desértico planeta Arrakis, el agua es el bien más preciado y llorar a los muertos, el símbolo de máxima prodigalidad. Pero algo hace de Arrakis una pieza estratégica para los intereses del Emperador, las Grandes Casas y la Cofradía, los tres grandes poderes de la galaxia. Arrakis es el único origen conocido de la melange, preciosa especia y uno de los bienes más codiciados del universo.\r\n\r\nAl duque Leto Atreides se le asigna el gobierno de este mundo inhóspito, habitado por los indómitos Fremen y monstruosos gusanos de arena de centenares de metros de longitud. Sin embargo, cuando la familia es traicionada, su hijo y heredero, Paul, emprenderá un viaje hacia un destino más grande del que jamás hubiese podido soña', 9.4, 'Dune.jpg', 0, '1965-08-01'),
(31, 'El mesías de Dune (Las crónicas de Dune 2)', 10, 1, 6, 11.35, 304, 'Arrakis, también llamado Dune: un mundo desierto en pos del sueño de convertirse en un paraíso, cuna de mil guerras que se han extendido por todo el universo y de un anhelo mesiánico que intenta alcanzar el sueño más antiguo de la humanidad...\r\n\r\nPaul Atreides: un personaje mítico, perturbado por la cercana presencia de una sombra dominante: su hermana Alia. Y frente a ellos, los grandes intereses económicos, políticos y religiosos que sacuden los espacios interestelares: la CHOAM, la Cofradía espacial, el Landsraad, la Bene Gesserit...\r\n\r\nTodo ello, y mucho más, conforma esta segunda entrega de «Dune»: un fresco impresionante y una obra cumbre de la imaginación.', 8.1, 'ElMesiasdeDune.jpg', 0, '1969-01-01'),
(32, 'Hijos de Dune (Las crónicas de Dune 3)', 10, 1, 6, 11.35, 608, 'Leto Atreides, el hijo de Paul -el mesías de una religión que arrasó el universo, el mártir que, ciego, se adentró en el desierto para morir-, tiene ahora nueve años. Pero es mucho más que un niño, porque dentro de él laten miles de vidas que lo arrastran a un implacable destino. Él y su hermana gemela, bajo la regencia de su tía Alia, gobiernan un planeta que se ha convertido en el eje de todo el universo. Arrakis, más conocido como Dune.\r\n\r\nY en este planeta, centro de las intrigas de una corrupta clase política y sometido a una sofocante burocracia religiosa, aparece de pronto un predicador ciego, procedente del desierto. ¿Es realmente Paul Atreides, que regresa de entre los muertos para advertir a la humanidad del peligro más abominable?', 9.1, 'HijosdeDune.jpg', 0, '1976-04-01');

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
(5, 'carlosram', 'carami02@ucm.es', 'qwerty', 'Carlos', 'Ramírez Martínez', 'lector errante'),
(6, 'nicobeni', 'nicobeni@ucm.es', '123456', 'Nicolás', 'Benito', 'lector novato'),
(7, 'semuñoz', 'semuñoz@ucm.es', '123456', 'Sergio', 'Muñoz', 'lector novato'),
(8, 'froiz', 'ofroiz@ucm.es', 'froiz', 'Óscar', 'Froiz', 'lector novato'),
(9, 'davicillo', 'ddoming@ucm.es', '98765', 'David', 'Dominguez', 'lector novato'),
(10, 'paula', 'paulalopez@ucm.es', '1234', 'Paula', 'López', 'lector novato');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id_libro`,`estado`) USING BTREE;

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_Autor`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_Comentario`),
  ADD KEY `id_Libro` (`id_Libro`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_Comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id_Editorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_Genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_Libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD CONSTRAINT `almacen_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libro` (`id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_Libro`) REFERENCES `libro` (`id_Libro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
