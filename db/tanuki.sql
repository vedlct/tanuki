-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 01:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.1.8

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
  `insertDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `name`, `fkInsertBy`, `insertDate`) VALUES
(1, 'test', 3, '2017-11-09 06:26:58');

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
(4, 1, 'priza', '14900406_1023011481155352_4768715051129103434_n.jpg', 'moja', 3, '2017-11-11 10:16:11', 1),
(5, 1, 'burger', '17800016_1565413556833199_1970750778728872010_n.jpg', 'this is test', 3, '2017-11-11 10:16:38', 1),
(6, 1, 'er', '14900406_1023011481155352_4768715051129103434_n.jpg', 'er', 3, '2017-11-14 05:47:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemsizes`
--

CREATE TABLE `itemsizes` (
  `id` int(11) NOT NULL,
  `fkItemId` int(11) NOT NULL,
  `itemSize` varchar(20) NOT NULL DEFAULT 'default',
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemsizes`
--

INSERT INTO `itemsizes` (`id`, `fkItemId`, `itemSize`, `price`) VALUES
(5, 4, 'L', '16.00'),
(6, 4, 'M', '10.00'),
(7, 4, 's', '6.00'),
(8, 5, 'default', '12.00'),
(9, 6, 'default', '12.00');

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
(13, '2017-11-14 05:02:59', '::1', 3, 'Chrome', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `fkOrderId` int(11) NOT NULL,
  `fkItemSizeId` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`fkOrderId`, `fkItemSizeId`, `quantity`, `rate`, `discount`) VALUES
(1, 5, '1.00', '12.00', NULL),
(1, 8, '1.00', '12.00', '0.00'),
(2, 5, '4.00', '20.00', '10.00'),
(2, 6, '3.00', '50.00', '20.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderType` varchar(4) NOT NULL DEFAULT 'have' COMMENT 'have,take,home',
  `orderDate` datetime DEFAULT NULL,
  `fkOrderStatus` tinyint(4) DEFAULT NULL,
  `delivery fee` decimal(10,2) DEFAULT NULL,
  `paymentType` varchar(3) NOT NULL DEFAULT 'cs' COMMENT 'cs = Cash, crd = Card',
  `fkUserId` int(11) DEFAULT NULL,
  `fkOrderTaker` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderType`, `orderDate`, `fkOrderStatus`, `delivery fee`, `paymentType`, `fkUserId`, `fkOrderTaker`) VALUES
(1, 'have', '2017-11-16 00:00:00', 1, '20.00', 'cs', 3, NULL),
(2, 'have', '2017-11-14 00:00:00', 1, '20.00', 'cs', 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderstatus`
--

CREATE TABLE `orderstatus` (
  `id` tinyint(4) NOT NULL,
  `statusTitle` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderstatus`
--

INSERT INTO `orderstatus` (`id`, `statusTitle`) VALUES
(1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `pointdeduct`
--

CREATE TABLE `pointdeduct` (
  `fkUserId` int(11) NOT NULL,
  `fkOrderId` int(11) NOT NULL,
  `expedPoints` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 27, 6, '10');

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
(26, 'winter', 'winter10', '0000-00-00', '0000-00-00', 'a', '10', 1),
(27, 'burgerhot', 'burgerhot10', '0000-00-00', '0000-00-00', 's', NULL, 1),
(28, 'test', '34', '2017-11-14', '2017-11-23', 'a', '12', 1);

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
(1, 8, '1.00', '5.00', '0.00');

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
(1, '2017-11-15', 1, 1, '0.00', 'er');

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
  `fkUserType` varchar(5) NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `postalCode`, `fkCity`, `memberCardNo`, `contactNo`, `email`, `password`, `userActivationStatus`, `fkUserType`) VALUES
(3, 'sakib', 'sdf', 'sdf', NULL, 'sdf', 'sdf', 'admin@gmail.com', '123', 1, 'Admin'),
(9, 'sj', 'baridhada', '1216', 1, '20202', '113213', 'sj@gmail.com', '1213', 1, 'cus');

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
  ADD UNIQUE KEY `UK_orderItem` (`fkOrderId`,`fkItemSizeId`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `itemsizes`
--
ALTER TABLE `itemsizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `logininfo`
--
ALTER TABLE `logininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orderstatus`
--
ALTER TABLE `orderstatus`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promotiondetail`
--
ALTER TABLE `promotiondetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `transactionmaster`
--
ALTER TABLE `transactionmaster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userfeedback`
--
ALTER TABLE `userfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
-- Constraints for table `transactionmaster`
--
ALTER TABLE `transactionmaster`
  ADD CONSTRAINT `fk_transactionMasterOrderId` FOREIGN KEY (`fkOrderId`) REFERENCES `orders` (`id`);

--
-- Constraints for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD CONSTRAINT `FK_userFeedbackItemId` FOREIGN KEY (`fkItemId`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `FK_userFeedbackUserId` FOREIGN KEY (`fkUserId`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_usersCity` FOREIGN KEY (`fkCity`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `FK_usersUserType` FOREIGN KEY (`fkUserType`) REFERENCES `usertype` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
