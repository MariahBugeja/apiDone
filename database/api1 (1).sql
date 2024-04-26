-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 26, 2024 at 09:22 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api1`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(11) NOT NULL,
  `FirstName` varchar(500) NOT NULL,
  `LastName` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `FirstName`, `LastName`, `Email`, `phone`, `password`) VALUES
(4, 'mom', 'Sorrengial', 'Mariah@gmail.com', '7798888', 'Matiah11'),
(5, 'MAr', 'Sorrengial', 'Mariah@gmail.com', '7798888', 'Matiah11');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `drinkId` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`drinkId`, `Name`, `Price`) VALUES
(3, 'Water', '2'),
(5, 'Sparkling water', '4');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `Totalammount` decimal(10,0) NOT NULL,
  `PaymentStatus` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceId`, `orderId`, `Totalammount`, `PaymentStatus`) VALUES
(1, 1, '29', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `mealId` int(11) NOT NULL,
  `MealName` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`mealId`, `MealName`, `description`, `Price`) VALUES
(1, 'Spaghett', 'FTender, flavorful, juicy, and cooked to perfection', '2'),
(2, 'steak', 'FTender, flavorful, juicy, and cooked to perfection', '11'),
(3, 'salad', 'A delicious and healthy salad', '11'),
(4, 'rice', 'A delicious and healthy rice', '21');

-- --------------------------------------------------------

--
-- Table structure for table `mealIngredients`
--

