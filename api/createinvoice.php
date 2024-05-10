<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

if (!isset($data->orderId) || !isset($data->Totalammount) || !isset($data->PaymentStatus)) {
    echo json_encode(array('message' => 'Failed to create invoice. Required fields are missing.'));
    exit;
}

$validPaymentStatuses = array("Cash", "Card");
if (!in_array($data->PaymentStatus, $validPaymentStatuses)) {
    echo json_encode(array('message' => 'Failed to create invoice. Invalid PaymentStatus.'));
    exit;
}

$invoice = new Invoice($db);

$invoice->orderId = $data->orderId;
$invoice->Totalammount = $data->Totalammount;
$invoice->PaymentStatus = $data->PaymentStatus;

// Check if the order exists before creating the invoice
if (!$invoice->create()) {
    echo json_encode(array('message' => 'Failed to create invoice. Order may not exist.'));
    exit; 
}

// Invoice created successfully
echo json_encode(array('message' => 'Invoice created successfully.'));

?>
