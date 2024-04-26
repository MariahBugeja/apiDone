<?php
include_once('../core/initialize.php');

$table = new RestaurantTable($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $table->tableId = isset($_GET['tableId']) ? $_GET['tableId'] : die();

    if ($table->read_single()) {
        $table_item = array(
            'tableId' => $table->tableId,
            'tableNumber' => $table->tableNumber,
            'capacity' => $table->capacity
        );

        echo json_encode($table_item);
    } else {
        echo json_encode(array('message' => 'Table not found'));
    }
}
?>
