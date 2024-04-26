<?php
include_once('../core/initialize.php');

$orderItem = new OrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    if (isset($_GET['orderItemId'])) {
        $orderItem->orderItemId = $_GET['orderItemId'];

        if ($orderItem->delete()) {
            // Order item deleted successfully
            echo json_encode(array('message' => 'Order item deleted'));
        } else {
            // Failed to delete order item
            echo json_encode(array('message' => 'Failed to delete order item'));
        }
    } else {
        echo json_encode(array('message' => 'Order item ID not provided'));
    }
}
?>
