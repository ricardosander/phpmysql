<?php
require_once("autoload.php");
require_once("logica-usuario.php");
session_start();
verificaUsuario();

$usado = (isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false");

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

if (!empty($_POST['isbn'])) {

    $produto = new Livro($_POST['nome'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);
    $produto->setIsbn($_POST['isbn']);
} else {
    $produto = new Produto($_POST['nome'], $_POST['preco'], $_POST['descricao'], $categoria, $usado);
}

$produtoDao = new ProdutoDao($conexao);
$resultadoInsercao = $produtoDao->insereProduto($produto);

if ($resultadoInsercao) {
    $_SESSION['success'] = "Produto {$produto->getNome()}, {$produto->getPreco()} adicionado com sucesso!";
} else {

    $mensagem = mysqli_error($conexao);
    $_SESSION['danger'] = "Produto {$produto->getNome()} não foi adicionado! {$mensagem}";
}
header("Location: produto-formulario.php");
die;