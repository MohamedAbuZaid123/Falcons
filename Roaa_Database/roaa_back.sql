-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: localhost    Database: roaa_back
-- ------------------------------------------------------
-- Server version	8.0.41

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
-- Table structure for table `contact_infos`
--

DROP TABLE IF EXISTS `contact_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_infos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `addresses` json DEFAULT NULL,
  `mobiles` json DEFAULT NULL,
  `social_links` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `addresses_ar` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_infos`
--

LOCK TABLES `contact_infos` WRITE;
/*!40000 ALTER TABLE `contact_infos` DISABLE KEYS */;
INSERT INTO `contact_infos` VALUES (1,'[\"86 Abbas elaqad , Nasr City - cairo\", \"219 Elbanfseq district , New Cairo\"]','[\"01097001112\", \"01119111480\"]','{\"x\": null, \"facebook\": \"https://www.facebook.com/Advancd.visions\", \"linkedin\": null, \"whatsapp\": null}','2025-07-21 09:09:09','2025-07-21 11:37:55','[\"86 \\u0634 \\u0639\\u0628\\u0627\\u0633 \\u0627\\u0644\\u0639\\u0642\\u0627\\u062f , \\u0645\\u062f\\u064a\\u0646\\u0629 \\u0646\\u0635\\u0631 - \\u0627\\u0644\\u0642\\u0627\\u0647\\u0631\\u0629\",\"219 \\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u0628\\u0646\\u0641\\u0633\\u062c , \\u0627\\u0644\\u0642\\u0627\\u0647\\u0631\\u0629 \\u0627\\u0644\\u062c\\u062f\\u064a\\u062f\\u0629.\"]');
/*!40000 ALTER TABLE `contact_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_us` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (1,'Mohamed','Abuzaid','01149489369','mohamed.abuzaid01@outlook.com','Hello World !','2025-07-21 10:22:19','2025-07-21 10:22:19'),(3,'Ahmed','3agdrody','01149489369','mohamed.abuzaid01@outlook.com','Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello v','2025-07-22 10:25:39','2025-07-22 10:25:39');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
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
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_ar` text COLLATE utf8mb4_unicode_ci,
  `answer_ar` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'What services does Roaa offer?','Roaa provides a wide range of digital solutions including web development, mobile app development, UI/UX design, and digital marketing to help businesses grow online.',NULL,NULL,'ما هي الخدمات التي تقدمها رؤى؟','تقدم رؤى مجموعة واسعة من الحلول الرقمية بما في ذلك تطوير المواقع والتطبيقات وتصميم واجهات المستخدم والتسويق الرقمي لمساعدة الشركات على النمو عبر الإنترنت.'),(2,'How can I contact Roaa for a project inquiry?','You can reach out to us through the Contact Us page on our website, or email us directly at info@roaa.com. We aim to respond to all inquiries within 24 hours.',NULL,NULL,'كيف يمكنني التواصل مع رؤى للاستفسار عن مشروع؟','يمكنك التواصل معنا من خلال صفحة اتصل بنا على موقعنا أو عبر البريد الإلكتروني info@roaa.com. نسعى للرد على جميع الاستفسارات خلال 24 ساعة.'),(3,'Does Roaa provide support after project delivery?','Yes, Roaa offers ongoing support and maintenance packages to ensure your project continues to run smoothly after launch.',NULL,NULL,'هل تقدم رؤى الدعم بعد تسليم المشروع؟','نعم، تقدم رؤى باقات دعم وصيانة مستمرة لضمان استمرار عمل مشروعك بسلاسة بعد الإطلاق.'),(4,'Can Roaa help with branding and design?','Absolutely! Our team specializes in branding, logo design, and creating a unique visual identity that aligns with your business goals.',NULL,NULL,'هل يمكن لرؤى المساعدة في العلامة التجارية والتصميم؟','بالتأكيد! يتخصص فريقنا في العلامة التجارية وتصميم الشعارات وإنشاء هوية بصرية فريدة تتماشى مع أهداف عملك.'),(5,'What services does Roaa offer?','Roaa provides a wide range of digital solutions including web development, mobile app development, UI/UX design, and digital marketing to help businesses grow online.',NULL,NULL,'ما هي الخدمات التي تقدمها رؤى؟','تقدم رؤى مجموعة واسعة من الحلول الرقمية بما في ذلك تطوير المواقع والتطبيقات وتصميم واجهات المستخدم والتسويق الرقمي لمساعدة الشركات على النمو عبر الإنترنت.'),(6,'How can I contact Roaa for a project inquiry?','You can reach out to us through the Contact Us page on our website, or email us directly at info@roaa.com. We aim to respond to all inquiries within 24 hours.',NULL,NULL,'كيف يمكنني التواصل مع رؤى للاستفسار عن مشروع؟','يمكنك التواصل معنا من خلال صفحة اتصل بنا على موقعنا أو عبر البريد الإلكتروني info@roaa.com. نسعى للرد على جميع الاستفسارات خلال 24 ساعة.'),(7,'Does Roaa provide support after project delivery?','Yes, Roaa offers ongoing support and maintenance packages to ensure your project continues to run smoothly after launch.',NULL,NULL,'هل تقدم رؤى الدعم بعد تسليم المشروع؟','نعم، تقدم رؤى باقات دعم وصيانة مستمرة لضمان استمرار عمل مشروعك بسلاسة بعد الإطلاق.'),(8,'Can Roaa help with branding and design?','Absolutely! Our team specializes in branding, logo design, and creating a unique visual identity that aligns with your business goals.',NULL,NULL,'هل يمكن لرؤى المساعدة في العلامة التجارية والتصميم؟','بالتأكيد! يتخصص فريقنا في العلامة التجارية وتصميم الشعارات وإنشاء هوية بصرية فريدة تتماشى مع أهداف عملك.');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=526 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (72,'2025_05_18_145249_create_users_groups_table',1),(237,'2025_06_17_120154_create_project_images_table',2),(284,'2025_06_19_122300_add_icon_to_services_table',4),(463,'2025_06_16_144755_create_contact_us_table',5),(467,'2025_07_17_081237_add_faqs_to_home_pages_table',6),(500,'2014_10_12_000000_create_users_table',7),(501,'2014_10_12_100000_create_password_reset_tokens_table',7),(502,'2019_08_19_000000_create_failed_jobs_table',7),(503,'2019_12_14_000001_create_personal_access_tokens_table',7),(504,'2024_06_09_000000_create_contact_us_table',7),(505,'2024_06_20_000000_create_contact_infos_table',7),(506,'2025_06_16_144728_create_home_pages_table',7),(507,'2025_06_16_144737_create_projects_table',7),(508,'2025_06_17_091147_create_services_table',7),(509,'2025_06_17_rename_services_images_to_image',7),(510,'2025_06_19_130647_create_project_service_table',7),(511,'2025_07_17_083923_create_faqs_table',7),(512,'2025_07_20_095708_add_addresses_ar_to_contact_info_table',7),(513,'2025_07_20_100407_add_arabic_columns_to_faqs_table',7),(514,'2025_07_20_100521_add_arabic_columns_to_projects_table',7),(515,'2025_07_20_100731_add_arabic_columns_to_services_table',7),(516,'2025_07_21_090822_add_category_ar_to_projects_table',7),(517,'2025_07_22_000000_create_home_page_sections_table',8),(518,'2025_07_22_110716_create_home_page_contents_table',9),(519,'2025_07_22_000000_create_page_sections_table',10),(520,'2025_07_22_000000_create_home_contents_table',11),(521,'2025_07_22_000001_add_locale_to_page_sections_table',11),(522,'2025_07_22_130808_add_icon_to_home_contents_table',12),(523,'2025_07_23_070658_create_page_contents_table',13),(524,'2025_07_26_112826_create_page_contents_table',14),(525,'2025_07_27_123734_create_page_contents_table',15);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_contents`
--

DROP TABLE IF EXISTS `page_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_contents` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_contents`
--

LOCK TABLES `page_contents` WRITE;
/*!40000 ALTER TABLE `page_contents` DISABLE KEYS */;
INSERT INTO `page_contents` VALUES (1,'home','HomeS1','\"{\\\"title_en\\\":\\\"great design , better service\\\",\\\"title_ar\\\":\\\"تصميم رائع ، خدمة أفضل\\\",\\\"boxes\\\":[{\\\"icon\\\":\\\"icons\\\\/zHsFIvdK0gtzd3Cjsdlk936smMO9CBM4GkmbwG6U.svg\\\",\\\"text_en\\\":\\\"int&ext services\\\",\\\"text_ar\\\":\\\"خدمات داخلية وخارجية\\\"},{\\\"icon\\\":\\\"icons\\\\/2i06HwJboP0GfD7DWyLY8xrXo4MtBTQftf4HquFQ.svg\\\",\\\"text_en\\\":\\\"excellent workers\\\",\\\"text_ar\\\":\\\"عمال ممتازون\\\"},{\\\"icon\\\":\\\"icons\\\\/Qtf5DmUaa3vIlLH5uoZJd4W6oZ3MJ9RH87GpfZgA.svg\\\",\\\"text_en\\\":\\\"quick response\\\",\\\"text_ar\\\":\\\"استجابة سريعة\\\"},{\\\"icon\\\":\\\"icons\\\\/EcebDR2Cm5JDNwYMqQXtzQraoO9F0TJtSUQgswO0.svg\\\",\\\"text_en\\\":\\\"quality instrument\\\",\\\"text_ar\\\":\\\"أدوات عالية الجودة\\\"}]}\"','2025-07-27 09:55:14','2025-07-30 06:54:33'),(2,'home','HomeS2','\"{\\\"title_en\\\":\\\"Welcome to ROAA\\\",\\\"title_ar\\\":\\\"مرحبًا بكم في رواء\\\",\\\"descriptions_en\\\":[\\\"Roaa Development, a forward-thinking real estate company since 2000 , is committed to building integrated communities that elevate lifestyles With over 30 projects across egypt , including residential and commercial developments all around egypt with a strong presence in Badr city , el sheikh zayed , October , New cairo , Heliopolis and Al sharqia Governorate.\\\",\\\"We believe that purchasing a property is not just a financial decision, but a personal journey. That\'s why we focus on building trust, providing clarity and offering personalized support.\\\"],\\\"descriptions_ar\\\":[\\\"شركة رواء للتطوير العقاري، شركة رائدة منذ عام 2000، ملتزمة ببناء مجتمعات متكاملة تعزز أنماط الحياة. مع أكثر من 30 مشروعًا في جميع أنحاء مصر، بما في ذلك المشاريع السكنية والتجارية في مدينة بدر، الشيخ زايد، أكتوبر، القاهرة الجديدة، مصر الجديدة، ومحافظة الشرقية.\\\",\\\"نؤمن أن شراء العقار ليس مجرد قرار مالي، ولكنه رحلة شخصية. لذلك نركز على بناء الثقة، وتوفير الوضوح، وتقديم الدعم الشخصي.\\\"],\\\"quote_en\\\":\\\"Cost Less & More Fast\\\",\\\"quote_ar\\\":\\\"التكلفة أقل أكثر سرعة\\\",\\\"icons\\\":[{\\\"icon\\\":\\\"icons\\\\/DYhfDwwA6ygGTfa9xc7gCy7Ygm2A1qZaBRUBCsIK.svg\\\",\\\"label_en\\\":\\\"Design\\\",\\\"label_ar\\\":\\\"تصميم\\\"},{\\\"icon\\\":\\\"icons\\\\/83lpw4M6PAx5Ir8td4uJ6ELgzyG2nbxvgyReQsyY.svg\\\",\\\"label_en\\\":\\\"Build\\\",\\\"label_ar\\\":\\\"بناء\\\"},{\\\"icon\\\":\\\"icons\\\\/IMVBcfU3IsDmTiJZewQevmW3R4dug4BmuosDebjd.svg\\\",\\\"label_en\\\":\\\"Interior\\\",\\\"label_ar\\\":\\\"تصميم داخلى\\\"},{\\\"icon\\\":\\\"icons\\\\/55922Q0r21QhIpryAQ7L49AgoAGXX7i05VtTUT8P.svg\\\",\\\"label_en\\\":\\\"Exterior\\\",\\\"label_ar\\\":\\\"تصميم خارجي\\\"}]}\"','2025-07-27 09:55:14','2025-07-30 05:25:09'),(3,'home','HomeS3','\"{\\\"boxes\\\":[{\\\"title_en\\\":\\\"Int-Ext Residents\\\",\\\"title_ar\\\":\\\"مشاريع داخلية وخارجية\\\",\\\"desc_en\\\":\\\"We Build Inside - Out Homes That Blend Comfort, Quality, Elegance, Like Modern Apartment Designs, Marble Flooring, And Facades.\\\",\\\"desc_ar\\\":\\\"نحن نبني منازل من الداخل والخارج تجمع بين الراحة والجودة\\\\r\\\\n                  والأناقة، مثل تصميمات الشقق الحديثة وأرضيات الرخام والواجهات.\\\",\\\"image\\\":\\\"icons\\\\/6ijbtNUIxU2UaHP5adEdiWLUr6PN0aGRobRK8OD5.webp\\\"},{\\\"title_en\\\":\\\"Commercial\\\",\\\"title_ar\\\":\\\"تجارية\\\",\\\"desc_en\\\":\\\"Functional , modern spaces tailored to your business vision , like clinics , offices , cafes .\\\",\\\"desc_ar\\\":\\\"ساحات عملية وحديثة مصممة خصيصًا لتتناسب مع رؤية عملك، مثل\\\\r\\\\n                  العيادات والمكاتب والمقاهي.\\\",\\\"image\\\":\\\"icons\\\\/71CRX48fKy5RPs0ndhJozkYyxj6Vsefqbh8uoPty.webp\\\"}]}\"','2025-07-28 10:07:08','2025-07-30 06:58:45'),(4,'about','AboutS1','\"{\\\"question_en\\\":\\\"who we are ?\\\",\\\"question_ar\\\":\\\"من نحن ؟\\\",\\\"title_en\\\":\\\"Welcome to ROAA\\\",\\\"title_ar\\\":\\\"مرحبا بكم في رؤى\\\",\\\"descriptions_en\\\":[\\\"Roaa Development, a forward-thinking real estate company since 2000 , is committed to building integrated communities that elevate lifestyles With over 30 projects across egypt , including residential and commercial developments all around egypt with a strong presence in Badr city , el sheikh zayed , October , New cairo , Heliopolis and Al sharqia Governorate.\\\",\\\"We believe that purchasing a property is not just a financial decision, but a personal journey. That’s why we focus on building trust, providing clarity and offering personalized support.\\\"],\\\"descriptions_ar\\\":[\\\"رؤى للتطوير العقاري، شركة عقارية رائدة تأسست عام ٢٠٠٠، ملتزمة ببناء مجتمعات متكاملة ترتقي بأنماط الحياة.\\\",\\\"أكثر من ٣٠ مشروعًا في جميع أنحاء مصر، تشمل مشاريع سكنية وتجارية في جميع أنحاء مصر، مع حضور قوي في مدينة بدر، والشيخ زايد، وأكتوبر، والقاهرة الجديدة، ومصر الجديدة، ومحافظة الشرقية.\\\",\\\"نؤمن بأن شراء عقار ليس مجرد قرار مالي، بل هو رحلة شخصية. ولذلك، نركز على بناء الثقة، وتوفير الوضوح، وتقديم الدعم الشخصي.\\\"],\\\"image\\\":\\\"icons\\\\/MR4SQokp85us0v2BnyMj19QCprG5DS61vlfNu2HP.webp\\\"}\"','2025-07-28 10:40:50','2025-07-30 05:52:07'),(5,'about','AboutS2','\"{\\\"header_en\\\":\\\"Innovating for a Better Tomorrow.\\\",\\\"header_ar\\\":\\\"الابتكار من أجل غد أفضل.\\\",\\\"boxes\\\":[{\\\"title_en\\\":\\\"Vision\\\",\\\"title_ar\\\":\\\"رؤيتنا\\\",\\\"descriptions_en\\\":\\\"We deliver innovative residential and commercial developments that elevate lifestyles and ensure lasting market impact.\\\",\\\"descriptions_ar\\\":\\\"نحن نقدم مشاريع سكنية وتجارية مبتكرة تعمل على الارتقاء بأنماط الحياة وضمان التأثير الدائم على السوق.\\\",\\\"image\\\":\\\"icons\\\\/y5jQ9m9Qe4G9yjIi7aCegnXxxBQLUlz3FWZGzuKZ.webp\\\",\\\"description_en\\\":\\\"\\\",\\\"description_ar\\\":\\\"\\\"},{\\\"title_en\\\":\\\"Mission\\\",\\\"title_ar\\\":\\\"مهمتنا\\\",\\\"descriptions_en\\\":\\\"Add value by delivering high-quality, trusted developments that enhance lives through innovation, sustainability, and tailored solutions.\\\",\\\"descriptions_ar\\\":\\\"إضافة القيمة من خلال تقديم تطورات عالية الجودة وموثوقة تعمل على تحسين الحياة من خلال الابتكار والاستدامة والحلول المخصصة.\\\",\\\"image\\\":\\\"icons\\\\/6MLNZB4eITOX0uEmnF1v8BfMoN6Oe3E0nx4vVvLz.webp\\\",\\\"description_en\\\":\\\"\\\",\\\"description_ar\\\":\\\"\\\"},{\\\"title_en\\\":\\\"objective\\\",\\\"title_ar\\\":\\\"هدفنا\\\",\\\"descriptions_en\\\":[\\\"Grow with impactful residential and commercial projects.\\\",\\\"Ensure client satisfaction through quality and transparency.\\\",\\\"Lead in sustainable and future-ready real estate solutions.\\\",\\\"Expand our market presence locally and regionally.\\\"],\\\"descriptions_ar\\\":[\\\"نمو مستمر مع مشاريع سكنية وتجارية مؤثرة\\\",\\\"ضمان رضا العملاء من خلال الجودة والشفافية.\\\",\\\"الريادة في حلول العقارات المستدامة والجاهزة للمستقبل.\\\",\\\"توسيع حضورنا في السوق المحلي والإقليمي.\\\"],\\\"image\\\":\\\"icons\\\\/Kf6FSGqr9eiiYaNbaeFisijk1qFN02P4YXWI1oMz.webp\\\"}]}\"','2025-07-28 12:28:42','2025-07-30 05:50:09'),(6,'home','hero','\"{\\\"title_en\\\":\\\"ROAA\\\",\\\"title_ar\\\":\\\"رؤى\\\",\\\"descriptions_en\\\":[\\\"We Design It.\\\",\\\"We Build It.\\\",\\\"You Love It.\\\"],\\\"descriptions_ar\\\":[\\\"نحن نصممه\\\",\\\"نحن نبنيه\\\",\\\"أنت تحبه\\\"],\\\"button\\\":{\\\"text_en\\\":\\\"See Our Work\\\",\\\"text_ar\\\":\\\"عرض أعمالنا\\\",\\\"link\\\":\\\"http:\\\\/\\\\/localhost:8000\\\\/projects\\\"}}\"','2025-07-29 08:53:14','2025-07-30 06:06:55'),(7,'about','hero','\"{\\\"title_en\\\":\\\"About ROAA\\\",\\\"title_ar\\\":\\\"عن رؤى\\\",\\\"descriptions_en\\\":[\\\"At Roaa Development, We turn visions into meaningful spaces\\\",\\\"it deserves meaning, comfort, and a future.\\\"],\\\"descriptions_ar\\\":[\\\"في شركة رؤى للتطوير، نحول الرؤى إلى مساحات ذات معنى\\\",\\\"فهي تستحق المعنى والراحة والمستقبل.\\\"]}\"','2025-07-29 08:53:14','2025-07-29 09:31:54'),(8,'services','hero','\"{\\\"title_en\\\":\\\"Our Services\\\",\\\"title_ar\\\":\\\"الخدمات\\\",\\\"descriptions_en\\\":[\\\"Offering premium\\\",\\\"quality services tailored to your needs\\\"],\\\"descriptions_ar\\\":[\\\"تقديم خدمات عالية الجودة مصممة خصيصًا لتلبية احتياجاتك\\\"]}\"','2025-07-29 08:53:14','2025-07-29 09:05:38'),(9,'projects','hero','\"{\\\"title_en\\\":\\\"Our Projects\\\",\\\"title_ar\\\":\\\"مشاريعنا\\\",\\\"descriptions_en\\\":[\\\"Where Great Designs Become Solid Foundations\\\"],\\\"descriptions_ar\\\":[\\\"حيث تتحول التصميمات الرائعة إلى أسس متينة\\\"]}\"','2025-07-29 08:53:14','2025-07-29 09:05:38'),(10,'contact','hero','\"{\\\"title_en\\\":\\\"Contact U\\\",\\\"title_ar\\\":\\\"اتصل بنا\\\",\\\"descriptions_en\\\":[\\\"Let’s Build the Future Together.\\\",\\\"Roaa Development is by your side every step of the way.\\\"],\\\"descriptions_ar\\\":[\\\"لنبنِ المستقبل معًا.\\\",\\\"شركة رؤى للتطوير بجانبكم في كل خطوة.\\\"]}\"','2025-07-29 08:53:14','2025-07-29 09:40:18');
/*!40000 ALTER TABLE `page_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
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
  `expires_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `project_service`
--

DROP TABLE IF EXISTS `project_service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_service` (
  `project_id` bigint unsigned NOT NULL,
  `service_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`project_id`,`service_id`),
  KEY `project_service_service_id_foreign` (`service_id`),
  CONSTRAINT `project_service_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_service`
--

LOCK TABLES `project_service` WRITE;
/*!40000 ALTER TABLE `project_service` DISABLE KEYS */;
INSERT INTO `project_service` VALUES (1,5,NULL,NULL),(1,6,NULL,NULL),(1,7,NULL,NULL),(1,8,NULL,NULL);
/*!40000 ALTER TABLE `project_service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `images` json DEFAULT NULL,
  `title_ar` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'2025-07-21 09:56:17','2025-07-21 11:08:28','Bytesway','Bytesway','Interroir & Exterroir',1,'\"[\\\"project_images\\\\/6xedLwCsDQsozbTHjOaYlXOBvlT4Fr3tT8iXBJwy.webp\\\",\\\"project_images\\\\/Vz78WHp3nDRLtas7ipjekhJOyXK5dCpumn1lMoBG.webp\\\",\\\"project_images\\\\/PaNPwS2xc4SDkGGpsCLLv3reh52YYYkXm1emR6ce.webp\\\",\\\"project_images\\\\/L2h4j79yv6duCEVwWIK9D3tDHUzbs7gkLB9NCD4i.webp\\\"]\"','بايتس واي','بايتس واي لوكيشن');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dark_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `title_ar` text COLLATE utf8mb4_unicode_ci,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'2025-07-15 09:06:55','2025-07-30 08:34:39','Architectural Documentation','Architectural Documentation: This refers to the comprehensive set of drawings, specifications, and other documents that detail the design of a building or structure. It includes floor plans, elevations, sections, and details necessary for obtaining permits, bidding, and construction.','services_images/ENT8LQxDAck7D82p59h7Avan9LgKgWOaw1gTsCNW.png','service_icons/BnYA5cS042xdzZp9iyz7EhciwD09sUgWRWGJBUxO.svg','service_icons/69xIT0U3n1slR9JB7iXFvxucHN5BWzztmTMgOicp.svg',1,'التصميم الداخلي والخارجي','هي مجموعة شاملة من الرسومات والمواصفات والوثائق الأخرى التي تُفصّل تصميم المبنى أو الهيكل. وتشمل مخططات الطوابق، والواجهات، والمقاطع، والتفاصيل اللازمة للحصول على التصاريح، وتقديم العطاءات، والبناء.'),(2,'2025-07-15 09:08:29','2025-07-21 10:18:20','Engineering Drawing Services','Engineering Drawing Services: This involves creating precise and detailed technical drawings that communicate how something is to be constructed or manufactured. These drawings adhere to specific standards and include dimensions, materials, and assembly instructions, serving as a blueprint for engineering projects.','services_images/M0h5MUaBciHKVtc319yZX8fyk7T8B7ZqwA9c4B9f.png','service_icons/dYtNedoiCFiPMAhlclKtmVyC4YdJeM7bZVNxWGfv.svg','service_icons/Y7IvAZ8XMYHthqgvgnZi2sKlph4GZiIBdEfYrEWT.svg',1,'رسومات معمارية','تتضمن إعداد رسومات فنية دقيقة ومفصلة توضح كيفية بناء أو تصنيع شيء ما. تلتزم هذه الرسومات بمعايير محددة، وتتضمن الأبعاد والمواد وتعليمات التجميع، لتكون بمثابة مخططات للمشاريع الهندسية.'),(3,'2025-07-15 09:13:15','2025-07-21 10:18:34','Architectural Plan Development','This is the process of creating and refining the detailed drawings and layouts for a building project. It involves translating conceptual designs into buildable plans, considering factors like space utilization, functionality, building codes, and client requirements.','services_images/ZNfGbha6BsGamxOhI9KJvuYUfhWmZTOHF9rxoJPv.png','service_icons/6GrBWk9J8293UBgwYDN3Ws2DKHHpGWrnYovkcEES.svg','service_icons/PDwaztrpLCaVx6CzuNZkWW2OPg3h6QxiY9pIWrmZ.svg',1,'التخطيط المعماري','هي عملية إنشاء وصقل الرسومات والمخططات التفصيلية لمشروع بناء. تتضمن هذه العملية ترجمة التصاميم المفاهيمية إلى مخططات قابلة للتنفيذ، مع مراعاة عوامل مثل استغلال المساحة، والوظائف، وقوانين البناء، ومتطلبات العميل.'),(4,'2025-07-15 09:15:24','2025-07-21 10:18:46','3D Design Solutions','This service utilizes specialized software to create three-dimensional representations of objects, spaces, or buildings. These models offer a realistic visualization of the final product, allowing for better design evaluation, communication, and marketing.','services_images/eLPXlJPxxcILOo4FDLO1kxrcoUS0mssbme5umZxy.png','service_icons/RTPrZyNVLduMzt5jqvuZJt3wWoRN9pEfqZWs6xL9.svg','service_icons/CJpKyI43Bdm4TlRba9rkZzOlED0uNFnVhAc2ItWQ.svg',1,'تصميم ثلاثي الأبعاد','تستخدم هذه الخدمة برامج متخصصة لإنشاء نماذج ثلاثية الأبعاد للأشياء أو المساحات أو المباني. توفر هذه النماذج تصورًا واقعيًا للمنتج النهائي، مما يسمح بتقييم التصميم والتواصل والتسويق بشكل أفضل.'),(5,'2025-07-15 09:16:25','2025-07-29 09:18:33','Interior & Exterior Design','This encompasses the art and science of enhancing the interior and exterior spaces of a building to achieve a healthier and more aesthetically pleasing environment for the people using it.\r\nInterior Design: Focuses on aspects like space planning, color schemes, lighting, furniture selection, and material finishes within a building.\r\nExterior Design: Deals with the building\'s facade, landscaping, outdoor living spaces, and overall visual appeal from the outside.','services_images/r0d3uc8LLJxIlNAL0qBJDctSZzzlx4heJDRz94u0.png','service_icons/msgNQ08VPBUrmVCITEtgnvEQt6E3N2uNrEW2IanU.svg','service_icons/MH2Qj9AickTCiV8OmZyMfthUoEy37tpyvOiRpocj.svg',1,'الخطط المعمارية',NULL),(6,'2025-07-15 09:17:15','2025-07-21 10:19:27','Design & Implementation Services','This is a comprehensive service that covers both the creative design phase and the practical execution or construction phase of a project. It ensures a seamless transition from concept to reality, often involving project management to oversee the implementation.','services_images/Etyfv3e6S1b105wC0snTBqTv5TF6sRtvZJDn8PzY.png','service_icons/P4yPNRP2ifEMr4MoRwsezHGLK2j9I1BRImSAuY4k.svg','service_icons/RJZeJ8Hwi0Rqxx0D0wm1VieBE2q0JKwurTDbnBAH.svg',1,'خدمات التصميم والتنفيذ','هذه خدمة شاملة تُغطي مرحلتي التصميم الإبداعي والتنفيذ العملي للمشروع. تضمن هذه الخدمة انتقالًا سلسًا من الفكرة إلى الواقع، وغالبًا ما تتضمن إدارة المشروع للإشراف على التنفيذ.'),(7,'2025-07-15 09:18:02','2025-07-21 10:19:41','Foundation Services','In a construction context, this refers to the design and construction of the substructure of a building that supports the entire load. This includes site preparation, excavation, and the installation of footings, slabs, or other foundation types appropriate for the soil conditions and building design.','services_images/CMf3Jjkq7RYYmcV4jLZ8V6b5orXOXMU3yWngjDCD.png','service_icons/gjbRq23OaatutZNEoqispfWn7XJOMqWZrG4eZULn.svg','service_icons/Ew1KD890etNJ39HvTLqmy9JsWrH5hwjzdRxhjBfh.svg',1,'خدمات تأسيس','في سياق الإنشاءات، يشير هذا إلى تصميم وبناء البنية التحتية للمبنى التي تتحمل الحمل بأكمله. ويشمل ذلك تجهيز الموقع، والحفر، وتركيب القواعد والألواح، أو أنواع الأساسات الأخرى المناسبة لظروف التربة وتصميم المبنى.'),(8,'2025-07-15 09:18:53','2025-07-21 10:19:52','Furniture & Furnishing Services','This involves the selection, sourcing, and placement of furniture, fixtures, and equipment (FF&E) to complete an interior space according to the design plan. It can range from selecting individual pieces to outfitting entire buildings.','services_images/JdiV2yiCWv8P0KtSAFFYTirYN7IBS3NX6GR1Nicn.png','service_icons/ERgCz0AF9X7RH3oam2pt360LVnnSORlW22L0kG6S.svg','service_icons/N27IoU2DmIxnl8cfuF4eTzHO9wHwdRWV0J1MJiij.svg',1,'المفروشات الداخلية','تضمن ذلك اختيار وتوريد وتوزيع الأثاث والتجهيزات والمعدات (FF&E) لإكمال المساحة الداخلية وفقًا لخطة التصميم. ويمكن أن يتراوح ذلك بين اختيار قطع فردية وتجهيز المباني بأكملها.'),(9,'2025-07-15 09:19:29','2025-07-21 10:20:11','Commercial Finishing & Decoration','This service focuses on the final stages of preparing a commercial space (like offices, retail stores, or restaurants) for occupancy. It includes applying surface treatments such as paint, wallpaper, flooring, and installing decorative elements to create the desired ambiance and functionality.','services_images/n16PEmafRELTtxND1doJ0xs6tlKvRhfRb5PZ8fCx.png','service_icons/vr1o7ndTnxBO8Cce1ihTvB2SwOvbRCo4fkVXFIy9.svg','service_icons/FfSi0tvDuTg5OoThxxHiaPbdgYZihqkfnqKZ4A1K.svg',1,'التشطيبات والديكورات التجارية','تُركز هذه الخدمة على المراحل النهائية لتجهيز المساحات التجارية (مثل المكاتب، ومتاجر التجزئة، والمطاعم) للسكن. وتشمل تطبيق معالجات الأسطح كالدهانات، وورق الجدران، والأرضيات، وتركيب عناصر ديكورية لخلق الأجواء والوظائف المطلوبة.'),(10,'2025-07-15 09:20:33','2025-07-21 10:20:22','Integrated Finishing Solutions','This is a holistic approach to the final stages of a construction or renovation project. It combines various finishing services (like painting, flooring, plastering, carpentry, and decoration) into a coordinated package, often managed by a single entity to ensure consistency, quality, and efficiency.','services_images/XJ6PaGYMjYJh4yVQmdMgshVH08jN6EaVsvso6Iwl.png','service_icons/hodMzorEBf6trTo5s64Tx9T76d5Rswy1CY4XbJAU.svg','service_icons/wuGmjrloG8Pw9cpxL7jEK6BaDH0a3aROstN5DorY.svg',1,'تشطيب متكامل','هذا نهج شامل للمراحل النهائية لمشروع بناء أو تجديد. يجمع هذا النهج خدمات تشطيب متنوعة (مثل الدهانات، والأرضيات، والتجصيص، والنجارة، والديكور) في حزمة متكاملة، غالبًا ما تُدار من قِبل جهة واحدة لضمان الاتساق والجودة والكفاءة.'),(11,'2025-07-15 09:21:08','2025-07-21 10:20:34','Wood Cladding Solutions','Wood Cladding Solutions: This refers to the application of wooden panels or boards to the interior or exterior surfaces of a building. Wood cladding can enhance aesthetics, provide insulation, and offer a durable and natural finish.','services_images/jC6AiCYTwIJjRENauwGlETvBADkpOoGUl2c20TbH.png','service_icons/knevFUyUA8gqDkgUEhl2LljsFPme9o8RsreAoHIP.svg','service_icons/MbgmhL9j6gB99sSqcV2v0KS38bB983yHjKMvM0TP.svg',1,'الكسوة الخشبية','حلول تكسية الخشب: يشير ذلك إلى استخدام الألواح الخشبية على الأسطح الداخلية والخارجية للمباني. تُحسّن الكسوة الخشبية المظهر الجمالي، وتوفر عزلًا حراريًا، وتمنح مظهرًا متينًا وطبيعيًا.');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
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
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_mobile_unique` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mohamed','Mohamed@gmail.com',NULL,'01002003002','$2y$12$O3f.JoFHdP2xN6Gu0Z.QNeDjtRbd2mY/mrPb0.KqHYIRbnfk1daEy',NULL,1,NULL,'2025-07-30 08:21:18','2025-07-30 08:21:18'),(2,'Test','Test@email.com',NULL,'01002003000','$2y$12$CeP8TyhPwa9qWm5kabPP..e18cspKSWBpcoAD0UMGSlKft3PUxO6e',NULL,1,NULL,'2025-07-30 08:28:58','2025-07-30 08:28:58');
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

-- Dump completed on 2025-07-30 14:51:27
