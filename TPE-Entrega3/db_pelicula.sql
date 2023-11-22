-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2023 a las 04:42:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_pelicula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `Titulo` varchar(25) NOT NULL,
  `Director` varchar(25) NOT NULL,
  `FechaDeLanzamiento` date NOT NULL,
  `Sinopsis` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `Titulo`, `Director`, `FechaDeLanzamiento`, `Sinopsis`, `id_usuario`) VALUES
(7, 'Spiderman 2', 'Enzo', '2013-11-10', 'Nueva descripción de la película', 1),
(8, 'La isla siniestra', 'Martin Scorsese', '2010-02-18', 'Verano de 1954. Los agentes judiciales Teddy Daniels y Chuck Aule son enviados a una remota isla del puerto de Boston para investigar la desaparición de una peligrosa asesina recluida en el hospital psiquiátrico Ashecliffe, un centro penitenciario para cr', 1),
(9, 'Los vengadores', 'Joss Whedon', '2012-04-26', 'Cuando un enemigo inesperado surge como una gran amenaza para la seguridad mundial, Nick Fury, director de la Agencia SHIELD, decide reclutar a un equipo para salvar al mundo de un desastre casi seguro. Adaptación del cómic de Marvel \"Los Vengadores\", el ', 1),
(10, 'Barbie', 'Greta Gerwig', '2023-07-20', 'Después de ser expulsada de Barbieland por no ser una muñeca de aspecto perfecto, Barbie parte hacia el mundo humano para encontrar la verdadera felicidad.', 1),
(18, 'Crepusculo', 'Nombre del Director', '2023-11-10', 'Descripción de la película', 1),
(19, 'Peron', 'Nombre del Director', '2023-11-10', 'Descripción de la película', 1),
(20, 'Bohemian Rapsody', 'Nombre del Director', '2023-11-10', 'Descripción de la película', 1),
(22, 'Nuevo Título', 'Nuevo Director', '2023-11-15', 'Nueva Sinopsissssssssssssssssssssssssssssss', 1),
(24, 'Spiderman 5', 'Enzito', '2016-11-10', 'Nueva descripción de la película', 3),
(25, 'Spiderman 8', 'Enzito', '2026-11-10', 'Nueva descripción de la película', 1),
(26, 'Spiderman 8', 'Enzito', '2026-11-10', 'Nueva descripción de la película', 1),
(27, 'Spiderman 8', 'Enzito', '2026-11-10', 'Nueva descripción de la película', 1),
(28, 'Spiderman 7', 'Enzito', '2026-11-10', 'Nueva descripción de la película', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contraseña` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `contraseña`) VALUES
(1, 'webadmin', 'admin@gmail.com', 'admin'),
(2, 'Enzo', 'enzojatip@gmail.com', '123456'),
(3, 'Alan', 'alanCalles@gmail.com', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

