-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: miniwp
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20150908000010'),('20150914000010'),('20150914000020'),('20150914000030'),('20150921000010'),('20151012000010'),('20151012000020');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'The best way to be closer to society?'),(2,'Your favorite cooking techniques:');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `responses`
--

DROP TABLE IF EXISTS `responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qustion_id` int(11) DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_315F9F94CAD401D` (`qustion_id`),
  CONSTRAINT `FK_315F9F94CAD401D` FOREIGN KEY (`qustion_id`) REFERENCES `responses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responses`
--

LOCK TABLES `responses` WRITE;
/*!40000 ALTER TABLE `responses` DISABLE KEYS */;
INSERT INTO `responses` VALUES (1,1,'To work in cowering',1),(2,1,'To add so many friends on tumbler as it is possible',2),(3,1,'To eat food at the food court',3),(4,1,'I’m sociopath',4),(5,2,'Spherification',1),(6,2,'Gelification',2),(7,2,'Emulsification',3),(8,2,'I don’t know anything from the aforesaid',4);
/*!40000 ALTER TABLE `responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_responses`
--

DROP TABLE IF EXISTS `user_responses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_responses` (
  `user_id` int(11) NOT NULL,
  `response_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`response_id`),
  KEY `IDX_31BF1270A76ED395` (`user_id`),
  KEY `IDX_31BF1270FBF32840` (`response_id`),
  CONSTRAINT `FK_31BF1270A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_31BF1270FBF32840` FOREIGN KEY (`response_id`) REFERENCES `responses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_responses`
--

