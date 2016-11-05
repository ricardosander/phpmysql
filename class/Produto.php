<?php
require_once("autoload.php");

class Produto {

    private $id;
    private $nome;
	private $preco;
    private $descricao;
    private $categoria;
    private $usado;
    private $tipo;

    public function __construct($nome, $preco, $descricao, Categoria $categoria, $usado) {

        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->categoria = $categoria;
        $this->usado = $usado;
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getUsado() {
        return $this->usado;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setUsado($usado) {
        $this->usado = $usado;
    }

    public function precoComDesconto($valor = 0.1) {

        if ($valor > 0 && $valor <= 0.5) {
            return $this->preco - ($this->preco * $valor);
        }
        return $this->preco;
    }

    public function temIsbn() {
        return $this instanceof Livro;
    }

    public function temWaterMark() {
        return $this instanceof Ebook;
    }

    public function temTaxaImpressao() {
        return $this instanceof LivroFisico;
    }

    public function calculaImposto() {
        return $this->preco * 0.195;
    }

//    public function atualizaBaseadoEm($params) {
//
//        if ($this->temIsbn()) {
//            $this->setIsbn($params["isbn"]);
//        }
//
//        if ($this->temWaterMark()) {
//            $this->setWaterMark($params["waterMark"]);
//        }
//
//        if ($this->temTaxaImpressao()) {
//            $this->setTaxaImpressao($params["taxaImpressao"]);
//        }
//    }

    public function __toString() {
        return "Nome: {$this->nome}, preço: {$this->preco}, categoria: "
               . (isset($this->categoria) ? $this->categoria->getNome() : "");
    }
}