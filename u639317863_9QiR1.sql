-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 16 2023 г., 20:19
-- Версия сервера: 10.6.12-MariaDB-cll-lve
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u639317863_9QiR1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lv_articles`
--

CREATE TABLE `lv_articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_bonus_settings`
--

CREATE TABLE `lv_bonus_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `min_amount` int(11) NOT NULL DEFAULT 0,
  `percent` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_bonus_settings`
--

INSERT INTO `lv_bonus_settings` (`id`, `min_amount`, `percent`, `created_at`, `updated_at`) VALUES
(1, 10000, '1.1', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(2, 50000, '1.15', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(3, 100000, '1.2', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(4, 250000, '1.25', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(5, 500000, '1.3', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(6, 1000000, '1.35', '2023-04-19 18:49:41', '2023-04-19 18:49:41');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_coupons`
--

CREATE TABLE `lv_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `max_usable` int(11) NOT NULL DEFAULT -1,
  `used` int(11) NOT NULL DEFAULT 0,
  `is_percent` int(11) NOT NULL DEFAULT 0,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_coupons`
--

INSERT INTO `lv_coupons` (`id`, `amount`, `max_usable`, `used`, `is_percent`, `code`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 0, 0, 'Test', '2023-05-12 09:22:47', '2023-05-12 09:22:47');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_delivery_methods`
--

CREATE TABLE `lv_delivery_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `min_amount` int(11) NOT NULL DEFAULT 0,
  `max_amount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_faqs`
--

CREATE TABLE `lv_faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_faqs_categories`
--

CREATE TABLE `lv_faqs_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_faqs_categories`
--

INSERT INTO `lv_faqs_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'test', NULL, '2023-05-09 22:23:34', '2023-05-09 22:23:34');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_marques`
--

