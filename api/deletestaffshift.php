<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');
include_once('../core/staffshift.php');

$staffShift = new StaffShift($db);

$staffShift->staffShiftId = isset($_GET['staffShiftId']) ? $_GET['staffShiftId'] : die(json_encode(array('message' => 'Staff Shift ID not provided.')));

// Check if staff shift exists before deleting
if ($staffShift->read_single()) {
    // Attempt to delete the staff shift
    if ($staffShift->delete()) {
        echo json_encode(array('message' => 'Staff shift deleted.'));
    } else {
        echo json_encode(array('message' => 'Staff shift not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'Staff shift with provided ID does not exist.'));
}
?>
