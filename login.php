<?php
session_start();
require_once("autoload.php");
require_once("logica-usuario.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuarioDao = new UsuarioDao($conexao);
$usuario = $usuarioDao->buscaUsuario($email, $senha);
if ($usuario == null) {
    $_SESSION['danger'] = "Usuário ou senha inválida!";
} else {
    $_SESSION['success'] = "Logado com sucesso!";
    logaUsuario($email);
}
header("Location: index.php");