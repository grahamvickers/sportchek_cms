-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2020 at 09:38 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportchek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `prod_id` int(100) NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(200) NOT NULL,
  `prod_details` text NOT NULL,
  `prod_price` varchar(50) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_sex` int(10) NOT NULL,
  `prod_cat` int(10) NOT NULL,
  `prod_rating` int(10) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`prod_id`, `prod_name`, `prod_details`, `prod_price`, `prod_img`, `prod_sex`, `prod_cat`, `prod_rating`) VALUES
(1, 'Champion Hoodie - Mens - Black', 'Cotton-blend sweatshirt featuring logo print detail', '49.99', 'champ_hood_black.png', 1, 2, 4),
(2, 'Champion Hoodie - Womens - Red', 'Cotton-blend sweatshirt featuring logo print detail', '49.99', 'champ_hood_red.png', 0, 2, 4),
(3, 'Nike Crewneck - Mens - Yellow', 'Club Cotton-Blend Sweatshirt', '48', 'nike_crew_yellow.png', 1, 2, 3),
(4, 'Champion Crewneck - Mens - Pink', 'An embroidered logo detail pops against a sporty sweatshirt.', '70', 'champion_hood_pink.png', 1, 2, 3),
(5, 'Reebok Crewneck - Mens - Navy', 'Super-soft French terry sweatshirt with a roomy cut and an angular logo print on the front.', '70', 'reebok_hood_navy.png', 1, 2, 5),
(6, 'Puma Hoodie - Womens - Pink', 'Elongated cotton-blend hoodie with an archive No.1 logo rubber print on the front.', '65', 'puma_hood_pink.png', 0, 2, 4),
(7, 'Adidas Hoodie - Womens - White', 'Soft Adicolor French terry cropped hoodie with contrasting 3-Stripes down the sleeves and a small Trefoil logo on the chest.', '85', 'adidas_hood_grey.png', 0, 2, 5),
(8, '47 Brand - Mens - Los Angeles  Lakers Shirt', 'ONLINE ONLY. Soft cotton tee with the screen-printed team logo on the front.', '34.99', 'lakers_shirt.png', 1, 1, 4),
(9, '47 Brand - Mens - New York Yankees Shirt', 'ONLINE ONLY. Breathable cotton tee with screen-printed team wordmark and logo on the chest.', '34.99', 'yankees_shirt.png', 1, 1, 4),
(10, 'Columbia Tee - Mens - Navy', 'From the Sportswear Collection. Cozy cotton jersey tee with a logo graphic on the front.', '25', 'columbia_tshirt_navy.png', 1, 1, 3),
(11, 'Champion Tee - Mens - White', 'Soft cotton tee with graphic logo on the front.', '35', 'champion_tee_white.png', 1, 1, 5),
(12, 'Puma Tee - Womens - Rose', 'Made with cotton from Better Cotton Initiative, this short sleeve tee features the PUMA no. 1 logo at the front in a rubber print.', '32', 'puma_tee_red.png', 0, 1, 4),
(13, 'Levis Tee - Womens - Blue', 'It\'s called perfect for a reason. Features the Levi\'s Box Tab logo.', '29.95', 'levis_tee_blue.png', 0, 1, 4),
(14, 'Nike Tee - Womens - Pink', 'The Nike Sportswear Essential T-Shirt sets you up with soft jersey fabric and a classic logo.', '35', 'nike_tee_pink.png', 0, 1, 5),
(15, 'Nike Tee - Womens - White', 'This soft cotton tee features bold overlapping logo graphics and a cut-and-sew design for a unique, handmade look.', '55', 'nike_tee_white.png', 0, 1, 4),
(16, 'Nike Running Shoe - Mens - Black/White', 'In a fluid design that speaks the language of fast, the Nike Air Zoom Winflo 6 has less bulk and a more sculpted profile than previous versions. It has 2 Zoom Air units for targeted responsiveness in the forefoot and heel.', '120', 'nike_shoe_black.png', 1, 3, 5),
(17, 'New Balance Running Shoe - Mens - Black', 'From the Roav Collection. Revolutionizing comfort and style, the Fresh Foam Roav men’s shoe delivers an unbeatable ride that is just as comfortable around the foot as it is underneath it.', '110', 'newbalance_shoe_black.png', 1, 3, 4),
(18, 'Puma Sneaker - Mens - Black', 'Influenced by fashion culture and brought to life by bonded materials, these low-top textile sneakers are created by forces of a fashionable nature.', '110', 'puma_shoe_black.png', 1, 3, 2),
(19, 'Adidas Running Shoe - Mens - Black', 'Sporty low-top sneakers with an innovative upper that moulds to your natural movement, so you can push farther and faster.', '120', 'adidas_shoe_black.png', 1, 3, 4),
(20, 'Nike Sneaker - Mens - White', 'Clean lines, versatile and timeless — the people\'s shoe returns with these lace-up sneakers. Featuring the same iconic Waffle sole, stitched overlays and classic accents you\'ve come to love, they let you walk among the pantheon of Air.', '160', 'nike_shoe_white.png', 1, 3, 4),
(21, 'Nike Running Shoe - Womens - White', 'Sporty sneakers with logo detail on the sides.', '120', 'nike_shoe_w_white.png', 0, 3, 5),
(22, 'Adidas Running Shoe - Womens - Black', 'These sneakers are built for maximum comfort. A Primeblue knit upper provides a seamless, sock-like feel that complements a wide fit and offers the foot room to expand over long trail runs.', '250', 'adidas_shoe_w_black.png', 0, 3, 4),
(23, 'Adidas Running Shoe - Womens - White', 'These textured sneakers blend a high-tech attitude with clean running style.', '170', 'adidas_shoe_white.png', 0, 3, 3),
(24, 'New Balance Running Shoe - Womens - Black', 'From the Nergize Sport Collection. These sneakers give the ultimate feminine and sporty vibes. They\'re designed with a modern low-profile upper made of synthetic and mesh and super-soft insert over a responsive REVlite midsole for a superior underfoot feel.', '90', 'newbalance_shoe_w_black.png', 0, 3, 4),
(25, 'Adidas Shorts - Mens - Black', 'Add volume and intensity to your squats and leg presses in these stretchy shorts. They\'re built with moisture-wicking fabric to help keep you dry all through your workout.', '48', 'adidas_shorts.png', 1, 4, 4),
(26, 'Adidas Golf Shorts - Mens - Grey', 'Choose your club and find the fairway with these Ultimate365 shorts. Dependable comfort and flexible mobility carry you through a full round feeling dry and ready for the next shot.', '85', 'adidas_golf_shorts.png', 1, 4, 5),
(27, 'Under Armour Shorts - Mens Navy', 'Sporty shorts with logo side tape detail.', '40', 'ua_shorts.png', 1, 4, 2),
(28, 'Nike Shorts - Mens - Black', 'With their hem details, folded waistband and inside pocket at the waist, these leggings offer comfort and freedom of movement no matter the activity.', '35', 'nike_shorts.png', 1, 4, 5),
(29, 'Loe Leggings - Womens - Light Grey', 'With their hem details, folded waistband and inside pocket at the waist, these leggings offer comfort and freedom of movement no matter the activity.', '89.99', 'loe_leggings.png', 1, 4, 5),
(30, 'Nike Biker Shorts - Women - Grey', 'These high-waisted cotton-blend bike shorts feature soft jersey fabric that moves with you and a high-waisted design that feels supportive.', '48', 'nike_biker_shorts.png', 1, 4, 5),
(31, 'Adidas Volleyball Shorts - Womens - Black', 'These volleyball shorts stay in place, so you stay focused on the match. The smooth fabric is super-stretchy, giving you total freedom to move.', '45', 'adidas_v_shorts.png', 1, 4, 3),
(32, 'Columbia Skirt - Womens - Grey', 'A clean, feminine basic that performs in the elements, this active, stretch-with-you skort features a water and stain repellent construction with built-in UPF 50 to protect you from the damaging effects of the sun', '65', 'columbia_skirt.png', 1, 4, 4),
(33, 'Fila Hoodie - Women - Navy ', 'From the Heritage Collection. Featuring a haphazard aesthetic, this premium sweatshirt features a reversed-out appliqué patch with a printed FILA logo.', '75', 'fila_hoodie.png', 0, 2, 3),
(34, 'Under Armour - Womens - Black\r\n', 'A vintage old-school feel, this colourblock sweatshirt is tailored from supersoft cotton-blend fleece fabric.', '70', 'ua_crewneck.png\r\n', 0, 2, 4),
(35, 'Nike Hoodie - Womens - Blue', 'Loosen up in the Nike Sportswear Essential Women\'s Fleece Pullover Hoodie, your go-to sweatshirt for all-day comfort.', '74', 'nike_hoodie_blue.png', 0, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_pass` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_date` timestamp NOT NULL,
  `user_ip` varchar(1000) NOT NULL,
  `user_log` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_ip`, `user_log`) VALUES
(1, 'Collins', 'cilo', '1234', 'jnreala@yahoo.com', '2020-03-17 04:00:00', '::1', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
