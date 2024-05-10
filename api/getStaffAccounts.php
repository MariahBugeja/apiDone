<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$staffAccount = new StaffAccount($db);

$staffAccounts = $staffAccount->getAllAccounts();

if ($staffAccounts) {
    echo json_encode($staffAccounts);
} else {
    echo json_encode(array('message' => 'No staff accounts found'));
}
?>
