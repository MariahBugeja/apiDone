<?php
include_once('../core/initialize.php');

$preOrder = new PreOrder($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['preOrderId'])) {
        $preOrder->preOrderId = $_GET['preOrderId'];

        if ($preOrder->read_single()) {
            echo json_encode(array(
                'preOrderId' => $preOrder->preOrderId,
                'CustomerId' => $preOrder->CustomerId,
                'time' => $preOrder->time,
                'status' => $preOrder->status,
                'date' => $preOrder->date,
                'mealId' => $preOrder->mealId
            ));
        } else {
            echo json_encode(array('message' => 'PreOrder not found.'));
        }
    } else {
        echo json_encode(array('message' => 'PreOrder ID not provided.'));
    }
}
?>
