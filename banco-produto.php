<?php
require_once("autoload.php");
require_once("conecta.php");

function insereProduto($conexao, Produto $produto) {

    $nome = mysqli_real_escape_string($conexao, $produto->getNome());
    $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
    $preco = mysqli_real_escape_string($conexao, $produto->getPreco());
    $categoria_id = mysqli_real_escape_string($conexao, $produto->getCategoria()->getId());
    $usado = mysqli_real_escape_string($conexao, $produto->getUsado());

    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, $usado)";

    return mysqli_query($conexao, $query);
}

function buscaProduto($conexao, $id) {

	$id = mysqli_real_escape_string($conexao, $id);

	$query = "select p.*, c.nome as categoria from produtos as p inner join categorias as c on c.id = p.categoria_id where p.id = {$id}";
	$resultado = mysqli_query($conexao, $query);

	$produtoArray = mysqli_fetch_assoc($resultado);

	$categoria = new Categoria();

	$categoria->setId($produtoArray['categoria_id']);
	$categoria->setNome($produtoArray['categoria']);

	$produto = new Produto($produtoArray['nome'],
                           $produtoArray['preco'],
                           $produtoArray['descricao'],
                           $categoria,
                           $produtoArray['usado']);

	$produto->setId($produtoArray['id']);

	return $produto;
}

function alteraProduto($conexao, Produto $produto) {

    $id = mysqli_real_escape_string($conexao, $produto->getId());
    $nome = mysqli_real_escape_string($conexao, $produto->getNome());
    $descricao = mysqli_real_escape_string($conexao, $produto->getDescricao());
    $preco = mysqli_real_escape_string($conexao, $produto->getPreco());
    $categoria_id = mysqli_real_escape_string($conexao, $produto->getCategoria()->getId());
    $usado = mysqli_real_escape_string($conexao, $produto->getUsado());

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
    while ($produtoArray = mysqli_fetch_assoc($resultado)) {

        $categoria = new Categoria();

		$categoria->setId($produtoArray['categoria_id']);
		$categoria->setNome($produtoArray['categoria']);

    	    $produto = new Produto($produtoArray['nome'],
                                   $produtoArray['preco'],
                                   $produtoArray['descricao'],
                                   $categoria,
                                   $produtoArray['usado']);

			$produto->setId($produtoArray['id']);

			array_push($produtos, $produto);
    }
    return $produtos;
}