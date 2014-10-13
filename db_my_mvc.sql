-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 07 2014 г., 16:48
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `my_mvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `id_elements` int(10) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `user_name`, `date_create`, `id_elements`, `is_active`) VALUES
(1, 'Pavel', '2014-10-07 00:00:00', 1, 1),
(2, 'Pavel', '2014-10-07 00:00:00', 3, 1),
(3, 'Pavel', '2014-10-07 00:00:00', 6, 1),
(4, 'Pavel', '2014-10-07 00:00:00', 3, 1),
(5, 'Pavel', '2014-10-07 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_elements` int(10) DEFAULT NULL,
  `id_category` int(10) DEFAULT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `authors` text,
  `publishing` text,
  `short_description` text,
  `description` text,
  `path_to_the_image` varchar(255) NOT NULL DEFAULT 'images/elements/no_image.jpg',
  `date_create` date DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_fk_c` (`id_category`),
  KEY `book_fk_e` (`id_elements`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100007 ;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `id_elements`, `id_category`, `isbn`, `year`, `name`, `authors`, `publishing`, `short_description`, `description`, `path_to_the_image`, `date_create`, `price`, `is_active`) VALUES
(100001, 1, 1, '5-266-11156-6', 2013, 'Бесы', 'Ф.М. Достоевский', 'Ноит арт', 'Шестой роман Фёдора Михайловича Достоевского, изданный в 1871—1872 годах. Один из наиболее политизированных романов Достоевского был написан им под впечатлением от возникновения ростков террористического и радикального движений в среде русских интеллигентов, разночинцев и пр.', 'Действие происходит в губернском городе, преимущественно в поместьях Степана Трофимовича Верховенского и Варвары Ставрогиной. Сын Степана Трофимовича, Петр Верховенский, главный идейный вдохновитель революционной ячейки. Он пытается вовлечь в революционное движение сына Варвары Ставрогиной, Николая. Верховенский собирает «сочувствующую» революции молодежь: философа Шигалева, суицидального Кириллова, бывшего военного Виргинского. Верховенский замышляет убить Ивана Шатова, который хочет «выйти» из ячейки.', 'images/elements/no_image.jpg', '2014-09-20', 230000, 1),
(100002, 2, 1, '5-266-14556-6', 2014, 'Преступление и наказание', 'Ф.М. Достоевский', 'Ноит арт', 'Часть Первая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br> Глава VII</br></br>Часть вторая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br></br>Часть третья</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br></br>Часть четвёртая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br></br>Часть пятая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br></br>Часть шестая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII', 'Сюжет разворачивается вокруг главного героя, Родиона Раскольникова, в голове которого созревает теория преступления. Раскольников сам очень беден, он не может оплатить не только учёбу в университете, но и собственное проживание. Мать и сестра его тоже бедны; вскоре он узнает, что его сестра (Дуня Раскольникова) готова выйти замуж за человека, которого не любит, ради денег, чтобы помочь своей семье. Это было последней каплей, и Раскольников совершает преднамеренное убийство старухи-процентщицы и ...', 'images/elements/no_image.jpg', '2014-09-20', 140000, 1),
(100003, 3, 1, '5-266-12356-6', 2014, 'Идиот', 'Ф.М. Достоевский', 'Ноит арт', 'Часть первая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII</br>Глава XIII</br>Глава XIV</br>Глава XV</br>Глава XVI</br></br>Часть вторая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII</br></br>Часть третья</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br></br>Часть четвёртая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII', '26-летний князь Лев Николаевич Мышкин (идиот) возвращается из санатория в Швейцарии, где он провёл несколько лет, лечась от эпилепсии. Князь до конца не излечился от душевной болезни, но предстаёт перед читателем как человек искренний и невинный, хотя и прилично разбирающийся в отношениях между людьми. Он едет в Россию к единственным оставшимся у него родственникам — семье Епанчиных. В поезде он знакомится с молодым купцом Парфёном Рогожиным и отставным чиновником Лебедевым, которым бесхитростно рассказывает свою историю. В ответ он узнаёт подробности жизни Рогожина, который влюблён в бывшую содержанку богатого дворянина Афанасия Ивановича Тоцкого, Настасью Филипповну. В доме Епанчиных выясняется, что Настасья Филипповна известна и в этом доме. Есть план выдать её за протеже генерала Епанчина, Гаврилу Ардалионовича Иволгина, человека амбициозного, но посредственного.', 'images/elements/no_image.jpg', '2014-09-20', 200000, 1),
(100004, 4, 1, '5-279-12356-6', 2014, 'Братья Карамазовы', 'Ф.М. Достоевский', 'Ноит арт', 'От автора</br></br>Часть первая</br></br>Книга первая. История одной семейки</br>I. Федор Павлович Карамазов</br>II. Первого сына спровадил</br>III. Второй брак и вторые дети</br>IV. Третий сын Алёша</br>V. Старцы</br></br>Книга вторая. Неуместное собрание</br>I. Приехали в монастырь</br>II. Старый шут</br>III. Верующие бабы</br>IV. Маловерная дама</br>V. Буди, буди!</br>VI. Зачем живет такой человек!</br>VII. Семинарист-карьерист</br>VIII. Скандал</br></br>Книга третья. Сладострастники</br>I. В лакейской</br>II. Лизавета смердящая</br>III. Исповедь горячего сердца. В стихах</br>IV. Исповедь горячего сердца. В анекдотах</br>V. Исповедь горячего сердца. «Вверх пятами»</br>VI. Смердяков</br>VII. Контроверза</br>VIII. За коньячком</br>IX. Сладострастники</br>X. Обе вместе</br>XI. Еще одна погибшая репутация</br></br>Часть вторая</br></br>Книга четвёртая. Надрывы</br>I. Отец Ферапонт</br>II. У отца</br>III. Связался со школьниками</br>IV. У Хохлаковых</br>V. Надрыв в гостиной</br>VI. Надрыв в избе</br>VII. И на чистом воздухе</br></br>Книга пятая. Pro и contra</br>I. Сговор</br>II. Смердяков с гитарой</br>III. Братья знакомятся</br>IV. Бунт</br>V. Великий инквизитор</br>VI. Пока еще очень неясная</br>VII. «С умным человеком и поговорить любопытно»</br></br>Книга шестая. Русский инок</br>I. Старец Зосима и его гости</br>II. Из жития в бозе преставившегося иеросхимонаха старца Зосимы, составлено с собственных слов его Алексеем Фёдоровичем Карамазовым</br>III. Из бесед и поучений старца Зосимы</br></br>Часть третья</br></br>Книга седьмая. Алёша</br>I. Тлетворный дух</br>II. Такая минутка</br>III. Луковка</br>IV. Кана Галилейская</br></br>Книга восьмая. Митя</br>I. Кузьма Самсонов</br>II. Лягавый</br>III. Золотые прииски</br>IV. В темноте</br>V. Внезапное решение</br>VI. Сам еду!</br>VII. Прежний и бесспорный</br>VIII. Бред</br></br>Книга девятая. Предварительное следствие</br>I. Начало карьеры чиновника Перхотина</br>II. Тревога</br>III. Хождение души по мытарствам. Мытарство первое</br>IV. Мытарство второе</br>V. Третье мытарство</br>VI. Прокурор поймал Митю</br>VII. Великая тайна Мити. Освистали</br>VIII. Показание свидетелей, дитё</br>IX. Увезли Митю</br></br>Часть четвёртая</br></br>Книга десятая. Мальчики</br>I. Коля Красоткин</br>II. Детвора</br>III. Школьник</br>IV. Жучка</br>V. У Илюшиной постельки</br>VI. Раннее развитие</br>VII. Илюша</br></br>Книга одиннадцатая. Брат Иван Федорович</br>I. У Грушеньки</br>II. Больная ножка</br>III. Бесенок</br>IV. Гимн и секрет</br>V. Не ты, не ты!</br>VI. Первое свидание со Смердяковым</br>VII. Второй визит к Смердякову</br>VIII. Третье, и последнее, свидание со Смердяковым</br>IX. Черт. Кошмар Ивана Федоровича</br>X. «Это он говорил!»</br></br>Книга двенадцатая. Судебная ошибка</br>I. Роковой день</br>II. Опасные свидетели</br>III. Медицинская экспертиза и один фунт орехов</br>IV. Счастье улыбается Мите</br>V. Внезапная катастрофа</br>VI. Речь прокурора. Характеристика</br>VII. Обзор исторический</br>VIII. Трактат о Смердякове</br>IX. Психология на всех парах. Скачущая тройка. Финал речи прокурора</br>X. Речь защитника. Палка о двух концах</br>XI. Денег не было. Грабежа не было</br>XII. Да и убийства не было</br>XIII. Прелюбодей мысли</br>XIV. Мужички за себя постояли</br></br>Эпилог</br>I. Проекты спасти Митю</br>II. На минутку ложь стала правдой</br>III. Похороны Илюшечки. Речь у камня', 'Действие романа происходит в небольшом русском городе Скотопригоньевске (за основу Достоевский взял Старую Руссу). Фёдор Павлович Карамазов, 55-летний прожига, женился на богатой женщине, Аделаиде Ивановне Миусовой, и стал распоряжаться её состоянием. В конечном счёте жена уехала от него в Петербург, оставив отцу совсем малолетнего сына — Дмитрия. Не успев распорядиться своим состоянием, она умерла в Петербурге, и Фёдор Павлович получил возможность распоряжаться всем капиталом покойной.', 'images/elements/no_image.jpg', '2014-09-20', 220000, 1),
(100005, 5, 1, '5-366-12356-6', 2014, 'Числа', 'В.О. Пелевин', 'Ноит арт', 'Часть первая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII</br>Глава XIII</br>Глава XIV</br>Глава XV</br>Глава XVI</br></br>Часть вторая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII</br></br>Часть третья</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br></br>Часть четвёртая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII', 'Роман «Числа» рассказывает о жизни советского мальчика Стёпы, прибегающего к помощи магии чисел. Сперва он выбрал в качестве числа-покровителя семёрку, но затем изменил свой выбор в пользу числа 34. Во-первых, семёрке «поклонялись» многие известные личности, и Стёпа оценивал свои шансы «быть услышанным» числом 7 как минимальные. Во-вторых, сумма 3 и 4 даёт ту же семёрку. Впоследствии, всегда руководствуясь своим числом и его особенностями, Стёпа стал предпринимателем, а в пост-советский период и очень успешным банкиром.', 'images/elements/no_image.jpg', '2014-09-20', 160000, 1),
(100006, 6, 1, '5-366-17856-6', 2014, 'Проснувшийся Демон', 'В.В. Сертаков', 'Ноит арт', 'Часть первая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII</br>Глава XIII</br>Глава XIV</br>Глава XV</br>Глава XVI</br></br>Часть вторая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII</br></br>Часть третья</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br></br>Часть четвёртая</br>Глава I</br>Глава II</br>Глава III</br>Глава IV</br>Глава V</br>Глава VI</br>Глава VII</br>Глава VIII</br>Глава IX</br>Глава X</br>Глава XI</br>Глава XII', 'Он проснулся и понял, что произошла планетарная катастрофа. Его мира больше нет. Есть мир чужой, где правят банды и колдуны, а чудовищные мутанты охотятся на людей даже при солнечном свете. Его, человека из прошлого, звали Кузнецом, его звали Клинком. Но те, кто верил, что он может изменить судьбу этого страшного мира, называли его Проснувшимся Демоном.', 'images/elements/no_image.jpg', '2014-09-20', 165000, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `is_active`) VALUES
(1, 'book', 1),
(2, 'periodical', 1),
(3, 'photo', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `elements`
--

CREATE TABLE IF NOT EXISTS `elements` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_category` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `elements_fk_c` (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Дамп данных таблицы `elements`
--

INSERT INTO `elements` (`id`, `id_category`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `periodical`
--

CREATE TABLE IF NOT EXISTS `periodical` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_elements` int(10) DEFAULT NULL,
  `id_category` int(10) DEFAULT NULL,
  `release_create` date DEFAULT NULL,
  `issn` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `authors` text,
  `publishing` text,
  `short_description` text,
  `description` text,
  `path_to_the_image` varchar(255) NOT NULL DEFAULT 'images/elements/no_image.jpg',
  `price` int(10) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `periodical_fk_c` (`id_category`),
  KEY `periodical_fk_e` (`id_elements`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=200011 ;

--
-- Дамп данных таблицы `periodical`
--

INSERT INTO `periodical` (`id`, `id_elements`, `id_category`, `release_create`, `issn`, `name`, `number`, `authors`, `publishing`, `short_description`, `description`, `path_to_the_image`, `price`, `date_create`, `is_active`) VALUES
(200001, 7, 2, '2014-09-03', '0123-0001', 'Гродненский вестник #1', 1, 'П. А. Кедало', 'Ноит арт', 'Периодическое издание.', 'Самые свежие новости вашего города.', 'images/elements/no_image.jpg', 15000, '2014-09-24', 1),
(200002, 8, 2, '2014-09-18', '0123-0002', 'Гродненский вестник #2', 2, 'П. А. Кедало', 'Ноит арт', 'Периодическое издание.', 'Самые свежие новости вашего города.', 'images/elements/no_image.jpg', 15000, '2014-09-24', 1),
(200003, 9, 2, '2014-10-18', '0123-0003', 'Гродненский вестник #3', 3, 'П. А. Кедало', 'Ноит арт', 'Периодическое издание.', 'Самые свежие новости вашего города.', 'images/elements/no_image.jpg', 15000, '2014-09-24', 1),
(200004, 10, 2, '2014-10-28', '0123-0004', 'Гродненский вестник #4', 4, 'П. А. Кедало', 'Ноит арт', 'Периодическое издание.', 'Самые свежие новости вашего города.', 'images/elements/no_image.jpg', 15000, '2014-09-24', 1),
(200005, 11, 2, '2014-11-08', '0123-0005', 'Гродненский вестник #5', 5, 'П. А. Кедало', 'Ноит арт', 'Периодическое издание.', 'Самые свежие новости вашего города.', 'images/elements/no_image.jpg', 15000, '2014-09-24', 1),
(200006, 12, 2, '2014-09-08', '0123-0345', 'Народная газета #166', 166, 'Советская Белоруссия', 'Г арт', 'Периодическое издание.', 'Самые свежие новости вашей любимой страны.', 'images/elements/no_image.jpg', 12000, '2014-09-24', 1),
(200007, 13, 2, '2014-09-09', '0123-0346', 'Народная газета #167', 167, 'Советская Белоруссия', 'Г арт', 'Периодическое издание.', 'Самые свежие новости вашей любимой страны.', 'images/elements/no_image.jpg', 12000, '2014-09-24', 1),
(200008, 14, 2, '2014-09-10', '0123-0347', 'Народная газета #168', 168, 'Советская Белоруссия', 'Г арт', 'Периодическое издание.', 'Самые свежие новости вашей любимой страны.', 'images/elements/no_image.jpg', 12000, '2014-09-24', 1),
(200009, 15, 2, '2014-09-11', '0123-0348', 'Народная газета #169', 169, 'Советская Белоруссия', 'Г арт', 'Периодическое издание.', 'Самые свежие новости вашей любимой страны.', 'images/elements/no_image.jpg', 12000, '2014-09-24', 1),
(200010, 16, 2, '2014-09-12', '0123-0349', 'Народная газета #170', 170, 'Советская Белоруссия', 'Г арт', 'Периодическое издание.', 'Самые свежие новости вашей любимой страны.', 'images/elements/no_image.jpg', 12000, '2014-09-24', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_elements` int(10) DEFAULT NULL,
  `id_category` int(10) DEFAULT NULL,
  `release_create` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `resolution` varchar(255) DEFAULT NULL,
  `dpi` int(10) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `author` text,
  `short_description` text,
  `path_to_the_image` varchar(255) NOT NULL DEFAULT 'images/elements/no_image.jpg',
  `price` int(10) DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_fk_c` (`id_category`),
  KEY `photo_fk_b` (`id_elements`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=300023 ;

--
-- Дамп данных таблицы `photo`
--

INSERT INTO `photo` (`id`, `id_elements`, `id_category`, `release_create`, `name`, `resolution`, `dpi`, `type`, `author`, `short_description`, `path_to_the_image`, `price`, `date_create`, `is_active`) VALUES
(300001, 17, 3, '2014-09-04', 'Небо вариант 1', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотография неба', 'images/elements/no_image.jpg', 100000, '2014-09-21', 1),
(300002, 18, 3, '2014-09-04', 'Небо вариант 2', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотография неба', 'images/elements/no_image.jpg', 100000, '2014-09-21', 1),
(300003, 19, 3, '2014-09-04', 'Небо вариант 3', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотография неба', 'images/elements/no_image.jpg', 100000, '2014-09-22', 1),
(300004, 20, 3, '2014-09-04', 'Небо вариант 4', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотография неба', 'images/elements/no_image.jpg', 100000, '2014-09-23', 1),
(300005, 21, 3, '2014-09-05', 'Небо вариант 5', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотография неба', 'images/elements/no_image.jpg', 105000, '2014-09-23', 1),
(300006, 22, 3, '2014-10-01', 'Фото человека 1', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300007, 23, 3, '2014-10-01', 'Фото человека 2', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300008, 24, 3, '2014-10-01', 'Фото человека 3', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300009, 25, 3, '2014-10-01', 'Фото человека 4', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300010, 26, 3, '2014-10-01', 'Фото человека 5', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300011, 27, 3, '2014-10-01', 'Фото человека 6', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300012, 28, 3, '2014-10-01', 'Фото человека 7', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300013, 29, 3, '2014-10-01', 'Фото человека 8', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300014, 30, 3, '2014-10-01', 'Фото человека 9', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300015, 31, 3, '2014-10-01', 'Фото человека 10', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300016, 32, 3, '2014-10-01', 'Фото человека 11', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300017, 33, 3, '2014-10-01', 'Фото человека 12', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300018, 34, 3, '2014-10-01', 'Фото человека 13', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300019, 35, 3, '2014-10-01', 'Фото человека 15', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300020, 36, 3, '2014-10-01', 'Фото человека 16', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300021, 37, 3, '2014-10-01', 'Фото человека 17', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1),
(300022, 38, 3, '2014-10-01', 'Фото человека 18', '1920х1020', 64, 'jpg', 'П.А. Кедало', 'Фотографии людей', 'images/elements/no_image.jpg', 25000, '2014-10-01', 1);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_fk_e` FOREIGN KEY (`id_elements`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `book_fk_c` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `elements`
--
ALTER TABLE `elements`
  ADD CONSTRAINT `elements_fk_c` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `periodical`
--
ALTER TABLE `periodical`
  ADD CONSTRAINT `periodical_fk_e` FOREIGN KEY (`id_elements`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `periodical_fk_c` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Ограничения внешнего ключа таблицы `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_fk_e` FOREIGN KEY (`id_elements`) REFERENCES `elements` (`id`),
  ADD CONSTRAINT `photo_fk_c` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;