<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

if (!isset($_GET['staffAccountId'])) {
    echo json_encode(array('message' => 'Missing staffAccountId parameter'));
    exit;
}

$staffAccountId = $_GET['staffAccountId'];

$staffAccount = new StaffAccount($db);

// Get details of the staff account by ID
$staffAccountDetails = $staffAccount->getAccountById($staffAccountId);

// Check if the staff account details are found
if ($staffAccountDetails) {
    echo json_encode($staffAccountDetails);
} else {
    echo json_encode(array('message' => 'Staff account not found'));
}
?>
