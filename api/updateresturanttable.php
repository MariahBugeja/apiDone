<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

try {
    $tableId = isset($_GET['tableId']) ? intval($_GET['tableId']) : null;

    $data = json_decode(file_get_contents('php://input'));

    // Check if required fields are there
    if (!$tableId || !isset($data->tableNumber) || !isset($data->capacity)) {
        throw new Exception('Failed to update table. Required fields are missing.');
    }

    // Update the table details
    $tableNumber = $data->tableNumber;
    $capacity = $data->capacity;

    $query = 'UPDATE RestaurantTable SET tableNumber = :tableNumber, capacity = :capacity WHERE tableId = :tableId';
    $stmt = $db->prepare($query);

    $stmt->bindParam(':tableNumber', $tableNumber);
    $stmt->bindParam(':capacity', $capacity);
    $stmt->bindParam(':tableId', $tableId);

    if ($stmt->execute()) {
        echo json_encode(array('message' => 'Table updated successfully.'));
    } else {
        throw new Exception('Failed to update table.');
    }
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}

?>
