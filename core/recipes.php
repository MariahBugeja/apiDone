<?php

class Recipe {
    private $conn;
    private $table = 'recipes';
    public $recipeId;
    public $RecipeName; 
    public $StaffId;
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
    
            //  the recipeId to remove any trailing newline character
            $this->recipeId = trim($row['recipeId']);
    
            // Assign other properties
            $this->RecipeName = isset($row['RecipeName']) ? $row['RecipeName'] : null; 
            $this->prepInstructions = isset($row['prepInstructions']) ? $row['prepInstructions'] : null;
            $this->StaffId = isset($row['StaffId']) ? $row['StaffId'] : null;
            $this->timePreparation = isset($row['timePreparation']) ? $row['timePreparation'] : null;
            $this->timeCooking = isset($row['timeCooking']) ? $row['timeCooking'] : null;
            $this->mealId = isset($row['mealId']) ? $row['mealId'] : null;
    
            return true;
        } else {
            return false;
        }
    }
    

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (RecipeName, prepInstructions, StaffId, timePreparation, timeCooking, mealId) VALUES(:RecipeName, :prepInstructions, :StaffId, :timePreparation, :timeCooking, :mealId)';
        $stmt = $this->conn->prepare($query);
        
        // Clean and bind parameters
        $this->RecipeName = htmlspecialchars(strip_tags($this->RecipeName)); 
        $this->prepInstructions = htmlspecialchars(strip_tags($this->prepInstructions));
        $this->StaffId = htmlspecialchars(strip_tags($this->StaffId)); 
        $this->timePreparation = htmlspecialchars(strip_tags($this->timePreparation));
        $this->timeCooking = htmlspecialchars(strip_tags($this->timeCooking));
        $this->mealId = htmlspecialchars(strip_tags($this->mealId)); 
        
        // Bind parameters
        $stmt->bindParam(':RecipeName', $this->RecipeName); 
        $stmt->bindParam(':prepInstructions', $this->prepInstructions);
        $stmt->bindParam(':StaffId', $this->StaffId); 
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
        $query = 'UPDATE ' . $this->table . ' SET RecipeName = :RecipeName, prepInstructions = :prepInstructions, StaffId = :StaffId, timePreparation = :timePreparation, timeCooking = :timeCooking, mealId = :mealId WHERE recipeId = :recipeId';
        $stmt = $this->conn->prepare($query);
    
        // Clean and bind parameters
        $this->recipeId = htmlspecialchars(strip_tags($this->recipeId));
        $this->RecipeName = htmlspecialchars(strip_tags($this->RecipeName)); 
        $this->prepInstructions = htmlspecialchars(strip_tags($this->prepInstructions));
        $this->StaffId = htmlspecialchars(strip_tags($this->StaffId)); 
        $this->timePreparation = htmlspecialchars(strip_tags($this->timePreparation));
        $this->timeCooking = htmlspecialchars(strip_tags($this->timeCooking));
        $this->mealId = htmlspecialchars(strip_tags($this->mealId)); 
    
        // Convert empty string to null for StaffId
        $this->StaffId = !empty($this->StaffId) ? $this->StaffId : null;
    
        // Bind parameters
        $stmt->bindParam(':recipeId', $this->recipeId);
        $stmt->bindParam(':RecipeName', $this->RecipeName); 
        $stmt->bindParam(':prepInstructions', $this->prepInstructions);
        $stmt->bindParam(':StaffId', $this->StaffId); 
        $stmt->bindParam(':timePreparation', $this->timePreparation);
        $stmt->bindParam(':timeCooking', $this->timeCooking);
        $stmt->bindParam(':mealId', $this->mealId); 
    
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }
    
    public function delete() {
        // First, check if the recipe exists
        if (!$this->read_single()) {
            return false; // Recipe doesn't exist
        }
    
        // Delete the recipe
        $query = 'DELETE FROM ' . $this->table . ' WHERE recipeId = :recipeId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':recipeId', $this->recipeId);
    
        try {
            $this->conn->beginTransaction();
    
            if ($stmt->execute()) {
                $this->conn->commit();
                return true;
            } else {
                $this->conn->rollBack();
                return false;
            }
        } catch (PDOException $e) {
            $this->conn->rollBack();
            printf('Error: %s. \n', $e->getMessage());
            return false;
        }
    }
}

?>
