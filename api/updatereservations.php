<?php
include_once('../core/initialize.php');

$reservation = new Reservation($db);
$data = json_decode(file_get_contents("php://input"));

$reservation->reservationId = $data->reservationId;
$reservation->customerId = $data->customerId;
$reservation->date = $data->date;
$reservation->time = $data->time;
$reservation->numberOfGuests = $data->numberOfGuests;
$reservation->status = $data->status;
$reservation->mealId = $data->mealId;

// Update the reservation
if ($reservation->update()) {
    echo json_encode(array('message' => 'Reservation updated'));
} else {
    echo json_encode(array('message' => 'Failed to update reservation'));
}
?>
