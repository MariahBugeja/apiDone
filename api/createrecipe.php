<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

// Create instance of Recipe
$recipe = new Recipe($db);

// Get data from request body
$data = json_decode(file_get_contents('php://input'));

if (!isset($data->RecipeName) || !isset($data->prepInstructions) || !isset($data->timePreparation) || !isset($data->timeCooking) || !isset($data->mealId)) {
    echo json_encode(array('message' => 'Missing required fields.'));
    exit;
}

$recipe->RecipeName = $data->RecipeName;
$recipe->prepInstructions = $data->prepInstructions;
$recipe->StaffId = isset($data->StaffId) ? $data->StaffId : null; 
$recipe->timePreparation = $data->timePreparation;
$recipe->timeCooking = $data->timeCooking;
$recipe->mealId = $data->mealId;

// Attempt to create the recipe
if($recipe->create()) {
    echo json_encode(array('message' => 'Recipe created.'));
} else {
    echo json_encode(array('message' => 'Recipe not created.'));
}
?>
