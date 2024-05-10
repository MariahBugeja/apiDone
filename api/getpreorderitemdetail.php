<?php
include_once('../core/initialize.php');

$preOrderItem = new PreOrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    if(isset($_GET['preOrderItemId'])) {
        // Get preOrderItemDetail
        $preOrderItemDetail = $preOrderItem->getPreOrderItemDetail($_GET['preOrderItemId']);

        // Check if preOrderItemDetail is found
        if ($preOrderItemDetail) {
            // Pre-order item found, return as JSON
            echo json_encode($preOrderItemDetail);
        } else {
            // Pre-order item not found
            echo json_encode(array('message' => 'Pre-order item not found.'));
        }
    } else {
        // Pre-order item ID not provided
        echo json_encode(array('message' => 'Pre-order item ID not provided.'));
    }
}
?>
