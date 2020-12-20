-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2020 a las 21:31:28
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ticket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `claim_type`
--

CREATE TABLE `claim_type` (
  `id` int NOT NULL,
  `claim_type_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `claim_type`
--

INSERT INTO `claim_type` (`id`, `claim_type_description`) VALUES
(1, 'Vencimiento'),
(2, 'averia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int NOT NULL,
  `code` int DEFAULT NULL,
  `date` date DEFAULT NULL,
  `recurrent` varchar(150) DEFAULT NULL,
  `claim_description` text,
  `identification_card` varchar(100) DEFAULT NULL,
  `claim_type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `code`, `date`, `recurrent`, `claim_description`, `identification_card`, `claim_type_id`) VALUES
(1, 12, '2020-12-19', 'Hector Torres', 'Reclamo por fecha de vencimiento invalida', '2058445', 1),
(2, 15, '2020-12-21', 'Veronica', 'Reparacion', '598741', 2),
(3, 13, '2020-12-18', 'Hugo Orue', 'Reclamo por averia de Televisor', '1234567', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `claim_type`
--
ALTER TABLE `claim_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_claim_type_idx` (`claim_type_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `claim_type`
--
ALTER TABLE `claim_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_claim_type` FOREIGN KEY (`claim_type_id`) REFERENCES `claim_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
