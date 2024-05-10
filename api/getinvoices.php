<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$invoice = new Invoice($db);

$invoices = $invoice->getInvoices();

// Check if there are any invoices
if (count($invoices) > 0) {
    echo json_encode($invoices);
} else {
    // Output message if no invoices found
    echo json_encode(array('message' => 'No invoices found.'));
}
?>
