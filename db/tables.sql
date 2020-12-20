-- Redator

CREATE TABLE IF NOT EXISTS `redator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `redator` (`id`, `username`, `password`) VALUES
(1, 'Swan', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(2, 'Douglas', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(3, 'Heitor', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(4, 'Manoel', 'e8d95a51f3af4a3b134bf6bb680a213a'),
(5, 'Yan', 'e8d95a51f3af4a3b134bf6bb680a213a');

-- Artigos

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `editor` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;