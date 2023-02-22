-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 06:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tablefinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `link`, `text`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'https://www.thetabletopgameshop.com/', 'The Table Top Game Shop', 'slide1.jpg', 1, NULL, NULL),
(2, 'https://www.redbubble.com/', 'BUY NOW - 20% OFF', 'slide2.jpg', 1, NULL, NULL),
(3, 'https://www.board-game.co.uk/', 'Buy Board Games', 'slide3.jpg', 1, NULL, NULL),
(7, 'neki link11', 'test update1', '1646953121-Screenshot_2.jpg', 0, '2022-03-10 20:36:09', '2022-03-12 15:35:07'),
(9, '1234hfhfhf', 'added ad', '1647102959-img9.jpg', 0, '2022-03-12 15:35:59', '2022-03-12 15:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `table_id`, `user_id`, `text`, `created_at`, `updated_at`) VALUES
(2, 5, 12, 'Quas voluptas corrupti soluta praesentium. Vel omnis enim sit est ea ex. Doloribus non quia ut et quibusdam officiis. Quidem qui magnam repellendus nulla voluptates enim numquam.', '2022-03-09 13:02:41', NULL),
(3, 6, 6, 'Facere fugiat autem ea sint sint. Suscipit quae porro est eos aliquid id. Beatae facilis est aliquid ut hic.', '2022-03-09 13:02:41', NULL),
(4, 3, 12, 'Tenetur dolorem sint est est expedita culpa omnis. Repudiandae ipsum dolores et voluptatem placeat esse officiis. Eaque corrupti rerum autem vero consectetur. Et magni est nam perspiciatis ad reiciendis.', '2022-03-09 13:02:41', NULL),
(5, 10, 1, 'Quae repudiandae quibusdam incidunt optio aperiam quo voluptatem. Qui voluptatem quam omnis quaerat magni fugit. In quisquam maxime impedit inventore.', '2022-03-09 13:02:41', NULL),
(6, 11, 5, 'Quis praesentium nobis sed iure doloribus sit tempora. Libero totam deleniti natus id. Sed enim reprehenderit voluptas sint consequuntur ipsum. Facilis possimus consequatur ut debitis ratione voluptatem.', '2022-03-09 13:02:41', NULL),
(7, 9, 3, 'Aperiam voluptatem consequuntur totam quia cumque vitae est. Eum quis et laboriosam temporibus et. Unde nesciunt aperiam minima blanditiis aut quos. Omnis consequuntur ut consequuntur voluptatum iusto.', '2022-03-09 13:02:41', NULL),
(9, 1, 20, 'Impedit dolores voluptatem quia qui. Optio et asperiores numquam itaque dolorum voluptatem deserunt.', '2022-03-09 13:02:41', NULL),
(11, 7, 17, 'Est nisi reiciendis quia incidunt est itaque. Eos odio ratione qui. Impedit enim totam quod explicabo cum hic magnam repellendus.', '2022-03-09 13:02:41', NULL),
(12, 10, 18, 'Numquam quisquam omnis placeat. Iusto libero ut nisi. Voluptas et quo at numquam qui non.', '2022-03-09 13:02:41', NULL),
(13, 10, 18, 'Temporibus enim soluta illo quo suscipit et. Ipsum ut et recusandae libero ab sunt. Sed saepe aut quo maiores illo et. Et rerum officia voluptatem id non. Officiis corporis quam esse consequuntur. Nostrum accusamus quia ut.', '2022-03-09 13:02:41', NULL),
(14, 2, 12, 'Nulla veniam voluptatem commodi. Dolore et omnis earum. Sunt eaque omnis nulla. Adipisci consequatur qui id repudiandae ut et aliquam. Occaecati dignissimos eos corporis voluptate qui. Quod aut dolor quia quis sed aut.', '2022-03-09 13:02:41', NULL),
(16, 11, 8, 'Rem minus soluta incidunt aut tenetur. Aut aut consequatur voluptatum aut. Molestiae ut cumque adipisci modi.', '2022-03-09 13:02:41', NULL),
(17, 7, 4, 'Id quos quibusdam aut. Et qui non possimus modi et placeat sit. Dolorem quia corrupti quas repudiandae et explicabo.', '2022-03-09 13:02:41', NULL),
(18, 7, 3, 'Distinctio excepturi voluptatibus voluptas ratione harum vel qui aliquid. Voluptatem et possimus ipsum. Sunt reiciendis autem veritatis placeat. Illo labore qui repellat consequatur.', '2022-03-09 13:02:41', NULL),
(19, 3, 15, 'Praesentium dolorum amet consequuntur. Voluptatem reprehenderit est nulla amet autem excepturi nihil. Quia qui hic repellat eos deleniti commodi. Laudantium vero ipsum consequatur officia.', '2022-03-09 13:02:41', NULL),
(20, 8, 14, 'Cum nostrum laboriosam ea. Sapiente non amet similique et voluptatem eligendi. Fuga dignissimos et facere dolor. Quo dolorem et laudantium. Earum quia minima laborum odit aut temporibus et. Mollitia soluta ullam recusandae voluptas aut nesciunt vel.', '2022-03-09 13:02:41', NULL),
(21, 12, 7, 'Autem mollitia quis ad autem temporibus. Quibusdam et culpa ullam rerum voluptatum laudantium sapiente ullam. Sunt non omnis quam neque beatae sit facere vel.', '2022-03-09 13:02:41', NULL),
(22, 12, 6, 'Et quos eligendi eos a. Autem nihil unde qui nam molestiae quis. Suscipit distinctio amet et accusamus voluptatem soluta nostrum. Deleniti et perferendis temporibus velit eius minima praesentium.', '2022-03-09 13:02:41', NULL),
(23, 3, 9, 'Ipsam fugit debitis magnam et. Reprehenderit cupiditate nihil quis eos quod maxime velit. Tenetur quibusdam iste ut eos quo amet aspernatur. Temporibus sint ut dolore eum impedit deleniti.', '2022-03-09 13:02:41', NULL),
(25, 1, 2, 'Dolorem velit mollitia quis. Architecto odit necessitatibus qui dolorem enim. Quo cumque neque ea unde eveniet dolor et. Beatae fuga at doloribus quia.', '2022-03-09 13:02:41', NULL),
(26, 6, 3, 'Sit ipsam adipisci aut aut ut. Odio aut eum ut impedit facere suscipit qui optio. Similique repellendus corrupti alias. Dolorum et quisquam aperiam qui.', '2022-03-09 13:02:41', NULL),
(27, 9, 6, 'Quam dicta repudiandae sed aperiam est asperiores et. Et cupiditate explicabo quas. Molestiae sunt ut et totam nesciunt. Aperiam non amet pariatur et non nesciunt.', '2022-03-09 13:02:41', NULL),
(28, 1, 12, 'Nostrum laboriosam esse est sint libero magni tempore. Et in nihil labore molestias in. Voluptas fugiat nulla enim molestiae autem. Commodi et qui minima. Eius similique vitae vel consequatur repudiandae iusto ea. Optio nulla eum velit tempora minima consequatur vero.', '2022-03-09 13:02:41', NULL),
(29, 12, 1, 'Architecto alias ea esse sapiente ducimus. Sequi sunt labore error fugiat eius. Dolorem optio rerum optio ipsa. In illum accusamus consectetur praesentium doloribus quo maxime.', '2022-03-09 13:02:41', NULL),
(30, 6, 1, 'Et in fuga vitae commodi. Unde placeat voluptatum commodi dolor. Corrupti eum veritatis provident aut rerum quas dolores quis.', '2022-03-09 13:02:41', NULL),
(32, 5, 2, 'Changed comment test5555', '2022-03-09 14:28:03', '2022-03-09 15:35:33'),
(33, 1, 2, 'Just a random comment idk change', '2022-03-09 15:15:25', '2022-03-09 15:15:40'),
(34, 20, 2, 'This is a new comment', '2022-03-11 19:18:18', '2022-03-11 19:18:18'),
(35, 20, 2, 'This is edited!', '2022-03-11 19:20:45', '2022-03-11 19:29:59'),
(37, 4, 25, 'Commenting for engagement', '2022-03-12 12:51:43', '2022-03-12 12:51:43'),
(38, 3, 25, 'Edited comment Vestibulum et elit elit. Vivamus eget lacus diam. Nam et lorem libero. Nunc hendrerit velit sed massa euismod convallis. Nulla posuere erat a mauris malesuada, vel imperdiet sem blandit. Suspendisse dictum ut diam sed elementum. Integer aliquet eu magna at rutrum. Mauris sed rhoncus ipsum', '2022-03-12 13:24:27', '2022-03-12 13:24:38'),
(40, 25, 25, 'Suspendisse consectetur nunc metus. Nam tempor nunc vel imperdiet imperdiet.', '2022-03-12 13:25:11', '2022-03-12 13:25:11'),
(41, 2, 25, 'Little comment idk', '2022-03-12 13:27:20', '2022-03-12 13:27:20'),
(42, 2, 2, 'kommmmmentar', '2022-03-12 15:27:49', '2022-03-12 15:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Monday', NULL, NULL),
(2, 'Tuesday', NULL, NULL),
(3, 'Wednesday', NULL, NULL),
(4, 'Thursday', NULL, NULL),
(5, 'Friday', NULL, NULL),
(6, 'Saturday', NULL, NULL),
(7, 'Sunday', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `day_table`
--

CREATE TABLE `day_table` (
  `id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_table`
--

INSERT INTO `day_table` (`id`, `day_id`, `table_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 3, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(6, 3, 6, NULL, NULL),
(7, 6, 7, NULL, NULL),
(8, 7, 8, NULL, NULL),
(9, 7, 9, NULL, NULL),
(10, 5, 10, NULL, NULL),
(11, 3, 11, NULL, NULL),
(12, 6, 12, NULL, NULL),
(13, 5, 1, NULL, NULL),
(16, 1, 5, NULL, NULL),
(17, 3, 5, NULL, NULL),
(18, 5, 5, NULL, NULL),
(30, 1, 20, NULL, NULL),
(31, 3, 20, NULL, NULL),
(32, 4, 20, NULL, NULL),
(36, 5, 22, NULL, NULL),
(37, 6, 22, NULL, NULL),
(38, 7, 22, NULL, NULL),
(39, 2, 23, NULL, NULL),
(40, 3, 23, NULL, NULL),
(41, 4, 23, NULL, NULL),
(42, 6, 24, NULL, NULL),
(43, 7, 24, NULL, NULL),
(44, 3, 25, NULL, NULL),
(45, 4, 25, NULL, NULL),
(46, 4, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game_roles`
--

CREATE TABLE `game_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_roles`
--

INSERT INTO `game_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Game Master', NULL, NULL),
(2, 'Player Character', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `game_systems`
--

CREATE TABLE `game_systems` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_systems`
--

INSERT INTO `game_systems` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dungeons and Dragons', NULL, NULL),
(2, 'Call of Cthulhu', NULL, NULL),
(3, 'Warhammer Fantasy Roleplay', NULL, NULL),
(4, 'Genesys', NULL, NULL),
(5, 'Pathfinder', NULL, NULL),
(6, 'Castles & Crusades', NULL, NULL),
(7, 'Mothership', NULL, NULL),
(8, 'Homebrew', NULL, NULL),
(9, 'Shadowrun', NULL, NULL),
(10, 'Exalted', NULL, NULL),
(11, 'Vampire: The Masquerade 5th Ed', NULL, NULL),
(12, '2d20', NULL, NULL),
(13, 'Test: system131', '2022-03-11 13:53:12', '2022-03-12 15:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Beginner', NULL, NULL),
(2, 'Intermediate', NULL, NULL),
(3, 'Advanced', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `route`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 0, NULL, NULL),
(2, 'Author', 'author', 0, NULL, NULL),
(3, 'Log In', 'login', 1, NULL, NULL),
(4, 'Sign Up', 'register', 1, NULL, NULL),
(5, 'Contact', 'contact', 0, NULL, NULL),
(6, 'Tables', 'tables', 2, NULL, NULL),
(7, 'Account', 'account', 2, NULL, NULL),
(8, 'Admin', 'admin', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'josjedan@rand.om', 'Neki naslov', 'Msgmsgmsgmsg', '2022-03-09 23:17:42', '2022-03-09 23:17:42'),
(3, 'neki123@yahoo.com', 'Naslov', 'Teksttesktsketkestsktekst', '2022-03-12 13:32:23', '2022-03-12 13:32:23'),
(4, 'another@one.com', 'This is the subject', 'This is the message', '2022-03-12 13:33:14', '2022-03-12 13:33:14'),
(5, 'this@one.too', 'Subjsubject', 'Msgmsgmsgmsmgsmgsmgmsg', '2022-03-12 13:34:02', '2022-03-12 13:34:02'),
(6, 'gogo@power.ran', 'Idk', 'Abcdreslksgjlskjitjlskgm neka poruka', '2022-03-12 13:34:52', '2022-03-12 13:34:52'),
(7, 'tmnt@nin.trt', 'Subject subject', 'Meeeeeeeessage', '2022-03-12 13:35:37', '2022-03-12 13:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_03_02_175015_create_roles_table', 1),
(4, '2022_03_02_181353_create_users_table', 1),
(5, '2022_03_02_185127_create_game_roles_table', 1),
(6, '2022_03_02_185913_create_users_game_roles_table', 1),
(8, '2022_03_02_192025_create_game_systems_table', 1),
(9, '2022_03_02_190930_create_menus_table', 2),
(11, '2022_03_05_152818_create_days_table', 3),
(12, '2022_03_05_184846_create_levels_table', 4),
(13, '2022_03_05_191407_create_tables_table', 5),
(14, '2022_03_05_192539_create_day_table_table', 6),
(15, '2022_03_09_131040_create_comments_table', 7),
(16, '2022_03_09_214401_create_messages_table', 8),
(17, '2022_03_10_164010_create_socials_table', 9),
(18, '2022_03_10_170641_create_ads_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `link`, `created_at`, `updated_at`) VALUES
(1, 'twitter', 'https://twitter.com/', NULL, NULL),
(2, 'facebook', 'https://www.facebook.com/', NULL, NULL),
(3, 'instagram', 'https://www.instagram.com/', NULL, NULL),
(4, 'discord', 'https://discord.com/', NULL, NULL),
(8, 'added11', 'addeeeeed', '2022-03-12 15:36:53', '2022-03-12 15:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `game_master` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `game_system_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `name`, `image`, `alt`, `about`, `game_master`, `date`, `user_id`, `level_id`, `game_system_id`, `created_at`, `updated_at`) VALUES
(1, 'Stranger Danger?', 'tab1.jpg', 'default image', 'Provident voluptatem in facere neque in itaque beatae. Sapiente quia enim facere consequatur cumque quae. Accusantium est eos odio autem animi. Sed porro culpa eveniet ut. Blanditiis ut et sed rem. Voluptates velit qui veniam autem. Illo vitae tempore sit qui aut aut incidunt repudiandae. Odio accusamus possimus doloribus aspernatur repudiandae laudantium. Eum reprehenderit nisi quae doloribus rerum ad atque. Nisi doloremque eius possimus rerum. Odio esse praesentium porro autem accusantium.', 1, '2022-03-05', 15, 3, 1, '2022-03-05 18:52:03', NULL),
(2, 'Mansions of Madness', 'tab2.jpg', 'default image', 'Est hic quas neque ut maiores est repellat. Error esse est consequuntur architecto numquam minima consequatur. Et est dolores laudantium praesentium. Aperiam quod doloribus minus aliquam dolores voluptatem et. Dignissimos sit alias aut. Doloribus dolorem velit molestias commodi error. Est facilis est impedit numquam. Aut beatae et nihil saepe sed sit impedit voluptatem. Laboriosam et qui perferendis qui. Ad nam itaque sit repellendus amet eum quis. Omnis esse sint debitis deserunt. Dignissimos mollitia corporis velit asperiores illum.', 1, '2022-03-05', 3, 2, 2, '2022-03-05 18:52:03', NULL),
(3, 'Classic Warhammer FRP', 'tab3.jpg', 'default image', 'Dolore non sed suscipit beatae non voluptatem. Beatae earum pariatur aut commodi dolorem. Iste non ducimus amet quibusdam. Ut ab odio iste facere. Optio architecto ex consequatur quis dolores. Et eaque necessitatibus iure perferendis voluptatem. Neque quis ut quia. Reprehenderit ut maiores itaque debitis. Est et sapiente distinctio molestiae minima ullam illo. Praesentium libero nam error. Placeat omnis eius facilis cupiditate eos et pariatur. Corrupti eum dolore perferendis voluptates. Quidem perferendis labore minus qui illo voluptas. Et excepturi quo qui libero numquam iusto est. Quae aut maxime soluta eligendi enim sed.', 1, '2022-03-05', 5, 1, 3, '2022-03-05 18:52:03', NULL),
(4, 'Riding Against Armageddon', 'tab4.jpg', 'default image', 'Voluptas error beatae ut hic quidem unde. Velit dicta aut provident recusandae recusandae officia omnis incidunt. Eligendi excepturi veniam temporibus minima veritatis. Et et occaecati voluptates neque. Itaque dolore dignissimos molestiae et. Qui dolores iste quisquam et et consequatur et. Ut voluptate dolor placeat tempora. Qui est illum minima saepe et officiis vero ex. Non voluptas non quo. Veniam similique accusantium eius quia blanditiis cumque non.', 0, '2022-03-05', 17, 1, 4, '2022-03-05 18:52:03', NULL),
(5, 'Evapoa - Undetermined', 'tab5.jpg', 'default image', 'Sed a cursus nisi. Duis porttitor ex a est porta, commodo cursus magna imperdiet. Morbi aliquet ultricies mauris nec rhoncus. Nam scelerisque, tellus volutpat malesuada fermentum, sapien sem tristique arcu, vel ornare nisi lacus at elit. Nunc euismod consequat eros, nec pulvinar urna ultrices quis. Donec aliquam mi eu quam euismod auctor id sed ex. Fusce mauris erat, bibendum in urna ut, pulvinar vulputate sapien. Proin suscipit lorem purus, a sagittis magna ornare eu. Maecenas pulvinar condimentum felis at lobortis. Sed sit amet leo facilisis, blandit turpis a, malesuada libero. Donec venenatis diam vitae ex sodales dapibus. Duis dictum augue diam, a tristique mi venenatis sed. Sed eu tincidunt nisl. Nunc quis faucibus lorem. Pellentesque vehicula rhoncus orci vitae gravida. Proin at bibendum lorem.\r\n\r\nMaecenas efficitur mi eu felis dignissim varius. In maximus efficitur turpis ac lobortis. Proin quis lectus urna. Sed nec volutpat risus, at pulvinar diam. Suspendisse suscipit, tortor non porttitor ornare, dui dui rhoncus ex, in mattis odio tellus at ante. Donec mollis pretium diam lacinia hendrerit. Nunc blandit fermentum libero id hendrerit. Nulla id sagittis nisi. Aliquam non pretium enim, nec porta erat. Praesent sagittis nec nibh eget ullamcorper. Nam ullamcorper nec lacus ac condimentum.', 0, '2022-03-06', 2, 3, 5, NULL, '2022-03-12 14:42:25'),
(6, 'Stepping onto the path to glory', 'tab6.jpg', 'default image', 'Modi ut sint commodi itaque. Aut repellendus qui sit excepturi aliquid quia atque. Ullam unde recusandae quibusdam dolore aut a. In perferendis animi quos voluptas qui nobis.', 1, '2022-03-05', 15, 3, 6, '2022-03-05 18:52:03', NULL),
(7, 'Mothership RPG', 'tab7.jpg', 'default image', 'Est sit excepturi deleniti fugiat possimus aut incidunt. Officiis ut alias qui minus ratione iure deleniti libero. Aliquid non non dolor fuga quae delectus. Quam sed exercitationem molestiae magnam sit. Nesciunt et quas voluptatem esse laudantium nulla quia. Dolores est doloremque magni non eveniet delectus. In soluta sed facere nobis eos maiores necessitatibus. Quo magni molestiae omnis.', 0, '2022-03-05', 3, 3, 7, '2022-03-05 18:52:03', NULL),
(8, 'Greater Upon Ashes', 'tab8.jpg', 'default image', 'Aspernatur quo omnis et et. Nihil deleniti laudantium voluptatibus tempore maiores. Veniam et eaque in totam consequatur at non. Asperiores et eaque dolorem dolorem. Culpa autem id modi ad. Aperiam non sit officiis. At sunt natus et repellat. Dolores architecto eos minima laboriosam in.', 0, '2022-03-05', 5, 3, 8, '2022-03-05 18:52:03', NULL),
(9, 'Shadowrun v4 Modified', 'tab9.jpg', 'default image', 'Nobis ab libero in accusamus vel accusamus. Beatae quia eos et veritatis id ea. Sunt fuga est ut architecto dolorem. Et sapiente sint sint accusantium. Dolore est et distinctio voluptas adipisci.', 1, '2022-03-05', 4, 2, 9, '2022-03-05 18:52:03', NULL),
(10, 'Exalted Essence', 'tab10.jpg', 'default image', 'Est dolore et sunt ab. Omnis sunt facilis architecto est et nihil provident. Inventore quia ut necessitatibus soluta provident error totam. Illum qui similique ut quod. Aut velit perferendis placeat porro quod. Eaque aliquam rem id voluptatem repudiandae. Veniam quibusdam aliquid porro quas quae. At dolor doloremque vel fugiat quia molestias.', 1, '2022-03-05', 15, 1, 10, '2022-03-05 18:52:03', NULL),
(11, 'Vampire the Masquerade v5', 'tab11.jpg', 'default image', 'At cupiditate natus laboriosam itaque ex quia ut. Laudantium fuga nulla corrupti porro qui. Ut pariatur voluptate sit esse quisquam et consequatur. Possimus sint soluta ut tenetur sed a vel libero. Cupiditate corporis repellendus nostrum tempore natus.', 1, '2022-03-05', 5, 2, 11, '2022-03-05 18:52:03', NULL),
(12, 'World of Wendrig', 'tab12.jpg', 'default image', 'Occaecati voluptatibus totam neque laborum asperiores omnis ipsam ad. Sit quidem quisquam voluptatum sit. Libero minus deleniti assumenda rerum minus fugiat. Sit qui modi officiis debitis. Eligendi quas quas quaerat temporibus inventore libero illo. Asperiores ut est labore saepe quia dolores quo. Et doloribus ex quas quo vero consequatur qui. Cumque dolorem molestiae et ducimus esse accusantium repudiandae. Repudiandae necessitatibus voluptatibus rerum id. Odio molestiae consequuntur architecto doloribus eveniet qui quia. Qui quasi reprehenderit autem.', 1, '2022-03-05', 9, 3, 12, '2022-03-05 18:52:03', NULL),
(20, 'Ghosts Of Saltmarsh', '1647029869-Screenshot_3.jpg', 'deeeef', 'In this campaign, the sea is your biggest foe. Ghosts of Saltmarsh combines the popular adventures from the first edition of Dungeons & Dragons, with upgrades to include 5th edition rules and mechanics. Ghosts of Saltmarsh offers flexibility depending on how long you want to play the campaign. You can go through all seven adventures back to back, or you can go through one adventure to tell a complete story if you prefer the one-shot approach. As the backdrop is at sea, Ghosts of Saltmarsh features seven campaigns brimming with pirates, terrifying fish people, and krakens to face in nautical battle.', 0, '2022-03-11', 2, 2, 1, '2022-03-11 19:17:49', '2022-03-11 20:29:25'),
(22, 'Espionage Adventure', '1647094638-Screenshot_4.jpg', 'deeeef', 'First, you have the Heroes Chasing the Villain. The villain, after a series of encounters with the heroes, is running to safety, to some place where he can acquire more power, or to somehwere he can accomplish some dread purpose such as assassination or mass murder. The heroes chase him, have to deal with the obstacles he leaves behind, and finally catch up to him before or just as he reaches his goal. Here, we have the final duel between the villains forces and the heroes. Second, you have the Villain Chasing the Heroes. Often, in a story like this, the heroes have found out how to defeat the villain -- such as getting to a particular temple and conducting a particular ritual. The villain chases them all through their quest, catching up to them just as they\'re commenciing their ritual; they must, with heroic effort, conclude the ritual while suffering his attacks. Third, you have the Master Villain\'s Sudden Escape Attempt.', 0, '2022-03-12', 25, 1, 9, '2022-03-12 13:17:18', '2022-03-12 13:17:18'),
(23, 'Scattered Duels: edit', '1647094790-Screenshot_5.jpg', 'deeeef', 'The heroes have gotten to the end of their quest -- they may have broken into, sneaked into, or escaped from imprisonment within the villain\'s citadel, or have marched into the little town where the villain is holed up -- and they become separated. You can separate them by having traps and tricks break the party apart, by having them see two or three things they must resolve (such as danger to innocents or the appearance of minion villains) pop up simultaneously; they\'ll have to run in all directions at the same time or suffer failure. Once the party is broken down into bite-sized chunks, you confront each individual or small group with the enemy or enemies he most deserves to face -- his personal enemy, the monster which defeated him before, etc. -- for a grand series of climactic duels.', 1, '2022-03-12', 25, 2, 6, '2022-03-12 13:19:50', '2022-03-12 13:20:08'),
(24, 'Prevented Deed', '1647094906-Screenshot_6.jpg', 'deeeef', 'Here, the heroes have been defeated -- captured by the Master Villain, or so thoroughly cut up by his minions that all believe them to be dead. And the heroes have learned, from the bragging of the villain, loose talk of his minions, or examination of clues, what is the crucial event of his master plan. In any case, the battered and bruised heroes must race to this site and have their final confrontation with the villain, bursting in on him and his minions just as the knife or final word or key is poised, and prevent the awful deed from taking place -- and, incidentally, defeat the master villain and minions who beat them previously.', 1, '2022-03-12', 25, 3, 4, '2022-03-12 13:21:46', '2022-03-12 13:21:46'),
(25, 'Chase to Ground admin2 edit', '1647095016-Screenshot_7.jpg', 'deeeef', 'First, you have the Heroes Chasing the Villain. The villain, after a series of encounters with the heroes, is running to safety, to some place where he can acquire more power, or to somehwere he can accomplish some dread purpose such as assassination or mass murder. The heroes chase him, have to deal with the obstacles he leaves behind, and finally catch up to him before or just as he reaches his goal. Here, we have the final duel between the villains forces and the heroes. Second, you have the Villain Chasing the Heroes. Often, in a story like this, the heroes have found out how to defeat the villain -- such as getting to a particular temple and conducting a particular ritual. The villain chases them all through their quest, catching up to them just as they\'re commenciing their ritual; they must, with heroic effort, conclude the ritual while suffering his attacks. Third, you have the Master Villain\'s Sudden Escape Attempt. This takes place in adventures where the Master Villain\'s identity is unknown until the end. His identity is revealed and he makes a sudden bolt for freedom; the heroes give chase.', 1, '2022-03-12', 25, 2, 11, '2022-03-12 13:23:25', '2022-03-12 15:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `alt`, `about`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lweissnat', 'maria70@hotmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img1.jpg', 'default image', 'Quod dolorem facere iusto provident iste tenetur. Rerum et voluptatem aliquam distinctio quasi molestiae. Saepe doloribus qui doloribus sint. Cum quia et odit.', 2, NULL, '2022-03-04 16:34:31', NULL),
(2, 'molly57', 'asha.huels@gmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', '1647102283-1646750960-taru.jpg', 'default image', 'Edit edit11 Quis totam neque totam praesentium inventore expedita explicabo. Natus ut debitis sed ut non. Veniam incidunt perferendis in et ut rem.', 1, NULL, '2022-03-04 16:34:31', '2022-03-12 15:24:43'),
(3, 'mariano78', 'austin01@hotmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img2.jpg', 'default image', 'Distinctio eaque veritatis assumenda nisi. Labore laudantium autem doloribus. Corporis officia qui odit dolor reiciendis.', 2, NULL, '2022-03-04 16:34:31', NULL),
(4, 'gavalerie', 'reinger.francisco@yahoo.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img3.jpg', 'default image', 'Totam vitae officia aut odit odio nulla aut enim. Pariatur odio assumenda commodi. Asperiores temporibus qui quisquam. Consequatur deserunt facere cumque amet accusantium qui ipsam provident.', 2, NULL, '2022-03-04 16:34:31', NULL),
(5, 'ritolan', 'ernestine44@yahoo.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img4.jpg', 'default image', 'Nihil unde tempora aperiam. Possimus debitis dignissimos ut eos explicabo. Repellat enim in quisquam praesentium harum saepe dignissimos.', 2, NULL, '2022-03-04 16:34:31', NULL),
(6, 'haleyt', 'kozey.lillie@yahoo.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img5.jpg', 'default image', 'Rem dolorem quia enim esse facilis velit. Quasi sit non dolorem nihil tempore aut sint. Maiores et repudiandae eligendi voluptate placeat. Placeat officiis necessitatibus commodi.', 2, NULL, '2022-03-04 16:34:31', NULL),
(7, 'sabryna25', 'jonathon.fadel@jones.biz', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img6.jpg', 'default image', 'Aut sunt magnam aut aut necessitatibus. Est ex rerum repellendus omnis id recusandae est. Quod et iusto velit quibusdam nihil ut dolores.', 2, NULL, '2022-03-04 16:34:31', NULL),
(8, 'kpadberg', 'enoch75@gmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img7.jpg', 'default image', 'Consectetur veniam sit sint qui odio ut velit cupiditate. Blanditiis voluptates ut qui aut. Maiores repudiandae qui et ab. Natus et perferendis reiciendis adipisci nemo qui dolore et.', 2, NULL, '2022-03-04 16:34:31', NULL),
(9, 'sheikinson', 'xgusikowski@yahoo.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img8.jpg', 'default image', 'Ut expedita error et veritatis qui et consequatur. A omnis vel saepe modi dolor.', 2, NULL, '2022-03-04 16:34:31', NULL),
(10, 'hkeebler', 'cbauch@gerlach.net', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img9.jpg', 'default image', 'Vitae quo delectus quisquam voluptatum. Officia rerum optio suscipit commodi. Officiis ut voluptates quis et.', 2, NULL, '2022-03-04 16:34:31', NULL),
(11, 'jacey45', 'hboyle@gmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img17.jpg', 'default image', 'Voluptatem molestiae qui voluptatum maxime aliquam voluptatem necessitatibus. Et itaque eligendi ea sed. Nostrum ab qui aspernatur molestiae.', 2, NULL, '2022-03-04 16:34:31', NULL),
(12, 'miller23', 'savion.carroll@hotmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img10.jpg', 'default image', 'Est totam qui a incidunt magnam repudiandae. Nulla porro occaecati iste dolores ullam atque accusamus. Magni sunt provident aspernatur iure.', 2, NULL, '2022-03-04 16:34:31', NULL),
(13, 'mackasandra', 'jessy.kris@hotmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img11.jpg', 'default image', 'Sed et natus porro amet totam. Sint eligendi in quidem labore excepturi. Temporibus repellat et dolor soluta doloribus.', 2, NULL, '2022-03-04 16:34:31', NULL),
(14, 'toyills', 'columbus.schimmel@glover.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img12.jpg', 'default image', 'Tempora quia qui labore ab aut doloremque ipsum. Voluptatem aliquam quia ducimus voluptatem voluptas assumenda sint. Dolores sit ut ipsa qui in ut eligendi. Maiores omnis suscipit provident iusto.', 2, NULL, '2022-03-04 16:34:31', NULL),
(15, 'mckayla05', 'jesse63@yahoo.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', '1646750960-taru.jpg', 'default image', '11Check check check\r\nSint dolorem totam et ut recusandae aut. Quasi et reprehenderit dicta provident. Magni esse saepe quidem ut nesciunt ut sed.', 2, NULL, '2022-03-04 16:34:31', '2022-03-08 13:49:20'),
(16, 'demetrius63', 'miracle.bogisich@heaney.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img16.jpg', 'default image', 'Optio et illo labore. Est error quae explicabo illum iusto repellat quisquam. Quam eaque in molestiae aut aut. Quo aperiam temporibus vero nesciunt.', 2, NULL, '2022-03-04 16:34:31', NULL),
(17, 'zeayleigh', 'aniyah.wunsch@herzog.org', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img13.jpg', 'default image', 'Vel voluptatibus dolorem magnam est qui. Qui eos alias ad maiores nihil qui. Amet ipsam rerum aut esse quae et.', 2, NULL, '2022-03-04 16:34:31', NULL),
(18, 'juana95', 'iwhite@yahoo.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img14.jpg', 'default image', 'Saepe iusto facilis quasi unde totam non. Qui alias ut omnis eos. Sunt fuga ex sit rem aut voluptas dolores.', 2, NULL, '2022-03-04 16:34:31', NULL),
(19, 'mmedhurst', 'ernestina.streich@hartmann.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'img15.jpg', 'default image', 'Exercitationem non reiciendis quis in blanditiis. At sit nemo occaecati commodi ea. Earum natus quod laboriosam et odio.', 2, NULL, '2022-03-04 16:34:31', NULL),
(20, 'wrobel', 'chester.ferry@gmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'default.jpg', 'default image', 'Et esse magnam incidunt. Tenetur quod necessitatibus eum dolorem itaque esse dicta. Saepe quam aliquid itaque eaque possimus officiis.', 2, NULL, '2022-03-04 16:34:31', NULL),
(22, 'supremeshrimp1', 'doklevise@ajax.com', '13c8d1a91a4c1bd22f0b58135011f3c0', 'default.jpg', 'default image', '', 1, NULL, '2022-03-11 15:50:27', '2022-03-12 15:30:55'),
(25, 'newuser', 'newuser@gmail.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', '1647094310-abc.jpg', 'default image', 'This is a description about the user // filler text // Usu partem timeam interpretaris at, docendi deseruisse id pro, dico fugit nam eu. Ad tation aliquando mediocritatem usu. Homero putent ad eam, simul tamquam ne nam, sit id sint denique. Ne eum quod reque minim, habeo saepe probatus at eam, at pro vide dolor.', 2, NULL, '2022-03-12 12:10:14', '2022-03-12 13:11:50'),
(26, 'nekinovitest', 'novikorisniktest@yahoo.com', 'f6d0835bf0dbb41afec6d9cda9c5d921', 'default.jpg', 'default image', '', 2, NULL, '2022-03-12 15:32:03', '2022-03-12 15:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `users_game_roles`
--

CREATE TABLE `users_game_roles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_roles_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_game_roles`
--

INSERT INTO `users_game_roles` (`id`, `user_id`, `game_roles_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 2, NULL, NULL),
(5, 5, 2, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 2, NULL, NULL),
(9, 9, 2, NULL, NULL),
(10, 10, 2, NULL, NULL),
(11, 11, 2, NULL, NULL),
(12, 12, 2, NULL, NULL),
(13, 13, 2, NULL, NULL),
(14, 14, 2, NULL, NULL),
(16, 16, 1, NULL, NULL),
(17, 17, 1, NULL, NULL),
(18, 18, 1, NULL, NULL),
(19, 19, 1, NULL, NULL),
(20, 20, 2, NULL, NULL),
(21, 1, 1, NULL, NULL),
(22, 15, 1, NULL, NULL),
(23, 15, 2, NULL, NULL),
(25, 25, 1, NULL, NULL),
(26, 25, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_table_id_foreign` (`table_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_table`
--
ALTER TABLE `day_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day_table_day_id_foreign` (`day_id`),
  ADD KEY `day_table_table_id_foreign` (`table_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `game_roles`
--
ALTER TABLE `game_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_systems`
--
ALTER TABLE `game_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tables_user_id_foreign` (`user_id`),
  ADD KEY `tables_level_id_foreign` (`level_id`),
  ADD KEY `tables_game_system_id_foreign` (`game_system_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `users_game_roles`
--
ALTER TABLE `users_game_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_game_roles_user_id_foreign` (`user_id`),
  ADD KEY `users_game_roles_game_roles_id_foreign` (`game_roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `day_table`
--
ALTER TABLE `day_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_roles`
--
ALTER TABLE `game_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game_systems`
--
ALTER TABLE `game_systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users_game_roles`
--
ALTER TABLE `users_game_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `day_table`
--
ALTER TABLE `day_table`
  ADD CONSTRAINT `day_table_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`),
  ADD CONSTRAINT `day_table_table_id_foreign` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_game_system_id_foreign` FOREIGN KEY (`game_system_id`) REFERENCES `game_systems` (`id`),
  ADD CONSTRAINT `tables_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `tables_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_game_roles`
--
ALTER TABLE `users_game_roles`
  ADD CONSTRAINT `users_game_roles_game_roles_id_foreign` FOREIGN KEY (`game_roles_id`) REFERENCES `game_roles` (`id`),
  ADD CONSTRAINT `users_game_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
