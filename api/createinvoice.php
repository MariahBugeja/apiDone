<?php
include_once('../core/initialize.php');

$invoice = new Invoice($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $invoice->orderId = $data->orderId;
    $invoice->totalAmount = $data->totalAmount;
    $invoice->paymentStatus = $data->paymentStatus;

    // Create invoice
    if ($invoice->create()) {
        echo json_encode(array('message' => 'Invoice created'));
    } else {
        echo json_encode(array('message' => 'Failed to create invoice'));
    }
}
?>
