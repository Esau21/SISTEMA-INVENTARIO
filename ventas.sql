-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2023 a las 07:17:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'CURSOS', 'https://dummyimage.com/600x400/000/fff', '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(2, 'TENIS', 'https://dummyimage.com/600x400/000/fff', '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(3, 'CELULARES', 'https://dummyimage.com/600x400/000/fff', '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(4, 'COMPUTADORAS', 'https://dummyimage.com/600x400/000/fff', '2023-04-29 21:47:04', '2023-04-29 21:47:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taxpayer_id` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denominations`
--

CREATE TABLE `denominations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('BILLETE','MONEDA','OTRO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'BILLETE',
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `denominations`
--

INSERT INTO `denominations` (`id`, `type`, `value`, `image`, `created_at`, `updated_at`) VALUES
(1, 'BILLETE', '1000', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(2, 'BILLETE', '500', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(3, 'BILLETE', '200', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(4, 'BILLETE', '100', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(5, 'BILLETE', '50', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(6, 'BILLETE', '20', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(7, 'MONEDA', '10', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(8, 'MONEDA', '5', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(9, 'MONEDA', '2', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(10, 'MONEDA', '0.5', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(11, 'OTRO', '0', NULL, '2023-04-29 21:47:04', '2023-04-29 21:47:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacions`
--

CREATE TABLE `facturacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `monto` double(8,2) NOT NULL,
  `saldo` double(8,2) NOT NULL,
  `estado` enum('CANCEL','PEDING','PARTIAL') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'CANCEL',
  `tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iva` double(8,2) NOT NULL,
  `fecha_emision` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_vencimiento` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `notas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descuento` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `total_pagado` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2021_03_25_011753_create_clientes_table', 1),
