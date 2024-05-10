<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: GET');

include_once('../core/initialize.php');
include_once('../core/staffshift.php');

$staffShift = new StaffShift($db);

$result = $staffShift->read();

// Check if any staff shifts were found
if ($result->rowCount() > 0) {
    // Staff shifts array
    $staffShifts_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $staffShift_item = array(
            'staffshiftId' => $staffshiftId,
            'staffId' => $staffId,
            'start' => $start,
            'finish' => $finish,
            'shiftType' => isset($shiftType) ? $shiftType : null
        );

        array_push($staffShifts_arr, $staffShift_item);
    }

    echo json_encode($staffShifts_arr);
} else {
    // No staff shifts found
    echo json_encode(
        array('message' => 'No staff shifts found.')
    );
}

?>
