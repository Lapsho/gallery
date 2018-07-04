-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 04 2018 г., 11:21
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
  `category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `image_path`, `thumbnail_path`, `description`, `author_name`, `category`, `created_at`, `user_id`) VALUES
(63, 'content/media/images/1530660404Hydrangeas.jpg', 'content/media/thumbnails/1530660404Hydrangeas.jpg', 'sdg', 'dg', 'Art', '2018-07-03 23:26:45', 5),
(64, 'content/media/images/1530660424Lighthouse.jpg', 'content/media/thumbnails/1530660424Lighthouse.jpg', 'rsth', 'htrs', 'Buildings', '2018-07-03 23:27:04', 5),
(65, 'content/media/images/1530660437Chrysanthemum.jpg', 'content/media/thumbnails/1530660437Chrysanthemum.jpg', 'sh', 'shd', 'Macro', '2018-07-03 23:27:17', 5),
(66, 'content/media/images/1530660451Penguins.jpg', 'content/media/thumbnails/1530660451Penguins.jpg', 'sgr', 'gsrd', 'Interior', '2018-07-03 23:27:32', 5),
(67, 'content/media/images/1530660467Chrysanthemum.jpg', 'content/media/thumbnails/1530660467Chrysanthemum.jpg', 'sg', 'g', 'Wall', '2018-07-03 23:27:47', 5),
(68, 'content/media/images/1530660481Desert.jpg', 'content/media/thumbnails/1530660481Desert.jpg', 'gr', 'g', 'Paisajes', '2018-07-03 23:28:01', 5),
(69, 'content/media/images/1530660493IMG_20150915_153920883_HDR.jpg', 'content/media/thumbnails/1530660493IMG_20150915_153920883_HDR.jpg', 'rg', 'g', 'People', '2018-07-03 23:28:13', 5),
(70, 'content/media/images/1530660505Tulips.jpg', 'content/media/thumbnails/1530660505Tulips.jpg', 'ersg', 'gr', 'Machinery', '2018-07-03 23:28:25', 5),
(71, 'content/media/images/1530661305Chrysanthemum.jpg', 'content/media/thumbnails/1530661305Chrysanthemum.jpg', 'иав', 'ипа', 'Macro', '2018-07-03 23:41:45', 5);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
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
