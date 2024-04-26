<?php

class Meal {
    private $conn;
    private $table = 'meal';
    public $mealId;
    public $MealName; 
    public $description;
    public $Price;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY mealId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE mealId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->mealId);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $this->mealId = trim($row['mealId']);
            $this->MealName = isset($row['MealName']) ? $row['MealName'] : null; 
            $this->description = isset($row['description']) ? $row['description'] : null;
            $this->Price = isset($row['Price']) ? $row['Price'] : null;
    
            return true;
        } else {
            return false;
        }
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (MealName, description, Price) VALUES(:MealName, :description, :Price)';
        $stmt = $this->conn->prepare($query);
        
        $this->MealName = htmlspecialchars(strip_tags($this->MealName)); 
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->Price = htmlspecialchars(strip_tags($this->Price)); 
    
        $stmt->bindParam(':MealName', $this->MealName); 
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':Price', $this->Price); 

        if ($stmt->execute()) {
            return true;
        }
        printf('Error %s. \n', $stmt->error);
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET MealName = :MealName, description = :description, Price = :Price WHERE mealId = :mealId';
        $stmt = $this->conn->prepare($query);
    
        $this->mealId = htmlspecialchars(strip_tags($this->mealId));
        $this->MealName = htmlspecialchars(strip_tags($this->MealName)); 
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->Price = htmlspecialchars(strip_tags($this->Price)); 
    
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':MealName', $this->MealName); 
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':Price', $this->Price); 
    
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }
    
    public function delete() {
        // Check if there are recipes referencing this meal
        $query = 'SELECT * FROM recipes WHERE mealId = :mealId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // Recipes referencing this meal exist
            return false;
        }
    
        // No recipes referencing this meal, proceed with deletion
        $query = 'DELETE FROM ' . $this->table . ' WHERE mealId = :mealId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':mealId', $this->mealId);
    
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