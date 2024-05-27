-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2023 at 08:13 PM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u360136210_admin_aumana`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` longtext NOT NULL,
  `featured_img` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `short_description`, `description`, `featured_img`, `image`, `created_at`, `updated_at`) VALUES
(9, 'What is Aumana, and Why It is Crucial for a Better Tomorrow', 'what-is-aumana-and-why-it-is-crucial-for-a-better-tomorrow', 'AUMANA is an acronym of the Latin term \"Auxilium Mater Natura\". In English, it means \"Help Mother Nature.\"', 'Why Does Mother Nature Need Our Help?  \r\nMother Nature is the very essence of life, the beating heart of the earth, the breath in our lungs. She is the gentle breeze that cools us on a hot summer day, the rain that nourishes the soil, and the sun that warms our souls. She is the beauty of the sunset, the tranquility of the forest, and the power of the ocean. To harm her is to harm ourselves, for we are all connected in this great web of life.\r\nIt is time for us to recognize the importance of preserving Mother Nature and all her gifts.\r\n\r\nLet\'s Pass on a Wonderland\r\nOne of the most important reasons to embrace Aumana is for the sake of future generations. Just as a tree passes on its legacy to its seed, we too must pass on a healthy and thriving planet to our children and grandchildren. As Aristotle once said, \"The earth belongs not to us, but to the future.\" If we continue to neglect and harm the earth, we will be leaving behind a legacy of destruction and sorrow for those who come after us.\r\n\"We do not inherit the earth from our ancestors, we borrow it from our children,\" Native American proverb.\r\n\r\n\r\nShe Cares, So Should You\r\nAnother reason to preserve Mother Nature is for the sake of our health and well-being. As a mother\'s love and care are vital for a child\'s growth, so too is Mother Nature\'s love and care essential for humanity\'s growth. The earth is our home, and just as we take care of our own homes, we must take care of this beautiful planet. We must remember that our health and well-being are intimately connected to the planet\'s, and if we forget that, epidemics and natural disasters will become frighteningly common.\r\n\r\n\r\nBeauty, Harmony, and Symphony\r\nLastly, we must embrace Aumana for the sake of beauty and wonder. Mother Nature is a work of art, a masterpiece of color, form, and movement. She is like a symphony of sound and light, a dance of life and energy. To destroy her is to destroy a work of art, a symphony, a dance. As the famous poet Robert Frost said, \"Nature\'s first green is gold, her hardest hue to hold.\" We must hold on to the gold of Mother Nature, for it is the beauty and wonder of the earth that makes life worth living.\r\n\r\nJust as a gardener tends to a delicate flower, we must tend to the earth with tenderness and respect. We must be mindful of the impact of our actions and make conscious choices to reduce our footprint. We must protect and conserve the natural resources that sustain us, for they are not limitless. \r\n\r\nIn conclusion, preserving Mother Nature is not only a responsibility but also an opportunity. An opportunity to connect with the earth, to grow, and to leave a better world for future generations. Let us embrace this opportunity with open arms, and may we all be stewards of the earth, in harmony with nature.', 'eY4xZmzKaH20230207233200VLrQ16gTDf.jpg', 'D9rTymiD07202302072332006lquFtZcvv.jpg', '2023-02-07 23:32:01', '2023-02-07 23:32:01'),
(10, 'Natural Wonderlands Tour - The Best Way to Experience Mother Nature', 'natural-wonderlands-tour-the-best-way-to-experience-mother-nature', 'Welcome to the Natural Wonderlands Tour, your one-stop destination for exploring mother nature’s splendid beauty.', 'Welcome to the Natural Wonderlands Tour, your one-stop destination for exploring mother nature’s splendid beauty. From the majestic Himalayan peaks to the lush Amazon rainforest, from dazzling avian wonders to crawling critters, we will take you on a journey through some of the most spectacular geographical landscapes, flora and fauna the world has to offer, so you can rekindle your affection for nature in all its glorious forms.\r\n\r\nAs you embark on this soul-transforming adventure, you will be mesmerized by the vibrant colors and incredible diversity of flora and fauna. Each picture will tell a unique story, but at the core of it all, it has a unifying message. A call of duty from mother nature.\r\n\r\nAt Aumana, we believe that mother nature resides in all of us. Every person and beast that walks the earth, every seedling that sprouts from the soil, all share a common lineage. Everything is one with nature. Everything is connected. And when that connection is weakened or disturbed, the whole system starts to wither. \r\n\r\nTherefore, we work to revive that connection. We help people find ways to embrace mother nature, respect and cherish her, and most importantly, preserve her, in all her forms.\r\n\r\nThrough the Natural Wonderlands Tour, our mission is to capture breathtaking landscapes and life forms through professionally photographed images. We hope to enrich your love for mother nature by professionally capturing the essence of the place and its wonderful inhabitants. Furthermore, we firmly believe that nature is not just something to be admired from afar, but an experience to be cherished and savored. Hence, we strive to provide our users with all the information they need to truly immerse themselves.\r\n\r\nAs you view every picture, it’s hard not to be struck by the sheer wonder and awe of it all. Each image is like a different chapter in a never-ending story of natural beauty. Just as every snowflake is distinct, so too is every waterfall, every mountain, every forest, and every living being.\r\n\r\nSo come along on this journey and let us show you the world in a new light. As the famous naturalist, John Muir once said, “The mountains are calling and I must go.” \r\n\r\nLet Natural Wonderlands be your guide on the adventure of a lifetime.', '5BRktQocyq20230207233655Rtzb5HCsbm.jpg', 'VEtFIhdSyA20230207233655iRfap8YZj5.jpg', '2023-02-07 23:36:55', '2023-02-07 23:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `collage_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `image_id`, `collage_id`, `created_at`, `updated_at`) VALUES
(1, 2, 170, NULL, '2023-01-30 12:22:02', '2023-01-30 12:22:02'),
(2, 2, 171, NULL, '2023-01-30 12:22:22', '2023-01-30 12:22:22'),
(3, 2, 2, NULL, '2023-01-30 12:29:11', '2023-01-30 12:29:11'),
(4, 2, 990, NULL, '2023-01-30 12:48:18', '2023-01-30 12:48:18'),
(5, 2, 989, NULL, '2023-01-30 14:11:04', '2023-01-30 14:11:04'),
(6, 2, 173, NULL, '2023-01-30 17:48:33', '2023-01-30 17:48:33'),
(7, 1, 2, NULL, '2023-01-30 22:51:30', '2023-01-30 22:51:30'),
(8, 1, 170, NULL, '2023-01-30 22:55:32', '2023-01-30 22:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_featured`, `created_at`, `updated_at`) VALUES
(1, 'Natural Wonderlands', 1, '2022-11-09 03:26:55', NULL),
(2, 'NW Collage Tour', 0, '2022-11-09 03:27:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collages`
--

CREATE TABLE `collages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `collage_images`
--

CREATE TABLE `collage_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `collage_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_queries`
--

CREATE TABLE `contact_queries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_users`
--

CREATE TABLE `contact_us_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `write_messages` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image_sizes`
--

CREATE TABLE `image_sizes` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_sizes`
--

INSERT INTO `image_sizes` (`id`, `size`, `created_at`, `updated_at`) VALUES
(1, '14X11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '18X12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '24X16', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '30X20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '32X18', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `image_variants`
--

CREATE TABLE `image_variants` (
  `id` int(11) NOT NULL,
  `image_size_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `corporate_use_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commercial_use_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dpi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_use_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_11_07_202500_create_contact_us_users_table', 1),
(11, '2022_11_07_203854_create_categories_table', 1),
(12, '2022_11_07_204443_create_sub_categories_table', 1),
(13, '2022_11_07_210325_create_images_table', 1),
(14, '2022_11_07_212629_create_collages_table', 1),
(15, '2022_11_07_213256_create_collage_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('02bb3d0f8f45d96143b3a1c9794ee0e1db6bfaab4a26f287a24737a48b5abc4aef60a1dbdc668fa9', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-30 12:07:31', '2023-01-30 12:07:32', '2024-01-30 17:07:31'),
('02fc4ec635264ac119502212ef8f49594c065a70819e2e3053076d97af5a727f68a22f58b0d5feb3', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 16:12:05', '2022-12-20 16:12:12', '2023-12-20 16:12:05'),
('09c53a74037d1973430c344eeb7d75b1c5d2daf651b358301464a4dd4ab04b18dd9a2d20d41cf6cf', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 15:59:23', '2022-12-20 15:59:30', '2023-12-20 15:59:23'),
('1f8c6a34d86b7b7b9a7a7a285984c7c139c9c452ba377b216d26510bbac73eb97ee902491bd880ef', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-24 22:43:17', '2023-01-24 22:43:17', '2024-01-25 03:43:17'),
('2b9250fddde388afdfa76b4188a700d1adceb7e46cd92be1bb5102f45d12bbc7a35b925477a5756c', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2023-01-30 12:07:31', '2023-01-30 15:40:36', '2024-01-30 17:07:31'),
('349db30d48b12a5cd8e24ab7f6a6839e32fdaa8b07e5f184e9d0b744cab3356432900e832715de21', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 16:10:12', '2022-12-20 16:10:19', '2023-12-20 16:10:12'),
('367e51f6436245815aab9284bf5d20cfa201336556dbf699b7b22bd59a2ca9664c1d54d214238f30', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2023-01-23 07:11:49', '2023-01-23 07:11:58', '2024-01-23 07:11:49'),
('39e88cbfc1eea3dfe1e1793c930bd1567100a6b8cf5f18397db42275035ed46ca9a330ed8bfb0b6e', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2023-01-31 12:32:45', '2023-01-31 17:39:46', '2024-01-31 17:32:45'),
('3ba01dd2fa0016aee97607aaf8da881497791d2bc5b1ced4c024d30fc50e350268f12636eafe422f', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-13 20:15:18', '2023-01-13 20:15:18', '2024-01-13 20:15:18'),
('43fb9dff1f0ef586d1a40553cc3d0eead91c54b1454435d3f2fea911abba06d63e567ff42266f7e4', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2022-12-20 18:08:25', '2022-12-20 18:08:25', '2023-12-20 18:08:25'),
('4f0a3cc090241b8c9d57a930356fca7b1e7d23093e906294cd5a8bea62c7aa0a704981a5e71859d3', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 16:55:37', '2022-12-20 16:55:43', '2023-12-20 16:55:37'),
('4fc737495db792f2ded3d1a04e18dd6c897ecbf7dedde511bb24d2ead37f13b35fe6b23466a062c4', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-18 22:26:32', '2023-01-18 22:26:32', '2024-01-19 03:26:32'),
('595ce54c6e5859d6ef1e82e53a97dd61316395a5447ff291c51ed04c8a585632c5178ccd28a095c0', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 17:18:40', '2022-12-20 17:18:46', '2023-12-20 17:18:40'),
('628f156fd010ff32e960228989abad7c6b34514a4c1939d32249b53b6f5d4fedff6801c04849942d', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2022-12-19 19:37:35', '2022-12-19 19:37:35', '2023-12-20 00:37:35'),
('667ae7d92b12619cd3d23eb09faf2371e0939184d6c8ee0e596cb035826aaa8c5385fe7a44d9ce16', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 18:05:58', '2022-12-20 18:08:15', '2023-12-20 18:05:58'),
('7145e46f5b2ccfa7f2cbee94def2afab232e8f21a4ab4faed178fb7a7f8d2ca12feaf45b9cefeb51', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 15:58:09', '2022-12-20 15:58:15', '2023-12-20 15:58:09'),
('73c4c62432f88a1e456be0412fed8da7a69a2be6d8dfdafd74bf67e1a00ca588590e733b66c53f04', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-24 22:43:17', '2023-01-24 22:43:17', '2024-01-25 03:43:17'),
('7c465786cb93624b8418c8a5ee0c2047141b928c910e479beee43b29514a92b92afdfc63acbcf1fe', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-12 22:02:34', '2023-01-12 22:02:34', '2024-01-12 22:02:34'),
('85410f154b56f0e9b4ebae76601228dc3db38bf8e7747c14f5dee2fab37696f3f81343a0a0188ae2', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2023-01-30 22:51:25', '2023-01-30 22:56:23', '2024-01-31 03:51:25'),
('9611892f9688ca3d09fd7676396cdfa9aa2127ff3f10d3738b9fcb84eb7720827f74c834c546cd14', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 15:59:49', '2022-12-20 16:00:05', '2023-12-20 15:59:49'),
('9be3380740418a49b11e5376942f692cfd0e79479aa6fe24370a08f35fd04b4b4d13fbe4c37d91f1', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-02-07 17:18:43', '2023-02-07 17:18:43', '2024-02-07 17:18:43'),
('9e1285f7c01350072c6f32685cd514a5832d208d59e315db0759777b5436e645afde88fb26b9acd4', 4, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-20 21:55:46', '2023-01-20 21:55:46', '2024-01-20 21:55:46'),
('a498939e9ffee90e589e8bdbef3aa78b722ad5f90dfc0f3ebf1317d21cfcb10b496a3c50c3be9bb9', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-02-08 02:09:10', '2023-02-08 02:09:10', '2024-02-08 02:09:10'),
('abaa4d69fca455478598671d1e3aabd0c2cb3dd904d425c52c41206436d800bf686c51aa5f26ea03', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-02-01 13:27:09', '2023-02-01 13:27:10', '2024-02-01 18:27:09'),
('ad7b09753ef5506f64401aaab60488f942367312dff297f3173107abe8d17f502829332633781ac1', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2023-01-24 22:27:34', '2023-01-24 22:43:09', '2024-01-25 03:27:34'),
('b7fee9d0f5f5b7af248f26224e217164154f25a922c649509fd63a658b058276c761129fd779bd5b', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 15:57:50', '2022-12-20 15:57:58', '2023-12-20 15:57:50'),
('bb0ad04c7dbf88f1eb43b265f72b5aee8515373e7f77fa4c2ca7970bcfd0b4fa8a617da2b88dcc45', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-23 18:27:14', '2022-12-23 18:27:43', '2023-12-23 18:27:14'),
('c49906e2b723e81eff4e27575c40833cc8e73e95a228aa87d871cb41e41ed3be902e8ecebb454762', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-09 19:56:02', '2023-01-09 19:56:02', '2024-01-09 19:56:02'),
('c4c8aa44a359f6bf2ea4cf0acf925a0b7d457af7e8a0b5dea4e1ce0fe35ff9733e616e4c5ca6a0d6', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2022-12-19 19:39:54', '2022-12-19 19:39:54', '2023-12-20 00:39:54'),
('c7bac5f3fc2ea5a12d68fd45e4a86d216fe0489ff365d7f75716bdb75c043b83172579c8cb48ef91', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 16:04:55', '2022-12-20 16:05:01', '2023-12-20 16:04:55'),
('d9e5ad42bdb26466b9f89f31fe772d2e3b6cec8e3315bbf86a070714f47ed5cfddac724276ed6643', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2023-01-31 12:05:57', '2023-01-31 12:20:35', '2024-01-31 17:05:57'),
('e7f14746844cca9d062c94cab89e680051f03991f03510d53b2e1e2b8a270b877f9e7c5b73a79f99', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-02-08 02:09:37', '2023-02-08 02:09:37', '2024-02-08 02:09:37'),
('ee3ecfa73c1c74a251c0efdce24bb5a50f5743933f7262a70bc7e89047b1d691eca797c5f53f2f84', 3, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-21 01:06:32', '2023-01-21 01:06:32', '2024-01-21 01:06:32'),
('f128911988508cb13a15cda8c4e5ac8021a2ab54e614ef9eb27dcc0bc07451f416704ebde407993e', 2, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 0, '2023-01-30 15:40:44', '2023-01-30 15:40:44', '2024-01-30 20:40:44'),
('f4506c8da1983e4772f6afc295ab39c5276afd42684c8567892e7e097862c0eea7d9b57150b07fdd', 3, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2023-01-20 21:55:19', '2023-01-20 22:22:09', '2024-01-20 21:55:19'),
('f824ab2cf680f4ba153abc2018bce0529179ace2873057b3424f401dd23fd341a97cc960a2c80404', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2023-01-23 07:10:12', '2023-01-23 07:10:48', '2024-01-23 07:10:12'),
('fe09e717eb239f528edc2575f3510358759e1b0392507532da49e0b1dfacbed63b891e88f4af45b1', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 16:05:24', '2022-12-20 16:05:36', '2023-12-20 16:05:24'),
('fe0ea70ba32f67db6d48ff2cefdd7aa3a947ad33391e13dac7a9d821466152344198ddc83b0510fd', 1, '98059068-274a-4450-8b55-981807f0c1a4', 'Personal Access Token', '[]', 1, '2022-12-20 16:09:20', '2022-12-20 16:09:26', '2023-12-20 16:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('98059068-274a-4450-8b55-981807f0c1a4', NULL, 'Laravel Personal Access Client', 'vZp4NAR3X36yhT7c2SZOinwKV9WXE7NObAeZJPFO', NULL, 'http://localhost', 1, 0, 0, '2022-12-19 19:37:30', '2022-12-19 19:37:30'),
('98059068-47b5-4b98-92ac-5daa75fc93ee', NULL, 'Laravel Password Grant Client', 'Lg66P0CWjrmaK375r1WHvG6DthDtN21DiUIPUvVo', 'users', 'http://localhost', 0, 1, 0, '2022-12-19 19:37:30', '2022-12-19 19:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '98059068-274a-4450-8b55-981807f0c1a4', '2022-12-19 19:37:30', '2022-12-19 19:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Birds', 'birds', '2023-01-18 19:05:41', '2023-01-18 19:05:41'),
(2, 1, 'Butterfly, Dragonflies And More', 'butterfly-dragonflies-and-more', '2023-01-18 19:06:51', '2023-01-18 19:06:51'),
(3, 1, 'Clouds Rainbows', 'clouds-rainbows', '2023-01-18 19:07:21', '2023-01-18 19:07:21'),
(4, 1, 'Daytime', 'daytime', '2023-01-18 19:07:35', '2023-01-18 19:07:35'),
(5, 1, 'Flowers', 'flowers', '2023-01-18 19:07:57', '2023-01-18 19:07:57'),
(6, 1, 'Formations Hills Mountains', 'formations-hills-mountains', '2023-01-18 19:08:37', '2023-01-18 19:08:37'),
(7, 1, 'Land Dwellers', 'land-dwellers', '2023-01-18 19:09:02', '2023-01-18 19:09:02'),
(8, 1, 'Letters, Numbers & Symbols', 'letters-numbers-symbols', '2023-01-18 19:09:39', '2023-01-18 19:09:39'),
(9, 1, 'Night Time', 'night-time', '2023-01-18 19:10:03', '2023-01-18 19:10:03'),
(10, 1, 'Trees & Vegetation', 'trees-vegetation', '2023-01-18 19:10:29', '2023-01-18 19:10:29'),
(11, 1, 'Water Dwellers', 'water-dwellers', '2023-01-18 19:10:44', '2023-01-18 19:10:44'),
(12, 1, 'Water World', 'water-world', '2023-01-18 19:11:00', '2023-01-18 19:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` enum('admin','user') DEFAULT 'user',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `email_verified_at`, `password`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$hM1R1OOZCOJsdfIfb2zQguVrHshNCcivLsmhWzJqENZDzWIlqCR1e', NULL, NULL, '2022-12-19 19:51:53', '2022-12-19 19:51:53'),
(2, 'user', 'Jason Walter', 'jason.walterr09@gmail.com', NULL, '$2y$10$DRNKCs03oMDIJO2z2mhzu.VxYuWD0fu.az6VEhTJJgfZSRYbc8hu.', '123 street', NULL, '2022-12-20 18:05:38', '2022-12-20 18:05:38'),
(3, 'user', 'j', 'j@wal.com', NULL, '$2y$10$FTV8qJTFg2JBRm5eTYEr3.TDFtFMbGolX71zaHvCuFvY.17liiLE6', '12 b', NULL, '2023-01-20 21:55:03', '2023-01-20 21:55:03'),
(4, 'user', 'jan', 'janmcqn@yahoo.com', NULL, '$2y$10$LTuBoEf9M/9hgTs84ndCC./LeNmY0XspUTGxQXj0EQlagtdj7.Lo2', '33 cape cod, irvine', NULL, '2023-01-20 21:55:10', '2023-01-20 21:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) DEFAULT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `user_id`, `category_id`, `sub_category_id`, `image_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 989, '2023-01-24 22:49:46', '2023-01-24 22:49:46'),
(2, 2, 1, 1, 990, '2023-01-24 22:56:01', '2023-01-24 22:56:01'),
(3, 2, 2, NULL, 173, '2023-01-24 23:00:42', '2023-01-24 23:00:42'),
(4, 2, 2, NULL, 170, '2023-01-30 12:18:21', '2023-01-30 12:18:21'),
(5, 1, 1, 10, 2, '2023-01-30 22:55:25', '2023-01-30 22:55:25'),
(6, 1, 2, NULL, 170, '2023-01-30 22:55:35', '2023-01-30 22:55:35'),
(7, 2, 1, 1, 991, '2023-01-31 12:06:03', '2023-01-31 12:06:03'),
(8, 2, 1, 1, 996, '2023-01-31 12:06:04', '2023-01-31 12:06:04'),
(9, 2, 1, 1, 995, '2023-01-31 12:06:05', '2023-01-31 12:06:05'),
(10, 2, 1, 1, 1003, '2023-01-31 12:06:10', '2023-01-31 12:06:10'),
(11, 2, 1, 1, 1002, '2023-01-31 12:06:11', '2023-01-31 12:06:11'),
(12, 2, 1, 9, 449, '2023-01-31 12:06:53', '2023-01-31 12:06:53'),
(13, 2, 1, 9, 448, '2023-01-31 12:06:54', '2023-01-31 12:06:54'),
(14, 2, 1, 9, 454, '2023-01-31 12:06:55', '2023-01-31 12:06:55'),
(15, 2, 1, 9, 455, '2023-01-31 12:06:56', '2023-01-31 12:06:56'),
(16, 2, 1, 9, 456, '2023-01-31 12:06:56', '2023-01-31 12:06:56'),
(17, 2, 1, 9, 461, '2023-01-31 12:06:57', '2023-01-31 12:06:57'),
(18, 2, 1, 9, 460, '2023-01-31 12:06:58', '2023-01-31 12:06:58'),
(19, 2, 1, 9, 457, '2023-01-31 12:07:06', '2023-01-31 12:07:06'),
(20, 2, 1, 9, 458, '2023-01-31 12:07:07', '2023-01-31 12:07:07'),
(21, 2, 1, 9, 452, '2023-01-31 12:07:08', '2023-01-31 12:07:08'),
(22, 2, 1, 9, 459, '2023-01-31 12:07:09', '2023-01-31 12:07:09'),
(23, 2, 1, 1, 1008, '2023-01-31 12:07:27', '2023-01-31 12:07:27'),
(24, 2, 1, 1, 1014, '2023-01-31 12:07:28', '2023-01-31 12:07:28'),
(25, 2, 1, 1, 1013, '2023-01-31 12:07:29', '2023-01-31 12:07:29'),
(26, 2, 1, 4, 599, '2023-01-31 13:00:22', '2023-01-31 13:00:22'),
(27, 2, 1, 4, 597, '2023-01-31 13:00:23', '2023-01-31 13:00:23'),
(28, 2, 1, 8, 291, '2023-01-31 13:01:57', '2023-01-31 13:01:57'),
(29, 2, 1, 8, 325, '2023-01-31 13:02:13', '2023-01-31 13:02:13'),
(30, 2, 1, 8, 255, '2023-01-31 13:02:37', '2023-01-31 13:02:37'),
(31, 2, 1, 8, 277, '2023-01-31 13:02:42', '2023-01-31 13:02:42'),
(32, 2, 1, 8, 349, '2023-01-31 13:02:52', '2023-01-31 13:02:52'),
(33, 2, 1, 8, 350, '2023-01-31 13:03:06', '2023-01-31 13:03:06'),
(34, 2, 1, 8, 357, '2023-01-31 13:03:08', '2023-01-31 13:03:08'),
(35, 2, 1, 8, 373, '2023-01-31 13:03:18', '2023-01-31 13:03:18'),
(36, 2, 1, 8, 369, '2023-01-31 13:03:22', '2023-01-31 13:03:22'),
(37, 2, 1, 8, 361, '2023-01-31 13:07:30', '2023-01-31 13:07:30'),
(38, 2, 1, 8, 303, '2023-01-31 13:07:43', '2023-01-31 13:07:43'),
(39, 2, 1, 8, 294, '2023-01-31 13:07:46', '2023-01-31 13:07:46'),
(40, 2, 1, 8, 275, '2023-01-31 13:07:50', '2023-01-31 13:07:50'),
(41, 2, 1, 8, 227, '2023-01-31 13:08:06', '2023-01-31 13:08:06'),
(42, 2, 1, 8, 206, '2023-01-31 13:08:11', '2023-01-31 13:08:11'),
(43, 2, 1, 8, 207, '2023-01-31 13:08:12', '2023-01-31 13:08:12'),
(44, 2, 1, 8, 213, '2023-01-31 13:08:15', '2023-01-31 13:08:15'),
(45, 2, 1, 1, 998, '2023-02-07 17:19:01', '2023-02-07 17:19:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collages`
--
ALTER TABLE `collages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collage_images`
--
ALTER TABLE `collage_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_queries`
--
ALTER TABLE `contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us_users`
--
ALTER TABLE `contact_us_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_sizes`
--
ALTER TABLE `image_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_variants`
--
ALTER TABLE `image_variants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collages`
--
ALTER TABLE `collages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collage_images`
--
ALTER TABLE `collage_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_queries`
--
ALTER TABLE `contact_queries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us_users`
--
ALTER TABLE `contact_us_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_sizes`
--
ALTER TABLE `image_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image_variants`
--
ALTER TABLE `image_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
