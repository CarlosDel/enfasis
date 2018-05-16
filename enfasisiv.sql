-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2018 a las 17:39:58
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `enfasisiv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `idCalificacion` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `estado_like` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`idCalificacion`, `idUser`, `idVideo`, `categoria`, `calificacion`, `estado_like`) VALUES
(1, 2, 8, '3', 3, 0),
(2, 2, 35, 'practico', 1, 0),
(3, 5, 10, 'teorico', 2, 0),
(4, 10, 87, 'ejercicios', 3, 0),
(5, 10, 64, 'biografias', 4, 0),
(6, 10, 58, 'documentales', 1, 0),
(14, 7, 24, 'practico', 3, 0),
(15, 5, 65, 'biografias', 5, 0),
(16, 5, 47, 'documentales', 3, 0),
(17, 9, 17, 'teorico', 4, 0),
(18, 2, 26, 'practico', 5, 0),
(19, 6, 49, 'documentales', 5, 0),
(20, 3, 26, 'practico', 5, 0),
(21, 3, 26, 'practico', 5, 0),
(22, 3, 26, 'practico', 5, 0),
(23, 3, 26, 'practico', 5, 0),
(24, 3, 26, 'practico', 5, 0),
(25, 3, 26, 'practico', 5, 0),
(26, 3, 26, 'practico', 5, 0),
(27, 3, 30, 'practico', 4, 0),
(28, 3, 30, 'practico', 3, 0),
(29, 3, 26, 'practico', 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emociones`
--

