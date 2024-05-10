<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$orderItem = new OrderItem($db);

$orderItems = $orderItem->getAllOrderItems();

// Check if order items were retrieved successfully
if ($orderItems) {
    echo json_encode($orderItems);
} else {
    // No order items found, return empty array
    echo json_encode(array());
}
?>
