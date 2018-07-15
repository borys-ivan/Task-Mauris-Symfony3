-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 15 2018 г., 13:41
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `study`
--

-- --------------------------------------------------------

--
-- Структура таблицы `login_date`
--

CREATE TABLE `login_date` (
  `id` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `login_date`
--

INSERT INTO `login_date` (`id`, `id_login`, `date`) VALUES
(1, 11, '2018-05-15 20:00:00'),
(2, 10, '2018-07-13 16:12:54'),
(3, 11, '2018-07-13 16:14:17'),
(4, 1, '2018-07-13 16:20:23'),
(5, 13, '2018-07-13 16:22:10'),
(6, 11, '2018-07-13 16:22:55'),
(7, 14, '2018-07-13 16:23:27'),
(8, 3, '2018-07-13 16:24:10'),
(9, 6, '2018-07-13 16:32:25'),
(10, 3, '2018-07-13 16:34:23'),
(11, 1, '2018-07-14 00:05:19'),
(12, 3, '2018-07-14 02:58:50'),
(13, 4, '2018-07-14 03:00:51'),
(14, 5, '2018-07-14 03:01:54'),
(15, 3, '2018-07-14 03:05:41'),
(16, 7, '2018-07-15 12:03:13'),
(17, 3, '2018-07-15 12:20:00'),
(18, 3, '2018-07-15 12:20:37'),
(19, 15, '2018-07-15 12:29:51');

-- --------------------------------------------------------

--
-- Структура таблицы `u_ser`
--

CREATE TABLE `u_ser` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `u_ser`
--

INSERT INTO `u_ser` (`id`, `login`, `name`) VALUES
(1, 'tony333', 'tony'),
(2, 'sandy_pink', 'sandy'),
(3, 'mich', 'michael'),
(5, 'test', 'test'),
(6, 'ivan333', 'ivan'),
(7, 'bor123', 'borys'),
(12, 'pony', 'Ira'),
(13, 'vovan', 'vova'),
(14, 'liz', 'Liza'),
(15, 'Pap', 'Pavel');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `login_date`
--
ALTER TABLE `login_date`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `u_ser`
--
ALTER TABLE `u_ser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_9448DEADAA08CB10` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `login_date`
--
ALTER TABLE `login_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `u_ser`
--
ALTER TABLE `u_ser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
