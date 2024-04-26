<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$meal = new Meal($db);

// Check if mealId is provided
$meal->mealId = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array('message' => 'Meal ID not provided.')));

// Read single meal
if ($meal->read_single()) {
    // Meal information
    $meal_info = array(
        'mealId' => $meal->mealId,
        'mealName' => $meal->MealName,
        'description' => $meal->description,
        'price' => $meal->Price
    );

    echo json_encode($meal_info);
} else {
    // Meal not found
    echo json_encode(array('message' => 'Meal not found.'));
}
?>
