<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$staffAccount = new StaffAccount($db);

$staffAccount->staffAccountId = isset($_GET['StaffAccountid']) ? $_GET['StaffAccountid'] : die(json_encode(array('message' => 'ID not provided.')));

// Check if staff account exists before deleting
if ($staffAccount->getAccountById($staffAccount->staffAccountId)) {
    if ($staffAccount->delete($staffAccount->staffAccountId)) {
        echo json_encode(array('message' => 'Staff account deleted.'));
    } else {
        echo json_encode(array('message' => 'Staff account not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'Staff account with provided ID does not exist.'));
}

?>
