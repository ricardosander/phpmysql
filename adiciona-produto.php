<?php
session_start();
require_once("logica-usuario.php");
require_once("banco-produto.php");
require_once("class/Produto.php");

verificaUsuario();

$produto = new Produto();
$produto->nome = $_POST['nome'];
$produto->preco = $_POST['preco'];
$produto->descricao = $_POST['descricao'];
$produto->categoria_id = $_POST['categoria_id'];
$produto->usado = isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false";

$resultadoInsercao = insereProduto($conexao, $produto);

if ($resultadoInsercao) {
    $_SESSION['success'] = "Produto {$produto->nome}, {$produto->preco} adicionado com sucesso!";
} else {

    $mensagem = mysqli_error($conexao);
    $_SESSION['danger'] = "Produto {$produto->nome} não foi adicionado! {$mensagem}";
}
header("Location: produto-formulario.php");
die;