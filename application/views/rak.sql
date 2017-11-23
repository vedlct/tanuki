-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2017 at 09:23 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rak`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(10) NOT NULL,
  `small` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `about_us_banner`
--

CREATE TABLE `about_us_banner` (
  `id` int(10) NOT NULL,
  `details` varchar(10000) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us_banner`
--

INSERT INTO `about_us_banner` (`id`, `details`, `image`) VALUES
(1, 'Some words about us\r\nId pri consul aeterno petentium. Vivendo abhorreant et vim, et quot persecuti mel. Libris hendrerit ex sea. Duo legere evertitur an, pri hinc doctus definitiones an, vix id dicam putent. Ius ornatus instructior in.\r\n\r\nId pri consul aeterno petentium. Vivendo abhorreant et vim, et quot persecuti mel. Libris hendrerit ex sea. Duo legere evertitur an, pri hinc doctus definitiones an, vix id dicam putent. Ius ornatus instructior in.\r\n\r\nMission\r\n\r\nId pri consul aeterno petentium. Vivendo abhorreant et vim, et quot persecuti mel. Libris hendrerit ex sea. Duo legere evertitur an, pri hinc doctus definitiones an, vix id dicam putent. Ius ornatus instructior in.\r\n\r\nId pri consul aeterno petentium. Vivendo abhorreant et vim, et quot persecuti mel. Libris hendrerit ex sea. Duo legere evertitur an, pri hinc doctus definitiones an, vix id dicam putent. Ius ornatus instructior in.\r\n\r\nFilosofy\r\n\r\nId pri consul aeterno petentium. Vivendo abhorreant et vim, et quot persecuti mel. Libris hendrerit ex sea. Duo legere evertitur an, pri hinc doctus definitiones an, vix id dicam putent. Ius ornatus instructior in.', '');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_details`
--

CREATE TABLE `about_us_details` (
  `id` int(10) NOT NULL,
  `header` varchar(1000) DEFAULT NULL,
  `details` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us_details`
--

