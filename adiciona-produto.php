<?php
session_start();
include("logica-usuario.php");
include("banco-produto.php");

verificaUsuario();

$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
$usado = isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false";

$resultadoInsercao = insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado);

if ($resultadoInsercao) {
    $_SESSION['success'] = "Produto {$nome}, {$preco} adicionado com sucesso!";
} else {

    $mensagem = mysqli_error($conexao);
    $_SESSION['danger'] = "Produto {$nome} não foi adicionado! {$mensagem}";
}
header("Location: produto-formulario.php");
die;