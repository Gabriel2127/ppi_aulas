<?php
session_start();

$action = $_GET['action'] ?? 'login';

$acoesPublicas = ['login', 'autenticar'];

if (!isset($_SESSION['id']) && !in_array($action, $acoesPublicas)) {
    header("Location: index.php?action=login");
    exit;
}

if ($action === 'logout') {
    session_destroy();
    header("Location: index.php?action=login");
    exit;
}

if (in_array($action, $acoesPublicas)) {
    require_once 'app/controllers/LoginController.php';
    $controller = new LoginController();
    $controller->$action();
    exit;
}

require_once 'app/controllers/TarefaController.php';
$controller = new TarefaController();

if (!method_exists($controller, $action)) {
    $action = 'painel';
}

$controller->$action();
?>