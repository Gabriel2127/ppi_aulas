<?php
require_once __DIR__ . "/../models/User.php";

class AuthController
{
    private $user;

    public function __construct($mysqli)
    {
        $this->user = new User($mysqli);
    }

    public function login()
    {
        if (!empty($_POST['email']) && !empty($_POST['senha'])) {

            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $result = $this->user->findByLogin($email, $senha);

            if ($result->num_rows === 1) {
                $usuario = $result->fetch_assoc();

                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];

                header("Location: painel.php");
                exit;
            } else {
                $erro = "Email ou senha incorretos!";
            }
        }

        include __DIR__ . "/../views/login.php";
    }

    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();

        header("Location: index.php");
    }
}