-- phpMyAdmin SQL Dumpg
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 19:21:00
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
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `importe` float NOT NULL,
  `num_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_gestiona`
--

CREATE TABLE `empleado_gestiona` (
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `accion` set('modificar','eliminar','añadir') DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `cod_prov` int(11) NOT NULL,
  `nom_prov` varchar(255) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`cod_prov`, `nom_prov`, `telefono`, `direccion`) VALUES
(1, 'Aboca', '608635566', 'Cuenca del Puerto, 13605, Camiño Rafael, 6, 7º 7º'),
(2, 'Abbot Kinney\'s', '654764486', 'Miranda de Lemos,72405,Carrer Guzmán, 54, 9º B'),
(3, 'Aquilea', '611984664', 'Deleón del Mirador,24172,Praza Menchaca, 8, 36º B'),
(4, 'Bambo', '625937126', 'Piñeiro del Pozo,67763,Ruela Angela, 0, 0º E'),
(5, 'Beltrán Vital', '698924608', 'Villa Cortés del Vallès,15616,Avenida Molina, 95, 57º 7º'),
(6, 'Biobel', '657330419', 'Vall Negrete,65505,Avenida Vanegas, 6, 03º C'),
(7, 'Bonusan', '642739927', 'Medina del Vallès,76894,Calle Marco, 702, 71º E'),
(8, 'Corpore Sano', '618700824', 'O Casanova del Mirador,14666,Travessera Lola, 2, 77º A'),
(9, 'Dalia', '650699791', 'San Ojeda del Penedès,60097,Paseo Jesús, 0, Ático 6º'),
(10, 'Ecover', '680188064', 'San Valverde,48435,Avenida Anguiano, 831, 37º 7º'),
(11, 'Ecoviand', '604818788', 'Las Rojas de las Torres,88569,Camiño Celia, 02, 1º D'),
(12, 'El Cantero de Letur', '687005423', 'Bermúdez del Barco,76402,Avenida Sanz, 133, 66º B'),
(13, 'Femibion', '678870732', 'As Zapata de Lemos,75115,Carrer Saldivar, 1, Ático 5º'),
(14, 'Fisiocrem', '628524272', 'A Acevedo de Lemos,02708,Travesía Cruz, 60, 4º C'),
(15, 'Frosch', '668270291', 'O Villanueva de Arriba,79454,Ronda Jaramillo, 3, 2º C'),
(16, 'Heura', '675433661', 'Las Llamas de San Pedro,60375,Avenida Sauceda, 11, 0º A'),
(17, 'Himalaya Herbals', '604045241', 'Villarreal del Bages,45144,Ruela Inés, 931, 18º A'),
(18, 'Holle', '695895888', 'El Lorenzo,77728,Ronda Clara, 4, 99º D'),
(19, 'If You Care', '604961645', 'Los Bermúdez del Penedès,58761,Travesía Madrid, 09, 72º B'),
(20, 'Inaba', '686226536', 'Araña del Penedès,04704,Avinguda Laia, 0, 5º B'),
(21, 'Indiaveda', '653592101', 'Las Rendón,60357,Travesía Miguel Ángel, 18, Entre suelo 7º'),
(22, 'Ismax', '607368484', 'As Rocha,65396,Carrer Reyna, 483, 11º C'),
(23, 'Komvida', '644779848', NULL),
(24, 'Kramer', '679226656', NULL),
(25, 'La Corvette', '679031806', NULL),
(26, 'La Droguerie Écologique', '601882434', NULL),
(27, 'Mascarillas', '641653757', NULL),
(28, 'Moltex Pure & Nature', '654396477', NULL),
(29, 'Najel', '606887467', NULL),
(30, 'NaturaBIO Cosmetics', '642557406', NULL),
(31, 'NaturGreen', '610025077', NULL),
(32, 'Naturitas', '605587810', NULL),
(33, 'Ohlistic cosmetics', '674613864', NULL),
(34, 'Pingo', '605754194', NULL),
(35, 'Plantis', '657774998', NULL),
(36, 'PR-OU', '677218774', NULL),
(37, 'Radhe Shyam / Sitarama', '689241572', NULL),
(38, 'SAC', '693847796', NULL),
(39, 'Salustar', '619622399', NULL),
(40, 'Smileat', '665031366', NULL),
(41, 'Tidoo', '638913321', NULL),
(42, 'Vegetalia', '671570769', NULL),
(43, 'Violife', '644758013', NULL),
(44, 'WaterWipes', '694598414', NULL),
(45, 'Weleda', '685951010', NULL),
(46, 'Ziwi Peak', '627961783', NULL),
(47, 'La Droguerie Écopratique', '621877416', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_comp` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tipo` set('cliente','administrador','empleado') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`fecha`,`id_producto`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `empleado_gestiona`
--
ALTER TABLE `empleado_gestiona`
  ADD PRIMARY KEY (`fecha`,`id_usuario`,`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `id_producto` (`id_producto`),
  ADD KEY `cod_prov` (`cod_prov`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`cod_prov`),
  ADD UNIQUE KEY `cod_prov` (`cod_prov`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `direccion` (`direccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `cod_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `empleado_gestiona`
--
ALTER TABLE `empleado_gestiona`
  ADD CONSTRAINT `empleado_gestiona_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `empleado_gestiona_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`cod_prov`) REFERENCES `proveedores` (`cod_prov`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
