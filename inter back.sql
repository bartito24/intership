/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 5.7.19 : Database - inter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inter` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inter`;

/*Table structure for table `asignatura` */

DROP TABLE IF EXISTS `asignatura`;

CREATE TABLE `asignatura` (
  `id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombreasignatura` varchar(45) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `descripcionasig` varchar(500) DEFAULT NULL,
  `activoasignatura` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `asignatura` */

insert  into `asignatura`(`id_asignatura`,`nombreasignatura`,`nivel`,`descripcionasig`,`activoasignatura`) values 
(1,'Pasantia',1,'soporte',0),
(2,'Pasantia',2,'desarollo',1),
(3,'Pasantia',3,'desarollo',0);

/*Table structure for table `carrera` */

DROP TABLE IF EXISTS `carrera`;

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecarrera` varchar(45) DEFAULT NULL,
  `modalidad` varchar(45) DEFAULT NULL,
  `version` int(11) DEFAULT NULL,
  `activocarrera` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `carrera` */

insert  into `carrera`(`id_carrera`,`nombrecarrera`,`modalidad`,`version`,`activocarrera`) values 
(1,'Sistemas','Anual',1,1),
(2,'rer','Semestral',1,1);

/*Table structure for table `cuenta` */

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta` (
  `rol_id_rol` int(11) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL,
  KEY `fk_cuenta_rol_idx` (`rol_id_rol`),
  KEY `fk_cuenta_usuario1_idx` (`usuario_id_usuario`),
  CONSTRAINT `fk_cuenta_rol` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cuenta` */

insert  into `cuenta`(`rol_id_rol`,`usuario_id_usuario`) values 
(1,1);

/*Table structure for table `documentacion` */

DROP TABLE IF EXISTS `documentacion`;

CREATE TABLE `documentacion` (
  `id_documentacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombredoc` varchar(100) DEFAULT NULL,
  `fechaentrega` date DEFAULT NULL,
  `respaldo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_documentacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `documentacion` */

/*Table structure for table `empleado` */

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(45) DEFAULT NULL,
  `activoempleado` tinyint(4) DEFAULT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`,`persona_id_persona`),
  KEY `fk_empleado_persona1_idx` (`persona_id_persona`),
  CONSTRAINT `fk_empleado_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `empleado` */

insert  into `empleado`(`id_empleado`,`cargo`,`activoempleado`,`persona_id_persona`) values 
(1,'administrador',1,1),
(2,'Tutor',1,2);

/*Table structure for table `empresa` */

DROP TABLE IF EXISTS `empresa`;

CREATE TABLE `empresa` (
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

/*Data for the table `empresa` */

insert  into `empresa`(`id_empresa`,`nombreempresa`,`direccionempresa`,`telefono`,`nombrerep`,`apellidorep`,`celular`,`activoempresa`) values 
(1,'Comteco','La Paz',2223,'Rosmeri','Santos',60434234,1);

/*Table structure for table `entrega` */

DROP TABLE IF EXISTS `entrega`;

CREATE TABLE `entrega` (
  `documentacion_id_documentacion` int(11) NOT NULL,
  `pasantia_id_pasantia` int(11) NOT NULL,
  KEY `fk_entrega_documentacion1_idx` (`documentacion_id_documentacion`),
  KEY `fk_entrega_pasantia1_idx` (`pasantia_id_pasantia`),
  CONSTRAINT `fk_entrega_documentacion1` FOREIGN KEY (`documentacion_id_documentacion`) REFERENCES `documentacion` (`id_documentacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_entrega_pasantia1` FOREIGN KEY (`pasantia_id_pasantia`) REFERENCES `pasantia` (`id_pasantia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `entrega` */

/*Table structure for table `estudia` */

DROP TABLE IF EXISTS `estudia`;

CREATE TABLE `estudia` (
  `estudiante_id_estudiante` int(11) NOT NULL,
  `estudiante_persona_id_persona` int(11) NOT NULL,
  `carrera_id_carrera` int(11) NOT NULL,
  KEY `fk_estudia_estudiante1_idx` (`estudiante_id_estudiante`,`estudiante_persona_id_persona`),
  KEY `fk_estudia_carrera1_idx` (`carrera_id_carrera`),
  CONSTRAINT `fk_estudia_carrera1` FOREIGN KEY (`carrera_id_carrera`) REFERENCES `carrera` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudia_estudiante1` FOREIGN KEY (`estudiante_id_estudiante`, `estudiante_persona_id_persona`) REFERENCES `estudiante` (`id_estudiante`, `persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `estudia` */

insert  into `estudia`(`estudiante_id_estudiante`,`estudiante_persona_id_persona`,`carrera_id_carrera`) values 
(1,3,1),
(2,4,2);

/*Table structure for table `estudiante` */

DROP TABLE IF EXISTS `estudiante`;

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `activoestudiante` tinyint(4) DEFAULT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_estudiante`,`persona_id_persona`),
  KEY `fk_estudiante_persona1_idx` (`persona_id_persona`),
  CONSTRAINT `fk_estudiante_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `estudiante` */

insert  into `estudiante`(`id_estudiante`,`activoestudiante`,`persona_id_persona`) values 
(1,1,3),
(2,1,4);

/*Table structure for table `funcionalidad` */

DROP TABLE IF EXISTS `funcionalidad`;

CREATE TABLE `funcionalidad` (
  `id_funcionalidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombrefuncionalidad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_funcionalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `funcionalidad` */

insert  into `funcionalidad`(`id_funcionalidad`,`nombrefuncionalidad`) values 
(1,'crear/editar'),
(2,'visualizar'),
(3,'todo');

/*Table structure for table `pasantia` */

DROP TABLE IF EXISTS `pasantia`;

CREATE TABLE `pasantia` (
  `id_pasantia` int(11) NOT NULL AUTO_INCREMENT,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `gestion` varchar(15) DEFAULT NULL,
  `docs` varchar(100) DEFAULT NULL,
  `estadopasantia` int(11) DEFAULT NULL,
  `empleado_id_empleado` int(11) DEFAULT NULL,
  `empleado_persona_id_persona` int(11) DEFAULT NULL,
  `empresa_id_empresa` int(11) DEFAULT NULL,
  `asignatura_id_asignatura` int(11) DEFAULT NULL,
  `area` varchar(45) DEFAULT NULL,
  `funciones` varchar(100) DEFAULT NULL,
  `estudiante_id_estudiante` int(11) DEFAULT NULL,
  `estudiante_persona_id_persona` int(11) DEFAULT NULL,
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
  KEY `fk_pasantia_empleado1_idx` (`empleado_id_empleado`,`empleado_persona_id_persona`),
  KEY `fk_pasantia_empresa1_idx` (`empresa_id_empresa`),
  KEY `fk_pasantia_asignatura1_idx` (`asignatura_id_asignatura`),
  KEY `fk_pasantia_estudiante1_idx` (`estudiante_id_estudiante`,`estudiante_persona_id_persona`),
  CONSTRAINT `fk_pasantia_asignatura1` FOREIGN KEY (`asignatura_id_asignatura`) REFERENCES `asignatura` (`id_asignatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_empleado1` FOREIGN KEY (`empleado_id_empleado`, `empleado_persona_id_persona`) REFERENCES `empleado` (`id_empleado`, `persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_empresa1` FOREIGN KEY (`empresa_id_empresa`) REFERENCES `empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_estudiante1` FOREIGN KEY (`estudiante_id_estudiante`, `estudiante_persona_id_persona`) REFERENCES `estudiante` (`id_estudiante`, `persona_id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `pasantia` */

insert  into `pasantia`(`id_pasantia`,`fechainicio`,`fechafin`,`gestion`,`docs`,`estadopasantia`,`empleado_id_empleado`,`empleado_persona_id_persona`,`empresa_id_empresa`,`asignatura_id_asignatura`,`area`,`funciones`,`estudiante_id_estudiante`,`estudiante_persona_id_persona`,`fechavisita`,`observacionvisita`,`latitud`,`longitud`,`notasupervisor`,`notatutor`,`notafinal`,`observacionp`,`activopasantia`) values 
(3,'2018-11-04','2018-11-04','gestion 2018','docs',1,2,2,1,1,'area','funciones',1,3,'2018-11-04','nada',10.434554,11.354543,51.52,67.52,55.42,'aprobado',1),
(4,'2018-11-05','2018-11-05','gestion 2018','docs',1,2,2,1,1,'area','funciones',1,3,'2018-11-05','nada',0.000000,0.000000,0,0,0,'aprobado',1);

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `persona` */

insert  into `persona`(`id_persona`,`nombre`,`papellido`,`sapellido`,`ci`,`telefono`,`direccion`,`email`,`activo`,`rol_id_rol`) values 
(1,'admin','admin','admin','admin',0,'admin','admin@admin.com',1,1),
(2,'Jhonas','Cayo','Bartolome','1323445',60434323,'Quillacollo','jhonasemanuel1234@gmail.com',1,2),
(3,'Roy Franco','BartolomÃ©','BartolomÃ©','Cochabamba',68141732,'00591','bartito24@gmail.com',1,3),
(4,'jhona','amy','thamez','123233',494948,'Av. oquendo','jhonas12345@gmail.com',1,3);

/*Table structure for table `privilegios` */

DROP TABLE IF EXISTS `privilegios`;

CREATE TABLE `privilegios` (
  `rol_id_rol` int(11) NOT NULL,
  `funcionalidad_id_funcionalidad` int(11) NOT NULL,
  KEY `fk_privilegios_rol1_idx` (`rol_id_rol`),
  KEY `fk_privilegios_funcionalidad1_idx` (`funcionalidad_id_funcionalidad`),
  CONSTRAINT `fk_privilegios_funcionalidad1` FOREIGN KEY (`funcionalidad_id_funcionalidad`) REFERENCES `funcionalidad` (`id_funcionalidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_privilegios_rol1` FOREIGN KEY (`rol_id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `privilegios` */

insert  into `privilegios`(`rol_id_rol`,`funcionalidad_id_funcionalidad`) values 
(2,1),
(3,2),
(1,3);

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(45) DEFAULT NULL,
  `activorol` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `rol` */

insert  into `rol`(`id_rol`,`nombrerol`,`activorol`) values 
(1,'administrador',1),
(2,'personal',1),
(3,'estudiante',1);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `activousuario` tinyint(4) DEFAULT NULL,
  `fechacreacion` datetime DEFAULT NULL,
  `persona_id_persona` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`persona_id_persona`),
  KEY `fk_usuario_persona1_idx` (`persona_id_persona`),
  CONSTRAINT `fk_usuario_persona1` FOREIGN KEY (`persona_id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`id_usuario`,`usuario`,`clave`,`activousuario`,`fechacreacion`,`persona_id_persona`) values 
(1,'admin@admin.com','21232f297a57a5a743894a0e4a801fc3',1,'2018-09-11 12:47:59',1),
(2,'jhonasemanuel1234@gmail.com','21232f297a57a5a743894a0e4a801fc3',1,'2018-11-03 15:57:51',2),
(3,'bartito24@gmail.com','76873b5fd1e84dafae8224353df15525',1,'2018-11-05 03:29:47',3),
(4,'jhonas12345@gmail.com','7761ba01556dc163258836a5b59664f2',1,'2018-11-05 15:14:42',4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
