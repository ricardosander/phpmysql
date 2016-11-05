<?php
require_once("Categoria.php");

class Produto {

	public $id;
	public $nome;
	public $preco;
	public $descricao;
	public $categoria;
	public $usado;

    public function precoComDesconto($valor = 0.1) {
        return $this->preco - ($this->preco * $valor);
    }

}