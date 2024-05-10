<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

if (!isset($data->staffId) || !isset($data->email) || !isset($data->password)) {
    echo json_encode(array('message' => 'Failed to create staff account. Required fields are missing.'));
    exit;
}

$staffAccount = new StaffAccount($db);

$staffAccount->staffId = $data->staffId;
$staffAccount->email = $data->email;
$staffAccount->password = $data->password;

// Create the staff account
if ($staffAccount->create()) {
    echo json_encode(array('message' => 'Staff account created successfully.'));
} else {
    echo json_encode(array('message' => 'Failed to create staff account.'));
}

?>
