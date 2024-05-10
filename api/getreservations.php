<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$reservation = new Reservation($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $reservationDetails = $reservation->read();

    if ($reservationDetails) {
        $formattedReservations = array();
        while ($row = $reservationDetails->fetch(PDO::FETCH_ASSOC)) {
            $customerId = isset($row['customerId']) ? $row['customerId'] : "Customer ID not available";

            $formattedReservations[$row['reservationId']] = array(
                "reservationId" => $row['reservationId'],
                "customerId" => $customerId,
                "date" => $row['date'],
                "time" => $row['time'],
                "numberOfGuests" => $row['numberOfGuests'],
                "tableId" => $row['tableId'],
                "status" => $row['status']
            );
        }

        echo json_encode($formattedReservations);
    } else {
        echo json_encode(array('message' => 'No reservations found.'));
    }
}
?>
