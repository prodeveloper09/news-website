-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 04:09 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `date&time`) VALUES
(2, 'html', '2023-04-02 10:49:53'),
(3, 'css', '2023-04-02 10:52:09'),
(5, 'c++', '2023-05-05 15:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `image`, `title`, `description`, `category`, `date`, `author`, `date&time`) VALUES
(1, 'pexels-withsonya-12123082.jpg', 'waz', 'গুরুত্বপূর্ণ ইসলামিক বই সমূহের PDF Download Link থাকছে এই Best Islamic Books PDF Bangla Download শীর্ষক আর্টিকেলটিতে। আপনার ইসলামী জ্ঞানভাণ্ডারকে আরও বেশি তথ্য সমৃদ্ধ করতে সবগুলো ইসলামিক বইয়ের PDF Download করে রাখুন একদম ফ্রিতে। আর হ্যাঁ, প্রিয় পাঠক! ইসলামিক বইয়ের পিডিএফ শুধু সংগ্রহ করে রাখলেই হবে না, অবশ্যই সবগুলো ইসলামিক বই পড়ে শেষ করতে হবে এবং সেইসাথে আমলও করতে হবে। তাহলে এবার বেস্ট ইসলামিক বইয়ের PDF Download করুন স্টাডিকরো এর এ জনপ্রিয় ইসলামিক বই সমাহার PDF Download পোস্ট থেকে!', 'html', '5', 'mdimran', '2023-05-05 15:28:17'),
(2, 'pexels-q-hưng-phạm-14854196.jpg', 'jibon ses holei tu soro hoi asol jibon', 'jibon ses holei tu soro hoi asol jibonjibon ses holei tu soro hoi asol jibon', 'html', '06-05-23', 'mdimran', '2023-05-06 14:52:40'),
(6, 'download.jfif', 'আমরা খাবারের স্বাধীনতা চাই', 'আমরা খাবারের স্বাধীনতা চাইআমরা খাবারের স্বাধীনতা চাইআমরা খাবারের স্বাধীনতা চাইআমরা খাবারের স্বাধীনতা চাইআমরা খাবারের স্বাধীনতা চাইআমরা খাবারের স্বাধীনতা চাইআমরা খাবারের স্বাধীনতা চাইআমরা খাবারের স্বাধীনতা চাই', 'c++', '12-05-23', 'mdimran', '2023-05-12 10:10:16'),
(7, 'pexels-gernot-brauchle-15200786.jpg', 'স্বাধীনতা দিয়ে লাভ কী যদি খাবার না পাই', 'স্বাধীনতা দিয়ে লাভ কী যদি খাবার না পাইস্বাধীনতা দিয়ে লাভ কী যদি খাবার না পাইস্বাধীনতা দিয়ে লাভ কী যদি খাবার না পাইস্বাধীনতা দিয়ে লাভ কী যদি খাবার না পাইস্বাধীনতা দিয়ে লাভ কী যদি খাবার না পাইস্বাধীনতা দিয়ে লাভ কী যদি খাবার না পাই', 'css', '12-05-23', 'mdimran', '2023-05-12 10:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `date&time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `username`, `pass`, `role`, `date&time`) VALUES
(1, 'md', 'imran900', 'mdimran', 'ddd', '1', '2023-03-31 08:17:34'),
(2, 'md', 'imran', 'mdimrand', 'ddddd', '1', '2023-03-31 08:27:18'),
(3, 'dddd', 'pagol', 'ssssdd', 'ssss', '1', '2023-03-31 09:36:17'),
(7, 'md', 'hossain', 'hossain', '12345', '0', '2023-05-06 15:20:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
