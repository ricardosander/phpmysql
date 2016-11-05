<?php

class ProdutoDao {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function insereProduto(Produto $produto) {

        $nome         = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $descricao    = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $preco        = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $categoria_id = mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId());
        $usado        = mysqli_real_escape_string($this->conexao, $produto->getUsado());

        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = mysqli_real_escape_string($this->conexao, $produto->getIsbn());
        }

        $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn) 
                    values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, $usado, '{$isbn}')";

        return mysqli_query($this->conexao, $query);
    }

    function buscaProduto($id) {

        $id = mysqli_real_escape_string($this->conexao, $id);

        $query     = "select p.*, c.nome as categoria from produtos as p inner join categorias as c on c.id = p.categoria_id where p.id = {$id}";
        $resultado = mysqli_query($this->conexao, $query);

        $produtoArray = mysqli_fetch_assoc($resultado);

        $categoria = new Categoria();

        $categoria->setId($produtoArray['categoria_id']);
        $categoria->setNome($produtoArray['categoria']);

        if (empty($produtoArray['isbn'])) {
            $produto = new Produto($produtoArray['nome'],
                               $produtoArray['preco'],
                               $produtoArray['descricao'],
                               $categoria,
                               $produtoArray['usado']);
        } else {
            $produto = new Livro($produtoArray['nome'],
                                   $produtoArray['preco'],
                                   $produtoArray['descricao'],
                                   $categoria,
                                   $produtoArray['usado']);
            $produto->setIsbn($produtoArray['isbn']);
        }


        $produto->setId($produtoArray['id']);

        return $produto;
    }

    function alteraProduto(Produto $produto) {

        $id           = mysqli_real_escape_string($this->conexao, $produto->getId());
        $nome         = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $descricao    = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $preco        = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $categoria_id = mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId());
        $usado        = mysqli_real_escape_string($this->conexao, $produto->getUsado());

        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = mysqli_real_escape_string($this->conexao, $produto->getIsbn());
        }

        $query = "update produtos set 
                    nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, 
                    usado = {$usado}, isbn = {$isbn} 
                  where id = {$id}";

        return mysqli_query($this->conexao, $query);
    }

    function removerProduto($id) {

        $id    = mysqli_real_escape_string($this->conexao, $id);
        $query = "delete from produtos where id = {$id}";

        return mysqli_query($this->conexao, $query);
    }

    function listaProdutos() {

        $query     = "select p.*, c.nome as categoria from produtos as p inner join categorias as c on c.id = p.categoria_id";
        $resultado = mysqli_query($this->conexao, $query);

        $produtos = array();
        while ($produtoArray = mysqli_fetch_assoc($resultado)) {

            $categoria = new Categoria();

            $categoria->setId($produtoArray['categoria_id']);
            $categoria->setNome($produtoArray['categoria']);

            if (empty($produtoArray['isbn'])) {
                $produto = new Produto($produtoArray['nome'],
                                       $produtoArray['preco'],
                                       $produtoArray['descricao'],
                                       $categoria,
                                       $produtoArray['usado']
                );
            } else {

                $produto = new Livro($produtoArray['nome'],
                                       $produtoArray['preco'],
                                       $produtoArray['descricao'],
                                       $categoria,
                                       $produtoArray['usado']
                );
                $produto->setIsbn($produtoArray['isbn']);
            }

            $produto->setId($produtoArray['id']);

            array_push($produtos, $produto);
        }

        return $produtos;
    }
}