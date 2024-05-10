<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$allergies = new Allergies($db);

$allergies->allergiesId = isset($_GET['allergiesId']) ? $_GET['allergiesId'] : die(json_encode(array('message' => 'Allergies ID not provided.')));

if ($allergies->read_single()) {
    $allergy_arr = array(
        'allergiesId' => $allergies->allergiesId,
        'allergyinfo' => $allergies->allergyinfo,
        'mealId' => $allergies->mealId
    );

    echo json_encode($allergy_arr);
} else {
    echo json_encode(array('message' => 'Allergy with provided ID does not exist.'));
}

?>
