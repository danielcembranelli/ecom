SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `urocabral` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `urocabral`;

-- -----------------------------------------------------
-- Table `urocabral`.`nratendimento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`nratendimento` (
  `idnratendimento` INT NOT NULL AUTO_INCREMENT ,
  `idPaciente` INT NULL ,
  `idAtendimento` INT NULL ,
  `nrAtendimento` VARCHAR(20) NULL ,
  PRIMARY KEY (`idnratendimento`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`tabelacid`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`tabelacid` (
  `idCid` VARCHAR(10) NOT NULL ,
  `descCid` TEXT NULL ,
  `nrCid` INT NULL ,
  PRIMARY KEY (`idCid`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`prontuario_itens`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`prontuario_itens` (
  `idPi` INT NOT NULL AUTO_INCREMENT ,
  `idProntuario` INT NULL ,
  `idCid` INT NULL ,
  `condutaPi` TEXT NULL ,
  `dtcadPi` DATETIME NULL ,
  PRIMARY KEY (`idPi`) ,
  INDEX `fk_prontuario_itens_tabelacid1` (`idCid` ASC) ,
  CONSTRAINT `fk_prontuario_itens_tabelacid1`
    FOREIGN KEY (`idCid` )
    REFERENCES `urocabral`.`tabelacid` (`idCid` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`atendimento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`atendimento` (
  `idAtendimento` INT NOT NULL AUTO_INCREMENT ,
  `nomeAtendimento` VARCHAR(45) NULL ,
  `dtcadAtendimento` DATETIME NULL ,
  PRIMARY KEY (`idAtendimento`) ,
  INDEX `fk_atendimento_nratendimento1` (`idAtendimento` ASC) ,
  CONSTRAINT `fk_atendimento_nratendimento1`
    FOREIGN KEY (`idAtendimento` )
    REFERENCES `urocabral`.`nratendimento` (`idAtendimento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`prontuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`prontuario` (
  `idProntuario` INT NOT NULL AUTO_INCREMENT ,
  `dtProntuario` DATE NULL ,
  `idAtendimento` INT NULL ,
  `dtretornoProntuario` DATE NULL ,
  `obsProntuario` TEXT NULL ,
  `dtcadProntuario` DATETIME NULL ,
  `idUsuario` INT NULL ,
  PRIMARY KEY (`idProntuario`) ,
  INDEX `fk_prontuario_prontuario_itens1` (`idProntuario` ASC) ,
  INDEX `fk_prontuario_atendimento1` (`idAtendimento` ASC) ,
  CONSTRAINT `fk_prontuario_prontuario_itens1`
    FOREIGN KEY (`idProntuario` )
    REFERENCES `urocabral`.`prontuario_itens` (`idProntuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prontuario_atendimento1`
    FOREIGN KEY (`idAtendimento` )
    REFERENCES `urocabral`.`atendimento` (`idAtendimento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`plano`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`plano` (
  `idPlano` INT NOT NULL AUTO_INCREMENT ,
  `nomePlano` VARCHAR(45) NULL ,
  `descPlano` TEXT NULL ,
  `idOperadora` INT NULL ,
  PRIMARY KEY (`idPlano`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`paciente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`paciente` (
  `idpaciente` INT NOT NULL AUTO_INCREMENT ,
  `idPlano` INT NULL ,
  `nomePaciente` VARCHAR(150) NULL ,
  `cpfPaciente` VARCHAR(11) NULL ,
  `rgPaciente` VARCHAR(10) NULL ,
  `dtnascPaciente` DATE NULL ,
  `profissaoPaciente` VARCHAR(50) NULL ,
  `obsPaciente` TEXT NULL ,
  PRIMARY KEY (`idpaciente`) ,
  INDEX `fk_paciente_nratendimento1` (`idpaciente` ASC) ,
  INDEX `fk_paciente_prontuario1` (`idpaciente` ASC) ,
  INDEX `fk_paciente_plano1` (`idPlano` ASC) ,
  CONSTRAINT `fk_paciente_nratendimento1`
    FOREIGN KEY (`idpaciente` )
    REFERENCES `urocabral`.`nratendimento` (`idPaciente` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_prontuario1`
    FOREIGN KEY (`idpaciente` )
    REFERENCES `urocabral`.`prontuario` (`idAtendimento` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paciente_plano1`
    FOREIGN KEY (`idPlano` )
    REFERENCES `urocabral`.`plano` (`idPlano` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`operadora`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`operadora` (
  `idOperadora` INT NOT NULL AUTO_INCREMENT ,
  `nomeOperadora` VARCHAR(45) NULL ,
  PRIMARY KEY (`idOperadora`) ,
  INDEX `fk_operadora_plano` (`idOperadora` ASC) ,
  CONSTRAINT `fk_operadora_plano`
    FOREIGN KEY (`idOperadora` )
    REFERENCES `urocabral`.`plano` (`idOperadora` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `nomeUsuario` VARCHAR(40) NULL ,
  `emailUsuario` VARCHAR(145) NULL ,
  `celUsuario` VARCHAR(10) NULL ,
  `typeUsuario` CHAR NULL ,
  `loginUsuario` VARCHAR(20) NULL ,
  `senhaUsuario` VARCHAR(15) NULL ,
  `nracessoUsuario` INT NULL ,
  `dtacessoUsuario` DATETIME NULL ,
  `dtacessoantUsuario` DATETIME NULL ,
  PRIMARY KEY (`idUsuario`) ,
  INDEX `fk_usuario_prontuario1` (`idUsuario` ASC) ,
  CONSTRAINT `fk_usuario_prontuario1`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `urocabral`.`prontuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `urocabral`.`endereco`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`endereco` (
  `idEnd` INT NOT NULL AUTO_INCREMENT ,
  `typeEnd` CHAR(1) NULL ,
  `cidEnd` INT NULL ,
  `cepEnd` VARCHAR(9) NULL ,
  `logradouro` VARCHAR(150) NULL ,
  `nrEnd` VARCHAR(45) NULL ,
  `complEnd` VARCHAR(45) NULL ,
  `bairroEnd` VARCHAR(60) NULL ,
  `cidadeEnd` VARCHAR(45) NULL ,
  `ufEnd` VARCHAR(2) NULL ,
  PRIMARY KEY (`idEnd`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`contato`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`contato` (
  `idContato` INT NOT NULL ,
  `typeContato` CHAR NULL ,
  `cid` INT NULL ,
  `nomeContato` VARCHAR(45) NULL ,
  `idLabel` INT NULL ,
  `nrContato` VARCHAR(10) NULL ,
  PRIMARY KEY (`idContato`) )
ENGINE = MyISAM
COMMENT = '		';


-- -----------------------------------------------------
-- Table `urocabral`.`agenda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`agenda` (
  `idAgenda` INT NOT NULL AUTO_INCREMENT ,
  `dtAgenda` DATE NULL ,
  `idTipoagenda` INT NULL ,
  `obs` TEXT NULL ,
  `dtcadAgenda` DATETIME NULL ,
  `uscadAgenda` INT NULL ,
  `idPaciene` INT NULL ,
  PRIMARY KEY (`idAgenda`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `urocabral`.`tipoagenda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `urocabral`.`tipoagenda` (
  `idTipoagenda` INT NOT NULL ,
  `labelTipoagenda` VARCHAR(60) NULL ,
  PRIMARY KEY (`idTipoagenda`) )
ENGINE = MyISAM;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
