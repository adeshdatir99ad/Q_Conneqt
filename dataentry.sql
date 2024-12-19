-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 08:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataentry`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Process` varchar(50) NOT NULL,
  `Mode` varchar(10) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `Corp Quality SPOC` varchar(30) NOT NULL,
  `Process Status` varchar(10) NOT NULL,
  `Industry Segment` varchar(20) NOT NULL,
  `Business Type` varchar(20) NOT NULL,
  `Services Offered` varchar(30) NOT NULL,
  `BusinessHead` varchar(30) NOT NULL,
  `Account Head` varchar(30) NOT NULL,
  `Project Manager` varchar(30) NOT NULL,
  `Location Spoc` varchar(30) NOT NULL,
  `Client Name` varchar(30) NOT NULL,
  `Process Name` varchar(30) NOT NULL,
  `Operating Location's` varchar(30) NOT NULL,
  `Financial Implications` varchar(30) NOT NULL,
  `What are the financial implication parameters followed or not` varchar(30) NOT NULL,
  `Billable Head Count` varchar(30) NOT NULL,
  `Cost Code` varchar(20) NOT NULL,
  `Billing Model` varchar(30) NOT NULL,
  `Business Started Date` varchar(10) NOT NULL,
  `Business BAU Date` varchar(10) NOT NULL,
  `Business End Date` varchar(10) NOT NULL,
  `CBSL - SLA Monitoring` varchar(30) NOT NULL,
  `CLIENT - SLA Monitoring` varchar(30) NOT NULL,
  `CBSL - System / Application` varchar(30) NOT NULL,
  `Client - System / Application` varchar(30) NOT NULL,
  `Transition Audit` varchar(10) NOT NULL,
  `Internal Audit (ISO & ISMS)` varchar(30) NOT NULL,
  `External Audit (ISO & ISMS)` varchar(30) NOT NULL,
  `Client Audit` varchar(30) NOT NULL,
  `SOP/Process Manuals` varchar(30) NOT NULL,
  `Resource Plan` varchar(30) NOT NULL,
  `Training Plan` varchar(30) NOT NULL,
  `Quality Plan` varchar(30) NOT NULL,
  `Target Plan` varchar(30) NOT NULL,
  `MIS Reporting` varchar(30) NOT NULL,
  `Risk Management (FMEA)` varchar(30) NOT NULL,
  `Customer First` varchar(30) NOT NULL,
  `Eureka` varchar(30) NOT NULL,
  `Escalation Matrix` varchar(30) NOT NULL,
  `Master List` varchar(30) NOT NULL,
  `Employee PM (Productivity)` varchar(30) NOT NULL,
  `MBR (Internal)` varchar(30) NOT NULL,
  `QBR (Internal)` varchar(30) NOT NULL,
  `MBR (External)` varchar(30) NOT NULL,
  `QBR (External)` varchar(30) NOT NULL,
  `MOM Documentation` varchar(30) NOT NULL,
  `Annual VOC` varchar(30) NOT NULL,
  `VOC Action Plan` varchar(30) NOT NULL,
  `Mandatory L&D Training Programs` varchar(30) NOT NULL,
  `Improvement Project` varchar(30) NOT NULL,
  `Created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `name`, `Email`, `Process`, `Mode`, `Designation`, `Corp Quality SPOC`, `Process Status`, `Industry Segment`, `Business Type`, `Services Offered`, `BusinessHead`, `Account Head`, `Project Manager`, `Location Spoc`, `Client Name`, `Process Name`, `Operating Location's`, `Financial Implications`, `What are the financial implication parameters followed or not`, `Billable Head Count`, `Cost Code`, `Billing Model`, `Business Started Date`, `Business BAU Date`, `Business End Date`, `CBSL - SLA Monitoring`, `CLIENT - SLA Monitoring`, `CBSL - System / Application`, `Client - System / Application`, `Transition Audit`, `Internal Audit (ISO & ISMS)`, `External Audit (ISO & ISMS)`, `Client Audit`, `SOP/Process Manuals`, `Resource Plan`, `Training Plan`, `Quality Plan`, `Target Plan`, `MIS Reporting`, `Risk Management (FMEA)`, `Customer First`, `Eureka`, `Escalation Matrix`, `Master List`, `Employee PM (Productivity)`, `MBR (Internal)`, `QBR (Internal)`, `MBR (External)`, `QBR (External)`, `MOM Documentation`, `Annual VOC`, `VOC Action Plan`, `Mandatory L&D Training Programs`, `Improvement Project`, `Created`) VALUES
(1, 'Anand Datir', 'anand@gmail.com', 'ABC Process', 'WFH', 'Manager', 'Good', 'Disable', 'E-COMMERCE', 'DOMESTIC', 'VOICE SERVICES', 'Tilak', 'Anand', 'Ansh', 'Pune', 'Bittu', 'IT', 'Pune', 'N', 'NOT', '12', '56BK', 'BCF', '2024-12-12', '2024-12-14', '2024-12-19', 'Product Level and Quality', 'Service Level and Quality', 'N', 'NA', 'N', 'Y', 'N', 'N', 'Y', 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', 'Y', 'N', '2024-12-04 14:52:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
