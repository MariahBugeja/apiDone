<?php
include_once('../core/initialize.php');

$reservation = new Reservation($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['reservationId'])) {
        $reservation->reservationId = $_GET['reservationId'];

        if ($reservation->read_single()) {
            echo json_encode(array(
                'reservationId' => $reservation->reservationId,
                'customerId' => $reservation->customerId,
                'date' => $reservation->date,
                'time' => $reservation->time,
                'numberOfGuests' => $reservation->numberOfGuests,
                'status' => $reservation->status,
                'mealId' => $reservation->mealId
            ));
        } else {
            echo json_encode(array('message' => 'Reservation not found'));
        }
    } else {
        echo json_encode(array('message' => 'Reservation ID not provided'));
    }
}
?>
