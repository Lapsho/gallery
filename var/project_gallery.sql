-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 27 2018 г., 00:20
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 7.1.15-1+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `project_gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `thumbnail_path` varchar(255) DEFAULT NULL,
  `description` text,
  `author_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `image_path`, `thumbnail_path`, `description`, `author_name`, `created_at`, `user_id`) VALUES
(1, 'pub/media/images/1529933876Hydrangeas.jpg', 'pub/media/thumbnails/1529933876Hydrangeas.jpg', 'fgh', 'gf', '2018-06-25 13:37:57', 5),
(5, 'pub/media/images/1529960837Desert.jpg', 'pub/media/thumbnails/1529960837Desert.jpg', 'asdf', 'asfd', '2018-06-25 21:07:18', 7),
(6, 'pub/media/images/1529960889Chrysanthemum.jpg', 'pub/media/thumbnails/1529960889Chrysanthemum.jpg', 'asdf', 'asdf', '2018-06-25 21:08:09', 7),
(7, 'pub/media/images/1529960902Jellyfish.jpg', 'pub/media/thumbnails/1529960902Jellyfish.jpg', 'asdf', 'asdf', '2018-06-25 21:08:22', 7),
(8, 'pub/media/images/1530047702Я.jpg', 'pub/media/thumbnails/1530047702Я.jpg', 'fg', 'gh ', '2018-06-26 21:15:02', 6),
(9, 'pub/media/images/1530047727Lighthouse.jpg', 'pub/media/thumbnails/1530047727Lighthouse.jpg', 'pl', 'l', '2018-06-26 21:15:27', 6),
(10, 'pub/media/images/1530047738Hydrangeas.jpg', 'pub/media/thumbnails/1530047738Hydrangeas.jpg', ';lk,', ';l.', '2018-06-26 21:15:38', 6),
(11, 'pub/media/images/1530047751Chrysanthemum.jpg', 'pub/media/thumbnails/1530047751Chrysanthemum.jpg', '.\'/', '\';l', '2018-06-26 21:15:51', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `access` varchar(11) CHARACTER SET armscii8 NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `access`) VALUES
(5, 'lol', 'loe.wP0.u3Q2A', 'admin'),
(6, 'anonimus', 'an1Jk7au2nUgA', 'user'),
(7, 'hi', 'hiHfIvMzVBa.c', 'user'),
(9, 'me', 'meMiJsFWs8bB.', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Owner ID` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `Owner ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
