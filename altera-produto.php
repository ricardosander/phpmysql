<?php
session_start();
require_once("banco-produto.php");
require_once("class/Produto.php");

$produto = new Produto();
$produto->id = $_POST['id'];
$produto->nome = $_POST['nome'];
$produto->preco = $_POST['preco'];
$produto->descricao = $_POST['descricao'];
$produto->categoria_id = $_POST['categoria_id'];
$produto->usado = isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false";

$resultadoAlteracao = alteraProduto($conexao, $produto);

require_once("cabecalho.php");
if ($resultadoAlteracao) {
	$_SESSION['success'] = "Produto {$produto->nome}, {$produto->preco} alterado com sucesso!";
} else {
	$mensagem = mysqli_error($conexao);
	$_SESSION['danger'] = "Produto {$produto->nome} não foi alterado!{$mensagem}";
}
header("Location: produto-altera-formulario.php?id={$produto->id}");
die;