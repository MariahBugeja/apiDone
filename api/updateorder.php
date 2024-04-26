<?php
include_once('../core/initialize.php');

$order = new Order($db);

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));

    // Make sure all required fields are present in the request data
    if (isset($data->orderId) && isset($data->tableId) && isset($data->status)) {
        $order->orderId = $data->orderId;
        $order->tableId = $data->tableId;
        $order->status = $data->status;
        $order->orderDateTime = date('Y-m-d H:i:s');

        // Update the order
        if ($order->update()) {
            echo json_encode(array('message' => 'Order updated'));
        } else {
            echo json_encode(array('message' => 'Failed to update order'));
        }
    } else {
        echo json_encode(array('message' => 'Missing required fields in request data'));
    }
}
?>
