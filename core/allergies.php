<?php
class Allergies {
    private $conn;
    private $table = 'allergies';
    public $allergiesId;
    public $allergyinfo;
    public $mealId;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY allergiesId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE allergiesId = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->allergiesId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->allergyinfo = $row['allergyinfo'];
            $this->mealId = $row['mealId'];

            return true;
        } else {
            return false;
        }
    }

    public function create() {
        if (!$this->mealExists($this->mealId)) {
            return false;
        }
        
        $query = 'INSERT INTO ' . $this->table . ' (allergyinfo, mealId) VALUES (:allergyinfo, :mealId)';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':allergyinfo', $this->allergyinfo);
        $stmt->bindParam(':mealId', $this->mealId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function delete() {
        if (!$this->allergiesExists($this->allergiesId)) {
            return false;
        }
    
        $query = 'DELETE FROM ' . $this->table . ' WHERE allergiesId = :allergiesId';
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':allergiesId', $this->allergiesId);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    private function allergiesExists($allergiesId) {
        $query = 'SELECT COUNT(*) as count FROM ' . $this->table . ' WHERE allergiesId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $allergiesId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    private function mealExists($mealId) {
        $query = 'SELECT COUNT(*) as count FROM meal WHERE mealId = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $mealId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'] > 0;
    }

    public function getAllAllergies() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY allergiesId ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        $allergies = array();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $allergy_item = array(
                'allergiesId' => $row['allergiesId'],
                'allergyinfo' => $row['allergyinfo'],
                'mealId' => $row['mealId']
            );
            array_push($allergies, $allergy_item);
        }

        return $allergies;
    }
}
?>

?>
