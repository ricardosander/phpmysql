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
        $tipo         = mysqli_real_escape_string($this->conexao, $produto->getTipo());

        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = mysqli_real_escape_string($this->conexao, $produto->getIsbn());
        }

        $taxaImpressao = "";
        if ($produto->temTaxaImpressao()) {
            $taxaImpressao = mysqli_real_escape_string($this->conexao, $produto->getTaxaImpressao());
        }

        $waterMark = "";
        if ($produto->temWaterMark()) {
            $waterMark = mysqli_real_escape_string($this->conexao, $produto->getWaterMark());
        }

        $query = "insert into produtos 
                    (nome, preco, descricao, categoria_id, usado, tipoProduto, isbn, taxaImpressao, waterMark) 
                    values 
                    ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, $usado, '{$tipo}', '{$isbn}', '{$taxaImpressao}', '{$waterMark}')";

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

        $tipo = $produtoArray['tipoProduto'];

        $factory = new ProdutoFactory();
        $produto = $factory->criaPor($tipo, $produtoArray);
        $produto->atualizaBaseadoEm($produtoArray);
        $produto->setTipo($tipo);
        $produto->setId($produtoArray['id']);
        $produto->setCategoria($categoria);

        return $produto;
    }

    function alteraProduto(Produto $produto) {

        $id           = mysqli_real_escape_string($this->conexao, $produto->getId());
        $nome         = mysqli_real_escape_string($this->conexao, $produto->getNome());
        $descricao    = mysqli_real_escape_string($this->conexao, $produto->getDescricao());
        $preco        = mysqli_real_escape_string($this->conexao, $produto->getPreco());
        $categoria_id = mysqli_real_escape_string($this->conexao, $produto->getCategoria()->getId());
        $usado        = mysqli_real_escape_string($this->conexao, $produto->getUsado());
        $tipo         = mysqli_real_escape_string($this->conexao, $produto->getTipo());

        $isbn = "";
        if ($produto->temIsbn()) {
            $isbn = mysqli_real_escape_string($this->conexao, $produto->getIsbn());
        }

        $taxaImpressao = "";
        if ($produto->temTaxaImpressao()) {
            $taxaImpressao = mysqli_real_escape_string($this->conexao, $produto->getTaxaImpressao());
        }

        $waterMark = "";
        if ($produto->temWaterMark()) {
            $waterMark = mysqli_real_escape_string($this->conexao, $produto->getWaterMark());
        }

        $query = "update produtos set 
                    nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id = {$categoria_id}, 
                    usado = {$usado}, tipoProduto = '{$tipo}', isbn = '{$isbn}', taxaImpressao = '{$taxaImpressao}',
                    waterMark = '{$waterMark}'
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

            $tipo = $produtoArray['tipoProduto'];

            $factory = new ProdutoFactory();
            $produto = $factory->criaPor($tipo, $produtoArray);
            $produto->atualizaBaseadoEm($produtoArray);
            $produto->setTipo($produtoArray['tipo']);
            $produto->setId($produtoArray['id']);
            $produto->setCategoria($categoria);

            array_push($produtos, $produto);
        }

        return $produtos;
    }
}