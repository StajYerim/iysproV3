-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 22 May 2018, 06:47:15
-- Sunucu sürümü: 5.7.22-0ubuntu0.16.04.1
-- PHP Sürümü: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `iys-db-dev`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_account_unit`
--

CREATE TABLE `iys_account_unit` (
  `account_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_account_unit`
--

INSERT INTO `iys_account_unit` (`account_id`, `unit_id`) VALUES
(1, 1),
(1, 20),
(1, 19),
(1, 6),
(1, 26);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_app_accounts`
--

CREATE TABLE `iys_app_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `expiry_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_app_accounts`
--

INSERT INTO `iys_app_accounts` (`id`, `company_name`, `sector_id`, `owner_id`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, 'One Company Ltd.', 1, 2, '2019-04-23 00:00:00', '2018-03-23 19:33:32', '2018-05-08 08:19:29'),
(2, 'Rambo Plastik', 3, 5, '2018-05-30 16:21:27', '2018-04-30 13:21:27', '2018-04-30 13:21:27'),
(3, 'DENEME', 3, 6, '2018-06-12 12:58:21', '2018-05-12 16:58:21', '2018-05-12 16:58:21');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_app_languages`
--

CREATE TABLE `iys_app_languages` (
  `lang_id` int(10) UNSIGNED NOT NULL,
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A',
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_app_languages`
--

INSERT INTO `iys_app_languages` (`lang_id`, `lang_code`, `name`, `status`, `country_code`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', 'A', NULL, '2018-03-23 19:33:31', '2018-03-23 19:33:31'),
(2, 'tr', 'Turkish', 'A', NULL, '2018-03-23 19:33:31', '2018-03-23 19:33:31'),
(3, 'sa', 'Arabic', 'A', NULL, '2018-03-23 19:33:31', '2018-03-23 19:33:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_bank_accounts`
--

CREATE TABLE `iys_bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0-Pasif 1-Aktif',
  `type` int(11) NOT NULL DEFAULT '1' COMMENT 'Kasa Hesabı 2-Banka Hesabı 3-Kredili Hesap',
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_iban` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TRY,EUR,USD',
  `cheque` int(11) DEFAULT '0' COMMENT 'Çek Kullanımı 0-Pasif 1-Aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_bank_accounts`
--

INSERT INTO `iys_bank_accounts` (`id`, `name`, `account_id`, `status`, `type`, `bank_name`, `bank_branch`, `bank_no`, `bank_iban`, `currency`, `cheque`, `created_at`, `updated_at`) VALUES
(1, 'KASA HESABI', 1, 1, 1, NULL, NULL, NULL, NULL, 'TRY', NULL, '2018-05-22 13:51:52', '2018-05-22 13:51:52'),
(2, 'BANK HESABI', 1, 1, 2, 'GARANTİ BANKASI', 'SUBURCU', NULL, 'TR060011542554154256', 'TRY', 0, '2018-05-22 13:52:34', '2018-05-22 13:52:34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_bank_items`
--

CREATE TABLE `iys_bank_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_barcodes`
--

CREATE TABLE `iys_barcodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `barcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_barcodes`
--

INSERT INTO `iys_barcodes` (`id`, `product_id`, `barcode`) VALUES
(2, 6, '123456'),
(3, 18, '123123'),
(4, 14, '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_categories`
--

CREATE TABLE `iys_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_categories`
--

INSERT INTO `iys_categories` (`id`, `account_id`, `name`, `color`, `type`) VALUES
(1, 1, 'TESTER', '#7f3f98', 'product'),
(2, 1, 'FISTIK', '#f58356', 'product'),
(3, 1, 'yeni katgori', '#fdb813', 'product'),
(4, 1, 'TEST', '#d5d226', 'product');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_cities`
--

CREATE TABLE `iys_cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_cities`
--

INSERT INTO `iys_cities` (`id`, `city`) VALUES
(82, 'Adana'),
(83, 'Adıyaman'),
(84, 'Afyonkarahisar'),
(85, 'Ağrı'),
(86, 'Aksaray'),
(87, 'Amasya'),
(88, 'Ankara'),
(89, 'Antalya'),
(90, 'Ardahan'),
(91, 'Artvin'),
(92, 'Aydın'),
(93, 'Balıkesir'),
(94, 'Bartın'),
(95, 'Batman'),
(96, 'Bayburt'),
(97, 'Bilecik'),
(98, 'Bingöl'),
(99, 'Bitlis'),
(100, 'Bolu'),
(101, 'Burdur'),
(102, 'Bursa'),
(103, 'Çanakkale'),
(104, 'Çankırı'),
(105, 'Çorum'),
(106, 'Denizli'),
(107, 'Diyarbakır'),
(108, 'Düzce'),
(109, 'Edirne'),
(110, 'Elazığ'),
(111, 'Erzincan'),
(112, 'Erzurum'),
(113, 'Eskişehir'),
(114, 'Gaziantep'),
(115, 'Giresun'),
(116, 'Gümüşhane'),
(117, 'Hakkari'),
(118, 'Hatay'),
(119, 'Iğdır'),
(120, 'Isparta'),
(121, 'İstanbul'),
(122, 'İzmir'),
(123, 'Kahramanmaraş'),
(124, 'Karabük'),
(125, 'Karaman'),
(126, 'Kars'),
(127, 'Kastamonu'),
(128, 'Kayseri'),
(129, 'Kırıkkale'),
(130, 'Kırklareli'),
(131, 'Kırşehir'),
(132, 'Kilis'),
(133, 'Kocaeli'),
(134, 'Konya'),
(135, 'Kütahya'),
(136, 'Malatya'),
(137, 'Manisa'),
(138, 'Mardin'),
(139, 'Mersin'),
(140, 'Muğla'),
(141, 'Muş'),
(142, 'Nevşehir'),
(143, 'Niğde'),
(144, 'Ordu'),
(145, 'Osmaniye'),
(146, 'Rize'),
(147, 'Sakarya'),
(148, 'Samsun'),
(149, 'Siirt'),
(150, 'Sinop'),
(151, 'Sivas'),
(152, 'Şanlıurfa'),
(153, 'Şırnak'),
(154, 'Tekirdağ'),
(155, 'Tokat'),
(156, 'Trabzon'),
(157, 'Tunceli'),
(158, 'Uşak'),
(159, 'Van'),
(160, 'Yalova'),
(161, 'Yozgat'),
(162, 'Zonguldak');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_company_addresses`
--

CREATE TABLE `iys_company_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `address_abroad` int(11) DEFAULT '0' COMMENT '0-NO 1-YES',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_company_addresses`
--

INSERT INTO `iys_company_addresses` (`id`, `company_id`, `address_abroad`, `address`, `town`, `city`, `country`, `address_type`, `email`, `phone_number`, `fax_number`) VALUES
(1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 0, 'Iraq', 'Ea.', 'Bednarhaven', NULL, NULL, 'jaclyn.fahey@raynor.com', '1322762877', '1679174037'),
(3, 3, 0, 'Barbados', 'Odit.', 'Laishaside', NULL, NULL, 'eloisa64@bogisich.com', '694596753', '1220330771'),
(4, 4, 0, 'Martinique', 'Sint.', 'East Chelseahaven', NULL, NULL, 'jayson.quitzon@becker.com', '1884785548', '188789568'),
(5, 5, 0, 'Equatorial Guinea', 'Odio.', 'New Carlostad', NULL, NULL, 'ziemann.darrick@swift.com', '1361687305', '1162612439'),
(6, 6, 0, 'Thailand', 'Qui.', 'Terrenceland', NULL, NULL, 'lavinia.towne@rau.biz', '1131080089', '702033451'),
(7, 7, 0, 'Saint Pierre and Miquelon', 'Enim.', 'Lilianeborough', NULL, NULL, 'kattie74@little.com', '2000310851', '1364047225'),
(8, 8, 0, 'Brunei Darussalam', 'Quia.', 'West Jeff', NULL, NULL, 'bins.royce@emard.net', '1422747102', '264475522'),
(9, 9, 0, 'Georgia', 'Qui.', 'Dawsonmouth', NULL, NULL, 'haag.fannie@satterfield.com', '1856203677', '1537192446'),
(10, 10, 0, 'Saint Vincent and the Grenadines', 'Ad.', 'Anibalview', NULL, NULL, 'cohara@hermann.org', '1260925666', '1555377946'),
(11, 11, 0, 'Malawi', 'Et.', 'Port Brandy', NULL, NULL, 'maryse.wolf@blick.info', '159290719', '1674339935'),
(12, 12, 0, 'Zambia', 'Quod.', 'South Rowlandport', NULL, NULL, 'cooper.casper@ward.com', '373033933', '1290838666'),
(13, 13, 0, 'Mali', 'Ut.', 'Jodieshire', NULL, NULL, 'elijah27@schowalter.com', '44056281', '692635530'),
(14, 14, 0, 'Pitcairn Islands', 'Iste.', 'West Delmerhaven', NULL, NULL, 'jheidenreich@bergstrom.com', '448709084', '241884333'),
(15, 15, 0, 'Faroe Islands', 'Et.', 'Schmittton', NULL, NULL, 'coralie.upton@dickinson.net', '1807832149', '736839183'),
(16, 16, 0, 'Saint Vincent and the Grenadines', 'Nemo.', 'West Marge', NULL, NULL, 'deja.barton@hettinger.net', '2003048669', '1166772760'),
(17, 17, 0, 'Singapore', 'Ut.', 'Lindhaven', NULL, NULL, 'oweber@sanford.com', '2119005190', '675032862'),
(18, 18, 0, 'Anguilla', 'Quo.', 'North Charlie', NULL, NULL, 'nicola64@sawayn.biz', '1432351147', '1221689131'),
(19, 19, 0, 'Vietnam', 'At.', 'Zachariahbury', NULL, NULL, 'allan.maggio@ebert.com', '1205817478', '1881190709'),
(20, 20, 0, 'Iraq', 'Ex.', 'Lillianbury', NULL, NULL, 'bkuhlman@dicki.org', '2003055678', '1547094655'),
(21, 21, 0, 'Mali', 'Aut.', 'Lake Sonny', NULL, NULL, 'rpfannerstill@corwin.info', '966217665', '150268905'),
(22, 22, 0, 'Burundi', 'Est.', 'Jenkinsside', NULL, NULL, 'hammes.jena@adams.com', '1170821755', '2080603874'),
(23, 23, 0, 'Guernsey', 'Qui.', 'Port Brayanshire', NULL, NULL, 'heidi77@cronin.net', '1898991639', '1188578284'),
(24, 24, 0, 'Saint Barthelemy', 'Quia.', 'South Jeromyville', NULL, NULL, 'sally.luettgen@sauer.biz', '858963918', '1284119468'),
(25, 25, 0, 'Bahrain', 'Aut.', 'Heaneyborough', NULL, NULL, 'lindsey.smitham@russel.com', '2092124257', '299517063'),
(26, 26, 0, 'Tunisia', 'Unde.', 'Fadelfurt', NULL, NULL, 'earline00@johns.org', '1661553052', '1376441850'),
(27, 27, 0, 'Turkey', 'Sed.', 'Hermannview', NULL, NULL, 'dschinner@fahey.com', '1105309928', '1933180997'),
(28, 28, 0, 'Northern Mariana Islands', 'Sed.', 'South Gregport', NULL, NULL, 'kaitlyn.ruecker@sipes.com', '2136305106', '1875861241'),
(29, 29, 0, 'Cote d\'Ivoire', 'Aut.', 'Port Eleazar', NULL, NULL, 'durgan.forest@hahn.com', '1825033310', '1835066656'),
(30, 30, 0, 'Mozambique', 'Et.', 'West Sylvester', NULL, NULL, 'wilber61@hodkiewicz.com', '1641655811', '1325314030'),
(31, 31, 0, 'Argentina', 'In.', 'New Alisamouth', NULL, NULL, 'leffler.zetta@labadie.com', '1269096423', '1792081499'),
(32, 32, 0, 'Northern Mariana Islands', 'Ab.', 'South Reubenmouth', NULL, NULL, 'itzel82@swaniawski.org', '1663542314', '1724648273'),
(33, 33, 0, 'Romania', 'Sit.', 'Lake Adolphus', NULL, NULL, 'runte.rhiannon@oconner.com', '902009828', '1519146774'),
(34, 34, 0, 'Mexico', 'Enim.', 'Pinkmouth', NULL, NULL, 'hgutkowski@okuneva.com', '1853893191', '1152402921'),
(35, 35, 0, 'Tuvalu', 'Aut.', 'Beckerport', NULL, NULL, 'kunze.vincenzo@grant.com', '1932683474', '1959305281'),
(36, 36, 0, 'Mongolia', 'Sed.', 'South Lenny', NULL, NULL, 'gay59@padberg.net', '1256955211', '329892331'),
(37, 37, 0, 'Macao', 'Unde.', 'South Rylanshire', NULL, NULL, 'odoyle@haag.org', '116151341', '1385093371'),
(38, 38, 0, 'Maldives', 'Quam.', 'Russborough', NULL, NULL, 'ortiz.lelah@mante.com', '724461626', '1583278508'),
(39, 39, 0, 'Kuwait', 'Eos.', 'Lake Alexamouth', NULL, NULL, 'pfeffer.forrest@larkin.com', '602924463', '1535078639'),
(40, 40, 0, 'Indonesia', 'Qui.', 'Enidport', NULL, NULL, 'august.bechtelar@braun.org', '1654822686', '840914027'),
(41, 41, 0, 'Dominican Republic', 'Sit.', 'Mannstad', NULL, NULL, 'koch.cicero@larson.com', '830829177', '412238989'),
(42, 42, 0, 'Iceland', 'Fuga.', 'Samsonborough', NULL, NULL, 'dixie.howe@schmitt.biz', '1684375906', '586827262'),
(43, 43, 0, 'Holy See (Vatican City State)', 'At.', 'East Luellastad', NULL, NULL, 'qgaylord@weimann.org', '105904132', '638590648'),
(44, 44, 0, 'Montenegro', 'Quia.', 'West Keira', NULL, NULL, 'runolfsdottir.sarina@pfannerstill.org', '594986102', '2115035447'),
(45, 45, 0, 'Eritrea', 'Iste.', 'Martamouth', NULL, NULL, 'swaniawski.kathlyn@hoppe.org', '2058313269', '1842140646'),
(46, 46, 0, 'Montserrat', 'Ad.', 'Lake Cara', NULL, NULL, 'pkertzmann@dibbert.org', '1488552424', '1584713470'),
(47, 47, 0, 'Sweden', 'Vel.', 'Kendallshire', NULL, NULL, 'troy55@gleason.info', '2019701727', '1204854126'),
(48, 48, 0, 'Svalbard & Jan Mayen Islands', 'Ut.', 'Smithport', NULL, NULL, 'jerome04@ankunding.info', '1330349150', '1638387068'),
(49, 49, 0, 'Zimbabwe', 'Est.', 'Anjalishire', NULL, NULL, 'toy.blake@tillman.biz', '520578405', '1827909367'),
(50, 50, 0, 'Ethiopia', 'Nemo.', 'Rennerfort', NULL, NULL, 'cmayer@little.biz', '2084235419', '1721476794'),
(51, 51, 0, 'Solomon Islands', 'Ut.', 'Wilbertstad', NULL, NULL, 'kbotsford@johnston.com', '254560694', '1453363931'),
(52, 52, 0, 'Bermuda', 'Ut.', 'Lake Lysanne', NULL, NULL, 'hauck.kathryn@boyle.com', '22620671', '207510869'),
(53, 53, 0, 'Armenia', 'Modi.', 'East Oleta', NULL, NULL, 'xtillman@king.org', '1388448995', '312633834'),
(54, 54, 0, 'Finland', 'Quia.', 'Cademouth', NULL, NULL, 'lizzie83@pfeffer.com', '127611984', '1863316158'),
(55, 55, 0, 'Congo', 'Est.', 'South Penelope', NULL, NULL, 'theidenreich@gutkowski.net', '1911768135', '1653183908'),
(56, 56, 0, 'Bhutan', 'Enim.', 'East Jadynville', NULL, NULL, 'iwiza@bogisich.com', '1817467283', '1793043019'),
(57, 57, 0, 'Angola', 'In.', 'Port Agustin', NULL, NULL, 'stella.jerde@kilback.net', '1517394724', '993599928'),
(58, 58, 0, 'Ethiopia', 'Sit.', 'North Estelmouth', NULL, NULL, 'lconn@corwin.com', '783190339', '989355054'),
(59, 59, 0, 'Senegal', 'In.', 'Rohanmouth', NULL, NULL, 'rzboncak@bergnaum.com', '1097927231', '983028872'),
(60, 60, 0, 'Yemen', 'Vero.', 'North Genevieve', NULL, NULL, 'obeer@shanahan.com', '220061435', '2087008651'),
(61, 61, 0, 'Namibia', 'Quos.', 'Dayneborough', NULL, NULL, 'colten66@marvin.com', '322684857', '868701456'),
(62, 62, 0, 'Guinea-Bissau', 'Iste.', 'East Dario', NULL, NULL, 'iritchie@hessel.biz', '568723997', '937594341'),
(63, 63, 0, 'Saint Martin', 'Sunt.', 'Celestineside', NULL, NULL, 'rogahn.christy@mcdermott.org', '1073417319', '931073780'),
(64, 64, 0, 'British Indian Ocean Territory (Chagos Archipelago)', 'Aut.', 'Mannshire', NULL, NULL, 'braun.nina@corkery.biz', '1692835294', '314465404'),
(65, 65, 0, 'Russian Federation', 'Et.', 'East Margaretta', NULL, NULL, 'hermann.hayes@nolan.biz', '373521514', '757006066'),
(66, 66, 0, 'Bangladesh', 'Iure.', 'South Dorthashire', NULL, NULL, 'asanford@langworth.com', '697177055', '763063012'),
(67, 67, 0, 'Reunion', 'Ex.', 'Port Xavierview', NULL, NULL, 'oreilly.hanna@boehm.com', '1459760165', '1498224750'),
(68, 68, 0, 'Qatar', 'Quae.', 'Boyleton', NULL, NULL, 'osborne78@miller.net', '355037600', '1195652473'),
(69, 69, 0, 'New Caledonia', 'Ea.', 'Kemmerfort', NULL, NULL, 'wava.treutel@langosh.com', '1141354069', '2079231605'),
(70, 70, 0, 'Nauru', 'Nisi.', 'West Cathy', NULL, NULL, 'felipa14@rowe.com', '2015500131', '491209253'),
(71, 71, 0, 'Madagascar', 'At.', 'East Delphaborough', NULL, NULL, 'cathy86@mante.com', '1572617972', '929536562'),
(72, 72, 0, 'Vanuatu', 'Fuga.', 'East Thadmouth', NULL, NULL, 'carli10@powlowski.com', '1865178294', '2023554275'),
(73, 73, 0, 'Malaysia', 'A.', 'Reynoldsmouth', NULL, NULL, 'garett95@stehr.com', '269220977', '1076279301'),
(74, 74, 0, 'Hong Kong', 'Sint.', 'South Ova', NULL, NULL, 'glover.vallie@hand.com', '93205335', '407014566'),
(75, 75, 0, 'Namibia', 'Qui.', 'South Faybury', NULL, NULL, 'cindy20@hansen.com', '1829588590', '612794789'),
(76, 76, 0, 'Papua New Guinea', 'Ut.', 'South Oranburgh', NULL, NULL, 'sydney05@schultz.com', '1423723405', '1342177603'),
(77, 77, 0, 'Andorra', 'Ab.', 'Astridmouth', NULL, NULL, 'tressie.fritsch@cormier.com', '1600445596', '650941396'),
(78, 78, 0, 'Slovakia (Slovak Republic)', 'Ea.', 'Lake Russell', NULL, NULL, 'meagan13@bergstrom.com', '1601498143', '1576554449'),
(79, 79, 0, 'Swaziland', 'Et.', 'West Petraview', NULL, NULL, 'liana40@stehr.org', '298408882', '489606088'),
(80, 80, 0, 'Iran', 'Et.', 'West Hilbert', NULL, NULL, 'dayton.oconner@kshlerin.com', '408304322', '1245419439'),
(81, 81, 0, 'Taiwan', 'Ab.', 'North Reaganmouth', NULL, NULL, 'mbashirian@leuschke.com', '224719709', '1395153793'),
(82, 82, 0, 'Gambia', 'A.', 'South Darbyport', NULL, NULL, 'littel.joanie@hintz.com', '1536245087', '1408695175'),
(83, 83, 0, 'India', 'Ad.', 'New Sidney', NULL, NULL, 'lschowalter@rutherford.org', '1315899112', '1927410003'),
(84, 84, 0, 'Tokelau', 'Ut.', 'Keelingberg', NULL, NULL, 'alfred.hermiston@bashirian.com', '1193742783', '2084746366'),
(85, 85, 0, 'Belize', 'Quo.', 'New Susanna', NULL, NULL, 'liliana.bechtelar@sawayn.com', '419998841', '440690102'),
(86, 86, 0, 'Panama', 'Ex.', 'Lake Kiarachester', NULL, NULL, 'jordan.herman@kerluke.com', '724169255', '1533710500'),
(87, 87, 0, 'Bahamas', 'Quae.', 'Stiedemanntown', NULL, NULL, 'erick.bins@nikolaus.info', '1819384648', '2116370992'),
(88, 88, 0, 'Colombia', 'Sit.', 'East Flavieport', NULL, NULL, 'prudence82@homenick.biz', '698719802', '584202613'),
(89, 89, 0, 'New Zealand', 'Odio.', 'Lebsackview', NULL, NULL, 'milton.braun@balistreri.com', '1097889598', '1790787211'),
(90, 90, 0, 'Finland', 'Qui.', 'New Nat', NULL, NULL, 'pvandervort@okon.com', '508963292', '2046200303'),
(91, 91, 0, 'Burkina Faso', 'Sint.', 'Oralchester', NULL, NULL, 'jones.susie@graham.net', '1142080009', '1275374966'),
(92, 92, 0, 'Saint Helena', 'Nam.', 'New Marcel', NULL, NULL, 'mhahn@schmidt.net', '787254695', '1605553010'),
(93, 93, 0, 'Jersey', 'Sint.', 'East Horace', NULL, NULL, 'omertz@hilll.com', '1354511742', '806980268'),
(94, 94, 0, 'Montserrat', 'Esse.', 'Sawaynburgh', NULL, NULL, 'pkovacek@heaney.biz', '6000700', '588015341'),
(95, 95, 0, 'Kuwait', 'Vero.', 'South Alia', NULL, NULL, 'nikolaus.kole@monahan.com', '1528134828', '1255936674'),
(96, 96, 0, 'Mali', 'Sint.', 'North Modestoside', NULL, NULL, 'toney.trantow@parker.net', '1827965073', '373386383'),
(97, 97, 0, 'Wallis and Futuna', 'Et.', 'North Mazieside', NULL, NULL, 'zelma.shanahan@mcdermott.com', '1095294192', '1405486481'),
(98, 98, 0, 'Sao Tome and Principe', 'Modi.', 'Greenholtland', NULL, NULL, 'karelle.spinka@huel.com', '577332144', '1772676838'),
(99, 99, 0, 'Gabon', 'Est.', 'Seanfurt', NULL, NULL, 'equigley@hilpert.net', '1034270428', '2030742033'),
(100, 100, 0, 'Slovakia (Slovak Republic)', 'Ut.', 'East Tyriqueside', NULL, NULL, 'trycia30@luettgen.org', '290163270', '1063040742'),
(101, 101, 0, 'Malta', 'Qui.', 'Graysonburgh', NULL, NULL, 'ccartwright@toy.biz', '1915007472', '1132270272'),
(102, 102, 0, 'Philippines', 'Aut.', 'Klockoburgh', NULL, NULL, 'doyle.myrna@waters.com', '1726169497', '252501372'),
(103, 103, 0, 'Lithuania', 'A.', 'Havenberg', NULL, NULL, 'everette01@stiedemann.com', '611688249', '48794037'),
(104, 104, 0, 'Canada', 'Eum.', 'South Sterlingberg', NULL, NULL, 'waelchi.arielle@dibbert.com', '1515821034', '627992008'),
(105, 105, 0, 'Aruba', 'Id.', 'Harveymouth', NULL, NULL, 'mreichel@kerluke.com', '1936629166', '543100230'),
(106, 106, 0, 'Nauru', 'In.', 'West Madisynport', NULL, NULL, 'ihamill@beer.com', '1351948507', '488799049'),
(107, 107, 0, 'Guam', 'Nemo.', 'Adamstown', NULL, NULL, 'clangworth@ratke.com', '934322807', '850054103'),
(108, 108, 0, 'Liberia', 'Et.', 'Kirlinborough', NULL, NULL, 'pearl.effertz@borer.com', '259023487', '1218822219'),
(109, 109, 0, 'Ecuador', 'Quia.', 'Yundtside', NULL, NULL, 'tressie.pollich@wiegand.org', '424650928', '161293682'),
(110, 110, 0, 'Italy', 'Ex.', 'West Ruthstad', NULL, NULL, 'pkling@hills.info', '660407282', '1680530459'),
(111, 111, 0, 'Lithuania', 'Quos.', 'East Queenmouth', NULL, NULL, 'taurean.denesik@green.com', '774740448', '568757022'),
(112, 112, 0, 'Belgium', 'In.', 'Nadiaberg', NULL, NULL, 'norris81@becker.com', '1132012251', '1826328606'),
(113, 113, 0, 'Canada', 'Qui.', 'Willahaven', NULL, NULL, 'nhuel@strosin.net', '2039422279', '1740671845'),
(114, 114, 0, 'Greece', 'In.', 'Lake Shannonton', NULL, NULL, 'dkub@bashirian.com', '907911884', '1378044872'),
(115, 115, 0, 'Cameroon', 'Iste.', 'Dooleychester', NULL, NULL, 'dejah45@murray.net', '1242171650', '1334367158'),
(116, 116, 0, 'Turks and Caicos Islands', 'Aut.', 'North Cristopherton', NULL, NULL, 'shand@ernser.com', '1763761330', '1715099740'),
(117, 117, 0, 'Saudi Arabia', 'Odio.', 'Anitafort', NULL, NULL, 'breanne.pagac@langworth.com', '817508321', '1864211495'),
(118, 118, 0, 'Chad', 'Qui.', 'Cummingshaven', NULL, NULL, 'asa.auer@veum.info', '470664193', '886559827'),
(119, 119, 0, 'Solomon Islands', 'Est.', 'Haleybury', NULL, NULL, 'steuber.darwin@beatty.com', '1051537081', '1258946893'),
(120, 120, 0, 'Afghanistan', 'Nam.', 'South Jackymouth', NULL, NULL, 'tate.mclaughlin@runolfsdottir.com', '1491499400', '1099193926'),
(121, 121, 0, 'Qatar', 'Et.', 'Dooleybury', NULL, NULL, 'loyal26@wilderman.com', '627957784', '1325027392'),
(122, 122, 0, 'French Southern Territories', 'Odit.', 'Wilkinsonshire', NULL, NULL, 'goodwin.dustin@dibbert.com', '427514057', '1166671638'),
(123, 123, 0, 'Cuba', 'Aut.', 'Port Eliezermouth', NULL, NULL, 'julien.blanda@leffler.com', '51681758', '810074105'),
(124, 124, 0, 'Estonia', 'Quis.', 'Haagville', NULL, NULL, 'xprohaska@waelchi.com', '303647747', '1077450191'),
(125, 125, 0, 'Egypt', 'Sunt.', 'Lake Seth', NULL, NULL, 'kacie53@johnston.com', '675091031', '181881385'),
(126, 126, 0, 'Nepal', 'Qui.', 'Hirtheton', NULL, NULL, 'hauck.clotilde@dickinson.net', '649742276', '1291914782'),
(127, 127, 0, 'French Guiana', 'Hic.', 'Cassinside', NULL, NULL, 'malika71@walker.com', '1142282082', '1924380166'),
(128, 128, 0, 'Cayman Islands', 'Quo.', 'East Verona', NULL, NULL, 'qcasper@crooks.com', '109493328', '130571771'),
(129, 129, 0, 'United Kingdom', 'Ex.', 'Clemensberg', NULL, NULL, 'theresa.vonrueden@frami.com', '944506757', '1098449859'),
(130, 130, 0, 'Gambia', 'Quis.', 'Littlemouth', NULL, NULL, 'arturo61@kshlerin.net', '1261581260', '1472818140'),
(131, 131, 0, 'Malaysia', 'Et.', 'Jenkinsfort', NULL, NULL, 'jon84@spinka.com', '1307433766', '980096197'),
(132, 132, 0, 'Ecuador', 'Est.', 'Schmittborough', NULL, NULL, 'jennyfer.bartell@legros.com', '271285546', '232939600'),
(133, 133, 0, 'Mongolia', 'Id.', 'New Dawsonmouth', NULL, NULL, 'baron40@reilly.com', '644164518', '1746644816'),
(134, 134, 0, 'Belize', 'Cum.', 'Rohanmouth', NULL, NULL, 'fyundt@herman.com', '2114334449', '1266268729'),
(135, 135, 0, 'Sweden', 'Et.', 'East Zoey', NULL, NULL, 'iritchie@nicolas.org', '817955278', '974080399'),
(136, 136, 0, 'Azerbaijan', 'Est.', 'East Steve', NULL, NULL, 'aiyana.feil@goyette.com', '2108684863', '1426789821'),
(137, 137, 0, 'Mongolia', 'Modi.', 'West Delia', NULL, NULL, 'don.terry@reilly.org', '606989736', '987916263'),
(138, 138, 0, 'Hungary', 'Vero.', 'Federicoshire', NULL, NULL, 'tmohr@turcotte.com', '2026813721', '597239178'),
(139, 139, 0, 'Norfolk Island', 'Quae.', 'Simoniston', NULL, NULL, 'rhea.keebler@friesen.com', '2096234137', '916501281'),
(140, 140, 0, 'Central African Republic', 'Vel.', 'Claudinebury', NULL, NULL, 'suzanne02@king.com', '1731371399', '2107857202'),
(141, 141, 0, 'Lao People\'s Democratic Republic', 'Odio.', 'Ferryhaven', NULL, NULL, 'nickolas.hagenes@hauck.com', '330966356', '331835447'),
(142, 142, 0, 'Congo', 'Aut.', 'Cassandrefurt', NULL, NULL, 'silas48@schimmel.net', '1242483299', '287646684'),
(143, 143, 0, 'Iceland', 'Qui.', 'Armstrongside', NULL, NULL, 'darrel57@mccullough.com', '523367733', '1502821503'),
(144, 144, 0, 'Botswana', 'Sint.', 'New Justen', NULL, NULL, 'lupe50@herman.com', '915578614', '105928309'),
(145, 145, 0, 'Netherlands Antilles', 'Esse.', 'West Hobartbury', NULL, NULL, 'reinhold66@kassulke.com', '2054728763', '94824343'),
(146, 146, 0, 'Guinea', 'Sit.', 'South Tatyanaside', NULL, NULL, 'frederick17@rath.com', '205612033', '1676825036'),
(147, 147, 0, 'Bahrain', 'Est.', 'New Fredymouth', NULL, NULL, 'jamil.hayes@koelpin.com', '72604357', '199572161'),
(148, 148, 0, 'Saint Barthelemy', 'Eum.', 'Janicktown', NULL, NULL, 'orpha04@tromp.com', '499349769', '2014542290'),
(149, 149, 0, 'Niger', 'Non.', 'Ziemechester', NULL, NULL, 'bcormier@durgan.com', '1066705414', '2029972556'),
(150, 150, 0, 'Vanuatu', 'Unde.', 'Pfannerstillville', NULL, NULL, 'willms.katelyn@murray.info', '2099186325', '1900403499'),
(151, 151, 0, 'Christmas Island', 'Aut.', 'Vickymouth', NULL, NULL, 'marianna.schuster@rosenbaum.com', '1483106015', '525207117'),
(152, 152, 0, 'Pitcairn Islands', 'Sint.', 'Earlineshire', NULL, NULL, 'dawn.ebert@haley.biz', '212878967', '1464345967'),
(153, 153, 0, 'Korea', 'Enim.', 'Ziemannstad', NULL, NULL, 'mmayert@brown.com', '77446473', '217203835'),
(154, 154, 0, 'Saudi Arabia', 'Esse.', 'New Gilbertoborough', NULL, NULL, 'pblanda@bayer.com', '2036449637', '548251097'),
(155, 155, 0, 'Sao Tome and Principe', 'In.', 'North Raphaelborough', NULL, NULL, 'kyle.hodkiewicz@smith.biz', '223286536', '1175321307'),
(156, 156, 0, 'Austria', 'Sed.', 'Kristymouth', NULL, NULL, 'areynolds@lemke.com', '807240990', '678087289'),
(157, 157, 0, 'Sri Lanka', 'Et.', 'East Neilview', NULL, NULL, 'lenny.nienow@murray.com', '1229605961', '730677663'),
(158, 158, 0, 'Grenada', 'Ea.', 'Katrinahaven', NULL, NULL, 'rahsaan92@powlowski.com', '529709070', '1863318130'),
(159, 159, 0, 'Bulgaria', 'Sint.', 'Port Ellamouth', NULL, NULL, 'jacobs.bernard@jacobi.net', '543507832', '229143747'),
(160, 160, 0, 'Yemen', 'In.', 'Lake Vivianne', NULL, NULL, 'uhansen@wiegand.com', '95029394', '358875253'),
(161, 161, 0, 'Samoa', 'Odit.', 'East Novellaview', NULL, NULL, 'bridie17@buckridge.com', '1990219497', '697028080'),
(162, 162, 0, 'Jamaica', 'Ex.', 'South Anselstad', NULL, NULL, 'hboyle@zboncak.com', '2057559159', '1749084761'),
(163, 163, 0, 'French Polynesia', 'Aut.', 'Rodriguezfort', NULL, NULL, 'francesco.frami@mitchell.net', '452861861', '762273131'),
(164, 164, 0, 'Western Sahara', 'Aut.', 'Estaville', NULL, NULL, 'travis.conroy@kub.com', '1835135720', '2052295555'),
(165, 165, 0, 'Canada', 'Enim.', 'Blockfurt', NULL, NULL, 'ekunze@ebert.com', '1257669585', '110372802'),
(166, 166, 0, 'Ukraine', 'Ex.', 'Port Vida', NULL, NULL, 'glover.emerald@hyatt.com', '456898890', '568201713'),
(167, 167, 0, 'Rwanda', 'Eum.', 'Shaynafort', NULL, NULL, 'lreichel@baumbach.com', '1944154036', '1757661934'),
(168, 168, 0, 'Malaysia', 'Sit.', 'Kesslerfurt', NULL, NULL, 'adell92@boyer.com', '881159178', '467427933'),
(169, 169, 0, 'Estonia', 'Ex.', 'New Sabrinaton', NULL, NULL, 'fidel26@rempel.com', '1907641453', '1933327692'),
(170, 170, 0, 'Bermuda', 'Qui.', 'Mitchellchester', NULL, NULL, 'isanford@leuschke.com', '313991066', '2054194233'),
(171, 171, 0, 'Palestinian Territories', 'Et.', 'South Hilbertview', NULL, NULL, 'haleigh.weissnat@orn.info', '922093693', '1928784663'),
(172, 172, 0, 'Gibraltar', 'Quia.', 'Wyattburgh', NULL, NULL, 'nienow.enola@little.com', '352734183', '399349930'),
(173, 173, 0, 'Cote d\'Ivoire', 'Aut.', 'Homenicktown', NULL, NULL, 'mmante@balistreri.biz', '2045694386', '1083113775'),
(174, 174, 0, 'Iceland', 'Eos.', 'D\'Amorefurt', NULL, NULL, 'ali55@parisian.com', '526759354', '398046591'),
(175, 175, 0, 'Venezuela', 'Sint.', 'Collierchester', NULL, NULL, 'rose11@mitchell.net', '985299774', '2097763463'),
(176, 176, 0, 'Hong Kong', 'Id.', 'West Brennan', NULL, NULL, 'hagenes.taya@anderson.biz', '942310060', '675623256'),
(177, 177, 0, 'Yemen', 'Eum.', 'South Tyler', NULL, NULL, 'myrtie74@sawayn.com', '1769880802', '1179667003'),
(178, 178, 0, 'Ethiopia', 'Ipsa.', 'Port Anthonystad', NULL, NULL, 'dbechtelar@bogan.com', '1761542069', '1988398083'),
(179, 179, 0, 'Moldova', 'Eos.', 'Schroederville', NULL, NULL, 'zackery.frami@ward.com', '573218825', '1168398590'),
(180, 180, 0, 'Malta', 'Quae.', 'New Jermainbury', NULL, NULL, 'annamae.johnston@hilll.com', '1207185657', '1608089808'),
(181, 181, 0, 'New Caledonia', 'Nam.', 'East Bethany', NULL, NULL, 'houston84@dooley.com', '1384435684', '2064575299'),
(182, 182, 0, 'Sierra Leone', 'Hic.', 'Amayafurt', NULL, NULL, 'freda06@lindgren.biz', '1600412441', '1947532930'),
(183, 183, 0, 'Qatar', 'Nam.', 'East Jaylon', NULL, NULL, 'wisozk.keshaun@wuckert.com', '1590393141', '1738293333'),
(184, 184, 0, 'Namibia', 'Esse.', 'West Amaya', NULL, NULL, 'itzel72@wyman.biz', '1336393703', '2143195800'),
(185, 185, 0, 'Tuvalu', 'Quas.', 'West Armando', NULL, NULL, 'cyost@larson.com', '1845713797', '1461833999'),
(186, 186, 0, 'Cote d\'Ivoire', 'Unde.', 'Bartolettiburgh', NULL, NULL, 'vratke@wehner.com', '1654679448', '1859864653'),
(187, 187, 0, 'Jamaica', 'Rem.', 'Farrellview', NULL, NULL, 'kenna.dubuque@gulgowski.com', '273196907', '1137859746'),
(188, 188, 0, 'Comoros', 'Quo.', 'Minniemouth', NULL, NULL, 'mya17@kuphal.com', '659537761', '267659878'),
(189, 189, 0, 'Martinique', 'Aut.', 'Conroyside', NULL, NULL, 'qemard@wintheiser.net', '102677795', '996730403'),
(190, 190, 0, 'Zambia', 'Qui.', 'Clemensstad', NULL, NULL, 'lester.dicki@schoen.com', '841532316', '391312141'),
(191, 191, 0, 'Andorra', 'Ea.', 'Jeraldbury', NULL, NULL, 'domenico.quigley@weimann.info', '2105977590', '363229059'),
(192, 192, 0, 'French Polynesia', 'Aut.', 'Port Amya', NULL, NULL, 'lindsey.daugherty@hudson.com', '1118685270', '1985718263'),
(193, 193, 0, 'Morocco', 'Qui.', 'West Gerardobury', NULL, NULL, 'clifton.buckridge@gottlieb.net', '472338336', '1449467713'),
(194, 194, 0, 'Uzbekistan', 'Ea.', 'Lake Susan', NULL, NULL, 'jerde.brandi@johnson.biz', '1574513311', '498699713'),
(195, 195, 0, 'Fiji', 'Unde.', 'South Julioton', NULL, NULL, 'zakary04@hirthe.com', '1413974005', '657318071'),
(196, 196, 0, 'Jamaica', 'Ab.', 'East Keeleyborough', NULL, NULL, 'lhaley@will.biz', '1459109274', '29281357'),
(197, 197, 0, 'Azerbaijan', 'Eius.', 'South Ubaldo', NULL, NULL, 'wgutmann@pacocha.biz', '1848539708', '1576180561'),
(198, 198, 0, 'Macao', 'Hic.', 'East Lucilefort', NULL, NULL, 'akassulke@eichmann.biz', '1804364760', '1667282535'),
(199, 199, 0, 'Thailand', 'Sint.', 'South Skylarburgh', NULL, NULL, 'shaniya.morar@king.biz', '367656824', '1582355530'),
(200, 200, 0, 'Thailand', 'Quod.', 'North Abelardoborough', NULL, NULL, 'candace.franecki@jast.com', '1289470057', '1232764184'),
(201, 201, 0, 'United States of America', 'Rem.', 'East Jonhaven', NULL, NULL, 'fred75@feil.info', '2145440243', '1196755546'),
(202, 202, 0, 'French Polynesia', 'Nam.', 'Krisfort', NULL, NULL, 'swaniawski.kristin@mckenzie.com', '884687539', '112416035'),
(203, 203, 0, 'Romania', 'Odit.', 'North Xavier', NULL, NULL, 'jacobs.oral@lemke.com', '2104853284', '1389622027'),
(204, 204, 0, 'South Africa', 'In.', 'Port Marcelo', NULL, NULL, 'gislason.mylene@pollich.com', '367601112', '2111815241'),
(205, 205, 0, 'Togo', 'Eius.', 'North Mallietown', NULL, NULL, 'vrippin@marvin.com', '504880461', '557121742'),
(206, 206, 0, 'Cape Verde', 'Sed.', 'Lake Jacinthe', NULL, NULL, 'nweimann@macejkovic.org', '1057275162', '684726383'),
(207, 207, 0, 'Somalia', 'Ut.', 'New Quinnfort', NULL, NULL, 'marilie.jacobson@purdy.com', '1507705181', '126079651'),
(208, 208, 0, 'Afghanistan', 'Vero.', 'South Eleazar', NULL, NULL, 'kennedy.anderson@stroman.com', '203656657', '736641327'),
(209, 209, 0, 'Cape Verde', 'Ad.', 'Kihnville', NULL, NULL, 'leora34@bradtke.com', '1592048538', '642150979'),
(210, 210, 0, 'Zambia', 'Ut.', 'Fayefort', NULL, NULL, 'madalyn.kuvalis@bogisich.com', '974956343', '1612147438'),
(211, 211, 0, 'Ukraine', 'Quod.', 'Zacharyborough', NULL, NULL, 'ozella42@effertz.net', '1925657360', '850646692'),
(212, 212, 0, 'Algeria', 'Vel.', 'Ziemannchester', NULL, NULL, 'adams.linwood@lindgren.info', '1029939805', '166738113'),
(213, 213, 0, 'Afghanistan', 'Quae.', 'Dantown', NULL, NULL, 'phomenick@quitzon.com', '1345767412', '956307521'),
(214, 214, 0, 'Cyprus', 'Et.', 'Port Scotty', NULL, NULL, 'oebert@torphy.com', '1531050345', '2062058279'),
(215, 215, 0, 'South Africa', 'Sed.', 'West Wallaceberg', NULL, NULL, 'gardner.gleichner@erdman.net', '1588004008', '505579274'),
(216, 216, 0, 'Monaco', 'Id.', 'Effertzfort', NULL, NULL, 'dooley.samantha@schneider.info', '1808012870', '2107774429'),
(217, 217, 0, 'Romania', 'Et.', 'Anahaven', NULL, NULL, 'elisabeth.pfannerstill@mosciski.net', '258234301', '1073100940'),
(218, 218, 0, 'Belarus', 'Nemo.', 'Port Zane', NULL, NULL, 'lmarquardt@rodriguez.com', '1183706058', '737584655'),
(219, 219, 0, 'Brazil', 'Odio.', 'Retafurt', NULL, NULL, 'kessler.hillard@nader.net', '190557122', '699975995'),
(220, 220, 0, 'Bulgaria', 'Hic.', 'South Aletha', NULL, NULL, 'easton.mckenzie@spinka.com', '288879524', '1132492998'),
(221, 221, 0, 'Taiwan', 'Enim.', 'Rethamouth', NULL, NULL, 'ferry.retha@koepp.com', '1100408185', '516845968'),
(222, 222, 0, 'Northern Mariana Islands', 'Quia.', 'Ericaport', NULL, NULL, 'kailyn.kulas@dicki.net', '953785757', '954914483'),
(223, 223, 0, 'Svalbard & Jan Mayen Islands', 'Qui.', 'Jerdehaven', NULL, NULL, 'troy.steuber@bauch.com', '661378245', '1206484573'),
(224, 224, 0, 'China', 'Quia.', 'Lake Lionel', NULL, NULL, 'lconn@tillman.com', '1685938616', '983322480'),
(225, 225, 0, 'Somalia', 'Hic.', 'Port Darlenemouth', NULL, NULL, 'vladimir05@tromp.com', '948903974', '176108907'),
(226, 226, 0, 'Hungary', 'Non.', 'Swiftmouth', NULL, NULL, 'uconnelly@kub.com', '1573200471', '29874993'),
(227, 227, 0, 'Japan', 'At.', 'Brandimouth', NULL, NULL, 'csipes@hills.com', '182212904', '699758486'),
(228, 228, 0, 'Bahamas', 'Sed.', 'Bartonstad', NULL, NULL, 'mthiel@connelly.info', '90784205', '974691113'),
(229, 229, 0, 'Mauritania', 'Enim.', 'North Helenburgh', NULL, NULL, 'nicholaus65@bergnaum.com', '690155393', '475328416'),
(230, 230, 0, 'Sierra Leone', 'Non.', 'South Lucileshire', NULL, NULL, 'dicki.bailey@donnelly.com', '692323929', '1010919143'),
(231, 231, 0, 'Netherlands Antilles', 'Quia.', 'East Carlotta', NULL, NULL, 'gusikowski.rafael@heidenreich.com', '1734746388', '2117630258'),
(232, 232, 0, 'Namibia', 'Nisi.', 'East Kasey', NULL, NULL, 'dmarvin@mertz.com', '1860304096', '306186819'),
(233, 233, 0, 'Samoa', 'Et.', 'Crooksborough', NULL, NULL, 'roberts.johnpaul@jones.info', '1864618697', '1864625481'),
(234, 234, 0, 'Albania', 'Quos.', 'North Aditya', NULL, NULL, 'rowena79@sawayn.com', '400870616', '442596701'),
(235, 235, 0, 'Sweden', 'Eos.', 'North Martaberg', NULL, NULL, 'walker.marianna@fadel.com', '1157824296', '1687929581'),
(236, 236, 0, 'Saint Helena', 'Quis.', 'Candidachester', NULL, NULL, 'pdurgan@mccullough.com', '1005235006', '21894842'),
(237, 237, 0, 'Slovenia', 'Ut.', 'Oliverview', NULL, NULL, 'garth70@reilly.biz', '1815839724', '1273314193'),
(238, 238, 0, 'Saint Martin', 'Qui.', 'South Shane', NULL, NULL, 'jarred.bayer@fisher.com', '1074802126', '1233476337'),
(239, 239, 0, 'Tonga', 'Amet.', 'East Rico', NULL, NULL, 'antwon09@cormier.com', '1817818851', '209587253'),
(240, 240, 0, 'Bosnia and Herzegovina', 'Sunt.', 'Harveytown', NULL, NULL, 'ghermann@hirthe.com', '1657188466', '1349669805'),
(241, 241, 0, 'Puerto Rico', 'Vel.', 'Madalineville', NULL, NULL, 'estel.sipes@jenkins.com', '213545233', '337792422'),
(242, 242, 0, 'Puerto Rico', 'Sint.', 'Brandyhaven', NULL, NULL, 'norris.spinka@bailey.biz', '10328392', '208635148'),
(243, 243, 0, 'Lao People\'s Democratic Republic', 'Quo.', 'McDermottland', NULL, NULL, 'russel.amparo@macejkovic.com', '1210550735', '1318420679'),
(244, 244, 0, 'Yemen', 'Sint.', 'South Lexiefurt', NULL, NULL, 'igreenholt@dietrich.com', '649192954', '760542581'),
(245, 245, 0, 'Somalia', 'Vel.', 'New Tessburgh', NULL, NULL, 'ccummerata@aufderhar.com', '1491361819', '1394002124'),
(246, 246, 0, 'United Kingdom', 'Enim.', 'Port Jerrell', NULL, NULL, 'maida18@blanda.com', '1060714918', '792145879'),
(247, 247, 0, 'Bermuda', 'Aut.', 'Saraiport', NULL, NULL, 'ckuhic@kihn.com', '1674379206', '1504984932'),
(248, 248, 0, 'Mozambique', 'Vero.', 'South Lulamouth', NULL, NULL, 'elwin08@gutkowski.com', '1932079057', '1434457370'),
(249, 249, 0, 'New Caledonia', 'At.', 'New Mylenemouth', NULL, NULL, 'trycia.weber@towne.info', '1899477186', '138259735'),
(250, 250, 0, 'French Polynesia', 'Modi.', 'Murazikville', NULL, NULL, 'tate50@upton.org', '42834260', '1621248107'),
(251, 251, 0, 'Paraguay', 'Et.', 'Port Mable', NULL, NULL, 'corrine.glover@pollich.biz', '107005136', '1421563534'),
(252, 252, 0, 'Portugal', 'Id.', 'Austenborough', NULL, NULL, 'guiseppe41@stanton.net', '902274870', '562998448'),
(253, 253, 0, 'Niger', 'Quia.', 'Lake Malinda', NULL, NULL, 'moen.taurean@bauch.com', '329853192', '1883529625'),
(254, 254, 0, 'Nauru', 'Est.', 'East Mikayla', NULL, NULL, 'joesph06@schuster.com', '847145011', '180824516'),
(255, 255, 0, 'Korea', 'Modi.', 'New Willyshire', NULL, NULL, 'raphael71@conroy.com', '1717041018', '1205241803'),
(256, 256, 0, 'Mongolia', 'Ex.', 'Heathcoteshire', NULL, NULL, 'ines47@hoeger.info', '87687539', '344459795'),
(257, 257, 0, 'Reunion', 'Sit.', 'Parkermouth', NULL, NULL, 'dharber@rodriguez.com', '119817050', '1443720081'),
(258, 258, 0, 'Slovenia', 'Et.', 'Madelynborough', NULL, NULL, 'minerva.lemke@kuvalis.com', '1978975863', '1495021972'),
(259, 259, 0, 'Pakistan', 'Et.', 'New Thea', NULL, NULL, 'isom95@weissnat.biz', '1366487485', '1415608825'),
(260, 260, 0, 'Central African Republic', 'Ea.', 'East Kristianburgh', NULL, NULL, 'wilford08@reynolds.com', '131055483', '1837802481'),
(261, 261, 0, 'Lithuania', 'Eos.', 'North Ernestinehaven', NULL, NULL, 'ariel.lehner@bailey.com', '1451929722', '1612799598'),
(262, 262, 0, 'India', 'Illo.', 'North Denisshire', NULL, NULL, 'hrunolfsdottir@wilderman.com', '443449572', '102853916'),
(263, 263, 0, 'Swaziland', 'Amet.', 'Lake Antonette', NULL, NULL, 'rice.dejah@jenkins.info', '431489480', '1513711119'),
(264, 264, 0, 'Indonesia', 'Qui.', 'North Pasqualeport', NULL, NULL, 'zola.kris@purdy.info', '1805390186', '1658248290'),
(265, 265, 0, 'Kuwait', 'Et.', 'East Violetbury', NULL, NULL, 'raoul.gislason@schumm.com', '1439702629', '1388004159'),
(266, 266, 0, 'United States Virgin Islands', 'Et.', 'Agneschester', NULL, NULL, 'dach.bobby@jacobi.net', '1668132978', '1238201244'),
(267, 267, 0, 'Korea', 'Odit.', 'New Caleighberg', NULL, NULL, 'klocko.lamar@schimmel.com', '168340575', '1882989184'),
(268, 268, 0, 'Belize', 'In.', 'Janyshire', NULL, NULL, 'akerluke@bergnaum.com', '1697296541', '1058693130'),
(269, 269, 0, 'Faroe Islands', 'Quae.', 'Friesenland', NULL, NULL, 'torey.quigley@mcdermott.biz', '1993430025', '1601069198'),
(270, 270, 0, 'Guernsey', 'Est.', 'Kirstinbury', NULL, NULL, 'maria23@swift.net', '1634485827', '2054750883'),
(271, 271, 0, 'Ireland', 'Quia.', 'Ferrystad', NULL, NULL, 'nhauck@legros.com', '759284286', '1307422691'),
(272, 272, 0, 'Saudi Arabia', 'Et.', 'West Solonville', NULL, NULL, 'jerad.bailey@sanford.com', '679976582', '1359805702'),
(273, 273, 0, 'Montserrat', 'Ut.', 'Melvintown', NULL, NULL, 'dgrimes@gibson.com', '1871324400', '111649557'),
(274, 274, 0, 'Tonga', 'Nemo.', 'Janessastad', NULL, NULL, 'mayert.loyal@herman.com', '1993115978', '505526372'),
(275, 275, 0, 'Taiwan', 'Aut.', 'Cecilemouth', NULL, NULL, 'bmarquardt@herzog.net', '691197755', '679028712'),
(276, 276, 0, 'China', 'Quo.', 'Feestmouth', NULL, NULL, 'ellie.gulgowski@stroman.com', '727606538', '463187128'),
(277, 277, 0, 'Kyrgyz Republic', 'Sint.', 'East Syblemouth', NULL, NULL, 'donnelly.trevor@dicki.com', '1901895785', '1577786616'),
(278, 278, 0, 'Indonesia', 'In.', 'East Cordie', NULL, NULL, 'strosin.hyman@rosenbaum.net', '1763059744', '970312754'),
(279, 279, 0, 'Australia', 'Quo.', 'Geoffreybury', NULL, NULL, 'fritsch.domenica@wunsch.info', '941400802', '364641373'),
(280, 280, 0, 'United Kingdom', 'Sint.', 'New Hayleyshire', NULL, NULL, 'devante62@watsica.biz', '826819438', '1862098082'),
(281, 281, 0, 'Spain', 'Et.', 'South Eduardo', NULL, NULL, 'florida.carroll@torphy.com', '1404290456', '1396886832'),
(282, 282, 0, 'Netherlands', 'Et.', 'Port Roxanebury', NULL, NULL, 'casey.mccullough@purdy.com', '479052206', '851862156'),
(283, 283, 0, 'Kenya', 'Quod.', 'Clairburgh', NULL, NULL, 'mclaughlin.aurelie@gutmann.org', '936400268', '251858441'),
(284, 284, 0, 'Tajikistan', 'Ut.', 'Port Jensenville', NULL, NULL, 'elias.gislason@kuhlman.org', '95057916', '439087246'),
(285, 285, 0, 'Thailand', 'Aut.', 'Carafort', NULL, NULL, 'johnson.tremaine@jones.com', '1987270483', '2024004204'),
(286, 286, 0, 'South Georgia and the South Sandwich Islands', 'Sunt.', 'New Soledadside', NULL, NULL, 'jacynthe.stroman@stiedemann.com', '635328477', '1036896454'),
(287, 287, 0, 'Saint Pierre and Miquelon', 'Quis.', 'Eliezerfort', NULL, NULL, 'schroeder.david@oconnell.com', '1257874722', '213722152'),
(288, 288, 0, 'Japan', 'Esse.', 'Port Kendallberg', NULL, NULL, 'astiedemann@gerlach.com', '488403169', '225181662'),
(289, 289, 0, 'Thailand', 'Non.', 'Guillermoview', NULL, NULL, 'nadia.willms@kshlerin.info', '1375071151', '1132508736'),
(290, 290, 0, 'Qatar', 'In.', 'Port Patriciatown', NULL, NULL, 'hettie.pollich@wilderman.biz', '577988052', '164259567'),
(291, 291, 0, 'Antigua and Barbuda', 'Id.', 'Heaneytown', NULL, NULL, 'garnett34@keebler.com', '391173026', '1752844767'),
(292, 292, 0, 'Andorra', 'Quia.', 'New Amparoshire', NULL, NULL, 'antonette.paucek@pollich.org', '1831862165', '1139212639'),
(293, 293, 0, 'Lao People\'s Democratic Republic', 'Et.', 'Bernierborough', NULL, NULL, 'oconnell.rosario@marvin.biz', '983264843', '632246605'),
(294, 294, 0, 'Iceland', 'Et.', 'South Marcia', NULL, NULL, 'terrill.hettinger@romaguera.org', '159806552', '383782655'),
(295, 295, 0, 'Kuwait', 'Eius.', 'Lennieville', NULL, NULL, 'klocko.leon@kuhlman.com', '1548580988', '1593395391'),
(296, 296, 0, 'Turkmenistan', 'Id.', 'Mekhitown', NULL, NULL, 'dreilly@steuber.info', '413862450', '1652620217'),
(297, 297, 0, 'Nepal', 'Qui.', 'Leannonborough', NULL, NULL, 'carmela06@klein.com', '689099471', '295044363'),
(298, 298, 0, 'Bhutan', 'Sint.', 'East Cecelia', NULL, NULL, 'pstark@swaniawski.com', '1529750010', '1541808161'),
(299, 299, 0, 'Taiwan', 'Et.', 'Stiedemannstad', NULL, NULL, 'eunice.trantow@kihn.biz', '1037270994', '1179765418'),
(300, 300, 0, 'Moldova', 'Est.', 'Eladioburgh', NULL, NULL, 'kovacek.idell@gorczany.com', '1429782754', '195757107'),
(301, 301, 0, 'Israel', 'Ea.', 'Cassandreport', NULL, NULL, 'pamela26@douglas.org', '1384934800', '1334530453'),
(302, 302, 0, 'United Arab Emirates', 'Sed.', 'Kattieberg', NULL, NULL, 'dmclaughlin@kertzmann.org', '1799526164', '1008178825'),
(303, 303, 0, 'Faroe Islands', 'Sed.', 'Goldnerville', NULL, NULL, 'jazmin57@nader.com', '1750005480', '101098784'),
(304, 304, 0, 'Kuwait', 'Iste.', 'Bashirianville', NULL, NULL, 'janelle.halvorson@oconnell.net', '1403296503', '1935256281'),
(305, 305, 0, 'Niger', 'Iure.', 'New Deja', NULL, NULL, 'fgoyette@ritchie.net', '230675385', '670508807'),
(306, 306, 0, 'Botswana', 'Et.', 'Jammieberg', NULL, NULL, 'dominique46@blanda.com', '394549974', '852813871'),
(307, 307, 0, 'Czech Republic', 'Qui.', 'Javonteport', NULL, NULL, 'fhahn@lubowitz.com', '2014845063', '1339977107'),
(308, 308, 0, 'Denmark', 'Et.', 'Harveyshire', NULL, NULL, 'nherman@beatty.info', '1419549299', '594689165'),
(309, 309, 0, 'Malaysia', 'Illo.', 'North Lennie', NULL, NULL, 'jordane34@kreiger.com', '204206020', '87541017'),
(310, 310, 0, 'Lebanon', 'Et.', 'Robelmouth', NULL, NULL, 'robin92@rogahn.com', '659979084', '2025866262'),
(311, 311, 0, 'Guinea-Bissau', 'Eius.', 'Raleighhaven', NULL, NULL, 'jharvey@roberts.com', '1593438714', '395036210'),
(312, 312, 0, 'Egypt', 'Sit.', 'Greentown', NULL, NULL, 'eleonore20@jakubowski.org', '2022208171', '1005539794'),
(313, 313, 0, 'United Kingdom', 'Et.', 'East Estelleside', NULL, NULL, 'meghan.miller@littel.net', '431558852', '1359667448'),
(314, 314, 0, 'Guinea', 'Ut.', 'North Percyland', NULL, NULL, 'nicholaus.tromp@braun.com', '1433097971', '837757923'),
(315, 315, 0, 'Liberia', 'Sit.', 'Wuckertborough', NULL, NULL, 'corrine03@greenholt.org', '430932418', '1000642002'),
(316, 316, 0, 'Puerto Rico', 'Et.', 'Huelport', NULL, NULL, 'legros.lesly@murazik.biz', '695731144', '645508804'),
(317, 317, 0, 'Japan', 'Ea.', 'Babystad', NULL, NULL, 'hermiston.bernadette@ullrich.com', '385435731', '2010499862'),
(318, 318, 0, 'Kenya', 'Et.', 'Lake Zellahaven', NULL, NULL, 'myles.hauck@langworth.info', '855142107', '2091151304'),
(319, 319, 0, 'Saint Kitts and Nevis', 'At.', 'New Lueburgh', NULL, NULL, 'lacy.huels@waelchi.com', '909846815', '1529370976'),
(320, 320, 0, 'Heard Island and McDonald Islands', 'Quo.', 'South Mikeshire', NULL, NULL, 'fokuneva@rosenbaum.biz', '313175320', '450277413'),
(321, 321, 0, 'Tunisia', 'Odit.', 'West Amieport', NULL, NULL, 'uboyle@cassin.com', '1767929005', '1232760213'),
(322, 322, 0, 'Ukraine', 'Ut.', 'Crookston', NULL, NULL, 'layla21@jacobs.com', '1388802467', '1994047382'),
(323, 323, 0, 'Kazakhstan', 'Et.', 'Wandaton', NULL, NULL, 'kbreitenberg@herzog.com', '1661889504', '1393085262'),
(324, 324, 0, 'Bosnia and Herzegovina', 'Est.', 'East Isom', NULL, NULL, 'kraig83@farrell.com', '810267278', '200887631'),
(325, 325, 0, 'Christmas Island', 'Non.', 'Koeppmouth', NULL, NULL, 'jailyn35@herman.com', '795039396', '958698947'),
(326, 326, 0, 'Bhutan', 'Sunt.', 'North Carmelachester', NULL, NULL, 'keely.doyle@weber.com', '590588603', '1749670309'),
(327, 327, 0, 'Italy', 'Quae.', 'West Norbertoland', NULL, NULL, 'gunner84@hahn.net', '1318072100', '989206559'),
(328, 328, 0, 'Hong Kong', 'Quia.', 'South Lamar', NULL, NULL, 'jazmyn.ohara@toy.info', '615444657', '844155491'),
(329, 329, 0, 'Azerbaijan', 'Qui.', 'Connberg', NULL, NULL, 'petra.dooley@thompson.biz', '142266035', '107268138'),
(330, 330, 0, 'Algeria', 'Et.', 'New Florianfurt', NULL, NULL, 'rosenbaum.chester@bashirian.com', '695871752', '1037091030'),
(331, 331, 0, 'Falkland Islands (Malvinas)', 'Et.', 'Lake Maybelle', NULL, NULL, 'pjacobs@ebert.com', '1939413821', '1602314837'),
(332, 332, 0, 'Saint Martin', 'Et.', 'Drakeberg', NULL, NULL, 'kuhn.rickie@jacobs.net', '2146242382', '2057529306'),
(333, 333, 0, 'Greece', 'Esse.', 'Rogahnfort', NULL, NULL, 'gschimmel@ruecker.com', '79227438', '1860950586'),
(334, 334, 0, 'Ukraine', 'Aut.', 'North Libbiechester', NULL, NULL, 'doconner@wyman.org', '549517849', '1312948844'),
(335, 335, 0, 'Fiji', 'Ex.', 'Joaquinport', NULL, NULL, 'bernie06@gleichner.com', '1108474129', '1841569963'),
(336, 336, 0, 'Israel', 'A at.', 'Steuberside', NULL, NULL, 'lind.van@zulauf.com', '1127106500', '1527155463'),
(337, 337, 0, 'Canada', 'Sunt.', 'South Sunny', NULL, NULL, 'yundt.verla@mraz.com', '1252133953', '902287242'),
(338, 338, 0, 'Marshall Islands', 'Quam.', 'Port Tyrelfurt', NULL, NULL, 'botsford.breanna@hahn.biz', '65999969', '2018698909'),
(339, 339, 0, 'Samoa', 'In.', 'Jacobsonberg', NULL, NULL, 'mraz.chris@green.com', '1256566694', '290415686'),
(340, 340, 0, 'Sierra Leone', 'Et.', 'New Nels', NULL, NULL, 'ariane.mueller@bauch.org', '1172728052', '981582088'),
(341, 341, 0, 'South Africa', 'Et.', 'Lake Rubieview', NULL, NULL, 'abruen@kirlin.org', '1986562727', '21155451'),
(342, 342, 0, 'Afghanistan', 'Ea.', 'East Joyhaven', NULL, NULL, 'marjolaine26@metz.com', '535331933', '2049328614'),
(343, 343, 0, 'Nepal', 'Et.', 'Hellerfort', NULL, NULL, 'senger.adan@nader.org', '807177756', '1394632726'),
(344, 344, 0, 'Northern Mariana Islands', 'Quam.', 'Hillsstad', NULL, NULL, 'oren.mertz@ryan.info', '1048582778', '700240665'),
(345, 345, 0, 'Guyana', 'Quo.', 'Rutherfordborough', NULL, NULL, 'bosco.pansy@miller.org', '911899708', '696292430'),
(346, 346, 0, 'Bahamas', 'Quas.', 'Kielmouth', NULL, NULL, 'allan.heller@pouros.biz', '2081190220', '866436105'),
(347, 347, 0, 'Pitcairn Islands', 'Modi.', 'South Armando', NULL, NULL, 'keebler.dashawn@hintz.com', '1805934087', '1591298959'),
(348, 348, 0, 'Gambia', 'Quia.', 'South Jennifer', NULL, NULL, 'zemlak.monte@kuhlman.net', '1558097996', '556367437'),
(349, 349, 0, 'Puerto Rico', 'Ipsa.', 'Lake Alexandria', NULL, NULL, 'lucie94@marks.com', '857017607', '1144501864'),
(350, 350, 0, 'Estonia', 'Aut.', 'New Trystanbury', NULL, NULL, 'bernier.vernice@toy.info', '1402314124', '2109049326'),
(351, 351, 0, 'Bermuda', 'Non.', 'Spencerbury', NULL, NULL, 'ana.kreiger@kshlerin.biz', '1781973353', '1546526042'),
(352, 352, 0, 'Haiti', 'Quos.', 'West Naomimouth', NULL, NULL, 'connelly.adah@kris.com', '841906829', '368512541'),
(353, 353, 0, 'Singapore', 'Aut.', 'South Brock', NULL, NULL, 'sokuneva@willms.info', '431328827', '2077266851'),
(354, 354, 0, 'Bouvet Island (Bouvetoya)', 'Rem.', 'West Murray', NULL, NULL, 'lmorissette@swift.net', '1986838766', '89954899'),
(355, 355, 0, 'Kyrgyz Republic', 'Aut.', 'Turcottefort', NULL, NULL, 'gorczany.lola@harris.com', '212043107', '1383094121'),
(356, 356, 0, 'Qatar', 'Et.', 'North Terrill', NULL, NULL, 'eric.mills@shields.biz', '1780445697', '1643574059'),
(357, 357, 0, 'Belgium', 'Ea.', 'North Bridgetton', NULL, NULL, 'bridie.bruen@christiansen.com', '2146171586', '1663160865'),
(358, 358, 0, 'Antarctica (the territory South of 60 deg S)', 'Enim.', 'Candacehaven', NULL, NULL, 'laurel02@bahringer.com', '1524221406', '60114301'),
(359, 359, 0, 'Sweden', 'Eius.', 'Jeanieshire', NULL, NULL, 'gwalter@beahan.net', '1302525717', '2019904453'),
(360, 360, 0, 'Puerto Rico', 'Esse.', 'Kulasbury', NULL, NULL, 'jorn@ward.net', '1525163984', '780176346'),
(361, 361, 0, 'Greenland', 'Quis.', 'West Karlport', NULL, NULL, 'deanna90@steuber.com', '1413357535', '1755464625'),
(362, 362, 0, 'Andorra', 'Eum.', 'Walterstad', NULL, NULL, 'bahringer.helene@reinger.com', '213859582', '763564958'),
(363, 363, 0, 'Korea', 'Et.', 'New Elisha', NULL, NULL, 'alvis83@reinger.info', '2028600493', '1679255967'),
(364, 364, 0, 'Taiwan', 'Sint.', 'Leuschkeshire', NULL, NULL, 'shanahan.jordon@weimann.com', '696449961', '375645673'),
(365, 365, 0, 'Taiwan', 'Ab.', 'Berylstad', NULL, NULL, 'oleta.hackett@weimann.com', '2099287465', '1807523'),
(366, 366, 0, 'Denmark', 'Ut.', 'Jaydestad', NULL, NULL, 'dbraun@breitenberg.biz', '1435266733', '853115002'),
(367, 367, 0, 'Greece', 'Vel.', 'West Alessandraview', NULL, NULL, 'edmund.white@abbott.com', '1110562011', '150762554'),
(368, 368, 0, 'Armenia', 'Qui.', 'Jessycafort', NULL, NULL, 'lamont.ankunding@aufderhar.com', '154855254', '756267078'),
(369, 369, 0, 'United States Minor Outlying Islands', 'Ab.', 'East Brandyn', NULL, NULL, 'dwhite@brown.org', '251793735', '1133777348'),
(370, 370, 0, 'Kiribati', 'Quo.', 'Kilbackstad', NULL, NULL, 'sanford.richmond@powlowski.com', '414567909', '1900075971'),
(371, 371, 0, 'Botswana', 'Illo.', 'Lehnerside', NULL, NULL, 'noemi.beier@veum.com', '2026920624', '287758355'),
(372, 372, 0, 'Netherlands', 'Non.', 'West Holliston', NULL, NULL, 'dwelch@bogan.net', '219584947', '974820470'),
(373, 373, 0, 'Samoa', 'Ipsa.', 'North Annabelle', NULL, NULL, 'gerlach.ozella@klein.com', '737663287', '2118694970'),
(374, 374, 0, 'Ecuador', 'Ut.', 'Estrellabury', NULL, NULL, 'quincy82@fritsch.com', '1461309935', '47058417'),
(375, 375, 0, 'Somalia', 'Aut.', 'Lake Muhammad', NULL, NULL, 'anika31@morar.com', '381694501', '891935825'),
(376, 376, 0, 'Somalia', 'Modi.', 'Lake Leonel', NULL, NULL, 'damion.white@sporer.com', '2024831717', '442871822'),
(377, 377, 0, 'Malaysia', 'Quos.', 'Lornaside', NULL, NULL, 'brody30@herzog.net', '1333319270', '1819606861'),
(378, 378, 0, 'Greenland', 'Aut.', 'West Ezequiel', NULL, NULL, 'king.asha@gerhold.net', '1791375523', '1636408821'),
(379, 379, 0, 'Burkina Faso', 'Ut.', 'Tonyland', NULL, NULL, 'harvey44@rice.com', '1499672462', '618266734'),
(380, 380, 0, 'Thailand', 'Quo.', 'South Norris', NULL, NULL, 'beatty.everette@anderson.com', '229533996', '1132829671'),
(381, 381, 0, 'Pitcairn Islands', 'Aut.', 'Rosenbaummouth', NULL, NULL, 'ricky03@durgan.biz', '1831639238', '816428785'),
(382, 382, 0, 'Kenya', 'Et.', 'East Ismaelmouth', NULL, NULL, 'xlehner@senger.com', '96396713', '437258921'),
(383, 383, 0, 'Bhutan', 'Et.', 'Lake Ulises', NULL, NULL, 'vdoyle@walker.org', '1027118234', '1792751406'),
(384, 384, 0, 'Australia', 'Et.', 'New Allison', NULL, NULL, 'aokeefe@vandervort.com', '582133774', '1385302883'),
(385, 385, 0, 'Algeria', 'Vel.', 'West Jillian', NULL, NULL, 'lockman.madelyn@marquardt.org', '509987086', '2117276550'),
(386, 386, 0, 'Dominica', 'Et.', 'Morissetteburgh', NULL, NULL, 'arnoldo.weissnat@friesen.com', '1802279982', '721336882'),
(387, 387, 0, 'Tuvalu', 'Quia.', 'Americomouth', NULL, NULL, 'telly56@mann.net', '2066262053', '291974443'),
(388, 388, 0, 'Malaysia', 'Fuga.', 'Kleinton', NULL, NULL, 'oconnell.deborah@huels.net', '1225357234', '161287500'),
(389, 389, 0, 'Tajikistan', 'Quam.', 'New Florenciotown', NULL, NULL, 'kvandervort@mcclure.com', '1190576383', '245227192'),
(390, 390, 0, 'Isle of Man', 'Et.', 'Jefferyville', NULL, NULL, 'gladyce27@flatley.org', '764667300', '863420621'),
(391, 391, 0, 'Zambia', 'Quam.', 'Candaceport', NULL, NULL, 'ikulas@rolfson.com', '564907844', '1225257501'),
(392, 392, 0, 'Jamaica', 'Et.', 'Carterburgh', NULL, NULL, 'schaefer.wilfred@murray.com', '471164044', '1152718797'),
(393, 393, 0, 'Tanzania', 'Et.', 'North Jacquelynborough', NULL, NULL, 'pmedhurst@rodriguez.com', '652429914', '1504685752'),
(394, 394, 0, 'Russian Federation', 'Quae.', 'Lake Kelsi', NULL, NULL, 'briana75@swaniawski.com', '927514137', '1950220620'),
(395, 395, 0, 'Singapore', 'Non.', 'South Fanniestad', NULL, NULL, 'ratke.imelda@brakus.com', '1318674983', '237512578'),
(396, 396, 0, 'Lesotho', 'Et.', 'Lake Melanyville', NULL, NULL, 'joel.hessel@rodriguez.com', '1495697167', '506939954'),
(397, 397, 0, 'Barbados', 'Quis.', 'Dellaton', NULL, NULL, 'santiago19@hamill.net', '1521713309', '35330539'),
(398, 398, 0, 'Indonesia', 'Iste.', 'Sadyeville', NULL, NULL, 'ymetz@jacobs.info', '1465528974', '1231385886'),
(399, 399, 0, 'Zimbabwe', 'Est.', 'Kirlinhaven', NULL, NULL, 'murray.lauren@schmidt.net', '275839996', '1154349419'),
(400, 400, 0, 'Cuba', 'Id.', 'Port Kylee', NULL, NULL, 'heather60@mckenzie.com', '796687939', '71113961'),
(401, 401, 0, 'Vanuatu', 'Aut.', 'New Martine', NULL, NULL, 'crolfson@parker.biz', '1742289900', '1675164511'),
(402, 402, 0, 'Mauritius', 'A.', 'McLaughlinhaven', NULL, NULL, 'murazik.green@gerhold.org', '325693279', '873777196'),
(403, 403, 0, 'Guatemala', 'Qui.', 'Port Derek', NULL, NULL, 'daron.little@hand.com', '2029635690', '402436570'),
(404, 404, 0, 'Montserrat', 'Iure.', 'North Simoneport', NULL, NULL, 'rylan.towne@kassulke.com', '215591331', '835276096'),
(405, 405, 0, 'Madagascar', 'Quia.', 'West Ebony', NULL, NULL, 'carole.gibson@corwin.net', '1932112271', '255454896'),
(406, 406, 0, 'Martinique', 'Est.', 'Lake Sybleton', NULL, NULL, 'norval.mertz@turner.net', '1287276299', '2103552614'),
(407, 407, 0, 'Belarus', 'Nisi.', 'Port Bryce', NULL, NULL, 'iharber@conroy.biz', '1142338793', '1035088589'),
(408, 408, 0, 'Tajikistan', 'Id.', 'Larkinport', NULL, NULL, 'estark@walker.org', '1445124028', '798376325'),
(409, 409, 0, 'Somalia', 'Aut.', 'Lake Mohammedfurt', NULL, NULL, 'irwin77@prosacco.com', '1674646378', '165138150'),
(410, 410, 0, 'Madagascar', 'Eum.', 'Bartonburgh', NULL, NULL, 'bernier.amara@schinner.com', '407316946', '1110911147'),
(411, 411, 0, 'Tonga', 'Quae.', 'Jillianstad', NULL, NULL, 'astanton@heaney.com', '854044763', '875746109'),
(412, 412, 0, 'Kuwait', 'Ea.', 'Jedidiahfort', NULL, NULL, 'itzel18@mueller.com', '1446384903', '1451249999'),
(413, 413, 0, 'Sweden', 'Quo.', 'Mannview', NULL, NULL, 'bradtke.name@reichel.com', '896040739', '2030851163'),
(414, 414, 0, 'Colombia', 'Ut.', 'New Cade', NULL, NULL, 'greenfelder.guadalupe@schimmel.net', '1186221131', '1179979500'),
(415, 415, 0, 'Jordan', 'Nam.', 'Connhaven', NULL, NULL, 'klein.brandon@kshlerin.com', '863040253', '964270249'),
(416, 416, 0, 'Honduras', 'Ad.', 'Port Leda', NULL, NULL, 'haag.joaquin@kautzer.com', '1241654128', '1212921301'),
(417, 417, 0, 'Sudan', 'Est.', 'West Garryside', NULL, NULL, 'stroman.juvenal@koepp.com', '478483732', '172373915'),
(418, 418, 0, 'Kuwait', 'Sed.', 'New Filomena', NULL, NULL, 'evelyn.gorczany@turner.info', '987014330', '1228254395'),
(419, 419, 0, 'Bahrain', 'In.', 'North Benjaminland', NULL, NULL, 'oswaldo.herzog@bradtke.com', '471411993', '1226002332'),
(420, 420, 0, 'Isle of Man', 'Unde.', 'Larsonview', NULL, NULL, 'weissnat.jordyn@rodriguez.com', '371610309', '1347876550'),
(421, 421, 0, 'Mauritius', 'Et.', 'East Annamarie', NULL, NULL, 'rossie.haley@paucek.org', '2146060249', '2088984240'),
(422, 422, 0, 'Zimbabwe', 'Vel.', 'Port Henderson', NULL, NULL, 'reilly.ansley@ankunding.com', '2042632755', '1292708594'),
(423, 423, 0, 'Antarctica (the territory South of 60 deg S)', 'Est.', 'East Retha', NULL, NULL, 'olen80@abbott.net', '877260061', '1858165197'),
(424, 424, 0, 'Sao Tome and Principe', 'Eum.', 'New Petefurt', NULL, NULL, 'mariana69@kessler.com', '689475008', '1427417317'),
(425, 425, 0, 'Grenada', 'Et.', 'Lake Carmellaside', NULL, NULL, 'rickie10@yundt.net', '1983510760', '1549030378'),
(426, 426, 0, 'Spain', 'Ad.', 'North Shainastad', NULL, NULL, 'uupton@macejkovic.com', '235635608', '301066212'),
(427, 427, 0, 'Malaysia', 'Qui.', 'Dibbertstad', NULL, NULL, 'abbie.dare@zieme.com', '1394673964', '747131516'),
(428, 428, 0, 'Guadeloupe', 'Id.', 'Mollyburgh', NULL, NULL, 'anderson.cary@collins.org', '778543043', '204336041'),
(429, 429, 0, 'Nicaragua', 'Ut.', 'Camdenchester', NULL, NULL, 'ncarroll@hahn.com', '659740717', '726687685');
INSERT INTO `iys_company_addresses` (`id`, `company_id`, `address_abroad`, `address`, `town`, `city`, `country`, `address_type`, `email`, `phone_number`, `fax_number`) VALUES
(430, 430, 0, 'Malaysia', 'Ut.', 'West Philip', NULL, NULL, 'shany.stark@carter.net', '1156142950', '562532402'),
(431, 431, 0, 'Tuvalu', 'Ad.', 'New Judeburgh', NULL, NULL, 'houston84@abernathy.com', '692689893', '1196145218'),
(432, 432, 0, 'Papua New Guinea', 'Eum.', 'Hettingermouth', NULL, NULL, 'tiana.marks@okuneva.com', '1932850516', '2044782355'),
(433, 433, 0, 'Lithuania', 'Quis.', 'Clintfurt', NULL, NULL, 'agustina.boyer@oconner.info', '921935297', '737087828'),
(434, 434, 0, 'Mozambique', 'Eius.', 'Huelfurt', NULL, NULL, 'ohara.lenny@kling.com', '1532307650', '887177931'),
(435, 435, 0, 'Bangladesh', 'Quia.', 'Morarside', NULL, NULL, 'herta49@will.com', '672232979', '1228789177'),
(436, 436, 0, 'Martinique', 'Ut.', 'Cartwrightmouth', NULL, NULL, 'svon@predovic.com', '468741219', '775400012'),
(437, 437, 0, 'Antarctica (the territory South of 60 deg S)', 'Enim.', 'Lonnieshire', NULL, NULL, 'bpaucek@oreilly.com', '1447531434', '408022878'),
(438, 438, 0, 'Croatia', 'Est.', 'Anibalchester', NULL, NULL, 'ukeeling@bosco.net', '1913084558', '1487006823'),
(439, 439, 0, 'Rwanda', 'Vero.', 'Port Valentine', NULL, NULL, 'osbaldo.champlin@jacobs.com', '2079048616', '1215186679'),
(440, 440, 0, 'Chile', 'Vel.', 'Lake Gregoryshire', NULL, NULL, 'welch.sandy@dooley.net', '725599310', '586606804'),
(441, 441, 0, 'Gabon', 'Et.', 'North Shanelle', NULL, NULL, 'lourdes16@trantow.net', '1910730172', '2094107282'),
(442, 442, 0, 'Mauritania', 'In.', 'Port Hadley', NULL, NULL, 'swift.beau@parker.org', '790263697', '706211719'),
(443, 443, 0, 'Antigua and Barbuda', 'Quas.', 'Port Elodyshire', NULL, NULL, 'dewayne31@hayes.info', '1807551610', '897992990'),
(444, 444, 0, 'Namibia', 'Quo.', 'New Maximilliahaven', NULL, NULL, 'franecki.adolph@denesik.com', '1916853292', '1468248986'),
(445, 445, 0, 'Latvia', 'Enim.', 'Daniellestad', NULL, NULL, 'lenora42@feest.biz', '1832315637', '330845078'),
(446, 446, 0, 'Eritrea', 'Aut.', 'Metzshire', NULL, NULL, 'brennon50@robel.com', '1186840409', '1337984234'),
(447, 447, 0, 'Poland', 'Quis.', 'Gusikowskiborough', NULL, NULL, 'cbashirian@roberts.com', '566349464', '1360456016'),
(448, 448, 0, 'Zimbabwe', 'Fuga.', 'Tracyburgh', NULL, NULL, 'harvey87@trantow.net', '787786465', '1330079717'),
(449, 449, 0, 'Cote d\'Ivoire', 'Et.', 'Jazminshire', NULL, NULL, 'jkihn@hayes.info', '420311806', '890258661'),
(450, 450, 0, 'New Zealand', 'Eum.', 'South Marquisview', NULL, NULL, 'zwolf@hartmann.info', '1421069350', '696652009'),
(451, 451, 0, 'Philippines', 'Et.', 'South Daphne', NULL, NULL, 'okub@conroy.com', '1585475967', '556758802'),
(452, 452, 0, 'Dominica', 'Et.', 'Zboncakchester', NULL, NULL, 'walker.karlie@johnston.org', '48013612', '1171842784'),
(453, 453, 0, 'Philippines', 'In.', 'New Sherwoodville', NULL, NULL, 'jacinthe.jerde@pollich.com', '987554987', '1946033352'),
(454, 454, 0, 'Iceland', 'Et.', 'West Elnashire', NULL, NULL, 'kilback.dario@mcglynn.org', '791118370', '291440919'),
(455, 455, 0, 'Brunei Darussalam', 'Ipsa.', 'Port Cortneyshire', NULL, NULL, 'funk.kayley@welch.com', '171565330', '135323323'),
(456, 456, 0, 'Bouvet Island (Bouvetoya)', 'Unde.', 'North Weldonhaven', NULL, NULL, 'jonathan28@harris.com', '887250123', '297126027'),
(457, 457, 0, 'Cyprus', 'Est.', 'North Lizeth', NULL, NULL, 'emmerich.mathias@kohler.biz', '173966881', '658053573'),
(458, 458, 0, 'Italy', 'Odio.', 'West Clovis', NULL, NULL, 'braxton.cruickshank@roberts.info', '1641724412', '415252611'),
(459, 459, 0, 'British Virgin Islands', 'Vel.', 'East Keanuchester', NULL, NULL, 'langosh.kenneth@corwin.com', '1607697134', '1709566612'),
(460, 460, 0, 'Qatar', 'Id.', 'South Alfreda', NULL, NULL, 'jesus01@bogan.com', '403695531', '1723093067'),
(461, 461, 0, 'Fiji', 'Eum.', 'Port Will', NULL, NULL, 'kenyatta29@mueller.com', '1980185412', '181979263'),
(462, 462, 0, 'Saint Barthelemy', 'Sed.', 'Kaleighshire', NULL, NULL, 'nbrown@hudson.org', '1854658677', '1193493859'),
(463, 463, 0, 'Nepal', 'Et.', 'Pouroschester', NULL, NULL, 'cassidy.conroy@wuckert.com', '442846954', '291826042'),
(464, 464, 0, 'Bangladesh', 'Et.', 'Port Rheatown', NULL, NULL, 'tyshawn.mueller@okeefe.com', '178914845', '307213941'),
(465, 465, 0, 'Cambodia', 'Illo.', 'Hodkiewiczbury', NULL, NULL, 'rice.colt@mitchell.info', '1893883645', '345201892'),
(466, 466, 0, 'Malaysia', 'Et.', 'Arjunberg', NULL, NULL, 'alexandra81@rau.com', '275175854', '1708841394'),
(467, 467, 0, 'Oman', 'Quo.', 'New Elnabury', NULL, NULL, 'okling@dickinson.com', '1869676808', '118070603'),
(468, 468, 0, 'Malta', 'Aut.', 'South Brandoport', NULL, NULL, 'roberto.bernhard@sauer.org', '1919750155', '680010653'),
(469, 469, 0, 'Armenia', 'Vero.', 'Alliestad', NULL, NULL, 'derick.bogan@gleason.com', '1662410495', '1487329872'),
(470, 470, 0, 'Saint Lucia', 'Et.', 'East Kaylieview', NULL, NULL, 'dare.wilhelm@davis.info', '1077682170', '252640479'),
(471, 471, 0, 'Central African Republic', 'Quas.', 'Lake Isobelshire', NULL, NULL, 'orn.darrel@dooley.com', '2133641538', '654189256'),
(472, 472, 0, 'Slovakia (Slovak Republic)', 'Est.', 'Lake Casey', NULL, NULL, 'ocrooks@dickens.com', '1926003561', '621540078'),
(473, 473, 0, 'Antarctica (the territory South of 60 deg S)', 'Sed.', 'Kattieview', NULL, NULL, 'yjakubowski@baumbach.com', '1658982176', '1399844089'),
(474, 474, 0, 'Belarus', 'Et.', 'East Janiefurt', NULL, NULL, 'kellie.schuppe@mayert.com', '1963312035', '396373251'),
(475, 475, 0, 'Mozambique', 'Modi.', 'Port Violetshire', NULL, NULL, 'volkman.hortense@ledner.com', '28133065', '277683332'),
(476, 476, 0, 'Jordan', 'Qui.', 'Reynoldsmouth', NULL, NULL, 'kerluke.manuel@von.com', '950303816', '1283504738'),
(477, 477, 0, 'Serbia', 'Ipsa.', 'East Seamus', NULL, NULL, 'lesch.cicero@bartoletti.net', '1603725097', '1267011498'),
(478, 478, 0, 'Angola', 'Aut.', 'South Jamarcusstad', NULL, NULL, 'waelchi.mark@stiedemann.org', '1140738319', '1969742321'),
(479, 479, 0, 'Ukraine', 'Odit.', 'Woodrowville', NULL, NULL, 'roob.otha@schneider.info', '708498697', '380965284'),
(480, 480, 0, 'Greenland', 'Quia.', 'Predovicborough', NULL, NULL, 'kendall11@reynolds.com', '1798076127', '301941154'),
(481, 481, 0, 'Uganda', 'Amet.', 'Wizaberg', NULL, NULL, 'fritsch.lyric@ruecker.net', '509158577', '1305584546'),
(482, 482, 0, 'Slovakia (Slovak Republic)', 'Id.', 'Lake Evalyn', NULL, NULL, 'andreane.wolff@metz.org', '206030979', '1418347459'),
(483, 483, 0, 'Trinidad and Tobago', 'Est.', 'Trantowtown', NULL, NULL, 'ilemke@schinner.info', '139265976', '1519077201'),
(484, 484, 0, 'Malta', 'Eos.', 'Heathcotefort', NULL, NULL, 'zhane@metz.com', '1923840281', '1846987956'),
(485, 485, 0, 'Puerto Rico', 'Est.', 'Kenyonberg', NULL, NULL, 'herman.mozell@dach.org', '379955265', '142782951'),
(486, 486, 0, 'Cayman Islands', 'Odit.', 'Port Augustaview', NULL, NULL, 'abdul73@murazik.com', '960758475', '2100587023'),
(487, 487, 0, 'Sao Tome and Principe', 'Ut.', 'Estellehaven', NULL, NULL, 'blanche.kemmer@runte.net', '283866472', '524294409'),
(488, 488, 0, 'New Zealand', 'Aut.', 'Mannshire', NULL, NULL, 'zulauf.leonie@mccullough.net', '1455004745', '412172870'),
(489, 489, 0, 'Ukraine', 'Qui.', 'Russelbury', NULL, NULL, 'rex14@christiansen.com', '1299227858', '612522780'),
(490, 490, 0, 'French Polynesia', 'Et.', 'Brownborough', NULL, NULL, 'ally14@brakus.org', '1811068364', '1264979780'),
(491, 491, 0, 'Netherlands', 'Et.', 'New Joshua', NULL, NULL, 'gbartell@kshlerin.com', '1798788247', '396298672'),
(492, 492, 0, 'Austria', 'Non.', 'Alanchester', NULL, NULL, 'verona74@bayer.com', '747307729', '1321219608'),
(493, 493, 0, 'Djibouti', 'Vero.', 'Antoniettamouth', NULL, NULL, 'rturner@lynch.com', '1665397669', '470791229'),
(494, 494, 0, 'Peru', 'Eum.', 'New Janae', NULL, NULL, 'pschmeler@mohr.com', '960067197', '896394714'),
(495, 495, 0, 'Lebanon', 'Est.', 'North Chaz', NULL, NULL, 'lorenzo.roberts@jenkins.net', '1312115050', '800939726'),
(496, 496, 0, 'Syrian Arab Republic', 'Est.', 'Helenafurt', NULL, NULL, 'ryan.bethel@hessel.info', '197246526', '1627101243'),
(497, 497, 0, 'Saint Barthelemy', 'Ut.', 'South Anabel', NULL, NULL, 'dach.andrew@wiegand.com', '1059523129', '1351178151'),
(498, 498, 0, 'Chad', 'Aut.', 'Alextown', NULL, NULL, 'nya.franecki@barrows.com', '1046244552', '1262688104'),
(499, 499, 0, 'Antarctica (the territory South of 60 deg S)', 'Qui.', 'Otiliaport', NULL, NULL, 'javon06@bailey.com', '1755242155', '1365598995'),
(500, 500, 0, 'Bangladesh', 'Est.', 'Lake Keshawnfurt', NULL, NULL, 'dereck.dicki@beahan.com', '1701273289', '916462868'),
(501, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(502, 501, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(503, 502, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(504, 503, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(505, 504, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(506, 505, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(507, 506, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_company_contact_list`
--

CREATE TABLE `iys_company_contact_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_company_list`
--

CREATE TABLE `iys_company_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_short_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `char_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` int(11) NOT NULL DEFAULT '0',
  `supplier` int(11) NOT NULL DEFAULT '0',
  `tax_office` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_invoice_registered` int(11) NOT NULL DEFAULT '0',
  `iban` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_company_list`
--

INSERT INTO `iys_company_list` (`id`, `account_id`, `company_name`, `company_short_name`, `char_code`, `tax_id`, `customer`, `supplier`, `tax_office`, `e_invoice_registered`, `iban`, `created_at`, `updated_at`) VALUES
(1, 1, 'tester', NULL, NULL, NULL, 0, 0, NULL, 0, NULL, '2018-05-14 19:43:00', '2018-05-21 04:16:27'),
(2, 1, 'Sydni Kozey', 'Wini', '1667630656', '542808373', 1, 0, 'Aut.', 0, 'TR32399564', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(3, 1, 'Ms. Antonina Kirlin', 'Prof', '1074298430', '140888742', 1, 0, 'Ad.', 0, 'TR752257167', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(4, 1, 'Dr. Lelia Beahan', 'Myah', '104621651', '1294892476', 1, 0, 'Ipsa.', 0, 'TR1338226325', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(5, 1, 'Dock Romaguera', 'Lave', '2053196251', '135809427', 1, 0, 'Iure.', 0, 'TR1505640164', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(6, 1, 'Marilyne Doyle', 'Eula', '200248321', '1417820139', 1, 0, 'Sed.', 0, 'TR306006975', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(7, 1, 'Daron Hermiston PhD', 'Rosi', '933384965', '572159237', 1, 0, 'Odit.', 0, 'TR410957328', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(8, 1, 'Miss Sonya Swaniawski V', 'Dr. ', '587266041', '80281200', 1, 0, 'Esse.', 0, 'TR2013699575', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(9, 1, 'Jasper Kozey', 'Prof', '628159187', '339403351', 1, 0, 'Ipsa.', 0, 'TR596513991', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(10, 1, 'Gustave Ullrich', 'Gust', '1503730220', '48525202', 1, 0, 'Aut.', 0, 'TR994848839', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(11, 1, 'Ms. Betty O\'Hara', 'Dr. ', '1718229362', '1101914722', 1, 0, 'Qui.', 0, 'TR68267923', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(12, 1, 'Joany Jerde', 'May ', '524078480', '1079083535', 1, 0, 'Vel.', 0, 'TR1948273404', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(13, 1, 'Heber Pfannerstill', 'Zech', '320188195', '1416056330', 1, 0, 'Vero.', 0, 'TR690733234', '2018-05-14 19:43:01', '2018-05-14 19:43:01'),
(14, 1, 'Prof. Marcia Leuschke', 'Clif', '18280654', '1494580049', 1, 0, 'Ipsa.', 0, 'TR1910208421', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(15, 1, 'Tom Heidenreich V', 'Eile', '1892963988', '2024136605', 1, 0, 'Illo.', 0, 'TR1023106127', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(16, 1, 'Koby Blanda V', 'Corr', '1399459342', '1289882504', 1, 0, 'Qui.', 0, 'TR828408469', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(17, 1, 'Buck Fay', 'Mr. ', '1475406056', '1351933273', 1, 0, 'Eum.', 0, 'TR125161397', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(18, 1, 'Selmer Lebsack DVM', 'Mrs.', '1195665095', '647695771', 1, 0, 'Id.', 0, 'TR1821669005', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(19, 1, 'Minerva Corkery', 'Guss', '1114698718', '1134862215', 1, 0, 'Ut.', 0, 'TR219270163', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(20, 1, 'Ethyl Haag II', 'Care', '1055863411', '377195435', 1, 0, 'Vero.', 0, 'TR1077171937', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(21, 1, 'Prof. Lauren D\'Amore', 'Theo', '1498158568', '346088086', 1, 0, 'Est.', 0, 'TR177854305', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(22, 1, 'Sienna Crist Jr.', 'Ther', '1723501061', '292534132', 1, 0, 'Nisi.', 0, 'TR96937043', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(23, 1, 'Jermain Stiedemann', 'Yasm', '1839923336', '779104114', 1, 0, 'Odio.', 0, 'TR1359178434', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(24, 1, 'Francisco Schamberger', 'Kayl', '292993171', '144583448', 1, 0, 'Nisi.', 0, 'TR2094345936', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(25, 1, 'Morris Larkin', 'Just', '562714909', '691208424', 1, 0, 'Quas.', 0, 'TR893637839', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(26, 1, 'Davion Schumm III', 'Prof', '762526177', '1478180827', 1, 0, 'Odio.', 0, 'TR612514629', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(27, 1, 'Nat Treutel', 'Cass', '567751868', '137761466', 1, 0, 'Odio.', 0, 'TR434361216', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(28, 1, 'Dr. Thelma Stoltenberg', 'Pene', '157811861', '2091360481', 1, 0, 'Sit.', 0, 'TR1626253357', '2018-05-14 19:43:02', '2018-05-14 19:43:02'),
(29, 1, 'Lilla Kemmer', 'Rach', '1483686923', '1267631448', 1, 0, 'Et.', 0, 'TR1129010171', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(30, 1, 'Josie Mann', 'Mrs.', '2045533550', '1466057063', 1, 0, 'Sunt.', 0, 'TR149541021', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(31, 1, 'Arthur Crooks', 'Dr. ', '2018882029', '1556244651', 1, 0, 'Cum.', 0, 'TR352131298', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(32, 1, 'Kathryn Boyle', 'Laur', '1480846104', '1813727918', 1, 0, 'Ut.', 0, 'TR889187764', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(33, 1, 'Bryon Marquardt', 'Lian', '96251758', '1263373838', 1, 0, 'Et.', 0, 'TR1257309284', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(34, 1, 'Kennith Gleichner', 'Gwen', '741445843', '819196884', 1, 0, 'Cum.', 0, 'TR907605661', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(35, 1, 'Reba Waters', 'Jacq', '820960243', '1716938151', 1, 0, 'Sed.', 0, 'TR1631693383', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(36, 1, 'Myrna Bednar', 'Greg', '947318988', '1101858254', 1, 0, 'Odio.', 0, 'TR1519510665', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(37, 1, 'Stefan Watsica', 'Laur', '838900800', '1788697873', 1, 0, 'Quis.', 0, 'TR1318029785', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(38, 1, 'Darron O\'Hara', 'Dr. ', '1656589345', '1711587663', 1, 0, 'Quia.', 0, 'TR546573980', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(39, 1, 'Kelton Bergstrom DDS', 'Otil', '912698880', '617282077', 1, 0, 'Sed.', 0, 'TR549208700', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(40, 1, 'Cory Hegmann', 'Kade', '1381873718', '706259063', 1, 0, 'Odio.', 0, 'TR1639394598', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(41, 1, 'Prof. Angel Medhurst II', 'Jazm', '2135925640', '404256144', 1, 0, 'Ut.', 0, 'TR1555527333', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(42, 1, 'Dawn Champlin', 'Miss', '1729877502', '1403247134', 1, 0, 'Non.', 0, 'TR1707445703', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(43, 1, 'Hyman Mante', 'Saig', '1688273614', '1470624917', 1, 0, 'Qui.', 0, 'TR250408275', '2018-05-14 19:43:03', '2018-05-14 19:43:03'),
(44, 1, 'Aniya McGlynn', 'Darr', '1912804331', '241606396', 1, 0, 'Enim.', 0, 'TR139086173', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(45, 1, 'Wilfred Volkman', 'Prof', '1675267863', '1673966675', 1, 0, 'Eum.', 0, 'TR635324885', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(46, 1, 'Prof. Lexie Waters II', 'Roya', '1908865749', '1095935104', 1, 0, 'Ad.', 0, 'TR1300630147', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(47, 1, 'Alden O\'Connell', 'Prof', '477095922', '1991471402', 1, 0, 'Qui.', 0, 'TR1284040036', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(48, 1, 'Glenda Watsica', 'Alli', '1430977139', '1983029941', 1, 0, 'Quos.', 0, 'TR2133410773', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(49, 1, 'Edwardo Smith', 'Trac', '279803346', '2007162791', 1, 0, 'Et.', 0, 'TR616637480', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(50, 1, 'Verdie Prohaska', 'Prof', '469109965', '595761448', 1, 0, 'Quae.', 0, 'TR1461657210', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(51, 1, 'Royce Aufderhar', 'Delp', '1691320834', '1311872194', 1, 0, 'Ad.', 0, 'TR1343109689', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(52, 1, 'Khalil Streich DDS', 'Anna', '1059194294', '415810405', 1, 0, 'Sunt.', 0, 'TR174065826', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(53, 1, 'Dr. Madalyn Hagenes DDS', 'Kell', '623103119', '397554948', 1, 0, 'Et.', 0, 'TR803433960', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(54, 1, 'Skyla Spinka', 'Frie', '2051505706', '1181598678', 1, 0, 'Qui.', 0, 'TR701430196', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(55, 1, 'Prof. Florencio Kiehn V', 'Mavi', '1377420106', '1632772144', 1, 0, 'Aut.', 0, 'TR1809593617', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(56, 1, 'Dr. Orie Schowalter MD', 'Ryan', '1559077366', '1384950935', 1, 0, 'Ut.', 0, 'TR677409407', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(57, 1, 'Ayana Reilly', 'Cari', '17483314', '1747984344', 1, 0, 'Quo.', 0, 'TR1783689340', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(58, 1, 'Gilberto Nikolaus', 'Mr. ', '632981147', '1596475202', 1, 0, 'Qui.', 0, 'TR1764920051', '2018-05-14 19:43:04', '2018-05-14 19:43:04'),
(59, 1, 'Abraham Lubowitz', 'Dr. ', '940055002', '1061909756', 1, 0, 'Ut.', 0, 'TR781945961', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(60, 1, 'Dr. Leonardo Stoltenberg V', 'Prof', '1126993529', '950361801', 1, 0, 'Et.', 0, 'TR1396843711', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(61, 1, 'Dr. Genevieve Lakin', 'Trav', '371755622', '1168856394', 1, 0, 'Ut.', 0, 'TR2109249735', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(62, 1, 'Ms. Amber Rolfson', 'Lorn', '1622186810', '1859036716', 1, 0, 'Cum.', 0, 'TR2133865676', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(63, 1, 'Leanne Greenfelder', 'Noem', '833892520', '337599803', 1, 0, 'Vero.', 0, 'TR768790169', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(64, 1, 'Freida Emmerich', 'Gay ', '1586603484', '1385107934', 1, 0, 'Qui.', 0, 'TR923413420', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(65, 1, 'Mr. Ernest Hahn DDS', 'Viva', '1634326907', '240499490', 1, 0, 'Vel.', 0, 'TR856250222', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(66, 1, 'Joanny Klocko', 'Dr. ', '1354953484', '969449555', 1, 0, 'Aut.', 0, 'TR2092919147', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(67, 1, 'Ima Tremblay', 'Miss', '929279924', '1354774224', 1, 0, 'Iste.', 0, 'TR1698741448', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(68, 1, 'Jalen Gerhold', 'Dr. ', '1657311214', '2108474220', 1, 0, 'Eos.', 0, 'TR961543572', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(69, 1, 'Patrick Crona', 'Vick', '1011464508', '26764633', 1, 0, 'Est.', 0, 'TR438199424', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(70, 1, 'Reece Swaniawski', 'Malc', '915145996', '1544488995', 1, 0, 'Sunt.', 0, 'TR1485516445', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(71, 1, 'Briana Bartoletti', 'Nath', '144238286', '560025314', 1, 0, 'Quo.', 0, 'TR1615494557', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(72, 1, 'Dr. Cydney Schinner DVM', 'Mr. ', '1342059489', '978925407', 1, 0, 'Ut.', 0, 'TR1438092495', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(73, 1, 'Lucas Gutkowski', 'Miss', '1845733038', '1557463464', 1, 0, 'Iure.', 0, 'TR2143280071', '2018-05-14 19:43:05', '2018-05-14 19:43:05'),
(74, 1, 'Prof. Fidel Johnson MD', 'Brig', '538807697', '2034640608', 1, 0, 'Ea.', 0, 'TR1881674245', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(75, 1, 'Mina Graham I', 'Saig', '1738633138', '247939368', 1, 0, 'Et.', 0, 'TR748888267', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(76, 1, 'Molly Stracke', 'Eudo', '1426820144', '506150533', 1, 0, 'Aut.', 0, 'TR862071431', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(77, 1, 'Kenny Dibbert', 'Mary', '2050751465', '1546076046', 1, 0, 'Sed.', 0, 'TR1124769171', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(78, 1, 'Estel Orn DDS', 'Cory', '1873185965', '1120983790', 1, 0, 'Sunt.', 0, 'TR1897429561', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(79, 1, 'Miss Dorothea Stracke III', 'Lora', '231247516', '943494630', 1, 0, 'Sed.', 0, 'TR546871876', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(80, 1, 'Emilio Dickens', 'Mrs.', '5376847', '1686065791', 1, 0, 'Quos.', 0, 'TR370472343', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(81, 1, 'Lauriane Keebler', 'Mr. ', '440018229', '1518696164', 1, 0, 'Ad.', 0, 'TR722203101', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(82, 1, 'Destinee Ortiz', 'Elmi', '1841614606', '1711053514', 1, 0, 'Non.', 0, 'TR1464587653', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(83, 1, 'Dusty Casper', 'Mrs.', '746415848', '1487993969', 1, 0, 'Et.', 0, 'TR138595392', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(84, 1, 'Antoinette Bergnaum', 'Cesa', '335789976', '1250814134', 1, 0, 'Cum.', 0, 'TR2038772656', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(85, 1, 'Ashly Kunze', 'Toni', '171115461', '1390267960', 1, 0, 'Ut.', 0, 'TR1873473232', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(86, 1, 'Kathryn Dickinson', 'Mr. ', '862700263', '1287754639', 1, 0, 'Quo.', 0, 'TR1026908505', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(87, 1, 'Danielle Wolff', 'Zane', '1465696062', '531984793', 1, 0, 'In.', 0, 'TR1600155382', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(88, 1, 'Micaela Franecki', 'Kari', '1120226625', '1846104965', 1, 0, 'Odit.', 0, 'TR1275211578', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(89, 1, 'Myles Yost V', 'Kayl', '805618701', '733591397', 1, 0, 'Et.', 0, 'TR854690228', '2018-05-14 19:43:06', '2018-05-14 19:43:06'),
(90, 1, 'Destinee Howe', 'Olin', '1028697289', '589987757', 1, 0, 'Ex.', 0, 'TR382749898', '2018-05-14 19:43:07', '2018-05-14 19:43:07'),
(91, 1, 'Meaghan Lakin PhD', 'Leif', '889127623', '2670670', 1, 0, 'Et.', 0, 'TR1345314780', '2018-05-14 19:43:07', '2018-05-14 19:43:07'),
(92, 1, 'Caleb Turner', 'Angu', '2147330583', '276994884', 1, 0, 'Et.', 0, 'TR1562752025', '2018-05-14 19:43:07', '2018-05-14 19:43:07'),
(93, 1, 'Hubert Armstrong I', 'Erib', '747754931', '943585100', 1, 0, 'Quia.', 0, 'TR1939500230', '2018-05-14 19:43:07', '2018-05-14 19:43:07'),
(94, 1, 'Prof. Vickie Beer II', 'Hadl', '760348869', '1066177700', 1, 0, 'Id.', 0, 'TR382891232', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(95, 1, 'Bettye Abshire', 'Ms. ', '1558633447', '1502798755', 1, 0, 'At.', 0, 'TR78195547', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(96, 1, 'Prof. Lucienne Doyle DDS', 'Eliz', '592118144', '559233581', 1, 0, 'Quis.', 0, 'TR605031025', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(97, 1, 'Sage Nolan', 'Vern', '513335230', '1330228180', 1, 0, 'Ipsa.', 0, 'TR2061537710', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(98, 1, 'Brandy Harber', 'Deli', '712957140', '1379498208', 1, 0, 'Ut.', 0, 'TR323346870', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(99, 1, 'Mrs. Cathryn McKenzie', 'Ferm', '635117783', '826494080', 1, 0, 'Quam.', 0, 'TR1540561415', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(100, 1, 'Lura Simonis', 'Rudo', '1706594093', '759739052', 1, 0, 'Odio.', 0, 'TR188826043', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(101, 1, 'Emilia Keeling', 'Rega', '2022831575', '929581621', 1, 0, 'Enim.', 0, 'TR1686482026', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(102, 1, 'Dr. Josephine Stamm III', 'Laur', '900564458', '66955759', 1, 0, 'Et.', 0, 'TR633342248', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(103, 1, 'Mr. Weldon O\'Connell', 'Mitt', '883682274', '1293913248', 1, 0, 'Quod.', 0, 'TR2032478273', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(104, 1, 'Selina Pfannerstill I', 'Cleo', '1221745200', '213697620', 1, 0, 'Et.', 0, 'TR1671510544', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(105, 1, 'Mrs. Macy Feest', 'Dr. ', '2081677936', '1218899981', 1, 0, 'Quo.', 0, 'TR891694805', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(106, 1, 'Prof. Tyrese Durgan DDS', 'Lupe', '1067118567', '563507621', 1, 0, 'Illo.', 0, 'TR544385795', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(107, 1, 'Lucius Kovacek', 'Neal', '849796338', '1141241513', 1, 0, 'Et.', 0, 'TR1992959868', '2018-05-14 19:43:08', '2018-05-14 19:43:08'),
(108, 1, 'Kirsten Kirlin', 'Mr. ', '2096529761', '1455135528', 1, 0, 'Modi.', 0, 'TR1757809959', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(109, 1, 'Heath Witting', 'Boyd', '919893849', '1309867693', 1, 0, 'Quia.', 0, 'TR1468647422', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(110, 1, 'Mr. Carey Goodwin I', 'Miss', '450129680', '1334148890', 1, 0, 'Amet.', 0, 'TR1062103435', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(111, 1, 'Lionel Jast DVM', 'Mrs.', '353743195', '1551776769', 1, 0, 'Qui.', 0, 'TR948007950', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(112, 1, 'Mr. Rex Ondricka', 'Jama', '1665474393', '91507237', 1, 0, 'In.', 0, 'TR1731967328', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(113, 1, 'Barrett Halvorson II', 'Dr. ', '1306655832', '2047103622', 1, 0, 'A.', 0, 'TR1029686005', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(114, 1, 'Nella Wuckert', 'Maya', '178530369', '1214692495', 1, 0, 'Sit.', 0, 'TR937197930', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(115, 1, 'Pietro Heaney', 'Orri', '1970140642', '290302805', 1, 0, 'Qui.', 0, 'TR770612860', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(116, 1, 'Julius Lueilwitz', 'Prof', '386678600', '1581285320', 1, 0, 'Fuga.', 0, 'TR1029191107', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(117, 1, 'Brigitte Stokes', 'Kitt', '1416999264', '1479382393', 1, 0, 'Ex.', 0, 'TR1712875293', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(118, 1, 'Neal Dooley DVM', 'Dr. ', '2128533526', '1294313287', 1, 0, 'Et.', 0, 'TR953953639', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(119, 1, 'Carlotta Boehm PhD', 'Dr. ', '421947173', '2036732686', 1, 0, 'Aut.', 0, 'TR1206076686', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(120, 1, 'Elise Kiehn Jr.', 'Wilf', '1012169810', '1716683342', 1, 0, 'Ea.', 0, 'TR1561492087', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(121, 1, 'Prof. Georgiana Koch Sr.', 'Mr. ', '1583328133', '2077416789', 1, 0, 'Et.', 0, 'TR1716358922', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(122, 1, 'Geovanni Botsford', 'Faus', '90154112', '106784472', 1, 0, 'Vel.', 0, 'TR2046846597', '2018-05-14 19:43:09', '2018-05-14 19:43:09'),
(123, 1, 'Cordelia Mills V', 'Prof', '481079271', '1362270016', 1, 0, 'Unde.', 0, 'TR1309286880', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(124, 1, 'Dr. Jaylen Runolfsson', 'Evie', '1934187860', '1648552452', 1, 0, 'Ut.', 0, 'TR827512447', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(125, 1, 'Garth West', 'Bern', '527496361', '101853571', 1, 0, 'Quas.', 0, 'TR1378396362', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(126, 1, 'Zaria Borer', 'Addi', '1867666085', '1633045965', 1, 0, 'Id.', 0, 'TR354477868', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(127, 1, 'Rodrigo Fadel', 'Avis', '1179630011', '2117107994', 1, 0, 'Ab.', 0, 'TR1161922540', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(128, 1, 'Enrico Walsh', 'Dill', '1599940587', '1209094053', 1, 0, 'Qui.', 0, 'TR1671735061', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(129, 1, 'Prof. Cloyd Schmidt', 'Prof', '1837592844', '2002096287', 1, 0, 'Iure.', 0, 'TR745246104', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(130, 1, 'Amelie Orn', 'Edwa', '1974815369', '1398660473', 1, 0, 'Et.', 0, 'TR1486907894', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(131, 1, 'Dr. Wilfred Kling', 'Garl', '693597199', '523230031', 1, 0, 'Quia.', 0, 'TR82558542', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(132, 1, 'Hilton Pouros', 'Dr. ', '2003012990', '2090986021', 1, 0, 'Vero.', 0, 'TR1615659617', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(133, 1, 'Cristal Wilkinson', 'Ms. ', '632198291', '120435047', 1, 0, 'Et.', 0, 'TR181057477', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(134, 1, 'Tiffany Weissnat IV', 'Dr. ', '685736457', '536805820', 1, 0, 'Qui.', 0, 'TR539517722', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(135, 1, 'Colleen Reinger', 'Bert', '1394707868', '735880369', 1, 0, 'Et.', 0, 'TR146534726', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(136, 1, 'May Wunsch I', 'Dr. ', '687537307', '97530758', 1, 0, 'Sit.', 0, 'TR1459468750', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(137, 1, 'Mireya Schultz', 'Lais', '1398192104', '325876136', 1, 0, 'Quia.', 0, 'TR1966928766', '2018-05-14 19:43:10', '2018-05-14 19:43:10'),
(138, 1, 'Dr. Gardner Kemmer I', 'Jacy', '1555314470', '1206947380', 1, 0, 'Quia.', 0, 'TR2032123047', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(139, 1, 'Miss Freida Goldner', 'Emel', '597674873', '1612309965', 1, 0, 'Quia.', 0, 'TR557347242', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(140, 1, 'Prof. Lauretta Gutmann II', 'Dr. ', '1655379276', '1262576953', 1, 0, 'Sit.', 0, 'TR110525709', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(141, 1, 'Elenor Pollich', 'Mely', '583947944', '363371974', 1, 0, 'Unde.', 0, 'TR1145254871', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(142, 1, 'Sonya Donnelly', 'Mrs.', '1787304113', '1764780858', 1, 0, 'Hic.', 0, 'TR1380588876', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(143, 1, 'Mr. Clair Howe I', 'Elea', '607143800', '640910197', 1, 0, 'Quos.', 0, 'TR1989050058', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(144, 1, 'Dr. Jackson Schulist', 'Clar', '1643661265', '1630282449', 1, 0, 'Ut.', 0, 'TR1448951250', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(145, 1, 'Candida Blanda I', 'Kait', '2105700950', '1933755149', 1, 0, 'Esse.', 0, 'TR2101627885', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(146, 1, 'Leda Cartwright', 'Rodg', '769714051', '1438269141', 1, 0, 'In.', 0, 'TR528129306', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(147, 1, 'Marcelo Mayer', 'Dr. ', '1080217007', '506108562', 1, 0, 'Et.', 0, 'TR682863292', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(148, 1, 'Don Padberg', 'Gilb', '1432101615', '248004795', 1, 0, 'Qui.', 0, 'TR1388102080', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(149, 1, 'Prof. Aisha Toy MD', 'Ampa', '1911307916', '1101255349', 1, 0, 'Nam.', 0, 'TR105866661', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(150, 1, 'Prof. Alexandrine Schroeder I', 'Gia ', '1193141244', '653160024', 1, 0, 'Non.', 0, 'TR143543101', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(151, 1, 'Chad Schultz DVM', 'Dr. ', '1196192116', '610317883', 1, 0, 'Aut.', 0, 'TR1574769662', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(152, 1, 'Dr. William Lesch Jr.', 'Tany', '1789206559', '1787049923', 1, 0, 'Quis.', 0, 'TR1728711596', '2018-05-14 19:43:11', '2018-05-14 19:43:11'),
(153, 1, 'Dr. Missouri Beer', 'Mrs.', '926602813', '1873603478', 1, 0, 'Non.', 0, 'TR1103144330', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(154, 1, 'Jacques Robel', 'Dr. ', '1038649775', '1830223307', 1, 0, 'Et.', 0, 'TR1623780001', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(155, 1, 'Cora Cremin PhD', 'Mill', '1913626417', '1725822120', 1, 0, 'Et.', 0, 'TR1586287706', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(156, 1, 'Mr. Mohamed Yundt', 'Odes', '672074047', '1857183636', 1, 0, 'Sit.', 0, 'TR1693127148', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(157, 1, 'Mrs. Arlene Pouros V', 'Prof', '1405931581', '1103187386', 1, 0, 'Aut.', 0, 'TR368627842', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(158, 1, 'Gia Price', 'Pete', '131133298', '116403628', 1, 0, 'Rem.', 0, 'TR514734762', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(159, 1, 'Reece Smitham I', 'Soph', '1501147026', '830095110', 1, 0, 'Qui.', 0, 'TR311457770', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(160, 1, 'Prof. Delores Senger MD', 'Jaqu', '1966824498', '1763253141', 1, 0, 'Vel.', 0, 'TR109395547', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(161, 1, 'Audie Stracke', 'Gers', '366819374', '985257679', 1, 0, 'Et.', 0, 'TR668089212', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(162, 1, 'Mrs. Monique Murphy Sr.', 'Aile', '623681760', '1688058155', 1, 0, 'Est.', 0, 'TR1650520895', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(163, 1, 'Raphael Beatty', 'Javo', '1379747496', '249458987', 1, 0, 'Vero.', 0, 'TR379531686', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(164, 1, 'Prof. Garnet Hermann', 'Mr. ', '435621494', '376113082', 1, 0, 'Rem.', 0, 'TR2085699158', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(165, 1, 'Vivianne Luettgen IV', 'Dr. ', '1183811432', '1714192006', 1, 0, 'Et.', 0, 'TR261197979', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(166, 1, 'Nathanial Kozey', 'Ada ', '2087616245', '1128992588', 1, 0, 'Sunt.', 0, 'TR590409238', '2018-05-14 19:43:12', '2018-05-14 19:43:12'),
(167, 1, 'Grayce O\'Connell', 'Noah', '1920463215', '316942378', 1, 0, 'Sunt.', 0, 'TR2009300949', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(168, 1, 'Toney Eichmann I', 'Kesh', '1448533026', '1276381039', 1, 0, 'Ad.', 0, 'TR1169349548', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(169, 1, 'Darrel Connelly DVM', 'Alay', '312277241', '262891723', 1, 0, 'Amet.', 0, 'TR216599453', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(170, 1, 'Prof. Nicola Reynolds DDS', 'Mady', '415151534', '1618292202', 1, 0, 'In.', 0, 'TR433114902', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(171, 1, 'Janiya Kirlin', 'Muri', '1633592818', '417134707', 1, 0, 'Eos.', 0, 'TR584406704', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(172, 1, 'Prof. Edd Ward', 'Elli', '337238391', '202938665', 1, 0, 'Quod.', 0, 'TR1480345098', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(173, 1, 'Miss Aliza Klocko III', 'Prof', '411734073', '12927568', 1, 0, 'Et.', 0, 'TR726658705', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(174, 1, 'Lila Bradtke V', 'Prof', '1118522581', '1965834058', 1, 0, 'Eius.', 0, 'TR1463384384', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(175, 1, 'Christian Batz', 'Roma', '607417392', '1572616119', 1, 0, 'Quia.', 0, 'TR201679116', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(176, 1, 'Dr. Derek Considine', 'Eile', '1248523296', '1618590111', 1, 0, 'Aut.', 0, 'TR284652800', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(177, 1, 'Dr. Tyrique Bailey', 'Nata', '741503331', '1106768010', 1, 0, 'Eos.', 0, 'TR1792127809', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(178, 1, 'Dr. Felton Bernhard', 'Prof', '982071410', '786192153', 1, 0, 'Eum.', 0, 'TR844700792', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(179, 1, 'Verona Hartmann', 'Earn', '2060088548', '2036028662', 1, 0, 'Ut.', 0, 'TR1140826314', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(180, 1, 'Ward Jenkins', 'Abbi', '1577254529', '1005425077', 1, 0, 'Sed.', 0, 'TR595891101', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(181, 1, 'Jude Batz', 'Jace', '900560850', '452179405', 1, 0, 'Fuga.', 0, 'TR632364042', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(182, 1, 'Maurine Cronin', 'Keag', '591212831', '1852904713', 1, 0, 'Sunt.', 0, 'TR876732960', '2018-05-14 19:43:13', '2018-05-14 19:43:13'),
(183, 1, 'Prof. Helga Russel', 'Miss', '718107449', '2026222518', 1, 0, 'Ea.', 0, 'TR911589757', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(184, 1, 'Jan Conn DVM', 'Leda', '907724558', '1918849105', 1, 0, 'Enim.', 0, 'TR1634291271', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(185, 1, 'Brennon Johnston', 'Adri', '1752877513', '1670829950', 1, 0, 'Ut.', 0, 'TR1323989797', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(186, 1, 'Pearline Harris Jr.', 'Denn', '1428022596', '1556985479', 1, 0, 'Non.', 0, 'TR1251192031', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(187, 1, 'Dr. Corbin Watsica DDS', 'Dona', '1931998583', '1620313208', 1, 0, 'Ut.', 0, 'TR850617678', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(188, 1, 'Juanita Heathcote', 'Raou', '1331717563', '2012421340', 1, 0, 'Cum.', 0, 'TR214365969', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(189, 1, 'Prof. Stephon Ruecker I', 'Mr. ', '1747265169', '1947507050', 1, 0, 'Quae.', 0, 'TR1768762342', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(190, 1, 'Earl Baumbach II', 'Marc', '1137927325', '1083883336', 1, 0, 'Vel.', 0, 'TR1645816591', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(191, 1, 'Emery Rohan', 'Irma', '1250123521', '585872248', 1, 0, 'Sint.', 0, 'TR21204725', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(192, 1, 'Dr. Gilbert Jacobson', 'Damo', '1061724027', '1559918149', 1, 0, 'Sit.', 0, 'TR1614605980', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(193, 1, 'Dr. Deonte Gislason Jr.', 'Dari', '1795979220', '312081457', 1, 0, 'Et.', 0, 'TR1161327745', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(194, 1, 'Prof. Alyce McGlynn', 'Deva', '2064222153', '1091683898', 1, 0, 'Qui.', 0, 'TR1823238703', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(195, 1, 'Felicia Ortiz', 'Miss', '1813533221', '120782032', 1, 0, 'Qui.', 0, 'TR1765760940', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(196, 1, 'Ms. Myah Fritsch DVM', 'Webs', '1219217164', '1276970420', 1, 0, 'Eum.', 0, 'TR1156108525', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(197, 1, 'Mr. Olin Schroeder I', 'Zack', '1499704407', '1302467279', 1, 0, 'Cum.', 0, 'TR1474488458', '2018-05-14 19:43:14', '2018-05-14 19:43:14'),
(198, 1, 'Prof. Maya Lynch III', 'Tere', '2103055761', '626149647', 1, 0, 'Quis.', 0, 'TR1984355302', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(199, 1, 'Ryley Nikolaus III', 'Dr. ', '1496510232', '1881087419', 1, 0, 'Ea.', 0, 'TR1697579648', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(200, 1, 'Ms. Gudrun Reichel', 'Eric', '1661916906', '888728393', 1, 0, 'Et.', 0, 'TR497038746', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(201, 1, 'Jamal Simonis MD', 'Dr. ', '890309927', '1427572391', 1, 0, 'Aut.', 0, 'TR1148773885', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(202, 1, 'Aliyah Frami', 'Dr. ', '634481950', '1062610795', 1, 0, 'Quo.', 0, 'TR588597592', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(203, 1, 'Lew Leffler', 'Prof', '553052071', '1470414534', 1, 0, 'Sint.', 0, 'TR1022310670', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(204, 1, 'Gerardo Boyle PhD', 'Ron ', '1943123390', '15646118', 1, 0, 'Quia.', 0, 'TR1797902573', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(205, 1, 'Cora Kiehn', 'Koby', '825214643', '1211202904', 1, 0, 'Est.', 0, 'TR1939666205', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(206, 1, 'Luella Rodriguez III', 'Greg', '1827102940', '1240989745', 1, 0, 'Enim.', 0, 'TR1710526354', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(207, 1, 'Velva Altenwerth', 'Hett', '35307856', '1126025024', 1, 0, 'Modi.', 0, 'TR1961726147', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(208, 1, 'Prof. Libbie Rowe', 'Dora', '1911567890', '1164045670', 1, 0, 'Odit.', 0, 'TR1651799012', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(209, 1, 'Mr. Jabari Koss PhD', 'Dr. ', '1076341678', '1639656171', 1, 0, 'Quia.', 0, 'TR440580408', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(210, 1, 'Elyssa Jaskolski', 'Call', '765758262', '145544598', 1, 0, 'Est.', 0, 'TR1097387692', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(211, 1, 'Keegan Jacobson', 'Jimm', '676740295', '191860469', 1, 0, 'Iste.', 0, 'TR1557475476', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(212, 1, 'Prof. Garland Bins MD', 'Sinc', '2084342702', '226269722', 1, 0, 'Et.', 0, 'TR1356885495', '2018-05-14 19:43:15', '2018-05-14 19:43:15'),
(213, 1, 'Bradly Monahan', 'Sher', '1294635801', '1601411750', 1, 0, 'Quia.', 0, 'TR920482370', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(214, 1, 'Maegan Brakus', 'Kody', '173020892', '675273945', 1, 0, 'Quis.', 0, 'TR232084742', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(215, 1, 'Jackeline Mills', 'Thad', '926897520', '700488685', 1, 0, 'Quia.', 0, 'TR69496712', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(216, 1, 'Mckenna Ebert', 'Mr. ', '235444975', '891773752', 1, 0, 'Aut.', 0, 'TR258641449', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(217, 1, 'Ms. Stephanie Homenick MD', 'Prof', '1189886342', '693446741', 1, 0, 'Id.', 0, 'TR1190133499', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(218, 1, 'Mr. Marshall McCullough', 'Mavi', '1176462782', '1004066639', 1, 0, 'Sed.', 0, 'TR973439185', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(219, 1, 'Dr. Darrin Vandervort IV', 'Prof', '1548942215', '996285061', 1, 0, 'Quod.', 0, 'TR1059728024', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(220, 1, 'Mr. Ernesto Terry Jr.', 'Alex', '1679945024', '1923058530', 1, 0, 'Ut.', 0, 'TR988362451', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(221, 1, 'Dr. Emely Boyer', 'Dunc', '1023661869', '657990805', 1, 0, 'Quos.', 0, 'TR1642435445', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(222, 1, 'Dr. Francisca Boyle', 'Shea', '1009767005', '1086711449', 1, 0, 'Ut.', 0, 'TR1248140507', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(223, 1, 'Katelyn Kuhic', 'Mrs.', '361182895', '94946076', 1, 0, 'Et.', 0, 'TR545948256', '2018-05-14 19:43:16', '2018-05-14 19:43:16'),
(224, 1, 'Mr. Shaun Heller V', 'Adit', '114899127', '530159992', 1, 0, 'Ut.', 0, 'TR467804772', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(225, 1, 'Prof. Leta Dicki', 'Lanc', '316611228', '742970108', 1, 0, 'Ipsa.', 0, 'TR2139138338', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(226, 1, 'Odessa Lockman', 'Donn', '1793528340', '472274128', 1, 0, 'Aut.', 0, 'TR1024890135', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(227, 1, 'Andy Deckow IV', 'Ms. ', '1535286698', '1214751279', 1, 0, 'Quis.', 0, 'TR2061187614', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(228, 1, 'Dr. Kiley Hane', 'Dayn', '291037408', '1131987591', 1, 0, 'Hic.', 0, 'TR1094450021', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(229, 1, 'Dr. Kendra Hilll DVM', 'Shan', '754314416', '433851099', 1, 0, 'Sed.', 0, 'TR526990783', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(230, 1, 'Angela Bosco', 'Cand', '1811990627', '919913488', 1, 0, 'Vero.', 0, 'TR829354020', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(231, 1, 'Joyce Borer', 'Rose', '595855372', '388441295', 1, 0, 'Ex.', 0, 'TR2011703429', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(232, 1, 'Pearl Wilkinson', 'Mr. ', '1035577869', '1803294320', 1, 0, 'Quia.', 0, 'TR165582489', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(233, 1, 'Tommie Toy', 'Gene', '738654937', '825605831', 1, 0, 'Esse.', 0, 'TR13582073', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(234, 1, 'Hermann Davis', 'Winn', '867656253', '1380770533', 1, 0, 'Illo.', 0, 'TR1473809610', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(235, 1, 'Eleazar Murray', 'Prof', '1146036085', '228564223', 1, 0, 'In.', 0, 'TR1114426312', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(236, 1, 'Khalil Schowalter IV', 'Will', '70179085', '2013402341', 1, 0, 'Vero.', 0, 'TR1593593788', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(237, 1, 'Prof. Erik Tromp', 'Dr. ', '109261774', '724971454', 1, 0, 'Aut.', 0, 'TR584516805', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(238, 1, 'Elvis Crooks', 'Rose', '624756442', '662325682', 1, 0, 'Aut.', 0, 'TR125929405', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(239, 1, 'Jany Bernier', 'Ms. ', '421716709', '1478502761', 1, 0, 'Odit.', 0, 'TR1866937082', '2018-05-14 19:43:17', '2018-05-14 19:43:17'),
(240, 1, 'Dallin Bogan', 'Tabi', '1224504806', '1572463072', 1, 0, 'Aut.', 0, 'TR1893679880', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(241, 1, 'Tanner Skiles', 'Cass', '1828528300', '1155282668', 1, 0, 'Vel.', 0, 'TR1946590772', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(242, 1, 'Yessenia Hintz', 'Beul', '2117286190', '1018496856', 1, 0, 'Enim.', 0, 'TR1089174473', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(243, 1, 'Haylee Schiller V', 'Pier', '345854451', '1397947148', 1, 0, 'Iure.', 0, 'TR1261853054', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(244, 1, 'Rose Weissnat', 'Port', '130325065', '2011889184', 1, 0, 'In.', 0, 'TR1087329864', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(245, 1, 'Candida Quitzon', 'Mrs.', '400371430', '690982084', 1, 0, 'Ipsa.', 0, 'TR1830267622', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(246, 1, 'Erna Koelpin', 'Chri', '506811783', '1615476703', 1, 0, 'Et.', 0, 'TR1449491988', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(247, 1, 'Jerad Kautzer', 'Mari', '1367276626', '1314007946', 1, 0, 'Est.', 0, 'TR1255026782', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(248, 1, 'Carmel Oberbrunner Sr.', 'Leo ', '234882612', '1469903125', 1, 0, 'Qui.', 0, 'TR1509067274', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(249, 1, 'Emma Franecki', 'Geor', '1890669662', '801529711', 1, 0, 'Aut.', 0, 'TR955377071', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(250, 1, 'Mrs. Lou McClure', 'Ms. ', '2145398994', '764255291', 1, 0, 'Odio.', 0, 'TR1773112085', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(251, 1, 'Mossie Homenick', 'Mr. ', '548331282', '744240646', 1, 0, 'Quas.', 0, 'TR180539142', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(252, 1, 'Emilie Gislason Jr.', 'Fred', '171381902', '1238786134', 1, 0, 'Et.', 0, 'TR649223979', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(253, 1, 'Sylvester Lynch', 'Wayl', '726042403', '1881714154', 1, 0, 'Vel.', 0, 'TR1907258855', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(254, 1, 'Ms. Danielle Schneider', 'Fran', '1765508167', '181493844', 1, 0, 'Quis.', 0, 'TR446730444', '2018-05-14 19:43:18', '2018-05-14 19:43:18'),
(255, 1, 'Duncan Kuhic', 'Prof', '949823636', '185944065', 1, 0, 'Aut.', 0, 'TR1282602067', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(256, 1, 'Isaias Parisian', 'Miss', '457399853', '1706158132', 1, 0, 'Iste.', 0, 'TR1169522556', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(257, 1, 'Prof. Darrel Beier', 'Dr. ', '414070396', '23041018', 1, 0, 'Est.', 0, 'TR116642230', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(258, 1, 'Miss Elaina Mayer Jr.', 'Mrs.', '1920653765', '777436230', 1, 0, 'Ad.', 0, 'TR779038121', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(259, 1, 'Myles Friesen', 'Dani', '657202856', '2097776243', 1, 0, 'Qui.', 0, 'TR1640521743', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(260, 1, 'Mr. Kris Ward', 'Lavi', '1156398175', '147057744', 1, 0, 'Ut.', 0, 'TR253210138', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(261, 1, 'Johanna Cole IV', 'Jazm', '498416174', '2097787644', 1, 0, 'Et.', 0, 'TR1043952524', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(262, 1, 'Mrs. Barbara Bruen V', 'Jasp', '579411051', '1823125704', 1, 0, 'Amet.', 0, 'TR1777218579', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(263, 1, 'Loraine Kuhlman', 'Mr. ', '550433622', '864722579', 1, 0, 'Ab.', 0, 'TR688641050', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(264, 1, 'Dr. Vivianne Mitchell', 'Lond', '852208075', '157060050', 1, 0, 'Eum.', 0, 'TR41379076', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(265, 1, 'Dr. Montana Satterfield', 'Bill', '1311804504', '1714709043', 1, 0, 'Quae.', 0, 'TR990067799', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(266, 1, 'Angelina Dickens DVM', 'Zelm', '1106183398', '965528565', 1, 0, 'Ad.', 0, 'TR1155487166', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(267, 1, 'Samir Blick', 'Dovi', '1514055345', '1954635276', 1, 0, 'Est.', 0, 'TR592429435', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(268, 1, 'Dr. Xavier Leffler IV', 'Vero', '1708167810', '826353021', 1, 0, 'A.', 0, 'TR405711222', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(269, 1, 'Martine Kirlin', 'Mrs.', '1809815003', '1142985097', 1, 0, 'Et.', 0, 'TR1909165442', '2018-05-14 19:43:19', '2018-05-14 19:43:19'),
(270, 1, 'Jazmin Murray', 'Jayc', '650761002', '1287157031', 1, 0, 'Fuga.', 0, 'TR781335946', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(271, 1, 'Mrs. Sonya Klocko I', 'Nell', '742629333', '1549787659', 1, 0, 'Sint.', 0, 'TR1839108368', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(272, 1, 'Dr. Josh Carroll', 'Prof', '1918366307', '527894150', 1, 0, 'Sunt.', 0, 'TR1062600928', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(273, 1, 'Prof. Jamir Hilll', 'Russ', '494714877', '1271113201', 1, 0, 'Quod.', 0, 'TR746245855', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(274, 1, 'Dr. Rhiannon Rath', 'Miss', '2319799', '1731743677', 1, 0, 'Est.', 0, 'TR1050529945', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(275, 1, 'Mittie Schimmel', 'Emil', '1181509922', '144143281', 1, 0, 'Ut.', 0, 'TR1553946852', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(276, 1, 'Dr. Berenice Beier MD', 'Muri', '548161231', '2096307346', 1, 0, 'Rem.', 0, 'TR476221342', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(277, 1, 'Prof. Ariel Marks', 'Dr. ', '1165888407', '671251589', 1, 0, 'Eum.', 0, 'TR933494236', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(278, 1, 'Queen Brakus', 'Hoyt', '1790097317', '1554053901', 1, 0, 'In.', 0, 'TR1818994285', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(279, 1, 'Katrine Emard', 'Jama', '1705983398', '759658128', 1, 0, 'Qui.', 0, 'TR124944398', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(280, 1, 'Enola Douglas', 'Esme', '1773695560', '1658627128', 1, 0, 'Ut.', 0, 'TR1212217364', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(281, 1, 'Prof. Prince Abbott IV', 'Cort', '596275766', '1795838570', 1, 0, 'Sit.', 0, 'TR1346590028', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(282, 1, 'Dixie Reilly', 'Isma', '983700967', '840018161', 1, 0, 'Qui.', 0, 'TR1087302307', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(283, 1, 'Sonny Huels', 'Agla', '1632640073', '1900646295', 1, 0, 'Quia.', 0, 'TR2130205349', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(284, 1, 'Violet O\'Keefe', 'Newe', '2010052635', '1435765897', 1, 0, 'At.', 0, 'TR1490726901', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(285, 1, 'Dillon Lind', 'Dr. ', '920988603', '1597270680', 1, 0, 'Quia.', 0, 'TR724516806', '2018-05-14 19:43:20', '2018-05-14 19:43:20'),
(286, 1, 'Levi Pfeffer', 'Marq', '1763842349', '2542550', 1, 0, 'Odit.', 0, 'TR1471354661', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(287, 1, 'Janie Kassulke', 'Mr. ', '506131165', '71350034', 1, 0, 'Odit.', 0, 'TR7877336', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(288, 1, 'Alfred Heidenreich', 'Elin', '2058741988', '505212279', 1, 0, 'Est.', 0, 'TR161729211', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(289, 1, 'Luciano Cremin', 'Prof', '2127019445', '1754103873', 1, 0, 'Iure.', 0, 'TR1846240848', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(290, 1, 'Elyse Carroll', 'Ms. ', '1506417141', '2069454967', 1, 0, 'Ut.', 0, 'TR358585116', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(291, 1, 'Riley Monahan', 'Prud', '1319348894', '1333462010', 1, 0, 'Sunt.', 0, 'TR1480609986', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(292, 1, 'Dock Dach MD', 'Mona', '1089664868', '448981224', 1, 0, 'Et.', 0, 'TR2032038149', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(293, 1, 'Miss Carley Becker', 'Curt', '1982142750', '1949450298', 1, 0, 'Est.', 0, 'TR1706930122', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(294, 1, 'Deshaun Daniel', 'Dr. ', '1394919774', '1061409213', 1, 0, 'Quis.', 0, 'TR1399730172', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(295, 1, 'Dr. Kelton Rosenbaum', 'Prof', '940131955', '1829351081', 1, 0, 'Sed.', 0, 'TR201564918', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(296, 1, 'Mabel Nitzsche DDS', 'Mrs.', '1412601128', '937914647', 1, 0, 'Est.', 0, 'TR780080588', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(297, 1, 'Tomas Paucek', 'Prof', '1647929200', '1208778898', 1, 0, 'Est.', 0, 'TR427963841', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(298, 1, 'Rolando Hills', 'Mr. ', '247823377', '974383028', 1, 0, 'Ea.', 0, 'TR481225467', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(299, 1, 'Mara Ritchie', 'Prof', '984243465', '547046200', 1, 0, 'Ea.', 0, 'TR1711856589', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(300, 1, 'Wilson Wilkinson', 'Dr. ', '1966799646', '1059924667', 1, 0, 'Qui.', 0, 'TR1925327628', '2018-05-14 19:43:21', '2018-05-14 19:43:21'),
(301, 1, 'Prof. Abdullah Wolf', 'Chri', '53312165', '1004828430', 1, 0, 'Qui.', 0, 'TR1322746263', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(302, 1, 'Jenifer Borer', 'Maud', '264652476', '279760330', 1, 0, 'Aut.', 0, 'TR513771880', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(303, 1, 'Abigayle Heaney', 'Jerm', '1107126849', '568829124', 1, 0, 'Quia.', 0, 'TR268235011', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(304, 1, 'Mr. Fern Hayes PhD', 'Dr. ', '581266469', '768232233', 1, 0, 'Nisi.', 0, 'TR1069760802', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(305, 1, 'Raheem Kling', 'Iva ', '523159152', '794469212', 1, 0, 'Est.', 0, 'TR725184871', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(306, 1, 'Mr. Mikel Bradtke', 'Urie', '1196055208', '1802192125', 1, 0, 'Vero.', 0, 'TR1296269348', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(307, 1, 'Eloise Howe', 'Prof', '313921209', '1106137102', 1, 0, 'Et.', 0, 'TR1663871026', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(308, 1, 'Lexi Larson III', 'Coop', '2010528388', '945362152', 1, 0, 'Sit.', 0, 'TR1790276913', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(309, 1, 'Laila Spinka Jr.', 'Prof', '570944724', '1014398186', 1, 0, 'Non.', 0, 'TR106965386', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(310, 1, 'Mrs. Lacy Bauch', 'Alet', '1303109312', '2065826219', 1, 0, 'Sit.', 0, 'TR1372847216', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(311, 1, 'Miss Katelyn Roberts DVM', 'Alta', '1376866213', '1937344708', 1, 0, 'Cum.', 0, 'TR1949930808', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(312, 1, 'Prof. Nolan Bogan', 'Bern', '1132117810', '1387268820', 1, 0, 'Et.', 0, 'TR1138129235', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(313, 1, 'Isidro Leuschke', 'Ms. ', '1345900492', '1845658044', 1, 0, 'Esse.', 0, 'TR523146060', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(314, 1, 'Herminia Predovic', 'Loga', '1706611307', '457631155', 1, 0, 'Sit.', 0, 'TR41741976', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(315, 1, 'Hillary Predovic', 'Miss', '605453030', '174207232', 1, 0, 'Eum.', 0, 'TR352034471', '2018-05-14 19:43:22', '2018-05-14 19:43:22'),
(316, 1, 'Madelyn Runolfsdottir', 'Mr. ', '1380816878', '1673797617', 1, 0, 'Et.', 0, 'TR1863953870', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(317, 1, 'Prof. Kale Romaguera II', 'Rach', '981970879', '865955309', 1, 0, 'In.', 0, 'TR2084852769', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(318, 1, 'Evert Hoeger', 'Juli', '28189070', '857880156', 1, 0, 'Et.', 0, 'TR1132555300', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(319, 1, 'Mrs. Luz Marvin', 'Alex', '1665992783', '920803921', 1, 0, 'Id.', 0, 'TR849493243', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(320, 1, 'Prof. Edmond Braun IV', 'Mrs.', '1490854037', '675816304', 1, 0, 'Quae.', 0, 'TR535640805', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(321, 1, 'Dr. Spencer Jenkins III', 'Moll', '1893649840', '898938177', 1, 0, 'Rem.', 0, 'TR1150973850', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(322, 1, 'Sigmund Boehm IV', 'Miss', '1831141208', '1122492482', 1, 0, 'Et.', 0, 'TR1366550773', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(323, 1, 'Britney Williamson', 'Gilb', '343571385', '1393367661', 1, 0, 'Modi.', 0, 'TR974295035', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(324, 1, 'Mertie Bahringer', 'Prof', '744252093', '110735516', 1, 0, 'Quam.', 0, 'TR1722866060', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(325, 1, 'Lera Schroeder', 'Miss', '947869558', '586016343', 1, 0, 'Quis.', 0, 'TR158183701', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(326, 1, 'Abigayle Kohler MD', 'Math', '751060890', '118749169', 1, 0, 'Eos.', 0, 'TR339576941', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(327, 1, 'Christ Schroeder Sr.', 'Jack', '692607711', '1501747774', 1, 0, 'In.', 0, 'TR1777989457', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(328, 1, 'Fay Lemke', 'Chel', '1448265937', '1340800370', 1, 0, 'Et.', 0, 'TR502544425', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(329, 1, 'Ruben Jacobs V', 'Mrs.', '130335318', '2021126375', 1, 0, 'Et.', 0, 'TR1505755111', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(330, 1, 'Juliana Weimann', 'Dani', '1735159560', '1517517177', 1, 0, 'Sint.', 0, 'TR221822021', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(331, 1, 'Gennaro Langosh', 'Abe ', '1205883518', '1047395718', 1, 0, 'Quam.', 0, 'TR1152389038', '2018-05-14 19:43:23', '2018-05-14 19:43:23'),
(332, 1, 'Jacinto Nicolas Jr.', 'Mrs.', '1593382157', '1793273429', 1, 0, 'Rem.', 0, 'TR425543445', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(333, 1, 'Delores Gaylord', 'Frie', '573983345', '364669036', 1, 0, 'Ipsa.', 0, 'TR906487384', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(334, 1, 'Mavis Schowalter', 'Este', '1472764141', '210863239', 1, 0, 'Et.', 0, 'TR2002877592', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(335, 1, 'Miss Carli Roob MD', 'Niko', '528053393', '1014318874', 1, 0, 'Eum.', 0, 'TR1818643309', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(336, 1, 'Mrs. Everette Schmidt III', 'Fran', '501369375', '708388622', 1, 0, 'Quo.', 0, 'TR2061632791', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(337, 1, 'Prof. Oswald Prohaska MD', 'Deio', '115196558', '2065814971', 1, 0, 'Non.', 0, 'TR1637768247', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(338, 1, 'Gaetano Schumm DVM', 'Prof', '1338682859', '342149618', 1, 0, 'Aut.', 0, 'TR1135088339', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(339, 1, 'Abelardo Ankunding PhD', 'Miss', '1168154169', '416730940', 1, 0, 'Ad.', 0, 'TR1642249305', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(340, 1, 'Demario Quitzon', 'Pier', '1166153781', '1950229130', 1, 0, 'Aut.', 0, 'TR1809607759', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(341, 1, 'Bud Morar PhD', 'Alec', '562298053', '1778829140', 1, 0, 'Et.', 0, 'TR1201380325', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(342, 1, 'Pablo Schroeder', 'Prof', '1600002467', '82000226', 1, 0, 'Aut.', 0, 'TR1746437004', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(343, 1, 'Dr. Luther Schneider Jr.', 'Miss', '327062341', '219365566', 1, 0, 'Sint.', 0, 'TR1324620848', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(344, 1, 'Ms. Adriana Aufderhar DDS', 'Dr. ', '1133962897', '1742542930', 1, 0, 'Et.', 0, 'TR1883962938', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(345, 1, 'Dr. Beth Graham', 'Miss', '1835267967', '772171638', 1, 0, 'Ut.', 0, 'TR2037286552', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(346, 1, 'Ida DuBuque', 'Dr. ', '251334083', '1078343214', 1, 0, 'Et.', 0, 'TR433091626', '2018-05-14 19:43:24', '2018-05-14 19:43:24'),
(347, 1, 'Flavio Stehr IV', 'Keat', '1872088771', '1993872534', 1, 0, 'Odit.', 0, 'TR1705150942', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(348, 1, 'Nyah Lebsack', 'Abra', '723226530', '91323355', 1, 0, 'Quia.', 0, 'TR1364511280', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(349, 1, 'Dr. Nestor Strosin I', 'Mr. ', '1449491303', '973260159', 1, 0, 'Sed.', 0, 'TR561171488', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(350, 1, 'Araceli Rau', 'Tyre', '1690967000', '1126127394', 1, 0, 'Ut.', 0, 'TR596267148', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(351, 1, 'Chelsey Windler', 'Marl', '738844408', '520208836', 1, 0, 'Sint.', 0, 'TR819892459', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(352, 1, 'Zoie Stroman', 'Agus', '1965338263', '457245955', 1, 0, 'Eius.', 0, 'TR369011697', '2018-05-14 19:43:25', '2018-05-14 19:43:25');
INSERT INTO `iys_company_list` (`id`, `account_id`, `company_name`, `company_short_name`, `char_code`, `tax_id`, `customer`, `supplier`, `tax_office`, `e_invoice_registered`, `iban`, `created_at`, `updated_at`) VALUES
(353, 1, 'Obie Herman', 'Prof', '814859925', '145349836', 1, 0, 'Esse.', 0, 'TR909750463', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(354, 1, 'Brenda Harvey', 'Stac', '964513359', '1185200055', 1, 0, 'Iure.', 0, 'TR87887790', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(355, 1, 'Chadrick Volkman', 'Ike ', '1318597669', '1894109007', 1, 0, 'Sunt.', 0, 'TR1856449904', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(356, 1, 'Prof. Macey Bosco PhD', 'Litz', '1660216044', '250593835', 1, 0, 'Quam.', 0, 'TR1064439197', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(357, 1, 'Adella Rolfson', 'Dr. ', '745623754', '2119425993', 1, 0, 'In.', 0, 'TR687476382', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(358, 1, 'Miss Mercedes West', 'Erne', '665292899', '1063009989', 1, 0, 'Vero.', 0, 'TR1461692520', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(359, 1, 'Trudie Kreiger', 'Jazm', '1539278811', '169726233', 1, 0, 'Aut.', 0, 'TR1894178262', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(360, 1, 'Jovani Jones', 'Grif', '1714047129', '320535681', 1, 0, 'Quo.', 0, 'TR1172131071', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(361, 1, 'Morgan Vandervort', 'Kayl', '1861298090', '261287629', 1, 0, 'Et.', 0, 'TR1260914226', '2018-05-14 19:43:25', '2018-05-14 19:43:25'),
(362, 1, 'Marge Murphy', 'Lisa', '204459064', '1254161301', 1, 0, 'Amet.', 0, 'TR1528749819', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(363, 1, 'Jesus Kshlerin', 'Edwi', '1777837356', '229890346', 1, 0, 'Rem.', 0, 'TR448987868', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(364, 1, 'Dr. Maia Effertz DVM', 'Rock', '259651993', '1277510290', 1, 0, 'Esse.', 0, 'TR1467866836', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(365, 1, 'Jennyfer West III', 'Amy ', '1914442273', '409783421', 1, 0, 'Quo.', 0, 'TR347795410', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(366, 1, 'Ms. Cathrine McCullough MD', 'Laur', '1344021409', '77825920', 1, 0, 'Qui.', 0, 'TR1270407459', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(367, 1, 'Obie King', 'Dr. ', '223691883', '1747719311', 1, 0, 'Eos.', 0, 'TR2108422659', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(368, 1, 'Luis Gleason', 'Audr', '1393270941', '1948209422', 1, 0, 'Quos.', 0, 'TR690247598', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(369, 1, 'Joelle Jerde', 'Dr. ', '1974639617', '841724008', 1, 0, 'Odio.', 0, 'TR1199414587', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(370, 1, 'May Braun', 'Kaci', '1417253822', '824356077', 1, 0, 'Fuga.', 0, 'TR1513659550', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(371, 1, 'Alvah Runolfsdottir', 'Hail', '441855499', '1547511882', 1, 0, 'Sunt.', 0, 'TR1184956990', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(372, 1, 'Prof. Prince Runolfsdottir', 'Rola', '682780452', '455441271', 1, 0, 'Quia.', 0, 'TR664458650', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(373, 1, 'Summer Wolff', 'Mrs.', '1650843872', '1841198554', 1, 0, 'Sed.', 0, 'TR548486004', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(374, 1, 'Ms. Clarissa Becker', 'Gage', '193326749', '993378305', 1, 0, 'Quo.', 0, 'TR688857537', '2018-05-14 19:43:26', '2018-05-14 19:43:26'),
(375, 1, 'Wendell Stiedemann', 'Chlo', '893680488', '2090986782', 1, 0, 'Non.', 0, 'TR2088822698', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(376, 1, 'Patrick Green', 'Dr. ', '1503422574', '691107935', 1, 0, 'Qui.', 0, 'TR934510698', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(377, 1, 'Jerrod Mann', 'Bail', '958571548', '1986757579', 1, 0, 'Ut.', 0, 'TR1756973258', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(378, 1, 'Joana Mann', 'Lue ', '433712932', '1260506853', 1, 0, 'Ut.', 0, 'TR416738463', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(379, 1, 'Prof. Aileen Runte', 'Grov', '1562529928', '870585999', 1, 0, 'Et.', 0, 'TR699232343', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(380, 1, 'Harley Rolfson', 'Olli', '738498448', '7356291', 1, 0, 'Aut.', 0, 'TR33869467', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(381, 1, 'Kendall Quitzon', 'Kari', '1279026834', '734155177', 1, 0, 'Non.', 0, 'TR1258931750', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(382, 1, 'Lenore Harvey', 'Aile', '534913548', '1247759862', 1, 0, 'Quia.', 0, 'TR1141559845', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(383, 1, 'Ms. Hailee Barton Jr.', 'Jord', '1828060914', '2127300760', 1, 0, 'Ut.', 0, 'TR1674362661', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(384, 1, 'Pietro Walsh II', 'Prof', '1975813014', '1451609861', 1, 0, 'Rem.', 0, 'TR231947102', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(385, 1, 'Mrs. Brigitte Kreiger', 'Adel', '351499320', '309283671', 1, 0, 'Et.', 0, 'TR1794818950', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(386, 1, 'Myrtice Quitzon', 'Prof', '538155279', '1499583555', 1, 0, 'Ea.', 0, 'TR844231248', '2018-05-14 19:43:27', '2018-05-14 19:43:27'),
(387, 1, 'Leonie Satterfield', 'Mrs.', '622197503', '1497664241', 1, 0, 'Aut.', 0, 'TR1402197386', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(388, 1, 'Carley Schuster II', 'Kels', '13183355', '1697167925', 1, 0, 'Quos.', 0, 'TR1224035998', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(389, 1, 'Christophe Reinger', 'Jerr', '1374591151', '1608764637', 1, 0, 'Est.', 0, 'TR12592275', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(390, 1, 'Aiyana Reichel V', 'Edmu', '580560837', '276598518', 1, 0, 'Enim.', 0, 'TR1765179939', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(391, 1, 'Verner Feest', 'Clyd', '1689748776', '2115995077', 1, 0, 'Vero.', 0, 'TR747300342', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(392, 1, 'Gerda Goodwin', 'Nige', '826039577', '679496746', 1, 0, 'Unde.', 0, 'TR239431834', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(393, 1, 'Mr. Adelbert Zemlak IV', 'Isid', '11030753', '1897215945', 1, 0, 'Quo.', 0, 'TR1974313074', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(394, 1, 'Trudie Mraz', 'Prof', '1983026564', '853810130', 1, 0, 'Nisi.', 0, 'TR208173444', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(395, 1, 'Jonathon Rau', 'Maym', '341479313', '923421224', 1, 0, 'Et.', 0, 'TR1431048085', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(396, 1, 'Mr. Efrain Heaney II', 'Lott', '1645075416', '415627103', 1, 0, 'Qui.', 0, 'TR630100353', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(397, 1, 'Vance Waelchi', 'Elia', '614898414', '842979104', 1, 0, 'Fuga.', 0, 'TR131378448', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(398, 1, 'Willard Gusikowski', 'Ms. ', '483183521', '1969865493', 1, 0, 'Sed.', 0, 'TR2031716590', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(399, 1, 'Mauricio Vandervort', 'Dema', '167008003', '160171662', 1, 0, 'Qui.', 0, 'TR1865526962', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(400, 1, 'Ceasar Windler', 'Bene', '1118578712', '1362936631', 1, 0, 'Aut.', 0, 'TR45857052', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(401, 1, 'Stephen D\'Amore', 'Amel', '941546994', '819567661', 1, 0, 'Ut.', 0, 'TR1466127022', '2018-05-14 19:43:28', '2018-05-14 19:43:28'),
(402, 1, 'Prof. Karine Cruickshank III', 'Bern', '574054462', '1665252925', 1, 0, 'Unde.', 0, 'TR2102135801', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(403, 1, 'Anjali Kulas', 'Neil', '425966218', '655176729', 1, 0, 'Eius.', 0, 'TR1809225208', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(404, 1, 'Alda Satterfield', 'Dr. ', '1266473063', '1460726929', 1, 0, 'Odit.', 0, 'TR2063077805', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(405, 1, 'Gabriel Kunde', 'Wilt', '178043609', '299143063', 1, 0, 'Ab.', 0, 'TR1233664440', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(406, 1, 'Mr. Kadin Nolan', 'Alic', '1421867452', '265534177', 1, 0, 'Quo.', 0, 'TR1972788747', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(407, 1, 'Gwen Reynolds', 'Oran', '804363785', '1637971564', 1, 0, 'Et.', 0, 'TR1489516484', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(408, 1, 'Doyle Green', 'Kelv', '1511852508', '2133831175', 1, 0, 'Vero.', 0, 'TR989270076', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(409, 1, 'Maryam Huel', 'Abig', '90602709', '990374237', 1, 0, 'Et.', 0, 'TR1592249602', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(410, 1, 'Prof. Gladyce Wuckert II', 'Jude', '698634287', '255197221', 1, 0, 'Qui.', 0, 'TR958119142', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(411, 1, 'Mrs. Johanna Wolff', 'Mr. ', '895546307', '1098067268', 1, 0, 'Et.', 0, 'TR824874248', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(412, 1, 'Mr. Javier Mueller I', 'Dr. ', '1428784526', '655956311', 1, 0, 'Quia.', 0, 'TR2133913011', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(413, 1, 'Jazlyn Grady', 'Orio', '1364284776', '135887589', 1, 0, 'Iste.', 0, 'TR1000506273', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(414, 1, 'Dr. Harrison Leffler', 'Cara', '1263405517', '272775809', 1, 0, 'Id.', 0, 'TR412455201', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(415, 1, 'Constantin Quitzon', 'Jack', '1689717349', '453620826', 1, 0, 'Est.', 0, 'TR971018125', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(416, 1, 'Nicola Labadie', 'Hann', '687414201', '1498449504', 1, 0, 'In.', 0, 'TR902842383', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(417, 1, 'Miss Lori Nitzsche', 'Lave', '1138294088', '663970428', 1, 0, 'Qui.', 0, 'TR1275568478', '2018-05-14 19:43:29', '2018-05-14 19:43:29'),
(418, 1, 'Heath Welch', 'Ms. ', '567457824', '301990123', 1, 0, 'Sit.', 0, 'TR988228555', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(419, 1, 'Cleora Lindgren', 'Flor', '2028316555', '1719485205', 1, 0, 'Et.', 0, 'TR1229847624', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(420, 1, 'Gregorio Wunsch', 'Jett', '1107104044', '1431128025', 1, 0, 'Qui.', 0, 'TR122006117', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(421, 1, 'Miss Maryse Robel I', 'Dr. ', '387485849', '1147073780', 1, 0, 'Et.', 0, 'TR1741363126', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(422, 1, 'Patricia Schultz', 'Bria', '1885160117', '1373708731', 1, 0, 'Ut.', 0, 'TR1346616291', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(423, 1, 'Dr. Madelynn Hilll', 'Elmo', '1966523154', '46039626', 1, 0, 'Eos.', 0, 'TR242077203', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(424, 1, 'Savannah Rowe III', 'Dr. ', '2084642724', '293892283', 1, 0, 'Nisi.', 0, 'TR1874536076', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(425, 1, 'Gerson Muller', 'Less', '1912185118', '2008179417', 1, 0, 'Nisi.', 0, 'TR1925557821', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(426, 1, 'Easton Hegmann', 'Ryan', '274028787', '1640737893', 1, 0, 'Et.', 0, 'TR1618938130', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(427, 1, 'Alena Mraz', 'Prof', '133111884', '788552361', 1, 0, 'Sed.', 0, 'TR626329627', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(428, 1, 'Kathryne Ondricka II', 'Prof', '1854913722', '2024958233', 1, 0, 'Sit.', 0, 'TR1494145956', '2018-05-14 19:43:30', '2018-05-14 19:43:30'),
(429, 1, 'Ms. Dawn Smith I', 'Prof', '1741045124', '658833503', 1, 0, 'Sed.', 0, 'TR1515134656', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(430, 1, 'Dr. Milo Mann II', 'Mrs.', '69501629', '930712530', 1, 0, 'Aut.', 0, 'TR1390095559', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(431, 1, 'Dr. Kylie Ruecker DVM', 'Mara', '165226507', '1255700710', 1, 0, 'Sed.', 0, 'TR1771525876', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(432, 1, 'Mr. Donald Barrows', 'Prof', '101025035', '286588155', 1, 0, 'Sint.', 0, 'TR1019188573', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(433, 1, 'Prof. Urban Ebert V', 'Prof', '1632658108', '6941848', 1, 0, 'Ut.', 0, 'TR1903865606', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(434, 1, 'Miss Hettie Goldner PhD', 'Solo', '1500436086', '987178061', 1, 0, 'Ut.', 0, 'TR1324724367', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(435, 1, 'Prof. Abdullah Torphy', 'Mrs.', '1190454264', '216055343', 1, 0, 'Qui.', 0, 'TR1988646341', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(436, 1, 'Prof. Keyshawn Stark', 'Kip ', '1680247025', '929219360', 1, 0, 'Qui.', 0, 'TR327825524', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(437, 1, 'Turner Schmeler', 'Garr', '800659219', '1067847979', 1, 0, 'Est.', 0, 'TR1085521440', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(438, 1, 'Erin Gorczany', 'Jayd', '1273369895', '573232139', 1, 0, 'Aut.', 0, 'TR446111023', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(439, 1, 'Sid Turcotte', 'Prof', '2040991333', '1368634517', 1, 0, 'Quae.', 0, 'TR817361257', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(440, 1, 'Dr. Forrest Haag V', 'Alyc', '81456176', '961734365', 1, 0, 'Et.', 0, 'TR611494157', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(441, 1, 'Mr. Kristian Ankunding', 'Fred', '1946522785', '1784320595', 1, 0, 'A.', 0, 'TR1429408960', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(442, 1, 'Mr. Cordell Zieme DVM', 'Kayl', '649486143', '564022639', 1, 0, 'Et.', 0, 'TR387879891', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(443, 1, 'Mrs. Maybell Ortiz', 'Dr. ', '91671565', '1729591677', 1, 0, 'Et.', 0, 'TR343671325', '2018-05-14 19:43:31', '2018-05-14 19:43:31'),
(444, 1, 'Petra Crist', 'Donn', '769011936', '573473529', 1, 0, 'Sunt.', 0, 'TR877318319', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(445, 1, 'Ms. Mattie Kunde', 'Ila ', '852933311', '1308962525', 1, 0, 'Enim.', 0, 'TR883984519', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(446, 1, 'Marlen Considine Sr.', 'Nikk', '2007257183', '233235190', 1, 0, 'Eum.', 0, 'TR1112947097', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(447, 1, 'Jake Senger', 'Prof', '358955047', '1194434396', 1, 0, 'Eum.', 0, 'TR346434008', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(448, 1, 'Ozella Dibbert', 'Delo', '1798817464', '1715555335', 1, 0, 'Qui.', 0, 'TR1580925043', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(449, 1, 'Prof. Una Brekke', 'Hank', '1958145597', '1270555669', 1, 0, 'Est.', 0, 'TR1680927184', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(450, 1, 'Prof. Norberto Roberts Sr.', 'Juli', '1820374044', '325569877', 1, 0, 'Aut.', 0, 'TR481236057', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(451, 1, 'Duane Bartoletti', 'Zeld', '848254198', '1297441919', 1, 0, 'Et.', 0, 'TR1445847737', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(452, 1, 'Dulce Wolf', 'Dr. ', '1598233267', '111479194', 1, 0, 'Aut.', 0, 'TR555473503', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(453, 1, 'Collin Harvey DVM', 'Prof', '1360874077', '832153428', 1, 0, 'Iure.', 0, 'TR1015986388', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(454, 1, 'Theodore Dietrich', 'Brad', '1195660754', '2006224304', 1, 0, 'Et.', 0, 'TR376206518', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(455, 1, 'Trevor Toy IV', 'Izab', '312403839', '212277935', 1, 0, 'Ut.', 0, 'TR258531887', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(456, 1, 'Miss Una O\'Kon PhD', 'Enoc', '264653657', '314764318', 1, 0, 'Ipsa.', 0, 'TR740166495', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(457, 1, 'Mr. Jovanny Yundt Sr.', 'Jose', '1172272746', '1068370746', 1, 0, 'Id.', 0, 'TR252739990', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(458, 1, 'Theodore Armstrong', 'Olaf', '1830793707', '690782795', 1, 0, 'Sint.', 0, 'TR1557194724', '2018-05-14 19:43:32', '2018-05-14 19:43:32'),
(459, 1, 'Prof. Ethel Johnston V', 'Flor', '1251890710', '1798069816', 1, 0, 'Vel.', 0, 'TR1433519317', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(460, 1, 'Felix McLaughlin', 'Sydn', '1683162249', '1977375542', 1, 0, 'Aut.', 0, 'TR1529095272', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(461, 1, 'Vidal Thiel PhD', 'Albe', '295596841', '429869853', 1, 0, 'Eius.', 0, 'TR1027506453', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(462, 1, 'Prof. Lorine Cormier Jr.', 'Mari', '250956600', '10386896', 1, 0, 'Sed.', 0, 'TR46915545', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(463, 1, 'Hugh Altenwerth', 'Dell', '1864646309', '1812175535', 1, 0, 'Qui.', 0, 'TR1908481445', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(464, 1, 'Carlotta Zboncak II', 'Andr', '1342295641', '2081015767', 1, 0, 'Ea.', 0, 'TR120863658', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(465, 1, 'Eloy Treutel', 'Minn', '43662021', '1673023624', 1, 0, 'Aut.', 0, 'TR604492309', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(466, 1, 'Vida Thiel', 'Prof', '1462740015', '1101696179', 1, 0, 'Vero.', 0, 'TR938102250', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(467, 1, 'Ken Waelchi Sr.', 'Uria', '686799940', '492358134', 1, 0, 'Ad.', 0, 'TR136886650', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(468, 1, 'Lyric Herzog', 'Miss', '385047934', '662213497', 1, 0, 'Vero.', 0, 'TR352360798', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(469, 1, 'Prof. Andres Klein PhD', 'Zech', '1501126161', '146271024', 1, 0, 'Ad.', 0, 'TR2005506772', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(470, 1, 'Mrs. Norene Buckridge', 'Bail', '486235470', '1195553002', 1, 0, 'In.', 0, 'TR1040428095', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(471, 1, 'Hayden Wehner', 'Jami', '84725254', '1175454376', 1, 0, 'A.', 0, 'TR50505676', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(472, 1, 'Shayna Streich III', 'Toma', '530149058', '162759334', 1, 0, 'Nisi.', 0, 'TR701788320', '2018-05-14 19:43:33', '2018-05-14 19:43:33'),
(473, 1, 'Georgiana Metz V', 'Dolo', '854872235', '2078543638', 1, 0, 'Modi.', 0, 'TR1730674477', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(474, 1, 'Jackie Paucek', 'Mand', '1140823623', '1865877020', 1, 0, 'Eos.', 0, 'TR1583792305', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(475, 1, 'Mrs. Mellie Barrows', 'Dr. ', '293558755', '908563587', 1, 0, 'Et.', 0, 'TR1896005994', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(476, 1, 'Marjory Welch', 'Dr. ', '396461497', '1820427645', 1, 0, 'Quia.', 0, 'TR1591790340', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(477, 1, 'Marlen Carter IV', 'Dean', '805430068', '1189882250', 1, 0, 'Eos.', 0, 'TR672844138', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(478, 1, 'Gerardo Schulist', 'Kara', '2026956509', '1500820847', 1, 0, 'Quo.', 0, 'TR1765799182', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(479, 1, 'Estevan Stoltenberg', 'Dr. ', '789430654', '349357712', 1, 0, 'Et.', 0, 'TR584476021', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(480, 1, 'Lisette Conroy', 'Oren', '602925900', '1567598110', 1, 0, 'Sit.', 0, 'TR1040149292', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(481, 1, 'Nicolette Thiel', 'Raym', '641526429', '1419230936', 1, 0, 'Qui.', 0, 'TR349009881', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(482, 1, 'Jaiden Kassulke', 'Veld', '721009783', '4944624', 1, 0, 'Ea.', 0, 'TR1728618748', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(483, 1, 'Dr. Lindsey Hintz', 'Euge', '506015925', '876894365', 1, 0, 'Enim.', 0, 'TR1669323097', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(484, 1, 'Monserrat Bode', 'Prof', '231636961', '670857680', 1, 0, 'Non.', 0, 'TR1440146500', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(485, 1, 'Kallie Ledner', 'Trem', '1136109233', '521305970', 1, 0, 'Sed.', 0, 'TR608392599', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(486, 1, 'Ms. Shania Batz', 'Addi', '738672178', '1308644873', 1, 0, 'Amet.', 0, 'TR212568696', '2018-05-14 19:43:34', '2018-05-14 19:43:34'),
(487, 1, 'Ricardo Feil', 'Mr. ', '1541120045', '93442992', 1, 0, 'Id.', 0, 'TR383892544', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(488, 1, 'Osvaldo Torp', 'Shak', '1101164211', '1332666310', 1, 0, 'Enim.', 0, 'TR435085278', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(489, 1, 'Mr. Evan Grant', 'Luci', '1010527116', '1710251696', 1, 0, 'Unde.', 0, 'TR274587411', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(490, 1, 'Mr. Lisandro Williamson Sr.', 'Alex', '90964815', '897021163', 1, 0, 'Quo.', 0, 'TR54566095', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(491, 1, 'Dr. Josefa Spencer', 'Jess', '1261221293', '48097229', 1, 0, 'Aut.', 0, 'TR91700496', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(492, 1, 'Lavonne Crist', 'Orph', '950250539', '951033075', 1, 0, 'Nam.', 0, 'TR158888184', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(493, 1, 'Mrs. Vita Rice', 'Sam ', '928401632', '34099121', 1, 0, 'Et.', 0, 'TR529088657', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(494, 1, 'Alba Balistreri', 'Madd', '714017972', '619285073', 1, 0, 'Qui.', 0, 'TR1599733099', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(495, 1, 'Prof. Delbert Hauck', 'Tone', '936720468', '932952998', 1, 0, 'Est.', 0, 'TR457908609', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(496, 1, 'Dr. Roel Moen PhD', 'Juli', '530755819', '142551529', 1, 0, 'Unde.', 0, 'TR1520455289', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(497, 1, 'Mrs. Emely Murray III', 'Raul', '1643515158', '934521997', 1, 0, 'Ea.', 0, 'TR446272405', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(498, 1, 'Hollis Eichmann II', 'Ben ', '1569381308', '1264436759', 1, 0, 'Ea.', 0, 'TR500596308', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(499, 1, 'Miss Palma Berge', 'Elta', '1052561206', '1883383007', 1, 0, 'Id.', 0, 'TR1383573068', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(500, 1, 'Mortimer Quigley', 'Titu', '1791627966', '1737313569', 1, 0, 'Id.', 0, 'TR804509797', '2018-05-14 19:43:35', '2018-05-14 19:43:35'),
(501, 1, 'tester345', NULL, NULL, NULL, 0, 0, NULL, 0, NULL, '2018-05-21 04:18:04', '2018-05-21 04:18:04'),
(502, 1, 'kaptan kazaki', NULL, NULL, NULL, 0, 0, NULL, 0, NULL, '2018-05-21 04:20:22', '2018-05-21 04:20:22'),
(503, 1, 'kamil kazı kazan', NULL, NULL, NULL, 0, 0, NULL, 0, NULL, '2018-05-21 04:34:41', '2018-05-21 04:34:41'),
(504, 1, 'yeni', 'yeni', 'yeni', NULL, 0, 0, NULL, 0, NULL, '2018-05-21 04:36:20', '2018-05-21 04:36:20'),
(505, 1, 'etetetetete', 'etetetet', 'etetet', NULL, 0, 0, NULL, 0, NULL, '2018-05-21 04:37:23', '2018-05-21 04:37:23'),
(506, 1, 'yeni müşteri', NULL, NULL, NULL, 0, 0, NULL, 0, NULL, '2018-05-21 10:37:54', '2018-05-21 10:37:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_counties`
--

CREATE TABLE `iys_counties` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `county` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_counties`
--

INSERT INTO `iys_counties` (`id`, `province_id`, `county`) VALUES
(897, 1, 'Aladağ'),
(898, 1, 'Ceyhan'),
(899, 1, 'Çukurova'),
(900, 1, 'Feke'),
(901, 1, 'İmamoğlu'),
(902, 1, 'Karaisalı'),
(903, 1, 'Karataş'),
(904, 1, 'Kozan'),
(905, 1, 'Pozantı'),
(906, 1, 'Saimbeyli'),
(907, 1, 'Sarıçam'),
(908, 1, 'Seyhan'),
(909, 1, 'Tufanbeyli'),
(910, 1, 'Yumurtalık'),
(911, 1, 'Yüreğir'),
(912, 2, 'Besni'),
(913, 2, 'Çelikhan'),
(914, 2, 'Gerger'),
(915, 2, 'Gölbaşı'),
(916, 2, 'Kahta'),
(917, 2, 'Merkez'),
(918, 2, 'Samsat'),
(919, 2, 'Sincik'),
(920, 2, 'Tut'),
(921, 3, 'Başmakçı'),
(922, 3, 'Bayat'),
(923, 3, 'Bolvadin'),
(924, 3, 'Çay'),
(925, 3, 'Çobanlar'),
(926, 3, 'Dazkırı'),
(927, 3, 'Dinar'),
(928, 3, 'Emirdağ'),
(929, 3, 'Evciler'),
(930, 3, 'Hocalar'),
(931, 3, 'İhsaniye'),
(932, 3, 'İscehisar'),
(933, 3, 'Kızılören'),
(934, 3, 'Sandıklı'),
(935, 3, 'Sinanpaşa'),
(936, 3, 'Sultandağı'),
(937, 3, 'Şuhut'),
(938, 4, 'Diyadin'),
(939, 4, 'Doğubayazıt'),
(940, 4, 'Eleşkirt'),
(941, 4, 'Hamur'),
(942, 4, 'Patnos'),
(943, 4, 'Taşlıçay'),
(944, 4, 'Tutak'),
(945, 5, 'Ağaçören'),
(946, 5, 'Eskil'),
(947, 5, 'Gülağaç'),
(948, 5, 'Güzelyurt'),
(949, 5, 'Ortaköy'),
(950, 5, 'Sarıyahşi'),
(951, 6, 'Göynücek'),
(952, 6, 'Gümüşhacıköy'),
(953, 6, 'Hamamözü'),
(954, 6, 'Merzifon'),
(955, 6, 'Suluova'),
(956, 6, 'Taşova'),
(957, 7, 'Akyurt'),
(958, 7, 'Altındağ'),
(959, 7, 'Ayaş'),
(960, 7, 'Bala'),
(961, 7, 'Beypazarı'),
(962, 7, 'Çamlıdere'),
(963, 7, 'Çankaya'),
(964, 7, 'Çubuk'),
(965, 7, 'Elmadağ'),
(966, 7, 'Etimesgut'),
(967, 7, 'Evren'),
(968, 7, 'Güdül'),
(969, 7, 'Haymana'),
(970, 7, 'Kalecik'),
(971, 7, 'Kazan'),
(972, 7, 'Keçiören'),
(973, 7, 'Kızılcahamam'),
(974, 7, 'Mamak'),
(975, 7, 'Nallıhan'),
(976, 7, 'Polatlı'),
(977, 7, 'Pursaklar'),
(978, 7, 'Sincan'),
(979, 7, 'Şereflikoçhisar'),
(980, 7, 'Yenimahalle'),
(981, 8, 'Akseki'),
(982, 8, 'Aksu'),
(983, 8, 'Alanya'),
(984, 8, 'Demre'),
(985, 8, 'Döşemealtı'),
(986, 8, 'Elmalı'),
(987, 8, 'Finike'),
(988, 8, 'Gazipaşa'),
(989, 8, 'Gündoğmuş'),
(990, 8, 'İbradı'),
(991, 8, 'Kaş'),
(992, 8, 'Kemer'),
(993, 8, 'Kepez'),
(994, 8, 'Konyaaltı'),
(995, 8, 'Korkuteli'),
(996, 8, 'Kumluca'),
(997, 8, 'Manavgat'),
(998, 8, 'Muratpaşa'),
(999, 8, 'Serik'),
(1000, 9, 'Çıldır'),
(1001, 9, 'Damal'),
(1002, 9, 'Göle'),
(1003, 9, 'Hanak'),
(1004, 9, 'Posof'),
(1005, 10, 'Ardanuç'),
(1006, 10, 'Arhavi'),
(1007, 10, 'Borçka'),
(1008, 10, 'Hopa'),
(1009, 10, 'Murgul'),
(1010, 10, 'Şavşat'),
(1011, 10, 'Yusufeli'),
(1012, 11, 'Bozdoğan'),
(1013, 11, 'Buharkent'),
(1014, 11, 'Çine'),
(1015, 11, 'Didim'),
(1016, 11, 'Efeler'),
(1017, 11, 'Germencik'),
(1018, 11, 'İncirliova'),
(1019, 11, 'Karacasu'),
(1020, 11, 'Karpuzlu'),
(1021, 11, 'Koçarlı'),
(1022, 11, 'Köşk'),
(1023, 11, 'Kuşadası'),
(1024, 11, 'Kuyucak'),
(1025, 11, 'Nazilli'),
(1026, 11, 'Söke'),
(1027, 11, 'Sultanhisar'),
(1028, 11, 'Yenipazar'),
(1029, 12, 'Altıeylül'),
(1030, 12, 'Ayvalık'),
(1031, 12, 'Balya'),
(1032, 12, 'Bandırma'),
(1033, 12, 'Bigadiç'),
(1034, 12, 'Burhaniye'),
(1035, 12, 'Dursunbey'),
(1036, 12, 'Edremit'),
(1037, 12, 'Erdek'),
(1038, 12, 'Gömeç'),
(1039, 12, 'Gönen'),
(1040, 12, 'Havran'),
(1041, 12, 'İvrindi'),
(1042, 12, 'Karesi'),
(1043, 12, 'Kepsut'),
(1044, 12, 'Manyas'),
(1045, 12, 'Marmara'),
(1046, 12, 'Savaştepe'),
(1047, 12, 'Sındırgı'),
(1048, 12, 'Susurluk'),
(1049, 13, 'Amasra'),
(1050, 13, 'Kurucaşile'),
(1051, 13, 'Ulus'),
(1052, 14, 'Beşiri'),
(1053, 14, 'Gercüş'),
(1054, 14, 'Hasankeyf'),
(1055, 14, 'Kozluk'),
(1056, 14, 'Sason'),
(1057, 15, 'Aydıntepe'),
(1058, 15, 'Demirözü'),
(1059, 16, 'Bozüyük'),
(1060, 16, 'Gölpazarı'),
(1061, 16, 'İnhisar'),
(1062, 16, 'Osmaneli'),
(1063, 16, 'Pazaryeri'),
(1064, 16, 'Söğüt'),
(1065, 17, 'Adaklı'),
(1066, 17, 'Genç'),
(1067, 17, 'Karlıova'),
(1068, 17, 'Kiğı'),
(1069, 17, 'Solhan'),
(1070, 17, 'Yayladere'),
(1071, 17, 'Yedisu'),
(1072, 18, 'Adilcevaz'),
(1073, 18, 'Ahlat'),
(1074, 18, 'Güroymak'),
(1075, 18, 'Hizan'),
(1076, 18, 'Mutki'),
(1077, 18, 'Tatvan'),
(1078, 19, 'Dörtdivan'),
(1079, 19, 'Gerede'),
(1080, 19, 'Göynük'),
(1081, 19, 'Kıbrıscık'),
(1082, 19, 'Mengen'),
(1083, 19, 'Mudurnu'),
(1084, 19, 'Seben'),
(1085, 19, 'Yeniçağa'),
(1086, 20, 'Ağlasun'),
(1087, 20, 'Altınyayla'),
(1088, 20, 'Bucak'),
(1089, 20, 'Çavdır'),
(1090, 20, 'Çeltikçi'),
(1091, 20, 'Gölhisar'),
(1092, 20, 'Karamanlı'),
(1093, 20, 'Tefenni'),
(1094, 20, 'Yeşilova'),
(1095, 21, 'Büyükorhan'),
(1096, 21, 'Gemlik'),
(1097, 21, 'Gürsu'),
(1098, 21, 'Harmancık'),
(1099, 21, 'İnegöl'),
(1100, 21, 'İznik'),
(1101, 21, 'Karacabey'),
(1102, 21, 'Keles'),
(1103, 21, 'Kestel'),
(1104, 21, 'Mudanya'),
(1105, 21, 'Mustafakemalpaşa'),
(1106, 21, 'Nilüfer'),
(1107, 21, 'Orhaneli'),
(1108, 21, 'Orhangazi'),
(1109, 21, 'Osmangazi'),
(1110, 21, 'Yenişehir'),
(1111, 21, 'Yıldırım'),
(1112, 22, 'Ayvacık'),
(1113, 22, 'Bayramiç'),
(1114, 22, 'Biga'),
(1115, 22, 'Bozcaada'),
(1116, 22, 'Çan'),
(1117, 22, 'Eceabat'),
(1118, 22, 'Ezine'),
(1119, 22, 'Gelibolu'),
(1120, 22, 'Gökçeada'),
(1121, 22, 'Lapseki'),
(1122, 22, 'Yenice'),
(1123, 23, 'Atkaracalar'),
(1124, 23, 'Bayramören'),
(1125, 23, 'Çerkeş'),
(1126, 23, 'Eldivan'),
(1127, 23, 'Ilgaz'),
(1128, 23, 'Kızılırmak'),
(1129, 23, 'Korgun'),
(1130, 23, 'Kurşunlu'),
(1131, 23, 'Orta'),
(1132, 23, 'Şabanözü'),
(1133, 23, 'Yapraklı'),
(1134, 24, 'Alaca'),
(1135, 24, 'Boğazkale'),
(1136, 24, 'Dodurga'),
(1137, 24, 'İskilip'),
(1138, 24, 'Kargı'),
(1139, 24, 'Laçin'),
(1140, 24, 'Mecitözü'),
(1141, 24, 'Oğuzlar'),
(1142, 24, 'Osmancık'),
(1143, 24, 'Sungurlu'),
(1144, 24, 'Uğurludağ'),
(1145, 25, 'Acıpayam'),
(1146, 25, 'Babadağ'),
(1147, 25, 'Baklan'),
(1148, 25, 'Bekilli'),
(1149, 25, 'Beyağaç'),
(1150, 25, 'Bozkurt'),
(1151, 25, 'Buldan'),
(1152, 25, 'Çal'),
(1153, 25, 'Çameli'),
(1154, 25, 'Çardak'),
(1155, 25, 'Çivril'),
(1156, 25, 'Güney'),
(1157, 25, 'Honaz'),
(1158, 25, 'Kale'),
(1159, 25, 'Merkezefendi'),
(1160, 25, 'Pamukkale'),
(1161, 25, 'Sarayköy'),
(1162, 25, 'Serinhisar'),
(1163, 25, 'Tavas'),
(1164, 26, 'Bağlar'),
(1165, 26, 'Bismil'),
(1166, 26, 'Çermik'),
(1167, 26, 'Çınar'),
(1168, 26, 'Çüngüş'),
(1169, 26, 'Dicle'),
(1170, 26, 'Eğil'),
(1171, 26, 'Ergani'),
(1172, 26, 'Hani'),
(1173, 26, 'Hazro'),
(1174, 26, 'Kayapınar'),
(1175, 26, 'Kocaköy'),
(1176, 26, 'Kulp'),
(1177, 26, 'Lice'),
(1178, 26, 'Silvan'),
(1179, 26, 'Sur'),
(1180, 27, 'Akçakoca'),
(1181, 27, 'Cumayeri'),
(1182, 27, 'Çilimli'),
(1183, 27, 'Gölyaka'),
(1184, 27, 'Gümüşova'),
(1185, 27, 'Kaynaşlı'),
(1186, 27, 'Yığılca'),
(1187, 28, 'Enez'),
(1188, 28, 'Havsa'),
(1189, 28, 'İpsala'),
(1190, 28, 'Keşan'),
(1191, 28, 'Lalapaşa'),
(1192, 28, 'Meriç'),
(1193, 28, 'Süloğlu'),
(1194, 28, 'Uzunköprü'),
(1195, 29, 'Ağın'),
(1196, 29, 'Alacakaya'),
(1197, 29, 'Arıcak'),
(1198, 29, 'Baskil'),
(1199, 29, 'Karakoçan'),
(1200, 29, 'Keban'),
(1201, 29, 'Kovancılar'),
(1202, 29, 'Maden'),
(1203, 29, 'Palu'),
(1204, 29, 'Sivrice'),
(1205, 30, 'Çayırlı'),
(1206, 30, 'İliç'),
(1207, 30, 'Kemah'),
(1208, 30, 'Kemaliye'),
(1209, 30, 'Otlukbeli'),
(1210, 30, 'Refahiye'),
(1211, 30, 'Tercan'),
(1212, 30, 'Üzümlü'),
(1213, 31, 'Aşkale'),
(1214, 31, 'Aziziye'),
(1215, 31, 'Çat'),
(1216, 31, 'Hınıs'),
(1217, 31, 'Horasan'),
(1218, 31, 'İspir'),
(1219, 31, 'Karaçoban'),
(1220, 31, 'Karayazı'),
(1221, 31, 'Köprüköy'),
(1222, 31, 'Narman'),
(1223, 31, 'Oltu'),
(1224, 31, 'Olur'),
(1225, 31, 'Palandöken'),
(1226, 31, 'Pasinler'),
(1227, 31, 'Pazaryolu'),
(1228, 31, 'Şenkaya'),
(1229, 31, 'Tekman'),
(1230, 31, 'Tortum'),
(1231, 31, 'Uzundere'),
(1232, 31, 'Yakutiye'),
(1233, 32, 'Alpu'),
(1234, 32, 'Beylikova'),
(1235, 32, 'Çifteler'),
(1236, 32, 'Günyüzü'),
(1237, 32, 'Han'),
(1238, 32, 'İnönü'),
(1239, 32, 'Mahmudiye'),
(1240, 32, 'Mihalgazi'),
(1241, 32, 'Mihalıççık'),
(1242, 32, 'Odunpazarı'),
(1243, 32, 'Sarıcakaya'),
(1244, 32, 'Seyitgazi'),
(1245, 32, 'Sivrihisar'),
(1246, 32, 'Tepebaşı'),
(1247, 33, 'Araban'),
(1248, 33, 'İslahiye'),
(1249, 33, 'Karkamış'),
(1250, 33, 'Nizip'),
(1251, 33, 'Nurdağı'),
(1252, 33, 'Oğuzeli'),
(1253, 33, 'Şahinbey'),
(1254, 33, 'Şehitkamil'),
(1255, 33, 'Yavuzeli'),
(1256, 34, 'Alucra'),
(1257, 34, 'Bulancak'),
(1258, 34, 'Çamoluk'),
(1259, 34, 'Çanakçı'),
(1260, 34, 'Dereli'),
(1261, 34, 'Doğankent'),
(1262, 34, 'Espiye'),
(1263, 34, 'Eynesil'),
(1264, 34, 'Görele'),
(1265, 34, 'Güce'),
(1266, 34, 'Keşap'),
(1267, 34, 'Piraziz'),
(1268, 34, 'Şebinkarahisar'),
(1269, 34, 'Tirebolu'),
(1270, 34, 'Yağlıdere'),
(1271, 35, 'Kelkit'),
(1272, 35, 'Köse'),
(1273, 35, 'Kürtün'),
(1274, 35, 'Şiran'),
(1275, 35, 'Torul'),
(1276, 36, 'Çukurca'),
(1277, 36, 'Şemdinli'),
(1278, 36, 'Yüksekova'),
(1279, 37, 'Altınözü'),
(1280, 37, 'Antakya'),
(1281, 37, 'Arsuz'),
(1282, 37, 'Belen'),
(1283, 37, 'Defne'),
(1284, 37, 'Dörtyol'),
(1285, 37, 'Erzin'),
(1286, 37, 'Hassa'),
(1287, 37, 'İskenderun'),
(1288, 37, 'Kırıkhan'),
(1289, 37, 'Kumlu'),
(1290, 37, 'Payas'),
(1291, 37, 'Reyhanlı'),
(1292, 37, 'Samandağ'),
(1293, 37, 'Yayladağı'),
(1294, 38, 'Aralık'),
(1295, 38, 'Karakoyunlu'),
(1296, 38, 'Tuzluca'),
(1297, 39, 'Atabey'),
(1298, 39, 'Eğirdir'),
(1299, 39, 'Gelendost'),
(1300, 39, 'Keçiborlu'),
(1301, 39, 'Senirkent'),
(1302, 39, 'Sütçüler'),
(1303, 39, 'Şarkikaraağaç'),
(1304, 39, 'Uluborlu'),
(1305, 39, 'Yalvaç'),
(1306, 39, 'Yenişarbademli'),
(1307, 40, 'Adalar'),
(1308, 40, 'Arnavutköy'),
(1309, 40, 'Ataşehir'),
(1310, 40, 'Avcılar'),
(1311, 40, 'Bağcılar'),
(1312, 40, 'Bahçelievler'),
(1313, 40, 'Bakırköy'),
(1314, 40, 'Başakşehir'),
(1315, 40, 'Bayrampaşa'),
(1316, 40, 'Beşiktaş'),
(1317, 40, 'Beykoz'),
(1318, 40, 'Beylikdüzü'),
(1319, 40, 'Beyoğlu'),
(1320, 40, 'Büyükçekmece'),
(1321, 40, 'Çatalca'),
(1322, 40, 'Çekmeköy'),
(1323, 40, 'Esenler'),
(1324, 40, 'Esenyurt'),
(1325, 40, 'Eyüp'),
(1326, 40, 'Fatih'),
(1327, 40, 'Gaziosmanpaşa'),
(1328, 40, 'Güngören'),
(1329, 40, 'Kadıköy'),
(1330, 40, 'Kağıthane'),
(1331, 40, 'Kartal'),
(1332, 40, 'Küçükçekmece'),
(1333, 40, 'Maltepe'),
(1334, 40, 'Pendik'),
(1335, 40, 'Sancaktepe'),
(1336, 40, 'Sarıyer'),
(1337, 40, 'Silivri'),
(1338, 40, 'Sultanbeyli'),
(1339, 40, 'Sultangazi'),
(1340, 40, 'Şile'),
(1341, 40, 'Şişli'),
(1342, 40, 'Tuzla'),
(1343, 40, 'Ümraniye'),
(1344, 40, 'Üsküdar'),
(1345, 40, 'Zeytinburnu'),
(1346, 41, 'Aliağa'),
(1347, 41, 'Balçova'),
(1348, 41, 'Bayındır'),
(1349, 41, 'Bayraklı'),
(1350, 41, 'Bergama'),
(1351, 41, 'Beydağ'),
(1352, 41, 'Bornova'),
(1353, 41, 'Buca'),
(1354, 41, 'Çeşme'),
(1355, 41, 'Çiğli'),
(1356, 41, 'Dikili'),
(1357, 41, 'Foça'),
(1358, 41, 'Gaziemir'),
(1359, 41, 'Güzelbahçe'),
(1360, 41, 'Karabağlar'),
(1361, 41, 'Karaburun'),
(1362, 41, 'Karşıyaka'),
(1363, 41, 'Kemalpaşa'),
(1364, 41, 'Kınık'),
(1365, 41, 'Kiraz'),
(1366, 41, 'Konak'),
(1367, 41, 'Menderes'),
(1368, 41, 'Menemen'),
(1369, 41, 'Narlıdere'),
(1370, 41, 'Ödemiş'),
(1371, 41, 'Seferihisar'),
(1372, 41, 'Selçuk'),
(1373, 41, 'Tire'),
(1374, 41, 'Torbalı'),
(1375, 41, 'Urla'),
(1376, 42, 'Afşin'),
(1377, 42, 'Andırın'),
(1378, 42, 'Çağlayancerit'),
(1379, 42, 'Dulkadiroğlu'),
(1380, 42, 'Ekinözü'),
(1381, 42, 'Elbistan'),
(1382, 42, 'Göksun'),
(1383, 42, 'Nurhak'),
(1384, 42, 'Onikişubat'),
(1385, 42, 'Pazarcık'),
(1386, 42, 'Türkoğlu'),
(1387, 43, 'Eflani'),
(1388, 43, 'Eskipazar'),
(1389, 43, 'Ovacık'),
(1390, 43, 'Safranbolu'),
(1391, 44, 'Ayrancı'),
(1392, 44, 'Başyayla'),
(1393, 44, 'Ermenek'),
(1394, 44, 'Kazımkarabekir'),
(1395, 44, 'Sarıveliler'),
(1396, 45, 'Akyaka'),
(1397, 45, 'Arpaçay'),
(1398, 45, 'Digor'),
(1399, 45, 'Kağızman'),
(1400, 45, 'Sarıkamış'),
(1401, 45, 'Selim'),
(1402, 45, 'Susuz'),
(1403, 46, 'Abana'),
(1404, 46, 'Ağlı'),
(1405, 46, 'Araç'),
(1406, 46, 'Azdavay'),
(1407, 46, 'Cide'),
(1408, 46, 'Çatalzeytin'),
(1409, 46, 'Daday'),
(1410, 46, 'Devrekani'),
(1411, 46, 'Doğanyurt'),
(1412, 46, 'Hanönü'),
(1413, 46, 'İhsangazi'),
(1414, 46, 'İnebolu'),
(1415, 46, 'Küre'),
(1416, 46, 'Pınarbaşı'),
(1417, 46, 'Seydiler'),
(1418, 46, 'Şenpazar'),
(1419, 46, 'Taşköprü'),
(1420, 46, 'Tosya'),
(1421, 47, 'Akkışla'),
(1422, 47, 'Bünyan'),
(1423, 47, 'Develi'),
(1424, 47, 'Felahiye'),
(1425, 47, 'Hacılar'),
(1426, 47, 'İncesu'),
(1427, 47, 'Kocasinan'),
(1428, 47, 'Melikgazi'),
(1429, 47, 'Özvatan'),
(1430, 47, 'Sarıoğlan'),
(1431, 47, 'Sarız'),
(1432, 47, 'Talas'),
(1433, 47, 'Tomarza'),
(1434, 47, 'Yahyalı'),
(1435, 47, 'Yeşilhisar'),
(1436, 48, 'Bahşili'),
(1437, 48, 'Balışeyh'),
(1438, 48, 'Çelebi'),
(1439, 48, 'Delice'),
(1440, 48, 'Karakeçili'),
(1441, 48, 'Keskin'),
(1442, 48, 'Sulakyurt'),
(1443, 48, 'Yahşihan'),
(1444, 49, 'Babaeski'),
(1445, 49, 'Demirköy'),
(1446, 49, 'Kofçaz'),
(1447, 49, 'Lüleburgaz'),
(1448, 49, 'Pehlivanköy'),
(1449, 49, 'Pınarhisar'),
(1450, 49, 'Vize'),
(1451, 50, 'Akçakent'),
(1452, 50, 'Akpınar'),
(1453, 50, 'Boztepe'),
(1454, 50, 'Çiçekdağı'),
(1455, 50, 'Kaman'),
(1456, 50, 'Mucur'),
(1457, 51, 'Elbeyli'),
(1458, 51, 'Musabeyli'),
(1459, 51, 'Polateli'),
(1460, 52, 'Başiskele'),
(1461, 52, 'Çayırova'),
(1462, 52, 'Darıca'),
(1463, 52, 'Derince'),
(1464, 52, 'Dilovası'),
(1465, 52, 'Gebze'),
(1466, 52, 'Gölcük'),
(1467, 52, 'İzmit'),
(1468, 52, 'Kandıra'),
(1469, 52, 'Karamürsel'),
(1470, 52, 'Kartepe'),
(1471, 52, 'Körfez'),
(1472, 53, 'Ahırlı'),
(1473, 53, 'Akören'),
(1474, 53, 'Akşehir'),
(1475, 53, 'Altınekin'),
(1476, 53, 'Beyşehir'),
(1477, 53, 'Bozkır'),
(1478, 53, 'Cihanbeyli'),
(1479, 53, 'Çeltik'),
(1480, 53, 'Çumra'),
(1481, 53, 'Derbent'),
(1482, 53, 'Derebucak'),
(1483, 53, 'Doğanhisar'),
(1484, 53, 'Emirgazi'),
(1485, 53, 'Ereğli'),
(1486, 53, 'Güneysınır'),
(1487, 53, 'Hadim'),
(1488, 53, 'Halkapınar'),
(1489, 53, 'Hüyük'),
(1490, 53, 'Ilgın'),
(1491, 53, 'Kadınhanı'),
(1492, 53, 'Karapınar'),
(1493, 53, 'Karatay'),
(1494, 53, 'Kulu'),
(1495, 53, 'Meram'),
(1496, 53, 'Sarayönü'),
(1497, 53, 'Selçuklu'),
(1498, 53, 'Seydişehir'),
(1499, 53, 'Taşkent'),
(1500, 53, 'Tuzlukçu'),
(1501, 53, 'Yalıhüyük'),
(1502, 53, 'Yunak'),
(1503, 54, 'Altıntaş'),
(1504, 54, 'Aslanapa'),
(1505, 54, 'Çavdarhisar'),
(1506, 54, 'Domaniç'),
(1507, 54, 'Dumlupınar'),
(1508, 54, 'Emet'),
(1509, 54, 'Gediz'),
(1510, 54, 'Hisarcık'),
(1511, 54, 'Pazarlar'),
(1512, 54, 'Simav'),
(1513, 54, 'Şaphane'),
(1514, 54, 'Tavşanlı'),
(1515, 55, 'Akçadağ'),
(1516, 55, 'Arapgir'),
(1517, 55, 'Arguvan'),
(1518, 55, 'Battalgazi'),
(1519, 55, 'Darende'),
(1520, 55, 'Doğanşehir'),
(1521, 55, 'Doğanyol'),
(1522, 55, 'Hekimhan'),
(1523, 55, 'Kuluncak'),
(1524, 55, 'Pütürge'),
(1525, 55, 'Yazıhan'),
(1526, 55, 'Yeşilyurt'),
(1527, 56, 'Ahmetli'),
(1528, 56, 'Akhisar'),
(1529, 56, 'Alaşehir'),
(1530, 56, 'Demirci'),
(1531, 56, 'Gölmarmara'),
(1532, 56, 'Gördes'),
(1533, 56, 'Kırkağaç'),
(1534, 56, 'Köprübaşı'),
(1535, 56, 'Kula'),
(1536, 56, 'Salihli'),
(1537, 56, 'Sarıgöl'),
(1538, 56, 'Saruhanlı'),
(1539, 56, 'Selendi'),
(1540, 56, 'Soma'),
(1541, 56, 'Şehzadeler'),
(1542, 56, 'Turgutlu'),
(1543, 56, 'Yunusemre'),
(1544, 57, 'Artuklu'),
(1545, 57, 'Dargeçit'),
(1546, 57, 'Derik'),
(1547, 57, 'Kızıltepe'),
(1548, 57, 'Mazıdağı'),
(1549, 57, 'Midyat'),
(1550, 57, 'Nusaybin'),
(1551, 57, 'Ömerli'),
(1552, 57, 'Savur'),
(1553, 57, 'Yeşilli'),
(1554, 58, 'Akdeniz'),
(1555, 58, 'Anamur'),
(1556, 58, 'Aydıncık'),
(1557, 58, 'Bozyazı'),
(1558, 58, 'Çamlıyayla'),
(1559, 58, 'Erdemli'),
(1560, 58, 'Gülnar'),
(1561, 58, 'Mezitli'),
(1562, 58, 'Mut'),
(1563, 58, 'Silifke'),
(1564, 58, 'Tarsus'),
(1565, 58, 'Toroslar'),
(1566, 59, 'Bodrum'),
(1567, 59, 'Dalaman'),
(1568, 59, 'Datça'),
(1569, 59, 'Fethiye'),
(1570, 59, 'Kavaklıdere'),
(1571, 59, 'Köyceğiz'),
(1572, 59, 'Marmaris'),
(1573, 59, 'Menteşe'),
(1574, 59, 'Milas'),
(1575, 59, 'Ortaca'),
(1576, 59, 'Seydikemer'),
(1577, 59, 'Ula'),
(1578, 59, 'Yatağan'),
(1579, 60, 'Bulanık'),
(1580, 60, 'Hasköy'),
(1581, 60, 'Korkut'),
(1582, 60, 'Malazgirt'),
(1583, 60, 'Varto'),
(1584, 61, 'Acıgöl'),
(1585, 61, 'Avanos'),
(1586, 61, 'Derinkuyu'),
(1587, 61, 'Gülşehir'),
(1588, 61, 'Hacıbektaş'),
(1589, 61, 'Kozaklı'),
(1590, 61, 'Ürgüp'),
(1591, 62, 'Altunhisar'),
(1592, 62, 'Bor'),
(1593, 62, 'Çamardı'),
(1594, 62, 'Çiftlik'),
(1595, 62, 'Ulukışla'),
(1596, 63, 'Akkuş'),
(1597, 63, 'Altınordu'),
(1598, 63, 'Aybastı'),
(1599, 63, 'Çamaş'),
(1600, 63, 'Çatalpınar'),
(1601, 63, 'Çaybaşı'),
(1602, 63, 'Fatsa'),
(1603, 63, 'Gölköy'),
(1604, 63, 'Gülyalı'),
(1605, 63, 'Gürgentepe'),
(1606, 63, 'İkizce'),
(1607, 63, 'Kabadüz'),
(1608, 63, 'Kabataş'),
(1609, 63, 'Korgan'),
(1610, 63, 'Kumru'),
(1611, 63, 'Mesudiye'),
(1612, 63, 'Perşembe'),
(1613, 63, 'Ulubey'),
(1614, 63, 'Ünye'),
(1615, 64, 'Bahçe'),
(1616, 64, 'Düziçi'),
(1617, 64, 'Hasanbeyli'),
(1618, 64, 'Kadirli'),
(1619, 64, 'Sumbas'),
(1620, 64, 'Toprakkale'),
(1621, 65, 'Ardeşen'),
(1622, 65, 'Çamlıhemşin'),
(1623, 65, 'Çayeli'),
(1624, 65, 'Derepazarı'),
(1625, 65, 'Fındıklı'),
(1626, 65, 'Güneysu'),
(1627, 65, 'Hemşin'),
(1628, 65, 'İkizdere'),
(1629, 65, 'İyidere'),
(1630, 65, 'Kalkandere'),
(1631, 65, 'Pazar'),
(1632, 66, 'Adapazarı'),
(1633, 66, 'Akyazı'),
(1634, 66, 'Arifiye'),
(1635, 66, 'Erenler'),
(1636, 66, 'Ferizli'),
(1637, 66, 'Geyve'),
(1638, 66, 'Hendek'),
(1639, 66, 'Karapürçek'),
(1640, 66, 'Karasu'),
(1641, 66, 'Kaynarca'),
(1642, 66, 'Kocaali'),
(1643, 66, 'Pamukova'),
(1644, 66, 'Sapanca'),
(1645, 66, 'Serdivan'),
(1646, 66, 'Söğütlü'),
(1647, 66, 'Taraklı'),
(1648, 67, '42143'),
(1649, 67, 'Alaçam'),
(1650, 67, 'Asarcık'),
(1651, 67, 'Atakum'),
(1652, 67, 'Bafra'),
(1653, 67, 'Canik'),
(1654, 67, 'Çarşamba'),
(1655, 67, 'Havza'),
(1656, 67, 'İlkadım'),
(1657, 67, 'Kavak'),
(1658, 67, 'Ladik'),
(1659, 67, 'Salıpazarı'),
(1660, 67, 'Tekkeköy'),
(1661, 67, 'Terme'),
(1662, 67, 'Vezirköprü'),
(1663, 67, 'Yakakent'),
(1664, 68, 'Baykan'),
(1665, 68, 'Eruh'),
(1666, 68, 'Kurtalan'),
(1667, 68, 'Pervari'),
(1668, 68, 'Şirvan'),
(1669, 68, 'Tillo'),
(1670, 69, 'Ayancık'),
(1671, 69, 'Boyabat'),
(1672, 69, 'Dikmen'),
(1673, 69, 'Durağan'),
(1674, 69, 'Erfelek'),
(1675, 69, 'Gerze'),
(1676, 69, 'Saraydüzü'),
(1677, 69, 'Türkeli'),
(1678, 70, 'Akıncılar'),
(1679, 70, 'Divriği'),
(1680, 70, 'Doğanşar'),
(1681, 70, 'Gemerek'),
(1682, 70, 'Gölova'),
(1683, 70, 'Gürün'),
(1684, 70, 'Hafik'),
(1685, 70, 'İmranlı'),
(1686, 70, 'Kangal'),
(1687, 70, 'Koyulhisar'),
(1688, 70, 'Suşehri'),
(1689, 70, 'Şarkışla'),
(1690, 70, 'Ulaş'),
(1691, 70, 'Yıldızeli'),
(1692, 70, 'Zara'),
(1693, 71, 'Akçakale'),
(1694, 71, 'Birecik'),
(1695, 71, 'Bozova'),
(1696, 71, 'Ceylanpınar'),
(1697, 71, 'Eyyübiye'),
(1698, 71, 'Halfeti'),
(1699, 71, 'Haliliye'),
(1700, 71, 'Harran'),
(1701, 71, 'Hilvan'),
(1702, 71, 'Karaköprü'),
(1703, 71, 'Siverek'),
(1704, 71, 'Suruç'),
(1705, 71, 'Viranşehir'),
(1706, 72, 'Beytüşşebap'),
(1707, 72, 'Cizre'),
(1708, 72, 'Güçlükonak'),
(1709, 72, 'İdil'),
(1710, 72, 'Silopi'),
(1711, 72, 'Uludere'),
(1712, 73, 'Çerkezköy'),
(1713, 73, 'Çorlu'),
(1714, 73, 'Ergene'),
(1715, 73, 'Hayrabolu'),
(1716, 73, 'Kapaklı'),
(1717, 73, 'Malkara'),
(1718, 73, 'Marmaraereğlisi'),
(1719, 73, 'Muratlı'),
(1720, 73, 'Saray'),
(1721, 73, 'Süleymanpaşa'),
(1722, 73, 'Şarköy'),
(1723, 74, 'Almus'),
(1724, 74, 'Artova'),
(1725, 74, 'Başçiftlik'),
(1726, 74, 'Erbaa'),
(1727, 74, 'Niksar'),
(1728, 74, 'Reşadiye'),
(1729, 74, 'Sulusaray'),
(1730, 74, 'Turhal'),
(1731, 74, 'Zile'),
(1732, 75, 'Akçaabat'),
(1733, 75, 'Araklı'),
(1734, 75, 'Arsin'),
(1735, 75, 'Beşikdüzü'),
(1736, 75, 'Çarşıbaşı'),
(1737, 75, 'Çaykara'),
(1738, 75, 'Dernekpazarı'),
(1739, 75, 'Düzköy'),
(1740, 75, 'Hayrat'),
(1741, 75, 'Maçka'),
(1742, 75, 'Of'),
(1743, 75, 'Ortahisar'),
(1744, 75, 'Sürmene'),
(1745, 75, 'Şalpazarı'),
(1746, 75, 'Tonya'),
(1747, 75, 'Vakfıkebir'),
(1748, 75, 'Yomra'),
(1749, 76, 'Çemişgezek'),
(1750, 76, 'Hozat'),
(1751, 76, 'Mazgirt'),
(1752, 76, 'Nazımiye'),
(1753, 76, 'Pertek'),
(1754, 76, 'Pülümür'),
(1755, 77, 'Banaz'),
(1756, 77, 'Eşme'),
(1757, 77, 'Karahallı'),
(1758, 77, 'Sivaslı'),
(1759, 78, 'Bahçesaray'),
(1760, 78, 'Başkale'),
(1761, 78, 'Çaldıran'),
(1762, 78, 'Çatak'),
(1763, 78, 'Erciş'),
(1764, 78, 'Gevaş'),
(1765, 78, 'Gürpınar'),
(1766, 78, 'İpekyolu'),
(1767, 78, 'Muradiye'),
(1768, 78, 'Özalp'),
(1769, 78, 'Tuşba'),
(1770, 79, 'Altınova'),
(1771, 79, 'Armutlu'),
(1772, 79, 'Çınarcık'),
(1773, 79, 'Çiftlikköy'),
(1774, 79, 'Termal'),
(1775, 80, 'Akdağmadeni'),
(1776, 80, 'Boğazlıyan'),
(1777, 80, 'Çandır'),
(1778, 80, 'Çayıralan'),
(1779, 80, 'Çekerek'),
(1780, 80, 'Kadışehri'),
(1781, 80, 'Saraykent'),
(1782, 80, 'Sarıkaya'),
(1783, 80, 'Sorgun'),
(1784, 80, 'Şefaatli'),
(1785, 80, 'Yenifakılı'),
(1786, 80, 'Yerköy'),
(1787, 81, 'Alaplı'),
(1788, 81, 'Çaycuma'),
(1789, 81, 'Devrek'),
(1790, 81, 'Gökçebey'),
(1791, 81, 'Kilimli'),
(1792, 81, 'Kozlu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_currencies`
--

CREATE TABLE `iys_currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_currencies`
--

INSERT INTO `iys_currencies` (`id`, `icon`, `code`, `name`, `desc`) VALUES
(1, '₺', 'TRY', 'Türk Lirası', 'Türkiye Para Birimi'),
(2, '$', 'USD', 'Dolar', 'Amerika Birleşik Devletler Para birimi'),
(3, '€', 'EUR', 'Euro', 'Avrupa Para Birimi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_images`
--

CREATE TABLE `iys_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_images`
--

INSERT INTO `iys_images` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, '42bb5baa3e019c3ca585d353e09f57652950f957.gif', 'product', '2018-05-15 14:21:42', '2018-05-15 14:21:42'),
(2, '265c2d08fa168c23684f86c271adc046aee06bb2.png', 'product', '2018-05-17 17:57:51', '2018-05-17 17:57:51'),
(3, '12decc4932ccc8ec41818d4e124be2a2b452aaf8.jpeg', 'product', '2018-05-17 17:57:54', '2018-05-17 17:57:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_language_lines`
--

CREATE TABLE `iys_language_lines` (
  `id` int(10) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_language_lines`
--

INSERT INTO `iys_language_lines` (`id`, `group`, `key`, `text`, `created_at`, `updated_at`) VALUES
(1, 'general', 'customer', '{\"en\":\"Customer\",\"tr\":\"M\\u00fc\\u015fteri\"}', '2018-04-30 13:11:12', '2018-04-30 13:11:12'),
(2, 'general', 'name', '{\"en\":\"Name\",\"tr\":\"Ad\\u0131\"}', '2018-04-30 13:11:36', '2018-04-30 13:11:36'),
(3, 'general', 'short', '{\"en\":\"Short\",\"tr\":\"K\\u0131sa\"}', '2018-04-30 13:12:37', '2018-04-30 13:12:37'),
(4, 'general', 'save', '{\"en\":\"Save\",\"tr\":\"Kaydet\"}', '2018-05-03 04:46:19', '2018-05-03 04:46:19'),
(5, 'general', 'back', '{\"en\":\"Back\",\"tr\":\"Geri\"}', '2018-05-03 04:46:59', '2018-05-03 04:46:59'),
(6, 'general', 'product', '{\"en\":\"Product\",\"tr\":\"\\u00dcr\\u00fcn\"}', '2018-05-05 08:09:31', '2018-05-05 08:09:31'),
(7, 'general', 'barcode', '{\"en\":\"Barcode\",\"tr\":\"Barkot\"}', '2018-05-05 08:43:44', '2018-05-05 08:43:44'),
(8, 'general', 'code', '{\"en\":\"Code\",\"tr\":\"Kod\"}', '2018-05-05 08:44:54', '2018-05-05 08:44:54'),
(9, 'general', 'category', '{\"en\":\"Category\",\"tr\":\"Kategori\"}', '2018-05-05 08:49:01', '2018-05-05 08:49:01'),
(10, 'general', 'unit', '{\"en\":\"Unit\",\"tr\":\"Birim\"}', '2018-05-05 08:49:20', '2018-05-05 08:49:20'),
(11, 'general', 'description', '{\"en\":\"Description\",\"tr\":\"A\\u00e7\\u0131klama\"}', '2018-05-17 15:19:07', '2018-05-17 15:19:07'),
(12, 'general', 'supplier', '{\"en\":\"Supplier\",\"tr\":\"Tedarik\\u00e7i\"}', '2018-05-17 15:19:52', '2018-05-17 15:19:52'),
(13, 'general', 'supplier', '{\"en\":\"Supplier\",\"tr\":\"Tedarik\\u00e7i\"}', '2018-05-17 19:32:18', '2018-05-17 19:32:18'),
(14, 'general', 'account', '{\"en\":\"Account\",\"tr\":\"Hesap\"}', '2018-05-21 16:52:50', '2018-05-21 16:52:50'),
(15, 'general', 'edit', '{\"en\":\"Edit\",\"tr\":\"D\\u00fczenle\"}', '2018-05-22 14:17:55', '2018-05-22 14:17:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_list_sectors`
--

CREATE TABLE `iys_list_sectors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_list_sectors`
--

INSERT INTO `iys_list_sectors` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Retail', '2018-03-23 19:33:32', '2018-03-23 19:33:32', NULL),
(2, 'Wholesale', '2018-03-23 19:33:32', '2018-03-23 19:33:32', NULL),
(3, 'Production', '2018-03-23 19:33:32', '2018-03-23 19:33:32', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_menus`
--

CREATE TABLE `iys_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `permission` int(11) NOT NULL DEFAULT '1',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'list',
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_route` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_menus`
--

INSERT INTO `iys_menus` (`id`, `parent_id`, `group`, `order`, `permission`, `icon`, `route`, `is_route`) VALUES
(1, NULL, 'dashboard', 1, 2, 'dashboard', 'dashboard', 1),
(2, NULL, 'tasks', 2, 2, 'tasks', '', 0),
(3, NULL, 'sales', 3, 2, 'money', '', 0),
(4, 3, 'sales', 4, 2, 'list', '', 0),
(5, 3, 'sales', 5, 2, 'list', '', 0),
(6, 3, 'sales', 6, 2, 'list', 'sales.companies.customer', 1),
(7, 3, 'sales', 7, 2, 'list', '', 0),
(8, 3, 'sales', 8, 2, 'list', '', 0),
(9, NULL, 'purchase', 9, 2, 'shopping-cart', '', 0),
(10, 9, 'purchase', 10, 2, 'list', '', 0),
(11, 9, 'purchase', 11, 2, 'list', '', 0),
(12, 9, 'purchase', 12, 2, 'list', '', 0),
(13, 9, 'purchase', 13, 2, 'list', '', 0),
(14, 9, 'purchase', 14, 2, 'list', '', 0),
(15, NULL, 'finance', 15, 2, 'bar-chart-o', '', 0),
(16, 15, 'finance', 16, 2, 'list', '', 0),
(17, 15, 'finance', 17, 2, 'list', 'finance.accounts.index', 1),
(18, 15, 'finance', 18, 2, 'list', '', 0),
(19, 15, 'finance', 19, 2, 'list', '', 0),
(20, 15, 'finance', 20, 2, 'list', '', 0),
(21, NULL, 'stock', 21, 2, 'table', '', 0),
(22, 21, 'stock', 22, 2, 'list', 'stock.index', 1),
(23, 21, 'stock', 23, 2, 'list', 'stock.movements.index', 1),
(24, 21, 'stock', 24, 2, 'list', '', 0),
(25, NULL, NULL, 1, 1, 'cog', '', 0),
(26, 25, NULL, 2, 1, 'list', 'admin.menu.index', 1),
(27, NULL, NULL, 3, 1, 'building', '', 0),
(28, 27, NULL, 4, 1, 'building', 'companies.index', 1),
(29, 27, NULL, 5, 1, 'users', 'admin.users.index', 1),
(30, NULL, NULL, 6, 1, 'language', 'admin.locale.index', 1),
(31, NULL, NULL, 25, 2, 'trash-o', 'data.delete', 1),
(32, NULL, 'settings', 26, 2, 'cogs', 'settings.units.index', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_menu_descriptions`
--

CREATE TABLE `iys_menu_descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_menu_descriptions`
--

INSERT INTO `iys_menu_descriptions` (`id`, `lang_code`, `menu_id`, `name`) VALUES
(1, 'en', 1, 'Dashboard'),
(2, 'en', 2, 'Tasks'),
(3, 'en', 3, 'Sales'),
(4, 'en', 4, 'Offers'),
(5, 'en', 5, 'Orders'),
(6, 'en', 6, 'Customers'),
(7, 'en', 7, 'Sales Report'),
(8, 'en', 8, 'Collect Reports'),
(9, 'en', 9, 'Purchases'),
(10, 'en', 10, 'Offers'),
(11, 'en', 11, 'Orders'),
(12, 'en', 12, 'Suppliers'),
(13, 'en', 13, 'Purchase Report'),
(14, 'en', 14, 'Payment Report'),
(15, 'en', 15, 'Finance'),
(16, 'en', 16, 'Expense'),
(17, 'en', 17, 'Accounts'),
(18, 'en', 18, 'Check Bond'),
(19, 'en', 19, 'Expenses Report'),
(20, 'en', 20, 'VAT Reports'),
(21, 'en', 21, 'Stocks'),
(22, 'en', 22, 'Services And Products'),
(23, 'en', 23, 'Stock Movements'),
(24, 'en', 24, 'Products in Stock'),
(25, 'en', 25, 'Settings'),
(26, 'en', 26, 'Menus'),
(27, 'en', 27, 'Companies & Users'),
(28, 'en', 28, 'Company List'),
(29, 'en', 29, 'User List'),
(30, 'en', 30, 'Localization'),
(31, 'tr', 1, 'Gösterge Paneli'),
(32, 'tr', 2, 'İş Listesi'),
(33, 'tr', 3, 'Satış'),
(34, 'tr', 4, 'Teklifler'),
(35, 'tr', 5, 'Siparişler'),
(36, 'tr', 6, 'Müşteriler'),
(37, 'tr', 7, 'Satış Raporu'),
(38, 'tr', 8, 'Tahsilat Raporu'),
(39, 'tr', 9, 'Satın Alma'),
(40, 'tr', 10, 'Teklifler'),
(41, 'tr', 11, 'Siparişler'),
(42, 'tr', 12, 'Tedarikçiler'),
(43, 'tr', 13, 'Satınalma Raporu'),
(44, 'tr', 14, 'Ödeme Raporu'),
(45, 'tr', 15, 'Finans'),
(46, 'tr', 16, 'Harcamalar'),
(47, 'tr', 17, 'Hesaplar'),
(48, 'tr', 18, 'Çek Senet'),
(49, 'tr', 19, 'Gider Raporu'),
(50, 'tr', 20, 'KDV Raporu'),
(51, 'tr', 21, 'Stok'),
(52, 'tr', 22, 'Hizmetler ve Ürünler'),
(53, 'tr', 23, 'Stok Hareketleri'),
(54, 'tr', 24, 'Stoktaki Ürünler Raporu'),
(55, '', 0, ''),
(57, '', 0, ''),
(58, 'en', 31, 'Data Delete'),
(59, 'en', 32, 'Settings');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_migrations`
--

CREATE TABLE `iys_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_migrations`
--

INSERT INTO `iys_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_02_25_101254_create_app_languages_table', 1),
(2, '2014_02_26_182259_create_roles_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_02_24_221002_create_list_sectors_table', 1),
(6, '2018_02_24_221425_create_app_accounts_table', 1),
(7, '2018_02_27_202040_create_modules_table', 1),
(8, '2018_02_27_202203_create_permissions_table', 1),
(9, '2018_02_27_202233_create_user_permissions_table', 1),
(16, '2018_03_03_212952_create_company_contact_list_table', 1),
(17, '2018_03_12_112024_create_menus_table', 1),
(18, '2018_03_12_112105_create_menu_descriptions_table', 1),
(19, '2018_04_16_101006_create_language_lines_table', 2),
(20, '2018_04_17_110604_add_menus_column', 3),
(83, '2018_03_03_150332_create_products_table', 4),
(84, '2018_04_25_071935_create_cities_table', 4),
(85, '2018_04_25_072026_create_counties_table', 4),
(86, '2018_04_30_094000_company_list', 4),
(87, '2018_04_30_094427_company_addresses_table', 4),
(88, '2018_05_02_124846_create_tags_table', 4),
(89, '2018_05_02_141942_create_tag_datas_table', 4),
(90, '2018_05_09_082713_create_units_table', 4),
(91, '2018_05_09_084435_create_account_units_table', 4),
(92, '2018_05_10_065338_create_categories_table', 4),
(93, '2018_05_10_091551_create_barcodes_table', 4),
(94, '2018_05_11_070123_create_currencies_table', 4),
(95, '2018_05_11_095351_create_images_table', 4),
(96, '2018_05_11_095528_create_product_images_table', 4),
(97, '2018_05_14_150316_create_product_descriptions_table', 4),
(108, '2018_05_16_132022_create_stocks_table', 5),
(109, '2018_05_17_104713_create_stock_items_table', 5),
(115, '2018_05_21_091033_create_bank_accounts_table', 6),
(116, '2018_05_21_111638_create_bank_items_table', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_modules`
--

CREATE TABLE `iys_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_modules`
--

INSERT INTO `iys_modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'company profile', '2018-03-23 19:33:32', '2018-03-23 19:33:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_password_resets`
--

CREATE TABLE `iys_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_permissions`
--

CREATE TABLE `iys_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_permissions`
--

INSERT INTO `iys_permissions` (`id`, `module_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'No Access', '2018-03-23 19:33:32', '2018-03-23 19:33:32'),
(2, 1, 'View Only', '2018-03-23 19:33:32', '2018-03-23 19:33:32'),
(3, 1, 'Full Access View / Edit', '2018-03-23 19:33:32', '2018-03-23 19:33:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_products`
--

CREATE TABLE `iys_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_rate` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `archived` tinyint(1) DEFAULT NULL,
  `inventory_tracking` tinyint(1) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buying_price` decimal(10,2) DEFAULT NULL,
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_products`
--

INSERT INTO `iys_products` (`id`, `code`, `type_id`, `vat_rate`, `unit_id`, `category_id`, `archived`, `inventory_tracking`, `currency`, `buying_currency`, `buying_price`, `account_id`, `list_price`, `created_at`, `updated_at`) VALUES
(6, '00001', '3', 18, 1, 2, 0, 0, '1', '1', '0.00', 1, '0.00', '2018-05-14 20:23:59', '2018-05-15 14:21:30'),
(8, '002', '3', 18, 20, 2, 0, 0, '1', '3', '4500.00', 1, '0.00', '2018-05-15 11:04:13', '2018-05-15 16:28:38'),
(9, NULL, '2', 8, 36, NULL, 0, 0, '1', '1', '0.00', 1, '65.00', '2018-05-15 15:32:24', '2018-05-15 16:34:49'),
(11, NULL, '1', 0, 20, NULL, 0, 0, '1', '1', '13.00', 1, '0.00', '2018-05-15 16:29:16', '2018-05-15 16:31:21'),
(12, NULL, '1', 18, 20, NULL, 0, 0, '1', '1', '13.00', 1, '0.00', '2018-05-15 16:31:52', '2018-05-15 16:32:12'),
(13, '003', '3', 1, 20, NULL, 0, 0, '1', '1', '0.00', 1, '0.00', '2018-05-15 16:36:24', '2018-05-15 16:36:24'),
(14, '001', '1', 8, 26, 4, 0, 0, '1', '1', '0.00', 1, '0.00', '2018-05-15 16:37:37', '2018-05-21 01:01:03'),
(17, NULL, '3', NULL, 1, NULL, 0, 0, '1', '1', '0.00', 1, '0.00', '2018-05-15 16:41:53', '2018-05-15 16:41:53'),
(18, NULL, '3', 1, 1, 1, 0, 0, '1', '1', '0.00', 1, '0.00', '2018-05-16 12:24:49', '2018-05-16 12:24:49'),
(19, NULL, '3', 0, 1, NULL, 0, 0, '1', '1', '0.00', 1, '0.00', '2018-05-16 16:43:31', '2018-05-16 16:43:31'),
(20, NULL, '3', 1, 1, 2, 0, 0, '1', '2', '1800.00', 1, '2950.00', '2018-05-17 14:16:06', '2018-05-17 14:17:15'),
(21, NULL, '3', 1, 1, NULL, 0, 0, '1', '1', '0.00', 1, '0.00', '2018-05-21 11:52:11', '2018-05-21 11:52:11'),
(22, NULL, '3', 1, 1, NULL, 0, 0, '1', '1', '0.00', 1, '0.00', '2018-05-21 11:52:11', '2018-05-21 11:52:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_product_descriptions`
--

CREATE TABLE `iys_product_descriptions` (
  `product_id` int(11) NOT NULL,
  `lang_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_product_descriptions`
--

INSERT INTO `iys_product_descriptions` (`product_id`, `lang_code`, `name`) VALUES
(4, 'tr', 'türkçe adı'),
(5, 'tr', 'ÜRÜN ADI'),
(5, 'us', 'PRODUCT'),
(7, 'us', 'PRODUCT'),
(7, 'tr', 'ÜRÜN TÜRKÇE'),
(6, 'tr', 'KALEM'),
(6, 'us', 'PENCIL'),
(10, 'tr', 'ANTEP FISTIĞI (250gr Paket)'),
(8, 'us', 'BOZ PISTACIO 1'),
(8, 'tr', 'BOZ İÇ 1'),
(11, 'tr', 'YAŞ KIRMIZI FISTIK'),
(12, 'tr', 'YAŞ BOZ FISTIK'),
(9, 'tr', 'SİYAH NUBUK AYAKKABI'),
(13, 'tr', 'MEVERDİ İŞ SIRA'),
(15, 'tr', 'sadasdasd'),
(16, 'tr', 'asdasdasdasd'),
(17, 'tr', 'tester'),
(18, 'tr', 'testere'),
(19, 'tr', 'asdasdasd'),
(20, 'tr', 'Test ürünü'),
(6, 'sa', 'arapça kalem'),
(14, 'tr', 'NUBUK DERİ'),
(21, 'tr', 'sss'),
(22, 'tr', 'sss');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_product_images`
--

CREATE TABLE `iys_product_images` (
  `account_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_product_images`
--

INSERT INTO `iys_product_images` (`account_id`, `product_id`, `image_id`) VALUES
(1, 6, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_roles`
--

CREATE TABLE `iys_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_roles`
--

INSERT INTO `iys_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2018-03-23 19:33:31', '2018-03-23 19:33:31'),
(2, 'Account owner', '2018-03-23 19:33:31', '2018-03-23 19:33:31'),
(3, 'User', '2018-03-23 19:33:31', '2018-03-23 19:33:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_stock_items`
--

CREATE TABLE `iys_stock_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `stock_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `quantity` decimal(12,2) NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_stock_items`
--

INSERT INTO `iys_stock_items` (`id`, `stock_id`, `product_id`, `unit_id`, `quantity`, `notes`) VALUES
(42, 24, 6, 1, '3230000.00', NULL),
(44, 24, 9, 1, '4500.00', NULL),
(45, 25, 11, 1, '25.00', NULL),
(46, 26, 9, 1, '1.00', NULL),
(48, 25, 13, 1, '1.00', NULL),
(49, 27, 6, 1, '50.00', NULL),
(50, 28, 9, 1, '1.00', NULL),
(51, 29, 14, 1, '1.00', NULL),
(52, 30, 12, 1, '1.00', NULL),
(53, 31, 11, 1, '1.00', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_stock_receipts`
--

CREATE TABLE `iys_stock_receipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `doc_id` int(11) DEFAULT NULL COMMENT 'Satış Faturası,Alış Faturası vb..',
  `status` int(11) NOT NULL COMMENT '0-Giriş 1-Çıkış',
  `receipt_id` int(11) DEFAULT NULL COMMENT 'Fiş Türleri -> Giriş İrsaliyesi > Çıkış İrsaliyesi',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_stock_receipts`
--

INSERT INTO `iys_stock_receipts` (`id`, `account_id`, `company_id`, `doc_id`, `status`, `receipt_id`, `description`, `date`, `created_at`, `updated_at`) VALUES
(24, 1, 115, 0, 1, 1, 'tester', '2018-05-19', '2018-05-19 17:25:24', '2018-05-19 18:03:38'),
(25, 1, 73, 0, 1, 2, 'ttesadasd', '2018-05-19', '2018-05-19 18:50:58', '2018-05-19 18:50:58'),
(26, 1, NULL, 0, 1, 1, 'sayım fazlası', '2018-05-19', '2018-05-19 19:12:54', '2018-05-20 00:48:09'),
(27, 1, 109, 0, 1, NULL, NULL, '2018-05-19', '2018-05-20 01:38:07', '2018-05-20 01:38:07'),
(28, 1, 15, 0, 1, NULL, NULL, '2018-05-20', '2018-05-21 01:07:50', '2018-05-21 01:07:50'),
(29, 1, NULL, 0, 1, NULL, 'yeni kayıt', '2018-05-20', '2018-05-21 01:19:51', '2018-05-21 01:37:34'),
(30, 1, 502, 0, 1, NULL, 'testere', '2018-05-21', '2018-05-21 04:20:33', '2018-05-21 04:20:33'),
(31, 1, 501, 0, 1, 1, NULL, '2018-05-21', '2018-05-21 15:54:42', '2018-05-21 15:54:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_tags`
--

CREATE TABLE `iys_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'kullanılan alan tipi ex:customer',
  `bg_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_tag_datas`
--

CREATE TABLE `iys_tag_datas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_units`
--

CREATE TABLE `iys_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0-Negative 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_units`
--

INSERT INTO `iys_units` (`id`, `name`, `short_name`, `type`, `status`) VALUES
(1, 'ADET', 'ADET', 'Miktar', 1),
(2, 'KOLİ', 'KOLİ', 'Miktar', 1),
(3, 'PALET', 'PALET', 'Miktar', 1),
(4, 'KAMYON', 'KAMYON', 'Miktar', 1),
(5, 'KONTEYNIR', 'KONTEYNIR', 'Miktar', 1),
(6, 'PAKET', 'PAKET', 'Miktar', 1),
(7, 'POŞET', 'POŞET', 'Miktar', 1),
(8, 'FİLE', 'FİLE', 'Miktar', 1),
(9, 'ÇUVAL', 'ÇUVAL', 'Miktar', 1),
(10, 'SANDIK', 'SANDIK', 'Miktar', 1),
(11, 'SANİYE', 'SANİYE', 'Zaman', 1),
(12, 'DAKİKA', 'DAKİKA', 'Zaman', 1),
(13, 'SAAT', 'SAAT', 'Zaman', 1),
(14, 'GÜN', 'GÜN', 'Zaman', 1),
(15, 'HAFTA', 'HAFTA', 'Zaman', 1),
(16, 'AY', 'AY', 'Zaman', 1),
(17, 'YIL', 'YIL', 'Zaman', 1),
(18, 'MİLİGRAM', 'MG', 'Ağırlık', 1),
(19, 'GRAM', 'GR', 'Ağırlık', 1),
(20, 'KİLOGRAM', 'KG', 'Ağırlık', 1),
(21, 'TON', 'TON', 'Ağırlık', 1),
(22, 'LİTRE', 'LT', 'Ağırlık', 1),
(23, 'MİLİMETREKARE', 'MM2', 'Alan', 1),
(24, 'SANTİMETREKARE', 'CM2', 'Alan', 1),
(25, 'METREKARE', 'M2', 'Alan', 1),
(26, 'DESİMETREKARE', 'DM2', 'Alan', 1),
(27, 'MİLİMETREKÜP', 'MM3', 'Hacim', 1),
(28, 'SANTİMETREKÜP', 'CM3', 'Hacim', 1),
(29, 'METREKÜP', 'M3', 'Hacim', 1),
(30, 'DESİMETREKÜP', 'DM3', 'Hacim', 1),
(31, 'MİLİMETRE', 'MM', 'Uzunluk', 1),
(32, 'SANTİMETRE', 'CM', 'Uzunluk', 1),
(33, 'METRE', 'MT', 'Uzunluk', 1),
(34, 'DESİMETRE', 'DM', 'Uzunluk', 1),
(35, 'KİLOMETRE', 'KM', 'Uzunluk', 1),
(36, 'ÇİFT', 'ÇİFT', 'Miktar', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_users`
--

CREATE TABLE `iys_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `account_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_users`
--

INSERT INTO `iys_users` (`id`, `name`, `email`, `mobile`, `password`, `confirmed`, `confirmation_code`, `lang_id`, `role_id`, `account_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@iyspro.com', NULL, '$2y$10$9gufUEzRu1LZjhxnK.8ET.1zw2QASeYW.pg2okMTukDm30tGltyBe', 1, NULL, 1, 1, NULL, 'OeDhPmIOgBfHIXOFygYVguYy5AIF5oOQxI9NIDs0X7eAk5T7rrlgHLDishC7', '2018-03-23 19:33:31', '2018-05-14 20:32:53'),
(2, 'Account Owner', 'owner@iyspro.com', '5419791334', '$2y$10$JUChofagzzjzae.hYsKJqOZGopL2neOzi.tuuK7.6/IxHhDYgLMnC', 1, NULL, 2, 2, 1, 'pTSOvMVfjfd7Jbl7iSQgBW3HkTyaj1io2zpOU7mXxSVd4JZ8kNw1JpvNDlJy', '2018-03-23 19:33:32', '2018-05-21 15:35:24'),
(3, 'Regular User', 'user@iyspro.com', NULL, '$2y$10$bpkxdT6dM2oSPkunzqK64ebzTNhIRs0GJDcxtHHOerYZ/BkO2L3mG', 1, NULL, 2, 3, 1, 'pk9ZjqT47RBhGPH4hqgksSZQkQFeWLboDkZvSXQqAcifWcYz9kVi22m0Ge1e', '2018-03-23 19:33:32', '2018-04-21 14:20:09'),
(4, 'Yakup GÜVENÇ', 'yakupguvenc@yandex.com', '5419791334', '$2y$10$tOEVkQRIE9NwowFUI37yBOKF0YQ5JlEM9UnZEUbaeD8WNUXPlpSKO', 1, NULL, 2, 3, 1, 'cd5i5pNLFe2WN8SvUqyLM5WvsnLMCAxCkezH45dfPUXJjyTSbydpHiIq7CaR', '2018-04-17 06:05:41', '2018-05-22 14:30:27'),
(5, 'Adnan Aktaş', 'yguvenc27@gmail.com', '5419791334', '$2y$10$Kr/sK9KxLM5j5owEFfV6HezY0I1PgEAEJTy0le3LtNfT6hJahjn1m', 1, NULL, 1, 2, 2, 'PRGaT3735NIFvZYRH0fgSK2DwsW8VV72tQCwttPdyqWBvGSBc74hlU22vzAF', '2018-04-30 13:21:27', '2018-05-02 06:47:29'),
(6, 'Hüseyin UZUN', 'huseyin@atakbil.com', '55555666', '$2y$10$NnFIpsotWMXItEvuSdXu4.30mJ5IK7W02NCHL4peQSz9ro5.vsEo2', 1, NULL, 2, 2, 3, NULL, '2018-05-12 16:58:21', '2018-05-12 17:04:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iys_user_permissions`
--

CREATE TABLE `iys_user_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `iys_user_permissions`
--

INSERT INTO `iys_user_permissions` (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2018-03-26 14:11:16', '2018-03-26 14:11:16'),
(2, 3, 3, '2018-03-26 14:11:45', '2018-03-26 14:11:45'),
(3, 4, 3, '2018-04-17 06:05:42', '2018-04-17 06:05:42');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `iys_app_accounts`
--
ALTER TABLE `iys_app_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `app_accounts_owner_id_foreign` (`owner_id`),
  ADD KEY `app_accounts_sector_id_foreign` (`sector_id`);

--
-- Tablo için indeksler `iys_app_languages`
--
ALTER TABLE `iys_app_languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Tablo için indeksler `iys_bank_accounts`
--
ALTER TABLE `iys_bank_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_accounts_account_id_foreign` (`account_id`);

--
-- Tablo için indeksler `iys_bank_items`
--
ALTER TABLE `iys_bank_items`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_barcodes`
--
ALTER TABLE `iys_barcodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcodes_product_id_foreign` (`product_id`);

--
-- Tablo için indeksler `iys_categories`
--
ALTER TABLE `iys_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_account_id_foreign` (`account_id`);

--
-- Tablo için indeksler `iys_cities`
--
ALTER TABLE `iys_cities`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_company_addresses`
--
ALTER TABLE `iys_company_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_addresses_company_id_foreign` (`company_id`);

--
-- Tablo için indeksler `iys_company_contact_list`
--
ALTER TABLE `iys_company_contact_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_company_list`
--
ALTER TABLE `iys_company_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_list_account_id_foreign` (`account_id`);

--
-- Tablo için indeksler `iys_counties`
--
ALTER TABLE `iys_counties`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_currencies`
--
ALTER TABLE `iys_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_images`
--
ALTER TABLE `iys_images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_language_lines`
--
ALTER TABLE `iys_language_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_lines_group_index` (`group`);

--
-- Tablo için indeksler `iys_list_sectors`
--
ALTER TABLE `iys_list_sectors`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_menus`
--
ALTER TABLE `iys_menus`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_menu_descriptions`
--
ALTER TABLE `iys_menu_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_migrations`
--
ALTER TABLE `iys_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_modules`
--
ALTER TABLE `iys_modules`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_password_resets`
--
ALTER TABLE `iys_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `iys_permissions`
--
ALTER TABLE `iys_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_module_id_foreign` (`module_id`);

--
-- Tablo için indeksler `iys_products`
--
ALTER TABLE `iys_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_account_id_foreign` (`account_id`);

--
-- Tablo için indeksler `iys_roles`
--
ALTER TABLE `iys_roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_stock_items`
--
ALTER TABLE `iys_stock_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_items_stock_id_foreign` (`stock_id`);

--
-- Tablo için indeksler `iys_stock_receipts`
--
ALTER TABLE `iys_stock_receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_receipts_account_id_foreign` (`account_id`);

--
-- Tablo için indeksler `iys_tags`
--
ALTER TABLE `iys_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_account_id_foreign` (`account_id`);

--
-- Tablo için indeksler `iys_tag_datas`
--
ALTER TABLE `iys_tag_datas`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_units`
--
ALTER TABLE `iys_units`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iys_users`
--
ALTER TABLE `iys_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`),
  ADD KEY `users_lang_id_foreign` (`lang_id`);

--
-- Tablo için indeksler `iys_user_permissions`
--
ALTER TABLE `iys_user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_permissions_user_id_foreign` (`user_id`),
  ADD KEY `user_permissions_permission_id_foreign` (`permission_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `iys_app_accounts`
--
ALTER TABLE `iys_app_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `iys_app_languages`
--
ALTER TABLE `iys_app_languages`
  MODIFY `lang_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `iys_bank_accounts`
--
ALTER TABLE `iys_bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `iys_bank_items`
--
ALTER TABLE `iys_bank_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `iys_barcodes`
--
ALTER TABLE `iys_barcodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `iys_categories`
--
ALTER TABLE `iys_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `iys_cities`
--
ALTER TABLE `iys_cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Tablo için AUTO_INCREMENT değeri `iys_company_addresses`
--
ALTER TABLE `iys_company_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- Tablo için AUTO_INCREMENT değeri `iys_company_contact_list`
--
ALTER TABLE `iys_company_contact_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `iys_company_list`
--
ALTER TABLE `iys_company_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- Tablo için AUTO_INCREMENT değeri `iys_counties`
--
ALTER TABLE `iys_counties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1793;

--
-- Tablo için AUTO_INCREMENT değeri `iys_currencies`
--
ALTER TABLE `iys_currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `iys_images`
--
ALTER TABLE `iys_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `iys_language_lines`
--
ALTER TABLE `iys_language_lines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `iys_list_sectors`
--
ALTER TABLE `iys_list_sectors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `iys_menus`
--
ALTER TABLE `iys_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `iys_menu_descriptions`
--
ALTER TABLE `iys_menu_descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `iys_migrations`
--
ALTER TABLE `iys_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- Tablo için AUTO_INCREMENT değeri `iys_modules`
--
ALTER TABLE `iys_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `iys_permissions`
--
ALTER TABLE `iys_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `iys_products`
--
ALTER TABLE `iys_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `iys_roles`
--
ALTER TABLE `iys_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `iys_stock_items`
--
ALTER TABLE `iys_stock_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `iys_stock_receipts`
--
ALTER TABLE `iys_stock_receipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `iys_tags`
--
ALTER TABLE `iys_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `iys_tag_datas`
--
ALTER TABLE `iys_tag_datas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `iys_units`
--
ALTER TABLE `iys_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `iys_users`
--
ALTER TABLE `iys_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `iys_user_permissions`
--
ALTER TABLE `iys_user_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `iys_app_accounts`
--
ALTER TABLE `iys_app_accounts`
  ADD CONSTRAINT `app_accounts_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `iys_users` (`id`),
  ADD CONSTRAINT `app_accounts_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `iys_list_sectors` (`id`);

--
-- Tablo kısıtlamaları `iys_bank_accounts`
--
ALTER TABLE `iys_bank_accounts`
  ADD CONSTRAINT `bank_accounts_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `iys_app_accounts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_barcodes`
--
ALTER TABLE `iys_barcodes`
  ADD CONSTRAINT `barcodes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `iys_products` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_categories`
--
ALTER TABLE `iys_categories`
  ADD CONSTRAINT `categories_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `iys_app_accounts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_company_addresses`
--
ALTER TABLE `iys_company_addresses`
  ADD CONSTRAINT `company_addresses_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `iys_company_list` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_company_list`
--
ALTER TABLE `iys_company_list`
  ADD CONSTRAINT `company_list_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `iys_app_accounts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_permissions`
--
ALTER TABLE `iys_permissions`
  ADD CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `iys_modules` (`id`);

--
-- Tablo kısıtlamaları `iys_products`
--
ALTER TABLE `iys_products`
  ADD CONSTRAINT `products_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `iys_app_accounts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_stock_items`
--
ALTER TABLE `iys_stock_items`
  ADD CONSTRAINT `stock_items_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `iys_stock_receipts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_stock_receipts`
--
ALTER TABLE `iys_stock_receipts`
  ADD CONSTRAINT `stock_receipts_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `iys_app_accounts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_tags`
--
ALTER TABLE `iys_tags`
  ADD CONSTRAINT `tags_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `iys_app_accounts` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `iys_users`
--
ALTER TABLE `iys_users`
  ADD CONSTRAINT `users_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `iys_app_languages` (`lang_id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `iys_roles` (`id`);

--
-- Tablo kısıtlamaları `iys_user_permissions`
--
ALTER TABLE `iys_user_permissions`
  ADD CONSTRAINT `user_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `iys_permissions` (`id`),
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `iys_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
