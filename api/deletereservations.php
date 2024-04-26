<?php
include_once('../core/initialize.php');

$reservation = new Reservation($db);
$data = json_decode(file_get_contents("php://input"));

$reservation->reservationId = $data->reservationId;

// Delete the reservation
if ($reservation->delete()) {
    echo json_encode(array('message' => 'Reservation deleted'));
} else {
    echo json_encode(array('message' => 'Failed to delete reservation'));
}
?>
