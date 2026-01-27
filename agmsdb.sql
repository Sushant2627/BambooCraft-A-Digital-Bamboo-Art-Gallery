-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3305
-- Generation Time: Mar 24, 2025 at 06:35 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(45) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 987654331, 'tester1@gmail.com', '0e7517141fb53f21ee439b355b5a1d0a', '2022-12-29 06:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblartist`
--

CREATE TABLE `tblartist` (
  `ID` int(10) NOT NULL,
  `Name` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Education` mediumtext,
  `Award` mediumtext,
  `Profilepic` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblartist`
--

INSERT INTO `tblartist` (`ID`, `Name`, `MobileNumber`, `Email`, `Education`, `Award`, `Profilepic`, `CreationDate`) VALUES
(1, 'Prashant Waghmare ', 7987987987, 'prashantwaghmare@gmail.com', 'Completed his fine arts from kg fine arts college.\r\nSpecialized in drawing and ceramic.', 'Winner of Hugo Boss Prize in 2019, MacArthur Fellowship\r\n', 'ecebbecf28c2692aeb021597fbddb174.jpg', '2025-02-26 18:12:42'),
(2, 'Dev', 3287987987, 'dev@gmail.com', 'Completed his fine arts from kg fine arts college.\r\nSpecialized in painting and ceramic.', 'Winner of Hugo Boss Prize in 2019, MacArthur Fellowship\r\n', 'ad04ad2d96ae326a9ca9de47d9e2fc74.jpg', '2025-02-26 18:12:42'),
(3, 'Kanha', 9687987987, 'kanha@gmail.com', 'Completed his fine arts from kg fine arts college.\r\nSpecialized in painting and ceramic.', 'Winner of Hugo Boss Prize in 2019, MacArthur Fellowship\r\n', 'ad04ad2d96ae326a9ca9de47d9e2fc74.jpg', '2025-02-26 18:12:42'),
(4, 'Ganpat Bhise', 5687987987, 'ganpatbhise@gmail.com', 'Completed his fine arts from KLIJ fine arts college.\r\nSpecialized in painting and ceramic.', 'Winner of Hugo Boss Prize in 2019, MacArthur Fellowship\r\n', 'ad04ad2d96ae326a9ca9de47d9e2fc74.jpg', '2025-02-26 18:12:42'),
(5, 'Krisna Dutt', 9187987987, 'krish@gmail.com', 'Completed his fine arts from kg fine arts college.\r\nSpecialized in painting and ceramic.', 'Winner of Hugo Boss Prize in 2019, MacArthur Fellowship\r\n', 'ad04ad2d96ae326a9ca9de47d9e2fc74.jpg', '2025-02-26 18:12:42'),
(6, 'Kajol Mannati', 8187987987, 'kajol@gmail.com', 'Completed his fine arts from kg fine arts college.\r\nSpecialized in painting and ceramic.', 'Winner of Hugo Boss Prize in 2019, MacArthur Fellowship\r\n', 'ad04ad2d96ae326a9ca9de47d9e2fc74.jpg', '2025-02-26 18:12:42'),
(7, 'Sunita Jadhav', 2987987987, 'sunitajadhav@gmail.com', 'Fine Arts in Painting from College of Art, Mumbai in 2012,\r\nSpecialized in printmaking.', 'award-winning artist, and has received a scholarship from the Ministry of Culture, Government of India in 2014 as well as the Jean-Claude Reynal Scholarship (France) in 2019.\r\n', 'ad04ad2d96ae326a9ca9de47d9e2fc74.jpg', '2025-02-26 18:12:42'),
(8, 'Narayan Das', 9987987987, 'narayan@gmail.com', 'Completed his fine arts from hjai fine arts college.\r\nSpecialized in painting and ceramic.', 'Winner of Young Artist Award in 2009, MacArthur Fellowship\r\n', 'ad04ad2d96ae326a9ca9de47d9e2fc74.jpg', '2025-02-26 18:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `tblartmedium`
--

CREATE TABLE `tblartmedium` (
  `ID` int(5) NOT NULL,
  `ArtMedium` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblartmedium`
--

INSERT INTO `tblartmedium` (`ID`, `ArtMedium`, `CreationDate`) VALUES
(1, 'Hand-painted on particle wood/MDF', '2025-02-16 15:15:18'),
(2, 'Woven bamboo with natural dyes', '2025-02-16 15:15:18'),
(3, 'Hand-carved bamboo with LED integration', '2025-02-16 15:15:18'),
(4, 'Polished bamboo with natural lacquer', '2025-02-16 15:15:18'),
(5, 'Eco-friendly bamboo with resin coating', '2025-02-16 15:15:18'),
(6, 'Handcrafted bamboo with varnish finish', '2025-02-16 15:15:18'),
(7, 'Hand-carved bamboo with wood stain', '2025-02-16 15:15:18'),
(8, 'Handcrafted from Natural Bamboo', '2025-02-16 15:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblartproduct`
--

CREATE TABLE `tblartproduct` (
  `ID` int(10) NOT NULL,
  `Title` varchar(250) DEFAULT NULL,
  `Dimension` varchar(250) DEFAULT NULL,
  `Orientation` varchar(100) DEFAULT NULL,
  `Size` varchar(100) DEFAULT NULL,
  `Artist` int(10) DEFAULT NULL,
  `ArtType` int(10) DEFAULT NULL,
  `ArtMedium` int(10) DEFAULT NULL,
  `SellingPricing` decimal(10,0) DEFAULT NULL,
  `Description` mediumtext,
  `Image` varchar(250) DEFAULT NULL,
  `Image1` varchar(250) DEFAULT NULL,
  `Image2` varchar(250) DEFAULT NULL,
  `Image3` varchar(250) DEFAULT NULL,
  `Image4` varchar(250) DEFAULT NULL,
  `RefNum` int(10) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Image5` varchar(250) DEFAULT NULL,
  `Image6` varchar(250) DEFAULT NULL,
  `Image7` varchar(250) DEFAULT NULL,
  `Image8` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblartproduct`
--

INSERT INTO `tblartproduct` (`ID`, `Title`, `Dimension`, `Orientation`, `Size`, `Artist`, `ArtType`, `ArtMedium`, `SellingPricing`, `Description`, `Image`, `Image1`, `Image2`, `Image3`, `Image4`, `RefNum`, `CreationDate`, `Image5`, `Image6`, `Image7`, `Image8`) VALUES
(2, 'Handwoven Bamboo Basket', '12x12 inches', 'Square', 'Small', 2, 2, 2, '150', 'A traditional handwoven bamboo basket, perfect for storage and decoration.', 'bamboo_basket.jpg', '', '', '', '', 786429002, '2025-02-14 17:40:38', '', '', '', NULL),
(4, 'Bamboo Ocarina', '6 inches', 'N/A', 'Small', 6, 5, 5, '1300', 'A pocket-sized bamboo ocarina with a soothing flute-like tone.', 'bamboo_ocarina.jpg', NULL, NULL, NULL, NULL, 786429034, '2025-03-20 19:56:31', NULL, NULL, NULL, NULL),
(5, 'Bamboo Jewelry Set', 'Adjustable', 'N/A', 'Small', 5, 6, 5, '100', 'Eco-friendly bamboo jewelry set with earrings and a necklace.', 'bamboo_jewelry.jpg', '', '', '', '', 786429005, '2025-02-14 17:40:38', '', '', '', NULL),
(6, 'Bamboo Furniture Set', 'Custom Size', 'Landscape', 'Large', 6, 4, 6, '1200', 'A stylish and durable bamboo furniture set including chairs and a table.', 'bamboo_furniture.jpg', '', '', '', '', 786429006, '2025-02-14 17:40:38', '', '', '', NULL),
(7, 'Bamboo Decorative Plaque', '20x30 inches', 'Landscape', 'Medium', 3, 3, 3, '2800', 'Engraved bamboo plaques featuring traditional designs.', 'bamboo_plaque.jpg', NULL, NULL, NULL, NULL, 786429017, '2025-03-20 19:53:24', NULL, NULL, NULL, NULL),
(8, 'Bamboo Flute Set', 'Various Sizes', 'Portrait', 'Small', 8, 5, 8, '180', 'A handcrafted set of bamboo flutes producing a melodious and soothing sound.', 'bamboo_flute.jpg', '', '', '', '', 786429008, '2025-02-14 17:42:49', '', '', '', NULL),
(15, 'Bamboo Carved Panel', '24x36 inches', 'Portrait', 'Medium', 1, 3, 3, '3500', 'Intricate hand-carved bamboo panels with detailed artwork.', 'bamboo_carved_panel.jpg', NULL, NULL, NULL, NULL, 786429015, '2025-03-20 19:53:24', NULL, NULL, NULL, NULL),
(17, 'Bamboo Wall Tapestry', '20x30 inches', 'Portrait', 'Medium', 2, 2, 2, '1900', 'Beautifully woven wall tapestries with traditional patterns.', 'bamboo_tapestry.jpg', NULL, NULL, NULL, NULL, 786429009, '2025-03-20 19:52:04', NULL, NULL, NULL, NULL),
(18, 'Bamboo Storage Box', '12x12 inches', 'N/A', 'Small', 3, 2, 2, '1300', 'Compact woven bamboo storage boxes for organizing essentials.', 'bamboo_box.jpg', NULL, NULL, NULL, NULL, 786429010, '2025-03-20 19:52:04', NULL, NULL, NULL, NULL),
(19, 'Bamboo Table Mat Set', '16x24 inches', 'Landscape', 'Small', 4, 2, 2, '800', 'Eco-friendly bamboo table mats handcrafted with care.', 'bamboo_mat.jpg', NULL, NULL, NULL, NULL, 786429011, '2025-03-20 19:52:04', NULL, NULL, NULL, NULL),
(20, 'Handwoven Bamboo Hat', 'One Size', 'N/A', 'Medium', 5, 2, 2, '1500', 'Traditional handwoven bamboo hats for outdoor wear.', 'bamboo_hat.jpg', NULL, NULL, NULL, NULL, 786429012, '2025-03-20 19:52:04', NULL, NULL, NULL, NULL),
(21, 'Bamboo Window Blinds', '36x72 inches', 'Portrait', 'Large', 6, 2, 2, '3000', 'Stylish and functional woven bamboo blinds for windows.', 'bamboo_blinds.jpg', NULL, NULL, NULL, NULL, 786429013, '2025-03-20 19:52:04', NULL, NULL, NULL, NULL),
(22, 'Decorative Bamboo Fan', '18x18 inches', 'N/A', 'Medium', 7, 2, 2, '1200', 'Artistic handwoven bamboo fans with cultural motifs.', 'bamboo_fan.jpg', NULL, NULL, NULL, NULL, 786429014, '2025-03-20 19:52:04', NULL, NULL, NULL, NULL),
(26, 'Hand-Carved Bamboo Jewelry Box', '10x10 inches', 'N/A', 'Small', 4, 3, 3, '2000', 'Exquisite bamboo jewelry boxes with hand-carved designs.', 'bamboo_jewelry_box.jpg', NULL, NULL, NULL, NULL, 786429018, '2025-03-20 19:53:24', NULL, NULL, NULL, NULL),
(28, 'Bamboo Mythological Carving', '30x50 inches', 'Portrait', 'Large', 6, 3, 3, '4500', 'Hand-carved mythological figures on bamboo wood.', 'bamboo_mythology.jpg', NULL, NULL, NULL, NULL, 786429020, '2025-03-20 19:53:24', NULL, NULL, NULL, NULL),
(29, 'Traditional Bamboo Carved Mask', '18x24 inches', 'Portrait', 'Medium', 7, 3, 3, '3500', 'Cultural masks carved from bamboo wood for traditional performances.', 'bamboo_mask.jpg', NULL, NULL, NULL, NULL, 786429021, '2025-03-20 19:53:24', NULL, NULL, NULL, NULL),
(32, 'Bamboo Lounge Sofa', '72x30 inches', 'Landscape', 'Large', 3, 4, 4, '13000', 'Elegant bamboo lounge sofas for indoor and outdoor settings.', 'bamboo_sofa.jpg', NULL, NULL, NULL, NULL, 786429024, '2025-03-20 19:54:08', NULL, NULL, NULL, NULL),
(33, 'Bamboo Bookshelf', '36x72 inches', 'Portrait', 'Large', 4, 4, 4, '8500', 'Minimalist bamboo bookshelves for home and office.', 'bamboo_bookshelf.jpg', NULL, NULL, NULL, NULL, 786429025, '2025-03-20 19:54:08', NULL, NULL, NULL, NULL),
(34, 'Bamboo Bed Frame', '72x84 inches', 'Landscape', 'Large', 5, 4, 4, '16000', 'Modern bamboo bed frames with sustainable design.', 'bamboo_bed.jpg', NULL, NULL, NULL, NULL, 786429026, '2025-03-20 19:54:08', NULL, NULL, NULL, NULL),
(36, 'Handwoven Bamboo Bench', '60x18 inches', 'Landscape', 'Medium', 7, 4, 4, '7000', 'Handcrafted bamboo benches with a rustic look.', 'bamboo_bench.jpg', NULL, NULL, NULL, NULL, 786429028, '2025-03-20 19:54:08', NULL, NULL, NULL, NULL),
(38, 'Bamboo Panpipes', '10x12 inches', 'N/A', 'Small', 2, 5, 5, '2000', 'Traditional bamboo panpipes producing soothing melodies.', 'bamboo_panpipes.jpg', NULL, NULL, NULL, NULL, 786429030, '2025-03-20 19:56:31', NULL, NULL, NULL, NULL),
(41, 'Bamboo Rain Stick', '36 inches', 'Portrait', 'Medium', 5, 5, 5, '2500', 'A bamboo rain stick that mimics the calming sound of rain.', 'bamboo_rain_stick.jpg', NULL, NULL, NULL, NULL, 786429033, '2025-03-20 19:56:31', NULL, NULL, NULL, NULL),
(43, 'Handmade Bamboo Didgeridoo', '48 inches', 'Portrait', 'Large', 7, 5, 5, '5000', 'A long, deep-sounding wind instrument made from bamboo.', 'bamboo_didgeridoo.jpg', NULL, NULL, NULL, NULL, 786429035, '2025-03-20 19:56:31', NULL, NULL, NULL, NULL),
(44, 'Handcrafted Bamboo Necklace', 'Adjustable', 'N/A', 'Small', 1, 6, 6, '800', 'A stylish, eco-friendly bamboo necklace with hand-carved details.', 'bamboo_necklace.jpg', NULL, NULL, NULL, NULL, 786429036, '2025-03-20 20:00:17', NULL, NULL, NULL, NULL),
(45, 'Bamboo Hoop Earrings', '2 inches', 'N/A', 'Small', 2, 6, 6, '500', 'Lightweight and trendy bamboo hoop earrings.', 'bamboo_earrings.jpg', NULL, NULL, NULL, NULL, 786429037, '2025-03-20 20:00:17', NULL, NULL, NULL, NULL),
(46, 'Bamboo Charm Bracelet', '7 inches', 'N/A', 'Small', 3, 6, 6, '1000', 'A delicate bamboo charm bracelet with cultural symbols.', 'bamboo_bracelet.jpg', NULL, NULL, NULL, NULL, 786429038, '2025-03-20 20:00:17', NULL, NULL, NULL, NULL),
(47, 'Bamboo Ring Set', 'Various Sizes', 'N/A', 'Small', 4, 6, 6, '700', 'A handcrafted bamboo ring set, polished to perfection.', 'bamboo_ring.jpg', NULL, NULL, NULL, NULL, 786429039, '2025-03-20 20:00:17', NULL, NULL, NULL, NULL),
(48, 'Bamboo Hairpin with Carving', '6 inches', 'N/A', 'Small', 5, 6, 6, '600', 'An elegant bamboo hairpin with intricate carvings.', 'bamboo_hairpin.jpg', NULL, NULL, NULL, NULL, 786429040, '2025-03-20 20:00:17', NULL, NULL, NULL, NULL),
(49, 'Bamboo Pendant Necklace', 'Adjustable', 'N/A', 'Small', 6, 6, 6, '1200', 'A stunning bamboo pendant with traditional engraving.', 'bamboo_pendant.jpg', NULL, NULL, NULL, NULL, 786429041, '2025-03-20 20:00:17', NULL, NULL, NULL, NULL),
(50, 'Bamboo Beaded Anklet', '9 inches', 'N/A', 'Small', 7, 6, 6, '900', 'A comfortable bamboo-beaded anklet for a natural look.', 'bamboo_anklet.jpg', NULL, NULL, NULL, NULL, 786429042, '2025-03-20 20:00:17', NULL, NULL, NULL, NULL),
(51, 'Handmade Bamboo Lamp', '12x18 inches', 'Portrait', 'Medium', 1, 7, 7, '3000', 'A unique bamboo lamp with intricate latticework.', 'bamboo_lamp.jpg', NULL, NULL, NULL, NULL, 786429043, '2025-03-20 20:00:43', NULL, NULL, NULL, NULL),
(53, 'Bamboo Wind Chimes', '18 inches', 'Portrait', 'Small', 3, 7, 7, '1300', 'Handcrafted bamboo wind chimes producing soothing tones.', 'bamboo_wind_chimes.jpg', NULL, NULL, NULL, NULL, 786429045, '2025-03-20 20:00:43', NULL, NULL, NULL, NULL),
(55, 'Decorative Bamboo Vase', '12x24 inches', 'Portrait', 'Medium', 5, 7, 7, '1800', 'A polished bamboo vase perfect for floral arrangements.', 'bamboo_vase.jpg', NULL, NULL, NULL, NULL, 786429047, '2025-03-20 20:00:43', NULL, NULL, NULL, NULL),
(57, 'Handwoven Bamboo Wall Shelf', '24x12 inches', 'Landscape', 'Medium', 7, 7, 7, '3500', 'A sturdy and stylish bamboo wall shelf for home decor.', 'bamboo_wall_shelf.jpg', NULL, NULL, NULL, NULL, 786429049, '2025-03-20 20:00:43', NULL, NULL, NULL, NULL),
(58, 'Bamboo Xylophone', '24x18 inches', 'Landscape', 'Medium', 3, 5, 5, '3500', 'A handcrafted bamboo xylophone with rich, resonant sound.', 'bamboo_xylophone.jpg', NULL, NULL, NULL, NULL, 786429031, '2025-03-23 14:12:16', NULL, NULL, NULL, NULL),
(59, 'Bamboo Wall Hanging', '24x36 inches', 'Portrait', 'Medium', 1, 7, 1, '2000', 'Hand-painted on particle wood/MDF, showcasing vibrant cultural themes.', 'bamboo_wall_hanging.jpg', NULL, NULL, NULL, NULL, 786429001, '2025-03-23 14:48:50', NULL, NULL, NULL, NULL),
(60, 'Traditional Bamboo Scroll Painting', '30x40 inches', 'Portrait', 'Large', 2, 7, 1, '3000', 'Intricately crafted paintings on bamboo scrolls.', 'bamboo_scroll_painting.jpg', NULL, NULL, NULL, NULL, 786429002, '2025-03-23 14:48:50', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblarttype`
--

CREATE TABLE `tblarttype` (
  `ID` int(10) NOT NULL,
  `ArtType` varchar(250) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarttype`
--

INSERT INTO `tblarttype` (`ID`, `ArtType`, `CreationDate`) VALUES
(2, 'Bamboo Weaving', '2025-02-26 12:43:43'),
(3, 'Bamboo Carving', '2025-02-26 12:43:43'),
(4, 'Bamboo Furniture', '2025-02-26 12:43:43'),
(5, 'Bamboo Musical Instruments', '2025-02-26 12:43:43'),
(6, 'Bamboo Jewelry', '2025-02-26 12:43:43'),
(7, 'Bamboo Home Decor', '2025-02-26 12:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `ID` int(10) NOT NULL,
  `EnquiryNumber` varchar(10) NOT NULL,
  `Artpdid` int(9) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Message` varchar(250) DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(10) DEFAULT NULL,
  `AdminRemark` varchar(200) NOT NULL,
  `AdminRemarkdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`ID`, `EnquiryNumber`, `Artpdid`, `FullName`, `Email`, `MobileNumber`, `Message`, `EnquiryDate`, `Status`, `AdminRemark`, `AdminRemarkdate`) VALUES
(1, '230873611', 4, 'Anuj Patil', 'ak@test.com', 1234567890, 'This is for testing Purpose.', '2025-02-26 18:16:40', 'Answer', 'test purpose', '2025-02-26 18:17:15'),
(2, '227883179', 5, 'Amit Patil', 'amitk55@test.com', 1234434321, 'I want this painting', '2025-02-26 18:16:40', 'Answer', 'testing purpose', '2025-02-26 18:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '<span style=\"color: rgb(32, 33, 36); font-family: Arial, sans-serif; font-size: 16px;\">\r\n    Bamboo Art Gallery is \r\n</span>\r\n<b style=\"color: rgb(32, 33, 36); font-family: Arial, sans-serif; font-size: 16px;\">\r\n    a dedicated space for showcasing and selling handcrafted bamboo artworks\r\n</b>\r\n<span style=\"color: rgb(32, 33, 36); font-family: Arial, sans-serif; font-size: 16px;\">\r\n    . It supports bamboo artists by providing a platform to exhibit their creations while offering buyers a seamless experience in discovering eco-friendly art pieces.\r\n</span>\r\n', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '2437 C WARD, Burud Galli, near MARUTI MANDIR, Shaniwar Peth', 'info@gmail.com', 1234567890, NULL, '10:30 am to 7:30 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartist`
--
ALTER TABLE `tblartist`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartmedium`
--
ALTER TABLE `tblartmedium`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblartproduct`
--
ALTER TABLE `tblartproduct`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblarttype`
--
ALTER TABLE `tblarttype`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ArtType` (`ArtType`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CardId` (`Artpdid`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblartist`
--
ALTER TABLE `tblartist`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblartmedium`
--
ALTER TABLE `tblartmedium`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblartproduct`
--
ALTER TABLE `tblartproduct`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tblarttype`
--
ALTER TABLE `tblarttype`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
