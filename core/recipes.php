<?php

class Recipe {
    private $conn;
    private $table = 'recipes';
    public $recipe_id;
    public $recipe_name;
    public $preparation_instructions;
    public $chef_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table . ' ORDER BY recipe_id ASC';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function read_single() {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE recipe_id = ? LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->recipe_id);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->recipe_name = $row['recipe_name'];
            $this->preparation_instructions = $row['preparation_instructions'];
            $this->chef_id = $row['chef_id'];

            return true;
        } else {
            return false;
        }
    }

    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (recipe_name, preparation_instructions, chef_id) VALUES(:recipe_name, :preparation_instructions, :chef_id)';
        $stmt = $this->conn->prepare($query);
        
        $this->recipe_name = htmlspecialchars(strip_tags($this->recipe_name));
        $this->preparation_instructions = htmlspecialchars(strip_tags($this->preparation_instructions));
        $this->chef_id = htmlspecialchars(strip_tags($this->chef_id));

        $stmt->bindParam(':recipe_name', $this->recipe_name);
        $stmt->bindParam(':preparation_instructions', $this->preparation_instructions);
        $stmt->bindParam(':chef_id', $this->chef_id);

        if ($stmt->execute()) {
            return true;
        }
        printf('Error %s. \n', $stmt->error);
        return false;
    }

    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET recipe_name = :recipe_name, preparation_instructions = :preparation_instructions, chef_id = :chef_id WHERE recipe_id = :recipe_id';
        $stmt = $this->conn->prepare($query);

        $this->recipe_id = htmlspecialchars(strip_tags($this->recipe_id));
        $this->recipe_name = htmlspecialchars(strip_tags($this->recipe_name));
        $this->preparation_instructions = htmlspecialchars(strip_tags($this->preparation_instructions));
        $this->chef_id = htmlspecialchars(strip_tags($this->chef_id));

        $stmt->bindParam(':recipe_id', $this->recipe_id);
        $stmt->bindParam(':recipe_name', $this->recipe_name);
        $stmt->bindParam(':preparation_instructions', $this->preparation_instructions);
        $stmt->bindParam(':chef_id', $this->chef_id);

        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE recipe_id = :recipe_id';
        $stmt = $this->conn->prepare($query);

        $this->recipe_id = htmlspecialchars(strip_tags($this->recipe_id));
        $stmt->bindParam(':recipe_id', $this->recipe_id);
        
        if ($stmt->execute()) {
            return true;
        }
        printf('ERROR %s. \n', $stmt->error);
        return false;
    }
}

?>
