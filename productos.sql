-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 20:04:42
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

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
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
  `n_ventas` int(11) DEFAULT 0,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `id_producto` (`id_producto`),
  KEY `cod_prov` (`cod_prov`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4;

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
(25, 2, 'Yogur de coco natural daily deligth bio', '400 ml', 38, 3.9, 20, 'frescos', '2023-01-03', 10, 2.54, NULL, NULL, 0),
(26, 2, 'Pack de yogur de coco natural', '4 unidades de 400g', 118, 14.36, NULL, 'frescos', '2022-12-08', 10, 9.33, NULL, NULL, 0),
(27, 2, 'Yogur de Coco Natural', '368 g', 133, 4.85, 20, 'frescos', '2022-12-18', 10, 3.15, NULL, NULL, 0),
(28, 2, 'Yogur de Coco Natural', '125 ml', 134, 2.05, NULL, 'frescos', '2023-01-03', 10, 1.33, NULL, NULL, 0),
(29, 31, 'Kefir-Bio coco natural', '400 g', 183, 4.29, 20, 'frescos', '2022-12-12', 10, 2.79, NULL, NULL, 0),
(30, 36, 'Flan Proteico Clara de Huevo Crema Catalana', '120 g', 170, 2.28, 20, 'frescos', '2022-12-08', 10, 1.48, NULL, NULL, 0),
(31, 31, 'Biogurt Almendra Nature Bio', '400 g', 94, 2.98, NULL, 'frescos', '2023-01-11', 10, 1.94, NULL, NULL, 0),
(32, 24, 'Chucrut Fresco Bio', '500 g', 48, 2.7, 20, 'frescos', '2023-01-03', 10, 1.76, NULL, NULL, 0),
(33, 43, 'Lonchas veganas sabor Queso original', '200 g', 186, 3.85, NULL, 'frescos', '2023-01-03', 10, 2.5, NULL, NULL, 0),
(34, 12, 'Leche de Cabra Entera Bio', '1 L', 180, 6.16, 20, 'frescos', '2022-12-18', 10, 4, NULL, NULL, 0),
(35, 16, 'Bocados Mediterráneos', '160 g', 85, 5.32, NULL, 'frescos', '2023-01-17', 10, 3.46, NULL, NULL, 0),
(36, 16, 'Bocados Originales', '160 g', 112, 5.32, NULL, 'frescos', '2022-12-07', 10, 3.46, NULL, NULL, 0),
(37, 23, 'Kombucha berryvida frutos rojos', '250 ml', 177, 2.39, NULL, 'frescos', '2022-12-20', 10, 1.55, NULL, NULL, 0),
(38, 43, 'Bloque vegano sabor Queso estilo Griego', '230 g', 151, 4.65, NULL, 'frescos', '2022-12-05', 10, 3.02, NULL, NULL, 0),
(39, 43, 'Crema vegana sabor queso', '200 g de crema', 98, 4.36, NULL, 'frescos', '2023-01-12', 10, 2.83, NULL, NULL, 0),
(40, 42, 'Tempe barra', '500 g', 49, 7.35, NULL, 'frescos', '2023-01-28', 10, 4.78, NULL, NULL, 0),
(41, 42, 'Tempe macerado', '170 g', 42, 4.11, NULL, 'frescos', '2022-12-07', 10, 2.67, NULL, NULL, 0),
(42, 12, 'Kéfir de Cabra', '420 g', 162, 4.43, 20, 'frescos', '2023-01-14', 10, 2.88, NULL, NULL, 0),
(43, 31, 'Biogurt Coco Nature Bio', '400 g', 104, 2.98, NULL, 'frescos', '2023-01-15', 10, 1.94, NULL, NULL, 0),
(44, 43, 'Rallado vegano sabor Mozzarella', '500 g', 94, 8.2, NULL, 'frescos', '2023-01-09', 10, 5.33, NULL, NULL, 0),
(45, 23, 'Kombucha gingervida jengibre y limón', '750 ml', 184, 8.63, 20, 'frescos', '2023-01-15', 10, 5.61, NULL, NULL, 0),
(46, 11, 'Bacon lonchas Eco', '1 unidad de 100g aprox.', 116, 3.33, NULL, 'frescos', '2022-12-22', 10, 2.16, NULL, NULL, 0),
(47, 36, 'Flan Proteico Clara de Huevo Galleta María', '120 g', 106, 2.28, 20, 'frescos', '2023-01-21', 10, 1.48, NULL, NULL, 0),
(48, 2, 'Yogur de Coco estilo Griego Bio', '350 g', 197, 4.44, 20, 'frescos', '2022-12-10', 10, 2.89, NULL, NULL, 0),
(49, 32, 'Pack bebida de avena Bio', '6 unidades de 1L', 81, 9.3, NULL, 'alimentacion', '2022-12-09', 10, 6.05, NULL, NULL, 0),
(50, 32, 'Vinagre de manzana sin filtrar Bio', '750 ml', 85, 4.2, NULL, 'alimentacion', '2023-01-13', 10, 2.73, NULL, NULL, 0),
(51, 32, 'Kombucha Original Bio', '500 ml', 179, 4.45, NULL, 'alimentacion', '2023-01-04', 10, 2.89, NULL, NULL, 0),
(52, 32, 'Tostadas de yuca ecológicas', '180 g', 83, 3.7, NULL, 'alimentacion', '2023-01-26', 10, 2.41, NULL, NULL, 0),
(53, 32, 'Fusilli de trigo sarraceno Bio', '500 g', 24, 4.65, NULL, 'alimentacion', '2023-01-17', 10, 3.02, NULL, NULL, 0),
(54, 32, 'Crema proteica de avellana y cacao', '250 g', 98, 8, NULL, 'alimentacion', '2022-12-05', 10, 5.2, NULL, NULL, 0),
(55, 32, 'Kombucha frutos rojos Bio', '500 ml', 149, 4.45, NULL, 'alimentacion', '2022-12-08', 10, 2.89, NULL, NULL, 0),
(56, 32, 'Bebida de avena Bio', '1 L', 175, 1.76, NULL, 'alimentacion', '2023-01-28', 10, 1.14, NULL, NULL, 0),
(57, 32, 'Leche de coco Bio', '200 ml', 55, 1.95, NULL, 'alimentacion', '2023-01-04', 10, 1.27, NULL, NULL, 0),
(58, 32, 'Harina de arroz integral sin gluten Bio', '1 kg', 14, 5.3, NULL, 'alimentacion', '2022-12-23', 10, 3.44, NULL, NULL, 0),
(59, 32, 'Harina de avena integral sin gluten Bio', '1 kg', 191, 5.85, NULL, 'alimentacion', '2023-01-30', 10, 3.8, NULL, NULL, 0),
(60, 32, 'Sardinas en aceite de oliva virgen extra Bio', '190 g', 180, 6.2, NULL, 'alimentacion', '2023-01-26', 10, 4.03, NULL, NULL, 0),
(61, 32, 'Caballa en aceite de oliva virgen extra Bio', '190 g', 169, 6.2, NULL, 'alimentacion', '2022-12-14', 10, 4.03, NULL, NULL, 0),
(62, 32, 'Zumo de manzana natural', '1 L', 10, 2.39, NULL, 'alimentacion', '2023-01-20', 10, 1.55, NULL, NULL, 0),
(63, 32, 'Harina de coco sin gluten Bio', '1 kg', 36, 5.9, NULL, 'alimentacion', '2022-12-09', 10, 3.84, NULL, NULL, 0),
(64, 32, 'Eritritol', '500 g', 69, 8.15, NULL, 'alimentacion', '2022-12-13', 10, 5.3, NULL, NULL, 0),
(65, 32, 'Pack Pan proteico', '2 unidades', 54, 11.4, NULL, 'alimentacion', '2023-01-06', 10, 7.41, NULL, NULL, 0),
(66, 32, 'Ghee mantequilla clarificada Bio', '850 g', 85, 25.85, NULL, 'alimentacion', '2022-12-02', 10, 16.8, NULL, NULL, 0),
(67, 32, 'Arroz de konjac', '400 g', 188, 3.75, NULL, 'alimentacion', '2022-12-26', 10, 2.44, NULL, NULL, 0),
(68, 32, 'Harina de almendra extrafina', '1 kg', 114, 14, NULL, 'alimentacion', '2022-12-17', 10, 9.1, NULL, NULL, 0),
(69, 32, 'Kombucha jengibre-limón Bio', '500 ml', 30, 4.45, NULL, 'alimentacion', '2022-12-12', 10, 2.89, NULL, NULL, 0),
(70, 32, 'Psyllium en polvo Bio', '400 g de polvo', 96, 14.15, NULL, 'alimentacion', '2023-01-15', 10, 9.2, NULL, NULL, 0),
(71, 32, 'Pan de trigo sarraceno integral bio sin gluten', '370 g', 196, 5.8, NULL, 'alimentacion', '2023-01-19', 10, 3.77, NULL, NULL, 0),
(72, 32, 'Bases para pizza de trigo sarraceno bio sin gluten', '2 unidades', 59, 6.45, NULL, 'alimentacion', '2023-01-02', 10, 4.19, NULL, NULL, 0),
(73, 32, 'Aceite vegetal de jojoba primera presión en frío Bio', '100 ml de aceite', 111, 8.91, NULL, 'cosmetica-e-higiene', NULL, 10, 5.79, NULL, NULL, 0),
(74, 14, 'Fisiocrem Gel Active', '60 ml de gel', 193, 9.95, NULL, 'cosmetica-e-higiene', NULL, 10, 6.47, NULL, NULL, 0),
(75, 32, 'Sérum ácido hialurónico', '30 ml de sérum', 187, 12.92, NULL, 'cosmetica-e-higiene', NULL, 10, 8.4, NULL, NULL, 0),
(76, 14, 'Fisiocrem Gel Active', '250 ml de gel', 180, 25.75, NULL, 'cosmetica-e-higiene', NULL, 10, 16.74, NULL, NULL, 0),
(77, 32, 'Aceite vegetal de rosa mosqueta', '60 ml de aceite', 57, 9.38, NULL, 'cosmetica-e-higiene', NULL, 10, 6.1, NULL, NULL, 0),
(78, 14, 'Spray Fisiocrem', '150 ml', 59, 11.95, NULL, 'cosmetica-e-higiene', NULL, 10, 7.77, NULL, NULL, 0),
(79, 14, 'Fisiocrem Cannabis', '60 ml de crema', 158, 15.05, NULL, 'cosmetica-e-higiene', NULL, 10, 9.78, NULL, NULL, 0),
(80, 32, 'Champú árbol de té y romero', '450 ml', 70, 8.96, NULL, 'cosmetica-e-higiene', NULL, 10, 5.82, NULL, NULL, 0),
(81, 14, 'Fisiocrem Cannabis', '200 ml de crema', 121, 40.45, NULL, 'cosmetica-e-higiene', NULL, 10, 26.29, NULL, NULL, 0),
(82, 14, 'Fisiocrem Golpix roll-on golpes', '15 ml', 181, 8.95, NULL, 'cosmetica-e-higiene', NULL, 10, 5.82, NULL, NULL, 0),
(83, 14, 'Duplo Fisiocrem Gel Active 2Şud 40% dto', '2 unidades de 600ml', 169, 88.3, NULL, 'cosmetica-e-higiene', NULL, 10, 57.39, NULL, NULL, 0),
(84, 32, 'Jabón de manos lavanda', '500 ml', 22, 3.98, NULL, 'cosmetica-e-higiene', NULL, 10, 2.59, NULL, NULL, 0),
(85, 33, 'Gua-Sha', '1 unidad', 84, 23.95, NULL, 'cosmetica-e-higiene', NULL, 10, 15.57, NULL, NULL, 0),
(86, 14, 'Fisiocrem Parche Active', '4 unidades', 88, 14.85, NULL, 'cosmetica-e-higiene', NULL, 10, 9.65, NULL, NULL, 0),
(87, 8, 'Cepillo De Dientes De Bambú', '1 unidad', 25, 3.1, NULL, 'cosmetica-e-higiene', NULL, 10, 2.02, NULL, NULL, 0),
(88, 29, 'Jabón de Alepo', '200 g', 53, 5.2, NULL, 'cosmetica-e-higiene', NULL, 10, 3.38, NULL, NULL, 0),
(89, 17, 'Crema Dental De Sal', '100 g', 119, 3.3, NULL, 'cosmetica-e-higiene', NULL, 10, 2.14, NULL, NULL, 0),
(90, 21, 'Raspador de Lengua Cobre Natural', '1 unidad', 69, 9.44, 20, 'cosmetica-e-higiene', NULL, 10, 6.14, NULL, NULL, 0),
(91, 27, 'Mascarilla FFP2 Sin Válvula', '1 unidad', 68, 1.95, NULL, 'cosmetica-e-higiene', NULL, 10, 1.27, NULL, NULL, 0),
(92, 30, 'Dentífrico para niños', '50 ml (Fresa)', 84, 3.71, 20, 'cosmetica-e-higiene', NULL, 10, 2.41, NULL, NULL, 0),
(93, 30, 'Dentífrico blanqueador Menta Bio & Carbón activo', '75 ml', 156, 4.1, NULL, 'cosmetica-e-higiene', NULL, 10, 2.66, NULL, NULL, 0),
(94, 30, 'Dentífrico extra fresco Equinácea & Menta Bio', '75 ml', 122, 3.25, NULL, 'cosmetica-e-higiene', NULL, 10, 2.11, NULL, NULL, 0),
(95, 5, 'Jabón Natural de Coco Puro', '240 g', 84, 4, NULL, 'cosmetica-e-higiene', NULL, 10, 2.6, NULL, NULL, 0),
(96, 37, 'Henna color Cobre natural', '100 g', 184, 4.1, NULL, 'cosmetica-e-higiene', NULL, 10, 2.66, NULL, NULL, 0),
(97, 39, 'Toallitas Infantiles Biodegradables BabyZero', '80 unidades', 200, 3.05, NULL, 'mama-y-bebe', NULL, 10, 1.98, NULL, NULL, 0),
(98, 40, 'Bolsita de Fresa y Plátano Ecológico 6m+', '100 g', 140, 1.19, NULL, 'mama-y-bebe', NULL, 10, 0.77, NULL, NULL, 0),
(99, 34, 'Toallitas Húmedas', '80 unidades', 194, 5.06, 20, 'mama-y-bebe', NULL, 10, 3.29, NULL, NULL, 0),
(100, 45, 'Champú y gel de ducha de caléndula Bebé', '200 ml de gel', 82, 10.25, NULL, 'mama-y-bebe', NULL, 10, 6.66, NULL, NULL, 0),
(101, 34, 'Pañales Bio T4 (7-18 kg)', '40 unidades', 166, 18, NULL, 'mama-y-bebe', NULL, 10, 11.7, NULL, NULL, 0),
(102, 7, 'Multi Natal Activo', '60 tabletas', 17, 29.95, NULL, 'mama-y-bebe', NULL, 10, 19.47, NULL, NULL, 0),
(103, 18, 'Leche infantil de cabra', '800 g de polvo', 67, 28.09, NULL, 'mama-y-bebe', NULL, 10, 18.26, NULL, NULL, 0),
(104, 28, 'Toallitas Bebé Moltex Pure & Nature', '60 unidades', 194, 3.78, 20, 'mama-y-bebe', NULL, 10, 2.46, NULL, NULL, 0),
(105, 3, 'Aquilea Kids própolis', '150 ml', 157, 9.65, NULL, 'mama-y-bebe', NULL, 10, 6.27, NULL, NULL, 0),
(106, 45, 'Crema Pañal de Caléndula', '75 ml de crema', 61, 8.95, NULL, 'mama-y-bebe', NULL, 10, 5.82, NULL, NULL, 0),
(107, 18, 'Snacks crujientes de mijo Bio', '25 g', 103, 1.62, 20, 'mama-y-bebe', NULL, 10, 1.05, NULL, NULL, 0),
(108, 34, 'Pañales Bio T5 (12-25 kg)', '36 unidades (T5 (12-25 kg))', 28, 18, NULL, 'mama-y-bebe', NULL, 10, 11.7, NULL, NULL, 0),
(109, 4, 'Pañales T4 (7-14 Kg) ECO', '48 unidades', 149, 17.95, NULL, 'mama-y-bebe', NULL, 10, 11.67, NULL, NULL, 0),
(110, 1, 'Grintuss pediatric jarabe', '180 g', 82, 13.2, NULL, 'mama-y-bebe', NULL, 10, 8.58, NULL, NULL, 0),
(111, 18, 'Bolsita Smoothie de Plátano, Manzana, Mango y Albaricoque', '100 g', 67, 1.92, NULL, 'mama-y-bebe', NULL, 10, 1.25, NULL, NULL, 0),
(112, 44, 'Toallitas bebé waterwipes biodegradable', '60 unidades', 153, 3.9, NULL, 'mama-y-bebe', NULL, 10, 2.54, NULL, NULL, 0),
(113, 28, 'Pañales Moltex Pure & Nature T4 (9-15 kg)', '50 unidades', 190, 28.47, 20, 'mama-y-bebe', NULL, 10, 18.51, NULL, NULL, 0),
(114, 4, 'Toallitas para Bebé', '80 unidades', 149, 2.5, NULL, 'mama-y-bebe', NULL, 10, 1.62, NULL, NULL, 0),
(115, 13, 'Femibion Pronatal 1', '28 comprimidos', 41, 19.99, NULL, 'mama-y-bebe', NULL, 10, 12.99, NULL, NULL, 0),
(116, 40, 'Galletas Infantiles de Espelta con Manzana Eco', '220 g', 96, 5.12, 20, 'mama-y-bebe', NULL, 10, 3.33, NULL, NULL, 0),
(117, 18, 'Mini Tarrito de Carne de Ternera 100%', '125 g', 54, 2.88, NULL, 'mama-y-bebe', NULL, 10, 1.87, NULL, NULL, 0),
(118, 45, 'Crema Facial de Caléndula Bebé', '50 ml', 64, 7.75, NULL, 'mama-y-bebe', NULL, 10, 5.04, NULL, NULL, 0),
(119, 18, 'Bolsita Smoothie de Manzana, Plátano y Pera', '100 g (Plátano - Manzana - Pera)', 56, 1.8, NULL, 'mama-y-bebe', NULL, 10, 1.17, NULL, NULL, 0),
(120, 41, 'Maxi cuadrados de algodón', '80 unidades', 66, 3.85, NULL, 'mama-y-bebe', NULL, 10, 2.5, NULL, NULL, 0),
(121, 25, 'Estropajo Vegetal', '1 unidad', 66, 1, NULL, 'hogar-y-huerto', NULL, 10, 0.65, NULL, NULL, 0),
(122, 35, 'Cuentagotas de 30 ml', '1 unidad', 53, 1.7, NULL, 'hogar-y-huerto', NULL, 10, 1.1, NULL, NULL, 0),
(123, 9, 'Pack Rollos Papel Higiénico Doble Capa Bio', '6 unidades', 37, 3.4, NULL, 'hogar-y-huerto', NULL, 10, 2.21, NULL, NULL, 0),
(124, 15, 'Pastillas Lavavajillas All-in-1 Eco', '30 unidades', 86, 9.11, 20, 'hogar-y-huerto', NULL, 10, 5.92, NULL, NULL, 0),
(125, 38, 'Incienso Padmini Spiritual guide', '8 unidades', 30, 1.1, NULL, 'hogar-y-huerto', NULL, 10, 0.72, NULL, NULL, 0),
(126, 38, 'Incienso Goloka Nagchampa', '16 g', 200, 1.29, NULL, 'hogar-y-huerto', NULL, 10, 0.84, NULL, NULL, 0),
(127, 38, 'Incienso de palo santo', '20 unidades', 12, 1.1, NULL, 'hogar-y-huerto', NULL, 10, 0.72, NULL, NULL, 0),
(128, 38, 'Incienso de ruda', '20 unidades', 61, 1.1, NULL, 'hogar-y-huerto', NULL, 10, 0.72, NULL, NULL, 0),
(129, 38, 'Incienso Nag Champa Original Azul', '15 g', 92, 1.67, NULL, 'hogar-y-huerto', NULL, 10, 1.09, NULL, NULL, 0),
(130, 5, 'Detergente líquido con jabón natural', '5 L', 162, 27.12, 20, 'hogar-y-huerto', NULL, 10, 17.63, NULL, NULL, 0),
(131, 6, 'Detergente enriquecido con jabón', '5 L', 177, 29.68, NULL, 'hogar-y-huerto', NULL, 10, 19.29, NULL, NULL, 0),
(132, 47, 'Percarbonato de Sodio', '1 kg de polvo', 179, 5.75, NULL, 'hogar-y-huerto', NULL, 10, 3.74, NULL, NULL, 0),
(133, 26, 'Bicarbonato sódico', '1 kg', 148, 4.61, NULL, 'hogar-y-huerto', NULL, 10, 3, NULL, NULL, 0),
(134, 22, 'Papel Higiénico Ecológico', '6 unidades', 113, 5.66, 20, 'hogar-y-huerto', NULL, 10, 3.68, NULL, NULL, 0),
(135, 46, 'Lata para Gatos Ciervo', '185 g', 81, 7.02, 20, 'hogar-y-huerto', NULL, 10, 4.56, NULL, NULL, 0),
(136, 20, 'Churu Crema para Gatos de Pollo', '1 unidad', 79, 2.95, NULL, 'hogar-y-huerto', NULL, 10, 1.92, NULL, NULL, 0),
(137, 6, 'Detergente Líquido Eco', '1,5 L', 121, 10, NULL, 'hogar-y-huerto', NULL, 10, 6.5, NULL, NULL, 0),
(138, 19, 'Papel de hornear sin blanquear FSC 19,8mx 33cm', '1 unidad', 28, 5.29, NULL, 'hogar-y-huerto', NULL, 10, 3.44, NULL, NULL, 0),
(139, 6, 'Lavavajillas Eco', '1 L', 140, 6.43, NULL, 'hogar-y-huerto', NULL, 10, 4.18, NULL, NULL, 0),
(140, 22, 'Servilleta Ecológica 1 Capa', '100 unidades', 100, 1.88, 20, 'hogar-y-huerto', NULL, 10, 1.22, NULL, NULL, 0),
(141, 15, 'Detergente hogar multiusos pH -Neutro Eco', '1000 ml', 140, 3.97, 20, 'hogar-y-huerto', NULL, 10, 2.58, NULL, NULL, 0),
(142, 10, 'Suavizante de flor de manzano y almendras Ecover 750 ml', '750 ml', 21, 2.89, NULL, 'hogar-y-huerto', NULL, 10, 1.88, NULL, NULL, 0),
(143, 15, 'Lavavajillas Hipoalergénico Vitamina Eco', '750 ml', 102, 3.58, 20, 'hogar-y-huerto', NULL, 10, 2.33, NULL, NULL, 0);

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
