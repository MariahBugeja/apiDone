<?php
include_once('../core/initialize.php');

$reservationDetail = new ReservationDetail($db);

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));

    $reservationDetail->reservationDetailId = $data->reservationDetailId;

    // Delete the reservation detail
    if ($reservationDetail->delete()) {
        echo json_encode(array('message' => 'Reservation detail deleted'));
    } else {
        echo json_encode(array('message' => 'Failed to delete reservation detail'));
    }
}
?>
