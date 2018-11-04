/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 5.7.19 : Database - mydb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `mydb`;

/*Table structure for table `carrera` */

DROP TABLE IF EXISTS `carrera`;

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecarrera` varchar(50) DEFAULT NULL,
  `modalidad` varchar(50) DEFAULT NULL,
  `activocarrera` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `carrera` */

insert  into `carrera`(`id_carrera`,`nombrecarrera`,`modalidad`,`activocarrera`) values 
(1,'Sistemas','Anualizado',1);

/*Table structure for table `cuenta` */

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta` (
  `usuario_id_usuario` int(11) NOT NULL,
  `usuario_persona_id_persona` int(11) NOT NULL,
  `rol_id_rol` int(11) NOT NULL,
  KEY `fk_cuenta_usuario1` (`usuario_id_usuario`,`usuario_persona_id_persona`),
  KEY `fk_cuenta_rol1` (`rol_id_rol`),
  CONSTRAINT `fk_cuenta_rol1` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_usuario1` FOREIGN KEY (`usuario_id_usuario`, `usuario_persona_id_persona`) REFERENCES `usuario` (`id_usuario`, `persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cuenta` */

insert  into `cuenta`(`usuario_id_usuario`,`usuario_persona_id_persona`,`rol_id_rol`) values 
(1,1,1);

/*Table structure for table `documentacion` */

DROP TABLE IF EXISTS `documentacion`;

CREATE TABLE `documentacion` (
  `id_documentacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombredocumento` varchar(100) DEFAULT NULL,
  `activodocumentacion` tinyint(4) DEFAULT NULL,
  `fechaentrega` datetime DEFAULT NULL,
  `respaldo` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_documentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `documentacion` */

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `persona_id_persona` int(11) NOT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `activoempleado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`,`persona_id_persona`),
  KEY `fk_empleado_persona1` (`persona_id_persona`),
  CONSTRAINT `fk_empleado_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `empleado` */

insert  into `empleado`(`id_empleado`,`persona_id_persona`,`cargo`,`activoempleado`) values 
(1,3,'Tutor',1);

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombreempresa` varchar(50) DEFAULT NULL,
  `direccionempresa` varchar(100) DEFAULT NULL,
  `telefonoempresa` int(11) DEFAULT NULL,
  `activoempresa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `empresa` */

insert  into `empresa`(`id_empresa`,`nombreempresa`,`direccionempresa`,`telefonoempresa`,`activoempresa`) values 
(1,'Comteco','Calle La Paz',34534534,'1');

/*Table structure for table `entrega` */

DROP TABLE IF EXISTS `entrega`;

CREATE TABLE `entrega` (
  `pasantia_id_pasantia` int(11) NOT NULL,
  `documentacion_id_documentacion` int(11) NOT NULL,
  KEY `fk_entrega_pasantia1` (`pasantia_id_pasantia`),
  KEY `fk_entrega_documentacion1` (`documentacion_id_documentacion`),
  CONSTRAINT `fk_entrega_documentacion1` FOREIGN KEY (`documentacion_id_documentacion`) REFERENCES `documentacion` (`id_documentacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entrega_pasantia1` FOREIGN KEY (`pasantia_id_pasantia`) REFERENCES `pasantia` (`id_pasantia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `entrega` */

/*Table structure for table `estudia` */

DROP TABLE IF EXISTS `estudia`;

CREATE TABLE `estudia` (
  `estudiante_id_estudiante` int(11) NOT NULL,
  `estudiante_persona_id_persona` int(11) NOT NULL,
  `carrera_id_carrera` int(11) NOT NULL,
  KEY `fk_estudia_estudiante1` (`estudiante_id_estudiante`,`estudiante_persona_id_persona`),
  KEY `fk_estudia_carrera1` (`carrera_id_carrera`),
  CONSTRAINT `fk_estudia_carrera1` FOREIGN KEY (`carrera_id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudia_estudiante1` FOREIGN KEY (`estudiante_id_estudiante`, `estudiante_persona_id_persona`) REFERENCES `estudiante` (`id_estudiante`, `persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `estudia` */

/*Table structure for table `estudiante` */

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `activoestudiante` tinyint(4) DEFAULT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_estudiante`,`persona_id_persona`),
  KEY `fk_estudiante_persona1` (`persona_id_persona`),
  CONSTRAINT `fk_estudiante_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `estudiante` */

insert  into `estudiante`(`id_estudiante`,`activoestudiante`,`persona_id_persona`) values 
(1,1,2);

/*Table structure for table `funcionalidad` */

DROP TABLE IF EXISTS `funcionalidad`;

CREATE TABLE `funcionalidad` (
  `id_funcionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombrefuncionalidad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_funcionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `funcionalidad` */

insert  into `funcionalidad`(`id_funcionalidad`,`nombrefuncionalidad`) values 
(1,'crear/editar'),
(2,'visualizar'),
(3,'todo');

/*Table structure for table `nesecita` */

DROP TABLE IF EXISTS `nesecita`;

CREATE TABLE `nesecita` (
  `pasantia_id_pasantia` int(11) NOT NULL,
  `requisitos_id_requisitos` int(11) NOT NULL,
  KEY `fk_nesecita_pasantia1` (`pasantia_id_pasantia`),
  KEY `fk_nesecita_requisitos1` (`requisitos_id_requisitos`),
  CONSTRAINT `fk_nesecita_pasantia1` FOREIGN KEY (`pasantia_id_pasantia`) REFERENCES `pasantia` (`id_pasantia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_nesecita_requisitos1` FOREIGN KEY (`requisitos_id_requisitos`) REFERENCES `requisitos` (`id_requisitos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `nesecita` */

/*Table structure for table `nota` */

DROP TABLE IF EXISTS `nota`;

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `notasupervisor` float DEFAULT NULL,
  `nota` float DEFAULT NULL,
  `notafinal` float DEFAULT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `nota` */

/*Table structure for table `pasantia` */

DROP TABLE IF EXISTS `pasantia`;

CREATE TABLE `pasantia` (
  `id_pasantia` int(11) NOT NULL AUTO_INCREMENT,
  `numpasantia` int(4) DEFAULT NULL,
  `estudiante_id_estudiante` int(11) NOT NULL,
  `estudiante_persona_id_persona` int(11) NOT NULL,
  `empresa_id_empresa` int(11) NOT NULL,
  `fechainicio` timestamp NULL DEFAULT NULL,
  `empleado_id_empleado` int(11) NOT NULL,
  `empleado_persona_id_persona` int(11) NOT NULL,
  `fechafin` datetime DEFAULT NULL,
  `gestion` year(4) DEFAULT NULL,
  `anexo` varchar(50) DEFAULT NULL,
  `nota_id_nota` int(11) NOT NULL,
  `estadopasantia` int(4) DEFAULT NULL,
  `activopasantia` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_pasantia`),
  KEY `fk_pasantia_estudiante1` (`estudiante_id_estudiante`,`estudiante_persona_id_persona`),
  KEY `fk_pasantia_empresa1` (`empresa_id_empresa`),
  KEY `fk_pasantia_empleado1` (`empleado_id_empleado`,`empleado_persona_id_persona`),
  KEY `fk_pasantia_nota1` (`nota_id_nota`),
  CONSTRAINT `fk_pasantia_empleado1` FOREIGN KEY (`empleado_id_empleado`, `empleado_persona_id_persona`) REFERENCES `empleado` (`id_empleado`, `persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_empresa1` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_estudiante1` FOREIGN KEY (`estudiante_id_estudiante`, `estudiante_persona_id_persona`) REFERENCES `estudiante` (`id_estudiante`, `persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_nota1` FOREIGN KEY (`nota_id_nota`) REFERENCES `nota` (`id_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `pasantia` */

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `papellido` varchar(50) DEFAULT NULL,
  `sapellido` varchar(50) DEFAULT NULL,
  `ci` varchar(10) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_persona`),
  KEY `fk_persona_rol` (`rol`),
  CONSTRAINT `fk_persona_rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `persona` */

insert  into `persona`(`id_persona`,`nombre`,`papellido`,`sapellido`,`ci`,`telefono`,`direccion`,`email`,`rol`,`activo`) values 
(1,'admin','admin','admin','admin',0,'admin','admin@gmail.com',1,1),
(2,'Roy Franco','Cayo','BartolomÃ©','12393413',68141732,'00591','bartito24@gmail.com',3,1),
(3,'erick angel','tibubay','QuecaÃ±a','23242323',45673456,'Av. siles','tibu@gmail.com',2,1),
(4,' ',' ','a','1',1,' ','1@1.c',1,1);

/*Table structure for table `privilegios` */

DROP TABLE IF EXISTS `privilegios`;

CREATE TABLE `privilegios` (
  `rol_id_rol` int(11) NOT NULL,
  `funcionalidad_id_funcionalidad` int(11) NOT NULL,
  KEY `fk_privilegios_rol1` (`rol_id_rol`),
  KEY `fk_privilegios_funcionalidad1` (`funcionalidad_id_funcionalidad`),
  CONSTRAINT `fk_privilegios_funcionalidad1` FOREIGN KEY (`funcionalidad_id_funcionalidad`) REFERENCES `funcionalidad` (`id_funcionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_privilegios_rol1` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `privilegios` */

insert  into `privilegios`(`rol_id_rol`,`funcionalidad_id_funcionalidad`) values 
(2,1),
(3,2),
(1,3);

/*Table structure for table `requisitos` */

DROP TABLE IF EXISTS `requisitos`;

CREATE TABLE `requisitos` (
  `id_requisitos` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerequisito` varchar(50) DEFAULT NULL,
  `numpasantia` varchar(45) DEFAULT NULL,
  `descripcionre` varchar(500) DEFAULT NULL,
  `activorequisito` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_requisitos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `requisitos` */

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) DEFAULT NULL,
  `activorol` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `rol` */

insert  into `rol`(`id_rol`,`nombrerol`,`activorol`) values 
(1,'administrador',1),
(2,'personal',1),
(3,'estudiante',1);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `persona_id_persona` int(11) NOT NULL,
  `activousuario` tinyint(4) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`,`persona_id_persona`),
  KEY `fk_usuario_persona1` (`persona_id_persona`),
  CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`usuario`,`clave`,`persona_id_persona`,`activousuario`,`fechacreacion`) values 
(1,'admin@gmail.com','21232f297a57a5a743894a0e4a801fc3',1,1,'2018-09-05 18:49:37'),
(2,'bartito24@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',2,1,'2018-10-15 09:08:39'),
(3,'tibu@gmail.com','81dc9bdb52d04dc20036dbd8313ed055',3,1,'2018-10-15 09:21:10'),
(4,'1@1.c','c4ca4238a0b923820dcc509a6f75849b',4,1,'2018-10-15 10:18:48');

/*Table structure for table `visita` */

DROP TABLE IF EXISTS `visita`;

CREATE TABLE `visita` (
  `id_visita` int(11) NOT NULL AUTO_INCREMENT,
  `pasantia_id_pasantia` int(11) NOT NULL,
  `fechavisita` datetime DEFAULT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `anexovisita` varchar(100) DEFAULT NULL,
  `latitud` varchar(15) DEFAULT NULL,
  `longitud` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_visita`),
  KEY `fk_visita_pasantia1` (`pasantia_id_pasantia`),
  CONSTRAINT `fk_visita_pasantia1` FOREIGN KEY (`pasantia_id_pasantia`) REFERENCES `pasantia` (`id_pasantia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `visita` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
