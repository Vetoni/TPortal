CREATE DATABASE  IF NOT EXISTS `tportal` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tportal`;
-- MySQL dump 10.13  Distrib 5.6.19, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: tportal
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `image_base_url` varchar(45) DEFAULT NULL,
  `lang` varchar(12) NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `name` (`name`),
  KEY `fk_city_region_idx` (`rid`),
  KEY `fk_city_language_idx` (`lang`),
  CONSTRAINT `fk_city_language` FOREIGN KEY (`lang`) REFERENCES `language` (`lang`) ON UPDATE CASCADE,
  CONSTRAINT `fk_city_region` FOREIGN KEY (`rid`) REFERENCES `region` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_data_city`
--

DROP TABLE IF EXISTS `field_data_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_data_city` (
  `nid` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`nid`),
  KEY `fk_field_data_city_idx` (`value`),
  CONSTRAINT `fk_field_data_city` FOREIGN KEY (`value`) REFERENCES `city` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_field_data_city_node` FOREIGN KEY (`nid`) REFERENCES `node` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_data_city`
--

LOCK TABLES `field_data_city` WRITE;
/*!40000 ALTER TABLE `field_data_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_data_city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_data_description`
--

DROP TABLE IF EXISTS `field_data_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_data_description` (
  `nid` int(11) NOT NULL,
  `value` text,
  `summary` text,
  PRIMARY KEY (`nid`),
  CONSTRAINT `fk_field_data_description_node` FOREIGN KEY (`nid`) REFERENCES `node` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_data_description`
--

LOCK TABLES `field_data_description` WRITE;
/*!40000 ALTER TABLE `field_data_description` DISABLE KEYS */;
INSERT INTO `field_data_description` VALUES (1,'test','test');
/*!40000 ALTER TABLE `field_data_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_data_tour_type`
--

DROP TABLE IF EXISTS `field_data_tour_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_data_tour_type` (
  `nid` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`nid`),
  KEY `fk_field_data_tour_type_idx` (`value`),
  CONSTRAINT `fk_field_data_tour_type` FOREIGN KEY (`value`) REFERENCES `tour_type` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_field_data_tour_type_node` FOREIGN KEY (`nid`) REFERENCES `node` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_data_tour_type`
--

LOCK TABLES `field_data_tour_type` WRITE;
/*!40000 ALTER TABLE `field_data_tour_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_data_tour_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `lang` varchar(12) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`lang`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES ('en','English'),('ru','Русский'),('uk','Українська');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `lang` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `parent_id` (`parent_id`),
  KEY `lang` (`lang`),
  CONSTRAINT `fk_menu_lang` FOREIGN KEY (`lang`) REFERENCES `language` (`lang`) ON UPDATE CASCADE,
  CONSTRAINT `fk_menu_self` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,NULL,'О компании','/about','ru'),(2,NULL,'Новости','/news','ru'),(3,NULL,'Услуги','/services','ru'),(4,NULL,'Отзывы','/reviews','ru'),(5,4,'Отправить отзыв','/feedback','ru'),(6,NULL,'Вопросы и ответы','/faqs','ru'),(7,6,'Задать вопрос','/ask','ru'),(8,NULL,'Контакты','/contact','ru'),(9,NULL,'Поиск','/search','ru');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `type` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `lang` varchar(12) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nid`),
  KEY `type` (`type`),
  KEY `lang` (`lang`),
  KEY `fk_node_self_idx` (`pid`),
  CONSTRAINT `fk_node_language` FOREIGN KEY (`lang`) REFERENCES `language` (`lang`) ON UPDATE CASCADE,
  CONSTRAINT `fk_node_self` FOREIGN KEY (`pid`) REFERENCES `node` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_node_type` FOREIGN KEY (`type`) REFERENCES `node_type` (`type`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
INSERT INTO `node` VALUES (1,NULL,'tour','\"Приморье SPA Hotel & Wellness\" отель',1,'ru','2015-04-11 08:58:19','2015-04-11 08:58:19'),(2,NULL,'tour',' \"Санвиль Арго\" мини-отель ',1,'ru','2015-04-11 10:17:33','2015-04-11 10:21:47');
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node_type`
--

DROP TABLE IF EXISTS `node_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node_type` (
  `type` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node_type`
--

LOCK TABLES `node_type` WRITE;
/*!40000 ALTER TABLE `node_type` DISABLE KEYS */;
INSERT INTO `node_type` VALUES ('news','Новости','Новости'),('tour','Туры','Туры');
/*!40000 ALTER TABLE `node_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `image_base_url` varchar(45) DEFAULT NULL,
  `lang` varchar(12) NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `name` (`name`),
  KEY `fk_region_language_idx` (`lang`),
  CONSTRAINT `fk_region_language` FOREIGN KEY (`lang`) REFERENCES `language` (`lang`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'Украина','<p><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOMAAACWCAMAAAAbv88MAAAAKlBMVEU6dcT53RZCe8f53yDEvmA3dMY7dsL83wX54ClJgMn84RXHwWVDfMQ/esiIqnY6AAAAx0lEQVR4nO3PBwGDABAAsS90MP3brY9wcZDZF90+y+iWjoSOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOhmcc74/unuuru+Z86845frpj1pdu7UjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaOho6GjoaHjGcVt12x81GFpSpq5NwgAAAABJRU5ErkJggg==\" alt=\"Картинки по запросу украина\"></p><p>Страна, Европа</p><p>Украи́на — государство в Восточной Европе, расположенное в юго-западной части Восточноевропейской равнины. Наибольшая по площади страна, среди тех, которые полностью расположены в Европе, вторая, если считать Россию. <a class=\"fl q _KCd\" href=\"http://ru.wikipedia.org/wiki/%D0%A3%D0%BA%D1%80%D0%B0%D0%B8%D0%BD%D0%B0\"><span class=\"_tWc\"></span></a></p><p><span class=\"_xdb\">Столица: </span><span class=\"_Xbe kno-fv\">Киев</span></p><p><span class=\"_xdb\">Телефонный код: </span><span class=\"_Xbe kno-fv\">+380</span></p><p><span class=\"_xdb\">Президент: </span><span class=\"_Xbe kno-fv\">Пётр Алексеевич Порошенко</span></p><p><span class=\"_xdb\">Население: </span><span class=\"_Xbe kno-fv\">45,49 миллиона (2013 г.)</span> <span class=\"_wdb\">Всемирный банк</span></p><p><span class=\"_xdb\">Валовой внутренний продукт: </span><span class=\"_Xbe kno-fv\">177,4 миллиарда USD (2013 г.)</span></p>','1/0CW-u3FBNa76eM5DlQeh8hQGmnAiAQzY.jpg','http://tportal.com/storage/files','ru'),(2,'Россия','<p>\r\n	<img style=\"box-shadow: 1px 1px 4px gray;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOMAAACXCAMAAADQ4xypAAAAGFBMVEX////VKx4AOaZ6fb8ALKJrNYrhKgAAOap/TEO5AAAAlElEQVR4nO3PQRGDAAAEsaNA8e8YDXx3EgfZAAAAAAAAAAAAAAA+Ovt29e3X59jg2ODY4Njg2ODY4Njg2ODY4Njg2ODY4Njg2ODY4Njg2ODY4Njg2ODY4Njg2LCnb3ff/n07+hwbHBscGxwbHBscGxwbHBscGxwbHBscGxwbHBscGxwbHBscGxwbHBscGxwbHBscG141zpT5WOKoxgAAAABJRU5ErkJggg==\" alt=\"Картинки по запросу россия\">\r\n</p><p>\r\n	Страна\r\n</p><p>\r\n	Росси́я — государство в Восточной Европе и Северной Азии. Население — 146 267 288 чел., территория — 17 125 407 км². Занимает первое место в мире по территории и девятое место по численности населения. Столица — Москва. <a class=\"fl q _KCd\" href=\"http://ru.wikipedia.org/wiki/%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F\"><span class=\"_tWc\"></span></a>\r\n</p><p>\r\n	<span class=\"_xdb\">Столица: </span><span class=\"_Xbe kno-fv\">Москва</span>\r\n</p><p>\r\n	<span class=\"_xdb\">Телефонный код: </span><span class=\"_Xbe kno-fv\">+7</span>\r\n</p><p>\r\n	<span class=\"_xdb\">Код ISO: </span><span class=\"_Xbe kno-fv\">RUS</span>\r\n</p><p>\r\n	<span class=\"_xdb\">Население: </span><span class=\"_Xbe kno-fv\">143,5 миллиона (2013 г.)</span> <span class=\"_wdb\">Всемирный банк</span>\r\n</p><p>\r\n	<span class=\"_xdb\">Президент: </span><span class=\"_Xbe kno-fv\">Владимир Владимирович Путин</span>\r\n</p><p>\r\n	<span class=\"_xdb\">Государственный гимн: </span><span class=\"_Xbe kno-fv\">Государственный гимн России</span>\r\n</p>','1/NrV7KfBnvdmqBUTd1QVUSZe09BQrNZ38.jpg','http://tportal.com/storage/files','ru');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_type`
--

DROP TABLE IF EXISTS `tour_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_type` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `fk_tour_type_self_idx` (`pid`),
  KEY `name` (`name`),
  CONSTRAINT `fk_tour_type_self` FOREIGN KEY (`pid`) REFERENCES `tour_type` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_type`
--

LOCK TABLES `tour_type` WRITE;
/*!40000 ALTER TABLE `tour_type` DISABLE KEYS */;
INSERT INTO `tour_type` VALUES (1,NULL,'Деловые туры',NULL,NULL),(2,NULL,'Оздоровительные туры',NULL,NULL),(3,NULL,'Развлечения и отдых',NULL,NULL),(4,NULL,'Спортивные туры',NULL,NULL),(5,NULL,'Экстремальный туризм',NULL,NULL),(8,1,'Бизнес поездки',NULL,NULL),(9,1,'Обучение за границей',NULL,NULL),(10,1,'Загранпаспорт',NULL,NULL),(11,1,'Визы',NULL,NULL),(12,1,'Бронь отелей',NULL,NULL),(13,1,'Корпоративные туры',NULL,NULL),(14,1,'Военные туры',NULL,NULL),(15,1,'VIP Услуги',NULL,NULL),(23,2,'Бальнеологические курорты',NULL,NULL),(24,2,'Грязевые курорты',NULL,NULL),(25,2,'Лесные курорты',NULL,NULL),(26,2,'Горные курорты',NULL,NULL),(27,2,'Приморские курорты',NULL,NULL),(30,3,'Пляжный отдых',NULL,NULL),(31,3,'Круизы',NULL,NULL),(32,3,'Романтические поездки',NULL,NULL),(33,3,'Поездка на сафари',NULL,NULL),(34,3,'Экскурсионные туры',NULL,NULL),(35,3,'Свадьбы за границей',NULL,NULL),(36,3,'Винные и пивные туры',NULL,NULL),(37,4,'Автотуризм',NULL,NULL),(38,4,'Мототуризм',NULL,NULL),(39,4,'Велосипедный туризм',NULL,NULL),(40,4,'Водный туризм',NULL,NULL),(41,4,'Парусный туризм',NULL,NULL),(42,4,'Конный туризм',NULL,NULL),(43,4,'Лыжный туризм',NULL,NULL),(44,4,'Пешеходный туризм',NULL,NULL),(45,4,'Горный туризм',NULL,NULL),(46,4,'Спелеотуризм',NULL,NULL),(47,4,'Комбинированный туризм',NULL,NULL),(52,5,'Горный турихэ',NULL,NULL),(53,5,'Дайвинг',NULL,NULL),(54,5,'Виндсёрфинг',NULL,NULL),(55,5,'Джиппинг','',NULL),(56,5,'Диггерство',NULL,NULL),(57,5,'Спелеотуризм',NULL,NULL),(58,5,'Водный туризм',NULL,NULL),(59,5,'Каякинг',NULL,NULL),(60,5,'Рафтинг',NULL,NULL),(61,5,'Парусный туризм',NULL,NULL),(62,5,'Родео',NULL,NULL),(63,5,'Автостоп',NULL,NULL),(64,5,'Легкоходство',NULL,NULL);
/*!40000 ALTER TABLE `tour_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url_alias`
--

DROP TABLE IF EXISTS `url_alias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `url_alias` (
  `nid` int(11) NOT NULL,
  `source` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  PRIMARY KEY (`nid`),
  CONSTRAINT `fk_url_alias_node` FOREIGN KEY (`nid`) REFERENCES `node` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url_alias`
--

LOCK TABLES `url_alias` WRITE;
/*!40000 ALTER TABLE `url_alias` DISABLE KEYS */;
/*!40000 ALTER TABLE `url_alias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','5SmPKuZB-nw1s6oVCv9VlX9XNn9cCRVb','$2y$13$f5mtkgY2YvR4YI71to6Qv.nZZq7Ph5PdS7YeeSJ8FsVXknQidJFLG',NULL,'admin.tportal@gmail.com',10,1428485605,1428485605);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'tportal'
--

--
-- Dumping routines for database 'tportal'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-12 16:34:19
