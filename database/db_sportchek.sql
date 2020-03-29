-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 29, 2020 at 11:54 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Under Armour'),
(4, 'Helly Hansen'),
(5, 'Vans'),
(6, 'New Balance'),
(7, 'Champion');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`) VALUES
(1, 'Nike Men\'s Path Winter Shoes', '$89.99', 'When you’re up against harsh winter elements, the Nike Path Winter provides warmth and coverage in a rugged new seasonal style.', 'nike-path.webp'),
(2, 'Nike Sportswear Men\'s Woven Anorak Jacket', '$82.50', 'The Nike Sportswear Jacket gives you a classic design built to fight the elements with windbreaker-like coverage. Designed with an adjustable bungee-cord hood, mesh lining adds breathable comfort.\r\n', 'nike-anorak.webp'),
(3, 'Nike Women\'s Court Vision Low Shoes', '$65.99', 'The fastbreak style of ’80s basketball meets the fast-paced culture of today’s game, with the new Nike Court Vision Low. It features an upper inspired by old school basketball sneakers and the classic rubber cupsole featured on some of the most iconic silhouettes of the past.', 'nike-vision.webp'),
(4, 'Nike Sportswear Women\'s Essential Fleece Pants', '$55.50', 'Meet your new go-to sweats. Made with semi-brushed fleece for an ultra soft feel, the Nike Sportswear Essential Pants feature an elastic waistband and ribbed cuffs for extra comfort on the go.', 'nike-essential.webp'),
(5, 'Nike Men\'s Air Max Oketo Shoes - Black/Anthracite', '$74.99', 'The Nike Air Max Oketo lives up to its name with a minimal aesthetic and the comfortable cushioning of a Max Air unit. Its clean and simple mesh upper is elevated by subtle design details referencing iconic Air Max models for historic style.', 'nike-oketo.webp'),
(6, 'adidas Unisex NMD_R1 Shoes - White/Gum', '$170.00', '*Please note that this style is unisex in sizing; for women’s sizes, please order a size down i.e. Size 6 women’s = Size 5\r\nStreamlined and modern, the adidas NMD_R1 combines ’80s racing heritage with style cues taken from outdoor trail gear. The foot-hugging knit upper rides on a responsive cushioned midsole.\r\n', 'adidas-nmd.webp'),
(7, 'adidas Women\'s Superstar Shoes', '$100.00', 'The adidas Superstar Shoes first stepped onto the basketball hardwood in 1970. It didn’t take long for them to make the leap from athletic gear to streetwear staple. These shoes show off the materials, proportions and style that made the original such a legend. They’ve got a smooth leather upper with sporty 3-Stripes and a heel tab. They’re finished off with the world-famous rubber shell toe.', 'adidas-superstar.webp'),
(8, 'adidas Women\'s Sportswear Game and Go Tapered Pants', '$69.99', 'Comfort never goes out of style. Slip on these adidas pants as you walk home from the gym or step onto a long-haul flight. The soft fabric keeps you dry, so you feel good. Wherever you’re heading.', 'adidas-game.webp'),
(9, 'adidas Men\'s Daily 2.0 Skate Shoes - Black/White', '$44.98', 'The definitive daily trainer. This classic court shoe is reworked with a modern shape and fresh materials. The casual denim upper is accented with stitched-on 3-Stripes for go-with-anything ease. A vulc-look outsole completes the package.\r\n', 'adidas-skate.webp'),
(10, 'adidas Men\'s Must Haves Badge of Sport French Terry Pants', '$69.99', 'Find calm after the chaos. In the afterglow of victory, tune out and reset in these sweat pants. The tapered pants are made from soft French terry for a comfortable feel. A contrast adidas Badge of Sport finishes the sporty look.', 'adidas-terry.webp'),
(11, 'Under Armour Women\'s Ignite VIII SL Sandals - Black/White', '$34.99', 'The Under Armour Ignite VIII SL Women’s Sandals has a re-engineered EVA outsole with durable traction pods for lightweight cushioning & comfort.', 'ua-sandal.webp'),
(12, 'Under Armour Women\'s Project Rock Warrior Mana Hoodie', '$79.99', 'Project Rock is not a brand, it’s a movement. It’s a core belief, that I 100% don’t care what color you are, how old you are, where you come from or what you do for a living. The only thing I care about is you and me, building the belief that regardless of whatever the odds, we can overcome and achieve-but it all starts with the work we’re willing to put in with our two hands.', 'ua-rock.webp'),
(13, 'Under Armour Women\'s Project Rock Terry Jogger', '$69.99', 'Project Rock is not a brand, it’s a movement. It’s a core belief, that I 100% don’t care what color you are, how old you are, where you come from or what you do for a living. The only thing I care about is you and me, building the belief that regardless of whatever the odds, we can overcome and achieve-but it all starts with the work we’re willing to put in with our two hands.', 'ua-rockpants.webp'),
(14, 'Under Armour Men\'s Sonic 3 Running Shoes', '$99.98', 'The Under Armour Men’s Sonic 3 Running Shoe is neutral for runners who need flexibility, cushioning & versatility.', 'ua-sonic.webp'),
(15, 'Under Amour Men\'s Project Rock Charged Cotton T Shirt', '$54.99', 'Slip on the Under Armour Men’s Project Rock Charged Cotton T Shirt to enjoy the softness and quick-dry comfort of Charged Cotton fabric.', 'ua-tshirt.webp'),
(16, 'Helly Hansen Men\'s Azure Shoes', '$75.00', 'The Azure features a classic silhouette constructed in a soft, cotton canvas with premium leather detailing.', 'hh-azure.webp'),
(17, 'Helly Hansen Men\'s Stockholm 2 Boots - Black', '$149.99', 'An all-city style and all-weather protection kind of boot.', 'hh-black.webp'),
(18, 'Helly Hansen Men\'s Utility Rain Jacket', '$220.00', '100% waterproof, breathable jacket made for early spring or cool summer days. The Protection series is a collection of rainwear products made for life in urban environments, making no compromises to functionality or visual design. Combining the 2-layer HellyTech® Protection with a stylish design allows you to be comfortable for early spring and summer days when the weather could be constantly changing. This jacket suits a range of urban lifestyles that you can take with you anywhere.', 'hh-forest.webp'),
(19, 'Helly Hansen Women\'s Nord Graphic Pullover Hoodie', '$52.49', 'The Helly Hansen Nord Graphic Pullover Hoodie is the perfect addition to any adventure, be it in the city or the mountains.', 'hh-hoodie.webp'),
(20, 'Helly Hansen Women\'s Scurry V3 Boots', '$79.99', 'This summer is all about fun. And the Women’s Scurry V3 is your best companion no matter the activity.', 'hh-scurry.webp'),
(21, 'Vans Men\'s ComfyCush Old Skool Shoes - Black', '$100.00', 'Vans has reinvigorated the classic Old Skool silhouette with comfort technology ComfyCush, giving the Classic ComfyCush Old Skool a first-class fit that feels like walking on a cloud. A co-molded construction of foam and rubber is the perfect combination of both comfort and grip, rubber outsoles offer durability and traction, and new moisture-wicking lining materials are featured throughout the interior of the shoe. While newly constructed suede and canvas uppers focus on tongue stabilization, simplified one-piece interiors and added arch support provide an experience where comfort is vital.', 'vans-comfy.webp'),
(22, 'Vans Men\'s Old Skool Shoes - Night Sky/Gum', '$59.97', 'The Gum Old Skool, the Vans classic skate shoe and first to bare the iconic sidestripe, is a low top lace-up featuring sturdy canvas and suede uppers, re-enforced toecaps to withstand repeated wear, padded collars for support and flexibility, gum-colored sidewalls, and signature rubber waffle outsoles.', 'vans-gum.webp'),
(23, 'Vans Women\'s Classic Slip-on Shoes - White', '$39.88', 'The Herringbone Classic Slip-On features sturdy low profile textile uppers, padded collars, elastic side accents, and signature rubber waffle outsoles.', 'vans-classic.webp'),
(24, 'Vans Authentic Shoes - Black', '$65.00', 'Please note that sizing is unisex for this style - for Women\'s sizes, please add a size and a half i.e. size 5 Men\'s = size 6.5 Women\'s\r\nThe Authentic, Vans original and now iconic style, is a simple low top, lace-up with durable canvas upper, metal eyelets, Vans flag label and Vans original Waffle Outsole.\r\n', 'vans-authentic.webp'),
(25, 'Vans Women\'s Deana III Backpack', '$26.88', 'The Deana III Backpack Is A 100% Cotton Novelty Two-Pocket Backpack Featuring 100% Polyester Lining, Debossed Lining At The Interior Back Panel, Front Pocket Organization, And A Logo Patch. Measuring 16.75 H X 12.75 W X 5 D Inches, It Has A 22-Liter Capacity.', 'vans-backpack.webp'),
(26, 'New Balance Women\'s Evolve Twist Back Hoodie Studio', '$41.97', 'The Evolve Twist Back Hoodie is perfect for enroute to class and while you warm up and stretch. Buttery terry fabric with just the right amount of drape and a cute back knot detail elevate this comfy layer to must-have status.', 'nb-twist.webp'),
(27, 'New Balance Women\'s Essentials Opulence Hoodie - Overcast', '$66.97', 'The women’s Essentials Opulence Pullover Hoodie puts a twist on the velour track suit trend with a classic hooded profile cut from luxuriously soft velour fabric. Embroidered branding adds a premium touch, and roman numeral 1906 detail lends an elevated nod to NB heritage.', 'nb-overcast.webp'),
(28, 'New Balance Women\'s Essentials Stadium Jacket', '$64.97', 'The women’s New Balance Essentials Stadium Jacket updates a classic bomber silhouette with satin woven fabric for a bit of elevated style. New Balance branding, side pockets and rib detail round out the relaxed fit design that’s equal parts versatile and statement-making.', 'nb-stadium.webp'),
(29, 'New Balance Men\'s Comp 100 Shoes', '$109.99', 'New Balance re-released the distinctive COMP 100 silhouette from the NB catalogues of the 70s. This bringback style for men features a sleek, low profile with premium leather on the upper atop a Vibram mega-grip outsole.', 'nb-comp.webp'),
(30, 'New Balance Women\'s Essentials Sweatpants', '$74.99', 'Leverage your go-to lounge gear with super soft French terry fabric in the women’s Essentials Sweat Pant. The cozy athletic fit offers stay-put support from a rib drawstring waistband and hem. A screen printed stacked logo graphic on the left hip rounds out the look with simply classic style.', 'nb-pants.webp'),
(31, 'Champion Men\'s Powerblend Fleece Pullover Hoodie', '$59.99', 'The same feel as the classic sweatshirt, the Champion Powerblend Pullover Hoodie is made of comfortable fleece fabric and comes with a drawstring hoodie. Keep warm with this hoodie version of a Champion sweater.', 'champion-hoodie.webp'),
(32, 'Champion Women\'s Packable Jacket - Athletic Navy / Chalk White', '$54.99', 'Women’s Champion Packable Jacket is lightweight and packs away into itself for easy storage.', 'champion-jacket.webp'),
(33, 'Champion Men\'s Powerblend Fleece Shorts', '$39.99', 'Don’t live without the look and feel of your go-to sweats just because it is warm out. Stay cool and comfy in the summer with the Champion Powerblend Fleece Shorts - raw hem for that added laidback touch.', 'champion-shorts.webp'),
(34, 'Champion Mogul Beanie & Scarf Set', '$21.97', 'Champion - authentic athletic apparel. Founded in Rochester, new York back in 1919, the Champion brand has outfitted athletes for generations. Athletic apparel is in Champions culture, heritage and DNA.', 'champion-mogul.webp'),
(35, 'Champion YC Crossbody Bag - Coral', '$19.97', 'Secure your essentials in this sporty shoulder bag.', 'champion-yc.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_cat`
--

CREATE TABLE `tbl_product_cat` (
  `product_cat_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_cat`
--

INSERT INTO `tbl_product_cat` (`product_cat_id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 10, 2),
(11, 11, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(15, 15, 3),
(16, 16, 4),
(17, 17, 4),
(18, 18, 4),
(19, 19, 4),
(20, 20, 4),
(21, 21, 5),
(22, 22, 5),
(23, 23, 5),
(24, 24, 5),
(25, 25, 5),
(26, 26, 6),
(27, 27, 6),
(28, 28, 6),
(29, 29, 6),
(30, 30, 6),
(31, 31, 7),
(32, 32, 7),
(33, 33, 7),
(34, 34, 7),
(35, 35, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  ADD PRIMARY KEY (`product_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_product_cat`
--
ALTER TABLE `tbl_product_cat`
  MODIFY `product_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
