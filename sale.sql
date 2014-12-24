-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sale
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu1

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `identify` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'dummy name','dummy','dummy','dummy','dummy@dummy.dummy'),(2,'Ho Duy','123','090','123','linh@g'),(3,'Ho Duy','a','090','asd123','lin'),(4,'Ho Duy','A','A','A','A'),(5,'A','asd','A','A','A'),(6,'Mr David','Grand Hotel','0982674451','USA','thanhliem.tran.vn@gmail.com'),(7,'ABC','Viet Nam','0982674451','024287529','thanhliem.tran.vn@gmail.com');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `location`
--

LOCK TABLES `location` WRITE;
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` VALUES (1,'An Giang'),(2,'Bà Rịa - Vũng Tàu'),(3,'Bắc Giang'),(4,'Bắc Kạn'),(5,'Bạc Liêu'),(6,'Bắc Ninh'),(7,'Bến Tre'),(8,'Bình Định'),(9,'Bình Dương'),(10,'Bình Phước'),(11,'Bình Thuận'),(12,'Cà Mau'),(13,'Cao Bằng'),(14,'Đắk Lắk'),(15,'Đắk Nông'),(16,'Điện Biên'),(17,'Đồng Nai'),(18,'Đồng Tháp'),(19,'Gia Lai'),(20,'Hà Giang'),(21,'Hà Tĩnh'),(22,'Hải Dương'),(23,'Hậu Giang'),(24,'Hòa Bình'),(25,'Hưng Yên'),(26,'Khánh Hòa'),(27,'Kiên Giang'),(28,'Kon Tum'),(29,'Lai Châu'),(30,'Lâm Đồng'),(31,'Lạng Sơn'),(32,'Lào Cai'),(33,'Long An'),(34,'Nam Định'),(35,'Nghệ An'),(36,'Ninh Bình'),(37,'Ninh Thuận'),(38,'Phú Thọ'),(39,'Quảng Bình'),(40,'Quảng Ngãi'),(41,'Quảng Ninh'),(42,'Quảng Trị'),(43,'Sóc Trăng'),(44,'Sơn La'),(45,'Tây Ninh'),(46,'Thái Bình'),(47,'Thái Nguyên'),(48,'Thanh Hóa'),(49,'Thừa Thiên Huế'),(50,'Tiền Giang'),(51,'Trà Vinh'),(52,'Tuyên Quang'),(53,'Vĩnh Long'),(54,'Vĩnh Phúc'),(55,'Yên Bái'),(56,'Phú Yên'),(57,'Đà Nẵng'),(58,'Hải Phòng'),(59,'Hà Nội'),(60,'TP HCM'),(61,'Cần Thơ'),(62,'Châu Đốc'),(63,'Phú Quốc'),(64,'Mũi Né'),(65,'Nha Trang'),(66,'Hội An'),(67,'Đà Lạt'),(68,'Phan Thiết'),(69,'Quảng Nam');
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_cruises`
--

DROP TABLE IF EXISTS `order_cruises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_cruises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_location_id` int(11) NOT NULL,
  `to_location_id` int(11) NOT NULL,
  `order_date_id` int(11) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_cruises`
--

LOCK TABLES `order_cruises` WRITE;
/*!40000 ALTER TABLE `order_cruises` DISABLE KEYS */;
INSERT INTO `order_cruises` VALUES (1,22,24,1,NULL),(2,22,24,1,NULL),(3,20,60,2,NULL),(4,60,50,3,NULL),(5,21,22,3,NULL),(6,60,60,1,'Asd'),(7,60,66,12,'');
/*!40000 ALTER TABLE `order_cruises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_date`
--

DROP TABLE IF EXISTS `order_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  `order_id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_date`
--

