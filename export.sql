-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: teamproject
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `doctor_name` varchar(20) DEFAULT NULL,
  `patient_name` varchar(20) DEFAULT NULL,
  `date_day` varchar(2) DEFAULT NULL,
  `date_month` varchar(2) DEFAULT NULL,
  `date_year` varchar(4) DEFAULT NULL,
  `symptoms` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
INSERT INTO `appointment` VALUES ('Alexandre','Berenice','15','01','2018','Stomachache'),('Keven','Berenice','30','03','2018','Toothache'),('Victor','Berenice','10','10','2018','Abdominal pain'),('Alexandre','Chloe','27','04','2018','Headache'),('Keven','Chloe','19','02','2018','Sensitive teeth'),('Victor','Chloe','22','07','2018','Stomachache'),('Alexandre','Etienne','28','09','2018','Nausea'),('Keven','Etienne','17','07','2018','Toothache'),('Victor','Etienne','01','05','2018','Nausea'),('Alexandre','Martin','08','04','2018','Ear problems'),('Keven','Martin','17','12','2018','Mouth sores'),('Victor','Martin','15','12','2018','Diarrhea'),('Alexandre','Redouan','28','04','2018','Fever'),('Keven','Redouan','20','02','2018','Bad breath'),('Victor','Redouan','06','09','2018','Constipation'),('Alexandre','Julien','11','10','2018','Cough'),('Keven','Julien','19','07','2018','Jaw Pain'),('Victor','Julien','27','01','2018','Cough'),('Alexandre','Quentin','23','03','2018','Fever'),('Keven','Quentin','18','06','2018','Dry Mouth'),('Victor','Quentin','14','08','2018','Headache'),('Alexandre','Yohan','27','11','2018','Cough'),('Keven','Yohan','04','12','2018','Oral piercing infection'),('Victor','Yohan','19','07','2018','Headache'),('Alexandre','Berenice','22','01','2018','Cold and Flu'),('Keven','Chloe','06','04','2018','Mouth sores'),('Victor','Etienne','15','08','2018','Fever'),('Alexandre','Martin','02','03','2018','Diarrhea'),('Keven','Redouan','11','10','2018','Stained teeth'),('Victor','Julien','08','12','2018','Diarrhea');
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `doctor_id` int(5) NOT NULL DEFAULT '0',
  `doctor_name` varchar(20) DEFAULT NULL,
  `doctor_phone` varchar(10) DEFAULT NULL,
  `doctor_speciality` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES (0,'Alexandre','0123456789','Generalist'),(1,'Keven','9876543210','Dentist'),(2,'Victor','0147258369','Pediatrician');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `patient_id` int(5) NOT NULL DEFAULT '0',
  `patient_name` varchar(20) DEFAULT NULL,
  `patient_phone` varchar(10) DEFAULT NULL,
  `patient_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES (10000,'Berenice','5597659955','4150 Heritage Road'),(20000,'Chloe','4799354589','1311 Cambridge Court'),(30000,'Etienne','5104440558','4516 Thompson Drive'),(40000,'Martin','5179648083','1246 Ben Street'),(50000,'Redouan','8067231016','4752 Smithfield Avenue'),(60000,'Julien','5086332390','819 Kovar Road'),(70000,'Quentin','3104252571','2150 Doctors Drive'),(80000,'Yohan','8142663737','2120 Coal Street');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-29 15:08:37
