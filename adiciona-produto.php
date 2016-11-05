<?php
session_start();
require_once("logica-usuario.php");
require_once("banco-produto.php");
verificaUsuario();

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto = new Produto();
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);
$produto->setUsado(isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false");

$resultadoInsercao = insereProduto($conexao, $produto);

if ($resultadoInsercao) {
    $_SESSION['success'] = "Produto {$produto->getNome()}, {$produto->getPreco()} adicionado com sucesso!";
} else {

    $mensagem = mysqli_error($conexao);
    $_SESSION['danger'] = "Produto {$produto->getNome()} não foi adicionado! {$mensagem}";
}
header("Location: produto-formulario.php");
die;