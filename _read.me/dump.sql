-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 24 Maj 2011, 00:39
-- Wersja serwera: 5.1.41
-- Wersja PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Baza danych: `yii_demo`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `tbl_shops`
--

DROP TABLE IF EXISTS `tbl_shops`;
CREATE TABLE IF NOT EXISTS `tbl_shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voivodship` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `city` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `street` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `place` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

