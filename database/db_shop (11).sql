-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2023 at 01:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentMethod` varchar(255) NOT NULL,
  `proofOfPayment` varchar(255) NOT NULL,
  `paymentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `orderId`, `cmrId`, `amount`, `paymentMethod`, `proofOfPayment`, `paymentDate`) VALUES
(3, 0, 1, 0, 'Gcash', 'images/fa18cc5053.jpg', '0000-00-00 00:00:00'),
(4, 106, 74, 0, 'Gcash', 'images/040f9e569c.jpg', '0000-00-00 00:00:00'),
(5, 107, 74, 0, 'Gcash', 'images/4dfef562c6.jpg', '0000-00-00 00:00:00'),
(6, 110, 74, 0, 'Gcash', 'images/2e0dbf8c24.jpg', '0000-00-00 00:00:00'),
(7, 120, 74, 0, 'Gcash', 'images/e58fab5942.jpg', '0000-00-00 00:00:00'),
(8, 123, 74, 0, 'Cash on Delivery', '', '0000-00-00 00:00:00'),
(9, 125, 74, 0, 'Cash on Delivery', '', '2023-02-19 18:09:07'),
(10, 126, 74, 0, 'Gcash', 'images/3e390dee1c.jpg', '2023-02-19 18:13:47'),
(11, 127, 74, 0, 'Cash on Delivery', '', '2023-02-19 19:35:10'),
(12, 128, 74, 0, 'Cash on Delivery', '', '2023-02-23 02:10:15'),
(13, 129, 74, 0, 'Cash on Delivery', '', '2023-02-25 04:47:49'),
(14, 130, 74, 0, 'Cash on Delivery', '', '2023-02-25 06:13:15'),
(15, 0, 74, 0, 'Cash on Delivery', '', '2023-02-25 07:27:03'),
(16, 0, 74, 0, 'Cash on Delivery', '', '2023-02-25 07:40:28'),
(17, 131, 74, 0, 'Cash on Delivery', '', '2023-02-25 07:54:01'),
(18, 132, 74, 0, 'Cash on Delivery', '', '2023-02-25 07:55:31'),
(19, 133, 74, 0, 'Cash on Delivery', '', '2023-02-25 08:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`) VALUES
(1, 'Aldrin James', 'aldrin', 'aldrinlhabsyu@gmail.com', 'd666e5c87d3392cdd1b00efc8ac4281c', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bot`
--

CREATE TABLE `tbl_bot` (
  `chat_id` int(11) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `bot_reply` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_bot`
--

INSERT INTO `tbl_bot` (`chat_id`, `keywords`, `bot_reply`) VALUES
(1, 'Hi', 'Hello, Welcome to FISHYFY'),
(2, 'Where is your location', '280 Gov Fortunato Halili Ave, Santa Maria, Bulacan'),
(3, 'Where is your store', '280 Gov Fortunato Halili Ave, Santa Maria, Bulacan'),
(4, 'How are you?', 'I\'m fine *blush*');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(9, 'Aquaspeed'),
(10, 'ATEC'),
(11, 'Resun'),
(12, 'Classica'),
(13, 'Aquarium filter foam'),
(14, 'Infinity'),
(15, 'Periha'),
(16, 'Huike'),
(17, 'No brand'),
(18, 'GEBO'),
(19, 'AquaSynchro'),
(20, 'Ocean Free'),
(21, 'SUNSUN'),
(22, 'Venus Aqua'),
(23, 'AQUAWING'),
(24, 'Samyu Pacifica');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stocks` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `cmrId`, `sId`, `productId`, `productName`, `price`, `quantity`, `stocks`, `image`) VALUES
(153, 0, '', 0, '', 0.00, 0, 0, ''),
(154, 0, 'llo0r5g5v4g63uu774ac3k8vd3', 39, 'Live feeds', 69.00, 10, 985, 'uploads/efbbb518e8.jpg'),
(209, 74, '', 39, 'Live feeds', 69.00, 5, 980, 'uploads/efbbb518e8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catalogue`
--

CREATE TABLE `tbl_catalogue` (
  `id` int(11) NOT NULL,
  `fishName` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `family` varchar(50) NOT NULL,
  `diet` varchar(50) NOT NULL,
  `care` varchar(50) NOT NULL,
  `breed` varchar(50) NOT NULL,
  `life` varchar(50) NOT NULL,
  `tank` varchar(50) NOT NULL,
  `Description` varchar(245) NOT NULL,
  `type` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_catalogue`
--

INSERT INTO `tbl_catalogue` (`id`, `fishName`, `images`, `family`, `diet`, `care`, `breed`, `life`, `tank`, `Description`, `type`) VALUES
(5, 'Azul Peacock Bass', 'uploads/1e8859859f.jpg', 'Cichlidae', 'Omnivorous', 'Medium', 'tba', '8-10 years', '200 gallons', '<p><span>Azul Peacock Bass (Cichla piquiti) are native to the rivers and tributaries of northern South America in Colombia, Venezuela, Guianas &amp; Brazil. They have also been introduced to areas outside of their native habitat including: Flori', 0),
(6, 'Golden Pearl Angelfish', 'uploads/1f01a6a693.jpg', 'Cichlidae', 'Omnivorous', 'Easy', 'tba', '5-10 years', '10-20 gallons', '<p><span>The&nbsp;</span><span>Gold</span><span>&nbsp;perlscale&nbsp;</span><span>Angelfish</span><span>&nbsp;is a very popular tropical fish because of its unique shape and because of their interesting personalities.</span></p>', 1),
(7, 'Colored Tetra', 'uploads/3c26e4ae8d.jpeg', 'Characidae', 'Omnivorous', 'Easy', 'tba', '5-10 years', '10-20 gallons', '<p><span>Tetra is the common name of many small freshwater characiform fishes. Tetras come from Africa, Central America, and South America, belonging to the biological family Characidae</span></p>', 1),
(8, 'Discus', 'uploads/72e60972f1.jpeg', 'Cichlidae', 'Omnivorous', 'Difficult', 'tba', '10-15 years', '50-100 gallons', '<p><span>Symphysodon, colloquially known as discus, is a genus of cichlids native to the Amazon river basin in South America.</span></p>', 0),
(9, 'Flowerhorns', 'uploads/6efe20a318.jpeg', 'Cichlidae', 'Omnivorous', 'Medium', 'tba', '11-12 years', '50-100 gallons', '<p>The flowerhorn cichlid is an extremely unique freshwater fish that is getting a revival in popularity among the aquarist community. The combination of their bright coloration and patterns with that noticeable hump means they&rsquo;re a fish t', 0),
(11, 'Koi', 'uploads/ad2b002463.jpg', 'Cyprinidae', 'Omnivorous', 'Medium', 'tba', '25-35 years', '250 gallons', '<p><span>Koi or more specifically nishikigoi, are colored varieties of the Amur carp that are kept for decorative purposes in outdoor koi ponds or water gardens.</span></p>', 1),
(12, 'Albino Oscar', 'uploads/2a7a187d2c.jpeg', 'Cichlidae', 'Omnivorous', 'Medium', 'tba', '10-20+ years', '50 gallons', '<p><span>The albino oscar belongs to&nbsp;</span><em>Astronotus ocellatus</em><span>, the same species as the wild coloration. These fish may also be called albino red oscars, albino ruby oscars, albino tiger oscars, marble cichlids, or velvet c', 0),
(13, 'Otocinculus', 'uploads/ce7d7f2888.jpg', ' Loricariidae', 'Herbivorous', 'Easy', 'Egglayers', '3–5 years', '10 gallons', '<p><span>Otocinclus catfish are commonly found in slow-flowing shallow rivers and streams in South America.</span></p>', 1),
(14, 'Redcap Oranda Goldfish', 'uploads/05f82a5504.jpg', 'Cyprinidae', 'Omnivorous', 'Difficult', 'tba', '10-15 years', '10-20 gallons', '<p><span>The Redcap Oranda Goldfish is a favorite variety of the O</span>randa Goldfish<span>. Orandas are very attractive and some of the most popular goldfish in the world, and the Redcap variety is one of the most adored.</span></p>', 0),
(15, 'Red Flag Tail', 'uploads/936143cc5f.jpeg', ' Prochilodontidae', 'Herbivorous', 'Medium', 'tba', '5-10 years', '50-100 gallons', '<p><span>The Flagtail Prochilodus has a wide distribution throughout the central and western portions of the Amazon river and its tributaries. This striking characin grows to an impressive size and will require a spacious aquarium from the outse', 1),
(16, 'Albino Silver Arowana', 'uploads/8e4f497afb.jpeg', 'Osteoglossidae', 'Omnivorous', 'Difficult', 'mouthbrooders', '10-20+ years', '250 gallons', '<p><span>The&nbsp;</span><span>Silver&nbsp;</span><span>Arowana or&nbsp;</span><span>Osteoglossum bicirrhosum is part of the Osteoglossidae family.&nbsp;</span><span data-mce-fragment=\"1\">This is by far the most popular Arowana species in the fi', 0),
(17, 'Hybrid Motoro Stingray', 'uploads/8e4038c554.jpeg', 'Potamotrygonidae', 'Omnivorous', 'Medium', 'tba', '10-12 years', '180 gallons', '<p><span>Motoro stingray (Potamotrygon motoro) is one of the most famous and popular freshwater stindrays.</span></p>', 0),
(18, 'Assorted tetra', 'uploads/d48fc8b450.jpeg', 'Characidae', 'Omnivorous', 'Easy', 'Egglayers', '5-10 years', '10-20 gallons', '<p><span>Tetra is the common name of many small freshwater characiform fishes. Tetras come from Africa, Central America, and South America.</span></p>', 1),
(19, 'Assorted Danios', 'uploads/9aa0da4a39.jpeg', 'Cyprinidae', 'Omnivorous', 'Easy', 'Egglayers', '2-3 years', '10-gallons', '<p><span>Danio is a genus of small freshwater fish in the family Cyprinidae found in South and Southeast Asia, commonly kept in aquaria.</span></p>', 1),
(20, 'Banjar Red Arowana', 'uploads/2f77f4db8b.jpeg', 'Osteoglossidae', 'Carnivores', 'Difficult', 'mouthbrooders', '20+ years', '250-gallons', 'Red Arowana or Scleropages Formosus is a trendy aquarium fish that hails from the Osteoglossidae family. They are easily found across South East Asia in the slow-moving streams and rivers.\r\n\r\nThese are also much famous in the Chinese trade. So, ', 0),
(21, 'Assorted Goldfish', 'uploads/86cf986acc.jpg', 'Cyprinidae', 'Omnivorous', 'Easy', 'tba', '10-15 years', '10 gallons', '<p><span>The goldfish is a freshwater fish in the family Cyprinidae of order Cypriniformes. It is commonly kept as a pet in indoor aquariums, and is one of the most popular aquarium fish.</span></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(11, 'Pump'),
(12, 'Ceramic Rings'),
(13, 'Filter'),
(14, 'Heater'),
(15, 'Live feeds'),
(16, 'Net'),
(17, 'LED/RGB Lights'),
(18, 'Small aquariums'),
(19, 'UV Lamp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `contact`, `message`, `status`, `date`) VALUES
(3, 'Aldrinks', 'fafadami@gmail.com', '09699669699', 'superb', 1, '2022-12-31 10:15:01'),
(4, 'Aldrinks', 'fafadami@gmail.com', '09699669699', 'superb', 1, '2022-12-31 10:25:58'),
(5, 'Raphael', 'amberspirit16@gmail.com', '09699669699', 'gagasdfgewgs', 1, '2023-01-06 22:41:15'),
(6, 'Aldrin James Mendoza', 'amberspirit16@gmail.com', '09699669699', 'sfaetetsdgsdgafasf', 0, '2023-01-07 06:14:01'),
(8, 'aw', 'aw@gmail.com', '12313213211', 'aw', 0, '2023-01-20 02:54:42'),
(9, 'Aldrin James Mendoza', 'amberspirit16@gmail.com', '09699669699', 'zzzzzzzzzzzzzzzzzzz', 1, '2023-01-20 20:41:05'),
(10, 'Aldrin James Mendoza', 'amberspirit16@gmail.com', '0910-167-6224', 'Hi pwede mag hello?', 0, '2023-02-05 20:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `first_name`, `last_name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`, `code`, `status`, `role`) VALUES
(1, 'bappy', '', 'khilgaon, Dhaka', 'Dhaka', 'Bangladesh', '1219', '01622425286', 'customer@gmail.com', '202cb962ac59075b964b07152d234b70', 0, '', ''),
(10, '', '', '', '', '', '', '', 'al16@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', ''),
(11, '', '', '', '', '', '', '', 'carldappro@gmail.com', '14bfa6bb14875e45bba028a21ed38046', 0, '', ''),
(12, '', '', '', '', '', '', '', 'andrei.mendoza21@yahoo.com', '14bfa6bb14875e45bba028a21ed38046', 0, '', ''),
(23, '', '', '', '', '', '', '', 'ggg@gmail.com', '14bfa6bb14875e45bba028a21ed38046', 0, '', ''),
(35, '', '', '', '', '', '', '', 'shessg@gmail.com', '202cb962ac59075b964b07152d234b70', 718466, 'notverified', ''),
(51, '', '', '', '', '', '', '', 'test@gmail.com', '733b5e6a2e24f2764086325a28b6013d', 548146, 'notverified', ''),
(52, '', '', '', '', '', '', '', 'test@gmail.com', '733b5e6a2e24f2764086325a28b6013d', 548146, 'notverified', ''),
(59, 'Raphael', '', 'Block 29 Lot 1 Sampaguita street Evergreen SUBD. Brgy Gaya-gaya', 'San Jose del Monte City', '', '3023', '44', 'ddd@gmail.com', '3d68333b47b4762fac37583cc91b6ad1', 444838, 'notverified', ''),
(67, 'Aldrin James Mendoza', '', 'Block 29 Lot 1 Sampaguita street Evergreen SUBD. Brgy Gaya-gaya', 'San Jose del Monte City', '', '3023', '09699669699', 'mendozaar@students.nu-fairview.edu.ph', '531b07b9c1d9e8679d99020a9f836d73', 0, '', 'Database Admin'),
(70, 'Admin', '', 'block 69 Lot 6 admin street', 'San Jose del Monte', '', '4002', '09102494012', 'admin@admin.com', '751cb3f4aa17c36186f4856c8982bf27', 0, '', 'Admin'),
(74, 'Aldrin James ', 'Mendoza', 'Block 29 Lot 1 Sampaguita street Evergreen SUBD. Brgy Gaya-gaya', 'San Jose del Monte City', '', '3023', '0969-424-8893', 'aldrinlhabsyu@gmail.com', '3d68333b47b4762fac37583cc91b6ad1', 0, 'verified', 'Customer'),
(75, 'Aldrin James', 'Mendoza', 'Block 29 Lot 1 Sampaguita street Evergreen SUBD. Brgy Gaya-gaya', 'San Jose del Monte City', '', '3023', '0976-368-8137', 'amberspirit16@gmail.com', '3d68333b47b4762fac37583cc91b6ad1', 0, 'verified', 'Customer'),
(76, 'Admin', 'Vendor', 'Block 29 Lot 1 Sampaguita street Evergreen SUBD. Brgy Gaya-gaya', 'San Jose del Monte City', '', '3023', '0969-966-9699', 'vendor@vendor.com', 'ce24a07a6873eb433bddf1340022352d', 0, '', 'Database Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(46, 50, 35, 'Infinity Slim External Hang on Filter CS48', 2, 1162.00, 'uploads/df74e847e5.jpg', '2023-01-16 15:40:24', 2),
(47, 36, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 3, 960.00, 'uploads/827e9b003c.jpg', '2023-01-16 17:21:53', 2),
(48, 50, 35, 'Infinity Slim External Hang on Filter CS48', 4, 2324.00, 'uploads/df74e847e5.jpg', '2023-01-18 18:07:26', 1),
(49, 51, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 2, 640.00, 'uploads/827e9b003c.jpg', '2023-01-20 10:52:45', 1),
(50, 50, 39, 'Live feeds', 3, 207.00, 'uploads/efbbb518e8.jpg', '2023-01-20 20:11:54', 0),
(51, 36, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 1, 320.00, 'uploads/827e9b003c.jpg', '2023-01-21 03:22:49', 0),
(52, 36, 37, 'Periha Aqua Heater', 1, 450.00, 'uploads/41bbf8b7a5.jpg', '2023-01-21 03:22:49', 0),
(53, 36, 32, 'Resun Ceramic Rings', 1, 200.00, 'uploads/aa3b192759.jpg', '2023-01-21 03:22:49', 0),
(54, 36, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 1, 874.00, 'uploads/46c74ae395.jpg', '2023-01-21 03:22:49', 0),
(55, 36, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-01-21 03:22:49', 0),
(56, 36, 35, 'Infinity Slim External Hang on Filter CS48', 2, 1162.00, 'uploads/df74e847e5.jpg', '2023-01-21 03:24:21', 0),
(57, 36, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 1, 320.00, 'uploads/827e9b003c.jpg', '2023-01-21 05:01:05', 0),
(58, 36, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-01-21 05:12:44', 0),
(59, 56, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 4, 1280.00, 'uploads/827e9b003c.jpg', '2023-01-21 09:02:40', 0),
(60, 0, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 1, 320.00, 'uploads/827e9b003c.jpg', '2023-02-04 21:24:41', 0),
(61, 0, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-04 21:28:15', 0),
(62, 0, 37, 'Periha Aqua Heater', 1, 450.00, 'uploads/41bbf8b7a5.jpg', '2023-02-04 21:28:15', 0),
(63, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-06 05:31:43', 0),
(64, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-06 05:32:56', 0),
(65, 61, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 1, 874.00, 'uploads/46c74ae395.jpg', '2023-02-06 05:43:00', 0),
(66, 61, 37, 'Periha Aqua Heater', 1, 450.00, 'uploads/41bbf8b7a5.jpg', '2023-02-06 05:49:50', 0),
(67, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-06 05:58:58', 0),
(68, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-06 06:05:36', 0),
(69, 61, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 1, 320.00, 'uploads/827e9b003c.jpg', '2023-02-06 06:16:29', 0),
(70, 61, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 1, 874.00, 'uploads/46c74ae395.jpg', '2023-02-06 06:23:04', 0),
(71, 61, 37, 'Periha Aqua Heater', 1, 450.00, 'uploads/41bbf8b7a5.jpg', '2023-02-06 06:39:34', 0),
(72, 61, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 1, 320.00, 'uploads/827e9b003c.jpg', '2023-02-06 06:43:22', 0),
(73, 61, 35, 'Infinity Slim External Hang on Filter CS48', 1, 581.00, 'uploads/df74e847e5.jpg', '2023-02-06 06:45:09', 0),
(74, 61, 37, 'Periha Aqua Heater', 1, 450.00, 'uploads/41bbf8b7a5.jpg', '2023-02-06 06:47:39', 0),
(75, 61, 32, 'Resun Ceramic Rings', 1, 200.00, 'uploads/aa3b192759.jpg', '2023-02-06 06:54:11', 0),
(76, 61, 35, 'Infinity Slim External Hang on Filter CS48', 1, 581.00, 'uploads/df74e847e5.jpg', '2023-02-06 06:55:55', 0),
(77, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-06 06:59:46', 0),
(78, 61, 35, 'Infinity Slim External Hang on Filter CS48', 3, 1743.00, 'uploads/df74e847e5.jpg', '2023-02-06 07:03:40', 0),
(79, 61, 37, 'Periha Aqua Heater', 1, 450.00, 'uploads/41bbf8b7a5.jpg', '2023-02-06 07:05:25', 0),
(80, 61, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 1, 874.00, 'uploads/46c74ae395.jpg', '2023-02-06 07:06:48', 0),
(81, 61, 39, 'Live feeds', 2, 138.00, 'uploads/efbbb518e8.jpg', '2023-02-07 10:37:04', 0),
(82, 61, 32, 'Resun Ceramic Rings', 2, 400.00, 'uploads/aa3b192759.jpg', '2023-02-07 10:37:04', 0),
(83, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-07 10:43:34', 0),
(84, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-07 14:21:20', 0),
(85, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-07 14:48:16', 0),
(86, 61, 43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 1, 320.00, 'uploads/827e9b003c.jpg', '2023-02-07 14:48:16', 0),
(87, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-07 14:48:43', 0),
(88, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-07 14:50:57', 0),
(89, 61, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 1, 874.00, 'uploads/46c74ae395.jpg', '2023-02-07 14:52:57', 0),
(90, 61, 32, 'Resun Ceramic Rings', 1, 200.00, 'uploads/aa3b192759.jpg', '2023-02-07 14:54:27', 0),
(91, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-07 23:15:00', 0),
(92, 61, 39, 'Live feeds', 1, 69.00, 'uploads/efbbb518e8.jpg', '2023-02-08 01:42:02', 0),
(93, 61, 37, 'Periha Aqua Heater', 1, 450.00, 'uploads/41bbf8b7a5.jpg', '2023-02-12 01:09:05', 0),
(94, 74, 39, 'Live feeds', 10, 690.00, 'uploads/efbbb518e8.jpg', '2023-02-16 02:54:03', 0),
(95, 74, 37, 'Periha Aqua Heater', 5, 2250.00, 'uploads/41bbf8b7a5.jpg', '2023-02-16 02:58:22', 0),
(96, 74, 32, 'Resun Ceramic Rings', 10, 2000.00, 'uploads/aa3b192759.jpg', '2023-02-16 03:03:26', 0),
(97, 74, 39, 'Live feeds', 10, 690.00, 'uploads/efbbb518e8.jpg', '2023-02-16 20:50:11', 0),
(98, 74, 39, 'Live feeds', 10, 690.00, 'uploads/efbbb518e8.jpg', '2023-02-16 21:09:06', 0),
(99, 74, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 10, 8740.00, 'uploads/46c74ae395.jpg', '2023-02-16 21:15:10', 0),
(100, 74, 39, 'Live feeds', 10, 690.00, 'uploads/efbbb518e8.jpg', '2023-02-16 21:20:31', 0),
(101, 74, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 8, 6992.00, 'uploads/46c74ae395.jpg', '2023-02-16 21:21:23', 0),
(102, 74, 32, 'Resun Ceramic Rings', 10, 2000.00, 'uploads/aa3b192759.jpg', '2023-02-16 21:25:08', 0),
(103, 74, 32, 'Resun Ceramic Rings', 10, 2000.00, 'uploads/aa3b192759.jpg', '2023-02-16 21:26:23', 0),
(104, 74, 32, 'Resun Ceramic Rings', 10, 2000.00, 'uploads/aa3b192759.jpg', '2023-02-16 21:26:52', 0),
(105, 74, 32, 'Resun Ceramic Rings', 30, 6000.00, 'uploads/aa3b192759.jpg', '2023-02-16 23:02:36', 0),
(108, 74, 39, 'Live feeds', 6, 414.00, 'uploads/efbbb518e8.jpg', '2023-02-17 03:26:02', 0),
(109, 74, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 10, 8740.00, 'uploads/46c74ae395.jpg', '2023-02-17 03:29:29', 0),
(110, 74, 39, 'Live feeds', 10, 690.00, 'uploads/efbbb518e8.jpg', '2023-02-17 03:30:59', 3),
(111, 74, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 10, 8740.00, 'uploads/46c74ae395.jpg', '2023-02-17 03:43:05', 0),
(112, 74, 39, 'Live feeds', 10, 690.00, 'uploads/efbbb518e8.jpg', '2023-02-17 03:46:41', 0),
(113, 74, 39, 'Live feeds', 4, 276.00, 'uploads/efbbb518e8.jpg', '2023-02-18 01:59:24', 0),
(114, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-18 02:00:04', 0),
(115, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-18 02:16:07', 0),
(116, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-18 02:16:40', 0),
(117, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-18 03:29:06', 0),
(118, 74, 37, 'Periha Aqua Heater', 5, 2250.00, 'uploads/41bbf8b7a5.jpg', '2023-02-18 03:29:06', 0),
(119, 74, 37, 'Periha Aqua Heater', 5, 2250.00, 'uploads/41bbf8b7a5.jpg', '2023-02-19 16:38:21', 0),
(121, 74, 39, 'Live feeds', 2, 138.00, 'uploads/efbbb518e8.jpg', '2023-02-19 16:42:27', 0),
(122, 74, 37, 'Periha Aqua Heater', 5, 2250.00, 'uploads/41bbf8b7a5.jpg', '2023-02-19 16:51:30', 0),
(123, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-19 16:52:58', 2),
(124, 74, 34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 10, 8740.00, 'uploads/46c74ae395.jpg', '2023-02-19 17:07:54', 0),
(125, 74, 37, 'Periha Aqua Heater', 5, 2250.00, 'uploads/41bbf8b7a5.jpg', '2023-02-19 18:09:07', 2),
(126, 74, 32, 'Resun Ceramic Rings', 4, 800.00, 'uploads/aa3b192759.jpg', '2023-02-19 18:13:47', 2),
(127, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-19 19:35:10', 2),
(128, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-23 02:10:15', 2),
(129, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-25 04:47:49', 2),
(130, 74, 39, 'Live feeds', 10, 690.00, 'uploads/efbbb518e8.jpg', '2023-02-25 06:13:15', 0),
(131, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-25 07:54:01', 0),
(132, 74, 32, 'Resun Ceramic Rings', 5, 1000.00, 'uploads/aa3b192759.jpg', '2023-02-25 07:55:31', 0),
(133, 74, 39, 'Live feeds', 5, 345.00, 'uploads/efbbb518e8.jpg', '2023-02-25 08:03:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `stocks` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `stocks`, `image`, `type`) VALUES
(22, 'Aqueon Aquarium Fish Tank Starter Kit with LED', 10, 6, '<p>This fish tank has a starter kit with LED</p>', 69.00, '12', 'uploads/4121ebe6ac.jpg', 0),
(26, 'Red Sea Max nano aquarium tank', 10, 8, '<p>red sea max nano aquarium&nbsp;</p>', 50.00, '150', 'uploads/ff26f7b647.jpg', 0),
(29, 'Aquaspeed Submersible Pump A2000 13W', 11, 9, '<p><span>Aquaspeed Submersible Pump A2000 13W </span></p>\r\n<p><span>&bull; German technology is quieter </span></p>\r\n<p><span>&bull; Energy saving </span></p>\r\n<p><span>&bull; Large flow high lift </span></p>\r\n<p><span>&bull; High-quality plastic, durable </span></p>\r\n<p><span>&bull; For fresh and saltwater use - The introduction of German technology optimizes the submersible pump parts, to achieve the pump work without a sound quiet state, the noise reduction. - Motor with a seamless movement, fluid mechanics design, energy-saving. - Ceramic shaft chip light seawater wear and tear durable, durable energy-efficient power surging. - Surging power from the non-destructive motor, high distance pumping no longer worry. </span></p>\r\n<p><span>Model: A2000 Power: 13W F.Max: 2000 L/H H.Max: 1.6M ? Item has been opened and tested for functionality before shipping. #AquaSpeedSubmersiblePump&nbsp;</span></p>', 650.00, '999', 'uploads/0f49812a51.jpg', 1),
(30, 'Aquaspeed wave maker  A100M', 11, 9, '<p><span>Aquaspeed Wave Maker A100M 6w </span></p>\r\n<p><span>Water Wave Pump Circulation With Suction Cup </span></p>\r\n<p><span>? Energy Saving </span></p>\r\n<p><span>? Promotes water cycle of the fish tank </span></p>\r\n<p><span>? Diving filter pump, energy saving and durable </span></p>\r\n<p><span>? Safety super static machinery </span></p>\r\n<p><span>? Biological purification, freshwater, sea water </span></p>\r\n<p><span>? Low noise, easy to operate </span></p>\r\n<p><span>? Applicable to all types of aquarium, ecological cylinder, breeding cylinder, landscaping cylinder, semi-water tank filter biochemical </span></p>\r\n<p><span>Model: A100M Voltage: 220-240V Frequency: 50/60HZ Watts: 6W F.Max: 3000L/H</span></p>', 750.00, '999', 'uploads/b17dd6ba59.jpg', 0),
(31, 'ATEC AR-8500 Aquarium Air Pump', 11, 10, '<p><span>Atec AR-8500 Aquarium Air Pump: </span></p>\r\n<p><span>The Atec Aquarium Air Pump is a reliable and multi-functional product, which is high in implementation. The pump creates movement in the water and builds aeration through the constant mixing of the surface with water in the aquarium. There are many varieties of fish that don&rsquo;t survive, if the proper current is not available in the water, the air pump comes to the rescue, as these pumps aid in building current. The product is built of good quality material and is extremely reliable. The equipment is fitted with suction cups so that it fits any aquarium comfortably. In spite of creating continuous movement in the water, the pump produces no sound and operates quietly. Moreover, the pump comes with 2-speed control based on the requirement; you can choose the level of speed. </span></p>\r\n<p><span>The high on performance pumps are attached with top quality motor for better functioning. The body of the pump is made out of sturdy material to make it durable. The pumps are designed to be placed above the water level and care should be taken to ensure no water enters the pumps as this might lead to a fault. Equipped with a single outlet, the pumps are available in different sizes based on the capacity of the aquarium.</span></p>', 550.00, '999', 'uploads/d01da9d6a3.jpg', 1),
(32, 'Resun Ceramic Rings', 12, 11, '<ul>\r\n<li>Model: CR-1000</li>\r\n<li>Color: White</li>\r\n<li>Material: CeramicThe ceramic rings have a structure of dense holes where live a lot of good vital bacteria such as nitro-bacteria. These bacteria help improve biological filtration effect and stabilize water quality to maintain healthy living environment for aquatic livings.Provides a large surface area for beneficial bacteria to grow and cultivate</li>\r\n<li>Helps eliminate harmful ammonia and nitrite levels in your aquarium water</li>\r\n<li>Net weight: 1000g</li>\r\n</ul>', 200.00, '925', 'uploads/aa3b192759.jpg', 0),
(33, 'CLASSICA SUPER GRADE ACTIVATED CARBON', 12, 12, '<p><span>CLASSICA SUPER GRADE ACTIVATED CARBON </span></p>\r\n<ul>\r\n<li><span>Highly absorbent removing any cloudiness, impurities, colouring and chemical build ups within the aquarium.&nbsp;</span></li>\r\n<li><span>The carbon is a fine polishing this is done after the filter has removed larger debris, carbon will trap and absorb fine particles.&nbsp;</span></li>\r\n<li><span>The carbon will unfortunately absorb any chemical used to treat the aquarium, so it is important that it is removed if any treatments are being used.&nbsp;</span></li>\r\n<li><span>Supplied in handy net bags to allow ease of use. </span></li>\r\n</ul>\r\n<div><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, ?????, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'?? Pro\', \'LiHei Pro\', \'Heiti TC\', ?????, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space: pre-wrap;\"><br /></span></div>', 150.00, '999', 'uploads/1e7f2ffb55.jpg', 1),
(34, 'Aquarium Filter Pad Filter Media Roll Biochemical Cotton Filter Foam Fish Tank Sponge (1m X 12cm)', 13, 13, '<p><span>Size: About 100x12x2cm. </span></p>\r\n<p><span>Can be cut any size as your needed by yourself. </span></p>\r\n<p><span>Strong cotton and soft feel, can be repeated washing rather goes badly, durable to use.Strong filterability. It can be used repeatedly after cleaning. </span></p>\r\n<p><span>Filter media pad - Made of super dense thickened cotton with good water absorption and high permeability, filtering and decomposing dirt. </span></p>\r\n<p><span>Aquarium Filter Pad - Suitable for sea water tank, fresh water tank, aqua-plant tank. Description </span></p>\r\n<p><span>This filter pad is well made of premium material for durable and practical use. It has a good effect on filtering the leftover. And its strong filterability can stable water quality, remove small and large debris particles and decompose some ammonia nitrogen debris particles.</span></p>\r\n<p><span> Feature </span></p>\r\n<ul>\r\n<li>Color: White.&nbsp;</li>\r\n<li>Material: Cotton.&nbsp;&nbsp;</li>\r\n<li>Size: About 100x12x2cm.&nbsp;</li>\r\n<li>Made of super dense thickened cotton with good water absorption and high permeability, filtering and decomposing dirt.&nbsp;</li>\r\n<li>Strong filterability. It can be used repeatedly after cleaning.&nbsp;&nbsp;</li>\r\n<li>Strong cotton and soft feel, can be repeated washing rather goes badly, durable to use.&nbsp;&nbsp;</li>\r\n<li>Can be cut any size as your needed by yourself.&nbsp;&nbsp;</li>\r\n<li>Suitable for sea water tank, fresh water tank, aqua-plant tank.</li>\r\n</ul>', 874.00, '945', 'uploads/46c74ae395.jpg', 0),
(35, 'Infinity Slim External Hang on Filter CS48', 13, 14, '<div class=\"pdp-product-detail\" data-spm=\"product_detail\">\r\n<div class=\"pdp-product-desc \" data-spm-anchor-id=\"a2o4l.pdp_revamp.product_detail.i0.c6e31e82pBboFk\">\r\n<div class=\"html-content pdp-product-highlights\">\r\n<ul>\r\n<li>Ideal for freshwater and marine aquarium</li>\r\n<li>quiet operation</li>\r\n<li>easy start without adding water</li>\r\n<li>adjustable flow value to adjust flow and dissolved oxygen for creature growing</li>\r\n<li>easy to install, only fill up water and plug in</li>\r\n<li>Specification:</li>\r\n<li>Power: 4.8 Watts</li>\r\n<li>Max Output: 290L/H</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>', 581.00, '0', 'uploads/df74e847e5.jpg', 0),
(36, 'Infinity Slim External Hang on Filter CS25', 13, 14, '<ul>\r\n<li><span>Ideal for freshwater and marine aquarium&nbsp;</span></li>\r\n<li><span>quiet operation&nbsp;</span></li>\r\n<li><span>easy start without adding water&nbsp;</span></li>\r\n<li><span>adjustable flow value to adjust flow and dissolved oxygen for creature growing&nbsp;</span></li>\r\n<li>easy to install, only fill up water and plug in Specification: Power: 2.5 Watts Max Output: 160L/H</li>\r\n</ul>', 400.00, '999', 'uploads/e677d66b1e.jpg', 1),
(37, 'Periha Aqua Heater', 14, 15, '<p><span>? With a safety protection system, easy to operate, convenient and safe.&nbsp; </span></p>\r\n<p><span>?Using explosion-proof glass heating tube, it has double insulation function, fast heating speed, can withstand great temperature difference without bursting, so you can use it more securely.&nbsp; </span></p>\r\n<p><span>? Unique and humanized design, high-quality material production process, durable.&nbsp; </span></p>\r\n<p><span>?The use of fresh sea water is more complete.&nbsp; </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>?Instructions? </span></p>\r\n<p><span>? Put the product into the aquarium for 15 minutes to ensure that the probe temperature is consistent with the actual water temperature. Turn on the power switch after 15 minutes, then turn the thermostat knob to adjust the temperature to 22-34 degrees. </span></p>\r\n<p><span>? Temperature control : Heating starts when the water temperature is lower than the set temperature by 0.5 degrees, and stops when the water temperature is higher than 0.5 degrees.&nbsp; </span></p>\r\n<p><span>? Power-off memory: Once the temperature controller is set, the temperature set even after the power-off will not change.&nbsp; </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>?Precautions? </span></p>\r\n<p><span>1. The power must be turned off before using this product or before cleaning the product.&nbsp; </span></p>\r\n<p><span>2. When the product is heated, do not touch the heat part directly with your hand.&nbsp; </span></p>\r\n<p><span>3. This product is only suitable for indoor use.&nbsp; </span></p>\r\n<p><span>4. The indicator will light up when the product is heating.&nbsp; </span></p>\r\n<p><span>5, never allowed to use in the waterless state.&nbsp; </span></p>\r\n<div><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, ?????, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'?? Pro\', \'LiHei Pro\', \'Heiti TC\', ?????, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space: pre-wrap;\"><br /></span></div>', 450.00, '910', 'uploads/41bbf8b7a5.jpg', 0),
(38, 'Huike AC/DC air pump', 11, 16, '<p><span>Huike H5 AC and DC air pump with Lithium battery </span></p>\r\n<p><span>Lithium battery up to 30h </span></p>\r\n<p><span>Voltage: DC5V </span></p>\r\n<p><span>Output: 3L/min </span></p>\r\n<p><span>Pressure: 0.01Mpa </span></p>\r\n<p><span>Power: 2.0W</span></p>', 850.00, '999', 'uploads/62777abf70.jpg', 1),
(39, 'Live feeds', 15, 17, '<p>...</p>', 69.00, '970', 'uploads/efbbb518e8.jpg', 0),
(40, 'Net', 16, 17, '<p>...</p>', 69.00, '999', 'uploads/94d23a978e.jpg', 1),
(41, 'GEBO 6D SERIES AQUARIUM EXTREME BRIGHT LED LIGHT', 17, 18, '<p>...</p>', 450.00, '999', 'uploads/5b68ae3cec.jpg', 1),
(42, 'INFINITY LED AQUARIUM SUBMERSIBLE LIGHT (20 led lights)', 17, 14, '<p><span>??INFINITY LED AQUARIUM SUBMERSIBLE LIGHT </span></p>\r\n<p><span>??SECURITY, ENERGY SAVING, DURABLE </span></p>\r\n<p><span>??SAFE AND RELIABLE IN BOTH FRESH &amp; SALTWATER AQUARIUMS </span></p>\r\n<p><span>??TECHNICAL DATA</span></p>\r\n<div class=\"product-detail page-product__detail\">\r\n<div class=\"U9rGd1\">\r\n<div class=\"MCCLkq\">\r\n<div class=\"f7AU53\">\r\n<p class=\"irIKAp\">Model: 20</p>\r\n<p class=\"irIKAp\">Led Power: 3.5w</p>\r\n<p class=\"irIKAp\">Lamp Lenght: 18cm</p>\r\n<p class=\"irIKAp\">Voltage: 220 - 240V 50Hz</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div class=\"product-ratings\" data-nosnippet=\"true\">&nbsp;</div>\r\n</div>\r\n<p><span><br /></span></p>', 220.00, '999', 'uploads/9639ac69bb.jpg', 1),
(43, 'Infinity Stylish Plastic Fish Bowl (S,M,L)', 18, 14, '<p><span>A fish bowl with very clear transparency. </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>Made from light weight and tough material. </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>Safety and secure fish tank. Ideal for nano aquarium. </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>Space saving simple design. </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>Available Designs: </span></p>\r\n<p><span>Small - 0.5 Gallon </span></p>\r\n<p><span>Medium - 1 Gallon </span></p>\r\n<p><span>Large - 1.5 Gallon </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>Sizes </span></p>\r\n<p><span>Small 5 inches </span></p>\r\n<p><span>Medium 7 inches diameter </span></p>\r\n<p><span>Large: 8.5 inches diameter</span></p>', 320.00, '0', 'uploads/827e9b003c.jpg', 0),
(44, 'Aquasycro Fancy Apple', 18, 19, '<p><span>FANCY APPLE </span></p>\r\n<p><span>Feature: </span></p>\r\n<p><span>Patented apple shape design, great for both desktop and wall mounting </span></p>\r\n<p><span>Made of high-clarity acrylic </span></p>\r\n<p><span>Can be used to keep fish or grow plants </span></p>', 500.00, '990', 'uploads/128ca46dc2.jpg', 1),
(45, 'Aquasynchro BT20 Betta Tower', 18, 19, '<p><span>Patented tower shape design </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>3xAAA battery powered LED light </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>Easy to move </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>Apple and frame shape window at diffenrent sides for diffferent view </span></p>\r\n<p><span><br /></span></p>\r\n<p><span>Dimension: 149x97x210mm </span></p>\r\n<p><span>Capacity: 2L/0.5gal </span></p>\r\n<p><span>Including: Plant 1 pc </span></p>\r\n<p><span>Color gravel 50pcs </span></p>\r\n<p><span>LED light</span></p>', 375.00, '999', 'uploads/1a0abbcd3c.jpg', 1),
(46, 'Aquarium Sponge filter 2811', 13, 17, '<p>Aquarium sponge filters work to purify your aquarium environment without any dangerous moving components in traditional aquarium filters.</p>\r\n<p>A sponge filter works through an airline hose that transfers air from the pump into the tubes of the filter.</p>\r\n<p>The air passing into the hollow inside the sponge causes water to be filtered through the sponge &ndash; catching debris &ndash; and pushes only clean water out of the top of the filter.</p>\r\n<p>As water passes through the sponge, it traps debris,&nbsp; like fish feces, uneaten food, and decaying plants, filtering it from the water.</p>\r\n<p>The filtered water then passes through the lift tube and back into your tank.</p>', 150.00, '999', 'uploads/361b9b4ff8.jpg', 1),
(47, 'Bio-Sponge Filter 2836', 13, 14, '<p><span>this super biochemical sponge filter keeps your aquarium always clean. the filter provides mechanical and biological filtration for easy aquarium maintenance. as a mechanical filtration, it uses the air driven system to create suction that allows the Sponge to capture floating particles in the water and return filtered water to the tank. as a biological filtration, harmful waste are biologically transformed into relatively harmless substances by aerobic bacteria that accumulates in the Sponge. this kind of sponge is also suitable for discus breeding tanks , small tropical fish tanks and fry stock tanks. </span></p>', 105.00, '999', 'uploads/f839cbfc29.jpg', 1),
(48, 'OCEAN FREE Super Bio-Foam Filter Junior jumbo BF4/BF2', 13, 20, '<p><span>TANK SIZE: 680 Liter &amp; below Innovative (airstone included) </span></p>\r\n<p><span>Bio-Foam filter to provide the best filtration for small fish tank and breeding tank.</span></p>', 210.00, '999', 'uploads/229d239c8b.jpg', 1),
(49, 'SUNSUN UV-C Lamp ', 19, 21, '<p><span>Sunsun UV-C AUV-14A is an UV lamp whose light can serve to prevent bacteria and algae in aquarium water or pools. Uv lamp which is 100% original SUNSUN product. </span></p>\r\n<p><span>Sunsuns UV-C AUV-14A can be used for freshwater and seawater. </span></p>\r\n<p><span>Specification:&nbsp;</span></p>\r\n<ul>\r\n<li><span> Power: 14 Watts&nbsp;</span></li>\r\n<li><span>Length: 310 x 60 x 70 mm&nbsp;</span></li>\r\n<li><span>Volume!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!&nbsp;</span></li>\r\n<li><span>Cable length: 1.8 m. Excellence:&nbsp;</span></li>\r\n<li><span>Kills harmful bacteria and viruses&nbsp;</span></li>\r\n<li><span>Eliminates algae and moss&nbsp;</span></li>\r\n<li><span>Prevents green water and helps clear water&nbsp;</span></li>\r\n<li><span>Enlarge aquarium or pool&nbsp;</span></li>\r\n<li><span>8000 hours of use life&nbsp;</span></li>\r\n<li><span>Comes with a protector to protect the eyes from ultraviolet rays. </span></li>\r\n</ul>\r\n<div><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, \'Helvetica Neue\', Helvetica, Arial, ?????, \'WenQuanYi Zen Hei\', \'Hiragino Sans GB\', \'?? Pro\', \'LiHei Pro\', \'Heiti TC\', ?????, \'Microsoft JhengHei UI\', \'Microsoft JhengHei\', sans-serif; font-size: 14px; white-space: pre-wrap;\"><br /></span></div>', 1554.00, '999', 'uploads/dd137eb865.jpg', 1),
(50, 'VENUS AQUA AP-801 PORTABLE AIR PUMP', 11, 22, '<p><span>ENUS AQUA AP-801 PORTABLE AIR PUMP (comes with airstone and silicone tube hose) </span></p>\r\n<ul>\r\n<li><span>High technology&nbsp;</span></li>\r\n<li><span>Excellent and reliable quality&nbsp;</span></li>\r\n<li><span>High output&nbsp;</span></li>\r\n<li><span>Safe and quiet operation&nbsp;</span></li>\r\n<li><span>D battery operated (not included)&nbsp;</span></li>\r\n<li>DC: 2x1.5V&nbsp;</li>\r\n<li>Max Output: 2L/min</li>\r\n</ul>', 180.00, '999', 'uploads/fb4831dfae.jpg', 1),
(51, 'Venus Aqua AP-408a 5w Aquarium Air Pump', 0, 0, '<p>An air pump is not a necessity for your aquarium but this peripheral can add a lot of value to almost any aquarium. The VENUS AQUA aquarium air pump assists to increase the level of oxygen in your water tank and maintains optimal quality of water.</p>\r\n<p>This VENUS AQUA air pump is silent and does not make much noise when working. It can be connected with almost any air pipe that will facilitate the generation of more oxygen into your aquarium. The air pump will help to release oxygen into water. This process is extremely beneficial for your aquarium fish as it helps to get rid of the impure gases as well. The circulation of water can be achieved by a good filter as well but an air pump will enhance the result drastically. It does not end here you can attach the air pumps&nbsp;with various ornamental decorations in your aquarium to increase its aesthetic appeal.</p>\r\n<ul>\r\n<li>Aquarium Air Pump</li>\r\n<li>Quite and Durable</li>\r\n<li>Double Outlet</li>\r\n</ul>\r\n<p>MODEL: AP-408A</p>', 270.00, '999', 'uploads/3cbc94608f.jpg', 1),
(52, 'Venus Aqua Aquarium Top Filter', 13, 22, '<p><span>Venus Aqua Aquarium Top Filter </span></p>\r\n<ul>\r\n<li><span>Ideal water circulator &amp; oxygenator used for powering undergravel filters, water maker, sponge filter &amp; water pumping&nbsp;</span></li>\r\n<li><span>Absorb dirt, keep water clear, suitable for any aquarium and all kinds of filtration&nbsp;</span></li>\r\n<li><span>Completely submersible motor. Safe &amp; rely quiet operation&nbsp;</span></li>\r\n<li><span>Suitable for fresh and sea water</span></li>\r\n</ul>', 715.00, '999', 'uploads/c2afeaeb9c.jpg', 1),
(53, 'AQUAWING AQ1800F AQUARIUM TOP FILTER 15W', 13, 23, '<p><span>AQ1800F </span></p>\r\n<p><span>VOLTAGE: 220-240V </span></p>\r\n<p><span>FREQUENCY: 60Hz </span></p>\r\n<p><span>POWER: 15W </span></p>\r\n<p><span>F.MAX: 2500L/H </span></p>\r\n<p><span>Best suitable for 75 gallon tank</span></p>', 520.00, '999', 'uploads/513ed09ff1.jpg', 1),
(54, 'VENUS AQUA AQ380F 3.5W SLIM HANGING FILTER', 13, 22, '                            \r\n                            <p><span>VENUS AQUA AQ380F 3.5W SLIM HANGING FILTER </span></p>\r\n<ul>\r\n<li><span>Mute effect </span></li>\r\n<li><span>Biochemical filter </span></li>\r\n<li><span>Convenience for washing </span></li>\r\n<li><span>Both for fresh and seawater </span></li>\r\n<li><span>Voltage: 220-240V </span></li>\r\n<li><span>Frequency: 50-60Hz </span></li>\r\n<li><span>Watt: 3.5W </span></li>\r\n<li><span>F.Max: 380L/H</span></li>\r\n</ul>\r\n                        ', 420.00, '999', 'uploads/3771c7f6bd.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_bot`
--
ALTER TABLE `tbl_bot`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_catalogue`
--
ALTER TABLE `tbl_catalogue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_bot`
--
ALTER TABLE `tbl_bot`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `tbl_catalogue`
--
ALTER TABLE `tbl_catalogue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
