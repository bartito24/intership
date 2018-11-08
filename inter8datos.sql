-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para inter
DROP DATABASE IF EXISTS `inter`;
CREATE DATABASE IF NOT EXISTS `inter` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inter`;

-- Volcando estructura para tabla inter.asignatura
DROP TABLE IF EXISTS `asignatura`;
CREATE TABLE IF NOT EXISTS `asignatura` (
  `id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombreasignatura` varchar(45) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `descripcionasig` varchar(500) DEFAULT NULL,
  `activoasignatura` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.asignatura: ~0 rows (aproximadamente)
DELETE FROM `asignatura`;
/*!40000 ALTER TABLE `asignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `asignatura` ENABLE KEYS */;

-- Volcando estructura para tabla inter.carrera
DROP TABLE IF EXISTS `carrera`;
CREATE TABLE IF NOT EXISTS `carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecarrera` varchar(45) DEFAULT NULL,
  `modalidad` varchar(45) DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `activocarrera` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.carrera: ~0 rows (aproximadamente)
DELETE FROM `carrera`;
/*!40000 ALTER TABLE `carrera` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrera` ENABLE KEYS */;

-- Volcando estructura para tabla inter.cuadernillo
DROP TABLE IF EXISTS `cuadernillo`;
CREATE TABLE IF NOT EXISTS `cuadernillo` (
  `id_cuadernillo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` date DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `decripcion` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id_cuadernillo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.cuadernillo: ~0 rows (aproximadamente)
DELETE FROM `cuadernillo`;
/*!40000 ALTER TABLE `cuadernillo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuadernillo` ENABLE KEYS */;

-- Volcando estructura para tabla inter.cuenta
DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE IF NOT EXISTS `cuenta` (
  `rol_id_rol` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  KEY `fk_cuenta_rol_idx` (`rol_id_rol`),
  KEY `fk_cuenta_usuario1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_cuenta_rol` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.cuenta: ~0 rows (aproximadamente)
DELETE FROM `cuenta`;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` (`rol_id_rol`, `usuario_id_usuario`) VALUES
	(1, 1);
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;

-- Volcando estructura para tabla inter.documentacion
DROP TABLE IF EXISTS `documentacion`;
CREATE TABLE IF NOT EXISTS `documentacion` (
  `id_documentacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombredoc` varchar(100) DEFAULT NULL,
  `fechaentrega` date DEFAULT NULL,
  `respaldo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_documentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.documentacion: ~0 rows (aproximadamente)
DELETE FROM `documentacion`;
/*!40000 ALTER TABLE `documentacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentacion` ENABLE KEYS */;

-- Volcando estructura para tabla inter.empleado
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(45) DEFAULT NULL,
  `activoempleado` tinyint(4) DEFAULT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_empleado_persona1_idx` (`persona_id_persona`),
  CONSTRAINT `fk_empleado_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.empleado: ~0 rows (aproximadamente)
DELETE FROM `empleado`;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando estructura para tabla inter.empresa
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombreempresa` varchar(45) DEFAULT NULL,
  `direccionempresa` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `nombrerep` varchar(45) DEFAULT NULL,
  `apellidorep` varchar(45) DEFAULT NULL,
  `celular` int(11) DEFAULT NULL,
  `activoempresa` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.empresa: ~0 rows (aproximadamente)
DELETE FROM `empresa`;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Volcando estructura para tabla inter.entrega
DROP TABLE IF EXISTS `entrega`;
CREATE TABLE IF NOT EXISTS `entrega` (
  `documentacion_id_documentacion` int(11) NOT NULL,
  `pasantia_id_pasantia` int(11) NOT NULL,
  KEY `fk_entrega_documentacion1_idx` (`documentacion_id_documentacion`),
  KEY `fk_entrega_pasantia1_idx` (`pasantia_id_pasantia`),
  CONSTRAINT `fk_entrega_documentacion1` FOREIGN KEY (`documentacion_id_documentacion`) REFERENCES `documentacion` (`id_documentacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entrega_pasantia1` FOREIGN KEY (`pasantia_id_pasantia`) REFERENCES `pasantia` (`id_pasantia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.entrega: ~0 rows (aproximadamente)
DELETE FROM `entrega`;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;

-- Volcando estructura para tabla inter.estudia
DROP TABLE IF EXISTS `estudia`;
CREATE TABLE IF NOT EXISTS `estudia` (
  `estudiante_id_estudiante` int(11) NOT NULL,
  `estudiante_persona_id_persona` int(11) NOT NULL,
  `carrera_id_carrera` int(11) NOT NULL,
  KEY `fk_estudia_estudiante1_idx` (`estudiante_id_estudiante`,`estudiante_persona_id_persona`),
  KEY `fk_estudia_carrera1_idx` (`carrera_id_carrera`),
  CONSTRAINT `fk_estudia_carrera1` FOREIGN KEY (`carrera_id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudia_estudiante1` FOREIGN KEY (`estudiante_id_estudiante`, `estudiante_persona_id_persona`) REFERENCES `estudiante` (`id_estudiante`, `persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.estudia: ~0 rows (aproximadamente)
DELETE FROM `estudia`;
/*!40000 ALTER TABLE `estudia` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudia` ENABLE KEYS */;

-- Volcando estructura para tabla inter.estudiante
DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `activoestudiante` tinyint(4) DEFAULT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_estudiante`,`persona_id_persona`),
  KEY `fk_estudiante_persona1_idx` (`persona_id_persona`),
  CONSTRAINT `fk_estudiante_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.estudiante: ~0 rows (aproximadamente)
DELETE FROM `estudiante`;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;

-- Volcando estructura para tabla inter.funcionalidad
DROP TABLE IF EXISTS `funcionalidad`;
CREATE TABLE IF NOT EXISTS `funcionalidad` (
  `id_funcionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombrefuncionalidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_funcionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.funcionalidad: ~0 rows (aproximadamente)
DELETE FROM `funcionalidad`;
/*!40000 ALTER TABLE `funcionalidad` DISABLE KEYS */;
INSERT INTO `funcionalidad` (`id_funcionalidad`, `nombrefuncionalidad`) VALUES
	(1, 'visualizar'),
	(2, 'crear/editar'),
	(3, 'todo');
/*!40000 ALTER TABLE `funcionalidad` ENABLE KEYS */;

-- Volcando estructura para tabla inter.pasantia
DROP TABLE IF EXISTS `pasantia`;
CREATE TABLE IF NOT EXISTS `pasantia` (
  `id_pasantia` int(11) NOT NULL AUTO_INCREMENT,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `gestion` varchar(15) DEFAULT NULL,
  `docs` varchar(100) DEFAULT NULL,
  `estadopasantia` int(11) DEFAULT NULL,
  `empleado_id_empleado` int(11) NOT NULL,
  `empresa_id_empresa` int(11) NOT NULL,
  `asignatura_id_asignatura` int(11) NOT NULL,
  `area` varchar(45) DEFAULT NULL,
  `funciones` varchar(100) DEFAULT NULL,
  `estudiante_id_estudiante` int(11) NOT NULL,
  `fechavisita` date DEFAULT NULL,
  `observacionvisita` varchar(450) DEFAULT NULL,
  `latitud` float(10,6) DEFAULT NULL,
  `longitud` float(10,6) DEFAULT NULL,
  `notasupervisor` float DEFAULT NULL,
  `notatutor` float DEFAULT NULL,
  `notafinal` float DEFAULT NULL,
  `observacionp` varchar(45) DEFAULT NULL,
  `activopasantia` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_pasantia`),
  KEY `fk_pasantia_empleado1_idx` (`empleado_id_empleado`),
  KEY `fk_pasantia_empresa1_idx` (`empresa_id_empresa`),
  KEY `fk_pasantia_asignatura1_idx` (`asignatura_id_asignatura`),
  KEY `fk_pasantia_estudiante1_idx` (`estudiante_id_estudiante`),
  CONSTRAINT `fk_pasantia_asignatura1` FOREIGN KEY (`asignatura_id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_empleado1` FOREIGN KEY (`empleado_id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_empresa1` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_estudiante1` FOREIGN KEY (`estudiante_id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.pasantia: ~0 rows (aproximadamente)
DELETE FROM `pasantia`;
/*!40000 ALTER TABLE `pasantia` DISABLE KEYS */;
/*!40000 ALTER TABLE `pasantia` ENABLE KEYS */;

-- Volcando estructura para tabla inter.persona
DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `papellido` varchar(45) DEFAULT NULL,
  `sapellido` varchar(45) DEFAULT NULL,
  `ci` varchar(45) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `rol_id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `ci_UNIQUE` (`ci`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_persona_rol1_idx` (`rol_id_rol`),
  CONSTRAINT `fk_persona_rol1` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.persona: ~0 rows (aproximadamente)
DELETE FROM `persona`;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id_persona`, `nombre`, `papellido`, `sapellido`, `ci`, `telefono`, `direccion`, `email`, `activo`, `rol_id_rol`) VALUES
	(1, 'pasantia', 'pasantia', 'pasantia', 'pasantia', 0, 'pasantia', 'pasantia@pasantia.com', 1, 1);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Volcando estructura para tabla inter.privilegios
DROP TABLE IF EXISTS `privilegios`;
CREATE TABLE IF NOT EXISTS `privilegios` (
  `rol_id_rol` int(11) NOT NULL,
  `funcionalidad_id_funcionalidad` int(11) NOT NULL,
  KEY `fk_privilegios_rol1_idx` (`rol_id_rol`),
  KEY `fk_privilegios_funcionalidad1_idx` (`funcionalidad_id_funcionalidad`),
  CONSTRAINT `fk_privilegios_funcionalidad1` FOREIGN KEY (`funcionalidad_id_funcionalidad`) REFERENCES `funcionalidad` (`id_funcionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_privilegios_rol1` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.privilegios: ~0 rows (aproximadamente)
DELETE FROM `privilegios`;
/*!40000 ALTER TABLE `privilegios` DISABLE KEYS */;
INSERT INTO `privilegios` (`rol_id_rol`, `funcionalidad_id_funcionalidad`) VALUES
	(1, 3),
	(2, 2),
	(3, 1);
/*!40000 ALTER TABLE `privilegios` ENABLE KEYS */;

-- Volcando estructura para tabla inter.requisitos
DROP TABLE IF EXISTS `requisitos`;
CREATE TABLE IF NOT EXISTS `requisitos` (
  `id_requisitos` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerequsito` varchar(250) DEFAULT NULL,
  `activorequisito` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_requisitos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.requisitos: ~0 rows (aproximadamente)
DELETE FROM `requisitos`;
/*!40000 ALTER TABLE `requisitos` DISABLE KEYS */;
/*!40000 ALTER TABLE `requisitos` ENABLE KEYS */;

-- Volcando estructura para tabla inter.rol
DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(45) DEFAULT NULL,
  `activorol` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.rol: ~0 rows (aproximadamente)
DELETE FROM `rol`;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id_rol`, `nombrerol`, `activorol`) VALUES
	(1, 'administrador', 1),
	(2, 'personal', 1),
	(3, 'estudiante', 1);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;

-- Volcando estructura para tabla inter.tiene
DROP TABLE IF EXISTS `tiene`;
CREATE TABLE IF NOT EXISTS `tiene` (
  `requisitos_id_requisitos` int(11) NOT NULL,
  `asignatura_id_asignatura` int(11) NOT NULL,
  KEY `fk_tiene_requisitos1_idx` (`requisitos_id_requisitos`),
  KEY `fk_tiene_asignatura1_idx` (`asignatura_id_asignatura`),
  CONSTRAINT `fk_tiene_asignatura1` FOREIGN KEY (`asignatura_id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tiene_requisitos1` FOREIGN KEY (`requisitos_id_requisitos`) REFERENCES `requisitos` (`id_requisitos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.tiene: ~0 rows (aproximadamente)
DELETE FROM `tiene`;
/*!40000 ALTER TABLE `tiene` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiene` ENABLE KEYS */;

-- Volcando estructura para tabla inter.union
DROP TABLE IF EXISTS `union`;
CREATE TABLE IF NOT EXISTS `union` (
  `cuadernillo_id_cuadernillo` int(11) NOT NULL,
  `pasantia_id_pasantia` int(11) NOT NULL,
  KEY `fk_union_cuadernillo1_idx` (`cuadernillo_id_cuadernillo`),
  KEY `fk_union_pasantia1_idx` (`pasantia_id_pasantia`),
  CONSTRAINT `fk_union_cuadernillo1` FOREIGN KEY (`cuadernillo_id_cuadernillo`) REFERENCES `cuadernillo` (`id_cuadernillo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_union_pasantia1` FOREIGN KEY (`pasantia_id_pasantia`) REFERENCES `pasantia` (`id_pasantia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.union: ~0 rows (aproximadamente)
DELETE FROM `union`;
/*!40000 ALTER TABLE `union` DISABLE KEYS */;
/*!40000 ALTER TABLE `union` ENABLE KEYS */;

-- Volcando estructura para tabla inter.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `activousuario` tinyint(4) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`persona_id_persona`),
  KEY `fk_usuario_persona1_idx` (`persona_id_persona`),
  CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla inter.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `activousuario`, `fechacreacion`, `persona_id_persona`) VALUES
	(1, 'pasantia@pasantia.com', '21232f297a57a5a743894a0e4a801fc3', 1, '2018-11-08 17:48:39', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
