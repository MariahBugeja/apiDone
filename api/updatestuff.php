<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php'); 
include_once('../core/Staff.php'); 

// Instantiate Staff object
$staff = new Staff($db);
$data = json_decode(file_get_contents("php://input"));

// Set properties of the staff object
$staff->staffId = $data->staffId;
$staff->FirstName = $data->FirstName;
$staff->LastName = $data->LastName;
$staff->role = $data->role;
$staff->phone = $data->phone;
$staff->address = $data->address;

// Update the staff
if($staff->update()){
    echo json_encode(array('message'=>'Staff updated.'));
} else {
    echo json_encode(array('message'=>'Staff NOT updated.'));
}
?>
