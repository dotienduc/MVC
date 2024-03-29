-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 10:47 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(8) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `text1` varchar(150) DEFAULT NULL,
  `text2` varchar(150) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `image`, `text1`, `text2`, `status`) VALUES
(1, 'Haylie Brown', '1.jpg', 'Et nobis non reiciendis.', 'Qui deserunt nesciunt enim.', 1),
(2, 'Mrs. Vivienne Adams Jr.', '2.jpg', 'Quod voluptatum.', 'Velit unde maiores aut.', 1),
(3, 'Prof. Josefa Bailey', '3.jpg', 'Eaque odit quia.', 'Odit asperiores provident id qui.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(8) NOT NULL,
  `id_customer` int(8) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `note`, `created_at`, `updated_at`, `status`) VALUES
(4, 4, '2019-06-28', 155, 'sdasdasdsad', '2019-06-29 09:02:25', '0000-00-00 00:00:00', 1),
(5, 10, '2019-07-09', 55, 'sasasas', '2019-07-09 07:11:08', '0000-00-00 00:00:00', 0),
(6, 11, '2019-07-09', 155, 'sdasdasdsad', '2019-07-09 07:10:51', '0000-00-00 00:00:00', 0),
(7, 12, '2019-07-09', 205, 'đâs', '2019-07-09 07:34:36', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(8) NOT NULL,
  `id_bill` int(8) DEFAULT NULL,
  `id_product` int(8) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(5, 4, 6, 1, 150, '2019-06-28 08:45:17', '0000-00-00 00:00:00'),
(6, 5, 1, 1, 50, '2019-07-09 07:11:17', '0000-00-00 00:00:00'),
(7, 6, 2, 1, 150, '2019-07-09 07:10:51', '0000-00-00 00:00:00'),
(8, 7, 3, 1, 50, '2019-07-09 07:15:49', '0000-00-00 00:00:00'),
(9, 7, 2, 1, 150, '2019-07-09 07:15:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(8) NOT NULL,
  `blog_name` varchar(255) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `content` text,
  `time_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `blog_name`, `author`, `content`, `time_post`, `image`) VALUES
(19, 'Kallie Herzog', 'Richie Frami', 'Aliquid in libero debitis quia quibusdam. Repellendus sed doloremque quaerat repudiandae doloribus. Voluptatum similique cupiditate ratione vitae consequatur repudiandae.', '2019-05-12 07:00:00', '1.jpg'),
(20, 'Leif Wiza', 'Prof. Sophie Koch', 'Soluta beatae provident ut pariatur. Qui nostrum sunt alias. Numquam doloremque quia omnis mollitia voluptas explicabo fugit.', '2019-06-12 20:34:31', '2.jpg'),
(21, 'Vladimir Deckow', 'Madyson Paucek', 'Delectus omnis rem consectetur odit. Minima et quas voluptatem minus doloribus eius ad veritatis. Ipsam sint est id non minus.', '2019-06-12 20:34:35', '3.jpg'),
(22, 'Duncan Dare', 'William Deckow', 'Omnis porro a sit ut et nisi delectus. Vel voluptatem amet sunt ut illo adipisci. Molestias nam ut sit saepe sunt odit. Excepturi dolorem molestias officiis.', '2019-06-12 20:34:40', '1.jpg'),
(23, 'Kirk Koelpin IV', 'Crystal Morar', 'Nihil ea blanditiis consequatur officia odit iste ut. Culpa ipsam non quis laborum dolorum. Molestiae debitis quia voluptatum omnis earum est.', '2019-06-12 20:34:45', '2.jpg'),
(24, 'Ollie Wilderman', 'Winston Wisozk', 'Temporibus eos iusto dolores provident in quia. Dolor expedita sit ab expedita ut. Rerum a cum non repudiandae. Dolores laboriosam quas doloribus nam. Non omnis odio voluptatum sit.', '2019-06-12 20:34:49', '3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(8) NOT NULL,
  `id_doctor` int(8) DEFAULT NULL,
  `id_timeserving` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `id_doctor`, `id_timeserving`) VALUES
(9, 7, 3),
(10, 1, 1),
(12, 6, 2),
(14, 5, 4),
(15, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(8) NOT NULL,
  `parent_commnet_id` int(8) DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `comment_sender_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `id_blog` int(8) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(8) NOT NULL,
  `fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `note` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `address`, `email`, `gender`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(4, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'mayhajnhj1998@gmail.com', 'nam', '4444444444', 'sdasdasdsad', '2019-06-28 08:45:17', '0000-00-00 00:00:00'),
(5, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'mayhajnhj1998@gmail.com', 'nữ', '4444444444', 'sasaq', '2019-06-28 08:46:56', '0000-00-00 00:00:00'),
(6, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'sas@gmail.com', 'nam', '4444444444', 'sasasas', '2019-07-09 07:00:25', '0000-00-00 00:00:00'),
(7, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'sas@gmail.com', 'nam', '4444444444', 'asasas', '2019-07-09 07:01:55', '0000-00-00 00:00:00'),
(8, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'sas@gmail.com', 'nam', '4444444444', 'sasa', '2019-07-09 07:04:19', '0000-00-00 00:00:00'),
(9, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'sas@gmail.com', 'nam', '4444444444', 'sasas', '2019-07-09 07:04:39', '0000-00-00 00:00:00'),
(10, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'sas@gmail.com', 'nam', '4444444444', 'sasa', '2019-07-09 07:07:12', '0000-00-00 00:00:00'),
(11, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'sas@gmail.com', 'nữ', '4444444444', 'sdasdasdsad', '2019-07-09 07:10:51', '0000-00-00 00:00:00'),
(12, 'asda', 'dasdas', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 'sas@gmail.com', 'nam', '4444444444', 'đâs', '2019-07-09 07:15:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(8) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_specialist` int(8) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `image`, `id_specialist`, `address`, `phone`, `email`, `description`) VALUES
(1, 'Rosalee Gerhold II', '1.png', 1, '184 Bill Pine Apt. 226Armstrongbury, PA 34299-2491', '+60442949342', 'king.tristin@hotmail.com', 'Quia itaque corporis iure illum. Est quisquam ut quisquam qui sit voluptas. Eius sint quae natus ea quod. Iste perferendis nam et repellat ut quia. Magnam et non vitae.'),
(2, 'Reina Daugherty', '2.png', 2, '3748 William Center Apt. 610\nHesterbury, ND 12641-8084', '+86382130848', 'mallie.lang@yahoo.com', 'Fugit in sint rerum molestiae aut ducimus. Totam corrupti beatae sit voluptatem quia totam. Illo et cum tempora.'),
(3, 'Hope Runolfsdottir', '3.png', 3, '935 Colin Islands Suite 681\nLake Karianeborough, CT 78713', '+94854715895', 'jadyn51@gmail.com', 'Deleniti voluptatem quod et corrupti rerum voluptatem quia. Et ut deleniti laboriosam. Molestiae dolor earum necessitatibus quidem quas.'),
(4, 'Dayton Zulauf', '4.png', 4, '316 Nels Extensions Suite 245\nLake Keithburgh, NC 51658', '+99222569182', 'stromp@gmail.com', 'Reiciendis soluta fugit quasi. Facere eos voluptatem minima non quam libero dolores. Voluptatem rerum sunt delectus nemo atque. Quo aut et dolor unde laboriosam.'),
(5, 'Vita Abernathy', '5.png', 5, '280 Gaylord Club\nWest Jake, NE 23883-2707', '+50388949091', 'trantow.susan@gmail.com', 'Maxime ut corporis id aut eum dignissimos. A labore omnis rerum quo veniam deserunt. Tempore qui eos aut eum. Blanditiis deserunt est quia nam.'),
(6, 'Carley Morissette', '3.png', 1, '8130 Jacey Loaf Suite 487\nLake Amina, IA 69391', '+31618600641', 'kschmitt@yahoo.com', 'Saepe laudantium hic qui at dicta atque earum. Nisi quo id quisquam voluptates labore maiores. Aut fugit autem earum aliquam et. Fugit consectetur ut voluptatem.'),
(7, 'Celestine Hayes', '5.png', 2, '1297 Mac Manor\nWest Germanville, NV 86309-2836', '+33470693244', 'kayden.howell@gmail.com', 'Autem odit officia optio adipisci incidunt alias. Quas qui voluptatem quo fuga fugiat. Fugiat qui tempora facilis quod.'),
(8, 'Maggie Koch', '3.png', 3, '8928 Walsh Lake Suite 647\nRohanview, WI 76134-4224', '+28522763818', 'julian94@gmail.com', 'Rerum et recusandae ea minima. Nesciunt ullam impedit fuga. Magnam quia distinctio iure qui excepturi. Expedita nam repudiandae ullam non reiciendis modi et doloribus.');

-- --------------------------------------------------------

--
-- Table structure for table `examination_schedule`
--

CREATE TABLE `examination_schedule` (
  `id` int(8) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `message` text,
  `id_doctor` int(11) DEFAULT NULL,
  `id_timeserving` int(11) DEFAULT NULL,
  `id_subject` int(11) DEFAULT NULL,
  `status` int(8) DEFAULT NULL,
  `confirmed` int(11) DEFAULT NULL,
  `confirm_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination_schedule`
--

INSERT INTO `examination_schedule` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `id_doctor`, `id_timeserving`, `id_subject`, `status`, `confirmed`, `confirm_code`) VALUES
(39, 'asda', 'dasdas', 'sas@gmail.com', '4444444444', 'adasd', 6, 3, 1, 1, 1, 0),
(40, 'asda', 'dasdas', 'mayhajnhj1998@gmail.com', '4444444444', '1212121', 7, 3, 2, 0, 1, 0),
(44, 'asda', 'dasdas', 'mayhajnhj1998@gmail.com', '4444444444', 'dadasd', 7, 3, 2, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `description` text,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `status` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `unit_price`, `promotion_price`, `image`, `status`) VALUES
(1, 'Dr. Estrella Jaskolski', 'Et est modi sunt ducimus saepe eum adipisci illo magnam vel quasi sunt recusandae et ab ad qui explicabo beatae consequatur adipisci quo et sapiente dicta et laboriosam necessitatibus rerum dolor facere tempore.', 150, 50, 's4.jpg', 1),
(2, 'Ms. Beth Mueller PhD', 'Quod eius ipsum enim aut facere sunt ea illum magnam similique facere enim itaque qui et possimus aut ad in praesentium omnis qui aut est aut excepturi vel asperiores maxime fugit a provident minus ea.', 150, 0, 's5.jpg', 1),
(3, 'Yazmin Kreiger', 'Dicta dolorum rerum ratione consequatur cum dolorem ea necessitatibus voluptatum similique pariatur eum maxime iste ex omnis tempora ex sunt dignissimos.', 150, 50, 's6.jpg', 1),
(4, 'Mr. Dedrick Gislason', 'Suscipit quod asperiores sit maiores nam eum provident et quis aut natus et fugit ea repellendus tempora eaque tempora iusto velit ex illo officia autem doloribus.', 150, 0, 's1.jpg', 1),
(5, 'Gerry Wintheiser IV', 'Ducimus recusandae reiciendis et omnis placeat quo sapiente aut aut ea est ullam earum id alias consectetur consequatur nobis tenetur consequatur rerum molestias odit exercitationem eaque delectus.', 150, 50, 's2.jpg', 1),
(6, 'Dr. Stacy Krajcik IV', 'Illo error iure dolores non in sit deserunt est vitae quia id at dolore aliquid adipisci in iure molestiae non in similique illum perspiciatis dolor vel odio voluptatem blanditiis et iure nobis quasi.', 150, 0, 's3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(8) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `status` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `name`, `email`, `subject`, `message`, `status`) VALUES
(6, 'asda dasdas', 'mayhajnhj1998@gmail.com', 'Tu van ', '556', 1),
(7, 'cccc', 'mayhajnhj1998@gmail.com', 'dasda', 'eretdada', 1),
(8, 'aaa', 'sas@gmail.com', 'sas', 'sasasaasa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE `specialist` (
  `id` int(8) NOT NULL,
  `name_specialist` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialist`
--

INSERT INTO `specialist` (`id`, `name_specialist`) VALUES
(1, 'Tim mach'),
(2, 'Da lieu'),
(3, 'Cap cuu'),
(4, 'Phoi'),
(5, 'Tam than');

-- --------------------------------------------------------

--
-- Table structure for table `timeserving`
--

CREATE TABLE `timeserving` (
  `id_timeserving` int(8) NOT NULL,
  `weeksday` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `work_time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeserving`
--

INSERT INTO `timeserving` (`id_timeserving`, `weeksday`, `work_time`) VALUES
(1, 'Monday - Friday', '8:00 - 18:00'),
(2, 'Saturday', '6:00 - 12: 00'),
(3, 'Sunday', '8:00 - 18:00'),
(4, 'Monday - Friday', '6:00 - 12: 00'),
(5, 'Monday - Friday', '18:00 - 22:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(8) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `role` int(8) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `address`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'mayhajnhj1998@gmail.com', '0123456789', '99999', 'Ha noi', 1, 1, '2019-06-29 08:29:57', '0000-00-00 00:00:00'),
(2, 'Alibaba', 'mayhajnhj1998@gmail.com', '232423', '0123456789', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 1, 1, '2019-06-29 02:26:05', '0000-00-00 00:00:00'),
(5, 'Doctor', 'sas@gmail.com', '4444444444', '99999', 'Kí túc xá Đại học công nghiệp Hà Nội khu A', 0, 1, '2019-06-29 08:30:46', '0000-00-00 00:00:00'),
(7, 'asas', 'sas@gmail.com', NULL, '99999999', NULL, NULL, NULL, '2019-07-09 10:14:42', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination_schedule`
--
ALTER TABLE `examination_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeserving`
--
ALTER TABLE `timeserving`
  ADD PRIMARY KEY (`id_timeserving`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `examination_schedule`
--
ALTER TABLE `examination_schedule`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `specialist`
--
ALTER TABLE `specialist`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timeserving`
--
ALTER TABLE `timeserving`
  MODIFY `id_timeserving` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
