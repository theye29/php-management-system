-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema uml
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ uml;
USE uml;

--
-- Table structure for table `uml`.`cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cliente` varchar(100) NOT NULL DEFAULT '',
  `cpf` char(11) NOT NULL DEFAULT '00000000000',
  `funcionario` char(1) NOT NULL DEFAULT 'F',
  `senha` varchar(245) NOT NULL DEFAULT '',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uml`.`cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idcliente`,`cliente`,`cpf`,`funcionario`,`senha`) VALUES 
 (1,'cleitaon','11122233312','V','$2y$12$TpAszy7q1hvdA2HOqnMzSe9UEaT8pcLMIV3tQFB16g8BGJn2K8YIO'),
 (2,'calebe','12312312312','F','$2y$12$JjsCF2GZRzpAM1Kmm07tweXqAaPZuk/lYkCSVmDAiD0qkd1F9DDY6'),
 (3,'cebe','10934202605','F','$2y$12$C9ys58aU2xA8CsgWqmzQNuWORtjc.jarxijhkquAMOuVs.OBESlUC');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Table structure for table `uml`.`contrato`
--

DROP TABLE IF EXISTS `contrato`;
CREATE TABLE `contrato` (
  `idcontrato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servico` varchar(100) NOT NULL DEFAULT '',
  `cliente` varchar(75) NOT NULL DEFAULT '',
  `datainicial` datetime DEFAULT NULL,
  `datafinal` date DEFAULT NULL,
  `valorentrada` int(10) unsigned NOT NULL DEFAULT 0,
  `valortotal` int(10) unsigned NOT NULL DEFAULT 0,
  `pagamento` varchar(60) NOT NULL DEFAULT '',
  `prestador` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`idcontrato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uml`.`contrato`
--

/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;


--
-- Table structure for table `uml`.`funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
  `idfuncionario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `funcionario` varchar(100) NOT NULL DEFAULT '',
  `senha` varchar(245) NOT NULL DEFAULT '',
  PRIMARY KEY (`idfuncionario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uml`.`funcionario`
--

/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` (`idfuncionario`,`funcionario`,`senha`) VALUES 
 (1,'cleitaon','');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;


--
-- Table structure for table `uml`.`servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `idservico` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `servico` varchar(100) NOT NULL DEFAULT '',
  `prestador` varchar(75) NOT NULL DEFAULT '',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idservico`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uml`.`servico`
--

/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` (`idservico`,`servico`,`prestador`,`ativo`) VALUES 
 (1,'programação','Caixa','A');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
