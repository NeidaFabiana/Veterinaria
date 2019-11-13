-- MySQL Script generated by MySQL Workbench
-- Tue Nov 12 23:35:15 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------


-- -----------------------------------------------------
-- Table `Consejos`
-- -----------------------------------------------------

CREATE TABLE `Consejos` (
  `idConsejos` INT NOT NULL,
  `Titulo` VARCHAR(45) NULL,
  `Descripcion` VARCHAR(500) NULL,
  `ImgCons` VARCHAR(45) NULL,
  `ImagenCons_idImagenCons` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idConsejos`, `ImagenCons_idImagenCons`, `Usuario_idUsuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Consultas`
-- -----------------------------------------------------
CREATE TABLE `Consultas` (
  `idConsultas` INT NOT NULL,
  `Nombre` VARCHAR(100) NULL,
  `Fecha` DATE NULL,
  `Horario` VARCHAR(45) NULL,
  `Telefono` VARCHAR(45) NULL,
  `Direccion` VARCHAR(80) NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idConsultas`, `Usuario_idUsuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `ImagenCons`
-- -----------------------------------------------------

CREATE TABLE`ImagenCons` (
  `idImagenCons` INT NOT NULL,
  `Nombre` VARCHAR(100) NULL,
  `Imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`idImagenCons`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ImagenNoti`
-- -----------------------------------------------------

CREATE TABLE `ImagenNoti` (
  `idImagenNoti` INT NOT NULL,
  `Nombre` VARCHAR(100) NULL,
  `Imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`idImagenNoti`))
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `ImagenProf`
-- -----------------------------------------------------

CREATE TABLE `ImagenProf` (
  `idImagenProf` INT NOT NULL,
  `Nombre` VARCHAR(100) NULL,
  `Imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`idImagenProf`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ImagenServ`
-- -----------------------------------------------------

CREATE TABLE `ImagenServ` (
  `idImagenServ` INT NOT NULL,
  `Nombre` VARCHAR(100) NULL,
  `Imagen` VARCHAR(45) NULL,
  PRIMARY KEY (`idImagenServ`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `ImagenSlide`
-- -----------------------------------------------------

CREATE TABLE `ImagenSlide` (
  `idImagenSlide` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Imagen` VARCHAR(45) NULL,
  `Slide_idSlide` INT NOT NULL,
  `Slide_Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idImagenSlide`, `Slide_idSlide`, `Slide_Usuario_idUsuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Nosotros`
-- -----------------------------------------------------

CREATE TABLE `Nosotros` (
  `idNosotros` INT NOT NULL,
  `Descripcion` VARCHAR(1000) NULL,
  `Imagen` VARCHAR(45) NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idNosotros`, `Usuario_idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Noticias`
-- -----------------------------------------------------

CREATE TABLE `Noticias` (
  `idNoticias` INT NOT NULL,
  `Titulo` VARCHAR(50) NULL,
  `Descripcion` VARCHAR(500) NULL,
  `ImgNot` VARCHAR(45) NULL,
  `ImagenNoti_idImagenNoti` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idNoticias`, `ImagenNoti_idImagenNoti`, `Usuario_idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Profesionales`
-- -----------------------------------------------------

CREATE TABLE `Profesionales` (
  `idProfesionales` INT NOT NULL,
  `Nombre` VARCHAR(100) NULL,
  `Formacion` VARCHAR(150) NULL,
  `FotoProf` VARCHAR(45) NULL,
  `ImagenProf_idImagenProf` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idProfesionales`, `ImagenProf_idImagenProf`, `Usuario_idUsuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Servicios`
-- -----------------------------------------------------

CREATE TABLE `Servicios` (
  `idServicios` INT NOT NULL,
  `Servicio` VARCHAR(100) NULL,
  `Descripcion` VARCHAR(500) NULL,
  `ImgSer` VARCHAR(45) NULL,
  `ImagenServ_idImagenServ` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idServicios`, `ImagenServ_idImagenServ`, `Usuario_idUsuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Slide`
-- -----------------------------------------------------

CREATE TABLE `Slide` (
  `idSlide` INT NOT NULL,
  `Nombre` VARCHAR(100) NULL,
  `Imagen` VARCHAR(45) NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idSlide`, `Usuario_idUsuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `Usuario` (
  `idUsuario` INT NOT NULL,
  `Email` VARCHAR(100) NULL,
  `Sena` VARCHAR(45) NULL,
  `Contrasena` VARCHAR(45) NULL,
  `FotoUsu` VARCHAR(45) NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
