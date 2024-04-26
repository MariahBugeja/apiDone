<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$meal = new Meal($db);

$data = json_decode(file_get_contents('php://input'));

if (!isset($data->MealName) || !isset($data->description) || !isset($data->Price)) {
    echo json_encode(array('message' => 'Missing required fields.'));
    exit;
}

// Assign data to meal properties
$meal->MealName = $data->MealName;
$meal->description = $data->description;
$meal->Price = $data->Price;

// Attempt to create the meal
if ($meal->create()) {
    echo json_encode(array('message' => 'Meal created.'));
} else {
    echo json_encode(array('message' => 'Meal not created.'));
}

?>
