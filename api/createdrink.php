<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$drink = new Drink($db);

$data = json_decode(file_get_contents('php://input'));

// Assign data to drink properties
$drink->Name = $data->Name;
$drink->Price = $data->Price;

// Attempt to create the drink
if ($drink->create()) {
    echo json_encode(array('message' => 'Drink created.'));
} else {
    echo json_encode(array('message' => 'Drink not created.'));
}

?>
