-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 11:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admintable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'saurabhcoded@gmail.com', '583c7ecb163a42d3ea00989a2807ff2fefe0769a3acf72d2d48905009ef7385e', '2023-02-21 21:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `heading` text NOT NULL,
  `content` longtext NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `updated_at` text NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `company_name` text NOT NULL,
  `email` varchar(400) NOT NULL,
  `email2` varchar(400) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `contact2` text NOT NULL,
  `whatsapp` text NOT NULL,
  `address` text NOT NULL,
  `gmap_link` text NOT NULL,
  `gmap_iframe` text NOT NULL,
  `fb` text NOT NULL,
  `ig` text NOT NULL,
  `tweet` text NOT NULL,
  `lkd` text NOT NULL,
  `ytb` text NOT NULL,
  `about` text NOT NULL,
  `calltoaction` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` text NOT NULL,
  `email` varchar(300) NOT NULL,
  `service` text NOT NULL,
  `message` text NOT NULL,
  `page` varchar(300) NOT NULL,
  `created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(400) NOT NULL,
  `alt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pincode`
--

CREATE TABLE `pincode` (
  `PostOfficeName` varchar(100) DEFAULT NULL,
  `Pincode` double DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `District` varchar(100) DEFAULT NULL,
  `State` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `identifier` text NOT NULL,
  `value` longtext NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `identifier`, `value`, `created_at`, `updated_at`) VALUES
(5, 'homeschema', '', '23rd February 2023 08:14 PM', '23rd February 2023 08:19 PM'),
(6, 'homemetakeyword', '', '23rd February 2023 08:15 PM', ''),
(7, 'homemetadescription', '', '23rd February 2023 08:16 PM', ''),
(8, 'og-title', '', '23rd February 2023 08:17 PM', ''),
(9, 'og-description', '', '23rd February 2023 08:18 PM', ''),
(10, 'og-image', '', '23rd February 2023 08:19 PM', ''),
(11, 'og-url', '', '23rd February 2023 08:38 PM', ''),
(12, 'og-type', '', '23rd February 2023 08:38 PM', ''),
(13, 'twitter-card', '', '23rd February 2023 08:39 PM', ''),
(14, 'twitter-title', '', '23rd February 2023 08:39 PM', ''),
(15, 'twitter-description', '', '23rd February 2023 08:39 PM', ''),
(16, 'twitter-image', '', '23rd February 2023 08:40 PM', ''),
(17, 'twitter-url', '', '23rd February 2023 08:40 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `background_img` varchar(300) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `heading` text NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `rating` int(11) NOT NULL,
  `img` varchar(300) NOT NULL,
  `created_at` text NOT NULL,
  `updated_at` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
