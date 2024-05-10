<?php

class Drink {
    private $conn;
    private $table = 'drink';
    public $drinkId;
    public $Name;
    public $Price;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY drinkId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE drinkId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->drinkId);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $this->Name = $row['Name'];
            $this->Price = $row['Price'];
    
            return $this;
        } else {
            return null; 
        }
    }
    

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (Name, Price) VALUES(:Name, :Price)';
        $stmt = $this->conn->prepare($query);
        
        $this->Name = htmlspecialchars(strip_tags($this->Name));
        $this->Price = htmlspecialchars(strip_tags($this->Price));

        $stmt->bindParam(':Name', $this->Name);
        $stmt->bindParam(':Price', $this->Price);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error %s. \n', $stmt->error);
        return false;
    }

    public function update() {
        $existingDrink = $this->read_single();
        if (!$existingDrink) {
            return json_encode(array('message' => 'No drink with the provided ID exists.'));
        }
    
        if ($this->Name === $existingDrink->Name && $this->Price === $existingDrink->Price) {
            return json_encode(array('message' => 'No changes made to the drink.'));
        }
    
        $query = 'UPDATE ' . $this->table . ' SET Name = :Name, Price = :Price WHERE drinkId = :drinkId';
        $stmt = $this->conn->prepare($query);
    
        $this->drinkId = htmlspecialchars(strip_tags($this->drinkId));
        $this->Name = htmlspecialchars(strip_tags($this->Name));
        $this->Price = htmlspecialchars(strip_tags($this->Price));
    
        $stmt->bindParam(':drinkId', $this->drinkId);
        $stmt->bindParam(':Name', $this->Name);
        $stmt->bindParam(':Price', $this->Price);
    
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return json_encode(array('message' => 'Drink updated.'));
            } else {
                return json_encode(array('message' => 'No changes made to the drink.'));
            }
        } else {
            printf('ERROR %s. \n', $stmt->error);
            return json_encode(array('message' => 'Failed to update drink.'));
        }
    }
    
    
    
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE drinkId = :drinkId';
        $stmt = $this->conn->prepare($query);

        $this->drinkId = htmlspecialchars(strip_tags($this->drinkId));
        $stmt->bindParam(':drinkId', $this->drinkId);
        
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }
}

?>
