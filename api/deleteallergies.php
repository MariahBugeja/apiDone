<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$allergies = new Allergies($db);

$allergies->allergiesId = isset($_GET['allergiesId']) ? $_GET['allergiesId'] : die(json_encode(array('message' => 'Allergies ID not provided.')));

if ($allergies->read_single()) {
    if ($allergies->delete()) {
        echo json_encode(array('message' => 'Allergies deleted.'));
    } else {
        echo json_encode(array('message' => 'Allergies not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'Allergies with provided ID does not exist.'));
}
?>
