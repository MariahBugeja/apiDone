<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$preOrder = new PreOrder($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['preOrderId'])) {
        $preOrderDetail = $preOrder->getPreOrderDetail($_GET['preOrderId']);

        if ($preOrderDetail) {
            echo json_encode($preOrderDetail);
        } else {
            echo json_encode(array('message' => 'Pre-order not found.'));
        }
    } else {
        // Pre-order ID not provided, return message
        echo json_encode(array('message' => 'Pre-order ID not provided.'));
    }
}
?>
