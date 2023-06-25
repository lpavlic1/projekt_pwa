-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 08:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$EECmu4KDnj9ZFPFk28aQK.suHw4UC6DsDB1qUUTP/T2I2CZy6ys5e', 1),
(8, 'user1', 'user1', 'user1', '$2y$10$SdIRqrQbI3jf3U8KPaZ0nunFeYK6wxGGadE8.N3PVvEME4XemBWxC', 0),
(17, 'user', 'user', 'user', '$2y$10$uviOpl5LmcVip4YHRaGOZOJqSl6A3sj3AgHsMBpQNIEdLwrBXmRj.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijest`
--

CREATE TABLE `vijest` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijest`
--

INSERT INTO `vijest` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '2023-06-22', 'Bill Maher Tears Into Restrictive New Anti-Abortion Laws', 'Bill Maher Tears Into Restrictive New Anti-Abortion Laws', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ornare iaculis purus, semper interdum lorem vulputate sed. Suspendisse volutpat, magna fringilla faucibus tempus, risus metus scelerisque erat, ut fringilla est nibh nec erat. Donec vel viverra velit, a eleifend ipsum. Nulla id erat id ipsum tempor rutrum. Aliquam pretium semper facilisis. Etiam fringilla at mi non ultrices. Etiam vehicula, justo ut ullamcorper rhoncus, neque augue viverra diam, id feugiat libero justo a felis. Curabitur quis lobortis lacus, sit amet egestas sem. Phasellus rutrum, nibh eget vehicula tristique, nunc turpis viverra elit, et laoreet turpis dolor vitae risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque quis arcu eget quam interdum commodo. Praesent vel sapien nec nisi aliquam sodales id vitae massa.', '04.jpg', 'U.S', 0),
(2, '2023-06-22', 'John McAfee Is Running for President and Wants You to \'Wake the ', 'John McAfee Is Running for President and Wants You to \'Wake the F*** Up\'', 'Donec pharetra massa mattis sodales rhoncus. Duis vitae est in sapien feugiat pellentesque a sollicitudin enim. Ut ornare volutpat nisl, et ullamcorper nisi placerat imperdiet. Morbi nisi eros, mattis et ante et, placerat rutrum libero. Donec non libero varius nibh ullamcorper euismod nec et lectus. Sed malesuada facilisis volutpat. Nunc sed sem sem.', '05.jpg', 'U.S', 0),
(3, '2023-06-22', 'Eurovision 2019: Israelis and Palestinians Fight to Be Heard', 'Eurovision 2019: Israelis and Palestinians Fight to Be Heard', 'Sed est tellus, laoreet sit amet purus sed, hendrerit tempus massa. Etiam consectetur consectetur hendrerit. Etiam sit amet lectus quis felis dictum consequat quis nec nisl. Mauris imperdiet velit ac augue pulvinar, sed gravida nibh posuere. Praesent arcu erat, convallis sit amet lectus in, interdum finibus erat. Suspendisse rutrum arcu velit. Aenean ex nibh, pulvinar vel rhoncus ut, auctor nec eros. Aliquam volutpat pellentesque lectus, non malesuada metus lobortis ut. Duis lobortis metus tincidunt lectus venenatis luctus. Nam sem nibh, sollicitudin sed neque vitae, blandit eleifend nunc. Vivamus quis convallis massa.', '06.jpg', 'World', 0),
(4, '2023-06-22', 'Could U.S. Defeat Iran\'s Navy? This Exercise Shows War Would Not', 'Could U.S. Defeat Iran\'s Navy? This Exercise Shows War Would Not Be Easy', 'Mauris eleifend porta nibh nec pretium. Praesent accumsan odio quis eleifend porta. Donec sed consequat diam. Donec hendrerit turpis et turpis blandit viverra. Duis vulputate suscipit euismod. Nam ut aliquam est, ut dictum sapien. Etiam aliquet nisl porta tempus scelerisque. Integer sodales nibh vulputate, gravida quam et, mattis velit.', '07.jpg', 'World', 0),
(5, '2023-06-22', 'John McAfee Is Running for President and Wants You to \'Wake the ', 'John McAfee Is Running for President and Wants You to \'Wake the F*** Up\'', 'Donec pharetra massa mattis sodales rhoncus. Duis vitae est in sapien feugiat pellentesque a sollicitudin enim. Ut ornare volutpat nisl, et ullamcorper nisi placerat imperdiet. Morbi nisi eros, mattis et ante et, placerat rutrum libero. Donec non libero varius nibh ullamcorper euismod nec et lectus. Sed malesuada facilisis volutpat. Nunc sed sem sem.', '05.jpg', 'U.S', 0),
(6, '2023-06-22', 'Could U.S. Defeat Iran\'s Navy? This Exercise Shows War Would Not', 'Could U.S. Defeat Iran\'s Navy? This Exercise Shows War Would Not Be Easy', 'Mauris eleifend porta nibh nec pretium. Praesent accumsan odio quis eleifend porta. Donec sed consequat diam. Donec hendrerit turpis et turpis blandit viverra. Duis vulputate suscipit euismod. Nam ut aliquam est, ut dictum sapien. Etiam aliquet nisl porta tempus scelerisque. Integer sodales nibh vulputate, gravida quam et, mattis velit.', '07.jpg', 'World', 0),
(7, '23.06.2023', 'Naslov vijesti od 5-30 znakova', 'Kratki sadrzaj od 10-100 znakova', 'Tekst', '02.jpg', 'U.S', 1),
(8, '24.06.2023', 'naslov od 5-30 znakova', 'kratki sadrzaj 10-100 znakova', 'tekst', 'fe-superbugs-siebar-qa-538406951.jpg', 'World', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime_ix` (`korisnicko_ime`);

--
-- Indexes for table `vijest`
--
ALTER TABLE `vijest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vijest`
--
ALTER TABLE `vijest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
