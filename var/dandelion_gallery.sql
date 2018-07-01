-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 30 2018 г., 17:14
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 7.1.15-1+ubuntu16.04.1+deb.sury.org+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dandelion_gallery`
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
(27, 'content/media/images/1530367805Hydrangeas.jpg', 'content/media/thumbnails/1530367805Hydrangeas.jpg', 'sdg', 'sdfg', '2018-06-30 14:10:05', 7),
(28, 'content/media/images/1530367871IMG_20150915_153920883_HDR.jpg', 'content/media/thumbnails/1530367871IMG_20150915_153920883_HDR.jpg', 'ag', 'af', '2018-06-30 14:11:11', 6),
(29, 'content/media/images/1530367880Koala.jpg', 'content/media/thumbnails/1530367880Koala.jpg', 'adsf', 'afds', '2018-06-30 14:11:20', 6),
(30, 'content/media/images/1530367888Lighthouse.jpg', 'content/media/thumbnails/1530367888Lighthouse.jpg', 'asdf', 'afsd', '2018-06-30 14:11:28', 6),
(31, 'content/media/images/1530367896Jellyfish.jpg', 'content/media/thumbnails/1530367896Jellyfish.jpg', 'asdf', 'asdf', '2018-06-30 14:11:36', 6),
(32, 'content/media/images/1530367904Penguins.jpg', 'content/media/thumbnails/1530367904Penguins.jpg', 'asfd', 'asfd', '2018-06-30 14:11:44', 6),
(33, 'content/media/images/1530367912Desert.jpg', 'content/media/thumbnails/1530367912Desert.jpg', 'asdf', 'afsd', '2018-06-30 14:11:52', 6),
(34, 'content/media/images/1530367920Tulips.jpg', 'content/media/thumbnails/1530367920Tulips.jpg', 'asdf', 'afd', '2018-06-30 14:12:01', 6),
(35, 'content/media/images/1530367929Chrysanthemum.jpg', 'content/media/thumbnails/1530367929Chrysanthemum.jpg', 'asdf', 'afds', '2018-06-30 14:12:10', 6),
(36, 'content/media/images/1530367938Penguins.jpg', 'content/media/thumbnails/1530367938Penguins.jpg', 'asdf', 'asdf', '2018-06-30 14:12:19', 6);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
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
