<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

try {
    $tableId = isset($_GET['tableId']) ? intval($_GET['tableId']) : null;

    // Check if tableId is valid
    if (!$tableId) {
        throw new Exception('Invalid tableId.');
    }

    // Check if the table with the given tableId exists
    $query_check = 'SELECT * FROM RestaurantTable WHERE tableId = :tableId';
    $stmt_check = $db->prepare($query_check);
    $stmt_check->bindParam(':tableId', $tableId);
    $stmt_check->execute();

    if ($stmt_check->rowCount() === 0) {
        throw new Exception('Table with the provided tableId does not exist.');
    }

    // Check if there are any related records in the reservationtable
    $query_related = 'SELECT * FROM reservationtable WHERE tableId = :tableId';
    $stmt_related = $db->prepare($query_related);
    $stmt_related->bindParam(':tableId', $tableId);
    $stmt_related->execute();

    if ($stmt_related->rowCount() > 0) {
        throw new Exception('Cannot delete table. There are reservations associated with it.');
    }

    $query_delete = 'DELETE FROM RestaurantTable WHERE tableId = :tableId';
    $stmt_delete = $db->prepare($query_delete);
    $stmt_delete->bindParam(':tableId', $tableId);

    if ($stmt_delete->execute()) {
        echo json_encode(array('message' => 'Table deleted successfully.'));
    } else {
        throw new Exception('Failed to delete table.');
    }
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}

?>
