<?php
include_once('../core/initialize.php');

$preOrderItem = new PreOrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $preOrderItems = $preOrderItem->getAllPreOrderItems();

    // Check if pre-order items exist
    if ($preOrderItems) {
        $formattedPreOrderItems = [];

        foreach ($preOrderItems as $item) {
            $formattedItem = [
                'orderItemId' => $item['preOrderitemdetailId'],
                'orderId' => $item['preOrderId'],
                'mealId' => $item['mealId'],
                'quantity' => $item['quantity'],
                'SpecialRequirements' => $item['SpecialRequest']
            ];

            $formattedPreOrderItems[] = $formattedItem;
        }

        echo json_encode($formattedPreOrderItems);
    } else {
        // No pre-order items found
        echo json_encode(array('message' => 'No pre-order items found.'));
    }
}
?>
