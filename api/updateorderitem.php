<?php
include_once('../core/initialize.php');

$orderItem = new OrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));

    $orderItem->orderItemId = $data->orderItemId;
    $orderItem->orderId = $data->orderId;
    $orderItem->mealId = $data->mealId;
    $orderItem->drinkId = $data->drinkId;
    $orderItem->quantity = $data->quantity;
    $orderItem->specialRequest = $data->specialRequest;

    // Update order item
    if ($orderItem->update()) {
        echo json_encode(array('message' => 'Order item updated'));
    } else {
        echo json_encode(array('message' => 'Failed to update order item'));
    }
}
?>
