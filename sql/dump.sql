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
/*!40000 ALTER TABLE `field_data_description` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_data_image_url`
--

DROP TABLE IF EXISTS `field_data_image_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_data_image_url` (
  `nid` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`nid`),
  CONSTRAINT `fk_field_data_image_url_node` FOREIGN KEY (`nid`) REFERENCES `node` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_data_image_url`
--

LOCK TABLES `field_data_image_url` WRITE;
/*!40000 ALTER TABLE `field_data_image_url` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_data_image_url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language` (
  `lang` varchar(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language`
--

LOCK TABLES `language` WRITE;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` VALUES ('en','English'),('ru','Русский');
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
  CONSTRAINT `fk_menu_lang` FOREIGN KEY (`lang`) REFERENCES `language` (`lang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  CONSTRAINT `fk_node_language` FOREIGN KEY (`lang`) REFERENCES `language` (`lang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_node_self` FOREIGN KEY (`pid`) REFERENCES `node` (`nid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_node_type` FOREIGN KEY (`type`) REFERENCES `node_type` (`type`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
INSERT INTO `node` VALUES (1,NULL,'region','Андорра',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(2,NULL,'region','Болгария',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(3,NULL,'region','Великобритания',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(4,NULL,'region','Венгрия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(5,NULL,'region','Греция',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(6,NULL,'region','Грузия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(7,NULL,'region','Доминикана',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(8,NULL,'region','Израиль',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(9,NULL,'region','Индия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(10,NULL,'region','Индонезия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(11,NULL,'region','Италия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(12,NULL,'region','Кипр',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(13,NULL,'region','Китай',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(14,NULL,'region','Куба ',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(15,NULL,'region','Малайзия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(16,NULL,'region','Мальдивы',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(17,NULL,'region','Марокко',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(18,NULL,'region','Мексика',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(19,NULL,'region','о. Маврикий',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(20,NULL,'region','ОАЭ',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(21,NULL,'region','Россия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(22,NULL,'region','Сейшелы',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(23,NULL,'region','Словакия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(24,NULL,'region','США',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(25,NULL,'region','Таиланд',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(26,NULL,'region','Турция',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(27,NULL,'region','Украина',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(28,NULL,'region','Финляндия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(29,NULL,'region','Франция',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(30,NULL,'region','Черногория',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(31,NULL,'region','Чехия',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(32,NULL,'region','Шри-Ланка',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(33,NULL,'region','Ямайка ',1,'ru','2015-04-09 20:29:12','2015-04-09 20:29:12'),(64,NULL,'tour_type','Деловые туры',1,'ru','2015-04-09 20:36:59','2015-04-09 20:36:59'),(65,NULL,'tour_type','Оздоровительные туры',1,'ru','2015-04-09 20:36:59','2015-04-09 20:36:59'),(66,NULL,'tour_type','Развлечения и отдых',1,'ru','2015-04-09 20:36:59','2015-04-09 20:36:59'),(67,NULL,'tour_type','Спортивные туры',1,'ru','2015-04-09 20:36:59','2015-04-09 20:36:59'),(68,NULL,'tour_type','Экстремальный туризм',1,'ru','2015-04-09 20:36:59','2015-04-09 20:36:59'),(71,65,'tour_subtype','Бальнеологические курорты',1,'ru','2015-04-09 20:39:56','2015-04-09 20:39:56'),(72,65,'tour_subtype','Грязевые курорты',1,'ru','2015-04-09 20:39:56','2015-04-09 20:39:56'),(73,65,'tour_subtype','Лесные курорты',1,'ru','2015-04-09 20:39:56','2015-04-09 20:39:56'),(74,65,'tour_subtype','Горные курорты',1,'ru','2015-04-09 20:39:56','2015-04-09 20:39:56'),(75,65,'tour_subtype','Приморские курорты',1,'ru','2015-04-09 20:39:56','2015-04-09 20:39:56'),(78,67,'tour_subtype','Автотуризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(79,67,'tour_subtype','Мототуризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(80,67,'tour_subtype','Велосипедный туризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(81,67,'tour_subtype','Водный туризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(82,67,'tour_subtype','Парусный туризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(83,67,'tour_subtype','Конный туризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(84,67,'tour_subtype','Лыжный туризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(85,67,'tour_subtype','Пешеходный туризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(86,67,'tour_subtype','Горный туризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(87,67,'tour_subtype','Спелеотуризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(88,67,'tour_subtype','Комбинированный туризм',1,'ru','2015-04-09 20:40:48','2015-04-09 20:40:48'),(93,68,'tour_subtype','Горный турихэ',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(94,68,'tour_subtype','Дайвинг джиппинг',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(95,68,'tour_subtype','Индустриальный',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(96,68,'tour_subtype','Туризм',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(97,68,'tour_subtype','Диггерство',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(98,68,'tour_subtype','Спелеотуризм',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(99,68,'tour_subtype','Водный туризм',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(100,68,'tour_subtype','Каякинг',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(101,68,'tour_subtype','Рафтинг',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(102,68,'tour_subtype','Парусный',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(103,68,'tour_subtype','Туризм',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(104,68,'tour_subtype','Автостоп',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(105,68,'tour_subtype','Легкоходство',1,'ru','2015-04-09 20:41:08','2015-04-09 20:41:08'),(108,66,'tour_subtype','Пляжный отдых',1,'ru','2015-04-09 20:41:21','2015-04-09 20:41:21'),(109,66,'tour_subtype','Круизы',1,'ru','2015-04-09 20:41:21','2015-04-09 20:41:21'),(110,66,'tour_subtype','Романтические поездки',1,'ru','2015-04-09 20:41:21','2015-04-09 20:41:21'),(111,66,'tour_subtype','Поездка на сафари',1,'ru','2015-04-09 20:41:21','2015-04-09 20:41:21'),(112,66,'tour_subtype','Экскурсионные туры',1,'ru','2015-04-09 20:41:21','2015-04-09 20:41:21'),(113,66,'tour_subtype','Свадьбы за границей',1,'ru','2015-04-09 20:41:21','2015-04-09 20:41:21'),(114,66,'tour_subtype','Винные и пивные туры',1,'ru','2015-04-09 20:41:21','2015-04-09 20:41:21'),(115,64,'tour_subtype','Бизнес поездки',1,'ru','2015-04-09 20:41:35','2015-04-09 20:41:35'),(116,64,'tour_subtype','Обучение за границей',1,'ru','2015-04-09 20:41:35','2015-04-09 20:41:35'),(117,64,'tour_subtype','Загранпаспорт',1,'ru','2015-04-09 20:41:35','2015-04-09 20:41:35'),(118,64,'tour_subtype','Визы',1,'ru','2015-04-09 20:41:35','2015-04-09 20:41:35'),(119,64,'tour_subtype','Бронь отелей',1,'ru','2015-04-09 20:41:35','2015-04-09 20:41:35'),(120,64,'tour_subtype','Корпоративные туры',1,'ru','2015-04-09 20:41:35','2015-04-09 20:41:35'),(121,64,'tour_subtype','Военные туры',1,'ru','2015-04-09 20:41:35','2015-04-09 20:41:35'),(122,64,'tour_subtype','VIP Услуги',1,'ru','2015-04-09 20:41:35','2015-04-09 20:41:35');
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
INSERT INTO `node_type` VALUES ('city','Города','Города'),('news','Новости','Новости'),('region','Страны','Страны мира'),('tour','Туры','Туры'),('tour_subtype','Подвиды туров','Подвиды туров'),('tour_type','Виды туров','Виды туров');
/*!40000 ALTER TABLE `node_type` ENABLE KEYS */;
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

-- Dump completed on 2015-04-09 23:54:09
