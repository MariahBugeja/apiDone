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

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (orderId, Totalammount, PaymentStatus) VALUES (:orderId, :Totalammount, :PaymentStatus)';
        $stmt = $this->conn->prepare($query);
    
        $this->orderId = htmlspecialchars(strip_tags($this->orderId));
        $this->Totalammount = htmlspecialchars(strip_tags($this->Totalammount));
        $this->PaymentStatus = htmlspecialchars(strip_tags($this->PaymentStatus));
    
        $stmt->bindParam(':orderId', $this->orderId);
        $stmt->bindParam(':Totalammount', $this->Totalammount);
        $stmt->bindParam(':PaymentStatus', $this->PaymentStatus);
    
        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
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

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET orderId = :orderId, Totalammount = :Totalammount, PaymentStatus = :PaymentStatus WHERE invoiceId = :invoiceId';
        $stmt = $this->conn->prepare($query);

        $this->orderId = htmlspecialchars(strip_tags($this->orderId));
        $this->Totalammount = htmlspecialchars(strip_tags($this->Totalammount));
        $this->PaymentStatus = htmlspecialchars(strip_tags($this->PaymentStatus));
        $this->invoiceId = htmlspecialchars(strip_tags($this->invoiceId));

        $stmt->bindParam(':orderId', $this->orderId);
        $stmt->bindParam(':Totalammount', $this->Totalammount);
        $stmt->bindParam(':PaymentStatus', $this->PaymentStatus);
        $stmt->bindParam(':invoiceId', $this->invoiceId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE invoiceId = :invoiceId';
        $stmt = $this->conn->prepare($query);

        $this->invoiceId = htmlspecialchars(strip_tags($this->invoiceId));

        $stmt->bindParam(':invoiceId', $this->invoiceId);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error: %s.\n', $stmt->error);
        return false;
    }
}
?>
