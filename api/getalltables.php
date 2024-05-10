<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

try {
    if (!isset($db)) {
        throw new Exception('Database connection is not available.');
    }

    $query = 'SELECT * FROM RestaurantTable';
    $stmt = $db->prepare($query);
    $stmt->execute();

    $tables = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($tables);
} catch (Exception $e) {
    echo json_encode(array('message' => $e->getMessage()));
}

?>
