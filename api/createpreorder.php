<?php
include_once('../core/initialize.php');

$preOrderItem = new PreOrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $preOrderItem->preOrderId = $data->preOrderId;
    $preOrderItem->customerId = $data->customerId;
    $preOrderItem->mealId = $data->mealId;
    $preOrderItem->quantity = $data->quantity;
    $preOrderItem->specialRequest = $data->specialRequest;

    // Create preorder item
    if ($preOrderItem->create()) {
        echo json_encode(array('message' => 'Preorder item created'));
    } else {
        echo json_encode(array('message' => 'Failed to create preorder item'));
    }
}
?>
