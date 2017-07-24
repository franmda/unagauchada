-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2017 a las 05:54:41
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
(1, 'Viajes'),
(2, 'Mascotas perdidas'),
(3, 'Cuidados'),
(4, 'Arte'),
(5, 'Legales'),
(6, 'Reparaciones');

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
  `usuario_aceptado` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `fechaLimite` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `favor`
--

INSERT INTO `favor` (`favorId`, `favorName`, `favorDescription`, `favorCategory`, `favorPlace`, `userId`, `usuario_aceptado`, `fechaLimite`) VALUES
(9, 'prueba', 'llldaadawasabi', 'Viajes', 'La Plata', 'fllk06_mda@hotmail.com', NULL, '2017-06-14');

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
(9, 'index.jpg', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantes`
--

CREATE TABLE `postulantes` (
  `favorId` int(10) UNSIGNED NOT NULL,
  `userMail` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `postulantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

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
('fllk06_mda@hotmail.com', 20, 1, 20, '2017-05-21', 1),
('fllk06_mda@hotmail.com', 22, 1, 22, '2017-05-21', 2),
('fllk06_mda@hotmail.com', 20, 1, 20, '2017-05-21', 3),
('pedro@hotmail.com', 12, 1, 12, '2017-05-21', 4),
('lihueamoroso@hotmail.com', 123, 1, 123, '2017-05-22', 5),
('lihueamoroso@hotmail.com', 345, 1, 345, '2017-05-22', 6),
('4027ab33@opayq.com', 2365, 1, 2365, '2017-05-22', 7),
('lihueamoroso@hotmail.com', 123, 1, 123, '2017-05-22', 8),
('fllk06_mda@hotmail.com', 4, 1, 4, '2017-05-23', 9),
('lihueamoroso@hotmail.com', 123, 1, 123, '2017-05-26', 11),
('lihueamoroso@hotmail.com', 1234, 50, 61700, '2017-05-26', 12),
('lihueamoroso@hotmail.com', 1234, 50, 61700, '2017-05-27', 13),
('lihueamoroso@hotmail.com', 123, 50, 6150, '2017-05-27', 14),
('lihueamoroso@hotmail.com', 123, 50, 6150, '2017-05-27', 15),
('lihueamoroso@hotmail.com', 12345, 50, 617250, '2017-05-27', 16),
('lihueamoroso@hotmail.com', 1234, 50, 61700, '2017-05-27', 17),
('lihueamoroso@hotmail.com', 1234, 50, 61700, '2017-05-27', 18),
('lihueamoroso@hotmail.com', 1234, 50, 61700, '2017-05-27', 19),
('lihueamoroso@hotmail.com', 1234, 50, 61700, '2017-05-27', 20),
('lihueamoroso@hotmail.com', 1234, 50, 61700, '2017-05-27', 21),
('fllk06_mda@hotmail.com', 1, 50, 50, '2017-05-28', 22),
('fllk06_mda@hotmail.com', 1, 50, 50, '2017-05-28', 23),
('fllk06_mda@hotmail.com', 10, 50, 500, '2017-06-09', 24);

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
  `userRep` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userNumber` varchar(12) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userBirth` varchar(11) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `userPhoto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `is_admin` int(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`userName`, `userMail`, `userPassword`, `userPoints`, `userCredits`, `userRep`, `userNumber`, `userBirth`, `userPhoto`, `is_admin`) VALUES
('cc', 'cccc@cc.com', '123456', 0, 0, 'Observador', '2323232323', '06/08/2017', 'Gauchada.png', 0),
('ccd', 'cccc@ccdc.com', '123321', 0, 0, 'Observador', '1212121212', '05/10/2017', 'Gauchada.png', 0),
('Francisco Lucchetta', 'fllk06_mda@hotmail.com', '123456', 0, 19993, 'Observador', '66', '2017-05-20', 'Gauchada.png', 0),
('ulises netramonti', 'fllk06_mda@hotmail.edu', '123456', 0, 100, 'Observador', '4545454545', '', 'Gauchada.png', 0),
('Francisco Lucchetta', 'fran07_mda@hotmail.com', '2', 0, 0, 'Observador', '456', '2017-05-20', 'Gauchada.png', 0),
('gustavo', 'gustavoamoroso@outlook.com', '123456', 0, 0, 'Observador', '2216384364', '03/13/1972', 'Gauchada.png', 0),
('jo', 'jorge@ho.om', '123456', 0, 0, 'Observador', '1221211221', '02/21/2017', 'Gauchada.png', 0),
('Lihuel Amoroso', 'lihueamoroso@hotmail.com', 'asfasf', 0, 21943, 'Observador', '2213149433', '03/27/1997', 'BjBlaskowicz.jpg', 1),
('pedro', 'pedro@hotmail.com', '321654', 0, 12, 'Observador', '2525252525', '2017-05-21', 'Gauchada.png', 0),
('Piltri', 'piltri@gmail.com', 'aaaaa', 0, 0, 'Observador', '2973625147', '06/30/1996', 'bc27r6.jpg', 0),
('r', 'seq@hotmail.com', '123456', 0, 0, 'Observador', '2323232323', '05/18/2017', 'Gauchada.png', 0);

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `registro_ganancias`
--
ALTER TABLE `registro_ganancias`
  ADD PRIMARY KEY (`id_registro`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `favor`
--
ALTER TABLE `favor`
  MODIFY `favorId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  MODIFY `postulantId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registro_ganancias`
--
ALTER TABLE `registro_ganancias`
  MODIFY `id_registro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
