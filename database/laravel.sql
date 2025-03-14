-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	9.1.0

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
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appointments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `cccd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `appointment_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (24,2,'Thúy An','trickshotsvn@gmail.com','0816260406',12,'055555555555555','ddd','2025-02-20','approved','2025-02-08 08:37:27','2025-02-20 04:04:52'),(28,2,'Trinh Luong','luong.trinh.yp464@gmail.com','0816260406',23,'21111111111111111','đau bụng quá','2025-02-14','approved','2025-02-13 02:22:04','2025-02-13 02:22:04'),(29,2,'Nguyễn Minh Anh','22010064@st.phenikaa-uni.edu.vn','0816260406',1,'0123456789','hihi','2025-02-28','approved','2025-02-13 02:38:24','2025-02-13 02:38:24'),(30,2,'Nguyễn Minh Anh','22010064@st.phenikaa-uni.edu.vn','0816260406',1,'0123456789','hihi','2025-02-28','approved','2025-02-13 02:39:31','2025-02-13 02:39:31'),(31,2,'Trinh Luong','22010064@st.phenikaa-uni.edu.vn','0816260406',1,'0123456789','hihi','2025-02-28','approved','2025-02-13 02:41:28','2025-02-13 02:41:28'),(32,2,'Trinh Luong','lydich2003@gmail.com','0816260406',1,'0123456789','hihi','2025-02-28','approved','2025-02-13 02:51:46','2025-02-13 02:51:46'),(33,2,'Trinh Luong','lydich2003@gmail.com','0816260406',1,'0123456789','hihi','2025-02-28','approved','2025-02-13 02:52:39','2025-02-13 02:52:39'),(34,2,'Trinh Luong','lydich2003@gmail.com','0816260406',12,'05555555555','hihi','2025-02-28','approved','2025-02-13 02:53:49','2025-02-13 02:53:49'),(35,2,'Nguyên Minh ANh','lydich2003@gmail.com','0816260406',32,'05555555555','222','2025-02-27','approved','2025-02-13 02:59:29','2025-02-13 02:59:29'),(36,2,'Trinh Luong','lydich2003@gmail.com','0816260406',23,'21111111111111111','dđ','2025-02-28','approved','2025-02-13 03:11:05','2025-02-13 03:11:05'),(37,3,'Trinh Luong','sssssssssssssssssss@gmail.com','0816260406',32,'05555555555','ngứa da mặt','2025-03-05','approved','2025-02-18 06:10:05','2025-02-18 06:10:05');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `doctors_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
INSERT INTO `doctors` VALUES (2,'Nguyễn Văn A','a123@gmail.com','$2y$10$49vw8fw0/B1TSWz/Vc9xUON51mbFdevOvD1FE0CpsJXmxqK2gjv.u','Trị nám, tàn nhang','0816260406','Dùng laser hoặc phương pháp khác để làm mờ nám, tàn nhang','img/1736926215_a.jpg','2025-01-15 00:30:15','2025-01-15 00:30:15'),(3,'Nguyễn Văn B','b123@gmail.com','$2y$10$96Bq/HSrkL6ujXMx2/cXlecAo6qN2c.O51vtAZO8THS0BdebFYNX2','Điều trị viêm da','0816260406','Chữa viêm da cơ địa, viêm da dầu, viêm da tiếp xúc','img/1738864493_1736923416_b.jpg','2025-02-06 10:54:54','2025-02-06 10:54:54'),(4,'Nguyễn Văn C','c123@gmail.com','$2y$10$H6nZPd9N0GQt4eOts0l1QuEhIe5QWjB6PsYNdsqt8DFXxm63kXNfa','Trị sẹo rỗ, sẹo lõm','0816260406','Phương pháp PRP, lăn kim, laser để tái tạo da','img/1739029484_1736923780_c.jpg','2025-02-08 08:44:44','2025-02-08 08:44:44'),(5,'Nguyễn Ngoc D','tauseed@test.com','$2y$10$AAum6V7JBiLvJ.yb9wW5F.9UD0K9BK1BU6iyeYbW7223iauxE0vN2','Điều trị mụn','0816260406','Chăm sóc da, điều trị mụn trứng cá, mụn bọc, mụn đầu đen','img/1739347643_doctor_02.jpg','2025-02-12 01:07:23','2025-02-19 12:05:58');
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(255) NOT NULL,
  `patient_phone` varchar(20) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_id` bigint unsigned NOT NULL,
  `service` varchar(255) NOT NULL,
  `status` enum('Đã thanh toán','Chưa thanh toán') NOT NULL DEFAULT 'Chưa thanh toán',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2025_01_02_021510_create_patients_table',1),(6,'2025_01_07_110150_create_doctors_table',2),(7,'2025_01_07_110304_create_appointments_table',2),(8,'2025_01_09_094158_add_role_to_users_table',3),(9,'2025_01_13_162036_create_appointments_table',4),(10,'2025_01_13_171749_create_appointments_table',5),(11,'2025_01_15_081912_create_supports_table',4),(12,'2025_02_15_072146_create_invoices_table',6),(13,'2025_02_15_091610_create_invoices_table',7),(14,'2025_02_19_063753_create_services_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `patients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Tiêm Filler xóa nhăn –  phương pháp trẻ hóa hiện đại','uploads/1739952584_67b591c864648.jpg','2025-02-19 01:09:44','2025-02-19 06:51:34'),(2,'Khám và điều trị các bệnh về Da liễu','uploads/1739952593_67b591d1d48f9.jpg','2025-02-19 01:09:53','2025-02-19 01:09:53'),(3,'Điều trị nám – tàn nhang – bớt Ota – cafe','uploads/1739952608_67b591e0f0144.jpg','2025-02-19 01:10:08','2025-02-19 01:10:08'),(4,'Xóa xăm triệt để và không để lại sẹo','uploads/1739952617_67b591e9adb8c.jpg','2025-02-19 01:10:17','2025-02-19 01:10:17'),(5,'Điều trị triệt lông bằng công nghệ IPL','uploads/1739952626_67b591f291082.jpg','2025-02-19 01:10:26','2025-02-19 01:10:26'),(6,'Điều trị các loại sẹo (lồi, lõm, xấu)','uploads/1739952634_67b591face4df.jpg','2025-02-19 01:10:34','2025-02-19 01:10:34'),(7,'Điều trị Laser nốt ruồi – hạt cơm – u nhú','uploads/1739952641_67b59201ecd6f.jpg','2025-02-19 01:10:41','2025-02-19 01:10:41'),(8,'Phẫu thuật nốt ruồi – bớt bẩm sinh – các u da lành','uploads/1739952649_67b5920935632.jpg','2025-02-19 01:10:49','2025-02-19 01:10:49');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supports`
