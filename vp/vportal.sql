-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2017 at 02:34 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `a1_village`
--

CREATE TABLE `a1_village` (
  `VILLAGEID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `NAME_` varchar(100) NOT NULL,
  `PIC` varchar(50) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a1_village`
--

INSERT INTO `a1_village` (`VILLAGEID`, `USERNAME`, `NAME_`, `PIC`, `STATUS`, `DATE_`) VALUES
(16, 'user', 'Mukhani', '', 0, '2017-02-25 10:37:53'),
(17, 'user', 'Choti Mukhani', '', 1, '2017-01-28 05:01:11'),
(18, 'user1', 'Badi Mukhani', '', 1, '2017-01-28 05:01:27'),
(19, 'user', 'nagle', '', 1, '2017-02-09 10:29:40'),
(20, 'user', 'shantipuri', '', 1, '2017-02-09 10:34:31'),
(21, 'user', 'bobb', '', 1, '2017-02-09 10:35:07'),
(22, 'user', 'mukhan', '', 1, '2017-02-09 10:36:09'),
(24, 'nitin', 'nagla', 'village_24.jpg', 0, '2017-02-25 10:47:37'),
(25, 'user', 'mukhani2', '', 1, '2017-02-24 06:44:35'),
(26, 'user', 'Mukhani3', '', 1, '2017-02-24 07:02:20'),
(27, 'user', 'Nagle', '', 1, '2017-03-01 07:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `a2_pension_pensioner_detail`
--

CREATE TABLE `a2_pension_pensioner_detail` (
  `PDETID` int(11) NOT NULL,
  `PTID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `NAME_` varchar(100) NOT NULL,
  `FATHER_HUSBAND_NAME_` varchar(100) NOT NULL,
  `FH_TYPE` varchar(20) NOT NULL,
  `CAST_` varchar(25) NOT NULL,
  `DOB_AGE` varchar(25) NOT NULL,
  `PENSION_NUMBER` varchar(10) NOT NULL,
  `APPROVAL_DATE` varchar(25) NOT NULL,
  `AMOUNT` varchar(20) NOT NULL,
  `POST_AT_THE_TIME_OF_RETIREMENT` varchar(30) NOT NULL,
  `DEPARTMENT` varchar(30) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DESC_` text NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a2_pension_pensioner_detail`
--

INSERT INTO `a2_pension_pensioner_detail` (`PDETID`, `PTID`, `VILLAGEID`, `NAME_`, `FATHER_HUSBAND_NAME_`, `FH_TYPE`, `CAST_`, `DOB_AGE`, `PENSION_NUMBER`, `APPROVAL_DATE`, `AMOUNT`, `POST_AT_THE_TIME_OF_RETIREMENT`, `DEPARTMENT`, `STATUS`, `DESC_`, `DATE_`) VALUES
(11, 17, 16, 'sunita mathur', 'asd', 'HUSBAND', 'ASD', 'SAD', '1234-123', 'sad', '2000', 'asd', 'ASD', 1, 'x', '2017-02-04 05:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `a2_pension_pension_type`
--

CREATE TABLE `a2_pension_pension_type` (
  `PTID` int(11) NOT NULL,
  `PENSION_TYPE_NAME` varchar(100) NOT NULL COMMENT 'disabled/freedom fighter/ state freedom fighter/ exservice men/ widow/ old age/ civil',
  `STATUS` tinyint(1) NOT NULL,
  `DESC_` text NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a2_pension_pension_type`
--

INSERT INTO `a2_pension_pension_type` (`PTID`, `PENSION_TYPE_NAME`, `STATUS`, `DESC_`, `USERNAME`, `DATE_`) VALUES
(12, 'FREEDOM FIGHTERS PENSION', 1, 'x', 'user', '2017-02-03 11:08:43'),
(13, 'STATE FREEDOM FIGHTERS PENSION', 1, 'x', 'user', '2017-02-03 11:05:24'),
(14, 'EX SERVICEMEN PENSION', 1, 'x', 'user', '2017-02-03 11:05:24'),
(15, 'WIDOW PENSION', 1, 'x', 'user', '2017-02-03 11:05:24'),
(16, 'OLD AGE PENSION', 1, 'x', 'user', '2017-02-03 11:05:24'),
(17, 'CIVIL PENSION', 1, 'x', 'user', '2017-02-03 11:05:24'),
(18, 'DISABLED PENSION', 1, 'x', 'user', '2017-02-03 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `a3_tourism_tourism_activity_type`
--

CREATE TABLE `a3_tourism_tourism_activity_type` (
  `TATID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `ACTIVITY_NAME_` varchar(100) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a3_tourism_tourism_activity_type`
--

INSERT INTO `a3_tourism_tourism_activity_type` (`TATID`, `VILLAGEID`, `ACTIVITY_NAME_`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(2, 16, 'Paragliding', 1, '2017-02-05 07:26:15', 'user'),
(3, 16, 'Trekking', 1, '2017-02-05 07:29:34', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a3_tourism_tourist_places`
--

CREATE TABLE `a3_tourism_tourist_places` (
  `TPID` int(11) NOT NULL,
  `TPTID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `TOURIST_PLACE` varchar(100) NOT NULL,
  `PIC` varchar(50) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a3_tourism_tourist_places`
--

INSERT INTO `a3_tourism_tourist_places` (`TPID`, `TPTID`, `VILLAGEID`, `TOURIST_PLACE`, `PIC`, `USERNAME`, `STATUS`, `DATE_`) VALUES
(2, 1, 16, 'Bel Baba', 'x', 'user', 1, '2017-02-09 10:31:31'),
(3, 2, 16, 'Naini Jheel', 'x', 'user', 1, '2017-02-09 06:06:11'),
(4, 3, 16, 'book', 'tourplace_4.jpg', 'user', 1, '2017-02-09 06:18:21'),
(5, 1, 24, 'cvb', 'x', 'nitin', 1, '2017-02-21 23:38:28'),
(6, 1, 27, 'Shiv Mandir', 'x', 'user', 1, '2017-03-01 02:50:12'),
(7, 1, 27, 'Shiv Mandir', 'x', 'user', 1, '2017-03-01 02:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `a3_tourism_tourist_places_type`
--

CREATE TABLE `a3_tourism_tourist_places_type` (
  `TPTID` int(11) NOT NULL,
  `TOURIST_PLACE_TYPE` varchar(150) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a3_tourism_tourist_places_type`
--

INSERT INTO `a3_tourism_tourist_places_type` (`TPTID`, `TOURIST_PLACE_TYPE`, `STATUS`) VALUES
(1, 'MANDIR', 1),
(2, 'LAKES', 1),
(3, 'HIMALAYA DARSHAN', 1),
(4, 'Other', 1);

-- --------------------------------------------------------

--
-- Table structure for table `a4_homeless_people`
--

CREATE TABLE `a4_homeless_people` (
  `HMLPPLID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `NAME_` varchar(100) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `a4_local_mela`
--

CREATE TABLE `a4_local_mela` (
  `LOCALMELAID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `MELA_NAME` varchar(200) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a4_local_mela`
--

INSERT INTO `a4_local_mela` (`LOCALMELAID`, `VILLAGEID`, `MELA_NAME`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(2, 16, 'Kisan Mela', 1, '2017-02-05 07:34:25', 'user'),
(3, 24, 'asasas', 1, '2017-02-24 04:26:30', 'nitin'),
(4, 19, 'sss', 1, '2017-02-24 04:31:40', 'nitin'),
(5, 19, 'asasdasdas', 1, '2017-02-24 04:31:53', 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `a4_nearest_town`
--

CREATE TABLE `a4_nearest_town` (
  `NEARESTTOWNID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `NAME_` varchar(100) NOT NULL,
  `DISTANCE_FROM_VILLAGE` varchar(25) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a4_nearest_town`
--

INSERT INTO `a4_nearest_town` (`NEARESTTOWNID`, `VILLAGEID`, `NAME_`, `DISTANCE_FROM_VILLAGE`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(2, 16, 'Bhimtal', '30km', 1, '2017-02-06 08:28:35', 'user'),
(3, 25, 'abc', '34', 1, '2017-03-01 03:22:28', 'user'),
(4, 25, 'abc', '23', 1, '2017-03-01 03:22:39', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a5_school_higher_education_college`
--

CREATE TABLE `a5_school_higher_education_college` (
  `SCHID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `COLLEGE_NAME` varchar(150) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a5_school_higher_education_college`
--

INSERT INTO `a5_school_higher_education_college` (`SCHID`, `VILLAGEID`, `COLLEGE_NAME`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(1, 17, 'M.B.P.G College, Haldwani', 1, '2017-02-03 05:44:55', 'user'),
(2, 17, 'DSB College', 1, '2017-02-03 06:21:05', 'user'),
(4, 16, 'M B P G College, haldwani', 1, '2017-02-05 02:17:10', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a5_school_higher_education_university`
--

CREATE TABLE `a5_school_higher_education_university` (
  `SCHID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `UNIV_NAME` varchar(150) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a5_school_higher_education_university`
--

INSERT INTO `a5_school_higher_education_university` (`SCHID`, `VILLAGEID`, `UNIV_NAME`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(1, 17, 'Nainital University', 1, '2017-02-03 06:18:38', 'user'),
(2, 17, 'Kumaun University', 1, '2017-02-03 06:20:06', 'user'),
(4, 16, 'U. T. Uniervsity', 1, '2017-02-05 02:33:18', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a5_school_middle`
--

CREATE TABLE `a5_school_middle` (
  `SCHID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `SCHOOL_NAME` varchar(150) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a5_school_middle`
--

INSERT INTO `a5_school_middle` (`SCHID`, `VILLAGEID`, `SCHOOL_NAME`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(1, 17, 'Balnilium School', 1, '2017-02-03 05:31:50', 'user'),
(3, 16, 'H N V Middle School', 1, '2017-02-05 01:27:36', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a5_school_primary`
--

CREATE TABLE `a5_school_primary` (
  `SCHID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `SCHOOL_NAME` varchar(150) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a5_school_primary`
--

INSERT INTO `a5_school_primary` (`SCHID`, `VILLAGEID`, `SCHOOL_NAME`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(2, 16, 'St Pauls Primary School', 1, '2017-02-04 20:43:19', 'user'),
(3, 17, 'Balnilium School', 1, '2017-02-03 05:31:23', 'user'),
(4, 17, 'ok', 1, '2017-02-04 20:24:54', 'user'),
(5, 16, 'Campus School Primary School', 1, '2017-02-04 20:45:48', 'user'),
(6, 16, 'OK School', 1, '2017-02-05 01:10:09', 'user'),
(7, 16, 'abcd', 1, '2017-02-24 04:24:42', 'nitin'),
(8, 24, 'aaa', 1, '2017-02-24 04:26:06', 'nitin'),
(9, 19, 'asasdasdaaaa', 1, '2017-02-24 04:29:18', 'nitin'),
(11, 27, 'abc', 1, '2017-03-01 03:15:38', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a5_school_private`
--

CREATE TABLE `a5_school_private` (
  `SCHID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `SCHOOL_NAME` varchar(150) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a5_school_private`
--

INSERT INTO `a5_school_private` (`SCHID`, `VILLAGEID`, `SCHOOL_NAME`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(1, 17, 'Inter College', 1, '2017-02-03 05:37:52', 'user'),
(3, 16, 'Birla Vidya Mandir', 1, '2017-02-05 01:56:27', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a6_bank_atm`
--

CREATE TABLE `a6_bank_atm` (
  `BANKATMID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `NAME_` varchar(100) NOT NULL,
  `TYPE_` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a6_bank_atm`
--

INSERT INTO `a6_bank_atm` (`BANKATMID`, `VILLAGEID`, `NAME_`, `TYPE_`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(1, 16, 'Bank of baroda', 1, 1, '2017-02-06 09:03:15', 'user'),
(3, 16, 'HDFC Bank', 2, 1, '2017-02-06 09:03:29', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a6_bank_atm_type`
--

CREATE TABLE `a6_bank_atm_type` (
  `TYPEID` int(11) NOT NULL,
  `NAME_` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a6_bank_atm_type`
--

INSERT INTO `a6_bank_atm_type` (`TYPEID`, `NAME_`) VALUES
(1, 'ATM'),
(2, 'BANK');

-- --------------------------------------------------------

--
-- Table structure for table `a7_drinking_water`
--

CREATE TABLE `a7_drinking_water` (
  `DRWID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `WATER_SOURCE_NAME_` varchar(100) NOT NULL,
  `SOURCE_TYPE` varchar(25) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DESC_` text NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `a7_proposed_halipad_detail`
--

CREATE TABLE `a7_proposed_halipad_detail` (
  `PHDID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `LAND_OWNER_NAME_` varchar(100) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a7_proposed_halipad_detail`
--

INSERT INTO `a7_proposed_halipad_detail` (`PHDID`, `VILLAGEID`, `LAND_OWNER_NAME_`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(2, 16, 'NITIN', 1, '2017-02-06 10:03:39', 'user'),
(3, 16, 'ANKUR', 1, '2017-02-06 10:03:44', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a7_proposed_shelter_detail`
--

CREATE TABLE `a7_proposed_shelter_detail` (
  `PSDID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `SHELTER_NAME` varchar(150) NOT NULL,
  `CAPACITY` varchar(150) NOT NULL,
  `WATER` varchar(10) NOT NULL,
  `ELECTRICITY` varchar(10) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a7_proposed_shelter_detail`
--

INSERT INTO `a7_proposed_shelter_detail` (`PSDID`, `VILLAGEID`, `SHELTER_NAME`, `CAPACITY`, `WATER`, `ELECTRICITY`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(2, 16, 'Shelter 1', '5', 'YES', 'NO', 1, '2017-02-06 23:28:34', 'user'),
(3, 16, 'Shelter 2', '15', 'NO', 'YES', 1, '2017-02-07 03:49:54', 'user'),
(5, 17, 'Shelter 3', '16', 'YES', 'YES', 1, '2017-02-06 23:30:48', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a7_village_industry`
--

CREATE TABLE `a7_village_industry` (
  `VIID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `INDUSTRY` varchar(150) NOT NULL,
  `INDUSTRY_TYPE` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a7_village_industry`
--

INSERT INTO `a7_village_industry` (`VIID`, `VILLAGEID`, `INDUSTRY`, `INDUSTRY_TYPE`, `STATUS`, `DATE_`, `USERNAME`) VALUES
(3, 16, 'ABC', 1, 1, '2017-02-06 09:44:26', 'user'),
(4, 16, 'XYZ', 2, 1, '2017-02-06 09:44:39', 'user'),
(5, 17, 'aza', 1, 1, '2017-02-07 12:32:12', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `a7_village_industry_type`
--

CREATE TABLE `a7_village_industry_type` (
  `TYPEID` int(11) NOT NULL,
  `NAME_` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a7_village_industry_type`
--

INSERT INTO `a7_village_industry_type` (`TYPEID`, `NAME_`) VALUES
(1, 'Local House hold industry'),
(2, 'NGO Based Industry'),
(3, 'OTHER');

-- --------------------------------------------------------

--
-- Table structure for table `a8_village_one_row_data`
--

CREATE TABLE `a8_village_one_row_data` (
  `ONEROWID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `DISTRICT_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `DM_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `DM_PHONE` varchar(100) NOT NULL DEFAULT 'x',
  `DM_EMAIL` varchar(100) NOT NULL DEFAULT 'x',
  `DM_PHOTO` varchar(50) NOT NULL DEFAULT 'x',
  `SDM_SUBDIVISION_AREA` varchar(100) NOT NULL,
  `SDM_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `SDM_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `SDM_PHOTO` varchar(50) NOT NULL DEFAULT 'x',
  `SDM_EMAIL` varchar(100) NOT NULL DEFAULT 'x',
  `TOTAL_LAND_HOLDERS` varchar(50) NOT NULL DEFAULT 'x',
  `AGRICULTURE_TOTAL_AREA_UNDER_CULTIVATION_IN_HECTARE` varchar(50) NOT NULL DEFAULT 'x',
  `TOTAL_GOVT_LAND_UNDER_DIFF_CATEG_IN_HECTARE` varchar(50) NOT NULL DEFAULT 'x',
  `TOTAL_LANDLESS_PEOPLE` varchar(50) NOT NULL DEFAULT 'x',
  `MAIN_NAME_OF_CROP` varchar(120) NOT NULL DEFAULT 'x',
  `TOTAL_LAND_AREA_OF_VILLAGE_IN_HECTARE` varchar(50) NOT NULL DEFAULT 'x',
  `TEHSIL_NAME` varchar(150) NOT NULL DEFAULT 'x',
  `TEHSILDAR_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `TEHSILDAR_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `TEHSILDAR_EMAIL` varchar(100) NOT NULL DEFAULT 'x',
  `TEHSILDAR_PHOTO` varchar(100) NOT NULL DEFAULT 'x',
  `NAYAB_TEHSILDAR_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `NAYAB_TEHSILDAR_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `KANOONGO_AREA_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `PATWARI_AREA_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `PATWARI_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `PATWARI_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `PATWARI_PHOTO` varchar(50) NOT NULL DEFAULT 'x',
  `FOREST_RANGE_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `FOREST_RANGER_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `FOREST_RANGER_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `BLOCK_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `BDO_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `BDO_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `VANPANCHAYAT_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `SARPANCH_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `SARPANCH_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `TOTAL_VANPANCHAYAT_AREA` varchar(50) NOT NULL DEFAULT 'x',
  `POLICE_THANA_OR_REVENUE_POLICE_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `SO_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `SO_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `POLICE_CHAWKI_OR_REVENUE_POLICE_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `CHAWKI_INCHARGE_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `CHAWKI_INCHARGE_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `NYAY_PANCHAYAT_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `ANGANVAADI_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `ANGANVAADI_WORKER_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `ANGANVAADI_WORKER_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `GRAM_PANCHAYAT_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `GRAM_PRADHAN_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `GRAM_PRADHAN_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `GRAM_VIKAS_ADHIKARI_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `GRAM_VIKAS_ADHIKARI_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `GRAM_PANCHAYAT_ADHIKARI_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `GRAM_PANCHAYAT_ADHIKARI_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `NUMBER_OF_TOK` varchar(100) NOT NULL DEFAULT 'x',
  `NAMES_OF_TOK` text NOT NULL,
  `POPULATION_CENSUS_YEAR` varchar(25) NOT NULL DEFAULT 'x' COMMENT 'like 2015-2025',
  `MALE_POPULATION` varchar(50) NOT NULL DEFAULT 'x',
  `FEMALE_POPULATION` varchar(50) NOT NULL DEFAULT 'x',
  `TOTAL_POPULATION` varchar(50) NOT NULL DEFAULT 'x',
  `HEALTH_FACILITY_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `HEALTH_FACILITY_GOVT_PRIVATE` varchar(10) NOT NULL DEFAULT 'x' COMMENT 'Govt or Private',
  `ASHA_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `ASHA_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `ANM_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `ANM_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `PRIVATE_CLINIC_NAME` varchar(100) DEFAULT 'x',
  `CHEMIST_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `HOSPITAL_SUBCENTRE_NAME` varchar(25) NOT NULL DEFAULT 'x',
  `HOSPITAL_SUBCENTRE_DISTANCE` varchar(25) NOT NULL DEFAULT 'x',
  `LOKSABHA_PARLIAMENTRY_CONSTITUENCY` varchar(100) NOT NULL DEFAULT 'x',
  `LOKSABHA_MP_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `LOKSABHA_ASSEMBLY_CONSTITUENCY` varchar(100) NOT NULL DEFAULT 'x',
  `LOKSABHA_MLA_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `POLING_BOOTH_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `VILLAGES_UNDER_POLING_BOOTH` text NOT NULL,
  `BLO_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `BLO_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `PDS_SHOP_OWNER_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `PDS_SHOP_OWNER_PHONE` varchar(50) NOT NULL DEFAULT 'x',
  `APPROACH_ROAD_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `CONSTRUCTION_AGENCY` varchar(200) NOT NULL,
  `APPROACH_ROAD_PAKKA_KACHCHA` varchar(10) NOT NULL DEFAULT 'x' COMMENT 'PAKKA or KACHCHA',
  `APPROACH_ROAD_TREK_DISTANCE` varchar(25) NOT NULL DEFAULT 'x',
  `LANDSLIDE_ZONE_NAME` varchar(100) NOT NULL DEFAULT 'x' COMMENT 'ZONE NAME or NO NAME',
  `ALTERNATE_ROUTE_NAME` varchar(100) NOT NULL DEFAULT 'x',
  `ALTERNATE_ROUTE_TYPE` varchar(100) NOT NULL DEFAULT 'x',
  `ALTERNATE_ROUTE_DISTANCE` varchar(25) NOT NULL DEFAULT 'x',
  `ELECTRICITY` varchar(10) NOT NULL DEFAULT 'x' COMMENT 'YES or NO',
  `STATUS` tinyint(1) NOT NULL DEFAULT '1',
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a8_village_one_row_data`
--

INSERT INTO `a8_village_one_row_data` (`ONEROWID`, `USERNAME`, `VILLAGEID`, `DISTRICT_NAME`, `DM_NAME`, `DM_PHONE`, `DM_EMAIL`, `DM_PHOTO`, `SDM_SUBDIVISION_AREA`, `SDM_NAME`, `SDM_PHONE`, `SDM_PHOTO`, `SDM_EMAIL`, `TOTAL_LAND_HOLDERS`, `AGRICULTURE_TOTAL_AREA_UNDER_CULTIVATION_IN_HECTARE`, `TOTAL_GOVT_LAND_UNDER_DIFF_CATEG_IN_HECTARE`, `TOTAL_LANDLESS_PEOPLE`, `MAIN_NAME_OF_CROP`, `TOTAL_LAND_AREA_OF_VILLAGE_IN_HECTARE`, `TEHSIL_NAME`, `TEHSILDAR_NAME`, `TEHSILDAR_PHONE`, `TEHSILDAR_EMAIL`, `TEHSILDAR_PHOTO`, `NAYAB_TEHSILDAR_NAME`, `NAYAB_TEHSILDAR_PHONE`, `KANOONGO_AREA_NAME`, `PATWARI_AREA_NAME`, `PATWARI_NAME`, `PATWARI_PHONE`, `PATWARI_PHOTO`, `FOREST_RANGE_NAME`, `FOREST_RANGER_NAME`, `FOREST_RANGER_PHONE`, `BLOCK_NAME`, `BDO_NAME`, `BDO_PHONE`, `VANPANCHAYAT_NAME`, `SARPANCH_NAME`, `SARPANCH_PHONE`, `TOTAL_VANPANCHAYAT_AREA`, `POLICE_THANA_OR_REVENUE_POLICE_NAME`, `SO_NAME`, `SO_PHONE`, `POLICE_CHAWKI_OR_REVENUE_POLICE_NAME`, `CHAWKI_INCHARGE_NAME`, `CHAWKI_INCHARGE_PHONE`, `NYAY_PANCHAYAT_NAME`, `ANGANVAADI_NAME`, `ANGANVAADI_WORKER_NAME`, `ANGANVAADI_WORKER_PHONE`, `GRAM_PANCHAYAT_NAME`, `GRAM_PRADHAN_NAME`, `GRAM_PRADHAN_PHONE`, `GRAM_VIKAS_ADHIKARI_NAME`, `GRAM_VIKAS_ADHIKARI_PHONE`, `GRAM_PANCHAYAT_ADHIKARI_NAME`, `GRAM_PANCHAYAT_ADHIKARI_PHONE`, `NUMBER_OF_TOK`, `NAMES_OF_TOK`, `POPULATION_CENSUS_YEAR`, `MALE_POPULATION`, `FEMALE_POPULATION`, `TOTAL_POPULATION`, `HEALTH_FACILITY_NAME`, `HEALTH_FACILITY_GOVT_PRIVATE`, `ASHA_NAME`, `ASHA_PHONE`, `ANM_NAME`, `ANM_PHONE`, `PRIVATE_CLINIC_NAME`, `CHEMIST_NAME`, `HOSPITAL_SUBCENTRE_NAME`, `HOSPITAL_SUBCENTRE_DISTANCE`, `LOKSABHA_PARLIAMENTRY_CONSTITUENCY`, `LOKSABHA_MP_NAME`, `LOKSABHA_ASSEMBLY_CONSTITUENCY`, `LOKSABHA_MLA_NAME`, `POLING_BOOTH_NAME`, `VILLAGES_UNDER_POLING_BOOTH`, `BLO_NAME`, `BLO_PHONE`, `PDS_SHOP_OWNER_NAME`, `PDS_SHOP_OWNER_PHONE`, `APPROACH_ROAD_NAME`, `CONSTRUCTION_AGENCY`, `APPROACH_ROAD_PAKKA_KACHCHA`, `APPROACH_ROAD_TREK_DISTANCE`, `LANDSLIDE_ZONE_NAME`, `ALTERNATE_ROUTE_NAME`, `ALTERNATE_ROUTE_TYPE`, `ALTERNATE_ROUTE_DISTANCE`, `ELECTRICITY`, `STATUS`, `DATE_`) VALUES
(8, 'user', 16, 'Nainital', 'Dr. Nitin Deepak', '4534534', 'df@gmail.com', 'dmpic_16.jpg', 'Haldwani', 'Gunjan Mathur', '98745633231', 'sdmpic_16.JPG', 'as@gmail.com', '250', '125', '200', '500', 'Wheat, Barley etc', '950', 'AASd', 'asd', 'asd', 'asd@gmail.com', 'tehsildarpic_16.jpg', 'asd', 'fdg', 'ADS', 'ADS', 'Harsh Pant', '234', 'patwaripic_16.JPG', 'AASDASD', 'ASD', '9874563214', 'ASD', 'harvinder', '234', 'SDF', 'ASDF', '234', '34', 'ZDF', 'SADF', '345', 'ASDF', 'SDF', '2344', 'SADF', 'ASDF', 'SDF', 'FF', 'Kolia', 'Kanchan', '25563311', 'gagan', '2588522587', 'sweta', '1477411477', '5', 'asd, fdf, dfdf, dffb, dfdf', '2016', '5000', '4500', '9500', 'asdsdasd', 'Private', 'asd', 'asd', 'asd', 'aasd', 'asd', 'asd', 'asd', 'as', 'xasas', 'asd', 'asd', 'sa', 'zxc', 'zc', 'zc', '234', 'asd', 'asd', 'asd', 'asd', 'Kachcha', '34', 'asd', 'asd', 'asd', '34', 'No', 1, '2017-02-24 11:34:31'),
(9, 'user', 17, '', '', '', '', 'dmpic_16.jpg', '', 'x', 'x', 'sdmpic_16.JPG', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'tehsildarpic_16.jpg', 'x', 'x', 'x', 'x', 'x', 'x', 'patwaripic_16.JPG', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 1, '2017-02-24 11:34:31'),
(10, 'user1', 18, 'Nainital', 'Dr Nitin Deepak', '9760020667', 'nitin.d12@gmail.com', 'dmpic_10.jpg', 'Talli tal', 'Gunjan Mathur', '9634944223', 'sdmpic_10.jpg', 'gunjan@gmail.com', '', 'x', 'x', 'x', 'x', 'x', 'Haldwani', 'Vihaan Mathur', '9874563214', 'vihaan@gmail.com', 'tehsildarpic_10.jpg', 'Vaasu Tewari', '9876543215', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'asd', 'asd', 'asd', 'asd', 'Kachcha', '34', 'asasd', 'asd', 'asd', '45', 'No', 1, '2017-01-29 15:15:59'),
(11, 'user', 19, 'asasdasd', 'asdasd', '1111111111', '', 'dmpic_16.jpg', '', 'x', 'x', 'sdmpic_16.JPG', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'xcacas', '', '', '', 'tehsildarpic_16.jpg', '', '', 'x', 'x', 'x', 'x', 'patwaripic_16.JPG', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 1, '2017-02-24 11:34:31'),
(12, 'user', 21, 'x', 'x', 'x', 'x', 'dmpic_16.jpg', '', 'x', 'x', 'sdmpic_16.JPG', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'tehsildarpic_16.jpg', 'x', 'x', 'x', 'x', 'x', 'x', 'patwaripic_16.JPG', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 1, '2017-02-24 11:34:31'),
(14, 'nitin', 24, 'sdf', 'asd', '', '', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 0, '2017-02-25 10:47:37'),
(15, 'user', 25, 'x', 'x', 'x', 'x', 'dmpic_16.jpg', '', 'x', 'x', 'sdmpic_16.JPG', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'tehsildarpic_16.jpg', 'x', 'x', '', '', '', '', 'patwaripic_16.JPG', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 1, '2017-02-24 11:34:31'),
(16, 'user', 26, '', '', '', '', 'dmpic_16.jpg', '', '', '', 'sdmpic_16.JPG', '', 'x', 'x', 'x', 'x', 'x', 'x', '', '', '', '', 'tehsildarpic_16.jpg', '', '', '', '', '', '', 'patwaripic_16.JPG', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 1, '2017-02-24 11:34:32'),
(17, 'user', 27, 'x', 'x', 'x', 'x', 'dmpic_16.jpg', '', 'x', 'x', 'sdmpic_16.JPG', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'tehsildarpic_16.jpg', 'x', 'x', 'x', 'x', 'x', 'x', 'patwaripic_16.JPG', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 'x', '', 'x', 'x', 'x', 'x', 'x', 'x', 'x', 1, '2017-03-01 06:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `a96_sdm_court`
--

CREATE TABLE `a96_sdm_court` (
  `SNO` bigint(22) NOT NULL,
  `CASENO` varchar(25) NOT NULL,
  `REG_DATE` varchar(25) NOT NULL,
  `YEAR_` varchar(5) NOT NULL,
  `MONTH` varchar(15) NOT NULL,
  `TYPE_` varchar(100) NOT NULL,
  `VILLAGE` varchar(250) NOT NULL,
  `DISMISS_IN_DEFAULT` varchar(15) NOT NULL COMMENT 'Activate DD or Deactivate DD',
  `FINAL_ORDER_DATE` varchar(25) NOT NULL,
  `FINAL_ORDER_ATTACH` varchar(25) NOT NULL,
  `FILE_DISPATCHED_TO_RECORD_ROOM` text NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `STATUS_` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a96_sdm_court`
--

INSERT INTO `a96_sdm_court` (`SNO`, `CASENO`, `REG_DATE`, `YEAR_`, `MONTH`, `TYPE_`, `VILLAGE`, `DISMISS_IN_DEFAULT`, `FINAL_ORDER_DATE`, `FINAL_ORDER_ATTACH`, `FILE_DISPATCHED_TO_RECORD_ROOM`, `USERNAME`, `STATUS_`) VALUES
(2, '2017-24/11', '2017-03-21', '2017', '03', 'QkSt+nkjh', 'nknjh', 'Activate DD', '', 'x', '', 'nitin', 1),
(4, '2017-24/13', '2017-03-22', '2017', '03', 'Criminal', 'uxyk', 'Activate DD', '', 'x', '', 'nitin', 21),
(5, '2017-25/11', '2017-03-23', '2017', '03', 'Criminal', 'gYnh', 'Deactivate DD', '', 'x', '', 'nitin', 8),
(6, '2017-25/13', '2017-03-23', '2017', '03', 'Criminal', 'sd', 'Deactivate DD', '', 'x', '', 'nitin', 12),
(7, '2017-25/14', '2017-03-23', '2017', '03', 'Revenue', 'nagla', 'Deactivate DD', '', 'x', '', 'nitin', 14),
(8, '2017-25/15', '2017-03-24', '2017', '03', 'Criminal', 'fufru', 'Deactivate DD', '', 'x', '', 'nitin', 16),
(9, '2017-26/11', '2017-03-26', '2017', '03', 'Criminal', 'nknjh', 'Deactivate DD', '', 'x', '', 'nitin', 17),
(10, '2013-22/19', '2013-02-19', '2013', '02', 'QkStnkjh', 'asdasd', 'Deactivate DD', '2017-03-29', 'x', '2017-03-29', 'nitin', 23);

-- --------------------------------------------------------

--
-- Table structure for table `a97_sdm_court_detail`
--

CREATE TABLE `a97_sdm_court_detail` (
  `SNO` bigint(22) NOT NULL,
  `REF_SNO` bigint(22) NOT NULL,
  `CASENO` varchar(25) NOT NULL,
  `SUB_DIVISION` varchar(150) NOT NULL,
  `TEHSIL` varchar(150) NOT NULL,
  `PATWARI_AREA` varchar(150) NOT NULL,
  `POLICE_AREA` varchar(150) NOT NULL,
  `ACT_NAME` varchar(150) NOT NULL,
  `SECTION` varchar(100) NOT NULL,
  `FIRST_PARTY` text NOT NULL,
  `SECOND_PARTY` text NOT NULL,
  `NEXT_DATE` varchar(25) NOT NULL,
  `SCHEDULED_FOR` text NOT NULL,
  `DOE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `USERNAME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `a97_sdm_court_detail`
--

INSERT INTO `a97_sdm_court_detail` (`SNO`, `REF_SNO`, `CASENO`, `SUB_DIVISION`, `TEHSIL`, `PATWARI_AREA`, `POLICE_AREA`, `ACT_NAME`, `SECTION`, `FIRST_PARTY`, `SECOND_PARTY`, `NEXT_DATE`, `SCHEDULED_FOR`, `DOE`, `USERNAME`) VALUES
(1, 2, '2017-24/11', 'abc', 'efg', 'hij', 'thana', 'crime', '251', 'abc', 'xyz', '', 'hearing', '2017-03-29 08:00:55', 'nitin'),
(5, 4, '2017-24/13', 'asj', 'asd', 'asd', 'asd', 'asd', 'asd', 'sad', 'asd', '2017-03-23', 'asd', '2017-03-24 05:55:52', 'nitin'),
(6, 5, '2017-25/11', 'as', 'as', 'asd', 'sasd', 'crime', '251', 'asdf', 'sd', '2017-03-31', 'asdasd', '2017-03-24 05:56:17', 'nitin'),
(8, 5, '2017-25/11', 'as', 'as', 'asd', 'sasd', 'crime', '251', 'asd', 'sd', '2017-03-31', 'asdasd', '2017-03-23 05:01:37', 'nitin'),
(11, 6, '2017-25/13', 'asd', 'asd', 'asd', 'asd', 'asd', '23', 'sd', 'asd', '2017-03-28', 'naveen', '2017-03-23 10:52:16', 'nitin'),
(12, 6, '2017-25/13', 'asd', 'asd', 'asd', 'asd', 'asd', '23', 'sd', 'asd', '2017-03-28', 'naveen nitin', '2017-03-24 05:40:41', 'nitin'),
(13, 7, '2017-25/14', 'pantnagar', 'haldwani', 'haldwani', 'Nainital', 'revenue', '231, 232', 'Gagan, Mamta', 'harviner', '2017-03-29', 'next', '2017-03-23 10:14:26', 'nitin'),
(14, 7, '2017-25/14', 'pantnagar', 'haldwani', 'haldwani', 'Nainital', 'revenue', '231, 232,242', 'Mamta, Nitin', 'harviner', '2017-03-26', 'next next', '2017-03-26 05:57:26', 'nitin'),
(15, 8, '2017-25/15', 'uohu', 'xksiky', 'ad', 'asd', 'pp', 'asd', 'asd', 'asd', '', 'ad', '2017-03-24 05:42:19', 'nitin'),
(16, 8, '2017-25/15', 'uohu', 'xksiky', 'ad', 'asd', 'pp', 'asd', 'asd', 'asd', '2017-03-26', 'ad', '2017-03-26 02:03:26', 'nitin'),
(17, 9, '2017-26/11', '', 'nknjh', 'nknjh', 'nknjh', 'irk ugha', '261] 271', 'xxu', 'fodkl', '2017-03-29', '', '2017-03-29 06:20:48', 'nitin'),
(21, 4, '2017-24/13', 'asj', 'asd', 'asd', 'asd', 'asd', 'asd', 'sad', 'asd', '2017-03-23', 'asd', '2017-03-29 08:04:05', 'nitin'),
(22, 10, '2013-22/19', '', 'asd', 'asd', 'asd', 'asd', '251', 'sad', 'ADSas', '2017-03-31', 'ADSAsasd', '2017-03-29 07:36:39', 'nitin'),
(23, 10, '2013-22/19', '', 'asd', 'asd', 'asd', 'asd', '251', 'sad', 'ADSas', '2017-03-31', 'ADSAsasd', '2017-03-29 08:12:25', 'nitin');

-- --------------------------------------------------------

--
-- Table structure for table `b1_revenue_map`
--

CREATE TABLE `b1_revenue_map` (
  `MAPID` int(11) NOT NULL,
  `VILLAGEID` int(11) NOT NULL,
  `SHEETNO` varchar(200) NOT NULL,
  `MAP_PATH` varchar(250) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `b1_revenue_map`
--

INSERT INTO `b1_revenue_map` (`MAPID`, `VILLAGEID`, `SHEETNO`, `MAP_PATH`, `USERNAME`, `STATUS`, `DATE_`) VALUES
(1, 17, '123', 'village_17_123.pdf', 'nitin', 1, '2017-03-19 07:13:29'),
(3, 17, '4545', 'village_17_4545.pdf', 'nitin', 1, '2017-03-19 07:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `USERSTATUS` int(11) NOT NULL,
  `STATUS` tinyint(1) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `NAME_` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`USERNAME`, `PASSWORD`, `USERSTATUS`, `STATUS`, `DATE_`, `NAME_`) VALUES
('nitin', '123', 1, 1, '2017-02-10 08:58:11', 'Nitin Mathur'),
('SDM', '123', 2, 1, '2017-02-10 06:21:21', 'Vandan Singh'),
('user', '123', 2, 1, '2017-02-10 06:53:02', 'User Singh'),
('user1', '123', 2, 1, '2017-02-10 06:53:02', 'User Singh');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `STATUSID` int(11) NOT NULL,
  `USERSTATUS` varchar(100) NOT NULL,
  `PATH_` varchar(50) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `DATE_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`STATUSID`, `USERSTATUS`, `PATH_`, `STATUS`, `DATE_`) VALUES
(1, 'ADMIN', 'web', 1, '2017-02-24 08:44:09'),
(2, 'USER', 'web', 1, '2017-02-24 08:44:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a1_village`
--
ALTER TABLE `a1_village`
  ADD PRIMARY KEY (`VILLAGEID`);

--
-- Indexes for table `a2_pension_pensioner_detail`
--
ALTER TABLE `a2_pension_pensioner_detail`
  ADD PRIMARY KEY (`PDETID`);

--
-- Indexes for table `a2_pension_pension_type`
--
ALTER TABLE `a2_pension_pension_type`
  ADD PRIMARY KEY (`PTID`);

--
-- Indexes for table `a3_tourism_tourism_activity_type`
--
ALTER TABLE `a3_tourism_tourism_activity_type`
  ADD PRIMARY KEY (`TATID`);

--
-- Indexes for table `a3_tourism_tourist_places`
--
ALTER TABLE `a3_tourism_tourist_places`
  ADD PRIMARY KEY (`TPID`);

--
-- Indexes for table `a3_tourism_tourist_places_type`
--
ALTER TABLE `a3_tourism_tourist_places_type`
  ADD PRIMARY KEY (`TPTID`);

--
-- Indexes for table `a4_homeless_people`
--
ALTER TABLE `a4_homeless_people`
  ADD PRIMARY KEY (`HMLPPLID`);

--
-- Indexes for table `a4_local_mela`
--
ALTER TABLE `a4_local_mela`
  ADD PRIMARY KEY (`LOCALMELAID`);

--
-- Indexes for table `a4_nearest_town`
--
ALTER TABLE `a4_nearest_town`
  ADD PRIMARY KEY (`NEARESTTOWNID`);

--
-- Indexes for table `a5_school_higher_education_college`
--
ALTER TABLE `a5_school_higher_education_college`
  ADD PRIMARY KEY (`SCHID`);

--
-- Indexes for table `a5_school_higher_education_university`
--
ALTER TABLE `a5_school_higher_education_university`
  ADD PRIMARY KEY (`SCHID`);

--
-- Indexes for table `a5_school_middle`
--
ALTER TABLE `a5_school_middle`
  ADD PRIMARY KEY (`SCHID`);

--
-- Indexes for table `a5_school_primary`
--
ALTER TABLE `a5_school_primary`
  ADD PRIMARY KEY (`SCHID`);

--
-- Indexes for table `a5_school_private`
--
ALTER TABLE `a5_school_private`
  ADD PRIMARY KEY (`SCHID`);

--
-- Indexes for table `a6_bank_atm`
--
ALTER TABLE `a6_bank_atm`
  ADD PRIMARY KEY (`BANKATMID`);

--
-- Indexes for table `a6_bank_atm_type`
--
ALTER TABLE `a6_bank_atm_type`
  ADD PRIMARY KEY (`TYPEID`);

--
-- Indexes for table `a7_drinking_water`
--
ALTER TABLE `a7_drinking_water`
  ADD PRIMARY KEY (`DRWID`);

--
-- Indexes for table `a7_proposed_halipad_detail`
--
ALTER TABLE `a7_proposed_halipad_detail`
  ADD PRIMARY KEY (`PHDID`);

--
-- Indexes for table `a7_proposed_shelter_detail`
--
ALTER TABLE `a7_proposed_shelter_detail`
  ADD PRIMARY KEY (`PSDID`);

--
-- Indexes for table `a7_village_industry`
--
ALTER TABLE `a7_village_industry`
  ADD PRIMARY KEY (`VIID`);

--
-- Indexes for table `a7_village_industry_type`
--
ALTER TABLE `a7_village_industry_type`
  ADD PRIMARY KEY (`TYPEID`);

--
-- Indexes for table `a8_village_one_row_data`
--
ALTER TABLE `a8_village_one_row_data`
  ADD PRIMARY KEY (`ONEROWID`);

--
-- Indexes for table `a96_sdm_court`
--
ALTER TABLE `a96_sdm_court`
  ADD PRIMARY KEY (`SNO`),
  ADD UNIQUE KEY `CASENO` (`CASENO`);

--
-- Indexes for table `a97_sdm_court_detail`
--
ALTER TABLE `a97_sdm_court_detail`
  ADD PRIMARY KEY (`SNO`);

--
-- Indexes for table `b1_revenue_map`
--
ALTER TABLE `b1_revenue_map`
  ADD PRIMARY KEY (`MAPID`),
  ADD KEY `VILLAGEID` (`VILLAGEID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`STATUSID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a1_village`
--
ALTER TABLE `a1_village`
  MODIFY `VILLAGEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `a2_pension_pensioner_detail`
--
ALTER TABLE `a2_pension_pensioner_detail`
  MODIFY `PDETID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `a2_pension_pension_type`
--
ALTER TABLE `a2_pension_pension_type`
  MODIFY `PTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `a3_tourism_tourism_activity_type`
--
ALTER TABLE `a3_tourism_tourism_activity_type`
  MODIFY `TATID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `a3_tourism_tourist_places`
--
ALTER TABLE `a3_tourism_tourist_places`
  MODIFY `TPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `a3_tourism_tourist_places_type`
--
ALTER TABLE `a3_tourism_tourist_places_type`
  MODIFY `TPTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `a4_homeless_people`
--
ALTER TABLE `a4_homeless_people`
  MODIFY `HMLPPLID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `a4_local_mela`
--
ALTER TABLE `a4_local_mela`
  MODIFY `LOCALMELAID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `a4_nearest_town`
--
ALTER TABLE `a4_nearest_town`
  MODIFY `NEARESTTOWNID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `a5_school_higher_education_college`
--
ALTER TABLE `a5_school_higher_education_college`
  MODIFY `SCHID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `a5_school_higher_education_university`
--
ALTER TABLE `a5_school_higher_education_university`
  MODIFY `SCHID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `a5_school_middle`
--
ALTER TABLE `a5_school_middle`
  MODIFY `SCHID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `a5_school_primary`
--
ALTER TABLE `a5_school_primary`
  MODIFY `SCHID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `a5_school_private`
--
ALTER TABLE `a5_school_private`
  MODIFY `SCHID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `a6_bank_atm`
--
ALTER TABLE `a6_bank_atm`
  MODIFY `BANKATMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `a6_bank_atm_type`
--
ALTER TABLE `a6_bank_atm_type`
  MODIFY `TYPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `a7_drinking_water`
--
ALTER TABLE `a7_drinking_water`
  MODIFY `DRWID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `a7_proposed_halipad_detail`
--
ALTER TABLE `a7_proposed_halipad_detail`
  MODIFY `PHDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `a7_proposed_shelter_detail`
--
ALTER TABLE `a7_proposed_shelter_detail`
  MODIFY `PSDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `a7_village_industry`
--
ALTER TABLE `a7_village_industry`
  MODIFY `VIID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `a7_village_industry_type`
--
ALTER TABLE `a7_village_industry_type`
  MODIFY `TYPEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `a8_village_one_row_data`
--
ALTER TABLE `a8_village_one_row_data`
  MODIFY `ONEROWID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `a96_sdm_court`
--
ALTER TABLE `a96_sdm_court`
  MODIFY `SNO` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `a97_sdm_court_detail`
--
ALTER TABLE `a97_sdm_court_detail`
  MODIFY `SNO` bigint(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `b1_revenue_map`
--
ALTER TABLE `b1_revenue_map`
  MODIFY `MAPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `STATUSID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
