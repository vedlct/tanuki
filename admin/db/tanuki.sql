-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 03:29 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanuki`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `fkInsertBy` int(11) NOT NULL,
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `fkInsertBy`, `insertDate`, `description`) VALUES
(10, 'CHEF''S SIGNATURE ROL', 3, '2017-12-05 14:25:08', 'this is test'),
(11, 'BAKED SPECIAL ROLL', 3, '2017-12-05 11:22:35', ''),
(12, 'NIGIRI SUSHI & SASHI', 3, '2017-12-05 11:36:26', 'I Oder(2pcs)'),
(13, 'SPICY ROLLS', 3, '2017-12-05 11:25:24', '1 Order (6 pcs) or Hand Roll(1pcs) Avaliable'),
(14, 'VEGETABLE ROLLS', 3, '2017-12-05 11:26:14', '1 Order (6 pcs) or Hand Roll(1pcs) Available'),
(15, 'ROLLS SUSHI ', 3, '2017-12-05 11:26:38', '1 Order (6 pcs) or Hand Roll(1pcs) Available'),
(16, 'SOUP & SALAD', 3, '2017-12-05 11:27:01', ''),
(17, 'APPETIZER ', 3, '2017-12-05 11:29:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(11) NOT NULL,
  `deliveryfee` decimal(10,2) NOT NULL,
  `vat` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `deliveryfee`, `vat`) VALUES
(1, '4.00', '15.00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `fkCatagory` int(11) NOT NULL,
  `itemName` varchar(45) DEFAULT NULL,
  `image` varchar(60) DEFAULT NULL,
  `description` text,
  `fkInsertBy` int(11) DEFAULT NULL,
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `itemStatus` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0 = In-ACTIVATE, 1 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `fkCatagory`, `itemName`, `image`, `description`, `fkInsertBy`, `insertDate`, `itemStatus`) VALUES
(4, 1, 'priza', '14900406_1023011481155352_4768715051129103434_n.jpg', 'moja', 3, '2017-11-14 12:29:56', 0),
(5, 1, 'burger', '17800016_1565413556833199_1970750778728872010_n.jpg', 'this is test', 3, '2017-11-11 10:16:38', 1),
(6, 1, 'er', '14900406_1023011481155352_4768715051129103434_n.jpg', 'er', 3, '2017-11-14 05:47:10', 1),
(7, 3, 'Mexican Enchiladas', 'menu-thumb-1.jpg', 'Fuisset mentitum deleniti sit ea.', 3, '2017-11-23 07:53:14', 1),
(8, 3, 'Fajitas', 'menu-thumb-2.jpg', 'Fuisset mentitum deleniti sit ea.', 3, '2017-11-23 07:59:19', 1),
(9, 4, 'Cheese Quesadilla', 'menu-thumb-3.jpg', 'Fuisset mentitum deleniti sit ea', 3, '2017-11-23 08:00:20', 1),
(10, 4, 'Chorizo & c', 'menu-thumb-4.jpg', 'Fuisset mentitum deleniti sit ea.', 3, '2017-11-25 06:41:42', 1),
(11, 4, 'Beef Taco', 'menu-thumb-7.jpg', 'Fuisset mentitum deleniti sit ea.', 3, '2017-11-23 08:02:21', 1),
(12, 5, 'Beef Enchilada Wrap', 'menu-thumb-8.jpg', 'Fuisset mentitum deleniti sit ea.', 3, '2017-11-23 08:08:06', 1),
(13, 5, 'Chicken Fillet Taco', 'menu-thumb-12.jpg', 'Fuisset mentitum deleniti sit ea.', 3, '2017-11-23 08:08:42', 1),
(14, 1, 'test', '11.png', 'safsf', 3, '2017-11-28 09:56:00', 1),
(15, 1, 'sdfsf', '10.PNG', 'sdfsafd', 3, '2017-11-28 09:56:46', 1),
(16, 10, 'Pink Lady (8pc) ', 'Untitled-1.jpg', 'Spicy Crush Cruncify ', 3, '2017-12-05 11:20:43', 1),
(17, 11, 'Hawaiian (6pcs)', 'Untitled-1.jpg', 'Salad ,Crab ,Spicy  ', 3, '2017-12-05 11:32:49', 1),
(18, 11, 'Super Volcano (6 pcs.No Rice)', 'Untitled-1.jpg', 'Spacy  ', 3, '2017-12-05 11:35:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemsizes`
--

