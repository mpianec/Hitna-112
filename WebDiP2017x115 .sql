-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2018 at 07:16 PM
-- Server version: 5.5.59
-- PHP Version: 5.4.45-0+deb7u12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `WebDiP2017x115`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adresa`
--

CREATE TABLE IF NOT EXISTS `Adresa` (
  `idAdresa` int(11) NOT NULL AUTO_INCREMENT,
  `Država` varchar(45) NOT NULL,
  `Grad` varchar(45) NOT NULL,
  `Ulica` varchar(100) NOT NULL,
  `Broj` int(11) NOT NULL,
  `Opis uzbune` text NOT NULL,
  PRIMARY KEY (`idAdresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Adresa`
--

INSERT INTO `Adresa` (`idAdresa`, `Država`, `Grad`, `Ulica`, `Broj`, `Opis uzbune`) VALUES
(1, 'Republika Hrvatska', 'Zagreb', 'Trg Josipa Jurja Strossmayera', 256, 'Pljačka banke.'),
(2, 'Republika Hrvatska', 'Zagreb', 'Boškovićeva ulica', 35, 'Lakša prometna nesreća.'),
(3, 'Republika Hrvatska', 'Koprivnica', 'Starogradska', 73, 'Prometna nezgoda.'),
(4, 'Republika Hrvatska', 'Koprivnica', 'Starogradska', 200, 'Poplava.'),
(5, 'Republika Hrvatska', 'Zagreb.', 'Ilica', 65, 'Potres.'),
(6, 'Republika Hrvatska', 'Zagreb', 'Avenija Dubrava ', 60, 'Prometna nesreća.'),
(7, 'Republika Hrvatska', 'Varaždin', 'Gospodarska ulica', 80, 'Prometna nesreća.'),
(8, 'Republika Slovenija', 'Ljubljana', 'Vojkova cesta', 30, 'Potres.'),
(9, 'Republika Srbija', 'Beograd', 'Bulevar Franše d''Eperea', 50, 'Ozlijeđeni usred prometne nesreće.'),
(10, 'Republika Hrvatska', 'Varaždin', 'Gospodarska ulica', 80, 'Zapalila se vozila koja su sudjelovala u prometnoj nesreći.'),
(11, 'Republika Hrvatska', 'Varaždin', 'Gospodarska ulica', 80, 'Ozlijeđene osobe u prometnoj nesreći.'),
(12, 'Republika Hrvatska', 'Zagreb', 'Avenije Većeslava Holjevca', 65, 'Ubojstvo u noći.'),
(13, 'Republika Hrvatska', 'Zagreb', 'Petrova ulica', 25, 'Obračun bande, ima ranjenih i mrtvih.');

-- --------------------------------------------------------

--
-- Table structure for table `dnevnikRada`
--

CREATE TABLE IF NOT EXISTS `dnevnikRada` (
  `iddnevnikRada` int(11) NOT NULL AUTO_INCREMENT,
  `vrijeme_pristupa` datetime NOT NULL,
  `tip_loga` varchar(45) NOT NULL,
  `opis` text,
  `Korisnik_korisnik_id` int(11) NOT NULL,
  PRIMARY KEY (`iddnevnikRada`),
  KEY `fk_dnevnikRada_Korisnik1_idx` (`Korisnik_korisnik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `dnevnikRada`
--

