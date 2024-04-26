<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

// Create instance of Meal
$meal = new Meal($db);

// Check if ID is provided
$meal->mealId = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array('message' => 'Meal ID not provided.')));

// Check if meal exists before deleting
if ($meal->read_single()) {
    // Attempt to delete the meal
    if ($meal->delete()) {
        echo json_encode(array('message' => 'Meal deleted.'));
    } else {
        echo json_encode(array('message' => 'Meal not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'Meal with provided ID does not exist.'));
}

?>
