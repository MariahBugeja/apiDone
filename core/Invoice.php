<?php

class Invoice {
    private $conn;
    private $table = 'invoice';
    public $invoiceId;
    public $orderId;
    public $Totalammount;
    public $PaymentStatus;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY invoiceId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE invoiceId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->invoiceId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->orderId = $row['orderId'];
            $this->Totalammount = $row['Totalammount'];
            $this->PaymentStatus = $row['PaymentStatus'];

            return true;
        } else {
            return false;
        }
    }

    public function create() {
        // Check if orderId exists
        if (!$this->orderExists($this->orderId)) {
            return false; 
        }
        
        // Proceed with creating the invoice
        $query = 'INSERT INTO ' . $this->table . ' (orderId, Totalammount, PaymentStatus) VALUES(:orderId, :Totalammount, :PaymentStatus)';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':orderId', $this->orderId);
        $stmt->bindParam(':Totalammount', $this->Totalammount);
        $stmt->bindParam(':PaymentStatus', $this->PaymentStatus);

        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    }

    public function update() {
        // Check if invoiceId exists
        if (!$this->invoiceExists($this->invoiceId)) {
            return false; // Exit if invoice doesn't exist
        }
    
        // Proceed with updating the invoice
        $query = 'UPDATE ' . $this->table . ' SET Totalammount = :Totalammount, PaymentStatus = :PaymentStatus WHERE invoiceId = :invoiceId';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':invoiceId', $this->invoiceId);
        $stmt->bindParam(':Totalammount', $this->Totalammount);
        $stmt->bindParam(':PaymentStatus', $this->PaymentStatus);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false; // Return false if execution fails
        }
    }
    
    // check if invoice exists
    private function invoiceExists($invoiceId) {
        $query = 'SELECT COUNT(*) as count FROM ' . $this->table . ' WHERE invoiceId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $invoiceId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    public function delete() {
        // Check if invoice exists
        if (!$this->invoiceExists($this->invoiceId)) {
            return false; 
        }
        
        // Delete related payments first
        $paymentQuery = 'DELETE FROM payment WHERE invoiceId = :invoiceId';
        $paymentStmt = $this->conn->prepare($paymentQuery);
        $paymentStmt->bindParam(':invoiceId', $this->invoiceId);
        
        if (!$paymentStmt->execute()) {
            return false; 
        }
    
        // Proceed with deleting the invoice
        $query = 'DELETE FROM ' . $this->table . ' WHERE invoiceId = :invoiceId';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':invoiceId', $this->invoiceId);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    }
    

    // check if order exists
    private function orderExists($orderId) {
        $query = 'SELECT COUNT(*) as count FROM `order` WHERE orderId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $orderId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    // Method to get all invoices
    public function getInvoices() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY invoiceId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $invoices = array();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $invoice_item = array(
                'invoiceId' => $row['invoiceId'],
                'orderId' => $row['orderId'],
                'totalAmount' => $row['Totalammount'],
                'paymentStatus' => $row['PaymentStatus']
            );
            array_push($invoices, $invoice_item);
        }

        return $invoices;
    }
}

?>
