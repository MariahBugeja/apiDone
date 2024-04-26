<?php
class OrderItem {
    private $conn;
    private $table = 'order_item';

    public $orderItemId;
    public $orderId;
    public $mealId;
    public $drinkId;
    public $quantity;
    public $specialRequest;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (orderId, mealId, drinkId, quantity, specialRequest) VALUES (:orderId, :mealId, :drinkId, :quantity, :specialRequest)';
        $stmt = $this->conn->prepare($query);
    
        $this->orderId = htmlspecialchars(strip_tags($this->orderId));
        $this->mealId = htmlspecialchars(strip_tags($this->mealId));
        $this->drinkId = htmlspecialchars(strip_tags($this->drinkId));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->specialRequest = htmlspecialchars(strip_tags($this->specialRequest));
    
        $stmt->bindParam(':orderId', $this->orderId);
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':drinkId', $this->drinkId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':specialRequest', $this->specialRequest);
    
        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE orderId = :orderId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':orderId', $this->orderId);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET orderId = :orderId, mealId = :mealId, drinkId = :drinkId, quantity = :quantity, specialRequest = :specialRequest WHERE orderItemId = :orderItemId';
        $stmt = $this->conn->prepare($query);

        $this->orderItemId = htmlspecialchars(strip_tags($this->orderItemId));
        $this->orderId = htmlspecialchars(strip_tags($this->orderId));
        $this->mealId = htmlspecialchars(strip_tags($this->mealId));
        $this->drinkId = htmlspecialchars(strip_tags($this->drinkId));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->specialRequest = htmlspecialchars(strip_tags($this->specialRequest));

        $stmt->bindParam(':orderItemId', $this->orderItemId);
        $stmt->bindParam(':orderId', $this->orderId);
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':drinkId', $this->drinkId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':specialRequest', $this->specialRequest);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE orderItemId = :orderItemId';
        $stmt = $this->conn->prepare($query);

        $this->orderItemId = htmlspecialchars(strip_tags($this->orderItemId));
        $stmt->bindParam(':orderItemId', $this->orderItemId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }
}
?>
