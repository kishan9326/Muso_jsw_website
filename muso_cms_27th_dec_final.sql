-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2023 at 10:32 AM
-- Server version: 8.0.35-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muso_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_anual_report`
--

CREATE TABLE `about_anual_report` (
  `id` int NOT NULL,
  `section_id` int NOT NULL,
  `annual_year` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_report` varchar(200) NOT NULL,
  `press_kit` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_anual_report`
--

INSERT INTO `about_anual_report` (`id`, `section_id`, `annual_year`, `annual_report`, `press_kit`) VALUES
(3, 5, '2023', 'InformedConsent.pdf', 'pdf-sample.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `about_assets`
--

CREATE TABLE `about_assets` (
  `id` int NOT NULL,
  `section_id` int NOT NULL,
  `img_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_assets`
--

INSERT INTO `about_assets` (`id`, `section_id`, `img_name`) VALUES
(1, 2, '721342_WhatsApp_Image_2023-11-19_at_6.14.10_PM.jpeg'),
(2, 2, '540446_WhatsApp_Image_2023-11-19_at_6.14.10_PM_(1).jpeg'),
(3, 2, '971653_WhatsApp_Image_2023-11-19_at_6.14.11_PM.jpeg'),
(4, 4, '519963_about-us-blue-card.png'),
(5, 4, 'Group_561.png'),
(6, 4, 'Group_567.png'),
(7, 5, 'Magnifying_glass.png');

-- --------------------------------------------------------

--
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `id` int NOT NULL,
  `text` longtext NOT NULL,
  `text2` longtext,
  `section_id` int NOT NULL,
  `title` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`id`, `text`, `text2`, `section_id`, `title`) VALUES
(1, '<h1><span style=\"color:#bdc3c7\"><strong>The Museum of Solutions (aka MuSo) is a unique experiential museum where children become responsible, conscious, caring, and mindful citizens of the world.</strong></span></h1>', NULL, 1, 'Section 1'),
(2, '<p><strong>Our building is <span style=\"color:#ffffff\">1,00,000 sq.ft.</span> located in Mumbai&#39;s Lower Parel district.</strong></p>\r\n\r\n<p>It demonstrates how the very fabric of a built environment can support sustainability through human-centred design.</p>', '<p dir=\"ltr\"><span style=\"color:#000000\">From toilets that have special taps and flushes with low water consumption fittings to rainwater harvesting on the roof and a recycling centre - the building is an example of how we can work towards a sustainable future.</span></p>', 2, 'Section 2'),
(3, '<p><span style=\"color:#ffffff\">&nbsp;<strong>Children are our future</strong></span><span style=\"color:#000000\"><strong>&mdash;and they play a vital role in educating themselves and others to create real-world change.</strong></span></p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"background-color:transparent\">To unlock this collective potential, we believe that children need to be encouraged to make mistakes1, dream together2, celebrate learning3, share knowledge4, and think collaboratively.</span>&nbsp;</span></p>', '<p><span style=\"color:#000000\">Unfortunately, most children in India are currently learning through outdated modes of instruction based on memorisation and rote learning. MuSo was conceived to address this problem by establishing a new model for child-led, purpose-driven, and curiosity-focused education.</span></p>\r\n\r\n<p><span style=\"color:#000000\">We believe that the Museum of Solutions will have an immediate and long-term impact on children, their communities, as well as the world they live in.</span></p>', 3, 'Section 3'),
(4, '<p><span style=\"color:#000000\"><strong>Our unique programming </strong></span><span style=\"color:#ffffff\"><strong>inspires</strong></span><span style=\"color:#000000\"><strong>, </strong></span><span style=\"color:#ffffff\"><strong>enables</strong></span><span style=\"color:#000000\"><strong>, and </strong></span><span style=\"color:#ffffff\"><strong>empowers </strong></span><span style=\"color:#000000\"><strong>children to make meaningful change in the world, together, today.</strong></span></p>', '<p><span style=\"color:#000000\">Our exhibits and activities are based on three foundational approaches.</span></p>', 4, 'Section 4'),
(5, '<h2><strong>Want to know more about us?</strong></h2>\r\n\r\n<h3>Members of the media can access essential resources about the Museum of Solutions, including a Press Kit with museum highlights.</h3>', '<p>Email us at <a href=\"mailto:media@museumofsolutions.in\">media@museumofsolutions.in</a> to access the press kit</p>', 5, 'Section 5');

-- --------------------------------------------------------

--
-- Table structure for table `advisory_board`
--

CREATE TABLE `advisory_board` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advisory_board`
--