CREATE TABLE `mealIngredients` (
  `IngredientsId` int(11) NOT NULL,
  `ingredientsName` varchar(500) NOT NULL,
  `AllergyInfo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mealIngredients`
--

INSERT INTO `mealIngredients` (`IngredientsId`, `ingredientsName`, `AllergyInfo`) VALUES
(1, 'Spaghetti ', 'wheat\r\neggs');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `tableId` int(11) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `tableId`, `orderDateTime`, `status`) VALUES
(1, 1, '2024-03-28 20:04:49', 'pending'),
(2, 1, '2024-04-26 19:42:03', 'pending'),
(3, 2, '2024-04-26 19:44:09', 'pending'),
(4, 2, '2024-04-26 19:44:09', 'pending'),
(5, 1, '2024-04-26 19:45:59', 'pending'),
(6, 1, '2024-04-26 19:45:59', 'pending'),
(8, 1, '2024-04-26 19:46:00', 'pending'),
(9, 1, '2024-04-26 19:47:51', 'pending'),
(10, 1, '2024-04-26 19:47:51', 'pending'),
(11, 1, '2024-04-26 19:48:45', 'pending'),
(12, 1, '2024-04-26 19:48:45', 'pending'),
(13, 1, '2024-04-26 19:49:20', 'pending'),
(14, 1, '2024-04-26 19:49:20', 'pending'),
(15, 2, '2024-04-26 19:49:27', 'pending'),
(16, 2, '2024-04-26 19:49:27', 'pending'),
(17, 1, '2024-04-26 20:00:51', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `orderItems`
--

CREATE TABLE `orderItems` (
  `orderItemId` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `mealId` int(11) NOT NULL,
  `drinkId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `SpecialRequirements` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(11) NOT NULL,
  `invoiceId` int(11) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `paymentMethod` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `invoiceId`, `amount`, `paymentMethod`) VALUES
(1, 1, '29', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `preOrder`
--

CREATE TABLE `preOrder` (
  `preOrderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `time` time NOT NULL,
  `status` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `mealId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `preOrderItem`
--

CREATE TABLE `preOrderItem` (
  `preOrderId` int(11) NOT NULL,
  `MenuItemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `SpecialRequest` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipeId` int(11) NOT NULL,
  `RecipeName` varchar(255) NOT NULL,
  `StaffId` int(11) NOT NULL,
  `timePreparation` varchar(100) NOT NULL,
  `timeCooking` varchar(100) NOT NULL,
  `prepInstructions` text NOT NULL,
  `mealId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipeId`, `RecipeName`, `StaffId`, `timePreparation`, `timeCooking`, `prepInstructions`, `mealId`) VALUES
(17, 'Spaghetti', 1, '30 minutes', '1 hour', 'Spaghetti preparation involves boiling pasta until al dente, while simultaneously preparing a savory sauce with tomatoes, garlic, onions, and herbs. The cooked pasta is then combined with the sauce and served hot, often garnished with grated cheese and fresh herbs.', 1),
(18, 'Steak', 1, '20 minutes', '1 hour', 'To cook a great steak, start by seasoning it with salt and pepper. Heat a skillet or grill over medium-high heat and cook the steak for 3-4 minutes on each side for medium-rare. Let it rest for a few minutes before slicing', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `RservationsId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `numberOfGuests` int(11) NOT NULL,
  `status` varchar(500) NOT NULL,
  `mealId` int(11) NOT NULL,
  `timeOfFood` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`RservationsId`, `CustomerId`, `date`, `time`, `numberOfGuests`, `status`, `mealId`, `timeOfFood`) VALUES
(1, 1, '2024-03-01', '16:59:02', 3, 'pending', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservationsDetail`
--

CREATE TABLE `reservationsDetail` (
  `reservationsDetailId` int(11) NOT NULL,
  `mealId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reservationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservationTable`
--

CREATE TABLE `reservationTable` (
  `reservationId` int(11) NOT NULL,
  `tableId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservationTable`
--

INSERT INTO `reservationTable` (`reservationId`, `tableId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `RestaurantTable`
--

CREATE TABLE `RestaurantTable` (
  `tableId` int(11) NOT NULL,
  `tableNumber` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RestaurantTable`
--

INSERT INTO `RestaurantTable` (`tableId`, `tableNumber`, `capacity`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `FirstName` varchar(500) NOT NULL,
  `LastName` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `phone` varchar(8) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `FirstName`, `LastName`, `role`, `phone`, `address`) VALUES
(1, 'Xaden', 'Raison', 'manager', '99067678', 'block c flat 5 triq patri grech, Mosta'),
(2, 'Mark', 'Borg', 'Chef', '99067633', 'Block C Flat 6 Triq Patri Mosta');

-- --------------------------------------------------------

--
-- Table structure for table `staffshift`
--

CREATE TABLE `staffshift` (
  `staffshiftId` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `finish` datetime NOT NULL,
  `shifttype` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staffshift`
--

INSERT INTO `staffshift` (`staffshiftId`, `staffId`, `start`, `finish`, `shifttype`) VALUES
(3, 2, '2024-04-25 08:00:00', '2024-04-25 16:00:00', 'Morning'),
(4, 2, '2024-04-25 08:00:00', '2024-04-25 16:00:00', 'Morning'),
(5, 1, '2024-04-04 18:00:00', '2024-04-05 01:00:00', 'night');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`drinkId`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`mealId`);

--
-- Indexes for table `mealIngredients`
--
ALTER TABLE `mealIngredients`
  ADD PRIMARY KEY (`IngredientsId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `orderItems`
--
ALTER TABLE `orderItems`
  ADD PRIMARY KEY (`orderItemId`),
  ADD KEY `orderitems_ibfk_1` (`drinkId`),
  ADD KEY `mealId` (`mealId`),
  ADD KEY `orderid` (`orderid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`),
  ADD KEY `invoiceId` (`invoiceId`);

--
-- Indexes for table `preOrder`
--
ALTER TABLE `preOrder`
  ADD PRIMARY KEY (`preOrderId`),
  ADD KEY `CustomerId` (`CustomerId`),
  ADD KEY `mealId` (`mealId`);

--
-- Indexes for table `preOrderItem`
--
ALTER TABLE `preOrderItem`
  ADD PRIMARY KEY (`MenuItemId`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`recipeId`),
  ADD KEY `mealId` (`mealId`),
  ADD KEY `StaffId` (`StaffId`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`RservationsId`),
  ADD KEY `mealId` (`mealId`);

--
-- Indexes for table `reservationsDetail`
--
ALTER TABLE `reservationsDetail`
  ADD PRIMARY KEY (`reservationsDetailId`),
  ADD KEY `mealId` (`mealId`),
  ADD KEY `reservationId` (`reservationId`);

--
-- Indexes for table `reservationTable`
--
ALTER TABLE `reservationTable`
  ADD PRIMARY KEY (`reservationId`),
  ADD KEY `tableId` (`tableId`);

--
-- Indexes for table `RestaurantTable`
--
ALTER TABLE `RestaurantTable`
  ADD PRIMARY KEY (`tableId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `staffshift`
--
ALTER TABLE `staffshift`
  ADD PRIMARY KEY (`staffshiftId`),
  ADD KEY `staffId` (`staffId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `drinkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `mealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mealIngredients`
--
ALTER TABLE `mealIngredients`
  MODIFY `IngredientsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orderItems`
--
ALTER TABLE `orderItems`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `preOrder`
--
ALTER TABLE `preOrder`
  MODIFY `preOrderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preOrderItem`
--
ALTER TABLE `preOrderItem`
  MODIFY `MenuItemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `recipeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `RservationsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservationTable`
--
ALTER TABLE `reservationTable`
  MODIFY `reservationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `RestaurantTable`
--
ALTER TABLE `RestaurantTable`
  MODIFY `tableId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffshift`
--
ALTER TABLE `staffshift`
  MODIFY `staffshiftId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order` (`orderId`) ON UPDATE CASCADE;

--
-- Constraints for table `orderItems`
--
ALTER TABLE `orderItems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`drinkId`) REFERENCES `drink` (`drinkId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`mealId`) REFERENCES `meal` (`mealId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_3` FOREIGN KEY (`orderid`) REFERENCES `order` (`orderId`) ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`invoiceId`) REFERENCES `invoice` (`invoiceId`) ON UPDATE CASCADE;

--
-- Constraints for table `preOrder`
--
ALTER TABLE `preOrder`
  ADD CONSTRAINT `preorder_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`customerId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `preorder_ibfk_2` FOREIGN KEY (`mealId`) REFERENCES `meal` (`mealId`) ON UPDATE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_2` FOREIGN KEY (`mealId`) REFERENCES `meal` (`mealId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `recipes_ibfk_3` FOREIGN KEY (`StaffId`) REFERENCES `staff` (`staffId`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`mealId`) REFERENCES `meal` (`mealId`) ON UPDATE CASCADE;

--
-- Constraints for table `reservationsDetail`
--
ALTER TABLE `reservationsDetail`
  ADD CONSTRAINT `reservationsdetail_ibfk_1` FOREIGN KEY (`mealId`) REFERENCES `meal` (`mealId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reservationsdetail_ibfk_2` FOREIGN KEY (`reservationId`) REFERENCES `reservations` (`RservationsId`) ON UPDATE CASCADE;

--
-- Constraints for table `reservationTable`
--
ALTER TABLE `reservationTable`
  ADD CONSTRAINT `reservationtable_ibfk_1` FOREIGN KEY (`tableId`) REFERENCES `RestaurantTable` (`tableId`);

--
-- Constraints for table `staffshift`
--
ALTER TABLE `staffshift`
  ADD CONSTRAINT `staffshift_ibfk_1` FOREIGN KEY (`staffId`) REFERENCES `staff` (`staffId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
