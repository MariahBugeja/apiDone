<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

// Instantiate Drink object
$drink = new Drink($db);
$data = json_decode(file_get_contents("php://input"));

// Set properties of the drink object
$drink->drinkId = $data->drinkId;
$drink->Name = $data->Name;
$drink->Price = $data->Price;

// Update the drink
$result = $drink->update();
if ($result === true) {
    echo json_encode(array('message' => 'Drink updated.'));
} elseif ($result === false) {
    echo json_encode(array('message' => 'Drink NOT updated.'));
} else {
    echo $result; 
}

?>
