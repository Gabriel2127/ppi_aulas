<?php
require_once __DIR__ . '/../models/Tarefa.php';

class TarefaController {

    private $model;

    public function __construct() {
        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }
        $this->model = new Tarefa();
    }
    
    public function painel() {
        $tarefas = $this->model->listar($_SESSION['id']);
        include __DIR__ . '/../views/painel.php';
    }
    

    public function criar() {
        if (!empty($_POST['descricao'])) {
            $this->model->criarTarefa($_POST['descricao'], $_SESSION['id']);
        }
        header("Location: index.php?action=painel");
    }

    public function excluir() {
        $this->model->apagar($_GET['id'], $_SESSION['id']);
        header("Location: index.php?action=painel");
    }

    public function editar() {
        $tarefa = $this->model->buscarPorId($_GET['id'], $_SESSION['id']);
        include __DIR__ . '/../views/editar.php';
    }

    public function atualizar() {
        $this->model->update(
            $_POST['id'],
            $_POST['descricao'],
            $_SESSION['id']
        );
        header("Location: index.php?action=painel");
    }
}