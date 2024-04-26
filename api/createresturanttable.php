<?php
include_once('../core/initialize.php');

$table = new RestaurantTable($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $table->tableNumber = $data->tableNumber;
    $table->capacity = $data->capacity;

    // Create table
    if ($table->create()) {
        echo json_encode(array('message' => 'Table created'));
    } else {
        echo json_encode(array('message' => 'Failed to create table'));
    }
}
?>
