<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

try {
    if (!isset($data->customerId) || !isset($data->time) || !isset($data->status) || !isset($data->date) || !isset($data->mealId) || !isset($data->TypeOfMeal) ||
        empty($data->customerId) || empty($data->time) || empty($data->status) || empty($data->date) || empty($data->mealId) || empty($data->TypeOfMeal)) {
        throw new Exception('Failed to create pre-order. Required fields are missing or invalid.');
    }

    $preOrder = new PreOrder($db);

    $preOrder->customerId = $data->customerId;
    $preOrder->time = $data->time;
    $preOrder->status = $data->status;
    $preOrder->date = $data->date;
    $preOrder->mealId = $data->mealId;
    $preOrder->TypeOfMeal = $data->TypeOfMeal;

    // Check if the meal exists
    if (!$preOrder->mealExists($preOrder->mealId)) {
        throw new Exception('Failed to create pre-order. Meal may not exist.');
    }

    // Check if the customer exists
    if (!$preOrder->customerExists($preOrder->customerId)) {
        throw new Exception('Failed to create pre-order. Customer may not exist.');
    }

    // Check if the pre-order was created successfully
    if ($preOrder->create()) {
        echo json_encode(array('message' => 'Pre-order created successfully.'));
    } else {
        throw new Exception('Failed to create pre-order.');
    }
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}
?>
