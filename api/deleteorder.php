<?php
include_once('../core/initialize.php');

$order = new Order($db);

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['orderId'])) {
        $order->orderId = $_GET['orderId'];

        if ($order->delete()) {
            echo json_encode(array('message' => 'Order deleted'));
        } else {
            echo json_encode(array('message' => 'Failed to delete order'));
        }
    } else {
            echo json_encode(array('message' => 'Order ID not provided'));
    }
}
?>
