-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 01:44 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addnewstaff`
--

INSERT INTO `addnewstaff` (`id`, `Name`, `Lastname`, `username`, `password`) VALUES
(1, 'Africa', 'Jatakalula', 'africa', 'ca27105169ce49882f4d13d02a48ac06');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Date_purchased` date NOT NULL,
  `Delivery_date` date NOT NULL,
  `Expiry_Date` date NOT NULL,
  `Receive_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `Supplier_name`, `Refference_No`, `product`, `quantity`, `Total_purchased`, `Date_purchased`, `Delivery_date`, `Expiry_Date`, `Receive_by`, `created_at`, `updated_at`) VALUES
(1, 'Pharma corp', '121445552', 'amoxcilin', 500, '250.00', '0000-00-00', '0000-00-00', '2024-11-23', 'Africa', '2024-10-23 10:44:49', '2024-10-23 10:44:49');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `Customer`, `Product`, `quantity`, `total`, `Staff_incharge`, `Date_purchased`, `created_at`, `updated_at`) VALUES
(1, 'Samule ', 'amoxcilin', 20, '10.00', 'Africa', '0000-00-00 00:00:00', '2024-10-23 10:14:42', '2024-10-23 10:14:42'),
(2, 'Samule ', 'amoxcilin', 2, '1.00', 'Africa', '2024-10-23 10:42:00', '2024-10-23 10:42:00', '2024-10-23 10:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `contact`, `address`) VALUES
(1, 'Pharma corp', '945454728', '#207 No big. Maligaaya manila Philipines'),
(2, 'Unilab Corp.', '967342345', 'Brgy. di Magiba');

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
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
