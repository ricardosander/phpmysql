<?php
session_start();
require_once("banco-produto.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto = new Produto();
$produto->setId($_POST['id']);
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);
$produto->setCategoria($categoria);
$produto->setUsado(isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false");

$resultadoAlteracao = alteraProduto($conexao, $produto);

require_once("cabecalho.php");
if ($resultadoAlteracao) {
	$_SESSION['success'] = "Produto {$produto->getNome()}, {$produto->getPreco()} alterado com sucesso!";
} else {
	$mensagem = mysqli_error($conexao);
	$_SESSION['danger'] = "Produto {$produto->getNome()} não foi alterado!{$mensagem}";
}
header("Location: produto-altera-formulario.php?id={$produto->getId()}");
die;