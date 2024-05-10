<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$preOrder = new PreOrder($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $preOrderDetails = $preOrder->getPreOrderDetails();

    // Check if pre-order details were retrieved successfully
    if ($preOrderDetails) {
        $formattedPreOrders = array();
        foreach ($preOrderDetails as $preOrder) {
            $formattedPreOrders[$preOrder['preOrderId']] = $preOrder;
        }

        echo json_encode($formattedPreOrders);
    } else {
        // No pre-order details found, return message
        echo json_encode(array('message' => 'No pre-order details found.'));
    }
}
?>
