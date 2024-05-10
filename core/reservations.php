<?php
class Reservation {
    private $conn;
    private $table = 'reservation';
    public $reservationId;
    public $customerId;
    public $date;
    public $time;
    public $numberOfGuests;
    public $tableId;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY reservationId ASC';
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
    
            // Check if customerId exists before accessing it
            if (isset($row['customerId'])) {
                $this->customerId = $row['customerId'];
            }
    
            $this->date = $row['date'];
            $this->time = $row['time'];
            $this->numberOfGuests = $row['numberOfGuests'];
            $this->tableId = $row['tableId'];
            $this->status = $row['status'];
    
            return true;
        } else {
            return false;
        }
    }

    public function create() {
        if (!$this->customerExists($this->customerId)) {
            return false; 
        }
        
        $validStatuses = array('pending', 'confirmed', 'cancelled');
        if (!in_array($this->status, $validStatuses)) {
            return false; 
        }
        
        $query = 'INSERT INTO ' . $this->table . ' (customerId, date, time, numberOfGuests, tableId, status) VALUES(:customerId, :date, :time, :numberOfGuests, :tableId, :status)';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':customerId', $this->customerId);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':time', $this->time);
        $stmt->bindParam(':numberOfGuests', $this->numberOfGuests);
        $stmt->bindParam(':tableId', $this->tableId);
        $stmt->bindParam(':status', $this->status);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    }
    
    public function delete() {
        if (!$this->read_single()) {
            return false; 
        }
    
        $query = 'DELETE FROM ' . $this->table . ' WHERE reservationId = :reservationId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':reservationId', $this->reservationId);
    
        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
    
    public function customerExists($customerId) {
        $query = 'SELECT COUNT(*) as count FROM customer WHERE customerId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $customerId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    public function updateStatus() {
        $validStatuses = array('pending', 'confirmed', 'cancelled');
        if (!in_array($this->status, $validStatuses)) {
            return false; 
        }
    
        $query = 'UPDATE ' . $this->table . ' SET status = :status WHERE reservationId = :reservationId';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':status', $this->status);
        $stmt->bindParam(':reservationId', $this->reservationId);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    }
    
    public function getReservationById($reservationId) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE reservationId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $reservationId);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $this->reservationId = $row['reservationId'];
            $this->customerId = $row['customerId'];
            $this->date = $row['date'];
            $this->time = $row['time'];
            $this->numberOfGuests = $row['numberOfGuests'];
            $this->tableId = $row['tableId'];
            $this->status = $row['status'];
    
            return true;
        } else {
            return false;
        }
    }
    
    public function getAllReservations() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY reservationId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $reservations = array();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $reservation_item = array(
                "reservationId" => $row['reservationId'],
                "customerId" => $row['customerId'],
                "date" => $row['date'],
                "time" => $row['time'],
                "numberOfGuests" => $row['numberOfGuests'],
                "tableId" => $row['tableId'],
                "status" => $row['status']
            );
            array_push($reservations, $reservation_item);
        }
    
        return $reservations;
    }
    
}
?>
