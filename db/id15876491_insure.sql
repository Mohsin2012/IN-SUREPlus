-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 06:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15876491_insure`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`id15876491_dbname`@`%` PROCEDURE `Basic_cursor` (IN `userid` INT(10) UNSIGNED)  NO SQL
BEGIN
   DECLARE Policy_Nam,Policy_Compan,dat TEXT;
   DECLARE Policy_N,Monthly_Pa,Total_Yea,User_I,Coverag INTEGER;
   DECLARE exit_loop BOOLEAN DEFAULT FALSE;
   DECLARE basic_pol CURSOR FOR SELECT   Policy_no,Policy_name,Policy_company,Monthly_pay,Total_year,User_id,Coverage,date FROM norm_category;
   DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop=TRUE;
   OPEN basic_pol;
   basic_loop: LOOP
       FETCH FROM Basic_pol INTO Policy_N,Policy_Nam,Policy_Compan,Monthly_Pa,Total_Yea,User_I,Coverag,dat;
       IF exit_loop THEN
            LEAVE basic_loop;
       END IF;
       IF User_I=userid THEN 
           SELECT Policy_N,Policy_Nam,Policy_Compan,Monthly_Pa,Total_Yea,User_I,Coverag,dat;
        END IF;
        END LOOP Basic_loop;
        CLOSE basic_pol;
        END$$

CREATE DEFINER=`id15876491_dbname`@`%` PROCEDURE `claim_cursor` (IN `User_id` INT(11))  NO SQL
BEGIN
   DECLARE Policy_Nam,Policy_Cate,Policy_Compan TEXT;
   DECLARE Policy_N,User_I,paymen INTEGER;
   DECLARE exit_loop BOOLEAN DEFAULT FALSE;
   DECLARE claim CURSOR FOR SELECT   userid,p_id,policy_name,policy_cat,Policy_company,payment FROM claim_req;
   DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop=TRUE;
   OPEN claim;
   claim_loop: LOOP
       FETCH FROM claim INTO User_I,Policy_N,Policy_Nam,Policy_Cate,Policy_Compan,paymen;
       IF exit_loop THEN
            LEAVE claim_loop;
       END IF;
       IF User_I=User_id THEN 
           SELECT User_I,Policy_N,Policy_Nam,Policy_Cate,Policy_Compan,paymen;
        END IF;
        END LOOP claim_loop;
        CLOSE claim;
        END$$

CREATE DEFINER=`id15876491_dbname`@`%` PROCEDURE `claim_log_cursor` (IN `User_id` INT(11))  NO SQL
BEGIN
   DECLARE Policy_Nam,Policy_Cate,Policy_Compan,statu,dat TEXT;
   DECLARE I_d,Policy_N,User_I INTEGER;
   DECLARE exit_loop BOOLEAN DEFAULT FALSE;
   DECLARE claim_log CURSOR FOR SELECT   id,userid,pid,policy_name,policy_comp,policy_cat,status,t_stamp FROM claim_log;
   DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop=TRUE;
   OPEN claim_log;
   claim_loop: LOOP
       FETCH FROM claim_log INTO I_d,User_I,Policy_N,Policy_Nam,Policy_Compan,Policy_Cate,statu,dat;
       IF exit_loop THEN
            LEAVE claim_loop;
       END IF;
       IF User_I=User_id THEN 
           SELECT I_d,User_I,Policy_N,Policy_Nam,Policy_Compan,Policy_Cate,statu,dat;
        END IF;
        END LOOP claim_loop;
        CLOSE claim_log;
        END$$

CREATE DEFINER=`id15876491_dbname`@`%` PROCEDURE `getuser` (IN `username` VARCHAR(15), IN `password` VARCHAR(15))  SELECT * FROM login WHERE login.Username= username AND login.Password= md5(password)$$

CREATE DEFINER=`id15876491_dbname`@`%` PROCEDURE `payment_log_pro` (IN `user_id` INT(11))  NO SQL
SELECT * FROM pay_log WHERE userid=user_id$$

CREATE DEFINER=`id15876491_dbname`@`%` PROCEDURE `Prem_cursor` (IN `userid` INT(10) UNSIGNED)  NO SQL
BEGIN
   DECLARE Policy_Nam,Policy_Compan,dat TEXT;
   DECLARE Policy_N,Monthly_Pa,Total_Yea,User_I,Coverag INTEGER;
   DECLARE exit_loop BOOLEAN DEFAULT FALSE;
   DECLARE basic_pol CURSOR FOR SELECT   Policy_no,Policy_name,Policy_company,Monthly_pay,Total_year,User_id,Coverage,date FROM prem_category;
   DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop=TRUE;
   OPEN basic_pol;
   basic_loop: LOOP
       FETCH FROM Basic_pol INTO Policy_N,Policy_Nam,Policy_Compan,Monthly_Pa,Total_Yea,User_I,Coverag,dat;
       IF exit_loop THEN
            LEAVE basic_loop;
       END IF;
       IF User_I=userid THEN 
           SELECT Policy_N,Policy_Nam,Policy_Compan,Monthly_Pa,Total_Yea,User_I,Coverag,dat;
        END IF;
        END LOOP Basic_loop;
        CLOSE basic_pol;
        END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `amt_sum`
-- (See below for the actual view)
--
CREATE TABLE `amt_sum` (
`amt_sum` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `claim_log`
--

CREATE TABLE `claim_log` (
  `id` int(20) NOT NULL,
  `userid` int(20) NOT NULL,
  `pid` int(20) NOT NULL,
  `policy_name` varchar(20) NOT NULL,
  `policy_comp` varchar(20) NOT NULL,
  `policy_cat` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `t_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claim_log`
--

INSERT INTO `claim_log` (`id`, `userid`, `pid`, `policy_name`, `policy_comp`, `policy_cat`, `status`, `t_stamp`) VALUES
(1, 1, 1, 'Home Insurance', 'HDFC', ' BASIC', 'Claimed', '2021-01-10 14:29:27'),
(2, 2, 2, 'Life Insurance', 'Kotak Mahindra', ' BASIC', 'Claimed', '2021-01-10 14:48:40'),
(3, 3, 1, 'Life Insurance', 'TATA', ' PREMIUM', 'Claimed', '2021-01-10 14:48:42'),
(4, 4, 2, 'Health Insurance', 'Kotak Mahindra', ' PREMIUM', 'Claimed', '2021-01-10 14:48:43'),
(5, 5, 3, 'Home Insurance', 'LIC', ' BASIC', 'Claimed', '2021-01-10 14:48:45'),
(6, 6, 3, 'Car Insurance', 'LIC', ' PREMIUM', 'Claimed', '2021-01-10 15:01:53'),
(7, 7, 4, 'Life Insurance', 'Kotak Mahindra', ' BASIC', 'Claimed', '2021-01-10 15:01:55'),
(8, 8, 5, 'Car Insurance', 'TATA', ' BASIC', 'Claimed', '2021-01-10 15:01:56'),
(9, 9, 4, 'Home Insurance', 'HDFC', ' PREMIUM', 'Claimed', '2021-01-10 15:01:57'),
(10, 10, 5, 'Car Insurance', 'LIC', ' PREMIUM', 'Claimed', '2021-01-10 15:01:58'),
(11, 11, 6, 'Home Insurance', 'Kotak Mahindra', ' BASIC', 'Claimed', '2021-01-10 15:16:44'),
(12, 12, 6, 'Health Insurance', 'HDFC', ' PREMIUM', 'Claimed', '2021-01-10 15:16:46'),
(13, 13, 7, 'Health Insurance', 'TATA', ' BASIC', 'Claimed', '2021-01-11 12:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `claim_req`
--

CREATE TABLE `claim_req` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `policy_name` varchar(20) NOT NULL,
  `policy_cat` varchar(20) NOT NULL,
  `Policy_company` varchar(20) NOT NULL,
  `payment` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claim_req`
