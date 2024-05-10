<?php
include_once('../core/initialize.php');

$invoice = new Invoice($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['invoiceId'])) {
        $invoice->invoiceId = $_GET['invoiceId'];

        if ($invoice->read_single()) {
            echo json_encode(array(
                'invoiceId' => $invoice->invoiceId,
                'orderId' => $invoice->orderId,
                'totalAmount' => $invoice->Totalammount, 
                'paymentStatus' => $invoice->PaymentStatus 
            ));
        } else {
            echo json_encode(array('message' => 'Invoice not found'));
        }
    } else {
        echo json_encode(array('message' => 'Invoice ID not provided'));
    }
}
?>
