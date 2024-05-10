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
    public $TypeOfMeal;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        // Check if required data exists
        if (!$this->customerExists($this->customerId) || !$this->mealExists($this->mealId)) {
            return false; 
        }
        
        // Prepare query for insertion
        $query = 'INSERT INTO `' . $this->table . '` (customerId, time, status, date, mealId, TypeOfMeal) VALUES (:customerId, :time, :status, :date, :mealId, :TypeOfMeal)';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':customerId', $this->customerId);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':TypeOfMeal', $this->TypeOfMeal);

        return $stmt->execute();
    }

    public function updateStatus($preOrderDetails) {
        $query = 'UPDATE ' . $this->table . ' SET status = :status WHERE preOrderId = :preOrderId';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':status', $preOrderDetails['status']);
        $stmt->bindParam(':preOrderId', $preOrderDetails['preOrderId']);

        if ($stmt->execute()) {
            return true;
        } else {
            printf('Error: %s.\n', $stmt->error);
            return false;
        }
    }

    public function getPreOrderDetails() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPreOrderDetail($preOrderId) {
        $query = 'SELECT * FROM `' . $this->table . '` WHERE preOrderId = :preOrderId';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':preOrderId', $preOrderId);

        $stmt->execute();

        $preOrderDetail = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$preOrderDetail) {
            return null;
        }

        return $preOrderDetail;
    }

    public function customerExists($customerId) {
        $query = 'SELECT COUNT(*) as count FROM `customer` WHERE customerId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $customerId);
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
}
?>
