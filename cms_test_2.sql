-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 09:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_test_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `Admin_fname` varchar(50) NOT NULL,
  `Admin_lname` varchar(50) NOT NULL,
  `Admin_email` varchar(100) NOT NULL,
  `Admin_pass` varchar(20) NOT NULL,
  `Admin_joined_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Admin_fname`, `Admin_lname`, `Admin_email`, `Admin_pass`, `Admin_joined_date`) VALUES
(1, 'Hamza', 'Naeem', 'bestcomputerlab@gmail.com', 'hamzanaeem', '2017-12-16 18:51:01'),
(2, 'Muhammad', 'Naeem', 'muhammadnaeem@gmail.com', 'muhammadnaeem', '2017-12-16 19:06:18'),
(3, 'Usama', 'Zia', 'usamazia@gmail.com', 'usama', '2017-12-16 19:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `Admin_id` int(11) NOT NULL,
  `Admin_lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Admin_total_login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`Admin_id`, `Admin_lastlogin`, `Admin_total_login`) VALUES
(1, '2017-12-31 20:11:10', 1),
(1, '2017-12-31 20:11:33', 2),
(3, '2017-12-31 20:13:15', 1),
(1, '2017-12-31 20:28:05', 3),
(3, '2017-12-31 20:28:49', 2),
(3, '2017-12-31 20:29:44', 3),
(1, '2017-12-31 20:30:29', 4),
(3, '2017-12-31 20:30:39', 4),
(3, '2017-12-31 20:31:55', 5),
(1, '2018-01-02 10:17:50', 5),
(1, '2018-01-03 14:00:36', 6),
(1, '2018-01-03 18:39:01', 7),
(1, '2018-01-04 19:47:36', 8),
(1, '2018-01-06 15:59:18', 9),
(1, '2018-01-10 19:55:33', 10);

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_user`
-- (See below for the actual view)
--
CREATE TABLE `all_user` (
`User_id` int(11)
,`User_fname` varchar(50)
,`User_lname` varchar(50)
,`User_email` varchar(100)
,`User_pass` varchar(20)
,`User_joined_date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_id` int(11) NOT NULL,
  `Article_title` varchar(100) NOT NULL,
  `Article_desc` varchar(2000) NOT NULL,
  `Article_cat_id` int(11) DEFAULT NULL,
  `Article_author_id` int(11) DEFAULT NULL,
  `Article_title_meta` varchar(100) DEFAULT NULL,
  `Article_desc_meta` varchar(2000) DEFAULT NULL,
  `Article_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Article_lastModify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Article_publisher_id` int(11) NOT NULL,
  `Artile_visibility` varchar(30) NOT NULL,
  `Article_publisher_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_id`, `Article_title`, `Article_desc`, `Article_cat_id`, `Article_author_id`, `Article_title_meta`, `Article_desc_meta`, `Article_created_date`, `Article_lastModify_date`, `Article_publisher_id`, `Artile_visibility`, `Article_publisher_type`) VALUES
(2, 'Complete Website & Admin Panel in PHP OOP Urdu-Hindi', '<p>On this website, you have seen tutorials about web development and web designing for more than half a decade now. Today, I have a tutorials series for you, in which you&rsquo;ll learn how to create a complete website and admin panel using PHP Object Oriented Programming (OOP). If you don&rsquo;t know the basics of PHP OOP then we have a basic&nbsp;<strong><a href=\"http://www.onlineustaad.com/php-oop-tutorials-in-urdu/\">PHP OOP tutorials in Urdu/Hindi</a></strong>.&nbsp;<a href=\"http://www.onlineustaad.com/wp-content/uploads/2017/10/php-urdu.jpg\"> </a></p>\r\n', 2, 1, '', '', '2018-01-02 12:09:44', '2018-01-03 18:28:07', 1, 'Public', 'Admin'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n', 2, 1, '', '', '2018-01-02 12:10:30', '2018-01-04 19:52:25', 1, 'Public', 'Admin'),
(4, 'Simple Tips to Increase YouTube Subscribers by 500%', '<p>There are many tools people&nbsp;use to give a quick boost to their YouTube subscribers such as&nbsp;<strong><a href=\"http://addmefast.com/\">AddmeFast.com</a></strong>,&nbsp;<strong><a href=\"http://socialfreeblasts.com/\">SocialFreeBlasts.com</a></strong>&nbsp;and many more. However, they are not real subscribers, they are just fake subscribers which will not help your channel in the long run. And above all, these services violate/break YouTube&rsquo;s terms which I&rsquo;ll explain further in this article. Then what&rsquo;s the right and legal way to&nbsp;<strong>increase YouTube subscribers</strong>? that&rsquo;s the question of the day and I&rsquo;m going to share a few real tips with you.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2, 1, '', '', '2018-01-02 12:11:27', '2018-01-06 16:01:08', 1, 'Public', 'Admin'),
(5, 'Web Socket Image', '<p><img alt=\"\" src=\"https://pbs.twimg.com/profile_images/758084549821730820/_HYHtD8F.jpg\" style=\"height:120px; width:120px\" /></p>\r\n\r\n<p>hello to image testing</p>\r\n', 9, 4, '', '', '2018-01-03 17:36:48', '2018-01-04 19:50:33', 1, 'Private', 'Admin'),
(6, 'Hello to Net Testing', '<p>Hello we check this on internet</p>\r\n', 8, 5, 'Checking Internet', '', '2018-01-10 19:56:43', '2018-01-10 20:07:35', 1, 'Private', 'Admin');

--
-- Triggers `article`
--
DELIMITER $$
CREATE TRIGGER `Before_Update` BEFORE UPDATE ON `article` FOR EACH ROW BEGIN

   INSERT INTO article_history (Article_id,Article_title,Article_desc,Article_modifyDate,Article_status)  VALUES(OLD.Article_id,OLD.Article_title,OLD.Article_desc,NOW(),'Before_Update');
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_article` AFTER UPDATE ON `article` FOR EACH ROW BEGIN

   INSERT INTO article_history (Article_id,Article_title,Article_desc,Article_modifyDate,Article_status)  VALUES(NEW.Article_id,NEW.Article_title,NEW.Article_desc,NOW(),'After_Update');
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_save` AFTER INSERT ON `article` FOR EACH ROW BEGIN

   INSERT INTO article_history (Article_id,Article_title,Article_desc,Article_modifyDate,Article_status)  VALUES(NEW.Article_id,NEW.Article_title,NEW.Article_desc,NEW.Article_created_date,'Insertion');
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `article_history`
--

CREATE TABLE `article_history` (
  `Article_id` int(11) NOT NULL,
  `Article_title` varchar(100) NOT NULL,
  `Article_modifyDate` datetime NOT NULL,
  `Article_status` varchar(30) NOT NULL,
  `Article_desc` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_history`
--

INSERT INTO `article_history` (`Article_id`, `Article_title`, `Article_modifyDate`, `Article_status`, `Article_desc`) VALUES
(4, 'Trigger Testing', '2017-12-30 00:51:57', 'Insertion', '<p>tr</p>\r\n'),
(1, 'Trigger Testing', '2017-12-30 00:53:58', 'Insertion', '<p>Trigger Testing</p>\r\n'),
(1, 'Trigger Testing', '2017-12-30 13:25:03', 'Update', '<p>Trigger Testing</p>\r\n'),
(1, 'Trigger Testing', '2017-12-30 13:29:06', 'Update', '<p>Trigger Testing ok by</p>\r\n'),
(1, 'Trigger Testing', '2017-12-30 13:34:19', 'Before_Update', '<p>Trigger Testing ok</p>\r\n'),
(1, 'Trigger Testing', '2017-12-30 13:34:19', 'After_Update', '<p>Trigger Testing ok</p>\r\n'),
(1, 'Trigger Testing', '2017-12-30 13:35:36', 'Before_Update', '<p>Trigger Testing ok</p>\r\n'),
(1, 'Trigger Testing', '2017-12-30 13:35:36', 'After_Update', '<p>Trigger Testing&nbsp;</p>\r\n'),
(2, 'Delete Article inSql', '2017-12-31 13:40:52', 'Insertion', '<p>kijn bub huuuhbnm<img alt=\"\" src=\"https://www.w3schools.com/w3css/img_fjords.jpg\" style=\"height:400px; width:600px\" /></p>\r\n'),
(2, 'Complete Website & Admin Panel in PHP OOP Urdu-Hindi', '2018-01-02 17:09:44', 'Insertion', '<p>On this website, you have seen tutorials about web development and web designing for more than half a decade now. Today, I have a tutorials series for you, in which you&rsquo;ll learn how to create a complete website and admin panel using PHP Object Oriented Programming (OOP). If you don&rsquo;t know the basics of PHP OOP then we have a basic&nbsp;<strong><a href=\"http://www.onlineustaad.com/php-oop-tutorials-in-urdu/\">PHP OOP tutorials in Urdu/Hindi</a></strong>.&nbsp;<a href=\"http://www.onlineustaad.com/wp-content/uploads/2017/10/php-urdu.jpg\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-02 17:10:30', 'Insertion', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(4, 'Simple Tips to Increase YouTube Subscribers by 500%', '2018-01-02 17:11:27', 'Insertion', '<p>There are many tools people&nbsp;use to give a quick boost to their YouTube subscribers such as&nbsp;<strong><a href=\"http://addmefast.com/\">AddmeFast.com</a></strong>,&nbsp;<strong><a href=\"http://socialfreeblasts.com/\">SocialFreeBlasts.com</a></strong>&nbsp;and many more. However, they are not real subscribers, they are just fake subscribers which will not help your channel in the long run. And above all, these services violate/break YouTube&rsquo;s terms which I&rsquo;ll explain further in this article. Then what&rsquo;s the right and legal way to&nbsp;<strong>increase YouTube subscribers</strong>? that&rsquo;s the question of the day and I&rsquo;m going to share a few real tips with you.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-02 17:11:50', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 ', '2018-01-02 17:11:50', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(5, 'Web Socket Image', '2018-01-03 22:36:48', 'Insertion', '<p><img alt=\"\" src=\"https://pbs.twimg.com/profile_images/758084549821730820/_HYHtD8F.jpg\" style=\"height:120px; width:120px\" /></p>\r\n\r\n<p>hello to image testing</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 ', '2018-01-03 23:12:50', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 ', '2018-01-03 23:12:50', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 ', '2018-01-03 23:25:03', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:25:03', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>.&nbsp;</p>\r\n'),
(2, 'Complete Website & Admin Panel in PHP OOP Urdu-Hindi', '2018-01-03 23:28:07', 'Before_Update', '<p>On this website, you have seen tutorials about web development and web designing for more than half a decade now. Today, I have a tutorials series for you, in which you&rsquo;ll learn how to create a complete website and admin panel using PHP Object Oriented Programming (OOP). If you don&rsquo;t know the basics of PHP OOP then we have a basic&nbsp;<strong><a href=\"http://www.onlineustaad.com/php-oop-tutorials-in-urdu/\">PHP OOP tutorials in Urdu/Hindi</a></strong>.&nbsp;<a href=\"http://www.onlineustaad.com/wp-content/uploads/2017/10/php-urdu.jpg\"> </a></p>\r\n'),
(2, 'Complete Website & Admin Panel in PHP OOP Urdu-Hindi', '2018-01-03 23:28:07', 'After_Update', '<p>On this website, you have seen tutorials about web development and web designing for more than half a decade now. Today, I have a tutorials series for you, in which you&rsquo;ll learn how to create a complete website and admin panel using PHP Object Oriented Programming (OOP). If you don&rsquo;t know the basics of PHP OOP then we have a basic&nbsp;<strong><a href=\"http://www.onlineustaad.com/php-oop-tutorials-in-urdu/\">PHP OOP tutorials in Urdu/Hindi</a></strong>.&nbsp;<a href=\"http://www.onlineustaad.com/wp-content/uploads/2017/10/php-urdu.jpg\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:32:49', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>.&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:32:49', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:33:14', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:33:14', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years,&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:33:37', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years,&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:33:37', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:40:35', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:40:35', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years,&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:41:10', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years,&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-03 23:41:10', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(5, 'Web Socket Image', '2018-01-05 00:50:33', 'Before_Update', '<p><img alt=\"\" src=\"https://pbs.twimg.com/profile_images/758084549821730820/_HYHtD8F.jpg\" style=\"height:120px; width:120px\" /></p>\r\n\r\n<p>hello to image testing</p>\r\n'),
(5, 'Web Socket Image', '2018-01-05 00:50:33', 'After_Update', '<p><img alt=\"\" src=\"https://pbs.twimg.com/profile_images/758084549821730820/_HYHtD8F.jpg\" style=\"height:120px; width:120px\" /></p>\r\n\r\n<p>hello to image testing</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-05 00:51:48', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-05 00:51:48', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-05 00:52:25', 'Before_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web&nbsp;</p>\r\n'),
(3, 'Top Web Hosting Providers 2017 (My Review)', '2018-01-05 00:52:25', 'After_Update', '<p>Web Hosting is the first important thing for a long term website. I run websites since 2010, and during last 7 years, I&rsquo;ve used many web hosting companies including NameCheap, Hostgator, Site5 and particularly a Pakistani company called &ldquo;<strong>HosterPK&rdquo;</strong>. If the hosting service is poor, it&rsquo;ll hugely affect your site. therefore, it should be carefully evaluated beforehand. Today, I&rsquo;ll share my experience with you about&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"><strong>SiteGround</strong>&nbsp;</a>which I&rsquo;m using myself since last two months, along the way, I&rsquo;ll give you a list of the top 5 web hosting companies.&nbsp;<a href=\"http://www.onlineustaad.com/recommends/siteground/\"> </a></p>\r\n'),
(4, 'Simple Tips to Increase YouTube Subscribers by 500%', '2018-01-06 21:00:35', 'Before_Update', '<p>There are many tools people&nbsp;use to give a quick boost to their YouTube subscribers such as&nbsp;<strong><a href=\"http://addmefast.com/\">AddmeFast.com</a></strong>,&nbsp;<strong><a href=\"http://socialfreeblasts.com/\">SocialFreeBlasts.com</a></strong>&nbsp;and many more. However, they are not real subscribers, they are just fake subscribers which will not help your channel in the long run. And above all, these services violate/break YouTube&rsquo;s terms which I&rsquo;ll explain further in this article. Then what&rsquo;s the right and legal way to&nbsp;<strong>increase YouTube subscribers</strong>? that&rsquo;s the question of the day and I&rsquo;m going to share a few real tips with you.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(4, 'Simple Tips to Increase YouTube Subscribers by 500%', '2018-01-06 21:00:35', 'After_Update', '<p>There are many tools people&nbsp;use to give a quick boost to their YouTube subscribers such</p>\r\n'),
(4, 'Simple Tips to Increase YouTube Subscribers by 500%', '2018-01-06 21:01:08', 'Before_Update', '<p>There are many tools people&nbsp;use to give a quick boost to their YouTube subscribers such</p>\r\n'),
(4, 'Simple Tips to Increase YouTube Subscribers by 500%', '2018-01-06 21:01:08', 'After_Update', '<p>There are many tools people&nbsp;use to give a quick boost to their YouTube subscribers such as&nbsp;<strong><a href=\"http://addmefast.com/\">AddmeFast.com</a></strong>,&nbsp;<strong><a href=\"http://socialfreeblasts.com/\">SocialFreeBlasts.com</a></strong>&nbsp;and many more. However, they are not real subscribers, they are just fake subscribers which will not help your channel in the long run. And above all, these services violate/break YouTube&rsquo;s terms which I&rsquo;ll explain further in this article. Then what&rsquo;s the right and legal way to&nbsp;<strong>increase YouTube subscribers</strong>? that&rsquo;s the question of the day and I&rsquo;m going to share a few real tips with you.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(6, 'Hello to Net Testing', '2018-01-11 00:56:43', 'Insertion', '<p>Hello we check this on internet</p>\r\n'),
(6, 'Hello to Net Testing', '2018-01-11 01:07:35', 'Before_Update', '<p>Hello we check this on internet</p>\r\n'),
(6, 'Hello to Net Testing', '2018-01-11 01:07:35', 'After_Update', '<p>Hello we check this on internet</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `Author_id` int(11) NOT NULL,
  `Author_name` varchar(50) NOT NULL,
  `Author_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`Author_id`, `Author_name`, `Author_desc`) VALUES
(1, 'Huzaifa Jalil', 'LA Article Author'),
(2, 'Hamza Naeem', 'PHP Article Maker'),
(3, 'Usama Zia', 'LA SOLUTION PROVIDER'),
(4, 'Muhammad Yasir', 'Yasir of Comsats'),
(5, 'Abu Bakar', 'Abu Bakar Laws');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_id` int(11) NOT NULL,
  `Cat_title` varchar(50) NOT NULL,
  `Cat_desc` varchar(100) NOT NULL,
  `Cat_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Cat_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_id`, `Cat_title`, `Cat_desc`, `Cat_created_date`, `Cat_created_by`) VALUES
(2, 'Web Development', 'Web Development Articles', '2017-12-16 20:52:54', 1),
(4, 'Computer Technology', 'Computer Technology  in Pak', '2017-12-31 19:05:27', 1),
(6, 'Mathematical Methods', 'Thesis of BVP ', '2018-01-04 19:49:10', 3),
(8, 'Web Development in Urdu Hindi', 'Complete Video Tutorials of Web Development in Urdu Hindi', '2018-01-02 11:55:45', 1),
(9, 'Web Socket ', 'Web Development Articles  ', '2018-01-10 20:09:54', 1),
(10, 'Web Desigining ', 'Web Tutorials  ', '2018-01-10 20:08:48', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `cat_view`
-- (See below for the actual view)
--
CREATE TABLE `cat_view` (
`Cat_id` int(11)
,`Cat_title` varchar(50)
,`Cat_desc` varchar(100)
,`Cat_created_date` timestamp
,`Cat_created_by` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `latest_user`
-- (See below for the actual view)
--
CREATE TABLE `latest_user` (
`User_id` int(11)
,`User_fname` varchar(50)
,`User_lname` varchar(50)
,`User_email` varchar(100)
,`User_pass` varchar(20)
,`User_joined_date` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(11) NOT NULL,
  `User_fname` varchar(50) NOT NULL,
  `User_lname` varchar(50) NOT NULL,
  `User_email` varchar(100) NOT NULL,
  `User_pass` varchar(20) NOT NULL,
  `User_joined_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `User_fname`, `User_lname`, `User_email`, `User_pass`, `User_joined_date`) VALUES
(1, 'Abu', 'Bakar', 'abnawazW@gmail.com', 'abubakar', '2017-12-16 19:41:39'),
(2, 'Usama ', 'Zia', 'usamazia@yahoo.com', 'usamazia', '2017-12-16 19:41:39'),
(3, 'Hamza', 'Naeem', 'hamzanaeem@gmail.com', 'hamzanaeem', '2017-12-16 19:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `User_id` int(11) NOT NULL,
  `User_lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `User_total_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `all_user`
--
DROP TABLE IF EXISTS `all_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_user`  AS  select `users`.`User_id` AS `User_id`,`users`.`User_fname` AS `User_fname`,`users`.`User_lname` AS `User_lname`,`users`.`User_email` AS `User_email`,`users`.`User_pass` AS `User_pass`,`users`.`User_joined_date` AS `User_joined_date` from `users` ;

-- --------------------------------------------------------

--
-- Structure for view `cat_view`
--
DROP TABLE IF EXISTS `cat_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cat_view`  AS  select `category`.`Cat_id` AS `Cat_id`,`category`.`Cat_title` AS `Cat_title`,`category`.`Cat_desc` AS `Cat_desc`,`category`.`Cat_created_date` AS `Cat_created_date`,`category`.`Cat_created_by` AS `Cat_created_by` from `category` ;

-- --------------------------------------------------------

--
-- Structure for view `latest_user`
--
DROP TABLE IF EXISTS `latest_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `latest_user`  AS  select `users`.`User_id` AS `User_id`,`users`.`User_fname` AS `User_fname`,`users`.`User_lname` AS `User_lname`,`users`.`User_email` AS `User_email`,`users`.`User_pass` AS `User_pass`,`users`.`User_joined_date` AS `User_joined_date` from `users` where (`users`.`User_joined_date` = (select max(`users`.`User_joined_date`) from `users`)) limit 4 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`),
  ADD UNIQUE KEY `Admin_email` (`Admin_email`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_id`),
  ADD KEY `Article_cat_id` (`Article_cat_id`),
  ADD KEY `Article_author_id` (`Article_author_id`),
  ADD KEY `Article_publisher_id` (`Article_publisher_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`Author_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `User_email` (`User_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `Author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`Article_cat_id`) REFERENCES `category` (`Cat_id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`Article_author_id`) REFERENCES `author` (`Author_id`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`Article_publisher_id`) REFERENCES `users` (`User_id`),
  ADD CONSTRAINT `article_ibfk_4` FOREIGN KEY (`Article_publisher_id`) REFERENCES `admin` (`Admin_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
