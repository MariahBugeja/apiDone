<?php
include_once('../core/initialize.php');

$table = new RestaurantTable($db);

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));

    $table->tableId = $data->tableId;

    // Delete the table
    if ($table->delete()) {
        echo json_encode(array('message' => 'Table deleted'));
    } else {
        echo json_encode(array('message' => 'Failed to delete table'));
    }
}
?>
