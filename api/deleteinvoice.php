<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

if (!isset($_GET['invoiceId'])) {
    echo json_encode(array('message' => 'Failed to delete invoice. Invoice ID is missing.'));
    exit;
}

$invoiceId = $_GET['invoiceId'];

$invoice = new Invoice($db);

// Assign the invoiceId to the Invoice object
$invoice->invoiceId = $invoiceId;

// Attempt to delete the invoice
if ($invoice->delete()) {
    echo json_encode(array('message' => 'Invoice deleted successfully.'));
} else {
    echo json_encode(array('message' => 'Failed to delete invoice.'));
}

?>
