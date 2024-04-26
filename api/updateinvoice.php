<?php
include_once('../core/initialize.php');

$invoice = new Invoice($db);
$data = json_decode(file_get_contents("php://input"));

$invoice->invoiceId = $data->invoiceId;
$invoice->orderId = $data->orderId;
$invoice->totalAmount = $data->totalAmount;
$invoice->paymentStatus = $data->paymentStatus;

// Update the invoice
if ($invoice->update()) {
    echo json_encode(array('message' => 'Invoice updated'));
} else {
    echo json_encode(array('message' => 'Failed to update invoice'));
}
?>
