<?php
include_once('../core/initialize.php');

$preOrderItem = new PreOrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $preOrderItem->preOrderId = $data->preOrderId;
    $preOrderItem->MenuItemId = $data->MenuItemId;
    $preOrderItem->quantity = $data->quantity;
    $preOrderItem->specialRequest = $data->specialRequest;

    // Create preorder item
    if ($preOrderItem->create()) {
        echo json_encode(array('message' => 'PreOrder item created'));
    } else {
        echo json_encode(array('message' => 'Failed to create PreOrder item'));
    }
}
?>
