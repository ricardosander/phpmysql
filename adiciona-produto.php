<?php
include("banco-produto.php");
$nome = $_POST['nome'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

$resultadoInsercao = insereProduto($conexao, $nome, $preco, $descricao);

include("cabecalho.php");
if ($resultadoInsercao) {
    ?>
    <p class="text-success">Produto <?= $nome ?>, <?= $preco ?> adicionado com sucesso!</p>
    <?php
} else {
    $mensagem = mysqli_error($conexao);
    ?>
    <p class="text-danger">Produto <?= $nome ?> não foi adicionado! <?= $mensagem ?></p>
<?php
}
include("rodape.php");
mysqli_close($conexao);
