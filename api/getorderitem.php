<?php
include_once('../core/initialize.php');

$orderItem = new OrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['orderId'])) {
        $orderItem->orderId = $_GET['orderId'];

        $result = $orderItem->read();
        $num = $result->rowCount();

        // Check if any order items found
        if ($num > 0) {
            $orderItems_arr = array();
            $orderItems_arr['data'] = array();

            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $orderItem_item = array(
                    'orderItemId' => $orderItemId,
                    'orderId' => $orderId,
                    'mealId' => $mealId,
                    'drinkId' => $drinkId,
                    'quantity' => $quantity,
                    'specialRequest' => $specialRequest
                );
                array_push($orderItems_arr['data'], $orderItem_item);
            }
            echo json_encode($orderItems_arr);
        } else {
            // No order items found
            echo json_encode(array('message' => 'No order items found'));
        }
    } else {
        echo json_encode(array('message' => 'Order ID not provided'));
    }
}
?>
