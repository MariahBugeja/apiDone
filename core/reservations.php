<?php
class Reservation {
    private $conn;
    private $table = 'reservations';

    public $reservationId;
    public $customerId;
    public $date;
    public $time;
    public $numberOfGuests;
    public $status;
    public $mealId;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (customerId, date, time, numberOfGuests, status, mealId) VALUES (:customerId, :date, :time, :numberOfGuests, :status, :mealId)';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':customerId', $this->customerId);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':numberOfGuests', $this->numberOfGuests);
        $stmt->bindParam(':status', $this->status);
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
        $query = 'SELECT * FROM ' . $this->table . ' WHERE reservationId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->reservationId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->customerId = $row['customerId'];
            $this->date = $row['date'];
            $this->time = $row['time'];
            $this->numberOfGuests = $row['numberOfGuests'];
            $this->status = $row['status'];
            $this->mealId = $row['mealId'];
            return true;
        } else {
            return false;
        }
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET customerId = :customerId, date = :date, time = :time, numberOfGuests = :numberOfGuests, status = :status, mealId = :mealId WHERE reservationId = :reservationId';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':customerId', $this->customerId);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':numberOfGuests', $this->numberOfGuests);
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':mealId', $this->mealId);
        $stmt->bindParam(':reservationId', $this->reservationId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE reservationId = :reservationId';
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':reservationId', $this->reservationId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }
}
?>
