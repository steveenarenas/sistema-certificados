-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: database:3306
-- Tiempo de generación: 09-08-2024 a las 20:11:56
-- Versión del servidor: 10.11.7-MariaDB-1:10.11.7+maria~ubu2204
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gers_certificados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificados`
--

CREATE TABLE `certificados` (
  `id_cert` int(15) NOT NULL,
  `nit_cc` int(50) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `certificado` varchar(255) NOT NULL,
  `ano` int(15) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cert_roles`
--

CREATE TABLE `cert_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `fyh_creacion` date NOT NULL,
  `fyh_actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cert_roles`
--

INSERT INTO `cert_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'MASTER', '2024-02-28', '2024-03-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cert_usuarios`
--

CREATE TABLE `cert_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password_user` text NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fyh_creacion` date NOT NULL,
  `fyh_actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cert_usuarios`
--

INSERT INTO `cert_usuarios` (`id_usuario`, `nombres`, `user`, `password_user`, `id_rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Administrador', 'AdministradorGers2025', '$2y$10$QB0z03qER2JGU4io9lfX0u4ojE4I9jbzJOFKS80CfKE0f/x4XjYsm', 1, '2024-07-05', '2024-07-05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `certificados`
--
ALTER TABLE `certificados`
  ADD PRIMARY KEY (`id_cert`);

--
-- Indices de la tabla `cert_roles`
--
ALTER TABLE `cert_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `cert_usuarios`
--
ALTER TABLE `cert_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `certificados`
--
ALTER TABLE `certificados`
  MODIFY `id_cert` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cert_roles`
--
ALTER TABLE `cert_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cert_usuarios`
--
ALTER TABLE `cert_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cert_usuarios`
--
ALTER TABLE `cert_usuarios`
  ADD CONSTRAINT `cert_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `cert_roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
