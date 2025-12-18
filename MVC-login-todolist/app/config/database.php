<?php
class Database {
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "mvcprojeto";
    
    public function conectar() {
        $conn = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($conn->connect_error) {
            die("Erro na conexão");
        }

        return $conn;
    }
}