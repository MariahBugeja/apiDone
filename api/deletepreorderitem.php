<?php
include_once('../core/initialize.php');

$preOrderItem = new PreOrderItem($db);
$data = json_decode(file_get_contents("php://input"));

$preOrderItem->preOrderItemId = $data->preOrderItemId;

// Delete the preorder item
if ($preOrderItem->delete()) {
    echo json_encode(array('message' => 'PreOrder item deleted.'));
} else {
    echo json_encode(array('message' => 'PreOrder item NOT deleted.'));
}
?>
