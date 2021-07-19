-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 02:04 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `login_sample_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hash_id` char(20) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `hash_id`, `name`, `email`, `phone`, `address`, `password`, `date_created`, `time_created`) VALUES
(4, '6041626650976', 'Bello', 'bello7@gmail.com', '08161827253', '15, Abati Street, Agodo egbe,', '$2y$10$Ovny8Q5zIcmRP2fpk55rGut2y/M2Qca6C0qq8Y0Bif1ONfBfiG5yO', '2021-07-19', '07:29:36'),
(5, '8931626651940', 'Afeez Adedayo Bello', 'bellzfeezy@test.com', '08161827253', '15, Abati Street, Agodo egbe,', '$2y$10$E5tKGlqLO2XOC1gX/rezLuuzZJlRxofIyiboMYHyDQZ9AfULcYdD.', '2021-07-19', '07:45:40'),
(6, '2101626652401', 'Afeez Adedayo Bello', 'abegundeprecious@gmail.com', '08161827253', '15, Abati Street, Agodo egbe,', '$2y$10$LMcX0TWjEiMSkXESiV7UouKqpQSKpS9PUtChQ7PqY7HWo/Os8BzM2', '2021-07-19', '07:53:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
