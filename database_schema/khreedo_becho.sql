-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 12:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khreedo_becho`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `adv_id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price_initial` int(6) NOT NULL,
  `price_final` int(6) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `area` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approve` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`adv_id`, `username`, `title`, `price_initial`, `price_final`, `phone`, `address`, `area`, `category`, `description`, `image`, `datetime`, `approve`) VALUES
(27, 'rohit', 'MOTO G', 10000, 12000, '9939255638', 'hostel 5', 'chhapra', 'mobile', '', '1559397_847154891980343_7299923764147486797_o.jpg', '2016-11-09 05:12:51', 1),
(29, 'rocky', 'Harry Potter Chamber of Secret !', 300, 400, '9672421899', 'null', 'kota', 'book', '', 'HarryPotterandtheChamberofSecrets5.jpg', '2016-11-06 15:29:05', 1),
(31, 'akki', 'Skull Candy Headphone', 3000, 3500, '9874127891', '', 'sikar', 'accesories', 'Supersonic Boom Sound !', 'img-thing.jpe', '2016-11-06 15:28:14', 1),
(34, 'rohit', 'Black Berry Z', 21000, 27000, '9614752144', 'hostel 6', 'ajmer', 'mobile', 'abcd', 'WR_P21.png', '2016-11-09 04:23:01', 0),
(41, 'akki', 'Hero Cycle', 5000, 6000, '9939255638', 'B-155 Vigyan Nagar kota', 'kota', 'bicycle', 'Stunning bicycle .. with gears', 'bicycles-87a.jpg', '2016-11-07 10:56:03', 1),
(42, 'rocky', 'Bicycle for kids', 2510, 3200, '9541234789', 'A-19 Ram Nagar jodhpur', 'jodhpur', 'bicycle', '', 'Bsa-Champ-Cybot-Sports-Bicycle-SDL085379438-1-9b531.jpg', '2016-11-08 19:03:57', 1),
(43, 'rocky', 'Chacha Choudhary comics bundle', 3000, 3500, '9841254796', 'kota', 'kota', 'book', 'ka babua , ka haal ba', 'Chacha-chaudhari-Billoo-Pinky-copy.jpg', '2016-11-08 19:03:51', 1),
(44, 'akki', 'PSP Play Station Portable', 12000, 16000, '9471214512', 'hostel 3  room-10 MNIT jaipur', 'jaipur', 'other', 'PSP 6month old. with original bill', 'B001KMRN0M-1-lg.jpg', '2016-11-09 06:27:02', 1),
(46, 'rocky', 'FIFA 2017 for Xbox 360 (100% original)', 3000, 3500, '9939255638', 'Rajeev Gandhi Nagar ,Kota', 'kota', 'other', '100% original game !', '1467735602655.png', '2016-11-07 11:22:07', 1),
(51, 'rohit', 'Captain America DVD collection', 3000, 4000, '9672421899', 'Aurobindo hostel MNIT', 'jaipur', 'other', '100% original', 'VDVFEVE.jpg', '2017-08-08 19:24:28', 1),
(52, 'cp01', 'Robot toy', 400, 500, '9699663333', '', 'jaipur', 'other', 'Brand new', 'puzzle_blue.png', '2017-08-08 19:24:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `negotiations`
--

CREATE TABLE `negotiations` (
  `neg_id` int(11) NOT NULL,
  `adv_id` int(11) NOT NULL,
  `interested_username` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negotiations`
--

INSERT INTO `negotiations` (`neg_id`, `adv_id`, `interested_username`, `message`) VALUES
(12, 43, 'rohit', 'bhai final price bataao '),
(14, 34, 'rocky', 'bhai 20000 me dega ???'),
(15, 27, 'rocky', 'bhai 8000 me dega???'),
(16, 44, 'rohit', 'bhai bahut menga hai 6000 me de do '),
(17, 52, 'rohit', 'bhai 100 me doge ???');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `name`, `password`, `email`, `phone`) VALUES
('akki', 'Akshay Nagar', '202cb962ac59075b964b07152d234b70', 'aki@gmail.com', '9876543210'),
('anjnerajat', 'RAjat', 'd2ff3b88d34705e01d150c21fa7bde07', 'anjnerajat@gmail.com', '1234567890'),
('cp01', 'cp', '202cb962ac59075b964b07152d234b70', 'cp@gmail.com', '9874563210'),
('player', 'neewqa', '0cc175b9c0f1b6a831c399e269772661', 'a@bc.com', '1234567890'),
('prk', 'Ravi Kiran', '202cb962ac59075b964b07152d234b70', '2014ucp1571@mnit.ac.in', '7073155403'),
('rocky', 'Shubham', '202cb962ac59075b964b07152d234b70', 'x@y.com', '1234567890'),
('rohit', 'Rohit Kumar', '202cb962ac59075b964b07152d234b70', 'user@hotmail.com', '9939255638'),
('rohit114', 'Rohit Kumar', '827ccb0eea8a706c4c34a16891f84e7b', 'rohitkumardas114@hotmail.com', '9939255638'),
('userXXX', 'XXXX', '161c99fd5d38f85105c2167f815fd709', 'admin@gmail.com', '9939255638'),
('wrat004', 'Abhishek Verma', '8ad2882f2b3f52996958cc71415fde12', 'iamvermaabhishek@gmail.com', '9694604982');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`adv_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `negotiations`
--
ALTER TABLE `negotiations`
  ADD PRIMARY KEY (`neg_id`),
  ADD KEY `adv_id` (`adv_id`),
  ADD KEY `interested_username` (`interested_username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `adv_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `negotiations`
--
ALTER TABLE `negotiations`
  MODIFY `neg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `user_adv` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `negotiations`
--
ALTER TABLE `negotiations`
  ADD CONSTRAINT `neg-adv` FOREIGN KEY (`adv_id`) REFERENCES `advertisements` (`adv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `neg-user` FOREIGN KEY (`interested_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
