<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

try {
    $tableId = isset($_GET['tableId']) ? intval($_GET['tableId']) : null;

    if (!$tableId) {
        throw new Exception('Invalid tableId.');
    }

    $query = 'SELECT * FROM RestaurantTable WHERE tableId = :tableId';
    $stmt = $db->prepare($query);
    $stmt->bindParam(':tableId', $tableId);
    $stmt->execute();

    // Check if a table with the given tableId exists
    if ($stmt->rowCount() === 0) {
        throw new Exception('Table with the provided tableId does not exist.');
    }

    $table = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($table);
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}

?>
