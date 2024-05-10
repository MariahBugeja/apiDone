<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

try {
    if (!isset($data->orderId) || !isset($data->mealId) || !isset($data->drinkId) || !isset($data->quantity) ||
        empty($data->orderId) || empty($data->mealId) || empty($data->drinkId) || empty($data->quantity)) {
        throw new Exception('Failed to create order item. Required fields are missing or invalid.');
    }

    $orderItem = new OrderItem($db);

    $orderItem->orderId = $data->orderId;
    $orderItem->mealId = $data->mealId;
    $orderItem->drinkId = $data->drinkId;
    $orderItem->quantity = $data->quantity;
    $orderItem->specialRequirements = isset($data->specialRequirements) ? $data->specialRequirements : null;

    // Check if the meal exists
    if (!$orderItem->mealExists($orderItem->mealId)) {
        throw new Exception('Failed to create order item. Meal may not exist.');
    }

    // Check if the drink exists
    if (!$orderItem->drinkExists($orderItem->drinkId)) {
        throw new Exception('Failed to create order item. Drink may not exist.');
    }

    // Check if the order exists before creating the order item
    if (!$orderItem->orderExists($orderItem->orderId)) {
        throw new Exception('Failed to create order item. Order may not exist.');
    }

    // Check if the order item was created successfully
    if ($orderItem->create()) {
        echo json_encode(array('message' => 'Order item created successfully.'));
    } else {
        throw new Exception('Failed to create order item.');
    }
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}

?>