(6, '2021_11_24_230052_create_companies_table', 1),
(7, '2021_11_24_231254_create_denominations_table', 1),
(8, '2021_11_24_232125_create_categories_table', 1),
(9, '2021_11_24_232734_create_products_table', 1),
(10, '2021_11_24_235120_create_sales_table', 1),
(11, '2021_11_25_215034_create_sale_details_table', 1),
(12, '2021_12_23_223213_create_permission_tables', 1),
(13, '2023_04_25_223053_create_facturacions_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,2) NOT NULL DEFAULT 0.00,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stock` int(11) NOT NULL,
  `alerts` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `barcode`, `cost`, `price`, `stock`, `alerts`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'LARAVEL LIVE WIRE', '75010065987', '200.00', '350.00', 1000, 10, 'curso.png', 1, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(2, 'RUNNING NIKE', '76098872014', '600.00', '1500.00', 1000, 10, 'tenis.png', 2, '2023-04-29 21:47:04', '2023-04-29 21:47:04'),
(3, 'IPHONE 11', '1', '900.00', '1400.00', 97, 1, '644d3c1ce0037_.jpg', 3, '2023-04-29 21:47:04', '2023-05-21 11:07:39'),
(4, 'PC GAMER', '790654812', '790.00', '1350.00', 1000, 1, 'pcgamer.png', 4, '2023-04-29 21:47:04', '2023-05-21 10:54:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `items` int(11) NOT NULL,
  `iva` float NOT NULL,
  `cash` decimal(10,2) NOT NULL,
  `change` decimal(10,2) NOT NULL,
  `status` enum('PAID','PENDING','CANCELLED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PAID',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `total`, `items`, `iva`, `cash`, `change`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-29 21:47:51', '2023-04-29 21:47:51'),
(2, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-29 21:49:30', '2023-04-29 21:49:30'),
(3, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-29 21:49:57', '2023-04-29 21:49:57'),
(4, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:22:48', '2023-04-30 21:22:48'),
(5, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:23:10', '2023-04-30 21:23:10'),
(6, '1400.00', 0, 0, '2900.00', '1500.00', 'PAID', 1, '2023-04-30 21:24:41', '2023-04-30 21:24:41'),
(7, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:28:53', '2023-04-30 21:28:53'),
(8, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:34:20', '2023-04-30 21:34:20'),
(9, '2800.00', 2, 0, '2800.00', '0.00', 'PAID', 1, '2023-04-30 21:37:11', '2023-04-30 21:37:11'),
(10, '2800.00', 2, 0, '2800.00', '0.00', 'PAID', 1, '2023-04-30 21:39:25', '2023-04-30 21:39:25'),
(11, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:40:26', '2023-04-30 21:40:26'),
(12, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:46:05', '2023-04-30 21:46:05'),
(13, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:49:23', '2023-04-30 21:49:23'),
(14, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:51:53', '2023-04-30 21:51:53'),
(15, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:54:11', '2023-04-30 21:54:11'),
(16, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 21:56:13', '2023-04-30 21:56:13'),
(17, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 22:53:34', '2023-04-30 22:53:34'),
(18, '2800.00', 2, 0, '2800.00', '0.00', 'PAID', 1, '2023-04-30 22:55:28', '2023-04-30 22:55:28'),
(19, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 22:55:56', '2023-04-30 22:55:56'),
(20, '2800.00', 2, 0, '2800.00', '0.00', 'PAID', 1, '2023-04-30 22:58:13', '2023-04-30 22:58:13'),
(21, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 22:59:55', '2023-04-30 22:59:55'),
(22, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 23:00:31', '2023-04-30 23:00:31'),
(23, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 23:02:31', '2023-04-30 23:02:31'),
(24, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 23:02:45', '2023-04-30 23:02:45'),
(25, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 23:06:08', '2023-04-30 23:06:08'),
(26, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 23:06:41', '2023-04-30 23:06:41'),
(27, '1400.00', 0, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 23:07:33', '2023-04-30 23:07:33'),
(28, '1400.00', 1, 0, '1400.00', '0.00', 'PAID', 1, '2023-04-30 23:08:12', '2023-04-30 23:08:12'),
(29, '1400.00', 1, 182, '1582.00', '0.00', 'PAID', 1, '2023-05-21 08:30:02', '2023-05-21 08:30:02'),
(30, '1400.00', 0, 182, '1582.00', '0.00', 'PAID', 1, '2023-05-21 11:02:12', '2023-05-21 11:02:12'),
(31, '1400.00', 0, 182, '1582.00', '0.00', 'PAID', 1, '2023-05-21 11:03:57', '2023-05-21 11:03:57'),
(32, '1400.00', 0, 182, '1582.00', '0.00', 'PAID', 1, '2023-05-21 11:04:35', '2023-05-21 11:04:35'),
(33, '1400.00', 0, 182, '1582.00', '0.00', 'PAID', 1, '2023-05-21 11:07:39', '2023-05-21 11:07:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sale_details`
--

CREATE TABLE `sale_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sale_details`
--

INSERT INTO `sale_details` (`id`, `price`, `quantity`, `product_id`, `sale_id`, `created_at`, `updated_at`) VALUES
(1, '1400.00', '1.00', 3, 1, '2023-04-29 21:47:51', '2023-04-29 21:47:51'),
(2, '1400.00', '1.00', 3, 2, '2023-04-29 21:49:30', '2023-04-29 21:49:30'),
(3, '1400.00', '1.00', 3, 3, '2023-04-29 21:49:57', '2023-04-29 21:49:57'),
(4, '1400.00', '1.00', 3, 4, '2023-04-30 21:22:48', '2023-04-30 21:22:48'),
(5, '1400.00', '1.00', 3, 5, '2023-04-30 21:23:10', '2023-04-30 21:23:10'),
(6, '1400.00', '1.00', 3, 6, '2023-04-30 21:24:41', '2023-04-30 21:24:41'),
(7, '1400.00', '1.00', 3, 7, '2023-04-30 21:28:53', '2023-04-30 21:28:53'),
(8, '1400.00', '1.00', 3, 8, '2023-04-30 21:34:20', '2023-04-30 21:34:20'),
(9, '1400.00', '2.00', 3, 9, '2023-04-30 21:37:11', '2023-04-30 21:37:11'),
(10, '1400.00', '2.00', 3, 10, '2023-04-30 21:39:25', '2023-04-30 21:39:25'),
(11, '1400.00', '1.00', 3, 11, '2023-04-30 21:40:26', '2023-04-30 21:40:26'),
(12, '1400.00', '1.00', 3, 12, '2023-04-30 21:46:05', '2023-04-30 21:46:05'),
(13, '1400.00', '1.00', 3, 13, '2023-04-30 21:49:23', '2023-04-30 21:49:23'),
(14, '1400.00', '1.00', 3, 14, '2023-04-30 21:51:53', '2023-04-30 21:51:53'),
(15, '1400.00', '1.00', 3, 15, '2023-04-30 21:54:11', '2023-04-30 21:54:11'),
(16, '1400.00', '1.00', 3, 16, '2023-04-30 21:56:13', '2023-04-30 21:56:13'),
(17, '1400.00', '1.00', 3, 17, '2023-04-30 22:53:34', '2023-04-30 22:53:34'),
(18, '1400.00', '2.00', 3, 18, '2023-04-30 22:55:28', '2023-04-30 22:55:28'),
(19, '1400.00', '1.00', 3, 19, '2023-04-30 22:55:56', '2023-04-30 22:55:56'),
(20, '1400.00', '2.00', 3, 20, '2023-04-30 22:58:13', '2023-04-30 22:58:13'),
(21, '1400.00', '1.00', 3, 21, '2023-04-30 22:59:55', '2023-04-30 22:59:55'),
(22, '1400.00', '1.00', 3, 22, '2023-04-30 23:00:31', '2023-04-30 23:00:31'),
(23, '1400.00', '1.00', 3, 23, '2023-04-30 23:02:31', '2023-04-30 23:02:31'),
(24, '1400.00', '1.00', 3, 24, '2023-04-30 23:02:45', '2023-04-30 23:02:45'),
(25, '1400.00', '1.00', 3, 25, '2023-04-30 23:06:08', '2023-04-30 23:06:08'),
(26, '1400.00', '1.00', 3, 26, '2023-04-30 23:06:41', '2023-04-30 23:06:41'),
(27, '1400.00', '1.00', 3, 27, '2023-04-30 23:07:33', '2023-04-30 23:07:33'),
(28, '1400.00', '1.00', 3, 28, '2023-04-30 23:08:12', '2023-04-30 23:08:12'),
(29, '1400.00', '1.00', 3, 29, '2023-05-21 08:30:02', '2023-05-21 08:30:02'),
(30, '1400.00', '1.00', 3, 30, '2023-05-21 11:02:12', '2023-05-21 11:02:12'),
(31, '1400.00', '1.00', 3, 31, '2023-05-21 11:03:57', '2023-05-21 11:03:57'),
(32, '1400.00', '1.00', 3, 32, '2023-05-21 11:04:35', '2023-05-21 11:04:35'),
(33, '1400.00', '1.00', 3, 33, '2023-05-21 11:07:39', '2023-05-21 11:07:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` enum('Active','Locked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `profile`, `status`, `email_verified_at`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Edgar', '7876543234', 'josedeodanes99@gmail.com', 'Admin', 'Active', NULL, '$2y$10$PubxesUEUhyyb/PjEFUk0OS2g58IeyREsW/ircwNIMR.RoQo6.TeC', NULL, NULL, '2023-04-30 03:47:04', '2023-04-30 03:47:04'),
(2, 'Esau Zelaya', '7978523234', 'esau4321@gmail.com', 'Cliente', 'Active', NULL, '$2y$10$l4Vb5Grj/pB7hnOHRMmLluGOOhy.dP8lkNxIS7Eu87ccunW4EGoGq', NULL, NULL, '2023-04-30 03:47:05', '2023-04-30 03:47:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `denominations`
--
ALTER TABLE `denominations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturacions`
--
ALTER TABLE `facturacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facturacions_id_producto_foreign` (`id_producto`),
  ADD KEY `facturacions_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_details_product_id_foreign` (`product_id`),
  ADD KEY `sale_details_sale_id_foreign` (`sale_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `denominations`
--
ALTER TABLE `denominations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `facturacions`
--
ALTER TABLE `facturacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `sale_details`
--
ALTER TABLE `sale_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturacions`
--
ALTER TABLE `facturacions`
  ADD CONSTRAINT `facturacions_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `facturacions_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `sale_details`
--
ALTER TABLE `sale_details`
  ADD CONSTRAINT `sale_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sale_details_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
