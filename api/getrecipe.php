<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$recipe = new Recipe($db);

// Check if recipeId is provided
$recipe->recipeId = isset($_GET['recipeId']) ? $_GET['recipeId'] : die(json_encode(array('message' => 'Recipe ID not provided.')));

// Read single recipe
if ($recipe->read_single()) {
    // Recipe information
    $recipe_info = array(
        'recipeId' => $recipe->recipeId,
        'recipeName' => $recipe->RecipeName,
        'staffId' => $recipe->StaffId, 
        'timePreparation' => $recipe->timePreparation,
        'timeCooking' => $recipe->timeCooking,
        'prepInstructions' => $recipe->prepInstructions,
        'mealId' => $recipe->mealId
    );

    echo json_encode($recipe_info);
} else {
    // Recipe not found
    echo json_encode(array('message' => 'Recipe not found.'));
}
?>
