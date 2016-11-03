<?php
include("conecta.php");

function insereProduto($conexao, $nome, $preco, $descricao) {

    $query = "insert into produtos (nome, preco, descricao) values ('{$nome}', {$preco}, '{$descricao}')";
    return mysqli_query($conexao, $query);
}

function removerProduto($conexao, $id) {

    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function listaProdutos($conexao) {

    $query = "select * from produtos";
    $resultado = mysqli_query($conexao, $query);

    $produtos = array();
    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    return $produtos;
}