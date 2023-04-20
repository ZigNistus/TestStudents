-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 20 2023 г., 05:43
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `for_test_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Groups`
--

CREATE TABLE `Groups` (
  `id` int NOT NULL,
  `group_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Groups`
--

INSERT INTO `Groups` (`id`, `group_num`) VALUES
(1, 'Пдо-44'),
(2, 'Пдо-34');

-- --------------------------------------------------------

--
-- Структура таблицы `Qst_Answ`
--

CREATE TABLE `Qst_Answ` (
  `id` int NOT NULL,
  `test_id` int NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `answer_int` int NOT NULL,
  `answer_str` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Qst_Answ`
--

INSERT INTO `Qst_Answ` (`id`, `test_id`, `question`, `answer_int`, `answer_str`) VALUES
(1, 1, 'Когда началась Вторая мировая война?', 3, ''),
(2, 2, 'Выберите правильный вариант:', 2, ''),
(3, 1, 'Какая страна первой подверглась нападению Германии?', 1, ''),
(4, 1, 'Какие из перечисленных стран, являлись основными членами стран «Оси»?', 4, ''),
(5, 1, 'Какие основные государства входили в антигитлеровскую коалицию?', 2, '');

-- --------------------------------------------------------

--
-- Структура таблицы `Results`
--

CREATE TABLE `Results` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `test_id` int NOT NULL,
  `mark` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Results`
--

INSERT INTO `Results` (`id`, `student_id`, `test_id`, `mark`) VALUES
(3, 3, 2, '5'),
(11, 3, 1, '2'),
(12, 4, 1, '5'),
(13, 4, 2, '4');

-- --------------------------------------------------------

--
-- Структура таблицы `Tests`
--

CREATE TABLE `Tests` (
  `id` int NOT NULL,
  `test` text NOT NULL,
  `discipline` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Tests`
--

INSERT INTO `Tests` (`id`, `test`, `discipline`) VALUES
(1, 'Вторая мировая война', 'История'),
(2, 'Буквы Н и НН в причастиях и отглагольных прилагательных', 'Русский язык');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL,
  `full_name` text NOT NULL,
  `group_id` int NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`id`, `login`, `password`, `full_name`, `group_id`, `is_admin`) VALUES
(3, 'nSadilov', '202cb962ac59075b964b07152d234b70', 'Садилов Никита Евгеньевич', 1, 0),
(4, 'userTest', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Юзеров Юзер Юзерович', 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `Var_answ`
--

CREATE TABLE `Var_answ` (
  `id` int NOT NULL,
  `question_id` int NOT NULL,
  `qes_option` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Var_answ`
--

INSERT INTO `Var_answ` (`id`, `question_id`, `qes_option`) VALUES
(1, 1, '1937'),
(2, 1, '1935'),
(3, 1, '1939'),
(4, 1, '1941'),
(5, 2, 'домоткаННый ковёр'),
(6, 2, 'домоткаНый ковёр'),
(7, 3, 'Польша'),
(8, 3, 'Франция'),
(9, 3, 'СССР'),
(10, 3, 'Финляндия'),
(11, 4, 'Германия, Италия, Австрия'),
(12, 4, 'Франция, Италия, Испания'),
(15, 4, 'Швеция, Норвегия, Австрия'),
(16, 4, 'Германия, Италия, Япония'),
(17, 5, 'США, Великобритания, Япония'),
(18, 5, 'Великобритания, СССР, США'),
(19, 5, 'Испания, СССР, Франция'),
(20, 5, 'Швеция, Австрия, Великобритания'),
(21, 5, 'СССР, США, Япония');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Qst_Answ`
--
ALTER TABLE `Qst_Answ`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qst_answ_ibfk_1` (`test_id`);

--
-- Индексы таблицы `Results`
--
ALTER TABLE `Results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Индексы таблицы `Tests`
--
ALTER TABLE `Tests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`group_id`);

--
-- Индексы таблицы `Var_answ`
--
ALTER TABLE `Var_answ`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Groups`
--
ALTER TABLE `Groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Qst_Answ`
--
ALTER TABLE `Qst_Answ`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Results`
--
ALTER TABLE `Results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `Tests`
--
ALTER TABLE `Tests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `Var_answ`
--
ALTER TABLE `Var_answ`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Qst_Answ`
--
ALTER TABLE `Qst_Answ`
  ADD CONSTRAINT `qst_answ_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `Tests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Results`
--
ALTER TABLE `Results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `Users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `Tests` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `Groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Var_answ`
--
ALTER TABLE `Var_answ`
  ADD CONSTRAINT `var_answ_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `Qst_Answ` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
