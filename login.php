<?php
session_start();
include("banco-usuario.php");
include("logica-usuario.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = buscaUsuario($conexao, $email, $senha);
if ($usuario == null) {
    $_SESSION['danger'] = "Usuário ou senha inválida!";
} else {
    $_SESSION['success'] = "Logado com sucesso!";
    logaUsuario($email);
}
header("Location: index.php");