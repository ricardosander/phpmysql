<?php
session_start();
include("banco-produto.php");
$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
$usado = isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false";

$resultadoAlteracao = alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado);

include("cabecalho.php");
if ($resultadoAlteracao) {
	$_SESSION['success'] = "Produto {$nome}, {$preco} alterado com sucesso!";
} else {
	$mensagem = mysqli_error($conexao);
	$_SESSION['danger'] = "Produto {$nome}ão foi alterado!{$mensagem}";
}
header("Location: produto-altera-formulario.php?id={$id}");
die;