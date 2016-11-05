<?php
require_once("autoload.php");
require_once("logica-usuario.php");
session_start();
verificaUsuario();

$_POST['usado'] = (isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false");

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$tipo = $_POST['tipo'];

$factory = new ProdutoFactory();
$produto = $factory->criaPor($tipo, $_POST);

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