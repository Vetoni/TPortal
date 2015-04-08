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
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `fk_menu_self` FOREIGN KEY (`parent_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,NULL,'О компании','/about'),(2,NULL,'Новости','/news'),(3,NULL,'Услуги','/services'),(4,NULL,'Отзывы','/reviews'),(5,4,'Отправить отзыв','/feedback'),(6,NULL,'Вопросы и ответы','/faqs'),(7,6,'Задать вопрос','/ask'),(8,NULL,'Контакты','/contact'),(9,NULL,'Поиск','/search');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `node`
--

DROP TABLE IF EXISTS `node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `node` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` int(11) NOT NULL,
  `content` text,
  `image_url` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_node_self_idx` (`parent_id`),
  KEY `name` (`name`),
  CONSTRAINT `fk_node_self` FOREIGN KEY (`parent_id`) REFERENCES `node` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `node`
--

LOCK TABLES `node` WRITE;
/*!40000 ALTER TABLE `node` DISABLE KEYS */;
/*!40000 ALTER TABLE `node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (5,'Андорра'),(22,'Болгария'),(18,'Великобритания'),(23,'Венгрия'),(3,'Греция'),(6,'Грузия'),(7,'Доминикана'),(1,'Израиль'),(16,'Индия'),(12,'Индонезия'),(20,'Италия'),(4,'Кипр'),(24,'Китай'),(32,'Куба '),(25,'Малайзия'),(9,'Мальдивы'),(14,'Марокко'),(11,'Мексика'),(8,'о. Маврикий'),(2,'ОАЭ'),(31,'Россия'),(17,'Сейшелы'),(27,'Словакия'),(13,'США'),(15,'Таиланд'),(29,'Турция'),(30,'Украина'),(28,'Финляндия'),(19,'Франция'),(21,'Черногория'),(26,'Чехия'),(10,'Шри-Ланка'),(33,'Ямайка ');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour`
--

DROP TABLE IF EXISTS `tour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subtype_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `announce` text,
  `description` text,
  `is_special_offer` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tour_subtype_idx` (`subtype_id`),
  KEY `fk_tour_region_idx` (`region_id`),
  KEY `name` (`name`),
  CONSTRAINT `fk_tour_region` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tour_subtype` FOREIGN KEY (`subtype_id`) REFERENCES `tour_subtype` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour`
--

LOCK TABLES `tour` WRITE;
/*!40000 ALTER TABLE `tour` DISABLE KEYS */;
/*!40000 ALTER TABLE `tour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_subtype`
--

DROP TABLE IF EXISTS `tour_subtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_subtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `fk_tour_subtype_type` FOREIGN KEY (`type_id`) REFERENCES `tour_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_subtype`
--

LOCK TABLES `tour_subtype` WRITE;
/*!40000 ALTER TABLE `tour_subtype` DISABLE KEYS */;
INSERT INTO `tour_subtype` VALUES (1,1,'Бальнеологические курорты'),(2,1,'Грязевые курорты'),(3,1,'Лесные курорты'),(4,1,'Горные курорты'),(5,1,'Приморские курорты'),(6,2,'Автотуризм'),(7,2,'Мототуризм'),(8,2,'Велосипедный туризм'),(9,2,'Водный туризм'),(10,2,'Парусный туризм'),(11,2,'Конный туризм'),(12,2,'Лыжный туризм'),(13,2,'Пешеходный туризм'),(14,2,'Горный туризм'),(15,2,'Спелеотуризм'),(16,2,'Комбинированный туризм'),(17,3,'Горный турихэ'),(18,3,'Дайвинг джиппинг'),(19,3,'Индустриальный'),(20,3,'Туризм'),(21,3,'Диггерство'),(22,3,'Спелеотуризм'),(23,3,'Водный туризм'),(24,3,'Каякинг'),(25,3,'Рафтинг'),(26,3,'Парусный'),(27,3,'Туризм'),(28,3,'Автостоп'),(29,3,'Легкоходство'),(30,4,'Пляжный отдых'),(31,4,'Круизы'),(32,4,'Романтические поездки'),(33,4,'Поездка на сафари'),(34,4,'Экскурсионные туры'),(35,4,'Свадьбы за границей'),(36,4,'Винные и пивные туры'),(37,5,'Бизнес поездки'),(38,5,'Обучение за границей'),(39,5,'Загранпаспорт'),(40,5,'Визы'),(41,5,'Бронь отелей'),(42,5,'Корпоративные туры'),(43,5,'Военные туры'),(44,5,'VIP Услуги');
/*!40000 ALTER TABLE `tour_subtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tour_type`
--

DROP TABLE IF EXISTS `tour_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tour_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tour_type`
--

LOCK TABLES `tour_type` WRITE;
/*!40000 ALTER TABLE `tour_type` DISABLE KEYS */;
INSERT INTO `tour_type` VALUES (5,'Деловые туры'),(1,'Оздоровительные туры'),(4,'Развлечения и отдых'),(2,'Спортивные туры'),(3,'Экстремальный туризм');
/*!40000 ALTER TABLE `tour_type` ENABLE KEYS */;
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

-- Dump completed on 2015-04-08 21:06:37
