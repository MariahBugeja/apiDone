<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php'); 

// Instantiate Customer object
$customer = new Customer($db);
$data = json_decode(file_get_contents("php://input"));

// Set properties of the customer object
$customer->customerId = $data->customerId;
$customer->FirstName = $data->FirstName;
$customer->LastName = $data->LastName;
$customer->Email = $data->Email;
$customer->phone = $data->phone;
$customer->password = $data->password;

// Update the customer
if($customer->update()){
    echo json_encode(array('message'=>'User updated.'));
} else {
    echo json_encode(array('message'=>'User NOT updated.'));
}
?>