<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$table = new RestaurantTable($db);
$data = json_decode(file_get_contents("php://input"));

$table->tableId = $data->tableId;
$table->tableNumber = $data->tableNumber;
$table->capacity = $data->capacity;

// Update the table
if ($table->update()) {
    echo json_encode(array('message' => 'Table updated.'));
} else {
    echo json_encode(array('message' => 'Table NOT updated.'));
}
?>
