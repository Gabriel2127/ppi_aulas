<?php
require_once __DIR__ . '/../config/database.php';

class Usuario {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function realizarLogin($email, $senha) {
        $rl = $this->conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
        $rl->bind_param("ss", $email, $senha);
        $rl->execute();
        return $rl->get_result();
    }
}