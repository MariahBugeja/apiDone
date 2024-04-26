<?php
class ReservationDetail {
    private $conn;
    private $table = 'reservation_details';

    public $reservationDetailId;
    public $mealId;
    public $quantity;
    public $reservationId;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (mealId, quantity, reservationId) VALUES (:mealId, :quantity, :reservationId)';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':reservationId', $this->reservationId);
    
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
        $query = 'SELECT * FROM ' . $this->table . ' WHERE reservationDetailId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->reservationDetailId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->mealId = $row['mealId'];
            $this->quantity = $row['quantity'];
            $this->reservationId = $row['reservationId'];
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET mealId = :mealId, quantity = :quantity, reservationId = :reservationId WHERE reservationDetailId = :reservationDetailId';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':reservationId', $this->reservationId);
        $stmt->bindParam(':reservationDetailId', $this->reservationDetailId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE reservationDetailId = :reservationDetailId';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':reservationDetailId', $this->reservationDetailId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }
}
?>
