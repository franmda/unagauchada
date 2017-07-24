-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2017 a las 18:47:40
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `nombreCalificacion` varchar(30) NOT NULL,
  `rangoDesde` mediumint(30) DEFAULT NULL,
  `rangoHasta` mediumint(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`nombreCalificacion`, `rangoDesde`, `rangoHasta`) VALUES
('aaaaaa', 32, 38),
('Animal', 30, 31),
('Buen Tipo', 1, 1),
('Dios', 39, 99999),
('Gran Tipo', 2, 4),
('Heroe', 18, 29),
('Hola', 12, 17),
('Irresponsable', -99999, -1),
('Nobleza Gaucha', 10, 11),
('Observador', 0, 0),
('Tipazo', 5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion_favores`
--

CREATE TABLE `calificacion_favores` (
  `id_favor` int(12) DEFAULT NULL,
  `favor_name` varchar(100) NOT NULL,
  `mailUsuario` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `mailAceptado` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `calificacionObtenida` int(20) NOT NULL,
  `comentarios` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion_favores`
--

INSERT INTO `calificacion_favores` (`id_favor`, `favor_name`, `mailUsuario`, `mailAceptado`, `calificacionObtenida`, `comentarios`) VALUES
(36, 'demo3', 'Ulises@hotmail.com', 'franco@unlp.com', 1, 'Todo piola'),
(42, 'gauchad', 'jmvarela-@hotmail.com', 'franco@unlp.com', -1, 'mal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(2, 'Mascotas perdidas'),
(4, 'Arte'),
(5, 'Legales'),
(6, 'Reparaciones'),
(9, 'motos'),
(10, 'deportes'),
(11, 'autos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favor`
--

CREATE TABLE `favor` (
  `favorId` int(10) UNSIGNED NOT NULL,
  `favorName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `favorDescription` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `favorCategory` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `favorPlace` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userId` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_aceptado` varchar(1000) COLLATE utf8_bin DEFAULT NULL,
  `fechaLimite` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `favor`
--

INSERT INTO `favor` (`favorId`, `favorName`, `favorDescription`, `favorCategory`, `favorPlace`, `userId`, `usuario_aceptado`, `fechaLimite`) VALUES
(40, 'Necesito alguna persona que pasee mi perra', 'Tengo que pasear a mi perro y no tengo tiempo, se porta bien.', 'motos', 'Tucumán', 'juanman@hotmail.com', NULL, '2017-10-13'),
(41, 'Holaaaaaaaaaaa', 'como anda? asdasd\r\n', 'Viaje', 'Puerto Madryn', 'franco@unlp.com', 'jmvarela-@hotmail.com', '2017-06-30'),
(42, 'gauchad', 'ddddddddddddescripcion de la gauchada bla bla .... cosas ....\r\n...............dddd...dd ', 'Reparaciones', 'Chubut', 'jmvarela-@hotmail.com', 'franco@unlp.com', '2017-10-26');

--
-- Disparadores `favor`
--
DELIMITER $$
CREATE TRIGGER `restar_credito` AFTER INSERT ON `favor` FOR EACH ROW BEGIN
   UPDATE usuario 
    SET userCredits= userCredits - 1
   WHERE usuario.userMail=new.UserId;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `favorId` int(10) UNSIGNED NOT NULL,
  `nombreImagen` varchar(1000) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `idImagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`favorId`, `nombreImagen`, `idImagen`) VALUES
(40, 'Gauchada.png', 42),
(41, 'Gauchada.png', 43),
(42, 'IMG-20160819-WA0006.jpg', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantes`
--

CREATE TABLE `postulantes` (
  `favorId` int(10) UNSIGNED NOT NULL,
  `userMail` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `postulantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `postulantes`
--

INSERT INTO `postulantes` (`favorId`, `userMail`, `postulantId`) VALUES
(40, 'jmvarela-@hotmail.com', 5),
(41, 'jmvarela-@hotmail.com', 3),
(42, 'fllk06_mda@hotmail.com', 6),
(42, 'franco@unlp.com', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_credito`
--

CREATE TABLE `precio_credito` (
  `precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precio_credito`
--

INSERT INTO `precio_credito` (`precio`) VALUES
(50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(10) UNSIGNED NOT NULL,
  `favorId` int(10) UNSIGNED NOT NULL,
  `userMail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion_pregunta` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_pregunta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `favorId`, `userMail`, `descripcion_pregunta`, `fecha_pregunta`) VALUES
(1, 37, 'Ulises@hotmail.com', '¿Que motor tiene?', '2017-06-27'),
(2, 41, 'juanman@hotmail.com', 'donde queda?', '2017-06-27'),
(3, 41, 'juanman@hotmail.com', 'a que hora?', '2017-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_ganancias`
--

CREATE TABLE `registro_ganancias` (
  `mailUser` varchar(100) DEFAULT NULL,
  `cantidad` int(30) DEFAULT NULL,
  `precio_unitario` int(30) DEFAULT NULL,
  `precio_total` int(30) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_registro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_ganancias`
--

INSERT INTO `registro_ganancias` (`mailUser`, `cantidad`, `precio_unitario`, `precio_total`, `fecha`, `id_registro`) VALUES
('Ulises@hotmail.com', 20, 50, 1000, '2017-06-27', 28),
('jmvarela-@hotmail.com', 10, 50, 500, '2017-06-27', 29),
('juanman@hotmail.com', 50, 50, 2500, '2017-06-27', 30),
('franco@unlp.com', 10, 50, 500, '2017-06-27', 31);

--
-- Disparadores `registro_ganancias`
--
DELIMITER $$
CREATE TRIGGER `actualizar_credito` AFTER INSERT ON `registro_ganancias` FOR EACH ROW BEGIN
   UPDATE Usuario 
    SET userCredits= userCredits+new.cantidad
   WHERE Usuario.userMail=new.mailUser;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(10) UNSIGNED NOT NULL,
  `id_pregunta` int(10) UNSIGNED NOT NULL,
  `descripcion_respuesta` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_respuesta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `id_pregunta`, `descripcion_respuesta`, `fecha_respuesta`) VALUES
(1, 1, 'El motor es 3.0 con gnc', '2017-06-27'),
(2, 2, 'en la plata', '2017-06-27'),
(3, 3, 'a las cinco', '2017-06-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `nombre_ubicacion` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `nombre_ubicacion`) VALUES
(1, 'La Plata'),
(2, 'Tucumán'),
(3, 'Puerto Madryn'),
(4, 'Chubut'),
(5, 'Buenos Aires');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `userName` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userMail` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userPassword` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userPoints` int(11) NOT NULL,
  `userCredits` int(11) NOT NULL,
  `userNumber` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userBirth` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userPhoto` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `is_admin` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`userName`, `userMail`, `userPassword`, `userPoints`, `userCredits`, `userNumber`, `userBirth`, `userPhoto`, `is_admin`) VALUES
('Francisco ', 'fllk06_mda@hotmail.com', '123456', 0, 0, '1234567899', '2017-05-20', 'Gauchada.png', 0),
('Franco', 'franco@unlp.com', '123456', -4, 9, '1234567890', '02/06/2017', 'Gauchada.png', 0),
('Juan Manuel', 'jmvarela-@hotmail.com', '654321', 2, 10, '2215563511', '11/01/1990', '12.jpg', 0),
('Juancito', 'juanman@hotmail.com', '123456', 0, 49, '2211231234', '02/14/2017', 'Gauchada.png', 0),
('Lihuel Amoroso', 'lihueamoroso@hotmail.com', 'asfasf', 0, 0, '2213149433', '03/27/1997', 'Gauchada.png', 1),
('Ulises Netramonti', 'Ulises@hotmail.com', '123456', 0, 18, '1231231231', '02/25/2010', '11875522_685057938263138_127448613_n.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`nombreCalificacion`),
  ADD UNIQUE KEY `rangoDesde` (`rangoDesde`),
  ADD UNIQUE KEY `rangoHasta` (`rangoHasta`);

--
-- Indices de la tabla `calificacion_favores`
--
ALTER TABLE `calificacion_favores`
  ADD UNIQUE KEY `id_favor` (`id_favor`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `favor`
--
ALTER TABLE `favor`
  ADD PRIMARY KEY (`favorId`),
  ADD KEY `usuario` (`userId`),
  ADD KEY `favorId` (`favorId`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagen`),
  ADD UNIQUE KEY `favorId_2` (`favorId`),
  ADD KEY `favorId` (`favorId`);

--
-- Indices de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD PRIMARY KEY (`postulantId`),
  ADD KEY `favorId` (`favorId`,`userMail`),
  ADD KEY `MailKey` (`userMail`);

--
-- Indices de la tabla `precio_credito`
--
ALTER TABLE `precio_credito`
  ADD PRIMARY KEY (`precio`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `registro_ganancias`
--
ALTER TABLE `registro_ganancias`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD UNIQUE KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userMail`),
  ADD KEY `userMail` (`userMail`),
  ADD KEY `userName` (`userName`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `favor`
--
ALTER TABLE `favor`
  MODIFY `favorId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  MODIFY `postulantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `registro_ganancias`
--
ALTER TABLE `registro_ganancias`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD CONSTRAINT `FavorKey` FOREIGN KEY (`favorId`) REFERENCES `favor` (`favorId`),
  ADD CONSTRAINT `MailKey` FOREIGN KEY (`userMail`) REFERENCES `usuario` (`userMail`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
