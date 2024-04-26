<?php
class PreOrderItem {
    private $conn;
    private $table = 'preorderitem';

    public $preOrderItemId;
    public $preOrderId;
    public $MenuItemId;
    public $quantity;
    public $specialRequest;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (preOrderId, MenuItemId, quantity, specialRequest) VALUES (:preOrderId, :MenuItemId, :quantity, :specialRequest)';
        $stmt = $this->conn->prepare($query);
    
        $this->preOrderId = htmlspecialchars(strip_tags($this->preOrderId));
        $this->MenuItemId = htmlspecialchars(strip_tags($this->MenuItemId));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->specialRequest = htmlspecialchars(strip_tags($this->specialRequest));
    
        $stmt->bindParam(':preOrderId', $this->preOrderId);
        $stmt->bindParam(':MenuItemId', $this->MenuItemId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':specialRequest', $this->specialRequest);
    
        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function read_by_preorder() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE preOrderId = :preOrderId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':preOrderId', $this->preOrderId);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET preOrderId = :preOrderId, MenuItemId = :MenuItemId, quantity = :quantity, specialRequest = :specialRequest WHERE preOrderItemId = :preOrderItemId';
        $stmt = $this->conn->prepare($query);

        $this->preOrderId = htmlspecialchars(strip_tags($this->preOrderId));
        $this->MenuItemId = htmlspecialchars(strip_tags($this->MenuItemId));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->specialRequest = htmlspecialchars(strip_tags($this->specialRequest));
        $this->preOrderItemId = htmlspecialchars(strip_tags($this->preOrderItemId));

        $stmt->bindParam(':preOrderId', $this->preOrderId);
        $stmt->bindParam(':MenuItemId', $this->MenuItemId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':specialRequest', $this->specialRequest);
        $stmt->bindParam(':preOrderItemId', $this->preOrderItemId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE preOrderItemId = :preOrderItemId';
        $stmt = $this->conn->prepare($query);

        $this->preOrderItemId = htmlspecialchars(strip_tags($this->preOrderItemId));

        $stmt->bindParam(':preOrderItemId', $this->preOrderItemId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }
}
?>