INSERT INTO `dnevnikRada` (`iddnevnikRada`, `vrijeme_pristupa`, `tip_loga`, `opis`, `Korisnik_korisnik_id`) VALUES
(5, '2018-06-11 15:30:00', 'Prijava korisnika', 'Prijava korisnika u sustav', 3),
(6, '2018-06-11 19:41:44', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(7, '2018-06-11 20:22:49', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(8, '2018-06-11 20:41:24', 'Prijava korisnika', 'Prijava korisnika u sustav', 3),
(9, '2018-06-12 12:02:40', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(10, '2018-06-12 19:32:42', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(11, '2018-06-12 19:32:51', 'Blokiranje', 'Admin je blokirao korisnika.', 1),
(12, '2018-06-12 19:32:57', 'Blokiranje', 'Admin je odblokirao korisnika.', 1),
(13, '2018-06-12 19:54:33', 'Kreiraj', 'Administrator je kreirao ustanovu.', 1),
(14, '2018-06-12 19:55:45', 'Kreiraj', 'Administrator je kreirao ustanovu.', 1),
(15, '2018-06-12 19:57:44', 'Kreiraj', 'Administrator je kreirao ustanovu.', 1),
(16, '2018-06-12 20:04:52', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(17, '2018-06-12 20:47:16', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(18, '2018-06-12 20:47:29', 'Prijava korisnika', 'Prijava korisnika u sustav', 5),
(19, '2018-06-12 21:03:38', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(20, '2018-06-12 21:13:03', 'Kreiranje', 'Administrator je kreirao moderatora.', 1),
(21, '2018-06-12 21:13:12', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(22, '2018-06-12 21:13:53', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(23, '2018-06-12 21:14:59', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(24, '2018-06-12 21:15:41', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(25, '2018-06-12 21:23:28', 'Blokiranje', 'Admin je blokirao korisnika.', 1),
(26, '2018-06-12 21:23:31', 'Blokiranje', 'Admin je odblokirao korisnika.', 1),
(27, '2018-06-12 21:23:36', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(28, '2018-06-12 21:34:33', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(29, '2018-06-12 21:39:29', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(30, '2018-06-12 21:40:47', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(31, '2018-06-12 21:41:47', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(32, '2018-06-12 21:41:56', 'Prijava korisnika', 'Prijava korisnika u sustav', 2),
(33, '2018-06-12 21:43:25', 'Odjava korisnika', 'Odjava korisnika iz sustav', 2),
(34, '2018-06-12 21:43:34', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(35, '2018-06-12 21:43:39', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(36, '2018-06-12 21:43:45', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(37, '2018-06-12 21:44:14', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 4),
(38, '2018-06-12 21:47:11', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(39, '2018-06-12 21:49:20', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(40, '2018-06-12 21:54:04', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(41, '2018-06-12 21:54:09', 'Prijava korisnika', 'Prijava korisnika u sustav', 5),
(42, '2018-06-12 21:59:21', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 5),
(43, '2018-06-12 22:23:01', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 5),
(44, '2018-06-12 22:24:03', 'Odjava korisnika', 'Odjava korisnika iz sustav', 5),
(45, '2018-06-12 22:27:11', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(46, '2018-06-12 22:34:07', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(47, '2018-06-12 22:38:12', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(48, '2018-06-12 22:38:31', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(49, '2018-06-12 22:39:42', 'Prijava korisnika', 'Prijava korisnika u sustav', 2),
(50, '2018-06-12 22:46:30', 'Odjava korisnika', 'Odjava korisnika iz sustav', 2),
(51, '2018-06-12 22:46:34', 'Prijava korisnika', 'Prijava korisnika u sustav', 3),
(52, '2018-06-12 22:46:46', 'Odjava korisnika', 'Odjava korisnika iz sustav', 3),
(53, '2018-06-13 11:12:31', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(54, '2018-06-13 11:13:06', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(55, '2018-06-13 11:13:49', 'Prijava korisnika', 'Prijava korisnika u sustav', 2),
(56, '2018-06-13 11:13:59', 'Prihvaćen oglas', 'Moderator je prihvatio zahtjev za oglas.', 2),
(57, '2018-06-13 12:06:46', 'Prijava korisnika', 'Prijava korisnika u sustav', 2),
(58, '2018-06-13 12:06:59', 'Odjava korisnika', 'Odjava korisnika iz sustav', 2),
(59, '2018-06-13 12:07:06', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(60, '2018-06-13 12:07:16', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(61, '2018-06-13 12:25:59', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(62, '2018-06-13 12:26:40', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(63, '2018-06-13 12:28:10', 'Kreiranje', 'Administrator je kreirao moderatora.', 1),
(64, '2018-06-13 12:28:13', 'Kreiranje', 'Administrator je kreirao moderatora.', 1),
(65, '2018-06-13 12:28:25', 'Kreiranje', 'Administrator je kreirao moderatora.', 1),
(66, '2018-06-13 12:29:31', 'Kreiraj', 'Administrator je kreirao ustanovu.', 1),
(67, '2018-06-13 12:29:58', 'Kreiraj', 'Administrator je kreirao ustanovu.', 1),
(68, '2018-06-13 12:30:26', 'Kreiraj', 'Administrator je kreirao ustanovu.', 1),
(69, '2018-06-13 12:31:16', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(70, '2018-06-13 12:31:21', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(71, '2018-06-13 12:31:26', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(72, '2018-06-13 12:31:30', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(73, '2018-06-13 12:31:35', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(74, '2018-06-13 12:31:43', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(75, '2018-06-13 12:32:34', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(76, '2018-06-13 12:32:42', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(77, '2018-06-13 12:32:51', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(78, '2018-06-13 12:32:58', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(79, '2018-06-13 12:33:46', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(80, '2018-06-13 12:35:10', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(81, '2018-06-13 12:35:18', 'Kreiraj', 'Administrator je dodijelio moderatora ustanovi.', 1),
(82, '2018-06-13 12:37:29', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(83, '2018-06-13 12:38:15', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(84, '2018-06-13 12:39:05', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(85, '2018-06-13 12:39:32', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(86, '2018-06-13 12:40:10', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(87, '2018-06-13 12:40:40', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(88, '2018-06-13 12:43:03', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(89, '2018-06-13 12:49:41', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(90, '2018-06-13 12:49:53', 'Kreiraj', 'Administrator je kreirao poziciju.', 1),
(91, '2018-06-13 13:07:04', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(92, '2018-06-13 13:07:22', 'Prijava korisnika', 'Prijava korisnika u sustav', 6),
(93, '2018-06-13 13:09:22', 'Odjava korisnika', 'Odjava korisnika iz sustav', 6),
(94, '2018-06-13 13:10:33', 'Prijava korisnika', 'Prijava korisnika u sustav', 2),
(95, '2018-06-13 13:11:54', 'Odjava korisnika', 'Odjava korisnika iz sustav', 2),
(96, '2018-06-13 13:12:01', 'Prijava korisnika', 'Prijava korisnika u sustav', 3),
(97, '2018-06-13 13:12:26', 'Odjava korisnika', 'Odjava korisnika iz sustav', 3),
(98, '2018-06-13 13:12:51', 'Prijava korisnika', 'Prijava korisnika u sustav', 15),
(99, '2018-06-13 13:14:10', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 15),
(100, '2018-06-13 13:14:58', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 15),
(101, '2018-06-13 13:16:30', 'Blokiranje', 'Moderator je blokirao oglas.', 15),
(102, '2018-06-13 13:18:42', 'Odjava korisnika', 'Odjava korisnika iz sustav', 15),
(103, '2018-06-13 13:19:03', 'Prijava korisnika', 'Prijava korisnika u sustav', 14),
(104, '2018-06-13 13:19:27', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 14),
(105, '2018-06-13 13:19:40', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 14),
(106, '2018-06-13 13:21:50', 'Odjava korisnika', 'Odjava korisnika iz sustav', 14),
(107, '2018-06-13 13:22:03', 'Prijava korisnika', 'Prijava korisnika u sustav', 12),
(108, '2018-06-13 13:24:32', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 12),
(109, '2018-06-13 13:24:57', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 12),
(110, '2018-06-13 13:25:13', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 12),
(111, '2018-06-13 13:25:16', 'Odjava korisnika', 'Odjava korisnika iz sustav', 12),
(112, '2018-06-13 13:25:32', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(113, '2018-06-13 13:25:52', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 4),
(114, '2018-06-13 13:26:31', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 4),
(115, '2018-06-13 13:27:07', 'Kreiranje', 'Moderator je kreirao vrstu oglasa.', 4),
(116, '2018-06-13 13:27:20', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(117, '2018-06-13 13:33:52', 'Prijava korisnika', 'Prijava korisnika u sustav', 7),
(118, '2018-06-13 13:37:07', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 7),
(119, '2018-06-13 13:39:39', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 7),
(120, '2018-06-13 13:39:52', 'Odjava korisnika', 'Odjava korisnika iz sustav', 7),
(121, '2018-06-13 13:40:02', 'Prijava korisnika', 'Prijava korisnika u sustav', 8),
(122, '2018-06-13 13:41:19', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 8),
(123, '2018-06-13 13:43:23', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 8),
(124, '2018-06-13 13:45:59', 'Odjava korisnika', 'Odjava korisnika iz sustav', 8),
(125, '2018-06-13 13:46:26', 'Prijava korisnika', 'Prijava korisnika u sustav', 9),
(126, '2018-06-13 13:47:44', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 9),
(127, '2018-06-13 13:49:13', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 9),
(128, '2018-06-13 13:49:25', 'Odjava korisnika', 'Odjava korisnika iz sustav', 9),
(129, '2018-06-13 13:49:40', 'Prijava korisnika', 'Prijava korisnika u sustav', 10),
(130, '2018-06-13 13:55:56', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 10),
(131, '2018-06-13 13:59:11', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 10),
(132, '2018-06-13 13:59:23', 'Odjava korisnika', 'Odjava korisnika iz sustav', 10),
(133, '2018-06-13 13:59:39', 'Prijava korisnika', 'Prijava korisnika u sustav', 11),
(134, '2018-06-13 14:03:39', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 11),
(135, '2018-06-13 14:06:41', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 11),
(136, '2018-06-13 14:06:44', 'Odjava korisnika', 'Odjava korisnika iz sustav', 11),
(137, '2018-06-13 14:07:01', 'Prijava korisnika', 'Prijava korisnika u sustav', 13),
(138, '2018-06-13 14:10:51', 'Predan zahtjev', 'Korisnik je predao zahtjev za oglas.', 13),
(139, '2018-06-13 14:10:58', 'Odjava korisnika', 'Odjava korisnika iz sustav', 13),
(140, '2018-06-13 14:11:24', 'Prijava korisnika', 'Prijava korisnika u sustav', 2),
(141, '2018-06-13 14:11:35', 'Odjava korisnika', 'Odjava korisnika iz sustav', 2),
(142, '2018-06-13 14:11:41', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(143, '2018-06-13 14:11:51', 'Prihvaćen oglas', 'Moderator je prihvatio zahtjev za oglas.', 4),
(144, '2018-06-13 14:11:58', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(145, '2018-06-13 14:12:03', 'Prijava korisnika', 'Prijava korisnika u sustav', 3),
(146, '2018-06-13 14:12:08', 'Odjava korisnika', 'Odjava korisnika iz sustav', 3),
(147, '2018-06-13 14:12:14', 'Prijava korisnika', 'Prijava korisnika u sustav', 15),
(148, '2018-06-13 14:12:20', 'Odjava korisnika', 'Odjava korisnika iz sustav', 15),
(149, '2018-06-13 14:12:26', 'Prijava korisnika', 'Prijava korisnika u sustav', 12),
(150, '2018-06-13 14:12:38', 'Prihvaćen oglas', 'Moderator je prihvatio zahtjev za oglas.', 12),
(151, '2018-06-13 14:12:45', 'Odjava korisnika', 'Odjava korisnika iz sustav', 12),
(152, '2018-06-13 14:12:51', 'Prijava korisnika', 'Prijava korisnika u sustav', 14),
(153, '2018-06-13 14:13:19', 'Odjava korisnika', 'Odjava korisnika iz sustav', 14),
(154, '2018-06-13 14:13:28', 'Prijava korisnika', 'Prijava korisnika u sustav', 5),
(155, '2018-06-13 14:14:11', 'Odjava korisnika', 'Odjava korisnika iz sustav', 5),
(156, '2018-06-13 14:14:17', 'Prijava korisnika', 'Prijava korisnika u sustav', 15),
(157, '2018-06-13 14:14:22', 'Odjava korisnika', 'Odjava korisnika iz sustav', 15),
(158, '2018-06-13 14:14:29', 'Prijava korisnika', 'Prijava korisnika u sustav', 14),
(159, '2018-06-13 14:14:33', 'Odjava korisnika', 'Odjava korisnika iz sustav', 14),
(160, '2018-06-13 14:14:37', 'Prijava korisnika', 'Prijava korisnika u sustav', 12),
(161, '2018-06-13 14:14:40', 'Odjava korisnika', 'Odjava korisnika iz sustav', 12),
(162, '2018-06-13 14:14:49', 'Prijava korisnika', 'Prijava korisnika u sustav', 3),
(163, '2018-06-13 14:14:53', 'Odjava korisnika', 'Odjava korisnika iz sustav', 3),
(164, '2018-06-13 14:15:40', 'Prijava korisnika', 'Prijava korisnika u sustav', 12),
(165, '2018-06-13 14:16:34', 'Odjava korisnika', 'Odjava korisnika iz sustav', 12),
(166, '2018-06-13 14:16:39', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(167, '2018-06-13 14:16:49', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(168, '2018-06-13 14:16:56', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(169, '2018-06-13 14:39:44', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(170, '2018-06-13 14:43:44', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(171, '2018-06-13 14:57:37', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(172, '2018-06-13 15:01:54', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(173, '2018-06-13 16:47:04', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(174, '2018-06-13 17:16:54', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(175, '2018-06-13 18:08:17', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(176, '2018-06-13 18:16:02', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(177, '2018-06-13 18:18:27', 'Prijava korisnika', 'Prijava korisnika u sustav', 1),
(178, '2018-06-13 19:06:11', 'Odjava korisnika', 'Odjava korisnika iz sustav', 1),
(179, '2018-06-13 19:06:18', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(180, '2018-06-13 19:06:38', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(181, '2018-06-13 19:06:48', 'Prijava korisnika', 'Prijava korisnika u sustav', 5),
(182, '2018-06-13 19:07:27', 'Odjava korisnika', 'Odjava korisnika iz sustav', 5),
(183, '2018-06-13 19:07:37', 'Prijava korisnika', 'Prijava korisnika u sustav', 4),
(184, '2018-06-13 19:07:55', 'Odjava korisnika', 'Odjava korisnika iz sustav', 4),
(185, '2018-06-13 19:09:44', 'Prijava korisnika', 'Prijava korisnika u sustav', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Korisnik`
--

CREATE TABLE IF NOT EXISTS `Korisnik` (
  `korisnik_id` int(11) NOT NULL AUTO_INCREMENT,
  `Uloga_uloga_id` int(11) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `aktivacijski_kod` varchar(255) DEFAULT NULL,
  `Kriptirana_lozinka` varchar(255) DEFAULT NULL,
  `sol` varchar(255) DEFAULT NULL,
  `Lozinka` varchar(20) NOT NULL,
  `ponovljena_lozinka` varchar(20) NOT NULL,
  PRIMARY KEY (`korisnik_id`),
  KEY `fk_Korisnik_Uloga_idx` (`Uloga_uloga_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Korisnik`
--

INSERT INTO `Korisnik` (`korisnik_id`, `Uloga_uloga_id`, `korisnicko_ime`, `ime`, `prezime`, `email`, `status`, `aktivacijski_kod`, `Kriptirana_lozinka`, `sol`, `Lozinka`, `ponovljena_lozinka`) VALUES
(1, 1, 'mpianec', 'Matija', 'Pianec', 'mpianec@foi.hr', 1, '1f70b0bfb4021644544e8cb92c059bcbab626f73', 'f3bbd33d401199c7f3a7a80f6b9d8883ff6073db', '4f743789543e33ca1d42a79a4560027159aa302b', 'Random123', 'Random123'),
(2, 2, 'mmarkic', 'Marko', 'Markić', 'mattaker.knot@gmail.com', 1, '79db0e00011fcf0d64881b0df9efe0e13402bca9', '94c56a349c62eed0ca6a1e28ce66ce0cf62c8344', '1be8f68a5ddf6551198ca79a1c29db33f1a48eeb', '!bLuXovq', '!bLuXovq'),
(3, 2, 'proba', 'Proba', 'Proba', 'mattaker.knot@gmail.com', 1, '51b51d879ca9340356466c3278b375be550549b2', 'd80e8ce7357d31d53a889bd28de624cc0dae7f2d', 'c415ef3f495d41fd0a8807a71c30ec0eb405345a', 'random123', 'random123'),
(4, 2, 'zzeljic', 'Željko', 'Željić', 'mattaker.knot@gmail.com', 1, '61e5425a8cf3f8bf913f00094f3ab78ea3accddd', '3098a1afa436e7121da8db85403a4f99702094f2', '15b9538668a9f3a6062b6f13fb3f55af8fb732ad', 'lozinka123', 'lozinka123'),
(5, 3, 'hhelic', 'Helga', 'Helgić', 'mattaker.knot@gmail.com', 1, 'd11c6b45d0140349786958ef96b86feb9f08f6f4', '730209f6c1cc3ce121c01239da4c521d7a4cb251', '013c2f6e000afc372e173ab742bdfada68a64c7f', 'lozinka123', 'lozinka123'),
(6, 3, 'nnikic', 'Nikola', 'Nikić', 'mattaker.knot@gmail.com', 1, '288a086aa81ca543ca6b91c14cc7a963054a1316', '293a62fa9f77bb1ebf3c6b7cd5fbe0fbd86ef67d', '81f69e903529457d17c52f60d606970cb99b6754', 'lozinka123', 'lozinka123'),
(7, 3, 'mmaric', 'Marija', 'Marić', 'mattaker.knot@gmail.com', 1, '97765c7115b2da58b9a6796046b8cf77a3656988', '23bb6fa862c4709745302abb27ef1e96ec89aa95', '68f7d9f3c1ac59597d2297e5c7eaf988a8e9a11e', 'lozinka123', 'lozinka123'),
(8, 3, 'aanic', 'Ana', 'Anić', 'mattaker.knot@gmail.com', 1, '0a40e5f9ec26a7b3221a30f13b55008603a905f0', '0ed8b3888ab669d31dcd7559b51f3a8065220d71', '7f837c28ed258892e0bff7a504e229589865e780', 'lozinka123', 'lozinka123'),
(9, 3, 'rratkic', 'Ratko', 'Ratkić', 'mattaker.knot@gmail.com', 1, '647be5d24c6ed0c9c71ea15c9d649a23d02b434f', '645ad6b0f696c3653f03657564d9c2d437a1e693', '7b29b71c1797197fe5638181f0c8f3a3bc16f30c', 'random123', 'random123'),
(10, 3, 'kkristić', 'Kristijan', 'Kristić', 'mattaker.knot@gmail.com', 1, '07628f0c88a763d6ba4df206b3f7b987c9a56194', '4c092743502a38c7781c5ab7a27f6018ad625135', 'f41e636cbbf1e633435d7456ad1cf55bf562275c', 'lozinka123', 'lozinka123'),
(11, 3, 'jjosić', 'Josip', 'Josić', 'mattaker.knot@gmail.com', 1, '4ec0162cd0a6cc4124ab9c6540ae02c362f3620a', 'df66b42b7337f2dcb9f7f9ff357b27837d6f7c24', 'cf2610d16b2f9ed181006a90252eaa8a9bab352b', 'lozinka123', 'lozinka123'),
(12, 2, 'ddraz', 'Dražen', 'Dražić', 'mattaker.knot@gmail.com', 1, 'd93cadc4c4848797f9b242219d9422695a29d484', 'dff54fd9ea1829a1aee2fae6aa33099bf3f71bca', 'bc00d6b38a6f92c65d2d7f1ef4640b24dc7f7056', 'lozinka123', 'lozinka123'),
(13, 3, 'iivic', 'Iva', 'Ivić', 'mattaker.knot@gmail.com', 1, 'c3eef8e2984760d9dca8f8cbbcd7706290b79d4e', '65700fd35ad46b33eb79f9f6af6a4ad127edf49d', 'f3018b7b8ff52e7cfa0a5b47ff8af4b99e88f5f9', 'lozinka123', 'lozinka123'),
(14, 2, 'ssandric', 'Sandra', 'Sandrić', 'mattaker.knot@gmail.com', 1, 'a5560934b61b93bed1b41b2044a9289e8d5a3aa1', 'a66fd4a1b3c3ab33cb73d950551f0ea80c9d0a70', 'f240ccc4abd10bde521fc429f02a1015e9427570', 'lozinka123', 'lozinka123'),
(15, 2, 'nnikolic', 'Nikolina', 'Nikolić', 'mattaker.knot@gmail.com', 1, '1a59c9cf65e752dc9e8dbdd564dafa1b1ce37be7', '6f73e6f7a4e8523a854fa0902fcc0da3895e80b6', '6832e2ac2592359db51385c70c4dd49b14dbc301', 'lozinka123', 'lozinka123');

-- --------------------------------------------------------

--
-- Table structure for table `Moderira`
--

CREATE TABLE IF NOT EXISTS `Moderira` (
  `Korisnik_korisnik_id` int(11) NOT NULL,
  `Ustanove_ustanove_id` int(11) NOT NULL,
  PRIMARY KEY (`Korisnik_korisnik_id`,`Ustanove_ustanove_id`),
  KEY `fk_Korisnik_has_Ustanove_Ustanove1_idx` (`Ustanove_ustanove_id`),
  KEY `fk_Korisnik_has_Ustanove_Korisnik1_idx` (`Korisnik_korisnik_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Moderira`
--

INSERT INTO `Moderira` (`Korisnik_korisnik_id`, `Ustanove_ustanove_id`) VALUES
(15, 1),
(15, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 6),
(2, 7),
(4, 8),
(4, 9),
(14, 10),
(4, 12),
(12, 12),
(12, 13),
(14, 14),
(14, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Nesreća`
--

CREATE TABLE IF NOT EXISTS `Nesreća` (
  `nesreća_id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `opis` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `Ustanove_ustanove_id` int(11) NOT NULL,
  `slika` varchar(45) NOT NULL,
  `Adresa_idAdresa` int(11) NOT NULL,
  PRIMARY KEY (`nesreća_id`),
  KEY `fk_Nesreća_Ustanove1_idx` (`Ustanove_ustanove_id`),
  KEY `fk_Nesreća_Adresa1_idx` (`Adresa_idAdresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Nesreća`
--

INSERT INTO `Nesreća` (`nesreća_id`, `datum`, `opis`, `adresa`, `Ustanove_ustanove_id`, `slika`, `Adresa_idAdresa`) VALUES
(1, '2018-06-04', 'Oružana pljačka banke.', 'Trg Josipa Jurja Strossmayera 256', 1, 'Pljačka.jpg', 1),
(2, '2018-05-16', 'Lakša prometna nesreća bez ozljeđenih.', 'Boškovićeva ulica 35', 1, 'Prometna nesreća.jpg', 2),
(3, '2018-06-04', 'Prometna nesreća', 'Starogradska 73', 13, 'Prometna nesreća.jpg', 3),
(4, '2018-06-20', 'Poplava.', 'Starogradska 200', 8, 'Poplava.jpg', 4),
(5, '2018-04-17', 'Potres', 'Ilica 65', 5, 'Potres.jpeg', 5),
(6, '2018-04-18', 'Prometna nesreća', 'Avenija Dubrava 60', 2, 'Prometna nesreća.jpg', 6),
(7, '2018-01-09', 'Prometna nesreća', 'Gospodarska ulica 80', 12, 'Prometna nesreća.jpg', 7),
(8, '2018-01-09', 'Ozljeđeni u prometnoj nesreći', 'Gospodarska ulica 80', 10, 'Prometna nesreća.jpg', 11),
(9, '2018-01-09', 'Zapaljena vozila u prometnoj nesreći', 'Gospodarska ulica 80', 9, 'Požar.jpg', 10),
(10, '2018-02-13', 'Potres', 'Vojkova cesta 30', 6, 'Potres.jpeg', 8),
(11, '2018-03-07', 'Ozljeđeni u prometnoj nesreći', 'Bulevar Franše d''Eperea 50', 7, 'Prometna nesreća.jpg', 9),
(12, '2018-06-11', 'Ubojstvo', 'Petrova ulica 25', 3, 'Ubojstvo.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `Oglas`
--

CREATE TABLE IF NOT EXISTS `Oglas` (
  `oglas_id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  `Vrsta_oglasa_idVrsta_oglasa` int(11) NOT NULL,
  `Korisnik_korisnik_id` int(11) NOT NULL,
  `broj_klikova` int(11) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `Opis` varchar(100) NOT NULL,
  `Status` varchar(45) NOT NULL,
  `Pozicija_idPozicija` int(11) NOT NULL,
  `url` varchar(150) NOT NULL,
  PRIMARY KEY (`oglas_id`),
  KEY `fk_Oglas_Vrsta_oglasa1_idx` (`Vrsta_oglasa_idVrsta_oglasa`),
  KEY `fk_Oglas_Korisnik1_idx` (`Korisnik_korisnik_id`),
  KEY `fk_Oglas_Pozicija1_idx` (`Pozicija_idPozicija`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Oglas`
--

INSERT INTO `Oglas` (`oglas_id`, `naziv`, `Vrsta_oglasa_idVrsta_oglasa`, `Korisnik_korisnik_id`, `broj_klikova`, `slika`, `Opis`, `Status`, `Pozicija_idPozicija`, `url`) VALUES
(1, 'Oglas računalo', 1, 9, 12, 'https://www.tportal.hr/media/thumbnail/w1000/541450.jpeg', 'Nova računala po povoljnim cijenama!!', 'Aktivan', 1, 'https://www.links.hr/hr/racunala-03'),
(2, 'Oglas opreme', 2, 11, 4, 'https://www.plankos.com/slika/710x304/246.jpg', 'Oprema i strojevi!', 'Aktivan', 2, 'https://www.plankos.com/'),
(3, 'Oglas vozilo', 3, 5, 8, 'https://www.hyundai.com.au/images/UserUploadedImages/176/Veloster-768x432v5.png', 'Novi auto po super cijeni!', 'Aktivan', 3, 'https://www.hyundai.com.au/cars'),
(4, 'Poljoprivredni oglas', 4, 6, 4, 'http://d3u1quraki94yp.cloudfront.net/nhag/eu/en-uk/Assets/Tractors/newT7/t7-tier-4a-overview.png', 'Novi modeli traktora!', 'Aktivan', 4, 'http://agriculture1.newholland.com/eu/en-uk/equipment/products/agricultural-tractors/t7-tier-4a/models'),
(5, 'Tojotica', 3, 6, 0, 'https://www.mikewoodtoyotaofuniontown.com/assets/stock/expanded/white/640/2017tos070004_640/2017tos070004_640_01.jpg', 'Nova Tojotica', 'Blokiran', 4, 'https://www.toyota.hr/'),
(6, 'Faber Castell tehnička', 5, 5, 1, 'https://www.igrackeshop.hr/upload_files/products/faber-castell-tehnicka-olovka-click-2-0mm-2b-u-raznim-bojama.jpg', 'Nove tehničke olovke', 'Neaktivan', 4, 'https://www.igrackeshop.hr/faber-castell-tehni%C4%8Dka-olovka-click-20mm-2b-u-raznim-bojama.html'),
(7, 'Mlijeko', 6, 5, 0, 'https://www.konzum.hr/klik/images/products/022/02233955_1l.jpg?1452965135', 'Svježe mlijeko', 'Neaktivan', 7, 'https://www.konzum.hr/klik/#!/products/50004048/z-bregov-svjeze-mlijeko-3-2-m-m-1-l'),
(8, 'Sportska prema', 13, 7, 0, 'https://www.fitness.com.hr/images/uploads/4075/Sportska-Oprema.jpg', 'Nova sportska oprema', 'Neaktivan', 17, 'https://www.fitness.com.hr/shop/oprema/sportska-oprema.aspx'),
(9, 'Oprema za računala', 16, 7, 0, 'https://www.instar-informatika.hr/slike/velike/tipkovnica-asus-claymore-mx-red-rgb-usb--keyasu009_2.jpg', 'Nova računalna oprema', 'Neaktivan', 14, 'https://www.instar-informatika.hr/misevi-tipkovnice/'),
(10, 'Torbica', 11, 8, 0, 'https://www.saptac.hr/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/7/5/7575.jpg', 'Popust na torbice', 'Neaktivan', 13, 'http://pazarq.com/torbe-i-ruksaci-343/torbice'),
(11, 'Preporuke knjiga', 15, 8, 0, 'https://citajknjigu.com/wp-content/uploads/2014/07/10463009_316462921863012_298275005972337747_n1.jpg', 'Dobre preporuke ako ne znate što čitati', 'Neaktivan', 8, 'https://citajknjigu.com/preporuke-za-mlade-one-koji-se-tako-osjecaju-lista-knjiga-za-ya-young-adult/'),
(12, 'Namještaj', 8, 9, 5, 'https://www.namjestaj.hr/images/detailed/243/tapecirani-namjestaj-mt248-243958.jpg', 'Novi tapecirani namještaj', 'Aktivan', 10, 'https://www.namjestaj.hr/tapecirani-namjestaj/setovi-tapeciranog-namjestaja/tapecirani-namjestaj-mt248.html'),
(13, 'Nove led žarulje', 14, 9, 0, 'https://www.silux.hr/media/cache/novo-led-zarulje-premium-ponuda-7d1a46ff6cd7faab9e404447ea5265a0.jpeg', 'Nove led žarulje stigle u ponudu!', 'Aktivan', 18, 'https://www.silux.hr/'),
(14, 'Metallica majica', 9, 10, 0, 'https://metalshopcomhr.vshcdn.net/images/produkty/thumb2/102044_resize.jpg', 'Majice Vaših najdražih bendova na jednome mjestu!', 'Neaktivan', 12, 'https://www.metalshop.com.hr/b/metallica/pg/3/'),
(15, 'Prijevoz na koncert', 17, 10, 0, 'https://www.hallenstadion.ch/media/uploads/events/2594/images/iron-maiden-plakat.jpg?w=525&c=150x215', 'Prijevoz na koncert Iron Maidena po povoljnoj cijeni', 'Aktivan', 15, 'http://silvija-turist.hr/andreabocelli/'),
(16, 'Nike tenisice', 10, 11, 7, 'https://www.sportvision.hr/files/thumbs/files/images/slike_proizvoda/thumbs_640/599409-007_640_640px.jpg', 'Nike tenisice na sniženju', 'Aktivan', 11, 'https://www.sportvision.hr/obuca/353354-wmns-nike-air-max-thea'),
(17, 'Ožujsko', 12, 11, 0, 'https://www.konzum.hr/klik/images/products/901/90168880_1.jpg?1512984865', 'Ožujsko pivo na akciji!', 'Aktivan', 16, 'https://www.konzum.hr/klik/#!/products/60139694/ozujsko-svijetlo-pivo-2-l'),
(18, 'Sendvič pršut', 7, 13, 0, 'http://www.mlinar.hr/wp-content/uploads/2013/06/sendvic_prsut-600x380.png', 'Fini sendvič pršut', 'Neaktivan', 8, 'http://www.mlinar.hr/blog/2013/06/03/sendvic-prsut/');

-- --------------------------------------------------------

--
-- Table structure for table `PomakVremena`
--

CREATE TABLE IF NOT EXISTS `PomakVremena` (
  `pomakVremena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PomakVremena`
--

INSERT INTO `PomakVremena` (`pomakVremena`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `Pozicija`
--

CREATE TABLE IF NOT EXISTS `Pozicija` (
  `idPozicija` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) NOT NULL,
  `širina` int(11) NOT NULL,
  `visina` int(11) NOT NULL,
  `Stranica_idStranica` int(11) NOT NULL,
  `Korisnik_korisnik_id` int(11) NOT NULL,
  PRIMARY KEY (`idPozicija`),
  KEY `fk_Pozicija_Stranica1_idx` (`Stranica_idStranica`),
  KEY `fk_Pozicija_Korisnik1_idx` (`Korisnik_korisnik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Pozicija`
--

INSERT INTO `Pozicija` (`idPozicija`, `naziv`, `širina`, `visina`, `Stranica_idStranica`, `Korisnik_korisnik_id`) VALUES
(1, 'Gore', 300, 200, 1, 2),
(2, 'Dole', 300, 200, 1, 2),
(3, 'Gore', 500, 300, 2, 2),
(4, 'Dole', 500, 300, 2, 3),
(7, 'Probna pozicija', 420, 169, 1, 3),
(8, 'Srednja pozicija', 400, 200, 2, 4),
(10, 'Doljnja pozicija', 400, 200, 3, 15),
(11, 'Doljnja pozicija', 300, 150, 4, 14),
(12, 'Srednja pozicija', 250, 100, 4, 15),
(13, 'Lijeva pozicija', 100, 500, 1, 14),
(14, 'Gornja pozicija', 400, 200, 2, 4),
(15, 'Desna pozicija', 100, 500, 4, 4),
(16, 'Gornja pozicija', 400, 250, 4, 12),
(17, 'Desna pozicija', 100, 400, 1, 12),
(18, 'Lijeva pozicija', 100, 300, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `Prijavljuje`
--

CREATE TABLE IF NOT EXISTS `Prijavljuje` (
  `Korisnik_korisnik_id` int(11) NOT NULL,
  `Nesreća_nesreća_id` int(11) NOT NULL,
  PRIMARY KEY (`Korisnik_korisnik_id`,`Nesreća_nesreća_id`),
  KEY `fk_Korisnik_has_Nesreća_Nesreća1_idx` (`Nesreća_nesreća_id`),
  KEY `fk_Korisnik_has_Nesreća_Korisnik1_idx` (`Korisnik_korisnik_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Prijavljuje`
--

INSERT INTO `Prijavljuje` (`Korisnik_korisnik_id`, `Nesreća_nesreća_id`) VALUES
(5, 1),
(9, 1),
(6, 2),
(7, 3),
(8, 4),
(9, 5),
(10, 6),
(11, 7),
(13, 8),
(5, 9),
(11, 9),
(6, 10),
(7, 11),
(8, 12),
(10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `Stranica`
--

CREATE TABLE IF NOT EXISTS `Stranica` (
  `idStranica` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(150) NOT NULL,
  PRIMARY KEY (`idStranica`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Stranica`
--

INSERT INTO `Stranica` (`idStranica`, `url`) VALUES
(1, 'index.php'),
(2, 'ustanove.php'),
(3, 'Registracija.php'),
(4, 'Prijava.php');

-- --------------------------------------------------------

--
-- Table structure for table `Uloga`
--

CREATE TABLE IF NOT EXISTS `Uloga` (
  `uloga_id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(25) NOT NULL,
  PRIMARY KEY (`uloga_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Uloga`
--

INSERT INTO `Uloga` (`uloga_id`, `naziv`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'Registrirani korisnik'),
(4, 'Neregistrirani korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `Ustanove`
--

CREATE TABLE IF NOT EXISTS `Ustanove` (
  `ustanove_id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(50) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  PRIMARY KEY (`ustanove_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Ustanove`
--

INSERT INTO `Ustanove` (`ustanove_id`, `naziv`, `adresa`) VALUES
(1, 'Policijska postaja Centar', 'Trg Josipa Jurja Strossmayera 3 10000 Zagreb'),
(2, 'Policijska postaja Dubrava', 'Avenija Dubrava 137 10000 Zagreb'),
(3, 'Policijska postaja Maksimir', 'Petrova ulica 152 10000 Maksimir'),
(4, 'Hitna pomoć Novi Zagreb', 'Avenije Većeslava Holjevca 22'),
(5, 'Hitna pomoć', 'Heinzelova 88 10000 Zagreb'),
(6, 'Vatrogasna postaja Ljubljana', 'Vojkova cesta 19, 1000 Ljubljana'),
(7, 'Hitna pomoć Beograd', 'Bulevar Franše d''Eperea 5, Beograd 11000'),
(8, 'Vatrogasna postrojba Koprivnica', 'Oružanska ulica 1,48000 Koprivnica'),
(9, 'Vatrogasna postrojba Varaždin', 'Ul. Baruna Trenka 44, 42000, Varaždin'),
(10, 'Opća bolnica Varaždin', 'Ivana Meštrovića 1 42000 Varaždin'),
(12, 'Policijska postaja Varaždin', ' Ul. Augusta Cesarca 18'),
(13, 'Auto Klub Koprivnica', 'Starogradska ul. 45, 48000, Koprivnica'),
(14, 'Auto Klub Varaždin', 'Gospodarska ul. 58, 42000, Varaždin'),
(15, 'Hrvatski autoklub', 'Avenija Dubrovnik 44, 10010, Zagreb');

-- --------------------------------------------------------

--
-- Table structure for table `Vrsta_oglasa`
--

CREATE TABLE IF NOT EXISTS `Vrsta_oglasa` (
  `idVrsta_oglasa` int(11) NOT NULL AUTO_INCREMENT,
  `trajanje_prikaza` int(11) NOT NULL,
  `brzina_izmjene` int(11) NOT NULL,
  `cijena` double NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `Pozicija_idPozicija` int(11) NOT NULL,
  PRIMARY KEY (`idVrsta_oglasa`),
  KEY `fk_Vrsta_oglasa_Pozicija1_idx` (`Pozicija_idPozicija`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Vrsta_oglasa`
--

INSERT INTO `Vrsta_oglasa` (`idVrsta_oglasa`, `trajanje_prikaza`, `brzina_izmjene`, `cijena`, `naziv`, `Pozicija_idPozicija`) VALUES
(1, 1, 3, 300, 'Računala', 1),
(2, 2, 4, 500, 'Oprema', 2),
(3, 5, 3, 600, 'Vozilo', 3),
(4, 6, 6, 923, 'Poljoprivreda', 4),
(5, 3, 5, 500, 'Pribor za školu', 4),
(6, 1, 1, 150, 'Hrana', 7),
(7, 2, 4, 123, 'Oglas za sendvič', 8),
(8, 3, 2, 1400, 'Namještaj', 10),
(9, 4, 2, 120, 'Odjeća', 12),
(10, 3, 2, 150, 'Obuća', 11),
(11, 4, 3, 300, 'Torbice', 13),
(12, 3, 2, 110, 'Pivo', 16),
(13, 2, 2, 200, 'Sportska oprema', 17),
(14, 4, 2, 400, 'Auto dijelovi', 18),
(15, 2, 1, 100, 'Knjige', 8),
(16, 3, 2, 250, 'Računalna oprema', 14),
(17, 7, 6, 1600, 'Prijevoz', 15);

-- --------------------------------------------------------

--
-- Table structure for table `Zahtjev_za_blokiranje_oglasa`
--

CREATE TABLE IF NOT EXISTS `Zahtjev_za_blokiranje_oglasa` (
  `razlog_blokiranja` varchar(200) NOT NULL,
  `Oglas_oglas_id` int(11) NOT NULL,
  `Korisnik_korisnik_id` int(11) NOT NULL,
  `Zahtjev_za_blokiranje_oglasa_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Zahtjev_za_blokiranje_oglasa_id`),
  KEY `fk_ZahtjevZaBlokiranjeOglasa_Oglas1_idx` (`Oglas_oglas_id`),
  KEY `fk_ZahtjevZaBlokiranjeOglasa_Korisnik1_idx` (`Korisnik_korisnik_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Zahtjev_za_blokiranje_oglasa`
--

INSERT INTO `Zahtjev_za_blokiranje_oglasa` (`razlog_blokiranja`, `Oglas_oglas_id`, `Korisnik_korisnik_id`, `Zahtjev_za_blokiranje_oglasa_id`) VALUES
('Neprimjeren sadržaj.', 5, 2, 2),
('Ne volim sivo.', 3, 5, 14),
('Nisam farmerica, kome to treba?', 4, 5, 15),
('Slab motor', 5, 6, 16),
('Ne slušam sotonističku glazbu', 15, 5, 17);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dnevnikRada`
--
ALTER TABLE `dnevnikRada`
  ADD CONSTRAINT `fk_dnevnikRada_Korisnik1` FOREIGN KEY (`Korisnik_korisnik_id`) REFERENCES `Korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Korisnik`
--
ALTER TABLE `Korisnik`
  ADD CONSTRAINT `fk_Korisnik_Uloga` FOREIGN KEY (`Uloga_uloga_id`) REFERENCES `Uloga` (`uloga_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Moderira`
--
ALTER TABLE `Moderira`
  ADD CONSTRAINT `fk_Korisnik_has_Ustanove_Korisnik1` FOREIGN KEY (`Korisnik_korisnik_id`) REFERENCES `Korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Korisnik_has_Ustanove_Ustanove1` FOREIGN KEY (`Ustanove_ustanove_id`) REFERENCES `Ustanove` (`ustanove_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Nesreća`
--
ALTER TABLE `Nesreća`
  ADD CONSTRAINT `fk_Nesreća_Ustanove1` FOREIGN KEY (`Ustanove_ustanove_id`) REFERENCES `Ustanove` (`ustanove_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Nesreća_Adresa1` FOREIGN KEY (`Adresa_idAdresa`) REFERENCES `Adresa` (`idAdresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Oglas`
--
ALTER TABLE `Oglas`
  ADD CONSTRAINT `fk_Oglas_Korisnik1` FOREIGN KEY (`Korisnik_korisnik_id`) REFERENCES `Korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Oglas_Pozicija1` FOREIGN KEY (`Pozicija_idPozicija`) REFERENCES `Pozicija` (`idPozicija`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Oglas_Vrsta_oglasa1` FOREIGN KEY (`Vrsta_oglasa_idVrsta_oglasa`) REFERENCES `Vrsta_oglasa` (`idVrsta_oglasa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Pozicija`
--
ALTER TABLE `Pozicija`
  ADD CONSTRAINT `fk_Pozicija_Stranica1` FOREIGN KEY (`Stranica_idStranica`) REFERENCES `Stranica` (`idStranica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pozicija_Korisnik1` FOREIGN KEY (`Korisnik_korisnik_id`) REFERENCES `Korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Prijavljuje`
--
ALTER TABLE `Prijavljuje`
  ADD CONSTRAINT `fk_Korisnik_has_Nesreća_Korisnik1` FOREIGN KEY (`Korisnik_korisnik_id`) REFERENCES `Korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Korisnik_has_Nesreća_Nesreća1` FOREIGN KEY (`Nesreća_nesreća_id`) REFERENCES `Nesreća` (`nesreća_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Vrsta_oglasa`
--
ALTER TABLE `Vrsta_oglasa`
  ADD CONSTRAINT `fk_Vrsta_oglasa_Pozicija1` FOREIGN KEY (`Pozicija_idPozicija`) REFERENCES `Pozicija` (`idPozicija`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Zahtjev_za_blokiranje_oglasa`
--
ALTER TABLE `Zahtjev_za_blokiranje_oglasa`
  ADD CONSTRAINT `fk_ZahtjevZaBlokiranjeOglasa_Korisnik1` FOREIGN KEY (`Korisnik_korisnik_id`) REFERENCES `Korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ZahtjevZaBlokiranjeOglasa_Oglas1` FOREIGN KEY (`Oglas_oglas_id`) REFERENCES `Oglas` (`oglas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
