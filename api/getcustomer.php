<?php

// Set endpoint headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Initialize API
include_once('../core/initialize.php');

// Create instance of customer
$Customer = new Customer($db);

$Customer->customerId = isset($_GET['customerId']) ? $_GET['customerId'] : die(json_encode(array('message' => 'Customer ID not provided.')));

// Read single customer
if ($Customer->read_single()) {
    // Customer information
    $Customer_info = array(
        'customerId' => $Customer->customerId,
        'FirstName' => $Customer->FirstName,
        'LastName' => $Customer->LastName,
        'email' => $Customer->Email,
        'phone' => $Customer->phone,
        'password' => $Customer->password
    );

    // Output customer information
    echo json_encode($Customer_info);
} else {
    // Customer not found
    echo json_encode(array('message' => 'Customer not found.'));
}
?>
