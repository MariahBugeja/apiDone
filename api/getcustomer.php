<?php

//set endpoint headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//initialize Api
include_once('../core/initialize.php');

//create instance of user
$Customer = new Customer($db);

$Customer->id = isset($_GET['customerId']) ? $_GET['customerId'] : die();

$Customer->read_single();

$Customer_info = array(
    'customerId'  => $Customer->id,
    'FirstName'  => $Customer->FirstName,
    'LastName'  => $Customer->LastName,
    'email'     => $Customer->Email,
    'phone'     => $Customer->phone,
    'password'  => $Customer->password
);

print_r(json_encode($Customer_info));