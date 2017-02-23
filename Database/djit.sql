-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2017 at 08:22 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `djit`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_details` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comments_img` text NOT NULL,
  `comment_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_details`, `post_id`, `user_id`, `comments_img`, `comment_created_date`) VALUES
(1, 'With a single rocket, India successfully put 104 satellites into orbit, breaking the previous record set by Russia.', 6, 2, '', '2017-02-21 13:56:36'),
(2, 'Step towards growing transplantable organs is taken by creation of embryos combining pig and human stem cells.', 3, 2, 'uploads/comments/12108785_10153820391547518_3196407759340377708_n.jpg', '2017-02-21 13:57:17'),
(3, 'Space Research Organisation (ISRO) announced all the satellites ', 3, 5, '', '2017-02-21 14:19:22'),
(4, 'Wrongly convicted American lobbies to get capital punishment abolished', 6, 5, '', '2017-02-21 14:21:11'),
(5, 'A majority of the 63 percent of Americans who support the death penalty change their mind and at least feel that there should be a moratorium after hearing us speaking.', 6, 6, 'uploads/comments/5a7e767136a141249b02eeab8ccbe82b_18.jpg', '2017-02-21 14:27:33'),
(6, 'Seven years into his sentence, Bloodsworth found a book about a new type of DNA test to identify murderers. "It was an epiphany. I thought that if it can prove your guilt then it can also prove your innocence," he said.', 3, 6, '', '2017-02-21 14:27:57'),
(7, 'Bloodsworth refused to let the issue die, however, and sent his lawyer to look for the evidence himself. The third time he entered the judge''s office, there was a breakthrough. The judge was away and a clerk showed the lawyer a box pertaining to the case buried in the judge''s wardrobe. In it was the murdered girl''s underwear.  "I think the judge felt that something was wrong, that''s probably why he kept them," said Bloodsworth.', 8, 6, '', '2017-02-21 14:28:32'),
(9, 'Bloodsworth refused to let the issue die, however, and sent his lawyer to look for the evidence himself. The third time he entered the judge''s office, there was a breakthrough. The judge was away and a clerk showed the lawyer a box pertaining to the case buried in the judge''s wardrobe. In it was the murdered girl''s underwear.  "I think the judge felt that something was wrong, that''s probably why he kept them," said Bloodsworth.', 6, 6, 'uploads/comments/16299848_1939757226311040_8810034791858003459_o.jpg', '2017-02-21 14:32:11'),
(10, 'The Grand Finale of the competition is going to be held on March 31, 2016 at DIU Auditorium', 11, 5, 'uploads/comments/14917186_1883541365265960_3691032227281746109_o.jpg', '2017-02-21 14:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `post_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(50) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`post_id`, `title`, `details`, `update_date`, `userid`, `img`) VALUES
(3, 'Falling green energy costs ''to stop'' fossil fuel growth', 'Falling costs of renewable energy technologies could lead to a halt in the growth of global demand for environmentally harmful fossil fuels, according to a new report.\r\n\r\nReleased on Thursday, the report - co-authored by the Grantham Institute at Imperial College London and the UK-based think-tank Carbon Tracker Initiative, showed that cheaper electric vehicles and solar technology, and their increasing use globally, could stop growth in demand for oil and coal by 2020.\r\n\r\nThe study said that growth in electric vehicles (EVs) alone could lead to two million barrels of oil per day (mbd) being displaced by 2025, which is the same volume that caused the oil price collapse in 2014-15.', '2017-02-21 13:22:19', 1, 'uploads/10fb0dca30774350af2b27beeffc8344_18.jpg'),
(6, 'India puts record 104 satellites into orbit, in one go', 'India has successfully put a record 104 satellites from a single rocket into orbit on Wednesday, in the latest triumph for its famously frugal space agency, officials announced.\r\n\r\nScientists gathered for the launch in the southern spaceport of Sriharikota burst into applause as the head of India''s Space Research Organisation (ISRO) announced all the satellites had been ejected.\r\n\r\n"My hearty congratulations to the ISRO team for this success," ISRO director Kiran Kumar told scientists who had gathered at the observatory to watch the progress of the Polar Satellite Launch Vehicle (PSLV).', '2017-02-21 13:48:53', 2, 'uploads/spacepress-022512-005b.jpg'),
(8, 'Surviving Death Row', 'After spending years on death row in American jails, Ron Keine, Shujaa Graham, Greg Wilhoit and Albert Burrell were reborn the day they were declared innocent and released.\r\n\r\nThis is the story of four friends who, after enduring years of mental suffering and isolation from society, became activists and are campaigning to end the death penalty.\r\n\r\nStill suffering from post-traumatic stress disorder and depression after being incarcerated for so long despite their innocence, they joined the association of death row exonerees, Witness to Innocence. Calling themselves the "Resurrection Club", they travel from state to state, supported by their wives and children, to lobby for an end to the death penalty.\r\n\r\nMore than 150 death row survivors have been found innocent and exonerated in the US and many have joined Witness to Innocence. This is a story of friendship and love, a trip through the US - from Texas to Washington DC - to end an inhuman and unjust criminal justice system.', '2017-02-21 14:20:54', 5, 'uploads/2013111713246921734_20.jpg'),
(9, 'Defying death row in the US', 'Philadelphia, United States - Support for the death penalty in the United States is at its lowest level in 40 years and that''s a good thing according to Kirk Bloodsworth, the first American sentenced to die but released after DNA evidence exonerated him.\r\n\r\nBloodsworth is fighting for abolishment of the death penalty in the US, one state at a time, but it''s an uphill battle. While a recent Gallup poll found declining support for capital punishment, 60 percent of Americans still want convicted murderers put to death.\r\n\r\nThe peak was in 1994 when 80 percent favoured executions, but that has declined ever since.   \r\n\r\nIn the last 10 years, the US has seen a 50 percent decline in both death sentences handed down, as well as a 50 percent drop in executions carried out. Still, 34 people have been executed in the US so far this year.', '2017-02-21 14:26:22', 6, 'uploads/09f33c12f1654633afc17c19619866d9_18.jpg'),
(10, '2nd Runner Up in Nation Hackathon 2016', 'Our Team Name is CBCIT.\r\nOur Project Name is Sonar Bangla.\r\nWe got 2nd Runner Up place.\r\nNational Hackathon Date: April 6th-7th, 2016\r\nVenue: Police Staff College Convention Hall, Section 14, Mirpur, Dhaka-1206, Bangladesh.\r\nProblem Statement\r\nProblem Title: Agricultural Productivity.\r\nProblem Description\r\nBangladesh has already been self sufficient in rice production. But this is not enough. To keep pace with population growth, all agricultural production, including rice has to be doubled. At the same time, to achieve sustainable development goals, income of small-scale food producers, specially women, indigenous peoples, family farmers, pastoralists, and fishers have to be doubled. But there exists some problem to realize these goals. To meet the housing and other demand of increasing population, the quantity of arable land is decreasing day by day. We have to save these lands. It has to make sure that arable land would only be used in cultivation. Minimum and fair wage of all labour involved in agriculture should be confirmed regardless their gender. All the agricultural inputs including seeds, fertilizer, irrigation should be made available. Farmers should get bank loan and other financial services. They should be taught scientific method of cultivation. Invention of high yielding seeds has to be accelerated. And concentration should be given to invent more flood and drought resistant variety of different crops. Marketing of cultivated crops has to be confirmed. The land rights of indigenous people have to be settled. Women should be more involved in agriculture. To increase fish production, all the water bodies, including ponds, haors should bring under fish cultivation. And for this, developed variety of fishes, scientific cultivation method, fair price, training and marketing should be ensured. And by confirming all these, we can reach the target to double the agricultural production by 2030.', '2017-02-21 14:36:23', 1, 'uploads/12976954_1780723182214446_3584406433491692804_o.jpg'),
(11, 'WE CAN - Daffodil Apps Fellowship 2016', 'Our Team Name is Reborn.\r\nOur Application Name is iSecure\r\nWe got 7th place.\r\nThe Grand Finale of the competition is going to be held on March 31, 2016 at DIU Auditorium from 10.00 am to 1.30 pm.\r\nThe Grooming Session:2 of â€œWE CAN - Daffodil Apps Fellowship 2016â€ was held today on February 25 and 26, 2016 at Daffodil International University (DIU) Digital Class Room with Finalist Teams of the competition.\r\nMr. Susanta Kumar Saha, Additional Secretary, Planning & Development, Ministry of Posts, Telecommunications and Information Technology, Government of the People''s Republic of Bangladesh,Ms. Suparna Roy, LD Expert, Access to Information (A2i) Program, Dr. Touhid Bhuiyan, Head, SWE, DIU, Mr. M A Rakib, Development Worker & Researcher and Mr. Mahbub Hasan, Senior Android Developer, Coder Trust, Bangladesh were present at the Grooming Sessions as Mentors.\r\nThe Jury Board Members from WE CAN-Daffodil Apps Fellowship 2016 has selected 9 Teams\r\nGrooming Session: 1 \r\nWE CAN-Daffodil Apps Fellowship 2016, Grooming Session was held today on February 15, 2016 at Banquet Hall, Daffodil International University (DIU).\r\nThe Jury Board Members from WE CAN-Daffodil Apps Fellowship 2016 has selected 22 Teams\r\nApps idea and concept should cover: Sexual and Reproductive Health Issue, Domestic Violence, Violence Against Women, Sexual Harassment, and Women Rights Issue.\r\nWE CAN (AMRAI PARI) is a collective platform of civil society, organizations, individuals, institutions and others aim of ending domestic violence against women. ''WE CAN (Amrai Pari)'' is to enhance gender equality at family, community and state by bringing a positive shift in attitudes, beliefs and practices that support violence against women. The We Can Alliance, Bangladesh is built on the premise that people change and that people can, in turn, change others. WE CAN Alliance, Bangladesh has reached out more than 1 million â€˜Change Makersâ€™ across the country so far. We are looking some talented young group who will develop an Apps. on Women Rights issue and stand beside us as a Change Maker.\r\n** Prize money: \r\n1st prize: BDT 2 Lac, \r\n2nd: BDT 1.5 Lac, \r\n3rd: BDT 1 Lac, \r\n4th & 5th: BDT 25,000 each\r\nSelection Criteria:\r\nI. Every team has to 5 members (Max)\r\nII. Age group: 16-30 years\r\nIII. Ex-students can apply\r\nIV. CSE, Software Engineering, Media Studies, Law, Science & Humanities from university/college.', '2017-02-21 14:38:05', 1, 'uploads/14915300_1883541371932626_3696320372767574723_n.jpg'),
(12, 'ACM International Collegiate Programming Contest (ACM-ICPC)', 'We are participating in ACM ICPC Dhaka regional Contest for the first time.', '2017-02-21 14:40:44', 1, 'uploads/16761_1565477250405708_7437717478957325285_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` text NOT NULL,
  `photo` text NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0 for Perfer not to answer, 1 for male, 2 for female',
  `read_agreement` varchar(3) NOT NULL COMMENT 'NO/Yes',
  `receive_special_offer` varchar(3) NOT NULL COMMENT 'No/Yes',
  `date_of_birth` date NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `fname`, `lname`, `photo`, `gender`, `read_agreement`, `receive_special_offer`, `date_of_birth`, `created_date`) VALUES
(1, 'Alamin', 'ialamin.pro@gmail.com', '$2y$10$kCU8xhJli3GtOPWf9il8eeohJvBuZAQq49tnsIpgLEC2MjSuved12', 'Al', '', '/img/avatars/sunny.png', 0, '', '', '0000-00-00', '2017-02-21 13:11:23'),
(2, 'alamin2625', 'alamin.iyakub@diu.edu.bd', '$2y$10$wtyEeSLJ903PanOylj.Q/eCXyqEBxi49YO/paQJzoVttHoi9vfsk6', 'Al', '', '/img/avatars/1.png', 0, '', '', '0000-00-00', '2017-02-21 13:45:33'),
(3, 'Miju', 'miju.pro@gmail.com', '$2y$10$gQM7ixA5ogGpAjsy3Z9UY.6Pwn/60GgfMqHemvGu8/dhR87eW/lke', 'Miju', '', '/img/avatars/2.png', 0, '', '', '0000-00-00', '2017-02-21 13:58:49'),
(5, 'Rasel', 'rasel@gamil.com', '$2y$10$V/Bv8fe/qdHa7gaVSnTKqe3BcdSR7RK.QxaxYsK0tdiF.Xse6wOae', 'dsf', '', '/img/avatars/3.png', 0, '', '', '0000-00-00', '2017-02-21 14:18:40'),
(6, 'Parvez', 'Parvez@gmail.com', '$2y$10$PPBgRIni6uIX6WeO8IOI/usRe1DiOBzU1tBSQhwgJDhfqUafTDyLa', 'parvez', '', '/img/avatars/4.png', 0, '', '', '0000-00-00', '2017-02-21 14:25:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
