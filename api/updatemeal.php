<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$meal = new Meal($db);
$data = json_decode(file_get_contents("php://input"));

$meal->mealId = $data->mealId;
$meal->MealName = $data->MealName;
$meal->description = $data->description;
$meal->Price = $data->Price;

// Update the meal
if ($meal->update()) {
    echo json_encode(array('message' => 'Meal updated.'));
} else {
    echo json_encode(array('message' => 'Meal NOT updated.'));
}
?>
