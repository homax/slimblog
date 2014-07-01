-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.17-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.3.0.4792
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица slimblog.articles
DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '0',
  `text` text,
  `category_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_articles_categories` (`category_id`),
  CONSTRAINT `FK_articles_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы slimblog.articles: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `title`, `text`, `category_id`) VALUES
	(2, 'Африканская кампания', 'По итогам группового раунда французы оставили очень мощное впечатление: без проблем разделавшись с Гондурасом (3:0), «трехцветные» затем в том же легком стиле забили пять мячей швейцарцам. Был и шестой гол Карима Бензема, но случился он аккурат с финальным свистком. Поэтому точный удар форварда и не нашел отражения в протоколе встречи. В третьем туре команда Дидье Дешама позволила себе нулевую ничью с Эквадором, но эта игра уже ничего не решала.', 1),
	(3, 'В «Афише» сменился директор по продуктам', 'Арт-директор компании Rambler&Co Михаил Сметана назначен новым директором по продуктам проекта «Афиша». Об этом «Ленте.ру» сообщили в редакции журнала. 15 июля 2014 года он сменит на этом посту Илью Красильщика, который покидает компанию.', 5),
	(4, 'Злодей дня', 'Магшот — это всем известный по голливудским фильмам снимок подозреваемого в совершении преступления анфас и в профиль, который делается после ареста. Самая что ни на есть протокольная и совсем невеселая вещь, но это если не подойти к ней творчески. Например, на сайте окружной полиции Марикопы, США, посетители могут проголосовать за фото понравившегося им нарушителя закона, выбрав «магшот дня». ', 5),
	(5, '«Мы очертили Россию»', 'Год назад, 30 июня 2013 года, президент России Владимир Путин подписал федеральный закон о запрете пропаганды нетрадиционных сексуальных отношений среди несовершеннолетних. Против этого документа неоднократно выступали общественные деятели как в стране, так и за ее пределами. В знак протеста от визита в Россию отказывались известные певцы, музыканты, спортсмены, нобелевские лауреаты, танцоры и художники. О законе и его последствиях «Ленте.ру» рассказали гей-активисты и инициатор закона депутат Законодательного собрания Санкт-Петербурга Виталий Милонов.', 3),
	(6, 'Форекс на десерт', 'Неделю назад в организации участников фондового рынка — НАУФОР — прошел круглый стол, посвященный регулированию Форекса. В нем приняли участие как представители индустрии Форекса, так и яростные критики этого рынка.', 2);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;


-- Дамп структуры для таблица slimblog.art_tag
DROP TABLE IF EXISTS `art_tag`;
CREATE TABLE IF NOT EXISTS `art_tag` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  KEY `FK__articles` (`article_id`),
  KEY `FK_tags` (`tag_id`),
  CONSTRAINT `FK_tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  CONSTRAINT `FK__articles` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы slimblog.art_tag: ~7 rows (приблизительно)
/*!40000 ALTER TABLE `art_tag` DISABLE KEYS */;
INSERT INTO `art_tag` (`article_id`, `tag_id`) VALUES
	(6, 2),
	(2, 4),
	(5, 1),
	(4, 5),
	(2, 3),
	(5, 2),
	(5, 5);
/*!40000 ALTER TABLE `art_tag` ENABLE KEYS */;


-- Дамп структуры для таблица slimblog.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы slimblog.categories: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Спорт'),
	(2, 'Экономика'),
	(3, 'Политика'),
	(4, 'Культура'),
	(5, 'Развлечения');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Дамп структуры для таблица slimblog.tags
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы slimblog.tags: ~6 rows (приблизительно)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`) VALUES
	(1, 'Россия'),
	(2, 'США'),
	(3, 'Бразилия'),
	(4, 'Футбол'),
	(5, 'Обама'),
	(6, 'Круто');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
