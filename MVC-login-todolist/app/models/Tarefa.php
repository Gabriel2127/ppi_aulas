<?php
require_once __DIR__ . '/../config/database.php';

class Tarefa {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    public function listar($usuario_id) {
        $tarefas = [];
        $usuario_id = intval($usuario_id);

        $sql = "SELECT * FROM tarefas WHERE usuario_id = $usuario_id ORDER BY data_criacao DESC";

        $res = $this->conn->query($sql);

        while ($row = $res->fetch_assoc()) {
            $tarefas[] = $row;
        }

        return $tarefas;
    }

    public function criarTarefa($descricao, $usuario_id) {
        $descricao = $this->conn->real_escape_string($descricao);
        $usuario_id = intval($usuario_id);

        $sql = "INSERT INTO tarefas (descricao, usuario_id) VALUES ('$descricao', $usuario_id)";

        return $this->conn->query($sql);
    }

    public function apagar($id, $usuario_id) {
        $id = intval($id);
        $usuario_id = intval($usuario_id);

        $sql = "DELETE FROM tarefas WHERE id = $id AND usuario_id = $usuario_id";

        return $this->conn->query($sql);
    }

    public function buscarPorId($id, $usuario_id) {
        $id = intval($id);
        $usuario_id = intval($usuario_id);

        $sql = "SELECT * FROM tarefas WHERE id = $id AND usuario_id = $usuario_id";

        $res = $this->conn->query($sql);
        return $res->fetch_assoc();
    }

    public function update($id, $descricao, $usuario_id) {
        $id = intval($id);
        $usuario_id = intval($usuario_id);
        $descricao = $this->conn->real_escape_string($descricao);

        $sql = "UPDATE tarefas SET descricao = '$descricao' WHERE id = $id AND usuario_id = $usuario_id";

        return $this->conn->query($sql);
    }
}