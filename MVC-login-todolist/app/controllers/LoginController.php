<?php
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {

    public function login() {
        include __DIR__ . '/../views/login.php';
    }
    public function autenticar() {
        $usuario = new Usuario();
        $res = $usuario->realizarLogin($_POST['email'], $_POST['senha']);
    
        if ($res->num_rows === 1) {
            $dados = $res->fetch_assoc();
            
            $_SESSION['id'] = $dados['id'];
            $_SESSION['nome'] = $dados['nome'];

         if (!isset($_SESSION)){
            header("Location: protect.php");
         }
            header("Location: index.php?action=painel");
            exit;
        } else {
            include __DIR__ . '/../views/erro.php';
        }
    }
    
}