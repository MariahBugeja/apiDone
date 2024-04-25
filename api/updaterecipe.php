<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

// Instantiate Recipe object
$recipe = new Recipe($db);
$data = json_decode(file_get_contents("php://input"));

// Set properties of the recipe object
$recipe->recipeId = $data->recipeId;
$recipe->RecipeName = $data->recipeName;
$recipe->prepInstructions = $data->prepInstructions;
$recipe->timePreparation = $data->timePreparation;
$recipe->timeCooking = $data->timeCooking;
$recipe->mealId = $data->mealId;

// Check if StaffId is provided and not empty
if (isset($data->staffId) && !empty($data->staffId)) {
    $recipe->StaffId = $data->staffId;
} else {
    $recipe->StaffId = null; 
}

// Update the recipe
if ($recipe->update()) {
    echo json_encode(array('message' => 'Recipe updated.'));
} else {
    echo json_encode(array('message' => 'Recipe NOT updated.'));
}
?>
