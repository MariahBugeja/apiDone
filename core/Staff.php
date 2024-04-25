<?php
class Staff {
    private $conn;
    private $table = 'staff';
    public $staffId;
    public $FirstName;
    public $LastName;
    public $role;
    public $phone;
    public $address;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY staffId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE staffId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->staffId);
        $stmt->execute();

        // Check if any rows were returned
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->FirstName = $row['FirstName'];
            $this->LastName = $row['LastName'];
            $this->role = $row['role'];
            $this->phone = $row['phone'];
            $this->address = $row['address'];

            return true;
        } else {
            return false; // No rows found
        }
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (FirstName, LastName, role, phone, address) VALUES(:FirstName, :LastName, :role, :phone, :address)';
        $stmt = $this->conn->prepare($query);
        
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address = htmlspecialchars(strip_tags($this->address));

        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error %s. \n', $stmt->error);
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET FirstName = :FirstName, LastName = :LastName, role = :role, phone = :phone, address = :address WHERE staffId = :staffId';
        $stmt = $this->conn->prepare($query);

        $this->staffId = htmlspecialchars(strip_tags($this->staffId));
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->role = htmlspecialchars(strip_tags($this->role));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->address = htmlspecialchars(strip_tags($this->address));

        $stmt->bindParam(':staffId', $this->staffId);
        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':role', $this->role);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);

        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE staffId = :staffId';
        $stmt = $this->conn->prepare($query);

        $this->staffId = htmlspecialchars(strip_tags($this->staffId));
        $stmt->bindParam(':staffId', $this->staffId);
        
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }
}
?>
