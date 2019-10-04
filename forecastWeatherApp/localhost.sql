-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 04 Eki 2019, 04:46:29
-- Sunucu sürümü: 10.0.38-MariaDB-0ubuntu0.16.04.1
-- PHP Sürümü: 7.0.33-11+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `forecastWeatherApi`
--
CREATE DATABASE IF NOT EXISTS `forecastWeatherApi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `forecastWeatherApi`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `forecastWeather`
--

CREATE TABLE `forecastWeather` (
  `id` int(11) NOT NULL,
  `epochDate` int(15) NOT NULL,
  `temperatureUnit` varchar(1) NOT NULL,
  `temperatureMinValue` int(3) NOT NULL,
  `temperatureMaxValue` int(3) NOT NULL,
  `dayPhrase` varchar(100) NOT NULL,
  `datacreated` int(50) NOT NULL,
  `nightPhrase` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `forecastWeather`
--

INSERT INTO `forecastWeather` (`id`, `epochDate`, `temperatureUnit`, `temperatureMinValue`, `temperatureMaxValue`, `dayPhrase`, `datacreated`, `nightPhrase`) VALUES
(1, 1570152829, 'C', 22, 33, 'adas', 12, 'adad'),
(2, 1570152829, 'C', 32, 21, 'dad', 14, 'ada'),
(3, 1570152829, 'C', 33, 22, 'dad', 14, 'ada');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191003222143', '2019-10-03 22:22:09');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `forecastWeather`
--
ALTER TABLE `forecastWeather`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `forecastWeather`
--
ALTER TABLE `forecastWeather`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
