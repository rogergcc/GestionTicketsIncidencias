-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para gestionincidenciastickets
CREATE DATABASE IF NOT EXISTS `gestionincidenciastickets` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gestionincidenciastickets`;

-- Volcando estructura para tabla gestionincidenciastickets.td_ticketdetalle
CREATE TABLE IF NOT EXISTS `td_ticketdetalle` (
  `tickd_id` int(11) NOT NULL AUTO_INCREMENT,
  `tick_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `tickd_descrip` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`tickd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla gestionincidenciastickets.td_ticketdetalle: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `td_ticketdetalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `td_ticketdetalle` ENABLE KEYS */;

-- Volcando estructura para tabla gestionincidenciastickets.tm_area
CREATE TABLE IF NOT EXISTS `tm_area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_nombre` varchar(50) DEFAULT NULL,
  `piso` smallint(6) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla gestionincidenciastickets.tm_area: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tm_area` DISABLE KEYS */;
INSERT INTO `tm_area` (`area_id`, `area_nombre`, `piso`, `departamento_id`, `estado`) VALUES
	(1, 'AREA_1', 2, 1, NULL),
	(2, 'AREA_2A', 3, 2, NULL),
	(3, 'AREA BBB_3', 4, 3, NULL);
/*!40000 ALTER TABLE `tm_area` ENABLE KEYS */;

-- Volcando estructura para tabla gestionincidenciastickets.tm_categoria
CREATE TABLE IF NOT EXISTS `tm_categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla gestionincidenciastickets.tm_categoria: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tm_categoria` DISABLE KEYS */;
INSERT INTO `tm_categoria` (`cat_id`, `cat_nom`, `est`) VALUES
	(1, 'Hardware', 1),
	(2, 'Software', 1),
	(3, 'Incidencia', 1),
	(4, 'Petición de Servicio', 1),
	(5, 'Area 2', 1),
	(6, 'tttr', 1);
/*!40000 ALTER TABLE `tm_categoria` ENABLE KEYS */;

-- Volcando estructura para tabla gestionincidenciastickets.tm_departamento
CREATE TABLE IF NOT EXISTS `tm_departamento` (
  `departamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1',
  `departamento_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`departamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='4';

-- Volcando datos para la tabla gestionincidenciastickets.tm_departamento: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `tm_departamento` DISABLE KEYS */;
INSERT INTO `tm_departamento` (`departamento_id`, `departamento_nombre`, `estado`, `departamento_descripcion`) VALUES
	(1, 'deee', 1, 'deee3hhh'),
	(2, 'DEPAR_A2', 1, 'DEPARTAMENTO A2'),
	(3, 'DEPAR_B1', 1, 'DEPARTAMENTO B1'),
	(4, 'DEPAR_D4', 1, 'DEPARTAMENTO GGG2'),
	(5, 'DEPX_A3', 2, 'departamento AA3'),
	(6, 'DEPX24', 1, 'DEPARAMENTO 24'),
	(7, 'de444', 1, 'ddd');
/*!40000 ALTER TABLE `tm_departamento` ENABLE KEYS */;

