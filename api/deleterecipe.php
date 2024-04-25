<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Initialize API
include_once('../core/initialize.php');

// Create instance of customer
$recipe = new Recipe($db);

// Check if ID is provided
$recipe->id = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array('message' => 'ID not provided.')));

// Check if customer exists before deleting
if ($recipe->read_single()) {
    if ($recipe->delete()) {
        echo json_encode(array('message' => 'recipe deleted.'));
    } else {
        echo json_encode(array('message' => 'recipe not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'recipe with provided ID does not exist.'));
}
?>
