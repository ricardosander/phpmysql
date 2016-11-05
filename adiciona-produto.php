<?php
session_start();
require_once("logica-usuario.php");
require_once("banco-produto.php");
verificaUsuario();

$usado = (isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false");

$categoria = new Categoria();
$categoria->setId($_POST['categoria_id']);

$produto = new Produto($_POST['nome'],
                       $_POST['preco'],
                       $_POST['descricao'],
                       $categoria,
                       $usado);

$resultadoInsercao = insereProduto($conexao, $produto);

if ($resultadoInsercao) {
    $_SESSION['success'] = "Produto {$produto->getNome()}, {$produto->getPreco()} adicionado com sucesso!";
} else {

    $mensagem = mysqli_error($conexao);
    $_SESSION['danger'] = "Produto {$produto->getNome()} não foi adicionado! {$mensagem}";
}
header("Location: produto-formulario.php");
die;