-- Volcando estructura para tabla gestionincidenciastickets.tm_equipo
CREATE TABLE IF NOT EXISTS `tm_equipo` (
  `equipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_bien` varchar(50) NOT NULL DEFAULT '',
  `estado` enum('Activo','Inactivo') DEFAULT 'Activo',
  `marca_id` int(11) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `tipoequipo_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `fecha_adq` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`equipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla gestionincidenciastickets.tm_equipo: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `tm_equipo` DISABLE KEYS */;
INSERT INTO `tm_equipo` (`equipo_id`, `codigo_bien`, `estado`, `marca_id`, `personal_id`, `tipoequipo_id`, `area_id`, `fecha_adq`) VALUES
	(1, 'EQ_A1', 'Activo', 1, 4, 2, 1, '2021-02-25 21:38:33'),
	(2, 'EQ_B23', 'Activo', 2, 3, 3, 2, '2021-02-25 21:38:33'),
	(3, '2', 'Activo', 0, 4, 3, 3, '2021-02-25 22:56:17'),
	(4, 'BSS2', 'Activo', 4, 3, 3, 2, '2021-02-25 22:59:11'),
	(5, 'BB444', 'Activo', 2, 3, 2, 1, '2021-02-25 23:02:19'),
	(6, 'BCSF23', 'Activo', 4, 2, 2, 2, '2021-02-25 23:04:06'),
	(7, 'BVC3111', 'Activo', 2, 2, 2, 2, '2021-02-25 23:07:22'),
	(8, 'QWE1', 'Activo', 3, 1, 3, 2, '2021-02-25 23:08:11'),
	(9, 'QWWW2', 'Activo', 1, 1, 1, 1, '2021-02-25 23:08:51'),
	(10, 'B4', 'Activo', 1, 2, 1, 1, '2021-02-25 23:11:24'),
	(11, 'GW2', 'Activo', 1, 1, 1, 1, '2021-02-25 23:11:59'),
	(12, 'BASAS2', 'Activo', 1, 1, 1, 1, '2021-02-25 23:28:25'),
	(13, 'OKK22', 'Activo', 1, 1, 1, 1, '2021-02-25 23:34:21'),
	(14, 'NNeqq', 'Activo', 1, 1, 1, 1, '2021-02-25 23:39:01'),
	(15, 'BB3', 'Activo', 1, 1, 1, 1, '2021-02-25 23:40:21'),
	(16, 'AAA444', 'Inactivo', 3, 2, 1, 1, '2021-02-25 23:40:56'),
	(17, 'WQ111', 'Activo', 1, 1, 1, 3, '2021-02-25 23:46:06');
/*!40000 ALTER TABLE `tm_equipo` ENABLE KEYS */;

-- Volcando estructura para tabla gestionincidenciastickets.tm_marca
CREATE TABLE IF NOT EXISTS `tm_marca` (
  `marca_id` int(11) NOT NULL AUTO_INCREMENT,
  `marca_nombre` varchar(50) NOT NULL DEFAULT '0',
  `estado` tinyint(4) DEFAULT '1',
  `marca_descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`marca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla gestionincidenciastickets.tm_marca: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tm_marca` DISABLE KEYS */;
INSERT INTO `tm_marca` (`marca_id`, `marca_nombre`, `estado`, `marca_descripcion`) VALUES
	(1, 'MARCA_B2', 1, 'fw'),
	(2, 'MARCAL_L3', 1, NULL),
	(3, 'MARCA_C3', 1, NULL),
	(4, 'MARCA_D4', 1, NULL),
	(5, 'MARCA PPP3', 2, 'PEE2'),
	(6, 'mmu477', 2, 'mu2');
/*!40000 ALTER TABLE `tm_marca` ENABLE KEYS */;

-- Volcando estructura para tabla gestionincidenciastickets.tm_ticket
CREATE TABLE IF NOT EXISTS `tm_ticket` (
  `tick_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `tick_titulo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tick_descrip` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `tick_estado` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  `calificado` tinyint(4) DEFAULT '0',
  `puntuacion` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`tick_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla gestionincidenciastickets.tm_ticket: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tm_ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_ticket` ENABLE KEYS */;

-- Volcando estructura para tabla gestionincidenciastickets.tm_tipoequipo
CREATE TABLE IF NOT EXISTS `tm_tipoequipo` (
  `tipoequipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`tipoequipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla gestionincidenciastickets.tm_tipoequipo: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tm_tipoequipo` DISABLE KEYS */;
INSERT INTO `tm_tipoequipo` (`tipoequipo_id`, `tipo`) VALUES
	(1, 'EQUIPO_X1333'),
	(2, 'EQUIPO_B2'),
	(3, 'EQUIPO_XC');
/*!40000 ALTER TABLE `tm_tipoequipo` ENABLE KEYS */;

-- Volcando estructura para tabla gestionincidenciastickets.tm_usuario
CREATE TABLE IF NOT EXISTS `tm_usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nom` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_ape` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_pass` varchar(29) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla Mantenedor de Usuarios';

-- Volcando datos para la tabla gestionincidenciastickets.tm_usuario: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `tm_usuario` DISABLE KEYS */;
INSERT INTO `tm_usuario` (`usu_id`, `usu_nom`, `usu_ape`, `usu_correo`, `usu_pass`, `rol_id`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
	(1, 'Mario', 'Bross', 'mbross', '1234', 1, '2021-02-04 21:23:22', NULL, NULL, 1),
	(2, 'Jesus', 'Condori', 'admin', '1234', 2, '2021-02-04 21:23:22', NULL, NULL, 1),
	(3, 'Juanito', 'Alimaña', 'cliente1', '1234', 1, '2021-02-04 21:23:22', '0000-00-00 00:00:00', NULL, 1),
	(4, 'PEp', 'GARdiola', 'cliente@gmail.com', '1234', 1, '2021-02-25 22:58:05', NULL, NULL, 1),
	(5, 'Jack', 'Won', 'jackw@gmail.com', '1234', 2, '2021-02-26 01:36:41', NULL, NULL, 1);
/*!40000 ALTER TABLE `tm_usuario` ENABLE KEYS */;

-- Volcando estructura para procedimiento gestionincidenciastickets.sp_d_equipo_01
DELIMITER //
CREATE PROCEDURE `sp_d_equipo_01`(
	IN `xequipo_id` INT
)
BEGIN
	UPDATE tm_equipo 
	SET 
		estado='Inactivo'
		
	where equipo_id=xequipo_id;
END//
DELIMITER ;

-- Volcando estructura para procedimiento gestionincidenciastickets.sp_d_usuario_01
DELIMITER //
CREATE PROCEDURE `sp_d_usuario_01`(IN `xusu_id` INT)
BEGIN
	UPDATE tm_usuario 
	SET 
		est='0',
		fech_elim = now() 
	where usu_id=xusu_id;
END//
DELIMITER ;

-- Volcando estructura para procedimiento gestionincidenciastickets.sp_i_ticketdetalle_01
DELIMITER //
CREATE PROCEDURE `sp_i_ticketdetalle_01`(IN `xtick_id` INT, IN `xusu_id` INT)
BEGIN
	INSERT INTO td_ticketdetalle 
    (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est) 
    VALUES 
    (NULL,xtick_id,xusu_id,'Ticket Cerrado...',now(),'1');
END//
DELIMITER ;

-- Volcando estructura para procedimiento gestionincidenciastickets.sp_l_usuario_01
DELIMITER //
CREATE PROCEDURE `sp_l_usuario_01`()
BEGIN
	SELECT * FROM tm_usuario where est='1';
END//
DELIMITER ;

-- Volcando estructura para procedimiento gestionincidenciastickets.sp_l_usuario_02
DELIMITER //
CREATE PROCEDURE `sp_l_usuario_02`(IN `xusu_id` INT)
BEGIN
	SELECT * FROM tm_usuario where usu_id=xusu_id;
END//
DELIMITER ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
