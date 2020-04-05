-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost:3307
-- Timp de generare: apr. 05, 2020 la 10:16 AM
-- Versiune server: 10.4.11-MariaDB
-- Versiune PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `coins`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `coins`
--

CREATE TABLE `coins` (
  `id` int(11) NOT NULL,
  `img` varchar(300) DEFAULT NULL,
  `value` int(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `released` date DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `diameter` int(20) DEFAULT NULL,
  `weight` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(78, 'master', 'dubios', 'das'),
(79, 'StafieStefan', 'password', 'das'),
(80, 'stefan_stafie', 'sda', 'asd');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user_coins`
--

CREATE TABLE `user_coins` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_coin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user_coins`
--
ALTER TABLE `user_coins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
