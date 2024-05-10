<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

try {
    if (!isset($data->preOrderId) || !isset($data->mealId) || !isset($data->quantity) ||
        empty($data->preOrderId) || empty($data->mealId) || empty($data->quantity)) {
        throw new Exception('Failed to create preorder item. Required fields are missing or invalid.');
    }

    $preOrderItem = new PreOrderItem($db);

    $preOrderItem->preOrderId = $data->preOrderId;
    $preOrderItem->mealId = $data->mealId;
    $preOrderItem->quantity = $data->quantity;
    $preOrderItem->specialRequest = isset($data->specialRequest) ? $data->specialRequest : null;

    // Check if the preorder exists
    if (!$preOrderItem->preOrderExists($preOrderItem->preOrderId)) {
        throw new Exception('Failed to create preorder item. Preorder may not exist.');
    }

    // Check if the meal item exists
    if (!$preOrderItem->mealExists($preOrderItem->mealId)) {
        throw new Exception('Failed to create preorder item. Meal item may not exist.');
    }

    // Check if the preorder item was created successfully
    if ($preOrderItem->create()) {
        echo json_encode(array('message' => 'Preorder item created successfully.'));
    } else {
        throw new Exception('Failed to create preorder item.');
    }
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}
?>
