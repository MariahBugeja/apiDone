<?php
include_once('../core/initialize.php');

$preOrder = new PreOrder($db);

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));

    $preOrder->preOrderId = $data->preOrderId;

    // Delete the preorder
    if ($preOrder->delete()) {
        echo json_encode(array('message' => 'PreOrder deleted.'));
    } else {
        echo json_encode(array('message' => 'Failed to delete PreOrder.'));
    }
}
?>