CREATE TABLE `emociones` (
  `idEmocion` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idVideo` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `emocion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `emociones`
--

INSERT INTO `emociones` (`idEmocion`, `idUser`, `idVideo`, `categoria`, `emocion`) VALUES
(1, 2, 11, 'teorico', 'neutral'),
(2, 2, 90, 'ejercicios', 'entretenido'),
(3, 2, 70, 'biografias', 'aburrido'),
(4, 2, 50, 'documentales', 'aburrido'),
(5, 2, 30, 'practico', 'aburrido'),
(6, 2, 10, 'teorico', 'entretenido'),
(7, 2, 12, 'teorico', 'entretenido'),
(8, 2, 1, 'teorico', 'entretenido'),
(9, 2, 1, 'teorico', 'aburrido'),
(10, 2, 2, 'teorico', 'entretenido'),
(11, 2, 2, 'teorico', 'entretenido'),
(12, 2, 2, 'teorico', 'entretenido'),
(13, 2, 2, 'teorico', 'aburrido'),
(14, 2, 2, 'teorico', 'entretenido'),
(15, 2, 2, 'teorico', 'entretenido'),
(16, 2, 2, 'teorico', 'aburrido'),
(17, 2, 2, 'teorico', 'entretenido'),
(18, 2, 2, 'teorico', 'entretenido'),
(19, 3, 2, 'teorico', 'entretenido'),
(20, 3, 2, 'teorico', 'neutral'),
(21, 2, 2, 'teorico', 'neutral'),
(22, 2, 2, 'teorico', 'aburrido'),
(23, 3, 2, 'teorico', 'entretenido'),
(24, 3, 2, 'teorico', 'entretenido'),
(25, 3, 2, 'teorico', 'neutral'),
(26, 2, 5, 'teorico', 'entretenido'),
(27, 2, 5, 'teorico', 'entretenido'),
(28, 3, 2, 'teorico', 'entretenido'),
(29, 3, 5, 'teorico', 'entretenido'),
(30, 2, 2, 'teorico', 'entretenido'),
(31, 3, 2, 'teorico', 'aburrido'),
(32, 2, 2, 'teorico', 'entretenido'),
(33, 2, 4, 'teorico', 'aburrido'),
(34, 3, 3, 'teorico', 'neutral'),
(35, 3, 4, 'teorico', 'aburrido'),
(36, 3, 2, 'teorico', 'entretenido'),
(37, 3, 5, 'teorico', 'entretenido'),
(38, 3, 2, 'teorico', 'neutral'),
(39, 3, 5, 'teorico', 'entretenido'),
(40, 3, 5, 'teorico', 'aburrido'),
(41, 3, 5, 'teorico', 'entretenido'),
(42, 3, 5, 'teorico', 'entretenido'),
(43, 4, 3, 'teorico', 'aburrido'),
(44, 2, 5, 'teorico', 'neutral'),
(45, 2, 3, 'teorico', 'entretenido'),
(46, 3, 4, 'teorico', 'entretenido'),
(47, 3, 5, 'teorico', 'entretenido'),
(48, 2, 5, 'teorico', 'entretenido'),
(49, 2, 5, 'teorico', 'entretenido'),
(50, 2, 5, 'teorico', 'entretenido'),
(51, 3, 8, 'teorico', 'aburrido'),
(52, 3, 49, 'documentales', 'entretenido'),
(53, 3, 89, 'ejercicios', 'entretenido'),
(54, 3, 70, 'biografias', 'neutral'),
(55, 3, 48, 'documentales', 'entretenido'),
(56, 3, 68, 'biografias', 'neutral'),
(57, 3, 28, 'practico', 'entretenido'),
(58, 3, 8, 'teorico', 'aburrido'),
(59, 3, 26, 'practico', 'aburrido'),
(60, 3, 26, 'practico', 'entretenido'),
(61, 3, 49, 'documentales', 'aburrido'),
(62, 3, 49, 'documentales', 'entretenido'),
(63, 3, 49, 'documentales', 'entretenido'),
(64, 3, 88, 'ejercicios', 'entretenido'),
(65, 3, 26, 'practico', 'neutral'),
(66, 3, 26, 'practico', 'neutral'),
(67, 3, 26, 'practico', 'neutral');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUser` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `lastName` varchar(250) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `login`, `password`, `name`, `lastName`, `type`) VALUES
(1, 'andres', '123', 'Andres S', 'Garzon', 'admin'),
(2, 'rvejarano', '123456', 'Ricardo', 'Vejarano', 'user'),
(3, 'jcposso', '123456', 'Juan Camilo', 'Posso', 'user'),
(4, 'nGiron', '123456', 'Nathalia', 'peres', 'user'),
(5, 'Lvallejo', '123456', 'Hanier', 'Vallejo', 'user'),
(6, 'jramos', '123456', 'Jeison', 'Ramos', 'user'),
(7, 'lcadavid', '123456', 'Laura', 'Cadavid', 'user'),
(8, 'jucapo', '123456', 'Juan', 'Posso', 'user'),
(9, 'Amillan', '123456', 'Alejandro', 'Millan', 'user'),
(10, 'nelcy', '123', 'Nelcy', 'Velasco', 'user'),
(12, 'carlos', '123', 'carlos', 'delgado', 'Usuario'),
(13, 'nata', '123', 'Natalia', 'Arteaga', 'Usuario'),
(14, 'pepe ', '123', 'pepito', 'perez', 'Usuario'),
(15, 'carlosandres', '1234', 'asd', 'asd', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `idVideo` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `urlVideo` varchar(250) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `num_like` int(11) NOT NULL,
  `num_dislike` int(11) NOT NULL,
  `palabras_clave` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`idVideo`, `name`, `descripcion`, `categoria`, `urlVideo`, `calificacion`, `num_like`, `num_dislike`, `palabras_clave`) VALUES
(1, '¿Qué Son Las Derivadas?', 'Seguro que has oído hablar de las derivadas y de las funciones o las has estudiado en algún momento. Te explicamos qué son y para qué sirven.', 'teorico', 'quesonderivadas', 0, 0, 0, ''),
(2, 'Derivadas, Regla de Cociente', 'En cálculo se utiliza la regla del cociente para derivadas ya sean derivadas polinómicas o trigonométricas o cualquier otro tipo de derivadas sería de gran utilidad emplear la regla del cociente', 'ejercicios', 'regladecociente', 0, 0, 0, ''),
(3, 'Integral Por Cambio de Variable o Sustitución', 'En este video aprenderás de una forma detallada a resolver la integral trigonométrica por el método de sustitución o también llamado método por cambio de variable. Resolveremos la integral de Sen (5x) de una forma sencilla.', 'ejercicios', 'integraltrigo', 0, 0, 0, ''),
(4, 'Ecuación Diferencial de Variables Separables', 'En este video empezaremos a ver lo que son las ecuaciones diferenciales de variables separables y cómo resolverlas paso a paso, también explicaré lo que se puede hacer con las constantes de integración.', 'ejercicios', 'variablesseparables', 0, 0, 0, ''),
(5, 'Teorema de Nyquist', 'El teorema de muestreo de Nyquist-Shannon, también conocido como teorema de muestreo de Whittaker-Nyquist-Kotelnikov-Shannon, teorema de Nyquist, es un teorema fundamental de la teoría de la información, de especial interés en las telecomunicaciones.', 'teorico', 'teoremanyquis', 0, 0, 0, ''),
(6, '¿Qué es el Ancho de Banda?', 'En nuestro nuevo video le contamos de manera dinámica, rápida y sencilla qué es la banda ancha y cómo funciona.', 'teorico', 'queeselanchodebanda', 0, 0, 0, ''),
(7, 'Asignacion de Direcciones IP.', 'Los administradores de Internet interpretaban las direcciones IP en dos partes, los primeros 8 bits para designar la dirección de red y el resto para individualizar la computadora dentro de la red', 'practico', 'direccionesip', 0, 0, 0, ''),
(8, 'Tutorial Simulink Básico', 'aprende a hacer un diagrama de estados con ganancias, integradores, sumadores, a insertar una señal y a ver una señal', 'practico', 'simulink', 0, 0, 0, ''),
(9, 'Programación de Juegos C++', 'Aprenderemos a crear un juego de naves estilo space invaders en C++ en este serie de 11 video tutoriales de CódigoFacilito', 'practico', 'cmasmas', 0, 0, 0, ''),
(10, 'JavaScript Variables', 'En este tutorial animado aprenderás a declarar\r\n-Variables numéricas\r\n-Variables de texto\r\n-Arrays\r\n', 'practico', 'javascript', 0, 0, 0, ''),
(11, 'Python Introducción al Lenguaje de Programacion', 'Se trata de un lenguaje de programación multiparadigma, ya que soporta orientación a objetos, programación imperativa y, en menor medida, programación funcional. Es un lenguaje interpretado, usa tipado dinámico y es multiplataforma.', 'teorico', 'python', 0, 0, 0, ''),
(12, 'Introducción a AJAX', 'Introducción a Ajax en javascript, algunos de los conceptos basicos que necesitarás para dominar esta tecnica', 'practico', 'ajax', 0, 0, 0, ''),
(13, 'Documental Don Miguel', 'Miguel García fue el rostro de la primera advertencia gráfica de las cajetillas de cigarrillos en Chile en 2006. Él es la muestra más fehaciente de los peligros del tabaco en la salud de la población. Le extirparon la laringe y cuerdas vocales a caus', 'documentales', 'donmiguel', 0, 0, 0, ''),
(14, 'Origen del Universo', 'Existen diversas teorías de como sucedió aquel acontecimiento, el comienzo, el origen del universo pero, sin embargo una teoría la del big bang ha sido una de las mas acertadas y en este corto documental se encuentra, por así decirlo un resumen de ta', 'documentales', 'bigbang', 0, 0, 0, ''),
(15, 'Un Día de Perros', 'Es curioso ver el proceso y variación que ha sufrido esta expresión a lo largo de los siglos, ya que para encontrar su origen hemos de trasladarnos muchísimos siglos atrás; a la época en el que los calendarios eran astronómicos y los pueblos se guiab', 'documentales', 'diadeperros', 0, 0, 0, ''),
(16, 'Fuerza', 'El término evolucionó con los años y de un tiempo caluroso pasó a significar/referirse a cualquier día en el que hace mal tiempo (sobre todo de tormentas) e incluso al hecho de haber tenido un mal día por cualquier motivo sin que éste tenga relación ', 'documentales', 'fuerza', 0, 0, 0, ''),
(17, 'La Parka', 'El corto mexicano es un trabajo del cineasta Gabriel Serra Arguello, que se llevó una Mención Especial del Jurado en el último Festival Documentamadrid.', 'documentales', 'laparka', 0, 0, 0, ''),
(18, 'Operaciones Con Conjuntos', 'Operaciones con conjuntos - reunión, intersección, diferencia y complemento - matemática', 'ejercicios', 'conjuntos', 0, 0, 0, ''),
(19, 'Marie Curie', 'Nació en Varsovia, en lo que entonces era el Zarato de Polonia (territorio administrado por el Imperio ruso). Estudió clandestinamente en la «universidad flotante» de Varsovia y comenzó su formación científica en dicha ciudad. En 1891, a los 24 años,', 'biografias', 'mariecurie', 0, 0, 0, ''),
(20, 'Nikola Tesla', 'Tesla, de etnia serbia, nació en el pueblo de Smiljan (actualmente en Croacia) en el entonces Imperio austrohúngaro y tiempo después se nacionalizaría estadounidense.', 'biografias', 'nikolatesla', 0, 0, 0, ''),
(21, 'Steve Jobs', 'Fundó Apple en 1976 junto con un amigo de la adolescencia, Steve Wozniak, con ayuda del excompañero de Jobs en Atari, Ron Wayne en el garaje de su casa. Aupado por el éxito del Apple II Jobs obtuvo una gran relevancia pública, siendo portada de Time ', 'biografias', 'stevejobs', 0, 0, 0, ''),
(22, 'Albert Einstein', 'En 1905, cuando era un joven físico desconocido, empleado en la Oficina de Patentes de Berna, publicó su teoría de la relatividad especial. En ella incorporó, en un marco teórico simple fundamentado en postulados físicos sencillos, conceptos y fenóme', 'biografias', 'alberteinstein', 0, 0, 0, ''),
(23, 'Stephen Hawking', 'Era miembro de la Real Sociedad de Londres, de la Academia Pontificia de las Ciencias y de la Academia Nacional de Ciencias de Estados Unidos. Fue titular de la Cátedra Lucasiana de Matemáticas (Lucasian Chair of Mathematics) de la Universidad de Cam', 'biografias', 'stephenhaw', 0, 0, 0, ''),
(24, 'Redes Definidas por Software', 'Son un conjunto de técnicas relacionadas con el área de redes computacionales, cuyo objetivo es facilitar la implementación e implantación de servicios de red de una manera determinista, dinámica y escalable', 'teorico', 'SDN60', 0, 0, 0, ''),
(25, 'Integrales Directas con e', 'El método consiste en sustituir el integrando o parte de éste por otra función para que la expresión resultante sea más fácil de integrar. Si escogemos un cambio de variable de modo que al aplicarlo obtenemos en el integrando una función multiplicada', 'ejercicios', 'integraldirectacone', 0, 0, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`idCalificacion`);

--
-- Indices de la tabla `emociones`
--
ALTER TABLE `emociones`
  ADD PRIMARY KEY (`idEmocion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUser`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`idVideo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `emociones`
--
ALTER TABLE `emociones`
  MODIFY `idEmocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
