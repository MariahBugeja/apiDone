<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');
include_once('../core/staffshift.php');

$staffShift = new StaffShift($db);

$data = json_decode(file_get_contents('php://input'));

// Assign data to staff shift properties
$staffShift->staffId = $data->staffId;
$staffShift->start = $data->start;
$staffShift->finish = $data->finish;
$staffShift->shiftType = $data->shiftType;

// Attempt to create the staff shift
if ($staffShift->create()) {
    echo json_encode(array('message' => 'Staff shift created.'));
} else {
    echo json_encode(array('message' => 'Staff shift not created.'));
}

?>
