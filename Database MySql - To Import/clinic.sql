-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2016 at 07:30 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

DROP TABLE IF EXISTS `analysis`;
CREATE TABLE IF NOT EXISTS `analysis` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinic_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `analysis`
--

INSERT INTO `analysis` (`id`, `name`, `created_at`, `updated_at`, `clinic_id`) VALUES
(1, 'num1', NULL, NULL, 0),
(2, 'num2', NULL, NULL, 0),
(3, 'num3', NULL, NULL, 0),
(13, 'erherherherh', NULL, NULL, 30),
(17, 'sfbfbdfb', NULL, NULL, 45),
(14, 'a1', NULL, NULL, 52),
(15, 'a2', NULL, NULL, 52),
(16, 'a3', NULL, NULL, 52);

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

DROP TABLE IF EXISTS `clinics`;
CREATE TABLE IF NOT EXISTS `clinics` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clinics`
--

INSERT INTO `clinics` (`id`, `name`, `owner_id`, `address_id`, `is_active`, `created_at`, `updated_at`, `address`, `description`, `phone`) VALUES
(30, 'clinic ', 22, 1, 1, NULL, NULL, 'egypt, cairo', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '01141442423'),
(29, 'my clinic servlert', 22, 1, 1, NULL, NULL, 'egypt, cairo', 'awasome clinic , here you can fell you in your home and this is some thing goood', '01141442423'),
(31, '', 22, 1, 1, NULL, NULL, NULL, NULL, NULL),
(51, 'new_clinic', 78, 0, 1, NULL, NULL, 'egypt, cairo', 'the best new clinic in me\r\n', '01141442423'),
(32, 'myClinic_1', 48, 0, 0, NULL, NULL, 'egypt, cairo ', 'my new clinic in the new site', '01152334589'),
(33, 'my_new_clinic', 59, 0, 0, NULL, NULL, 'nafnasjfjasnfjasj', 'jasfjsajf asnf basjb f', '01124556987'),
(34, 'egypt clinic', 59, 1, 1, NULL, NULL, 'egypt, cairo', 'awsome clinic to provide special services to our patient', '01158996599'),
(35, 'trtrjtrjrj', 59, 0, 0, NULL, NULL, 'rtjtrjrtj', '', ''),
(36, 'عيادة الرحلة', 68, 0, 1, NULL, NULL, 'هناك تانى شارع ع اليمين ومن هناك اسال بقا ', 'عيادة صح الصح والدكاترة صح الصح', '01141442365'),
(37, 'new f clinic', 48, 0, 0, NULL, NULL, 'cairo', 'skdgkmsdkmgksdmkgmksdmg', '01158996588'),
(38, 'hiegwem', 48, 0, 0, NULL, NULL, 'wegjweng', 'wegwewegwegwegwegwegweg', '01141442423'),
(39, 'sdvvvvvvvvvvvvvvv', 48, 0, 0, NULL, NULL, 'sdvsdvsdvsdvsdvsd', 'vsdvsdvsdvsdvsdvsdvsdvsdvsdvsdv', '01141442423'),
(40, 'sdbsdsdsdsdbsdbsdsdb', 48, 0, 0, NULL, NULL, 'sdbsdsdbsdbsdbsdb', 'sdbsdbsdbsdbsdbsdbsdbsdb', '01141442423'),
(41, 'ddddddddddd ', 48, 0, 0, NULL, NULL, 'ddddddddddddddddddd', 'dddddddddddddddddddsdsdfsdfdf', '01141442423'),
(42, 'sdgsdgsdgsdgsdgsd', 48, 0, 0, NULL, NULL, 'gsdgsdgsdgdgsdgsdgsd', 'sdgsdgsdgsdgsdgsdgsdgsdgsdgsdg', '01141442423'),
(43, 'jdjgjndjgjjj', 48, 0, 0, NULL, NULL, 'njngjdngjndjgn', 'ajnfjanjgnasgebfbfdb', '01141442423'),
(44, 'sdbsdbsdbsdb', 48, 0, 0, NULL, NULL, 'sdbsdbsdbsdbsd', 'bsdbsdbsdbsdbsdbsdbsdbsd', '01141442423'),
(45, 'c_c_c', 72, 1, 1, NULL, NULL, 'egypt , cairo, here', 'c_c_c is the best  clinic ', '01158796548'),
(46, 'new new clinic', 72, 1, 1, NULL, NULL, 'cairo', 'desc for the new clinic', '01141442423'),
(47, 'sdgsdgsdgsd', 72, 0, 0, NULL, NULL, 'sdgsdsdg', 'sdgsdgsdgwegwegwegwegwegweg', '01141442423'),
(48, 'fdbdfndfn', 72, 0, 0, NULL, NULL, 'dfndfndfn', 'dfndfndfndfndfndfndfn', '01151445478'),
(49, 'dfbdfbdfdfn', 72, 0, 0, NULL, NULL, 'dfndfndfn', 'dfndfndfndfndfndfndfn', '01141442423'),
(50, 'webwebwebweb', 72, 0, 0, NULL, NULL, 'webwebwebweb', 'wbwebwebwebwebwbwebweb', '01151445478'),
(52, 'clinic_test', 85, 0, 1, NULL, NULL, 'egypt, cairo', 'clinic_test is a good clinic in the site', '01157889654'),
(53, 'eslam mohamed', 48, 0, 0, NULL, NULL, ' nour st', 'our clinic is the most important clinic in our country ', '01222340989'),
(54, 'eslam', 48, 0, 0, NULL, NULL, 'nour st', 'uihauihasuievs ,hvisunvubs vsnsdvnuishv sioehkuibedsk vksbvuibs kvishvskhn', ''),
(55, 'jcdksdncukn', 48, 0, 0, NULL, NULL, 'JKBUIZDBUIDBVS', 'jbnvuibuizsdvisbvklsd ibdszbnuihv a.jzpca.nfpohFWI EKNc9eah', '01222310989'),
(56, 'clinic_for_test', 95, 1, 1, NULL, NULL, 'clinic_for_test ', 'clinic_for_test  it is so good', '01141442423'),
(57, 'clinic_t', 100, 0, 1, NULL, NULL, 'egypt, cairo', 'clinic_t it is a clinic on the site', '01141442423');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_employees`
--

DROP TABLE IF EXISTS `clinic_employees`;
CREATE TABLE IF NOT EXISTS `clinic_employees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `employment_date` datetime NOT NULL,
  `sack_date` datetime NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clinic_employees`
--

