-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 10:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: ` hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `App_ID` varchar(5) NOT NULL,
  `Pat_ID` varchar(5) NOT NULL,
  `Doc_ID` varchar(5) NOT NULL,
  `Nurse_ID` varchar(5) NOT NULL,
  `Consult_Room_No` varchar(3) NOT NULL,
  `Date_` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`App_ID`, `Pat_ID`, `Doc_ID`, `Nurse_ID`, `Consult_Room_No`, `Date_`) VALUES
('A0001', 'P0001', 'D0001', 'S0001', '102', '0000-00-00'),
('A0002', 'P0002', 'D0002', 'S0006', '111', '0000-00-00'),
('A0005', 'P0005', 'D0101', 'S0003', '111', '0000-00-00'),
('A0009', 'P0220', 'D0004', 'S0007', '190', '0000-00-00'),
('A0012', 'P0012', 'D0101', 'S0008', '212', '0000-00-00'),
('A0101', 'P0101', 'D0003', 'S0001', '102', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_No` varchar(3) NOT NULL,
  `Dept_Name` varchar(50) NOT NULL,
  `Room_No` varchar(5) NOT NULL,
  `FLOOR` varchar(10) NOT NULL,
  `HOD` varchar(5) NOT NULL,
  `Estd_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_No`, `Dept_Name`, `Room_No`, `FLOOR`, `HOD`, `Estd_date`) VALUES