--

DROP TABLE IF EXISTS `supports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supports`
--

LOCK TABLES `supports` WRITE;
/*!40000 ALTER TABLE `supports` DISABLE KEYS */;
INSERT INTO `supports` VALUES (1,'Trấn Thành',23,'0816260406','sssssssssssssssssss@gmail.com','sssssssssssssssssssss','2025-01-16 02:14:18','2025-01-16 02:14:18'),(2,'Trinh Luong',24,'0816260406','tauseed@test.com','22222222222222222222222','2025-01-16 02:44:25','2025-01-16 02:44:25'),(3,'aaaa',2333,'0816260406','a123@gmail.com','aaa','2025-01-16 02:54:53','2025-01-16 02:54:53'),(4,'Nguyễn Thị D',28,'0816260406','trickshotsvn@gmail.com','hhhhhhhhhhhhhhhhhhhh','2025-01-17 02:43:20','2025-01-17 02:43:20'),(5,'Nguyễn Thcus Thùy Tiên',23,'0816260406','luong.trinh.yp464@gmail.com','22222','2025-01-17 02:43:51','2025-01-17 02:43:51'),(6,'Trinh Phúc',32,'0816260406','trickshotsvn@gmail.com','Tôi mất FB','2025-02-06 10:52:59','2025-02-06 10:52:59');
/*!40000 ALTER TABLE `supports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admindoctor',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Trịnh Phúc Lương','luong.trinh.yp464@gmail.com','2025-01-09 17:00:00','$2y$10$WRcm6NcHNVVW7kE5DMl9OeGTntKKL0bXrl3OFUV2PGOS8DJpjhDCS','9gZzkKWMjOi7aL84Yq8KHqo4J0XrcXlTejHEfTzn3Wu1tdLOTKY3f03RPcSV','2025-01-09 17:00:00','2025-01-09 17:00:00','admin'),(2,'Nguyễn Văn A','a123@gmail.com',NULL,'$2y$10$GRoU0kepATUeWhVd29ZkUeO8aXeKw57pkOc91xRfNF/Muu2pqZQCG',NULL,'2025-01-15 00:30:15','2025-01-15 00:30:15','admindoctor'),(3,'Nguyễn Văn B','b123@gmail.com',NULL,'$2y$10$AZ4GgbAdQqckRoSNirTVPugtdx/8LWgT7tprvTtH/v6z54SCgJnvG',NULL,'2025-02-06 10:54:54','2025-02-06 10:54:54','admindoctor'),(4,'Nguyễn Văn C','c123@gmail.com',NULL,'$2y$10$2iSNC1oUBoP3Eij64fAH4.7xCIRL7ZJyYrJ70ww/rNL7ExUamYYBq',NULL,'2025-02-08 08:44:44','2025-02-08 08:44:44','admindoctor'),(5,'Nguyễn Thị D','tauseed@test.com',NULL,'$2y$10$YyD87xERhJXaIXdecr6aeOPoSZCqdwYoMkYEc76dBki0sqfDpZtGC',NULL,'2025-02-12 01:07:23','2025-02-12 01:07:23','admindoctor');
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

-- Dump completed on 2025-02-21 16:39:09
