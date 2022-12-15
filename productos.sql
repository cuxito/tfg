-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 19:52:38
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `cod_prov` int(11) NOT NULL,
  `nombre_prod` varchar(255) NOT NULL,
  `cantidad_prod` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `PVP` float NOT NULL,
  `descuento` int(2) DEFAULT NULL,
  `categoria` varchar(20) NOT NULL,
  `fecha_caducidad` date DEFAULT NULL,
  `bajo_minimo` int(11) DEFAULT NULL,
  `imagen` longblob DEFAULT NULL,
  `precio_prov` float NOT NULL,
  `nuevo_precio` float DEFAULT NULL,
  `stock_precio_ant` int(11) DEFAULT NULL,
  `n_ventas` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `cod_prov`, `nombre_prod`, `cantidad_prod`, `stock`, `PVP`, `descuento`, `categoria`, `fecha_caducidad`, `bajo_minimo`, `precio_prov`, `nuevo_precio`, `stock_precio_ant`, `n_ventas`) VALUES
(1, 32, 'Colágeno marino con ácido hialurónico', '180 cápsulas', 103, 20, NULL, 'suplementos', NULL, 10, 13, NULL, NULL, 0),
(2, 32, 'Chlorella Bio', '140 comprimidos', 152, 8.75, NULL, 'suplementos', NULL, 10, 5.69, NULL, NULL, 0),
(3, 32, 'Magnesio y vitamina D3+K2', '120 cápsulas', 200, 18.82, NULL, 'suplementos', NULL, 10, 12.23, NULL, NULL, 0),
(4, 32, 'Aceite esencial de limón Bio', '30 ml de aceite esencial (Limón)', 129, 6.55, NULL, 'suplementos', NULL, 10, 4.26, NULL, NULL, 0),
(5, 32, 'Aceite esencial de lavanda Bio', '30 ml de aceite esencial (Lavanda)', 194, 11.5, NULL, 'suplementos', NULL, 10, 7.47, NULL, NULL, 0),
(6, 32, 'Arroz de levadura roja y coenzima Q10', '120 cápsulas', 197, 25.5, NULL, 'suplementos', NULL, 10, 16.57, NULL, NULL, 0),
(7, 32, 'Aceite esencial de árbol de té Bio', '30 ml de aceite esencial (Árbol del Té)', 70, 8.85, NULL, 'suplementos', NULL, 10, 5.75, NULL, NULL, 0),
(8, 32, 'Melatonina 1,95 mg', '90 comprimidos', 42, 15.15, NULL, 'suplementos', NULL, 10, 9.85, NULL, NULL, 0),
(9, 32, 'Vitamina D3 y K2', '60 perlas', 106, 18, NULL, 'suplementos', NULL, 10, 11.7, NULL, NULL, 0),
(10, 32, 'Naturflora Probiótico', '30 cápsulas', 15, 8.07, NULL, 'suplementos', NULL, 10, 5.25, NULL, NULL, 0),
(11, 32, 'Vitamina C 1000 mg con acción retardada', '100 comprimidos', 68, 18.85, NULL, 'suplementos', NULL, 10, 12.25, NULL, NULL, 0),
(12, 32, 'Cúrcuma con pimienta negra', '120 cápsulas', 43, 16.85, NULL, 'suplementos', NULL, 10, 10.95, NULL, NULL, 0),
(13, 32, 'Perlas de aceite de onagra', '400 perlas', 107, 25.95, NULL, 'suplementos', NULL, 10, 16.87, NULL, NULL, 0),
(14, 32, 'Omega 3,6,9', '120 perlas', 27, 17.69, NULL, 'suplementos', NULL, 10, 11.5, NULL, NULL, 0),
(15, 32, 'Ashwagandha 600 mg', '90 cápsulas', 27, 27.14, NULL, 'suplementos', NULL, 10, 17.64, NULL, NULL, 0),
(16, 32, 'Espirulina pura bio', '200 comprimidos', 66, 19.95, NULL, 'suplementos', NULL, 10, 12.97, NULL, NULL, 0),
(17, 32, 'Aceite esencial de árbol de té Bio', '10 ml (Árbol del Té)', 126, 5.85, NULL, 'suplementos', NULL, 10, 3.8, NULL, NULL, 0),
(18, 32, 'Proteína de guisante en polvo Bio', '250 g', 74, 9.15, NULL, 'suplementos', NULL, 10, 5.95, NULL, NULL, 0),
(19, 32, 'Vitamina D3 4000 UI', '90 perlas', 53, 23, NULL, 'suplementos', NULL, 10, 14.95, NULL, NULL, 0),
(20, 32, 'Jalea real 2000 mg con própolis y equinácea', '20 ampollas de 10ml', 154, 20.85, NULL, 'suplementos', NULL, 10, 13.55, NULL, NULL, 0),
(21, 32, 'L-glutamina en polvo', '200 g de polvo', 94, 24.75, NULL, 'suplementos', NULL, 10, 16.09, NULL, NULL, 0),
(22, 32, 'Aceite esencial de naranja dulce Bio', '30 ml de aceite esencial (Naranja)', 63, 5.35, NULL, 'suplementos', NULL, 10, 3.48, NULL, NULL, 0),
(23, 32, 'Magnesio Bisglicinato', '120 cápsulas', 111, 26.5, NULL, 'suplementos', NULL, 10, 17.23, NULL, NULL, 0),
(24, 32, 'Aceite esencial de menta piperita Bio', '30 ml de aceite esencial (Menta)', 100, 8.79, NULL, 'suplementos', NULL, 10, 5.71, NULL, NULL, 0),
(25, 2, 'Yogur de coco natural daily deligth bio', '400 ml', 38, 3.9, 20, 'frescos', '2023-01-03', 10, 2.54, NULL, NULL, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `id_producto` (`id_producto`),
  ADD KEY `cod_prov` (`cod_prov`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cod_prov`) REFERENCES `proveedores` (`cod_prov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
