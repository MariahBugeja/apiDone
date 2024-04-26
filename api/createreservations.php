<?php
include_once('../core/initialize.php');

$reservation = new Reservation($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $reservation->customerId = $data->customerId;
    $reservation->date = $data->date;
    $reservation->time = $data->time;
    $reservation->numberOfGuests = $data->numberOfGuests;
    $reservation->status = $data->status;
    $reservation->mealId = $data->mealId;

    // Create reservation
    if ($reservation->create()) {
        echo json_encode(array('message' => 'Reservation created'));
    } else {
        echo json_encode(array('message' => 'Failed to create reservation'));
    }
}
?>
