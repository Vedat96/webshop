-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 jun 2018 om 19:49
-- Serverversie: 10.1.26-MariaDB
-- PHP-versie: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop php`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `amount` double(9,2) NOT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `mollie_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`id`, `amount`, `payment_status`, `mollie_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 257.91, 'open', NULL, 1, '2018-06-29 14:01:38', '2018-06-29 14:01:38'),
(2, 257.91, 'open', NULL, 2, '2018-06-29 14:03:00', '2018-06-29 14:03:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double(9,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 39.99, 1, '2018-06-29 14:01:38', '2018-06-29 14:01:38'),
(2, 1, 2, 42.99, 1, '2018-06-29 14:01:38', '2018-06-29 14:01:38'),
(3, 1, 1, 24.99, 7, '2018-06-29 14:01:38', '2018-06-29 14:01:38'),
(4, 2, 3, 39.99, 1, '2018-06-29 14:03:00', '2018-06-29 14:03:00'),
(5, 2, 2, 42.99, 1, '2018-06-29 14:03:00', '2018-06-29 14:03:00'),
(6, 2, 1, 24.99, 7, '2018-06-29 14:03:00', '2018-06-29 14:03:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` double(9,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `slug`, `title`, `description`, `price`, `image`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'gta-v', 'GTA V', 'Grand Theft Auto V is an action-adventure video game developed by Rockstar North and published by Rockstar Games. It was released in September 2013 for PlayStation 3 and Xbox 360, in November 2014 for PlayStation 4 and Xbox One, and in April 2015 for Microsoft Windows. It is the first main entry in the Grand Theft Auto series since 2008\'s Grand Theft Auto IV.\r\nThe game is played from either a third-person or first-person perspective and its world is navigated on foot or by vehicle. Players control the three lead protagonists throughout single-player and switch between them both during and outside missions. The story is centred on the heist sequences, and many missions involve shooting and driving gameplay.', 24.99, 'gta.jpg', NULL, NULL, NULL, NULL),
(2, 'assassins-creed-origins', 'Assassin\'s Creed Origins', 'Assassin\'s Creed Origins is an action-adventure video game developed by Ubisoft Montreal and published by Ubisoft. It is the tenth major installment in the Assassin\'s Creed series and the successor to 2015\'s Assassin\'s Creed Syndicate. It was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One. The game is set in Egypt near the end of the Ptolemaic period and recounts the secret fictional history of real-world events. The story follows a Medjay named Bayek, and explores the origins of the centuries-long conflict between the Brotherhood of Assassins, who fight for peace by promoting liberty, and The Order of the Ancients forerunners to the Templar Order who desire peace through the forced imposition of order.', 42.99, 'origins.jpg', NULL, NULL, NULL, NULL),
(3, 'witcher-3', 'Witcher 3', 'The Witcher 3: Wild Hunt Game of the Year edition brings together the base game and all the additional content released to date.\r\n\r\nBecome a professional monster slayer and embark on an adventure of epic proportions!\r\nUpon its release, The Witcher 3: Wild Hunt became an instant classic, claiming over 250 Game of the Year awards. Now you can enjoy this huge, over 100-hour long, open-world adventure along with both its story-driven expansions worth an extra 50 hours of gameplay. This edition includes all additional content - new weapons, armor, companion outfits, new game mode and side quests.', 39.99, 'witcher.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT '',
  `first_name` varchar(255) NOT NULL DEFAULT '',
  `suffix_name` varchar(255) DEFAULT '',
  `last_name` varchar(255) NOT NULL DEFAULT '',
  `country` varchar(255) NOT NULL DEFAULT 'NL',
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `street_number` varchar(255) NOT NULL,
  `street_suffix` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `first_name`, `suffix_name`, `last_name`, `country`, `city`, `street`, `street_number`, `street_suffix`, `zipcode`, `active`, `created_at`, `updated_at`) VALUES
(1, 'vedat.aydin1@student.rocva.nl', '$2y$10$XGyB3ooQOTtGkD3aOid4BuxOjft5mc6KhX6LAk78g93w0IbRmY7W.', '', 'Vedat', 'm', 'Aydin', 'Nderland', 'Amsterdam', 'Wijnand Nuijenstraat', '19', '', '1061 TX', 0, '2018-06-29 14:01:38', '2018-06-29 14:01:38'),
(2, 'vedat.aydin1@student.rocva.nl', '$2y$10$bH4I1iO5t60WZq5VNSmlqeQQRYQ3Wq88ZLFbiBoQE/THvzLG7qeOO', '', 'Vedat', 's', 'Aydin', 'Nderland', 'Plaats', 'Wijnand Nuijenstraat', '19', '', '1061 TX', 0, '2018-06-29 14:03:00', '2018-06-29 14:03:00');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
