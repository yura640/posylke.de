-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 26 2016 г., 22:23
-- Версия сервера: 5.5.50
-- Версия PHP: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `users`
--

-- --------------------------------------------------------

--
-- Структура таблицы `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=258 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `scores`
--

INSERT INTO `scores` (`id`, `name`, `age`, `score`, `time`) VALUES
(257, 'кк', 44, 10, '2016-08-26 19:05:23'),
(226, 'кк', 33, 17, '2016-08-26 17:59:00'),
(241, 'кк', 33, 54, '2016-08-26 18:48:03'),
(237, 'кк', 33, 47, '2016-08-26 18:08:12'),
(228, 'кк', 33, 34, '2016-08-26 18:00:45'),
(229, 'кк', 33, 24, '2016-08-26 18:01:16'),
(230, 'кк', 33, 32, '2016-08-26 18:03:20'),
(240, 'кк', 33, 54, '2016-08-26 18:47:24'),
(239, 'кк', 33, 47, '2016-08-26 18:47:17'),
(238, 'кк', 33, 47, '2016-08-26 18:46:53'),
(236, 'кк', 33, 39, '2016-08-26 18:07:50'),
(235, 'кк', 33, 32, '2016-08-26 18:07:44'),
(214, 'ее', 44, 38, '2016-08-26 16:31:27'),
(213, 'йй', 11, 6, '2016-08-26 16:18:43'),
(212, 'тт', 66, 13, '2016-08-26 16:17:56');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=258;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
