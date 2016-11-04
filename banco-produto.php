<?php
require_once("conecta.php");

function insereProduto($conexao, Produto $produto) {

    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $preco = mysqli_real_escape_string($conexao, $produto->preco);
    $categoria_id = mysqli_real_escape_string($conexao, $produto->categoria_id);
    $usado = mysqli_real_escape_string($conexao, $produto->usado);

    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, $usado)";
    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {

    $id = mysqli_real_escape_string($conexao, $id);

	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, Produto $produto) {

    $id = mysqli_real_escape_string($conexao, $produto->id);
    $nome = mysqli_real_escape_string($conexao, $produto->nome);
    $descricao = mysqli_real_escape_string($conexao, $produto->descricao);
    $preco = mysqli_real_escape_string($conexao, $produto->preco);
    $categoria_id = mysqli_real_escape_string($conexao, $produto->categoria_id);
    $usado = mysqli_real_escape_string($conexao, $produto->usado);

	$query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, usado = {$usado} where id = {$id}";
	return mysqli_query($conexao, $query);
}

function removerProduto($conexao, $id) {

    $id = mysqli_real_escape_string($conexao, $id);
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($conexao, $query);
}

function listaProdutos($conexao) {

    $query = "select p.*, c.nome as categoria from produtos as p inner join categorias as c on c.id = p.categoria_id";
    $resultado = mysqli_query($conexao, $query);

    $produtos = array();
    while ($produto = mysqli_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }
    return $produtos;
}