INSERT INTO `about_us_details` (`id`, `header`, `details`) VALUES
(4, '"EX VERO MEDIOCREM"', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nPer ea erant aeque corpora, an agam tibique nec. At recusabo expetendis vim. Tractatos principes mel te, dolor solet viderer usu ad.');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_feature`
--

CREATE TABLE `about_us_feature` (
  `id` int(10) NOT NULL,
  `big` varchar(100) DEFAULT NULL,
  `small` varchar(1000) DEFAULT NULL,
  `box_header` varchar(100) DEFAULT NULL,
  `box_details` varchar(9000) DEFAULT NULL,
  `box_icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us_feature`
--

INSERT INTO `about_us_feature` (`id`, `big`, `small`, `box_header`, `box_details`, `box_icon`) VALUES
(0, 'Quick food quality feautures', 'Cum doctus civibus efficiantur in imperdiet deterruisset.', '+ 1000 Restaurants', 'Lorem ipsum dolor sit amet, vix erat audiam ei. Cum doctus civibus efficiantur in. Nec id tempor imperdiet deterruisset, doctus volumus explicari qui ex, appareat similique an usu.', NULL),
(0, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `small` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `small`) VALUES
(1, 'Qui debitis meliore ex, tollit debitis conclusionemque te eos.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_customer_service`
--

CREATE TABLE `contact_customer_service` (
  `id` int(10) NOT NULL,
  `details` varchar(10000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_customer_service`
--

INSERT INTO `contact_customer_service` (`id`, `details`, `phone`, `email`) VALUES
(1, 'Adipisci conclusionemque ea duo, quo id fuisset prodesset, vis ea agam quas. Lorem iisque periculis id vis, no eum utinam interesset. Quis voluptaria id per, an nibh atqui vix. Mei falli simul nusquam te.', '+45 423 445 70', 'customercare@quickfood.com');

-- --------------------------------------------------------

--
-- Table structure for table `contact_restutant_service`
--

CREATE TABLE `contact_restutant_service` (
  `id` int(10) NOT NULL,
  `details` varchar(10000) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_restutant_service`
--

INSERT INTO `contact_restutant_service` (`id`, `details`, `phone`, `email`) VALUES
(1, 'Quo ex rebum petentium, cum alia illud molestiae in, pro ea paulo gubergren. Ne case constituto pro, ex vis delenit complectitur, per ad everti timeam conclusionemque. Quis voluptaria id per, an nibh atqui vix.', '+45 423 445 99', 'support@quickfood.com');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(10) NOT NULL,
  `header` varchar(100) DEFAULT NULL,
  `sub_header` varchar(1000) DEFAULT NULL,
  `details` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `header`, `sub_header`, `details`) VALUES
(1, ' Payments ', ' Anim pariatur cliche reprehenderit? ', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore '),
(2, 'Payments', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(3, 'How it works', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(4, 'How it works', 'Beet greens peanut salad?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(5, 'Delivery delay', 'Anim pariatur cliche reprehenderit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(6, 'Delivery delay', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(7, 'Delivery delay', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(8, 'Delivery delay', 'Beet greens peanut salad?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(9, 'Takeaway', 'Anim pariatur cliche reprehenderit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(10, 'Takeaway', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(11, 'Takeaway', 'Beet greens peanut salad?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(12, 'Preorder', 'Anim pariatur cliche reprehenderit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(13, 'Preorder', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(14, 'Preorder', 'Beet greens peanut salad?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(15, 'Register', 'Anim pariatur cliche reprehenderit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(16, 'Register', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(17, 'Register', 'Beet greens peanut salad?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(18, 'Pricing', 'Anim pariatur cliche reprehenderit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(19, 'Pricing', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(20, 'Pricing', 'Beet greens peanut salad?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(21, 'Privacy', 'Anim pariatur cliche reprehenderit?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(22, 'Privacy', 'Parsnip lotus root celery?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.'),
(23, 'Privacy', 'Beet greens peanut salad?', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.');

-- --------------------------------------------------------

--
-- Table structure for table `home_howitworks_content`
--

CREATE TABLE `home_howitworks_content` (
  `id` int(10) NOT NULL,
  `big` varchar(1000) DEFAULT NULL,
  `small` varchar(10000) DEFAULT NULL,
  `one_big` varchar(1000) DEFAULT NULL,
  `one_small` varchar(10000) DEFAULT NULL,
  `two_big` varchar(1000) DEFAULT NULL,
  `two_small` varchar(10000) DEFAULT NULL,
  `three_big` varchar(1000) DEFAULT NULL,
  `three_small` varchar(10000) DEFAULT NULL,
  `four_big` varchar(1000) DEFAULT NULL,
  `four_small` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_howitworks_content`
--

INSERT INTO `home_howitworks_content` (`id`, `big`, `small`, `one_big`, `one_small`, `two_big`, `two_small`, `three_big`, `three_small`, `four_big`, `four_small`) VALUES
(0, 'this is big ', '', '', '', '', '', '', '', '', ''),
(0, 'How it works', 'Cum doctus civibus efficiantur in imperdiet deterruisset.', 'Search by address', 'Find all restaurants available in your zone.', 'Choose a restaurant', 'We have more than 1000s of menus online', 'Pay by card or cash', 'It''s quick, easy and totally secure.', 'Delivery or takeaway', 'You are lazy? Are you backing home?');

-- --------------------------------------------------------

--
-- Table structure for table `home_main_content`
--

CREATE TABLE `home_main_content` (
  `id` int(10) NOT NULL,
  `big` varchar(100) DEFAULT NULL,
  `small` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_main_content`
--

INSERT INTO `home_main_content` (`id`, `big`, `small`) VALUES
(1, 'Order Takeaway or Delivery Food', 'Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.'),
(2, 'this is big content', 'this is small content'),
(3, 'this is big content', 'this is small content and thanks for that'),
(4, 'this is big content and thanks ', 'this is small content and thanks for that'),
(5, 'this is big content and thanks ', 'this is small content and thanks for that'),
(6, 'this is big content and thanks a lot ', 'this is small content and thanks for that'),
(7, 'this is big content and thanks a lot ', 'this is small content and thanks for that'),
(8, 'this is big content and thanks a lot ', 'this is small content and thanks for that . ok '),
(9, 'this is big content and thanks a lot ', 'this is small content and thanks for that . ok '),
(10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_resturant_andmore_content`
--

CREATE TABLE `home_resturant_andmore_content` (
  `id` int(11) NOT NULL,
  `resturant` varchar(100) DEFAULT NULL,
  `people_served` varchar(100) DEFAULT NULL,
  `registered_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_resturant_andmore_content`
--

INSERT INTO `home_resturant_andmore_content` (`id`, `resturant`, `people_served`, `registered_user`) VALUES
(1, '2650 Restaurant', '5350 People Served', '12350 Registered Users'),
(2, 'this is new content ', '12160', '');

-- --------------------------------------------------------

--
-- Table structure for table `home_section_4`
--

CREATE TABLE `home_section_4` (
  `id` int(10) NOT NULL,
  `big` varchar(1000) DEFAULT NULL,
  `small` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_section_4`
--

INSERT INTO `home_section_4` (`id`, `big`, `small`) VALUES
(1, 'Choose from over 2,000 Restaurants', 'Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.');

-- --------------------------------------------------------

--
-- Table structure for table `home_section_5`
--

CREATE TABLE `home_section_5` (
  `id` int(10) NOT NULL,
  `big` varchar(100) DEFAULT NULL,
  `small` varchar(1000) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_section_5`
--

INSERT INTO `home_section_5` (`id`, `big`, `small`, `image`) VALUES
(1, 'We also deliver to your office', 'Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.', ''),
(2, 'this is big', '', '15777061_1283400545037215_5109786879746060967_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_section_6`
--

CREATE TABLE `home_section_6` (
  `id` int(10) NOT NULL,
  `big` varchar(100) NOT NULL,
  `small` varchar(100) NOT NULL,
  `submit_big` varchar(100) NOT NULL,
  `submit_small` varchar(1000) NOT NULL,
  `submit_details` varchar(10000) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_section_6`
--

INSERT INTO `home_section_6` (`id`, `big`, `small`, `submit_big`, `submit_small`, `submit_details`, `image`) VALUES
(1, 'Work with Us', 'Cum doctus civibus efficiantur in imperdiet deterruisset.', 'Submit your Restaurant', 'Start to earn customers', 'Lorem ipsum dolor sit amet, ut virtute fabellas vix, no pri falli eloquentiam adversarium. Ea legere labore eam. Et eum sumo ocurreret, eos ei saepe oratio omittantur, legere eligendi partiendo pro te.', ''),
(2, 'Work with Us', '\nCum doctus civibus efficiantur in imperdiet deterruisset.', 'We are looking for a Driver', 'Start to earn money', 'Lorem ipsum dolor sit amet, ut virtute fabellas vix, no pri falli eloquentiam adversarium. Ea legere labore eam. Et eum sumo ocurreret, eos ei saepe oratio omittantur, legere eligendi partiendo pro te.', '');

-- --------------------------------------------------------

--
-- Table structure for table `icon`
--

CREATE TABLE `icon` (
  `id` int(10) NOT NULL,
  `icon_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icon`
--

INSERT INTO `icon` (`id`, `icon_name`) VALUES
(1, 'arrow_up'),
(2, 'arrow_down'),
(3, 'arrow_carrot-2up'),
(4, 'arrow_carrot-2down'),
(5, 'icon_close_alt2'),
(6, 'icon_check_alt2'),
(7, 'icon_minus-06'),
(8, 'icon_plus'),
(9, 'icon_close'),
(10, 'icon_box-checked'),
(11, 'icon_circle-empty'),
(12, 'icon_circle-slelected'),
(13, 'icon_menu-circle_alt2'),
(14, 'icon_ul'),
(15, 'icon_ol'),
(16, 'icon_documents_alt'),
(17, 'icon_pencil'),
(18, 'icon_pencil-edit_alt'),
(19, 'icon_mail_alt'),
(20, 'icon_pin_alt'),
(21, 'icon_blocked'),
(22, 'icon_printer'),
(23, 'icon_like'),
(24, 'icon_dislike'),
(25, 'icon_target'),
(26, 'icon_calculator_alt'),
(27, 'icon_building_alt'),
(28, 'icon_floppy_alt'),
(29, 'icon_drive_alt'),
(30, 'con_search_alt'),
(31, 'icon_id_alt'),
(32, 'icon_id-2_alt'),
(33, 'icon_briefcase_alt'),
(34, 'icon_currency_alt'),
(35, 'icon_wallet_alt'),
(36, 'icon_pens_alt'),
(37, 'icon_easel_alt'),
(38, 'icon_datareport_alt'),
(39, 'icon_clipboard'),
(40, 'icon_globe_alt'),
(41, 'icon_clipboard'),
(42, 'icon_datareport_alt'),
(43, 'icon_balance'),
(44, 'icon_calulator'),
(45, 'icon_search'),
(46, 'icon_puzzle'),
(47, 'icon_mug'),
(48, 'icon_flowchart'),
(49, 'icon_shield'),
(50, 'icon_percent'),
(51, 'icon_globe-2'),
(52, 'icon_hourglass'),
(53, 'icon_star_alt'),
(54, 'icon_star-half_alt'),
(55, 'icon_star'),
(56, 'arrow_up_alt'),
(57, 'arrow_down_alt'),
(58, 'con_comment'),
(59, 'icon_chat'),
(60, 'icon_lock-open'),
(61, 'icon_key'),
(62, 'icon_house'),
(63, 'icon_mail'),
(64, 'icon_cone'),
(65, 'icon_bag'),
(66, 'icon_cart'),
(67, 'icon_tag'),
(68, 'icon_trash'),
(69, 'icon_pin'),
(70, 'icon_toolbox'),
(71, 'icon_grid-3x3'),
(72, 'icon_phone'),
(73, 'social_facebook'),
(74, 'social_twitter'),
(75, 'social_pinterest'),
(76, 'social_googleplus'),
(77, 'social_tumblr'),
(78, 'social_skype'),
(79, 'social_youtube'),
(80, 'icon_trash'),
(81, 'icon_refresh');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(100) NOT NULL,
  `username` varchar(1000) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin@123', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_banner`
--
ALTER TABLE `about_us_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_details`
--
ALTER TABLE `about_us_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_customer_service`
--
ALTER TABLE `contact_customer_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_restutant_service`
--
ALTER TABLE `contact_restutant_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_main_content`
--
ALTER TABLE `home_main_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_resturant_andmore_content`
--
ALTER TABLE `home_resturant_andmore_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_section_4`
--
ALTER TABLE `home_section_4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_section_5`
--
ALTER TABLE `home_section_5`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_section_6`
--
ALTER TABLE `home_section_6`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `about_us_banner`
--
ALTER TABLE `about_us_banner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `about_us_details`
--
ALTER TABLE `about_us_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_customer_service`
--
ALTER TABLE `contact_customer_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_restutant_service`
--
ALTER TABLE `contact_restutant_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `home_main_content`
--
ALTER TABLE `home_main_content`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `home_resturant_andmore_content`
--
ALTER TABLE `home_resturant_andmore_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `home_section_4`
--
ALTER TABLE `home_section_4`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `home_section_5`
--
ALTER TABLE `home_section_5`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `home_section_6`
--
ALTER TABLE `home_section_6`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `icon`
--
ALTER TABLE `icon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
