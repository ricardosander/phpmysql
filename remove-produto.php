<?php
include("banco-produto.php");

$id = $_GET['id'];
removerProduto($conexao, $id);
header("Location: produto-lista.php?removido=true");
die;