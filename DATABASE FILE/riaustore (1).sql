-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 05:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riaustore`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dash`
--

CREATE TABLE `dash` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` bigint(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prodi` int(11) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `no_hp` bigint(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dash`
--

INSERT INTO `dash` (`id`, `nama`, `nim`, `jenis_kelamin`, `email`, `prodi`, `asal_sekolah`, `no_hp`, `alamat`) VALUES
(37, 'Ardiyant', 1657301049, 'Laki-laki', 'ardiyanto@alumni.pcr.ac.id', 18, 'MAN ', 55, 'Rumbai'),
(38, 'Freddy Fazzbear', 1757301037, 'Laki-laki', 'uunsi@alumni.pcr.ac.id', 18, 'SMKN 1 Sumbar', 2245345, 'Umban Sari'),
(39, 'OREO', 2255301166, 'Laki-laki', 'OEREO22TI@MAHSSIWA.PCR.AC.ID', 18, 'SMKS YPPI TUALANG', 809, 'Rumah'),
(40, 'insane people', 35645645747, 'Laki-laki', 'renolzdong@gmail.com', 18, 'Hutan', 85464565756, 'rumbai'),
(43, 'makhluks', 1518515, 'Laki-laki', 'makhluk@gmail.com', 18, 'Disana', 8, 'disana');

-- --------------------------------------------------------

--
-- Table structure for table `formd`
--

CREATE TABLE `formd` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `gambar_ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formd`
--

INSERT INTO `formd` (`id`, `nama_lengkap`, `tanggal`, `jenis_kelamin`, `email`, `username`, `gambar`, `gambar_ktp`) VALUES
(2, 'Polinotoka', '3222-08-12', 'Laki-laki', 'a@example.com', 'poligustov', 'default_ktp1.jpg', 'default_pet1.jpg'),
(3, 'weminu', '2023-02-02', 'perempuan', 'ardiyanto@alumni.pcr.ac.id', 'user', 'default_ktp2.jpg', 'hutao1.png'),
(4, 'kuntilinigg', '1000-10-08', 'Laki-laki', 'dosen@gmail.com', 'capybara', 'default_ktp3.jpg', 'hutao2.png'),
(6, 'anjay', '0999-12-07', 'Laki-laki', 'erick@gmail.com', 'bobby', 'alhaitam1.png', 'hutao21.png'),
(7, 'Polinotoka', '2007-03-11', 'perempuan', 'q@q', 'poligustov', 'default_pet11.jpg', 'default_ktp31.jpg'),
(8, 'Hermit Kernividulcth Tovish', '2020-08-10', 'perempuan', 'Hermit@gmail.com', 'Ann', 'default_pet2.jpg', 'default_ktp4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` float NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `action`) VALUES
(1, 11, 14, 1, 0, ''),
(2, 11, 14, 2, 0, ''),
(3, 11, 14, 3, 0, ''),
(4, 11, 15, 4, 350000, ''),
(5, 11, 16, 5, 90000, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `product_image`) VALUES
(1, 4, 4, 'Cedea Fish Dumpling Cheese', 350000, 1, 'foto4.jpg'),
(2, 5, 3, 'Cedea Ikan Olahan ', 30000, 3, 'foto3.jpg'),
(3, 6, 5, 'Duo Twister Ikan Olahan', 45000, 3, 'foto515.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_type`, `action`) VALUES
(1, 'ssl', ''),
(2, 'ssl', ''),
(3, 'ssl', ''),
(4, 'ssl', ''),
(5, 'ssl', ''),
(6, 'ssl', '');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(11) NOT NULL,
  `prodi` varchar(200) NOT NULL,
  `ruangan` varchar(30) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `akreditasi` varchar(15) NOT NULL,
  `nama_kaprodi` varchar(255) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `output_lulusan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `prodi`, `ruangan`, `jurusan`, `akreditasi`, `nama_kaprodi`, `tahun_berdiri`, `output_lulusan`, `gambar`) VALUES
(18, 'Teknik Informatika', '327', 'JTI', 'A', 'Kartina Diah Kesuma Wardhani, S.T., M,T,', 2008, 'Multimedi', 'default.jpg'),
(19, 'Kedkteran', '2', 'JTI', 'A', 'p', 2008, 'Business', 'default.jpg'),
(20, 'Teknik Mesin', 'Surga', 'kedokteran gigi', 'A', 'Agnessss', 2050, 'Kedokteran gigi', 'default.jpg'),
(23, 'o', '328', 'JTI', 'A', 'p', 2002, 'Multimedi', 'default1.jpg'),
(24, 'Teknik Rekayasa Komputer', '318', 'JTI', 'A', 'Dr. Eng. Yoanda Alim Syahbana, S.T., M.Sc', 2008, 'IOT', 'trk1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` bigint(30) NOT NULL,
  `product_feature` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_description`, `product_image`, `product_price`, `product_quantity`, `product_feature`, `created_at`) VALUES
(1, 'Crispy Chicken bellfoods', 'Ayam Goreng Renyah (Crispy Chicken), bellfoods', 'foto1.jpg', 450000, 30, 1, '2023-12-26 09:50:52'),
(2, 'Bakso Udang Shifudo\r\n', 'Shifudo, Bakso Udang Beku', 'foto2.jpg', 50000, 25, 1, '2023-12-26 09:50:52'),
(3, 'Cedea Ikan Olahan ', 'Ikan Olahan Cedea (Flower Twister)', 'foto3.jpg', 30000, 45, 1, '2023-12-26 09:50:52'),
(4, 'Cedea Fish Dumpling Cheese', 'Cedea Fish Dumpling Cheese, Dumpling Ikan dengan isi Keju', 'foto4.jpg', 350000, 35, 1, '2023-12-26 09:50:52'),
(5, 'Duo Twister Ikan Olahan', 'i', 'foto515.jpg', 45000, 50, 0, '2023-12-27 12:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `customer_id`, `shipping_name`, `shipping_email`, `shipping_address`, `shipping_phone`) VALUES
(9, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(10, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(11, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(12, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(13, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(14, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(15, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123'),
(16, 0, 'Polygon', 'polipo@gmail.com', 'polypon', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `gambar`, `role`, `date_created`) VALUES
(2, 'a', 'a@gmail.com', 'a', 'default.jpg', 'User', 10102023),
(4, 'Hermit', 'Hermit@gmail.com', '$2y$10$lUrlghih5pq.eH49QS/QE.ceX6gUxJHtMIv99sfcLuD8y5pRQZSuq', 'default.jpg', 'Admin', 1697300489),
(5, 'qwq', 'wqw@gmail.com', '$2y$10$lZE8aL.0Bu0J2vomD1Ob7u7R3fsqRUUpfXmZQHBmN4CfoPNXwHNSW', 'default.jpg', 'User', 1697301376),
(7, 'Admin', 'admin@gmail.com', '$2y$10$t9G8YpgRSAnt/mLCWg69.OWBeHj9dEkmEpH6YLkXh6WC5u.AhWloO', 'default.jpg', 'Admin', 1697343276),
(8, 'ReynK', 'reyn@gmail.com', '$2y$10$VSMPySF9AA2wPXz4eCvH4.GUpOUtGRh5l9tbWAxDEcvozcAoCVvey', 'default.jpg', 'User', 1697343322),
(9, 'yoku', 'yokult@gmail.com', '$2y$10$IB8FOqAXmn9KNeiVQ101AeZHlTSIvC7nyHV4pFMhLKaF9t2GrFMbe', 'default.jpg', 'User', 1702958809),
(10, 'customer', 'customer@gmail.com', '$2y$10$G.dO02t1VmN706qn9M/KMOHSvR0nEl4J0Aw82VnKC01BLwbURvula', 'default.jpg', 'User', 1702986005),
(11, 'customer1', 'customer1@gmail.com', '$2y$10$C45Bm57xrOuWCCtYVTefpuh4bg.JkRsdGSlLDLcM8zmnLcv/lrjl2', 'default.jpg', 'User', 1702986052);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `dash`
--
ALTER TABLE `dash`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodi` (`prodi`);

--
-- Indexes for table `formd`
--
ALTER TABLE `formd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `cust` (`customer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dash`
--
ALTER TABLE `dash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `formd`
--
ALTER TABLE `formd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dash`
--
ALTER TABLE `dash`
  ADD CONSTRAINT `prodi` FOREIGN KEY (`prodi`) REFERENCES `prodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
