-- ==========================================================
-- POWER FAMILY INVESTMENT — DATABASE SQL DUMP FOR phpMyAdmin
-- Clean Import Script (Safe Foreign Key Handling)
-- ==========================================================

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE IF NOT EXISTS `power_family_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `power_family_db`;

-- --------------------------------------------------------
-- Drop existing tables safely in reverse dependency order
-- --------------------------------------------------------
DROP TABLE IF EXISTS `enquiries`;
DROP TABLE IF EXISTS `plot_images`;
DROP TABLE IF EXISTS `house_images`;
DROP TABLE IF EXISTS `vehicle_images`;
DROP TABLE IF EXISTS `plots`;
DROP TABLE IF EXISTS `houses`;
DROP TABLE IF EXISTS `vehicles`;
DROP TABLE IF EXISTS `gallery_items`;
DROP TABLE IF EXISTS `articles`;
DROP TABLE IF EXISTS `locations`;
DROP TABLE IF EXISTS `plot_types`;
DROP TABLE IF EXISTS `settings`;
DROP TABLE IF EXISTS `users`;

-- --------------------------------------------------------
-- 1. Table structure for `users`
-- --------------------------------------------------------
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Power Family Admin', 'admin@powerfamily.co.tz', NOW(), '$2y$12$eKx6vJpCqT0V5a5ZkYQ5l.Q8Tvh9xR4bF7XwZ1n2O3p4q5r6s7t8u', NOW(), NOW()),
(2, 'Administrator', 'admin@reland.co.tz', NOW(), '$2y$12$eKx6vJpCqT0V5a5ZkYQ5l.Q8Tvh9xR4bF7XwZ1n2O3p4q5r6s7t8u', NOW(), NOW());

-- --------------------------------------------------------
-- 2. Table structure for `settings`
-- --------------------------------------------------------
CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`key`, `value`, `created_at`, `updated_at`) VALUES
('company_name', 'Power Family Investment', NOW(), NOW()),
('tagline', 'Wekeza Leo. Jenga Kesho.', NOW(), NOW()),
('site_title', 'Power Family Investment — Viwanja, Nyumba na Magari Tanzania', NOW(), NOW()),
('meta_description', 'Nunua viwanja vya makazi na biashara, nyumba za kisasa na magari yenye ubora Tanzania kupitia Power Family Investment.', NOW(), NOW()),
('company_phone', '+255 700 000 000', NOW(), NOW()),
('whatsapp_number', '255700000000', NOW(), NOW()),
('company_email', 'info@powerfamilyinvestment.co.tz', NOW(), NOW()),
('company_address', 'Tanzania', NOW(), NOW()),
('working_hours', 'Jumatatu - Jumamosi: 2:00 Asubuhi - 11:30 Jioni', NOW(), NOW()),
('social_facebook', 'https://facebook.com/powerfamilyinvestment', NOW(), NOW()),
('social_instagram', 'https://instagram.com/powerfamilyinvestment', NOW(), NOW()),
('social_tiktok', 'https://tiktok.com/@powerfamilyinvestment', NOW(), NOW()),
('social_youtube', 'https://youtube.com/@powerfamilyinvestment', NOW(), NOW());

-- --------------------------------------------------------
-- 3. Table structure for `plot_types`
-- --------------------------------------------------------
CREATE TABLE `plot_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_sw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plot_types_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `plot_types` (`id`, `name_sw`, `name_en`, `slug`, `description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Viwanja vya Makazi', 'Residential Plots', 'makazi', 'Viwanja vilivyopimwa kwa ajili ya ujenzi wa makazi ya familia.', 1, 1, NOW(), NOW()),
(2, 'Viwanja vya Biashara', 'Commercial Plots', 'biashara', 'Viwanja vya kimkakati kando ya barabara kwa ajili ya biashara.', 2, 1, NOW(), NOW());

-- --------------------------------------------------------
-- 4. Table structure for `locations`
-- --------------------------------------------------------
CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Tanzania',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `locations_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `locations` (`id`, `area_name`, `slug`, `district`, `region`, `description`, `featured_image`, `display_order`, `is_popular`, `created_at`, `updated_at`) VALUES
(1, 'Eneo la Kwanza', 'eneo-la-kwanza', 'Eneo la Kwanza', 'Tanzania', 'Eneo tulivu na zuri lenye ukuaji wa haraka na huduma zote za kijamii karibu.', 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80', 1, 1, NOW(), NOW()),
(2, 'Eneo la Pili', 'eneo-la-pili', 'Eneo la Pili', 'Tanzania', 'Eneo la kimkakati kando ya barabara kuu, linafaa sana kwa uwekezaji wa kibiashara.', 'https://images.unsplash.com/photo-1448630360428-65456885c650?auto=format&fit=crop&w=1200&q=80', 2, 1, NOW(), NOW()),
(3, 'Eneo la Tatu', 'eneo-la-tatu', 'Eneo la Tatu', 'Tanzania', 'Mandhari ya kuvutia na mazingira safi ya asili kwa ajili ya ujenzi wa nyumba za kisasa.', 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80', 3, 1, NOW(), NOW());

-- --------------------------------------------------------
-- 5. Table structure for `plots`
-- --------------------------------------------------------
CREATE TABLE `plots` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plot_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plot_type_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_size` decimal(10,2) NOT NULL,
  `size_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SQM',
  `dimension_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'TZS',
  `ownership_title_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Kimepimwa',
  `has_electricity` tinyint(1) NOT NULL DEFAULT 1,
  `has_water` tinyint(1) NOT NULL DEFAULT 1,
  `road_accessibility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Barabara inafika',
  `topography` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tambarare',
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `google_maps_embed_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_status` enum('available','reserved','sold') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plots_plot_reference_unique` (`plot_reference`),
  UNIQUE KEY `plots_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `plots` (`id`, `plot_reference`, `title`, `slug`, `plot_type_id`, `location_id`, `street_address`, `plot_size`, `size_unit`, `dimension_details`, `price`, `currency`, `ownership_title_type`, `has_electricity`, `has_water`, `road_accessibility`, `topography`, `featured_image`, `short_description`, `description`, `listing_status`, `is_featured`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'PFI-PLT-001', 'Kiwanja cha Makazi — Eneo la Kwanza', 'kiwanja-cha-makazi-eneo-la-kwanza', 1, 1, 'Eneo la Kwanza', 900.00, 'SQM', '30m × 30m', 8500000.00, 'TZS', 'Kimepimwa (Surveyed)', 1, 1, 'Barabara nzuri inafika moja kwa moja', 'Tambarare', 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80', 'Kiwanja kizuri cha makazi kilichopimwa vizuri chenye ufikiaji mzuri wa barabara.', 'Kiwanja kizuri sana cha makazi kilichopimwa vizuri kwa vigingi vya kisasa.\nKipo kwenye mazingira tulivu yenye ufikiaji mzuri wa barabara, umeme na maji karibu.\nNyaraka zote zipo tayari kwa ajili ya uhamisho wa umiliki.', 'available', 1, 1, NOW(), NOW()),
(2, 'PFI-PLT-002', 'Kiwanja cha Biashara — Eneo la Pili', 'kiwanja-cha-biashara-eneo-la-pili', 2, 2, 'Eneo la Pili Barabara Kuu', 1400.00, 'SQM', '40m × 35m', 18000000.00, 'TZS', 'Hati Miliki Safi', 1, 1, 'Kando ya barabara kuu', 'Tambarare', 'https://images.unsplash.com/photo-1448630360428-65456885c650?auto=format&fit=crop&w=1200&q=80', 'Kiwanja cha kimkakati kando ya barabara kuu, linafaa kwa maduka na fremu za biashara.', 'Kiwanja cha kimkakati chenye nafasi kubwa kando ya barabara kuu.\nLinafaa sana kwa ujenzi wa maduka ya biashara, fremu, gereji au kituo cha biashara.\nMzunguko mzuri wa watu na magari.', 'available', 1, 1, NOW(), NOW()),
(3, 'PFI-PLT-003', 'Kiwanja cha Makazi — Eneo la Tatu', 'kiwanja-cha-makazi-eneo-la-tatu', 1, 3, 'Eneo la Tatu', 1225.00, 'SQM', '35m × 35m', 12000000.00, 'TZS', 'Kimepimwa', 1, 1, 'Barabara inafika vizuri', 'Mwinuko mpole wenye mandhari nzuri', 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80', 'Kiwanja kikubwa chenye mandhari nzuri na hewa safi kwa ajili ya makazi ya familia.', 'Kiwanja chenye nafasi kubwa na mandhari ya kuvutia sana.\nKinafaa kwa ujenzi wa nyumba ya kifahari yenye eneo kubwa la bustani na maegesho ya magari.', 'available', 1, 1, NOW(), NOW());

-- --------------------------------------------------------
-- 6. Table structure for `houses`
-- --------------------------------------------------------
CREATE TABLE `houses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `house_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `bedrooms` int(11) NOT NULL DEFAULT 3,
  `bathrooms` int(11) NOT NULL DEFAULT 2,
  `plot_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ownership_title_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Hati Miliki Kamili',
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_status` enum('available','reserved','sold') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `houses_house_reference_unique` (`house_reference`),
  UNIQUE KEY `houses_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `houses` (`id`, `house_reference`, `title`, `slug`, `location_id`, `price`, `bedrooms`, `bathrooms`, `plot_size`, `house_size`, `ownership_title_type`, `features`, `description`, `featured_image`, `listing_status`, `is_featured`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'PFI-HOU-001', 'Nyumba ya Kisasa ya Familia (Vyumba 4)', 'nyumba-ya-kisasa-vyumba-4', 1, 145000000.00, 4, 3, '30m × 30m', '240 SQM', 'Hati Miliki Kamili', '[\"Vyumba 4 vya kulala (2 Master)\", \"Sebule na Dinning kubwa\", \"Jiko la kisasa lenye makabati\", \"Uzio na geti salama\", \"Maegesho ya magari 4\", \"Tangi kubwa la maji\"]', 'Nyumba maridadi ya kisasa iliyojengwa kwa viwango vya juu.\nIna sebule kubwa ya wazi, jiko la kisasa lenye makabati, chumba kikuu chenye choo na bafu (Master Bedroom), uzio wa ukuta na geti salama.', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80', 'available', 1, 1, NOW(), NOW()),
(2, 'PFI-HOU-002', 'Nyumba ya Vyumba 3 yenye Bustani Nzuri', 'nyumba-vyumba-3-bustani', 3, 98000000.00, 3, 2, '25m × 30m', '180 SQM', 'Hati Miliki', '[\"Vyumba 3 (1 Master)\", \"Bustani ya kijani\", \"Paving blocks\", \"Maji ya uhakika na Kisima\", \"LUKU yako peke yako\"]', 'Nyumba tulivu iliyopo katika mtaa mzuri wa makazi.\nIna bustani nzuri ya kijani, paving blocks za kisasa na mazingira salama kwa watoto.', 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=1200&q=80', 'available', 1, 1, NOW(), NOW());

-- --------------------------------------------------------
-- 7. Table structure for `vehicles`
-- --------------------------------------------------------
CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicle_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `transmission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Automatic',
  `fuel_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Petrol',
  `mileage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'SUV',
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`features`)),
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_status` enum('available','reserved','sold') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vehicles_vehicle_reference_unique` (`vehicle_reference`),
  UNIQUE KEY `vehicles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `vehicles` (`id`, `vehicle_reference`, `title`, `slug`, `make`, `model`, `year`, `price`, `transmission`, `fuel_type`, `mileage`, `color`, `body_type`, `features`, `description`, `featured_image`, `listing_status`, `is_featured`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 'PFI-VEH-001', 'Toyota Land Cruiser Prado TX-L', 'toyota-land-cruiser-prado-tx-l', 'Toyota', 'Land Cruiser Prado TX-L', 2018, 88000000.00, 'Automatic', 'Diesel', '64,000 km', 'Pearl White', 'SUV', '[\"4WD / AWD\", \"Sunroof\", \"Leather Seats\", \"Reverse Camera\", \"Push to Start\", \"7 Seater\"]', 'Gari lipo katika hali safi sana (Clean condition).\nHalijawahi kupata ajali yoyote, service imefanyika kwa wakati.\nLina sifa za 4WD, Sunroof, Viti vya ngozi na Push to Start.', 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=1200&q=80', 'available', 1, 1, NOW(), NOW()),
(2, 'PFI-VEH-002', 'Toyota Harrier Premium', 'toyota-harrier-premium', 'Toyota', 'Harrier Premium', 2017, 49500000.00, 'Automatic', 'Petrol', '58,000 km', 'Black Metallic', 'Crossover', '[\"Alloy Wheels\", \"Leather Interior\", \"Cruise Control\", \"Touch Screen Display\", \"Fog Lights\"]', 'Gari la kifahari lenye matumizi mazuri ya mafuta.\nViti vya ngozi, screen ya kisasa, rim nzuri za alloy na mfumo bora wa sauti.', 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&w=1200&q=80', 'available', 1, 1, NOW(), NOW());

-- --------------------------------------------------------
-- 8. Table structure for `gallery_items`
-- --------------------------------------------------------
CREATE TABLE `gallery_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'viwanja',
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `gallery_items` (`id`, `title`, `category`, `image_path`, `description`, `display_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Upimaji wa Viwanja Eneo la Kwanza', 'viwanja', 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80', 'Upimaji na uwekaji wa vigingi vya viwanja.', 1, 1, NOW(), NOW()),
(2, 'Nyumba ya Kisasa ya Familia', 'nyumba', 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80', 'Muonekano wa mbele wa nyumba ya kisasa.', 2, 1, NOW(), NOW()),
(3, 'Magari Safi ya Kifahari', 'magari', 'https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=1200&q=80', 'Magari yenye ubora tayari kwa wateja.', 3, 1, NOW(), NOW()),
(4, 'Ziara ya Wateja Kwenye Mradi', 'matukio', 'https://images.unsplash.com/photo-1577495508048-b635879837f1?auto=format&fit=crop&w=1200&q=80', 'Wateja wakikagua viwanja kwa furaha na uhakika.', 4, 1, NOW(), NOW());

-- --------------------------------------------------------
-- 9. Table structure for `articles`
-- --------------------------------------------------------
CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Uwekezaji',
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `articles` (`id`, `title`, `slug`, `category`, `excerpt`, `content`, `image_url`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 'Mambo Muhimu ya Kuzingatia Kabla ya Kununua Kiwanja Tanzania', 'mambo-muhimu-ya-kuzingatia-kabla-ya-kununua-kiwanja', 'Mwongozo wa Viwanja', 'Mwongozo kamili wa ukaguzi wa eneo, uhakiki wa nyaraka halisi na mipaka kabla ya kulipa fedha zako.', 'Kununua ardhi au kiwanja ni moja ya uwekezaji mkubwa zaidi maishani.\n\n1. Kutembelea Eneo Halisi (Site Visit): Fika eneo ujionee hali ya ardhi na miundombinu.\n2. Uhakiki wa Nyaraka: Thibitisha uhalali wa mmiliki na nyaraka za serikali.\n3. Ushirikishwaji wa Wataalamu: Fanya kazi na kampuni inayoaminika kama Power Family Investment.\n4. Kuweka Mipaka/Vigingi: Hakikisha vigingi vinawekwa mara moja baada ya mkataba.', 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?auto=format&fit=crop&w=1200&q=80', 1, NOW(), NOW(), NOW()),
(2, 'Tofauti Kati ya Kiwanja cha Makazi na Kiwanja cha Biashara', 'tofauti-kati-ya-kiwanja-cha-makazi-na-biashara', 'Uwekezaji', 'Jinsi matumizi ya ardhi yanavyoathiri thamani, vibali vya ujenzi na faida ya uwekezaji wako wa muda mrefu.', 'Kabla ya kuchagua kiwanja cha kununua, ni muhimu kuelewa mgawanyo wa matumizi ya ardhi (Zoning):\n\n- Viwanja vya Makazi: Hupangwa mahususi kwa ajili ya kuishi familia katika utulivu.\n- Viwanja vya Biashara: Hupatikana kando ya barabara kuu na vituo vya huduma vikiwa na thamani kubwa ya kibiashara.', 'https://images.unsplash.com/photo-1448630360428-65456885c650?auto=format&fit=crop&w=1200&q=80', 1, NOW(), NOW(), NOW());

-- --------------------------------------------------------
-- 10. Table structure for `enquiries`
-- --------------------------------------------------------
CREATE TABLE `enquiries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tracking_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'kiwanja',
  `plot_id` bigint(20) UNSIGNED DEFAULT NULL,
  `house_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('new','contacted','in_progress','successful','cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `admin_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `enquiries` (`id`, `tracking_reference`, `name`, `email`, `phone`, `category`, `plot_id`, `house_id`, `vehicle_id`, `message`, `status`, `admin_notes`, `created_at`, `updated_at`) VALUES
(1, 'PFI-REQ-101', 'Juma Hassan', 'juma.hassan@example.com', '+255 712 345 678', 'kiwanja', 1, NULL, NULL, 'Habari, nahitaji kujua kama naweza kulipa kwa awamu na lini naweza kwenda kukagua kiwanja hiki?', 'new', 'Mteja anataka ratiba ya ukaguzi wiki hii.', NOW(), NOW()),
(2, 'PFI-REQ-102', 'Amina Salum', 'amina.salum@example.com', '+255 754 987 654', 'nyumba', NULL, 1, NULL, 'Nimevutiwa na hii nyumba. Je, kuna punguzo lolote endapo nitalipa taslimu?', 'contacted', 'Amepewa maelezo na amepanga kuitembelea kesho.', NOW(), NOW());

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET SQL_MODE=@OLD_SQL_MODE;
