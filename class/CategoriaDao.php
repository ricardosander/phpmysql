<?php

class CategoriaDao {

    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function listaCategorias() {

        $categorias = array();
        $query      = "select * from categorias";
        $resposta   = mysqli_query($this->conexao, $query);
        while ($categoriaArray = mysqli_fetch_assoc($resposta)) {

            $categoria = new Categoria();
            $categoria->setId($categoriaArray['id']);
            $categoria->setNome($categoriaArray['nome']);

            array_push($categorias, $categoria);
        }

        return $categorias;
    }
}