<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PATCH');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

if (!isset($data->reservationId) || !isset($data->status)) {
    echo json_encode(array('message' => 'Failed to update reservation. Reservation ID and status are required.'));
    exit;
}

$reservation = new Reservation($db);
$reservation->reservationId = $data->reservationId;

// Check if the reservation exists
if (!$reservation->read_single()) {
    echo json_encode(array('message' => 'Failed to update reservation. Reservation not found.'));
    exit;
}

// Update status only
$reservation->status = $data->status;

if ($reservation->updateStatus()) {
    echo json_encode(array('message' => 'Reservation status updated successfully.'));
} else {
    echo json_encode(array('message' => 'Failed to update reservation status.'));
}
?>
