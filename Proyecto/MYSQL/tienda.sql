-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: db_tienda_ropa
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(80) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido1` varchar(80) NOT NULL,
  `apellido2` varchar(80) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `imagen` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (14,'xpablosky4x','Pablo','Molina','Conde','2022-11-15','../resources/cliente/avatarDefecto.png'),(15,'perrinat','Alvaro','Gonzalez','Castilla','2022-11-25','../resources/cliente/avatar1.png'),(16,'Pechu','Pedro','Cortes','Flores','2022-12-03','../resources/cliente/avatarDefecto.png');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_ropa`
--

DROP TABLE IF EXISTS `cliente_ropa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente_ropa` (
  `cliente_id` int NOT NULL,
  `ropa_id` int NOT NULL,
  `cantidad` int DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_compra` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_compra`),
  CONSTRAINT `chk_cantidad_valida` CHECK ((`cantidad` > 0))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_ropa`
--

LOCK TABLES `cliente_ropa` WRITE;
/*!40000 ALTER TABLE `cliente_ropa` DISABLE KEYS */;
INSERT INTO `cliente_ropa` VALUES (14,15,1,'2022-11-15',1),(14,15,1,'2022-11-15',2),(14,15,1,'2022-11-15',3),(14,16,2,'2022-11-17',4);
/*!40000 ALTER TABLE `cliente_ropa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ropa`
--

DROP TABLE IF EXISTS `ropa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ropa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `talla` varchar(10) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `chk_categoria_valida` CHECK ((`categoria` in (_utf8mb4'CAMISETAS',_utf8mb4'PANTALONES',_utf8mb4'ACCESORIOS'))),
  CONSTRAINT `chk_talla_valida` CHECK ((`talla` in (_utf8mb4'XS',_utf8mb4'S',_utf8mb4'M',_utf8mb4'L',_utf8mb4'XL')))
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ropa`
--

LOCK TABLES `ropa` WRITE;
/*!40000 ALTER TABLE `ropa` DISABLE KEYS */;
INSERT INTO `ropa` VALUES (15,'Nike','S',35.00,'PANTALONES','../resources/ropa/nike.jpg'),(16,'Adidas','L',33.00,'CAMISETAS','../resources/ropa/Logo_brand_Adidas.png'),(17,'NB','M',69.00,'PANTALONES','../resources/ropa/nb.png');
/*!40000 ALTER TABLE `ropa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contrasena` varchar(60) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `rol` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (9,'$2y$10$mPE69m1alTbhune9icfjz.CqMeVW6k5SQKy75KYAOJe5uHnvVQvla','pablo','pablo',''),(10,'$2y$10$mXHCSDlBVliNs3oqtl8aw.H7Ns5kGSTF58iH4pVRxlp8M5HO4FOH6','alvaro','alvaro',''),(11,'$2y$10$e3eIrOzaHP0UfkLvn4eQL.2NrBBTKkWxsF3zOEhMmNdH.J/BPBf7K','l','l',''),(12,'$2y$10$dcBZ4LBbF4Q8HSedg1N1au3ak61s64I2I.KEnxQLMjo4./Sy6wlv6','jaime','jaime',''),(13,'$2y$10$ulVQNZ0TxQf2//4r3Kz.m.4X3EdCMDCXnFvOKm37H5ypWzsT/XuZO','vicente','vicente','on'),(14,'$2y$10$Bse/jpvTffZXMKU2Hu6rEu4jC7sJyvtrEew2GDP7MnTiHp4NHSKnS','la','la','administrador'),(15,'$2y$10$l6ND5QIeTnVywxgnzvWN3OoOqdacViwII3KC3RDIglmz6.u923C4u','le','le','administrador'),(16,'$2y$10$YzbMWxr0dCx59fPhALSH6OaGWOp7XVK0DwjqPczkPEV8y3kZjGBqW','q','q','administrador'),(17,'$2y$10$Ciwv2gR1LRu1QW2X8p01Ye4.uc0GI.JpNoEMEHM6OaIBlku47k486','a','a','administrador'),(18,'$2y$10$Qot3yJjYq2fURXSSAT2D9OCSe7z0WQFp65Wqec73w1SLrWUs9zPFa','h','h','usuario'),(19,'$2y$10$ghqWrmfgnPIGp58lktBBXeVAGdKbCBRtK1F8Q5iqnevHnn5xtktFy','m','m','administrador');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-17 12:48:34
