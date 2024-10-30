-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql109.ezyro.com
-- Generation Time: Oct 30, 2024 at 09:38 AM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pims`
--

-- --------------------------------------------------------

--
-- Table structure for table `addnewstaff`
--

CREATE TABLE `addnewstaff` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addnewstaff`
--

INSERT INTO `addnewstaff` (`id`, `Name`, `Lastname`, `username`, `password`) VALUES
(1, 'Africa', 'Jatakalula', 'africa', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `age`, `gender`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Samule ', 25, 'male', '3880 Nkulumane 5', '2024-10-23 08:24:26', '2024-10-23 08:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `Supplier_name` varchar(100) NOT NULL,
  `Refference_No` varchar(50) NOT NULL,
  `product` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Total_purchased` decimal(10,2) NOT NULL,
  `Date_purchased` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Delivery_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Expiry_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Receive_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `Supplier_name`, `Refference_No`, `product`, `quantity`, `Total_purchased`, `Date_purchased`, `Delivery_date`, `Expiry_Date`, `Receive_by`, `created_at`, `updated_at`) VALUES
(1, 'Pharma corp', '121445552', 'amoxcilin', 500, '250.00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2024-11-23 08:00:00', 'Africa', '2024-10-23 10:44:49', '2024-10-23 10:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_mngr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `first_name`, `last_name`, `username`, `password_mngr`) VALUES
(1, 'Admin', 'Admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `medicinecategories`
--

CREATE TABLE `medicinecategories` (
  `id` int(11) NOT NULL,
  `Medicine_Category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicinecategories`
--

INSERT INTO `medicinecategories` (`id`, `Medicine_Category`) VALUES
(1, 'Helloe');

-- --------------------------------------------------------

--
-- Table structure for table `medicinelist`
--

CREATE TABLE `medicinelist` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `med_name` varchar(100) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `categories` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantitypcs` int(11) NOT NULL,
  `exp_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `prescription` enum('yes','no') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicinelist`
--

INSERT INTO `medicinelist` (`id`, `product_id`, `med_name`, `Unit`, `type`, `categories`, `price`, `quantitypcs`, `exp_date`, `description`, `prescription`, `created_at`) VALUES
(1, '1242', 'amoxcilin', '50', 'headache', 'Helloe', '0.50', 25, '2024-10-31', 'Helloe', '', '2024-10-23 09:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `medicinetype`
--

CREATE TABLE `medicinetype` (
  `id` int(11) NOT NULL,
  `MedicineType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicinetype`
--

INSERT INTO `medicinetype` (`id`, `MedicineType`) VALUES
(1, 'headache');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `Customer` varchar(100) NOT NULL,
  `Product` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `Staff_incharge` varchar(100) NOT NULL,
  `Date_purchased` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `Customer`, `Product`, `quantity`, `total`, `Staff_incharge`, `Date_purchased`, `created_at`, `updated_at`) VALUES
(1, 'Samule ', 'amoxcilin', 20, '10.00', 'Africa', '0000-00-00 00:00:00', '2024-10-23 10:14:42', '2024-10-23 10:14:42'),
(2, 'Samule ', 'amoxcilin', 2, '1.00', 'Africa', '2024-10-23 10:42:00', '2024-10-23 10:42:00', '2024-10-23 10:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `contact`, `address`) VALUES
(1, 'Pharma corp', '945454728', '#207 No big. Maligaaya manila Philipines'),
(2, 'Unilab Corp.', '967342345', 'Brgy. di Magiba');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `password`, `email`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$I.gF8coFLLQV2fuTAbtKWu.JrQlRXW1zJ5FuDVpWrfNFhMC68.Ojy', 'admin@gmail.com', '2024-10-26 17:39:13'),
(2, 'africa', 'Africa', 'Freedom', '$2y$10$I.gF8coFLLQV2fuTAbtKWu.JrQlRXW1zJ5FuDVpWrfNFhMC68.Ojy', 'africa@gmail.com', '2024-10-26 18:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addnewstaff`
--
ALTER TABLE `addnewstaff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `medicinecategories`
--
ALTER TABLE `medicinecategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Medicine_Category` (`Medicine_Category`);

--
-- Indexes for table `medicinelist`
--
ALTER TABLE `medicinelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicinetype`
--
ALTER TABLE `medicinetype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MedicineType` (`MedicineType`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addnewstaff`
--
ALTER TABLE `addnewstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicinecategories`
--
ALTER TABLE `medicinecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicinelist`
--
ALTER TABLE `medicinelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicinetype`
--
ALTER TABLE `medicinetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
