<?php
require_once("conecta.php");

function listaCategorias($conexao) {

	$categorias = array();
	$query = "select * from categorias";
	$resposta = mysqli_query($conexao, $query);
	while ($categoria = mysqli_fetch_assoc($resposta)) {
		array_push($categorias, $categoria);
	}
	return $categorias;
}