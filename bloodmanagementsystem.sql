-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 11:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AppointmentId` int(11) NOT NULL,
  `RequestId` int(11) DEFAULT NULL,
  `AppointmentDate` varchar(100) DEFAULT NULL,
  `AppointmentStatus` varchar(100) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentId`, `RequestId`, `AppointmentDate`, `AppointmentStatus`, `CreatedAt`, `UpdatedAt`) VALUES
(5, 1, '2022-12-06', 'completed', '0000-00-00 00:00:00', '2023-07-24 12:10:06'),
(6, 2, '2023-06-17', 'completed', '2023-06-17 00:00:00', '2023-06-17 00:00:00'),
(7, 4, '2023-07-30', 'coming', '2023-07-12 00:00:00', '2023-07-12 00:00:00'),
(8, 3, '2023-07-28', 'completed', '2023-07-22 00:00:00', '2023-08-05 11:37:51'),
(9, 9, '2023-08-01', 'coming', '2023-07-22 00:00:00', '2023-07-22 00:00:00'),
(10, 10, '2023-07-25', 'completed', '2023-07-24 12:34:35', '2023-07-26 12:52:51'),
(11, 11, '2023-07-25', 'completed', '2023-07-24 12:54:44', '2023-07-24 16:35:54'),
(12, 12, '2023-07-26', 'completed', '2023-07-26 12:51:48', '2023-07-26 12:52:32'),
(13, 7, '2023-08-03', 'coming', '2023-07-26 12:51:50', '2023-07-26 12:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `appointmentinventory`
--

CREATE TABLE `appointmentinventory` (
  `aiId` int(11) NOT NULL,
  `AppointmentId` int(11) DEFAULT NULL,
  `InventoryId` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointmentinventory`
--

INSERT INTO `appointmentinventory` (`aiId`, `AppointmentId`, `InventoryId`, `Quantity`) VALUES
(1, 12, 1, 200),
(2, 13, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `bloodcenter`
--

CREATE TABLE `bloodcenter` (
  `CenterId` int(11) NOT NULL,
  `CenterName` varchar(500) DEFAULT NULL,
  `CenterAddress` varchar(500) DEFAULT NULL,
  `CenterContact` varchar(100) DEFAULT NULL,
  `CityId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodcenter`
--

INSERT INTO `bloodcenter` (`CenterId`, `CenterName`, `CenterAddress`, `CenterContact`, `CityId`) VALUES
(1, 'Karachi Center', 'Shah Faisal', '2387131', 1),
(2, 'Lahore Center', 'Gulberg', '349342243', 2),
(3, 'Islamabad Center', 'Bahria Town', '02189389343', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `GroupId` int(11) NOT NULL,
  `GroupName` varchar(200) NOT NULL,
  `GroupDescription` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`GroupId`, `GroupName`, `GroupDescription`) VALUES
(1, 'A+', 'A+ blood group is characterized by the presence of the A antigen on red blood cells and the absence of the B antigen. People with A+ blood can donate to individuals with A+ and AB+ blood types. They have antibodies against the B antigen and can receive blood from A+ and O+ donors.'),
(2, 'B+', 'B+ blood group is characterized by the presence of the B antigen on red blood cells and the absence of the A antigen.'),
(3, 'AB+', 'AB+ blood type is relatively rare, found in a smaller percentage of the population.'),
(4, 'O+', 'O+ blood group is one of the most common blood types. Individuals with O+ blood have neither the A nor B antigens on their red blood cells, making them universal donors for Rh+ blood types.'),
(5, 'A-', 'Individuals with A- blood group have red blood cells that have the A antigen on their surface but do not have the Rh factor. '),
(6, 'B-', 'Individuals with B- blood group have red blood cells that have the B antigen on their surface but lack the Rh factor.'),
(7, 'AB-', 'Individuals with AB- blood group have red blood cells that have both the A and B antigens on their surface but lack the Rh factor.'),
(8, 'O-', 'Individuals with O- blood group have red blood cells that lack both the A and B antigens as well as the Rh factor.');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityId` int(11) NOT NULL,
  `CityName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityId`, `CityName`) VALUES
(1, 'Karachi'),
(2, 'Lahore'),
(3, 'Islamabad');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ContactId` int(11) NOT NULL,
  `ContactName` varchar(100) DEFAULT NULL,
  `ContactEmail` varchar(100) DEFAULT NULL,
  `ContactMessage` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`ContactId`, `ContactName`, `ContactEmail`, `ContactMessage`) VALUES
(1, 'Khurram', 'anybody239@gmail.com', 'Your donation management system is brilliant. It helps both donor and recipient and all necessary details on one platform.'),
(2, 'Hammad', 'hammad@gmail.com', 'I have been using your Bloodbank Management System for a while now, and I must say it has greatly improved the efficiency of our blood donation process.'),
(3, 'Umair', 'umair@gmail.com', 'I recently used your Bloodbank Management System to find nearby blood drives and schedule an appointment. I was impressed by how seamlessly the system operated.'),
(4, 'Sohail Khan', 'sohail@gmail.com', 'you have put a lot of thought into creating a user-friendly platform that makes the blood donation process convenient and hassle-free. Great job!');

-- --------------------------------------------------------

--
-- Table structure for table `donationdrive`
--

CREATE TABLE `donationdrive` (
  `DriveId` int(11) NOT NULL,
  `CenterId` int(11) DEFAULT NULL,
  `StartDate` varchar(100) DEFAULT NULL,
  `EndDate` varchar(100) DEFAULT NULL,
  `DriveTimings` varchar(100) DEFAULT NULL,
  `DriveTitle` varchar(100) DEFAULT NULL,
  `DriveAddress` varchar(100) DEFAULT NULL,
  `DriveStatus` varchar(100) DEFAULT NULL,
  `DriveDescription` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donationdrive`
--

INSERT INTO `donationdrive` (`DriveId`, `CenterId`, `StartDate`, `EndDate`, `DriveTimings`, `DriveTitle`, `DriveAddress`, `DriveStatus`, `DriveDescription`) VALUES
(1, 1, '2023-08-17', '2023-08-17', '9am-3pm', 'Donation Peace', 'abc street, Karachi', 'coming', 'Every year countries around the world celebrate World Blood Donor Day. The event serves to thank voluntary.'),
(2, 1, '2023-08-10', '2023-08-10', '12pm-6pm', 'Save Life', 'efg street Karachi', 'coming', 'Join us for our upcoming Blood Donation Drive and make a life-saving difference! Your generous donation can help save lives and support patients in need.'),
(3, 2, '2023-08-04', '2023-08-04', '12pm-6pm', 'Share to Care', 'klfkd street', 'completed', 'This drive will help us to collect blood and save many lifes in Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `DonorId` int(11) NOT NULL,
  `DonorName` varchar(200) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `DonorContact` varchar(100) NOT NULL,
  `DonorAddress` varchar(500) NOT NULL,
  `CityId` int(11) NOT NULL,
  `GroupId` int(11) NOT NULL,
  `DonorGender` varchar(50) NOT NULL,
  `DonorDOB` date NOT NULL,
  `DonorWeight` varchar(50) NOT NULL,
  `DonorHeight` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`DonorId`, `DonorName`, `UserId`, `DonorContact`, `DonorAddress`, `CityId`, `GroupId`, `DonorGender`, `DonorDOB`, `DonorWeight`, `DonorHeight`) VALUES
(1, 'Khurram', 1, '78137213', 'example street', 1, 1, 'Male', '0000-00-00', '45kg', '5ft'),
(3, 'Uzair', 3, '44892942', 'example street', 1, 2, 'Male', '0000-00-00', '50kg', '5.3ft'),
(4, 'dfdfs', 4, '3847443993', 'drigh road, Karachi', 1, 2, 'Male', '2000-06-17', '51', '5'),
(5, 'adfdsdf', 5, '2424344333', 'alny street', 1, 2, 'Male', '2001-06-02', '53', '5'),
(6, 'jkfsg', 6, '3902423423', 'drigh road, Karachi', 1, 3, 'Male', '2000-06-17', '55', '5.1'),
(7, 'Shahid', 7, '2434343443', 'sdfsdfdf', 1, 3, 'Male', '1999-06-19', '52', '5'),
(8, 'kuchbhi', 8, '2423434234', 'snfhfvsf', 1, 4, 'Male', '1992-01-02', '56', '5.6'),
(9, 'Sohail Khan', 9, '2423423423', 'street 456', 1, 4, 'Male', '1990-03-05', '51', '5.3'),
(10, 'Imran Khan', 10, '2432423432', 'snfhfvsf', 1, 2, 'Male', '1988-08-17', '54', '5.1'),
(11, 'TestTen', 11, '2423423433', 'testTen street', 1, 3, 'Male', '1999-05-18', '56', '4.9'),
(12, 'TestEleven', 12, '2343434333', 'testEleven Street', 1, 1, 'Male', '2000-02-17', '56', '5.3'),
(13, 'TestPerson', 13, '4242342343', 'test person street', 1, 3, 'Male', '1997-08-22', '52', '5.5'),
(14, 'anotherPerson', 14, '2480934233', 'another person street', 1, 3, 'Male', '1999-05-11', '56', '5.3'),
(15, 'Shahkib', 15, '2424324234', 'slkafsdjlfdfdf', 1, 2, 'Male', '1989-12-12', '56', '4.5'),
(16, 'LastTest', 16, '2423434343', 'ladfjakdfd', 1, 4, 'Male', '1995-07-11', '51', '5.4'),
(17, 'Usman Khan', 18, '7247427843', 'street 667', 2, 3, 'Male', '2002-06-12', '51', '4.2'),
(18, 'Owais Ali', 24, '03369393043', 'malir cantt', 1, 2, 'Male', '2000-11-23', '70', '5.9'),
(19, 'Javed Rajpoot', 25, '03984839323', 'akd street', 2, 6, 'Male', '1992-02-18', '68', '5.7'),
(20, 'Shabbir', 27, '4832473034', 'sdfsd street', 2, 4, 'Male', '1987-05-11', '76', '5.8');

-- --------------------------------------------------------

--
-- Table structure for table `donoractivity`
--

CREATE TABLE `donoractivity` (
  `ActivityId` int(11) NOT NULL,
  `DonorId` int(11) DEFAULT NULL,
  `GroupId` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `DonationDate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donoractivity`
--

INSERT INTO `donoractivity` (`ActivityId`, `DonorId`, `GroupId`, `Quantity`, `DonationDate`) VALUES
(1, 9, 4, 500, '2022-12-06'),
(2, 9, 4, 300, '2023-06-17'),
(3, 19, 6, 300, '2023-07-25'),
(4, 18, 2, 250, '2023-07-25'),
(5, 10, 2, 400, '2023-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `fId` int(11) NOT NULL,
  `fQuestion` varchar(500) DEFAULT NULL,
  `fAnswer` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`fId`, `fQuestion`, `fAnswer`) VALUES
(1, 'How can I Register as a Blood Donor?', 'To register as a blood donor, simply visit our website and click on the \"Signup\" section on navbar. Fill out the required information, including your name, contact details, and any relevant medical history. Once you have completed the registration process, you will have access to your donor profile and can start scheduling blood donation appointments.'),
(2, 'How can healthcare facilities benefit from the this system?', 'Our system provides healthcare facilities with a range of benefits. They can efficiently manage their blood inventory, track expiration dates, and receive real-time notifications about urgent blood needs. The system also facilitates blood typing and matching, ensuring that compatible donors are connected with the right recipients. Additionally, healthcare facilities can generate reports and analytics to optimize their blood donation processes.'),
(3, 'How can I find nearby Blood Drives', 'Finding nearby blood drives is easy with our Blood Drive Locator feature. After logging into your donor account, navigate to the \"Blood Drives\" section and search for your location. Our system will display a list of upcoming blood drives in your area, along with their dates, times, and locations. You can select the most convenient option and schedule your appointment.'),
(4, 'Is my Pesonal Information safe?', 'Yes, we prioritize the privacy and security of your personal information. We adhere to strict data protection protocols and comply with all relevant privacy regulations. Your personal details are encrypted and stored securely in our system. We do not share your information with any third parties without your consent.'),
(5, 'Can I schedule an appointment to donate blood?', 'Yes, our system allows you to schedule appointments for blood donation. Once you have logged into your donor account, go to the \"Appointments\" section and select a date and time slot that works for you. If you need to reschedule or cancel an appointment, you can do so through the system as well.'),
(6, 'How can i involved in community Blood Drives?', 'We actively engage with the community by organizing blood drives and awareness campaigns. To get involved, keep an eye on our website \"Events\" section, where we post information about upcoming initiatives. You can participate as a volunteer, donor, or supporter. Together, we can make a positive impact and save lives through blood donation.'),
(7, 'What happens after i donate blood?', 'After donating blood, your contribution will be processed and tested to ensure its safety and compatibility. It will then be added to the blood inventory and made available for patients in need. You can track your donation history through your donor profile, which will reflect the date and location of your donation.'),
(8, 'How is my Privacy Protected?', 'We all to some extent are on an End of Life journey. For some of our clients and their family additional care and help is required as they progress through this journey. Care on Call work closely with.');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryId` int(11) NOT NULL,
  `CenterId` int(11) DEFAULT NULL,
  `GroupId` int(11) DEFAULT NULL,
  `DonorId` int(11) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `ExpirationDate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryId`, `CenterId`, `GroupId`, `DonorId`, `Quantity`, `ExpirationDate`) VALUES
(1, 1, 4, 9, 100, '2023-12-06'),
(2, 1, 4, 9, 300, '2024-06-17'),
(3, 2, 6, 19, 300, '2024-07-25'),
(4, 1, 2, 18, 250, '2024-07-26'),
(5, 1, 2, 10, 400, '2024-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `notificationreceiver`
--

CREATE TABLE `notificationreceiver` (
  `ReceiverId` int(11) NOT NULL,
  `NotificationId` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `CreatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notificationreceiver`
--

INSERT INTO `notificationreceiver` (`ReceiverId`, `NotificationId`, `UserId`, `status`, `CreatedAt`) VALUES
(1, 1, 9, 'seen', '2022-12-06 00:00:00'),
(2, 1, 9, 'seen', '2023-06-07 00:00:00'),
(3, 2, 7, 'seen', '2023-07-22 15:37:10'),
(4, 1, 10, 'seen', '2023-07-22 15:48:41'),
(5, 1, 18, 'seen', '2023-07-22 16:04:57'),
(6, 1, 24, 'seen', '2023-07-24 12:34:35'),
(7, 1, 25, 'recieved', '2023-07-24 12:54:44'),
(8, 2, 21, 'seen', '2023-07-24 17:02:05'),
(9, 1, 21, 'recieved', '2023-07-26 12:51:49'),
(10, 1, 22, 'recieved', '2023-07-26 12:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `NotificationId` int(11) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`NotificationId`, `Message`) VALUES
(1, 'Your appointment request has been approved, Check your My Schedule tab for more details'),
(2, 'Your appointment request has been declined'),
(3, 'Urgently seeking A+ blood donors in Karachi. Please visit our center or book an appointment on our website.');

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `Recipient` int(11) NOT NULL,
  `RecipientName` varchar(200) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `RecipientContact` varchar(100) NOT NULL,
  `RecipientAddress` varchar(500) NOT NULL,
  `CityId` int(11) NOT NULL,
  `GroupId` int(11) NOT NULL,
  `RecipientGender` varchar(50) NOT NULL,
  `RecipientDOB` varchar(100) NOT NULL,
  `RecipientWeight` varchar(50) NOT NULL,
  `RecipientHeight` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`Recipient`, `RecipientName`, `UserId`, `RecipientContact`, `RecipientAddress`, `CityId`, `GroupId`, `RecipientGender`, `RecipientDOB`, `RecipientWeight`, `RecipientHeight`) VALUES
(1, 'Hassan', 2, '239383', 'example street', 1, 1, 'Male', '0000-00-00', '49kg', '5.1ft'),
(2, 'TestRecipient', 17, '2443432434', 'alny street', 1, 2, 'Male', '1995-07-07', '56', '5.1'),
(3, 'Haider', 19, '2424724243', 'ytr road', 1, 3, 'Male', '2004-04-13', '47', '4.9'),
(4, 'Humayyun Khan', 20, '5647565454', 'Cannt road', 2, 2, 'Male', '1988-08-13', '55', '5.2'),
(5, 'Nabeel', 21, '2472843478', 'nhr street', 1, 4, 'Male', '2009-07-24', '49', '5.2'),
(6, 'Shahkeeb', 22, '2424234234', 'jdh street', 1, 4, 'Male', '2008-08-21', '42', '4.8'),
(7, 'Zubair', 26, '2984024003', 'hff street', 2, 8, 'Male', '1996-07-10', '65', '5.6');

-- --------------------------------------------------------

--
-- Table structure for table `requesttable`
--

CREATE TABLE `requesttable` (
  `RequestId` int(11) NOT NULL,
  `RecipientId` int(11) DEFAULT NULL,
  `DonorId` int(11) DEFAULT NULL,
  `GroupId` int(11) DEFAULT NULL,
  `Timings` varchar(100) NOT NULL,
  `RequestDate` varchar(100) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `CenterId` int(11) DEFAULT NULL,
  `RequestStatus` varchar(100) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requesttable`
--

INSERT INTO `requesttable` (`RequestId`, `RecipientId`, `DonorId`, `GroupId`, `Timings`, `RequestDate`, `Quantity`, `CenterId`, `RequestStatus`, `CreatedAt`, `UpdatedAt`) VALUES
(1, NULL, 9, 4, '9-12', '2022-12-06', 500, 1, 'confirmed', '2022-12-06 00:00:00', '2022-12-06 00:00:00'),
(2, NULL, 9, 4, '12-3', '2023-06-17', 300, 1, 'confirmed', '2023-06-17 00:00:00', '2023-06-17 00:00:00'),
(3, NULL, 10, 2, '9-12', '2023-07-28', 400, 1, 'confirmed', '2023-07-12 06:58:03', '2023-07-12 06:58:03'),
(4, NULL, 15, 2, '3-6', '2023-07-30', 320, 1, 'confirmed', '2023-07-12 07:00:22', '2023-07-12 07:00:22'),
(5, NULL, 15, 2, '12-3', '2023-08-03', 300, 1, 'cancelled', '2023-07-12 07:27:04', '2023-07-12 07:27:04'),
(6, 5, NULL, 4, '3-6', '2023-08-05', 200, 1, 'cancelled', '2023-07-14 00:08:27', '2023-07-14 00:08:27'),
(7, 6, NULL, 4, '3-6', '2023-08-03', 200, 1, 'confirmed', '2023-07-15 01:52:26', '2023-07-15 01:52:26'),
(8, NULL, 7, 3, '12-3', '2023-08-04', 200, 1, 'cancelled', '2023-07-22 15:23:38', '2023-07-22 15:23:38'),
(9, NULL, 17, 3, '3-6', '2023-08-01', 300, 2, 'confirmed', '2023-07-22 16:01:57', '2023-07-22 16:01:57'),
(10, NULL, 18, 2, '9-12', '2023-07-25', 250, 1, 'confirmed', '2023-07-24 12:34:06', '2023-07-24 12:34:06'),
(11, NULL, 19, 6, '3-6', '2023-07-25', 300, 2, 'confirmed', '2023-07-24 12:54:08', '2023-07-24 12:54:08'),
(12, 5, NULL, 4, '9-12', '2023-07-26', 200, 1, 'confirmed', '2023-07-24 17:03:28', '2023-07-24 17:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `RoleName`) VALUES
(1, 'Donor'),
(2, 'Recipient'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `UserEmail` varchar(100) NOT NULL,
  `UserPassword` varchar(65) NOT NULL,
  `UserStatus` varchar(100) DEFAULT NULL,
  `RoleId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `UserEmail`, `UserPassword`, `UserStatus`, `RoleId`) VALUES
(1, 'Khurram', 'khurram@gmail.com', 'khurram', 'active', 1),
(2, 'testUserTwo', 'two@gmail.com', 'two', 'active', 2),
(3, 'testUserThree', 'three@gmail.com', 'three', 'active', 1),
(4, 'dusra', 'four@gmail.com', '$2y$10$Gb9pDjXRFJhfC9rpWzFYQeObVbfY7L57c5vuPSqGCrjbqSKunk1kG', 'active', 1),
(5, 'adfdsdf', 'any@gmail.com', '$2y$10$jv8zchewW5f2xEp.H69EkukxKqkmK0o4RfGIp.BzuNqUUBkvsOFYu', 'active', 1),
(6, 'jkfsg', 'five@gmail.com', '$2y$10$8tvcNQTi.SUv8n1yygIdj.kF2HCf16CXpXZqNiW7KRKUQeGlj2L8u', 'active', 1),
(7, 'Shahid', 'shahid@gmail.com', '$2y$10$cdKU0b3JSTM9YReO7kswmODAeoY1JAJqd9JCLFPiMs83xeunSwQnu', 'active', 1),
(8, 'kuchbhi', 'anybody@gmail.com', '$2y$10$cYXA1H70n9BPfZObCxLSbeKCZA.VcT6xaKf0vNgWl3DA5vTci90vq', 'active', 1),
(9, 'Sohail Khan', 'sohail@gmail.com', '$2y$10$DuNN8eWg6v0RyOmFMJV3POf1brr2AOyn2jS48IouWjD3fHVM2IbeO', 'active', 1),
(10, 'Imran Khan', 'imran@gmail.com', '$2y$10$LtH8lgS0Th14r.mMTYAUGu6SoVHUGp4VAMlHIU.T2eda9fFYbNniK', 'active', 1),
(11, 'TestTen', 'testten@gmail.com', '$2y$10$wQHDyzdUoRhqTFjnAhHVMukVwXRh.3HnwAOTkuGpRz3y/yeDYsETO', 'active', 1),
(12, 'TestEleven', 'testeleven@gmail.com', '$2y$10$Kksrgkcb3vbg8LQ1XuW9gOpkfeL0koZKNNy..ObkHSGUdzkXCh/Ou', 'active', 1),
(13, 'TestPerson', 'testperson@gmail.com', '$2y$10$lWQsF/Zml.R5MRhN/BqWceI/bPHQP.4zU65t1Lie8IYBAK.6XQG9W', 'active', 1),
(14, 'anotherPerson', 'anotherperson@gmail.com', '$2y$10$1JbexJnIpSzkm.sThyovaOxdS8i.Y2fxxzFKi4VnArFQ0/8WMsocO', 'active', 1),
(15, 'Shahkib', 'shahkib@gmail.com', '$2y$10$.XgLo6WBajlrtW5LZunM3uHKo2T9St/PLFayssmxslgnpVp16ZjWi', 'active', 1),
(16, 'LastTest', 'lasttest@gmail.com', '$2y$10$.A907uB3nBHkzv5sroWA4.IlrSSLW1L8rXbq88eLpAIFKhEAmf1tW', 'active', 1),
(17, 'TestRecipient', 'testrecipient@gmail.com', '$2y$10$f9YCZPJHdn0YkKJLsx3xuujD6Ks8VRo8SLMhPxOPuYBIrJU1yhO4m', 'active', 2),
(18, 'Usman Khan', 'usman@gmail.com', '$2y$10$D2TkU40fFZ9eV38Mw17CJOuhz5BFs81nGsUtvH9s0IoTtvR1a8ufW', 'active', 1),
(19, 'Haider', 'haider@gmail.com', '$2y$10$U.zDVHtRdr7/QEE2a5FTCeJNzywG7wnEJkvbyWRx4A4CKyTxLyQQO', 'active', 2),
(20, 'Humayyun Khan', 'humayyun@gmail.com', '$2y$10$Br8D.bsvAxCazXms0C1jOuC4EDr9l//U/hOstuBsVkfjgi3daHmGG', 'active', 2),
(21, 'Nabeel', 'nabeel@gmail.com', '$2y$10$qhggYt43FU8pNkH8eeALQ.hVT1XURLjZkInhNqYEUwYNlVn/32oh2', 'active', 2),
(22, 'Shahkeeb', 'shahkeeb@gmail.com', '$2y$10$FiQ54rIGn4JIwvtIqtJVeOi.1TKej4ktPf6hJsYppyTfjQHf2E8eC', 'active', 2),
(23, 'Admin', 'admin@gmail.com', '$2y$10$J8LXc7m6xLEwAeWwOcBy4OwowLWp1f9EtntDJYrsyYx8e61NzvcW.', 'active', 3),
(24, 'Owais Ali', 'owais@gmail.com', '$2y$10$nu/YU0E5LXHBTWZ31RdPLOzLtO.j7aid.Zt/6UNL8T.GaaTirgu7K', 'active', 1),
(25, 'Javed Rajpoot', 'javed@gmail.com', '$2y$10$RmDZAaGib6f.BTJVQwhaYuqt1fTNHHh2ARVXswPWNwblbqQi.J.KS', 'active', 1),
(26, 'Zubair', 'zubair@gmail.com', '$2y$10$iMwPiFkF10Z7Pjlm06l8xOo8s7krd/biUPby2XMrMShIh3mKGU2S2', 'active', 2),
(27, 'Shabbir', 'shabbir@gmail.com', '$2y$10$m1Aa6KmqnldI./h9ngnbo.2ybWChkV9GGhIwcm5jVpFgDuVYKbsBG', 'active', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AppointmentId`),
  ADD KEY `RequestId` (`RequestId`);

--
-- Indexes for table `appointmentinventory`
--
ALTER TABLE `appointmentinventory`
  ADD PRIMARY KEY (`aiId`),
  ADD KEY `AppointmentId` (`AppointmentId`),
  ADD KEY `InventoryId` (`InventoryId`);

--
-- Indexes for table `bloodcenter`
--
ALTER TABLE `bloodcenter`
  ADD PRIMARY KEY (`CenterId`),
  ADD KEY `CityId` (`CityId`);

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `donationdrive`
--
ALTER TABLE `donationdrive`
  ADD PRIMARY KEY (`DriveId`),
  ADD KEY `CenterId` (`CenterId`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`DonorId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `CityId` (`CityId`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `donoractivity`
--
ALTER TABLE `donoractivity`
  ADD PRIMARY KEY (`ActivityId`),
  ADD KEY `DonorId` (`DonorId`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`fId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryId`),
  ADD KEY `CenterId` (`CenterId`),
  ADD KEY `GroupId` (`GroupId`),
  ADD KEY `DonorId` (`DonorId`);

--
-- Indexes for table `notificationreceiver`
--
ALTER TABLE `notificationreceiver`
  ADD PRIMARY KEY (`ReceiverId`),
  ADD KEY `NotificationId` (`NotificationId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`NotificationId`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`Recipient`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `CityId` (`CityId`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `requesttable`
--
ALTER TABLE `requesttable`
  ADD PRIMARY KEY (`RequestId`),
  ADD KEY `RecipientId` (`RecipientId`),
  ADD KEY `DonorId` (`DonorId`),
  ADD KEY `CenterId` (`CenterId`),
  ADD KEY `GroupId` (`GroupId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `RoleId` (`RoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AppointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `appointmentinventory`
--
ALTER TABLE `appointmentinventory`
  MODIFY `aiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bloodcenter`
--
ALTER TABLE `bloodcenter`
  MODIFY `CenterId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donationdrive`
--
ALTER TABLE `donationdrive`
  MODIFY `DriveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `DonorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `donoractivity`
--
ALTER TABLE `donoractivity`
  MODIFY `ActivityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `fId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notificationreceiver`
--
ALTER TABLE `notificationreceiver`
  MODIFY `ReceiverId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `NotificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recipient`
--
ALTER TABLE `recipient`
  MODIFY `Recipient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `requesttable`
--
ALTER TABLE `requesttable`
  MODIFY `RequestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`RequestId`) REFERENCES `requesttable` (`RequestId`);

--
-- Constraints for table `appointmentinventory`
--
ALTER TABLE `appointmentinventory`
  ADD CONSTRAINT `appointmentinventory_ibfk_1` FOREIGN KEY (`AppointmentId`) REFERENCES `appointment` (`AppointmentId`),
  ADD CONSTRAINT `appointmentinventory_ibfk_2` FOREIGN KEY (`InventoryId`) REFERENCES `inventory` (`InventoryId`);

--
-- Constraints for table `bloodcenter`
--
ALTER TABLE `bloodcenter`
  ADD CONSTRAINT `bloodcenter_ibfk_1` FOREIGN KEY (`CityId`) REFERENCES `city` (`CityId`);

--
-- Constraints for table `donationdrive`
--
ALTER TABLE `donationdrive`
  ADD CONSTRAINT `donationdrive_ibfk_1` FOREIGN KEY (`CenterId`) REFERENCES `bloodcenter` (`CenterId`);

--
-- Constraints for table `donor`
--
ALTER TABLE `donor`
  ADD CONSTRAINT `donor_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `donor_ibfk_2` FOREIGN KEY (`CityId`) REFERENCES `city` (`CityId`),
  ADD CONSTRAINT `donor_ibfk_3` FOREIGN KEY (`GroupId`) REFERENCES `bloodgroup` (`GroupId`);

--
-- Constraints for table `donoractivity`
--
ALTER TABLE `donoractivity`
  ADD CONSTRAINT `donoractivity_ibfk_1` FOREIGN KEY (`DonorId`) REFERENCES `donor` (`DonorId`),
  ADD CONSTRAINT `donoractivity_ibfk_2` FOREIGN KEY (`GroupId`) REFERENCES `bloodgroup` (`GroupId`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`CenterId`) REFERENCES `bloodcenter` (`CenterId`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`GroupId`) REFERENCES `bloodgroup` (`GroupId`);

--
-- Constraints for table `notificationreceiver`
--
ALTER TABLE `notificationreceiver`
  ADD CONSTRAINT `notificationreceiver_ibfk_1` FOREIGN KEY (`NotificationId`) REFERENCES `notifications` (`NotificationId`),
  ADD CONSTRAINT `notificationreceiver_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);

--
-- Constraints for table `recipient`
--
ALTER TABLE `recipient`
  ADD CONSTRAINT `recipient_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `recipient_ibfk_2` FOREIGN KEY (`CityId`) REFERENCES `city` (`CityId`),
  ADD CONSTRAINT `recipient_ibfk_3` FOREIGN KEY (`GroupId`) REFERENCES `bloodgroup` (`GroupId`);

--
-- Constraints for table `requesttable`
--
ALTER TABLE `requesttable`
  ADD CONSTRAINT `requesttable_ibfk_1` FOREIGN KEY (`RecipientId`) REFERENCES `recipient` (`Recipient`),
  ADD CONSTRAINT `requesttable_ibfk_2` FOREIGN KEY (`DonorId`) REFERENCES `donor` (`DonorId`),
  ADD CONSTRAINT `requesttable_ibfk_3` FOREIGN KEY (`CenterId`) REFERENCES `bloodcenter` (`CenterId`),
  ADD CONSTRAINT `requesttable_ibfk_4` FOREIGN KEY (`GroupId`) REFERENCES `bloodgroup` (`GroupId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleId`) REFERENCES `role` (`RoleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
