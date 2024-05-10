<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$reservationId = isset($_GET['reservationId']) ? $_GET['reservationId'] : null;

if (!$reservationId) {
    echo json_encode(array('message' => 'Reservation ID is required.'));
    exit;
}

$reservation = new Reservation($db);
$reservation->reservationId = $reservationId;

if ($reservation->read_single()) {
    echo json_encode($reservation);
} else {
    echo json_encode(array('message' => 'Reservation not found.'));
}
?>
