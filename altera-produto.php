<?php
include("banco-produto.php");
$id = $_POST['id'];
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];
$categoria_id = $_POST['categoria_id'];
$usado = isset($_POST['usado']) && $_POST['usado'] == true ? "true" : "false";

$resultadoAlteracao = alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado);

include("cabecalho.php");
if ($resultadoAlteracao) {
	?>
	<p class="text-success">Produto <?= $nome ?>, <?= $preco ?> alterado com sucesso!</p>
	<?php
} else {
	$mensagem = mysqli_error($conexao);
	?>
	<p class="text-danger">Produto <?= $nome ?> não foi alterado! <?= $mensagem ?></p>
	<?php
}
include("rodape.php");
mysqli_close($conexao);
