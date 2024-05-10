<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

// Create instance of customer
$customer = new Customer($db);

// Check if ID is provided
$customer->id = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array('message' => 'ID not provided.')));

// Check if customer exists before deleting
if ($customer->read_single()) {
    if ($customer->delete()) {
        echo json_encode(array('message' => 'Customer deleted.'));
    } else {
        echo json_encode(array('message' => 'Customer not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'Customer with provided ID does not exist.'));
}
?>
