<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

if (!isset($data->allergyinfo) || !isset($data->mealId)) {
    echo json_encode(array('message' => 'Failed to create allergy. Required fields are missing.'));
    exit;
}

$allergy = new Allergies($db);

$allergy->allergyinfo = $data->allergyinfo;
$allergy->mealId = $data->mealId;

if (!$allergy->create()) {
    echo json_encode(array('message' => 'Failed to create allergy. Meal may not exist.'));
    exit; 
}

echo json_encode(array('message' => 'Allergy created successfully.'));

?>
