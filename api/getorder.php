<?php
include_once('../core/initialize.php');

$order = new Order($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['orderId'])) {
        $order->orderId = $_GET['orderId'];

        if ($order->read_single()) {
            echo json_encode(array(
                'orderId' => $order->orderId,
                'tableId' => $order->tableId,
                'orderDateTime' => $order->orderDateTime,
                'status' => $order->status
            ));
        } else {
            echo json_encode(array('message' => 'Order not found'));
        }
    } else {
        echo json_encode(array('message' => 'Order ID not provided'));
    }
}
?>
