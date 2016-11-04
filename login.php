<?php
include("banco-usuario.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuario = buscaUsuario($conexao, $email, $senha);
if ($usuario == null) {

    header("Location: index.php?logado=0");
    die;
}
header("Location: index.php?logado=1");