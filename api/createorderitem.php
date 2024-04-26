<?php
include_once('../core/initialize.php');

$orderItem = new OrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $orderItem->orderId = $data->orderId;
    $orderItem->mealId = $data->mealId;
    $orderItem->drinkId = $data->drinkId;
    $orderItem->quantity = $data->quantity;
    $orderItem->specialRequest = $data->specialRequest;

    // Create order item
    if ($orderItem->create()) {
        echo json_encode(array('message' => 'Order item created'));
    } else {
        echo json_encode(array('message' => 'Failed to create order item'));
    }
}
?>
