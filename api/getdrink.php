<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$drink = new Drink($db);

$drink->drinkId = isset($_GET['drinkId']) ? $_GET['drinkId'] : die(json_encode(array('message' => 'Drink ID not provided.')));

// Attempt to read the single drink
if ($drink->read_single()) {
    // Create array to hold the drink data
    $drink_arr = array(
        'drinkId' => $drink->drinkId,
        'Name' => $drink->Name,
        'Price' => $drink->Price
    );

    // Output the drink data in JSON format
    echo json_encode($drink_arr);
} else {
    // If drink with the provided ID doesn't exist, return an error message
    echo json_encode(array('message' => 'Drink with provided ID does not exist.'));
}

?>