LOCK TABLES `user_responses` WRITE;
/*!40000 ALTER TABLE `user_responses` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_responses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_access_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referrer_first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reffered` smallint(6) DEFAULT NULL,
  `match_criteria` smallint(6) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `reg_in_programm` smallint(6) DEFAULT NULL,
  `type_of_survey` smallint(6) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `type_of_recruitment` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E992FC23A8` (`username_canonical`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pioner','pioner',1,'ct8bxtyl93sc0sgccow84go0gkkwww','wo36NaKB30GBWd/vWveYB3EgHRICrP5JaOTuOCsYgNy/1lcU7MGDNNYRnZNdxj7Sq9SRP5Cytd1GgtKRNGU9zw==','2016-11-22 11:54:46',0,0,NULL,NULL,NULL,'a:6:{i:0;s:16:\"ROLE_SUPER_ADMIN\";i:1;s:12:\"ROLE_SE_USER\";i:2;s:12:\"ROLE_PM_USER\";i:3;s:10:\"ROLE_ADMIN\";i:4;s:12:\"ROLE_VIEW_PR\";i:5;s:25:\"ROLE_VIEW_NOT_MATCH_USERS\";}',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pioner@sercret.ru','pioner@sercret.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-22 11:15:17',NULL),(2,'fb715168231932299','fb715168231932299',1,'jf6uex1uwc8wgcs4oc4oco0kkwco0ok','Dxml3LMFx8+vLt9xfEHx21efJTkf7B9sePPojFD69EYP2cJLaH3Xwm51WQW9DcEc4hy3IBHJwDABlIx+ROCPWw==','2016-11-22 11:37:48',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'Петрик П\'яточкин','715168231932299','EAAMw29oA4vkBAFDmT7lqqbrbuGasINVvLBxUMEvSDQITvZBzbjZBnJFZClDVYoEGAtOU8takXTs6MPY1L2AZAppVE7qShVRMBMr2hGVSKxKueo8XpKZCbIBP3EUZCyOc7oHBW04iOPScolc5HCJ9UrEfMfrRstxpAZD',NULL,NULL,NULL,NULL,'kram@test.ru','kram@test.ru','сам себя','Юзер','Тест','+ 7 (929) 123-4567',2,NULL,NULL,NULL,NULL,'2016-11-22 11:37:48',NULL),(3,'pioner-mp','pioner-mp',1,'5eo35egwi1ogk0gckgsck0k4sgsws8k','cpTRXGQ+AnjNvLaE4/NChR/S0hbYjBc23rU2SkDlm/qoemBy8aOpbmyTDxfDnDVLLpfqyXioxj8bmHSGc7B24A==','2016-11-22 12:03:43',0,0,NULL,NULL,NULL,'a:3:{i:0;s:7:\"ROLE_MP\";i:1;s:16:\"ROLE_AGENCY_USER\";i:2;s:25:\"ROLE_VIEW_NOT_MATCH_USERS\";}',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pioner@sercret.ru','pioner@sercret.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-22 11:57:16',NULL),(4,'pioner-rsvp','pioner-rsvp',1,'cfj3aku5mvk8wcw4gkww0o40wk8s0w4','7FgUDiEmcG7VqCyieaMxmHeaS01NeWJbNSbzpVILGJGDdAz8Af+BRRd0tVS6lv3pKkgPx3Yqep9p+EPxBa9ypQ==',NULL,0,0,NULL,NULL,NULL,'a:2:{i:0;s:9:\"ROLE_RSVP\";i:1;s:16:\"ROLE_AGENCY_USER\";}',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pioner@sercret.ru','pioner@sercret.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-22 11:57:25',NULL),(5,'pioner-se','pioner-se',1,'cfj3aku5mvk8wcw4gkww0o40wk8s0w4','7FgUDiEmcG7VqCyieaMxmHeaS01NeWJbNSbzpVILGJGDdAz8Af+BRRd0tVS6lv3pKkgPx3Yqep9p+EPxBa9ypQ==',NULL,0,0,NULL,NULL,NULL,'a:2:{i:0;s:9:\"ROLE_RSVP\";i:1;s:16:\"ROLE_AGENCY_USER\";}',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'pioner@sercret.ru','pioner@sercret.ru',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2016-11-22 11:57:25',NULL),(7,'fb715168231932298','fb715168231932298',1,'jf6uex1uwc8wgcs4oc4oco0kkwco0ok','Dxml3LMFx8+vLt9xfEHx21efJTkf7B9sePPojFD69EYP2cJLaH3Xwm51WQW9DcEc4hy3IBHJwDABlIx+ROCPWw==','2016-11-22 11:37:48',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'Петрик П\'яточкин','715168231932299','EAAMw29oA4vkBAFDmT7lqqbrbuGasINVvLBxUMEvSDQITvZBzbjZBnJFZClDVYoEGAtOU8takXTs6MPY1L2AZAppVE7qShVRMBMr2hGVSKxKueo8XpKZCbIBP3EUZCyOc7oHBW04iOPScolc5HCJ9UrEfMfrRstxpAZD',NULL,NULL,NULL,NULL,'kram@test.ru','kram@test.ru','сам себя','Юзер','Тест','+ 7 (929) 123-4567',2,NULL,NULL,NULL,NULL,'2016-11-22 11:37:48',NULL),(8,'fb715168231932297','fb715168231932297',1,'jf6uex1uwc8wgcs4oc4oco0kkwco0ok','Dxml3LMFx8+vLt9xfEHx21efJTkf7B9sePPojFD69EYP2cJLaH3Xwm51WQW9DcEc4hy3IBHJwDABlIx+ROCPWw==','2016-11-22 11:37:48',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'Петрик П\'яточкин','715168231932299','EAAMw29oA4vkBAFDmT7lqqbrbuGasINVvLBxUMEvSDQITvZBzbjZBnJFZClDVYoEGAtOU8takXTs6MPY1L2AZAppVE7qShVRMBMr2hGVSKxKueo8XpKZCbIBP3EUZCyOc7oHBW04iOPScolc5HCJ9UrEfMfrRstxpAZD',NULL,NULL,NULL,NULL,'kram@test.ru','kram@test.ru','сам себя','Юзер','Тест2','+ 7 (929) 123-4567',2,NULL,NULL,NULL,NULL,'2016-11-22 11:37:48',NULL),(9,'fb715168231932296','fb715168231932296',1,'jf6uex1uwc8wgcs4oc4oco0kkwco0ok','Dxml3LMFx8+vLt9xfEHx21efJTkf7B9sePPojFD69EYP2cJLaH3Xwm51WQW9DcEc4hy3IBHJwDABlIx+ROCPWw==','2016-11-22 11:37:48',0,0,NULL,NULL,NULL,'a:0:{}',0,NULL,'Петрик П\'яточкин','715168231932299','EAAMw29oA4vkBAFDmT7lqqbrbuGasINVvLBxUMEvSDQITvZBzbjZBnJFZClDVYoEGAtOU8takXTs6MPY1L2AZAppVE7qShVRMBMr2hGVSKxKueo8XpKZCbIBP3EUZCyOc7oHBW04iOPScolc5HCJ9UrEfMfrRstxpAZD','lepragram','lepragram',NULL,NULL,'kram@test.ru','kram@test.ru','сам себя','Юзер','Тест3','+ 7 (929) 123-4567',2,NULL,NULL,NULL,NULL,'2016-11-22 11:37:48',NULL);
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

-- Dump completed on 2016-11-22 12:11:26