INSERT INTO `clinic_employees` (`id`, `clinic_id`, `employee_id`, `employment_date`, `sack_date`, `is_active`, `created_at`, `updated_at`) VALUES
(20, 30, 22, '2016-04-10 13:15:07', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(87, 56, 98, '2016-05-16 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(18, 30, 25, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(17, 32, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(21, 30, 29, '2016-04-17 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(86, 45, 94, '2016-04-16 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(73, 30, 22, '2016-05-14 19:03:56', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(85, 45, 89, '2016-05-15 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(72, 30, 22, '2016-05-14 19:01:58', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(84, 52, 88, '2016-05-15 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(71, NULL, 22, '2016-05-14 18:50:37', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(28, 35, 49, '2016-04-17 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(29, 34, 50, '2016-04-17 16:05:39', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(83, 52, 87, '2016-05-15 14:04:46', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(82, 52, 86, '2016-05-15 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(81, 45, 84, '2016-05-15 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(80, 45, 83, '2016-05-15 00:00:00', '2016-05-15 00:00:00', 0, NULL, NULL),
(79, 51, 82, '2016-05-15 00:00:00', '2016-05-15 00:00:00', 0, NULL, NULL),
(78, 0, 81, '2016-04-01 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(77, 51, 80, '2016-05-15 12:11:11', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(76, 51, 80, '2016-05-15 12:08:31', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(75, 51, 80, '2016-05-15 12:04:22', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(74, 51, 79, '2016-05-15 00:00:00', '2016-05-15 00:00:00', 0, NULL, NULL),
(40, 33, 60, '2016-04-18 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(41, 33, 58, '2016-04-18 15:40:20', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(70, 30, 22, '2016-05-14 18:50:37', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(69, 45, 58, '2016-05-13 21:33:15', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(68, 45, 58, '2016-05-13 21:33:08', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(67, 45, 71, '2016-05-13 15:07:03', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(66, 45, 75, '2016-05-13 00:00:00', '2016-05-15 00:00:00', 0, NULL, NULL),
(65, 45, 71, '2016-05-13 12:31:38', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(52, 34, 66, '2016-04-22 00:00:00', '2016-04-22 00:00:00', 0, NULL, NULL),
(64, 45, 73, '2016-05-13 00:00:00', '2016-05-15 00:00:00', 0, NULL, NULL),
(63, 34, 70, '2016-05-13 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(51, 32, 58, '2016-04-18 22:21:27', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(53, 33, 50, '2016-04-23 20:34:54', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(54, 34, 67, '2016-04-25 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(55, 36, 69, '2016-04-25 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(56, 32, 58, '2016-05-06 15:03:43', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(57, 32, 58, '2016-05-06 15:04:32', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(58, 32, 58, '2016-05-06 15:20:12', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(59, 32, 58, '2016-05-06 17:23:46', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(60, 32, 58, '2016-05-06 17:27:05', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(61, 32, 58, '2016-05-06 17:28:07', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(62, 32, 58, '2016-05-06 19:06:49', '2016-05-15 00:00:00', 0, '0000-00-00 00:00:00', NULL),
(88, 56, 97, '2016-05-16 19:58:53', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL),
(89, 57, 102, '2016-04-17 00:00:00', '0000-00-00 00:00:00', 1, NULL, NULL),
(90, 57, 101, '2016-04-17 14:58:38', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `answer` text NOT NULL,
  `title` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
CREATE TABLE IF NOT EXISTS `days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(15) NOT NULL,
  `is_night` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`, `is_night`) VALUES
(1, 'Sat', 1),
(2, 'Sun', 1),
(3, 'Mon', 1),
(4, 'Tue', 1),
(5, 'Wed', 1),
(6, 'Thu', 1),
(7, 'Fri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
CREATE TABLE IF NOT EXISTS `diseases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinic_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `created_at`, `updated_at`, `clinic_id`) VALUES
(1, 'num1', NULL, NULL, 0),
(2, 'num2', NULL, NULL, 0),
(3, 'num3', NULL, NULL, 0),
(37, 'eherherh', NULL, NULL, 30),
(31, 'h1', NULL, NULL, 32),
(41, 'sdg', NULL, NULL, 45),
(38, 'd1', NULL, NULL, 52),
(39, 'd2', NULL, NULL, 52),
(40, 'd3', NULL, NULL, 52);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctorCv` varchar(112) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_id`, `specialization_id`, `is_active`, `created_at`, `updated_at`, `doctorCv`) VALUES
(24, 17, 1, 1, '2016-02-29 22:00:00', '2016-03-21 22:00:00', NULL),
(2, 22, 3, 1, '2016-02-29 22:00:00', '2016-03-21 22:00:00', 'doctors/cv/2893554-2016-03-25-Nancy  agram-CV.pdf'),
(25, 27, 1, 1, NULL, NULL, NULL),
(26, 24, 1, 1, NULL, NULL, 'doctors/cv/3322265-2016-03-26-رمضان صبحى-CV.pdf'),
(27, 50, 2, 1, NULL, NULL, NULL),
(28, 52, 1, 1, NULL, NULL, NULL),
(29, 58, 1, 1, NULL, NULL, 'doctors/cv/2566650-2016-05-09-doctor_2-CV.docx'),
(30, 71, 1, 1, NULL, NULL, 'doctors/cv/8692139-2016-05-13-v_doc_man-CV.docx'),
(31, 25, 1, 1, NULL, NULL, NULL),
(32, 80, 3, 1, NULL, NULL, 'doctors/cv/3543213-2016-05-15-new_doctor-CV.docx'),
(33, 87, 1, 1, NULL, NULL, NULL),
(34, 97, 2, 1, NULL, NULL, 'doctors/cv/7471192-2016-05-16-doctor_for_test-CV.docx'),
(35, 101, 1, 1, NULL, NULL, 'doctors/cv/5518311-2016-04-17-doctor_t-CV.docx');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

DROP TABLE IF EXISTS `medicines`;
CREATE TABLE IF NOT EXISTS `medicines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinic_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `name`, `created_at`, `updated_at`, `clinic_id`) VALUES
(1, 'num1', NULL, NULL, 0),
(2, 'num2', NULL, NULL, 0),
(3, 'num3', NULL, NULL, 0),
(17, 'erherheh', NULL, NULL, 30),
(21, 'bdfb', NULL, NULL, 45),
(18, 'm1', NULL, NULL, 52),
(19, 'm2', NULL, NULL, 52),
(20, 'm3', NULL, NULL, 52);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_16_211253_create_table_clinics', 1),
('2016_03_16_213047_create_table_address', 1),
('2016_03_16_213345_create_table_employees', 1),
('2016_03_16_213940_create_table_roles', 1),
('2016_03_16_214227_create_table_Userrs', 1),
('2016_03_16_214548_create_table_clinic_employees', 1),
('2016_03_16_215010_create_table_doctors', 1),
('2016_03_16_215259_create_table_specializations', 1),
('2016_03_16_215556_create_table_reservations', 1),
('2016_03_16_215940_create_table_reservation_medicines', 1),
('2016_03_16_220020_create_table_reservation_diseases', 1),
('2016_03_16_220058_create_table_reservation_parades', 1),
('2016_03_16_220135_create_table_reservation_analysis', 1),
('2016_03_16_220756_create_table_medicines', 1),
('2016_03_16_220845_create_table_diseases', 1),
('2016_03_16_220953_create_table_parades', 1),
('2016_03_16_221036_create_table_analysis', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `observer_id` int(11) NOT NULL,
  `notifier_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `new` tinyint(4) NOT NULL,
  `about` varchar(100) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `observer_id`, `notifier_id`, `note`, `new`, `about`, `link`) VALUES
(42, 101, 100, 'You Have Offer From clinic_t', 0, 'offer', 'http://localhost:8000/offer/101/listOffers'),
(41, 101, 100, 'You Have Offer From clinic_t', 0, 'offer', 'http://localhost:8000/offer/101/listOffers'),
(40, 101, 100, 'You Have Offer From clinic_t', 0, 'offer', 'http://localhost:8000/offer/101/listOffers'),
(39, 97, 100, 'You Have Offer From clinic_t', 1, 'offer', 'http://localhost:8000/offer/97/listOffers');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `description` text,
  `is_active` int(11) DEFAULT NULL,
  `is_accepted` int(11) DEFAULT NULL,
  `offer_date` varchar(30) DEFAULT NULL,
  `clinic_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `name`, `owner_id`, `doctor_id`, `description`, `is_active`, `is_accepted`, `offer_date`, `clinic_id`) VALUES
(8, 'a gad gjadj gm', 2, 22, 'gkwkgmwkgkdmsgsdgsgsgsdgsgsgsgsdgsgsdgsg', 1, 0, '2016-03-25', 30),
(9, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(10, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(11, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(12, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(13, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(14, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(15, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(16, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(17, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(18, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(19, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(20, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(21, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(22, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(23, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(24, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(25, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(26, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-16', 30),
(27, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(28, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(29, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(30, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(31, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(32, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(33, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(34, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(35, 'Mohamed', 22, 24, 'Doctor Batne', 1, NULL, '2016-04-17', 30),
(42, 'Mohamed', 22, 24, 'Doctor Batne', 1, 0, '2016-04-17', 30),
(41, 'offer title', 48, 50, 'please come for fill app', 1, 1, '2016-04-17', 32),
(40, 'offer title', 48, 50, 'offer description', 0, 0, '2016-04-17', 32),
(43, 'Mohamed', 22, 24, 'Doctor Batne', 1, 0, '2016-04-18', 30),
(44, 'Mohamed', 22, 24, 'Doctor Batne', 1, 0, '2016-04-18', 30),
(45, 'Mohamed', 22, 24, 'Doctor Batne', 1, 0, '2016-04-18', 30),
(46, 'kamal Offer', 48, 27, 'work for me', 1, 0, '2016-04-18', 32),
(47, 'offer2', 48, 27, 'lakmxjjjjjjjjjjjjjjjjjjjj', 1, 0, '2016-04-18', 32),
(48, 'offer3', 48, 27, 'lakmxjjjjjjjjjjjjjjjjjjjj', 1, 0, '2016-04-18', 32),
(49, 'offer5', 48, 27, '5ddf555555f55f5f5f5f4ff', 1, 0, '2016-04-18', 32),
(50, 'jsdng', 59, 58, 'sdngsdgmkskdgk', 1, 1, '2016-04-18', 33),
(51, 'njjjfnjn', 59, 58, 'kfnknfkn kgnkfngk', 1, 1, '2016-04-18', 33),
(52, 'Mohamed', 22, 24, 'Doctor Batne', 1, 0, '2016-04-18', 30),
(53, 'test offer', 48, 58, 'i want you to work for me as a doctor for one month', 1, 1, '2016-04-18', 32),
(54, 'eyererh', 59, 22, 'yerherherherherherh', 1, 0, '2016-04-21', 33),
(55, 'shshsdhsdh', 59, 50, 'shshsdhsdhsdhsdh', 1, 1, '2016-04-21', 33),
(56, 'gvjvjvhv ', 59, 24, 'vhjhhhbhgvgvgggbgbg', 1, 0, '2016-04-25', 34),
(57, 'Offer for you', 48, 58, 'this is a diffrenet offer', 1, 1, '2016-05-06', 32),
(58, 'sdgwegwegw', 48, 58, 'dsgsdgegwegweg', 1, 1, '2016-05-06', 32),
(59, 'dfhdhdhdfh', 48, 58, 'fhdfhdfhdfh', 1, 1, '2016-05-06', 32),
(60, 'heheherherherer', 48, 58, 'herherherherherh', 1, 1, '2016-05-06', 32),
(61, 'sdhsdhshsgsdg', 48, 58, 'sdgsdgsdgsdgsg', 1, 1, '2016-05-06', 32),
(62, 'sdbsdbsdb', 48, 58, 'sdbsdbssfbfbf', 1, 1, '2016-05-06', 32),
(63, 'sdgsdg', 48, 58, 'sdgsdgsdgfsdfsdf', 1, 1, '2016-05-06', 32),
(64, 'new f clinic offer', 72, 71, 'new f clinic offer new f clinic offer', 1, 1, '2016-05-13', 45),
(65, 'sdgdsgsdg', 72, 22, 'sdgsdgsdgsdgsdg', 1, 0, '2016-05-13', 45),
(66, 'sdfsdfssgsdg', 72, 22, 'sdgsdgsdgsdg', 1, 0, '2016-05-13', 45),
(67, 'sdfsdfssgsdg', 72, 22, 'sdgsdgsdgsdgsdgsdg', 1, 0, '2016-05-13', 45),
(68, 'sdgsdgsdgsd', 72, 71, 'sdgsdgsdgerberberbergerger', 0, 0, '2016-05-13', 45),
(69, 'dddddddddddddddd', 72, 71, 'ddddddddddddddddd', 1, 1, '2016-05-13', 45),
(70, 'new offer for you', 72, 58, 'please accept this offer and enjoy with us ', 0, 0, '2016-05-13', 45),
(71, 'dfhdffhdfh', 72, 58, 'fhsfhdfdhdfhdherherherherherh', 0, 0, '2016-05-13', 45),
(72, 'dfhdffhdfh', 72, 58, 'fhsfhdfdhdfhdherherherherherh', 1, 1, '2016-05-13', 45),
(73, 'fffffffff ', 72, 58, 'ffffffffffffffffffffffffffffffffffffffff', 1, 1, '2016-05-13', 45),
(74, 'cccccccccccccccccccc', 72, 71, 'cccccccccccccccccccccccccccccccccccccc', 0, 0, '2016-05-14', 45),
(75, 'fffffffffffff', 78, 80, 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 1, 1, '2016-05-15', 51),
(76, 'Karim Ala ', 78, 80, 'Karim Alaa El-Din MohamedKarim Alaa El-Din MohamedKarim Alaa El-Din Mohamed', 1, 1, '2016-05-15', 51),
(77, 'dssdgsdgsdgsdg', 78, 80, 'dssdgsdgsdgsdgdssdgsdgsdgsdg', 0, 0, '2016-05-15', 51),
(78, 'Karim Alaa ', 78, 80, 'NotifyNotifyNotifyNotifyNotifyNotifyNotify', 1, 1, '2016-05-15', 51),
(79, 'ddddddddddddddd ', 85, 87, 'ddddddddddddddd ddddddddddddddd ', 0, 0, '2016-05-15', 52),
(80, 'ddddddddddddddd', 85, 87, 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 1, 1, '2016-05-15', 52),
(81, '????? ????', 72, 87, 'hshshshshshsdhsh', 0, 0, '2016-05-15', 45),
(82, 'hi man ', 72, 80, 'i want you to work for me, are you okay', 0, 0, '2016-04-16', 46),
(83, 'hi man ', 72, 80, 'i want you to work for me are you okay', 1, 0, '2016-04-16', 46),
(84, 'hi doctor', 95, 97, 'i want you to work for me, are you agree ?', 0, 0, '2016-05-16', 56),
(85, 'hi doctor', 95, 97, 'i want you to work for me, are you agree ?', 1, 1, '2016-05-16', 56),
(86, '???? ?? ????? ', 100, 101, '??? ??? ?? ???? ?? ?? ??????? ????? ???? ?? ???????', 1, 1, '2016-04-17', 57),
(87, 'mmmmmmmmmmmmmmmmm', 100, 97, 'mmmmmmmmmmmmmmmmm', 1, 0, '2016-04-17', 57),
(88, 'vvvvvvvvv ', 100, 101, 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 0, 0, '2016-04-17', 57),
(89, 'rrrrrrrrr rr', 100, 101, 'rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 1, 0, '2016-05-17', 57),
(90, 'wefwefwegwe', 100, 101, 'wegwegwegwegweg', 0, 0, '2016-05-17', 57);

-- --------------------------------------------------------

--
-- Table structure for table `parades`
--

DROP TABLE IF EXISTS `parades`;
CREATE TABLE IF NOT EXISTS `parades` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinic_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parades`
--

INSERT INTO `parades` (`id`, `name`, `created_at`, `updated_at`, `clinic_id`) VALUES
(1, 'num1', NULL, NULL, 0),
(2, 'num2', NULL, NULL, 0),
(3, 'okay', NULL, NULL, 0),
(60, 'p2', NULL, NULL, 52),
(59, 'p1', NULL, NULL, 52),
(58, 'wgeherheh', NULL, NULL, 30),
(69, 'ssdsdg', NULL, NULL, 45),
(68, 'erverer', NULL, NULL, 45),
(50, 'dff', NULL, NULL, 33),
(47, 'بليى', NULL, NULL, 32),
(49, 'sdbsdgsdgsdg', NULL, NULL, 33),
(46, 'h2', NULL, NULL, 32),
(48, 'sdgsdg', NULL, NULL, 33),
(61, 'p3', NULL, NULL, 52),
(62, 'wwf', NULL, NULL, 56);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `patient_nation_id` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `is_examination` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `tecket_num` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `clinic_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `patient_id`, `patient_nation_id`, `doctor_id`, `nurse_id`, `date`, `is_examination`, `is_active`, `tecket_num`, `created_at`, `updated_at`, `clinic_id`) VALUES
(103, 74, '12578796548963', 71, 84, '2016-05-15', 1, 1, 2, NULL, NULL, 45),
(102, 74, '12578796548963', 80, 79, '2016-05-15', 1, 1, 1, NULL, NULL, 51),
(99, 77, '15151515151515', 71, 73, '2016-05-20', 1, 1, 1, NULL, NULL, 45),
(100, 34, '88888885555555', 71, 73, '2016-05-15', 1, 1, 1, NULL, NULL, 45),
(92, 76, '15935789546321', 71, 73, '2016-05-14', 1, 0, 1, NULL, NULL, 45),
(95, 76, '15935789546321', 71, 73, '2016-05-14', 1, 0, 2, NULL, NULL, 45),
(97, 77, '15151515151515', 71, 73, '2016-05-23', 1, 1, 1, NULL, NULL, 45),
(89, 76, '15935789546321', 71, 73, '2016-05-25', 1, 1, 2, NULL, NULL, 45),
(86, 34, '88888885555555', 71, 73, '2016-05-13', 1, 1, 1, NULL, NULL, 45),
(87, 76, '15935789546321', 71, 73, '2016-05-29', 1, 1, 1, NULL, NULL, 45),
(88, 74, '12578796548963', 58, 73, '2016-10-07', 1, 1, 1, NULL, NULL, 45),
(84, 34, '88888885555555', 71, 73, '2016-05-25', 0, 1, 1, NULL, NULL, 45),
(85, 34, '88888885555555', 71, 73, '2016-05-01', 1, 1, 1, NULL, NULL, 45),
(90, 74, '12578796548963', 71, 73, '2016-05-25', 1, 1, 3, NULL, NULL, 45),
(83, 51, '15647893215654', 71, 73, '2016-07-03', 0, 1, 2, NULL, NULL, 45),
(91, 74, '12578796548963', 71, 73, '2016-05-31', 1, 1, 1, NULL, NULL, 45),
(105, 74, '12578796548963', 87, 86, '2016-05-17', 1, 1, 1, NULL, NULL, 52),
(107, 76, '15935789546321', 87, 88, '2016-05-15', 1, 0, 1, NULL, NULL, 52),
(110, 99, '14887965578964', 97, 98, '2016-05-16', 1, 0, 1, NULL, NULL, 56),
(111, 74, '12578796548963', 101, 102, '2016-04-17', 1, 1, 1, NULL, NULL, 57),
(112, 76, '15935789546321', 101, 102, '2016-05-17', 1, 1, 1, NULL, NULL, 57),
(113, 74, '12578796548963', 71, 73, '2016-05-19', 1, 0, 1, NULL, NULL, 45);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_analysis`
--

DROP TABLE IF EXISTS `reservation_analysis`;
CREATE TABLE IF NOT EXISTS `reservation_analysis` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `analysis_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation_analysis`
--

INSERT INTO `reservation_analysis` (`id`, `reservation_id`, `analysis_id`, `created_at`, `updated_at`) VALUES
(1, 63, 2, NULL, NULL),
(2, 54, 1, NULL, NULL),
(3, 54, 2, NULL, NULL),
(4, 54, 3, NULL, NULL),
(5, 54, 4, NULL, NULL),
(6, 54, 5, NULL, NULL),
(7, 54, 6, NULL, NULL),
(8, 54, 1, NULL, NULL),
(9, 54, 2, NULL, NULL),
(10, 54, 3, NULL, NULL),
(11, 54, 4, NULL, NULL),
(12, 54, 7, NULL, NULL),
(13, 54, 5, NULL, NULL),
(14, 54, 2, NULL, NULL),
(15, 54, 1, NULL, NULL),
(16, 54, 3, NULL, NULL),
(17, 16, 1, NULL, NULL),
(18, 16, 2, NULL, NULL),
(19, 16, 3, NULL, NULL),
(20, 67, 1, NULL, NULL),
(21, 67, 2, NULL, NULL),
(22, 67, 3, NULL, NULL),
(23, 54, 1, NULL, NULL),
(24, 69, 1, NULL, NULL),
(25, 69, 2, NULL, NULL),
(26, 69, 3, NULL, NULL),
(27, 71, 1, NULL, NULL),
(28, 71, 2, NULL, NULL),
(29, 71, 3, NULL, NULL),
(30, 72, 1, NULL, NULL),
(31, 72, 2, NULL, NULL),
(32, 71, 1, NULL, NULL),
(33, 71, 2, NULL, NULL),
(34, 71, 3, NULL, NULL),
(35, 71, 12, NULL, NULL),
(36, 71, 1, NULL, NULL),
(37, 71, 2, NULL, NULL),
(38, 71, 3, NULL, NULL),
(39, 71, 12, NULL, NULL),
(40, 73, 1, NULL, NULL),
(41, 73, 2, NULL, NULL),
(42, 73, 3, NULL, NULL),
(43, 73, 12, NULL, NULL),
(44, 92, 1, NULL, NULL),
(45, 92, 2, NULL, NULL),
(46, 92, 3, NULL, NULL),
(47, 92, 12, NULL, NULL),
(48, 110, 2, NULL, NULL),
(49, 113, 1, NULL, NULL),
(50, 113, 2, NULL, NULL),
(51, 113, 3, NULL, NULL),
(52, 113, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_diseases`
--

DROP TABLE IF EXISTS `reservation_diseases`;
CREATE TABLE IF NOT EXISTS `reservation_diseases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation_diseases`
--

INSERT INTO `reservation_diseases` (`id`, `reservation_id`, `disease_id`, `created_at`, `updated_at`) VALUES
(1, 63, 2, NULL, NULL),
(2, 63, 3, NULL, NULL),
(3, 63, 1, NULL, NULL),
(4, 63, 1, NULL, NULL),
(5, 63, 2, NULL, NULL),
(6, 54, 1, NULL, NULL),
(7, 54, 2, NULL, NULL),
(8, 54, 3, NULL, NULL),
(9, 54, 6, NULL, NULL),
(10, 54, 7, NULL, NULL),
(11, 54, 1, NULL, NULL),
(12, 54, 2, NULL, NULL),
(13, 54, 3, NULL, NULL),
(14, 54, 6, NULL, NULL),
(15, 54, 7, NULL, NULL),
(16, 54, 9, NULL, NULL),
(17, 54, 1, NULL, NULL),
(18, 54, 2, NULL, NULL),
(19, 54, 3, NULL, NULL),
(20, 54, 26, NULL, NULL),
(21, 54, 2, NULL, NULL),
(22, 54, 3, NULL, NULL),
(23, 16, 2, NULL, NULL),
(24, 16, 3, NULL, NULL),
(25, 67, 2, NULL, NULL),
(26, 69, 3, NULL, NULL),
(27, 54, 1, NULL, NULL),
(28, 54, 2, NULL, NULL),
(29, 69, 3, NULL, NULL),
(30, 69, 1, NULL, NULL),
(31, 69, 2, NULL, NULL),
(32, 69, 3, NULL, NULL),
(33, 71, 1, NULL, NULL),
(34, 71, 2, NULL, NULL),
(35, 71, 3, NULL, NULL),
(36, 72, 1, NULL, NULL),
(37, 72, 2, NULL, NULL),
(38, 72, 3, NULL, NULL),
(39, 71, 1, NULL, NULL),
(40, 71, 2, NULL, NULL),
(41, 71, 3, NULL, NULL),
(42, 71, 36, NULL, NULL),
(43, 71, 1, NULL, NULL),
(44, 71, 2, NULL, NULL),
(45, 71, 3, NULL, NULL),
(46, 71, 36, NULL, NULL),
(47, 73, 1, NULL, NULL),
(48, 73, 2, NULL, NULL),
(49, 73, 3, NULL, NULL),
(50, 73, 36, NULL, NULL),
(51, 73, 2, NULL, NULL),
(52, 73, 3, NULL, NULL),
(53, 73, 36, NULL, NULL),
(54, 92, 1, NULL, NULL),
(55, 92, 2, NULL, NULL),
(56, 92, 3, NULL, NULL),
(57, 92, 36, NULL, NULL),
(58, 95, 2, NULL, NULL),
(59, 95, 3, NULL, NULL),
(60, 107, 1, NULL, NULL),
(61, 107, 2, NULL, NULL),
(62, 107, 3, NULL, NULL),
(63, 107, 38, NULL, NULL),
(64, 107, 39, NULL, NULL),
(65, 107, 40, NULL, NULL),
(66, 110, 1, NULL, NULL),
(67, 110, 2, NULL, NULL),
(68, 110, 3, NULL, NULL),
(69, 113, 1, NULL, NULL),
(70, 113, 2, NULL, NULL),
(71, 113, 3, NULL, NULL),
(72, 113, 36, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_medicines`
--

DROP TABLE IF EXISTS `reservation_medicines`;
CREATE TABLE IF NOT EXISTS `reservation_medicines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation_medicines`
--

INSERT INTO `reservation_medicines` (`id`, `reservation_id`, `medicine_id`, `created_at`, `updated_at`) VALUES
(1, 63, 1, NULL, NULL),
(2, 63, 1, NULL, NULL),
(3, 63, 1, NULL, NULL),
(4, 63, 2, NULL, NULL),
(5, 54, 1, NULL, NULL),
(6, 54, 2, NULL, NULL),
(7, 54, 3, NULL, NULL),
(8, 54, 4, NULL, NULL),
(9, 54, 7, NULL, NULL),
(10, 54, 1, NULL, NULL),
(11, 54, 2, NULL, NULL),
(12, 54, 3, NULL, NULL),
(13, 54, 4, NULL, NULL),
(14, 54, 7, NULL, NULL),
(15, 54, 9, NULL, NULL),
(16, 54, 1, NULL, NULL),
(17, 54, 2, NULL, NULL),
(18, 54, 3, NULL, NULL),
(19, 54, 1, NULL, NULL),
(20, 54, 2, NULL, NULL),
(21, 16, 2, NULL, NULL),
(22, 16, 3, NULL, NULL),
(23, 67, 2, NULL, NULL),
(24, 67, 1, NULL, NULL),
(25, 54, 2, NULL, NULL),
(26, 54, 3, NULL, NULL),
(27, 69, 1, NULL, NULL),
(28, 69, 2, NULL, NULL),
(29, 69, 3, NULL, NULL),
(30, 71, 1, NULL, NULL),
(31, 71, 2, NULL, NULL),
(32, 71, 3, NULL, NULL),
(33, 72, 1, NULL, NULL),
(34, 72, 2, NULL, NULL),
(35, 72, 3, NULL, NULL),
(36, 71, 1, NULL, NULL),
(37, 71, 2, NULL, NULL),
(38, 71, 3, NULL, NULL),
(39, 71, 16, NULL, NULL),
(40, 71, 1, NULL, NULL),
(41, 71, 2, NULL, NULL),
(42, 71, 3, NULL, NULL),
(43, 71, 16, NULL, NULL),
(44, 73, 1, NULL, NULL),
(45, 73, 2, NULL, NULL),
(46, 73, 3, NULL, NULL),
(47, 73, 16, NULL, NULL),
(48, 73, 1, NULL, NULL),
(49, 73, 2, NULL, NULL),
(50, 73, 3, NULL, NULL),
(51, 73, 16, NULL, NULL),
(52, 92, 1, NULL, NULL),
(53, 92, 2, NULL, NULL),
(54, 92, 3, NULL, NULL),
(55, 92, 16, NULL, NULL),
(56, 95, 1, NULL, NULL),
(57, 95, 2, NULL, NULL),
(58, 107, 1, NULL, NULL),
(59, 107, 2, NULL, NULL),
(60, 107, 3, NULL, NULL),
(61, 107, 18, NULL, NULL),
(62, 107, 19, NULL, NULL),
(63, 107, 20, NULL, NULL),
(64, 110, 1, NULL, NULL),
(65, 110, 2, NULL, NULL),
(66, 110, 3, NULL, NULL),
(67, 113, 3, NULL, NULL),
(68, 113, 16, NULL, NULL),
(69, 113, 1, NULL, NULL),
(70, 113, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_parades`
--

DROP TABLE IF EXISTS `reservation_parades`;
CREATE TABLE IF NOT EXISTS `reservation_parades` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `parades_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation_parades`
--

INSERT INTO `reservation_parades` (`id`, `reservation_id`, `parades_id`, `created_at`, `updated_at`) VALUES
(45, 67, 2, NULL, NULL),
(49, 54, 50, NULL, NULL),
(6, 54, 1, NULL, NULL),
(44, 67, 48, NULL, NULL),
(48, 54, 3, NULL, NULL),
(10, 54, 1, NULL, NULL),
(43, 67, 49, NULL, NULL),
(46, 67, 3, NULL, NULL),
(50, 69, 1, NULL, NULL),
(52, 69, 3, NULL, NULL),
(55, 69, 48, NULL, NULL),
(56, 71, 1, NULL, NULL),
(58, 71, 3, NULL, NULL),
(41, 16, 50, NULL, NULL),
(42, 67, 50, NULL, NULL),
(47, 54, 2, NULL, NULL),
(51, 69, 2, NULL, NULL),
(53, 69, 50, NULL, NULL),
(54, 69, 49, NULL, NULL),
(57, 71, 2, NULL, NULL),
(59, 72, 1, NULL, NULL),
(60, 72, 2, NULL, NULL),
(61, 72, 3, NULL, NULL),
(62, 71, 1, NULL, NULL),
(63, 71, 2, NULL, NULL),
(64, 71, 3, NULL, NULL),
(65, 71, 57, NULL, NULL),
(66, 71, 56, NULL, NULL),
(40, 16, 3, NULL, NULL),
(34, 54, 2, NULL, NULL),
(35, 54, 3, NULL, NULL),
(67, 71, 1, NULL, NULL),
(39, 16, 2, NULL, NULL),
(38, 54, 2, NULL, NULL),
(68, 71, 2, NULL, NULL),
(69, 71, 3, NULL, NULL),
(70, 71, 57, NULL, NULL),
(71, 71, 56, NULL, NULL),
(72, 73, 1, NULL, NULL),
(73, 73, 2, NULL, NULL),
(74, 73, 3, NULL, NULL),
(75, 73, 57, NULL, NULL),
(76, 73, 56, NULL, NULL),
(77, 73, 1, NULL, NULL),
(78, 73, 2, NULL, NULL),
(79, 73, 3, NULL, NULL),
(80, 73, 57, NULL, NULL),
(81, 92, 1, NULL, NULL),
(82, 92, 2, NULL, NULL),
(83, 92, 3, NULL, NULL),
(84, 92, 57, NULL, NULL),
(85, 92, 56, NULL, NULL),
(86, 95, 3, NULL, NULL),
(87, 95, 57, NULL, NULL),
(88, 107, 1, NULL, NULL),
(89, 107, 2, NULL, NULL),
(90, 107, 3, NULL, NULL),
(91, 107, 60, NULL, NULL),
(92, 107, 59, NULL, NULL),
(93, 107, 61, NULL, NULL),
(94, 110, 1, NULL, NULL),
(95, 110, 2, NULL, NULL),
(96, 110, 3, NULL, NULL),
(97, 113, 1, NULL, NULL),
(98, 113, 2, NULL, NULL),
(99, 113, 3, NULL, NULL),
(100, 113, 57, NULL, NULL),
(101, 113, 56, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Nurse', 1, '2016-02-29 22:00:00', '2016-02-29 22:00:00'),
(2, 'Doctor', 1, '2016-02-29 22:00:00', '2016-02-29 22:00:00'),
(3, 'Owner', 1, '2016-02-29 22:00:00', '2016-02-29 22:00:00'),
(4, 'Patient', 1, '2016-02-29 22:00:00', '2016-02-29 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

DROP TABLE IF EXISTS `specializations`;
CREATE TABLE IF NOT EXISTS `specializations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'general', 'ay 7aga', 1, '2016-03-29 22:00:00', '2016-03-28 22:00:00'),
(2, 'nfsy', 'hbal we kda', 1, '2016-03-28 22:00:00', '2016-03-29 22:00:00'),
(3, 'ramd', 'm4 4ayf', 1, '2016-03-14 22:00:00', '2016-03-30 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `is_male` int(11) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `nationality_id` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` float DEFAULT NULL,
  `is_new` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `remember_token`, `created_at`, `updated_at`, `role_id`, `is_active`, `is_male`, `email`, `password`, `avatar`, `nationality_id`, `address`, `phone`, `age`, `is_new`) VALUES
(22, 'Nancy  agram', '4CyqndNNnVXfaNsWFjfSyZeq0lOknNHwircwZg3JZVzHE2u8RXxw6G3E2zvt', '2016-03-19 11:55:12', '2016-04-17 13:36:23', 2, 1, 2, 'karimalaa500@yahoo.com', '$2y$10$W8N6LMoVxoJBl8av8LyTSeIgrStzY8CfWd26pT.QmCiHVCshL3gAq', 'image/users/26828612016-03-25-Nancy  agram', '12345612345611', 'cairo', '01141442423', 55, 1),
(2, '2رمضان صبحى', '4JwMbpZzJzGCNIV8M5cYsnPPgcgSXdvQi28ckiYkDnYDcJD3MpjHjNgigM0y', NULL, '2016-03-19 13:12:16', 3, 0, 1, 'karimalaa450s@yahoo.com', '$2y$10$RDROcbCnq6zRiQy7nQnGvuYvOxWSBGPdK4GtsOnQuON/czo1no1P6', 'image/users/2016-03-19-رمضان صبحى', '0', NULL, NULL, NULL, 1),
(24, 'Modyyyy', 'WIfvJ3hrZ1Qzs1cwDxj2fRQWjavXPgyWkmm0mu7sx65L51jcZvhschbRjmux', '2016-03-19 15:08:06', '2016-04-25 10:30:57', 2, 1, 1, 'karimalaa334@yahoo.com', '$2y$10$ec/PY.PpDVx6oj7VZDuOauNGnRi8eSwDrx2T2v5IhTaAMljVu1moi', 'image\\users\\default-man_avatar.jpg', '12312345678944', NULL, NULL, NULL, 1),
(25, 'karim alaa', 'mbLqYlkaPgz0EtaKDqnWtw47obnJjrCOPahfMaEpBVP23K12djOLSOz2mJQb', '2016-03-19 16:29:41', '2016-05-13 18:57:11', 2, 1, 1, 'karimalaa450@yahoo.com', '$2y$10$FFF.MEEwH4aA4Rx7Nl/.J.4RI3Qb03ZJAececAAU8I/hsFr1wnJse', 'image\\users\\default-man_avatar.jpg', '12345678912344', NULL, NULL, NULL, 1),
(26, 'karim', '7yQp0sn6Kx7WFtp3gMw3CLaPVuZYareQ1IsySz7EJxyM4SarEfGKb5Q9ebhX', '2016-03-20 14:38:17', '2016-03-20 14:39:25', 2, 1, 1, 'karimalaa600@yahoo.com', '$2y$10$HTMKjwAxBhuM/xJjyLLm..nlxwc63bSFVBjqOlFvtXmyGZRhI4/HG', 'image\\users\\default-man_avatar.jpg', '12345678912345', NULL, NULL, NULL, 1),
(27, 'yyyyyyyyy', NULL, '2016-03-20 14:39:54', '2016-03-20 14:39:54', 2, 1, 1, 'yyyyyyyyy@yyyy.yyyy', '$2y$10$JqAkVr2IjP8M9hoNHMuQOup0HcjF83.bUuLnrNytjVt5EoZlbdEx6', 'image\\users\\default-man_avatar.jpg', '12356321456987', 'yyyyyyyyy', '01145447586', 12, 1),
(28, 'ola mohamed', 'XMeyZg3jZs1SdMxmuv0cIyudBK7RPgyNvqgCLqq0txddHVEsYN6EoONjo630', NULL, '2016-03-23 18:53:31', 1, 0, 2, 'ola@yahoo.com', '$2y$10$kVTg37ABuPQBEMUjQn7wuueE3awIm2U/QMipKVQih5SfRMcE6X6fK', 'image\\users\\default-woman_avatar.jpg', '23455678891232', NULL, NULL, NULL, 1),
(29, 'ramadan ahmed ', NULL, NULL, NULL, 1, 0, 1, 'ramdan@yahoo.com', '$2y$10$QhSdsk.4a1sBKVcEQcCZbecm1Yr8hBxT4Ylo8pLbJ2aL1iKjhJsxy', 'image\\users\\default-man_avatar.jpg', '11112222333344', NULL, NULL, NULL, 1),
(30, 'mohamed', NULL, NULL, NULL, 4, 1, 1, 'mohamed.emad65108@yahoo.com', '1234567', 'image\\users\\default-man_avatar.jpg', '11484307343434', 'mlkdsvloKW;ASKLJDKFHHJDFKJDF', '01148430734', 21, 1),
(31, 'mohamedee', NULL, NULL, NULL, 4, 1, 2, 'mohamed.emad65108@yahoo.com', '$2y$10$5QKls3kcKNt82QlO/N3k3OYZL4d66sNbTnG08ocvqN.CSs/6oI0Ue', 'image\\users\\default-woman_avatar.jpg', '12345677777777', 'dkjsfdsjklakjfkdcslvnfdjljcdjcf', '01148430734', 21, 1),
(32, 'emaddddd', NULL, NULL, NULL, 4, 1, 2, 'mohamed.mohamed651088@yahoo.com', '$2y$10$8A1IET7vAzHyThkP/ZaHSurJnzFpUAEbqcHcUL6T5AhmNSWMPsVmq', 'image\\users\\default-woman_avatar.jpg', '77777778888888', ';lejkwhfhhvjkl;[dpfggvjfk;[wdef', '01148430734', 21, 1),
(33, 'midos  sjd', NULL, NULL, NULL, 4, 1, 1, 'ahmed.dola@yahoo.com', '$2y$10$CZuyJqN2fUnpeHmmOq.QM.NI7TixIsxLClBehgGAsOLsn83d7STJe', 'image\\users\\default-man_avatar.jpg', '77777779999999', 'kjadufiagafihodw[qoikpoegwaugojgrgr', '01148430734', 21, 1),
(34, 'mosjfjjflghs', NULL, NULL, NULL, 4, 1, 1, 'mohamed.mohamed651088@yahoo.com', '$2y$10$5C1zxbBH2.T3am.jXIcFsue5PmB8i6E2H16DtH6zloE2V0/iLLdWm', 'image\\users\\default-man_avatar.jpg', '88888885555555', '', '', 0, 1),
(35, 'mmefjeef', NULL, NULL, NULL, 4, 1, 2, 'ahmed.dola@yahoo.com', '$2y$10$NOxifVOWtL6Q5LixgoQ8G.TRrxg5wlqIt2.YZGyLPdGiU9iy7xJdS', 'image\\users\\default-woman_avatar.jpg', '92929282828282', 'v,dljhvdaaiugiuvgijvoihuvhr', '01148430734', 12, 1),
(36, 'Ahmed Emad', NULL, NULL, NULL, 4, 1, 2, 'moh.a@yahoo.com', '$2y$10$WlMRJqFrZPBvxzXDlttwCuoi2Q03bA0YvfdPdQdxrUqL4op1rdBpm', 'image\\users\\default-woman_avatar.jpg', '96385274185222', 'cjagwFEWHIFUEHOJEFOIE', '01148430734', 12, 1),
(37, 'mohamedeee', NULL, NULL, NULL, 4, 1, 2, 'mos.ncd@yahoo.com', '$2y$10$eJfxwFFb2yaOwT1KdrHVbujijGcNfiDVwcvTHylZd/slKQ9IXTZxi', 'image\\users\\default-woman_avatar.jpg', '74174174174174', 'ji;faesjpojewafghpowjegpjgr', '01150356734', 22, 1),
(38, 'Tota Emad', NULL, NULL, NULL, 4, 1, 1, 'dsijvdjjv@yahoo.com', '$2y$10$t5ogBCh6DQ8.kFO0PNOave7on0PtOljobxeKppBRppTIt4mqHi.EG', 'image\\users\\default-man_avatar.jpg', '78978978945645', 'dmsljavhlkaihv', '01150356734', 11, 1),
(39, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$pYNSFdGGM51BesPD1ZVO9O.mUgiyU1Bz4NzzjW90Dg.RoW3ksSKdu', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(40, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$DmyX9CHboKw50BO0Ack0IOZTPWK/xzVC/2QjnHFIFpaJ4sQmjihYi', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(41, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$lhN5838Tq3A160JWfG8kE.zroB0y3PwUf42lNZ6EYKH8DernyCbCe', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(42, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$.t4wszl9cOpw6U13HgFQVOI9LyH4gAgzX4oj4zKYvmOLMwhpj8XjO', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(43, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$EOYvtGYsZy8uA40CkmQ3qOkeD8ISR0va5dU1wwHyaWmz2eNcyi2QG', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(44, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$5UVSj7scLpK1YjaMGEU7yuBtd4DL75hyppNhSYNPnQrS4U6Qm0uLS', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(45, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$Y34WLoEq06tJSReqeh3qJ.rHnHAy/sStvGq2ekHkItpxwvoW4ywD2', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(46, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$mebl7OJVKKTlz4.N3CkqdugjY29p4L4RDOTzU3.s0r8Mv9Gh25Nn2', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(47, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$FEAzHXoa6Zlib5LXEQ4a0e0uZ4F6nVFqzsaP/gyeps2Z33gwsDcl6', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(48, 'owner_member', 'O0EU9gntNY73lVindJF6kdkQCrJ5DM4CggqyraQY2LgzRsvHa6sR38v07XNE', '2016-04-17 13:03:27', '2016-04-16 12:09:34', 3, 1, 1, 'owner@yahoo.com', '$2y$10$k1yxFSsDSRV2oQ5A4C1YLuhn69drHPTbMaX8.OUF6fTtbGSPKnn5y', 'image\\users\\default-man_avatar.jpg', '78965412365412', NULL, NULL, NULL, 1),
(49, 'nurse_member', '29PzHIG0vF0Pe9PDSyMh0Qmpun4LBFoBYbW0OBJHTKs9mLwd1FmCCngCVoQZ', NULL, '2016-04-16 13:12:17', 1, 1, 1, 'nurse@yahoo.com', '$2y$10$lndWqIHWpQ.NPNckuvJJgejO59jJtdR8TLwtnAV6itQjH50zq/D3u', 'image/users/14753412016-04-18-nurse_member', '12356321478965', NULL, NULL, NULL, 1),
(50, 'doctor_member', 'V44jkEgWuBhZLVuSgo5xXS5f8r0QJ9XNBq3lPEEgKOIokbJVxHd25NFtIiM3', '2016-04-17 13:31:30', '2016-05-15 20:41:50', 2, 1, 1, 'doctor@yahoo.com', '$2y$10$Qka0U.YreZdg96r5iufLEeSzw2FR.W640IOAcvTko9bJqVFOtfyau', 'image/users/74992682016-04-26-doctor_member', '14589653214789', 'egypt, cairo', '01141442423', 25, 1),
(51, 'patient_member', NULL, NULL, NULL, 4, 1, 1, 'patient@yahoo.com', '$2y$10$c/O97ieYqrQIdASvWImM8.UcUwoKOJ25ZE12scy3VEpIaHkJeENXm', 'image\\users\\default-man_avatar.jpg', '15647893215654', 'egypt, cairo', '01154778963', 25, 1),
(53, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$1cWytFZ6r/z1lVxkF43nYOHfxcXvCzVwyXFsUfhFcART4T/HFfIXK', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(54, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$psKDHEjFUqy7ksq2GhHtSuEq0W31Lxl76LHTqVju2K/mcCcpviayy', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(55, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$2Gc0.8buDyAAa5lmhLR5gecRNbtlyriuk8nwOHHGBLb5M1EjmzBKu', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(56, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$OCVOloR8QqIewtysb5q8BeBPtNyM0oI0wcK7tw8cDkelHVXjt9n1G', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(57, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$PnOpFcMKwakV39hHkzc.c.O4.hhBQip3b1/32P3YBj38Xa4SPxmau', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(58, 'doctor_2', '6VI9DIJhRs3lyc8fZGz0pCGriiEUb0twTo09dr9rju1dzREFgLPTBL3pByW1', '2016-04-18 13:28:34', '2016-05-13 09:55:38', 2, 1, 1, 'doctor_1@yahoo.com', '$2y$10$.f7L9TDYPTgqkDwcWTzEF.BdRGFblMTWkA7yqeaVmqeUn3Gk.WTW.', 'image/users/63688972016-05-01-doctor_2', '12345678912349', NULL, NULL, NULL, 1),
(59, 'owner', 'cAYO2GlcKVDyRYwVPtfm2CwLbnsTd7Y7M4IOIm9eIjD3B6Eo4S20TAUazGvH', '2016-04-18 13:32:14', '2016-05-15 19:57:02', 3, 1, 2, 'owner_1@yahoo.com', '$2y$10$ltIrSXENVgpseljs49YUpOHzn9X7G69Auv2i0ctQrLmDdc5loSyQm', 'image\\users\\default-woman_avatar.jpg', '12345678912348', NULL, NULL, NULL, 0),
(60, 'nurse_member_2', '4Wt5A24R5ETfg0OM3c0Z058kfNZIThU1mRY03J0nB6pGbP735UYs8sf4T3zp', NULL, '2016-05-13 09:11:06', 1, 1, 1, 'nurse_1@yahoo.com', '$2y$10$jFpsArU3gfTcJ0joMyPT2uJdz20D8PW4V16exBRmhI4fSDpQuMFgm', 'image/users/73937992016-05-13-nurse_member_2', '12345678912347', 'egypt, cairo', '01154558789', 44, 1),
(61, 'patient', NULL, NULL, NULL, 4, 1, 1, 'patient_1@yahoo.com', '$2y$10$mg3yiO7ZjEBnyg5Pv1aUbenabJ91L3A7EoN6/dwxZzUUwVRiUnEQq', 'image\\users\\default-man_avatar.jpg', '12345678912341', 'egypt', '01156447896', 25, 1),
(62, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$5NWPi/66UqGvwszoj1soxOH/DrwmhspCBsJ1I.WKoMbdonlUZeuAC', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(63, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$7/dvwIeDxlgpESj8px4uXuBi8t4fz/x8hvo1gRhLwxuMmf59fV1Ne', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(64, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$A7eKNLJ338px2K9Wn8TxouA1bzoZBgVYorGnxR49ZEVuQmkImpMN.', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(65, 'kkkkkkk', NULL, NULL, NULL, 4, 1, 1, 'kkkkkkk@yahoo.com', '$2y$10$W2/yDH0Red668ldkSPkc0.mDQOXFFhnA24jO.qW8c16gJWJqF2B6e', 'sfdf', '14523654789654', 'giza', '01145658975', 25, 1),
(66, 'marim mostafa', NULL, NULL, NULL, 1, 0, 2, 'memo@yahoo.com', '$2y$10$dN7ECIvQYfvUFGFklTinFuEzh/DwXdFe4DD/Czc.uWrU3AF.gUSxu', 'image\\users\\default-woman_avatar.jpg', '12345678978945', NULL, NULL, NULL, 1),
(67, 'mohamed emad', NULL, NULL, NULL, 1, 1, 2, 'mohamedEmad@yahoo.com', '$2y$10$.5VpU1.RvG/MEq.mYNgbaOwx.g/mkLfPbDSvw86xPPlO538wXfYW.', 'image\\users\\default-woman_avatar.jpg', '15647893215654', NULL, NULL, NULL, 1),
(68, 'كريم علاء', NULL, '2016-04-25 13:49:28', '2016-04-25 13:49:28', 3, 1, 2, 'karimalaa7@yahoo.com', '$2y$10$eQzjnTSjgMPAOmxvgVv1/OxVosH04g11m0AQYZQKvADGuooUeqO8i', 'image\\users\\default-woman_avatar.jpg', '00000123456789', NULL, NULL, NULL, 1),
(69, 'ممرضة حلوة', NULL, NULL, NULL, 1, 1, 1, 'nurse_4@yahoo.com', '$2y$10$TjzRInjFzT2ocCiaHOSgt.MnFV92xxWaKD7Tbc7jfX4LtlzDJXSTe', 'image\\users\\default-man_avatar.jpg', '11223344556677', NULL, NULL, NULL, 1),
(70, 'new_nurse', 'dtBOmTv8i14JjcOqxEcno4yR65Ex0e2nHSbiRCp2qJNkAHAbKpjvuThGfRfb', NULL, '2016-05-13 09:03:52', 1, 1, 1, 'nurse22@yahoo.com', '$2y$10$OvhFY340.Qg52525.V3Uu.FCJfktgrj3jJc6W8LaHXWragkDrmUP.', 'image\\users\\default-man_avatar.jpg', '88888885555556', NULL, NULL, NULL, 1),
(71, 'v_doc_man', 'I0nk8vlQXBsMceWyJzsFl17Lyy5oWQzS3lVcbaZoptxu12BqzbeWEpBNcVIL', '2016-05-13 09:56:30', '2016-04-17 12:43:16', 2, 1, 1, 'v_doc_man@yahoo.com', '$2y$10$SPrvH9OoePjHzX7yWC7I3egsZoDaHlXpMVzC2DZXvdQ4XvTI9xBbq', 'image\\users\\default-man_avatar.jpg', '11556699887746', NULL, NULL, NULL, 1),
(72, 'v_own_man_v', 'JOkajBpJQ15xkMIUHG85lH0P7ICO77bShn2oXhNVErs4gSQmmw6TEfx1C7bE', '2016-05-13 10:00:35', '2016-04-17 12:35:51', 3, 1, 1, 'v_own_man@yahoo.com', '$2y$10$GaCTmfH6Tz78za.Jy3KzveTZpKfWBd0sssLBhIyCcOGGN.GGtTeiC', 'image/users/13188472016-04-17-v_own_man_v', '77448899554487', 'cairo', '01141442424', 44, 1),
(73, 'v_nur_man22', '9b8SCC3LCIwmQsPFXSLpaSaBLN8lRzjFGy7LDv05SsGG9Nc7RSL0ox2fb8jC', NULL, '2016-04-17 12:20:03', 1, 0, 1, 'v_nur_man@yahoo.com', '$2y$10$Mkmgcx7xOsDs4paTLFTm4Or0eAGrQhZXSFpt278y56zu1R6sgXo/m', 'image\\users\\default-man_avatar.jpg', '18596325874596', 'karimsd', '01142445779', 25, 1),
(74, 'v_pat_man', NULL, NULL, NULL, 4, 1, 1, 'v_pat_man@yahoo.com', '$2y$10$llfyZNzt/umEkfxPK9OQj.3v.u2isTZyc4i0CxltfQGl9i3IAppi.', 'image\\users\\default-man_avatar.jpg', '12578796548963', 'egypt cairo', '01145447896', 25, 1),
(75, 'offer titlegsg', NULL, NULL, NULL, 1, 0, 1, 'karimalaasdfsdf@yahoo.com', '$2y$10$/FpMdTPmm2WsIYJlsPtO4esv2GvfuiHcysvz3nvw5lWuZSvtUq3Ly', 'image\\users\\default-man_avatar.jpg', '14785225874114', NULL, NULL, NULL, 1),
(76, 'sdgsdgsdgsdg', NULL, NULL, NULL, 4, 1, 1, 'karimalaasdgsdg@yahoo.com', '$2y$10$yxT2UdY8MK3vkwxt1KB2FuJQOcg2Qer15R5m18ATXEOo7hEAxMTmq', 'image\\users\\default-man_avatar.jpg', '15935789546321', 'sdgsdgsdg', '01141442423', 24, 1),
(77, 'karim alaa', NULL, NULL, NULL, 4, 1, 1, 'kamal22@gmail.com', '$2y$10$wJ07fc/YXUKxwj/vGxKMwuh1tLPHbHvmZGdL3xQ2In4unzOmspQRC', 'image\\users\\default-man_avatar.jpg', '15151515151515', 'egypt, cairo', '01141442423', 44, 1),
(78, 'new_owner', 'i9tQcXiVWRxw5sXumKp7Hqb8flPQ4LmztILqzVG3vGaC82MjYQV1kOUGCre1', '2016-05-15 09:53:09', '2016-05-15 11:13:43', 3, 1, 1, 'new_owner@yahoo.com', '$2y$10$2Kh3ykcRwmHpX/hPkhMGI.LvBMYlEbLEOxupDGAeQGBICbPpuMkwi', 'image\\users\\default-man_avatar.jpg', '12345612345665', 'egypt, cairo', '01141442423', 25, 1),
(79, 'new_nurse', 'u5Ea3pPOmaaZ7Ty9eqbj4STB1amEB591aE5kX27oHv3iq8CpJoPjeST0bwHH', NULL, '2016-05-15 11:51:31', 1, 0, 2, 'new_nurse@yahoo.com', '$2y$10$AGYpjXRW1S6PYDZ0rYg9seYvbSwu3pmYdSR34ruUNHMhRshg8BJ0y', 'image\\users\\default-woman_avatar.jpg', '12345612345612', 'cairo', '01141442423', 24, 1),
(80, 'new_doctor', NULL, '2016-05-15 09:59:13', '2016-05-15 10:00:58', 2, 1, 1, 'new_doctor@yahoo.com', '$2y$10$iwATCCDqZPUe85rl2pz22.tlPKtW/SlfesBk3qDI5AvNcwmioeDxO', 'image/users/39589842016-05-15-new_doctor', '12345612345654', 'egypt cairo', '01158996598', 36, 1),
(81, 'karim alaa', NULL, NULL, NULL, 1, 1, 1, 'karimalaaaf@yahoo.com', '$2y$10$XSWignfJMRrbyCQXY/RRpOZM6jFg0jtj0gUKM.MKBbYeKsEwsF9SS', 'image\\users\\default-man_avatar.jpg', '12312312312312', NULL, NULL, NULL, 1),
(82, 'Karim Alaa El', '8kvvtciROxZPbq0j20FbZlrbF3poXkdPEpT4XKfHEMTNk0ZkjCWifzy5WuLb', NULL, '2016-05-15 11:53:57', 1, 0, 1, 'kamal@gmail.com', '$2y$10$uI4Jr/zyB6a9YMtiFWcbHOTRu9B5.gbqZleS.rLvCGRe8RJYJh1ji', 'image\\users\\default-man_avatar.jpg', '12789635241789', NULL, NULL, NULL, 1),
(83, 'frrrrrr', NULL, NULL, NULL, 1, 0, 1, 'frrrrrr@yahoo.com', '$2y$10$B217olf/NTXvJmn95oiUxucCHYwzXOP9mA844ypzKQ/YjyOxgQ7mm', 'image\\users\\default-man_avatar.jpg', '15647893215677', NULL, NULL, NULL, 1),
(84, 'Karim Al ', 'tCnY8XkwCZmWPYXIkdQ0nyM4xThta2PC2eoQBZbrLrAHSopMtYqceWIaAou6', NULL, '2016-05-15 11:53:46', 1, 1, 1, 'karimalaa85d0@yahoo.com', '$2y$10$Rrwg2S0fg26Ff8XRcEVq7.cXidmTJP.nnbOaulfyNcYL3G3mZBEJe', 'image\\users\\default-man_avatar.jpg', '01478965412369', NULL, NULL, NULL, 1),
(85, 'owner_test', NULL, '2016-05-15 11:55:22', '2016-05-15 11:55:22', 3, 1, 1, 'owner_test@yahoo.com', '$2y$10$fiuX4rh9eWp15ga5TP8D4OlOlkJ./1zon81iia75ghgIvZYkS/2SO', 'image\\users\\default-man_avatar.jpg', '14774114774114', NULL, NULL, NULL, 1),
(86, 'nurse_test', 'eU1K57XaasH2Ns8F8ngOHRG0ZPmMNURSm7cC9UKn5xFEzTOs9B4ncLc8HggU', NULL, '2016-05-15 12:28:07', 1, 1, 1, 'nurse_test@yahoo.com', '$2y$10$95LFzBGRTQC4nOew61KoOeWQtLCMxYs3XHVFkyC.ioPyjfCjqlbbi', 'image\\users\\default-man_avatar.jpg', '15935785245619', NULL, NULL, NULL, 1),
(87, 'doctor_test', '3bKOwtxjJk6YlSw91lv7loP2PrMLDUB7EwKrY1RZO4y48q4AoXKFE7LWBGUD', '2016-05-15 11:59:54', '2016-05-15 21:38:17', 2, 1, 1, 'doctor_test@yahoo.com', '$2y$10$5NBQdsezZAI2pdtkx5fRxu3Hj//lH.FpZYqPBrlbjlWq3Rfbbh9lC', 'image\\users\\default-man_avatar.jpg', '14863259745631', NULL, NULL, NULL, 1),
(88, 'nurse_test_2', NULL, NULL, NULL, 1, 1, 1, 'nurse_test_2@yahoo.com', '$2y$10$8voZth0szGDBb.wRi5kc1eC.5iOS8cs4di3hoI/T41c32Ydx9WkEu', 'image\\users\\default-man_avatar.jpg', '15978912395147', NULL, NULL, NULL, 1),
(89, 'n_nurse', 'FVudmfWPP8Z6WpwerN8gcsmA10WGvkrbOU4VerGI4ceWPvvwGxP58O6a7MbR', NULL, '2016-05-15 21:29:38', 1, 1, 1, 'n_nurse@yahoo.com', '$2y$10$VIT3lozttM6LyoeyN/lGCOjiCvDex4F3zesIpzDddcE5hFGaFn4k.', 'image\\users\\default-man_avatar.jpg', '12345678912343', NULL, NULL, NULL, 1),
(90, 'man_doc_test', NULL, '2016-04-16 12:30:01', '2016-04-16 12:30:01', 2, 1, 1, 'man_doc_test@yahoo.com', '$2y$10$raKh99SlDefKqJVRwIuBF.0b/qkB/aLzXE4W4JOBbyX9RgGyIbN1W', 'image\\users\\default-man_avatar.jpg', '14863259752148', NULL, NULL, NULL, 1),
(91, 'man_own_test', 'ZSz94FtWgWI68lFDrOxcapDmHhrXY5fLJawKMrYJq4pKvSKBW6Bqb82viZnI', '2016-04-16 12:32:07', '2016-04-16 12:54:57', 3, 1, 2, 'man_own_test@yahoo.com', '$2y$10$dNetZu9dTDqetijCFtqpwebGrEIPPJPIat/S3ogFEl.1YFsLCNzbe', 'image\\users\\default-woman_avatar.jpg', '15963214789654', NULL, NULL, NULL, 1),
(92, 'ClinicOwner', '1F6AztQOEkMbPopqRIeq7dRkwoB9HwXNDTu2iQNmUNtPGIHAZyWrznwnRuJn', '2016-04-16 13:05:11', '2016-04-16 13:11:34', 3, 1, 1, 'ClinicOwner@yahoo.com', '$2y$10$TEOPFc8iCP1taBa7KE35huksc3OuCJeH1JnfDL9dymg2xq6bnXMqq', 'image\\users\\default-man_avatar.jpg', '29508170103613', NULL, NULL, NULL, 1),
(93, 'doctor1', 'R4WcdgqS7JSoFXyMe82LKA9ip5lerVJoDInOiYs0Y0bIGbRCkTaFOewEpvW7', '2016-04-16 13:14:41', '2016-04-16 13:15:23', 3, 1, 1, 'doctor1@yahoo.com', '$2y$10$w3bydqZ9z2yBSkpFhkINHOlyQLSkxvomhfcm8ReRVqM0gYFNjAQxm', 'image\\users\\default-man_avatar.jpg', '29411032102173', NULL, NULL, NULL, 1),
(94, 'islam', NULL, NULL, NULL, 1, 1, 1, 'islam@yahoo.com', '$2y$10$lKgqAA6RtgR1.fkYUGya4.WGwmq909yYHo6ShTbj2je7fsRzNuk2C', 'image\\users\\default-man_avatar.jpg', '12397845698723', NULL, NULL, NULL, 1),
(95, 'owner_for_test', 'JZtQHnfhbA5wVVcu9lQ2VQukLQE7vNumrantUan85EC9Z4FzPJfVI3OohaIN', '2016-05-16 17:36:01', '2016-04-17 12:54:45', 3, 1, 1, 'owner@yahoo.com', '$2y$10$NDl5yuE0nBYdiPiqpM9Qb.DDyOlmcJGoYRyboEYZXUbJ3XBosyWtK', 'image/users/44853512016-05-16-owner_for_test', '89456123345678', 'cairo', '01141442423', 24, 1),
(97, 'doctor_for_test', 'NiWeVovhqbTjxlbw49VF2ORAOk3aB44ZD8Y5H6JSR5WiwV215UaLcuMSwEW6', '2016-05-16 17:39:30', '2016-05-17 14:18:54', 2, 1, 1, 'doctor_for_test@yahoo.com', '$2y$10$4s/Wsh17hIxb2DCbUZmrR.YUq55PfkbAvuXjb2FjNpFeeWE4ea/1.', 'image/users/61237792016-05-16-doctor_for_test', '15963587489654', 'egypt, cairo', '01141442423', 44, 1),
(98, 'nurse_for_test', 'JMcgSBt09x5nceAkalI30bVOFavM5CFLFJOCHryNfPKmUjfioiFP0FDPRdzH', NULL, '2016-05-16 18:08:55', 1, 1, 1, 'nurse_for_test@yahoo.com', '$2y$10$1CvCTRMd5t95Tw7EZGi2HOgGPLaf9X9RtFXsKtZzRPYpd3dYQ8Gr6', 'image/users/21774902016-05-16-nurse_for_test', '14785214785245', 'egypt cairo', '01141442424', 25, 1),
(99, 'patient_for_test', NULL, NULL, NULL, 4, 1, 1, 'patient_for_test@yahoo.com', '$2y$10$1q0WSShcJEY1TPaHpuSmcevJwy6Qpo0bZ2Q/ANj3JHfm71xTBh/TK', 'image\\users\\default-man_avatar.jpg', '14887965578964', 'egypt, cairo', '', 20, 1),
(100, 'owner_t', NULL, '2016-04-17 12:44:40', '2016-04-17 12:44:40', 3, 1, 1, 'owner_t@yahoo.com', '$2y$10$lFM8GG0S.6jyrRB/rh0Qn.7HPRu6vJBlUVrEK8/lVRygCdCrXf8Ly', 'image\\users\\default-man_avatar.jpg', '14141415151516', NULL, NULL, NULL, 1),
(101, 'doctor_t', NULL, '2016-04-17 12:46:00', '2016-04-17 12:46:00', 2, 1, 1, 'doctor_t@yahoo.com', '$2y$10$RnSI3SMtdzWrRhTxqZWHP.UIVGMoEMlExSFXt6SR06qB9GRRoRCGK', 'image\\users\\default-man_avatar.jpg', '15651565156515', NULL, NULL, NULL, 1),
(102, 'nurse_t', 'uj0OwlDsQBX92eowSaZ4nGpA4afjgy57bg9JKY0WYb7ealcnfUZgxjbulyEu', NULL, '2016-05-17 15:02:08', 1, 1, 1, 'nurse_t@yahoo.com', '$2y$10$tmXJofIbKhUEzISj/U23Fuv6yYCAdF.uICVCuZsG0yLKwps3f.O1.', 'image\\users\\default-man_avatar.jpg', '14789632547894', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `worktime`
--

DROP TABLE IF EXISTS `worktime`;
CREATE TABLE IF NOT EXISTS `worktime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clinic_id` int(15) NOT NULL,
  `doctor_id` int(15) NOT NULL,
  `day_id` int(3) NOT NULL,
  `from` int(5) NOT NULL,
  `to` int(5) NOT NULL,
  `date` varchar(25) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=214 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worktime`
--

INSERT INTO `worktime` (`id`, `clinic_id`, `doctor_id`, `day_id`, `from`, `to`, `date`, `is_active`) VALUES
(213, 86, 101, 7, 8, 10, '17/04/2016', 1),
(212, 86, 101, 6, 8, 10, '17/04/2016', 1),
(211, 86, 101, 5, 8, 10, '17/04/2016', 1),
(210, 86, 101, 4, 8, 10, '17/04/2016', 1),
(209, 86, 101, 3, 8, 10, '17/04/2016', 1),
(208, 86, 101, 2, 8, 10, '17/04/2016', 1),
(207, 86, 101, 1, 8, 10, '17/04/2016', 1),
(206, 85, 97, 4, 8, 10, '16/05/2016', 1),
(205, 85, 97, 3, 8, 10, '16/05/2016', 1),
(204, 85, 97, 2, 8, 10, '16/05/2016', 1),
(203, 85, 97, 1, 8, 10, '16/05/2016', 1),
(202, 80, 87, 4, 8, 10, '15/05/2016', 1),
(201, 80, 87, 3, 8, 10, '15/05/2016', 1),
(200, 80, 87, 2, 8, 10, '15/05/2016', 1),
(199, 80, 87, 1, 8, 10, '15/05/2016', 1),
(198, 78, 80, 4, 9, 10, '15/05/2016', 1),
(197, 76, 80, 7, 8, 10, '15/05/2016', 1),
(196, 76, 80, 6, 8, 10, '15/05/2016', 1),
(195, 76, 80, 5, 8, 10, '15/05/2016', 1),
(194, 76, 80, 4, 8, 10, '15/05/2016', 1),
(193, 76, 80, 3, 8, 10, '15/05/2016', 1),
(192, 75, 80, 2, 8, 10, '15/05/2016', 1),
(191, 75, 80, 1, 8, 10, '15/05/2016', 1),
(190, 8, 22, 7, 9, 11, '14/05/2016', 1),
(189, 8, 22, 6, 9, 11, '14/05/2016', 1),
(188, 8, 22, 5, 9, 11, '14/05/2016', 1),
(187, 8, 22, 4, 9, 11, '14/05/2016', 1),
(186, 8, 22, 3, 9, 11, '14/05/2016', 1),
(185, 8, 22, 2, 9, 11, '14/05/2016', 1),
(172, 33, 58, 7, 7, 5, '06/05/2016', 1),
(171, 33, 58, 6, 8, 9, '06/05/2016', 1),
(177, 64, 71, 5, 8, 10, '13/05/2016', 1),
(176, 64, 71, 4, 8, 10, '13/05/2016', 1),
(175, 64, 71, 3, 8, 10, '13/05/2016', 1),
(174, 64, 71, 2, 8, 10, '13/05/2016', 1),
(173, 64, 71, 1, 8, 10, '13/05/2016', 1),
(165, 55, 50, 7, 8, 10, '23/04/2016', 1),
(164, 55, 50, 6, 8, 10, '23/04/2016', 1),
(163, 55, 50, 3, 8, 10, '23/04/2016', 1),
(162, 55, 50, 2, 8, 10, '23/04/2016', 1),
(161, 55, 50, 1, 8, 10, '23/04/2016', 1),
(184, 8, 22, 1, 9, 11, '14/05/2016', 1),
(183, 73, 58, 4, 8, 10, '13/05/2016', 1),
(182, 73, 58, 3, 8, 10, '13/05/2016', 1),
(181, 72, 58, 1, 8, 10, '13/05/2016', 1),
(180, 69, 71, 1, 2, 3, '13/05/2016', 1),
(179, 64, 71, 7, 8, 10, '13/05/2016', 1),
(178, 64, 71, 6, 8, 10, '13/05/2016', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
