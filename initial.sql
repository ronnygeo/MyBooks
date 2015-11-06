-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2012 at 02:53 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'book id',
  `name` varchar(100) NOT NULL COMMENT 'name of book',
  `author` varchar(100) NOT NULL COMMENT 'name of author',
  `category` varchar(50) NOT NULL COMMENT 'book type',
  `publisher` varchar(100) NOT NULL COMMENT 'book publisher',
  `description` text NOT NULL COMMENT 'book desc',
  `bookpic` varchar(100) NOT NULL COMMENT 'link to book picture',
  `bookthpic` varchar(100) NOT NULL COMMENT 'link to thumb of pic',
  `stock` int(11) NOT NULL COMMENT 'stock of this book remaining',
  `uprice` decimal(10,2) NOT NULL COMMENT 'flag',
  `f2` int(11) DEFAULT NULL COMMENT 'extra fields for future use',
  `f3` int(11) DEFAULT NULL COMMENT 'extra fields for future use',
  PRIMARY KEY (`bookid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `name`, `author`, `category`, `publisher`, `description`, `bookpic`, `bookthpic`, `stock`, `uprice`, `f2`, `f3`) VALUES
(1, 'Hamlet', 'William Shakespeare', 'Classics', 'Folger', 'Hamlet from William Shakespeare..', 'images/books/book1.jpg', 'images/books/thumbs/thumb1.jpg', 1, 20.00, NULL, NULL),
(2, 'Romeo & Juliet', 'William Shakespeare', 'Romance', 'Dover Thrift', ' Romeo & Juliet from William Shakespeare..', 'images/books/book2.jpg', 'images/books/thumbs/thumb2.jpg', 2, 30.00, NULL, NULL),
(3, 'Macbeth', 'William Shakespeare', 'Classics', 'McGraw Hills', ' Macbeth from William Shakespeare..', 'images/books/book3.jpg', 'images/books/thumbs/thumb3.jpg', 0, 15.00, NULL, NULL),
(4, 'A Certain Slant of Light', 'Laura Whilcomb', 'Mystery', 'Graphia', 'In the mood for a chilly read, try this book for \r\na change..', 'images/books/book4.jpg', 'images/books/thumbs/thumb4.jpg', 3, 30.00, NULL, NULL),
(5, 'Da Vinci Code', 'Dan Brown', 'Fiction', 'Unknown', ' One of the best selling novels of all times..', 'images/books/book5.jpg', 'images/books/thumbs/thumb5.jpg', 2, 35.00, NULL, NULL),
(6, 'Lord of The Rings: Fellowship of The Ring', 'J. R. R. Tolkein', 'Fiction', 'Good Publishers', 'The first episode of the Lord of The Rings \r\ntrilogy.', 'images/books/book6.jpg', 'images/books/thumbs/thumb6.jpg', 4, 50.00, NULL, NULL),
(7, 'Lord of The Rings: Return of The Kings', 'J. R. R. Tolkein', 'Fiction', 'Good Publishers', 'The third episode of the Lord of the Ring \r\nTrilogy.', 'images/books/book7.jpg', 'images/books/thumbs/thumb7.jpg', 0, 60.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `bookid` int(11) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `uprice` decimal(10,2) NOT NULL,
  `history` int(11) NOT NULL DEFAULT '0',
  `f1` int(11) DEFAULT NULL,
  `f2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `bookid` (`bookid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `uprice` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `bookid`, `bookname`, `author`, `userid`, `username`, `uprice`, `quantity`, `date`, `time`) VALUES
(7, 4, 'A Certain Slant of Light', 'Laura Whilcomb', 1, 'ronnygeo', 30.00, 2, '2012-12-18', '20:14:27'),
(8, 3, 'Macbeth', 'William Shakespeare', 1, 'ronnygeo', 15.00, 3, '2012-12-18', '20:14:27'),
(9, 5, 'Da Vinci Code', 'Dan Brown', 1, 'ronnygeo', 40.00, 1, '2012-12-18', '20:14:27'),
(10, 6, 'Lord of The Rings: Fellowship of The Ring', 'J. R. R. Tolkein', 1, 'ronnygeo', 50.00, 1, '2012-12-19', '00:17:32'),
(14, 5, 'Da Vinci Code', 'Dan Brown', 4, 'john', 35.00, 4, '2012-12-20', '01:44:49'),
(15, 3, 'Macbeth', 'William Shakespeare', 4, 'john', 15.00, 1, '2012-12-20', '01:44:49'),
(16, 6, 'Lord of The Rings: Fellowship of The Ring', 'J. R. R. Tolkein', 4, 'john', 50.00, 2, '2012-12-20', '01:44:49'),
(17, 1, 'Hamlet', 'William Shakespeare', 4, 'john', 20.00, 1, '2012-12-20', '01:44:49'),
(18, 5, 'Da Vinci Code', 'Dan Brown', 6, 'sarath', 35.00, 3, '2012-12-22', '18:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` text NOT NULL,
  `country` varchar(50) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  `tel` varchar(50) NOT NULL,
  `f2` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `fullname`, `email`, `dob`, `address`, `country`, `admin`, `tel`, `f2`) VALUES
(1, 'ronnygeo', '12345', 'Ronny Mathew', 'ronny@mybooks.inc', '1988-11-11', 'Bur Dubai, UAE', 'UAE', 1, '00971529245741', NULL),
(2, 'cyril', '12345', 'Cyril Chacko', 'cyril@mybooks.inc', '1989-01-01', 'Rochester, NY, USA', 'USA', 1, '001557343434', NULL),
(5, 'nigel', '12345', 'Nigel Varghese', 'nigel@mybooks.inc', '1988-05-24', 'New Delhi, India', 'India', 1, '00919964232323', NULL),
(7, 'talal', '12345', 'Talal Shaikh', 'talal@mybooks.inc', '1111-11-11', 'Dubai, UAE', 'United Arab Emirates', 0, '00971503434343', NULL),
(6, 'sarath', '12345', 'Sarath Chandran', 'sarath@mybooks.inc', '1988-01-31', 'Trivandrum, Kerala, India', 'India', 0, '00919538734348', NULL),
(8, 'admin', 'qwerty', 'Ronny Mathew', 'admin@mybooks.inc', '1988-11-11', 'Bur Dubai, UAE', 'United Arab Emirates', 0, '00971529245741', NULL),
(9, 'ronny', '12345', 'Ronny Mathew', 'ronnygeomatt@gmail.com', '1988-11-11', 'Bur Dubai, UAE', 'United Arab Emirates', 0, '00971529245741', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
