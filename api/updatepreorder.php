<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

try {
    $preOrderId = isset($_GET['preOrderId']) ? $_GET['preOrderId'] : null;

    $data = json_decode(file_get_contents('php://input'));
    if (!$preOrderId || !isset($data->status)) {
        throw new Exception('Failed to update pre-order status. Required fields are missing.');
    }

    // Update the status 
    $status = $data->status;

    $query = 'UPDATE preOrder SET status = :status WHERE preOrderId = :preOrderId';
    $stmt = $db->prepare($query);

    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':preOrderId', $preOrderId);

    if ($stmt->execute()) {
        echo json_encode(array('message' => 'Pre-order status updated successfully.'));
    } else {
        throw new Exception('Failed to update pre-order status.');
    }
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}

?>