('101', 'Neurology', '101', 'NINTH', 'D0003', '0000-00-00'),
('102', 'Intensive care unit', '102', 'FIRST ', 'D0001', '0000-00-00'),
('111', 'Cardiology', '111', 'First', 'D0002', '0000-00-00'),
('190', 'Obstetrics and gynaecology', '190', 'FIRST', 'D0101', '0000-00-00'),
('212', 'Oncology', '212', 'SECOND', 'D0005', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doc_ID` varchar(5) NOT NULL,
  `Doc_Name` varchar(15) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Qualification` varchar(20) NOT NULL,
  `Specialist` varchar(20) NOT NULL,
  `Contact` varchar(10) DEFAULT NULL,
  `Address1` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `state` varchar(10) NOT NULL,
  `Dept_no` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doc_ID`, `Doc_Name`, `Gender`, `DOB`, `Qualification`, `Specialist`, `Contact`, `Address1`, `city`, `state`, `Dept_no`) VALUES
('D0001', 'Arpit', 'M', '0000-00-00', 'M.B.B.S.', 'General', '9988776655', 'AAA', 'JAIPUR', 'RAJASTHAN', '102'),
('D0002', 'Agasthya', 'M', '0000-00-00', 'MS', 'Cardiology', '9900887766', 'xab', 'vellore', 'TN', '111'),
('D0003', 'Abhay', 'M', '0000-00-00', 'MBBS', 'Neurology', '9911223344', 'xxx', 'UDAIPUR', 'RAJASTHAN', '101'),
('D0004', 'Pratyaksha', 'F', '0000-00-00', 'MBBS', 'Neurology', '9911223355', 'xxy', 'AMRITSAR', 'PUNJAB', '101'),
('D0005', 'Rohit', 'M', '0000-00-00', 'MDS', 'Dental', '9977553311', 'xxx', 'VELLORE', 'TN', '212'),
('D0007', 'RAGHAVAN', 'M', '0000-00-00', 'MDS', 'Cardiology', '9900889990', 'aYx', 'vellore', 'TN', '111'),
('D0101', 'SHIVANSH', 'M', '0000-00-00', 'MS', 'Ophthalmology', '9900889966', 'aax', 'vellore', 'TN', '190');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_bill`
--

CREATE TABLE `hospital_bill` (
  `Inv_No` varchar(5) NOT NULL,
  `Inv_Date` date DEFAULT NULL,
  `Pat_ID` varchar(5) NOT NULL,
  `Bill_Amount` varchar(5) NOT NULL,
  `Payment_Type` varchar(10) NOT NULL,
  `Discount` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospital_bill`
--

INSERT INTO `hospital_bill` (`Inv_No`, `Inv_Date`, `Pat_ID`, `Bill_Amount`, `Payment_Type`, `Discount`) VALUES
('1', '0000-00-00', 'P0001', '1000', 'Cash', NULL),
('101', '0000-00-00', 'P0101', '1200', 'cash', NULL),
('12', '0000-00-00', 'P0012', '12000', 'Card', '5'),
('2', '0000-00-00', 'P0002', '1200', 'Card', NULL),
('5', '0000-00-00', 'P0005', '2300', 'online', NULL),
('9', '0000-00-00', 'P0220', '17000', 'Cash', '5');

-- --------------------------------------------------------

--
-- Table structure for table `in_patient`
--

CREATE TABLE `in_patient` (
  `Pat_ID` varchar(5) NOT NULL,
  `Date_Of_Admission` varchar(15) NOT NULL,
  `Bed_No` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `in_patient`
--

INSERT INTO `in_patient` (`Pat_ID`, `Date_Of_Admission`, `Bed_No`) VALUES
('P0220', '01-04-2020', '34'),
('P0012', '01-05-2020', '100'),
('P0001', '06-04-2017', '116'),
('P0002', '07-08-2019', '102'),
('P0005', '08-08-2019', '101'),
('P0101', '12-05-2020', '101');

-- --------------------------------------------------------

--
-- Table structure for table `in_patient_prescription`
--

CREATE TABLE `in_patient_prescription` (
  `Pat_ID` varchar(5) NOT NULL,
  `Pres_ID` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `in_patient_prescription`
--

INSERT INTO `in_patient_prescription` (`Pat_ID`, `Pres_ID`) VALUES
('P0001', 'PR0001'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0101', 'PR0101'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0101', 'PR0101'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0101', 'PR0101'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0101', 'PR0101'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0101', 'PR0101'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0101', 'PR0101'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0101', 'PR0101'),
('P0001', 'PR0001'),
('P0002', 'PR0002'),
('P0005', 'PR0005'),
('P0220', 'PR0009'),
('P0012', 'PR0012'),
('P0101', 'PR0101');

-- --------------------------------------------------------

--
-- Table structure for table `lab_tests`
--

CREATE TABLE `lab_tests` (
  `Test_ID` varchar(5) NOT NULL,
  `Pat_ID` varchar(5) NOT NULL,
  `Date_of_test` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_tests`
--

INSERT INTO `lab_tests` (`Test_ID`, `Pat_ID`, `Date_of_test`) VALUES
('T0001', 'P0001', '0000-00-00'),
('T0002', 'P0002', '0000-00-00'),
('T0005', 'P0005', '0000-00-00'),
('T0009', 'P0220', '0000-00-00'),
('T0010', 'P0220', '0000-00-00'),
('T0012', 'P0012', '0000-00-00'),
('T0101', 'P0101', '0000-00-00'),
('T0102', 'P0101', '0000-00-00'),
('T0103', 'P0101', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Pat_ID` varchar(5) NOT NULL,
  `Pat_Name` varchar(10) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Gender` varchar(1) NOT NULL,
  `Contact` varchar(10) DEFAULT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Pat_ID`, `Pat_Name`, `DOB`, `Gender`, `Contact`, `Address`) VALUES
('P0001', 'Karthik', '0000-00-00', 'M', '9999900000', 'Chennai'),
('P0002', 'Gayle', '0000-00-00', 'M', '9999900001', 'Chennai'),
('P0005', 'TANISHQ', '0000-00-00', 'M', '9999900002', 'Chennai'),
('P0012', 'Steve', '0000-00-00', 'F', '9999900004', 'Chennai'),
('P0101', 'Mani', '0000-00-00', 'M', '8889900002', 'Chennai'),
('P0220', 'simran', '0000-00-00', 'F', '9878987890', 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_medicines`
--

CREATE TABLE `prescribed_medicines` (
  `Pres_ID` varchar(6) NOT NULL,
  `Medicine_Name` varchar(20) DEFAULT NULL,
  `Dosage` varchar(20) DEFAULT NULL,
  `Brand` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescribed_medicines`
--

INSERT INTO `prescribed_medicines` (`Pres_ID`, `Medicine_Name`, `Dosage`, `Brand`) VALUES
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla'),
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla'),
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla'),
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla'),
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla'),
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla'),
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla'),
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla'),
('PR0001', 'Amodep AT', '1 tab', 'cipla'),
('PR0002', 'MEFTAL SPAS ', '1 tab', 'MEDICARE'),
('PR0005', 'RANIDOM', '1 tab', 'RANBAXY'),
('PR0009', 'ASCORIL', '20ML', 'XYZ'),
('PR0012', 'FEBREX PLUS', '15ML', 'XYZ'),
('PR0101', 'opox 200', '1 tab/day', 'cipla');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `Pres_ID` varchar(6) NOT NULL,
  `App_ID` varchar(5) NOT NULL,
  `Date_and_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Diagnosis_Detail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`Pres_ID`, `App_ID`, `Date_and_time`, `Diagnosis_Detail`) VALUES
('PR0001', 'A0001', '2021-10-05 06:33:56', 'High BP'),
('PR0002', 'A0002', '2021-10-05 06:34:01', 'HIGH SUGAR LEVEL'),
('PR0005', 'A0005', '2021-10-05 06:34:19', 'D_D_5'),
('PR0009', 'A0009', '2021-10-05 06:34:19', 'D_D_9'),
('PR0012', 'A0012', '2021-10-05 06:34:19', 'HIGH HEART RATE'),
('PR0101', 'A0101', '2021-10-05 06:34:43', 'low oxygen rate');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `Staff_ID` varchar(6) NOT NULL,
  `staff_name` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Contact` varchar(10) DEFAULT NULL,
  `Address` varchar(20) NOT NULL,
  `Dept_no` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `staff_name`, `category`, `designation`, `DOB`, `Contact`, `Address`, `Dept_no`) VALUES
('S0001', 'PALLVI', 'Nurse', 'Head nurse', '0000-00-00', '9000900000', 'VELLORE', '111'),
('S0002', 'KARTIK ', 'Lab technician', 'Technician', '0000-00-00', '8000900000', 'Vellore', '111'),
('S0003', 'KUNIKA ', 'Nurse', 'Staff Nurse', '0000-00-00', '7000900000', 'CHENNAI', '102'),
('S0004', 'RAMAN', ' Attender', 'junior_attender', '0000-00-00', '6000900000', 'CHENNAI', '190'),
('S0005', 'RITISH ', 'Helper', 'Senior technician', '0000-00-00', '9000700000', 'Vellore', '101'),
('S0006', 'jyoti ', 'Nurse', 'Staff Nurse', '0000-00-00', '7000900000', 'CHENNAI', '102'),
('S0007', 'nidhi ', 'Nurse', 'Staff Nurse', '0000-00-00', '7000900000', 'CHENNAI', '102'),
('S0008', 'prerna ', 'Nurse', 'Staff Nurse', '0000-00-00', '7000900000', 'CHENNAI', '102');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `Test_ID` varchar(5) NOT NULL,
  `TT_ID` varchar(5) NOT NULL,
  `Report` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`Test_ID`, `TT_ID`, `Report`) VALUES
('T0001', 'TT001', 'Positive'),
('T0002', 'TT012', 'NEGATIVE'),
('T0005', 'TT024', 'NEGATIVE'),
('T0009', 'TT026', 'Positive'),
('T0010', 'TT012', 'Positive'),
('T0012', 'TT123', 'NEGATIVE'),
('T0101', 'TT082', 'NEGATIVE'),
('T0102', 'TT024', 'positive'),
('T0103', 'TT026', 'NEGATIVE');

-- --------------------------------------------------------

--
-- Table structure for table `test_types`
--

CREATE TABLE `test_types` (
  `TT_ID` varchar(5) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Low_Value` varchar(10) DEFAULT NULL,
  `High_Value` varchar(10) DEFAULT NULL,
  `Test_Method` varchar(50) DEFAULT NULL,
  `Technician` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_types`
--

INSERT INTO `test_types` (`TT_ID`, `Description`, `Low_Value`, `High_Value`, `Test_Method`, `Technician`) VALUES
('TT001', 'BP, High heart rate', '80', '120', 'Electronic Machine', 'S0002'),
('TT012', 'blood glucose level', '90', '150', 'Electronic Machine', 'S0005'),
('TT024', 'URINE', '25', '40', 'DEVICE QWE', 'S0002'),
('TT026', 'DESCRIPTOIN4', '35', '70', 'DEVICE ASD', 'S0004'),
('TT082', 'oxygen level', '90', NULL, 'oxymeter', 'S0002'),
('TT123', 'DESCRIPTION6', '47', '90', 'DEVICE ZXC', 'S0005');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`App_ID`),
  ADD KEY `pid3` (`Pat_ID`),
  ADD KEY `did1` (`Doc_ID`),
  ADD KEY `nid0` (`Nurse_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_No`),
  ADD KEY `headofd` (`HOD`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Doc_ID`);

--
-- Indexes for table `hospital_bill`
--
ALTER TABLE `hospital_bill`
  ADD PRIMARY KEY (`Inv_No`),
  ADD KEY `pid4` (`Pat_ID`);

--
-- Indexes for table `in_patient`
--
ALTER TABLE `in_patient`
  ADD PRIMARY KEY (`Date_Of_Admission`),
  ADD KEY `pid1` (`Pat_ID`);

--
-- Indexes for table `in_patient_prescription`
--
ALTER TABLE `in_patient_prescription`
  ADD KEY `pid2` (`Pat_ID`),
  ADD KEY `prid1` (`Pres_ID`);

--
-- Indexes for table `lab_tests`
--
ALTER TABLE `lab_tests`
  ADD PRIMARY KEY (`Test_ID`),
  ADD KEY `pid5` (`Pat_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`Pat_ID`);

--
-- Indexes for table `prescribed_medicines`
--
ALTER TABLE `prescribed_medicines`
  ADD KEY `prid0` (`Pres_ID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`Pres_ID`),
  ADD KEY `appid` (`App_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD KEY `deptno` (`Dept_no`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD KEY `tid0` (`Test_ID`),
  ADD KEY `ttid0` (`TT_ID`);

--
-- Indexes for table `test_types`
--
ALTER TABLE `test_types`
  ADD PRIMARY KEY (`TT_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `did1` FOREIGN KEY (`Doc_ID`) REFERENCES `doctor` (`Doc_ID`),
  ADD CONSTRAINT `nid0` FOREIGN KEY (`Nurse_ID`) REFERENCES `staff` (`Staff_ID`),
  ADD CONSTRAINT `pid3` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`Pat_ID`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `headofd` FOREIGN KEY (`HOD`) REFERENCES `doctor` (`Doc_ID`);

--
-- Constraints for table `hospital_bill`
--
ALTER TABLE `hospital_bill`
  ADD CONSTRAINT `pid4` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`Pat_ID`);

--
-- Constraints for table `in_patient`
--
ALTER TABLE `in_patient`
  ADD CONSTRAINT `pid1` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`Pat_ID`);

--
-- Constraints for table `in_patient_prescription`
--
ALTER TABLE `in_patient_prescription`
  ADD CONSTRAINT `pid2` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`Pat_ID`),
  ADD CONSTRAINT `prid1` FOREIGN KEY (`Pres_ID`) REFERENCES `prescription` (`Pres_ID`);

--
-- Constraints for table `lab_tests`
--
ALTER TABLE `lab_tests`
  ADD CONSTRAINT `pid5` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`Pat_ID`);

--
-- Constraints for table `prescribed_medicines`
--
ALTER TABLE `prescribed_medicines`
  ADD CONSTRAINT `prid0` FOREIGN KEY (`Pres_ID`) REFERENCES `prescription` (`Pres_ID`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `appid` FOREIGN KEY (`App_ID`) REFERENCES `appointment` (`App_ID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `deptno` FOREIGN KEY (`Dept_no`) REFERENCES `department` (`Dept_No`);

--
-- Constraints for table `test_results`
--
ALTER TABLE `test_results`
  ADD CONSTRAINT `tid0` FOREIGN KEY (`Test_ID`) REFERENCES `lab_tests` (`Test_ID`),
  ADD CONSTRAINT `ttid0` FOREIGN KEY (`TT_ID`) REFERENCES `test_types` (`TT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
