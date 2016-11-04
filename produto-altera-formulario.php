<?php
include("banco-categorias.php");
include("banco-produto.php");

$id = $_GET['id'];

$categorias = listaCategorias($conexao);
$produto = buscaProduto($conexao, $id);
$usado = $produto['usado'] ? "checked=\"checked\"" : "";

include("cabecalho.php"); ?>
	<h1>Alteração de Produto</h1>
	<form action="altera-produto.php" method="post">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<?php include("produto-formulario-base.php"); ?>
	</form>
<?php include("rodape.php");