<?php
require_once("banco-categorias.php");
require_once("banco-produto.php");

$id = $_GET['id'];

$categorias = listaCategorias($conexao);
$produto = buscaProduto($conexao, $id);
$usado = $produto['usado'] ? "checked=\"checked\"" : "";

require_once("cabecalho.php"); ?>
	<h1>Alteração de Produto</h1>
	<form action="altera-produto.php" method="post">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<?php require_once("produto-formulario-base.php"); ?>
	</form>
<?php require_once("rodape.php");