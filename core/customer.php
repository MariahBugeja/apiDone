<?php

class Customer {
    private $conn;
    private $table = 'customer';
    public $customerId;
    public $FirstName;
    public $LastName;
    public $Email;
    public $phone;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY customerId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE customerId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->customerId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->FirstName = $row['FirstName'];
            $this->LastName = $row['LastName'];
            $this->Email = $row['Email'];
            $this->phone = $row['phone'];
            $this->password = $row['password'];

            return true;
        } else {
            return false;
        }
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (FirstName, LastName, Email, phone, password) VALUES(:FirstName, :LastName, :Email, :phone, :password)';
        $stmt = $this->conn->prepare($query);
        
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error %s. \n', $stmt->error);
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET FirstName = :FirstName, LastName = :LastName, Email = :Email, phone = :phone, password = :password WHERE customerId = :customerId';
        $stmt = $this->conn->prepare($query);

        $this->customerId = htmlspecialchars(strip_tags($this->customerId));
        $this->FirstName = htmlspecialchars(strip_tags($this->FirstName));
        $this->LastName = htmlspecialchars(strip_tags($this->LastName));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $stmt->bindParam(':customerId', $this->customerId);
        $stmt->bindParam(':FirstName', $this->FirstName);
        $stmt->bindParam(':LastName', $this->LastName);
        $stmt->bindParam(':Email', $this->Email);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':password', $this->password);

        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }


    public function changePassword($newPassword) {
        // Hash the new password before updating
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        // Update the password in the database
        $query = 'UPDATE ' . $this->table . ' SET password = :password WHERE customerId = :customerId';
        $stmt = $this->conn->prepare($query);
        
        $this->customerId = htmlspecialchars(strip_tags($this->customerId));
        
        $stmt->bindParam(':customerId', $this->customerId);
        $stmt->bindParam(':password', $hashedPassword);
        
        // Execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            // Print any errors
            printf("Error: %s.\n", $stmt->error);
            return false;
        }
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE customerId = :customerId';
        $stmt = $this->conn->prepare($query);

        $this->customerId = htmlspecialchars(strip_tags($this->customerId));
        $stmt->bindParam(':customerId', $this->customerId);
        
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }
    public function fooddetails(){
        
    }
}
?>
