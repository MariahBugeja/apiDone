<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

if (!isset($_GET['orderItemId'])) {
    echo json_encode(array('message' => 'Missing orderItemId parameter'));
    exit;
}

// Get the orderItemId from the request
$orderItemId = $_GET['orderItemId'];

$orderItem = new OrderItem($db);

$orderItemDetails = $orderItem->getOrderItemDetails($orderItemId);

if ($orderItemDetails) {
    echo json_encode($orderItemDetails);
} else {
    echo json_encode(array('message' => 'Order item not found'));
}
?>
