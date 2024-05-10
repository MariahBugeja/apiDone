<?php

class StaffAccount {
    private $conn;
    private $table = 'StaffAccounts';
    public $staffAccountId;
    public $staffId;
    public $email;
    public $password;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        if (!$this->staffExists($this->staffId)) {
            return false; 
        }

        $query = 'INSERT INTO ' . $this->table . ' (staffId, email, password) VALUES(:staffId, :email, :password)';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':staffId', $this->staffId);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password); // Store password as provided

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($staffAccountId) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE staffAccountId = :staffAccountId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':staffAccountId', $staffAccountId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function patchPassword($staffAccountId, $newPassword) {
        $query = 'UPDATE ' . $this->table . ' SET password = :password WHERE staffAccountId = :staffAccountId';
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':staffAccountId', $staffAccountId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAccountById($staffAccountId) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE StaffAccountid = :staffAccountId';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':staffAccountId', $staffAccountId);
        $stmt->execute();
    
        $account = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $account;
    }
    

    public function getAllAccounts() {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $accounts;
    }

    //  to check if staff exists
    private function staffExists($staffId) {
        $query = 'SELECT COUNT(*) as count FROM Staff WHERE staffId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $staffId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }
}

?>