CREATE TABLE `lv_marques` (
  `id` int(10) UNSIGNED NOT NULL,
  `marque_text` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_marques`
--

INSERT INTO `lv_marques` (`id`, `marque_text`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Teeeest', 1, NULL, '2023-05-15 12:59:17'),
(5, 'Discover & Callect Extraordinary Digital Art and Rare NFT\'s', 1, '2023-04-29 11:35:42', '2023-05-15 12:59:17'),
(6, 'Discover & Callect Extraordinary Digital Art and Rare NFT\'s', 1, '2023-04-29 11:35:50', '2023-05-15 12:59:17'),
(7, 'test', 1, '2023-05-09 20:55:40', '2023-05-15 12:59:17');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_medias`
--

CREATE TABLE `lv_medias` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` text DEFAULT NULL,
  `mimetype` text DEFAULT NULL,
  `type` enum('image','video','audio','mixed') NOT NULL DEFAULT 'mixed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_migrations`
--

CREATE TABLE `lv_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_migrations`
--

INSERT INTO `lv_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_01_000000_create_articles_table', 1),
(2, '2019_06_01_000000_create_bonus_settings_table', 1),
(3, '2019_06_01_000000_create_coupons_table', 1),
(4, '2019_06_01_000000_create_delivery_methods_table', 1),
(5, '2019_06_01_000000_create_faqs_categories_table', 1),
(6, '2019_06_01_000000_create_faqs_table', 1),
(7, '2019_06_01_000000_create_medias_table', 1),
(8, '2019_06_01_000000_create_notifications_table', 1),
(9, '2019_06_01_000000_create_password_resets_table', 1),
(10, '2019_06_01_000000_create_permissions_table', 1),
(11, '2019_06_01_000000_create_products_categories_table', 1),
(12, '2019_06_01_000000_create_products_items_table', 1),
(13, '2019_06_01_000000_create_products_table', 1),
(14, '2019_06_01_000000_create_settings_table', 1),
(15, '2019_06_01_000000_create_users_coupons_table', 1),
(16, '2019_06_01_000000_create_users_orders_table', 1),
(17, '2019_06_01_000000_create_users_permissions_table', 1),
(18, '2019_06_01_000000_create_users_table', 1),
(19, '2019_06_01_000000_create_users_tickets_categories_table', 1),
(20, '2019_06_01_000000_create_users_tickets_replies_table', 1),
(21, '2019_06_01_000000_create_users_tickets_table', 1),
(22, '2019_06_01_000000_create_users_transactions_table', 1),
(23, '2019_08_08_000000_create_users_orders_notes_table', 1),
(24, '2019_09_18_000000_create_users_cart_table', 1),
(25, '2019_09_20_000000_create_users_cart_entries_table', 1),
(26, '2019_09_20_000000_create_users_cart_shoppings_table', 1),
(27, '2019_09_20_000000_create_users_coupons_checkouts_table', 1),
(28, '2019_10_09_000000_create_products_bonus_table', 1),
(29, '2019_10_14_000000_create_translations_table', 1),
(30, '2020_10_11_230842_change_translations_value_type', 1),
(31, '2020_10_13_231126_change_users_orders_content_type', 1),
(32, '2023_04_06_061932_marque', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lv_notifications`
--

CREATE TABLE `lv_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `custom_id` int(11) NOT NULL DEFAULT 0,
  `extra_data` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `readed` enum('false','true') NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_password_resets`
--

CREATE TABLE `lv_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_permissions`
--

CREATE TABLE `lv_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_permissions`
--

INSERT INTO `lv_permissions` (`id`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'access_backend', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(2, 'jabber_newsletter', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(3, 'manage_articles', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(4, 'manage_faqs', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(5, 'manage_faqs_categories', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(6, 'manage_products', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(7, 'manage_products_categories', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(8, 'manage_tickets', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(9, 'manage_tickets_categories', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(10, 'system_settings', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(11, 'manage_bitcoin_wallet', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(12, 'manage_creditcards', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(13, 'manage_users', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(14, 'manage_users_permissions', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(15, 'manage_orders', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(16, 'jabber_login', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(17, 'system_payments', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(18, 'manage_coupons', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(19, 'manage_delivery_methods', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(20, 'manage_design', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(21, 'manage_media', '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(22, 'system_bonus', '2023-04-19 18:49:41', '2023-04-19 18:49:41');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_products`
--

CREATE TABLE `lv_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `short_description` longtext DEFAULT NULL,
  `content` text DEFAULT NULL,
  `price_in_cent` decimal(11,2) NOT NULL DEFAULT 0.00,
  `old_price_in_cent` decimal(11,2) NOT NULL DEFAULT 0.00,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `drop_needed` int(11) NOT NULL DEFAULT 0,
  `sells` int(11) NOT NULL DEFAULT 0,
  `thumbnail_image` text DEFAULT NULL,
  `interval` int(11) NOT NULL DEFAULT 1,
  `stock_management` int(11) NOT NULL DEFAULT 0,
  `as_weight` int(11) NOT NULL DEFAULT 0,
  `weight_available` int(11) NOT NULL DEFAULT 0,
  `weight_char` varchar(255) NOT NULL DEFAULT 'g',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_products`
--

INSERT INTO `lv_products` (`id`, `name`, `description`, `short_description`, `content`, `price_in_cent`, `old_price_in_cent`, `category_id`, `drop_needed`, `sells`, `thumbnail_image`, `interval`, `stock_management`, `as_weight`, `weight_available`, `weight_char`, `created_at`, `updated_at`) VALUES
(6, 'Test Coin', 'Test', 'Test Coin', '', '300.00', '10.00', 5, 1, 6021, NULL, 1, 1, 0, 0, '', '2023-05-02 13:26:12', '2023-05-10 13:23:14'),
(7, 'Testprodukt', 'Viele Tolle sachen', 'Hier ist alles toll', '', '1000.00', '1500.00', 6, 1, 4020, NULL, 1, 1, 0, 0, '', '2023-05-02 22:16:50', '2023-05-11 12:25:28'),
(8, 'test scenario', 'test 1', 'test case 1', '', '3.00', '5.00', 5, 1, 0, NULL, 1, 1, 0, 0, '', '2023-05-06 14:42:16', '2023-05-06 14:42:16'),
(9, 'test11', 'testt', 'test11', '', '100.00', '100.00', 5, 0, 16, NULL, 1, 0, 0, 0, '', '2023-05-09 21:10:34', '2023-05-12 17:44:51'),
(14, 'Test Production', 'For Testing Purpose', 'Test', '', '500.00', '600.00', 5, 0, 0, NULL, 1, 1, 0, 0, '', '2023-05-10 14:07:58', '2023-05-10 14:07:58'),
(15, 'Joan Pickett', 'Sit saepe omnis per', 'Commodi ullamco amet', '', '228.00', '560.00', 0, 0, 0, NULL, 1, 1, 0, 0, '', '2023-05-10 15:05:13', '2023-05-10 15:05:13'),
(16, 'Ian Jefferson', 'Dolore quia voluptat', 'Similique necessitat', '', '246.00', '445.00', 0, 0, 0, NULL, 1, 0, 0, 0, '', '2023-05-10 15:05:46', '2023-05-10 15:05:46'),
(17, 'Zeph Porter', 'Et qui esse consequa', 'Enim nulla sint lab', '', '86.00', '399.00', 5, 0, 0, NULL, 1, 0, 0, 0, '', '2023-05-10 15:58:50', '2023-05-10 15:58:50'),
(18, 'malik', 'Et beatae ea quia ad', NULL, 'test', '56.00', '634.00', 5, 0, 0, NULL, 1, 0, 0, 0, '', '2023-05-10 16:35:46', '2023-05-12 18:10:32'),
(19, 'sher', 'Omnis dolore anim en', 'Blanditiis dolor et', '', '558.00', '534.00', 0, 0, 0, NULL, 1, 0, 0, 0, '', '2023-05-10 16:41:59', '2023-05-10 16:41:59'),
(20, 'Alvin Langley', 'Aute eligendi non et', NULL, '', '135.00', '28.00', 6, 0, 100, '16842593301.png', 1, 1, 0, 0, '', '2023-05-10 19:23:54', '2023-05-16 19:48:50'),
(21, 'Nezes Resrprodukt', 'Test Test', 'Hier ist alles toll', '', '150.00', '0.00', 5, 0, 1, NULL, 1, 1, 0, 0, '', '2023-05-11 12:40:29', '2023-05-11 14:51:14'),
(22, 'test product', 'Long description', 'Brief description', '', '110.00', '0.00', 5, 0, 0, NULL, 1, 1, 0, 0, '', '2023-05-11 15:18:17', '2023-05-11 15:18:17'),
(23, 'Test', 'fgsdgsdfyhdjhydj', 'dfsdsgsdgsd', '', '122.00', '0.00', 5, 0, 0, NULL, 1, 1, 0, 0, '', '2023-05-11 15:39:49', '2023-05-11 15:39:49'),
(24, 'Test', 'sDGasdg', 'dfsdsgsdgsd', '', '122.00', '10.00', 6, 0, 0, NULL, 1, 1, 0, 0, '', '2023-05-11 15:43:21', '2023-05-11 15:43:21'),
(25, 'zddsgdsg', 'dsgsdfghfsd', 'sdgsdgdsg', '', '122.00', '10.00', 5, 0, 0, NULL, 1, 1, 0, 0, '', '2023-05-11 15:44:14', '2023-05-11 15:44:14'),
(32, 'Test img', 'dgsdgsdgs', NULL, 'test', '122.00', '10.00', 5, 0, 0, '16838913641.svg', 1, 0, 0, 0, '', '2023-05-12 13:36:04', '2023-05-12 17:51:22'),
(33, 'test345', 'test345', 'test345', '', '500.00', '500.00', 5, 0, 0, NULL, 1, 0, 0, 0, '', '2023-05-12 18:11:04', '2023-05-12 18:11:04'),
(34, 'Product 1.1', 'long description for product 1.1', NULL, 'some content of unlimited product', '3000.00', '3500.00', 6, 0, 0, '16841390041.jpg', 1, 0, 0, 0, '', '2023-05-15 10:23:24', '2023-05-16 08:11:34'),
(35, 'qqqqqqq', 'qwwww', NULL, '', '112.00', '0.00', 6, 0, 0, NULL, 1, 1, 0, 0, '', '2023-05-16 16:02:25', '2023-05-16 16:06:20');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_products_bonus`
--

CREATE TABLE `lv_products_bonus` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `min_amount` int(11) NOT NULL DEFAULT 0,
  `percent` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_products_categories`
--

CREATE TABLE `lv_products_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `meta_tags_desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_products_categories`
--

INSERT INTO `lv_products_categories` (`id`, `name`, `slug`, `keywords`, `meta_tags_desc`, `created_at`, `updated_at`) VALUES
(5, 'Coin', 'Coin', 'All', 'Coin', '2023-05-02 13:25:53', '2023-05-02 13:25:53'),
(6, 'Test', 'te', 'testt', 'test', '2023-05-02 22:16:13', '2023-05-02 22:16:13');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_products_items`
--

CREATE TABLE `lv_products_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_products_items`
--

INSERT INTO `lv_products_items` (`id`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(6, 21, 'Some content', '2023-05-12 13:06:40', '2023-05-12 13:06:40'),
(7, 25, 'test', '2023-05-12 18:54:01', '2023-05-12 18:54:01'),
(8, 23, 'dd', '2023-05-15 13:05:07', '2023-05-15 13:05:07'),
(9, 21, 'Test Input', '2023-05-16 17:10:14', '2023-05-16 17:10:14');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_settings`
--

CREATE TABLE `lv_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'string',
  `before_add` varchar(255) DEFAULT NULL,
  `after_add` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_settings`
--

INSERT INTO `lv_settings` (`id`, `key`, `value`, `type`, `before_add`, `after_add`, `created_at`, `updated_at`) VALUES
(1, 'app.name', 'OpenFraudCart', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(2, 'app.url', 'http://localhost', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(3, 'app.asset_url', '/assets/', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(4, 'app.media_url', '/media/', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(5, 'app.timezone', 'Europe/Berlin', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(6, 'app.cipher', 'AES-256-CBC', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(7, 'mail.from.name', 'OpenFraudCart', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(8, 'mail.from.address', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(9, 'mail.port', '587', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(10, 'mail.host', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(11, 'mail.driver', 'smtp', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(12, 'mail.username', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(13, 'mail.password', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(14, 'mail.encryption', 'tls', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(15, 'backend.name', 'OpenFraudCart Panel', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(16, 'app.access_only_for_users', '1', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(17, 'shop.replace_rules', '0', 'int', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(18, 'shop.currency', 'EUR', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(19, 'shop.btc_confirms_needed', '1', 'int', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(20, 'shop.total_sells', '11662', 'int', NULL, NULL, '2023-04-19 18:49:41', '2023-05-12 17:44:51'),
(21, 'jabber.address', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(22, 'jabber.username', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(23, 'jabber.password', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(24, 'bitcoin.api', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(25, 'register.newsletter_enabled', '1', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(26, 'shop.creditcards.enabled', '0', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(27, 'bitcoin.primarywallet', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(28, 'app.available.locales', 'de,en', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(29, 'app.locale', 'de', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(30, 'shop.bonus_in_percent', '0.95', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(31, 'theme.color1', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(32, 'theme.color2', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(33, 'theme.color3', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(34, 'theme.color4', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(35, 'theme.color5', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(36, 'theme.color6', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(37, 'theme.color7', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(38, 'theme.color8', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(39, 'theme.color9', 'fb1313', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(40, 'theme.color.enable', '0', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(41, 'theme.logo', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(42, 'theme.favicon', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(43, 'theme.background', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(44, 'theme.custom.css', 'body {\r\n                    /*\r\n                    background-color: #fff;\r\n                    background-repeat: no-repeat;\r\n                    background-position: center;\r\n                    background-image: url(\'\');\r\n                    */\r\n                }', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(45, 'import.custom.delimiter', '', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(46, 'api.enabled', '1', 'bool', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41'),
(47, 'api.key', 'eyJpdiI6ImZ6eXZIWlAyRHdsa0ZKZWowMWxKd3c9PSIsInZhbHVlIjoiWlhFN0RieFFsKzQ4Q1NKQ0RUakxsWGNxTVh6R0dBTVZxTk8vN25DdklzQT0iLCJtYWMiOiI5YmYwNGM4NTFmOWNjMjMyMmQ5NDgxZmE1NjFhZTUwZjNjYWEyNWIyYzg4NmVhYmU4NTI5YjRhOGJjNmFkYmM1IiwidGFnIjoiIn0=', 'string', NULL, NULL, '2023-04-19 18:49:41', '2023-04-19 18:49:41');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_shops`
--

CREATE TABLE `lv_shops` (
  `id` int(11) NOT NULL,
  `shop_name` text DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_translations`
--

CREATE TABLE `lv_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` longtext DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `entry_id` int(11) NOT NULL DEFAULT 0,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_translations`
--

INSERT INTO `lv_translations` (`id`, `value`, `lang`, `keyword`, `entry_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'TESTING', 'en', NULL, 1, 'ticket-category', '2023-05-10 13:01:06', '2023-05-10 13:01:06');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users`
--

CREATE TABLE `lv_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'de',
  `jabber_id` varchar(255) NOT NULL,
  `photo` text DEFAULT NULL,
  `cover` text DEFAULT NULL,
  `shop_name` text DEFAULT NULL,
  `balance_in_cent` decimal(11,2) NOT NULL DEFAULT 0.00,
  `newsletter_enabled` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_users`
--

INSERT INTO `lv_users` (`id`, `name`, `username`, `email`, `language`, `jabber_id`, `photo`, `cover`, `shop_name`, `balance_in_cent`, `newsletter_enabled`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@example.com', 'en', 'admin@example.com', '16838828281.jpg', '1683882274.jpg', 'Shop Name', '2802.88', 0, NULL, '$2y$10$8qW9vr027PdtGHDp6I/ce.9.Td2qWrvdhYkpIZuh7.fg8/yYRIr2i', 'frv1ebwIx3Qv4lIZGhVTm6GusShUioUyba3OfRzrmYal9Og8qnCdMga8iGa7', '2023-05-02 13:22:25', '2023-05-16 11:57:10'),
(7, 'asimhamza', 'asimhamza', '1234@sdf', 'en', '1234@sdf', NULL, NULL, NULL, '0.00', 0, NULL, '$2y$10$.KCVwYnEKHQ/ZA0Tr0riXeHILoRlblLe7LghG8eIf/vyQ7tksddn.', '5kTTSkdBjQehkMk0BSwxG4YcQVLaFdyb8icBfkUQuOKvjONuzOS9nz0Gaw6f', '2023-05-03 00:39:31', '2023-05-03 00:39:57'),
(8, 'test', 'test', 'test@gmail.com', 'en', 'test@gmail.com', NULL, NULL, NULL, '1.00', 0, NULL, '$2y$10$03WtN.JzSG2QBDjSS0JJLOzlEuljI.xvhtSxxStabqL569hGZXteG', 'lBiEOqiMISvyTGbMsBla4Bac8pbdZIpjhdE2p7JPoGoMLWrgaC1YHXMr8KT5', '2023-05-10 11:37:52', '2023-05-10 13:36:25'),
(9, 'testing1234', 'testing1234', 'testing1234@gmail.com', 'en', 'testing1234@gmail.com', NULL, NULL, NULL, '1.00', 0, NULL, '$2y$10$Uex8i1LNn.UwZY2IXKBud.pdHkVUHlUW81Unu6Mq4/4ms6121Igmi', NULL, '2023-05-10 12:12:17', '2023-05-15 12:38:53');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_cart`
--

CREATE TABLE `lv_users_cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_users_cart`
--

INSERT INTO `lv_users_cart` (`id`, `user_id`, `product_id`, `amount`, `qty`, `created_at`, `updated_at`) VALUES
(69, 4, 1, 300, 1, '2023-05-01 06:22:19', '2023-05-01 06:22:19'),
(70, 4, 5, 100, 1, '2023-05-01 07:49:41', '2023-05-01 07:49:41'),
(80, 7, 7, 1000, 1, '2023-05-04 01:00:55', '2023-05-04 01:00:55'),
(156, 9, 6, 3, 5, '2023-05-10 12:13:30', '2023-05-10 12:13:30'),
(182, 10, 6, 3, 3, '2023-05-10 13:37:48', '2023-05-10 13:37:48'),
(186, 8, 10, 5, 1, '2023-05-10 13:40:02', '2023-05-10 13:40:02'),
(219, 1, 34, 30, 1, '2023-05-16 08:14:43', '2023-05-16 08:14:43');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_carts_entries`
--

CREATE TABLE `lv_users_carts_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `shopping_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_carts_shoppings`
--

CREATE TABLE `lv_users_carts_shoppings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `is_done` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_coupons`
--

CREATE TABLE `lv_users_coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `coupon_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_coupons_checkouts`
--

CREATE TABLE `lv_users_coupons_checkouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `coupon_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_orders`
--

CREATE TABLE `lv_users_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `name` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `cart_entry_id` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `price_in_cent` int(11) NOT NULL DEFAULT 0,
  `totalprice` int(11) NOT NULL DEFAULT 0,
  `weight` int(11) NOT NULL DEFAULT 0,
  `delivery_price` int(11) NOT NULL DEFAULT 0,
  `weight_char` varchar(255) NOT NULL DEFAULT 'g',
  `delivery_method` varchar(255) DEFAULT NULL,
  `status` enum('nothing','cancelled','completed','pending') NOT NULL DEFAULT 'nothing',
  `drop_info` text DEFAULT NULL,
  `sell_product_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_users_orders`
--

INSERT INTO `lv_users_orders` (`id`, `user_id`, `name`, `content`, `cart_entry_id`, `amount`, `price_in_cent`, `totalprice`, `weight`, `delivery_price`, `weight_char`, `delivery_method`, `status`, `drop_info`, `sell_product_count`, `created_at`, `updated_at`, `product_id`) VALUES
(1, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'completed', 'eyJpdiI6InkvTE84bk1FSE9OdktKekVleWl3a2c9PSIsInZhbHVlIjoiLy9LQVhaeTc0ZHZnaFZWeWNMdEhZUT09IiwibWFjIjoiNjc0YzA3YjZkMzBhMDcyMWNhZDlhZmMyNmFmM2Y2ZDMyNDk2MGY4ODJiNWU1M2ExZmE1MzYzNTNlMWU5YzBjNiIsInRhZyI6IiJ9', NULL, '2023-04-30 08:16:23', '2023-05-02 20:11:46', 0),
(2, 3, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'completed', 'eyJpdiI6ImIrY3NiNmVIRG55anAzM0d0YXU4bXc9PSIsInZhbHVlIjoicjJJckdFZjRaN1JWdFhadzNyRWc2Zz09IiwibWFjIjoiMTkwNDZlZGNlN2QwZDIwNTIyOTI4ZTk3ZmEwYWZiOWU2OWUxZjZjYTQ0YTAwY2IzZWIwZjg3MzY5NGIwNDA4YyIsInRhZyI6IiJ9', NULL, '2023-04-30 08:32:57', '2023-05-02 20:11:46', 0),
(4, 1, 'Test', '', 0, 200, 200, 40000, 0, 0, '', '', 'completed', 'eyJpdiI6IlM0cWFFakwyalVLU096ZTZUck5yNWc9PSIsInZhbHVlIjoibFA5TE5XUU9MMUhrVWR3UlY2TERzZz09IiwibWFjIjoiY2JlNWZiZmQyODZmMzg0NjVhNDAyMDhkNmZlOTNiYzM3NzhlMzhiMThjNWQwNTIyZTI0M2U3ZDY3NWU5YWMzZiIsInRhZyI6IiJ9', 3, '2023-04-30 09:35:13', '2023-05-02 20:11:46', 0),
(5, 4, 'Test', '', 0, 200, 200, 40000, 0, 0, '', '', 'completed', 'eyJpdiI6Ik5XdFJZdHEyM2JHckZEbmZKbERZR2c9PSIsInZhbHVlIjoiOURGN1p6VUlqdlAwVDdlV1J2ckt5dz09IiwibWFjIjoiNzY5YzZlZWJmNTUwOTZiZjg4MGRkNDJjYmM0NDZjYTI2NWE5ZjlkY2E2ZGYzMWQ3N2RjZGM2MWU3NmEzM2E0NSIsInRhZyI6IiJ9', 3, '2023-05-01 06:17:07', '2023-05-02 20:11:46', 0),
(6, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'completed', 'eyJpdiI6IjhHMUQ4NnM2NFMzZG1HdWdZNVh0T2c9PSIsInZhbHVlIjoidWpZa3kyeS8rQ1VCNThnUzdxVzBlQT09IiwibWFjIjoiNzhjNzdjNGJmNjZmNmViNmU4NzIyZDg0Y2IxNjA5YmZiY2VmMzEwYTlkZmFlMjQwYzMyMjk0MjUwNTQ4YmE1NiIsInRhZyI6IiJ9', 6, '2023-05-02 13:30:04', '2023-05-02 20:11:46', 0),
(8, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6InRENzFjVWFwdVdOZE9qTkZhdmFSWHc9PSIsInZhbHVlIjoiWnFVS2lZYzM1R0pud1RFcGExVXJ3QT09IiwibWFjIjoiMjEzNjc0MzFkMzg4YTE4ZmU0MTllZDhlNThkZWRlYWZiMDgxYzJiMDAzMGZmNTQzNzk1MjE4ODBkYjM5YmY5MCIsInRhZyI6IiJ9', 6, '2023-05-06 11:06:28', '2023-05-06 11:06:28', 0),
(9, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6ImRwSVFLSExrYlk4WkFtb2d4WUJNbEE9PSIsInZhbHVlIjoiamJWL0p0bDROUnJTbGpRb3JMRjA3Zz09IiwibWFjIjoiYWEwMjhlZTk0MTgzNmU5ZDYwMTQ5NTI5ZDYxNTczMjA3OWQxOGY1NzRkYTBlMDIxZjVmNmEwZjFhMmNkZjk4NCIsInRhZyI6IiJ9', 6, '2023-05-06 12:18:46', '2023-05-06 12:18:46', 0),
(10, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6IkVjWWd3ZzRycnlWdnptVThtSjFVbFE9PSIsInZhbHVlIjoiY2cyVlgyQ1cycEFQa2JIUkVCQy9FUT09IiwibWFjIjoiM2NkOWI0YzU0NjRiNWYyMmE1ZWY4YTJhN2FmMGVkODU3YWE0ZjM2OWUwZGZhM2Q2MmU2ZDU0MzNiYTlkMGIzMyIsInRhZyI6IiJ9', 6, '2023-05-06 12:23:43', '2023-05-06 12:23:43', 0),
(11, 1, 'Testprodukt', 'test:test\\r\\n\\r\\n', 0, 1000, 1000, 1000000, 0, 0, '', '', 'pending', 'eyJpdiI6InN0UTliazJaR3VGTThpcFRyM2tHSkE9PSIsInZhbHVlIjoiTWhSQTVOOUxDMFRxdW9LS3N4VFpkUT09IiwibWFjIjoiYjJlZTFjM2YxOTk2MTY3YWZiYjY5MGEyZTVjNTAxZTg5MDZlZGZlMDdkNDAwZmUxMTkwMmE4ODRmMGIyZDFhZSIsInRhZyI6IiJ9', 7, '2023-05-06 12:31:03', '2023-05-06 12:31:03', 0),
(12, 1, 'Testprodukt', '', 0, 1000, 1000, 1000000, 0, 0, '', '', 'pending', 'eyJpdiI6InVuSEVoaWNzdzVicEppU1VuR3k5S1E9PSIsInZhbHVlIjoidDJzN09ZaS82T0pZZEdidHJPcjBudz09IiwibWFjIjoiNDBmMDAxMzhkYThmZDMwYzc1YWJiNzcwMjQ2YWY3YTI5Y2ZkMjAzMTkwY2UyOGIwOTk1NzVmYzhjYjU2ZDIyOCIsInRhZyI6IiJ9', 6, '2023-05-06 12:34:34', '2023-05-06 12:34:34', 0),
(13, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6InVuSEVoaWNzdzVicEppU1VuR3k5S1E9PSIsInZhbHVlIjoidDJzN09ZaS82T0pZZEdidHJPcjBudz09IiwibWFjIjoiNDBmMDAxMzhkYThmZDMwYzc1YWJiNzcwMjQ2YWY3YTI5Y2ZkMjAzMTkwY2UyOGIwOTk1NzVmYzhjYjU2ZDIyOCIsInRhZyI6IiJ9', 6, '2023-05-06 12:34:34', '2023-05-06 12:34:34', 0),
(14, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6ImFTUG1heGNZMERXQkNlMzRDY0piTGc9PSIsInZhbHVlIjoiZnJySkVqOStUb1R5NG4wT1Z2WTE1Zz09IiwibWFjIjoiNTI1NGFjM2Y1MzMzN2RiZWVmYTAxMzQ0NzkyMDc0NjEyMzJkZGI3MTY0OTQ0Y2MxNDczMjdkNTVlYWY3Y2NkNCIsInRhZyI6IiJ9', 6, '2023-05-06 12:40:21', '2023-05-06 12:40:21', 0),
(15, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6Iml5cU12eXNkeUNJajBCWGRxcDZkV2c9PSIsInZhbHVlIjoiRnl2bnMzZUM3YWxNU2E1ZnNxbFZ0dz09IiwibWFjIjoiOGY4MmU4ZGM2ZWZjZDY4MDBjNmRmNzRlNjk2ZjNlNjdhZmU2MTg0NWI0MDk2ZWZkOGQwYTk3OWYzNTY2MDgxNiIsInRhZyI6IiJ9', 6, '2023-05-06 12:41:33', '2023-05-06 12:41:33', 0),
(16, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6IkI1bUpXVERTWCs1b2JjODg2eVUwQUE9PSIsInZhbHVlIjoiZGtuQWxFRGhvTEswWFJSZTNyRmsxUT09IiwibWFjIjoiZGQ1NWVmNTJlMmNkNThlNjQ3ZWQ3NGJlNmIwM2ZjMjcxM2Y5NjIwZWUzYjEzOTQzOTgzZDA5MGI1MGI4ZjY2MiIsInRhZyI6IiJ9', 6, '2023-05-06 12:42:47', '2023-05-06 12:42:47', 0),
(17, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6Ikt6U3l2ZVp3WUwvQVl6SUhYb1ZQSVE9PSIsInZhbHVlIjoiWU9CZFlhZkxlS3NNMHFnVHZnNlVBdz09IiwibWFjIjoiMTJjNGE0MjVjYzg0ZjMwZjE1OThjZDhkMjhiOTVkODgyMjZhYWJhYjkyNTRlODA2ZjEyZGU4OTVmM2ZkZTVmZCIsInRhZyI6IiJ9', 6, '2023-05-06 12:42:53', '2023-05-06 12:42:53', 0),
(18, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6ImcxOHBmNnJoMElHdGxtcUgzM3JaY2c9PSIsInZhbHVlIjoiMjRyVmJFRHR2NzlEN2cvSEFNZnVnUT09IiwibWFjIjoiZmEzY2Y4N2MwMWZiMjUyNzBjN2EzMDA5MjE4MjM4YmMyNzJlOGRkOTMxZjRlYTNiNjI3YTYxM2M3N2IzZGMzZSIsInRhZyI6IiJ9', 6, '2023-05-06 12:43:16', '2023-05-06 12:43:16', 0),
(19, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6ImJrQVJEVTBybVpDSnNudHJkTDJkenc9PSIsInZhbHVlIjoiWXFBajZ3RmZZVkRiSUlyQUo5bm02dz09IiwibWFjIjoiMjVmZThjNTc0NTkzNzA2NGVhODBhZWU5MGY4MDRjOTAyMDA1ZmUzMTM4NTZmNGNmMzRjMmVlZWNiMDA1Mjk0MSIsInRhZyI6IiJ9', 6, '2023-05-06 12:43:35', '2023-05-06 12:43:35', 0),
(20, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6ImlUYTdDZEkrQmZoUFFUNjM0NTNpa3c9PSIsInZhbHVlIjoieHNZSmp2TjczTkhxRS9IcUM5NnNrZz09IiwibWFjIjoiNzI4ODkzOTNhMmQwYmYzYTNmYzJjOTc3Yjg0YmJiZmNjNGQ3ZTgzNTRlZjg4N2M4ZmU0OWQ2MjA5ZWU3NGI4YSIsInRhZyI6IiJ9', 6, '2023-05-06 15:06:58', '2023-05-06 15:06:58', 0),
(21, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6IktwamRCSDBwSi9JNUlybEM5d3M3cHc9PSIsInZhbHVlIjoiTGJrdnpXN3VYclNEZEY5UURkdVBZUT09IiwibWFjIjoiNThmYTk1ZjgxNGNjZTUwNjdmMDMwZWE0M2FhNWFmMjY4OWJiZjJlMDA0NjBkM2RhNjIyYjYzZjljZGQ3MjA4OSIsInRhZyI6IiJ9', 6, '2023-05-06 15:14:27', '2023-05-06 15:14:27', 6),
(22, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6IlYrSVRMQ3lEd0FzdmQxcGRSRTNES2c9PSIsInZhbHVlIjoianQ2NTJSNDBRbDdMdUFnUVBGdHpmQT09IiwibWFjIjoiZWFiY2U3MDUyZGQzZjYyOTg1MTdkOGFkNTk3Mzg3MTZhNjY4ZDcxMmRkYzM3NjNmNmQ1Y2QyNzkyMzI1MmY5YiIsInRhZyI6IiJ9', 6, '2023-05-06 15:38:51', '2023-05-06 15:38:51', 6),
(23, 1, 'Testprodukt', '', 0, 1000, 1000, 1000000, 0, 0, '', '', 'pending', 'eyJpdiI6ImhUQmlqaGhaYmRKYmhrejVtdmRKRmc9PSIsInZhbHVlIjoiblVYUHI1SHd5UGlmdVdNUEFzR2RaZz09IiwibWFjIjoiYThhZDk1YTU3NTNkNWJjNmVlOTI4OGM2NzRhNzUyZDA5N2MyNjM0NGNkZTgyYWFhNTQyM2ZkMjdhMDgyMzIyZiIsInRhZyI6IiJ9', 7, '2023-05-06 16:00:17', '2023-05-06 16:00:17', 7),
(24, 1, 'Testprodukt', '', 0, 1000, 1000, 1000000, 0, 0, '', '', 'pending', 'eyJpdiI6IndBell4cWgzdXI2UzZXOFNZaTZKbGc9PSIsInZhbHVlIjoiL29JM1JrNGpTcjNvbTJjKzVvV2s5UT09IiwibWFjIjoiYWNhN2MwMGZmMjJhYmIxZmZkMzQ3ODRkMGRlOGUzYjU4Y2RlZjUzOTFiMDQzNzRlZTQ5YzFjMWVhYWIwOWQ3YyIsInRhZyI6IiJ9', 7, '2023-05-06 17:17:48', '2023-05-06 17:17:48', 7),
(25, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6Im9UVWRET3pPUHZXeWc4b1lZV2FvWFE9PSIsInZhbHVlIjoicnB5WXRvMXpSbVd4cDNldElZSGo0QT09IiwibWFjIjoiNTVkNThjZGUyNjViOTRhNmIyMmMxNjA1OGViMDIyMWYwZjgzNzlkZWE3NDQ1MzA3MWE4NjY0Y2NhZTYyNzI4YyIsInRhZyI6IiJ9', 6, '2023-05-06 19:11:21', '2023-05-06 19:11:21', 6),
(26, 1, 'Test Coin', '', 0, 300, 300, 90000, 0, 0, '', '', 'pending', 'eyJpdiI6Im1Ub1hiSjBad1llYzFuS0ZRNUNaemc9PSIsInZhbHVlIjoibm1VWldTdWdkRXhuZ3BVZlZHSXo5UT09IiwibWFjIjoiNjc0ZjljYTlmYzc2YTg5NjNhNDNjMTI2ZjBiOWU0ZGE2ZDcyOGM3ODI5Nzk4OWU4YjNiY2UzNzRjMzdlMmJkMSIsInRhZyI6IiJ9', 6, '2023-05-07 13:27:36', '2023-05-07 13:27:36', 6),
(27, 1, 'Test Coin', '', 0, 3, 300, 900, 0, 0, '', '', 'pending', 'eyJpdiI6IkFITUx2NUQyUFpkMnpSbWQzQjNNdHc9PSIsInZhbHVlIjoiajNJL0pSWXBqZXhnVnl0UXgvMGFPQT09IiwibWFjIjoiNmJmNDY4OTg3MzIzNDliMGNlNzY3YWZlNzJjYjJkYTA4OWVkZDk1MGFmZTA0MzU2ZWZmYzBkZTRhNjg0NWE0NyIsInRhZyI6IiJ9', 6, '2023-05-09 13:41:44', '2023-05-09 13:41:44', 6),
(28, 1, 'Test Coin', '', 0, 3, 300, 900, 0, 0, '', '', 'pending', 'eyJpdiI6IndGeDNQOFN1eFZCRUQ4OW16RFo2dVE9PSIsInZhbHVlIjoidCtsMGo5V1pPazVCRHRLaFRNOVJkQT09IiwibWFjIjoiNzMxNWYzOTVkZTMyMjkwMzU3YTJmZTlkZDNjYjE2MWI4ZjEwNzRhMjY5ODg3MGM4NjY1YzJmZjM3NzQ2ZjZmYyIsInRhZyI6IiJ9', 6, '2023-05-09 21:09:52', '2023-05-09 21:09:52', 6),
(29, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', NULL, '2023-05-09 21:10:56', '2023-05-09 21:10:56', 9),
(30, 1, 'Test Coin', '', 0, 3, 300, 900, 0, 0, '', '', 'pending', 'eyJpdiI6IlRaZW5ZT0ZKWWJOZkQyMHRncVNRSVE9PSIsInZhbHVlIjoibnhKY0U1dElNcS9HUmRpOVhvd2lQWUt2OU5xQVJ3K2Fab3BibnRpdlZEaz0iLCJtYWMiOiI3ZDVjNTc0NmM2YTMwNzg2MGI0OWYzOTdlMzViODBlOWUxODBhZmNiZTc4MTFmYmQ5OWE2YzYyOTU4Y2FlMzFjIiwidGFnIjoiIn0=', 6, '2023-05-10 12:19:16', '2023-05-10 12:19:16', 6),
(31, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', NULL, '2023-05-10 12:25:40', '2023-05-10 12:25:40', 9),
(32, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', NULL, '2023-05-10 12:26:13', '2023-05-10 12:26:13', 9),
(33, 1, 'Test Coin', '', 0, 3, 300, 900, 0, 0, '', '', 'pending', 'eyJpdiI6Ijg4blVvbFhEWm14RHVZUGJUcXRubXc9PSIsInZhbHVlIjoiNlVvYjd2NENnZXVlOW5YQjZtU1g2R2xnSWl3UjZUWFkxa2RrdnptaWcwWT0iLCJtYWMiOiI2NjQ4MDA0OGI4OTcwYzI3YzM4OTk3ODRhNGNiZGMwZTkzZGJlNmRlNGE5MmNiNmQ5NjE5MWQwY2E0MzY1ODAzIiwidGFnIjoiIn0=', 6, '2023-05-10 12:43:28', '2023-05-10 12:43:28', 6),
(34, 1, 'Test Coin', '', 0, 3, 300, 900, 0, 0, '', '', 'pending', 'eyJpdiI6InJuZHVEM1dTd3lkMkFHNFNoMHBjZlE9PSIsInZhbHVlIjoiem1PdllMQ2xudHZBdDlXbHhuZnJ0UT09IiwibWFjIjoiMjNiNDNmMGFhZjJhOWIyOGViN2U0M2I1MmIxOTM5NGE3OWE1OGQ2OGM4MWUwMDY3OTU0MDA1YTUxNzU5MjI5ZiIsInRhZyI6IiJ9', 6, '2023-05-10 13:04:40', '2023-05-10 13:04:40', 6),
(35, 8, 'Test Coin', '', 0, 3, 300, 900, 0, 0, '', '', 'pending', 'eyJpdiI6IjlMbnpZcHJxRmVhejB1SzR2RytMWVE9PSIsInZhbHVlIjoiSGVjaS8zaFh3OUdsTzAvakhVbW13dz09IiwibWFjIjoiMWNjYjQ0NmY2NjgxYzM5ZjUyMDg5MDk1ZWFhZWJjZmZmNzFkNmQxNDBlOGM4ZDkwYzRkYzU2NTM3OTgwZjM0MCIsInRhZyI6IiJ9', 6, '2023-05-10 13:17:37', '2023-05-10 13:17:37', 6),
(36, 8, 'Test Coin', '', 0, 3, 300, 900, 0, 0, '', '', 'pending', 'eyJpdiI6ImsvZ1J2YzRONElacmRIc2U2SXhVekE9PSIsInZhbHVlIjoiKyt3REFON3dXRTJxZDdZQWt6cDUxUT09IiwibWFjIjoiNGE0YjcyYmU4ZDAxZTk2ZTk0MDQwMWE3ODljZDlhMjM4OWI0M2Y4ZWI1ZWRmY2U4NjdkNjI4Zjc3ZDBiMjM3NSIsInRhZyI6IiJ9', 6, '2023-05-10 13:23:14', '2023-05-10 13:23:14', 6),
(38, 1, 'Testprodukt', '', 0, 10, 1000, 10000, 0, 0, '', '', 'pending', 'eyJpdiI6Ik1qRlV2RVloWVpyYVFrL1R3QlphclE9PSIsInZhbHVlIjoiUjV4RkNpR3RMMzYxU1h1aHBZVGNxOC9CRHZVcUVsL3VZZGtvdDNQSWdEaz0iLCJtYWMiOiIyYzAxODQ4NTU0NGIwMmZkN2UwMzNmNDFkMmRhODc0OGZkMzIxYWVhZDZlYTAxYzRhNWY0YmE2YThlNTdkYmJiIiwidGFnIjoiIn0=', 7, '2023-05-10 13:44:57', '2023-05-10 13:44:57', 7),
(39, 1, 'Testprodukt', 'test\\r\\n\\r\\n', 0, 10, 1000, 10000, 0, 0, '', '', 'pending', 'eyJpdiI6IlA4cnNEY3BEWmk1ZUticnovR0hqRUE9PSIsInZhbHVlIjoieDNGVEpDbjF1akpwOE9yZlc5WnZPQT09IiwibWFjIjoiNDE0Y2I3OGFlNjVmZGNlNWFlY2Q4ZWZlNGEwNTA2NTNlOWVhYWJlMjhiMmM2MTQwYjg2MDk4MzEyMDJiNGE1MyIsInRhZyI6IiJ9', 7, '2023-05-11 12:25:28', '2023-05-11 12:25:28', 7),
(40, 1, 'Alvin Langley', 'test\r\\r\\n\\r\\ntest\\r\\n\\r\\n', 0, 100, 135, 13500, 0, 0, '', '', 'nothing', '', 20, '2023-05-11 14:50:19', '2023-05-11 14:50:19', 20),
(41, 1, 'Nezes Resrprodukt', 'LeahOswalds5002@gmx.de:DQwmQVcQMfnBgY6T\r\nAvaralphss9077@gmx.de:0UjHP3rCr7PqtG3d\r\nandreamacadams5149@gmx.de:bEicUORMz3ntTK5C\r\nshirleysmiths6612@gmx.de:pLUnzQY6RqRyvrDz\r\npatriciaGrahams1884@gmx.de:SNLN5bJ3CGcM8Tm6\\r\\n\\r\\n', 0, 1, 150, 150, 0, 0, '', '', 'nothing', '', 21, '2023-05-11 14:51:14', '2023-05-11 14:51:14', 21),
(42, 1, 'Zeph Porter', '', 0, 0, 86, 86, 0, 0, '', '', 'nothing', '', 17, '2023-05-11 14:54:27', '2023-05-11 14:54:27', 17),
(43, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', 9, '2023-05-11 15:12:02', '2023-05-11 15:12:02', 9),
(44, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', 9, '2023-05-11 15:12:23', '2023-05-11 15:12:23', 9),
(45, 1, 'test11', '', 0, 5, 100, 100, 0, 0, '', '', 'nothing', '', 9, '2023-05-11 15:12:32', '2023-05-11 15:12:32', 9),
(46, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', 9, '2023-05-11 15:33:44', '2023-05-11 15:33:44', 9),
(47, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', 9, '2023-05-11 15:34:07', '2023-05-11 15:34:07', 9),
(48, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', 9, '2023-05-11 15:35:56', '2023-05-11 15:35:56', 9),
(49, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', 9, '2023-05-11 15:37:49', '2023-05-11 15:37:49', 9),
(50, 1, 'Another Test Product', '', 0, 8, 1000, 1000, 0, 0, '', '', 'nothing', '', 26, '2023-05-11 16:18:13', '2023-05-11 16:18:13', 26),
(51, 1, 'Another Test Product', '', 0, 1, 1000, 1000, 0, 0, '', '', 'nothing', '', 26, '2023-05-12 06:20:24', '2023-05-12 06:20:24', 26),
(52, 1, 'test11', '', 0, 1, 100, 100, 0, 0, '', '', 'nothing', '', 9, '2023-05-12 17:43:50', '2023-05-12 17:43:50', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_orders_notes`
--

CREATE TABLE `lv_users_orders_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_users_orders_notes`
--

INSERT INTO `lv_users_orders_notes` (`id`, `order_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 2, 'eyJpdiI6ImgxZzRIUjJkQTEwdnNvUGd4Umo0cnc9PSIsInZhbHVlIjoiMjkvNXBFSG9Eb3ROZlJJTjZFTGYvUDg2VVBseEo0SUEzNnJNcURTWTkxUT0iLCJtYWMiOiI4N2I4ZWQwNGU5NWFlOWU4Y2YxMTUyNmYxNzMwZmIwOTFkZGRiNjhiNjQyNTcxZmEwMDQ5MjUyOGU3ZWMwYzEzIiwidGFnIjoiIn0=', '2023-04-30 08:51:19', '2023-04-30 08:51:19'),
(2, 7, 'eyJpdiI6IjVJUXBZV1JkUmF5QzlTbzFUaDc4b2c9PSIsInZhbHVlIjoiV213bXhzclpaM0IrZnBneVV3WWdJdz09IiwibWFjIjoiZjJiZjkyMjE1YWFjODU1OTU0Y2ZkMmUzYjJhN2I4YTdmODlkYjJkMTUwZjk0OTIwM2JkZmNkOGQ2MjdlM2ExNCIsInRhZyI6IiJ9', '2023-05-02 20:11:26', '2023-05-02 20:11:26'),
(3, 19, 'eyJpdiI6IlVTMjhiVnFsNG1iN3YwdDJqTzJFaXc9PSIsInZhbHVlIjoiYUpxSmtrL3pNNzE0RnpaQTlnZzQ4dz09IiwibWFjIjoiNjcwZTYyMjY1MmM1YWNkNWZjM2Q1NWY1MDhhMjdlNDNjZTM4NzlhYmI5MzBjNmZkODM0MDMzN2RjZDQ5M2Q0MiIsInRhZyI6IiJ9', '2023-05-06 14:40:13', '2023-05-06 14:40:13'),
(4, 19, 'eyJpdiI6IklNYUtQbVAzQ2tEUFlIK1BsdW4xZWc9PSIsInZhbHVlIjoiY3VIQ05IR1hKV3o5aFpEM1R2T2pyQT09IiwibWFjIjoiNWE2MjY5NjA5ZDA3Yzk5MWRhYWNiMzI3MWJmMWRhZGQ4OWU3MGYyZjc2YzIxMzQ3MGI2YzA1ZjRiOWRmNTU4MiIsInRhZyI6IiJ9', '2023-05-06 14:40:26', '2023-05-06 14:40:26'),
(5, 37, 'eyJpdiI6IlJXNkxrNGF1QllFZlhkVU5GYmo3R3c9PSIsInZhbHVlIjoicEVITUdDb3I5OXl6UXgrMTFPeWxzQT09IiwibWFjIjoiODk0MjM0M2NhNmMwOTI0MDMzZjg5NmQwM2NmMzllNWEyNDlkZGIxMGE3ZjQxYmRkYTA5YjFlMDE2NWQ2ODMwNyIsInRhZyI6IiJ9', '2023-05-10 13:38:17', '2023-05-10 13:38:17'),
(6, 42, 'eyJpdiI6IlF3Q1FaNUp3cCs0R29YdzRqazlSNmc9PSIsInZhbHVlIjoiQlJKZTlFT3FMTDlaU1ZIdnF3VExld2IwWlpzMlVnOFA2VWxJL014T1Fpdz0iLCJtYWMiOiIxYTJkOTMzZTdjMzFmYjFkOGIyMGMyMWYzZGNjZGE5ZjUzMGYzNzAxYzc5YmJlMzdjMWE2NWQyZTQ5NWM3NTFhIiwidGFnIjoiIn0=', '2023-05-11 15:10:34', '2023-05-11 15:10:34'),
(7, 51, 'eyJpdiI6IkU1V2tWTm5KMDJvZzc3MmxWblY5Snc9PSIsInZhbHVlIjoiRkY1UktpOHlTN000b1ZwQzlvcTJCazN1Lys1VVM4QkpoUVptbVoxdnpWRnNVUXBSQk5CbzZEaFdEVHVHOVR2NiIsIm1hYyI6IjY1YmRkOWUwOTA0MjFjMzZjMmFiN2JkNjkyYWY0YmQ4NDRhOGVlNWY4NTY0YmI4OTUxZmRlZjJiNTlkMGRiYWUiLCJ0YWciOiIifQ==', '2023-05-15 12:34:14', '2023-05-15 12:34:14');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_permissions`
--

CREATE TABLE `lv_users_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `permission_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_users_permissions`
--

INSERT INTO `lv_users_permissions` (`id`, `user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(2, 1, 2, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(3, 1, 3, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(4, 1, 4, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(5, 1, 5, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(6, 1, 6, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(7, 1, 7, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(8, 1, 8, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(9, 1, 9, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(10, 1, 10, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(11, 1, 11, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(12, 1, 12, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(13, 1, 13, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(14, 1, 14, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(15, 1, 15, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(16, 1, 16, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(17, 1, 17, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(18, 1, 18, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(19, 1, 19, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(20, 1, 20, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(21, 1, 21, '2023-04-19 18:49:42', '2023-04-19 18:49:42'),
(22, 1, 22, '2023-04-19 18:49:42', '2023-04-19 18:49:42');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_tickets`
--

CREATE TABLE `lv_users_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `status` enum('closed','open') NOT NULL DEFAULT 'open',
  `read_status` int(11) NOT NULL DEFAULT 0,
  `subject` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_users_tickets`
--

INSERT INTO `lv_users_tickets` (`id`, `user_id`, `category_id`, `status`, `read_status`, `subject`, `content`, `created_at`, `updated_at`) VALUES
(21, 10, 1, 'open', 1, 'Testing', 'eyJpdiI6IlRjZ29rb1BUb201U2hIZ0ZMY0twK2c9PSIsInZhbHVlIjoiNGxLeFRodnBPQWZ4aFZybW1BMGd2WXlUdnVsbzBsamozajViN09HejZPVT0iLCJtYWMiOiI1NGY0NjA0YjlhZDU2MDBhMjQ3ODdjY2ZjOWM5MjJjOTQwNDg2ZTkwZDA5MmUyY2JiNjVlYjNlMDNhMGY0NmE1IiwidGFnIjoiIn0=', '2023-05-10 14:29:54', '2023-05-11 15:12:24'),
(22, 1, 13, 'open', 1, 'test ticket', 'eyJpdiI6IjNia3JOTU5uRFgxWVFBNkhjQ2tJZUE9PSIsInZhbHVlIjoiekUxZ0dJRFpiNW54MFhkQ1I4VzhtenQzWUl0SHJ6bExhSGZsNktmS2ZsWT0iLCJtYWMiOiIxM2JlOTBkZTdiNjhjYjYwMGMxNjI3ZjkxZTU0NTA4M2UxM2RiYWFmMmNhOTMyZmRkZmMzMTFkNjA2MDdkZmYwIiwidGFnIjoiIn0=', '2023-05-11 14:58:50', '2023-05-15 12:11:43'),
(23, 10, 1, 'open', 1, 'Testing', 'eyJpdiI6IlRjZ29rb1BUb201U2hIZ0ZMY0twK2c9PSIsInZhbHVlIjoiNGxLeFRodnBPQWZ4aFZybW1BMGd2WXlUdnVsbzBsamozajViN09HejZPVT0iLCJtYWMiOiI1NGY0NjA0YjlhZDU2MDBhMjQ3ODdjY2ZjOWM5MjJjOTQwNDg2ZTkwZDA5MmUyY2JiNjVlYjNlMDNhMGY0NmE1IiwidGFnIjoiIn0=', '2023-05-10 14:29:54', '2023-05-11 15:12:24'),
(24, 1, 13, 'open', 1, 'test ticket', 'eyJpdiI6IjNia3JOTU5uRFgxWVFBNkhjQ2tJZUE9PSIsInZhbHVlIjoiekUxZ0dJRFpiNW54MFhkQ1I4VzhtenQzWUl0SHJ6bExhSGZsNktmS2ZsWT0iLCJtYWMiOiIxM2JlOTBkZTdiNjhjYjYwMGMxNjI3ZjkxZTU0NTA4M2UxM2RiYWFmMmNhOTMyZmRkZmMzMTFkNjA2MDdkZmYwIiwidGFnIjoiIn0=', '2023-05-11 14:58:50', '2023-05-15 12:11:43');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_tickets_categories`
--

CREATE TABLE `lv_users_tickets_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_users_tickets_categories`
--

INSERT INTO `lv_users_tickets_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TESTING', '2023-04-24 22:27:12', '2023-05-10 14:24:28'),
(12, 'Test 2', '2023-05-10 14:40:28', '2023-05-10 14:40:28'),
(13, 'Other Coin', '2023-05-11 15:22:14', '2023-05-11 15:22:14');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_tickets_replies`
--

CREATE TABLE `lv_users_tickets_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `ticket_id` int(11) NOT NULL DEFAULT 0,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `lv_users_tickets_replies`
--

INSERT INTO `lv_users_tickets_replies` (`id`, `user_id`, `ticket_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'eyJpdiI6IjkzT1BJT2NYR1BEc0dYOCtpOWRqNmc9PSIsInZhbHVlIjoieEFsNjV2eXRndjZpa3NMcTJ2bE5jZz09IiwibWFjIjoiYTEzMWI1YjU5MWZjNjY0MDdlY2I3MGZjZDdkYzkyMTk5MmUwMGIyOWJhM2I4ZWViMjgyZWQ3YzhiODMwNjVjOCIsInRhZyI6IiJ9', '2023-04-26 12:30:27', '2023-04-26 12:30:27'),
(2, 1, 11, 'eyJpdiI6ImJXUjlBY1ZnWkhXRDBlSTJQQk5jL3c9PSIsInZhbHVlIjoiYzlRZ1NDV1NBNHRTWnVlRmVtcFp5UT09IiwibWFjIjoiYzY1ZDc5NDlhNGMxOTUwZTA0MTNiZjAwZjQ0ZjQ0MWY3MWZhNmEyYWRiY2FjMjEyYmEwODU0Y2Y5ZmQwOTY4YiIsInRhZyI6IiJ9', '2023-04-27 14:02:20', '2023-04-27 14:02:20'),
(3, 1, 17, 'eyJpdiI6Im40cDJqWktWcy9xcG9CSWc1UXhMc2c9PSIsInZhbHVlIjoiTFh1THFDU0t0Ulp5NTNLbWREajgwZz09IiwibWFjIjoiN2U1OTNlZjFlNGJmMmQxMmI1MGRlYWM2OGY1MmI0ODkyNWM0M2M2NTgxNTlmOGY5Mzg1MmI4ZWZhMzJiZWJlOSIsInRhZyI6IiJ9', '2023-05-10 12:38:36', '2023-05-10 12:38:36'),
(4, 1, 17, 'eyJpdiI6IjhTMmNkRDhsQ3JEbjhGaC94OU0xbHc9PSIsInZhbHVlIjoiYUtNQngyZXA5SlI1QlpQVkZNVzQ0UT09IiwibWFjIjoiMDRjM2Y3NjU3NThjYjAxMzY2NmYyYjcxYmI1MDA3NzY2MjE3MDdkNjIxZDc0OGJiMjg5MDNlYWIxNWJhMWYzOSIsInRhZyI6IiJ9', '2023-05-10 12:39:34', '2023-05-10 12:39:34'),
(5, 1, 20, 'eyJpdiI6IngwRGMzc2Q3MFNOMHdKTng5cnR2MlE9PSIsInZhbHVlIjoieWNFdFo0YmN5YWpPdk5qTXR2REE4QT09IiwibWFjIjoiNDQ5MDQ3MDQ4Nzk0OWJlZGRhMWNiZTM4MjE3MTYwZGUzOTY3ZWY2NDlhYTJhNWM1OTRjZGVmYmMxZjliMTIzYiIsInRhZyI6IiJ9', '2023-05-10 14:17:12', '2023-05-10 14:17:12'),
(6, 1, 22, 'eyJpdiI6IkdjVTRwSkNQN0E0NW5pajdzalRRSWc9PSIsInZhbHVlIjoiQzVrNXdZeFoxTHpLWXkydEhvcyt5VFN1blpBaVpQWldHejdnYmNjQmZoYz0iLCJtYWMiOiIwM2JhZTYzZDY0ZTMzOWNmM2QxZDU2MTU4ZWZhZWNlMzM1NWUzMWYyMDI2YmQwOGIxMDhhYWNhN2QyNWRhZWQ3IiwidGFnIjoiIn0=', '2023-05-15 12:11:55', '2023-05-15 12:11:55');

-- --------------------------------------------------------

--
-- Структура таблицы `lv_users_transactions`
--

CREATE TABLE `lv_users_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `wallet` text DEFAULT NULL,
  `txid` text DEFAULT NULL,
  `status` enum('paid','pending','waiting') NOT NULL DEFAULT 'waiting',
  `payment_method` varchar(255) NOT NULL DEFAULT 'btc',
  `amount` bigint(20) NOT NULL DEFAULT 0,
  `amount_cent` bigint(20) NOT NULL DEFAULT 0,
  `confirmations` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lv_articles`
--
ALTER TABLE `lv_articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_bonus_settings`
--
ALTER TABLE `lv_bonus_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_coupons`
--
ALTER TABLE `lv_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_delivery_methods`
--
ALTER TABLE `lv_delivery_methods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_faqs`
--
ALTER TABLE `lv_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_faqs_categories`
--
ALTER TABLE `lv_faqs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_marques`
--
ALTER TABLE `lv_marques`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_medias`
--
ALTER TABLE `lv_medias`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_migrations`
--
ALTER TABLE `lv_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_notifications`
--
ALTER TABLE `lv_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_password_resets`
--
ALTER TABLE `lv_password_resets`
  ADD KEY `lv_password_resets_email_index` (`email`);

--
-- Индексы таблицы `lv_permissions`
--
ALTER TABLE `lv_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lv_permissions_permission_unique` (`permission`);

--
-- Индексы таблицы `lv_products`
--
ALTER TABLE `lv_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_products_bonus`
--
ALTER TABLE `lv_products_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_products_categories`
--
ALTER TABLE `lv_products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_products_items`
--
ALTER TABLE `lv_products_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_settings`
--
ALTER TABLE `lv_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_shops`
--
ALTER TABLE `lv_shops`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_translations`
--
ALTER TABLE `lv_translations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users`
--
ALTER TABLE `lv_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lv_users_username_unique` (`username`),
  ADD UNIQUE KEY `lv_users_jabber_id_unique` (`jabber_id`),
  ADD UNIQUE KEY `lv_users_email_unique` (`email`);

--
-- Индексы таблицы `lv_users_cart`
--
ALTER TABLE `lv_users_cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_carts_entries`
--
ALTER TABLE `lv_users_carts_entries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_carts_shoppings`
--
ALTER TABLE `lv_users_carts_shoppings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_coupons`
--
ALTER TABLE `lv_users_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_coupons_checkouts`
--
ALTER TABLE `lv_users_coupons_checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_orders`
--
ALTER TABLE `lv_users_orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_orders_notes`
--
ALTER TABLE `lv_users_orders_notes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_permissions`
--
ALTER TABLE `lv_users_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_tickets`
--
ALTER TABLE `lv_users_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_tickets_categories`
--
ALTER TABLE `lv_users_tickets_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_tickets_replies`
--
ALTER TABLE `lv_users_tickets_replies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lv_users_transactions`
--
ALTER TABLE `lv_users_transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lv_articles`
--
ALTER TABLE `lv_articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_bonus_settings`
--
ALTER TABLE `lv_bonus_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `lv_coupons`
--
ALTER TABLE `lv_coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `lv_delivery_methods`
--
ALTER TABLE `lv_delivery_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_faqs`
--
ALTER TABLE `lv_faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `lv_faqs_categories`
--
ALTER TABLE `lv_faqs_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `lv_marques`
--
ALTER TABLE `lv_marques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `lv_medias`
--
ALTER TABLE `lv_medias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_migrations`
--
ALTER TABLE `lv_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `lv_notifications`
--
ALTER TABLE `lv_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_permissions`
--
ALTER TABLE `lv_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `lv_products`
--
ALTER TABLE `lv_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `lv_products_bonus`
--
ALTER TABLE `lv_products_bonus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_products_categories`
--
ALTER TABLE `lv_products_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `lv_products_items`
--
ALTER TABLE `lv_products_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `lv_settings`
--
ALTER TABLE `lv_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `lv_shops`
--
ALTER TABLE `lv_shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_translations`
--
ALTER TABLE `lv_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `lv_users`
--
ALTER TABLE `lv_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `lv_users_cart`
--
ALTER TABLE `lv_users_cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT для таблицы `lv_users_carts_entries`
--
ALTER TABLE `lv_users_carts_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_users_carts_shoppings`
--
ALTER TABLE `lv_users_carts_shoppings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_users_coupons`
--
ALTER TABLE `lv_users_coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_users_coupons_checkouts`
--
ALTER TABLE `lv_users_coupons_checkouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `lv_users_orders`
--
ALTER TABLE `lv_users_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `lv_users_orders_notes`
--
ALTER TABLE `lv_users_orders_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `lv_users_permissions`
--
ALTER TABLE `lv_users_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `lv_users_tickets`
--
ALTER TABLE `lv_users_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `lv_users_tickets_categories`
--
ALTER TABLE `lv_users_tickets_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `lv_users_tickets_replies`
--
ALTER TABLE `lv_users_tickets_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `lv_users_transactions`
--
ALTER TABLE `lv_users_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
