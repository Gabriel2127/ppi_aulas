<?php
class User
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function findByLogin($email, $senha)
    {
        $email = $this->mysqli->real_escape_string($email);
        $senha = $this->mysqli->real_escape_string($senha);

        $sql = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
        return $this->mysqli->query($sql);
    }
}