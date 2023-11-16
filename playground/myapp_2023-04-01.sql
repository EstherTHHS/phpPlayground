# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 8.0.32)
# Database: myapp
# Generation Time: 2023-03-31 23:46:43 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table notes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `body` text NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;

INSERT INTO `notes` (`id`, `title`, `body`, `user_id`)
VALUES
	(2,'How to Stay Productive When Working from Home','Many of us have had to adjust to working from home over the past year. While there are certainly benefits to working remotely, it can also be challenging to stay productive without the structure of a traditional office environment.\n\nOne of the keys to staying productive when working from home is to create a routine. Set specific times for starting and ending work each day, and try to stick to those times as much as possible. You should also create a dedicated workspace that is free from distractions.\n\nAnother helpful tip is to take breaks throughout the day. It\'s important to give yourself time to recharge and refresh your mind. Try taking a walk outside, doing some stretching or yoga, or simply stepping away from your computer for a few minutes.\n\nFinally, it\'s important to communicate with your colleagues and manager. Make sure you\'re clear on expectations and deadlines, and check in regularly to make sure you\'re on track. By staying organized and focused, you can be just as productive working from home as you would be in an office setting. <h1>Testing</h1>',10),
	(3,'The Importance of Self-Care for Mental Health','Self-care refers to the practice of taking care of your physical, mental, and emotional health. It\'s important to prioritize self-care, especially when dealing with stress or mental health issues.\n\nSelf-care can take many forms, such as getting enough sleep, eating a healthy diet, and exercising regularly. It can also involve activities like journaling, meditating, or spending time in nature.\n\nOne of the most important aspects of self-care is setting boundaries. It\'s important to recognize when you need to say no to certain commitments or activities in order to prioritize your own wellbeing.\n\nSelf-care isn\'t selfish. By taking care of yourself, you\'re better able to show up for others and be a positive force in the world. If you\'re feeling overwhelmed or stressed, take some time to assess your self-care routine and make any necessary adjustments. Your mental health will thank you.',1),
	(4,'Why Meditation Should Be Part of Your Daily Routine','Meditation is a powerful tool for reducing stress, improving focus, and increasing overall well-being. While it may seem daunting to begin a meditation practice, even just a few minutes of meditation each day can make a big difference in your life.\n\nResearch has shown that meditation can help reduce symptoms of anxiety, depression, and chronic pain. It can also improve sleep quality, boost immune function, and even increase grey matter in the brain. And while some forms of meditation may require a specific setting or props, such as cushions or incense, basic mindfulness meditation can be practiced anywhere.\n\nTo get started with a daily meditation practice, find a quiet place where you can sit or lie down comfortably without distractions. Set a timer for a few minutes, and focus on your breath. Notice the sensations of the breath as it enters and exits your body. When your mind wanders, simply acknowledge the thought and gently return your attention to your breath.\n\nOver time, you can increase the length of your meditation sessions and experiment with different types of meditation, such as loving-kindness meditation or body scan meditation. With consistent practice, you may begin to notice benefits such as improved mood, increased patience, and a greater sense of calm.',1);

/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table todos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `todos`;

CREATE TABLE `todos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `body` text COLLATE utf8mb4_unicode_ci,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;

INSERT INTO `todos` (`id`, `body`, `user_id`)
VALUES
	(1,'Go to shopping.',8),
	(4,'Testing todo.',8),
	(5,'<h1>Testing</h1>',8),
	(6,'<h1>Testing</h1>',8),
	(7,'; delete table test_delete;',8),
	(8,'test; delete table test_delete;',8),
	(9,'test; delete table test_delete;',8),
	(10,'test',8),
	(11,'test',8),
	(12,'test',8),
	(13,'test',8),
	(14,'test',8),
	(15,'test\', 8); drop table test_delete; -- a',8),
	(16,'test\', 8); drop table test_delete; -- a',8),
	(17,'test',8),
	(18,'',8);

/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `username`)
VALUES
	(1,'test@exampl.com','password',''),
	(2,'test1@exampl.com','password',''),
	(3,'testfjsla@example.com','password',''),
	(4,'test@example.com','0b4e7a0e5fe84ad35fb5f95b9ceeac79','sdfsf'),
	(5,'glay+free@hivelocity.co.jp','$2y$10$n1bltyCd.Tuj9uE7k8r6aufNk.iVl87YahdI8oEPB0qcJB7zA71g6','test'),
	(6,'test@email.com','5f4dcc3b5aa765d61d8327deb882cf99','test'),
	(7,'test2@example.com','$2y$10$VgSiP1v6XJFuBXKKbtFMleqsXL3pjMLjFHW8GioF9EWaydVHXyGUW','testing'),
	(8,'test3@example.com','$2y$10$95Chv46yxfSJlBbpoiCGt.iYNBihOEHfdOEByj6bWF0vsvR7FoLRW','test'),
	(9,'tetest@example.com','$2y$10$3xuN7QNow9OJOB0HvrNFNOPNPYuG4Qmlt0Kyf2luNsdGZkuYZkbIq','test'),
	(10,'kyawsan@aceplussolutions.com','$2y$10$qF6FxvKLDI4Mhjgkd/GymOW2izsIJo4xRqBJy9E3o0LCh2tidFgca','kyawsan');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
