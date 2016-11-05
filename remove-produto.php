<?php
session_start();
require_once("autoload.php");

$produtoDao = new ProdutoDao($conexao);

$id = $_POST['id'];
$produtoDao->removerProduto($id);
$_SESSION['danger'] = "Produto removido com sucesso.";
header("Location: produto-lista.php");
die;