-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 05:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reviewproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `jenisID` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`jenisID`, `jenis`) VALUES
(17, 'Bahan Baku'),
(28, 'Elektronik'),
(29, 'tumbuhan'),
(31, 'tanaman'),
(32, 'Hewan'),
(33, 'makanan'),
(35, 'asdf'),
(36, 'asdf'),
(37, 'asdf'),
(38, 'asdf'),
(39, 'asdf'),
(40, 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(11, 'admin', 'MTIz'),
(16, 'rakean', 'MzIx'),
(17, 'agus', 'YXNkYQ=='),
(19, 'muhammad ibnu', 'MTIz');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenisID` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tglinput` date NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `nama`, `jenisID`, `foto`, `tglinput`, `ket`) VALUES
(2, 'rasd', 20, 'final_6087bf561763db009cff8685_463066.png', '2021-04-29', 'asdasd'),
(4, 'hengpong', 28, '1.png', '2021-04-29', '32gb ram, snapdragong 666'),
(6, 'laptop', 28, 'RobloxScreenShot20210119_110448160.png', '2021-05-02', 'spek dewa'),
(8, 'lukisan', 32, 'fbe070f5a55bb4a6a981b3f6ad77ea6b.png', '2021-04-30', 'waw'),
(9, 'kertas', 17, 'Screenshot 2021-05-02 083634.png', '2021-05-02', 'oh'),
(10, 'asdasd', 29, 'e6147302-97a9-43bf-b095-295f0df228d2.jpg', '2021-05-02', 'asdasd'),
(11, 'fgjfghjvvb', 31, 'mockup rakean rpl xi-2.png', '2021-05-02', 'ya'),
(12, 'test', 17, 'tanda tangan.jpg', '2021-05-02', 'qwqe'),
(13, 'bncvbncvbn', 28, 'final_6087bf561763db009cff8685_463066.png', '2021-05-02', 'asad'),
(14, 'xcvbx', 29, 'final_6087bf561763db009cff8685_463066.png', '2021-05-02', 'qweqw'),
(15, 'sdfgsdfg', 17, 'final_6087bf561763db009cff8685_463066.png', '2021-05-02', 'asdf'),
(16, 'lah', 28, 'final_6087bf561763db009cff8685_463066.png', '2021-05-02', 'asd'),
(17, 'asdasd', 17, '', '2021-05-02', 'asdfasdf'),
(18, 'fgh', 17, '', '2021-05-02', 'sdfg'),
(19, 'asdf', 28, 'final_6087bf561763db009cff8685_463066.png', '2021-05-02', 'asdf'),
(20, 'asd', 28, '', '2021-05-02', 'asd'),
(21, 'raraaarrrara', 17, 'final_6087bf561763db009cff8685_463066.png', '2021-05-02', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `review` varchar(100) NOT NULL,
  `nilai` int(5) NOT NULL,
  `tglinput` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`jenisID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `jenisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
