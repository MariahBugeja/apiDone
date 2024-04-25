<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php'); 

// Instantiate Customer object
$recipe = new Recipe($db);
$data = json_decode(file_get_contents("php://input"));

// Set properties of the recipe object
$recipe->recipeId = $data->recipeId;
$recipe->recipeName = $data->recipeName;
$recipe->prepInstructions = $data->prepInstructions;
$recipe->staffId = $data->staffId;
$recipe->timePreparation = $data->timePreparation;
$recipe->timeCooking = $data->timeCooking;
$recipe->mealId = $data->mealId; 

// Update the customer
if($recipe->update()){
    echo json_encode(array('message'=>'recipe updated.'));
} else {
    echo json_encode(array('message'=>'recipe NOT updated.'));
}
?>