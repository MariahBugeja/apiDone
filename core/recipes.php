<?php

class Recipe {
    private $conn;
    private $table = 'recipes';
    public $recipeId;
    public $recipeName;
    public $staffId;
    public $timePreparation;
    public $timeCooking;
    public $prepInstructions;
    public $mealId; 
    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY recipeId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE recipeId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->recipeId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->recipeName = $row['recipeName'];
            $this->prepInstructions = $row['prepInstructions'];
            $this->staffId = $row['staffId'];
            $this->timePreparation = $row['timePreparation'];
            $this->timeCooking = $row['timeCooking'];
            $this->mealId = $row['mealId']; 

            return true;
        } else {
            return false;
        }
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (recipeName, prepInstructions, staffId, timePreparation, timeCooking, mealId) VALUES(:recipeName, :prepInstructions, :staffId, :timePreparation, :timeCooking, :mealId)';
        $stmt = $this->conn->prepare($query);
        
        // Clean and bind parameters
        $this->recipeName = htmlspecialchars(strip_tags($this->recipeName));
        $this->prepInstructions = htmlspecialchars(strip_tags($this->prepInstructions));
        $this->staffId = htmlspecialchars(strip_tags($this->staffId));
        $this->timePreparation = htmlspecialchars(strip_tags($this->timePreparation));
        $this->timeCooking = htmlspecialchars(strip_tags($this->timeCooking));
        $this->mealId = htmlspecialchars(strip_tags($this->mealId)); 
        // Bind parameters
        $stmt->bindParam(':recipeName', $this->recipeName);
        $stmt->bindParam(':prepInstructions', $this->prepInstructions);
        $stmt->bindParam(':staffId', $this->staffId);
        $stmt->bindParam(':timePreparation', $this->timePreparation);
        $stmt->bindParam(':timeCooking', $this->timeCooking);
        $stmt->bindParam(':mealId', $this->mealId); 

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        printf('Error %s. \n', $stmt->error);
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET recipeName = :recipeName, prepInstructions = :prepInstructions, staffId = :staffId, timePreparation = :timePreparation, timeCooking = :timeCooking, mealId = :mealId WHERE recipeId = :recipeId';
        $stmt = $this->conn->prepare($query);

        // Clean and bind parameters
        $this->recipeId = htmlspecialchars(strip_tags($this->recipeId));
        $this->recipeName = htmlspecialchars(strip_tags($this->recipeName));
        $this->prepInstructions = htmlspecialchars(strip_tags($this->prepInstructions));
        $this->staffId = htmlspecialchars(strip_tags($this->staffId));
        $this->timePreparation = htmlspecialchars(strip_tags($this->timePreparation));
        $this->timeCooking = htmlspecialchars(strip_tags($this->timeCooking));
        $this->mealId = htmlspecialchars(strip_tags($this->mealId)); 

        // Bind parameters
        $stmt->bindParam(':recipeId', $this->recipeId);
        $stmt->bindParam(':recipeName', $this->recipeName);
        $stmt->bindParam(':prepInstructions', $this->prepInstructions);
        $stmt->bindParam(':staffId', $this->staffId);
        $stmt->bindParam(':timePreparation', $this->timePreparation);
        $stmt->bindParam(':timeCooking', $this->timeCooking);
        $stmt->bindParam(':mealId', $this->mealId); 

        // Execute query
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE recipeId = :recipeId';
        $stmt = $this->conn->prepare($query);

        $this->recipeId = htmlspecialchars(strip_tags($this->recipeId));
        $stmt->bindParam(':recipeId', $this->recipeId);
        
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;


        
    }
}

?>
