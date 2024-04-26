<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$preOrderItem = new PreOrderItem($db);
$data = json_decode(file_get_contents("php://input"));

$preOrderItem->preOrderItemId = $data->preOrderItemId;
$preOrderItem->preOrderId = $data->preOrderId;
$preOrderItem->MenuItemId = $data->MenuItemId;
$preOrderItem->quantity = $data->quantity;
$preOrderItem->specialRequest = $data->specialRequest;

// Update the preorder item
if ($preOrderItem->update()) {
    echo json_encode(array('message' => 'PreOrder item updated.'));
} else {
    echo json_encode(array('message' => 'PreOrder item NOT updated.'));
}
?>
