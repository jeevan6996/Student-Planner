-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: SMS
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
-- Current Database: `SMS`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `SMS` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `SMS`;

--
-- Table structure for table `Attendance_Transaction`
--

DROP TABLE IF EXISTS `Attendance_Transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Attendance_Transaction` (
  `StudentID` int(11) NOT NULL,
  `SubjectName` varchar(25) NOT NULL,
  `Date` date NOT NULL,
  `Present` enum('A','P') NOT NULL,
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `Attendance_Transaction_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student_Master` (`Student_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Attendance_Transaction`
--

LOCK TABLES `Attendance_Transaction` WRITE;
/*!40000 ALTER TABLE `Attendance_Transaction` DISABLE KEYS */;
INSERT INTO `Attendance_Transaction` VALUES (7,'HCI','2017-10-02','P'),(7,'TOC','2017-10-02','A'),(7,'SEPM','2017-10-02','A'),(7,'DBMS','2017-10-02','P'),(8,'DBMS','2017-10-09','P'),(8,'TOC','2017-10-09','A'),(8,'HCI','2017-10-09','P'),(8,'SEPM','2017-10-09','P'),(8,'DBMS','2017-10-10','A'),(7,'OS','2017-10-11','P'),(7,'OS','2017-02-03','P'),(7,'SEPM','2017-10-16','A'),(7,'SEPM','2017-10-16','P'),(7,'HCI','2017-10-11','A'),(7,'TOC','2017-10-09','P'),(7,'TOC','2017-10-09','P'),(9,'DBMS','2017-10-17','P'),(9,'OS','2017-10-17','A'),(9,'SEPM','2017-10-17','P');
/*!40000 ALTER TABLE `Attendance_Transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Login_Master`
--

DROP TABLE IF EXISTS `Login_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Login_Master` (
  `User_Name` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `StudentID` int(11) NOT NULL,
  PRIMARY KEY (`User_Name`),
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `Login_Master_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student_Master` (`Student_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Login_Master`
--

LOCK TABLES `Login_Master` WRITE;
/*!40000 ALTER TABLE `Login_Master` DISABLE KEYS */;
INSERT INTO `Login_Master` VALUES ('abhi123','pass123',9),('jeevan123','pass123',7),('sam','sam1234',8);
/*!40000 ALTER TABLE `Login_Master` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER LoginTrans AFTER INSERT ON Login_Master FOR EACH ROW BEGIN insert into Login_Transaction values(new.User_Name,'N'); END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Login_Transaction`
--

DROP TABLE IF EXISTS `Login_Transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Login_Transaction` (
  `UserName` varchar(30) NOT NULL,
  `Login_Status` varchar(1) NOT NULL,
  KEY `UserName` (`UserName`),
  CONSTRAINT `Login_Transaction_ibfk_1` FOREIGN KEY (`UserName`) REFERENCES `Login_Master` (`User_Name`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Login_Transaction`
--

LOCK TABLES `Login_Transaction` WRITE;
/*!40000 ALTER TABLE `Login_Transaction` DISABLE KEYS */;
INSERT INTO `Login_Transaction` VALUES ('jeevan123','N'),('sam','N'),('abhi123','N');
/*!40000 ALTER TABLE `Login_Transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Student_Master`
--

DROP TABLE IF EXISTS `Student_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student_Master` (
  `Student_ID` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Attendance_Criteria` double(4,2) NOT NULL,
  PRIMARY KEY (`Student_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student_Master`
--

LOCK TABLES `Student_Master` WRITE;
/*!40000 ALTER TABLE `Student_Master` DISABLE KEYS */;
INSERT INTO `Student_Master` VALUES (7,'Jeevan','Pawar','M','jeevan@gmail.com','7273412932',75.00),(8,'Samira','Raje','F','sam@gmail.com','9887452144',75.00),(9,'Abhishek','Karanjekar','M','abhikar17@gmail.com','1234567890',75.00);
/*!40000 ALTER TABLE `Student_Master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Subject_Master`
--

DROP TABLE IF EXISTS `Subject_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Subject_Master` (
  `StudentID` int(11) NOT NULL,
  `Subject_Name` varchar(25) NOT NULL,
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `Subject_Master_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student_Master` (`Student_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Subject_Master`
--

LOCK TABLES `Subject_Master` WRITE;
/*!40000 ALTER TABLE `Subject_Master` DISABLE KEYS */;
INSERT INTO `Subject_Master` VALUES (7,'OS'),(7,'HCI'),(7,'TOC'),(7,'SEPM'),(7,'DBMS'),(8,'DBMS'),(8,'OS'),(8,'TOC'),(8,'HCI'),(8,'SEPM'),(9,'DBMS'),(9,'OS'),(9,'HCI'),(9,'SEPM'),(9,'TOC');
/*!40000 ALTER TABLE `Subject_Master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TimeTable_Master`
--

DROP TABLE IF EXISTS `TimeTable_Master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TimeTable_Master` (
  `StudentID` int(11) NOT NULL,
  `SubjectName` varchar(25) NOT NULL,
  `MON` varchar(1) DEFAULT NULL,
  `TUES` varchar(1) DEFAULT NULL,
  `WED` varchar(1) DEFAULT NULL,
  `THURS` varchar(1) DEFAULT NULL,
  `FRI` varchar(1) DEFAULT NULL,
  `SAT` varchar(1) DEFAULT NULL,
  `SUN` varchar(1) DEFAULT NULL,
  KEY `StudentID` (`StudentID`),
  CONSTRAINT `TimeTable_Master_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student_Master` (`Student_ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TimeTable_Master`
--

LOCK TABLES `TimeTable_Master` WRITE;
/*!40000 ALTER TABLE `TimeTable_Master` DISABLE KEYS */;
INSERT INTO `TimeTable_Master` VALUES (7,'OS','N','Y','Y','Y','Y','N','N'),(7,'HCI','Y','N','Y','N','Y','N','N'),(7,'TOC','Y','N','Y','Y','Y','N','N'),(7,'SEPM','Y','Y','N','N','Y','N','N'),(7,'DBMS','Y','Y','Y','Y','N','N','N'),(8,'DBMS','Y','Y','Y','Y','N','N','N'),(8,'OS','N','Y','Y','Y','Y','N','N'),(8,'TOC','Y','N','Y','Y','Y','N','N'),(8,'HCI','Y','N','N','N','Y','N','N'),(8,'SEPM','Y','Y','Y','N','Y','N','N'),(9,'DBMS','Y','Y','Y','Y','N','N','N'),(9,'OS','N','Y','Y','Y','Y','N','N'),(9,'HCI','Y','N','Y','N','Y','N','N'),(9,'SEPM','Y','Y','N','N','Y','N','N'),(9,'TOC','Y','N','Y','Y','Y','N','N');
/*!40000 ALTER TABLE `TimeTable_Master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'SMS'
--
/*!50003 DROP FUNCTION IF EXISTS `AttendedSessions` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `AttendedSessions`(ID int,Sub varchar(25)) RETURNS int(11)
    DETERMINISTIC
BEGIN
     Declare attended int default 0;
     select count(*) into attended from Attendance_Transaction where StudentID=ID and SubjectName=Sub and Present='P';
     return attended;
     END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `CalculateAttendance` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `CalculateAttendance`(ID int,Sub varchar(25)) RETURNS double(5,2)
    DETERMINISTIC
BEGIN
     Declare attended int default 0;
     Declare total int default 1;
     Declare attendance real(5,2);
     select count(*) into total from Attendance_Transaction where StudentID=ID and SubjectName=Sub;
     if total=0 then
     SET total=1;
     end if;
     select count(*) into attended from Attendance_Transaction where StudentID=ID and SubjectName=Sub and Present='P';
     SET attendance=(attended/total)*100;
     return attendance;
     END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `LoggedInStudent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `LoggedInStudent`() RETURNS int(11)
    DETERMINISTIC
BEGIN
     Declare ID int;
     select StudentID into ID from Login_Master where User_Name=(select UserName from Login_Transaction where Login_Status='Y');
     return ID;
     END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `TotalSessions` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `TotalSessions`(ID int,Sub varchar(25)) RETURNS int(11)
    DETERMINISTIC
BEGIN
     Declare total int default 0;
     select count(*) into total from Attendance_Transaction where StudentID=ID and SubjectName=Sub;
     return total;
     END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `UniqueUserName` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `UniqueUserName`(User varchar(30)) RETURNS int(11)
    DETERMINISTIC
BEGIN
     Declare cnt int default 0;
     select count(*) into cnt from Login_Master where User_Name=User;
     if cnt = 0 then return 1;
     else return -1;
     end if;
     END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ResetLoginTransaction` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ResetLoginTransaction`()
BEGIN
       update Login_Transaction set Login_Status='N';
       END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-19 11:45:52
