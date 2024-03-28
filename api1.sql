-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 28, 2024 at 08:10 PM
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
  `FistName` varchar(500) NOT NULL,
  `LastName` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `phone` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `FistName`, `LastName`, `Email`, `phone`) VALUES
(1, 'Violet', 'sorrengail', 'Violets@gmail.com', '77067566');

-- --------------------------------------------------------

--
-- Table structure for table `customMeal`
--

CREATE TABLE `customMeal` (
  `mealId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customMeal`
--

INSERT INTO `customMeal` (`mealId`, `CustomerId`, `Date`, `time`, `status`) VALUES
(1, 1, '2024-03-01', '16:59:02', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `customMealIngredients`
--

CREATE TABLE `customMealIngredients` (
  `mealId` int(11) NOT NULL,
  `ingredientsId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customMealIngredients`
--

INSERT INTO `customMealIngredients` (`mealId`, `ingredientsId`, `quantity`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `frozenMeal`
--

CREATE TABLE `frozenMeal` (
  `mealId` int(11) NOT NULL,
  `mealName` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `Price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frozenMeal`
--

INSERT INTO `frozenMeal` (`mealId`, `mealName`, `description`, `Price`) VALUES
(1, 'Spaghetti ', 'a white, starchy pasta of Italian origin that is made in the form of long strings, boiled, and served with any of a variety of meat and tomato', '29');

-- --------------------------------------------------------

--
-- Table structure for table `frozenMealOrder`
--

CREATE TABLE `frozenMealOrder` (
  `orderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frozenMealOrder`
--

INSERT INTO `frozenMealOrder` (`orderId`, `CustomerId`, `Date`, `time`, `status`) VALUES
(1, 1, '2024-03-01', '16:59:02', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `frozenMealOrderItem`
--

CREATE TABLE `frozenMealOrderItem` (
  `orderItemId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `mealId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frozenMealOrderItem`
--

INSERT INTO `frozenMealOrderItem` (`orderItemId`, `OrderId`, `mealId`, `quantity`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `GrabAndGoOrder`
--

CREATE TABLE `GrabAndGoOrder` (
  `orderId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `status` varchar(500) NOT NULL,
  `preparationTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `GrabAndGoOrder`
--

INSERT INTO `GrabAndGoOrder` (`orderId`, `CustomerId`, `Date`, `Time`, `status`, `preparationTime`) VALUES
(1, 1, '2024-03-01', '16:02:27', 'pending', '18:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `GrabAndGoOrderItem`
--

CREATE TABLE `GrabAndGoOrderItem` (
  `orderItemId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `MenuItem` varchar(300) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `GrabAndGoOrderItem`
--

INSERT INTO `GrabAndGoOrderItem` (`orderItemId`, `OrderId`, `MenuItem`, `quantity`) VALUES
(1, 1, 'Spaghetti ', 1);

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
(1, 'Spaghetti ', 'a white, starchy pasta of Italian origin that is made in the form of long strings, boiled, and served with any of a variety of meat and tomato', '29');

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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuItemId` int(11) NOT NULL,
  `itemName` varchar(300) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuItemId`, `itemName`, `description`, `price`) VALUES
(1, 'Spaghetti ', 'a white, starchy pasta of Italian origin that is made in the form of long strings, boiled, and served with any of a variety of meat and tomato', '29');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `tableId` int(11) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `staus` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `tableId`, `orderDateTime`, `staus`) VALUES
(1, 1, '2024-03-28 20:04:49', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `orderItem`
--

CREATE TABLE `orderItem` (
  `orderItemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `MenuItemId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `specialRequest` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderItem`
--

INSERT INTO `orderItem` (`orderItemId`, `orderId`, `MenuItemId`, `quantity`, `specialRequest`) VALUES
(1, 1, 1, 1, 'Remove cheese');

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
  `tableId` int(11) NOT NULL,
  `time` time NOT NULL,
  `status` varchar(500) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preOrder`
--

INSERT INTO `preOrder` (`preOrderId`, `CustomerId`, `tableId`, `time`, `status`, `date`) VALUES
(1, 1, 1, '16:59:02', 'pending', '2024-03-01');

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

--
-- Dumping data for table `preOrderItem`
--

INSERT INTO `preOrderItem` (`preOrderId`, `MenuItemId`, `quantity`, `SpecialRequest`) VALUES
(1, 1, 1, 'none');

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
  `special_requirements` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`RservationsId`, `CustomerId`, `date`, `time`, `numberOfGuests`, `status`, `mealId`, `special_requirements`) VALUES
(1, 1, '2024-03-01', '16:59:02', 3, 'pending', 1, '');

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
  `capacity` int(11) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `RestaurantTable`
--

INSERT INTO `RestaurantTable` (`tableId`, `tableNumber`, `capacity`, `status`) VALUES
(1, 1, 3, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `FirstName` varchar(500) NOT NULL,
  `LastName` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `FirstName`, `LastName`, `role`) VALUES
(1, 'Xaden', 'Dragon', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customMeal`
--
ALTER TABLE `customMeal`
  ADD PRIMARY KEY (`mealId`);

--
-- Indexes for table `customMealIngredients`
--
ALTER TABLE `customMealIngredients`
  ADD PRIMARY KEY (`mealId`);

--
-- Indexes for table `frozenMeal`
--
ALTER TABLE `frozenMeal`
  ADD PRIMARY KEY (`mealId`);

--
-- Indexes for table `frozenMealOrder`
--
ALTER TABLE `frozenMealOrder`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `frozenMealOrderItem`
--
ALTER TABLE `frozenMealOrderItem`
  ADD PRIMARY KEY (`orderItemId`);

--
-- Indexes for table `GrabAndGoOrder`
--
ALTER TABLE `GrabAndGoOrder`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `GrabAndGoOrderItem`
--
ALTER TABLE `GrabAndGoOrderItem`
  ADD PRIMARY KEY (`orderItemId`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceId`);

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuItemId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `orderItem`
--
ALTER TABLE `orderItem`
  ADD PRIMARY KEY (`orderItemId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `preOrder`
--
ALTER TABLE `preOrder`
  ADD PRIMARY KEY (`preOrderId`);

--
-- Indexes for table `preOrderItem`
--
ALTER TABLE `preOrderItem`
  ADD PRIMARY KEY (`MenuItemId`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`RservationsId`);

--
-- Indexes for table `reservationTable`
--
ALTER TABLE `reservationTable`
  ADD PRIMARY KEY (`reservationId`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customMeal`
--
ALTER TABLE `customMeal`
  MODIFY `mealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customMealIngredients`
--
ALTER TABLE `customMealIngredients`
  MODIFY `mealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frozenMeal`
--
ALTER TABLE `frozenMeal`
  MODIFY `mealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frozenMealOrder`
--
ALTER TABLE `frozenMealOrder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `frozenMealOrderItem`
--
ALTER TABLE `frozenMealOrderItem`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `GrabAndGoOrder`
--
ALTER TABLE `GrabAndGoOrder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `GrabAndGoOrderItem`
--
ALTER TABLE `GrabAndGoOrderItem`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `mealId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mealIngredients`
--
ALTER TABLE `mealIngredients`
  MODIFY `IngredientsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderItem`
--
ALTER TABLE `orderItem`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `preOrder`
--
ALTER TABLE `preOrder`
  MODIFY `preOrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `preOrderItem`
--
ALTER TABLE `preOrderItem`
  MODIFY `MenuItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
