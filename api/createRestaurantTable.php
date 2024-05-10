<?php
include_once('../core/initialize.php');

$table = new RestaurantTable($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'));

    $table->tableNumber = $data->tableNumber;
    $table->capacity = $data->capacity;

    if ($table->createTable()) {
        // Table created successfully
        echo json_encode(array('message' => 'Table created.'));
    } else {
        // Failed to create table
        echo json_encode(array('message' => 'Failed to create table.'));
    }
}
?>
