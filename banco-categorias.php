<?php
require_once("autoload.php");
require_once("conecta.php");

function listaCategorias($conexao) {

	$categorias = array();
	$query = "select * from categorias";
	$resposta = mysqli_query($conexao, $query);
	while ($categoriaArray = mysqli_fetch_assoc($resposta)) {

		$categoria = new Categoria();
		$categoria->setId($categoriaArray['id']);
		$categoria->setNome($categoriaArray['nome']);

		array_push($categorias, $categoria);
	}
	return $categorias;
}