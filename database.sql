-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gp
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_single` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_plural` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (3,'asdasd','asdasd','asdasd','no_image.png',2,'2016-03-28 20:31:08','2016-03-28 20:34:54'),(4,'werwer','werwer','sdfsdf','86303Selection_018.png',3,'2016-03-28 20:31:19','2016-03-28 20:31:19'),(5,'werwer','werwer','werwer','90731social_1.jpg',1,'2016-03-28 20:35:12','2016-03-28 20:35:12');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `region_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cities_slug_unique` (`slug`),
  KEY `cities_region_id_foreign` (`region_id`),
  CONSTRAINT `cities_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (5,'Vilnius','vilnius',71),(6,'Nemenčinė','nemencine',71);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `days` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `opened` tinyint(1) NOT NULL,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days`
--

LOCK TABLES `days` WRITE;
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` VALUES (1,1,'9:00','18:00','2016-03-28 22:15:14','2016-03-28 22:15:14'),(2,1,'9:00','18:00','2016-03-28 22:16:55','2016-03-28 22:16:55');
/*!40000 ALTER TABLE `days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `facilities_category_id_foreign` (`category_id`),
  CONSTRAINT `facilities_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facilities`
--

LOCK TABLES `facilities` WRITE;
/*!40000 ALTER TABLE `facilities` DISABLE KEYS */;
INSERT INTO `facilities` VALUES (1,'Kirpimas33',5,'2016-03-28 21:00:41','2016-03-28 21:16:05'),(3,'Kirpimas',5,'2016-03-28 21:00:59','2016-03-28 21:00:59'),(4,'qwdqwd',5,'2016-03-28 21:17:54','2016-03-28 21:17:54'),(5,'qwdwqdwqdqwdwq',5,'2016-03-28 21:17:57','2016-03-28 21:17:57'),(6,'rfgsergewe',3,'2016-03-28 21:18:23','2016-03-28 21:18:27');
/*!40000 ALTER TABLE `facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `junctions`
--

DROP TABLE IF EXISTS `junctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `junctions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `junctions_slug_unique` (`slug`),
  KEY `junctions_city_id_foreign` (`city_id`),
  CONSTRAINT `junctions_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `junctions`
--

LOCK TABLES `junctions` WRITE;
/*!40000 ALTER TABLE `junctions` DISABLE KEYS */;
INSERT INTO `junctions` VALUES (1,'Verkiai','verkiai',5),(2,'Antakalnis','antakalnis',5),(3,'Pašilaičiai','pasilaiciai',5),(4,'Fabijoniškės','fabijoniskes',5),(5,'Pilaitė','pilaite',5),(6,'Justiniškės','justiniskes',5),(7,'Viršuliškės','virsuliskes',5),(8,'Šeškinė','seskine',5),(9,'Šnipiškės','snipiskes',5),(10,'Žirmūnai','zirmunai',5),(11,'Karoliniškės','karoliniskes',5),(12,'Žvėrynas','zverynas',5),(13,'Grigiškės','grigiskes',5),(14,'Lazdynai','lazdynai',5),(15,'Vilkpėdė','vilkpede',5),(16,'Naujamiestis','naujamiestis',5),(17,'Senamiestis','senamiestis',5),(18,'Naujoji Vilnia','naujoji_vilnia',5),(19,'Paneriai','paneriai',5),(20,'Naujininkai','naujininkai',5),(21,'Rasai','rasai',5);
/*!40000 ALTER TABLE `junctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_03_26_231156_create_regions_table',2),('2016_03_26_232313_create_table_cities',3),('2016_03_26_233827_create_table_junctions',4),('2016_03_28_200822_create_categories_table',5),('2016_03_28_214249_create_facilities_table',6),('2016_03_28_222504_create_days_table',7),('2016_03_28_222748_create_opening_times_table',8),('2016_03_28_223426_create_organization_data_table',9),('2016_03_28_224536_create_organizations_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opening_times`
--

DROP TABLE IF EXISTS `opening_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opening_times` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `monday` int(10) unsigned DEFAULT NULL,
  `tuesday` int(10) unsigned DEFAULT NULL,
  `wednesday` int(10) unsigned DEFAULT NULL,
  `thursday` int(10) unsigned DEFAULT NULL,
  `friday` int(10) unsigned DEFAULT NULL,
  `saturday` int(10) unsigned DEFAULT NULL,
  `sunday` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opening_times_monday_foreign` (`monday`),
  KEY `opening_times_tuesday_foreign` (`tuesday`),
  KEY `opening_times_wednesday_foreign` (`wednesday`),
  KEY `opening_times_thursday_foreign` (`thursday`),
  KEY `opening_times_friday_foreign` (`friday`),
  KEY `opening_times_saturday_foreign` (`saturday`),
  KEY `opening_times_sunday_foreign` (`sunday`),
  CONSTRAINT `opening_times_sunday_foreign` FOREIGN KEY (`sunday`) REFERENCES `days` (`id`),
  CONSTRAINT `opening_times_friday_foreign` FOREIGN KEY (`friday`) REFERENCES `days` (`id`),
  CONSTRAINT `opening_times_monday_foreign` FOREIGN KEY (`monday`) REFERENCES `days` (`id`),
  CONSTRAINT `opening_times_saturday_foreign` FOREIGN KEY (`saturday`) REFERENCES `days` (`id`),
  CONSTRAINT `opening_times_thursday_foreign` FOREIGN KEY (`thursday`) REFERENCES `days` (`id`),
  CONSTRAINT `opening_times_tuesday_foreign` FOREIGN KEY (`tuesday`) REFERENCES `days` (`id`),
  CONSTRAINT `opening_times_wednesday_foreign` FOREIGN KEY (`wednesday`) REFERENCES `days` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opening_times`
--

LOCK TABLES `opening_times` WRITE;
/*!40000 ALTER TABLE `opening_times` DISABLE KEYS */;
INSERT INTO `opening_times` VALUES (1,1,1,1,1,1,1,1,'2016-03-28 22:15:14','2016-03-28 22:15:14'),(2,2,2,2,2,2,2,2,'2016-03-28 22:16:55','2016-03-28 22:16:55');
/*!40000 ALTER TABLE `opening_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization_data`
--

DROP TABLE IF EXISTS `organization_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imones_kodas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pvm_kodas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pavarde` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ind_veikl_nr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization_data`
--

LOCK TABLES `organization_data` WRITE;
/*!40000 ALTER TABLE `organization_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `type` enum('imone','asmuo') COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `opening_time_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organizations_category_id_foreign` (`category_id`),
  KEY `organizations_city_id_foreign` (`city_id`),
  KEY `organizations_opening_time_id_foreign` (`opening_time_id`),
  CONSTRAINT `organizations_opening_time_id_foreign` FOREIGN KEY (`opening_time_id`) REFERENCES `opening_times` (`id`) ON DELETE SET NULL,
  CONSTRAINT `organizations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `organizations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'asdasd','34234234','asdasd','wqdwed',1,'imone','qwdqd qwdq wd q',3,6,1,'2016-03-28 22:15:14','2016-03-28 22:15:14'),(2,'asdasd','34234234','asdasd','wqdwed',1,'imone','qwdqd qwdq wd q',3,6,2,'2016-03-28 22:16:55','2016-03-28 22:16:55');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations_facilities`
--

DROP TABLE IF EXISTS `organizations_facilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations_facilities` (
  `organization_id` int(10) unsigned NOT NULL,
  `facility_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `organizations_facilities_organization_id_index` (`organization_id`),
  KEY `organizations_facilities_facility_id_index` (`facility_id`),
  CONSTRAINT `organizations_facilities_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `organizations_facilities_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations_facilities`
--

LOCK TABLES `organizations_facilities` WRITE;
/*!40000 ALTER TABLE `organizations_facilities` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizations_facilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('spwinwk@gmail.com','17ba22715b2235fa3981cdd4036e29e7343876a7b615b151dac06cbd1794d67f','2016-03-26 22:52:33');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regions_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (71,'Vilnius','vilnius'),(72,'Kaunas','kaunas'),(73,'Šiauliai','siauliai'),(74,'Klaipėda','klaipeda'),(75,'Panevežys','panevezys'),(76,'Utena','utena'),(77,'Alytus','alytus'),(78,'Telšiai','telsiai'),(79,'Marijampolė','marijampole'),(80,'Tauragė','taurage');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'gp_admin','spwinwk@gmail.com','$2y$10$bwwmb3Mwf6Xq4IqWEi1dpOIu.4BEV/IHTfcA3YimiS4DcHECao7lS','XqtdfYCNgZIWgEYImW3lOEGZh4pg0W9Gr9VZARob2cqeUNmDalTZQwzJfrFI',NULL,'2016-03-27 12:32:57');
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

-- Dump completed on 2016-03-29  0:26:20
