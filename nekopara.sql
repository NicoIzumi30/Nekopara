-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 08:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nekopara`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id_category` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id_category`, `name`, `date_create`, `active`) VALUES
(5, 'Neko', '2022-07-28 13:41:47', '1'),
(6, 'Mobil', '2022-07-28 17:35:23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` text NOT NULL,
  `active` varchar(255) NOT NULL DEFAULT '1',
  `id_category` int(10) NOT NULL,
  `id_suppliers` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name`, `image`, `date_create`, `description`, `active`, `id_category`, `id_suppliers`) VALUES
(12, 'Kucing Persia', 'download_(3).jpg', '2022-07-28 15:33:05', 'Kucing Persia adalah jenis kucing berbulu panjang yang dicirikan oleh wajahnya yang bulat dan moncongnya yang pendek. Ia juga dikenal sebagai \"Rambut Panjang Persia\" di negara-negara berbahasa Inggris.', '1', 5, 2),
(13, 'Kucing Himalaya', 'download_(5).jpg', '2022-07-28 15:34:08', 'Kucing himalaya atau kucing persia himalaya adalah salah satu ras kucing domestik yang merupakan hasil persilangan antara kucing persia dengan kucing siam.', '1', 5, 2),
(14, 'Mobil Bambu', 'bamboo_taxi_car1_td4mg_244293.jpg', '2022-07-28 17:35:14', 'Mobil masa depan yang akan melampaui tesla', '1', 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id_suppliers` int(10) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id_suppliers`, `supplier_name`, `address`, `phone`) VALUES
(2, 'Heru Kristanto', 'Bakungan, Plumutan, Mulyodadi, Bambanglipro, Bantul', '62859126462972'),
(4, 'Jalu Erlangga', 'Pajangan,Bantul,Yogyakarta', '6289514511080'),
(5, 'Nico', '68 Fukakusa Yabunouchicho, Fushimi Ward, Kyoto, 612-0882, Jepang', '6285703073753');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id_suppliers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id_category` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id_suppliers` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
