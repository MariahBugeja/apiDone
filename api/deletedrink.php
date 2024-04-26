<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

// Create instance of Drink
$drink = new Drink($db);

// Check if ID is provided
$drinkId = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array('message' => 'Drink ID not provided.')));

// Set the drink ID for deletion
$drink->drinkId = $drinkId;

// Check if drink exists before deleting
if ($drink->read_single()) {
    // Attempt to delete the drink
    if ($drink->delete()) {
        echo json_encode(array('message' => 'Drink deleted.'));
    } else {
        echo json_encode(array('message' => 'Drink not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'Drink with provided ID does not exist.'));
}
?>
