<?php
class OrderItem {
    private $conn;
    private $table = 'orderitems';
    public $orderItemId;
    public $orderId;
    public $mealId;
    public $drinkId;
    public $quantity;
    public $specialRequirements;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        // Check if required data exists
        if (!$this->orderExists($this->orderId) || 
            !$this->mealExists($this->mealId) || 
            !$this->drinkExists($this->drinkId)) {
            return false; 
        }
        
        $query = 'INSERT INTO ' . $this->table . ' (orderId, mealId, drinkId, quantity, specialRequirements) VALUES(:orderId, :mealId, :drinkId, :quantity, :specialRequirements)';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':orderId', $this->orderId);
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':drinkId', $this->drinkId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':specialRequirements', $this->specialRequirements);

        return $stmt->execute();
    }

    // Check if drink exists
    public function drinkExists($drinkId) {
        $query = 'SELECT COUNT(*) as count FROM `drink` WHERE drinkId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $drinkId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    // Check if order exists
    public function orderExists($orderId) {
        $query = 'SELECT COUNT(*) as count FROM `order` WHERE orderId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $orderId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    // Check if meal exists
    public function mealExists($mealId) {
        $query = 'SELECT COUNT(*) as count FROM `meal` WHERE mealId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $mealId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    public function update() {
        // Check if orderItemId exists
        if (!$this->orderItemExists($this->orderItemId)) {
            return false; 
        }

        if (!$this->orderExists($this->orderId)) {
            return false; 
        }

        if (!$this->mealExists($this->mealId)) {
            return false; 
        }

        
        if (!$this->drinkExists($this->drinkId)) {
            return false; 
        }

        $query = 'UPDATE ' . $this->table . ' SET orderId = :orderId, mealId = :mealId, drinkId = :drinkId, quantity = :quantity, specialRequirements = :specialRequirements WHERE orderItemId = :orderItemId';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':orderItemId', $this->orderItemId);
        $stmt->bindParam(':orderId', $this->orderId);
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':drinkId', $this->drinkId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':specialRequirements', $this->specialRequirements);
    
        return $stmt->execute();
    }

    // Check if order item exists
    private function orderItemExists($orderItemId) {
        $query = 'SELECT COUNT(*) as count FROM ' . $this->table . ' WHERE orderItemId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $orderItemId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }
    public function getOrderItemDetails($orderItemId) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE orderItemId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $orderItemId);
        $stmt->execute();
        
        // Check if order item exists
        if ($stmt->rowCount() > 0) {
            // Order item exists, fetch and return details
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Order item not found
            return null;
        }
    }
    public function getAllOrderItems() {
        // Prepare query to fetch all order items
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $orderItems = array();
        
        // Check if order items exist
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $orderItems[] = $row;
            }
        }
        
        return $orderItems;
    }
}
?>
