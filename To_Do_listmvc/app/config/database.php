<?php class database{ 
    private $localhost = "localhost"; 
    private $usuario = "root"; private $senha = " "; 
    private $database = "todo_list";
    
    public $conn; 
    public function conectar(): mysqli{ 
        $this->conn = new mysqli($this->localhost, $this->usuario, $this->senha, $this->database);
        if ($this->conn->connect_error) 
        { die("Deu erro: " . $this->conn->connect_error); } 
        return $this->conn; } } 
        ?>