<?php
include("logica-usuario.php");
include("banco-categorias.php");

verificaUsuario();

$categorias = listaCategorias($conexao);
$produto = array("nome" => "", "descricao" => "", "valor" => "", "categoria_id" => "");
$usado = false;
include("cabecalho.php"); ?>
    <h1>Formulário de Produto</h1>
    <form action="adiciona-produto.php" method="post">
        <?php include("produto-formulario-base.php"); ?>
    </form>
<?php include("rodape.php");