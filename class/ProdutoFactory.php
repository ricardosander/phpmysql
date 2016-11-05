<?php

class ProdutoFactory {

    private $classes = array("Ebook", "LivroFisico");

    public function criaPor($tipoProduto, $params) {

        $nome = $params['nome'];
        $preco = $params['preco'];
        $descricao = $params['descricao'];
        $categoria = new Categoria();
        $usado = $params['usado'];

        if (isset($params['categoria_id'])) {
            $categoria->setId($params['categoria_id']);
        }

        if (isset($params['categoria'])) {
            $categoria->setNome($params['categoria']);
        }
        if (in_array($tipoProduto, $this->classes)) {

            $produto = new $tipoProduto($nome, $preco, $descricao, $categoria, $usado);
            $produto->atualizaBaseadoEm($params);
        } else {
            $produto = new Produto($nome, $preco, $descricao, $categoria, $usado);
        }

        if (isset($params['id'])) {
            $produto->setId($params['id']);
        }

        $produto->setTipo($tipoProduto);
        $produto->setUsado($params['usado']);

        if (isset($params['usado'])) {
            $produto->setUsado($params['usado']);
        }
        return $produto;
    }
}