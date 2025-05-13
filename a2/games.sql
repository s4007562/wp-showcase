CREATE DATABASE gamesrus;
USE gamesrus;
CREATE TABLE `games` (
  `gameid` int (11) NOT NULL AUTO_INCREMENT,
  `gamename` varchar (255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar (255) NOT NULL,
  `caption` varchar (255) NOT NULL,
  `price` double NOT NULL,
  `platform` varchar (255) NOT NULL,
  `type` varchar (255) NOT NULL,
  PRIMARY KEY (`gameid`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

