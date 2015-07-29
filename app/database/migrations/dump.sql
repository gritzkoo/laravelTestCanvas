CREATE DATABASE  IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `laravel`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	5.5.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `FLUXOGRAMA`
--

DROP TABLE IF EXISTS `FLUXOGRAMA`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FLUXOGRAMA` (
  `FLG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FLG_ID2` int(11) DEFAULT NULL,
  `USU_ID` int(11) NOT NULL,
  `FLG_JSON` text NOT NULL,
  `FLG_BLOB` blob NOT NULL,
  `FLG_TIMESTAMP` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FLG_VERSAO` int(11) NOT NULL DEFAULT '1',
  `FLG_NOME` varchar(120) NOT NULL,
  `FLG_DESCRICAO` text,
  `FLG_WIDTH` varchar(10) NOT NULL,
  `FLG_HEIGHT` varchar(10) NOT NULL,
  PRIMARY KEY (`FLG_ID`),
  KEY `USU_ID_FLG_FX_idx` (`USU_ID`),
  CONSTRAINT `USU_ID_FLG_FX` FOREIGN KEY (`USU_ID`) REFERENCES `usuario` (`USU_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FLUXOGRAMA`
--
-- ORDER BY:  `FLG_ID`

LOCK TABLES `FLUXOGRAMA` WRITE;
/*!40000 ALTER TABLE `FLUXOGRAMA` DISABLE KEYS */;
/*!40000 ALTER TABLE `FLUXOGRAMA` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIO`
--

DROP TABLE IF EXISTS `USUARIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIO` (
  `USU_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USU_NOME` varchar(256) NOT NULL,
  `USU_PASSWORD` varchar(40) NOT NULL,
  PRIMARY KEY (`USU_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIO`
--
-- ORDER BY:  `USU_ID`

LOCK TABLES `USUARIO` WRITE;
/*!40000 ALTER TABLE `USUARIO` DISABLE KEYS */;
INSERT INTO `USUARIO` (`USU_ID`, `USU_NOME`, `USU_PASSWORD`) VALUES (1,'gritzko','7c4a8d09ca3762af61e59520943dc26494f8941b'),(2,'renato','7c4a8d09ca3762af61e59520943dc26494f8941b'),(3,'renata','7c4a8d09ca3762af61e59520943dc26494f8941b'),(4,'leandro','7c4a8d09ca3762af61e59520943dc26494f8941b'),(5,'Matheus','7c4a8d09ca3762af61e59520943dc26494f8941b');
/*!40000 ALTER TABLE `USUARIO` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-29 17:55:15
