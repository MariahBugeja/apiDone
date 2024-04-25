<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Initialize API
include_once('../core/initialize.php');

// Create instance of Recipe
$recipe = new Recipe($db);

// Get data from request body
$data = json_decode(file_get_contents('php://input'));

// Assign data to recipe properties
$recipe->recipeName = $data->recipeName;
$recipe->prepInstructions = $data->prepInstructions;
$recipe->staffId = $data->staffId;
$recipe->timePreparation = $data->timePreparation;
$recipe->timeCooking = $data->timeCooking;
$recipe->mealId = $data->mealId; 

// Attempt to create the recipe
if ($recipe->create()) {
    echo json_encode(array('message' => 'Recipe created.'));
} else {
    echo json_encode(array('message' => 'Recipe not created.'));
}

?>
