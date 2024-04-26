<?php
include_once('../core/initialize.php');

$preOrderItem = new PreOrderItem($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['preOrderId'])) {
        $preOrderItem->preOrderId = $_GET['preOrderId'];

        $result = $preOrderItem->read_by_preorder();

        if ($result->rowCount() > 0) {
            $preOrderItem_arr = array();
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $preOrderItem_item = array(
                    'preOrderItemId' => $preOrderItemId,
                    'preOrderId' => $preOrderId,
                    'MenuItemId' => $MenuItemId,
                    'quantity' => $quantity,
                    'specialRequest' => $specialRequest
                );
                array_push($preOrderItem_arr, $preOrderItem_item);
            }
            echo json_encode($preOrderItem_arr);
        } else {
            echo json_encode(array('message' => 'No PreOrder items found for this PreOrder.'));
        }
    } else {
        echo json_encode(array('message' => 'PreOrder ID not provided.'));
    }
}
?>
