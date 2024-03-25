-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 12:15 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leafnow`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogdata`
--

CREATE TABLE `blogdata` (
  `blogId` int(10) NOT NULL,
  `blogUser` varchar(256) NOT NULL,
  `blogTitle` varchar(256) NOT NULL,
  `blogContent` longtext NOT NULL,
  `blogTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogdata`
--

INSERT INTO `blogdata` (`blogId`, `blogUser`, `blogTitle`, `blogContent`, `blogTime`, `likes`) VALUES
(20, 'test', 'Seeds', '<p>seeds</p>\r\n', '2022-06-02 20:01:08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `blogfeedback`
--

CREATE TABLE `blogfeedback` (
  `blogId` int(10) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `commentUser` varchar(256) NOT NULL,
  `commentPic` varchar(256) NOT NULL DEFAULT 'profile0.png',
  `commentTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogfeedback`
--

INSERT INTO `blogfeedback` (`blogId`, `comment`, `commentUser`, `commentPic`, `commentTime`) VALUES
(20, 'Chia seeds', 'abc', 'profile0.png', '2022-06-02 20:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `likedata`
--

CREATE TABLE `likedata` (
  `blogId` int(10) NOT NULL,
  `blogUserId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likedata`
--

INSERT INTO `likedata` (`blogId`, `blogUserId`) VALUES
(19, 3),
(20, 4),
(20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mycart`
--

CREATE TABLE `mycart` (
  `bid` int(10) NOT NULL,
  `pid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mycart`
--

INSERT INTO `mycart` (`bid`, `pid`) VALUES
(3, 27),
(3, 30),
(4, 35),
(6, 38),
(7, 36);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `uid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `pcat` varchar(255) NOT NULL,
  `pinfo` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `pimage` varchar(255) NOT NULL DEFAULT 'blank.png',
  `picStatus` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`uid`, `pid`, `product`, `pcat`, `pinfo`, `price`, `pimage`, `picStatus`) VALUES
(4, 35, 'Lilly', 'plants', '<p>Lilly plant</p>\r\n', 10, 'Lilly4.png', 1),
(4, 36, 'Money Plant', 'plants', '<p>Awesome Money Plant</p>\r\n', 50, 'Money Plant4.png', 1),
(4, 37, 'Chia seeds', 'seeds', '<p>chia seeds</p>\r\n', 200, 'Chia seeds4.png', 1),
(4, 38, 'Pumpkin Seeds', 'seeds', '<p>Fresh pumpkin seeds</p>\r\n', 100, 'Pumpkin Seeds4.png', 1),
(6, 39, 'Lilly Plant', 'plants', '<p>Beautiful lilly plant</p>\r\n', 150, 'Lilly Plant6.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`pid`, `name`, `rating`, `comment`) VALUES
(35, 'abc', 10, 'Good Product'),
(35, 'test', 8, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `servicedata`
--

CREATE TABLE `servicedata` (
  `serviceId` int(10) NOT NULL,
  `serviceUser` varchar(256) NOT NULL,
  `serviceTitle` varchar(256) NOT NULL,
  `serviceContent` longtext NOT NULL,
  `serviceTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `likes` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicedata`
--

INSERT INTO `servicedata` (`serviceId`, `serviceUser`, `serviceTitle`, `serviceContent`, `serviceTime`, `likes`) VALUES
(0, 'test', 'Plants', '', '2022-06-02 19:59:49', 0),
(0, 'test', 'Plants', '<p>Lilly plant</p>\r\n', '2022-06-02 20:00:11', 0),
(0, 'abc', 'Seeds', '<p>Chia Seeds</p>\r\n', '2022-06-02 20:25:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `servicefeedback`
--

CREATE TABLE `servicefeedback` (
  `serviceId` int(10) NOT NULL,
  `comment` varchar(256) NOT NULL,
  `servicetUser` varchar(256) NOT NULL,
  `servicePic` varchar(256) NOT NULL DEFAULT 'profile0.png',
  `serviceTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicefeedback`
--

INSERT INTO `servicefeedback` (`serviceId`, `comment`, `servicetUser`, `servicePic`, `serviceTime`) VALUES
(0, 'nice', 'test', 'profile0.png', '2022-06-02 21:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(10) NOT NULL,
  `bid` int(10) NOT NULL,
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `bid`, `pid`, `name`, `city`, `mobile`, `email`, `pincode`, `addr`) VALUES
(2, 6, 38, 'abc', 'Bengaluru', '1234567890', 'abc@gmail.com', '560068', 'Bengaluru South, Bengaluru'),
(3, 7, 36, 'Manoj', 'Bangalore', '1122331122', 'manoj@gmail.com', '560068', 'Bangalore');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(255) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `uusername` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `uhash` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `umobile` varchar(255) NOT NULL,
  `uaddress` text NOT NULL,
  `uactive` int(255) NOT NULL DEFAULT 0,
  `urating` int(11) NOT NULL DEFAULT 0,
  `picExt` varchar(255) NOT NULL DEFAULT 'png',
  `picStatus` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uusername`, `upassword`, `uhash`, `uemail`, `umobile`, `uaddress`, `uactive`, `urating`, `picExt`, `picStatus`) VALUES
(4, 'test', 'test', '$2y$10$Ri7n.Bz6sW9DwlRrZhOnOObijo6ZOlYyNmsa8obTQ21cNKge/284e', '9872ed9fc22fc182d371c3e9ed316094', 'test@gmail.com', '9876543210', 'Bengaluru', 0, 0, 'png', 0),
(6, 'abc', 'abc', '$2y$10$uCNkPPkqKKY3d8n2a/jmveeWNWuDgZIQFGme0PgzMFsh1bpY9cIf.', 'c0e190d8267e36708f955d7ab048990d', 'abc@gmail.com', '9876543210', 'Bengaluru', 0, 0, 'png', 0),
(7, 'Manoj', 'Manoj', '$2y$10$d4kosqo2WWGxoqevMwRJA.mn6pa8Cf25bqCEBMH4HeCRoj7wZW3cS', '5c572eca050594c7bc3c36e7e8ab9550', 'manoj@gmail.com', '1122331122', 'Bangalore', 0, 0, 'png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogdata`
--
ALTER TABLE `blogdata`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `likedata`
--
ALTER TABLE `likedata`
  ADD KEY `blogId` (`blogId`),
  ADD KEY `blogUserId` (`blogUserId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogdata`
--
ALTER TABLE `blogdata`
  MODIFY `blogId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
