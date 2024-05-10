<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

if (!isset($data->invoiceId) || !isset($data->Totalammount) || !isset($data->PaymentStatus)) {
    echo json_encode(array('message' => 'Failed to update invoice. Required fields are missing.'));
    exit;
}

// Create an instance of the Invoice class
$invoice = new Invoice($db);

$invoice->invoiceId = $data->invoiceId;
$invoice->Totalammount = $data->Totalammount;
$invoice->PaymentStatus = $data->PaymentStatus;

// Update the invoice
if ($invoice->update()) {
    echo json_encode(array('message' => 'Invoice updated successfully.'));
} else {
    echo json_encode(array('message' => 'Failed to update invoice.'));
}

?>
