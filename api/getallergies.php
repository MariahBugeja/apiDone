<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$allergies = new Allergies($db);

$result = $allergies->read();

$num = $result->rowCount();

if ($num > 0) {
    $allergies_list = array();
    $allergies_list['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $allergies_item = array(
            'allergiesId' => $allergiesId,
            'allergyinfo' => $allergyinfo,
            'mealId'      => $mealId
        );

        array_push($allergies_list['data'], $allergies_item);
    }
    echo json_encode($allergies_list);
} else {
    echo json_encode(array('message' => 'No allergies found.'));
}
?>
