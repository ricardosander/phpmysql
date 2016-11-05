<?php

class UsuarioDao {

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    function buscaUsuario($email, $senha) {

        $email = mysqli_real_escape_string($this->conexao, $email);
        $senha = mysqli_real_escape_string($this->conexao, $senha);

        $senha     = md5($senha);
        $query     = "select * from usuarios where email = '{$email}' and senha = '{$senha}'";
        $resultado = mysqli_query($this->conexao, $query);

        return mysqli_fetch_assoc($resultado);
    }
}