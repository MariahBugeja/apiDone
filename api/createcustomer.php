<?php

//set endpoint headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
//initialize Api
include_once('../core/initialize.php');

//create instance of user
$user = new Customer($db);

$data = json_decode(file_get_contents('php://input'));
$customer = new Customer($db);

// get data from request body
$data = json_decode(file_get_contents('php://input'));

// assign data to customer properties
$customer->FirstName = $data->FirstName;
$customer->LastName = $data->LastName;
$customer->Email = $data->Email;
$customer->phone = $data->phone;
$customer->password = $data->password;

// attempt to create the customer
if($customer->create()) {
    echo json_encode(array('message' => 'Customer created.'));
} else {
    echo json_encode(array('message' => 'Customer not created.'));
}
?>