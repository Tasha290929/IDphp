-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 22, 2024 at 11:11 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appwill`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(50) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `activation_code`) VALUES
(2, 'Tasha', '$2y$10$tCRUJhX0mRptxMQ3HqHo2uIkvMwPnGL6ZhLEUZxtHXS52JnSEq4xC', 'tasha@gg.gg', '6620ee4aa9b74'),
(3, 'admin', '$2y$10$LZbqNRNRgnt8YHbwKd/x0OcDqUJGeBdBLHOdo/xj6uGdIIDOHjLnS', 'admin@ad.min', '66253483024e3'),
(4, 'asea', '$2y$10$qMGUVQtBgH1FIRgd0/rj5OzNZN0YwHVsbIE/iZ9VebpWFc561j7.m', 'asea@as.ea', '66253b3b39b34'),
(5, 'asea1', '$2y$10$6ArL4f6jC0GuZ1V48WsTe.GcV2mMWZ.53s8LSR3nYJx7F4vFAMKaa', 'asea@as.ea', '66253bf82322a'),
(6, 'vobib', '$2y$10$nPDvs2.fHxUvE21kXaM2UORBTUSZk30D30hIyCMZb/HHUOXF0KstG', 'vobib68472@etopys.com', '66253cf15a717'),
(7, 'jikafe', '$2y$10$sAcRwi099W3eS615RHQE5.OcrpX0z96WBEJN92FoS9LDx1xC1YuY6', 'jikafe8747@etopys.com', '66253d4a7d557'),
(8, 'jikafe1', '$2y$10$JMDKPY54dtl0rbQInsU2YuVLGiovrpyRB.Z0sgXXoibDNa/k4WkFK', 'jikafe8747@etopys.com', '66253d836b7a3'),
(9, 'admin123', '$2y$10$HKfipkri1/vhhBy4Hzg9KeFOFKaFjeOu6pCzkL9imM3uJFAp2OU..', 'ad@min.ru', '66269f5a583d4'),
(10, 'lascovoe_by', '$2y$10$HBm0ZB3Xn1e4k01lW8xt.ecFe96NAEV4d6TBNIC/6oBoB3r1YReGa', 'by@by.by', '6626a6fabe596'),
(11, 'hbkhjjnkjnk', '$2y$10$mo.iH1jDgF2mqqqdUT5a/OEikCD2/fAgNg9EhwO3LDft3OHlYzIZG', 'jnjkjn@njk.fgd', '6626a7b8e226c'),
(12, 'jnnkn', '$2y$10$SOgBhEGBJmnLPaLaR/VLwuF0pt8ngvxb1S.zDry20XMZygy2NxIL.', 'nkjnn@nk.njk', '6626a826316dc'),
(13, 'gihiuhiml', '$2y$10$Ib96IDRjTTWuOQgH1QYVOu1igNycvchUmS2BOwITal.br4QImHqSW', 'nkj@innol.nj', '6626a89d03531'),
(14, 'gvhjk', '$2y$10$iACZgH1XCsXBZtu.qTp/9OnqiJFPN5ZAenxds7D9bcNreExlLX4ri', 'fghjnk@vghb.fgvh', '6626af34edda8');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `ProductID` int NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Price` decimal(10,2) NOT NULL,
  `Icon` varchar(255) DEFAULT NULL,
  `Gameplay` text,
  `Engine` varchar(100) DEFAULT NULL,
  `Platform` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`ProductID`, `Name`, `Description`, `Price`, `Icon`, `Gameplay`, `Engine`, `Platform`) VALUES
