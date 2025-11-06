<?php
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION["id"])){
    die("vc nao pode acessar essa pagina, vc nao esta  logado<P> <a href=\"index.php\">entrar</a></p>");
}
?>