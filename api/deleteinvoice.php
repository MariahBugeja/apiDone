<?php
include_once('../core/initialize.php');

$invoice = new Invoice($db);
$data = json_decode(file_get_contents("php://input"));

// Set invoice ID to be deleted
$invoice->invoiceId = $data->invoiceId;

// Delete the invoice
if ($invoice->delete()) {
    echo json_encode(array('message' => 'Invoice deleted'));
} else {
    echo json_encode(array('message' => 'Failed to delete invoice'));
}
?>
