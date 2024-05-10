<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$Customer = new Customer($db);

$Customer->customerId = isset($_GET['customerId']) ? $_GET['customerId'] : die(json_encode(array('message' => 'Customer ID not provided.')));

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
