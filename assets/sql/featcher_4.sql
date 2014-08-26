-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 26 aug 2014 om 17:12
-- Serverversie: 5.6.16
-- PHP-versie: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `featcher`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feature`
--

CREATE TABLE IF NOT EXISTS `feature` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `feature`
--

INSERT INTO `feature` (`feature_id`, `created_on`, `user_id`, `text`) VALUES
(1, '2014-08-23 21:01:05', 1, 'Dit is een feature'),
(2, '2014-08-23 21:13:38', 2, 'Neger feature :) moet er ook zijn ;)'),
(3, '2014-08-23 21:58:14', 5, 'Security airdrone'),
(4, '2014-08-23 21:58:54', 10, 'Misschien moet ge ook features uitsluiten die al onder de -5 zititen ofzo? \r\n'),
(5, '2014-08-24 10:48:05', 1, 'ik wil een profielfoto kunnen toevoegen aan mijn profiel'),
(6, '2014-08-24 11:19:49', 12, 'een 6de als test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `feature_vote`
--

CREATE TABLE IF NOT EXISTS `feature_vote` (
  `feature_vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `state` enum('0','1') NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feature_vote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Gegevens worden geëxporteerd voor tabel `feature_vote`
--

INSERT INTO `feature_vote` (`feature_vote_id`, `user_id`, `feature_id`, `state`, `timestamp`) VALUES
(1, 5, 1, '0', '2014-08-24 00:14:38'),
(2, 5, 2, '0', '2014-08-24 00:18:28'),
(3, 5, 3, '0', '2014-08-24 00:18:29'),
(4, 5, 4, '1', '2014-08-24 00:18:30'),
(5, 3, 1, '0', '2014-08-24 00:18:52'),
(6, 3, 2, '1', '2014-08-24 00:18:54'),
(7, 3, 3, '1', '2014-08-24 00:18:58'),
(8, 3, 4, '1', '2014-08-24 00:18:59'),
(9, 3, 5, '0', '2014-08-24 10:27:36'),
(10, 3, 6, '1', '2014-08-24 11:25:14'),
(11, 0, 20, '1', '2014-08-24 20:29:03'),
(12, 0, 19, '1', '2014-08-24 20:29:13'),
(13, 0, 4, '1', '2014-08-24 20:31:15'),
(14, 0, 6, '1', '2014-08-24 20:31:30'),
(15, 0, 2, '1', '2014-08-24 20:31:35'),
(16, 1, 3, '1', '2014-08-24 21:15:07'),
(17, 1, 4, '1', '2014-08-24 21:15:13'),
(18, 1, 2, '1', '2014-08-24 21:57:20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `is_admin` enum('0','1') DEFAULT '0',
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `image`, `is_admin`, `hash`) VALUES
(1, 'Bram Rutten', 'contact@bramrutten.be', 'db0629a49c27a971d185ff58bf3b6b5f2b40a925', 'avatar.png', '1', 'aca9143583430e6e76ae70683654217c62de6b25'),
(3, 'Yannick', 'yannick@yame.be', 'db0629a49c27a971d185ff58bf3b6b5f2b40a925', 'EntryDesignChallenge11_BramRutten.png', '0', '18450df0234c5c1d14c67ffbdceaaa36c2a679a3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
