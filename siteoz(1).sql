-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2017 at 10:48 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siteoz`
--

-- --------------------------------------------------------

--
-- Table structure for table `cartgood`
--

CREATE TABLE `cartgood` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_good` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cartgood`
--

INSERT INTO `cartgood` (`id`, `id_good`, `count`, `price`, `id_sales`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1.00, 1, '2017-10-31 06:39:42', '2017-10-31 06:39:42'),
(2, 1, 1, 123.20, 1, '2017-10-31 06:39:42', '2017-10-31 06:39:42'),
(3, 3, 2, 1020.01, 1, '2017-10-31 06:39:42', '2017-10-31 06:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `id_user`, `name`, `description`, `count`, `price`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Car', ' CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car CarCarCar Car', 0, 123.20, '1509438973.jpg', 0, '2017-10-31 06:36:13', '2017-10-31 06:39:42'),
(2, 1, 'Man', 'Man Man Man Man Man Man Man ', 21, 1.00, '1509439002.png', 1, '2017-10-31 06:36:42', '2017-10-31 06:39:42'),
(3, 1, 'picture', 'picturepicture\r\npicture\r\n\r\npicture', 9, 1020.01, '1509439043.jpg', 1, '2017-10-31 06:37:23', '2017-10-31 06:39:43'),
(4, 2, 'Cat', 'Cat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat CatCat Cat', 1, 25.00, '1509439215.jpg', 1, '2017-10-31 06:40:15', '2017-10-31 06:40:15'),
(5, 2, 'Axe', 'AxeAxeAxeAxeAxe\r\nAxeAxeAxeAxeAxeAxeAxe\r\nAxeAxeAxeAxeAxeAxe\r\nAxeAxe', 59, 105.65, '1509439288.jpeg', 1, '2017-10-31 06:41:28', '2017-10-31 06:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `finish_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `id_user`, `finish_price`, `created_at`, `updated_at`) VALUES
(1, 2, 2164.22, '2017-10-31 06:39:42', '2017-10-31 06:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Man', 'a@a.a', '$2y$10$gnisv3/aYoLe/73MxJsnHO0SvVH5RX2HWnj02c0nzuN/9GGI/aevC', '+375 (25) 999-99-99', 'aSv1hugxHs2SFi72k9wwYH0nOyiRI8FJwApcnTLaK83tEq40KN7Rx0SqlS2f', '2017-10-31 06:34:17', '2017-10-31 06:42:20'),
(2, 'Bob ', 'b@b.b', '$2y$10$O0VuEvnqSfAM8s8QnmQRqOVsttdrzJsQkusiyn0NMCLfJUl/2YJyq', '+375 (25) 949-97-71', 'DUEZcJ7i0XwGGUbNgiCQaC4yU29dD35NnI4OsHg96YY7jOE99EzYc8Yv7wZw', '2017-10-31 06:38:23', '2017-10-31 06:42:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartgood`
--
ALTER TABLE `cartgood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartgood`
--
ALTER TABLE `cartgood`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
