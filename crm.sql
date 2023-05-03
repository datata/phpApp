-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2019 a las 22:47:42
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm`
--
CREATE DATABASE IF NOT EXISTS `crm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `crm`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(64) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` int(10) UNSIGNED NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by_user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `created_on`, `created_by_user_id`, `updated_on`, `updated_by_user_id`) VALUES
(1, 'Mercadona, S.A.', 'info@mercadona.es', '2019-06-23 20:47:40', 1, '2019-06-23 21:05:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `type`, `node_id`, `created_on`, `created_by_user_id`) VALUES
(1, 2, NULL, '2019-06-23 22:34:42', 1),
(4, 1, NULL, '2019-06-23 22:43:06', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodes`
--

CREATE TABLE `nodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `url` varchar(256) NOT NULL,
  `enabled` tinyint(3) UNSIGNED NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` int(10) UNSIGNED NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by_user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nodes`
--

INSERT INTO `nodes` (`id`, `name`, `url`, `enabled`, `created_on`, `created_by_user_id`, `updated_on`, `updated_by_user_id`) VALUES
(1, 'LUXE HOTELS', 'http://www.google.es', 1, '2017-12-03 20:34:53', 1, '2017-12-04 20:53:13', 1),
(3, 'PARADOR EL SOL', 'http://www.google.com', 1, '2017-12-04 00:29:48', 1, NULL, NULL),
(4, 'BARES MANOLO', 'http://www.google.es', 0, '2017-12-04 00:30:12', 1, '2017-12-04 20:53:17', 1),
(5, 'UNIVERSIDAD VALENCIA', 'http://www.google.cat', 1, '2017-12-04 00:30:32', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(1, 'all');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles_permissions`
--

INSERT INTO `roles_permissions` (`role_id`, `permission_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(64) DEFAULT NULL,
  `enabled` tinyint(3) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `login_session` char(32) DEFAULT NULL,
  `login_expiration` datetime DEFAULT NULL,
  `logged_on` datetime DEFAULT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user_id` int(10) UNSIGNED NOT NULL,
  `updated_on` datetime DEFAULT NULL,
  `updated_by_user_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `enabled`, `role_id`, `login_session`, `login_expiration`, `logged_on`, `created_on`, `created_by_user_id`, `updated_on`, `updated_by_user_id`) VALUES
(1, 'admin', 'admin', 'Administrator', 1, 1, 'ab3b26beac178222f2f176694aa85f61', '2019-06-24 22:43:05', '2019-06-23 22:43:05', '2017-09-28 23:24:10', 1, '2017-12-04 20:38:38', 1),
(2, 'Julito', 'Julito', 'Julito Catedrales', 0, 1, NULL, NULL, NULL, '2017-10-12 22:46:16', 1, '2017-12-04 20:55:15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_nodes`
--

CREATE TABLE `users_nodes` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `node_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_nodes`
--

INSERT INTO `users_nodes` (`user_id`, `node_id`) VALUES
(1, 4),
(1, 1),
(2, 1),
(1, 3),
(2, 3),
(1, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by_user_id` (`created_by_user_id`) USING BTREE;

--
-- Indices de la tabla `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `users_nodes`
--
ALTER TABLE `users_nodes`
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `node_id` (`node_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `nodes`
--
ALTER TABLE `nodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_created_by_user_id` FOREIGN KEY (`created_by_user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD CONSTRAINT `fk_rp_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `fk_rp_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `users_nodes`
--
ALTER TABLE `users_nodes`
  ADD CONSTRAINT `fk_un_node_id` FOREIGN KEY (`node_id`) REFERENCES `nodes` (`id`),
  ADD CONSTRAINT `fk_un_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
