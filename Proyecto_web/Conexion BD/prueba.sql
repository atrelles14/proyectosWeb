-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2023 a las 00:26:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--
CREATE DATABASE IF NOT EXISTS `prueba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prueba`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_apellido` (IN `p_id_user` INT, IN `p_nuevo_apellido` VARCHAR(50))   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejar excepciones SQL
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al actualizar el apellido';
    END;
    -- Iniciar la transacción
    START TRANSACTION;
    UPDATE usuario
    SET Usu_apellido = p_nuevo_apellido
    WHERE Usu_ID = p_id_user;
   
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_email` (IN `p_id_user` INT, IN `p_nuevo_email` VARCHAR(50))   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejar excepciones SQL
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al actualizar el email';
    END;
    -- Iniciar la transacción
    START TRANSACTION;
    UPDATE usuario
    SET Usu_email = p_nuevo_email
    WHERE Usu_ID = p_id_user;
   
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_fecha` (IN `p_id_user` INT, IN `p_nueva_fecha` DATE)   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejar excepciones SQL
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al actualizar LA fecha de nacimiento';
    END;
    -- Iniciar la transacción
    START TRANSACTION;
    UPDATE usuario
    SET Usu_fechacumple = p_nueva_fecha
    WHERE Usu_ID = p_id_user;
   
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_nombre` (IN `p_id_user` INT, IN `p_nuevo_nombre` VARCHAR(50))   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejar excepciones SQL
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al actualizar el nombre';
    END;
    -- Iniciar la transacción
    START TRANSACTION;
    UPDATE usuario
    SET Usu_nombre = p_nuevo_nombre
    WHERE Usu_ID = p_id_user;
   
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_password` (IN `p_id_user` INT, IN `p_nueva_password` VARCHAR(15))   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejar excepciones SQL
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al actualizar la contraseña';
    END;
    -- Iniciar la transacción
    START TRANSACTION;
    UPDATE usuario
    SET Usu_password = p_nueva_password
    WHERE Usu_ID = p_id_user;
   
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_user` (IN `p_id_user` INT, IN `p_nuevo_user` VARCHAR(50))   BEGIN
DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejar excepciones SQL
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al crear el usuario';
    END;
    -- Iniciar la transacción
    START TRANSACTION;
    UPDATE usuario
    SET Usu_user = p_nuevo_user
    WHERE Usu_ID = p_id_user;
   
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Insertar_busqueda` (IN `p_nombre` VARCHAR(50))   BEGIN
    DECLARE cantidad_filas INT;
    DECLARE cancion_existente INT;

    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejar excepciones SQL
        ROLLBACK;
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error al registrar la búsqueda';
    END;

    -- Verificar si la canción ya existe en la tabla
    SELECT COUNT(*) INTO cancion_existente FROM busqueda WHERE Bus_nombre = p_nombre;

    IF cancion_existente = 0 THEN
        -- Obtener la cantidad de filas en la tabla
        SELECT COUNT(*) INTO cantidad_filas FROM busqueda;
        
        IF cantidad_filas < 10 THEN
            INSERT INTO busqueda (Bus_nombre) VALUES (p_nombre);
        ELSE 
            DELETE FROM busqueda ORDER BY Bus_ID LIMIT 1;
            INSERT INTO busqueda (Bus_nombre) VALUES (p_nombre);
        END IF;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busqueda`
--

CREATE TABLE `busqueda` (
  `Bus_ID` int(11) NOT NULL,
  `Bus_nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `busqueda`
--

INSERT INTO `busqueda` (`Bus_ID`, `Bus_nombre`) VALUES
(28, 'Super shy'),
(29, 'Gotta Go Chungha'),
(30, 'Si Tu Amor No Vuelve'),
(31, 'Peek-A-Boo'),
(32, 'Talk Talk Talk'),
(33, 'Perfect Night'),
(34, 'Shadow Seventeen'),
(35, 'INVU'),
(36, 'Lovesick Girls'),
(37, 'Farewall, Neverland');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `Fav_ID` int(11) NOT NULL,
  `Fav_ID_cancion` int(11) DEFAULT NULL,
  `Fav_url` varchar(200) DEFAULT NULL,
  `Fav_nombre_cancion` varchar(200) DEFAULT NULL,
  `Fav_artista_cancion` varchar(100) DEFAULT NULL,
  `Fav_ID_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`Fav_ID`, `Fav_ID_cancion`, `Fav_url`, `Fav_nombre_cancion`, `Fav_artista_cancion`, `Fav_ID_usuario`) VALUES
