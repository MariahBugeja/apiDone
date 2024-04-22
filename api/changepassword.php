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

// Output received data for inspection
echo json_encode($data);
exit;

// check if required fields are provided
if (!isset($data->CustomerId) || !isset($data->oldPassword) || !isset($data->newPassword)) {
    echo json_encode(array('message' => 'Incomplete data provided.'));
    exit;
}

// set properties for change password
$customer->CustomerId = $data->CustomerId;
$oldPassword = $data->oldPassword; // old password
$newPassword = $data->newPassword; // new password

// verify old password
if ($customer->read_single()) {
    // old password matches, proceed with changing the password
    if (password_verify($oldPassword, $customer->password)) {
        // Old password verification successful, change the password
        if ($customer->changePassword($newPassword)) {
            echo json_encode(array('message' => 'Password changed successfully.'));
        } else {
            echo json_encode(array('message' => 'Failed to change password.'));
        }
    } else {
        // Old password verification failed
        echo json_encode(array('message' => 'Old password is incorrect.'));
    }
} else {
    // User not found
    echo json_encode(array('message' => 'User not found.'));
}

// Error handling
if ($error = $db->errorInfo()) {
    echo json_encode(array('error' => $error));
}

?>
