<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

if (!isset($data->orderItemId) || !isset($data->orderId) || !isset($data->mealId) || !isset($data->drinkId) || !isset($data->quantity)) {
    echo json_encode(array('message' => 'Failed to update order item. Required fields are missing.'));
    exit;
}

$orderItem = new OrderItem($db);

// Assign data to order item properties
$orderItem->orderItemId = $data->orderItemId;
$orderItem->orderId = $data->orderId;
$orderItem->mealId = $data->mealId;
$orderItem->drinkId = $data->drinkId;
$orderItem->quantity = $data->quantity;
$orderItem->specialRequirements = isset($data->specialRequirements) ? $data->specialRequirements : null;

// Update the order item
if ($orderItem->update()) {
    echo json_encode(array('message' => 'Order item updated successfully.'));
} else {
    echo json_encode(array('message' => 'Failed to update order item.'));
}
?>