INSERT INTO `advisory_board` (`id`, `name`, `designation`, `content`) VALUES
(3, 'Aditya Somani', NULL, '<p>A V Somani is an entrepreneur and over the last 25 years he has stewarded and built various companies in diverse manufacturing and service sectors like building products, pre-engineered metal buildings (Everest Industries), real estate (White Knight Constructions), digital (compareindia.com), retail distribution (Pepsi), travel (Everest Travels) and textiles (Volant). He is an alum of University of Pittsburgh (MBA), SPJain Institute (PGDBM), and Sydenham College (MCom and BCom). He is fascinated by various programs on Lean Manufacturing, Fast Construction and Singularity University, concepts that he has attempted to distil in his organisations. A V is deeply involved in several social causes close to his heart. Currently, in education (Mahesh Shikshan Sansthan Jodhpur and Global Advisory Board of the Chancellor of University of Pittsburgh, USA), philanthropy (Centre for Advancement of Philanthropy), culture (Inner Courtyard, Sangit Kala Kendra), urban conservation (Asiatic Society of Mumbai) and governance (Praja Foundation). In the past, with organisations in public health and skill building. &nbsp;As a member of Young Presidents Organisation Bombay, Rotary Club of Bombay and a Fellow of Aspen Global Leadership Network, he has a strong network in India and overseas.</p>'),
(4, 'Divya Vishwanathan ', NULL, 'Divya is a co-founder and designer at Tropic Design & Innovation. Tropic  partners with purpose-driven organisations to creatively tackle the compelling challenges of our time. Divya has a background in design research, user experience and system design and has previously worked at IDEO, a leading global design and innovation firm. And an alumni of Srishti School of Art Design & Technology. \nShe has led projects and design teams across diverse sectors for Fortune 500 companies, government organisations, nonprofits and educational institutions around the world. \n'),
(9, 'Kiran Sethi', NULL, 'Kiran Bir Sethi is an Indian designer, educationist, education reformer, and social entrepreneur. With a degree in visual communication from the National Institute of Design, Ahmedabad, she began her career designing restaurants, and later, writing for newspapers. While she had always been interested in design thinking and designing experiences, it was when her children started going to school that Sethi recognised her true calling. Dismayed by the unfriendly and rigid atmosphere in schools, she set up The Riverside School in Ahmedabad, followed by aProCh, and finally Design for Change which is today the largest movement of change – for and by the children. Over the years, Kiran, Riverside and Design for Change have won several accolades and Awards. Some of the recent ones are: The Earth Prize, the Rockefeller Innovation Award, The Lego Reimagine Award, The Lexus prize, and the Light of Freedom Award.'),
(10, 'Nandita Dugar ', NULL, 'Nandita has over 25 years of work experience in the nonprofit education sector. She is currently on the board of the Akanksha Foundation and The Circle. She was a part of the core founding team at Teach For India, and was involved in creating the strategic blueprint for its launch in India. Nandita has also served as the interim-CEO of Akanksha in 2008. Her prior experience includes working in the UK and India at the Boston Consulting Group (BCG), Unilever, and HDFC Bank. She has a Master\'s degree in ‘Engineering,Economics and Management’ from Oxford University.'),
(11, 'Shaheen Mistri', NULL, 'Shaheen Mistri is the CEO of Teach For India, and serves as one of its founding board members. She has earned global recognition for her dedication and commitment to the fight for educational equity. Shaheen is an Ashoka Fellow (2001), a Global Leader for Tomorrow at the World Economic Forum (2002), and an Asia Society 21 Leader (2006). Shaheen also serves on the boards of Ummeed, The Thermax Social Initiatives Foundation, The Akanksha Foundation, The Indian School Leaders Institute, and Design For Change, and is an advisor to the Latika Roy Foundation. She also serves as a committee member for the National Council for Teacher Education. Shaheen has a Master’s Degree in Education from the University of Manchester, England.'),
(12, 'Vijay Bhatt ', NULL, 'Vijay is a Cancer-Coaching pioneer and the co-author of \'My Cancer Is Me: The Journey From Illness To Wholeness\'. He has been a leadership coach to CEOs and organisations, for 15 years. Prior to that, he spent over 20 years in Branding/ Communications with Ogilvy & Mather Worldwide, based in Mumbai, Bangalore, Singapore, London and Hong Kong. Vijay is a sought-after keynote speaker on the subjects of Cancer, Stress-Wellbeing and Leadership.');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `name`, `email`, `time`) VALUES
(1, 'Ashish Gosavi', 'ashish.gosavi525@gmail.com', '2023-08-24 12:58:26'),
(2, 'Kishan Sharma', 'ashish.gosavi525@gmail.com', '2023-08-24 12:58:55'),
(3, 'testing', 'kishan@immersionx.io', '2023-08-24 13:00:38'),
(4, 'testing', 'kishan@immersionx.io', '2023-08-24 13:06:53'),
(5, 'ZZX', 'ZXZX', '2023-08-24 13:33:05'),
(6, 'admin@example.com', 'test@example.com', '2023-08-24 13:39:13'),
(7, 'admin@example.com', 'test@example.com', '2023-08-24 13:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `childrens_panel`
--

CREATE TABLE `childrens_panel` (
  `id` int NOT NULL,
  `content` longtext NOT NULL,
  `members` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childrens_panel`
--

INSERT INTO `childrens_panel` (`id`, `content`, `members`) VALUES
(2, '<p>Right from its conception, MuSo has been developed in consultation with its biggest stakeholders: children. Alongside, we regularly interact with parents, guardians and educators to understand how children envision the evolution of learning and education. We consult a panel of 25-30 children, from schools all over Mumbai. These children meet us once a month and provide us with feedback on different aspects of MuSo. We incorporate their feedback in the design and content of the museum. In future, we plan to expand this cohort and test ideas with a wider and more diverse audience.</p>', 'Aanya Goswamy,Anshi Nanavati,Samyukta Banthia,Yash Asudani,Anoushka Poddar,Swara Amol Lele,Sanika Daga,Aadya Sachdeva,Jehaan Shah,Keya Rajgarhia,Kiara Palrecha,Lakovou Ponnammakkal Siby,Anoushka Singh,Parimita Jain,Bose Kaikini,Nidhish Bandbe,Kahaan Lakhani,Krishay Daga');

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

CREATE TABLE `consultants` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `name`, `department`) VALUES
(1, 'Principal Construction Partners', '<p>JSW Realty - Construction &amp; Management, Liaisoning, Geotechnical Consultant<br />\r\nJSW Paints<br />\r\nJSW Cements</p>'),
(2, 'Architecture and Interior Design', '<p>Ratan J. Batliboi Consultants Pvt. Ltd. - Architect<br />\r\nBricolage Bombay - Architect<br />\r\nSterling Engineering - Structural Consultant<br />\r\nGrune Design - MEP<br />\r\nINI MEP Consultant<br />\r\nEDEN - Leed Rating<br />\r\nMunro Acoustics - Sound and Acoustics<br />\r\nParag Mody - Landscape</p>'),
(16, 'Exhibit and Content Design', '<p>Swapnali Das - Set Designer - Discover Lab<br />\r\nArgyle Design - Exhibit Design - Play Lab<br />\r\nHuettinger - Exhibit Fabricator - Play Lab<br />\r\nGrumpy Sailor - Exhibit Design - Discover Lab<br />\r\nAmoghavarsha - Film-maker - Discover Lab<br />\r\nHarsh Kawa - Exhibit Fabricator - Discover Lab<br />\r\nSalone Mehta - Sound Partners - Discover Lab<br />\r\nDramaturge - Sound Partners - Discover Lab<br />\r\nIsland City Studios - Sound Partners - Discover Lab</p>'),
(18, 'Brand Identity Design', '<p>Brewhouse - Branding Identity</p>'),
(19, 'Knowledge Partners', '<p>Tropic - Brand Story &amp; Education Exhibit Design<br />\r\nEidos - Programming Research</p>'),
(20, 'Technology & Ticketing Partners', '<p>Immersion X - Design Technology Partner<br />\r\nZoho - CRM Partners</p>'),
(33, 'Food & Beverage Partners', '<p>Subko Specialty Coffee &amp; Craft Bakehouse</p>');

-- --------------------------------------------------------

--
-- Table structure for table `contact_content`
--

CREATE TABLE `contact_content` (
  `id` int NOT NULL,
  `section_id` int NOT NULL,
  `career` longtext NOT NULL,
  `work_with` longtext NOT NULL,
  `volunteer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_content`
--

INSERT INTO `contact_content` (`id`, `section_id`, `career`, `work_with`, `volunteer`) VALUES
(2, 7, '<p>We&rsquo;re always on the lookout for people who want to inspire and shape the young minds of tomorrow. Whether you&rsquo;re envisioning a role in exhibit design, educational programming, visitor engagement, social media strategy, content writing, or administration, MuSo offers a dynamic environment for growth.</p>', '<div>\r\n<p>If you believe in the power of children and their ability to change the world, we might be a match. From space design to social media, and everything in between, there are shoes&mdash;in full-time positions&mdash;waiting to be filled.&nbsp;<a href=\"mailto:careers@museumofsolutions.in\">careers@museumofsolutions.in</a></p>\r\n</div>\r\n\r\n<p>&nbsp;</p>', '<p>Ignite joy and curiosity by joining MuSo&rsquo;s volunteer program! As a volunteer, you&rsquo;ll play a pivotal role in bringing interactive exhibits to life, facilitating hands-on activities, and nurturing children&rsquo;s love for exploration. Whether you&rsquo;re a student, a homemaker, a retiree, or simply someone with a heart for making a difference, we welcome you to contribute your unique skills and energy. Email us with an expression of interest at <a href=\"mailto:careers@museumofsolutions.in\">careers@museumofsolutions.in</a></p>');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_details`
--

CREATE TABLE `contact_page_details` (
  `id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `section_id` int NOT NULL,
  `office_time` longtext,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_page_details`
--

INSERT INTO `contact_page_details` (`id`, `title`, `section_id`, `office_time`, `mobile`, `email`) VALUES
(1, NULL, 1, '<p>Please note that our office timings are<strong> </strong><strong>Monday&ndash;Saturday, 10.00am&ndash;6.00pm</strong></p>', NULL, NULL),
(2, NULL, 2, NULL, NULL, 'info@museumofsolutions.in'),
(3, NULL, 3, NULL, NULL, 'donate@museumofsolutions.in'),
(4, NULL, 4, NULL, NULL, 'bookings@museumofsolutions.in'),
(5, NULL, 5, NULL, NULL, 'partnerships@museumofsolutions.in'),
(8, NULL, 6, NULL, NULL, 'media@museumofsolutions.in'),
(9, NULL, 8, NULL, NULL, 'birthdays@museumofsolutions.in'),
(10, NULL, 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doodle_details`
--

CREATE TABLE `doodle_details` (
  `id` int NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `doodle_image` longtext,
  `filename` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doodle_details`
--

INSERT INTO `doodle_details` (`id`, `email`, `doodle_image`, `filename`, `created_at`) VALUES
(2, 's@gmail.com', 'Doodle a.png', 'a', '2023-11-28 14:45:43'),
(3, 'arun@immersionx.io', 'Doodle hi.png', 'hi', '2023-11-28 14:52:03'),
(4, 'i@gmail.com', 'Doodle ,l.png', ',l', '2023-11-29 05:31:30'),
(5, 'abc@gmail.com', 'Doodle kishan.png', 'kishan', '2023-12-04 11:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `doodle_prompt`
--

CREATE TABLE `doodle_prompt` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `text` varchar(200) NOT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doodle_prompt`
--

INSERT INTO `doodle_prompt` (`id`, `name`, `color`, `text`, `logo`) VALUES
(1, 'green', '#18b46b', 'A robot that eats pollution to make the world cleaner', 'Layer 2.svg'),
(2, 'blue', '#7db7e3', 'A magical hat that can change the weather wherever you are.', 'Layer 2.svg'),
(3, 'red', '#ed342a', 'Glasses that translate any language as you talk', 'Layer 2.svg'),
(5, 'yellow', '#f0b825', 'A world where nobody judges you because of who you are.', 'Layer 2.svg'),
(6, 'red', '#ed342a', 'A world where everyone\'s ideas are important.', NULL),
(7, 'green', '#18b46b', 'A school bag that turns trash into something useful', NULL),
(8, 'green', '#18b46b', 'A tree that makes books with stories that seem real.', NULL),
(9, 'blue', '#7db7e3', 'A musical instrument that plays when the wind blows.', NULL),
(10, 'green', '#18b46b', 'An animal that turns food scraps into building blocks.', NULL),
(11, 'red', '#ed342a', 'A spaceship that makes homes for kids without a place to live.', NULL),
(12, 'yellow', '#f0b825', 'A bird that sings your favourite songs to cheer you up.', NULL),
(13, 'yellow', '#f0b825', 'A time-travel bike that can take you to any time in the past.', NULL),
(14, 'red', '#ed342a', 'A city with giant slides instead of regular roads.', NULL),
(15, 'red', '#ed342a', 'A library where books come to life when it gets dark.', NULL),
(16, 'yellow', '#f0b825', 'A mirror that shows your older self and gives advice.', NULL),
(17, 'yellow', '#f0b825', 'A camera that turns your dreams into pictures you can see.', NULL),
(18, 'blue', '#7db7e3', 'Shoes that let you walk on water like magic.', NULL),
(19, 'blue', '#7db7e3', 'A water source that gives clean water to everyone nearby.', NULL),
(20, 'red', '#ed342a', 'Imagine a sword that can make your enemies feel better.', NULL),
(22, 'green', '#18b46b', 'A robot that eats pollution to make the world cleaner', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doodle_user_details`
--

CREATE TABLE `doodle_user_details` (
  `id` bigint NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doodle_user_details`
--

INSERT INTO `doodle_user_details` (`id`, `name`, `age`, `location`, `email`) VALUES
(1, 'a', NULL, NULL, 'a@ghjgh.com'),
(2, 'kishan', NULL, NULL, 'a@gmail.com'),
(3, 'Abdul', NULL, NULL, 'abdul@test.com'),
(4, 'arun', NULL, NULL, 'arun@immersionx.io'),
(5, 'q', NULL, NULL, 'q@gmail.com'),
(6, 'Abdul', NULL, NULL, 'abdul@abc.com'),
(7, 's', NULL, NULL, 'x@gmail.com'),
(8, 'muso', NULL, NULL, 'muso@gmail.com'),
(9, 'd', NULL, NULL, 'd@gmail.com'),
(10, 'f', NULL, NULL, 'a@gmail.com'),
(11, 'Test', NULL, NULL, 'abdul@test.com'),
(12, 's', NULL, NULL, 's@gmail.com'),
(13, 'd', NULL, NULL, 'd@gmail.com'),
(14, 's', NULL, NULL, 's@gmail.com'),
(15, 'arun', NULL, NULL, 'arun@immersionx.io'),
(16, 'ik', NULL, NULL, 'i@gmail.com'),
(17, 'abc', NULL, NULL, 'abc@gmail.com'),
(18, 's', NULL, NULL, 'abcdef@gmail.com'),
(19, 'TEs', NULL, NULL, 'aa@tggg.com'),
(20, 'Test', NULL, NULL, 'test@gggg.com');

-- --------------------------------------------------------

--
-- Table structure for table `event_assets`
--

CREATE TABLE `event_assets` (
  `id` int NOT NULL,
  `section_id` int NOT NULL,
  `img_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_assets`
--

INSERT INTO `event_assets` (`id`, `section_id`, `img_name`) VALUES
(1, 1, 'children\'s_panel1.jpg'),
(17, 2, 'Rectangle_424.png');

-- --------------------------------------------------------

--
-- Table structure for table `event_organiser`
--

CREATE TABLE `event_organiser` (
  `id` int NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `event_organiser` varchar(100) NOT NULL,
  `event_date` varchar(50) NOT NULL,
  `event_time` varchar(50) NOT NULL,
  `event_venue` varchar(100) NOT NULL,
  `event_audience` varchar(20) NOT NULL,
  `event_price` varchar(20) NOT NULL,
  `event_info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_organiser`
--

INSERT INTO `event_organiser` (`id`, `event_name`, `event_organiser`, `event_date`, `event_time`, `event_venue`, `event_audience`, `event_price`, `event_info`) VALUES
(1, 'JSW Muso test', 'ImmersionX', '31-08-2023', '11:00 AM', 'Goregoan East', 'Child age 12 to 14', '1000', 'This is a testing event');

-- --------------------------------------------------------

--
-- Table structure for table `executive_team`
--

CREATE TABLE `executive_team` (
  `id` int NOT NULL,
  `person_name` varchar(40) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `executive_team`
--

INSERT INTO `executive_team` (`id`, `person_name`, `designation`, `content`) VALUES
(1, 'Tanvi Jindal Shete', 'Founder', '<p>Tanvi has always been driven to make learning for children not just more meaningful, but also more enjoyable. She began this journey in 2010, as part of the first cohort of Teach For India Fellows in Mumbai, and followed this by associating with Akanksha Foundation where she became the Vice Principal for the D. N. Nagar Municipal School. She is currently the Managing Trustee of the Jindal Education Trust where she looks after all education initiatives. She is also a graduate of the American School of Bombay, with a degree in Economics from New York University.</p>'),
(2, 'Michael Peter Edson', 'Chief Museum Officer', '<p>With over thirty years of experience in museums, Michael has long been at the forefront of transformational change in the cultural sector. He was formerly the Director of Web and New Media Strategy for the Smithsonian Institution, the world&rsquo;s largest museum and research complex in Washington, D.C He co-founded the Museum for the United Nations &mdash; UN Live, where he forged a new vision to catalyse global effort towards the UN&rsquo;s Sustainable Development Goals (SDGs). He is a frequent speaker on the topic of technology, culture, and social change, and has also been active as a consultant and collaborator in over twenty countries.</p>'),
(3, 'Aarti Mimani', 'Director of Visitor Experience', '<p>An architect who enjoys learning about new things. Loves taking up the challenge of doing things that she has never done before! Thrives in designing, creating, and making spaces. Adores children and the spirit they endure.</p>'),
(4, 'Abhik Bhattacherji', 'Director of Marketing and Events', '<p>Abhik is a graduate of St. Stephen&rsquo;s College, New Delhi, with a degree in English literature. Over the past seventeen years, he has worked as a marketing and communications professional at Godrej and Britannia, a Fellow at Teach For India, and helped set up Teach For Bangladesh and Teach For Slovakia. He has also taught English and economics at Welham Boys&rsquo; School. Most recently, he served as the Marketing Director for Teach For India, and also helped design and build a rural English-medium school in Madhya Pradesh.</p>'),
(5, 'Bilwa Poddar', 'Director of Programs & Outreach', '<p>Bilwa has a master&rsquo;s degree in History and Museum Studies from the University of Leicester, UK. With thirteen years of experience in museum education, she served as the Head of the Education Department at Chhatrapati Shivaji Maharaj Vastu Sangrahalaya, Mumbai, until 2019. At CSMVS, she led groundbreaking initiatives, including the establishment of their Children&rsquo;s Museum and Museum on Wheels. She is an honorary Board Member of the British Museum&rsquo;s International Training Program, as well as a certified LEGO&reg;️ SERIOUS PLAY&reg;️ facilitator.</p>'),
(6, 'Nameeta Premkumar', 'Director of Content & Exhibits', '<p>A content creator and filmmaker,Nameeta has worked as a producer and director with formats ranging from films, television and museums. A graduate from film in New York and Media studies from SCM, Mumbai with an Economics honours degree from St.Xaviers college Mumbai, she has always pushed the envelope with experiential learning and changing narratives. She has worked with the Tropenmuseum Jr. in Amsterdam on exhibit design and content. Her passion for storytelling and philanthropy culminated in starting Filmbug, a not for profit initiative to teach marginalised children filmmaking to empower them to bring change in communities across India.</p>'),
(7, 'Nilesh Kurle', 'Director of Sales', '<p>A science graduate from Mumbai University, with decades of experience in Sales and Marketing, he has developed expertise in a variety of industries, including Theme Parks, Resorts, Education, and IT. Nilesh has held significant positions at both regional and national levels throughout his career. Nilesh initially started his professional journey in the IT industry and later transitioned to the Hospitality industry and FECs (Family Entertainment Centers). During his career, he gained valuable insights into the operations and management of theme parks. His role primarily involved overseeing revenue operations and implementing sales strategies to attract visitors and generate revenue.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `explore_section`
--

CREATE TABLE `explore_section` (
  `id` int NOT NULL,
  `title` longtext,
  `subtitle` longtext,
  `text` longtext,
  `tagline` longtext,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explore_section`
--

INSERT INTO `explore_section` (`id`, `title`, `subtitle`, `text`, `tagline`, `image`) VALUES
(1, '<p><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#434343\">Step into our open-air wonderland!</span></span></span></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\">Delve into the world of sustainability and clean living. From composting to beekeeping, from growing your own vegetables to immersing yourself in a tropical garden, it&rsquo;s a nature adventure like no other! </span></span></span></p>', '<p><span style=\"font-size:18px\"><span style=\"color:#18b46b\"><strong>Coming soon</strong></span></span></p>\r\n\r\n<p>&nbsp;</p>', '65624_Floor_Name.png', '446568_MuSo-Grow_Lab.png'),
(2, '<p><strong><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#434343\">Let your imagination fly in our cutting-edge maker space!</span></span></span></strong></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\">Work in teams to unleash your design thinking, and bring your innovative solutions to life through art, technology, woodworking, photography, electronics, and much more! </span></span></span></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>🧒🏽 </strong></span><span style=\"color:#f0b825\"><strong>Recommended for children 5 years and above.&nbsp;</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>📍 </strong></span><span style=\"color:#f0b825\"><strong>Make Lab is on Floor 9</strong></span></span></span></p>\r\n\r\n<p>&nbsp;</p>', '570235_Floor_Name.png', '705111_Muso-Make_lab.png'),
(3, '<p><strong><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#434343\">Dive into an aquatic adventure!</span></span></span></strong></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\">Discover the wonders and woes of the world of water as you learn about conservation, meet the deepest-living marine life, find ways to clean the Mithi river, and do much more!&nbsp;This floor talks about mature themes on climate and ecology. We recommend you experience this floor as a family.&nbsp;Parental guidance&nbsp;advised.</span></span></span></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>🧒🏽 </strong></span><span style=\"color:#7db7e3\"><strong>Recommended for children 7 years and above&nbsp;</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>📍 </strong></span><span style=\"color:#7db7e3\"><strong>Discover Lab is on Floor 8</strong></span></span></span></p>\r\n\r\n<p>&nbsp;</p>', '869640_Floor_Name-01.png', '173654_Muso-Discover_lab.png'),
(4, '<p><strong><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#434343\">Explore your creativity and our curious contraptions!</span></span></span></strong></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\">Solve problems and have fun as you interact with STEAM (Science, Technology, Engineering, Arts, Mathematics) concepts through our playful and sensorial exhibits, and creative workshops.</span></span></span></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>🧒🏽</strong></span><span style=\"color:#ed342a\"><strong> </strong><strong>Recommended for young children, 2+ years</strong></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>📍 </strong></span><span style=\"color:#ed342a\"><strong>Play Lab is on Floor 7</strong></span></span></span></p>\r\n\r\n<p>&nbsp;</p>', '418051_Floor_Name.png', '126927_Muso-Play_lab.png'),
(5, '<p><strong><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#434343\">Give new life to old plastic in our special lab!</span></span></span></strong></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\">Learn about the ecological impact of plastic waste, and use state-of-the-art tools and Precious Plastic machines to turn discarded plastic into useful products.</span></span></span></p>', '<p><span style=\"color:#18b46b; font-family:Work Sans,sans-serif\"><span style=\"font-size:14.6667px\"><strong>Coming soon</strong></span></span></p>\r\n\r\n<p>&nbsp;</p>', '889184_Recycling_Center.png', '736808_MuSo-Recycle.png'),
(6, '<p><strong><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#434343\">Step into and engage with MuSo&rsquo;s world!</span></span></span></strong></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\">Make the most of our community spaces to engage with other visitors, take part in community events, or find the perfect momento at our shop. This is a space you don&rsquo;t need a ticket for!</span></span></span></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>📍 </strong></span><span style=\"color:#ed342a\"><strong>The Commons is on the Lobby Floor</strong></span></span></span></p>\r\n\r\n<p><span style=\"color:#ed342a\"><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><strong>📍 The Shop is on the Lobby Floor</strong></span></span></span></p>\r\n\r\n<p><span style=\"color:#ed342a\"><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><strong>📍 The Immersive Gallery is on Floor 1</strong></span></span></span></p>\r\n\r\n<p>&nbsp;</p>', '67376_Engage.png', '148246_MuSo-Engage.png'),
(7, '<p><strong><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#434343\">Empower your mind with free books and media resources!</span></span></span></strong></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\">Make the most of our serene and distraction-free space full of educational and engaging books and media resources LiSo is also our dedicated quiet zone for visitors with sensory sensitivities.</span></span></span></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>🧒🏽</strong></span><span style=\"color:#f0b825\"><strong> Children of all ages</strong></span></span></span></p>\n\n<p><span style=\"color:#f0b825\"><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><strong>📍 LiSo is on Floor 6</strong></span></span></span></p>\n\n<p>&nbsp;</p>', '496960_LiSoLibrary_of_Solutions.png', '810965_MuSo-Library.png'),
(8, '<p><strong><span style=\"font-size:13.999999999999998pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#434343\">Relax, refuel, and reset!</span></span></span></strong></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\">From their specialty coffee to their inventive craft chocolate, from wholesome meals to indulgent snacks&mdash;Subko&rsquo;s got something for everyone!</span></span></span></p>', '<p><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><span style=\"color:#000000\"><strong>📍 </strong></span><span style=\"color:#7db7e3\"><strong>Subko Cacao is on the Lobby Floor</strong></span></span></span></p>\r\n\r\n<p><span style=\"color:#7db7e3\"><span style=\"font-size:11pt\"><span style=\"font-family:\'Work Sans\',sans-serif\"><strong>📍 Subko Specialty Coffee &amp; Craft Bakehouse is on Floor 1</strong></span></span></span></p>\r\n\r\n<p>&nbsp;</p>', '950920_Built_for_Bacchas-01.svg', '546585_MuSo-Hungry.png');

-- --------------------------------------------------------

--
-- Table structure for table `explore_tab`
--

CREATE TABLE `explore_tab` (
  `id` int NOT NULL,
  `explore_id` int NOT NULL,
  `tab_name` longtext,
  `tab_text` longtext,
  `tab_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `explore_tab`
--

INSERT INTO `explore_tab` (`id`, `explore_id`, `tab_name`, `tab_text`, `tab_image`) VALUES
(1, 1, 'Zone 1', 'Learn about sustainability through bees, composting, soil, a nursery, and vegetable planters.', '367506_Zone_1_(1).png'),
(2, 1, 'Zone 2', 'Grow your own vegetables using resources from the Seeds & Pods and Tools displays.', '822475_Zone_2.png'),
(3, 1, 'Zone 3', 'Walk through a sensory pathway and immerse yourself in a tropical garden.', '627013_Zone_3.png'),
(4, 1, 'Zone 4', 'Take part in events and workshops on sustainable living, composting, and farm-to-fork dinners.', '564832_Zone_4.png'),
(5, 2, 'Open Atelier', 'Engage in fun activities that evolve regularly, using various media to express yourself.', '529178_Open_atelier.png'),
(6, 2, 'Tinkering Station', 'Put your curiosity to play in “un-make” activities where you take apart different objects and learn to assemble them back.', '609878_Tinkering.png'),
(7, 2, 'Electronics & Robotics Section', 'Take part in robotics workshops where you learn about circuitry and how to build your own robots.', '876658_tool-bar.png'),
(8, 2, 'Tool Bar', 'Learn to open, screw, drill, cut, sand, and polish objects with an array of safe hand and power tools.', '556349_robotics.png'),
(9, 2, 'Art Studio', 'Paint, draw, sculpt, make, and bake ceramics — and also learn about art techniques, and local and global art history.', '347025_Art_studio.png'),
(10, 2, 'Rapid Prototyping Studio', 'Bring your ideas to life with precision and speed, using cutting-edge technology such as 3D printers, laser cutters, and CNC routers.', '816159_Rapid_prototyping_studio.png'),
(11, 2, 'Woodworking Studio', 'Hammer, saw, and build anything from a birdhouse to a boat, using our fully-equipped woodworking workshop.', '54_Woodworking_studio.png'),
(12, 2, 'Idea Studio (Classroom)', 'Brainstorm ideas with your friends, and engage in educational and skill-building workshops.', '822526_Idea_studio_photo_studio_media_studio.png'),
(13, 2, 'Photo Studio', 'Coming soon', '352319_Idea_studio_photo_studio_media_studio.png'),
(14, 2, 'Media Studio', 'Mix up your own sounds and make your own music with different electronic equipment in this sound-proof recording studio.', '868737_Idea_studio_photo_studio_media_studio.png'),
(15, 3, 'Conservation Zone', 'Get inspired by young changemakers, learn how we get water in our tap, and track your own water footprint.', '3_Conservation_Zone.png'),
(16, 3, 'Immersive Zone', 'Follow a turtle named Puddles along its aquatic journey, explore life in the deepest depths of the sea, and discover the treasures of the ocean.', '45_Immersive_Zone.png'),
(17, 3, 'Empathy Zone', 'Learn about the lives of the Koli fishermen, save Mumbai’s deteriorating rivers, and learn about the challenges of collecting water in villages.', '85_empathy_zone_(2).png'),
(18, 3, 'Inspiration Zone', 'Dive into our display of innovative solutions, and make a pledge to become a changemaker yourself.', '794283_inspiration_zone.png'),
(19, 3, 'Investigation Zone', 'Set off on a thrilling interactive adventure through Mumbai’s waterways, solving puzzles and unravelling secrets to save the city’s precious resources.', '47_Investigation_Zone.png'),
(20, 4, 'Air Play', 'How do planes fly? How does air keep objects intact and in the air? Here, you’ll learn about the principles of physics as you put your design skills to play.', '415914_Airplay.png'),
(21, 4, 'Build It', 'How do you build a car that goes fast and far, or a building that withstands an earthquake? Here, you’ll learn how to design, test, and improve your solutions.', '288041_Build_it.png'),
(22, 4, 'Create It', 'How do you tell a story using stop-motion animation? How do you replicate a super-fast sequence code? Here, you’ll put your creativity and observational skills to the test.', '87588_Create_it.png'),
(23, 4, 'Big Moves', 'How do you lift your own weight or keep up with speed? Here, you’ll learn about the importance of physical exercise as you make your own big moves.', '544295_Big_moves.png'),
(24, 4, 'Water Play', 'How does water travel from one place to another, and to our homes? How do we keep it clean? Here, you’ll learn how—no matter what—water always finds its way.', '502701_water_play.png'),
(25, 4, 'Luckey Climber', 'This is India’s only Luckey Climber — a safe, three-storey climbing environment that is designed for children of all ages and allows them to problem-solve, think spatially, and have fun!', '224522_Luckey_Climber.png'),
(26, 5, '', '', NULL),
(27, 6, 'The Commons', 'Our 220-seater amphitheatre that acts as a waiting area during the day and a black-box theatre at night for community and public events.', '24_commons_(2).png'),
(28, 6, 'The Shop', 'The Shop is filled with curated products that reflect our values of inclusivity, child-friendliness, and reality-rooted learning. These products are also designed to supplement what children learn at the museum.', '42_shop_(2).png'),
(29, 6, 'Immersive Gallery', 'Opening soon', NULL),
(31, 8, 'Subko Cacao', 'A takeaway coffee and bakery counter by Subko, where you get Subko’s specialty coffee and snacks on-the-go while you wait to get your tickets.', '28_Subko_Cacao.png'),
(32, 8, 'Subko Specialty Coffee & Craft Bakehouse', 'A sit-down restaurant by Subko—designed especially for MuSo—where families can come and relax, and grab something to eat and drink.', '73_Subko_specialty_coffee_&_craft_bakehouse.png');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homepage_video`
--

CREATE TABLE `homepage_video` (
  `id` int NOT NULL,
  `video` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `homepage_video`
--

INSERT INTO `homepage_video` (`id`, `video`) VALUES
(1, '1699949717_9_VIDEO-2023-05-29-21-59-27.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `hompage_sign_up`
--

CREATE TABLE `hompage_sign_up` (
  `id` int NOT NULL,
  `email_newsletter` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `hompage_sign_up`
--

INSERT INTO `hompage_sign_up` (`id`, `email_newsletter`, `date`) VALUES
(1, 'sinha.dheeraj@gmail.com', '2023-11-28 14:02:40'),
(14, 'abc@gmail.com', '2023-12-15 06:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

CREATE TABLE `join_us` (
  `id` int NOT NULL,
  `join_us` longtext NOT NULL,
  `jsw_content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `join_us`
--

INSERT INTO `join_us` (`id`, `join_us`, `jsw_content`) VALUES
(1, '<p>We&rsquo;re always on the lookout for people who want to inspire and shape the young minds of tomorrow. Whether you&rsquo;re envisioning a role in exhibit design, educational programming, visitor engagement, social media strategy, content writing, or administration, MuSo offers a dynamic environment for growth.</p>\r\n\r\n<p>Send your CV to&nbsp;<a href=\"mailto:careers@museumofsolutions.in\">careers@museumofsolutions.in</a></p>', '<p>MuSo is a JSW initiative.</p>\r\n\r\n<p>JSW Foundation&mdash;a Public Charitable Trust incorporated under the Indian Trust Act of 1882&mdash;is the social development arm of the JSW group. The foundation comprises companies formed to render charitable work and Corporate Social Responsibility (CSR) activities in education, healthcare, sports, art conservation, and the environment. JSW&rsquo;s most significant accomplishments are built on the commitment to dream big and work in collaboration. JSW believes that in order to create change we all have to collaborate and tackle these issues together. One of the foundation&rsquo;s biggest priorities is the overall enhancement of the quality of education.</p>'),
(3, 'This is a join us update', 'This is a JSW content'),
(4, 'This is a join us update', 'This is a JSW content'),
(5, 'This is a join us update', 'This is a JSW content'),
(6, 'This is a join us update', 'This is a JSW content'),
(7, 'This is a join us update', 'This is a JSW content');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_08_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_08_03_061844_create_user_types_table', 1),
(4, '2022_08_03_061918_create_role_type_users_table', 1),
(5, '2022_08_04_053627_create_sequence_tbls_table', 1),
(6, '2022_08_04_053741_create_generate_id_tbls_table', 1),
(7, '2022_08_12_100000_create_password_resets_table', 1),
(8, '2022_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `muso_membership`
--

CREATE TABLE `muso_membership` (
  `id` int NOT NULL,
  `membership_id` int NOT NULL,
  `price_text` varchar(100) NOT NULL,
  `tag_line` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muso_membership`
--

INSERT INTO `muso_membership` (`id`, `membership_id`, `price_text`, `tag_line`) VALUES
(1, 1, '₹3,899 for 1 child and 1 grown-up', ''),
(2, 2, '₹8,399 for 1 child and 1 grown-up', ''),
(3, 3, '₹17,999 for 1 child and 1 grown-up', ''),
(4, 4, '₹10,00,000 for 2 children, 2 grown-ups, and 4 guests', 'Join a group of generous philanthropists and deepen your commitment to the MuSo cause.');

-- --------------------------------------------------------

--
-- Table structure for table `muso_membership_details`
--

CREATE TABLE `muso_membership_details` (
  `id` int NOT NULL,
  `membership_id` int NOT NULL,
  `terms_condition` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muso_membership_details`
--

INSERT INTO `muso_membership_details` (`id`, `membership_id`, `terms_condition`) VALUES
(1, 1, 'With the Mini Membership, you get'),
(2, 1, 'Duration 3 months'),
(4, 2, 'With the Family Membership, you get'),
(8, 3, 'With the Champion Membership, you get'),
(9, 3, 'Duration 12 months'),
(11, 4, 'With the Patron Membership, you get'),
(12, 4, '🎟️ Unlimited free visits for 2 children, 2 grown-ups, and 4 guests'),
(15, 1, '3 visits included'),
(16, 1, 'Includes 1 grown-up and 1 child*'),
(17, 2, 'Duration 6 months'),
(18, 2, '6 visits included'),
(19, 3, '12 visits included'),
(20, 3, 'Includes 1 grown-up and 1 child*'),
(21, 3, '*can add-on a grown-up or child'),
(22, 3, ''),
(23, 3, ''),
(25, 4, '✏️ 20% discount on workshops and events'),
(26, 4, '🛒 10% discount at The Shop'),
(27, 4, '☕️ 10% discount at the Subko counter and café'),
(28, 4, '🎈 10% discount on party and event packages'),
(29, 4, '🎁 Special birthday gifts for your children'),
(30, 4, '🥁 Recognition on our website'),
(31, 4, '📰 Recognition in our email newsletter'),
(32, 1, '*can add-on a grown-up or child'),
(33, 2, 'Includes 1 grown-up and 1 child*'),
(34, 2, '*can add-on a grown-up or child');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrons_supporters`
--

CREATE TABLE `patrons_supporters` (
  `id` int NOT NULL,
  `content` longtext NOT NULL,
  `sponsors` longtext NOT NULL,
  `patrons` longtext NOT NULL,
  `supporters` longtext NOT NULL,
  `friends` longtext NOT NULL,
  `donate` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patrons_supporters`
--

INSERT INTO `patrons_supporters` (`id`, `content`, `sponsors`, `patrons`, `supporters`, `friends`, `donate`) VALUES
(1, '<p>Our supporters are the integral foundation of the museum. Their steadfast backing helps us cultivate an environment where hands-on learning thrives. Their contributions enable us to spark curiosity, foster creativity, and shape the future through immersive educational adventures.</p>', 'Jsw foundation,Axis Bank,APL,Pirosha Godrej Foundation', 'JSW Foundation,Axis Bank Limited,APL Apollo Tubes,HSBC,Epsilon Carbon Private Limited,Pirojsha Godrej Foundation,TCPL Foundation,Arya Foundation,Kayan Foundation,Warburg Pincus India Private Limited,Bain Capital,Infinix,Abby Lighting,Skillmatics,Kanoria Centre of Arts', 'Sangita Jindal,Preeti Sanghi,Sharda Jatia,Taparia Family', 'Ravi Mahinder Lambha,Arya Foundation,Kayan Foundation,Jyoti Prasad Tapraria,Shraddha Jatia', '<p>Discover countless ways to support MuSo! We welcome individuals, families,corporations, and everyone in between to join us on this incredible journey. In return for your generous support, we offer a variety of customised benefits and privileges as tokens of our gratitude.</p>\r\n\r\n<p>Write to us at <a href=\"mailto:donate@museumofsolutions.in\">donate@museumofsolutions.in</a> to learn more.</p>'),
(2, '<p>Our supporters are the integral foundation of the museum. Their steadfast backing helps us cultivate an environment where hands-on learning thrives. Their contributions enable us to spark curiosity, foster creativity, and shape the future through immersive educational adventures.</p>', 'Jsw foundation,Axis Bank,APL,Pirosha Godrej Foundation', 'JSW Foundation,Axis Bank Limited,APL Apollo Tubes,Kanoria Centre of Arts', 'Sangita Jindal,Preeti Sanghi,Taparia Family', 'Ravi Mahinder Lambha,Arya Foundation,Kayan Foundation,Jyoti Prasad Tapraria,Shraddha Jatia', '<p>Discover countless ways to support MuSo! We welcome individuals, families,corporations, and everyone in between to join us on this incredible journey. In return for your generous support, we offer a variety of customised benefits and privileges as tokens of our gratitude.</p>\r\n\r\n<p>Write to us at marketing@museumofsolutions.in to learn more.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_type_users`
--

CREATE TABLE `role_type_users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_type_users`
--

INSERT INTO `role_type_users` (`id`, `role_type`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Super Admin', NULL, NULL),
(3, 'Normal User', NULL, NULL),
(4, 'Client', NULL, NULL),
(5, 'Employee', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `school_event`
--

CREATE TABLE `school_event` (
  `id` int NOT NULL,
  `content` longtext NOT NULL,
  `img_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_event`
--

INSERT INTO `school_event` (`id`, `content`, `img_name`) VALUES
(1, '<h3><span style=\"color:#000000\"><strong>Interested in hosting an event or a school visit?</strong></span></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"background-color:transparent\">MuSo can help you organise and host children&rsquo;s parties, including birthdays.</span></span></p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"background-color:transparent\">The museum also offers special packages for school field trips and larger groups.</span></span></p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"background-color:transparent\">Our 220-seater auditorium, The Commons, is also available for events and screenings.</span></span></p>\r\n\r\n<p><span style=\"color:#000000\"><span style=\"background-color:transparent\">Just drop us your contact info, and we&rsquo;ll have our awesome team reach out to you shortly.</span></span></p>', 'Events.JPG,events (2).JPG,events (3).JPG');

-- --------------------------------------------------------

--
-- Table structure for table `sequence_tbls`
--

CREATE TABLE `sequence_tbls` (
  `id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sequence_tbls`
--

INSERT INTO `sequence_tbls` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_id`, `email`, `join_date`, `phone_number`, `status`, `role_name`, `avatar`, `position`, `department`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Muso', '00006', 'info@museumofsolutions.in', 'Wed, Sep 13, 2023 1:24 PM', NULL, NULL, 'Super Admin', 'photo_defaults.jpg', NULL, NULL, NULL, '$2y$10$Eg8vueqRqIegblU1q3khRuNzznkV6xfKEjx43JoT9LR5o46Ph6W1y', NULL, '2023-09-13 07:54:51', '2023-12-16 12:36:18');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `id_store` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
                INSERT INTO sequence_tbls VALUES (NULL);
                SET NEW.user_id = CONCAT("0", LPAD(LAST_INSERT_ID(), 4, "0"));
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint UNSIGNED NOT NULL,
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Active', NULL, NULL),
(2, 'Inactive', NULL, NULL),
(3, 'Disable', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visit_bookings`
--

CREATE TABLE `visit_bookings` (
  `id` int NOT NULL,
  `Date_field` varchar(100) DEFAULT NULL,
  `Child_Tickets` varchar(500) DEFAULT NULL,
  `Adult_Tickets` varchar(500) DEFAULT NULL,
  `Slot_From_Sites` longtext,
  `Email` longtext,
  `Ticket_Type` varchar(100) DEFAULT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Names` longtext,
  `Date_of_Birth` longtext,
  `Total_Price` int DEFAULT NULL,
  `Grand_Total` int DEFAULT NULL,
  `refernce_id` varchar(255) DEFAULT NULL,
  `payment_status` enum('pending','failed','success','others') DEFAULT 'pending',
  `amount` int DEFAULT NULL,
  `web_ref` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visit_bookings`
--

INSERT INTO `visit_bookings` (`id`, `Date_field`, `Child_Tickets`, `Adult_Tickets`, `Slot_From_Sites`, `Email`, `Ticket_Type`, `Phone_Number`, `Names`, `Date_of_Birth`, `Total_Price`, `Grand_Total`, `refernce_id`, `payment_status`, `amount`, `web_ref`) VALUES
(1, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'abdulbaquee@gmail.com', 'Normal', '09323932123', 'Abdul Baquee,Abdul Baquee', '2023-11-1,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701165542509'),
(2, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'abdulbaquee@gmail.com', 'Normal', '09323932123', 'Abdul Baquee,Abdul Baquee', '2023-11-1,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701174390079'),
(3, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'arun@asdf.com', 'Normal', '9833556442', 'a,b', '2023-1-4,1989-11-16', 1298, 1298, '132456', 'success', 1234, '1701175426241'),
(4, '2023-11-11', '1', '1', '12:30 PM-03:00 PM', 'sss@kkk.com', 'Normal', '8888828888', 'ss,ssd', '2023-11-1,1987-11-5', 1298, 1298, NULL, NULL, NULL, '1701177077364'),
(5, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'ssa@sss.com', 'Normal', '8888888888', 'ss,ssd', '2023-11-1,1987-11-4', 1298, 1298, NULL, NULL, NULL, '1701177790776'),
(6, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'vinod@zappyworks.com', 'Normal', '9789071144', 'a,b', '2011-11-1,1980-11-1', 1298, 1298, NULL, NULL, NULL, '1701178335938'),
(7, '2023-11-11', '1', '1', '03:30 PM-06:00 PM', 'tanvijindal@gmail.com', 'Normal', '+919821122411', 'Samara,Tanvi', '2015-2-5,1987-2-14', 1298, 1298, NULL, NULL, NULL, '1701178429166'),
(8, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tushar.kashmiri@jsw.in', 'Normal', '09167773794', 'Aarav,Tushar', '2018-12-22,1990-3-18', 1298, 1298, NULL, NULL, NULL, '1701179957017'),
(9, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tushar.kashmiri@jsw.in', 'Normal', '9167773794', 'Aarav,Tushar', '2019-12-22,1990-3-11', 1298, 1298, NULL, NULL, NULL, '1701180205081'),
(10, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tushar.kashmiri@jsw.in', 'Normal', '09167773794', 'Aarav,Tushar', '2019-12-22,1990-3-11', 1298, 1298, NULL, NULL, NULL, '1701181440202'),
(11, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tanvijindal@gmail.com', 'Normal', '+919821122411', 'Tara,Tanvi', '2016-11-15,1987-2-14', 1298, 1298, NULL, NULL, NULL, '1701183615662'),
(12, '2023-11-11', '1', '1', '03:30 PM-06:00 PM', 'tanvijindal@gmail.com', 'Normal', '+919821122411', 'Tanvi Shete,Tanvi Shete', '2023-11-15,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701184686124'),
(13, '2023-11-11', '1', '1', '12:30 PM-03:00 PM', 'abhikabhik@gmail.com', 'Normal', '8279889639', 'abhik ,megha', '2004-3-12,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701185011567'),
(14, '2023-11-11', '1', '1', '12:30 PM-03:00 PM', 'vinod@zappyworks.com', 'Normal', '9789071144', 'a,b', '2011-11-1,1980-11-1', 1298, 1298, NULL, NULL, NULL, '1701186091241'),
(15, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tanvijindal@gmail.com', 'Normal', '9821122411', 'Tara,tanvi', '2023-11-10,2005-11-12', 1298, 1298, NULL, NULL, NULL, '1701186973381'),
(16, '2023-11-11', '1', '1', '12:30 PM-03:00 PM', 'vinod1978@gmail.com', 'Normal', '9789071144', 'a,b', '2011-11-1,1980-11-1', 1298, 1298, NULL, NULL, NULL, '1701187386920'),
(17, '2023-11-11', '1', '1', '12:30 PM-03:00 PM', 'bilwa.kulkarni@gmail.com', 'Normal', '9819033317', 'Bilwa Kulkarni-Poddar,Bilwa Kulkarni-Poddar', '1984-12-6,1984-12-6', 1298, 1298, NULL, NULL, NULL, '1701187544808'),
(18, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tanvijindal@gmail.com', 'Normal', '9821122411', 't,t', '2023-11-11,2005-11-19', 1298, 1298, NULL, NULL, NULL, '1701188230681'),
(19, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tanvijindal@gmail.com', 'Normal', '9821122411', 'Tanvi Shete Shete,t', '2023-11-16,2005-11-19', 1298, 1298, NULL, NULL, NULL, '1701188283049'),
(20, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'nilesh.kurle@gmail.com', 'Normal', '9920955259', 'Anisha kurle,Nilesh Kurrle', '2018-1-6,1980-4-13', 1298, 1298, NULL, NULL, NULL, '1701188316246'),
(21, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'hetal.shah@museumofsolutions.in', 'Normal', '8879371163', 'Minarv Shah ,Hetal Shah', '2017-11-1,1990-11-28', 1298, 1298, NULL, NULL, NULL, '1701188464071'),
(22, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'natasham286@gmail.com', 'Normal', '9820283603', 'Natasha Mehta,Natasha Mehta', '2023-11-17,2005-11-13', 1298, 1298, NULL, NULL, NULL, '1701188470263'),
(23, '2023-11-11', '1', '1', '03:30 PM-06:00 PM', 'tanvijindal@gmail.com', 'Normal', '9821122411', 't,t', '2023-11-8,2005-11-16', 1298, 1298, NULL, NULL, NULL, '1701188848155'),
(24, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tanvijindal@gmail.com', 'Normal', '9821122411', 't,t', '2023-11-23,2005-11-10', 1298, 1298, NULL, NULL, NULL, '1701189062543'),
(25, '2023-11-11', '1', '1', '12:30 PM-03:00 PM', 'nilesh.kurle@gmail.com', 'Normal', '9920955259', 'Anisha,Nilesh', '2008-11-4,1982-11-7', 1298, 1298, NULL, NULL, NULL, '1701190174318'),
(26, '2023-11-11', '1', '1', '12:30 PM-03:00 PM', 'jugalparekh@gmail.com', 'Normal', '420373572', 'Vedhika Parekh,Jugal Parekh', '2013-1-14,1985-11-18', 1298, 1298, NULL, NULL, NULL, '1701232019888'),
(27, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'renuka.t@zappyworks.com', 'Normal', '7397233435', 'Renuka,test', '2004-11-5,1997-11-13', 1298, 1298, NULL, NULL, NULL, '1701283729601'),
(28, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'kb@gmail.com', 'Normal', '9876765434', 'Hari,Kavin', '2014-11-8,1999-9-5', 1298, 1298, NULL, NULL, NULL, '1701237838133'),
(29, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'k@gmail.com', 'Normal', '9856325478', 'Hari,Kavin', '2018-11-10,1999-9-5', 1298, 1298, NULL, NULL, NULL, '1701239042565'),
(30, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'hk@gmail.com', 'Normal', '8653254698', 'Hari,Kavin', '2017-11-11,1999-9-5', 1298, 1298, NULL, NULL, NULL, '1701239530205'),
(31, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'renuka.t@zappyworks.com', 'Normal', '7397233435', 'test,tet', '2011-11-2,1998-11-6', 1298, 1298, NULL, NULL, NULL, '1701288469524'),
(32, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tanvijindal@gmail.com', 'Normal', '9821122411', 'tt,tt', '2023-11-23,2005-11-25', 1298, 1298, NULL, NULL, NULL, '1701244605307'),
(33, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'test@gmail.com', 'Normal', '9898989898', 'test,test1', '2014-11-26,1998-11-5', 1298, 1298, NULL, NULL, NULL, '1701293846928'),
(34, '2023-11-11', '1', '1', '12:30 PM-03:00 PM', 'vinod1978@gmail.com', 'Normal', '9789071144', 'a,b', '2011-11-1,1980-11-1', 1298, 1298, NULL, NULL, NULL, '1701246409779'),
(35, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 's@gmail.com', 'Normal', '9167637556', 's,s', '2023-11-3,2005-11-4', 1298, 1298, NULL, NULL, NULL, '1701253382140'),
(36, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'renuka.t@zappyworks.com', 'Normal', '7397233435', 'test,test1', '2016-11-11,1985-11-14', 1298, 1298, NULL, NULL, NULL, '1701258531219'),
(37, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'renuka.t@zappyworrks.com', 'Normal', '7878656565', 'abisha,Abisha', '2013-11-1,1994-11-4', 1298, 1298, 'MuSo_001', 'success', 2000, '1701259270207'),
(38, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'renuka.t@zappyworks.com', 'Normal', '9897989798', 'kavi,bhar', '2013-11-7,1986-11-21', 1298, 1298, NULL, NULL, NULL, '1701261470706'),
(39, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'kkowsalya65@gmail.com', 'Normal', '9898989898', 'bhar,kabi', '2007-11-8,1989-11-9', 1298, 1298, NULL, NULL, NULL, '1701262193649'),
(40, '2023-11-11', '1', '1', '03:30 PM-06:00 PM', 'tanvijindal@gmail.com', 'Normal', '9821122411', 'Tanvi Shete,tt', '2023-11-9,2005-11-18', 1298, 1298, '123!abc_@', 'success', 1234, '1701263769611'),
(41, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'tanvijindal@gmail.com', 'Normal', '+919821122411', 'Tanvi Shete,Tanvi Shete', '2023-11-1,2005-11-10', 1298, 1298, 'arun_abdul_kishan_12345678', 'failed', 1005821, '1701274200240'),
(42, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'vinod@zappyworks.com', 'Normal', '9789071144', 'a,b', '2023-11-1,2005-11-1', 1298, 1298, 'MuSo_565', 'success', 1, '1701278777213'),
(43, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'abdulbaquee@gmail.com', 'Normal', '09323932123', 'Abdul Baquee,Abdul Baquee', '2023-11-1,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701280635299'),
(44, '2023-11-11', '1', '1', '09:30 AM-12:00 PM', 'abdulbaquee@gmail.com', 'Normal', '9323932123', 'Abdul Baquee,Abdul Baquee', '2023-11-1,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701281009452'),
(45, '30-11-2023', '1', '1', '09:30 AM-12:00 PM', 'abdulbaquee@gmail.com', 'Normal', '09323932123', 'Abdul Baquee,Abdul Baquee', '2023-11-1,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701281369105'),
(46, '2023-11-30', '1', '1', '09:30 AM-12:00 PM', 'abdulbaquee@gmail.com', 'Normal', '09323932123', 'Abdul Baquee,Abdul Baquee', '2023-11-1,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701281590241'),
(47, '2023-11-30', '1', '1', '12:30 PM-03:00 PM', 'abc@gmail.com', 'Normal', '9323932123', 'Arun,Abdul Baquee', '2023-11-2,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1701282794066'),
(48, '2023-11-30', '1', '1', '03:30 PM-06:00 PM', 'arun@immersionx.io', 'Normal', '9833556442', 'a,c', '2023-1-4,1991-11-1', 1298, 1298, 'MuSo_572', 'success', 1298, '1701283115726'),
(49, '2023-11-30', '1', '2', '12:30 PM-03:00 PM', 'df@gmail.com', 'Flexi', '9930120370', 'ah,df,fd', '2012-11-27,1994-11-15,1981-11-3', 2697, 2697, NULL, NULL, NULL, '1701318644432'),
(50, '2023-11-30', '1', '1', '09:30 AM-12:00 PM', 'vinod1978@gmail.com', 'Normal', '9789071144', 'a,b', '2023-11-1,1990-11-1', 1298, 1298, NULL, NULL, NULL, '1701319011398'),
(51, '2023-11-30', '1', '1', '09:30 AM-12:00 PM', 'vinod1978@gmail.com', 'Flexi', '9789071144', 'a,b', '2023-11-1,2000-11-1', 1898, 1898, NULL, NULL, NULL, '1701319106532'),
(52, '2023-12-2', '1', '1', '12:30 PM-03:00 PM', 'a@gmail.com', 'Normal', '9167637556', 'q,w', '2023-11-1,2005-11-3', 1998, 1998, NULL, NULL, NULL, '1701367207201'),
(53, '2023-12-2', '1', '1', '09:30 AM-12:00 PM', 'aruns.nambiar@gmail.com', 'Normal', '9999999999', 'Arun S Nambiar,Arun', '2023-11-30,2001-12-13', 1998, 1998, NULL, NULL, NULL, '1701425829446'),
(54, '2023-12-2', '1', '1', '06:30 PM-09:00 PM', 'chhandita_r@yahoo.com', 'Flexi', '9833556442', 'Arun S Nambiar,Chhandita Nambiar', '2018-12-7,1983-12-2', 2998, 2998, NULL, NULL, NULL, '1701437465333'),
(55, '2023-12-6', '1', '1', '09:30 AM-12:00 PM', 'bonney@gmail.com', 'Normal', '9167637556', 'kishan,abhishek', '2007-12-13,2005-11-4', 1298, 1298, NULL, NULL, NULL, '1701688190666'),
(56, '2023-12-14', '1', '1', '09:30 AM-12:00 PM', 'abhikabhik@gmail.com', 'Normal', '8279889639', 'abhik ,abh', '2023-12-6,2005-11-2', 1298, 1298, NULL, NULL, NULL, '1702361049102'),
(57, '2023-12-13', '1', '1', '12:30 PM-03:00 PM', 'a@gmail.com', 'Normal', '9167637556', 'cd,hu', '2023-12-7,2005-11-3', 1298, 1298, NULL, NULL, NULL, '1702362861263'),
(58, '2023-12-13', '1', '1', '09:30 AM-12:00 PM', 'a@gmail.com', 'Normal', '9167637556', 'a,v', '2023-12-7,2005-11-5', 1298, 1298, NULL, NULL, NULL, '1702363026031'),
(59, '2023-12-15', '1', '1', '06:30 PM-09:00 PM', 'aarti.mimani@museumofsolutions.in', 'Normal', '7021314392', 'a,as', '2016-12-2,1984-11-1', 1998, 1998, NULL, NULL, NULL, '1702550018909'),
(60, '2023-11-25 23:05:05', '05', '2', '2pm-7pm', 'kishan@gmail.com', 'single', '9999999999', 'a,b,c,d', '2013-11-19,2013-11-19,2013-11-19', 2020, 2029, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visit_hours`
--

CREATE TABLE `visit_hours` (
  `id` int NOT NULL,
  `muso_galleries` varchar(100) NOT NULL,
  `subko_counter` varchar(100) NOT NULL,
  `library` varchar(100) NOT NULL,
  `the_shop` varchar(100) NOT NULL,
  `subko_cafe` varchar(100) NOT NULL,
  `recycling_center` varchar(100) NOT NULL,
  `the_commons` varchar(100) NOT NULL,
  `immersive_gallery` varchar(100) NOT NULL,
  `parking_garage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visit_hours`
--

INSERT INTO `visit_hours` (`id`, `muso_galleries`, `subko_counter`, `library`, `the_shop`, `subko_cafe`, `recycling_center`, `the_commons`, `immersive_gallery`, `parking_garage`) VALUES
(2, 'Open Daily 9 am- 9pm', 'On the Lobby Floor Open Daily 7am - 10pm', 'On Floor 6 Open Daily, 10am- 6pm', 'On the Lobby Floor Open Daily 10am-6pm', 'On Floor 1 Open Daily 7am - 10pm', 'on Floor 5 Open Daily 10am - 6pm', 'on the Lobby Floor Open daily 9am-9pm', 'on Floor 1 open daily 10am-6pm', 'Open daily 7am-11pm');

-- --------------------------------------------------------

--
-- Table structure for table `visit_member_form`
--

CREATE TABLE `visit_member_form` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `query_dropdown` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `visit_member_form`
--

INSERT INTO `visit_member_form` (`id`, `name`, `email`, `phone`, `query_dropdown`) VALUES
(2, 'arun', 'arun@sadf.com', '9833556442', 'Workshops & courses'),
(3, 'Arun S Nambiar', 'aruns.nambiar@gmail.com', '+919833556442', 'kishan test');

-- --------------------------------------------------------

--
-- Table structure for table `visit_school_form`
--

CREATE TABLE `visit_school_form` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `query_dropdown` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `visit_school_form`
--

INSERT INTO `visit_school_form` (`id`, `name`, `email`, `phone`, `query_dropdown`) VALUES
(1, 'kishan', 'abc', '111', 'abc'),
(4, 'Shahnawaz Shaikh', 'mohd12345m@gmail.com', '9821399578', 'Workshops & courses'),
(5, 'Shanu', 'mohd@gmail.com', '9821399578', 'Workshops & courses'),
(6, 'Shahnawaz Shaikh', 'mohd12345m@gmail.com', '1234567890', 'Workshops & courses'),
(8, 'Arun S Nambiar', 'aruns.nambiar@gmail.com', '9833556442', 'Exhibit experiences'),
(9, 'Arun S Nambiar', 'aruns.nambiar@gmail.com', '+919833556442', 'school visist kishan test'),
(10, 'sasasasas', 'mohd123@gmail.com', '9821399789', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `whats_on_bookings`
--

CREATE TABLE `whats_on_bookings` (
  `id` int NOT NULL,
  `Event_Title` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `Tickets` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Name` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `Date_of_Birth` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `Phone_Number` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Total_Price` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `Booking_Reference_Number` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Payment_Status` enum('pending','failed','success','others') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT 'pending',
  `Paid_Amount` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `web_ref` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `whats_on_bookings`
--

INSERT INTO `whats_on_bookings` (`id`, `Event_Title`, `Tickets`, `Email`, `Name`, `Date_of_Birth`, `Phone_Number`, `Total_Price`, `Booking_Reference_Number`, `Payment_Status`, `Paid_Amount`, `web_ref`) VALUES
(1, 'test', '25', 'kishan@gmail.com', 'Kishan sharma', '2023-11-10', '9999999999', '1000.00', '132456', 'success', '1234', '1700802362441'),
(2, 'ABC', '2', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701180507023'),
(3, 'ABC', '1', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701181345406'),
(4, 'ABC', '1', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701181345406'),
(5, 'ABC', '1', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701181440073'),
(6, 'ABC', '1', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701181582292'),
(7, 'ABC', '1', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701182537966'),
(8, 'ABC Event Title', '5', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701186046869'),
(9, 'ABC Event Title', '11', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701186330134'),
(10, 'ABC Event Title', '1', 'abdul@gmail.com', 'Abdul', '2023-11-2', '9323932123', '1200.00', NULL, NULL, NULL, '1701186487785'),
(11, 'ABC Event Title', '2', 'abdulbaquee@gmail.com', 'Abdul Baquee', '2023-11-1', '09323932123', '1200.00', NULL, NULL, NULL, '1701187445266'),
(12, 'ABC Event Title', '5', 'tanvijindal@gmail.com', 'Tarini Handa', '2023-11-2', '9821122411', '1200.00', NULL, NULL, NULL, '1701188893476'),
(13, 'Old paintings', '3', 'test@gmail.com', 'test', '2018-11-2', '8989898989', '10000.00', NULL, NULL, NULL, '1701248818022'),
(14, 'Podcasting Workshop', '2', 'vinod@zappyworks.com', 'a', '2010-12-1', '9789071144', '999.00', NULL, NULL, NULL, '1701867122817'),
(15, 'Podcasting Workshop', '4', 'test@gmail.com', 'renuka', '2006-12-7', '8989898989', '999.00', NULL, NULL, NULL, '1701867175838'),
(16, 'MuSo Christmas Market', '5', 'tr@gmail.com', 'tr', '2003-12-4', '9898989898', '0.00', NULL, NULL, NULL, '1701940040997'),
(17, 'MuSo Christmas Market', '5', 'yy@gmail.com', 'yy', '2004-12-8', '9898989898', '0.00', NULL, NULL, NULL, '1701940160980'),
(18, 'MuSo Christmas Market', '5', 'test@gmail.com', 'test', '2004-12-2', '8989898978', '0.00', NULL, NULL, NULL, '1701940580851');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_anual_report`
--
ALTER TABLE `about_anual_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_assets`
--
ALTER TABLE `about_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_content`
--
ALTER TABLE `about_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisory_board`
--
ALTER TABLE `advisory_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childrens_panel`
--
ALTER TABLE `childrens_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultants`
--
ALTER TABLE `consultants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_content`
--
ALTER TABLE `contact_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page_details`
--
ALTER TABLE `contact_page_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doodle_details`
--
ALTER TABLE `doodle_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doodle_prompt`
--
ALTER TABLE `doodle_prompt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doodle_user_details`
--
ALTER TABLE `doodle_user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_assets`
--
ALTER TABLE `event_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_organiser`
--
ALTER TABLE `event_organiser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `executive_team`
--
ALTER TABLE `executive_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `explore_section`
--
ALTER TABLE `explore_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `explore_tab`
--
ALTER TABLE `explore_tab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homepage_video`
--
ALTER TABLE `homepage_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hompage_sign_up`
--
ALTER TABLE `hompage_sign_up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_us`
--
ALTER TABLE `join_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muso_membership`
--
ALTER TABLE `muso_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muso_membership_details`
--
ALTER TABLE `muso_membership_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patrons_supporters`
--
ALTER TABLE `patrons_supporters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role_type_users`
--
ALTER TABLE `role_type_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_event`
--
ALTER TABLE `school_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sequence_tbls`
--
ALTER TABLE `sequence_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_bookings`
--
ALTER TABLE `visit_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_hours`
--
ALTER TABLE `visit_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_member_form`
--
ALTER TABLE `visit_member_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_school_form`
--
ALTER TABLE `visit_school_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `whats_on_bookings`
--
ALTER TABLE `whats_on_bookings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_anual_report`
--
ALTER TABLE `about_anual_report`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `about_assets`
--
ALTER TABLE `about_assets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `about_content`
--
ALTER TABLE `about_content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `advisory_board`
--
ALTER TABLE `advisory_board`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `childrens_panel`
--
ALTER TABLE `childrens_panel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultants`
--
ALTER TABLE `consultants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `contact_content`
--
ALTER TABLE `contact_content`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_page_details`
--
ALTER TABLE `contact_page_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doodle_details`
--
ALTER TABLE `doodle_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doodle_prompt`
--
ALTER TABLE `doodle_prompt`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `doodle_user_details`
--
ALTER TABLE `doodle_user_details`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event_assets`
--
ALTER TABLE `event_assets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `event_organiser`
--
ALTER TABLE `event_organiser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `executive_team`
--
ALTER TABLE `executive_team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `explore_section`
--
ALTER TABLE `explore_section`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `explore_tab`
--
ALTER TABLE `explore_tab`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage_video`
--
ALTER TABLE `homepage_video`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hompage_sign_up`
--
ALTER TABLE `hompage_sign_up`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `join_us`
--
ALTER TABLE `join_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `muso_membership`
--
ALTER TABLE `muso_membership`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `muso_membership_details`
--
ALTER TABLE `muso_membership_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `patrons_supporters`
--
ALTER TABLE `patrons_supporters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_type_users`
--
ALTER TABLE `role_type_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_event`
--
ALTER TABLE `school_event`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sequence_tbls`
--
ALTER TABLE `sequence_tbls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visit_bookings`
--
ALTER TABLE `visit_bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `visit_hours`
--
ALTER TABLE `visit_hours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visit_member_form`
--
ALTER TABLE `visit_member_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `visit_school_form`
--
ALTER TABLE `visit_school_form`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `whats_on_bookings`
--
ALTER TABLE `whats_on_bookings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