LOCK TABLES `order_date` WRITE;
/*!40000 ALTER TABLE `order_date` DISABLE KEYS */;
INSERT INTO `order_date` VALUES (1,'2014-12-18 00:00:00','2014-12-18 00:00:00',1,NULL),(2,'2014-12-19 00:00:00','2014-12-19 00:00:00',1,NULL),(3,'2014-12-11 00:00:00','2014-12-11 00:00:00',2,NULL),(4,'2014-12-12 00:00:00','2014-12-12 00:00:00',2,NULL),(5,'2014-12-13 00:00:00','2014-12-13 00:00:00',2,NULL),(6,'2014-12-14 00:00:00','2014-12-14 00:00:00',2,NULL),(7,'2014-12-15 00:00:00','2014-12-15 00:00:00',2,NULL),(8,'2014-12-16 00:00:00','2014-12-16 00:00:00',2,NULL),(9,'2014-12-17 00:00:00','2014-12-17 00:00:00',2,NULL),(10,'2014-12-18 00:00:00','2014-12-18 00:00:00',2,NULL),(11,'2014-12-19 00:00:00','2014-12-19 00:00:00',2,NULL),(12,'2014-12-25 00:00:00','2014-12-25 00:00:00',3,NULL),(13,'2014-12-26 00:00:00','2014-12-26 00:00:00',3,NULL),(14,'2014-12-27 00:00:00','2014-12-27 00:00:00',3,NULL);
/*!40000 ALTER TABLE `order_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `is_custom` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `price_gross` double NOT NULL,
  `price_number` int(11) NOT NULL,
  `extra_gross` double NOT NULL,
  `extra_number` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `description` text NOT NULL,
  `total` double NOT NULL,
  `order_cruise_id` int(11) DEFAULT NULL,
  `order_date_id` int(11) DEFAULT NULL,
  `check_in_date` datetime DEFAULT NULL,
  `check_out_date` datetime DEFAULT NULL,
  `service_type_id` int(11) NOT NULL,
  `service_level_id` int(11) NOT NULL,
  `max_discount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,1,0,0,0,0,0,0,'',0,0,1,NULL,NULL,1,0,0),(2,1,1,0,0,0,0,0,0,'',0,0,1,NULL,NULL,2,0,0),(3,1,1,0,0,0,0,0,0,'',0,0,1,NULL,NULL,3,0,0),(4,1,1,0,0,0,0,0,0,'',0,0,1,NULL,NULL,4,0,0),(5,1,1,0,0,0,0,0,0,'',0,0,1,NULL,NULL,5,0,0),(6,1,1,0,0,0,0,0,0,'',10,2,1,NULL,NULL,1,0,0),(7,1,1,0,0,0,0,0,0,'',0,2,1,NULL,NULL,2,0,0),(8,1,1,0,0,0,0,0,0,'',0,2,1,NULL,NULL,3,0,0),(9,1,1,0,0,0,0,0,0,'hhhh',9,2,1,NULL,NULL,4,0,0),(10,1,1,0,0,0,0,0,0,'',0,2,1,NULL,NULL,5,0,0),(11,1,0,0,0,0,0,0,0,'',0,2,1,NULL,NULL,5,0,0),(12,1,0,0,0,0,0,0,0,'',0,2,1,NULL,NULL,4,0,0),(13,1,1,0,0,0,0,0,0,'aaaaaaaaaa',0,3,2,NULL,NULL,1,0,0),(14,1,1,0,0,0,0,0,0,'',0,3,2,NULL,NULL,2,0,0),(15,1,1,0,0,0,0,0,0,'',0,3,2,NULL,NULL,3,0,0),(16,1,1,0,0,0,0,0,0,'',0,3,2,NULL,NULL,4,0,0),(17,1,1,0,0,0,0,0,0,'',0,3,2,NULL,NULL,5,0,0),(18,1,0,0,0,0,0,0,0,'',0,3,2,NULL,NULL,1,0,0),(19,1,0,0,0,0,0,0,0,'',0,3,2,NULL,NULL,1,0,0),(20,2,1,0,0,0,0,0,0,'asdasd',1000,4,3,NULL,NULL,1,0,0),(21,2,1,0,0,0,0,0,0,'',0,4,3,NULL,NULL,2,0,0),(22,2,1,0,0,0,0,0,0,'',0,4,3,NULL,NULL,3,0,0),(23,2,1,0,0,0,0,0,0,'',0,4,3,NULL,NULL,4,0,0),(24,2,1,0,0,0,0,0,0,'',0,4,3,NULL,NULL,5,0,0),(25,2,0,0,0,0,0,0,0,'',0,4,3,NULL,NULL,1,0,0),(26,2,0,0,0,0,0,0,0,'',0,4,3,NULL,NULL,1,0,0),(27,2,0,0,0,0,0,0,0,'',0,4,3,NULL,NULL,1,0,0),(28,2,1,0,0,0,0,0,0,'',0,5,3,NULL,NULL,1,0,0),(29,2,1,0,0,0,0,0,0,'',0,5,3,NULL,NULL,2,0,0),(30,2,1,0,0,0,0,0,0,'',0,5,3,NULL,NULL,3,0,0),(31,2,1,0,0,0,0,0,0,'',0,5,3,NULL,NULL,4,0,0),(32,2,1,0,0,0,0,0,0,'',0,5,3,NULL,NULL,5,0,0),(33,2,0,0,0,0,0,0,0,'',0,5,3,NULL,NULL,1,0,0),(34,1,0,0,0,0,0,0,0,'',0,1,1,NULL,NULL,1,0,0),(35,1,1,0,0,0,0,0,0,'',0,6,1,NULL,NULL,1,0,0),(36,1,1,0,0,0,0,0,0,'',0,6,1,NULL,NULL,2,0,0),(37,1,1,0,0,0,0,0,0,'',0,6,1,NULL,NULL,3,0,0),(38,1,1,0,0,0,0,0,0,'',0,6,1,NULL,NULL,4,0,0),(39,1,1,0,0,0,0,0,0,'',0,6,1,NULL,NULL,5,0,0),(40,1,0,2,2470000,2,0,2,0,'aksjdlkasjdlkasjdlkasjdlksjaldk',4940000,6,1,NULL,NULL,1,91,0),(41,3,1,0,0,0,0,0,0,'',0,7,12,NULL,NULL,1,0,0),(42,3,1,0,0,0,0,0,0,'',0,7,12,NULL,NULL,2,0,0),(43,3,1,0,0,0,0,0,0,'',0,7,12,NULL,NULL,3,0,0),(44,3,1,0,0,0,0,0,0,'',0,7,12,NULL,NULL,4,0,0),(45,3,1,0,0,0,0,0,0,'',0,7,12,NULL,NULL,5,0,0),(46,3,0,0,0,0,0,0,0,'',0,7,12,NULL,NULL,1,0,0);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `description` text,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `order_status` int(11) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `customer_count` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,5,NULL,1,'2014-12-06 00:00:00',NULL,NULL,0,NULL,5,0),(2,6,NULL,1,'2014-12-09 00:00:00',NULL,NULL,0,NULL,5,0),(3,7,NULL,1,'2014-12-23 00:00:00',NULL,NULL,0,NULL,2,0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `location_id_a` int(11) DEFAULT NULL,
  `location_id_b` int(11) DEFAULT NULL,
  `description` text,
  `service_type_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'GRAND',60,0,'',1,NULL),(2,'REX HOTEL SAIGON',60,0,'',1,NULL),(3,'NOVOTEL',60,NULL,'',1,NULL),(4,'MAJESTIC SAIGON',60,0,'',1,NULL),(5,'RENAISSANCE',60,NULL,'',1,NULL),(6,'MAJESTIC SAIGON',60,0,'',1,NULL),(7,'CONTINENTAL SAIGON',60,0,'',1,NULL),(8,'PALACE',60,NULL,'',1,NULL),(9,'WINDSOR PLAZA',60,NULL,'',1,NULL),(10,'PULLMAN SG CENTRE',60,NULL,'',1,NULL),(11,'SHERATON',60,NULL,'',1,NULL),(12,'LEGEND',60,NULL,'',1,NULL),(13,'MOVENPICK',60,NULL,'',1,NULL),(14,'NIKKO',60,NULL,'',1,NULL),(15,'LIBERTY CITY POINT',60,NULL,'',1,NULL),(16,'LIBERTY RIVERSIDE',60,NULL,'',1,NULL),(17,'RAMANA',60,NULL,'',1,NULL),(18,'DE NHAT',60,NULL,'',1,NULL),(19,'HARMONY',60,NULL,'',1,NULL),(20,'CARAVELLE',60,NULL,'',1,NULL),(21,'EDEN SG',60,NULL,'',1,NULL),(22,'DOMAINE LUXURY',60,NULL,'',1,NULL),(23,'THAO DIEN BOUTIQUE',60,NULL,'',1,NULL),(24,'SOFITEL',60,NULL,'',1,NULL),(25,'DUXTON HOTEL SAIGON',60,0,'',1,NULL),(26,'NEW PACIFIC',60,NULL,'',1,NULL),(27,'NORFOLK',60,NULL,'',1,NULL),(28,'INTERCONTINENTAL',60,NULL,'',1,NULL),(29,'NEW WORLD',60,NULL,'',1,NULL),(30,'PARK ROYAL',60,NULL,'',1,NULL),(31,'HOANG HAI LONG',60,NULL,'',1,NULL),(32,'GRAND SIVERLAND',60,NULL,'',1,NULL),(33,'OSCAR SAIGON',60,0,'',1,NULL),(34,'LAVENDER',60,NULL,'',1,NULL),(35,'BOSS GROUP- LIEN THANH',60,NULL,'',1,NULL),(36,'ELLYSE NGA KHANH',60,NULL,'',1,NULL),(37,'MAY FLOWER',60,NULL,'',1,NULL),(38,'COSMOPOLITAN',60,NULL,'',1,NULL),(39,'TIME DOOR',60,NULL,'',1,NULL),(40,'VIEN DONG ',60,NULL,'',1,NULL),(41,'SIGNATURE',60,NULL,'',1,NULL),(42,'GK CENTRAL',60,NULL,'',1,NULL),(43,'ASIAN RUBY ',60,NULL,'',1,NULL),(44,'VICTORY',60,NULL,'',1,NULL),(45,'QUEEN ANN',60,NULL,'',1,NULL),(46,'HOANG NGAN',60,NULL,'',1,NULL),(47,'HOANG PHU GIA',60,NULL,'',1,NULL),(48,'AU LAC 2',60,NULL,'',1,NULL),(49,'RUBY RIVER',60,NULL,'',1,NULL),(50,'WHITE LOTUS',60,NULL,'',1,NULL),(51,'DUNA',60,NULL,'',1,NULL),(52,'THE WHITE',60,NULL,'',1,NULL),(53,'RIVERSIDE',60,NULL,'',1,NULL),(54,'HUONG SEN',60,NULL,'',1,NULL),(55,'BONG SEN',60,NULL,'',1,NULL),(56,'THE KINGSTON',60,NULL,'',1,NULL),(57,'KELLY',60,NULL,'',1,NULL),(58,'LIBERTY 2',60,NULL,'',1,NULL),(59,'LIBERTY 3',60,NULL,'',1,NULL),(60,'ELIOS',60,NULL,'',1,NULL),(61,'SIVERLAND SAKYO',60,NULL,'',1,NULL),(62,'LA JOLIE',60,NULL,'',1,NULL),(63,'BLUE DIMOND SIGNATURE',60,NULL,'',1,NULL),(64,'MAY',60,NULL,'',1,NULL),(65,'SIVERLAND INN',60,NULL,'',1,NULL),(66,'HOSEN 2',60,NULL,'',1,NULL),(67,'CATINA',60,NULL,'',1,NULL),(68,'HAMPTON',60,NULL,'',1,NULL),(69,'LITTLE SG CORNER',60,NULL,'',1,NULL),(70,'BLESSING',60,NULL,'',1,NULL),(71,'BOSS 3',60,NULL,'',1,NULL),(72,'SUNLAND',60,NULL,'',1,NULL),(73,'CAP TOWN',60,NULL,'',1,NULL),(74,'NINH KIEU 1',61,NULL,'',1,NULL),(75,'NINH KIEU 2',61,NULL,'',1,NULL),(76,'ASIA ',61,NULL,'',1,NULL),(77,'HOLIDAY',61,NULL,'',1,NULL),(78,'SAI CON CAN THO',61,NULL,'',1,NULL),(79,'VICTORIA',61,NULL,'',1,NULL),(80,'GOFL',61,NULL,'',1,NULL),(81,'CHAU PHO',62,NULL,'',1,NULL),(82,'VICTORIA',62,NULL,'',1,NULL),(83,'THE SHELLS RESORT &SPA',63,NULL,'Ấp Gành Gió, Thị Trấn Dương Đông, Phú Quốc',1,NULL),(84,'FAMIANA RESORT',63,NULL,'Ấp cửa lấp, xã Dương Tơ, PQ',1,NULL),(85,'EDEN RESORT',63,NULL,'Cửa Lấp, Dương Tơ, Phú Quốc',1,NULL),(86,'MERCURE',63,NULL,'Tổ 1, Cửa Lấp, Dương Tơ, Phú Quốc ',1,NULL),(87,'LA VERANDA RESORT',63,NULL,'Trần Hưng Đạo, Dương Đông, Phú Quốc',1,NULL),(88,'SASCO BLUE LAGOON',63,NULL,'64 Trần Hưng Đạo, Dương Đông, Phú Quốc',1,NULL),(89,'SAI GON PHU QUOC',63,NULL,'62 Trần Hưng Đạo, Dương Đông, Phú Quốc',1,NULL),(90,'LONG BEACH RESORT',63,NULL,'Cửa Lấp, Dương Tơ, Phú Quốc ',1,NULL),(91,'LANGCHIA VILLAGE',63,NULL,'Ấp cửa Lấp - Xã Dương Tơ, Phú Quốc',1,NULL),(92,'THIEN HAI SON',63,NULL,'68 – Trần Hưng Đạo – Khu phố 7 – Dương Đông – Phú Quốc ',1,NULL),(93,'KIM HOA',63,NULL,'88/2 Trần Hưng Đạo, KP7, Dương Đông, Phú Quốc',1,NULL),(94,'HOA BINH',63,NULL,'71 Trần Hưng Đạo, Khu phố 7 thị trấn Dương Đông, Phú Quốc',1,NULL),(95,'TERRACE RESORT',63,NULL,'118/6 Trần Hưng Đạo, Thị Trấn Dương Đông, Phú Quốc',1,NULL),(96,'MANGOBAY RESORT',63,NULL,'Bãi Biển Ông lãng, Phú Quốc',1,NULL),(97,'THANH KIEU RESORT',63,NULL,'100C/14 Trần Hưng Đạo, Thị Trấn Đông Dương, Phú Quốc',1,NULL),(98,'TROPICANA RESORT',63,NULL,'100C/4 Trần Hưng Đạo, khu phố 7, Dương Đông, Phú Quốc ',1,NULL),(99,'BAO QUYNH BUNGALOW',64,NULL,'26 Nguyen Dinh Chieu, Ham Tien, Mui Ne',1,NULL),(100,'ROMANA RESORT',64,NULL,' km 8 Phu Hai, Mui NE, tp. Phan Thiết',1,NULL),(101,'SUNNY BEACH RESORT',64,NULL,' 64 Nguyễn Đình Chiểu, Hàm Tiến, Mũi Né',1,NULL),(102,'LOTUS village',64,NULL,'100 Nguyễn Đình Chiểu, Hàm Tiến, tp. Phan Thiết,',1,NULL),(103,'ALLEZBOO',64,NULL,'8 Nguyen Dinh Chieu St, Ham Tien,',1,NULL),(104,'SEAHORSE',64,NULL,'11 Nguyễn Đình Chiểu, khu phố 1, Hàm Tiến. Phan Thiet',1,NULL),(105,'SEALION',64,NULL,'12 đường Nguyễn Đình CHiểu, Hàm Tiên, Mũi Né',1,NULL),(106,'NOVELA',64,NULL,'96A Nguyen Dinh Chieu St',1,NULL),(107,'BLUE OCEAN',64,NULL,'54 Nguyen Dinh Chieu, Ham Tien, Phan Thiet',1,NULL),(108,'CHAM VILLAS',64,NULL,'32 Nguyễn Đình Chiểu, Hàm Tiến, tp. Phan Thiết',1,NULL),(109,'SUNSEA',64,NULL,'50 Nguyen Dinh Chieu, KP. 1, Ham Tien Ward, Phan  Thiet',1,NULL),(110,'DYNASTY',64,NULL,'140A Nguyen Dinh Chieu St, Ham Tien, Phan Thiet',1,NULL),(111,'PANDANUS',64,NULL,'Block 5, Mui Ne, tp. Phan Thiết,',1,NULL),(112,'OCEANSKING',64,NULL,'146 Nguyễn Đình Chiểu - Hàm Tiến - Mũi Né - Phan Thiết',1,NULL),(113,'TIEN DAT',64,NULL,'Nguyễn Đình Chiểu, Hàm Tiến, tp. Phan Thiết',1,NULL),(114,'HOANG NGOC RESORT',64,NULL,'152 Nguyễn Đình Chiểu, Mũi Né',1,NULL),(115,'DIAMOND BAY',65,NULL,'Đại Lộ Nguyễn Tất Thành, Sông Lô, Phước Đồng, tp. Nha Trang',1,NULL),(116,'HON TAM HOTEL&RESORT',65,NULL,'Hòn Tằm, Vinh Nguyên, Nha Trang, Khánh Hòa',1,NULL),(117,'MICHELIA',65,NULL,'4 Pasteur, Xương Huân, tp. Nha Trang,',1,NULL),(118,'THE LIGHT HOTEL& RESORT',65,NULL,'',1,NULL),(119,'VINPERLAND',65,NULL,'',1,NULL),(120,'NOVOTEL',65,NULL,'',1,NULL),(121,'SHERATON NHA TRANG',65,NULL,'',1,NULL),(122,'WHALE ISLAND',65,NULL,'',1,NULL),(123,'ASIA PARADISE',65,NULL,'',1,NULL),(124,'LODGE ',65,NULL,'',1,NULL),(125,'YASAKA',65,NULL,'',1,NULL),(126,'BLUE MOON',67,NULL,'',1,NULL),(127,'NGOC LAN',67,NULL,'',1,NULL),(128,'SAI GON DA LAT',67,NULL,'',1,NULL),(129,'SAMMY',67,NULL,'',1,NULL),(130,'BESWESTERN',67,NULL,'',1,NULL),(131,'SAPHIR',67,NULL,'',1,NULL),(132,'VINH HUNG RESORT',66,NULL,'',1,NULL),(133,'VINH HUNG 2',66,NULL,'',1,NULL),(134,'LONG LIFE RESORT',66,NULL,'',1,NULL),(135,'PALM GADERN',66,NULL,'',1,NULL),(136,'VICTORIA',66,NULL,'',1,NULL),(137,'BOUTIQUE2',59,NULL,'',1,NULL),(138,'SKYLARK',59,NULL,'',1,NULL),(139,'GOLDEN RICE ',59,NULL,'',1,NULL),(140,'NIKKO',59,NULL,'',1,NULL),(141,'TIRANT',59,NULL,'',1,NULL),(142,'SILK PATH',59,NULL,'',1,NULL),(143,'MOVENPICK HANOI HOTEL',59,NULL,'',1,NULL),(144,'HANOI EMOTION HOTEL ',59,NULL,'',1,NULL),(145,'None',2,NULL,NULL,1,NULL);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_level`
--

DROP TABLE IF EXISTS `services_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `service_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_level`
--

LOCK TABLES `services_level` WRITE;
/*!40000 ALTER TABLE `services_level` DISABLE KEYS */;
INSERT INTO `services_level` VALUES (1,'Colonial Deluxe (01 night)','',1),(2,'Colonial City Deluxe (01 night)','',1),(3,'Colonial Pool Deluxe (01 night)','',1),(4,'Colonial River Deluxe (01 night)','',1),(5,'Colonial Suite (01 night)','',1),(6,'Colonial Deluxe (02 night)','',1),(7,'Colonial City Deluxe (02 night)','',1),(8,'Colonial Pool Deluxe(02 night)','',1),(9,'Colonial River Deluxe(02 night)','',1),(10,'Colonial Suite (02 night)','',1),(11,'Colonial Deluxe (≥ 03 night)','',1),(12,'Colonial City Deluxe (≥ 03 night)','',1),(13,'Colonial Pool Deluxe (≥ 03 night)','',1),(14,'Colonial River Deluxe (≥ 03 night)','',1),(15,'Colonial Suite (≥ 03 night)','',1),(16,'Colonial Deluxe (01 night)','',1),(17,'Colonial City Deluxe (01 night)','',1),(18,'Colonial Pool Deluxe (01 night)','',1),(19,'Colonial River Deluxe (01 night)','',1),(20,'Colonial Suite (01 night)','',1),(21,'Colonial Deluxe (02 night)','',1),(22,'Colonial City Deluxe (02 night)','',1),(23,'Colonial Pool Deluxe(02 night)','',1),(24,'Colonial River Deluxe(02 night)','',1),(25,'Colonial Suite (02 night)','',1),(26,'Colonial Deluxe (≥ 03 night)','',1),(27,'Colonial City Deluxe (≥ 03 night)','',1),(28,'Colonial Pool Deluxe (≥ 03 night)','',1),(29,'Colonial River Deluxe (≥ 03 night)','',1),(30,'Colonial Suite (≥ 03 night)','',1),(31,'Oscar Cosy','',1),(32,'Oscar Cosy Elegant','',1),(33,'Deluxe','',1),(34,'Premium Deluxe','',1),(35,'Royal Deluxe','',1),(36,'Oscar Deluxe','',1),(37,'Oscar Cosy','',1),(38,'Oscar Cosy Elegant','',1),(39,'Deluxe','',1),(40,'Premium Deluxe','',1),(41,'Royal Deluxe','',1),(42,'Oscar Deluxe','',1),(43,'Oscar Cosy','',1),(44,'Oscar Cosy Elegant','',1),(45,'Deluxe','',1),(46,'Premium Deluxe','',1),(47,'Royal Deluxe','',1),(48,'Oscar Deluxe','',1),(49,'Oscar Cosy','',1),(50,'Oscar Cosy Elegant','',1),(51,'Deluxe','',1),(52,'Premium Deluxe','',1),(53,'Royal Deluxe','',1),(54,'Oscar Deluxe','',1),(55,'Superior (Inside view)','',1),(56,'Deluxe (City/Garden/ Opera view','',1),(57,'Junior Suite','',1),(58,'Premium Suite','',1),(59,'Continental Suite (Opera/Garden view)','',1),(60,'Executive Suite (City view)','',1),(61,'Deluxe (East Wing)','',1),(62,'Rex Suite (East Wing)','',1),(63,'Imperial Suite (East Wing)','',1),(64,'Premium (West Wing)','',1),(65,'Governor Suite (West Wing)','',1),(66,'Family Governor Suite (West Wing)','',1),(67,'Executive Premium (Executive Wing)','',1),(68,'Executive Governor Suite (Executive Wing)','',1),(69,'Executive Suite (Executive Wing)','',1),(70,'Presidential Suite (Executive Wing)','',1),(71,'Deluxe (East Wing)','',1),(72,'Rex Suite (East Wing)','',1),(73,'Imperial Suite (East Wing)','',1),(74,'Premium (West Wing)','',1),(75,'Governor Suite (West Wing)','',1),(76,'Family Governor Suite (West Wing)','',1),(77,'Executive Premium (Executive Wing)','',1),(78,'Executive Governor Suite (Executive Wing)','',1),(79,'Executive Suite (Executive Wing)','',1),(80,'Presidential Suite (Executive Wing)','',1),(81,'Deluxe (East Wing)','',1),(82,'Rex Suite (East Wing)','',1),(83,'Imperial Suite (East Wing)','',1),(84,'Premium (West Wing)','',1),(85,'Governor Suite (West Wing)','',1),(86,'Family Governor Suite (West Wing)','',1),(87,'Executive Premium (Executive Wing)','',1),(88,'Executive Governor Suite (Executive Wing)','',1),(89,'Executive Suite (Executive Wing)','',1),(90,'Presidential Suite (Executive Wing)','',1),(91,'Deluxe ','',1),(92,'Premium','',1),(93,'Governor Suite','',1),(94,'Deluxe','',1),(95,'Superior (Single Room)','',1),(96,'Superior (Double/Twin Room)','',1),(97,'Superior (Single Room)','',1),(98,'Superior (Double/Twin Room)','',1),(99,'Superior (SGL)','',1),(100,'Superior (DBL)','',1),(101,'Deluxe (SGL)','',1),(102,'Deluxe (DBL)','',1),(103,'Suite (SGL)','',1),(104,'Suite (DBL)','',1),(105,'Superior (SGL)','',1),(106,'Superior (DBL)','',1),(107,'Deluxe (SGL)','',1),(108,'Deluxe (DBL)','',1),(109,'Suite (SGL)','',1),(110,'Suite (DBL)','',1),(111,'Superior (SGL)','',1),(112,'Superior (DBL)','',1),(113,'Deluxe (SGL)','',1),(114,'Deluxe (DBL)','',1),(115,'Suite (SGL)','',1),(116,'Suite (DBL)','',1),(117,'Superior','',1),(118,'Deluxe','',1),(119,'Suite King','',1),(120,'Family Connecting Room','',1),(121,'Superior','',1),(122,'Deluxe','',1),(123,'Suite King','',1),(124,'Family Connecting Room','',1),(125,'Superior','',1),(126,'Deluxe','',1),(127,'Suite King','',1),(128,'Family Connecting Room','',1);
/*!40000 ALTER TABLE `services_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_price`
--

DROP TABLE IF EXISTS `services_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `service_type_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `price_net` bigint(20) NOT NULL,
  `price_percent` decimal(10,0) NOT NULL,
  `price_gross` bigint(20) NOT NULL,
  `extra_net` int(11) NOT NULL,
  `extra_percent` int(11) NOT NULL,
  `extra_gross` int(11) NOT NULL,
  `discount_max` int(11) NOT NULL,
  `service_level` int(11) NOT NULL,
  `description` text,
  `level_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_price`
--

LOCK TABLES `services_price` WRITE;
/*!40000 ALTER TABLE `services_price` DISABLE KEYS */;
INSERT INTO `services_price` VALUES (1,4,1,'2014-10-01','2015-03-31',2500000,8,2700000,0,0,0,3,1,'Not in Public Holidays','Colonial Deluxe (01 night)'),(2,4,1,'2014-10-01','2015-03-31',2700000,8,2916000,0,0,0,3,2,'Not in Public Holidays','Colonial City Deluxe (01 night)'),(3,4,1,'2014-10-01','2015-03-31',2900000,8,3132000,0,0,0,3,3,'Not in Public Holidays','Colonial Pool Deluxe (01 night)'),(4,4,1,'2014-10-01','2015-03-31',3200000,8,3456000,0,0,0,3,4,'Not in Public Holidays','Colonial River Deluxe (01 night)'),(5,4,1,'2014-10-01','2015-03-31',3500000,8,3780000,0,0,0,3,5,'Not in Public Holidays','Colonial Suite (01 night)'),(6,4,1,'2014-10-01','2015-03-31',2400000,8,2592000,0,0,0,3,6,'Not in Public Holidays','Colonial Deluxe (02 night)'),(7,4,1,'2014-10-01','2015-03-31',2600000,8,2808000,0,0,0,3,7,'Not in Public Holidays','Colonial City Deluxe (02 night)'),(8,4,1,'2014-10-01','2015-03-31',2800000,8,3024000,0,0,0,3,8,'Not in Public Holidays','Colonial Pool Deluxe(02 night)'),(9,4,1,'2014-10-01','2015-03-31',3100000,8,3348000,0,0,0,3,9,'Not in Public Holidays','Colonial River Deluxe(02 night)'),(10,4,1,'2014-10-01','2015-03-31',3400000,8,3672000,0,0,0,3,10,'Not in Public Holidays','Colonial Suite (02 night)'),(11,4,1,'2014-10-01','2015-03-31',2300000,8,2484000,0,0,0,2,11,'Not in Public Holidays','Colonial Deluxe (≥ 03 night)'),(12,4,1,'2014-10-01','2015-03-31',2500000,8,2700000,0,0,0,2,12,'Not in Public Holidays','Colonial City Deluxe (≥ 03 night)'),(13,4,1,'2014-10-01','2015-03-31',2700000,8,2916000,0,0,0,2,13,'Not in Public Holidays','Colonial Pool Deluxe (≥ 03 night)'),(14,4,1,'2014-10-01','2015-03-31',3000000,8,3240000,0,0,0,2,14,'Not in Public Holidays','Colonial River Deluxe (≥ 03 night)'),(15,4,1,'2014-10-01','2015-03-31',3300000,8,3564000,0,0,0,2,15,'Not in Public Holidays','Colonial Suite (≥ 03 night)'),(16,4,1,'2014-10-01','2015-03-31',2300000,8,2484000,0,0,0,2,16,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Deluxe (01 night)'),(17,4,1,'2014-10-01','2015-03-31',2500000,8,2700000,0,0,0,2,17,'Vietnamese/Chinese only, Not in Public Holidays','Colonial City Deluxe (01 night)'),(18,4,1,'2014-10-01','2015-03-31',2700000,8,2916000,0,0,0,2,18,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Pool Deluxe (01 night)'),(19,4,1,'2014-10-01','2015-03-31',3000000,8,3240000,0,0,0,2,19,'Vietnamese/Chinese only, Not in Public Holidays','Colonial River Deluxe (01 night)'),(20,4,1,'2014-10-01','2015-03-31',3300000,8,3564000,0,0,0,2,20,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Suite (01 night)'),(21,4,1,'2014-10-01','2015-03-31',2200000,8,2376000,0,0,0,2,21,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Deluxe (02 night)'),(22,4,1,'2014-10-01','2015-03-31',2400000,8,2592000,0,0,0,2,22,'Vietnamese/Chinese only, Not in Public Holidays','Colonial City Deluxe (02 night)'),(23,4,1,'2014-10-01','2015-03-31',2600000,8,2808000,0,0,0,2,23,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Pool Deluxe(02 night)'),(24,4,1,'2014-10-01','2015-03-31',2900000,8,3132000,0,0,0,2,24,'Vietnamese/Chinese only, Not in Public Holidays','Colonial River Deluxe(02 night)'),(25,4,1,'2014-10-01','2015-03-31',3200000,8,3456000,0,0,0,2,25,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Suite (02 night)'),(26,4,1,'2014-10-01','2015-03-31',2100000,8,2268000,0,0,0,2,26,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Deluxe (≥ 03 night)'),(27,4,1,'2014-10-01','2015-03-31',2300000,8,2484000,0,0,0,2,27,'Vietnamese/Chinese only, Not in Public Holidays','Colonial City Deluxe (≥ 03 night)'),(28,4,1,'2014-10-01','2015-03-31',2500000,8,2700000,0,0,0,2,28,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Pool Deluxe (≥ 03 night)'),(29,4,1,'2014-10-01','2015-03-31',2800000,8,3024000,0,0,0,2,29,'Vietnamese/Chinese only, Not in Public Holidays','Colonial River Deluxe (≥ 03 night)'),(30,4,1,'2014-10-01','2015-03-31',3100000,8,3348000,0,0,0,2,30,'Vietnamese/Chinese only, Not in Public Holidays','Colonial Suite (≥ 03 night)'),(31,33,1,'2015-01-01','2015-03-31',925000,21,1119250,0,0,0,3,31,'','Oscar Cosy'),(32,33,1,'2015-01-01','2015-03-31',968000,21,1171280,0,0,0,3,32,'','Oscar Cosy Elegant'),(33,33,1,'2015-01-01','2015-03-31',1011000,21,1223310,0,0,0,3,33,'','Deluxe'),(34,33,1,'2015-01-01','2015-03-31',1032000,21,1248720,0,0,0,3,34,'','Premium Deluxe'),(35,33,1,'2015-01-01','2015-03-31',1097000,21,1327370,0,0,0,3,35,'','Royal Deluxe'),(36,33,1,'2015-01-01','2015-03-31',1161000,21,1404810,0,0,0,3,36,'','Oscar Deluxe'),(37,33,1,'2015-04-01','2015-09-30',800000,21,968000,0,0,0,3,37,'','Oscar Cosy'),(38,33,1,'2015-04-01','2015-09-30',840000,21,1016400,0,0,0,3,38,'','Oscar Cosy Elegant'),(39,33,1,'2015-04-01','2015-09-30',885000,21,1070850,0,0,0,3,39,'','Deluxe'),(40,33,1,'2015-04-01','2015-09-30',965000,21,1167650,0,0,0,3,40,'','Premium Deluxe'),(41,33,1,'2015-04-01','2015-09-30',1010000,21,1222100,0,0,0,3,41,'','Royal Deluxe'),(42,33,1,'2015-04-01','2015-09-30',1070000,21,1294700,0,0,0,3,42,'','Oscar Deluxe'),(43,33,1,'2015-10-01','2015-12-31',925000,21,1119250,0,0,0,3,43,'','Oscar Cosy'),(44,33,1,'2015-10-01','2015-12-31',968000,21,1171280,0,0,0,3,44,'','Oscar Cosy Elegant'),(45,33,1,'2015-10-01','2015-12-31',1011000,21,1223310,0,0,0,3,45,'','Deluxe'),(46,33,1,'2015-10-01','2015-12-31',1032000,21,1248720,0,0,0,3,46,'','Premium Deluxe'),(47,33,1,'2015-10-01','2015-12-31',1097000,21,1327370,0,0,0,3,47,'','Royal Deluxe'),(48,33,1,'2015-10-01','2015-12-31',1161000,21,1404810,0,0,0,3,48,'','Oscar Deluxe'),(49,33,1,'2014-10-11','2014-12-31',600000,21,726000,0,0,0,3,49,'','Oscar Cosy'),(50,33,1,'2014-10-11','2014-12-31',640000,21,774400,0,0,0,3,50,'','Oscar Cosy Elegant'),(51,33,1,'2014-10-11','2014-12-31',685000,21,828850,0,0,0,3,51,'','Deluxe'),(52,33,1,'2014-10-11','2014-12-31',765000,21,925650,0,0,0,3,52,'','Premium Deluxe'),(53,33,1,'2014-10-11','2014-12-31',810000,21,980100,0,0,0,3,53,'','Royal Deluxe'),(54,33,1,'2014-10-11','2014-12-31',870000,21,1052700,0,0,0,3,54,'','Oscar Deluxe'),(55,7,1,'2014-10-01','2014-12-31',2000000,10,2200000,0,5,0,3,55,'','Superior (Inside view)'),(56,7,1,'2014-10-01','2014-12-31',2200000,10,2420000,630000,5,661500,3,56,'','Deluxe (City/Garden/ Opera view'),(57,7,1,'2014-10-01','2014-12-31',2500000,10,2750000,630000,5,661500,3,57,'','Junior Suite'),(58,7,1,'2014-10-01','2014-12-31',2700000,10,2970000,630000,5,661500,3,58,'','Premium Suite'),(59,7,1,'2014-10-01','2014-12-31',3200000,10,3520000,630000,5,661500,3,59,'','Continental Suite (Opera/Garden view)'),(60,7,1,'2014-10-01','2014-12-31',4600000,10,5060000,630000,5,661500,3,60,'','Executive Suite (City view)'),(61,2,1,'2015-01-01','2015-04-30',2687500,7,2875625,0,5,0,2,61,'','Deluxe (East Wing)'),(62,2,1,'2015-01-01','2015-04-30',2902500,7,3105675,860000,5,903000,2,62,'','Rex Suite (East Wing)'),(63,2,1,'2015-01-01','2015-04-30',8600000,7,9202000,0,5,0,2,63,'','Imperial Suite (East Wing)'),(64,2,1,'2015-01-01','2015-04-30',2902500,7,3105675,860000,5,903000,2,64,'','Premium (West Wing)'),(65,2,1,'2015-01-01','2015-04-30',3225000,7,3450750,860000,5,903000,2,65,'','Governor Suite (West Wing)'),(66,2,1,'2015-01-01','2015-04-30',6450000,7,6901500,0,5,0,2,66,'','Family Governor Suite (West Wing)'),(67,2,1,'2015-01-01','2015-04-30',3547500,7,3795825,860000,5,903000,2,67,'','Executive Premium (Executive Wing)'),(68,2,1,'2015-01-01','2015-04-30',3870000,7,4140900,860000,5,903000,2,68,'','Executive Governor Suite (Executive Wing)'),(69,2,1,'2015-01-01','2015-04-30',6020000,7,6441400,0,5,0,2,69,'','Executive Suite (Executive Wing)'),(70,2,1,'2015-01-01','2015-04-30',16125000,7,17253750,0,5,0,2,70,'','Presidential Suite (Executive Wing)'),(71,2,1,'2015-05-01','2015-09-30',2365000,7,2530550,0,5,0,2,71,'','Deluxe (East Wing)'),(72,2,1,'2015-05-01','2015-09-30',2580000,7,2760600,860000,5,903000,2,72,'','Rex Suite (East Wing)'),(73,2,1,'2015-05-01','2015-09-30',8600000,7,9202000,0,5,0,2,73,'','Imperial Suite (East Wing)'),(74,2,1,'2015-05-01','2015-09-30',2580000,7,2760600,860000,5,903000,2,74,'','Premium (West Wing)'),(75,2,1,'2015-05-01','2015-09-30',3010000,7,3220700,860000,5,903000,2,75,'','Governor Suite (West Wing)'),(76,2,1,'2015-05-01','2015-09-30',6450000,7,6901500,0,5,0,2,76,'','Family Governor Suite (West Wing)'),(77,2,1,'2015-05-01','2015-09-30',3225000,7,3450750,860000,5,903000,2,77,'','Executive Premium (Executive Wing)'),(78,2,1,'2015-05-01','2015-09-30',3655000,7,3910850,860000,5,903000,2,78,'','Executive Governor Suite (Executive Wing)'),(79,2,1,'2015-05-01','2015-09-30',6020000,7,6441400,0,5,0,2,79,'','Executive Suite (Executive Wing)'),(80,2,1,'2015-05-01','2015-09-30',16125000,7,17253750,0,5,0,2,80,'','Presidential Suite (Executive Wing)'),(81,2,1,'2015-10-01','2015-12-31',2687500,7,2875625,0,5,0,2,81,'','Deluxe (East Wing)'),(82,2,1,'2015-10-01','2015-12-31',2902500,7,3105675,860000,5,903000,2,82,'','Rex Suite (East Wing)'),(83,2,1,'2015-10-01','2015-12-31',8600000,7,9202000,0,5,0,2,83,'','Imperial Suite (East Wing)'),(84,2,1,'2015-10-01','2015-12-31',2902500,7,3105675,860000,5,903000,2,84,'','Premium (West Wing)'),(85,2,1,'2015-10-01','2015-12-31',3225000,7,3450750,860000,5,903000,2,85,'','Governor Suite (West Wing)'),(86,2,1,'2015-10-01','2015-12-31',6450000,7,6901500,0,5,0,2,86,'','Family Governor Suite (West Wing)'),(87,2,1,'2015-10-01','2015-12-31',3547500,7,3795825,860000,5,903000,2,87,'','Executive Premium (Executive Wing)'),(88,2,1,'2015-10-01','2015-12-31',3870000,7,4140900,860000,5,903000,2,88,'','Executive Governor Suite (Executive Wing)'),(89,2,1,'2015-10-01','2015-12-31',6020000,7,6441400,0,5,0,2,89,'','Executive Suite (Executive Wing)'),(90,2,1,'2015-10-01','2015-12-31',16125000,7,17253750,0,5,0,2,90,'','Presidential Suite (Executive Wing)'),(91,2,1,'2014-11-17','2015-03-31',1900000,30,2470000,0,5,0,2,91,'','Deluxe '),(92,2,1,'2014-11-17','2015-03-31',2100000,30,2730000,860000,5,903000,2,92,'','Premium'),(93,2,1,'2014-11-17','2015-03-31',2600000,30,3380000,860000,5,903000,2,93,'','Governor Suite'),(94,25,1,'2014-11-20','2015-03-31',1680000,12,1881600,735000,10,808500,2,94,'','Deluxe'),(95,143,1,'2014-12-19','2015-01-04',1785000,12,1999200,735000,10,808500,0,95,'','Superior (Single Room)'),(96,143,1,'2014-12-19','2015-01-04',1890000,12,2116800,735000,10,808500,0,96,'','Superior (Double/Twin Room)'),(97,143,1,'2015-02-13','2015-03-01',1575000,12,1764000,735000,10,808500,0,97,'','Superior (Single Room)'),(98,143,1,'2015-02-13','2015-03-01',1690000,12,1892800,735000,10,808500,0,98,'','Superior (Double/Twin Room)'),(99,143,1,'2015-01-01','2015-04-30',2730000,10,3003000,735000,10,808500,2,99,'','Superior (SGL)'),(100,143,1,'2015-01-01','2015-04-30',2940000,10,3234000,735000,10,808500,2,100,'','Superior (DBL)'),(101,143,1,'2015-01-01','2015-04-30',3150000,10,3465000,735000,10,808500,2,101,'','Deluxe (SGL)'),(102,143,1,'2015-01-01','2015-04-30',3360000,10,3696000,735000,10,808500,2,102,'','Deluxe (DBL)'),(103,143,1,'2015-01-01','2015-04-30',5040000,10,5544000,735000,10,808500,2,103,'','Suite (SGL)'),(104,143,1,'2015-01-01','2015-04-30',5250000,10,5775000,735000,10,808500,2,104,'','Suite (DBL)'),(105,143,1,'2015-10-01','2015-12-31',2730000,10,3003000,735000,10,808500,2,105,'','Superior (SGL)'),(106,143,1,'2015-10-01','2015-12-31',2940000,10,3234000,735000,10,808500,2,106,'','Superior (DBL)'),(107,143,1,'2015-10-01','2015-12-31',3150000,10,3465000,735000,10,808500,2,107,'','Deluxe (SGL)'),(108,143,1,'2015-10-01','2015-12-31',3360000,10,3696000,735000,10,808500,2,108,'','Deluxe (DBL)'),(109,143,1,'2015-10-01','2015-12-31',5040000,10,5544000,735000,10,808500,2,109,'','Suite (SGL)'),(110,143,1,'2015-10-01','2015-12-31',5250000,10,5775000,735000,10,808500,2,110,'','Suite (DBL)'),(111,143,1,'2015-05-01','2015-09-30',2520000,10,2772000,735000,10,808500,2,111,'','Superior (SGL)'),(112,143,1,'2015-05-01','2015-09-30',2730000,10,3003000,735000,10,808500,2,112,'','Superior (DBL)'),(113,143,1,'2015-05-01','2015-09-30',2940000,10,3234000,735000,10,808500,2,113,'','Deluxe (SGL)'),(114,143,1,'2015-05-01','2015-09-30',3150000,10,3465000,735000,10,808500,2,114,'','Deluxe (DBL)'),(115,143,1,'2015-05-01','2015-09-30',4830000,10,5313000,735000,10,808500,2,115,'','Suite (SGL)'),(116,143,1,'2015-05-01','2015-09-30',5040000,10,5544000,735000,10,808500,2,116,'','Suite (DBL)'),(117,144,1,'2015-05-01','2015-09-30',693000,25,866250,320000,25,400000,2,117,'','Superior'),(118,144,1,'2015-05-01','2015-09-30',840000,25,1050000,320000,25,400000,2,118,'','Deluxe'),(119,144,1,'2015-05-01','2015-09-30',1365000,25,1706250,320000,25,400000,2,119,'','Suite King'),(120,144,1,'2015-05-01','2015-09-30',1785000,25,2231250,320000,25,400000,2,120,'','Family Connecting Room'),(121,144,1,'2015-01-01','2015-04-30',840000,25,1050000,320000,25,400000,2,121,'','Superior'),(122,144,1,'2015-01-01','2015-04-30',945000,25,1181250,320000,25,400000,2,122,'','Deluxe'),(123,144,1,'2015-01-01','2015-04-30',1575000,25,1968750,320000,25,400000,2,123,'','Suite King'),(124,144,1,'2015-01-01','2015-04-30',1890000,25,2362500,320000,25,400000,2,124,'','Family Connecting Room'),(125,144,1,'2015-10-01','2015-12-31',840000,25,1050000,320000,25,400000,2,125,'','Superior'),(126,144,1,'2015-10-01','2015-12-31',945000,25,1181250,320000,25,400000,2,126,'','Deluxe'),(127,144,1,'2015-10-01','2015-12-31',1575000,25,1968750,320000,25,400000,2,127,'','Suite King'),(128,144,1,'2015-10-01','2015-12-31',1890000,25,2362500,320000,25,400000,2,128,'','Family Connecting Room'),(129,1,1,'0000-00-00','0000-00-00',0,0,0,0,0,0,0,9,NULL,'Colonial River Deluxe(02 night)'),(130,1,1,'0000-00-00','0000-00-00',0,0,0,0,0,0,0,0,NULL,''),(131,1,1,'0000-00-00','0000-00-00',0,0,0,0,0,0,0,0,NULL,'');
/*!40000 ALTER TABLE `services_price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services_type`
--

DROP TABLE IF EXISTS `services_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services_type`
--

LOCK TABLES `services_type` WRITE;
/*!40000 ALTER TABLE `services_type` DISABLE KEYS */;
INSERT INTO `services_type` VALUES (1,'hotel','Hotel'),(2,'restaurent','Restaurent'),(3,'tour','Tour'),(4,'transport','Transport'),(5,'insurence','Insurence');
/*!40000 ALTER TABLE `services_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'linh','123','0000-00-00 00:00:00','0000-00-00 00:00:00',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-24  3:45:05