(2, 'Bonbon Match Candy', 'Dive into the delicious world of Bonbon Match, a captivating and addictive puzzle game that will satisfy your sweet tooth. Immerse yourself in a whimsical candy land where your matching skills will be put to the test. With its vibrant visuals, engaging gameplay, and hundreds of levels to conquer, Bonbon Match is the new and interesting match 3 puzzle game.', '1000.00', 'icon.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/qRuzjXIigVw?si=wK4lURsM2mcMoM09\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Unity', 'Android'),
(3, 'CosmoArt', 'CosmoArt\r\nPrice $20250.50\r\nCONTACT US\r\nDescription\r\nDiary & Gratitude Journal app is designed to enhance your daily reflection and mindfulness practices. With the Diary feature, you can capture your thoughts, experiences, and emotions effortlessly.\r\n\r\nGratitude Journal feature empowers you to cultivate a positive mindset and focus on the blessings in your life. With this app, you can create a daily gratitude practice by jotting down moments of gratitude, appreciation, and joy.\r\n\r\nYou’ll be amazed at how this simple act can transform your outlook and bring more positivity into your life.\r\n\r\nThe Diary & Gratitude Journal app is more than just a digital notepad – it’s a transformative tool that empowers you to reflect, grow, and cultivate gratitude in your life.\r\n\r\nStart your journey of self-discovery and mindfulness today, and unlock the power of journaling with this innovative app.', '20250.00', '1.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/jmKBzNgpua0?si=ItrOxpPa2eRYnSCF\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Android Studio', 'iOS'),
(5, 'Angry Pumpkins', 'Safety starts with understanding how developers collect and share your data. Data privacy and security practices may vary based on your use, region, and age. The developer provided this information and may update it over time.\r\n', '6000.00', 'game3.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/w1N8rZRuU8Q?si=CT2tZQ-FIe0kbf0e\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Unity', 'Android'),
(6, 'Forest Island', 'Tired of gray everyday life? Do you dream of taking a break from the hustle and bustle and relaxing?\r\n\r\nWe present to your attention a calming anti-stress game that will help you escape from daily worries.\r\n\r\n\r\nSay no to stress!\r\n\r\nCreate your own island with white sandy beaches in the heart of the endless ocean.\r\n\r\nLight forest breeze, sounds of nature... Sounds great, right?\r\n', '45000.00', 'forest1.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/i4StWqqbDIM?si=hqN7LYTl3Q9XxJQq\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Unity', 'Android/iOS'),
(7, 'FlyCat', 'Flying Cat Pet fly Adventure for windows desktop is an arcade fun game. You have to fly the cute cat on, collect delicious fish cookies and also be careful from the iceblock towers and spikes!\r\n\r\nHelp the tiny cat make his way through the dangerous spikes and obstacles\r\n\r\nHow to play: Simply touch anywhere on your device screen to fly the cat. Up arrow or w key(keyboard) or left button on mouse.\r\n\r\nThis game is for both children and adults.\r\n\r\nFlying Cat Christmas Games Windows pc.\r\n\r\nFun games, Games for children. Cute Games.\r\n\r\nCat games for kids.', '9500.00', 'game4.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/pKwvIB3vShs?si=on9GtSNmAoDyCvHy\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Unity', 'Android'),
(8, 'Dancing Music Road', 'Introducing Dancing Music Road, the ultimate musical gaming experience that will transport you to a world of rhythm and melody. This innovative game combines the excitement of hopping and jumping with the thrill of music, creating a unique and engaging gameplay that will keep you entertained for hours on end.\r\n\r\nHow to play\r\nLead the ball to the same-color targets\r\n\r\nBe careful! The ball will change its color sometimes.\r\n\r\nFeel the music and beats. Headphones are recommended\r\n\r\n', '3490.00', 'game10.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rfIRmmdk62Q?si=CI7OvQa2UHt2Fl1Z\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Unity', 'Android/iOS'),
(9, 'Monster Hunter Now', 'The thrill of the hunt is calling. Begin your hunting adventure now!\r\n\r\n\r\nHunt monsters in the real world:\r\n\r\nEmbark on a global quest to track down and hunt some of the most formidable monsters from the Monster Hunter universe as they appear in our world. Forge powerful weapons and team up with fellow hunters to track down larger-than-life monsters and take them head-on.', '20000.00', 'monster.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rqeCKLt6OaM?si=nYT9_pkG1qWu87Jc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 'Unity', 'Android/iOS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
