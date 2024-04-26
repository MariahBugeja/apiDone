<?php
include_once('../core/initialize.php');

$order = new Order($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $order->tableId = $data->tableId;
    $order->status = $data->status;
    $order->orderDateTime = date('Y-m-d H:i:s');

    // Create order
    if ($order->create()) {
        echo json_encode(array('message' => 'Order created.'));
    } else {
        echo json_encode(array('message' => 'Failed to create order.'));
    }
}
?>
