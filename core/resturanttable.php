<?php
class RestaurantTable {
    private $conn;
    private $table = 'restauranttable';

    public $tableId;
    public $tableNumber;
    public $capacity;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (tableNumber, capacity) VALUES (:tableNumber, :capacity)';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':tableNumber', $this->tableNumber);
        $stmt->bindParam(':capacity', $this->capacity);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE tableId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->tableId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->tableNumber = $row['tableNumber'];
            $this->capacity = $row['capacity'];
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET tableNumber = :tableNumber, capacity = :capacity WHERE tableId = :tableId';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':tableId', $this->tableId);
        $stmt->bindParam(':tableNumber', $this->tableNumber);
        $stmt->bindParam(':capacity', $this->capacity);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE tableId = :tableId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':tableId', $this->tableId);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
