-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-10-2022 a las 20:19:55
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `the_eyed_traveller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Food', '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(2, 'Attractions', '2022-10-12 12:41:28', '2022-10-12 12:41:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favs_quantity` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `image`, `title`, `favs_quantity`, `city`, `location`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'https://media.lamejorhamburguesa.com/imagenes/burgeaters/2dbc51ae86789890d22d84cbce41609c/1645173901.jpg', 'Dak Burguer', 28, 'Málaga', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 2, 1, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(2, 'https://www.archivohistoricominero.org/wp-content/uploads/2011/08/20110801153239_jul111-jpg.jpg', 'Sotón Mine', 16, 'Moreda', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 4, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(3, 'https://206380-889849-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/2018/07/plaza-callao.jpg', 'Gran Vía Street', 13, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 2, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(4, 'https://cdn.getyourguide.com/img/tour/608ab59dacb73.jpeg/98.jpg', 'Bernabeu Stadium', 19, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 3, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(5, 'https://unareceta.com/wp-content/uploads/2016/08/fabada-asturiana-con-patatas-640x427.jpg', '\"Fabada\"', 29, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 1, 1, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(6, 'https://www.zenitexperiencias.com/wp-content/uploads/2018/12/Cachopo-1-1.jpg', '\"Cachopo\"', 27, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 2, 1, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(7, 'https://uecluster.blob.core.windows.net/images/planetainteligente/1616706006_retiro1400.jpg', 'Retirement Park', 23, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 4, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(9, 'https://i0.wp.com/www.zampatelmundo.com/wp-content/uploads/2019/03/Cocido-madrilan%CC%83o-en-el-restaurante-la-bola.jpeg?fit=3024%2C3024&ssl=1', '\"Cocido Madrileño\"', 21, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 4, 1, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(10, 'https://assets.buendiatours.com/s3fs-public/styles/highlight_large/public/2020-01/oviedo-guia-edificios-religiosos-catedral-atardecer.jpg?VersionId=.PL.86VyfX6BaiXVnmiBpZJ_Nyww5TBR&itok=7uQRblTH', 'Cathedral', 15, 'Oviedo', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 3, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(11, 'https://malagacatedral.com/wp-content/uploads/exterior-3.jpg', 'Cathedral', 22, 'Málaga', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 4, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(12, 'https://imgs-akamai.mnstatic.com/d7/4c/d74c39c55d6e3de8c1554a34d399b619.jpg', 'Mine Monument', 30, 'Mieres', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 2, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(13, 'https://www.anibaltrejo.com/wp-content/uploads/2012/09/ES_Madrid_Cibeles_Fountain-120117172623.jpg', 'Cibeles', 20, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 4, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(14, 'https://d500.epimg.net/cincodias/imagenes/2019/12/18/companias/1576673395_548111_1576680544_noticia_normal.jpg', 'Málaga Port', 27, 'Málaga', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 4, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(15, 'https://i.ytimg.com/vi/2oAuXZuwqaw/maxresdefault.jpg', 'Sun Gate', 28, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 3, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(16, 'https://i.ytimg.com/vi/2oAuXZuwqaw/maxresdefault.jpg', 'Madroño Bear', 24, 'Madrid', 'https://goo.gl/maps/BuT9SNYzdAtx8ANM9', 4, 2, '2022-10-12 12:41:28', '2022-10-12 12:41:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image_user`
--

CREATE TABLE `image_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_08_223533_create_categories_table', 1),
(6, '2022_10_08_222759_create_images_table', 1),
(7, '2022_10_09_232248_create_image_user_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Guiller', 'guiller@gmail.com', '2022-10-12 12:41:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bouTrbaLrI', '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(2, 'Kerim', 'kerim@gmail.com', '2022-10-12 12:41:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SRrswJXdYK', '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(3, 'Inma', 'inma@gmail.com', '2022-10-12 12:41:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zgAf1IQYD8', '2022-10-12 12:41:28', '2022-10-12 12:41:28'),
(4, 'Buda', 'buda@gmail.com', '2022-10-12 12:41:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 's2ps44it1j', '2022-10-12 12:41:28', '2022-10-12 12:41:28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`),
  ADD KEY `images_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `image_user`
--
ALTER TABLE `image_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_user_image_id_foreign` (`image_id`),
  ADD KEY `image_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `image_user`
--
ALTER TABLE `image_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `image_user`
--
ALTER TABLE `image_user`
  ADD CONSTRAINT `image_user_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
