<?php
require_once("autoload.php");
session_start();

$usado = (isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false");

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto = new Produto($_POST['nome'],
                       $_POST['preco'],
                       $_POST['descricao'],
                       $categoria,
                       $usado);
$produto->setId($_POST['id']);

$produtoDao = new ProdutoDao($conexao);
$resultadoAlteracao = $produtoDao->alteraProduto($produto);

require_once("cabecalho.php");
if ($resultadoAlteracao) {
	$_SESSION['success'] = "Produto {$produto->getNome()}, {$produto->getPreco()} alterado com sucesso!";
} else {
	$mensagem = mysqli_error($conexao);
	$_SESSION['danger'] = "Produto {$produto->getNome()} não foi alterado!{$mensagem}";
}
header("Location: produto-altera-formulario.php?id={$produto->getId()}");
die;