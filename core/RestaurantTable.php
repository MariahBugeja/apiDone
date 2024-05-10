<?php
class RestaurantTable {
    private $conn;
    private $table = 'RestaurantTable';

    public $tableId;
    public $tableNumber;
    public $capacity;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all tables
    public function getAllTables() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $tables = array();
        
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $tableDetails = [
                    'tableId' => $row['tableId'],
                    'tableNumber' => $row['tableNumber'],
                    'capacity' => $row['capacity']
                ];
                $tables[] = $tableDetails;
            }
        }
        
        return $tables;
    }

    // Create a table
    public function createTable() {
        $query = 'INSERT INTO ' . $this->table . ' (tableNumber, capacity) VALUES (:tableNumber, :capacity)';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':tableNumber', $this->tableNumber);
        $stmt->bindParam(':capacity', $this->capacity);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Update a table
    public function updateTable() {
        $query = 'UPDATE ' . $this->table . ' SET tableNumber = :tableNumber, capacity = :capacity WHERE tableId = :tableId';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':tableId', $this->tableId);
        $stmt->bindParam(':tableNumber', $this->tableNumber);
        $stmt->bindParam(':capacity', $this->capacity);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a table
    public function deleteTable() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE tableId = :tableId';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':tableId', $this->tableId);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
