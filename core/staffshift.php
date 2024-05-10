<?php

class StaffShift {
    private $conn;
    private $table = 'staffshift';
    public $staffShiftId;
    public $staffId;
    public $start;
    public $finish;
    public $shiftType;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY staffShiftId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE staffShiftId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->staffShiftId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->staffId = $row['staffId'];
            $this->start = $row['start'];
            $this->finish = $row['finish'];
            $this->shiftType = $row['shiftType'];

            return true;
        } else {
            return false;
        }
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (staffId, start, finish, shiftType) VALUES(:staffId, :start, :finish, :shiftType)';
        $stmt = $this->conn->prepare($query);
        
        $this->staffId = htmlspecialchars(strip_tags($this->staffId));
        $this->start = htmlspecialchars(strip_tags($this->start));
        $this->finish = htmlspecialchars(strip_tags($this->finish));
        $this->shiftType = htmlspecialchars(strip_tags($this->shiftType));

        $stmt->bindParam(':staffId', $this->staffId);
        $stmt->bindParam(':start', $this->start);
        $stmt->bindParam(':finish', $this->finish);
        $stmt->bindParam(':shiftType', $this->shiftType);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error %s. \n', $stmt->error);
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET staffId = :staffId, start = :start, finish = :finish, shiftType = :shiftType WHERE staffShiftId = :staffShiftId';
        $stmt = $this->conn->prepare($query);

        $this->staffShiftId = htmlspecialchars(strip_tags($this->staffShiftId));
        $this->staffId = htmlspecialchars(strip_tags($this->staffId));
        $this->start = htmlspecialchars(strip_tags($this->start));
        $this->finish = htmlspecialchars(strip_tags($this->finish));
        $this->shiftType = htmlspecialchars(strip_tags($this->shiftType));

        $stmt->bindParam(':staffShiftId', $this->staffShiftId);
        $stmt->bindParam(':staffId', $this->staffId);
        $stmt->bindParam(':start', $this->start);
        $stmt->bindParam(':finish', $this->finish);
        $stmt->bindParam(':shiftType', $this->shiftType);

        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }

    public function delete() {
        // Check if staffShiftId is provided
        if (!isset($this->staffShiftId)) {
            return json_encode(array('message' => 'Staff Shift ID not provided.'));
        }

        $query = 'DELETE FROM ' . $this->table . ' WHERE staffShiftId = :staffShiftId';
        $stmt = $this->conn->prepare($query);

        $this->staffShiftId = htmlspecialchars(strip_tags($this->staffShiftId));
        $stmt->bindParam(':staffShiftId', $this->staffShiftId);
        
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }
}



?>
