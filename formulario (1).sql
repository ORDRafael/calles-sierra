-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2024 a las 00:43:49
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `formulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre_usuario_modificacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_citas`, `fecha`, `hora`, `id_paciente`, `id_medico`, `last_modified`, `nombre_usuario_modificacion`) VALUES
(64, '2024-03-01', '11:42', 9, 49, '2024-02-02 01:39:21', NULL),
(65, '2024-03-01', '11:42', 9, 49, '2024-02-02 01:39:45', NULL),
(76, '2024-02-23', '07:00', 7, 50, '2024-02-02 20:07:54', NULL),
(77, '2024-02-24', '07:00', 12, 50, '2024-02-02 20:08:15', NULL),
(78, '2024-02-24', '08:00', 17, 50, '2024-02-02 20:33:36', NULL),
(80, '2024-02-07', '09:00', 11, 49, '2024-02-02 23:39:58', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `id_paciente` int(40) NOT NULL,
  `diagnostico` varchar(100) NOT NULL,
  `medicamentos` varchar(100) NOT NULL,
  `evolucion` varchar(100) NOT NULL,
  `recomendaciones` varchar(100) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informes`
--

INSERT INTO `informes` (`id`, `contenido`, `id_paciente`, `diagnostico`, `medicamentos`, `evolucion`, `recomendaciones`, `fecha`) VALUES
(39, '1', 7, '1', '1', '1', '1', '2024-01-31'),
(40, 'AAAAAAAA', 7, 'Robert', 'Ctm', 'Teodio', 'Inutil', '2024-01-31'),
(41, 'AAAAAAAA', 7, 'Robert', 'Ctm', 'Teodio', 'Inutil', '2024-01-31'),
(42, 'AAAAAAAA', 7, 'Robert', 'Ctm', 'Teodio', 'Inutil', '2024-01-31'),
(44, 'AAAAAA', 7, 'AAAAA', 'AAAAAA', 'AAAAAAA', 'AAAAAAAAA', '2024-01-31'),
(51, '1', 10, '1', '1', '1', '1', '2024-01-31'),
(52, '2', 10, '2', '2', '2', '2', '2024-01-31'),
(55, '1', 7, '1', '1', '1', '1', '2024-02-01'),
(56, 'Paila', 7, 'Hola que tal?', 'Paracetamoool', 'Uuuuf', 'F', '2024-02-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` int(10) NOT NULL,
  `telefono` int(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `especialidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`id`, `nombre`, `apellido`, `cedula`, `telefono`, `correo`, `especialidad`) VALUES
(49, 'Rafael', 'Ordaz', 2147483647, 414656005, 'rafaelordaz16@gmail.com', 'Cardiologia'),
(50, 'Yoli', 'De Ordaz', 11280459, 2147483647, 'yolisora@gmail.com', 'Gastroenterología'),
(51, 'Zury', 'Kar', 30233368, 2147483647, 'zuryk@gmail.com', 'Endocrinología'),
(52, 'Test', 'Test', 123, 0, 'Test@gmail.com', 'Cardiologia'),
(53, 'Freilix', 'Revilla', 28546673, 2147483647, 'freilix@gmail.com', 'Dermatología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(40) NOT NULL,
  `cedula` int(11) NOT NULL,
  `primer_nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) NOT NULL,
  `primer_apellido` varchar(30) NOT NULL,
  `segundo_apellido` varchar(30) NOT NULL,
  `representante` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `estado_civil` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `lugar_nacimiento` varchar(30) NOT NULL,
  `nacionalidad` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `cedula`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `representante`, `fecha_nacimiento`, `estado_civil`, `direccion`, `telefono`, `sexo`, `lugar_nacimiento`, `nacionalidad`, `correo`) VALUES
(7, 99999999, 'Test', 'Test', 'Test', 'Test', 'Test', '2022-12-31', 'Test', 'Test', 'Test', 'Test', 'Test', 'Testt', 'Test@gmail.com'),
(10, 27169435, 'Rafael', 'Alfonso', 'Ordaz', 'Bermudez', 'No', '2000-04-16', 'Soltero', 'La puerta', '04146560053', 'Masculino', 'Mcbo', 'Venezolano', 'rafa@gmail.com'),
(11, 6291831, 'Papa', 'papa', 'papa', 'papa', 'papa', '1993-12-31', 'casado', 'casa', '0231231231', 'masc', 'ccs', 'vene', 'papa@gmail.com'),
(24, 1, '1', '1', '1', '1', '1', '0000-00-00', '1', '1', '1', '1', '1', '1', '1@1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `jerarquia` varchar(100) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `id_usuario_modificacion` int(11) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `jerarquia`, `correo`, `id_usuario_modificacion`, `token`, `expiration`) VALUES
(155, 'test', '$2y$10$8lcD4d4y1iPTUtd5D2fny.OtuJMTm02N92F2ocVhL7ygs/vvpOldK', '', 'test@gmail.com', 0, NULL, NULL),
(156, 'admin', '$2y$10$OZFbWOl1istMEoYquwNwj.cKMfCjre8UHn9NTIXZ6qD8tyyal0Iv2', 'administrador', 'admin@gmail.com', 0, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`);

--
-- Indices de la tabla `informes`
--
ALTER TABLE `informes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informes`
--
ALTER TABLE `informes`
  ADD CONSTRAINT `informes_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
