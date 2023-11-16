-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 07:16 PM
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
-- Database: `household`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `con_pwd` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `pwd`, `con_pwd`, `created_date`) VALUES
(8, 'EstherHtoo', 'thethhsan@gmail.com', '$2y$10$jbPfdIym2wgqSusOrzTvi..iQb9wqf3AUahrINdebFY1FR737tfJW', '$2y$10$H/gnOtbb1X.xmuHN4yif9OAB8cyd7bhDz8/18VSg7eOdP7CuegP46', '2023-03-31 23:15:08'),
(9, 'ruth', 'ruth@gmail.com', '$2y$10$.Ouz6FAQnCt1yJqnCvL4W.sn8Ni9RLFnZO9pFbZnXaPLtMZQhMIUe', '$2y$10$qZLqtTBtz4cKRjmrsc1W0u0ZykUFHRTHo7LxT6oS5.k2O/QYmJGee', '2023-04-02 03:29:40'),
(10, 'thet', 'thet@gmail.com', '$2y$10$Rl4BBXpgj6/T5PWA1whjWOQIqnBjArmP9fxawJmZmul.O9bb1kpVW', '$2y$10$vWR45wLJrAS4v4OVj7XcXOOUnW54.dce0PgfxioYFxQjqdri3HckO', '2023-04-02 16:25:16'),
(11, 'jame', 'jame@gmail.com', '$2y$10$cxCNuBTOORp9uoPFFLilUOMw3n1HN2SmZa3LTm2MPaGGVz6r914N6', '$2y$10$O7YWBcDSZOn2XA1GA6yZIOkZAH9CCXH586BF.oge/P4H5SNba4gNe', '2023-04-02 16:55:38'),
(12, 'austen', 'austen@gmail.com', '$2y$10$GFhqDoFOSI4FhDmCyATsBu43hiMegiq7s6XXdktewRriH/ZMzlgC.', '$2y$10$K.zjlsAFqEbkDuBtTKj4r.ksyz5I4VneP.9qE1bOAjbqB7afix7bW', '2023-04-02 17:00:10'),
(13, 'joe', 'joe@gmail.com', '$2y$10$ItNQX5NdAHN5Bz6KDsqki./zRO20KBENSgl83gZO1/bOoh1CEiWcC', '$2y$10$e.45yBGjlbtBMyc6i5uan.EEMfWzrYpyoQS8xOeYnmAsfd9Gjhqvq', '2023-04-02 17:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `income` int(11) NOT NULL DEFAULT 0,
  `expense` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `del_flg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `date`, `description`, `income`, `expense`, `user_id`, `created_date`, `del_flg`) VALUES
(125, '2023-04-03', 'salary', 1000000, 0, 8, '2023-04-02 16:05:51', 0),
(126, '2023-04-03', 'ticket', 0, 500000, 8, '2023-04-02 16:06:17', 1),
(127, '2023-04-03', 'shop', 0, 10000, 8, '2023-04-02 16:15:55', 0),
(128, '2023-04-02', 'pocket', 50000, 0, 8, '2023-04-02 16:16:37', 0),
(129, '2023-04-03', 'bill', 0, 50000, 8, '2023-04-02 16:17:14', 0),
(130, '2023-04-02', 'salary', 300000, 0, 9, '2023-04-02 16:22:37', 0),
(131, '2023-04-03', 'shop', 0, 100000, 9, '2023-04-02 16:22:57', 0),
(132, '2023-04-03', 'pocket', 50000, 30000, 9, '2023-04-02 16:23:31', 1),
(133, '2023-04-03', 'shop', 0, 0, 10, '2023-04-02 16:43:14', 1),
(134, '2023-04-03', 'shop', 0, 0, 10, '2023-04-02 16:44:16', 1),
(135, '2023-04-03', 'shop', 50000, 0, 10, '2023-04-02 16:46:14', 1),
(136, '2023-04-01', 'pocket', 50000, 30000, 11, '2023-04-02 16:58:40', 1),
(137, '2023-04-04', 'pocket', 300000, 50000, 12, '2023-04-02 17:05:35', 0),
(138, '2023-04-01', 'bonus', 300000, 0, 13, '2023-04-02 17:08:37', 1),
(139, '2023-04-07', 'bonus', 1000000, 500000, 13, '2023-04-02 17:09:10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
