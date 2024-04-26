<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');
include_once('../core/staffshift.php');

// Create instance of StaffShift
$staffShift = new StaffShift($db);

$data = json_decode(file_get_contents('php://input'));

$staffShift->staffShiftId = $data->staffShiftId; 
$staffShift->staffId = $data->staffId;
$staffShift->start = $data->start;
$staffShift->finish = $data->finish;
$staffShift->shiftType = $data->shiftType;

// Attempt to update the staff shift
if ($staffShift->update()) {
    echo json_encode(array('message' => 'Staff shift updated.'));
} else {
    echo json_encode(array('message' => 'Staff shift not updated.'));
}

?>
