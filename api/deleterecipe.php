<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once('../core/initialize.php');

// Create instance of Recipe
$recipe = new Recipe($db);

// Check if ID is provided
$recipe->recipeId = isset($_GET['id']) ? $_GET['id'] : die(json_encode(array('message' => 'ID not provided.')));

// Check if recipe exists before deleting
if ($recipe->read_single()) {
    if ($recipe->delete()) {
        echo json_encode(array('message' => 'Recipe deleted.'));
    } else {
        echo json_encode(array('message' => 'Recipe not deleted.'));
    }
} else {
    echo json_encode(array('message' => 'Recipe with provided ID does not exist.'));
}
?>
