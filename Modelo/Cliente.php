<?php
class Cliente {
    private $conn;
    private $table_name = "cliente";

    public $id_cli;
    public $nombres_cli;
    public $correo_cli;
    public $contrasena_cli;
    public $telefono_cli;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Generar ID único
    private function generateUniqueId() {
        do {
            $uniqueId = mt_rand(1000, 9999);
            $query = "SELECT id_cli FROM " . $this->table_name . " WHERE id_cli = :id_cli";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id_cli", $uniqueId);
            $stmt->execute();
        } while ($stmt->rowCount() > 0);
        
        return $uniqueId;
    }

    public function register() {
        $query = "INSERT INTO " . $this->table_name . " 
                 SET id_cli=:id_cli, nombres_cli=:nombres, correo_cli=:correo, 
                     contrasena_cli=:contrasena, telefono_cli=:telefono";

        $stmt = $this->conn->prepare($query);

        $this->id_cli = $this->generateUniqueId();
        $this->nombres_cli = htmlspecialchars(strip_tags($this->nombres_cli));
        $this->correo_cli = htmlspecialchars(strip_tags($this->correo_cli));
        $this->telefono_cli = htmlspecialchars(strip_tags($this->telefono_cli));
        $this->contrasena_cli = htmlspecialchars(strip_tags($this->contrasena_cli));

        $stmt->bindParam(":id_cli", $this->id_cli);
        $stmt->bindParam(":nombres", $this->nombres_cli);
        $stmt->bindParam(":correo", $this->correo_cli);
        $stmt->bindParam(":contrasena", $this->contrasena_cli);
        $stmt->bindParam(":telefono", $this->telefono_cli);

        return $stmt->execute();
    }

    public function login() {
        $query = "SELECT id_cli, nombres_cli, correo_cli, contrasena_cli 
                 FROM " . $this->table_name . " 
                 WHERE correo_cli = ? AND contrasena_cli = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->correo_cli);
        $stmt->bindParam(2, $this->contrasena_cli);
        $stmt->execute();
        
        return $stmt;
    }
}
?>