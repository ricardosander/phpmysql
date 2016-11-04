<?php
session_start();
require_once("banco-produto.php");

$id = $_POST['id'];
removerProduto($conexao, $id);
$_SESSION['danger'] = "Produto removido com sucesso.";
header("Location: produto-lista.php");
die;