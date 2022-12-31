-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 07:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `id` int(20) NOT NULL,
  `country` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lon` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `country`, `city`, `lat`, `lon`, `address`, `status`) VALUES
(1, 'IN', 'vijayawada', '73.1234', '85.2338', 'Vijaywada India', 1),
(2, 'IN', 'Tezpur', '73.1234', '85.2338', 'Tezpur', 0),
(3, 'IN', 'New Delhi', '10.123', '12.324', 'Nangloi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `last_login_at`, `status`) VALUES
(1, 'Deltabiocare', 'delta', 'c93ccd78b2076528346216b3b2f701e6', '2022-11-22 05:15:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
CREATE TABLE `attribute` (
  `attribute_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

DROP TABLE IF EXISTS `benefits`;
CREATE TABLE `benefits` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `title`, `short_desc`, `image`, `status`) VALUES
(1, 'Customize ingredients', 'You bring your requirement for current or future needs, DBC, strives to offer green solutions that suit your formulations.', 'https://www.deltabiocare.com/uploads/1641144667.png', 1),
(2, 'Flexible production volumes', 'Flexible production facilities allow us to accept small to large-scale production volumes.', 'https://www.deltabiocare.com/uploads/1641144702.png', 0),
(3, 'Regulatory compliance', 'DBC, supports your country regulatory requirements and ensure their compliance.', 'https://www.deltabiocare.com/uploads/1641144752.png', 1),
(4, 'Global Customer support', 'Every customer request typically replied with in 48 hrs.\r\n', 'https://www.deltabiocare.com/uploads/1641144799.png', 0),
(5, 'test', 'This is just test short description.', 'http://localhost:8000/uploads/benefit/1669907093-full.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

DROP TABLE IF EXISTS `career`;
CREATE TABLE `career` (
  `id` bigint(20) NOT NULL,
  `title` varchar(150) NOT NULL,
  `positions` int(3) NOT NULL,
  `place` varchar(100) NOT NULL,
  `job_type` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `functional_area` varchar(150) NOT NULL,
  `job_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `title`, `positions`, `place`, `job_type`, `experience`, `functional_area`, `job_description`, `status`) VALUES
(1, 'Full Stack Developer', 3, 'Gurugram, Haryana', 'Permanent', '7 yrs', 'Software Development', 'This is job description for full stack development. Something else....', 1),
(2, 'Team Leader - Web Designer', 2, 'Gurugram, Haryana', 'Permanent', '7 yrs', 'Designing', 'Designer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` bigint(20) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `level` varchar(2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `order_by` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `title`, `description`, `image`, `level`, `status`, `created_at`, `modified_at`, `order_by`) VALUES
(1, 0, 'BioEnhance', '', 'https://deltabiocare.com/uploads/1627286871.jpg', '1', 1, '2021-05-25 08:34:13', '2021-10-14 15:07:06', 0),
(5, 9, 'Organic Premium', '', 'https://deltabiocare.com/uploads/1627287463.jpg', '2', 1, '2021-07-19 08:34:10', '2021-10-14 15:10:25', 0),
(6, 1, 'Enhance', '', 'https://deltabiocare.com/uploads/1627308655.jpg', '2', 1, '2021-07-26 08:40:55', '2021-10-14 15:11:56', 0),
(8, 0, 'BioSustain', '', '', '1', 1, '2021-08-29 03:49:31', '2021-10-14 15:05:55', 0),
(9, 0, 'Research Herbals', '', '', '1', 1, '2021-10-14 15:10:12', NULL, 0),
(10, 1, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent magna arcu, sollicitudin volutpat fermentum id, mattis sed ex. Vestibulum finibus elit et ex fermentum suscipit.', 'http://localhost:8000/uploads/categories/lGz4zOmXAcycP4nm6Ao5Y9ZZoK2QpqcF80ZEbOU0.jpg', '1', 1, '2022-11-28 12:29:30', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_filter`
--

DROP TABLE IF EXISTS `category_filter`;
CREATE TABLE `category_filter` (
  `category_filter_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `filter_id` bigint(20) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_filter`
--

INSERT INTO `category_filter` (`category_filter_id`, `category_id`, `filter_id`, `value`) VALUES
(2, 5, 6, 'Watery'),
(3, 5, 6, 'Oily'),
(4, 5, 5, 'Organic'),
(5, 5, 5, 'Halal'),
(6, 5, 4, '5 kg'),
(7, 5, 7, 'leaves'),
(8, 5, 7, 'Whole plant'),
(9, 5, 7, 'Bark'),
(10, 5, 7, 'Stems'),
(11, 5, 7, 'Fruit'),
(12, 5, 7, 'Seeds'),
(13, 5, 4, '>5 kg'),
(14, 5, 7, 'Rhizome'),
(15, 1, 5, 'Organic'),
(16, 5, 5, 'cosmos');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` bigint(20) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `phone`, `email`) VALUES
(1, '7093797992', 'deepikakambhamapti.11@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `list_image` varchar(255) NOT NULL,
  `order_by` varchar(10) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `short_desc`, `description`, `image`, `list_image`, `order_by`, `status`, `created_at`, `modified_at`) VALUES
(1, 'About Us', 'Customizing our herbal/nutraceutical active ingredient blends suits your product and market needs make our customers unique in the market. The safety and efficacy of our ingredients undergo testing at every phase of our ingredients i.,e from sourcing of our raw materials to processing them. Sourcing our raw materials according to your requirements and holding the repeatable quality KPIs allow us to serve our clients in a better way.', '<p>&nbsp;</p><p><strong>OUR COMMITMENT</strong></p><ul><li>Customization of our herbal-nutraceutical ingredients suits your product.</li><li>Safety and efficacy-oriented ingredients.</li></ul><p>&nbsp;</p><p><strong>WHO ARE WE</strong></p><ul><li>We are sourcing our raw materials locally and processing herbal-nutraceutical ingredients according to our global customer requirements established in 2022, India.&nbsp;</li><li>&nbsp;Customize each ingredient we process according to nutraceutical and well-being product manufacturers.</li></ul><p>&nbsp;</p><p><strong>CERTIFICATIONS</strong></p><ul><li>FSSC</li><li>USDA ORGANIC</li><li>HALAL</li></ul><p>&nbsp;</p>', 'https://deltabiocare.com/uploads/1627289464.jpg', 'https://deltabiocare.com/uploads/About_Us_DBC.png', '1', 1, '2021-05-25 09:11:17', '2022-11-30 13:56:21'),
(2, 'Contact us', 'To move the file to the public folder we are making use of $request->image->move() which helps to move the image uploaded to the destination path.', 'To move the file to the public folder we are making use of $request->image->move() which helps to move the image uploaded to the destination path. The public folder path is retrieved using : public_path($destinationPath)', 'http://localhost:8000/uploads/content/1669749638-full.jpg', 'http://localhost:8000/uploads/content/1669749638-list.jpg', '1', 1, '2021-07-13 10:35:14', '2022-11-30 13:56:28'),
(3, 'How to upload files in Laravel directly into the public folder?', 'Let us move the files uploaded inside images/ folders in public. The file upload display is as follows −', '<html>\r\n<head>\r\n   <title>Student Form</title>\r\n</head>\r\n<body>\r\n   @if (count($errors) > 0)\r\n      <div class = \"alert alert-danger\">\r\n         <ul>\r\n            @foreach ($errors->all() as $error)\r\n            <li>{{ $error }}</li>\r\n            @endforeach\r\n         </ul>\r\n      </div>\r\n   @endif\r\n   <?php\r\n      echo Form::open(array(\'url\'=>\'/student\', \'files\'=>\'true\'));\r\n      echo \'Upload File.\';\r\n      echo Form::file(\'image\');\r\n      echo Form::submit(\'Upload\');\r\n      echo Form::close();\r\n   ?>\r\n</body>\r\n</html>', 'http://localhost:8000/uploads/content/1669749744-full.jpg', 'http://localhost:8000/uploads/content/1669749744-list.gif', '2', 1, '2022-11-29 13:52:24', '2022-12-03 00:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `content_section`
--

DROP TABLE IF EXISTS `content_section`;
CREATE TABLE `content_section` (
  `id` bigint(20) NOT NULL,
  `content_id` bigint(20) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_section`
--

INSERT INTO `content_section` (`id`, `content_id`, `title`, `description`, `image`, `status`) VALUES
(1, 2, 'Test check', '<p>moqsjdfmoqkjdfmlkmlkhgmlfhl</p>', 'https://www.deltabiocare.com/uploads/1626192393.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso_code_2` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso_code_2`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(20) NOT NULL,
  `category_id` int(10) NOT NULL,
  `subcategory_id` int(10) NOT NULL,
  `subsubcategory_id` int(10) NOT NULL,
  `document_name` varchar(150) NOT NULL,
  `document` varchar(255) NOT NULL,
  `country` int(20) NOT NULL,
  `valid_upto` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `document_name`, `document`, `country`, `valid_upto`, `status`) VALUES
(1, 1, 3, 5, 'Title', 'http://localhost:8000/uploads/document/1670316028-full.pdf', 1, '2022-12-19 18:30:00', 1),
(2, 1, 3, 5, 'Green Apple', 'http://localhost:8000/uploads/document/1670315955-full.pptx', 1, '2022-12-15 18:30:00', 1),
(3, 1, 3, 5, 'Orange', 'http://localhost:8000/uploads/document/1670311766-full.txt', 1, '2022-12-06 11:21:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_category`
--

DROP TABLE IF EXISTS `doc_category`;
CREATE TABLE `doc_category` (
  `id` bigint(20) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_category`
--

INSERT INTO `doc_category` (`id`, `parent_id`, `title`, `status`) VALUES
(1, 0, 'Organic', 1),
(3, 1, 'Fruits', 1),
(4, 3, 'Dry', 1),
(5, 3, 'Seasonal', 1),
(6, 1, 'Grains', 1),
(7, 0, 'Herbal', 1),
(8, 7, 'Medicine', 1),
(9, 8, 'Amla', 1),
(10, 7, 'Spice', 1),
(11, 10, 'Turmeric', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_request`
--

DROP TABLE IF EXISTS `doc_request`;
CREATE TABLE `doc_request` (
  `id` int(11) NOT NULL,
  `doc_user_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `accessin` int(1) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq` (
  `faq_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `order_by` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `category_id`, `title`, `description`, `status`, `created_at`, `modified_at`, `order_by`) VALUES
(2, 1, 'What are Standard ingredients and Customized ingredients?', 'Standard ingredients: These are the ingredients that we have in stock typically and sold as standard ingredients. \r\nCustomized Ingredients: These are the ingredients we develop according to your formulation, technological and marketing needs', 1, '2021-07-19 08:27:36', NULL, 0),
(3, 1, 'Can standard ingredients be customized to my formulation needs?', 'Yes, we could customize these standard ingredients according to ton your requirements. Thus, Deltabiocare customizes each ingredient we develop or produce.', 1, '2021-07-19 08:28:04', '2022-11-27 20:26:33', 0),
(4, 1, 'I do not see ingredients in your portfolio which I am currently looking for on your website. Can DBC help me to find the ingredient? ', 'Yes, being a company closely associated with various organic farming associations, tribal communities across the world, we can procure and process your desired ingredients. \r\nStandard ingredients: These are the ingredients that we have in stock typically and sold as standard ingredients. \r\nCustomized Ingredients: These are the ingredients we develop according to your formulation, technological and marketing needs ', 1, '2021-07-19 08:28:19', NULL, 0),
(5, 2, 'How can I send a complaint or a feedback about your ingredient?', 'You can register your complaint via our contact us page. This way we can help our best to resolve issue that you ever encountered.', 1, '2021-07-19 08:28:59', NULL, 0),
(6, 2, 'How much time warranty of ingredients are provided?', 'We perform stability studies to each ingredient produced at DBC. Based on these test results each ingredient will be labelled with expiry date or re-test date accordingly. ', 1, '2021-07-19 08:29:20', NULL, 0),
(7, 3, 'Stock & Availability', 'Being natural ingredients it is very difficult to predict availability of all ingredients throughout the year. It is recommended to check with our distributor in your region or send us an email to know about the availability. ', 1, '2021-07-19 08:29:53', NULL, 0),
(8, 4, 'Delivery of the ordered product (inco-terms)?', 'We typically can deliver at your manufacturing site or laboratory door-step. This will help you avoid regulatory concerns that you have to deal with. However, we can also do ex-works if you desire. \r\n', 1, '2021-07-19 08:30:15', '2022-11-28 07:39:52', 0),
(9, 5, 'I am a formulator working for a company in Paris. How can I request a sample?', 'You can always send your sample request using our contact us form. We will assign you to our distributor in your region. Our distributor will contact you for further details about delivery timelines etc., \r\n', 1, '2021-07-19 08:30:52', NULL, 0),
(10, 5, 'How much time warranty of ingredients provided?', 'You can see each ingredient\'s expiry date or re-test date on our certificate of analysis and ingredient package. As you might know that natural ingredients hold different shelf-life. \r\n', 1, '2021-07-19 08:31:11', NULL, 0),
(11, 13, 'This is testing category related faq. This is testing category related faq. edited', 'This is testing category related faq.This is testing category related faq.This is testing category related faq. edited', 1, '2022-11-28 07:40:58', '2022-11-28 07:41:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq_category`
--

DROP TABLE IF EXISTS `faq_category`;
CREATE TABLE `faq_category` (
  `id` bigint(20) NOT NULL,
  `title` varchar(150) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_category`
--

INSERT INTO `faq_category` (`id`, `title`, `status`) VALUES
(1, 'Ingredients', 1),
(2, 'Customer feedback & Complaints', 1),
(3, 'Stock & Availability', 1),
(4, 'Delivery', 1),
(5, 'Samples dispatch', 1),
(6, 'Confidentiality and Marketing ', 1),
(7, 'Export documents', 1),
(8, 'Customization and projects', 1),
(9, 'Raw-material sourcing-ethics', 1),
(13, 'Test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

DROP TABLE IF EXISTS `filter`;
CREATE TABLE `filter` (
  `filter_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`filter_id`, `title`, `status`, `type`) VALUES
(4, 'MOQ', 1, '1'),
(5, 'Certification type', 1, '2'),
(6, 'Formulation type', 1, '1'),
(7, 'Plant part', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `manufacture`
--

DROP TABLE IF EXISTS `manufacture`;
CREATE TABLE `manufacture` (
  `manufacture_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `order_by` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meetus`
--

DROP TABLE IF EXISTS `meetus`;
CREATE TABLE `meetus` (
  `id` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetus`
--

INSERT INTO `meetus` (`id`, `address`, `link`, `image`, `status`) VALUES
(1, '<p>Nuzvid, Andhra Pradesh, India</p>', 'http://localhost:8000/contact-us', 'https://deltabiocare.com/uploads/1626767152.jpg', 1),
(2, '<p>Tezpur, Assam, India</p>', 'http://localhost:8000/contact-us', 'https://deltabiocare.com/uploads/1626767050.jpg', 1),
(3, 'Test address', 'http://localhost:8000/contact-us', 'http://localhost:8000/uploads/address/1669911094-full.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_blog`
--

DROP TABLE IF EXISTS `news_blog`;
CREATE TABLE `news_blog` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `metatitle` varchar(255) DEFAULT NULL,
  `metakeyword` varchar(255) DEFAULT NULL,
  `metadesc` text DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `short_desc` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `list_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `order_by` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_blog`
--

INSERT INTO `news_blog` (`id`, `category_id`, `metatitle`, `metakeyword`, `metadesc`, `type`, `title`, `description`, `short_desc`, `image`, `list_image`, `status`, `created_at`, `modified_at`, `order_by`) VALUES
(3, 5, 'Organic herbals sourced from ethnic communities', 'Herbal sourcing, organic herbals', 'Organic herbals sourced from ethnic communities', 'blog', 'Positive impact on ethnic communities sustainability via organic farming practices', '<p>Many ethnic communities around the world have widely adopted organic farming. These groups usually cultivate herbs and employ traditional knowledge to maintain a healthy and sustainable ecosystem.</p><p>The benefits of organic farming are many and varied. They include:</p><p>1) Organic foods taste better than their chemically grown counterparts because they contain more flavor and nutrients than processed foods.</p><p>2) Organic farms are less likely to have contamination problems because no chemicals are used in the soil or water supply.</p><p>3) Organic farming utilizes natural processes instead of artificial ones, resulting in overall healthier products for both humans and animals alike.</p><p>4) It reduces pollution and adverse environmental</p><p>With the growing interest in purchasing organic farm products, the change in mindset on farmers&#39; communities is getting visible. Unfortunately, in recent years the use of pesticides and artificial fertilizers has been touching thes', 'Many ethnic communities around the world have widely adopted organic farming. These groups usually cultivate herbs and employ traditional knowledge to maintain a healthy and sustainable ecosystem.', 'https://deltabiocare.com/uploads/1626767268.JPG', 'https://deltabiocare.com/uploads/1626767268.png', 1, '2021-07-14 08:16:12', '2021-12-19 16:29:12', 0),
(4, 0, 'Ethnic communities organic herbals', 'Herbal sourcing, organic herbals', 'Ethnic communities around the world have widely adopted organic farming', 'news', 'Organic farming practices: Positive impact on ethnic communities ', '<p>Many ethnic communities around the world have widely adopted organic farming. These groups usually cultivate herbs and employ traditional knowledge to maintain a healthy and sustainable ecosystem.</p><p>The benefits of organic farming are many and varied. They include:</p><p>1) Organic foods taste better than their chemically grown counterparts because they contain more flavor and nutrients than processed foods.</p><p>2) Organic farms are less likely to have contamination problems because no chemicals are used in the soil or water supply.</p><p>3) Organic farming utilizes natural processes instead of artificial ones, resulting in overall healthier products for both humans and animals alike.</p><p>4) It reduces pollution and adverse environmental</p><p>With the growing interest in purchasing organic farm products, the change in mindset on farmers&#39; communities is getting visible. Unfortunately, in recent years the use of pesticides and artificial fertilizers has been touching thes', 'Many ethnic communities around the world have widely adopted organic farming. These groups usually cultivate herbs and employ traditional knowledge to maintain a healthy and sustainable ecosystem.', 'https://deltabiocare.com/uploads/1639952014.jpg', 'https://deltabiocare.com/uploads/1626766110.jpg', 1, '2021-07-16 07:47:36', '2021-12-19 16:43:34', 0),
(5, 0, '', '', '', 'blog', 'Blog 2', '<p>Morbi ultricies mi pharetra ex bibendum pretium. Mauris consectetur ipsum vitae eleifend condimentum. Etiam ante sem, pulvinar in accumsan et, pharetra quis ligula. Sed accumsan consequat magna, ut dapibus quam condimentum sed. Morbi sollicitudin, elit sit amet dapibus rhoncus, odio ipsum tempor diam, a pellentesque nulla quam vitae libero. Ut vitae libero quam. Aenean quam dui, interdum nec sapien eget, ornare ultrices ipsum. Donec condimentum rhoncus mi, nec iaculis felis condimentum ac. Praesent viverra dolor vitae arcu volutpat feugiat. Nulla rutrum sit amet quam nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse hendrerit tempus tortor, nec vulputate ex luctus quis. Mauris porttitor ut purus et rhoncus. Aliquam pulvinar maximus nunc, vitae malesuada felis dapibus id.</p><p>Etiam et neque dui. Vestibulum risus risus, ultrices ac lorem ac, bibendum pharetra dolor. Phasellus sodales molestie nibh, vitae placerat nulla pulvinar non. Sed interdum lac', 'Maecenas blandit turpis eget dui vestibulum, eget ullamcorper elit pulvinar. Nunc vitae enim in nisl iaculis consequat pellentesque at nisi. Proin faucibus dolor molestie nisl accumsan euismod. In placerat dolor rutrum, rutrum ex quis, vehicula turpis. Aliquam libero arcu, pellentesque sit amet volutpat ut, hendrerit a metus. Aenean luctus ante odio, et viverra nibh aliquam ac. Nunc at sem malesuada, dictum sem sit amet, aliquam tortor. Fusce et nisi consequat dui fringilla sollicitudin sed vitae sem. Ut mollis nibh non luctus ullamcorper. Vivamus sed dapibus dolor. Nulla aliquam at odio at mattis. Proin auctor risus urna, eu molestie elit volutpat ullamcorper. Phasellus feugiat arcu eu quam iaculis, non ultricies libero faucibus.', 'https://deltabiocare.com/uploads/1626767317.JPG', 'https://deltabiocare.com/uploads/1626442121.png', 1, '2021-07-16 07:58:41', '2021-07-20 02:18:37', 0),
(6, 1, 'Blog 3', 'Blog 3', 'Blog 3', 'blog', 'Blog 3', '<p>Morbi ultricies mi pharetra ex bibendum pretium. Mauris consectetur ipsum vitae eleifend condimentum. Etiam ante sem, pulvinar in accumsan et, pharetra quis ligula. Sed accumsan consequat magna, ut dapibus quam condimentum sed. Morbi sollicitudin, elit sit amet dapibus rhoncus, odio ipsum tempor diam, a pellentesque nulla quam vitae libero. Ut vitae libero quam. Aenean quam dui, interdum nec sapien eget, ornare ultrices ipsum. Donec condimentum rhoncus mi, nec iaculis felis condimentum ac. Praesent viverra dolor vitae arcu volutpat feugiat. Nulla rutrum sit amet quam nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse hendrerit tempus tortor, nec vulputate ex luctus quis. Mauris porttitor ut purus et rhoncus. Aliquam pulvinar maximus nunc, vitae malesuada felis dapibus id.</p><p>Etiam et neque dui. Vestibulum risus risus, ultrices ac lorem ac, bibendum pharetra dolor. Phasellus sodales molestie nibh, vitae placerat nulla pulvinar non. Sed interdum lac', 'Etiam et neque dui. Vestibulum risus risus, ultrices ac lorem ac, bibendum pharetra dolor. Phasellus sodales molestie nibh, vitae placerat nulla pulvinar non. Sed interdum lacus placerat aliquet venenatis. Nulla sed nibh laoreet, laoreet turpis vel, maximus ligula. Vivamus id nisl eget tellus efficitur viverra congue ac mi. Vivamus quis pellentesque neque. Phasellus lacinia, nunc a aliquet aliquam, tellus purus consequat justo, vitae sodales sem eros eget nisl. Suspendisse malesuada, nunc quis sollicitudin sagittis, nunc quam eleifend nulla, eget tristique turpis nisl non lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id lacus sit amet libero vestibulum vulputate. Nullam in turpis hendrerit lorem condimentum tincidunt. Aenean eros lacus, molestie at tincidunt et, pretium id velit. Nam pretium ultrices mollis', 'https://deltabiocare.com/uploads/1626767363.jpg', 'https://deltabiocare.com/uploads/1626767363.png', 1, '2021-07-17 00:18:30', '2021-07-20 02:19:23', 0),
(7, 3, 'DBC News 2', 'DBC News 2', 'DBC News 2', 'news', 'Research herbals to simplify your life', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac tellus nec mi semper semper. Sed aliquam convallis quam, a posuere lorem tincidunt ullamcorper. Sed nec maximus nisi. Cras ultrices arcu velit, et rhoncus sem pharetra non. Vivamus ut urna mauris. Phasellus aliquam metus condimentum cursus mattis. Curabitur in elit vel nunc efficitur porttitor sit amet id ipsum. Sed sit amet velit ante. Ut eu finibus elit. Praesent nec risus viverra, convallis nisl in, dictum nisl. Nunc fringilla cursus posuere. Curabitur venenatis arcu ac erat sodales, vel varius sapien accumsan. Sed nisl erat, venenatis nec faucibus sit amet, commodo quis odio. Integer cursus ante quis ligula venenatis venenatis. Donec massa nisl, tincidunt ut nibh vel, luctus pharetra justo.</p><p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam vehicula placerat tellus non commodo. Proin sed mi vel ante maximus egestas. Pellentesque nisl dui, convallis eget maximus sed', 'Where can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'https://deltabiocare.com/uploads/1626766375.jpg', 'https://deltabiocare.com/uploads/1626766375.png', 1, '2021-07-20 02:02:55', '2021-07-26 04:50:08', 0),
(8, 1, 'All garbage mountains to vanish after AAP’s MCD win: Manish  ..', 'All garbage mountains to vanish after AAP’s MCD win: Manish  ..', 'All garbage mountains to vanish after AAP’s MCD win: Manish  ..', 'blog', 'All garbage mountains to vanish after AAP’s MCD win: Manish  ..', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent magna arcu, sollicitudin volutpat fermentum id, mattis sed ex. Vestibulum finibus elit et ex fermentum suscipit. Proin aliquam rhoncus felis id suscipit. Suspendisse nec ipsum non nisl lobortis laoreet. Aliquam erat volutpat. Suspendisse dolor massa, ullamcorper quis nunc id, egestas lacinia mauris. Etiam vel aliquam sem, a lacinia lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed efficitur urna sit amet mauris dictum, eget blandit mi ultrices.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent magna arcu, sollicitudin volutpat fermentum id, mattis sed ex. Vestibulum finibus elit et ex fermentum suscipit.', 'http://localhost:8000/uploads/blog/1669748660-full.jpg', 'http://localhost:8000/uploads/blog/1669748660-list.jpg', 1, '2022-11-28 06:17:36', '2022-11-29 13:34:20', 1),
(10, 5, 'jabhca scjasb cjasch', 'jHBC JAHSC AJHCB AJ HSCB', 'jsdhbc sjdvhbsjhdjsbdhbv sjdhb', 'news', 'jsbdhvs jvdhb sjhdvbs j dhb', 'jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds', 'jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds jshdvb sjdhvb sjhdvb sjhbdvj sbdvks jds', 'http://localhost:8000/uploads/news/1669748873-full.JPEG', 'http://localhost:8000/uploads/news/1669748873-list.JPEG', 1, '2022-11-29 13:37:53', '2022-11-29 13:37:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `order_by` int(3) NOT NULL DEFAULT 0,
  `metatitle` text NOT NULL,
  `metakeyword` text NOT NULL,
  `metadesc` text NOT NULL,
  `short_desc` text NOT NULL,
  `description1` text NOT NULL,
  `adv_heading` text NOT NULL,
  `certification` varchar(255) NOT NULL,
  `adv_title1` text NOT NULL,
  `adv_desc1` text NOT NULL,
  `adv_title2` text NOT NULL,
  `adv_desc2` text NOT NULL,
  `adv_title3` text NOT NULL,
  `adv_desc3` text NOT NULL,
  `adv_title4` text NOT NULL,
  `adv_desc4` text NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `adv_img1` varchar(255) NOT NULL,
  `adv_img2` varchar(255) NOT NULL,
  `adv_img3` varchar(255) NOT NULL,
  `list_image` varchar(255) NOT NULL,
  `adv_img4` varchar(255) NOT NULL,
  `manufacture_id` varchar(50) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `title`, `description`, `price`, `image`, `status`, `created_at`, `modified_at`, `order_by`, `metatitle`, `metakeyword`, `metadesc`, `short_desc`, `description1`, `adv_heading`, `certification`, `adv_title1`, `adv_desc1`, `adv_title2`, `adv_desc2`, `adv_title3`, `adv_desc3`, `adv_title4`, `adv_desc4`, `banner_image`, `adv_img1`, `adv_img2`, `adv_img3`, `list_image`, `adv_img4`, `manufacture_id`) VALUES
(2, 5, 'Ashwagandha', '<p>Ashwagandha or Withania Somnifera is a widely used herb in traditional medicines. DBC, procure the herb from the cultivated organic certified farms as roots need to be harvested. Enough care and focus to the herb not to be exploited from wild and endanger to the species of Ashwagandha. The powdered form of ashwaganda is easily disperesable in water and also suitable to formulate as capsules. The flow properties of the powder can be customized according to your formulation need.&nbsp;</p><p><strong>Characteristics:</strong></p><p>Appearance: Powder</p><p>Odor: light characteristic</p><p>Color: Light Green</p><p>Solubility: Sparingly</p>', 1000.00, 'https://deltabiocare.com/uploads/1627110739.png', 1, '2021-07-23 07:09:06', '2021-07-26 12:24:27', 0, 'Ashwagandha', 'Ashwagandha', 'Ashwagandha', 'Ashwagandha or Withania Somnifera is a widely used herb in traditional medicines. DBC, procure the herb from the cultivated organic certified farms as roots need to be harvested. Enough care and focus to the herb not to be exploited from wild and endanger to the species of Ashwagandha. ', '<p>&nbsp;</p><p><strong>Literature Review:&nbsp; </strong></p><p>Ashwagandha <em>(Withania Somnifera) </em>is known for its use in &lsquo;adaptogen&rsquo; along with its property to strengthen human immune system (1,2,3). This herb is also useful for its rejuvenating capabilities (1,2,4,5,6,7,8). It also posses potential to surge endurance, vitality and mental tiredness (7,9,10). Additionally, it counts for accelerating RBC&rsquo;s and hemoglobin level (2). It also has therapeutic effects on central nervous system. (11,12). It is widely researched herb for its active Withanone (Wi-N) by various research groups during Covid-19 outbreak.</p><p><em>References:</em></p><p>1.&nbsp;Singh N, Nath R, Lata A, Lata A, Singh SP, Kohli RP, et al.&nbsp;<em>Withania somnifera</em>&nbsp;(<em>Ashwagandha</em>), a rejuvenating herbal drug which enhances survival during stress (an adaptogen)&nbsp;Int J Crude Drug Res.&nbsp;1982;20:29&ndash;35.&nbsp;</p><p>2.&nbsp;Mishra LC, Singh BB, Dagenais S. Scientific basis for the therapeutic use of&nbsp;<em>Withania somnifera</em>&nbsp;(<em>Ashwagandha</em>): a review.&nbsp;Altern Med Rev.&nbsp;2000;5:334&ndash;46.&nbsp;</p><p>3.&nbsp;Provino R. The role of adaptogens in stress management.&nbsp;Aust J Med Herbalism.&nbsp;2010;22:41&ndash;9.&nbsp;</p><p>4.&nbsp;Shastri B, editor.&nbsp;Bhavprakash of Bhava Mishra, Guduchyadi Varg.&nbsp;9th ed. Varanasi: Chowkhamba Sanskrit Sansthan; 1999. pp. 393&ndash;4</p><p>5.&nbsp;Andrade C, Aswath A, Chaturvedi SK, Srinivasa M, Raguram R. A double-blind, placebo-controlled evaluation of the anxiolytic efficacy of an ethanolic extract of&nbsp;<em>Withania somnifera</em>.&nbsp;Indian J Psychiatry.&nbsp;2000;42:295&ndash;301.&nbsp;</p><p>6.&nbsp;Dhuley JN. Adaptogenic and cardioprotective action of&nbsp;<em>Ashwagandha</em>&nbsp;in rats and frogs.&nbsp;J Ethnopharmacol.&nbsp;2000;70:57&ndash;63.&nbsp;</p><p>7.&nbsp;Mirjalili MH, Moyano E, Bonfill M, Cusido RM, Palaz&oacute;n J. Steroidal lactones from&nbsp;<em>Withania somnifera</em>, an ancient plant for novel medicine.&nbsp;Molecules.&nbsp;2009;14:2373&ndash;93.&nbsp;</p><p>8.&nbsp;Singh N, Bhalla M, de Jager P, Gilca M. An overview on&nbsp;<em>Ashwagandha</em>: a&nbsp;<em>Rasayana</em>&nbsp;(rejuvenator) of Ayurveda.&nbsp;Afr J Tradit Complement Altern Med.&nbsp;2011;8(5 Suppl):208&ndash;13.&nbsp;</p><p>9.&nbsp;Malhotra CL, Das PK, Dhalla NS, Prasad K. Studies on Withania&nbsp;<em>Ashwagandha</em>, Kaul. III. The effect of total alkaloids on the cardiovascular system and respiration.&nbsp;Indian J Med Res.&nbsp;1981;49:448&ndash;60.&nbsp;</p><p>10.&nbsp;Sukanya DH, Lokesha AN, Datta G, Himabindu K. Phytochemical diversity in&nbsp;<em>Ashwagandha</em>&nbsp;(<em>Withania somnifera</em>)&nbsp;J Med Aromat Plants.&nbsp;2010;1(2):TS2&ndash;p26.&nbsp;Abstract: National Conference on Biodiversity of Medicinal and Aromatic Plants: Collection, Characterization and Utilization, Held at Anand, India; 24-25 November, 2010.</p><p>11. Choudhary&nbsp;S,&nbsp;Kumar&nbsp;P,&nbsp;Malik&nbsp;J. (2013).&nbsp;Plants and phytochemicals for Huntington&rsquo;s disease. Pharmacogn Rev 7:81&ndash;91</p><p>12. Pingali&nbsp;U,&nbsp;Pilli&nbsp;R,&nbsp;Fatima&nbsp;N. (2014).&nbsp;Effect of standardized aqueous extract of&nbsp;<em>Withania somnifera</em>&nbsp;on tests of cognitive and psychomotor performance in healthy human participants. Pharmacogn Res 6:12&ndash;</p>', 'Advantages', 'halal', 'Customized flow properties', '', '•	Sustainable cultivation', '', '', '', '', '', 'https://deltabiocare.com/uploads/1627043946.JPG', 'https://deltabiocare.com/uploads/16270439461.png', 'https://deltabiocare.com/uploads/16270439462.png', '', 'https://deltabiocare.com/uploads/1627043946.png', '', NULL),
(3, 5, 'Bacopa Monnieri', '<p>Bacopa may not be a plant that you would know, but it&#39;s one of the most potent natural herbs on earth.</p><p>Bacopa is a herbal supplement that has been scientifically backed to improve your memory, focus, and more. It is excellent for enhancing cognition, enhancing creativity, and boosting overall mood. In addition, Bacopa is an excellent source of antioxidants and will help you maintain a healthy lifestyle. Bacopa leaves and stems are traditionally used for medicinal purposes. In addition, pharmaceutical companies formulated Bacopa for clinical use.</p>', 1000.00, 'https://www.deltabiocare.com/uploads/1639595582.jpg', 1, '2021-07-23 07:22:41', '2022-03-14 09:22:38', 0, 'Bacopa Monnieri', 'Bacopa Monnieri', 'Bacopa Monnieri', 'Bacopa may not be a plant that you would know, but it\'s one of the most potent natural herbs on earth.  Bacopa is a herbal supplement that has been scientifically backed to improve your memory, focus, and more.', '<p><strong>Literature Review:</strong></p><p>Bacopa Monnieri, also known as &lsquo;Brahmi&rsquo; traces its origin from Ayurveda age (1). It was widely consumed for improving poor memory, anxiety and epilepsy (2).&nbsp; The herb constitutes free radical capacity and protects the DNA cleavage (3). Also, it is rich in anti-oxidant properties (4). Consumption of 300mg/day Brahmi can boost the logical memory along with mental control (5).&nbsp;</p><p><em>References:</em></p><p>1. P. V. Sharma, <em>Dravyaguna-Vij&tilde;n&macr;ana</em>, vol. 2nd, Chaukhambha Bharati Academy, Varanasi, India, 1998</p><p>2.V. Badmaev, <em>Bacopin (Bacopa monnieri): A Memory Enhancerfrom Ayurveda</em>, Sabinsa Corporation,&nbsp;Piscataway, NJ, USA, 1998.</p><p>3. A. Russo, A. A. Izzo, F. Borrelli, M. Renis, and A. Vanella, &ldquo;Free radical scavenging capacity and protective effect of <em>Bacopa</em> <em>monniera </em>L. on DNA damage,&rdquo; <em>Phytotherapy Research</em>, vol. 17, no. 8, pp. 870&ndash;875, 2003.</p><p>4. Y. B. Tripathi, S. Chaurasia, E. Tripathi, A. Upadhyay, and G. P. Dubey, &ldquo;Bacopa monniera Linn. as an antioxidant: mechanism of action,&rdquo; <em>Indian Journal of Experimental Biology</em>, vol. 34, no. 6, pp. 523&ndash;526, 1996.</p><p>5. S. Raghav, H. Singh, P. K. Dalal, J. S. Srivastava, and O. P. Asthana, &ldquo;Randomized controlled trial of standardized Bacopa monniera extract in age-associated memory impairment,&rdquo; <em>Indian Journal of Psychiatry</em>, vol. 48, no. 4, pp. 238&ndash;242, 2006.</p>', 'Advantages', 'organic', 'Heavy metal free', '', 'Stable product', '', '', '', '', '', 'https://www.deltabiocare.com/uploads/1639596629.jpg', 'https://deltabiocare.com/uploads/16270447612.png', 'https://deltabiocare.com/uploads/16270447613.png', '', 'https://www.deltabiocare.com/uploads/16395955821.jpg', '', NULL),
(5, 5, 'BioZO-Ginger', '<p>DBC-Enhance Ginger offers two types of ginger powders: BioZO<sup>TM</sup>-B suitable for beverages and BioZO<sup>TM</sup>-N suitable for nutraceuticals.</p><p>After rigorous testing and optimizing BioZO<sup>TM</sup>-B is unique for its 4X solubility compared to market available powders. Similarly, BioZO<sup>TM</sup>-N having 2X bioavailability. Furthermore, both the powders are low-temperature exposed spray drying powders without compromising their flavors and nutrients.&nbsp;</p>', 0.00, 'https://deltabiocare.com/uploads/1627304412.png', 1, '2021-07-24 04:40:21', '2021-07-26 12:30:01', 0, 'Ginger', 'Zingiber officinale', 'Ashwagandha or Withania Somnifera is a widely used herb in traditional medicines. DBC, procure the herb from the cultivated organic certified farms as roots need to be harvested. Enough care and focus to the herb not to be exploited from wild and endanger to the species of Ashwagandha.', 'DBC-Enhance Ginger offers two types of ginger powders: BioZOTM-B suitable for beverages and BioZOTM-N suitable for nutraceuticals.', '<p>Ginger contains loads of nutrients, vitamins, and minerals. Therefore, we have taken the pure Ginger and used its extract to make our BioZO<sup>TM</sup>-B and BioZO<sup>TM</sup>-B. The roots of the Ginger contain oily resins, which possess many bioactive components (1). For ages, it has been used to cure minor illnesses such as colds, indigestion, cardiovascular diseases, vomiting (2,3,4). Plus, its bioactive constituents effectively control prostate cancers, liver, skin, breast (5,6,7). In addition, it has been stated that Ginger and its by-products act as a raising agent for the immune system (8). Also, the rhizome of Ginger is beneficial for curing allergic diseases (9).&nbsp;&nbsp;</p><p>&nbsp;</p><p><strong><em>References:</em></strong></p><p>1.&nbsp;&nbsp;&nbsp;&nbsp; Kaul P. N, Joshi B. S. Alternative medicine: Herbal drugs and their critical appraisal-part II.&nbsp;Prog Drug Res.&nbsp;2001;57:1&ndash;75.</p><p>2.&nbsp;&nbsp;&nbsp;&nbsp; Shukla Y, Singh M. Cancer preventive properties of ginger: A brief review.&nbsp;Food Chem Toxicol.&nbsp;2007;45:683&ndash;90.</p><p>3.&nbsp;&nbsp;&nbsp;&nbsp; Jiang H, Xie Z, Koo HJ, McLaughlin SP, Timmermann BN, Gang DR. Metabolic profiling and phylogenetic analysis of medicinal Zingiber species: Tools for authentication of ginger (Zingiber officinale Rosc.)&nbsp;Phytochemistry.&nbsp;2006;67:232&ndash;44.</p><p>4.&nbsp;&nbsp;&nbsp;&nbsp; Nicoll R, Henein MY. Ginger (Zingiber officinale Roscoe): A hot remedy for cardiovascular disease?&nbsp;Int J Cardiol.&nbsp;2009;131:408&ndash;9.</p><p>5.&nbsp;&nbsp;&nbsp;&nbsp; Jeong CH, Bode AM, Pugliese A, Cho YY, Kim HG, Shim JH. [<a href=\"https://www.ncbi.nlm.nih.gov/pmc/articles/PMC3665023/#ref6\">6</a>]gingerol suppresses colon cancer growth by targeting leukotriene a4 hydrolase.&nbsp;Cancer Res.&nbsp;2009;69:5584&ndash;91.</p><p>6.&nbsp;&nbsp;&nbsp;&nbsp; Ishiguro K, Ando T, Maeda O, Ohmiya N, Niwa Y, Kadomatsu K, et al. Ginger ingredients reduce viability of gastric cancer cells via distinct mechanisms.&nbsp;Biochem Biophys Res Commun.&nbsp;2007;362:218&ndash;23.</p><p>7.&nbsp;&nbsp;&nbsp;&nbsp; Sung B, Murakami A, Oyajobi BO, Aggarwal BB. Zerumbone abolishes RANKL-induced NF-kappaB activation, inhibits osteoclastogenesis, and suppresses human breast cancer-induced bone loss in athymic nude mice.&nbsp;Cancer Res.&nbsp;2009;69:1477&ndash;84.</p><p>8.&nbsp;&nbsp;&nbsp;&nbsp; Barta I, Smerak P, Polıvkova Z, Sestakova H, Langova M, Turek B, et al. Current trends and perspectives in nutrition and cancer prevention.&nbsp;Neoplasma.&nbsp;2006;53:19&ndash;25.</p><p>9.&nbsp;&nbsp;&nbsp;&nbsp; Chen BH, Wu PY, Chen KM, Fu TF, Wang HM, Chen CY. Antiallergic potential on RBL-2H3 cells of some phenolic constituents of Zingiber officinale (Ginger)&nbsp;J Nat Prod.&nbsp;2009;72:950&ndash;</p>', 'Advantages', 'organic', 'High solubility', 'Helps you to make your formulation unique with a strong flavor with Upto 4x more solubility', 'Decrease sedimentation', 'Makes your product looks better on shelves without traces of sedimentation', 'Customizable INCI', 'All excipients are customizable to suits your formulation and compatibility', 'Organic Certification', 'Ensures your formulation is organic certified', 'https://www.deltabiocare.com/uploads/16271215311.png', 'https://deltabiocare.com/uploads/1627307267.png', 'https://deltabiocare.com/uploads/16273072671.png', 'https://deltabiocare.com/uploads/16273072672.png', 'https://deltabiocare.com/uploads/1627304729.png', 'https://deltabiocare.com/uploads/16273072673.png', NULL),
(6, 5, 'Curcumin', '<p>Turmeric is an aromatic, medicinal plant. When the turmeric rhizome is dried, it can be grounded to a yellow powder with a bitter, slightly acrid, yet sweet taste. It has various health benefits and is well-known as a natural anti-inflammatory agent. Turmeric is also rich in vitamin C and vitamin B. Turmeric is often used as a natural preservative for its medicinal properties.</p>', 0.00, 'https://deltabiocare.com/uploads/1627307977.png', 1, '2021-07-26 08:21:41', '2022-03-14 09:49:26', 0, 'Curcumin', 'Curcumin', 'Turmericable is an innovative ingredient from DBC derived from turmeric. Traditionally, turmeric is part of lives in various Asian and African tribes', 'Turmeric is an aromatic, medicinal plant. When the turmeric rhizome is dried, it can be grounded to a yellow powder with a bitter, slightly acrid, yet sweet taste.', '<p>Various scientific evidences available on turmeric and its benefits. It is believed that curcumin alone is bringing health benefits from the compounds available in turmeric (1).&nbsp; Although curcumin demonstrated various health benefits, non-curcuminoids also possess important and beneficial compounds in turmeric (<a href=\"#Reference2\">2</a>). Besides these properties, turmeric has strong antimicrobial properties.The growth of histamine-producing bacteria&nbsp;<em>(Vibrio parahaemolyticus, Bacillus cereus, Pseudomonas aeruginosa</em>, and&nbsp;<em>Proteus mirabilis)</em>&nbsp;was inhibited by garlic and turmeric extracts at a 5% concentration (<a href=\"#Reference3\">3</a>).Ethanolic extracts of&nbsp;<em>C. longa</em>&nbsp;have good antifungal activity(<a href=\"#Reference4\">4</a>).Turmeric is also effective against neuronal, cardiac, kidney disorders and also useful against depression (<u>5</u>, <a href=\"#Reference6\">6</a>).</p><p>&nbsp;</p><p><em>References:</em></p><p><a name=\"Reference1\">1. Araujo C. C, Leon L. L. Biological activities of Curcuma longa L.&nbsp;</a>Mem Inst Oswaldo Cruz.&nbsp;2001;96:723&ndash;8</p><p><a name=\"Reference2\"><em>2. Aggarwal, B.B.; Yuan, W.; Li, S.; Gupta, S.C. Curcumin-free turmeric exhibits antiinflammatory and anticancer activities: Identification of novel components of turmeric. Mol. Nutr. Food Res. 2013, 57, 1529&ndash;1542. [Cr</em></a></p><p><em>Li, Y.; Shi, X.; Zhang, J.; Zhang, X.; Martin, R.C.G. Hepatic protection and anticancer activity of curcuma: A potential chemopreventive strategy against hepatocellular carcinoma. Int. J. Oncol. 2014, 44, 505&ndash;513.</em></p><p><a name=\"Reference3\"><em>3. </em></a>Paramasivam S, Thangaradjou T, Kannan L. Effect of natural preservatives on the growth of histamine-producing bacteria.&nbsp;J Environ Biol.&nbsp;2007;28:271&ndash;4.&nbsp;</p><p>4. <a name=\"Reference4\">Khattak S, Saeed-ur-Rehman, Ullah Shah H, Ahmad W, Ahmad M. Biological effects of indigenous medicinal plants Curcuma longa and Alpiniagalanga.&nbsp;Fitoterapia.&nbsp;2005;76:254&ndash;7.</a></p><p><a name=\"Reference5\">5. </a>Mohanty I, Arya D. S, Gupta S. K. Effect of Curcuma longa and Ocimum sanctum on myocardial apoptosis in experimentally induced myocardial ischemic-reperfusion injury.&nbsp;BMC Complement Altern Med.&nbsp;2006;6:3</p><p><a name=\"Reference6\">(</a><a href=\"#Reference5\">5</a>)6. Yu Z. F, Kong L. D, Chen Y. Antidepressant activity of aqueous extracts of Curcuma longa in mice.&nbsp;J Ethnopharmacol.&nbsp;2002;83:161&ndash;5.</p>', '', 'organic', 'Bioavailability', '', 'Customized particle size', '', 'Eco-friendly extraction', '', 'Heavy metal free', '', 'https://www.deltabiocare.com/uploads/1639597100.jpg', '', '', '', 'https://deltabiocare.com/uploads/16273079771.png', '', NULL),
(7, 5, 'Moringa', '<p>Moringa oleifera (MO) is a plant with many health benefits, and it can help you tackle some of the most common health issues. The leaves are typically dried and ground into a powder, which can be consumed in various ways. Moringa leaves contain high concentrations of many minerals and vitamins, including Vitamin A, C, B6, and K. They are also high in protein, calcium, and iron. This unique plant can provide us with everything we need to stay healthy and happy.</p>', 0.00, 'https://deltabiocare.com/uploads/1627308249.png', 1, '2021-07-26 08:34:09', '2022-03-14 09:52:44', 0, 'Moringa', 'Moringa', 'Moringa Oliefera, which is considered as indigenous plant for Indian sub-continent gained its momentum as superfood across the world. ', 'Moringa oleifera (MO) is a plant with many health benefits, and it can help you tackle some of the most common health issues. ', '<p>Based on scientific literature, the Moringa was found to contain many essential nutrients, for instance, vitamins, minerals, amino-acids, beta-carotene, anti-oxidants and&nbsp; anti-inflammatory nutrients1 (<a href=\"https://docs.google.com/document/d/1p88XLctxRmucLZ0fUMAEot0WdotXM7LM/edit#bookmark=id.30j0zll\">Fahey, 2005; Hsu et al., 2006; Kasolo et al., 2010</a>). Moringa has been practically used in the medicinal field, throughout the decades to heal a huge amount of acute and chronic conditions. In vitro and in vivo studies with the plant have recommended its effectiveness in treating inflammation, hyperlipidemia, and hyperglycemia2(<a href=\"https://docs.google.com/document/d/1p88XLctxRmucLZ0fUMAEot0WdotXM7LM/edit#bookmark=id.3znysh7\">Bennett et al., 2003; Fahey, 2005; Mbikay, 2012</a>).Moringa oleifera is well known for its pharmacological actions and is used for the traditional treatment of diabetes mellitus4 (<a href=\"https://docs.google.com/document/d/1p88XLctxRmucLZ0fUMAEot0WdotXM7LM/edit#bookmark=id.1t3h5sf\">Bhishagratna, 1991; Babuand Chaudhuri, 2005</a>). M. oleifera holds great potential as a source of anticancer drugs due to its low toxicity5 [<a href=\"https://docs.google.com/document/d/1p88XLctxRmucLZ0fUMAEot0WdotXM7LM/edit#bookmark=id.2s8eyo1\">O. Awodele, 2012</a>] and the presence of a variety of phytochemicals5ii [<a href=\"https://docs.google.com/document/d/1p88XLctxRmucLZ0fUMAEot0WdotXM7LM/edit#bookmark=id.17dp8vu\">P. Siddhuraju and K. Becker, 2003].</a>Moringa oleifera&nbsp;Lam. (Fam:&nbsp;Moringaceae) (M. oleifera) is one such drug, used by many ayurvedic practitioners for the treatment of asthma and chronic rheumatism <a href=\"https://docs.google.com/document/d/1p88XLctxRmucLZ0fUMAEot0WdotXM7LM/edit#bookmark=id.26in1rg\">(Fahey, 2005</a>).</p><p>References:</p><p>1. Fahey, JW (2005). Moringa oleifera: A review of the medicinal evidence for its nutritional, therapeutic, and prophylactic properties. Part 1. Trees Life J, 1, 5</p><p>Hsu R, Midcap S, Arbainsyah DWL(2006). Moringa oleifera: Medicinal and Socio-Economical Uses. Internationa Course on Economic Botany, National Herbarium Leiden, the Netherlands.</p><p>Kasolo JN, Bimenya GS, Ojok L, et al (2010). Phytochemicals and uses of Moringa oleifera leaves in Ugandan rural communities. J Med Plants Res, 4, 753-7.</p><p>2. Bennett RN, Mellon FA, Foidl N, et al (2003). Profiling glucosinolates and phenolics in vegetative and reproductive tissues of the multi-purpose trees Moringa oleifera L. (Horseradish Tree) and Moringa stenopetala L. J Agri Food Chem, 51, 3546-53.&nbsp;</p><p>Fahey, JW (2005). Moringa oleifera: A review of the medicinal evidence for its nutritional, therapeutic, and prophylactic properties. Part 1. Trees Life J, 1, 5</p><p>Mbikay M, (2012). Therapeutic potential of Moringa oleifera leaves in chronichyperglycemia and dyslipidemia: a review. Front Pharmacol, 3, 1-12.</p><p>4. Bhishagratna KK (1991). An English translation of SushrutamSamhita based on the original Sanskrit text, Chowkhamba Sanskrit Series Office, Varanasi, India, 3, 213-9.</p><p>Babu R, Chaudhuri, M. (2005). Home water treatment by direct filtration with natural coagulant. J Water Health, 3, 27-30.</p><p>5. O. Awodele, I. A. Oreagba, S. Odoma, J. A. Teixeira Da Silva, and V. O. Osunkalu, &ldquo;Toxicological evaluation of the aqueous leaf extract of Moringa oleifera Lam. (Moringaceae),&rdquo; Journal of Ethnopharmacology, vol. 139, no. 2, pp. 330&ndash;336, 2012. 32</p><p>5 (ii) P. Siddhuraju and K. Becker, &ldquo;Antioxidant properties of various solvent extracts of total phenolic constituents from three different agroclimatic origins of drumstick tree (Moringa oleifera Lam.) leaves,&rdquo; Journal of Agricultural and Food Chemistry, vol. 51, no. 8, pp. 2144&ndash;2155, 2003.</p><p>6. Fahey JW.&nbsp;Moringa oleifera: A review of the medical evidence for its nutritional, therapeutic and prophylactic properties: Part I.&nbsp;Trees for Life J.&nbsp;2005;1:5</p>', 'Advantages', 'organic', '40x Super concentrated powder', '', 'Ecological sourcing of leaves', '', 'Organic certification', '', 'Preserving Vitamins DBC-EnhanceTM technology ensures the nutrients and vitamins are well preserved during the spray drying process', '', 'https://deltabiocare.com/uploads/16273082492.png', 'https://deltabiocare.com/uploads/1627498052.png', 'https://deltabiocare.com/uploads/1627498108.png', '', 'https://deltabiocare.com/uploads/16273082491.png', '', NULL),
(8, 5, 'Bosewellia', '<p>Boswellia is a natural plant that has been used for centuries as a remedy to support good health. It is powerful and one of the most studied natural supplements globally. Boswellia resins, also known as frankincense/olibanum, are obtained from Boswellia trees. It&#39;s cut with a machete, then cut into smaller pieces, and sold to customers as gum resin. The gum-resin is processed then graded according to its flavor, color, shape, and size.</p>', 0.00, '', 1, '2022-03-14 09:54:38', '2022-03-14 10:14:56', 0, 'Bosewellia', 'Bosewellia', 'Bosewellia', 'Boswellia is a natural plant that has been used for centuries as a remedy to support good health. It is powerful and one of the most studied natural supplements globally.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(9, 5, 'Indian Gooseberry', '<p>The Indian gooseberry, also known as the amla, is a great way to do just that. A potent fruit rich in Vitamin C and iron, amla is the perfect fruit to help boost your immune system. The fruit&#39;s deep-green outer skin surrounds deep-red meat that contains two large seeds. This green fruit is a powerhouse of nutrition, with antioxidant levels five times higher than blueberries.</p>', 0.00, '', 1, '2022-03-14 09:56:40', '2022-03-14 10:12:03', 0, 'Indian Gooseberry', 'Indian Gooseberry', 'Indian Gooseberry', 'The Indian gooseberry, also known as the amla, is a great way to do just that. A potent fruit rich in Vitamin C and iron, amla is the perfect fruit to help boost your immune system. ', '', '', 'organic', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(10, 5, 'Fennel', '<p>Fennel (Foeniculum vulgare) is a perennial herb of the carrot family (Apiaceae) grown for edible shoots, leaves, and seeds. Fennel plants are green and white, with feathery leaves and yellow flowers that grow at the top of the stem. The stem is topped by a long, leafless stalk that can reach up to 1 m in height. Fennel is high in vitamin C and plant flavonoids- such as quercetin- that may help reduce inflammation.</p>', 0.00, '', 1, '2022-03-14 09:58:26', NULL, 0, '', 'Fennel', 'Fennel', 'Fennel (Foeniculum vulgare) is a perennial herb of the carrot family (Apiaceae) grown for edible shoots, leaves, and seeds. Fennel plants are green and white, with feathery leaves and yellow flowers that grow at the top of the stem.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(11, 5, 'Eucalyptus leaves', '<p>Eucalyptus leaves are rich in oil to be used as a natural insect repellent during the summer. They can also relieve cold and flu symptoms. In addition, they are rich in antioxidants that protect your body from oxidative stress, the excessive release of oxygen-containing radicals. Some of the most potent antioxidants are flavonoids, which protect your body from oxidative stress and free radical damage. The main flavonoids in eucalyptus leaves include catechins, isorhamnetin, luteolin, kaempferol, phloretin, and quercetin.</p>', 0.00, '', 1, '2022-03-14 09:59:49', NULL, 0, 'Eucalyptus leaves', 'Eucalyptus leaves', 'Eucalyptus leaves', 'Eucalyptus leaves are rich in oil to be used as a natural insect repellent during the summer. They can also relieve cold and flu symptoms.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(12, 5, 'Coriander leaves', '<p>Coriander is an annual herb that grows up to 90 cm. Coriander is a nutritional powerhouse. Not only do these seeds help with digestion, but they also increase energy and enhance the immune system! They&#39;re rich in copper, zinc, and iron. Coriander seeds also help boost metabolism. Coriander seeds are a natural way to clean the body inside out. It purifies the blood and maintains a healthy digestive system.</p>', 0.00, '', 1, '2022-03-14 10:01:16', NULL, 0, 'Coriander leaves', 'Coriander leaves', 'Coriander leaves', 'Coriander is an annual herb that grows up to 90 cm. Coriander is a nutritional powerhouse. Not only do these seeds help with digestion, but they also increase energy and enhance the immune system!', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(13, 5, 'Laurel leaves', '<p>Bay laurel is a beautiful evergreen tree. The leaves are glossy with a long, thin, blade-like shape with a refreshing scent and deep green color. Bay leaves are not poisonous. People often believe that the Laurus nobilis plant is poisonous. It is not. Laurel leaves have many health benefits, including being a great source of vitamin A, vitamin C, vitamin B6, calcium, iron, and manganese.</p>', 0.00, '', 1, '2022-03-14 10:02:43', NULL, 0, 'Laurel leaves', 'Laurel leaves', 'Laurel leaves', 'Bay laurel is a beautiful evergreen tree. The leaves are glossy with a long, thin, blade-like shape with a refreshing scent and deep green color.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(14, 5, 'Senna leaves', '<p>Senna leaves have been used medicinally for centuries. A member of the Leguminaceae family, Senna is a shrub-like plant with leaves that have been used for centuries by traditional medicine practitioners. Senna is a plant-based laxative used to relieve constipation, promote digestive health, and increase the frequency of bowel movements. Senna leaves cleanse toxins accumulated in the colon over time and for their anti-microbial activity.</p>', 0.00, '', 1, '2022-03-14 10:03:56', NULL, 0, 'Senna leaves', 'Senna leaves', 'Senna leaves', 'Senna leaves have been used medicinally for centuries. A member of the Leguminaceae family, Senna is a shrub-like plant with leaves that have been used for centuries by traditional medicine practitioners.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(15, 5, 'Basil', '<p>Basil is a perennial herb in the family of Lamiaceae. The most common essential oil found in basil is eugenol. Basil has a rich history of medicinal use. The oil extracted from the leaves and flowers can help with lung congestion and breathing problems as well as digestive issues. There are many different kinds of Basil but they all have the same calming effects. It helps in making your body feel less stressed. This is good for anxiety and also depression.</p>', 0.00, '', 1, '2022-03-14 10:05:09', NULL, 0, 'Basil', 'Basil', 'Basil', 'Basil is a perennial herb in the family of Lamiaceae. The most common essential oil found in basil is eugenol. Basil has a rich history of medicinal use.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(16, 5, 'Chamomile flower', '<p>Chamomile flower is a popular herbal medicine and natural sleep aid. It has been used to help people sleep for centuries, but it has also treated digestive issues and wounds or injuries. It is believed to have anti-inflammatory and antiseptic properties. In addition, it has various health benefits, including its rich in powerful antioxidants, which may be the key to its many health properties.</p>', 0.00, '', 1, '2022-03-14 10:06:40', NULL, 0, 'Chamomile flower', 'Chamomile flower', 'Chamomile flower', 'Chamomile flower is a popular herbal medicine and natural sleep aid. It has been used to help people sleep for centuries, but it has also treated digestive issues and wounds or injuries.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(17, 5, 'Licorice', '<p>Licorice is known for its medicinal properties and the flavor in its root. It is a flower-bearing plant with a typical sweetness and flavor. The roots used are about 1 meter long and about 1 cm in diameter. The licorice roots contain monosaccharides, disaccharides, starch, amino acids, proteins, sterols, flavonoids, and saponins. The glycyrrhizin present in Licorice helps with inflammation. Other important bioactive compounds help boost brain function.</p>', 0.00, '', 1, '2022-03-14 10:08:02', NULL, 0, 'Licorice', 'Licorice', 'Licorice', 'Licorice is known for its medicinal properties and the flavor in its root. It is a flower-bearing plant with a typical sweetness and flavor. The roots used are about 1 meter long and about 1 cm in diameter.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL),
(18, 5, 'Shatavari', '<p>Asparagus Racemosus- A popular medicinal plant. Numerous recurved spines, small white flowers, sickle-shaped cladodes with scale leaves, and globose berries adorn the stems. Shatavari has a unique composition of minerals like copper, manganese, zinc, and cobalt. It also contains other minerals in good quantity, including calcium, magnesium, selenium, and potassium. Shatavari has essential calming and cooling properties. The root of Shatavari has revealed that there are multiple active saponins.</p>', 0.00, '', 1, '2022-03-14 10:27:10', NULL, 0, 'Shatavari', 'Shatavari', 'Shatavari', 'Asparagus Racemosus- A popular medicinal plant. Numerous recurved spines, small white flowers, sickle-shaped cladodes with scale leaves, and globose berries adorn the stems.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_attachment`
--

DROP TABLE IF EXISTS `product_attachment`;
CREATE TABLE `product_attachment` (
  `id` int(20) NOT NULL,
  `main_title` varchar(255) NOT NULL,
  `product_id` int(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attachment`
--

INSERT INTO `product_attachment` (`id`, `main_title`, `product_id`, `type`, `title`, `link`, `attachment`) VALUES
(1, 'title 1', 1, 'type 2', 'lkalcn', 'ldkdk', 'https://deltabiocare.com/uploads/1626982952.png'),
(2, 'Ingredieent List', 2, 'type 2', 'Ingredieent List', '', 'https://deltabiocare.com/uploads/1627044119.jpg'),
(3, 'Ingredieent List', 2, 'type 2', 'List 2', '', 'https://deltabiocare.com/uploads/1627044147.pptx'),
(4, 'Ingredieent List', 2, 'type 1', 'List 3', '', 'https://deltabiocare.com/uploads/1627044171.pdf'),
(5, 'Ingredieent List', 2, 'type 1', 'List 4', '', 'https://deltabiocare.com/uploads/1627044206.docx'),
(6, 'Formulation Guidelines', 2, 'type 1', 'Ginger-Ashwaganda drink', '', 'https://deltabiocare.com/uploads/1627323281.docx');

-- --------------------------------------------------------

--
-- Table structure for table `product_attribute`
--

DROP TABLE IF EXISTS `product_attribute`;
CREATE TABLE `product_attribute` (
  `product_attribute_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `attribute_id` bigint(20) NOT NULL,
  `category_filter_id` int(20) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_attribute`
--

INSERT INTO `product_attribute` (`product_attribute_id`, `product_id`, `attribute_id`, `category_filter_id`, `value`) VALUES
(5, 3, 0, 3, ''),
(6, 2, 0, 6, ''),
(7, 2, 0, 2, ''),
(8, 2, 0, 10, ''),
(9, 5, 0, 13, ''),
(10, 5, 0, 2, ''),
(11, 5, 0, 14, '');

-- --------------------------------------------------------

--
-- Table structure for table `site_images`
--

DROP TABLE IF EXISTS `site_images`;
CREATE TABLE `site_images` (
  `site_images_id` bigint(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `type_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `order_by` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_images`
--

INSERT INTO `site_images` (`site_images_id`, `type`, `type_id`, `title`, `image`, `link`, `status`, `created_at`, `modified_at`, `order_by`) VALUES
(1, 'slider', 1, 'Organic certified Herbals in your desired packaging volumes ', 'https://deltabiocare.com/uploads/1638971851.jpeg', 'https://deltabiocare.com/product/list/5', 1, '2021-05-25 09:06:22', '2021-12-08 08:27:31', 0),
(2, 'slider', 1, 'We ensure sourcing herbal plants according to your foreseen demand and quality indicators', 'https://deltabiocare.com/uploads/1638971950.jpeg', 'https://deltabiocare.com/content/1', 1, '2021-07-14 11:26:58', '2021-12-08 08:30:08', 0),
(3, 'slider', 1, 'Helps you to blend different combination of herbals <br/>as per your product or formulation needs', 'https://www.deltabiocare.com/uploads/1639847118.jpg', 'Helps you to blend combination of herbals as per your needs', 1, '2021-07-16 08:02:21', '2021-12-18 11:37:05', 0),
(4, 'slider', 0, 'Test ', 'https://www.deltabiocare.com/uploads/1639514047.jpg', '', 1, '2021-12-14 15:04:07', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `slider_id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `order_by` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `title`, `description`, `image`, `position`, `status`, `order_by`) VALUES
(1, 'Home Slider', 'TOP DIET AND LIFESTYLE TIPS TO SUPPORT YOUR IMMUNE SYSTEM', 'https://www.deltabiocare.com/uploads/1626191114.jpg', 'top', 1, 1),
(2, 'slider1', ',mnbmb mbnmnbm bn mnbmnb m', 'http://localhost:8000/uploads/slider/1669838947-full.jpg', 'top', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
CREATE TABLE `subscription` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `name`, `email`) VALUES
(1, 'Ajay', 'visitajayar@gmail.com'),
(2, 'srikanth', 'srikanthlavu1@gmail.com'),
(3, 'kambhampati', 'nmaruthik11@gmail.com'),
(4, 'ajay', 'test@test.com'),
(5, 'Canvas', 'ajay@northrose.in'),
(6, 'ajay', 'ajay@asjcn.com'),
(7, 'jdsabcab', 'aksbc@skdc.com'),
(8, 'jdsabcab', 'aksbc@skdc.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `country` int(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `approve` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `email`, `phone`, `country`, `company`, `status`, `approve`, `type`) VALUES
(1, 'delta', '123456', 'Deltabiocare', 'admin@deltabiocare.com', '', 195, 'Deltabiocare', 1, 1, 'admin'),
(2, 'textile', '12345678', 'Drama textile', 'dharma@textile.com', '9879876543', 1, 'Company', 1, 1, 'document'),
(3, 'abhijit', 'JTmH]6<D', 'Abhijit Sarma', 'asarma464@gmail.com', '6000804627', 5, '', 1, 1, 'distributor'),
(4, 'srikanth', '12345678', 'Srikanth Lavu', 'srikanthlavu1@gmail.com', '7093747478', 1, 'Delta formulations', 1, 0, 'distributor'),
(5, 'ekart', '123456', 'Ekart logistics', 'ekart@logistics.com', '73672836487', 1, 'Ekart logistics', 1, 1, 'distributor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_filter`
--
ALTER TABLE `category_filter`
  ADD PRIMARY KEY (`category_filter_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_section`
--
ALTER TABLE `content_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_category`
--
ALTER TABLE `doc_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_request`
--
ALTER TABLE `doc_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `faq_category`
--
ALTER TABLE `faq_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`filter_id`);

--
-- Indexes for table `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `meetus`
--
ALTER TABLE `meetus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_blog`
--
ALTER TABLE `news_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_attachment`
--
ALTER TABLE `product_attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attribute`
--
ALTER TABLE `product_attribute`
  ADD PRIMARY KEY (`product_attribute_id`);

--
-- Indexes for table `site_images`
--
ALTER TABLE `site_images`
  ADD PRIMARY KEY (`site_images_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
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
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_filter`
--
ALTER TABLE `category_filter`
  MODIFY `category_filter_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content_section`
--
ALTER TABLE `content_section`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doc_category`
--
ALTER TABLE `doc_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doc_request`
--
ALTER TABLE `doc_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faq_category`
--
ALTER TABLE `faq_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `filter_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `manufacture_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetus`
--
ALTER TABLE `meetus`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news_blog`
--
ALTER TABLE `news_blog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_attachment`
--
ALTER TABLE `product_attachment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_attribute`
--
ALTER TABLE `product_attribute`
  MODIFY `product_attribute_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `site_images`
--
ALTER TABLE `site_images`
  MODIFY `site_images_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
