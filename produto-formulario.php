<?php
require_once("logica-usuario.php");
require_once("banco-categorias.php");

verificaUsuario();

$categorias = listaCategorias($conexao);
$produto = array("nome" => "", "descricao" => "", "valor" => "", "categoria_id" => "");
$usado = false;
require_once("cabecalho.php"); ?>
    <h1>Formulário de Produto</h1>
    <form action="adiciona-produto.php" method="post">
        <?php require_once("produto-formulario-base.php"); ?>
    </form>
<?php require_once("rodape.php");