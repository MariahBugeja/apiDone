<?php
class PreOrderItem {
    private $conn;
    private $table = 'preOrderItem';

    public $preOrderItemId;
    public $preOrderId;
    public $quantity;
    public $specialRequest;
    public $mealId; 

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO `' . $this->table . '` (preOrderId, quantity, specialRequest, mealId) VALUES (:preOrderId, :quantity, :specialRequest, :mealId)';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':preOrderId', $this->preOrderId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':specialRequest', $this->specialRequest);
        $stmt->bindParam(':mealId', $this->mealId);

        return $stmt->execute();
    }
    
    public function getPreOrderItemDetail($preOrderItemId) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE preOrderitemdetailId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $preOrderItemId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Check if pre-order item detail exists
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Pre-order item detail not found
            return null;
        }
    }
    

    public function getAllPreOrderItems() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $preOrderItems = array();
        
        // Check if pre-order items exist
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $preOrderItems[] = $row;
            }
        }
        
        return $preOrderItems;
    }
    
    public function preOrderExists($preOrderId) {
        $query = 'SELECT COUNT(*) as count FROM `preOrder` WHERE preOrderId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $preOrderId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    public function mealExists($mealId) {
        $query = 'SELECT COUNT(*) as count FROM `meal` WHERE mealId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $mealId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }
}
?>
