<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');
include_once('../core/Staff.php'); 
// Create instance of staff
$staff = new Staff($db);

$data = json_decode(file_get_contents('php://input'));

// Assign data to staff properties
$staff->FirstName = $data->FirstName;
$staff->LastName = $data->LastName;
$staff->role = $data->role;
$staff->phone = $data->phone;
$staff->address = $data->address;

// Attempt to create the staff
if($staff->create()) {
    echo json_encode(array('message' => 'Staff created.'));
} else {
    echo json_encode(array('message' => 'Staff not created.'));
}
?>
