-- phpMyAdmin SQL Dump

-- version 5.0.2

-- https://www.phpmyadmin.net/

--

-- Host: 127.0.0.1:3306

-- Generation Time: Feb 26, 2022 at 02:08 PM

-- Server version: 5.7.31

-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Database: `specialist_sys`

--

-- --------------------------------------------------------

--

-- Table structure for table `admin`

--

DROP TABLE IF EXISTS `admin`;

CREATE TABLE
    IF NOT EXISTS `admin` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `ailment`

--

DROP TABLE IF EXISTS `ailment`;

CREATE TABLE
    IF NOT EXISTS `ailment` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `patient_id` int(11) DEFAULT NULL,
        `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
        `specialization_id` int(11) DEFAULT NULL,
        `specialist_id` int(11) DEFAULT NULL,
        `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `patient_id` (`patient_id`),
        KEY `specialization_id` (`specialization_id`),
        KEY `specialist_id` (`specialist_id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `appointment`

--

DROP TABLE IF EXISTS `appointment`;

CREATE TABLE
    IF NOT EXISTS `appointment` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `ailment_id` int(11) NOT NULL,
        `date` date NOT NULL,
        `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `ailment_id` (`ailment_id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `login`

--

DROP TABLE IF EXISTS `login`;

CREATE TABLE
    IF NOT EXISTS `login` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `rank` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `admin_id` int(11) DEFAULT NULL,
        `patient_id` int(11) DEFAULT NULL,
        `specialist_id` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `admin_id` (`admin_id`),
        KEY `patient_id` (`patient_id`),
        KEY `specialist_id` (`specialist_id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `patient`

--

DROP TABLE IF EXISTS `patient`;

CREATE TABLE
    IF NOT EXISTS `patient` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `dob` date NOT NULL,
        `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `specialist`

--

DROP TABLE IF EXISTS `specialist`;

CREATE TABLE
    IF NOT EXISTS `specialist` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `specialization_id` int(11) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--

-- Table structure for table `specialization`

--

DROP TABLE IF EXISTS `specialization`;

CREATE TABLE
    IF NOT EXISTS `specialization` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
        `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--

-- Constraints for dumped tables

--

--

-- Constraints for table `ailment`

--

ALTER TABLE `ailment`
ADD
    CONSTRAINT `ailment_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE
SET NULL ON UPDATE CASCADE,
ADD
    CONSTRAINT `ailment_ibfk_2` FOREIGN KEY (`specialization_id`) REFERENCES `specialization` (`id`) ON DELETE
SET NULL ON UPDATE CASCADE,
ADD
    CONSTRAINT `ailment_ibfk_3` FOREIGN KEY (`specialist_id`) REFERENCES `specialist` (`id`) ON DELETE
SET NULL ON UPDATE CASCADE;

--

-- Constraints for table `appointment`

--

ALTER TABLE `appointment`
ADD
    CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`ailment_id`) REFERENCES `ailment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--

-- Constraints for table `login`

--

ALTER TABLE `login`
ADD
    CONSTRAINT `login_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
    CONSTRAINT `login_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD
    CONSTRAINT `login_ibfk_3` FOREIGN KEY (`specialist_id`) REFERENCES `specialist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;