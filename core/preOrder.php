<?php
class PreOrder {
    private $conn;
    private $table = 'preOrder';

    public $preOrderId;
    public $customerId;
    public $time;
    public $status;
    public $date;
    public $mealId;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (CustomerId, time, status, date, mealId) VALUES (:customerId, :time, :status, :date, :mealId)';
        $stmt = $this->conn->prepare($query);
    
        $this->customerId = htmlspecialchars(strip_tags($this->customerId));
        $this->time = htmlspecialchars(strip_tags($this->time));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->mealId = htmlspecialchars(strip_tags($this->mealId));
    
        $stmt->bindParam(':customerId', $this->customerId);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':mealId', $this->mealId);
    
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
        $query = 'SELECT * FROM ' . $this->table . ' WHERE preOrderId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->preOrderId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->customerId = $row['CustomerId'];
            $this->time = $row['time'];
            $this->status = $row['status'];
            $this->date = $row['date'];
            $this->mealId = $row['mealId'];
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET CustomerId = :customerId, time = :time, status = :status, date = :date, mealId = :mealId WHERE preOrderId = :preOrderId';
        $stmt = $this->conn->prepare($query);

        $this->customerId = htmlspecialchars(strip_tags($this->customerId));
        $this->time = htmlspecialchars(strip_tags($this->time));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->mealId = htmlspecialchars(strip_tags($this->mealId));
        $this->preOrderId = htmlspecialchars(strip_tags($this->preOrderId));

        $stmt->bindParam(':customerId', $this->customerId);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':preOrderId', $this->preOrderId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE preOrderId = :preOrderId';
        $stmt = $this->conn->prepare($query);

        $this->preOrderId = htmlspecialchars(strip_tags($this->preOrderId));
        $stmt->bindParam(':preOrderId', $this->preOrderId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }
}
?>
