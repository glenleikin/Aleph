-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2021 a las 20:54:50
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aleph`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`idAutor`, `Nombre`) VALUES
(1, 'Florencia Bonelli'),
(2, 'Gabriel Rolon'),
(3, 'Eduardo Sacheri'),
(4, 'Rosa Montero'),
(5, 'Lorena Pronsky'),
(6, 'Eduardo Galeano'),
(7, 'Julio Cortazar'),
(8, 'Cesar Aira'),
(9, 'Rodolfo Walsh'),
(10, 'Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Genero` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Autor` int(11) NOT NULL,
  `Anio` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `Imagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL DEFAULT 1 COMMENT '1 activo 0 inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `Nombre`, `Genero`, `Autor`, `Anio`, `Imagen`, `Estado`) VALUES
(7, 'La buena suerte', 'Ficcion', 4, '2020', 'P004.jpg', 1),
(8, 'Indias blancas', 'Literatura erotica', 1, '2005', 'P001.jpg', 1),
(11, 'PRUEBA', 'Indefinido', 5, '2020', 'P005.jpg', 1),
(12, 'Lo mucho que te ame', 'Narrativa', 3, '2019', 'P003.jpg', 1),
(14, 'El duelo', 'Autoayuda', 2, '2020', 'P002.jpg', 1),
(42, 'El libro de los abrazos', 'Latinoamerica', 6, '1989', 'P006.jpg', 1),
(63, 'Rota se camina igual', 'Indefinido', 9, '2020', 'P005.jpg', 1),
(88, 'PRUEBA', 'Indefinido', 7, '2020', 'P005.jpg', 1),
(91, 'Los juegos del hambre', 'Drama', 4, '9898', 'losjuegos.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `clave` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` int(11) NOT NULL DEFAULT 0 COMMENT '1 admin 0 usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `user`, `email`, `clave`, `tipo`) VALUES
(1, 'susana', 'susana87', 'susana@yahoo.com', '$2y$10$KJgA.ds7F1fKEH5RHl8k9.G8fiB6YMIIrbSdgmqko0wtkADcV/7w.', 0),
(2, 'Juan', 'juan_88', 'juanperez88@hotmail.com', '$2y$10$HMJUh9UljqLqJNEuXRNbaeHOE6x9GPsmfl4ayA.XYDGP/C7k77OcO', 0),
(3, 'Flor', 'florencia33', 'florsuarez@hotmail.com', '$2y$10$JaPLdZnmFnqmon8.FtbOKemZgqDM18YKg1rjgWemhAcNzpWlasinq', 0),
(4, 'Camila', 'cami54', 'camigonzalez@hotmail.com', '$2y$10$NX9vgmR0HFh2ml9g.ABj2.sicCi2QCbjzSAiBX1QYs4teRdclgE.2', 0),
(5, 'tiago', 'tiago2013', 'tiago2013@yahoo.com', '$2y$10$O0mlIniA1fGdQwQ7JPizPe5jTrO5o8ce2aSXZEmWL6paA7UqokTX.', 0),
(7, 'Pepe', 'pepito123', 'pepitolopez@hotmail.com', '$2y$10$DtFCiwbfWD1bBAdJ/0c90./wYTPc07TO1uwJzFJTVpACXW6giVeHy', 0),
(8, 'Pepito', 'pepito4040', 'pepito4040@hotmail.com', '$2y$10$4RtFhP1sH2LtIkwt1art0.4rymfM74fGuawsVKdy2m7F3a7Ul4AG2', 0),
(9, 'Luciana', 'luli_23', 'lulia90@yahoo.com.ar', '$2y$10$1DdKcBD.yehGlkHMTmdSC.25lJROnfYs/VgDlj6c0ZBk9chzt5f9a', 0),
(10, 'Pepe', 'pepi90', 'pepita23@hotmail.com', '$2y$10$ZwdHvzN7zDuN6PB/9bXEo.KgLQAjfewBPk1/I2FjMpmzCID4rUvwi', 0),
(18, 'glen', 'glen77', 'glen@yahoo.com', '$2y$10$i1WgCz/5I99Efbbq4pWMvOKpxvMe58.nJiSBYMrwhn79mYB/ivvG6', 0),
(19, 'admin', 'admin', 'admin@aleph.com', '$2y$10$8RZzPl8B7Mlgo0SkoQGq4u6IOyvWqkx6.Chilbwc7JH0vDzXTY3dC', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `Autor` (`Autor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`Autor`) REFERENCES `autor` (`idAutor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
