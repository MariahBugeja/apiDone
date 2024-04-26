<?php
class Order {
    private $conn;
    private $table = 'order';

    public $orderId;
    public $tableId;
    public $orderDateTime;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO `' . $this->table . '` (tableId, orderDateTime, status) VALUES (:tableId, :orderDateTime, :status)';
        $stmt = $this->conn->prepare($query);
    
        $this->tableId = htmlspecialchars(strip_tags($this->tableId));
        $this->orderDateTime = htmlspecialchars(strip_tags($this->orderDateTime));
        $this->status = htmlspecialchars(strip_tags($this->status));
    
        $stmt->bindParam(':tableId', $this->tableId);
        $stmt->bindParam(':orderDateTime', $this->orderDateTime);
        $stmt->bindParam(':status', $this->status);
    
        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE orderId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->orderId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->tableId = $row['tableId'];
            $this->orderDateTime = $row['orderDateTime'];
            $this->status = $row['status'];
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET tableId = :tableId, orderDateTime = :orderDateTime, status = :status WHERE orderId = :orderId';
        $stmt = $this->conn->prepare($query);

        $this->tableId = htmlspecialchars(strip_tags($this->tableId));
        $this->orderDateTime = htmlspecialchars(strip_tags($this->orderDateTime));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->orderId = htmlspecialchars(strip_tags($this->orderId));

        $stmt->bindParam(':tableId', $this->tableId);
        $stmt->bindParam(':orderDateTime', $this->orderDateTime);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':orderId', $this->orderId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE orderId = :orderId';
        $stmt = $this->conn->prepare($query);

        $this->orderId = htmlspecialchars(strip_tags($this->orderId));

        
        $stmt->bindParam(':orderId', $this->orderId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }
}
?>
