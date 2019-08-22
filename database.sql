-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2019 at 09:24 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `learning_heroes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookies`
--

CREATE TABLE `cookies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `calories` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cookies`
--

INSERT INTO `cookies` (`id`, `name`, `weight`, `calories`) VALUES
(1, 'Oreo', 15, 55),
(2, 'Chocolate chip', 150, 240),
(3, 'Bitterkoekjes', 15, 70),
(4, 'Stroopwafel', 50, 120);

-- --------------------------------------------------------

--
-- Table structure for table `cookie_ingredients`
--

CREATE TABLE `cookie_ingredients` (
  `cookie_id` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cookie_ingredients`
--

INSERT INTO `cookie_ingredients` (`cookie_id`, `ingredient_id`) VALUES
(1, 15),
(1, 14),
(1, 11),
(1, 10),
(1, 7),
(1, 9),
(1, 12),
(1, 6),
(1, 5),
(1, 8),
(1, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 8),
(2, 5),
(2, 24),
(2, 25),
(3, 8),
(3, 11),
(3, 26),
(3, 27),
(4, 5),
(4, 20),
(4, 11),
(4, 13),
(4, 6),
(4, 14),
(4, 16),
(4, 12),
(4, 21),
(4, 23);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `description`) VALUES
(5, 'TARWEBLOEM', ''),
(6, 'Suiker', ''),
(7, 'magere cacaopoeder', ''),
(8, 'TARWEZETMEEL', ''),
(9, 'palmolie', ''),
(10, 'koolzaadolie', ''),
(11, 'glucose-fructosestroop', ''),
(12, 'rijsmiddelen', ''),
(13, 'zout', ''),
(14, 'emulgatoren', ''),
(15, 'aroma', ''),
(16, 'plantaardige olie', ''),
(17, 'cacaoboter', ''),
(18, 'vollemelkpoeder', ''),
(19, 'glucosestroop', ''),
(20, 'roomboter', ''),
(21, 'scharrelei', ''),
(22, 'mageremelkpoeder', ''),
(23, 'kleurstof', ''),
(24, 'natuurlijk vanillearoma', ''),
(25, 'vrije-uitloopei-eiwitpoeder', ''),
(26, 'abrikozenpit', ''),
(27, 'stabilisator', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookies`
--
ALTER TABLE `cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cookie_ingredients`
--
ALTER TABLE `cookie_ingredients`
  ADD KEY `cookie` (`cookie_id`),
  ADD KEY `ingredient` (`ingredient_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookies`
--
ALTER TABLE `cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cookie_ingredients`
--
ALTER TABLE `cookie_ingredients`
  ADD CONSTRAINT `cookie` FOREIGN KEY (`cookie_id`) REFERENCES `cookies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ingredient` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE;
