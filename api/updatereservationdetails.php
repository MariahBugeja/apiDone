<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$reservationDetail = new ReservationDetail($db);
$data = json_decode(file_get_contents("php://input"));

$reservationDetail->reservationDetailId = $data->reservationDetailId;
$reservationDetail->mealId = $data->mealId;
$reservationDetail->quantity = $data->quantity;
$reservationDetail->reservationId = $data->reservationId;

// Update the reservation detail
if ($reservationDetail->update()) {
    echo json_encode(array('message' => 'Reservation detail updated.'));
} else {
    echo json_encode(array('message' => 'Reservation detail NOT updated.'));
}
?>
