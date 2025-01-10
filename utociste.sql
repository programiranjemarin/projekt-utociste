-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2024 at 08:00 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utociste`
--

-- --------------------------------------------------------

--
-- Table structure for table `karton`
--

DROP TABLE IF EXISTS `karton`;
CREATE TABLE IF NOT EXISTS `karton` (
  `id` int NOT NULL AUTO_INCREMENT,
  `oibVetAmb` int NOT NULL,
  `opisPregleda` text COLLATE utf8mb3_croatian_ci NOT NULL,
  `datumPregleda` varchar(50) COLLATE utf8mb3_croatian_ci NOT NULL,
  `iduciDatumPregleda` varchar(50) COLLATE utf8mb3_croatian_ci NOT NULL,
  `idZivotinje` varchar(255) COLLATE utf8mb3_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_croatian_ci;

--
-- Dumping data for table `karton`
--

INSERT INTO `karton` (`id`, `oibVetAmb`, `opisPregleda`, `datumPregleda`, `iduciDatumPregleda`, `idZivotinje`) VALUES
(1, 5569221, 'Pregled šapa i kukova.', '5.5.2024', '10.10.2024', '00000001'),
(7, 9998712, 'Cijepivo', '10.1.2024', '20.5.2024', '00000001'),
(9, 2147483647, 'Sistematski pregled', '1.1.2024', '10.1.2025', '00000001'),
(16, 333221, 'Cijepljenje i čišćenje.', '2.4.2024', '18.2.2025', '00000002'),
(17, 33455, 'Čišćenje', '5.7.2024', '1.1.2025', '00000003'),
(19, 123, 'Sistematski pregled', '10.1.2024', '10.1.2025', '00000004'),
(20, 12345, 'Češljanje i čišćenje.', '10.1.2024', '20.5.2024', '00000005');

-- --------------------------------------------------------

--
-- Table structure for table `zivotinja`
--

DROP TABLE IF EXISTS `zivotinja`;
CREATE TABLE IF NOT EXISTS `zivotinja` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) COLLATE utf8mb3_croatian_ci NOT NULL,
  `pasmina` varchar(50) COLLATE utf8mb3_croatian_ci NOT NULL,
  `idZivotinje` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_croatian_ci NOT NULL,
  `slika` varchar(255) COLLATE utf8mb3_croatian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_croatian_ci;

--
-- Dumping data for table `zivotinja`
--

INSERT INTO `zivotinja` (`id`, `ime`, `pasmina`, `idZivotinje`, `slika`) VALUES
(1, 'Rex', 'Njemački ovčar', '00000001', 'https://www.purina.hr/sites/default/files/styles/ttt_image_510/public/2021-02/BREED%20Hero%20Mobile_0112_german_shepherd.jpg?itok=eX51I1YF'),
(2, 'Pero', 'Pudlica', '00000002', 'https://www.zooplus.hr/magazin/wp-content/uploads/2017/03/AdobeStock_67989298.webp'),
(3, 'Bull', 'Buldog', '00000003', 'https://media-eu.husse.com/media/72/51/36/1607076929/iStock-1018276002.jpg'),
(4, 'Terry', 'Škotski terijer', '00000004', 'https://enciklopedija.hr/slike/he/slike/HE10_0868.jpg'),
(5, 'Korg', 'Korgi', '00000005', 'https://www.zoocity.hr/media/blog/cache/800x_0/magefan_blog/Velski_korgi.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
