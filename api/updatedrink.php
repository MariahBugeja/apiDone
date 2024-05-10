<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$drink = new Drink($db);
$data = json_decode(file_get_contents("php://input"));

$drink->drinkId = $data->drinkId;
$drink->Name = $data->Name;
$drink->Price = $data->Price;

// Update the drink
$result = $drink->update();
if (is_string($result)) {
    echo $result;
} else {
    if ($result === true) {
        echo json_encode(array('message' => 'Drink updated.'));
    } else {
        echo json_encode(array('message' => 'Drink NOT updated.'));
    }
}

?>
