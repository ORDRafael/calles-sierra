-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2024 a las 02:06:16
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
  `hora` time NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_citas`, `fecha`, `hora`, `id_paciente`, `id_medico`, `last_modified`) VALUES
(29, '2023-12-14', '00:35:00', 7, 52, '2024-01-08 00:58:01'),
(30, '2023-12-21', '03:35:00', 7, 49, '2024-01-08 00:58:01'),
(31, '2025-01-01', '23:00:00', 10, 51, '2024-01-08 00:58:01'),
(32, '2023-12-31', '00:59:00', 16, 50, '2024-01-08 00:58:01'),
(33, '2023-12-31', '23:58:00', 12, 49, '2024-01-08 00:58:01'),
(34, '2023-12-31', '23:59:00', 12, 50, '2024-01-08 00:58:01'),
(35, '2020-12-31', '23:59:00', 12, 53, '2024-01-08 00:58:01'),
(36, '2023-12-31', '23:59:00', 18, 56, '2024-01-08 00:58:01'),
(37, '2024-01-25', '00:07:00', 10, 49, '2024-01-08 00:58:01'),
(38, '2024-02-06', '04:09:00', 10, 49, '2024-01-08 00:58:01'),
(39, '2024-01-28', '01:13:00', 10, 49, '2024-01-08 00:58:01'),
(40, '2024-01-28', '01:13:00', 10, 49, '2024-01-08 00:58:01'),
(41, '2024-01-03', '14:38:00', 7, 49, '2024-01-08 14:38:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informes`
--

CREATE TABLE `informes` (
  `id` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `id_paciente` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(49, 'Rafael', 'Ordaz', 27169435, 414656005, 'rafaelordaz16@gmail.com', 'Medicina interna'),
(50, 'Yoli', 'De Ordaz', 11280459, 2147483647, 'yolisora@gmail.com', 'Gastroenterología'),
(51, 'Zury', 'Kar', 30233368, 2147483647, 'zuryk@gmail.com', 'Endocrinología'),
(52, 'Test', 'Test', 123, 0, 'Test@gmail.com', 'Cardiologia'),
(53, 'Freilix', 'Revilla', 28546673, 2147483647, 'freilix@gmail.com', 'Dermatología'),
(54, 'Oswaldo', 'Brenes', 1231231, 123124, 'aaa@gm', 'Pediatría'),
(55, '654321', '5432', 543254, 2842, '842@6', 'Alergología'),
(56, '2', '2', 2, 2, '22@gmail.com', 'Alergología');

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
(7, 99999999, 'Test', 'Test', 'Test', 'Test', 'Test', '2022-12-31', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test', 'Test@gmail.com'),
(9, 22222222, 'Prueba', 'Prueba', 'Prueba', 'Prueba', 'Prueba', '2017-09-29', 'Prueba', 'Prueba', 'Prueba', 'Prueba', 'Prueba', 'Prueba', 'Prueba@Prueba'),
(10, 27169435, 'Rafael', 'Alfonso', 'Ordaz', 'Bermudez', 'No', '2000-04-16', 'Soltero', 'La puerta', '04146560053', 'Masculino', 'Mcbo', 'Venezolano', 'rafa@gmail.com'),
(11, 6291831, 'Papa', 'papa', 'papa', 'papa', 'papa', '1993-12-31', 'casado', 'casa', '0231231231', 'masc', 'ccs', 'vene', 'papa@gmail.com'),
(12, 27169435, 'rafael', '1', '1', '1', '1', '2023-12-31', '1', '1', '1', '1', '1', '1', 'rafaelordaz16@gmail.com'),
(15, 1, '3', '3', '3', '3', '3', '0001-03-03', '3', '3', '3', '3', '3', '3', 'rafaelordaz16@gmail.com'),
(16, 1, '1', '1', '1', '1', '1', '0001-01-01', '1', '1', '1', '1', '1', '1', '1@1'),
(17, 123456, '123456', '12345', '2345', '12345', '2345', '2023-01-31', '12345', '23', '4234', '234', '5345', '345', '2@2'),
(18, 1, '9', '9', '9', '9', '9', '0009-12-09', '9', '9', '9', '9', '9', '9', 'rafaelordaz16@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `correo`) VALUES
(132, 'rafa', '$2y$10$xzViX5GFoipvFvDPWEmtvuDxXFVscnVpHZtDEfNT.5Ww7avW2NGXm', 'rafaelordaz16@gmail.com'),
(133, 'freilix', '$2y$10$ArzYZn1QsN/g45VUpBF.lussakYta/TsMY51c7y721qOCieITjC6W', 'rafaelordaz16@gmail.com');

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
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `informes`
--
ALTER TABLE `informes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

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
