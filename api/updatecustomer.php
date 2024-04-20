<?php

// set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// initialize API
include_once('../core/initialize.php');

// create instance of Customer
$customer = new Customer($db);


// get data from request body
$data = json_decode(file_get_contents('php://input'));

// set properties for update
$customer->id = isset($data->id) ? $data->id : null;
$customer->FirstName = isset($data->FirstName) ? $data->FirstName : null;
$customer->LastName = isset($data->LastName) ? $data->LastName : null;
$customer->Email = isset($data->Email) ? $data->Email : null;
$customer->phone = isset($data->phone) ? $data->phone : null;
$customer->password = isset($data->password) ? $data->password : null;

// attempt to update customer
if ($customer->update()) {
    echo json_encode(array('message' => 'Customer updated.'));
} else {
    echo json_encode(array('message' => 'Customer not updated.'));
}