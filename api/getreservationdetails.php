<?php
include_once('../core/initialize.php');

$reservationDetail = new ReservationDetail($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $reservationDetail->read();
    $num = $stmt->rowCount();

    if ($num > 0) {
        $reservationDetails_arr = array();
        $reservationDetails_arr['data'] = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $reservationDetail_item = array(
                'reservationDetailId' => $reservationDetailId,
                'mealId' => $mealId,
                'quantity' => $quantity,
                'reservationId' => $reservationId
            );

            array_push($reservationDetails_arr['data'], $reservationDetail_item);
        }

        echo json_encode($reservationDetails_arr);
    } else {
        echo json_encode(array('message' => 'No reservation details found'));
    }
}
?>
