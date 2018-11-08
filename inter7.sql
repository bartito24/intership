-- MySQL Script generated by MySQL Workbench
-- Thu Nov  8 17:39:17 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema inter
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inter
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inter` DEFAULT CHARACTER SET latin1 ;
USE `inter` ;

-- -----------------------------------------------------
-- Table `inter`.`asignatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`asignatura` (
  `id_asignatura` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreasignatura` VARCHAR(45) NULL DEFAULT NULL,
  `nivel` INT(11) NULL DEFAULT NULL,
  `descripcionasig` VARCHAR(500) NULL DEFAULT NULL,
  `activoasignatura` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_asignatura`))
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`carrera` (
  `id_carrera` INT(11) NOT NULL AUTO_INCREMENT,
  `nombrecarrera` VARCHAR(45) NULL DEFAULT NULL,
  `modalidad` VARCHAR(45) NULL DEFAULT NULL,
  `version` INT(11) NULL DEFAULT NULL,
  `activocarrera` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_carrera`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`cuadernillo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`cuadernillo` (
  `id_cuadernillo` INT(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` DATE NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `decripcion` VARCHAR(10000) NULL DEFAULT NULL,
  PRIMARY KEY (`id_cuadernillo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`rol` (
  `id_rol` INT(11) NOT NULL AUTO_INCREMENT,
  `nombrerol` VARCHAR(45) NULL DEFAULT NULL,
  `activorol` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`persona` (
  `id_persona` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `papellido` VARCHAR(45) NULL DEFAULT NULL,
  `sapellido` VARCHAR(45) NULL DEFAULT NULL,
  `ci` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` INT(11) NULL DEFAULT NULL,
  `direccion` VARCHAR(150) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `activo` TINYINT(4) NULL DEFAULT NULL,
  `rol_id_rol` INT(11) NOT NULL,
  PRIMARY KEY (`id_persona`),
  UNIQUE INDEX `ci_UNIQUE` (`ci` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_persona_rol1_idx` (`rol_id_rol` ASC),
  CONSTRAINT `fk_persona_rol1`
    FOREIGN KEY (`rol_id_rol`)
    REFERENCES `inter`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NULL DEFAULT NULL,
  `clave` VARCHAR(45) NULL DEFAULT NULL,
  `activousuario` TINYINT(4) NULL DEFAULT NULL,
  `fechacreacion` DATETIME NULL DEFAULT NULL,
  `persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`id_usuario`, `persona_id_persona`),
  INDEX `fk_usuario_persona1_idx` (`persona_id_persona` ASC),
  CONSTRAINT `fk_usuario_persona1`
    FOREIGN KEY (`persona_id_persona`)
    REFERENCES `inter`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`cuenta` (
  `rol_id_rol` INT(11) NOT NULL,
  `usuario_id_usuario` INT(11) NOT NULL,
  INDEX `fk_cuenta_rol_idx` (`rol_id_rol` ASC),
  INDEX `fk_cuenta_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_cuenta_rol`
    FOREIGN KEY (`rol_id_rol`)
    REFERENCES `inter`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `inter`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`documentacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`documentacion` (
  `id_documentacion` INT(11) NOT NULL AUTO_INCREMENT,
  `nombredoc` VARCHAR(100) NULL DEFAULT NULL,
  `fechaentrega` DATE NULL DEFAULT NULL,
  `respaldo` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id_documentacion`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`empleado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`empleado` (
  `id_empleado` INT(11) NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(45) NULL DEFAULT NULL,
  `activoempleado` TINYINT(4) NULL DEFAULT NULL,
  `persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  INDEX `fk_empleado_persona1_idx` (`persona_id_persona` ASC),
  CONSTRAINT `fk_empleado_persona1`
    FOREIGN KEY (`persona_id_persona`)
    REFERENCES `inter`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`empresa` (
  `id_empresa` INT(11) NOT NULL AUTO_INCREMENT,
  `nombreempresa` VARCHAR(45) NULL DEFAULT NULL,
  `direccionempresa` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` INT(11) NULL DEFAULT NULL,
  `nombrerep` VARCHAR(45) NULL DEFAULT NULL,
  `apellidorep` VARCHAR(45) NULL DEFAULT NULL,
  `celular` INT(11) NULL DEFAULT NULL,
  `activoempresa` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_empresa`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`estudiante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`estudiante` (
  `id_estudiante` INT(11) NOT NULL AUTO_INCREMENT,
  `activoestudiante` TINYINT(4) NULL DEFAULT NULL,
  `persona_id_persona` INT(11) NOT NULL,
  PRIMARY KEY (`id_estudiante`, `persona_id_persona`),
  INDEX `fk_estudiante_persona1_idx` (`persona_id_persona` ASC),
  CONSTRAINT `fk_estudiante_persona1`
    FOREIGN KEY (`persona_id_persona`)
    REFERENCES `inter`.`persona` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`pasantia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`pasantia` (
  `id_pasantia` INT(11) NOT NULL AUTO_INCREMENT,
  `fechainicio` DATE NULL DEFAULT NULL,
  `fechafin` DATE NULL DEFAULT NULL,
  `gestion` VARCHAR(15) NULL DEFAULT NULL,
  `docs` VARCHAR(100) NULL DEFAULT NULL,
  `estadopasantia` INT(11) NULL DEFAULT NULL,
  `empleado_id_empleado` INT(11) NOT NULL,
  `empresa_id_empresa` INT(11) NOT NULL,
  `asignatura_id_asignatura` INT(11) NOT NULL,
  `area` VARCHAR(45) NULL DEFAULT NULL,
  `funciones` VARCHAR(100) NULL DEFAULT NULL,
  `estudiante_id_estudiante` INT(11) NOT NULL,
  `fechavisita` DATE NULL DEFAULT NULL,
  `observacionvisita` VARCHAR(450) NULL DEFAULT NULL,
  `latitud` FLOAT(10,6) NULL DEFAULT NULL,
  `longitud` FLOAT(10,6) NULL DEFAULT NULL,
  `notasupervisor` FLOAT NULL DEFAULT NULL,
  `notatutor` FLOAT NULL DEFAULT NULL,
  `notafinal` FLOAT NULL DEFAULT NULL,
  `observacionp` VARCHAR(45) NULL DEFAULT NULL,
  `activopasantia` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pasantia`),
  INDEX `fk_pasantia_empleado1_idx` (`empleado_id_empleado` ASC),
  INDEX `fk_pasantia_empresa1_idx` (`empresa_id_empresa` ASC),
  INDEX `fk_pasantia_asignatura1_idx` (`asignatura_id_asignatura` ASC),
  INDEX `fk_pasantia_estudiante1_idx` (`estudiante_id_estudiante` ASC),
  CONSTRAINT `fk_pasantia_asignatura1`
    FOREIGN KEY (`asignatura_id_asignatura`)
    REFERENCES `inter`.`asignatura` (`id_asignatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_empleado1`
    FOREIGN KEY (`empleado_id_empleado`)
    REFERENCES `inter`.`empleado` (`id_empleado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_empresa1`
    FOREIGN KEY (`empresa_id_empresa`)
    REFERENCES `inter`.`empresa` (`id_empresa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pasantia_estudiante1`
    FOREIGN KEY (`estudiante_id_estudiante`)
    REFERENCES `inter`.`estudiante` (`id_estudiante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`entrega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`entrega` (
  `documentacion_id_documentacion` INT(11) NOT NULL,
  `pasantia_id_pasantia` INT(11) NOT NULL,
  INDEX `fk_entrega_documentacion1_idx` (`documentacion_id_documentacion` ASC),
  INDEX `fk_entrega_pasantia1_idx` (`pasantia_id_pasantia` ASC),
  CONSTRAINT `fk_entrega_documentacion1`
    FOREIGN KEY (`documentacion_id_documentacion`)
    REFERENCES `inter`.`documentacion` (`id_documentacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entrega_pasantia1`
    FOREIGN KEY (`pasantia_id_pasantia`)
    REFERENCES `inter`.`pasantia` (`id_pasantia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`estudia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`estudia` (
  `estudiante_id_estudiante` INT(11) NOT NULL,
  `estudiante_persona_id_persona` INT(11) NOT NULL,
  `carrera_id_carrera` INT(11) NOT NULL,
  INDEX `fk_estudia_estudiante1_idx` (`estudiante_id_estudiante` ASC, `estudiante_persona_id_persona` ASC),
  INDEX `fk_estudia_carrera1_idx` (`carrera_id_carrera` ASC),
  CONSTRAINT `fk_estudia_carrera1`
    FOREIGN KEY (`carrera_id_carrera`)
    REFERENCES `inter`.`carrera` (`id_carrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estudia_estudiante1`
    FOREIGN KEY (`estudiante_id_estudiante` , `estudiante_persona_id_persona`)
    REFERENCES `inter`.`estudiante` (`id_estudiante` , `persona_id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`funcionalidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`funcionalidad` (
  `id_funcionalidad` INT(11) NOT NULL AUTO_INCREMENT,
  `nombrefuncionalidad` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_funcionalidad`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`privilegios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`privilegios` (
  `rol_id_rol` INT(11) NOT NULL,
  `funcionalidad_id_funcionalidad` INT(11) NOT NULL,
  INDEX `fk_privilegios_rol1_idx` (`rol_id_rol` ASC),
  INDEX `fk_privilegios_funcionalidad1_idx` (`funcionalidad_id_funcionalidad` ASC),
  CONSTRAINT `fk_privilegios_funcionalidad1`
    FOREIGN KEY (`funcionalidad_id_funcionalidad`)
    REFERENCES `inter`.`funcionalidad` (`id_funcionalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_privilegios_rol1`
    FOREIGN KEY (`rol_id_rol`)
    REFERENCES `inter`.`rol` (`id_rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`requisitos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`requisitos` (
  `id_requisitos` INT(11) NOT NULL AUTO_INCREMENT,
  `nombrerequsito` VARCHAR(250) NULL DEFAULT NULL,
  `activorequisito` TINYINT(4) NULL DEFAULT NULL,
  PRIMARY KEY (`id_requisitos`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`tiene`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`tiene` (
  `requisitos_id_requisitos` INT(11) NOT NULL,
  `asignatura_id_asignatura` INT(11) NOT NULL,
  INDEX `fk_tiene_requisitos1_idx` (`requisitos_id_requisitos` ASC),
  INDEX `fk_tiene_asignatura1_idx` (`asignatura_id_asignatura` ASC),
  CONSTRAINT `fk_tiene_asignatura1`
    FOREIGN KEY (`asignatura_id_asignatura`)
    REFERENCES `inter`.`asignatura` (`id_asignatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tiene_requisitos1`
    FOREIGN KEY (`requisitos_id_requisitos`)
    REFERENCES `inter`.`requisitos` (`id_requisitos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `inter`.`union`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inter`.`union` (
  `cuadernillo_id_cuadernillo` INT(11) NOT NULL,
  `pasantia_id_pasantia` INT(11) NOT NULL,
  INDEX `fk_union_cuadernillo1_idx` (`cuadernillo_id_cuadernillo` ASC),
  INDEX `fk_union_pasantia1_idx` (`pasantia_id_pasantia` ASC),
  CONSTRAINT `fk_union_cuadernillo1`
    FOREIGN KEY (`cuadernillo_id_cuadernillo`)
    REFERENCES `inter`.`cuadernillo` (`id_cuadernillo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_union_pasantia1`
    FOREIGN KEY (`pasantia_id_pasantia`)
    REFERENCES `inter`.`pasantia` (`id_pasantia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;