<?php
include_once('../core/initialize.php');

$reservationDetail = new ReservationDetail($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));

    $reservationDetail->mealId = $data->mealId;
    $reservationDetail->quantity = $data->quantity;
    $reservationDetail->reservationId = $data->reservationId;

    // Create reservation detail
    if ($reservationDetail->create()) {
        echo json_encode(array('message' => 'Reservation detail created'));
    } else {
        echo json_encode(array('message' => 'Failed to create reservation detail'));
    }
}
?>
