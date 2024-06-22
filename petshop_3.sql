-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2024 a las 02:21:09
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
-- Base de datos: `petshop_3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `activo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `activo`) VALUES
(1, 'alimento para perros', 1),
(2, 'Alimento para gatos', 0),
(3, 'Alimento para conejos', 0),
(4, 'higiene', 0),
(5, 'juguetes', 0),
(6, 'ropas y juguetes', 0),
(7, 'otros', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id_consulta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `respuesta` varchar(50) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id_consulta`, `nombre`, `apellido`, `email`, `telefono`, `respuesta`, `mensaje`) VALUES
(1, 'Mauricio Agustin', 'GOMEZ', 'mauricioagustingomez@gmail.com', '+543794349927', '', 'esto es una prueba!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_prod` varchar(100) NOT NULL,
  `descripcion_prod` varchar(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `precio_vta` float(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `eliminado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_prod`, `descripcion_prod`, `imagen`, `categoria_id`, `precio`, `precio_vta`, `stock`, `stock_min`, `eliminado`) VALUES
(23, 'alimento para gatos', 'Purina Cat Chow Gatitos por 10kg', '1686770003_3e3c59c107665b5d08c0.png', 1, 0.00, 1500.00, 10, 1, ''),
(30, 'alimento para perros', 'Dog Selection por 21kg', '1686782358_6beb12f90833fb29bad1.jpg', 1, 0.00, 1200.00, 12, 1, ''),
(31, 'alimento para gatos', '7 vidas Gatos Salmon por 10kg', '1686794203_02af31a5d54db2fe853d.png', 2, 2000.00, 3200.00, 7, 1, 'NO'),
(32, 'alimento para gatos', '7 vidas oferta 2 bolsas', '1686797062_1ad59021f557c8cad1f0.jpg', 2, 9000.00, 9000.00, 12, 1, 'SI'),
(33, 'alimento para perros', 'Royal Canin Boxer Adulto por 12kg', '1687289361_0597dd1113fd15b0b559.webp', 1, 2000.00, 1200.00, 0, 0, 'NO'),
(34, 'alimento para perros', 'Dog Selection por 21kg', '1687321639_2afee26ab3f2e0b106c4.jpg', 1, 3000.00, 3200.00, 8, 1, 'NO'),
(35, 'alimento para gatos', 'Purina Cat Chow Gatitos por 10kg', '1687321688_c553045f95d0ca82c4c2.png', 2, 2000.00, 2500.00, 10, 1, 'NO'),
(36, 'alimento para perros', 'Alimento Excellent Adult Para Perro Adulto De Raza Mediana Y Grande Sabor Pollo Y Arroz En Bolsa De ', '1687479745_4b2971ad857dc149717a.jpg', 1, 14000.00, 16000.00, 10, 1, 'SI'),
(37, 'alimento para gatos', 'Alimento Cat Chow Defense Plus Para Gato De Temprana Edad Sabor Mix En Bolsa De 8 kg', '1687480778_eca1140ff505555005b8.jpg', 2, 9000.00, 10000.00, 9, 1, 'NO'),
(38, 'alimento para perros', 'Alimento Sieger Super Premium para perro cachorro de raza mediana y grande sabor mix en bolsa de 15', '1687481056_b79410e5f8464dfca18f.webp', 1, 9000.00, 15000.00, 8, 1, 'NO'),
(39, 'alimento para gatos', 'Alimento Gati Recetas Caseras para gato adulto sabor pescado, arroz y espinaca en bolsa de 15 kg', '1687481121_eb0cf1b9c5449a25eddc.jpg', 2, 9000.00, 11000.00, 9, 1, 'NO'),
(40, 'alimento para gatos', 'Alimento Whiskas Castrados 1+ para gato adulto sabor mix de carnes en bolsa de 10 kg', '1687481298_08355e46f42e5f214930.webp', 2, 9000.00, 12000.00, 10, 1, 'NO'),
(41, 'alimento para gatos', 'Alimento Agility Premium Urinary para gato adulto sabor mix en bolsa de 10 kg', '1687481428_d6418a06d8df11b99139.webp', 2, 10000.00, 12000.00, 9, 1, 'NO'),
(42, 'alimento para perros', 'Alimento Dog Selection Criadores para perro adulto de raza pequeña sabor carne y pollo en bolsa de 1', '1687481508_3263a967cd097591819c.webp', 1, 13000.00, 15000.00, 9, 1, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'jabfry', 'jabfryyy@gmail.com', '$2y$10$bFdlcJO9wRuviKaERt7HNebuKDSY476euB0abVPBnTsTpoLpUFkK2', '2023-06-08 20:11:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` text NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `perfil_id`, `baja`) VALUES
(1, 'Agustin', 'Cliente', 'mag3', 'mauriciogomez1@gmail.com', '$2y$10$abGwUOlOC.xXrlWaZKyG4.9KmMLnVBqAIv929TYPkzRHEaCuatUcy', 2, 'NO'),
(2, 'Mauricio Agustin', 'GOMEZ', 'mag3', 'mauricioagustingomez@gmail.com', '$2y$10$9iMSrZ1sTqqta4LDH4nP..MunEdOGPVq.pWx3Ue2eu9FODn76rhoS', 1, 'NO'),
(3, 'Mauricio Agustin', 'GOMEZ', 'mag1', 'mauriciogomez@gmail.com', '$2y$10$2jYXQeeXINJzVmHbsdHsNuwp7DXrw.2U2CyKszcZM.pvc.QBeYXWi', 2, 'NO'),
(4, 'Antonella', 'Garcia', 'anto', 'Brenda.garcia@gmail.com', '$2y$10$Nui/QQBuNrsWZ/1l/Ed8t.uotyUg4eg8eAsB/hQ6zwRQ4SNGuxP8q', 2, 'NO'),
(5, 'javi', 'frias', 'jabfryyy', 'jabfryyy@gmail.com', '$2y$10$jYhIsCix5l.npm0ioA8DB.5aJn5bla8hBULxRpl0Ys8YAblR4jaoq', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total_venta` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id`, `fecha`, `usuario_id`, `total_venta`) VALUES
(1, '2023-06-23 00:05:58', 1, 10100.00),
(2, '2023-06-23 01:06:57', 3, 1200.00),
(3, '2023-06-23 01:39:16', 4, 30000.00),
(4, '2023-06-25 04:17:32', 4, 18200.00),
(5, '2023-11-28 21:25:23', 4, 17400.00),
(6, '2024-02-09 21:07:15', 5, 10000.00),
(7, '2024-02-18 22:58:11', 5, 20900.00),
(8, '2024-02-18 23:12:41', 5, 6400.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 1, 31, 1, 3200.00),
(2, 1, 33, 1, 1200.00),
(3, 1, 34, 1, 3200.00),
(4, 1, 35, 1, 2500.00),
(5, 2, 33, 1, 1200.00),
(6, 3, 38, 1, 15000.00),
(7, 3, 42, 1, 15000.00),
(8, 4, 31, 1, 3200.00),
(9, 4, 38, 1, 15000.00),
(10, 5, 31, 1, 3200.00),
(11, 5, 34, 1, 3200.00),
(12, 5, 39, 1, 11000.00),
(13, 6, 37, 1, 10000.00),
(14, 7, 31, 1, 3200.00),
(15, 7, 34, 1, 3200.00),
(16, 7, 35, 1, 2500.00),
(17, 7, 41, 1, 12000.00),
(18, 8, 31, 1, 3200.00),
(19, 8, 34, 1, 3200.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consulta`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas_cabecera_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
