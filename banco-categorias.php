<?php
require_once("conecta.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");

function listaCategorias($conexao) {

	$categorias = array();
	$query = "select * from categorias";
	$resposta = mysqli_query($conexao, $query);
	while ($categoriaArray = mysqli_fetch_assoc($resposta)) {

		$categoria = new Categoria();
		$categoria->id = $categoriaArray['id'];
		$categoria->nome = $categoriaArray['nome'];

		array_push($categorias, $categoria);
	}
	return $categorias;
}