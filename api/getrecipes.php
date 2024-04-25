<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$recipe = new Recipe($db);

// Read all recipes
$stmt = $recipe->read();
$count = $stmt->rowCount();

if ($count > 0) {
    $recipe_arr = array();
    $recipe_arr['recipes'] = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $recipe_item = array(
            'recipeId' => $recipeId,
            'recipeName' => $RecipeName,
            'staffId' => $StaffId,
            'timePreparation' => $timePreparation,
            'timeCooking' => $timeCooking,
            'prepInstructions' => $prepInstructions,
            'mealId' => $mealId
        );

        array_push($recipe_arr['recipes'], $recipe_item);
    }

    echo json_encode($recipe_arr);
} else {
    echo json_encode(array('message' => 'No recipes found.'));
}
?>