--

INSERT INTO `claim_req` (`id`, `userid`, `p_id`, `policy_name`, `policy_cat`, `Policy_company`, `payment`) VALUES
(14, 14, 8, 'Health Insurance', ' BASIC', 'LIC', 1),
(15, 15, 7, 'Car Insurance', ' PREMIUM', 'TATA', 1),
(17, 21, 11, 'Health Insurance', ' PREMIUM', 'TATA', 1);

--
-- Triggers `claim_req`
--
DELIMITER $$
CREATE TRIGGER `claim_log` BEFORE DELETE ON `claim_req` FOR EACH ROW INSERT INTO `claim_log` (`id`, `userid`, `pid`, `policy_name`, `policy_comp`, `policy_cat`,`status`, `t_stamp`) VALUES (NULL, OLD.userid, OLD.p_id, OLD.policy_name, OLD.Policy_company, OLD.policy_cat, "Claimed", current_timestamp())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `claim_view`
-- (See below for the actual view)
--
CREATE TABLE `claim_view` (
`claim_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sno` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sno`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Kent Snow', 'kentsnow@hotmail.com', 'Regarding More infor', 'I am Kent Snow, I am interested in your insurance Schemes Please give me more information about claims .');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Userid` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Userid`, `Username`, `Password`, `Status`) VALUES
(6, 'Ahisma75665', 'e89fbc89f06dc2925d1c9d2d8454fbd7', 1),
(7, 'Samant50786', '2ee2d13e261516d8d0e59c491979a7dc', 1),
(8, 'Rati7672', '57dad62353b9e611006c95a5084d594b', 1),
(9, 'Kumara547456', 'd370c9e4a404da5fb6faf6f6979f86e4', 1),
(10, 'Indumat6341', '7c9361d18d8f75d322e6c643e6de003d', 1),
(11, 'Bhishma34523', '3015d174ab54e6f300e7950502671d22', 1),
(12, 'Karma978', '802a8d71766c8cfb846fa3166d68a855', 1),
(14, 'Kanya9032', 'cddaff59bf84efc84e49908a693aa70b', 1),
(15, 'Vasu23424', 'af9927602cd501f7fa1b1667d96ce62a', 1),
(16, 'Rohan123', '3a714e83fb94eb56bcec1a92742b9113', 1),
(17, 'Rakesh123', '166fb6710ec46c1f24d88c0bb86827dd', 1),
(18, 'Monika123', 'aea37482e7798de0bf0b9a421786c8dc', 1),
(19, 'Atlas124', 'adcef5e1ba699b45429de0ff70908352', 1),
(20, 'Aniket123', '3ff3ccd77ea04ba54ec2d264539d40ae', 1),
(21, 'Dasa32532', '6db1c58e276a31101fb2a05f1d98f29c', 1),
(22, 'Ronit342', '2db1986c2ebfec2e263e94b665b6cedb', 1),
(23, 'Paparazzi123', '0482ac37dcb10f120170c74e83092556', 1);

-- --------------------------------------------------------

--
-- Table structure for table `norm_category`
--

CREATE TABLE `norm_category` (
  `Policy_no` int(20) NOT NULL,
  `Policy_name` varchar(20) DEFAULT NULL,
  `Policy_company` varchar(30) DEFAULT NULL,
  `Monthly_pay` int(20) DEFAULT NULL,
  `Total_year` int(10) DEFAULT NULL,
  `User_id` varchar(30) DEFAULT NULL,
  `Coverage` int(10) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `norm_category`
--

INSERT INTO `norm_category` (`Policy_no`, `Policy_name`, `Policy_company`, `Monthly_pay`, `Total_year`, `User_id`, `Coverage`, `date`) VALUES
(8, 'Health Insurance', 'LIC', 6199, 23, '14', 5000000, '2021-01-10 15:12:38'),
(9, 'Life Insurance', 'TATA', 4999, 22, '17', 3000000, '2021-01-10 15:49:05'),
(10, 'Home Insurance', 'TATA', 4999, 22, '19', 3000000, '2021-01-10 16:04:02'),
(11, 'Health Insurance', 'TATA', 4990, 23, '22', 3100000, '2021-01-13 16:57:15'),
(12, 'Home Insurance', 'LIC', 6150, 23, '23', 4900000, '2021-01-14 12:56:47');

--
-- Triggers `norm_category`
--
DELIMITER $$
CREATE TRIGGER `dlt_from_user` BEFORE DELETE ON `norm_category` FOR EACH ROW DELETE FROM `user_policy` WHERE `user_policy`.`User_id` = OLD.User_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_to_user` AFTER INSERT ON `norm_category` FOR EACH ROW INSERT INTO `user_policy` (`User_id`, `cat`, `Policy_no`, `Policy_name`, `Policy_company`, `Monthly_pay`, `Total_year`, `Coverage`, `date`) VALUES (NEW.User_id, 'BASIC', NEW.Policy_no, NEW.Policy_name, NEW.Policy_company, NEW.Monthly_pay, NEW.Total_year, NEW.Coverage, NEW.date)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updt_to_user` AFTER UPDATE ON `norm_category` FOR EACH ROW UPDATE `user_policy` SET `Policy_name`= NEW.Policy_name, `Policy_company`= NEW.Policy_company, `Monthly_pay`= NEW.Monthly_pay, `Total_year`= NEW.Total_year, `Coverage`= NEW.Coverage WHERE `User_id`= OLD.User_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `norm_view`
-- (See below for the actual view)
--
CREATE TABLE `norm_view` (
`norm_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `sno` int(20) NOT NULL,
  `User_id` int(11) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `card_no` bigint(16) NOT NULL,
  `exp_mon` int(2) NOT NULL,
  `exp_year` int(4) NOT NULL,
  `cvv` int(3) NOT NULL,
  `amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`sno`, `User_id`, `full_name`, `card_no`, `exp_mon`, `exp_year`, `cvv`, `amt`) VALUES
(1, 1, 'Umed Jhombarkar', 7757857857769585, 12, 2022, 475, 5999),
(2, 2, 'Harischandra Vohra', 7858585675656757, 12, 2021, 324, 6399),
(3, 3, 'Ganesh Prasad', 8568585856856885, 3, 2021, 123, 7999),
(4, 4, 'Brahma Gupte', 7968567676686868, 4, 2022, 424, 8999),
(5, 5, 'Sohalia Hegde', 9797897989879798, 5, 2023, 546, 6199),
(6, 6, 'Ahisma Kata', 6545636966679679, 7, 2022, 657, 8599),
(7, 7, 'Samantaka Choudhary', 4309878667566575, 3, 2022, 768, 6399),
(8, 8, 'Rati Mohan', 7978968678678674, 1, 2021, 564, 4999),
(9, 9, 'Kumara Bhalla', 7085634235109860, 9, 2021, 675, 8199),
(10, 10, 'Indumati Srivastava', 9623213213131231, 11, 2022, 42, 8599),
(11, 11, 'Bhishma Rajan', 9809979778978896, 11, 2023, 432, 6399),
(12, 12, 'Karma Sen', 2346769754464464, 12, 2022, 242, 8199),
(13, 13, 'Lakshmana Arya', 6798567567575675, 4, 2021, 241, 4999),
(14, 14, 'Kanya Dhillon', 7845753634636363, 12, 2021, 634, 6199),
(15, 15, 'Vasu Narasimhan', 7969767557467456, 2, 2022, 897, 7999),
(16, 21, 'ewrw wrwr', 9679696846745747, 12, 2021, 354, 7999);

-- --------------------------------------------------------

--
-- Table structure for table `pay_log`
--

CREATE TABLE `pay_log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `pid` int(10) NOT NULL,
  `policy_name` varchar(20) NOT NULL,
  `policy_comp` varchar(20) NOT NULL,
  `policy_cat` varchar(10) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `t_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_log`
--

INSERT INTO `pay_log` (`id`, `userid`, `pid`, `policy_name`, `policy_comp`, `policy_cat`, `Amount`, `Status`, `t_stamp`) VALUES
(1, 1, 1, 'Home Insurance', 'HDFC', ' BASIC', 5999, 'Paid', '2021-01-10 14:27:25'),
(2, 2, 2, 'Life Insurance', 'Kotak Mahindra', ' BASIC', 6399, 'Paid', '2021-01-10 14:33:04'),
(3, 3, 1, 'Life Insurance', 'TATA', ' PREMIUM', 7999, 'Paid', '2021-01-10 14:37:31'),
(4, 4, 2, 'Health Insurance', 'Kotak Mahindra', ' PREMIUM', 8999, 'Paid', '2021-01-10 14:41:43'),
(5, 5, 3, 'Home Insurance', 'LIC', ' BASIC', 6199, 'Paid', '2021-01-10 14:48:18'),
(6, 6, 3, 'Car Insurance', 'LIC', ' PREMIUM', 8599, 'Paid', '2021-01-10 14:51:22'),
(7, 7, 4, 'Life Insurance', 'Kotak Mahindra', ' BASIC', 6399, 'Paid', '2021-01-10 14:53:54'),
(8, 8, 5, 'Car Insurance', 'TATA', ' BASIC', 4999, 'Paid', '2021-01-10 14:56:02'),
(9, 9, 4, 'Home Insurance', 'HDFC', ' PREMIUM', 8199, 'Paid', '2021-01-10 14:58:20'),
(10, 10, 5, 'Car Insurance', 'LIC', ' PREMIUM', 8599, 'Paid', '2021-01-10 15:01:11'),
(11, 11, 6, 'Home Insurance', 'Kotak Mahindra', ' BASIC', 6399, 'Paid', '2021-01-10 15:05:07'),
(12, 12, 6, 'Health Insurance', 'HDFC', ' PREMIUM', 8199, 'Paid', '2021-01-10 15:07:21'),
(13, 13, 7, 'Health Insurance', 'TATA', ' BASIC', 4999, 'Paid', '2021-01-10 15:10:33'),
(14, 14, 8, 'Health Insurance', 'LIC', ' BASIC', 6199, 'Paid', '2021-01-10 15:13:01'),
(15, 15, 7, 'Car Insurance', 'TATA', ' PREMIUM', 7999, 'Paid', '2021-01-10 15:16:15'),
(16, 21, 11, 'Health Insurance', 'TATA', ' PREMIUM', 7999, 'Paid', '2021-01-11 12:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `prem_category`
--

CREATE TABLE `prem_category` (
  `Policy_no` int(20) NOT NULL,
  `Policy_name` varchar(20) DEFAULT NULL,
  `Policy_company` varchar(30) DEFAULT NULL,
  `Monthly_pay` int(20) DEFAULT NULL,
  `Total_year` int(10) DEFAULT NULL,
  `User_id` varchar(30) DEFAULT NULL,
  `Coverage` int(10) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prem_category`
--

INSERT INTO `prem_category` (`Policy_no`, `Policy_name`, `Policy_company`, `Monthly_pay`, `Total_year`, `User_id`, `Coverage`, `date`) VALUES
(7, 'Car Insurance', 'TATA', 7999, 20, '15', 5000000, '2021-01-10 15:15:43'),
(8, 'Car Insurance', 'TATA', 7999, 20, '16', 5000000, '2021-01-10 15:44:42'),
(9, 'Health Insurance', 'Kotak Mahindra', 8999, 21, '18', 10000000, '2021-01-10 15:54:49'),
(10, 'Health Insurance', 'Kotak Mahindra', 8999, 21, '20', 10000000, '2021-01-10 16:11:35'),
(11, 'Health Insurance', 'TATA', 7999, 20, '21', 5000000, '2021-01-11 12:52:52');

--
-- Triggers `prem_category`
--
DELIMITER $$
CREATE TRIGGER `dlt_from_user_pre` BEFORE DELETE ON `prem_category` FOR EACH ROW DELETE FROM `user_policy` WHERE `user_policy`.`User_id` = OLD.User_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_to_user_pre` AFTER INSERT ON `prem_category` FOR EACH ROW INSERT INTO `user_policy` (`User_id`, `cat`, `Policy_no`, `Policy_name`, `Policy_company`, `Monthly_pay`, `Total_year`, `Coverage`, `date`) VALUES (NEW.User_id, 'PREMIUM', NEW.Policy_no, NEW.Policy_name, NEW.Policy_company, NEW.Monthly_pay, NEW.Total_year, NEW.Coverage, NEW.date)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updt_to_user_pre` AFTER UPDATE ON `prem_category` FOR EACH ROW UPDATE `user_policy` SET `Policy_name`= NEW.Policy_name, `Policy_company`= NEW.Policy_company, `Monthly_pay`= NEW.Monthly_pay, `Total_year`= NEW.Total_year, `Coverage`= NEW.Coverage WHERE `User_id`= OLD.User_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `prem_view`
-- (See below for the actual view)
--
CREATE TABLE `prem_view` (
`prem_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_user`
-- (See below for the actual view)
--
CREATE TABLE `total_user` (
`total_user` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Userid` int(11) NOT NULL,
  `Firstname` varchar(15) NOT NULL,
  `Lastname` varchar(15) NOT NULL,
  `Mobile` bigint(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Regdate` date DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Userid`, `Firstname`, `Lastname`, `Mobile`, `Email`, `dob`, `Address`, `Regdate`, `Gender`) VALUES
(6, 6, 'Ahisma', 'Kata', 7678679897, '37kyoot6r5j@temporary-mai', '1965-12-31', '23 , Parliament Street, Connaught Place, Delhi, In', '2021-01-10', 'Female'),
(7, 7, 'Samantaka', 'Choudhary', 6799597697, 'rj4oc3wjlap@temporary-mai', '1980-02-15', 'Ground Floor, 152, Narayan Dhuru Street, Nagdevi, ', '2021-01-10', 'Male'),
(8, 8, 'Rati', 'Mohan', 5464987978, 'vsmcvxg8b1j@temporary-mai', '1986-02-07', '21 , Amman Koil St, Vadapalani, Tamil Nadu, India', '2021-01-10', 'Female'),
(9, 9, 'Kumara', 'Bhalla', 8686767869, '5e8xre0vg8w@temporary-mai', '1967-10-12', 'Krishna Apt, Shop No.2, Pada No. 4, Lokmanya Nagar', '2021-01-10', 'Male'),
(10, 10, 'Indumati', 'Srivastava', 9532198313, '7k91coh3p6q@temporary-mai', '1951-06-22', '38 , Venkateswara Colony th St, Madhavaram Milk Co', '2021-01-10', 'Female'),
(11, 11, 'Bhishma', 'Rajan', 9897543549, 'ypku8janxyb@temporary-mai', '1968-10-03', '74  Dr V B Gandhi Marg, Maharashtra, India', '2021-01-10', 'Male'),
(12, 12, 'Karma', 'Sen', 6858595959, 'ow841tef13q@temporary-mai', '1979-01-25', 'Shop No.13, Sector 5, Belapur (cbd), Maharashtra, ', '2021-01-10', 'Female'),
(14, 14, 'Kanya', 'Dhillon', 8234023053, 'rigt0zdnqcd@temporary-mai', '1986-06-20', '509 , Anand Bldg, Dr. B Ambedkar Road, Opp.girnar ', '2021-01-10', 'Female'),
(15, 15, 'Vasu', 'Narasimhan', 7535298453, '8bu0m1ekepg@temporary-mai', '1986-09-16', 'Ardeshir Dady Cross Lane, C P Tank, Maharashtra, I', '2021-01-10', 'Male'),
(16, 16, 'Rohan', 'Roy', 9890568564, 'roy@gmail.com', '2002-02-28', 'Ground Floor, 234, mohan Dhuru Street, Nagdevi, , ', '2021-01-10', 'Male'),
(17, 17, 'Rakesh', 'Patil', 9568956485, 'rakesh@gmail.com', '2002-12-12', '45 mk star, Bharat nagar,nagpur, maharashtra, indi', '2021-01-10', 'Male'),
(18, 18, 'Monika', 'Kale', 9856456522, 'monika12@gmail.com', '2002-12-12', '76 kingstar building,lajpat nagar,latur  411025, m', '2021-01-10', 'Female'),
(19, 19, 'Atlas ', 'Smith', 6597845121, 'atlas@gmail.com', '1999-02-11', '155  morgan building,jambu nagar ,chennai,india', '2021-01-10', 'Male'),
(20, 20, 'Aniket', 'mote', 9564256525, 'mote@gmail.com', '1998-06-18', '55 pimple ,Pune City East,, Maharashtra, India', '2021-01-10', 'Male'),
(21, 21, 'Raj', 'Sharma', 8797976868, 'raj1221sharma@gmail.com', '2002-12-05', 'Orchid Heights, Mahalakshmi, Arthur Road, Mumbai, Maharashtra, India', '2021-01-11', 'Male'),
(22, 22, 'Ronit', 'Roy', 7968696796, 'megaprime1220@gmail.com', '1989-01-10', 'Hours or services may differ Dynasty Buiness Park, Andheri - Kurla Rd, Vijay Nagar Colony, J B Nagar', '2021-01-13', 'Male'),
(23, 23, 'rahul', 'roy', 9077897897, 'boldeagle002@gmail.com', '2002-12-19', 'Plot No 145, Sector 23, Ulwe, Navi Mumbai, Maharashtra, India', '2021-01-14', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `user_policy`
--

CREATE TABLE `user_policy` (
  `User_id` varchar(30) NOT NULL,
  `Policy_no` int(20) NOT NULL,
  `cat` varchar(20) NOT NULL,
  `Policy_name` varchar(20) DEFAULT NULL,
  `Policy_company` varchar(30) DEFAULT NULL,
  `Monthly_pay` int(20) DEFAULT NULL,
  `Total_year` int(10) DEFAULT NULL,
  `Coverage` int(10) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_policy`
--

INSERT INTO `user_policy` (`User_id`, `Policy_no`, `cat`, `Policy_name`, `Policy_company`, `Monthly_pay`, `Total_year`, `Coverage`, `date`) VALUES
('14', 8, 'BASIC', 'Health Insurance', 'LIC', 6199, 23, 5000000, '2021-01-10 15:12:38'),
('15', 7, 'PREMIUM', 'Car Insurance', 'TATA', 7999, 20, 5000000, '2021-01-10 15:15:43'),
('16', 8, 'PREMIUM', 'Car Insurance', 'TATA', 7999, 20, 5000000, '2021-01-10 15:44:42'),
('17', 9, 'BASIC', 'Life Insurance', 'TATA', 4999, 22, 3000000, '2021-01-10 15:49:05'),
('18', 9, 'PREMIUM', 'Health Insurance', 'Kotak Mahindra', 8999, 21, 10000000, '2021-01-10 15:54:49'),
('19', 10, 'BASIC', 'Home Insurance', 'TATA', 4999, 22, 3000000, '2021-01-10 16:04:02'),
('20', 10, 'PREMIUM', 'Health Insurance', 'Kotak Mahindra', 8999, 21, 10000000, '2021-01-10 16:11:35'),
('21', 11, 'PREMIUM', 'Health Insurance', 'TATA', 7999, 20, 5000000, '2021-01-11 12:52:52'),
('22', 11, 'BASIC', 'Health Insurance', 'TATA', 4990, 23, 3100000, '2021-01-13 16:57:15'),
('23', 12, 'BASIC', 'Home Insurance', 'LIC', 6150, 23, 4900000, '2021-01-14 12:56:47');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_view`
-- (See below for the actual view)
--
CREATE TABLE `user_view` (
`user_count` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `amt_sum`
--
DROP TABLE IF EXISTS `amt_sum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id15876491_dbname`@`%` SQL SECURITY DEFINER VIEW `amt_sum`  AS  select sum(`pay_log`.`Amount`) AS `amt_sum` from `pay_log` ;

-- --------------------------------------------------------

--
-- Structure for view `claim_view`
--
DROP TABLE IF EXISTS `claim_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id15876491_dbname`@`%` SQL SECURITY DEFINER VIEW `claim_view`  AS  select count(`claim_log`.`userid`) AS `claim_count` from `claim_log` ;

-- --------------------------------------------------------

--
-- Structure for view `norm_view`
--
DROP TABLE IF EXISTS `norm_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id15876491_dbname`@`%` SQL SECURITY DEFINER VIEW `norm_view`  AS  select count(`norm_category`.`User_id`) AS `norm_count` from `norm_category` ;

-- --------------------------------------------------------

--
-- Structure for view `prem_view`
--
DROP TABLE IF EXISTS `prem_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id15876491_dbname`@`%` SQL SECURITY DEFINER VIEW `prem_view`  AS  select count(`prem_category`.`User_id`) AS `prem_count` from `prem_category` ;

-- --------------------------------------------------------

--
-- Structure for view `total_user`
--
DROP TABLE IF EXISTS `total_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id15876491_dbname`@`%` SQL SECURITY DEFINER VIEW `total_user`  AS  select max(`user`.`Userid`) AS `total_user` from `user` ;

-- --------------------------------------------------------

--
-- Structure for view `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`id15876491_dbname`@`%` SQL SECURITY DEFINER VIEW `user_view`  AS  select count(`user`.`Userid`) AS `user_count` from `user` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claim_log`
--
ALTER TABLE `claim_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claim_req`
--
ALTER TABLE `claim_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Userid`);

--
-- Indexes for table `norm_category`
--
ALTER TABLE `norm_category`
  ADD PRIMARY KEY (`Policy_no`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `pay_log`
--
ALTER TABLE `pay_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prem_category`
--
ALTER TABLE `prem_category`
  ADD PRIMARY KEY (`Policy_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Userid` (`Userid`);

--
-- Indexes for table `user_policy`
--
ALTER TABLE `user_policy`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claim_log`
--
ALTER TABLE `claim_log`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `claim_req`
--
ALTER TABLE `claim_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `norm_category`
--
ALTER TABLE `norm_category`
  MODIFY `Policy_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pay`
--
ALTER TABLE `pay`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pay_log`
--
ALTER TABLE `pay_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `prem_category`
--
ALTER TABLE `prem_category`
  MODIFY `Policy_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`Userid`) REFERENCES `login` (`Userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
