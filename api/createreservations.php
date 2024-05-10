<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

if (!isset($data->customerId) || !isset($data->date) || !isset($data->time) || !isset($data->numberOfGuests) || !isset($data->tableId)) {
    echo json_encode(array('message' => 'Failed to create reservation. Required fields are missing.'));
    exit;
}

// Define allowed statuses
$allowedStatuses = array("pending");

// Set default status
$defaultStatus = "pending";

$reservation = new Reservation($db);

$reservation->customerId = $data->customerId;
$reservation->date = $data->date;
$reservation->time = $data->time;
$reservation->numberOfGuests = $data->numberOfGuests;
$reservation->tableId = $data->tableId;
$reservation->status = $defaultStatus; 

// Check if the provided tableId exists in the RestaurantTable table
$query = 'SELECT COUNT(*) as count FROM RestaurantTable WHERE tableId = ?';
$stmt = $db->prepare($query);
$stmt->bindParam(1, $data->tableId);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row['count'] == 0) {
    echo json_encode(array('message' => 'Failed to create reservation. Invalid tableId.'));
    exit;
}

// Check if the customer exists before creating the reservation
if (!$reservation->create()) {
    echo json_encode(array('message' => 'Failed to create reservation. Customer may not exist.'));
    exit; 
}

// Reservation created successfully
echo json_encode(array('message' => 'Reservation created successfully.'));
?>
