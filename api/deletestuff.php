<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');
include_once('../core/Staff.php'); 

$staff = new Staff($db);

// Check if ID is provided
$staff->staffId = isset($_GET['staffId']) ? $_GET['staffId'] : die(json_encode(array('message' => 'Staff ID not provided.')));

// Check if staff exists before deleting
if ($staff->read_single()) {
    if ($staff->delete()) {
        echo json_encode(array('message' => 'Staff deleted.'));
    } else {
        echo json_encode(array('message' => 'Staff not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'Staff with provided ID does not exist.'));
}
?>
