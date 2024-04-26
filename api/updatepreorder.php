<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$preOrder = new PreOrder($db);
$data = json_decode(file_get_contents("php://input"));

$preOrder->preOrderId = $data->preOrderId;
$preOrder->customerId = $data->customerId;
$preOrder->time = $data->time;
$preOrder->status = $data->status;
$preOrder->date = $data->date;
$preOrder->mealId = $data->mealId;

// Update the preorder
if ($preOrder->update()) {
    echo json_encode(array('message' => 'PreOrder updated.'));
} else {
    echo json_encode(array('message' => 'PreOrder NOT updated.'));
}
?>