CREATE TABLE `itemsizes` (
  `id` int(11) NOT NULL,
  `fkItemId` int(11) NOT NULL,
  `itemSize` varchar(20) NOT NULL DEFAULT 'default',
  `price` decimal(10,2) NOT NULL,
  `itemSizeStatus` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemsizes`
--

INSERT INTO `itemsizes` (`id`, `fkItemId`, `itemSize`, `price`, `itemSizeStatus`) VALUES
(5, 4, 'L', '16.00', 1),
(6, 4, 'M', '10.00', 1),
(7, 4, 's', '6.00', 1),
(8, 5, 'default', '12.00', 1),
(9, 6, 'default', '12.00', 0),
(12, 5, 'S', '30.00', 1),
(13, 7, 'default', '9.40', 1),
(14, 8, 'S', '3.30', 1),
(15, 8, 'M', '5.40', 1),
(16, 8, 'L', '8.40', 1),
(17, 9, 'default', '12.00', 1),
(18, 10, 'default', '24.71', 1),
(19, 11, 'default', '8.40', 1),
(20, 12, 'S', '3.50', 1),
(21, 12, 'M', '4.80', 1),
(22, 12, 'L', '8.70', 1),
(23, 12, 'Extra Cheez', '2.20', 1),
(24, 13, 'default', '12.40', 1),
(25, 6, 'L', '2.00', 1),
(26, 14, 'default', '10.00', 1),
(27, 15, 'default', '12.00', 1),
(28, 16, 'default', '11.50', 1),
(29, 17, 'default', '11.50', 1),
(30, 18, 'default', '11.50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `logininfo`
--

CREATE TABLE `logininfo` (
  `id` int(11) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sourceIp` varchar(16) DEFAULT NULL,
  `fkUserId` int(11) DEFAULT NULL,
  `browser` varchar(6) DEFAULT NULL,
  `logOutTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logininfo`
--

INSERT INTO `logininfo` (`id`, `loginTime`, `sourceIp`, `fkUserId`, `browser`, `logOutTime`) VALUES
(1, '2017-11-08 08:10:15', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(2, '2017-11-08 08:11:40', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(3, '2017-11-08 08:13:47', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(4, '2017-11-08 11:56:43', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(5, '2017-11-09 06:25:52', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(6, '2017-11-09 06:28:08', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(7, '2017-11-09 06:30:10', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(8, '2017-11-09 06:55:00', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(9, '2017-11-09 10:35:41', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(10, '2017-11-10 11:46:38', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(11, '2017-11-11 05:43:43', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(12, '2017-11-13 07:31:32', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(13, '2017-11-14 05:02:59', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(14, '2017-11-14 12:27:15', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(15, '2017-11-15 04:38:24', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(16, '2017-11-15 10:37:24', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(17, '2017-11-16 05:04:50', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(18, '2017-11-17 09:34:33', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(19, '2017-11-17 10:10:10', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(20, '2017-11-17 11:27:50', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(21, '2017-11-18 04:48:03', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(22, '2017-11-20 04:55:53', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(23, '2017-11-20 11:55:00', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(24, '2017-11-21 06:36:57', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(25, '2017-11-21 08:48:39', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(26, '2017-11-21 09:05:25', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(27, '2017-11-21 09:24:11', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(28, '2017-11-22 04:18:24', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(29, '2017-11-23 05:04:26', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(30, '2017-11-23 06:02:52', '::1', 3, 'Firefo', '0000-00-00 00:00:00'),
(31, '2017-11-23 06:03:50', '::1', 3, 'Firefo', '0000-00-00 00:00:00'),
(32, '2017-11-24 11:35:56', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(33, '2017-11-25 10:58:27', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(34, '2017-11-25 11:01:30', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(35, '2017-11-27 07:53:56', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(36, '2017-11-28 06:05:16', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(37, '2017-11-28 06:06:01', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(38, '2017-11-28 07:56:07', '::1', 9, 'Chrome', '0000-00-00 00:00:00'),
(39, '2017-11-28 08:42:45', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(40, '2017-11-28 09:44:46', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(41, '2017-11-28 09:50:49', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(42, '2017-11-28 10:38:05', '::1', 3, 'Chrome', '2017-11-28 05:38:05'),
(43, '2017-11-28 10:42:57', '::1', 9, 'Chrome', '2017-11-28 05:42:57'),
(44, '2017-11-28 10:44:30', '::1', 11, 'Chrome', '0000-00-00 00:00:00'),
(45, '2017-11-29 05:43:16', '::1', 3, 'Chrome', '0000-00-00 00:00:00'),
(46, '2017-11-30 06:00:00', '::1', 3, 'Chrome', '2017-11-30 01:00:00'),
(47, '2017-11-30 06:14:18', '::1', 3, 'Firefo', '2017-11-30 06:14:18'),
(48, '2017-11-30 06:00:47', '::1', 9, 'Chrome', '0000-00-00 00:00:00'),
(49, '2017-11-30 06:05:13', '::1', 9, 'Chrome', '0000-00-00 00:00:00'),
(50, '2017-12-04 07:25:27', '::1', 9, 'Firefo', '2017-12-04 02:25:27'),
(51, '2017-12-04 07:38:02', '::1', 9, 'Firefo', '2017-12-04 02:38:02'),
(52, '2017-12-04 07:43:32', '::1', 9, 'Firefo', '2017-12-04 02:43:32'),
(53, '2017-12-04 07:51:40', '::1', 9, 'Firefo', '2017-12-04 02:51:40'),
(54, '2017-12-04 09:01:28', '::1', 9, 'Firefo', '2017-12-04 04:01:28'),
(55, '2017-12-04 09:07:14', '::1', 9, 'Firefo', '2017-12-04 04:07:14'),
(56, '2017-12-04 09:22:18', '::1', 11, 'Firefo', '2017-12-04 04:22:18'),
(57, '2017-12-04 09:24:30', '::1', 9, 'Firefo', '2017-12-04 04:24:30'),
(58, '2017-12-04 09:30:05', '::1', 9, 'Firefo', '2017-12-04 04:30:05'),
(59, '2017-12-04 09:55:43', '::1', 9, 'Firefo', '2017-12-04 04:55:43'),
(60, '2017-12-04 10:10:21', '::1', 9, 'Firefo', '0000-00-00 00:00:00'),
(61, '2017-12-04 10:32:59', '::1', 3, 'Firefo', '2017-12-04 05:32:59'),
(62, '2017-12-04 10:31:01', '::1', 9, 'Chrome', '2017-12-04 05:31:01'),
(63, '2017-12-04 10:38:24', '::1', 9, 'Chrome', '2017-12-04 05:38:24'),
(64, '2017-12-04 10:33:05', '::1', 9, 'Firefo', '0000-00-00 00:00:00'),
(65, '2017-12-04 10:42:40', '::1', 11, 'Chrome', '2017-12-04 05:42:40'),
(66, '2017-12-04 12:42:28', '::1', 11, 'Chrome', '2017-12-04 07:42:28'),
(67, '2017-12-04 13:01:51', '::1', 9, 'Chrome', '2017-12-04 08:01:51'),
(68, '2017-12-04 13:17:03', '::1', 11, 'Chrome', '2017-12-04 08:17:03'),
(69, '2017-12-04 13:34:09', '::1', 11, 'Chrome', '2017-12-04 08:34:09'),
(70, '2017-12-04 13:37:45', '::1', 11, 'Chrome', '2017-12-04 08:37:45'),
(71, '2017-12-04 13:52:40', '::1', 11, 'Chrome', '0000-00-00 00:00:00'),
(72, '2017-12-04 14:17:51', '::1', 3, 'Firefo', '2017-12-04 09:17:51'),
(73, '2017-12-04 14:38:10', '::1', 3, 'Firefo', '2017-12-04 14:38:10'),
(74, '2017-12-05 06:48:43', '::1', 9, 'Firefo', '2017-12-05 01:48:43'),
(75, '2017-12-05 07:04:38', '::1', 9, 'Firefo', '2017-12-05 02:04:38'),
(76, '2017-12-05 10:02:12', '::1', 11, 'Chrome', '2017-12-05 05:02:12'),
(77, '2017-12-05 10:02:21', '::1', 11, 'Chrome', '0000-00-00 00:00:00'),
(78, '2017-12-05 13:01:51', '::1', 3, 'Firefo', '2017-12-05 08:01:51'),
(79, '2017-12-05 11:44:15', '::1', 3, 'Chrome', '2017-12-05 06:44:15'),
(80, '2017-12-05 11:44:22', '::1', 11, 'Chrome', '0000-00-00 00:00:00'),
(81, '2017-12-05 13:02:38', '::1', 9, 'Firefo', '2017-12-05 08:02:38'),
(82, '2017-12-05 13:33:00', '::1', 9, 'Firefo', '2017-12-05 08:33:00'),
(83, '2017-12-05 13:54:37', '::1', 9, 'Firefo', '2017-12-05 08:54:37'),
(84, '2017-12-05 13:56:12', '::1', 3, 'Chrome', '2017-12-05 08:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `fkOrderId` int(11) NOT NULL,
  `fkItemSizeId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `fkOrderId`, `fkItemSizeId`, `quantity`, `rate`, `discount`) VALUES
(1, 6, 5, '10.00', '20.00', '10.00'),
(3, 7, 6, '9.00', '60.00', '3.00'),
(4, 6, 12, '1.00', '30.00', '20.00'),
(5, 7, 9, '5.00', '12.00', '2.00'),
(6, 6, 7, '56.00', '6.00', '30.00'),
(7, 6, 9, '12.00', '12.00', '12.00'),
(9, 10, 26, '1.00', '10.00', '1.00'),
(10, 10, 13, '1.00', '9.40', '0.94'),
(11, 10, 15, '1.00', '5.40', '0.54'),
(12, 10, 19, '3.00', '8.40', '2.52');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderType` varchar(4) NOT NULL DEFAULT 'have' COMMENT 'have,take,home',
  `orderDate` datetime DEFAULT NULL,
  `fkOrderStatus` tinyint(4) DEFAULT NULL,
  `deliveryfee` decimal(10,2) DEFAULT NULL,
  `vat` decimal(10,2) NOT NULL,
  `paymentType` varchar(3) NOT NULL DEFAULT 'cs' COMMENT 'cs = Cash, crd = Card',
  `fkUserId` int(11) DEFAULT NULL,
  `fkOrderTaker` int(11) DEFAULT NULL,
  `orderNotifications` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderType`, `orderDate`, `fkOrderStatus`, `deliveryfee`, `vat`, `paymentType`, `fkUserId`, `fkOrderTaker`, `orderNotifications`) VALUES
(6, 'have', '2017-11-06 00:00:00', 6, '50.00', '20.00', 'cs', 3, 9, 1),
(7, 'have', '2017-11-23 00:00:00', 6, '60.00', '0.00', 'cs', 3, 9, 1),
(8, 'take', '2017-11-18 00:00:00', 6, '20.00', '0.00', 'crd', 9, 9, 1),
(10, 'take', '2017-11-30 11:06:00', 4, NULL, '6.75', 'cas', 9, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` tinyint(4) NOT NULL,
  `sequece` int(11) DEFAULT NULL,
  `statusTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `sequece`, `statusTitle`) VALUES
(4, 1, 'pending'),
(6, 4, 'delivered'),
(7, 2, 'making'),
(8, 3, 'ready to deliver');

-- --------------------------------------------------------

--
-- Table structure for table `pointdeduct`
--

CREATE TABLE `pointdeduct` (
  `fkUserId` int(11) NOT NULL,
  `fkOrderId` int(11) NOT NULL,
  `expedPoints` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pointdeduct`
--

INSERT INTO `pointdeduct` (`fkUserId`, `fkOrderId`, `expedPoints`) VALUES
(9, 7, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `fkTransId` int(11) NOT NULL,
  `fkUserId` int(11) NOT NULL,
  `earnedPoints` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `fkTransId`, `fkUserId`, `earnedPoints`) VALUES
(1, 5, 9, '10.00'),
(2, 3, 9, '20.00'),
(3, 8, 11, '5.00'),
(4, 7, 9, '80.00'),
(5, 4, 9, '60.00'),
(6, 2, 11, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `promotiondetail`
--

CREATE TABLE `promotiondetail` (
  `id` int(11) NOT NULL,
  `fkPromotionId` int(11) NOT NULL,
  `fkItemId` int(11) NOT NULL,
  `discountAmount` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotiondetail`
--

INSERT INTO `promotiondetail` (`id`, `fkPromotionId`, `fkItemId`, `discountAmount`) VALUES
(16, 27, 5, '10'),
(17, 27, 4, '10'),
(18, 27, 6, '15'),
(19, 29, 6, '20');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `campainTitle` varchar(50) DEFAULT NULL,
  `promoCode` varchar(20) DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `promoType` char(1) NOT NULL DEFAULT 'a' COMMENT 'a = All Items, s = Specific Items',
  `discountAmount` varchar(10) DEFAULT NULL,
  `activationStatus` tinyint(1) DEFAULT NULL COMMENT '0 = In-Active, 1 = Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `campainTitle`, `promoCode`, `startDate`, `endDate`, `promoType`, `discountAmount`, `activationStatus`) VALUES
(26, 'winter', 'winter10', '2017-11-15', '2017-11-30', 'a', '10', 1),
(27, 'burgerhot', 'burgerhot10', '2017-11-22', '2017-11-23', 's', '15', 1),
(28, 'test', '34', '2017-11-14', '2017-11-23', 'a', '12', 1),
(29, 'new', '3123', '2017-11-15', '2017-11-17', 's', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactiondetail`
--

CREATE TABLE `transactiondetail` (
  `fkTransId` int(11) NOT NULL,
  `fkItemSizeId` int(11) NOT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactiondetail`
--

INSERT INTO `transactiondetail` (`fkTransId`, `fkItemSizeId`, `quantity`, `rate`, `discount`) VALUES
(1, 5, '1.00', '12.00', '0.00'),
(1, 8, '1.00', '5.00', '0.00'),
(2, 6, '20.00', '50.00', '10.00'),
(2, 7, '30.00', '25.00', '20.00'),
(2, 9, '2.00', '30.00', '20.00'),
(3, 6, '5.00', '30.00', '5.00'),
(4, 6, '9.00', '60.00', '3.00'),
(4, 9, '5.00', '12.00', '2.00'),
(6, 6, '9.00', '60.00', '3.00'),
(6, 9, '5.00', '12.00', '2.00'),
(7, 5, '10.00', '20.00', '10.00'),
(7, 7, '56.00', '6.00', '30.00'),
(7, 9, '12.00', '12.00', '12.00'),
(7, 12, '1.00', '30.00', '20.00'),
(8, 6, '9.00', '60.00', '3.00'),
(8, 9, '5.00', '12.00', '2.00');

-- --------------------------------------------------------

--
-- Table structure for table `transactionmaster`
--

CREATE TABLE `transactionmaster` (
  `id` int(11) NOT NULL,
  `transDate` date NOT NULL,
  `fkOrderId` int(11) NOT NULL,
  `transactionBy` int(11) NOT NULL,
  `vatTotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comments` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionmaster`
--

INSERT INTO `transactionmaster` (`id`, `transDate`, `fkOrderId`, `transactionBy`, `vatTotal`, `comments`) VALUES
(1, '2017-11-15', 2, 1, '0.00', 'er'),
(2, '2017-11-15', 3, 3, '10.00', 'sad'),
(3, '2017-11-15', 4, 12, '20.00', NULL),
(4, '2017-11-18', 7, 0, '0.00', NULL),
(5, '2017-11-18', 8, 0, '0.00', NULL),
(6, '2017-11-18', 7, 0, '0.00', NULL),
(7, '2017-11-22', 6, 0, '20.00', NULL),
(8, '2017-11-23', 7, 0, '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userfeedback`
--

CREATE TABLE `userfeedback` (
  `id` int(11) NOT NULL,
  `fkItemId` int(11) NOT NULL,
  `fkUserId` int(11) NOT NULL,
  `userRating` tinyint(1) NOT NULL,
  `feedback` varchar(200) DEFAULT NULL,
  `feedbackTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userfeedback`
--

INSERT INTO `userfeedback` (`id`, `fkItemId`, `fkUserId`, `userRating`, `feedback`, `feedbackTime`) VALUES
(15, 17, 11, 1, 'this is  awosome food', '2017-12-05 12:50:25'),
(16, 16, 11, 5, 'fdfd', '2017-12-05 12:44:38'),
(17, 17, 9, 4, 'gfg', '2017-12-05 12:44:44'),
(18, 4, 9, 3, '', '2017-12-05 05:41:57'),
(19, 17, 9, 1, '', '2017-12-05 12:50:29'),
(20, 17, 9, 5, '', '2017-12-05 12:44:55'),
(21, 4, 9, 3, 'fdfdf', '2017-12-05 05:54:42'),
(22, 16, 11, 4, '', '2017-12-05 11:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `postalCode` varchar(11) DEFAULT NULL,
  `fkCity` int(11) DEFAULT NULL,
  `memberCardNo` varchar(30) DEFAULT NULL,
  `contactNo` varchar(18) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `userActivationStatus` tinyint(1) DEFAULT NULL COMMENT '0 = In-Active, 1 = Active',
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fkUserType` varchar(5) NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `postalCode`, `fkCity`, `memberCardNo`, `contactNo`, `email`, `password`, `userActivationStatus`, `insertDate`, `fkUserType`) VALUES
(3, 'sakib Rahman dasda', 'sdf', 'sdf', NULL, 'sdf', '122456', 'admin@gmail.com', 'admin@123', 1, '2017-11-28 06:52:28', 'Admin'),
(9, 'sj', 'baridhada', '1216', 1, '20202', '113213', 'sj@gmail.com', '123', 1, '2017-11-28 10:39:34', 'cus'),
(11, 'alamin', 'baridhada', '1216', 1, '20202', '113213', 'suj@gmail.com', '123', 1, '2017-12-05 10:01:44', 'cus');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` varchar(5) NOT NULL,
  `typeTitle` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `typeTitle`) VALUES
('Admin', 'admintra'),
('cus', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_catagoryInsertedBy` (`fkInsertBy`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_itemsCatagory` (`fkCatagory`),
  ADD KEY `FK_itemsInsertedBy` (`fkInsertBy`);

--
-- Indexes for table `itemsizes`
--
ALTER TABLE `itemsizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_itemSizeItem` (`fkItemId`);

--
-- Indexes for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loginInfoUser` (`fkUserId`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_orderItem` (`fkOrderId`,`fkItemSizeId`) USING BTREE,
  ADD KEY `fk_orderItemsItemSizeId` (`fkItemSizeId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ordersStatus` (`fkOrderStatus`),
  ADD KEY `fk_ordersUser` (`fkUserId`),
  ADD KEY `fk_ordersTaken` (`fkOrderTaker`);

--
-- Indexes for table `orderstatus`
--
ALTER TABLE `orderstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pointdeduct`
--
ALTER TABLE `pointdeduct`
  ADD UNIQUE KEY `uk_pointDeduct` (`fkUserId`,`fkOrderId`),
  ADD KEY `fk_pointDeductOrderId` (`fkOrderId`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pointsTransId` (`fkTransId`),
  ADD KEY `fk_pointsUserId` (`fkUserId`);

--
-- Indexes for table `promotiondetail`
--
ALTER TABLE `promotiondetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_promoDetailItemId` (`fkItemId`),
  ADD KEY `fkPromotionId` (`fkPromotionId`,`fkItemId`) USING BTREE;

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD UNIQUE KEY `uk_transDetail` (`fkTransId`,`fkItemSizeId`),
  ADD KEY `fk_transDetailItemSizeId` (`fkItemSizeId`);

--
-- Indexes for table `transactionmaster`
--
ALTER TABLE `transactionmaster`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transactionMasterOrderId` (`fkOrderId`);

--
-- Indexes for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userFeedbackItemId` (`fkItemId`),
  ADD KEY `FK_userFeedbackUserId` (`fkUserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_usersUserType` (`fkUserType`),
  ADD KEY `FK_usersCity` (`fkCity`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `itemsizes`
--
ALTER TABLE `itemsizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `logininfo`
--
ALTER TABLE `logininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `promotiondetail`
--
ALTER TABLE `promotiondetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `transactionmaster`
--
ALTER TABLE `transactionmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `userfeedback`
--
ALTER TABLE `userfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `catagory`
--
ALTER TABLE `catagory`
  ADD CONSTRAINT `Fk_catagoryInsertedBy` FOREIGN KEY (`fkInsertBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `FK_itemsCatagory` FOREIGN KEY (`fkCatagory`) REFERENCES `catagory` (`id`),
  ADD CONSTRAINT `FK_itemsInsertedBy` FOREIGN KEY (`fkInsertBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `itemsizes`
--
ALTER TABLE `itemsizes`
  ADD CONSTRAINT `FK_itemSizeItem` FOREIGN KEY (`fkItemId`) REFERENCES `items` (`id`);

--
-- Constraints for table `logininfo`
--
ALTER TABLE `logininfo`
  ADD CONSTRAINT `fk_loginInfoUser` FOREIGN KEY (`fkUserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `fk_orderItemsItemSizeId` FOREIGN KEY (`fkItemSizeId`) REFERENCES `itemsizes` (`id`),
  ADD CONSTRAINT `fk_orderItemsOrderId` FOREIGN KEY (`fkOrderId`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_ordersStatus` FOREIGN KEY (`fkOrderStatus`) REFERENCES `orderstatus` (`id`),
  ADD CONSTRAINT `fk_ordersTaken` FOREIGN KEY (`fkOrderTaker`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_ordersUser` FOREIGN KEY (`fkUserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `pointdeduct`
--
ALTER TABLE `pointdeduct`
  ADD CONSTRAINT `fk_pointDeductOrderId` FOREIGN KEY (`fkOrderId`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_pointDeductUserId` FOREIGN KEY (`fkUserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `fk_pointsTransId` FOREIGN KEY (`fkTransId`) REFERENCES `transactionmaster` (`id`),
  ADD CONSTRAINT `fk_pointsUserId` FOREIGN KEY (`fkUserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `promotiondetail`
--
ALTER TABLE `promotiondetail`
  ADD CONSTRAINT `FK_promoDetailItemId` FOREIGN KEY (`fkItemId`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `FK_promoDetailPromoId` FOREIGN KEY (`fkPromotionId`) REFERENCES `promotions` (`id`);

--
-- Constraints for table `transactiondetail`
--
ALTER TABLE `transactiondetail`
  ADD CONSTRAINT `fk_transDetailItemSizeId` FOREIGN KEY (`fkItemSizeId`) REFERENCES `itemsizes` (`id`),
  ADD CONSTRAINT `fk_transDetailTransId` FOREIGN KEY (`fkTransId`) REFERENCES `transactionmaster` (`id`);

--
-- Constraints for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD CONSTRAINT `FK_userFeedbackItemId` FOREIGN KEY (`fkItemId`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `FK_userFeedbackUserId` FOREIGN KEY (`fkUserId`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
