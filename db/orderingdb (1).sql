-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 04:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orderingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(50) NOT NULL,
  `ref_no` varchar(50) NOT NULL,
  `prod_order_id` int(50) NOT NULL,
  `order_qty` int(50) NOT NULL,
  `time_order` time(6) NOT NULL,
  `date_of_order` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `ref_no`, `prod_order_id`, `order_qty`, `time_order`, `date_of_order`, `status`, `user_id`) VALUES
(11, '253095-202305', 3, 3, '02:12:56.000000', '2023-05-31', 'paid', 1),
(18, '907844-202305', 2, 5, '02:43:40.000000', '2023-05-31', 'paid', 1),
(19, '541155-202305', 1, 4, '06:08:39.000000', '2023-05-31', 'paid', 1),
(20, '854229-202305', 1, 4, '06:08:56.000000', '2023-05-31', 'paid', 1),
(21, '938505-202305', 1, 4, '06:16:11.000000', '2023-05-31', 'paid', 1),
(22, '174925-202305', 1, 4, '06:17:51.000000', '2023-05-31', 'paid', 1),
(23, '424513-202305', 1, 4, '06:18:44.000000', '2023-05-31', 'paid', 1),
(24, '727447-202305', 1, 4, '06:24:59.000000', '2023-05-31', 'paid', 1),
(25, '864602-202305', 2, 4, '06:30:22.000000', '2023-05-31', 'paid', 1),
(26, '563754-202305', 2, 4, '06:33:58.000000', '2023-05-31', 'paid', 1),
(27, '633610-202305', 2, 4, '06:34:27.000000', '2023-05-31', 'paid', 1),
(28, '556225-202305', 2, 4, '06:35:22.000000', '2023-05-31', 'paid', 1),
(29, '772237-202305', 2, 4, '06:44:04.000000', '2023-05-31', 'paid', 1),
(30, '227220-202305', 2, 4, '06:47:28.000000', '2023-05-31', 'paid', 1),
(31, '497557-202305', 1, 4, '06:48:02.000000', '2023-05-31', 'paid', 1),
(32, '497557-202305', 2, 4, '06:48:02.000000', '2023-05-31', 'paid', 1),
(33, '497557-202305', 3, 3, '06:48:02.000000', '2023-05-31', 'paid', 1),
(34, '721924-202305', 2, 4, '06:51:30.000000', '2023-05-31', 'paid', 1),
(35, '749101-202305', 1, 4, '06:54:36.000000', '2023-05-31', 'paid', 1),
(36, '438966-202305', 1, 2, '08:29:09.000000', '2023-05-31', 'paid', 1),
(37, '438966-202305', 2, 4, '08:29:09.000000', '2023-05-31', 'paid', 1),
(38, '438966-202305', 3, 3, '08:29:09.000000', '2023-05-31', 'paid', 1),
(39, '243904-202305', 1, 2, '08:32:15.000000', '2023-05-31', 'paid', 1),
(40, '243904-202305', 2, 4, '08:32:15.000000', '2023-05-31', 'paid', 1),
(41, '243904-202305', 3, 3, '08:32:15.000000', '2023-05-31', 'paid', 1),
(42, '464821-202305', 1, 2, '08:34:34.000000', '2023-05-31', 'paid', 1),
(43, '464821-202305', 2, 4, '08:34:34.000000', '2023-05-31', 'paid', 1),
(44, '464821-202305', 3, 3, '08:34:34.000000', '2023-05-31', 'paid', 1),
(45, '289216-202305', 1, 2, '02:33:06.000000', '2023-06-01', 'paid', 1),
(46, '289216-202305', 2, 4, '02:33:06.000000', '2023-06-01', 'paid', 1),
(47, '289216-202305', 3, 3, '02:33:06.000000', '2023-06-01', 'paid', 1),
(48, '615194-202306', 1, 2, '02:35:21.000000', '2023-06-01', 'paid', 1),
(49, '615194-202306', 3, 3, '02:35:21.000000', '2023-06-01', 'paid', 1),
(50, '213025-202306', 1, 2, '02:52:49.000000', '2023-06-01', 'paid', 1),
(51, '213025-202306', 3, 3, '02:52:49.000000', '2023-06-01', 'paid', 1),
(52, '570633-202306', 1, 2, '05:42:48.000000', '2023-06-01', 'paid', 1),
(53, '570633-202306', 2, 4, '05:42:48.000000', '2023-06-01', 'paid', 1),
(54, '570633-202306', 3, 3, '05:42:48.000000', '2023-06-01', 'paid', 1),
(55, '373007-202306', 1, 2, '06:00:51.000000', '2023-06-01', 'paid', 1),
(56, '373007-202306', 2, 4, '06:00:51.000000', '2023-06-01', 'paid', 1),
(57, '373007-202306', 3, 3, '06:00:51.000000', '2023-06-01', 'paid', 1),
(58, '207622-202306', 1, 2, '07:47:53.000000', '2023-06-01', 'paid', 1),
(59, '270397-202306', 1, 2, '07:56:28.000000', '2023-06-01', 'paid', 1),
(60, '781154-202306', 1, 2, '08:38:25.000000', '2023-06-01', 'paid', 1),
(61, '513117-202306', 1, 2, '08:45:26.000000', '2023-06-01', 'paid', 1),
(62, '513117-202306', 2, 4, '08:45:26.000000', '2023-06-01', 'paid', 1),
(63, '513117-202306', 3, 3, '08:45:26.000000', '2023-06-01', 'paid', 1),
(70, '144683-202306', 1, 1, '10:26:28.000000', '2023-06-03', 'paid', 1),
(71, '144683-202306', 2, 1, '10:26:28.000000', '2023-06-03', 'paid', 1),
(72, '144683-202306', 3, 1, '10:26:28.000000', '2023-06-03', 'paid', 1),
(73, '816892-202306', 1, 1, '10:27:49.000000', '2023-06-03', 'paid', 1),
(74, '816892-202306', 2, 1, '10:27:49.000000', '2023-06-03', 'paid', 1),
(75, '816892-202306', 3, 1, '10:27:49.000000', '2023-06-03', 'paid', 1),
(76, '458312-202306', 1, 1, '10:28:13.000000', '2023-06-03', 'paid', 1),
(77, '458312-202306', 2, 1, '10:28:13.000000', '2023-06-03', 'paid', 1),
(78, '458312-202306', 3, 1, '10:28:13.000000', '2023-06-03', 'paid', 1),
(79, '281114-202306', 1, 1, '10:31:02.000000', '2023-06-03', 'paid', 1),
(80, '604387-202306', 1, 1, '10:33:04.000000', '2023-06-03', 'paid', 1),
(81, '604387-202306', 2, 1, '10:33:04.000000', '2023-06-03', 'paid', 1),
(82, '604387-202306', 3, 1, '10:33:04.000000', '2023-06-03', 'paid', 1),
(83, '357756-202306', 1, 1, '10:33:37.000000', '2023-06-03', 'paid', 1),
(84, '357756-202306', 2, 1, '10:33:37.000000', '2023-06-03', 'paid', 1),
(85, '237534-202306', 1, 1, '10:34:30.000000', '2023-06-03', 'paid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_prod` int(50) NOT NULL,
  `prodimage` varchar(50) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `prod_category` varchar(50) NOT NULL,
  `stock` int(50) NOT NULL,
  `orig_price` int(50) NOT NULL,
  `profit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_prod`, `prodimage`, `prodname`, `prod_category`, `stock`, `orig_price`, `profit`) VALUES
(1, 'download.jpg', 'bacon cheese burger', 'Category 1', 2, 100, 20),
(2, 'download (1).jpg', 'pepsi', 'Category 2', 2, 10, 8);

-- --------------------------------------------------------

--
-- Table structure for table `reference_no_generator`
--

CREATE TABLE `reference_no_generator` (
  `id_ref_gen` int(50) NOT NULL,
  `no_ref_gen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reference_no_generator`
--

INSERT INTO `reference_no_generator` (`id_ref_gen`, `no_ref_gen`) VALUES
(1, '340766-202306');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `fname`, `lname`, `uname`, `password`, `user_type_id`) VALUES
(1, 'onknown', 'onknown', 'admin', 'admin', 1),
(2, 'lazy', 'carry', 'user69', 'user69', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_type_id` int(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `type`) VALUES
(1, 'administrator'),
(2, 'staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indexes for table `reference_no_generator`
--
ALTER TABLE `reference_no_generator`
  ADD PRIMARY KEY (`id_ref_gen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_prod` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reference_no_generator`
--
ALTER TABLE `reference_no_generator`
  MODIFY `id_ref_gen` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `user_type_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