(28, 8856222, 'https://images.genius.com/89647413510027992f481c07fa5b3031.1000x1000x1.png ', 'Like Crazy', 'Jimin (지민)', 1),
(29, 8661650, 'https://images.genius.com/9cf3a531ebd34bde09a430863ea5ca99.1000x1000x1.jpg ', '네버랜드를 떠나며 (Farewell, Neverland)', 'TOMORROW X TOGETHER', 5),
(30, 9610509, 'https://images.genius.com/c217060fe0bb7c57d6044869cda7aee0.1000x1000x1.jpg ', 'Perfect Night', 'LE SSERAFIM', 5),
(31, 9249219, 'https://images.genius.com/fcd2e5a2ade130083470b2143deafce4.1000x1000x1.png ', 'Super Shy', 'NewJeans (뉴진스)', 5),
(32, 8661650, 'https://images.genius.com/9cf3a531ebd34bde09a430863ea5ca99.1000x1000x1.jpg ', '네버랜드를 떠나며 (Farewell, Neverland)', 'TOMORROW X TOGETHER', 1),
(33, 9610509, 'https://images.genius.com/c217060fe0bb7c57d6044869cda7aee0.1000x1000x1.jpg ', 'Perfect Night', 'LE SSERAFIM', 1),
(34, 8009318, 'https://images.genius.com/2d4bd41fe1f4e593b8294351ed180c06.1000x1000x1.png ', 'Shadow', 'SEVENTEEN (세븐틴)', 1),
(35, 7662944, 'https://images.genius.com/19ed6351954c2b686b79302ae0c1e55c.1000x1000x1.png ', 'INVU', 'TAEYEON (태연)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Usu_ID` int(11) NOT NULL,
  `Usu_user` varchar(50) DEFAULT NULL,
  `Usu_password` varchar(15) DEFAULT NULL,
  `Usu_email` varchar(50) DEFAULT NULL,
  `Usu_nombre` varchar(50) DEFAULT NULL,
  `Usu_apellido` varchar(50) DEFAULT NULL,
  `Usu_fechacumple` date DEFAULT NULL,
  `Usu_tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Usu_ID`, `Usu_user`, `Usu_password`, `Usu_email`, `Usu_nombre`, `Usu_apellido`, `Usu_fechacumple`, `Usu_tipo`) VALUES
(1, 'Gabriela', 'Rito1402', 'gabi@outlook.com', 'Lineth', 'Hernandez', '2002-06-15', 'regular'),
(2, 'Martin', 'abc12345', 'martin@gmail.com', 'Martin', 'Romero', '2023-11-13', 'regular'),
(3, 'Admin1', 'administrador1', 'admin@outlook.com', 'Admin', 'Admin', '2023-11-29', 'admin'),
(4, 'Andres1', '12345abc', 'andres@gmail.com', 'Andres', 'Trelles', '2001-06-14', 'regular'),
(5, 'Eva', 'Rito1406', 'eva@gmail.com', 'Eva', 'Hernandez', '1987-12-27', 'regular');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  ADD PRIMARY KEY (`Bus_ID`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`Fav_ID`),
  ADD KEY `Fav_ID_usuario` (`Fav_ID_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Usu_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `busqueda`
--
ALTER TABLE `busqueda`
  MODIFY `Bus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `Fav_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Usu_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `Fav_ID_usuario` FOREIGN KEY (`Fav_ID_usuario`) REFERENCES `usuario` (`Usu_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
